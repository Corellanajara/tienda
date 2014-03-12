<?php

/**
 * Gestión de Favoritos de la web
 *
 * @author Informática ALBATRONIC, SL <sergio.perez@albatronic.com>
 * @since 09-mar-2014
 */
class FavoritosController extends ControllerProject {

    protected $entity = "Favoritos";

    public function IndexAction() {

        $this->values['favoritos'] = ErpFavoritosWeb::getFavoritos();

        return parent::IndexAction();
    }

    public function AddAction() {

        ErpFavoritosWeb::add($this->request['idArticulo']);

        return $this->IndexAction();
    }

    public function RemoveAction() {

        ErpFavoritosWeb::remove($this->request['idArticulo']);

        return $this->IndexAction();        
    }

}
