<?php

/**
 * Description of FormasPago
 *
 * @author Sergio Pérez <sergio.perez@albatronic.com>
 * @copyright Informática ALBATRONIC, SL
 * @since 04-nov-2011
 *
 */
class FormasPago extends FormasPagoEntity {

    public function __toString() {
        return $this->getDescripcion();
    }

    public function fetchAllWeb() {
        $this->conecta();

        if (is_resource($this->_dbLink)) {
            $query = "SELECT " . $this->getPrimaryKeyName() . " as Id, Descripcion as Value FROM `{$this->_dataBaseName}`.`{$this->_tableName}` WHERE (Deleted = '0') AND (Web='1') ORDER BY Descripcion ASC";
            $this->_em->query($query);
            $rows = $this->_em->fetchResult();
            $this->setStatus($this->_em->numRows());
        }

        return $rows;
    }
}

?>
