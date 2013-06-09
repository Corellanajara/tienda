<?php

/**
 * Description of IndexController
 *
 * @author Sergio Pérez <sergio.perez@albatronic.com>
 * @copyright Informática Albatronic, SL
 * @date 06-nov-2012
 *
 */
class ProyectosController extends ControllerProject {

    protected $entity = "Proyectos";

    public function IndexAction() {

        $idEmpresa = $this->request['IdEntity'];
        $usuario = new PcaeUsuarios($_SESSION['USER']['user']['Id']);
        $proyectos = $usuario->getProyectos($idEmpresa);
        unset($usuario);

        $empresa = new PcaeEmpresas($idEmpresa);
        $this->values['empresa'] = $empresa->getRazonSocial();
        $this->values['proyectos'] = $proyectos;
        unset($empresa);

        return parent::IndexAction();
    }

}

?>
