<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class ErpCarrito {

    static $errores;
    static $alertas;

    /**
     * Devuelve array con dos elementos:
     * 
     * lineas => array de objetos líneas de carrito
     * totales => array('Unidades,'Importe')
     * 
     * @return array
     */
    static function getCarrito() {

        $carrito = new Carrito();

        $lineas = array();

        $filtro = "sesion='{$_SESSION['IdSesion']}'";
        $rows = $carrito->cargaCondicion("Id", $filtro, "Id ASC");
        foreach ($rows as $row) {
            $lineas[] = self::getLinea($row['Id']);
        }
        unset($carrito);

        return array("lineas" => $lineas, "totales" => self::getTotales());
    }

    /**
     * Devuele el objeto linea del carrito en curso cuyo id es $idLinea
     * 
     * @param integer $idLinea
     * @return \Carrito
     */
    static function getLinea($idLinea) {
        return new Carrito($idLinea);
    }

    /**
     * Devuelve array con los ids de los artículos del carrito
     * @return array
     */
    static function getArrayIDSArticulos() {

        $array = array();

        $filtro = "sesion='{$_SESSION['IdSesion']}'";
        $carrito = new Carrito();
        $rows = $carrito->cargaCondicion("IDArticulo", $filtro, "Id ASC");
        unset($carrito);

        foreach ($rows as $row) {
            $array[$row['IDArticulo']] = $row['IDArticulo'];
        }

        return $array;
    }

    /**
     * Añade o incrementa un artículo al carrito asociado
     * a la sesión en curso
     * 
     * @param integer $idArticulo El id del artículo
     * @param integer $unidades Las unidades de producto
     * @return integer El id de la línea creada
     */
    static function addProduct($idArticulo, $unidades = 1) {

        $unidades = ($unidades < 1) ? 1 : $unidades;

        $filtro = "sesion='{$_SESSION['IdSesion']}' and IDArticulo='{$idArticulo}'";
        $carrito = new Carrito();
        $rows = $carrito->cargaCondicion("Id", $filtro);
        if (isset($rows[0]['Id'])) {
            $carrito = new Carrito($rows[0]['Id']);
            $articulo = new Articulos($idArticulo);
            $precios = $articulo->cotizarWeb($unidades);
            $idPromocion = (is_object($precios['Promocion'])) ? $precios['Promocion']->getIDPromocion() : 0;

            $carrito->setUnidades($carrito->getUnidades() + $unidades);
            $carrito->setPrecio($precios['Cotizacion']['Precio']);
            $carrito->setDescuento($precios['Cotizacion']['Descuento']);
            $carrito->setImporte($carrito->getUnidades() * $carrito->getPrecio() * (1 - $carrito->getDescuento() / 100));
            $carrito->setIDPromocion($idPromocion);
            $id = ($carrito->save()) ? $rows[0]['Id'] : 0;
            self::$errores = $carrito->getErrores();
            self::$alertas = $carrito->getAlertas();
        } else {
            $articulo = new Articulos($idArticulo);
            $precios = $articulo->cotizarWeb($unidades);
            $idPromocion = (is_object($precios['Promocion'])) ? $precios['Promocion']->getIDPromocion() : 0;
            $ivaIncluido = ($_SESSION['varEnv']['Pro']['shop']['ivaIncluido']) ? 1 : 0;

            $carrito->setsesion($_SESSION['IdSesion']);
            $carrito->setIpOrigen($_SERVER['REMOTE_ADDR']);
            $carrito->setUserAgent($_SERVER['HTTP_USER_AGENT']);
            $carrito->setIDArticulo($idArticulo);
            $carrito->setDescripcion($articulo->getDescripcion());
            $carrito->setUnidades($unidades);
            $carrito->setUnidadMedida($articulo->getUnidadMedida("UMV"));
            $carrito->setPrecio($precios['Cotizacion']['Precio']);
            $carrito->setDescuento($precios['Cotizacion']['Descuento']);
            $carrito->setImporte($carrito->getUnidades() * $carrito->getPrecio() * (1 - $carrito->getDescuento() / 100));
            $carrito->setIva($articulo->getIDIva()->getIva());
            $carrito->setRecargo($articulo->getIDIva()->getRecargo());
            $carrito->setEstado(0);
            $carrito->setIDPromocion($idPromocion);
            $carrito->setIvaIncluido($ivaIncluido);
            $id = $carrito->create();
            self::$errores = $carrito->getErrores();
            self::$alertas = $carrito->getAlertas();
            unset($articulo);
        }
        unset($carrito);

        return $id;
    }

    /**
     * Borrar una línea del carrito de la sesion en curso
     * 
     * @param integer $idLinea El id de la linea
     * @return boolean True se el borrado ha sido ok
     */
    static function removeProduct($idLinea) {

        $carrito = new Carrito();
        $filtro = "sesion='{$_SESSION['IdSesion']}' and Id='{$idLinea}'";
        $ok = ($carrito->queryDelete($filtro) > 0);
        unset($carrito);

        return $ok;
    }

    /**
     * Actualiza la línea $idLinea del carrito en curso con las
     * unidades $unidades de producto, actualizando también el importe de la línea
     * 
     * @param integer $idLinea El id de la línea a actualizar
     * @param decimal $unidades El número de unidades de producto a actulizar
     * @return integer El id de la línea actualizada
     */
    static function updateProduct($idLinea, $unidades) {

        $carrito = new Carrito($idLinea);
        $idLinea = $carrito->getId();
        if ($idLinea) {
            $carrito->setUnidades($unidades);
            $carrito->setImporte($carrito->getPrecio() * $unidades * (1 - $carrito->getDescuento() / 100));
            $carrito->save();
            self::$errores = $carrito->getErrores();
            self::$alertas = $carrito->getAlertas();
        }

        return $idLinea;
    }

    /**
     * Devuelve array con los totales del carrito
     * de la sesion en curso.
     * 
     * El array tiene dos elementos: Unidades, Importe
     * 
     * @return array Array con los totales
     */
    static function getTotales() {

        $carrito = new Carrito();
        $filtro = "sesion='{$_SESSION['IdSesion']}'";
        $rows = $carrito->cargaCondicion("sum(Unidades) as Unidades, sum(Importe) as Importe", $filtro);

        foreach ($_SESSION['carrito'] as $key => $value) {
            $rows[0][$key] = $value;
        }
        $rows[0]['total'] = $rows[0]['Importe'] + $rows[0]['gastosEnvio'];

        return $rows[0];
    }

    /**
     * Crea pedido web en base a lo que hay
     * en el carrito de la sesion en curso.
     * 
     * Si ya hubiera un pedido asociado a esa sesion,
     * lo borra y lo crea de nuevo
     * 
     * @return integer $idPedido
     */
    static function creaPedido() {

        // Borra las posibles líneas de pedido que estén sin confirmar
        $idPedido = PedidosWebCab::BorraLineasPedidoSesion();
        $cliente = new Clientes($_SESSION['usuarioWeb']['Id']);
        $direccionesDeEntrega = $cliente->getDireccionesEntrega();

        if ($idPedido > 0) {
            // Ya existía, lo actualizo
            $pedido = new PedidosWebCab($idPedido);
            $pedido->setsesion($_SESSION['IdSesion']);
            $pedido->setFecha(date('Y-m-d'));
            $pedido->setIDCliente($_SESSION['usuarioWeb']['Id']);
            $pedido->setIDDirec($direccionesDeEntrega[0]->getIDDirec());
            $pedido->setIDCupon(0);
            $pedido->setDescuento(0);
            $pedido->setIDZonaEnvio($_SESSION['carrito']['zonaEnvio']);
            $pedido->setIDFP($_SESSION['carrito']['formaPago']);
            $pedido->setIDAgencia($_SESSION['carrito']['formaEnvio']);
            $pedido->setGastosEnvio($_SESSION['carrito']['gastosEnvio']);
            $pedido->setPlazoEntrega($_SESSION['carrito']['plazoEntrega']);
            if ($_SESSION['idAfiliado'] > 0) {
                $pedido->setIDAfiliado($_SESSION['idAfiliado']);
            }
            if ($_SESSION['agente']['Id'] > 0) {
                $pedido->setIDAgente($_SESSION['agente']['Id']);
            }
            $pedido->save();
        } else {
            // No existía, lo creo
            $pedido = new PedidosWebCab();
            $pedido->setsesion($_SESSION['IdSesion']);
            $pedido->setFecha(date('Y-m-d'));
            $pedido->setIDCliente($_SESSION['usuarioWeb']['Id']);
            $pedido->setIDDirec($direccionesDeEntrega[0]->getIDDirec());
            $pedido->setIDZonaEnvio($_SESSION['carrito']['zonaEnvio']);
            $pedido->setIDFP($_SESSION['carrito']['formaPago']);
            $pedido->setIDAgencia($_SESSION['carrito']['formaEnvio']);
            $pedido->setGastosEnvio($_SESSION['carrito']['gastosEnvio']);
            $pedido->setPlazoEntrega($_SESSION['carrito']['plazoEntrega']);
            if ($_SESSION['idAfiliado'] > 0) {
                $pedido->setIDAfiliado($_SESSION['idAfiliado']);
            }
            if ($_SESSION['agente']['Id'] > 0) {
                $pedido->setIDAgente($_SESSION['agente']['Id']);
            }
            $idPedido = $pedido->create();
        }

        // Crear las líneas de pedido con lo que haya en el carrito
        //print_r($pedido->getErrores());
        if ($idPedido > 0) {
            // Crear las líneas
            $carrito = new Carrito();
            $filtro = "sesion='{$_SESSION['IdSesion']}'";
            $rows = $carrito->cargaCondicion("*", $filtro, "Id ASC");
            unset($carrito);
            foreach ($rows as $row) {
                if ($row['IvaIncluido'] == '1') {
                    $row['Precio'] = $row['Precio'] / (1 + $row['Iva'] / 100);
                    $row['Importe'] = $row['Importe'] / (1 + $row['Iva'] / 100);
                }
                $linea = new PedidosWebLineas();
                $linea->setIDPedido($idPedido);
                $linea->setIDArticulo($row['IDArticulo']);
                $linea->setDescripcion($row['Descripcion']);
                $linea->setUnidades($row['Unidades']);
                $linea->setUnidadMedida($row['UnidadMedida']);
                $linea->setPrecio($row['Precio']);
                $linea->setDescuento($row['Descuento']);
                $linea->setImporte($row['Importe']);
                $linea->setIva($row['Iva']);
                $linea->setRecargo($row['Recargo']);
                if ($_SESSION['agente']['Id'] > 0) {
                    $linea->setIDAgente($_SESSION['agente']['Id']);
                }
                $linea->setIDEstado(0);
                $linea->setIDPromocion($row['IDPromocion']);
                $linea->create();
            }
            // Totalizar el pedido
            $pedido = new PedidosWebCab($idPedido);
            $pedido->recalcula();
            $pedido->save();

            $pedido->aplicaCupon();
        }

        return $idPedido;
    }

    /**
     * Vacia el carrito de la sesion en curso
     * 
     * @return boolean True si éxito
     */
    static function vaciaCarrito() {

        $carrito = new Carrito();
        $filtro = "sesion='{$_SESSION['IdSesion']}'";
        $ok = ($carrito->queryDelete($filtro) > 0);
        unset($carrito);

        return $ok;
    }

    static function getErrores() {
        return self::$errores;
    }

    static function getAlertas() {
        return self::$alertas;
    }

}
