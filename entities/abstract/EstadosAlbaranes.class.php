<?php
/**
 * Define los estados de Albaranes
 *
 * @author Sergio Pérez <sergio.perez@albatronic.com>
 * @copyright Informática ALBATRONIC, SL
 * @since 19-nov-2011
 *
 */

class EstadosAlbaranes extends Tipos {

    protected $tipos = array(
        array('Id' => '0', 'Value' => 'Pte. Confirmar'),
        array('Id' => '1', 'Value' => 'Confirmado'),
        array('Id' => '2', 'Value' => 'Expedido'),
        array('Id' => '3', 'Value' => 'Facturado'),
    );
}
?>