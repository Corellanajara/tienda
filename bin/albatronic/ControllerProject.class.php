<?php

/**
 * CONTROLADOR DE PROYECTO. EXTIENDE AL CONTROLADOR WEB
 * 
 * El constructor realiza las tareas comunes al proyecto como por ej.
 * construir la ruta de navegación y los menús
 *
 * @author Sergio Pérez
 * @copyright Informática Albatronic, SL
 * @version 1.0 26-nov-2012
 */
class ControllerProject extends ControllerWeb {

    public function __construct($request) {

        parent::__construct($request);

        $this->values['firma'] = $this->getFirma();     
        $this->values['redes'] = RedesSociales::getRedes();
        $this->values['menuCategorias'] = ErpFamilias::getCategoriasFamilias(true,5);
        $this->values['menuDerecho'] = ErpFamilias::getCategoriasFamilias(true);
        $this->values['menuPie'] = Menu::getMenuN(1, 5);
        $this->values['datosContacto'] = $this->varWeb['Pro']['globales'];

    }

}

?>
