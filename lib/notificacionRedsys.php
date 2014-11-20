<?php

/* 
 * RECIBE LA NOTIFICACION DE LA PASARELA BANCARIA
 * 
 * @copyright Informatica ALBATRONIC
 * @since 13.07.2014
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


// ej: http://www.akal.com/registro/compraNotificacion.php?Ds_Order=8369&Ds_Response=0000

/*
    [Ds_Date] => 05/05/2009
    [Ds_Hour] => 17:19
    [Ds_SecurePayment] => 1
    [Ds_Card_Country] => 724
    [Ds_Amount] => 928
    [Ds_Currency] => 978
    [Ds_Order] => 8372
    [Ds_MerchantCode] => 6381511
    [Ds_Terminal] => 001
    [Ds_Signature] => 6A1A9AE4037717D4418DEE96001680952E72E4A5
    [Ds_Response] => 0000
    [Ds_MerchantData] => 
    [Ds_TransactionType] => 0
    [Ds_ConsumerLanguage] => 1
    [Ds_AuthorisationCode] => 461980
*/

$fp = fopen("../log/pasarelaRedsys.log", "a");
fwrite($fp,print_r($_GET,true));
fclose($fp);
exit;

$emailPedidos = Config::dame("EMAIL_PEDIDOS");
$numPedido = $_REQUEST["Ds_Order"];
$signatureBanco =  $_REQUEST["Ds_Signature"]; 

//Cálculo de la firma en la Notificación On-line-------
$amount =  $_REQUEST["Ds_Amount"];
$order = $numPedido;
$code =  $_REQUEST["Ds_MerchantCode"];
$currency =  $_REQUEST["Ds_Currency"];
$codRespuesta = $_REQUEST["Ds_Response"];
$clave='qwertyasdf0123456789';//Prueba 
//$clave='843561136Q56584U';//Real
$message = $amount.$order.$code.$currency.$codRespuesta.$clave;
$signatureComercio = strtoupper(sha1($message));

//mail("amunoz@trevenque.es", "WEBLIB +: compraNotif ".$numPedido, "clave1: ".$signatureBanco."; clave2: ".$signatureComercio."-->".$amount."; ".$order."; ".$code."; ".$currency."; ".$codRespuesta."; ".$clave, "FROM:".$emailPedidos);
//------------------------------------------------------

$pm = print_r($_REQUEST, true);
mail("info@albatronic.com", "ALTAIR: compraNotif ".$numPedido, "pm: ".$pm, "FROM:".$emailPedidos);

/*$f=fopen("salida.txt", "w");
fputs($f, "idPedido: $idpedido, codRespuesta: $codRespuesta");
fclose($f);*/

//echo "Pedido: $idpedido <br>"; print_r($_REQUEST); exit;

if ($numPedido == "" || $codRespuesta == "")
	die("Error: no ha llegado el identificador del pedido");

	
if($signatureBanco != $signatureComercio){
	mail("info@albatronic.com", "Acceso no permitido. Pedido Nº: ".$numPedido,"Un usuario ha intentado confirmar un pedido de forma no autorizada a través de la página de notificación del TPV virtual", "FROM:".$emailPedidos);	
	die("Error: Datos erróneos");
	exit ;
}

if ( ($codRespuesta>="0000" && $codRespuesta<="0099") || $codRespuesta=="0900") // Transacción autorizada
{
	// confirmar y enviar e-mails
	//if ($numPedido=="")
	//	Error::message(4, "&back=0");
		
		
	// confirmar el pedido (confirmarPedido.php)
	Pedido::confirmarPedido($numPedido, false);
	

}
else // Transacción denegada
{
	// Poner anulado
	Pedido::cambiarEstado($numPedido, "A");
	Pedido::logPedido($numPedido, "Anulación de pedido desde pasarela SERMEPA (".$_SERVER["PHP_SELF"].")", "web");
}