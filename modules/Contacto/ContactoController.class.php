<?php

/**
 * Description of ContactoController
 *
 * @author Sergio Pérez <sergio.perez@albatronic.com>
 * @copyright Informática ALBATRONIC, SL
 * @date 20-abril-2013
 *
 */
class ContactoController extends ControllerProject {

    var $entity = "Contacto";
    var $plantilla = array(
        'campos' => array(
            'Nombre' => array('valor' => 'Nombre y apellidos', 'error' => false),
            'Empresa' => array('valor' => 'Empresa', 'error' => false),
            'Email' => array('valor' => 'Email', 'error' => false),
            'Telefono' => array('valor' => 'Teléfono de contacto', 'error' => false),
            'Mensaje' => array('valor' => 'Mensaje', 'error' => false),
        ),
    );
    var $formContacta = array();

    public function IndexAction() {

        switch ($this->request['METHOD']) {
            case 'GET':
                $this->formContacta = $this->plantilla;
                break;

            case 'POST':
                $this->formContacta = $this->request['campos'];

                if ($this->Valida()) {
                    if (file_exists('docs/plantillaMailVisitante.htm')) {
                        $mensajeVisitante = file_get_contents('docs/plantillaMailVisitante.htm');
                        $mensajeVisitante = str_replace("#EMPRESA#", $this->varWeb['Pro']['global']['empresa'], $mensajeVisitante);
                        $mensajeVisitante = str_replace("#FECHA#", date('d-m-Y'), $mensajeVisitante);
                        $mensajeVisitante = str_replace("#HORA#", date('H:m:i'), $mensajeVisitante);
                        $mensajeVisitante = str_replace("#MAIL#", $this->varWeb['Pro']['mail']['from'], $mensajeVisitante);
                        $mensajeVisitante = str_replace("#TEXTOLOPD#", $this->varWeb['Pro']['mail']['textoLOPD'], $mensajeVisitante);
                        $mensajeVisitante = str_replace("#DOMINIO#", $this->varWeb['Pro']['globales']['dominio'], $mensajeVisitante);
                        $mensajeVisitante = str_replace("#TITLE#", $this->varWeb['Pro']['globales']['empresa'], $mensajeVisitante);
                    }
                    if (file_exists('docs/plantillaMailWebMaster.htm')) {
                        $mensajeWebMaster = file_get_contents('docs/plantillaMailWebMaster.htm');
                        $mensajeWebMaster = str_replace("#EMPRESA#", $this->formContacta['campos']['Empresa']['valor'], $mensajeWebMaster);
                        $mensajeWebMaster = str_replace("#FECHA#", date('d-m-Y'), $mensajeWebMaster);
                        $mensajeWebMaster = str_replace("#HORA#", date('H:m:i'), $mensajeWebMaster);
                        $mensajeWebMaster = str_replace("#MAIL#", $this->formContacta['campos']['Email']['valor'], $mensajeWebMaster);
                        $mensajeWebMaster = str_replace("#TELEFONO#", $this->formContacta['campos']['Telefono']['valor'], $mensajeWebMaster);
                        $mensajeWebMaster = str_replace("#MENSAJE#", $this->formContacta['campos']['Mensaje']['valor'], $mensajeWebMaster);
                        $mensajeWebMaster = str_replace("#VISITANTE#", $this->formContacta['campos']['Nombre']['valor'], $mensajeWebMaster);
                        $mensajeWebMaster = str_replace("#TEXTOLOPD#", $this->varWeb['Pro']['mail']['textoLOPD'], $mensajeWebMaster);
                        $mensajeWebMaster = str_replace("#DOMINIO#", $this->varWeb['Pro']['globales']['dominio'], $mensajeWebMaster);
                        $mensajeWebMaster = str_replace("#TITLE#", $this->varWeb['Pro']['globales']['empresa'], $mensajeWebMaster);
                    }
                    $mail = new Mail($this->varWeb['Pro']['mail']);
                    // Envío al visitante
                    $envioOk = $mail->send(
                            $this->formContacta['campos']['Email']['valor'], $this->varWeb['Pro']['mail']['from'], $this->varWeb['Pro']['mail']['from_name'], 'Contacto desde la web', $mensajeVisitante, array()
                    );
                    if ($envioOk) {
                        // Envío al web master
                        $envioOk = $mail->send(
                                $this->varWeb['Pro']['mail']['from'], $this->formContacta['campos']['Email']['valor'], $this->formContacta['nombre']['valor'], 'Consulta desde la web', $mensajeWebMaster, array()
                        );
                    }

                    $this->formContacta['accion'] = 'envio';
                    $this->formContacta['resultado'] = $envioOk;
                    $this->formContacta['mensaje'] = ($envioOk) ? $this->values['TEXTS']['exitoEnvio'] : $this->values['TEXTS']['errorEnvio'];
                    unset($mail);
                }
                break;
        }

        $this->values['formContacta'] = $this->formContacta;

        return parent::IndexAction();
    }

    private function Valida() {

        $error = false;

        if (!isset($this->formContacta['leidoPolitica']['valor']))
            $this->formContacta['leidoPolitica']['valor'] = '';

        foreach ($this->formContacta as $campo => $valor) {
            $valor = trim(str_replace($this->plantilla['campos'][$campo]['valor'], "", $valor['valor']));
            $errorCampo = ($valor == '');
            $this->formContacta['campos'][$campo]['valor'] = (!$errorCampo) ?
                    $this->formContacta['campos'][$campo]['valor'] = $valor :
                    $this->formContacta['campos'][$campo]['valor'] = $this->plantilla['campos'][$campo]['valor'];
            $this->formContacta['campos'][$campo]['error'] = $errorCampo;
            $error = ($error or $errorCampo);
        }

        // Comprobar la validez ortográfica de la dirección de correo
        $mail = new Mail($this->varWeb['Pro']['mail']);
        if (!$mail->compruebaEmail($this->formContacta['campos']['Email']['valor'])) {
            $this->formContacta['campos']['Email']['error'] = 1;
            $error = true;
        }

        return !$error;
    }

}

?>
