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
        $this->values['menuCabecera'] = Menu::getMenuN(2, 5);
        $this->values['menuDerecho'] = Menu::getMenuN(1, 5);
        $this->values['menuPie'] = Menu::getMenuN(5, 5);
        $this->values['datosContacto'] = $this->varWeb['Pro']['globales'];  
        
        // El objeto widgets para que esté disponible en todas las vistas
        $this->values['widgets'] = new Widgets();     
        
        // Sliders y opciones de menú para el bloque head
        $this->values['sliders'] = Sliders::getSliders(1);
        $this->values['menuCabeceraIzq'] = Menu::getMenuN(2, 3);
        $this->values['menuCabeceraDcha'] = Menu::getMenuN(3, 3);       

    }

}

?>
