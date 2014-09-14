<?php

/*
 * RECIBE LA NOTIFICACION DE LA PASARELA PAYPAL
 * 
 * @copyright Informatica ALBATRONIC
 * @since 23.07.2014
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

/*
  [mc_gross] => 15.49
  [protection_eligibility] => Ineligible
  [address_status] => unconfirmed
  [item_number1] =>
  [payer_id] => WEWF8MS4QTAY6
  [tax] => 0.00
  [address_street] => CL. JESUS NAZARENO 17 BAJO A
  [payment_date] => 09:10:17 Feb 23, 2011 PST
  [payment_status] => Completed
  [charset] => ISO-8859-15
  [address_zip] => 11130
  [mc_shipping] => 0.00
  [mc_handling] => 0.00
  [first_name] => MANUEL
  [mc_fee] => 0.88
  [address_country_code] => ES
  [address_name] => MANUEL VELAZQUEZ RAMIREZ
  [notify_version] => 3.0
  [custom] => 46
  [payer_status] => verified
  [business] => pedidos@libreriacamara.com
  [address_country] => Spain
  [num_cart_items] => 1
  [mc_handling1] => 0.00
  [address_city] => CHICLANA DE LA FRONTERA
  [verify_sign] => A.ZTw52DH637ibesgEhuhisqNslVAXZ0Hk4z.JYc6cUBy3o3k0SjCKVf
  [payer_email] => mvnet.vr@gmail.com
  [mc_shipping1] => 0.00
  [txn_id] => 0TR268828X5189721
  [payment_type] => instant
  [last_name] => VELAZQUEZ RAMIREZ
  [address_state] => Cadiz
  [item_name1] => Pedido de ebooks 46
  [receiver_email] => pedidos@libreriacamara.com
  [payment_fee] =>
  [quantity1] => 1
  [receiver_id] => RX3FF9J4CG6WC
  [txn_type] => cart
  [mc_gross_1] => 15.49
  [mc_currency] => EUR
  [residence_country] => ES
  [transaction_subject] => 46
  [payment_gross] =>
 */

$host = ($_SESSION['varEnv']['Pro']['shop']['paypal']['modo'] == '1') ?
        // Producción
        'www.paypal.com' :
        // Test
        'www.sandbox.paypal.com';

$varEnv = CpanVariables::getVariables("Env", "Pro");
$varWeb = CpanVariables::getVariables("Web", "Pro");
$emailPedidos = $varEnv['shop']['eMailPedidos'];
$mailer = new Mail($varWeb['mail']);

$textoPedido = $_REQUEST["item_name1"];
$codRespuesta = $_REQUEST["payment_status"];
$codPayer = $_REQUEST["payer_status"];
$numPedido = $_REQUEST["custom"];
$totalPedido = $_REQUEST["mc_gross"];

if ($numPedido == "" || $codRespuesta == "") {
    die("Error: no ha llegado el identificador del pedido");
}

$pm = print_r($_REQUEST, true);
$pm .= "numPedido: '" . $numPedido . "' - codRespuesta: '" . $codRespuesta . "' - " . date('h:i:s');

// prepara la respuesta para PAYPAL, confirmación
$paypaVerificado = false;

$req = 'cmd=_notify-validate';
if (function_exists('get_magic_quotes_gpc')) {
    $get_magic_quotes_exists = true;
}

foreach ($_POST as $key => $value) {
    // Handle escape characters, which depends on setting of magic quotes
    if ($get_magic_quotes_exists == true && get_magic_quotes_gpc() == 1) {
        $value = urlencode(stripslashes($value));
    } else {
        $value = urlencode($value);
    }
    $req .= "&$key=$value";
}

// post back to PayPal system to validate
/*
  Con estas cabeceras da el fallo: Invalid Host header
  $header .= "POST /cgi-bin/webscr HTTP/1.0\r\n";
  $header .= "Content-Type: application/x-www-form-urlencoded\r\n";
  $header .= "Content-Length: " . strlen($req) . "\r\n\r\n";
 */
$header = "POST /cgi-bin/webscr HTTP/1.1\r\n";
$header .= "Host: " . $host . "\r\n";
$header .= "Content-Type: application/x-www-form-urlencoded\r\n";
$header .= "Content-Length: " . strlen($req) . "\r\n";
$header .= "Connection: close\r\n\r\n";

// lo intenta 4 veces usando open socket
for ($i = 1; $i < 4; $i++) {
    // 25-09-2013 en sandbox no funciona pero tampoco da un fallo $fp = @fsockopen($host, 80, $errno, $errstr, 30);
    // 30-01-2014 un cambio en la respuesta hace que cambiemos el protocolo y el proceso siguiendo los ejemplos
    $fp = @fsockopen('sslv3://' . $host, 443, $errno, $errstr, 30);
    //$fp = fsockopen ('ssl://'.$host, 443, $errno, $errstr, 30);
    //$fp = @fsockopen('https://'.$host, 443, $errno, $errstr, 30);

    if ($fp) {
        //Push response
        @fputs($fp, $header . $req);
        // Read response from server
        while (!feof($fp)) {
            $res = @fgets($fp, 1024);
            if (strcmp(trim($res), "VERIFIED") == 0) {
                $paypaVerificado = true;
                $i = 4; // abandona el for
                break; // abandona el while
            }
        }

        // Close pointer
        @fclose($fp);
    }

    // si esta verificado ya no tiene que esperar
    if (!$paypaVerificado) {
        sleep(3);
    }
}

$pm .= "\r\n\r\n************\r\n\r\n" . $header . $req . "\r\n\r\n************\r\n\r\n" . $res;
if ($paypaVerificado) {
    $pm .= "\r\n\r\n************\r\n\r\nPAYPAL OK";
} else {
    $pm .= "\r\n\r\n************\r\n\r\nPAYPAL FALLO";
}

$mailer->send("info@albatronic.com","info@albatronic.com","ALBATRONIC","","", "WEBLIB Paypal: compraNotif " . $numPedido, "pm: " . $pm);

if ($codRespuesta === "Completed" && $paypaVerificado) { // Transacción autorizada
    // comprueba el total de la operacion
    $pedido = new PedidosWebCab($numPedido);
    $subtotal = $pedido->getTotal();
    $total = $subtotal + $pedido->getGastosEnvio();

    // MEX ¿? -> if ($totalPedido == $total)
    if ($totalPedido == number_format($total, 2, '.', '')) {
        // confirmar el pedido (confirmarPedido.php)
        PedidosWebCab::cambiaEstado($numPedido, 2);

        exit; // proceso completado, sale...
    }

    $pm .= "\r\n\r\n************\r\n\r\nEl total ha sido manipulado\r\n";
    $pm .= number_format($total, 2, '.', '') . " -> " . $totalPedido . "\r\n\r\n************\r\n\r\n";

    $mailer->send("info@albatronic.com","info@albatronic.com","ALBATRONIC","","", "Paypal: compraNotif error en total pedido", "pm: " . $pm);
}

// Transacción denegada
// Poner anulado
PedidosWebCab::cambiarEstado($numPedido, 1);
$fp = fopen("../log/paypal.log", "a");
fwrite($fp,"anulado");
fclose($fp);
//Pedido::logPedido($numPedido, "Anulación de pedido desde pasarela Paypal (" . $_SERVER["PHP_SELF"] . ")", "web");
