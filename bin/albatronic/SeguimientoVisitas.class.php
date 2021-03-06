<?php

/**
 * CLASE ESTATICA PARA EL SEGUIMIENTO DE LAS VISITAS
 * DE LOS CLIENTES DE LA WEB
 *
 * @author Sergio Pérez <sergio.perez@albatronic.com>
 * @copyright (c) Informática ALBATRONIC, SL
 * @version 1.0 14-jul-2014
 */
class SeguimientoVisitas {

    /**
     * Anota visitas distintas para la misma sesión respecto al
     * visitante en curso y la entidad e idEntidad indicadas
     * 
     * @param string $entidad Entidad Visitada
     * @param string $idEntidad ID Entidad Visitada
     */
    static function setVisita($entidad, $idEntidad) {

        $idCliente = ($_SESSION['usuarioWeb']['Id'] > 0) ?
                $_SESSION['usuarioWeb']['Id'] :
                $_SESSION['IdSesion'];

        $relacion = new CpanRelaciones();
        $filtro = "EntidadOrigen='Clientes' AND "
                . "IdEntidadOrigen='{$idCliente}' AND "
                . "EntidadDestino='{$entidad}' AND "
                . "IdEntidadDestino='{$idEntidad}' AND "
                . "Observations='{$_SESSION['IdSesion']}'";
        $row = $relacion->cargaCondicion('Id', $filtro);
        if (!isset($row[0]['Id'])) {
            // En esta sesión no ha visitado la entidad-idEntidad
            $relacion->setEntidadOrigen('Clientes');
            $relacion->setIdEntidadOrigen($idCliente);
            $relacion->setEntidadDestino($entidad);
            $relacion->setIdEntidadDestino($idEntidad);
            $relacion->setObservations($_SESSION['IdSesion']);
            $relacion->setPublish(1);
            $relacion->create();
        }
        unset($relacion);
    }

    /**
     * Devuelve array de objetos $entidadVisitada que han sido visitados
     * por el usuario en la sesión en curso
     * 
     * @param string $entidadVisitada EL nombre de la entidad visitada. Opcional. Por defecto Articulos
     * @param integer $nVisitas El número de visitas a devolver. Opcional. Por defecto 5
     * @param boolean $sinCarrito Si true no se tienen en cuenta los artículos visitados que ya estén el el carrito
     * @return array Array de objetos \entidadVisitada
     */
    static function getVisitasSesion($entidadVisitada = 'Articulos', $nVisitas = 5, $sinCarrito = true) {

        $array = array();

        if ($nVisitas <= 0) {
            $nVisitas = 5;
        }

        $idCliente = ($_SESSION['usuarioWeb']['Id'] > 0) ?
                $_SESSION['usuarioWeb']['Id'] :
                $_SESSION['IdSesion'];

        $filtro = "EntidadOrigen='Clientes' AND "
                . "IDEntidadOrigen='{$idCliente}' AND "
                . "EntidadDestino='{$entidadVisitada}' AND "
                . "Observations='{$_SESSION['IdSesion']}'";
        $visitas = new CpanRelaciones();
        $rows = $visitas->cargaCondicion("IDEntidadDestino Id", $filtro, "CreatedAt DESC");
        unset($visitas);

        if ($entidadVisitada === 'Articulos' && $sinCarrito) {
            $articulosCarrito = ErpCarrito::getArrayIDSArticulos();
        }

        foreach ($rows as $row) {
            $objeto = new $entidadVisitada($row['Id']);
            if ($entidadVisitada === 'Articulos' && $sinCarrito) {
                if ( ! in_array($row['Id'],$articulosCarrito) ) {
                    $array[] = $objeto;
                }
            } else {
                $array[] = $objeto;
            }
            if (count($array) == $nVisitas) {
                break;
            }
        }

        return $array;
    }

    /**
     * Devuelve array de objetos $entidadVisitada que han sido visitados
     * por el usuario en curso (en todas sus sesiones)
     * 
     * @param string $entidadVisitada EL nombre de la entidad visitada. Opcional. Por defecto Articulos
     * @param integer $nVisitas El número de visitas a devolver. Opcional. Por defecto 15
     * @return array Array de objetos \entidadVisitada
     */
    static function getVisitasUsuario($entidadVisitada = 'Articulos', $nVisitas = 15) {

        $array = array();

        $limit = ($nVisitas <= 0) ? "limit 5" : "limit {$nVisitas}";

        $idCliente = ($_SESSION['usuarioWeb']['Id'] > 0) ?
                $_SESSION['usuarioWeb']['Id'] :
                $_SESSION['IdSesion'];

        $filtro = "EntidadOrigen='Clientes' AND "
                . "IDEntidadOrigen='{$idCliente}' AND "
                . "EntidadDestino='{$entidadVisitada}'";
        $visitas = new CpanRelaciones();
        $rows = $visitas->cargaCondicion("IDEntidadDestino Id", $filtro, "CreatedAt ASC {$limit}");
        unset($visitas);

        foreach ($rows as $row) {
            $array[] = new $entidadVisitada($row['Id']);
        }

        return $array;
    }

    /**
     * Sustituye el valor de Id sesion por el del id del cliente
     * en la columna IDEntidadOrigen del control de visitas
     */
    static function cambiaVisitasUsuario() {

        $relacion = new CpanRelaciones();
        $relacion->queryUpdate(array('IDEntidadOrigen' => $_SESSION['usuarioWeb']['Id']), "EntidadOrigen='Clientes' AND IDEntidadOrigen='{$_SESSION['IdSesion']}'");
        unset($relacion);
    }

}
