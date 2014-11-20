<?php
/**
 * Description of PromocionesController
 *
 * @author Sergio Pérez <sergio.perez@albatronic.com>
 * @copyright (c) Informática ALBATRONIC, S.L
 * @version 7-SEP-2014
 */
class PromocionesController extends ControllerProject {

    protected $controller = "Promociones";
    
    public function IndexAction() {
        
        $usuario = new Clientes($_SESSION['usuarioWeb']['Id']);
        $this->values['promociones'] = $usuario->getPromosVigentes();
        unset($usuario);
        
        return parent::IndexAction();
    }
}
