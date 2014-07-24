<?php

/**
 * Description of CondicionesVentaController
 *
 * @author Sergio Pérez <sergio.perez@albatronic.com>
 * @copyright Informática Albatronic, SL
 * @date 27-jun-2013
 *
 */
class CondicionesVentaController extends ControllerProject {

    protected $controller = "CondicionesVenta";

    public function IndexAction() {
        
        $this->values['dominio'] = $this->varWeb['Pro']['globales']['dominio'];
        $this->values['empresa'] = $this->varWeb['Pro']['globales']['empresa'];
        
        return parent::IndexAction();
    }
}

?>
