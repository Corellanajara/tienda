<?php

/**
 * Clase para envíos de correos electrónicos
 * 
 * Está implementado para ser independiente del motor de envíos
 * Si el constructor recibe un objeto mailer, lo utiliza, en caso contrario
 * lo instancia en base a los parametros indicados en el nodo 'mailer'
 * del archivo de configuracion 'config/config.yml' donde por defecto
 * se utiliza la clase PHPMailer_v2.0.0
 *
 * Métodos Públicos:
 *
 *  send($para,$de,$deNombre,$asunto,$mensaje, array $adjuntos): envía el email
 *  compruebaEmail($email): comprueba la validez sintáctica del $email
 * 
 * @author Sergio Perez. <sergio.perez@albatronic.com>
 * @copyright Informática ALBATRONIC, SL
 * @since 29.05.2011
 */
class Mail {

    private $mailer;
    private $mensaje = null;

    public function __construct($mailer = '') {

        if (is_object($mailer))
            $this->mailer = $mailer;
        else {
            require_once 'bin/Swift-5.0.0/lib/swift_required.php';

            // Create the Transport
            $transport = Swift_SmtpTransport::newInstance($mailer['host'], $mailer['port'])
                    ->setUsername($mailer['user_name'])
                    ->setPassword($mailer['password'])
            ;

            // Create the Mailer using your created Transport
            $this->mailer = Swift_Mailer::newInstance($transport);
        }
    }

    /**
     * Envia un email
     *
     * @param email_adress $para La dirección del destinatario
     * @param email_adress $de La dirección del remitente
     * @param string $deNombre El nombre del remitente
     * @param string $conCopia Destinatarios con copia
     * @param string $conCopiaOculta Destinatarios con copia oculta
     * @param string $asunto El texto del asunto
     * @param string $mensaje El texto de mensaje
     * @param array $adjuntos Array con los nombres de los ficheros adjuntos
     * @return integer El número de envío realizados. Cero en caso de error.
     */
    public function send($para, $de, $deNombre, $conCopia, $conCopiaOculta, $asunto, $mensaje, array $adjuntos) {

        if ($this->valida($para, $mensaje)) {

            if (trim($de) != '') {
                $this->mailer->From = $de;
            }
            if (trim($deNombre) != '') {
                $this->mailer->FromName = $deNombre;
            }

            // Create a message
            $message = Swift_Message::newInstance($asunto)
                    ->setContentType('text/html')
                    ->setFrom(array($de => $deNombre))
                    ->setTo(array($para))
                    ->setReadReceiptTo($de)
                    ->setPriority(2)
                    ->setBody($mensaje);
            if ($conCopia) {
                $message->setCc(array($conCopia));
            }
            if ($conCopiaOculta) {
                $message->setBcc(array($conCopiaOculta));
            }

            foreach ($adjuntos as $adjunto) {
                $message->attach(Swift_Attachment::fromPath($adjunto));
            }

            $ok = $this->mailer->send($message);
        }
        return $ok;
    }

    /**
     * Comprueba que los parámetros sean válidos
     * Devuelve TRUE si es correcto
     *
     * @param email_address $email
     * @param string $contenido
     * @return boolean TRUE si es correcto
     */
    private function valida($email, $contenido) {

        $this->compruebaEmail($email);

        if (trim($contenido) == "") {
            $this->mensaje = "No ha indicado ningun contenido.";
        }

        return ($this->mensaje == null);
    }

    /**
     * Comprueba la validez sintáctica de un email
     * Devuelve true o false
     *
     * @param string $email El correo electrónico
     * @return boolean
     */
    public function compruebaEmail($email) {

        $ok = Swift_Validate::email($email);
        if (!$ok) {
            $this->mensaje[] = "La direccion email indicada no es valida";
        }

        return (count($this->mensaje) == 0);
    }

    public function getError() {
        return $this->mensaje;
    }

}
