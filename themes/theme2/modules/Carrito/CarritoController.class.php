<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class CarritoController extends ControllerProject {

    protected $controller = "Carrito";

    public function IndexAction() {

        if ($this->request[1] == 'notificacion') {
            // Entra desde la pasarela
            return $this->NotificacionAction();
        } else {

            $this->values['carrito'] = ErpCarrito::getCarrito();

            // Obtener artículos relacionados con los que hay en el carrito
            $nArticulosRelacionados = (int) $this->varWeb['Pro']['shop']['carrito']['nArticulosRelacionadosFamilia'];

            if ($nArticulosRelacionados > 0) {
                $arrayRelacionados = array();
                foreach ($this->values['carrito']['lineas'] as $linea) {
                    $array = ErpArticulos::getArticulosRelacionados($linea->getIDArticulo()->getIDArticulo(), $nArticulosRelacionados);
                    foreach ($array as $articulo) {
                        $arrayRelacionados[$articulo->getIDArticulo()] = $articulo;
                    }
                }
                $this->values['carrito']['articulosRelacionados'] = $arrayRelacionados;
            }

            // Obtener las combinaciones de formas de pago, zonas y formas de envío
            $zonasPagoEnvio = new ZonasPagoEnvio();
            $combinaciones = $zonasPagoEnvio->getCombinaciones('2');
            unset($zonasPagoEnvio);
            $this->values['combinaciones'] = $combinaciones;
            $this->values['combinacionesJSON'] = json_encode($combinaciones);
            $this->values['cupon'] = $_SESSION['cupon'];
            $this->values['seguimientoVisitas'] = ($this->varEnv['Pro']['shop']['seguimientoVisitas']);
            return parent::IndexAction();
        }
    }

    public function ComprarAction() {

        if ($_SESSION['usuarioWeb']['Id'] > 0) {

            $idPedido = ErpCarrito::creaPedido();
            $pedido = new PedidosWebCab($idPedido);
            $_SESSION['idPedido'] = $idPedido;

            // ver si tengo que enviar a la pasarela
            $formaPago = $pedido->getIDFP();
            if ($formaPago->getAccion()->getIDTipo() == '2' && $formaPago->getTipoTPV()->getIDTipo() > 0) {
                $parametrosPasarela = TiposTpv::getParametros($formaPago->getTipoTPV()->getIDTipo(), $idPedido);
                $this->values['pasarela'] = $parametrosPasarela;
            }

            $this->values['pedido'] = $pedido;
            return array(
                'template' => $this->controller . '/resumenPedido.html.twig',
                'values' => $this->values,
            );
        } else {
            // Aún no está logado, lo redirijo al controller de login
            return $this->redirect("ZonaPrivada");
        }
    }

    /**
     * Recibe la url de vuelta con la notificación
     * de la pasarela de pago
     */
    public function NotificacionAction() {

        $this->values['idPedido'] = $_SESSION['idPedido'];

        switch ($this->request[2]) {
            case 'paypal':
                if ($this->request[3] == 'ok') {
                    // Confirmar pedido pagado
                    PedidosWebCab::cambiaEstado($_SESSION['idPedido'], 2);
                    ErpCarrito::vaciaCarrito();
                    $this->values['mensaje'] = "pedidoTramitado";
                } else {
                    // Anular pedido
                    PedidosWebCab::cambiaEstado($_SESSION['idPedido'], 1);
                    $this->values['mensaje'] = "operacionRechazada";
                }
                break;

            case 'redsys':
                if ($this->request[3] == 'ok') {
                    // Confirmar pedido pagado
                    PedidosWebCab::cambiaEstado($_SESSION['idPedido'], 2);
                    ErpCarrito::vaciaCarrito();
                    $this->values['mensaje'] = "pedidoTramitado";
                } else {
                    // Anular pedido
                    PedidosWebCab::cambiaEstado($_SESSION['idPedido'], 1);
                    $this->values['mensaje'] = "operacionRechazada";
                }
                break;

            case 'pagantis':
                if ($this->request[3] == 'ok') {
                    // Confirmar pedido pagado
                    PedidosWebCab::cambiaEstado($_SESSION['idPedido'], 2);
                    ErpCarrito::vaciaCarrito();
                    $this->values['mensaje'] = "pedidoTramitado";
                } else {
                    // Anular pedido
                    PedidosWebCab::cambiaEstado($_SESSION['idPedido'], 1);
                    $this->values['mensaje'] = "operacionRechazada";
                }                
                break;

            case 'ceca':
                if ($this->request[3] == 'ok') {
                    // Confirmar pedido pagado
                    PedidosWebCab::cambiaEstado($_SESSION['idPedido'], 2);
                    ErpCarrito::vaciaCarrito();
                    $this->values['mensaje'] = "pedidoTramitado";
                } else {
                    // Anular pedido
                    PedidosWebCab::cambiaEstado($_SESSION['idPedido'], 1);
                    $this->values['mensaje'] = "operacionRechazada";
                }                
                break;
            
            default:
                // Sin pasarela
                // Confirmar pedido pendiente de pago
                PedidosWebCab::cambiaEstado($_SESSION['idPedido'], 3);
                ErpCarrito::vaciaCarrito();
                $this->values['mensaje'] = "pedidoTramitado";
                $this->request[3] = 'ok';
        }

        if ($this->request[3] === 'ok') {
            PedidosWebCab::enviaCorreos($_SESSION['idPedido']);
            $template = $this->controller . "/pedidoOk.html.twig";
            $this->values['pedido'] = new PedidosWebCab($_SESSION['idPedido']);
        } else {
            $template = $this->controller . "/pedidoKo.html.twig";
        }

        $_SESSION['idpedido'] = '';

        return array(
            'values' => $this->values,
            'template' => $template,
        );
    }

}
