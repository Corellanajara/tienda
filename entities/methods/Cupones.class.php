<?php

/**
 * @author Sergio Perez <sergio.perez@albatronic.com>
 * @copyright INFORMATICA ALBATRONIC SL
 * @date 12.04.2014 18:24:51
 */

/**
 * @orm:Entity(ErpCupones)
 */
class Cupones extends CuponesEntity {

    protected $_mensajeCupon;
    
    public function __toString() {
        return ($this->Cupon) ? $this->Cupon : '';
    }

    /**
     * Valida la vigencia del cupón $cupon
     * 
     * Si es válido, el mensaje explicativo del cupón se
     * recoge con getMensajeCupon()
     * 
     * @param type $cupon
     * @return boolean TRUE si está vigente
     */
    public function validaCupon($cupon) {

        $hoy = date("Y-m-d");

        $cupones = new $this($cupon);
        $ok = ($cupones->getPublish()->getIDTipo() == '1' && $cupones->getActiveFrom('aaaammdd') <= "{$hoy}" && $cupones->getActiveTo('aaaammdd') >= "{$hoy}" && ($cupones->getLimiteUsos() == 0 || $cupones->getNumeroUsos() < $cupones->getLimiteUsos()));
        if ($ok) {
            $mensaje = $cupones->getValor() . " ";
            $mensaje .= ($cupones->getTipo()->getIDTipo() === '0') ? "%" : "€";
            $mensaje .= " de descuento aplicables a " . $cupones->getAplicaA()->getDescripcion();
            if ($cupones->getImporteMinimo()>0) {
                $mensaje .= " para un pedido mínimo de " . $cupones->getImporteMinimo() ." €";
            }
            $this->_mensajeCupon = $mensaje;
        } else {
            $this->_mensajeCupon = "El cupón no es válido";
        }
        
        unset($cupones);
        
        return $ok;
    }

    public function getMensajeCupon() {
        return $this->_mensajeCupon;
    }
}
