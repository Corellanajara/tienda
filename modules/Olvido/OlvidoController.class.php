<?php

/**
 * Description of IndexController
 *
 * @author Sergio Pérez <sergio.perez@albatronic.com>
 * @copyright ÁRTICO ESTUDIO
 * @date 06-nov-2012
 *
 */
class OlvidoController extends ControllerProject {

    protected $entity = "Olvido";

    public function NuevaPasswordAction() {

        $user = new PcaeUsuarios();
        $usuario = $user->find("Email", $this->request['email']);
        unset($user);

        if ($usuario->getId() != '') {
            $passw = new Password(6);
            $nueva = $passw->genera();
            unset($passw);
            $usuario->setPassword(md5($nueva . $this->getSemilla()));
            $usuario->save();

            $config = sfYaml::load('config/config.yml');

            $to = $usuario->getEmail();
            $subject = " Password regenerada";
            $message = "<p>" . $config['config']['app']['name'] . "</p><p>Le ha sido generada una contrase&ntilde;a nueva de acceso al sistema.</p>" .
                    "<p>La contrase&ntilde;a nueva es: " . $nueva . "</p>";

            $mail = new Mail();
            $this->values['mensaje'][] = $mail->send($to, '', 'Administrador ' . $config['config']['app']['name'], $subject, $message, array());
            unset($mail);

            $template = $this->entity . "/index.html.twig";
        } else {
            $this->values['mensaje'][] = "Este e-mail no figura en nuestro sistema.";
            $this->values['mensaje'][] = "Por favor introduzca uno correcto.";
            $template = $this->entity . "/index.html.twig";
        }

        unset($usuario);

        return array(
            'template' => $template,
            'values' => $this->values
        );
    }

}

?>
