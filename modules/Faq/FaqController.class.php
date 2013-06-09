<?php

/**
 * Description of FaqController
 *
 * @author Sergio Pérez <sergio.perez@albatronic.com>
 * @copyright Informática ALBATRONIC, SL
 * @date 3-Agosto-2012
 *
 */
class FaqController extends ControllerProject {

    protected $entity = "Faq";

    public function IndexAction() {
	$this->values['faq'] = Contenidos::getContenidosSeccion(23);
	
	/* TESTIMONIOS */
	$this->values['testimonios'] = Contenidos::getContenidosSeccion(27);
	
        return parent::IndexAction();
    }

}

?>
