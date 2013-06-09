<?php

/**
 * Description of IndexController
 *
 * @author Sergio Pérez <sergio.perez@albatronic.com>
 * @copyright Informática Albatronic, SL
 * @date 06-nov-2012
 *
 */
class ServiciosController extends ControllerProject {

    protected $entity = "Servicios";

    public function IndexAction() {

        switch ($this->request['Entity']) {

            case 'ServServicios':
                $this->values['servicio'] = Servicios::getServicioDesarrollado($this->request['IdEntity']);
                $this->template = $this->entity . "/servicioDesarrollado.html.twig";
                break;

            case 'GconSecciones':
                // Se muestran todos los servicios
                $this->values['servicios'] = Servicios::getServicios(0,-1);
                $this->template = $this->entity . "/index.html.twig";
                break;
        }
	
	$this->values['servicios'] = Servicios::getServicios(0, 1, 3);

        return array(
            'values' => $this->values,
            'template' => $this->template,
        );
    }


}

?>
