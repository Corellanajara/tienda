<?php

/**
 * Description of EnlacesController
 *
 * @author Sergio Pérez <sergio.perez@albatronic.com>
 * @copyright Informática Albatronic, SL
 * @date 06-nov-2012
 *
 */
class EnlacesController extends ControllerProject {

    protected $controller = "Enlaces";

    public function IndexAction() {

        $this->values['seccion'] = ControllerWeb::getObjeto("GconSecciones", $this->request['IdEntity']);
        $this->values['enlaces'] = Enlaces::getEnlacesDeInteres(2);
        
        return parent::IndexAction();
    }

}

?>
