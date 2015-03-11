<?php

class FabricantesController extends ControllerProject {
    
    protected $controller = "Fabricantes";
    
    
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

        switch ($this->request['METHOD']) {
            case 'GET':
                $variables = CpanVariables::getVariables('Web', 'Mod', 'Articulos');
                $itemsPorPagina = $variables['especificas']['NumArticulosListado'];
                $orden = $variables['especificas']['CriterioOrden'];
                $idFabricante = $this->request['IdEntity'];
                $pagina = 1;
                break;
            case 'POST':
                $pagina = $this->request['pagina'];
                $idFabricante = $this->request['linkBy'];
                $orden = $this->request['orden'];
                $itemsPorPagina = $this->request['itemsPorPagina'];
                break;
        }

        $this->values['destacados'] = ErpArticulos::getArticulosZona($this->controller, 1,"IDFabricante='{$idFabricante}'");          
        $this->values['fabricante'] = ErpMarcas::getObjetoMarca($idFabricante);
        $this->values['articulos'] = ErpMarcas::getArticulosPaginados($idFabricante, $orden, $pagina, $itemsPorPagina);
        $this->values['orden'] = $orden;
        $this->values['itemsPorPagina'] = $itemsPorPagina;
        $this->values['ordenes'] = $this->ordenes;
        $this->values['articulosPorPagina'] = $this->articulosPorPagina;
        
        return parent::IndexAction();
    }
}
?>
