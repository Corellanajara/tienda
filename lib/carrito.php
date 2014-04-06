<?php

/**
 * GESTION DE CARRITO DE LA COMPRA
 *
 * @author Sergio Pérez <sergio.perez@albatronic.com>
 * @copyright Informatica ALBATRONIC
 * @since 08.02.2014
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
    case 'add':
        $idLinea = ErpCarrito::addProduct($datos['IDArticulo'], $datos['Unidades']);
        if (!$idLinea) {
            $errores = ErpCarrito::getErrores();
        } else {
            $alertas = ErpCarrito::getAlertas();
        }
        break;

    case 'remove':
        $ok = ErpCarrito::removeProduct($datos['IDLinea']);
        if (!$ok) {
            $errores = ErpCarrito::getErrores();
        } else {
            $alertas = ErpCarrito::getAlertas();
        }
        break;
        
    case 'update':
        $idLinea = ErpCarrito::updateProduct($datos['IDLinea'],$datos['Unidades']);
        if (!$idLinea) {
            $errores = ErpCarrito::getErrores();
        } else {
            $alertas = ErpCarrito::getAlertas();
        }        
        break;
}

$status = 'ok';
if (count($errores))
    $status = "error";
if (count($alertas))
    $status = "alerta";

$linea = isset($idLinea) ? ErpCarrito::getLinea($idLinea)->iterator() : array();

$resultado = array(
    'status' => $status,
    'accion' => $accion,
    'linea' => $linea,
    'totales' => ErpCarrito::getTotales(),
    'errores' => $errores,
    'alertas' => $alertas,
);

$tag = json_encode($resultado);

echo $tag;

