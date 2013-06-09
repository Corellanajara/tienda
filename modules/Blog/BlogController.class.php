<?php

/**
 * Description of IndexController
 *
 * @author Sergio Pérez <sergio.perez@albatronic.com>
 * @copyright Informática Albatronic, SL
 * @date 06-nov-2012
 *
 */
class BlogController extends ControllerProject {

    protected $entity = "Blog";

    public function IndexAction() {

        switch ($this->request['METHOD']) {
            case 'GET':
                $this->values['blog'] = Blog::getArticulos(0, false, 1, 0, 2);
                break;
            case 'POST':
                if ($this->request['texto']) {
                    $this->values['blog'] = Blog::getArticulosBusqueda($this->request['texto'], false, $this->request['pagina'], 0, 2);
                    $this->values['blog']['texto'] = $this->request['texto'];
                } elseif ($this->request['anio']) {
                    $anio = $this->request['anio'];
                    $mes = $this->request['mes'];
                    if ($mes < 1 or $mes > 12)
                        $mes = date('m');
                    $meses = new Meses($mes);
                    $this->values['blog'] = Blog::getArticulosMes($anio, $mes, false, $this->request['pagina'], 0, 2);
                    $this->values['blog']['anio'] = $anio;
                    $this->values['blog']['mes'] = $mes;
                    $this->values['blog']['textoMes'] = $meses->getDescripcion();
                    unset($meses);
                } else
                    $this->values['blog'] = Blog::getArticulos(0, false, $this->request['pagina'], 0, 2);
                break;
        }

        $this->values['blog']['categorias'] = Blog::getSecciones();
        $this->values['postsPorMes'] = Blog::getArticulosMeses(12);
        $this->values['testimonios'] = Contenidos::getContenidosSeccion($this->varWeb['Pro']['staticContents'][1]);

        return parent::IndexAction();
    }



}

?>
