<?php

/*
 * Gestión del avisador de stock:
 * 
 *      Insertar registros de solicitud de avisos
 *      Enviar emails de notificación de disponibilidad
 *
 *
 * @author Sergio Perez <sergio.perez@albatronic.com>
 * @copyright Informatica ALBATRONIC
 * @since 22.07.2014
 */

session_start();

if (!file_exists('../config/config.yml')) {
    echo "NO EXISTE EL FICHERO DE CONFIGURACION";
    exit;
}

if (file_exists("../bin/yaml/lib/sfYaml.php")) {
    include "../bin/yaml/lib/sfYaml.php";
} else {
    echo "NO EXISTE LA CLASE PARA LEER ARCHIVOS YAML";
    exit;
}

// ---------------------------------------------------------------
// CARGO LOS PARAMETROS DE CONFIGURACION.
// ---------------------------------------------------------------
$config = sfYaml::load('../config/config.yml');
$app = $config['config']['app'];

// ---------------------------------------------------------------
// ACTIVAR EL AUTOLOADER DE CLASES Y FICHEROS A INCLUIR
// ---------------------------------------------------------------
define("APP_PATH", $_SERVER['DOCUMENT_ROOT'] . $app['path'] . "/" . $app['theme']);
include_once "../" . $app['framework'] . "Autoloader.class.php";
Autoloader::setCacheFilePath(APP_PATH . '/cache/class_path_cache.txt');
Autoloader::excludeFolderNamesMatchingRegex('/^CVS|\..*$/');
Autoloader::setClassPaths(array(
    '../' . $app['framework'],
    '../entities/',
    '../lib/',
));
spl_autoload_register(array('Autoloader', 'loadClass'));

$v = $_POST;
$datos = $v['datos'];

switch ($v['accion']) {
    case 'registrar':
        // Registrar una solicitud de aviso
        $filtro = "IDArticulo='{$datos['idArticulo']}' and Email='{$datos['email']}'";
        $avisador = new AvisadorStock();
        $rows = $avisador->querySelect("Id, EmailedAt",$filtro);
        if (!isset($rows[0]['Id']) || $rows[0]['EmailedAt']>0) {
            $articulo = new Articulos($datos['idArticulo']);
            $avisador->setIDCliente( ($_SESSION['usuarioWeb']['Id']) ? $_SESSION['usuarioWeb']['Id'] : 0);
            $avisador->setEmail($datos['email']);
            $avisador->setIDArticulo($datos['idArticulo']);
            $avisador->setObservations($articulo->getDescripcion());
            $avisador->create();
            unset($articulo);
        }
        unset($avisador);
        $resultado = $filtro;
        break;
        
    case 'avisar':
        // Enviar por mail avisos de disponibiliad
        break;
}

echo $resultado;