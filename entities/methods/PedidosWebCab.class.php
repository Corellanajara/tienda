<?php

/**
 * @author Sergio Perez <sergio.perez@albatronic.com>
 * @copyright INFORMATICA ALBATRONIC SL
 * @date 12.07.2014 20:29:53
 */

/**
 * @orm:Entity(ErpPedidosWebCab)
 */
class PedidosWebCab extends PedidosWebCabEntity {

    protected $Publish = '1';

    public function __toString() {
        return ($this->IDPedido) ? $this->IDPedido : '';
    }

    /**
     * Borra las líneas de pedido de la sesión en curso
     * siempre y cuando esté en estado 0 'En Tramite' 
     * 
     * @return integer $idPedido El id de pedido si existía
     */
    static function BorraLineasPedidoSesion() {

        $filtro = "sesion='{$_SESSION['IdSesion']}' AND IDEstado='0'";
        $pedido = new PedidosWebCab();
        $rows = $pedido->cargaCondicion("IDPedido", $filtro);
        unset($pedido);
        $idPedido = $rows[0]['IDPedido'];
        if ($idPedido > 0) {
            // Borrar las líneas
            $lineas = new PedidosWebLineas();
            $filtro = "IDPedido='{$idPedido}'";
            $lineas->queryDelete($filtro);
            unset($lineas);
        }

        return $idPedido;
    }

    /**
     * Cambia el estado de la cabecera y lineas
     * del PedidoWeb
     * 
     * @param type $idPedido
     * @param type $idEstado
     */
    static function cambiaEstado($idPedido, $idEstado) {

        $pedido = new PedidosWebCab();
        $pedido->queryUpdate(array("IDEstado" => $idEstado), "`IDPedido`='{$idPedido}'");
        unset($pedido);

        $lineas = new PedidosWebLineas();
        $lineas->queryUpdate(array("IDEstado" => $idEstado), "`IDPedido`='{$idPedido}'");
        unset($lineas);
    }

    public function aplicaCupon() {
        // CALCULAR DESCUENTOS SI HAY CUPON
        $cupon = $_SESSION['cupon'];
        if (($cupon['Id'] > 0) && ($this->getTotalBases() >= $cupon['ImporteMinimo'])) {
            switch ($cupon['AplicaA']) {
                case '0': //Gastos Envio
                    if ($cupon['Tipo'] === 0) {
                        //Porcentaje
                        $valor = $this->getGastosEnvio() * (1 - $cupon['Valor'] / 100);
                    } else {
                        //Importe Neto
                        $valor = $this->getGastosEnvio() - $cupon['Valor'];
                        if ($valor < 0) {
                            $valor = 0;
                        }
                    }
                    $this->setGastosEnvio($valor);
                    break;
                case '1': //Base imponible
                    if ($cupon['Tipo'] === 0) {
                        //Porcentaje
                        $valor = $this->getImporte() * (1 - $cupon['Valor'] / 100);
                    } else {
                        //Importe Neto
                        if ($cupon['Valor'] > $this->getImporte()) {
                            $valor = $this->getImporte();
                        } else {
                            $valor = $cupon['Valor'];
                        }
                    }
                    $this->setDescuento($valor);
                    break;
            }
            //echo $cupon['AplicaA'],"-----",$this->getDescuento();exit;
            $this->recalcula();
            $this->setIDCupon($_SESSION['cupon']['Id']);
            $this->save();
        }
    }

    /**
     * Recalcula los importes del pedido en base a sus lineas
     * Actualiza las propiedades de totales pero no salva los datos.
     * IMPORTANTE: Para que los calculos tomen efecto hay que llamar al método save()
     */
    public function recalcula() {

        //Fuerzo el almacen y el afiliado de las líneas de pedidos al de la cabecera del pedido
        $lineas = new PedidosWebLineas();
        $lineas->queryUpdate(
                array("IDAfiliado" => $this->IDAFiliado, "IDAlmacen" => $this->IDAlmacen), "`IDPedido`='{$this->IDPedido}'"
        );
        unset($lineas);

        //Si la version es CRISTAL calculo el eventual recargo energetico
        //if ($_SESSION['ver'] == 1)
        //    $this->calculaRecargoEnergetico();
        //Si el cliente no está sujeto a iva
        //pongo el iva a cero en las líneas para evitar que por cambio
        //de cliente se aplique indebidamente
        $cliente = new Clientes($this->IDCliente);
        if ($cliente->getIva()->getIDTipo() == '0') {
            $lineas = new PedidosWebLineas();
            $lineas->queryUpdate(
                    array("Iva" => 0, "Recargo" => 0), "`IDPedido`='{$this->IDPedido}'"
            );
            unset($lineas);
        }
        //Si el cliente no está sujeto a recargo de equivalencia
        //lo pongo a cero en las líneas para evitar que por cambio
        //de cliente se aplique indebidamente
        elseif ($cliente->getRecargoEqu()->getIDTipo() == '0') {
            $lineas = new PedidosWebLineas();
            $lineas->queryUpdate(
                    array("Recargo" => 0), "`IDPedido`='{$this->IDPedido}'"
            );
            unset($lineas);
        }
        unset($cliente);


        //SI TIENE DESCUENTO, CALCULO EL PORCENTAJE QUE SUPONE RESPECTO AL IMPORTE BRUTO
        //PARA REPERCUTUIRLO PORCENTUALMENTE A CADA BASE
        $pordcto = 0;
        if ($this->getDescuento() != 0)
            $pordcto = round(100 * ($this->getDescuento() / $this->getImporte()), 2);

        //Calcular los totales, desglosados por tipo de iva.
        $this->conecta();
        if (is_resource($this->_dbLink)) {
            $lineas = new PedidosWebLineas();
            $tableLineas = "{$lineas->getDataBaseName()}.{$lineas->getTableName()}";
            $articulos = new Articulos();
            $tableArticulos = "{$articulos->getDataBaseName()}.{$articulos->getTableName()}";
            unset($lineas);
            unset($articulos);

            $query = "select sum(Importe) as Bruto,sum(ImporteCosto) as Costo from {$tableLineas} where (IDPedido='" . $this->getIDPedido() . "')";
            $this->_em->query($query);
            $rows = $this->_em->fetchResult();
            $bruto = $rows[0]['Bruto'];

            $query = "select Iva,Recargo, sum(Importe) as Importe from {$tableLineas} where (IDPedido='" . $this->getIDPedido() . "') group by Iva,Recargo order by Iva";
            $this->_em->query($query);
            $rows = $this->_em->fetchResult();
            $totbases = 0;
            $totiva = 0;
            $totrec = 0;
            $bases = array();

            foreach ($rows as $key => $row) {
                $importe = $row['Importe'] * (1 - $pordcto / 100);
                $cuotaiva = round($importe * $row['Iva'] / 100, 2);
                $cuotarecargo = round($importe * $row['Recargo'] / 100, 2);
                $totbases += $importe;
                $totiva += $cuotaiva;
                $totrec += $cuotarecargo;

                $bases[$key] = array(
                    'b' => $importe,
                    'i' => $row['Iva'],
                    'ci' => $cuotaiva,
                    'r' => $row['Recargo'],
                    'cr' => $cuotarecargo
                );
            }

            $subtotal = $totbases + $totiva + $totrec;

            // Calcular el recargo financiero según la forma de pago
            $formaPago = new FormasPago($this->IDFP);
            $recFinanciero = $formaPago->getRecargoFinanciero();
            $cuotaRecFinanciero = $subtotal * $recFinanciero / 100;
            unset($formaPago);

            $total = $subtotal + $cuotaRecFinanciero;

            //Calcular el peso, volumen y n. de bultos de los productos inventariables
            switch ($_SESSION['ver']) {
                case '1': //Cristal
                    $columna = "MtsAl";
                case '0': //Estandar
                default:
                    $columna = "Unidades";
            }
            $em = new EntityManager($this->getConectionName());
            $query = "select sum(a.Peso*l.{$columna}) as Peso,
                        sum(a.Volumen*l.{$columna}) as Volumen,
                        sum(Unidades) as Bultos 
                      from {$tableArticulos} as a,{$tableLineas} as l
                      where (l.IDArticulo=a.IDArticulo)
                        and (a.Inventario='1')
                        and (l.IDPedido='{$this->IDPedido}')";
            $em->query($query);
            $rows = $em->fetchResult();
            $em->desConecta();

            $this->setImporte($bruto);
            $this->setBaseImponible1($bases[0]['b']);
            $this->setIva1($bases[0]['i']);
            $this->setCuotaIva1($bases[0]['ci']);
            $this->setRecargo1($bases[0]['r']);
            $this->setCuotaRecargo1($bases[0]['cr']);
            $this->setBaseImponible2($bases[1]['b']);
            $this->setIva2($bases[1]['i']);
            $this->setCuotaIva2($bases[1]['ci']);
            $this->setRecargo2($bases[1]['r']);
            $this->setCuotaRecargo2($bases[1]['cr']);
            $this->setBaseImponible3($bases[2]['b']);
            $this->setIva3($bases[2]['i']);
            $this->setCuotaIva3($bases[2]['ci']);
            $this->setRecargo3($bases[2]['r']);
            $this->setCuotaRecargo3($bases[2]['cr']);
            $this->setTotalBases($totbases);
            $this->setTotalIva($totiva);
            $this->setTotalRecargo($totrec);
            $this->setRecargoFinanciero($recFinanciero);
            $this->setCuotaRecargoFinanciero($cuotaRecFinanciero);
            $this->setTotal($total);
            if ($this->Peso == 0)
                $this->setPeso($rows[0]['Peso']);
            if ($this->Volumen == 0)
                $this->setVolumen($rows[0]['Volumen']);
            if ($this->Bultos == 0)
                $this->setBultos($rows[0]['Bultos']);
        }
    }

    /**
     * Devuelve array de objetos líneas de pedidos Web
     * 
     * @return \PedidosWebLineas Array de objetos lineas de pedidos Web
     */
    public function getLineas() {

        $array = array();

        $lineas = new PedidosWebLineas();
        $rows = $lineas->cargaCondicion("IDLinea", "IDPedido='{$this->IDPedido}'");
        foreach ($rows as $row) {
            $array[] = new PedidosWebLineas($row['IDLinea']);
        }
        unset($lineas);

        return $array;
    }

    /**
     * Devuelve el número de productos que hay en
     * las líneas del pedido
     * 
     * @return int
     */
    public function getNItems() {

        $lineas = new PedidosWebLineas();
        $row = $lineas->cargaCondicion("sum(Unidades) nItems", "IDPedido='{$this->IDPedido}'");

        return ($row[0]['nItems'] !== '') ? $row[0]['nItems'] : 0;
    }

    /**
     * Envía por mail el pedido $idPedido al cliente y CCo al email
     * de notificación de pedidos indicado en la varEnv['Pro']['shop']['eMailPedidos']
     * 
     * Utiliza la plantilla 'emailPedido' en el idioma en curso
     * 
     * @param integer $idPedido El número de pedido
     * @return integer El número de envío realizados. Cero en caso de error.
     */
    static function enviaCorreos($idPedido) {

        $varEnv = CpanVariables::getVariables("Env", "Pro");
        $varWeb = CpanVariables::getVariables("Web", "Pro");

        // Reemplazar los valores en la plantilla 'emailPedido'
        $pedido = new PedidosWebCab($idPedido);
        $cliente = $pedido->getIDCliente();
        $sustituir = array(
            'webName' => $varWeb['mail']['from_name'],
            'idPedido' => $pedido->getIDPedido(),
            'razonSocial' => $cliente->getRazonSocial(),
            'fecha' => $pedido->getFecha(),
            'total' => $pedido->getTotal(),
            'gastosEnvio' => $pedido->getGastosEnvio(),
            'totalPagar' => $pedido->getTotal() + $pedido->getGastosEnvio(),
            'zonaEnvio' => $pedido->getIDZonaEnvio()->getZona(),
            'formaPago' => $pedido->getIDFP()->getDescripcion(),
            'formaEnvio' => $pedido->getIDAgencia()->getAgencia(),
            'envolver' => $pedido->getEnvolver()->getDescripcion(),
            'nombreFactura' => $cliente->getRazonSocial(),
            'direccionFactura' => $cliente->getDireccion(),
            'localidadFactura' => $cliente->getIDPoblacion(),
            'codigoPostalFactura' => $cliente->getCodigoPostal(),
            'provinciaFactura' => $cliente->getIDProvincia()->getProvincia(),
            'paisFactura' => $cliente->getIDPais()->getPais(),
            'emailFactura' => $cliente->getEMail(),
            'telefonoFactura' => $cliente->getTelefono(),
            'faxFactura' => $cliente->getFax(),
            'cifFactura' => $cliente->getCif(),
            'observaciones' => $pedido->getObservaciones(),
        );
        foreach ($pedido->getLineas() as $linea) {
            $sustituir['LINEAS'][] = array(
                'codigo' => $linea->getIDArticulo()->getCodigo(),
                'descripcion' => $linea->getDescripcion(),
                'unidades' => $linea->getUnidades(),
                'precio' => $linea->getPrecio(),
            );
        }
        $plantilla = new CpanPlantillas();
        $texto = $plantilla->getPlantilla("", "emailPedido", $sustituir);
        unset($plantilla);

        // Enviar correo al cliente y con CCo al email de pedidos
        $mailer = new Mail($varWeb['mail']);
        $ok = $mailer->send(
                $cliente->getEmail(), $varWeb['mail']['from'], $varWeb['mail']['from_name'], "", $varEnv['shop']['eMailPedidos'], "Resguardo de Pedido", $texto, array()
        );

        return $ok;
    }

}
