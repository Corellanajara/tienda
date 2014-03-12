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
        $nArticulosRelacionados = (int)$this->varWeb['Pro']['shop']['carrito']['nArticulosRelacionadosFamilia'];

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

        return parent::IndexAction();
    }

}
