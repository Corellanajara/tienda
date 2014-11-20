<?php

/**
 * GESTION DE CUPONES DEL CARRITO DE LA COMPRA
 *
 * @author Sergio Pérez <sergio.perez@albatronic.com>
 * @copyright Informatica ALBATRONIC
 * @since 19.jun.2014
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

$parametros = $_REQUEST['parametros'];
$accion = $parametros['accion'];
$datos = $parametros['datos'];

$errores = $alertas = array();

switch ($accion) {
    case 'valida':
        $cupon = new Cupones();
        $cupon = $cupon->find("Cupon", $datos['cupon']);
        $ok = $cupon->validaCupon($cupon->getId());
        if ($ok) {
            $_SESSION['cupon'] = $cupon->iterator();
            $_SESSION['cupon']['mensaje'] = $cupon->getMensajeCupon();
        } else {
            $_SESSION['cupon'] = array(); 
            $errores[] = $cupon->getMensajeCupon();
        }
        break;
    default:
}

$status = 'ok';
if (count($errores))
    $status = "error";
if (count($alertas))
    $status = "alerta";

$resultado = array(
    'status' => $status,
    'accion' => $accion,
    'cupon' => $_SESSION['cupon'],
    'errores' => $errores,
    'alertas' => $alertas,
);

$tag = json_encode($resultado);

echo $tag;