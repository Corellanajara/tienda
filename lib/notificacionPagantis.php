<?php

/*
 * RECIBE LA NOTIFICACION DE PAGANTIS EN FORMATO JSON
 * 
 * @copyright Informatica ALBATRONIC
 * @since 02.08.2014
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


/**
 * COMPRA OK
 * {
  "event": "charge.created",
  "api_version": "1.0",
  "data": {
  "livemode": true,
  "paid": true,
  "amount": 1000,
  "currency": "EUR",
  "refunded": true,
  "captured": true,
  "authorization_code": "12345678",
  "error_code": null,
  "error_message": null,
  "order_id": "bd9089ac71",
  "description": "Descripción del cargo",
  "custom_fields": null,
  "amount_in_eur": 1000,
  "exchange_rate_eur": 1,
  "source": "web",
  "ip": "0.0.0.0",
  "locale": "es",
  "fee": null,
  "interchange_fee": null,
  "settlement": null,
  "created_at": "2014-06-24T15:30:00.000Z",
  "refunds": [
  ],
  "id": "cha_1234567890abcdefg",
  "customer": null,
  "subscription": null,
  "card": {
  "brand": null,
  "card_type": "C",
  "last4": "0052",
  "expiration_year": 2019,
  "expiration_month": 10,
  "cvc_check": "none",
  "bin": 456789,
  "id": "car_0987654321abcdefg"
  },
  "activities": [
  {
  "activity_type": "charge.created",
  "created_at": "2014-06-24T15:30:00.000Z",
  "id": "act_0987654321abcdefg"
  }
  ]
  },
  "account_id": "pk_0123456789",
  "signature": "abcdefg1234567890"
  }
 */
/**
 * COMPRA KO
 * {
  "event": "charge.failed",
  "api_version": "1.0",
  "data": {
  "livemode": true,
  "paid": false,
  "amount": 1000,
  "currency": "EUR",
  "refunded": false,
  "captured": false,
  "authorization_code": null,
  "error_code": "50",
  "error_message": null,
  "order_id": "1bd9f302ae",
  "description": "Descripción de la operación.",
  "custom_fields": null,
  "amount_in_eur": 1000,
  "exchange_rate_eur": 1,
  "source": "web",
  "ip": "0.0.0.0",
  "locale": "en",
  "fee": null,
  "interchange_fee": null,
  "created_at": "2014-06-24T15:41:12.000Z",
  "refunds": [],
  "id": "cha_1234567890abcdefg",
  "customer": null,
  "subscription": null,
  "card": null,
  "settlement": null,
  "activities": [
  {
  "activity_type": "charge.failed",
  "created_at": "2014-06-24T15:41:13.000Z",
  "id": "act_a9fc7939059c1882768df01a5ce507d1"
  }
  ]
  },
  "account_id": "pk_abcdefg1234567890",
  "signature": "abcdefghijk1234567890"
  }
 */

// GUARDAR EN EL LOG
$respuesta = json_decode(file_get_contents('php://input'), true);
$fp = fopen("../log/pasarelaPagantis.log", "a");
fwrite($fp, date('Y-m-d H:i:s') . "\n" . print_r($respuesta, true));
fclose($fp);

switch ($respuesta['event']) {
    case 'charge.created':
        // Operación aceptada. Comprobamos la signature
        $firmaPasarela = $respuesta['signature'];
        $firmaCalculada = TiposTpv::getSignaturePagantis($respuesta['order_id'], $respuesta['amount_in_eur']);
        if ($firmaPasarela !== $firmaCalculada) {
            
        } else {
            
        }
        break;

    case 'charge.failed':
        // Operacion denegada
        break;

    default:
    // Resultado inesperado
}

$emailPedidos = Config::dame("EMAIL_PEDIDOS");
$numPedido = $_REQUEST["Ds_Order"];
$signatureBanco = $_REQUEST["Ds_Signature"];

//Cálculo de la firma en la Notificación On-line-------
$amount = $_REQUEST["Ds_Amount"];
$order = $numPedido;
$code = $_REQUEST["Ds_MerchantCode"];
$currency = $_REQUEST["Ds_Currency"];
$codRespuesta = $_REQUEST["Ds_Response"];
$clave = 'qwertyasdf0123456789'; //Prueba 
//$clave='843561136Q56584U';//Real
$message = $amount . $order . $code . $currency . $codRespuesta . $clave;
$signatureComercio = strtoupper(sha1($message));

//mail("amunoz@trevenque.es", "WEBLIB +: compraNotif ".$numPedido, "clave1: ".$signatureBanco."; clave2: ".$signatureComercio."-->".$amount."; ".$order."; ".$code."; ".$currency."; ".$codRespuesta."; ".$clave, "FROM:".$emailPedidos);
//------------------------------------------------------

$pm = print_r($_REQUEST, true);
mail("amunoz@trevenque.es", "ALTAIR: compraNotif " . $numPedido, "pm: " . $pm, "FROM:" . $emailPedidos);

/* $f=fopen("salida.txt", "w");
  fputs($f, "idPedido: $idpedido, codRespuesta: $codRespuesta");
  fclose($f); */

//echo "Pedido: $idpedido <br>"; print_r($_REQUEST); exit;

if ($numPedido == "" || $codRespuesta == "")
    die("Error: no ha llegado el identificador del pedido");


if ($signatureBanco != $signatureComercio) {
    mail("amunoz@trevenque.es", "ALTAIR: Acceso no permitido. Pedido Nº: " . $numPedido, "Un usuario ha intentado confirmar un pedido de forma no autorizada a través de la página de notificación del TPV virtual", "FROM:" . $emailPedidos);
    die("Error: Datos erróneos");
    exit;
}

if (($codRespuesta >= "0000" && $codRespuesta <= "0099") || $codRespuesta == "0900") { // Transacción autorizada
    // confirmar y enviar e-mails
    //if ($numPedido=="")
    //	Error::message(4, "&back=0");
    // confirmar el pedido (confirmarPedido.php)
    Pedido::confirmarPedido($numPedido, false);
} else { // Transacción denegada
    // Poner anulado
    Pedido::cambiarEstado($numPedido, "A");
    Pedido::logPedido($numPedido, "Anulación de pedido desde pasarela SERMEPA (" . $_SERVER["PHP_SELF"] . ")", "web");
}