<?php

/**
 * Description of ListadoController
 *
 * @author Sergio Pérez <sergio.perez@albatronic.com>
 * @copyright Informática ALBATRONIC, SL
 * @date 28-oct-2013
 *
 */
class ListadoController extends ControllerProject {

    protected $entity = "Listado";
    protected $ordenes = array(
        array('Id' => 'SortOrder ASC', 'Value' => 'Orden a-z'),
        array('Id' => 'Descripcion ASC', 'Value' => 'Nombre a-z'),
        array('Id' => 'Descripcion DESC', 'Value' => 'Nombre z-a'),
        array('Id' => 'Pvp ASC', 'Value' => 'Lo más barato'),
        array('Id' => 'Pvp DESC', 'Value' => 'Lo más caro'),
        array('Id' => 'PublishedAt DESC', 'Value' => 'Lo nuevo'),
    );
    protected $articulosPorPagina = array(
        array('Id' => '10', 'Value' => '10'),
        array('Id' => '20', 'Value' => '20'),
        array('Id' => '30', 'Value' => '30'),
        array('Id' => '0', 'Value' => 'Todos'),
    );

    public function IndexAction() {

        if ($this->request['linkBy']) {
            // Viene de la paginación
            $pagina = $this->request['pagina'];
            $orden = $this->request['orden'];
            $itemsPorPagina = $this->request['itemsPorPagina'];
            $texto = $this->request['linkBy'];
        } else {
            // Viene del formulario de búsqueda
            $variables = CpanVariables::getVariables('Web', 'Mod', 'Articulos');
            $itemsPorPagina = $variables['especificas']['NumArticulosListado'];
            $orden = $variables['especificas']['CriterioOrden'];
            $pagina = 1;
            $texto = $this->request['textoBusqueda'];
        }

        $filtro = "(Vigente='1') and (Descripcion like '%{$texto}%')";

        Paginacion::paginar("Articulos", $filtro, $orden, $pagina, $itemsPorPagina);

        foreach (Paginacion::getRows() as $row)
            $articulos[] = new Articulos($row['IDArticulo']);

        $arrayPaginacion = array(
            'articulos' => $articulos,
            'paginacion' => Paginacion::getPaginacion(),
        );

        $this->values['articulos'] = $arrayPaginacion;
        $this->values['textoBusqueda'] = $texto;
        $this->values['orden'] = $orden;
        $this->values['itemsPorPagina'] = $itemsPorPagina;
        $this->values['ordenes'] = $this->ordenes;
        $this->values['articulosPorPagina'] = $this->articulosPorPagina;

        return parent::IndexAction();
    }

}

?>
