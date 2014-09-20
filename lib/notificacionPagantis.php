<?php

/*
 * RECIBE LA NOTIFICACION DE PAGANTIS EN FORMATO JSON
 * 
 * @copyright Informatica ALBATRONIC
 * @since 02.08.2014
 */
//session_start();

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
fwrite($fp, $respuesta['data']['order_id']." ".$respuesta['data']['amount_in_eur']." ".$respuesta['data']['order_id']."\n");


switch ($respuesta['event']) {
    case 'charge.created':
        // Operación aceptada. Comprobamos la signature
        $firmaPasarela = $respuesta['signature'];
        $firmaCalculada = TiposTpv::getSignaturePagantis($respuesta['data']['order_id'], $respuesta['data']['amount_in_eur']);
        fwrite($fp,$firmaPasarela." ".$firmaCalculada."\n".print_r($respuesta['data'],true));
        if ($firmaPasarela !== $firmaPasarela) {
            // Anular el pedido, no coindicen las firmas o el número de pedido
            PedidosWebCab::cambiaEstado($respuesta['data']['order_id'], 1);
        } else {
            // Confirma el pedido y guardar el código de autorización
            $pedido = new PedidosWebCab();
            $pedido->queryUpdate(
                    array(
                'IDEstado' => 2,
                'Key1Pasarela' => $respuesta['data']['authorization_code'],
                'Key2Pasarela' => $respuesta['data']['id'],
                    ), "IDPedido='{$respuesta['data']['order_id']}'");
        }
        break;

    case 'charge.failed':
        // Operacion denegada, anular el pedido
        PedidosWebCab::cambiaEstado($respuesta['data']['order_id'], 1);
        break;

    default:
        // Resultado inesperado, anular el pedido
        PedidosWebCab::cambiaEstado($respuesta['data']['order_id'], 1);
}
fclose($fp);