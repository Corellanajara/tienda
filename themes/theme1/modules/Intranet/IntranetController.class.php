<?php

/**
 * Description of IntranetController
 *
 * AUTOGENERATED

 * @author Sergio Pérez <sergio.perez@albatronic.com>
 * @copyright Informática ALBATRONIC
 * @date 08-Sep-2014
 *
 */
class IntranetController extends ControllerProject {

    protected $controller = "Intranet";

    public function PedidoNuevoAction() {
        return array(
            'values' => $this->values,
            'template' => $this->controller . '/' . $this->request['Template'],
        );        
    }
    
    public function GestionPedidosAction() {
        return array(
            'values' => $this->values,
            'template' => $this->controller . '/' . $this->request['Template'],
        );        
    }
    
    public function HistoricoVentasAction() {
        return array(
            'values' => $this->values,
            'template' => $this->controller . '/' . $this->request['Template'],
        );        
    }
    
    public function FacturasAction() {
        
        return array(
            'values' => $this->values,
            'template' => $this->controller . '/' . $this->request['Template'],
        );
    }
}