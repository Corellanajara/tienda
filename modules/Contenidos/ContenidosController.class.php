<?php

/**
 * Description of ContenidosController
 *
 * @author Sergio Pérez <sergio.perez@albatronic.com>
 * @copyright Informática Albatronic, SL
 * @date 06-nov-2012
 *
 */
class ContenidosController extends ControllerProject {

    protected $entity = "Contenidos";

    public function IndexAction() {
	$this->values['contenidoDesarrollado'] = Contenidos::getContenidoDesarrollado($this->request['IdEntity']	);

        return parent::IndexAction();
    }

}

?>
