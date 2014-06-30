<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class CarritoController extends ControllerProject {

    protected $entity = "Carrito";

    public function IndexAction() {

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
        $this->values['combinaciones'] = $combinaciones;
        $this->values['combinacionesJSON'] = json_encode($combinaciones);

        foreach ($combinaciones as $key => $combinacion) {
            $zona = new ZonasTransporte($key);
            $zonas[$key] = $zona->getZona();
            foreach ($combinacion as $keyFp => $formaPago) {
                $fp = new FormasPago($keyFp);
                $formasPago[$keyFp] = $fp->getDescripcion();
            }
        }
        $this->values['zonas'] = $zonas;
        $this->values['formasPago'] = $formasPago;

        return parent::IndexAction();
    }

    public function ComprarAction() {
        if ($_SESSION['usuarioWeb']['Id'] > 0) {
            return $this->redirect("ZonaPrivada", "MisDatos");
        } else {
            // Aún no está logado, lo redirijo al controller de login
            return $this->redirect("ZonaPrivada");
        }
    }

}
