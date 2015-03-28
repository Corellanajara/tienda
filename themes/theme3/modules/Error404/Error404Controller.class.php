<?php

/**
 * Description of IndexController
 *
 * @author Administrador
 */
class Error404Controller extends ControllerProject {

    var $controller = "Error404";

    public function IndexAction() {
        header("HTTP/1.0 404 Not Found");
        return parent::IndexAction();
    }

}
