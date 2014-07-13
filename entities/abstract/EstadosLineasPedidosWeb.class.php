<?php
/**
 * Define los estados de las líneas de pedidos web
 *
 * @author Sergio Pérez <sergio.perez@albatronic.com>
 * @copyright Informática ALBATRONIC, SL
 * @since 12-jul-2014
 *
 */

class EstadosLineasPedidosWeb extends Tipos {

    protected $tipos = array(
        array('Id' => '0', 'Value' => 'Pendiente'),
        array('Id' => '1', 'Value' => 'Albaranado'),        
    );
}
