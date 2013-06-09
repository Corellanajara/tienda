<?php

/**
 * Description of IndexController
 *
 * @author Sergio Pérez <sergio.perez@albatronic.com>
 * @copyright Informática ALBATRONIC, SL
 * @date 3-Agosto-2012
 *
 */
class IndexController extends ControllerProject {

    protected $entity = "Index";

    public function IndexAction() {

        $familias = new Familias();
        $rows = $familias->cargaCondicion("IDFamilia");
        unset($familias);
        foreach ($rows as $row) 
            $array[] = new Familias($row['IDFamilia']);
        $this->values['familias'] = $array;
        
        $articulos = new Articulos();   
        unset($array);
        $rows = $articulos->cargaCondicion("IDArticulo");
        unset($articulos);
        foreach ($rows as $row) 
            $array[] = new Articulos($row['IDArticulo']);        
        $this->values['articulos'] = $array;
        
        
        return parent::IndexAction();
    }

}

?>
