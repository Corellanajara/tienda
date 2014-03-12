<?php

/**
 * @author Sergio Perez <sergio.perez@albatronic.com>
 * @copyright INFORMATICA ALBATRONIC SL
 * @date 08.02.2014 19:37:17
 */

/**
 * @orm:Entity(ErpCarrito)
 */
class Carrito extends CarritoEntity {

    public function __toString() {
        return $this->getId();
    }

    public function create() {
        $this->Publish = 1;
        return parent::create();
    }

}

?>