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
        $this->values['menuPie'] = Menu::getMenuN(3, 5);
        $this->values['datosContacto'] = $this->varWeb['Pro']['globales'];   

        // Sliders y opciones de menú para el bloque head
        $this->values['sliders'] = Sliders::getSliders(1);      
        
        // TOTALES DEL CARRITO
        $this->values['carrito']['totales'] = ErpCarrito::getTotales();
        
        // Con beletines
        $this->values['conBoletines'] = ($this->varEnv['Pro']['shop']['boletines'] == '1');
        
        // Con gestión de cupones descuento
        $this->values['conCupon'] = ($this->varEnv['Pro']['shop']['cupones'] == '1');        
        
        // Con carrusel en portada
        $this->values['carruselPortada'] = ($this->varEnv['Pro']['shop']['carruselPortada'] == '1');  
        
        $this->values['mostrarStock'] = ($this->varEnv['Pro']['shop']['mostrarStock'] == '1');
        $this->values['mostrarSinStock'] = ($this->varEnv['Pro']['shop']['mostrarSinStock'] == '1');
        $this->values['mostrarDisponibilidad'] = ($this->varEnv['Pro']['shop']['mostrarDisponibilidad'] == '1');
        $this->values['avisadorStock'] = ($this->varEnv['Pro']['shop']['avisadorStock'] == '1');

        // Chat Online Zopim
        $this->values['idChatZopim'] = $this->varEnv['Pro']['shop']['idChatZopim'];
    }

}