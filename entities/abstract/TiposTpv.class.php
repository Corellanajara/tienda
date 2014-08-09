<?php

/**
 * Description of Tipos de TPV Virtuales
 *
 * @author Sergio Pérez <sergio.perez@albatronic.com>
 * @copyright Informática ALBATRONIC, SL
 * @date 12-07-2014 12:15
 */
class TiposTpv extends Tipos {

    protected $tipos = array(
        array('Id' => '1', 'Value' => 'Paypal',),
        array('Id' => '2', 'Value' => 'Redsys/Sermepa',),
        array('Id' => '3', 'Value' => 'Pagantis',),
    );
    
    static $urlTpv = array(
        //Paypal
        '1' => array(
            'test' => 'https://www.sandbox.paypal.com/cgi-bin/webscr',
            'real' => 'https://www.paypal.com/cgi-bin/webscr',
        ),
        //Redsys
        '2' => array(
            'test' => 'https://sis-t.redsys.es:25443/sis/realizarPago',
            'real' => 'https://sis.redsys.es/sis/realizarPago',
        ),
        //Pagantis http://docs.pagantis.com/
        //La url es la misma. El modo test/real se cambia desde el panel de gestion de Pagantis
        '3' => array(
            'test' => 'https://psp.pagantis.com/2/charges',
            'real' => 'https://psp.pagantis.com/2/charges',
        ),
    );

    /**
     * Devuelve array con los parámetros a enviar a la pasarela de pago
     * 
     * @param integer $idTipo Tipo de pasarela
     * @param integer $idPedido El id de pedido web
     * @return array
     */
    static function getParametros($idTipo, $idPedido) {

        switch ($idTipo) {

            case '1': //Paypal
                $parametros = self::getParamsPaypal($idPedido);
                break;

            case '2': // Redsys
                $parametros = self::getParamsRedsys($idPedido);
                break;

            case '3': // Pagantis
                $parametros = self::getParamsPagantis($idPedido);
                break;

            default:
                $parametros = array();
        }

        return $parametros;
    }

    /**
     * Devuelve array con los parámetros para Paypal
     * 
     * @param int $idPedido
     * @param decimal $total
     * @return array
     */
    static private function getParamsPaypal($idPedido, $total) {

        $modo = ($_SESSION['varEnv']['Pro']['shop']['paypal']['modo'] == '1') ? 'real' : 'test';
        $urlWeb = $_SESSION['varEnv']['Pro']['shop']['url'];

        $parametros = array(
            'url_tpv' => self::$urlTpv[1][$modo],
            'cmd' => '_cart',
            'upload' => '1',
            'business' => $_SESSION['varEnv']['Pro']['shop']['paypal']['business'],
            'currency_code' => $_SESSION['varEnv']['Pro']['shop']['paypal']['currency_code'],
            'return' => $urlWeb . '/carrito/notificacion/paypal/ok',
            'cancel_return' => $urlWeb . '/carrito/notificacion/paypal/ko',
            'notify_url' => $urlWeb . '/lib/notificacionPaypal.php',
            'amount_1' => number_format($total, 2, '.', ''), // solo 2 decimales y sin separador de miles
            'item_name_1' => 'N. de Pedido:  ' . $idPedido,
            'custom' => $idPedido,
        );

        return $parametros;
    }

    /**
     * Devuelve array con los parámetros para Redsys
     * 
     * @param int $idPedido
     * @param decimal $total
     * @return array
     */
    static private function getParamsRedsys($idPedido, $total) {
        
        $pedido = new PedidosWebCab($idPedido);
        $total = $pedido->getTotal() + $pedido->getGastosEnvio();
        unset($pedido);

        // El número de pedido debe tener al menes 4 cifras
        if ($idPedido < 1000) {
            $idPedido = str_pad($idPedido, 4, "0", STR_PAD_LEFT);
        }
        // El total se expresa con dos decimales sin la coma
        $total = number_format($total, 2, '', '');
        if ($total[0] == '0') {
            // si es menor de 1 hay q quitar el cero inicial (ej: 0.25 => 025 => 25)
            $total = substr($total, 1);
        }          

        $parametros = array(
            'url_tpv' => self::$urlTpv[2][$modo],
            'Ds_Merchant_Amount' => $total,
            'Ds_Merchant_Currency' => $_SESSION['varEnv']['Pro']['shop']['redsys']['moneda'],
            'Ds_Merchant_Order' => $idPedido,
            'Ds_Merchant_ProductDescription' => '',
            'Ds_Merchant_Titular' => '',
            'Ds_Merchant_MerchantCode' => $_SESSION['varEnv']['Pro']['shop']['redsys']['codigo'],
            'Ds_Merchant_MerchantURL' => $_SESSION['varEnv']['Pro']['shop']['url'] . '/lib/notificacionRedsys.php',
            'Ds_Merchant_UrlOK' => $_SESSION['varEnv']['Pro']['shop']['url'] . '/carrito/notificacion/redsys/ok',
            'Ds_Merchant_UrlKO' => $_SESSION['varEnv']['Pro']['shop']['url'] . '/carrito/notificacion/redsys/ko',
            'Ds_Merchant_MerchantName' => $_SESSION['varEnv']['Pro']['shop']['redsys']['nombre'],
            'Ds_Merchant_ConsumerLanguage' => '0',
            'Ds_Merchant_MerchantSignature' => self::getSignatureRedsys($idPedido, $total),
            'Ds_Merchant_Terminal' => $_SESSION['varEnv']['Pro']['shop']['redsys']['terminal'],
            'Ds_Merchant_MerchantData' => '',
            'Ds_Merchant_TransactionType' => $_SESSION['varEnv']['Pro']['shop']['redsys']['tipoTransaccion'],
        );

        return $parametros;
    }

    /**
     * Devuelve array con los parámetros para Pagantis
     * 
     * @param int $idPedido
     * @param decimal $total
     * @return array
     */    
    static private function getParamsPagantis($idPedido) {
        
        $pedido = new PedidosWebCab($idPedido);
        $total = $pedido->getTotal() + $pedido->getGastosEnvio();
        unset($pedido);

        // El número de pedido debe tener al menes 4 cifras
        if ($idPedido < 1000) {
            $idPedido = str_pad($idPedido, 4, "0", STR_PAD_LEFT);
        }
        // El total se expresa con dos decimales sin la coma
        $total = number_format($total, 2, '', '');
        if ($total[0] == '0') {
            // si es menor de 1 hay q quitar el cero inicial (ej: 0.25 => 025 => 25)
            $total = substr($total, 1);
        }        
        
        $parametros = array(
            'url_tpv' => self::$urlTpv[3][$modo],
            'amount' => $total,
            'currency' => $_SESSION['varEnv']['Pro']['shop']['pagantis']['moneda'],
            'order_id' => $idPedido,
            'auth_method' => 'SHA1',
            'description' => '',
            'account_id' => $_SESSION['varEnv']['Pro']['shop']['pagantis']['codigo'],
            'ok_url' => $_SESSION['varEnv']['Pro']['shop']['url'] . '/carrito/notificacion/pagantis/ok',
            'nok_url' => $_SESSION['varEnv']['Pro']['shop']['url'] . '/carrito/notificacion/pagantis/ko',
            'signature' => self::getSignaturePagantis($idPedido,$total),
            'locale' => $_SESSION['varEnv']['Pro']['shop']['pagantis']['idioma'],
        );

        return $parametros;
    }

    /**
     * Calcula la firma Redsys
     * 
     * @param string $idPedido
     * @param string $total
     * @return string Firma sha1 en mayúsculas
     */
    static function getSignatureRedsys($idPedido,$total) {
        
        $modo = ($_SESSION['varEnv']['Pro']['shop']['redsys']['modo'] == '1') ? 'real' : 'test';
        $urlWeb = $_SESSION['varEnv']['Pro']['shop']['url'];
        $clave = ($modo === 'real') ?
                $_SESSION['varEnv']['Pro']['shop']['redsys']['claveReal'] :
                $_SESSION['varEnv']['Pro']['shop']['redsys']['claveTest'];

        $message = $total .
                $idPedido .
                $_SESSION['varEnv']['Pro']['shop']['redsys']['codigo'] .
                $_SESSION['varEnv']['Pro']['shop']['redsys']['moneda'] .
                $_SESSION['varEnv']['Pro']['shop']['redsys']['tipoTransaccion'] .
                $urlWeb . '/lib/notificacionRedsys.php' .
                $clave; 

        return strtoupper(sha1($message))  ;      
    }
    
    /**
     * Calcula la firma de Pagantis
     * 
     * @param string $idPedido
     * @param string $total
     * @return string Firma sha1
     */
    static function getSignaturePagantis($idPedido,$total) {
        
        $modo = ($_SESSION['varEnv']['Pro']['shop']['pagantis']['modo'] == '1') ? 'real' : 'test';
        $urlWeb = $_SESSION['varEnv']['Pro']['shop']['url'];
        $clave = ($modo === 'real') ?
                $_SESSION['varEnv']['Pro']['shop']['pagantis']['claveReal'] :
                $_SESSION['varEnv']['Pro']['shop']['pagantis']['claveTest'];

        $message = $clave .
                $_SESSION['varEnv']['Pro']['shop']['pagantis']['codigo'] .
                $idPedido .
                $total .
                $_SESSION['varEnv']['Pro']['shop']['pagantis']['moneda'] .
                'SHA1' .
                $urlWeb . '/carrito/notificacion/pagantis/ok' .
                $urlWeb . '/carrito/notificacion/pagantis/ko'; 
        
        return sha1($message);
    }
}
