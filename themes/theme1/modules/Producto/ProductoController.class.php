<?php

/**
 * Description of ProductoController
 *
 * @author Sergio Pérez <sergio.perez@albatronic.com>
 * @copyright ÁRTICO ESTUDIO
 * @date 06-nov-2012
 *
 */
class ProductoController extends ControllerProject {

    protected $entity = "Producto";
    var $formContacta = array();
    var $formDenuncia = array();
    protected $varEnvMod = array();
    protected $varWebMod = array();
    protected $errores = array();

    public function IndexAction() {

        $this->formContacta = array(
            'campos' => array(
                'Nombre' => array('valor' => 'Nombre', 'error' => false),
                'Email' => array('valor' => 'Email', 'error' => false),
                'Telefono' => array('valor' => 'Telefono', 'error' => false),
                'Mensaje' => array('valor' => 'Mensaje', 'error' => false),
            ),
        );
        $this->formDenuncia = array(
            'campos' => array(
                'Nombre' => array('valor' => 'Nombre', 'error' => false),
                'Email' => array('valor' => 'Email', 'error' => false),
                //'Telefono' => array('valor' => 'Telefono', 'error' => false),
                'Mensaje' => array('valor' => 'Mensaje', 'error' => false),
            ),
        );


        $idProducto = $this->request['IdEntity'];

        $this->values['formActivo'] = "contacto";

        /* PRODUCTO */
        $this->values['producto'] = ErpArticulos::getObjetoArticulo($idProducto);
        /* GALERIA DE IMAGENES DEL PRODUCTO */
        $this->values['galeria'] = Albumes::getGaleria("Articulos", $idProducto);
        
        /* DETALLES TÉCNICOS */
        $this->values['detalleTecnico'] = ErpArticulos::getDetalleTecnico($idProducto);

        /* ARTÍCULOS RELACIONADOS */
        //$this->values['articulosRelacionados'] = ErpArticulos::getArticulosRelacionados($idProducto, 2);

        /* NOTICIAS - mostrar solo 1 noticias */
        //$this->values['noticia'] = Noticias::getNoticias(true, 1);
        
        $this->values['categorias'] = ErpFamilias::getCategoriasFamilias(1);
        $this->values['marcas'] = ErpMarcas::getMarcas(1);        

        $this->values['formContacta'] = $this->formContacta;
        $this->values['formDenuncia'] = $this->formDenuncia;

        return parent::IndexAction();
    }

    public function ProductosAnuncianteAction() {

        $idAnunciante = $this->request['idAnunciante'];
        $nPagina = $this->request['nPagina'];

        $this->values['anunciante'] = new Clientes($idAnunciante);

        /* PRODUCTOS PRINCIPALES */
        $this->values['productos'] = ErpArticulos::getArticulosPaginadosUsuario($idAnunciante, '', $nPagina, 0);

        return array(
            'template' => $this->entity . '/anunciante.html.twig',
            'values' => $this->values
        );
    }

    public function ContactarAction() {

        $idProducto = $this->request['idProducto'];

        /* PRODUCTO */
        $this->values['producto'] = ErpArticulos::getArticulo($idProducto);

        $this->formContacta['campos'] = $this->request['campos'];

        if ($this->ValidaContacto()) {
            if ((file_exists('docs/plantillaMailVisitante.htm')) and (file_exists('docs/plantillaMailWebMaster.htm'))) {

                $mailer = new Mail($this->varWeb['Pro']['mail']);
                $envioOk = $this->enviaVisitante($mailer, 'docs/plantillaMailVisitante.htm');

                if ($envioOk)
                    $envioOk = $this->enviaPropietario($mailer, 'docs/plantillaMailWebMaster.htm');


                $this->formContacta['resultado'] = $envioOk;
                $this->formContacta['mensaje'] = ($envioOk) ?
                        $this->varWeb['Pro']['mail']['mensajeExito'] :
                        $this->varWeb['Pro']['mail']['mensajeError'];

                unset($mailer);
            } else {
                $this->formContacta['resultado'] = 'error';
                $this->formContacta['mensaje'] = "No se han definido las plantillas.";
            }
        } else {
            $this->formContacta['resultado'] = 'error';
        }

        $this->values['formActivo'] = "contacto";
        $this->formContacta['accion'] = 'envio';

        /* DETALLES TÉCNICOS */
        $this->values['detalleTecnico'] = ErpArticulos::getDetalleTecnico($idProducto);

        /* ARTÍCULOS RELACIONADOS */
        $this->values['articulosRelacionados'] = ErpArticulos::getArticulosRelacionados($idProducto, 5);

        /* NOTICIAS - mostrar solo 1 noticias */
        $this->values['noticia'] = Noticias::getNoticias(true, 1);

        $this->values['formContacta'] = $this->formContacta;

        return array(
            'template' => $this->entity . '/index.html.twig',
            'values' => $this->values,
        );
    }

    public function DenunciarAction() {

        $idProducto = $this->request['idProducto'];

        /* PRODUCTO */
        $this->values['producto'] = ErpArticulos::getArticulo($idProducto);

        $this->formDenuncia['campos'] = $this->request['campos'];

        if ($this->ValidaDenuncia()) {
            if ((file_exists('docs/plantillaMailVisitante.htm')) and (file_exists('docs/plantillaMailWebMaster.htm'))) {

                $mailer = new Mail($this->varWeb['Pro']['mail']);
                //$envioOk = $this->enviaVisitante($mailer, 'docs/plantillaMailVisitante.htm');
                //if ($envioOk)
                $envioOk = $this->enviaWebMaster($mailer, 'docs/plantillaMailWebMaster.htm');

                $this->formDenuncia['resultado'] = $envioOk;
                $this->formDenuncia['mensaje'] = ($envioOk) ?
                        $this->varWeb['Pro']['mail']['mensajeExito'] :
                        $this->varWeb['Pro']['mail']['mensajeError'];

                unset($mailer);
            } else {
                $this->formDenuncia['resultado'] = 'error';
                $this->formDenuncia['mensaje'] = "No se han definido las plantillas.";
            }
        } else {
            $this->formDenuncia['resultado'] = 'error';
        }

        $this->values['formActivo'] = "denuncia";
        $this->formDenuncia['accion'] = 'envio';

        /* DETALLES TÉCNICOS */
        $this->values['detalleTecnico'] = ErpArticulos::getDetalleTecnico($idProducto);

        /* ARTÍCULOS RELACIONADOS */
        $this->values['articulosRelacionados'] = ErpArticulos::getArticulosRelacionados($idProducto, 5);

        /* NOTICIAS - mostrar solo 1 noticias */
        $this->values['noticia'] = Noticias::getNoticias(true, 1);

        $this->values['formDenuncia'] = $this->formDenuncia;

        return array(
            'template' => $this->entity . '/index.html.twig',
            'values' => $this->values,
        );
    }

    public function EditAction() {

        $this->varEnvMod = CpanVariables::getVariables("Env", "Mod", "Articulos");
        $this->varWebMod = CpanVariables::getVariables("Web", "Mod", "Articulos");

        switch ($this->request['METHOD']) {
            case 'GET':

                if ($_SESSION['usuarioWeb']['id']) {
                    /* CATEGORIA */
                    $this->values['categorias'] = ErpFamilias::getCategorias();

                    /* FAMILIAS DE LA CATEGORIA */
                    $this->values['familias'] = ErpFamilias::getFamilias($this->values['categorias'][0]['Id']);

                    /* MARCAS */
                    $this->values['marcas'] = ErpMarcas::getMarcas();

                    /* ARTICULO */
                    $articulo = new Articulos();
                    $articulo->setIDCategoria($this->values['categorias'][0]['Id']);
                    $this->values['articulo'] = $articulo;
                    unset($articulo);

                    $template = $this->entity . "/editProducto.html.twig";
                } else {
                    // Si el usuario no está logeado, lo invito a que se logee.
                    include "modules/ZonaPrivada/ZonaPrivadaController.class.php";
                    $controller = new ZonaPrivadaController($this->request);
                    return $controller->IndexAction();
                }

                break;

            case 'POST':

                switch ($this->request['accion']) {
                    case 'Editar':
                        $articulo = new Articulos();
                        $articulo = $articulo->find("PrimaryKeyMD5", $this->request['primaryKeyMD5']);
                        break;

                    case 'Crear':

                        $censurar = $this->varWebMod['especificas']['censurarArticulos'];

                        $articulo = new Articulos();
                        $articulo->bind($this->request['articulo']);
                        $articulo->setCodigo($_SESSION['usuarioWeb']['id'] . time());
                        $articulo->setGarantia(".");
                        $articulo->setVigente(!$censurar);
                        $articulo->setPublish(1);
                        $articulo->setIDCliente($_SESSION['usuarioWeb']['id']);
                        $articulo->setPublishedAt(date('Y-m-d H:i:s'));
                        if ($this->ValidaProducto($articulo)) {

                            $id = $articulo->create();
                            if ($id) {
                                // Guardo las eventuales propiedades
                                foreach ($this->request['propiedades'] as $idPropiedad => $idValor) {
                                    $propiedad = new ArticulosPropiedades();
                                    $propiedad->setIDArticulo($id);
                                    $propiedad->setIDPropiedad($idPropiedad);
                                    $propiedad->setIDValor($idValor);
                                    $propiedad->setPublish(1);
                                    $propiedad->create();
                                }
                                unset($propiedad);

                                //Recargo el objeto para refrescar las propiedades que
                                //hayan podido ser objeto de algun calculo durante el proceso
                                //de guardado y pongo valores por defecto (urlamigable, etc)
                                $articulo = new Articulos($id);
                                $this->gestionUrlMeta($articulo);

                                // Si ex buscable, actualizar la tabla de búsquedas
                                if ($this->varEnvMod['searchable'] == '1')
                                    $this->ActualizaBusquedas($articulo);

                                //Enviar notificación de creación al webmaster
                                if ($this->varWebMod['especificas']['notificarCreacionArticulo'])
                                    $this->envioNotificacion($articulo, 'creacion');
                            }
                        }
                        break;

                    case 'Guardar':
                        $articulo = new Articulos($this->request['articulo']['IDArticulo']);
                        $articulo->bind($this->request['articulo']);

                        if ($this->ValidaProducto($articulo)) {

                            $ok = $articulo->save();
                            if ($ok) {

                                // Borro las eventuales propiedades
                                $propiedades = new ArticulosPropiedades();
                                $propiedades->queryDelete("IDArticulo='{$articulo->getPrimaryKeyValue()}'");
                                unset($propiedades);

                                // Creo las eventuales propiedades
                                foreach ($this->request['propiedades'] as $idPropiedad => $idValor) {
                                    $propiedad = new ArticulosPropiedades();
                                    $propiedad->setIDArticulo($articulo->getPrimaryKeyValue());
                                    $propiedad->setIDPropiedad($idPropiedad);
                                    $propiedad->setIDValor($idValor);
                                    $propiedad->setPublish(1);
                                    $propiedad->create();
                                }
                                unset($propiedad);

                                // Si vienen imágenes, las subo
                                if ($this->request['FILES']['imagenGaleria']['error'] == 0)
                                    $this->subeImagenGaleria($articulo->getPrimaryKeyValue(), $this->request['FILES']['imagenGaleria']);
                                if ($this->request['FILES']['imagenPrincipal']['error'] == 0) {
                                    $this->subeImagenPrincipal($articulo->getPrimaryKeyValue(), $this->request['FILES']['imagenPrincipal']);
                                    $this->subeImagenGaleria($articulo->getPrimaryKeyValue(), $this->request['FILES']['imagenPrincipal']);
                                }

                                if ($articulo->getUrlTarget() == '') {
                                    $this->gestionUrlMeta($articulo);

                                    // Salvar los campos Controller, action, template y parameters
                                    // del objeto CpanUrlAmigables asociado
                                    if ($this->request['objetoUrlAmigable']) {
                                        $arrayUrlAmigable = $this->request['objetoUrlAmigable'];
                                        $objetoUrl = new CpanUrlAmigables($arrayUrlAmigable['Id']);
                                        $objetoUrl->setController($arrayUrlAmigable['Controller']);
                                        $objetoUrl->setAction($arrayUrlAmigable['Action']);
                                        $objetoUrl->setTemplate($arrayUrlAmigable['Template']);
                                        $objetoUrl->setParameters($arrayUrlAmigable['Parameters']);

                                        if (!$objetoUrl->save())
                                            $this->values['errores'] = $objetoUrl->getErrores();

                                        unset($objetoUrl);
                                    }
                                }

                                // Si estoy en el idioma principal, tengo que
                                // repercutir los cambios a los demás idiomas
                                if ($_SESSION['idiomas']['actual'] == '0')
                                    $this->ActualizaIdiomas($articulo->getPrimaryKeyValue());

                                // Si ex buscable, actualizar la tabla de búsquedas
                                if ($this->varEnvMod['searchable'] == '1')
                                    $this->ActualizaBusquedas($articulo);

                                //Enviar notificación de modificación al webmaster
                                if ($this->varWebMod['especificas']['notificarModificacionArticulo'])
                                    $this->envioNotificacion($articulo, 'modificacion');
                            }
                        }
                        break;

                    case 'Borrar':
                        $articulo = new Articulos($this->request['articulo']['IDArticulo']);
                        $articulo->delete();
                        $articulo = new Articulos();
                        break;

                    case 'BorrarImagenGaleria':
                        $articulo = new Articulos($this->request['articulo']['IDArticulo']);
                        $id = $this->request['idImagenBorrar'];
                        $datos = new CpanDocs($id);

                        if ($datos->erase()) {
                            // Borro los eventuales hijos del documento ( los thumbnails)
                            $thumbNail = new CpanDocs();
                            $rows = $thumbNail->cargaCondicion('Id', "BelongsTo='{$id}'");
                            foreach ($rows as $row) {
                                $thumbNail = new CpanDocs($row['Id']);
                                $thumbNail->erase();
                            }
                            unset($thumbNail);
                        }
                        break;
                }

                $this->values['errores'] = $this->errores;

                $this->values['articulo'] = $articulo;

                /* CATEGORIA */
                $this->values['categorias'] = ErpFamilias::getCategorias();

                /* FAMILIAS DE LA CATEGORIA */
                $this->values['familias'] = ErpFamilias::getFamilias($articulo->getIDCategoria()->getPrimaryKeyValue());

                /* MARCAS */
                $this->values['marcas'] = ErpMarcas::getMarcas();

                $template = $this->entity . "/editProducto.html.twig";
                unset($articulo);
                break;
        }

        return array(
            'template' => $template,
            'values' => $this->values,
        );
    }

    private function subeImagenPrincipal($idArticulo, $imagen) {

        $datos = new Articulos($idArticulo);
        $columnaSlug = $this->varEnvMod['fieldGeneratorUrlFriendly'];
        $slug = $datos->{"get$columnaSlug"}();
        unset($datos);

        // Borrar las eventuales imagenes que existieran
        $img = new CpanDocs();
        $img->borraDocs('Articulos', $idArticulo, 'image%');
        unset($img);

        foreach ($this->varEnvMod['images'] as $key => $value) {

            if ($value['visible'] == '1') {

                $imagen['maxWidth'] = $value['width'];
                $imagen['maxHeight'] = $value['height'];
                $imagen['modoRecortar'] = "ajustar";

                $doc = new CpanDocs();
                $doc->setEntity("Articulos");
                $doc->setIdEntity($idArticulo);
                $doc->setPathName("Articulos" . $idArticulo);
                $doc->setName($slug);
                $doc->setTitle($slug);
                $doc->setType('image' . $key);
                $doc->setArrayDoc($imagen);
                $doc->setIsThumbnail(0);
                $doc->setPublish($value['valorDefectoPublicar']);
                $doc->create();

                if (count($doc->getErrores())) {
                    $doc->borraDocs("Articulos", $idArticulo, 'image%');
                }

                unset($doc);
            }
        }
    }

    private function subeImagenGaleria($idArticulo, $imagen) {

        $datos = new Articulos($idArticulo);
        $columnaSlug = $this->varEnvMod['fieldGeneratorUrlFriendly'];
        $slug = $datos->{"get$columnaSlug"}();
        unset($datos);

        $doc = new CpanDocs();
        $doc->setEntity("Articulos");
        $doc->setIdEntity($idArticulo);
        $doc->setPathName("Articulos" . $idArticulo);
        $doc->setName($slug);
        $doc->setTitle($slug);
        $doc->setType('galery');
        $doc->setArrayDoc($imagen);
        $doc->setIsThumbnail(0);
        $doc->setPublish($this->varEnvMod['galery']['valorDefectoPublicar']);

        $documento = $doc->getArrayDoc();
        $documento['maxWidth'] = $this->varEnvMod['galery']['maxWidthImage'];
        $documento['maxHeight'] = $this->varEnvMod['galery']['maxHeightImage'];
        $documento['modoRecortar'] = "ajustar";

        $doc->setArrayDoc($documento);
        $lastId = $doc->create();
        if (!$lastId)
            $this->values['errores'] = $datos->getErrores();

        // Subir Miniatura
        if (($lastId) and ($this->varEnvMod['galery']['generateThumbnail'] == '1')) {
            $thumb = new CpanDocs();
            $thumb->setEntity("Articulos");
            $thumb->setIdEntity($idArticulo);
            $thumb->setPathName("Articulos" . $idArticulo);
            $thumb->setName($slug);
            $thumb->setTitle($slug);
            $thumb->setType('galery');
            $thumb->setArrayDoc($imagen);
            $thumb->setIsThumbnail(0);
            $thumb->setPublish($this->varEnvMod['galery']['valorDefectoPublicar']);
            $thumb->setBelongsTo($lastId);
            $documento = $imagen;
            $documento['maxWidth'] = $this->varEnvMod['galery']['widthThumbnail'];
            $documento['maxHeight'] = $this->varEnvMod['galery']['heightThumbnail'];
            $thumb->setArrayDoc($documento);
            $thumb->setIsThumbnail(1);

            $lastId = $thumb->create();
            $this->values['errores'] = $thumb->getErrores();
        }
    }

    /**
     * Envía el correo de confirmación al visitante
     * en base a la plantilla htm $ficheroPlantilla.
     * 
     * @param Mail $mailer objeto mailer
     * @param string $ficheroPlantilla El archivo que tiene la plantilla htm a enviar
     * @return boolean TRUE si se envío con éxito
     */
    private function enviaVisitante($mailer, $ficheroPlantilla) {

        $mensaje = "<p>Su mensaje ha sido enviado al propietario.</p>";
        $mensaje .= "<p>Usted escribió:</p>" . $this->formContacta['campos']['Mensaje']['valor'];

        $plantilla = file_get_contents($ficheroPlantilla);
        $plantilla = str_replace("#TITLE#", $this->varWeb['Pro']['meta']['title'], $plantilla);
        $plantilla = str_replace("#DOMINIO#", $this->varWeb['Pro']['globales']['dominio'], $plantilla);
        $plantilla = str_replace("#TEXTOLOPD#", $this->varWeb['Pro']['mail']['textoLOPD'], $plantilla);
        $plantilla = str_replace("#FECHA#", date('d-m-Y'), $plantilla);
        $plantilla = str_replace("#HORA#", date('H:m:i'), $plantilla);
        $plantilla = str_replace("#EMPRESA#", $this->varWeb['Pro']['globales']['empresa'], $plantilla);
        $plantilla = str_replace("#MAIL#", $this->varWeb['Pro']['globales']['from'], $plantilla);
        $plantilla = str_replace("#ASUNTO#", "Mensaje enviado", $plantilla);
        $plantilla = str_replace("#MENSAJE#", $mensaje, $plantilla);

        return $mailer->send(
                        $this->formContacta['campos']['Email']['valor'], $this->varWeb['Pro']['mail']['from'], $this->varWeb['Pro']['mail']['from_name'], 'Mensaje enviado', $plantilla, array()
        );
    }

    /**
     * Envía el correo de confirmación al webmaster
     * en base a la plantilla htm $ficheroPlantilla.
     * 
     * @param Mail $mailer objeto mailer
     * @param string $ficheroPlantilla El archivo que tiene la plantilla htm a enviar
     * @return boolean TRUE si se envío con éxito
     */
    private function enviaPropietario($mailer, $ficheroPlantilla) {

        $emailPropietario = $this->values['producto']->getIDCliente()->getEmail();

        $plantilla = file_get_contents($ficheroPlantilla);
        $plantilla = str_replace("#TITLE#", $this->varWeb['Pro']['meta']['title'], $plantilla);
        $plantilla = str_replace("#DOMINIO#", $this->varWeb['Pro']['globales']['dominio'], $plantilla);
        $plantilla = str_replace("#TEXTOLOPD#", $this->varWeb['Pro']['mail']['textoLOPD'], $plantilla);
        $plantilla = str_replace("#FECHA#", date('d-m-Y'), $plantilla);
        $plantilla = str_replace("#HORA#", date('H:m:i'), $plantilla);
        $plantilla = str_replace("#VISITANTE#", $this->formContacta['campos']['Nombre']['valor'], $plantilla);
        $plantilla = str_replace("#MAIL#", $this->formContacta['campos']['Email']['valor'], $plantilla);
        $plantilla = str_replace("#TELEFONO#", $this->formContacta['campos']['Telefono']['valor'], $plantilla);
        $plantilla = str_replace("#ASUNTO#", $this->formContacta['campos']['Asunto']['valor'], $plantilla);
        $plantilla = str_replace("#MENSAJE#", $this->formContacta['campos']['Mensaje']['valor'], $plantilla);

        return $mailer->send(
                        $emailPropietario, $this->formContacta['campos']['Email']['valor'], $this->formContacta['campos']['nombre']['valor'], 'Vendo Camara', $plantilla, array()
        );
    }

    /**
     * Envía el correo de confirmación al webmaster
     * en base a la plantilla htm $ficheroPlantilla.
     * 
     * @param Mail $mailer objeto mailer
     * @param string $ficheroPlantilla El archivo que tiene la plantilla htm a enviar
     * @return boolean TRUE si se envío con éxito
     */
    private function enviaWebMaster($mailer, $ficheroPlantilla) {

        $emailPropietario = $this->values['producto']->getIDCliente()->getEmail();
        $propietario = $this->values['producto']->getIDCliente()->getRazonSocial();
        $urlAmigable = $this->values['producto']->getHref();
        $urlAmigable = "http://" . $this->varWeb['Pro']['globales']['dominio'] . $urlAmigable['url'];
        $mensaje = "<p>" . $this->formDenuncia['campos']['Nombre']['valor'] . " denuncia el siguiente producto:</p>";
        $mensaje .= "<a href='{$urlAmigable}'>{$this->values['producto']}</a><br />";
        $mensaje .= "<p>Propietario:</p>";
        $mensaje .= "{$propietario} {$emailPropietario}";
        $mensaje .= "<p>Motivo:</p>";
        $mensaje .= $this->formDenuncia['campos']['Mensaje']['valor'];

        $plantilla = file_get_contents($ficheroPlantilla);
        $plantilla = str_replace("#TITLE#", $this->varWeb['Pro']['meta']['title'], $plantilla);
        $plantilla = str_replace("#DOMINIO#", $this->varWeb['Pro']['globales']['dominio'], $plantilla);
        $plantilla = str_replace("#TEXTOLOPD#", $this->varWeb['Pro']['mail']['textoLOPD'], $plantilla);
        $plantilla = str_replace("#FECHA#", date('d-m-Y'), $plantilla);
        $plantilla = str_replace("#HORA#", date('H:m:i'), $plantilla);
        $plantilla = str_replace("#VISITANTE#", $this->formDenuncia['campos']['Nombre']['valor'], $plantilla);
        $plantilla = str_replace("#MAIL#", $this->formDenuncia['campos']['Email']['valor'], $plantilla);
        $plantilla = str_replace("#TELEFONO#", $this->formDenuncia['campos']['Telefono']['valor'], $plantilla);
        $plantilla = str_replace("#ASUNTO#", 'Denuncia producto', $plantilla);
        $plantilla = str_replace("#MENSAJE#", $mensaje, $plantilla);

        return $mailer->send(
                        $this->varWeb['Pro']['mail']['from'], $this->formDenuncia['campos']['Email']['valor'], $this->formDenuncia['campos']['nombre']['valor'], 'Denuncia producto', $plantilla, array()
        );
    }

    /**
     * Envía un correo de notificación de creación o modificación de
     * un producto al webmaster
     * 
     * @param Articulos $articulo
     * @param string $accion
     * @return boolean
     */
    private function envioNotificacion(Articulos $articulo, $accion) {

        $ok = false;

        $ficheroPlantilla = 'docs/plantillaMailWebMaster.htm';

        if (file_exists($ficheroPlantilla)) {

            $urlAmigable = $articulo->getHref();
            $urlAmigable = "http://" . $this->varWeb['Pro']['globales']['dominio'] . $urlAmigable['url'];
            $usuario = $articulo->getIDCliente();
            $nombre = $usuario->getRazonSocial();
            $email = $usuario->getEmail();
            $telefono = $usuario->getTelefono();
            switch ($accion) {
                case 'creacion':
                    $asunto = "Se ha creado un producto";
                    $mensaje = "<p>Se ha creado un nuevo producto.</p>";
                    $mensaje .= "<a href='{$urlAmigable}'>{$urlAmigable}</a>";
                    break;
                case 'modificacion':
                    $asunto = "Se ha modificado un producto";
                    $mensaje = "<p>Se ha modificado un producto.</p>";
                    $mensaje .= "<a href='{$urlAmigable}'>{$urlAmigable}</a>";
                    break;
            }
            $plantilla = file_get_contents($ficheroPlantilla);
            $plantilla = str_replace("#TITLE#", $this->varWeb['Pro']['meta']['title'], $plantilla);
            $plantilla = str_replace("#DOMINIO#", $this->varWeb['Pro']['globales']['dominio'], $plantilla);
            $plantilla = str_replace("#TEXTOLOPD#", $this->varWeb['Pro']['mail']['textoLOPD'], $plantilla);
            $plantilla = str_replace("#FECHA#", date('d-m-Y'), $plantilla);
            $plantilla = str_replace("#HORA#", date('H:m:i'), $plantilla);
            $plantilla = str_replace("#VISITANTE#", $nombre, $plantilla);
            $plantilla = str_replace("#MAIL#", $email, $plantilla);
            $plantilla = str_replace("#TELEFONO#", $telefono, $plantilla);
            $plantilla = str_replace("#ASUNTO#", $asunto, $plantilla);
            $plantilla = str_replace("#MENSAJE#", $mensaje, $plantilla);

            $mailer = new Mail($this->varWeb['Pro']['mail']);
            $ok = $mailer->send(
                    $this->varWeb['Pro']['mail']['from'], $this->varWeb['Pro']['mail']['from'], $this->varWeb['Pro']['mail']['from_name'], $asunto, $plantilla, array()
            );
        }

        return $ok;
    }

    private function ValidaContacto() {

        $error = false;

        if (!isset($this->formContacta['campos']['leidoPolitica']['valor']))
            $this->formContacta['campos']['leidoPolitica']['valor'] = '';

        foreach ($this->formContacta['campos'] as $campo => $valor) {
            if ($campo != 'Telefono') {
                $valor = trim(str_replace($campo, "", $valor['valor']));
                $errorCampo = ($valor == '');
                $this->formContacta['campos'][$campo]['valor'] = $valor;
                $this->formContacta['campos'][$campo]['error'] = $errorCampo;
                $error = ($error or $errorCampo);
            }
        }

        // Comprobar la validez ortográfica de la dirección de correo
        $mail = new Mail($this->varWeb['Pro']['mail']);
        if (!$mail->compruebaEmail($this->formContacta['campos']['Email']['valor'])) {
            $this->formContacta['campos']['Email']['error'] = 1;
            $error = true;
        }

        return !$error;
    }

    private function ValidaDenuncia() {

        $error = false;

        if (!isset($this->formDenuncia['campos']['leidoPolitica']['valor']))
            $this->formDenuncia['campos']['leidoPolitica']['valor'] = '';

        foreach ($this->formDenuncia['campos'] as $campo => $valor) {
            $valor = trim(str_replace($campo, "", $valor['valor']));
            $errorCampo = ($valor === '');
            $this->formDenuncia['campos'][$campo]['valor'] = $valor;
            $this->formDenuncia['campos'][$campo]['error'] = $errorCampo;
            $error = ($error or $errorCampo);
        }

        // Comprobar la validez ortográfica de la dirección de correo
        $mail = new Mail($this->varWeb['Pro']['mail']);
        if (!$mail->compruebaEmail($this->formDenuncia['campos']['Email']['valor'])) {
            $this->formDenuncia['campos']['Email']['error'] = 1;
            $error = true;
        }

        return !$error;
    }

    private function ValidaProducto($articulo) {

        if ($articulo->getDescripcion() == '')
            $this->errores[] = "Debe indicar una descripción breve del producto";
        if ($articulo->getResumen() == '')
            $this->errores[] = "Debe indicar un texto descriptivo del producto";
        if ($articulo->getPvp() <= 0)
            $this->errores[] = "El precio no puede ser cero o negativo";

        return (count($this->errores) == 0);
    }

    /**
     * Crea o actualiza la url amigable y el metatagTitle
     *
     * @param array $datos
     */
    protected function gestionUrlMeta($datos) {

        $objetoAuxuliar = new Articulos($datos->getPrimaryKeyValue());

        if ($this->varEnvMod['urlFriendlyManagement'])
            $urlAmigable = $this->calculaUrlAmigable($objetoAuxuliar);

        if ($this->varEnvMod['metatagTitleManagement'])
            $metatagTitle = $this->calculaMetatagTitle($objetoAuxuliar);

        unset($objetoAuxuliar);

        if (count($urlAmigable) or ($metatagTitle != '')) {

            if ($urlAmigable != '') {
                $datos->setUrlPrefix($urlAmigable['prefix']);
                $datos->setSlug($urlAmigable['slug']);
                $datos->setUrlFriendly($urlAmigable['url']);
            }

            if ($metatagTitle != '') {
                $datos->setMetatagTitle($metatagTitle);
            }

            $datos->save();
        }
    }

    protected function calculaUrlAmigable($datos) {

        $urlPrefix = '';
        $urlAmigable = '';
        $slug = '';

        $columnaSlug = $this->varEnvMod['fieldGeneratorUrlFriendly'];

        // Si hay que generar la url amigable
        if ($columnaSlug) {

            $bloqueoUrlPrefix = ( $datos->getLockUrlPrefix()->getIDTipo() == '1' );
            $datos->setLockUrlPrefix($bloqueoUrlPrefix);
            $bloqueoSlug = ( $datos->getLockSlug()->getIDTipo() == '1' );
            $datos->setLockSlug($bloqueoSlug);
            $perteneceA = $datos->getBelongsTo()->getPrimaryKeyValue();

            // CALCULAR EL PREFIJO DE LA URL -----------------------------------
            //
            // Si está bloqueado el prefijo, se calcula
            if ($bloqueoUrlPrefix) {

                if ($this->varEnvMod['isModuleRoot']) {
                    // Es el módulo padre de la app
                    if ($perteneceA) {
                        $objetoPadre = new Articulos($perteneceA);
                        if ($objetoPadre->getUrlHeritable()->getIDTipo() == '1') {
                            $urlPrefix = $objetoPadre->getUrlFriendly();
                        } else {
                            $urlPrefix = "/" . $this->varEnvApp['globales']['urlPrefix'];
                        }
                        unset($objetoPadre);
                    } else {
                        $urlPrefix = "/" . $this->varEnvApp['globales']['urlPrefix'];
                    }
                } else {
                    // No es el módulo padre de la app. Miro a ver si
                    // está linkado con otro módulo
                    $linkModule = $this->varWebMod['globales'];
                    if (($linkModule['linkFromColumn'] != '') and ($linkModule['linkToEntity'] != '') and ($linkModule['linkToColumn'] != '')) {
                        // Está linkado con otro módulo. El prefijo será la url amigable
                        // del padre si es heredable
                        $idToLink = $datos->getColumnValue($linkModule['linkFromColumn']);
                        if (is_object($idToLink))
                            $idToLink = $idToLink->getPrimaryKeyValue();

                        $moduloPadre = new $linkModule['linkToEntity']($idToLink);
                        if ($moduloPadre->getUrlHeritable()->getIDTipo() == '1') {
                            $urlPrefix = $moduloPadre->getUrlFriendly();
                        } else {
                            $urlPrefix = "/" . $this->varEnvApp['globales']['urlPrefix'];
                        }
                        unset($moduloPadre);
                    }
                }
            } else {
                // Si no está bloqueado, se toma el indicado por el usuario y se limpia
                $urlPrefix = Textos::limpia($datos->getUrlPrefix());
                if ($urlPrefix)
                    $urlPrefix = "/" . $urlPrefix;
            }
            // -----------------------------------------------------------------
            // CALCULAR EL SLUG ------------------------------------------------
            //
            // Si está bloquedo el slug, se calcula
            if ($bloqueoSlug) {
                $slug = $datos->{"get$columnaSlug"}();
            } else {
                // Si no está bloqueado, se toma el indicado por el usuario
                $slug = $datos->getSlug();
            }

            $slug = Textos::limpia($slug);
            // -----------------------------------------------------------------
            // Construir la url amigable, límito su longitud al valor indicado
            // en la variable de entorno del proyecto
            if ($urlPrefix != '')
                $urlAmigable = $urlPrefix;
            $urlAmigable .= "/{$slug}";

            $urlAmigable = str_replace("//", "/", $urlAmigable);
            if ($this->varEnv['Pro']['maxLengthUrlsFriendly'])
                $urlAmigable = substr($urlAmigable, 0, $this->varEnv['Pro']['maxLengthUrlsFriendly']);
            if ($this->varEnvMod['parametros'] != '')
                $urlAmigable .= "/" . $this->varEnvMod['parametros'];

            $urls = new CpanUrlAmigables();
            $filtro = "Idioma='{$_SESSION['idiomas']['actual']}' and Entity='Articulos' and IdEntity='{$datos->getPrimaryKeyValue()}'";
            $rows = $urls->cargaCondicion("Id", $filtro);
            $idUrl = $rows[0]['Id'];
            if (!$idUrl) {
                if ($_SESSION['idiomas']['actual'] == 0) {
                    // Pongo el controlador, action, template y parametros con las variables de entorno, pero...
                    $urls->setController($this->varEnvMod['controller']);
                    $urls->setAction($this->varEnvMod['action']);
                    $urls->setTemplate($this->varEnvMod['template']);
                    $urls->setParameters($this->varEnvMod['parametros']);
                } else {
                    $filtro = "Idioma='0' and Entity='Articulos' and IdEntity='{$datos->getPrimaryKeyValue()}'";
                    $rows = $urls->cargaCondicion("Controller,Action,Template,Parameters", $filtro);
                    $row = $rows[0];
                    if ($row) {
                        // Si la entidad tiene padre (belongsto), pongo el controller del padre
                        $urls->setController($row['Controller']);
                        $urls->setAction($row['Action']);
                        $urls->setTemplate($row['Template']);
                        $urls->setParameters($row['Parameters']);
                    }
                }

                // Si el objeto es hijo (belongsTo), pongo el del objeto padre
                if ($datos->getBelongsTo()->getPrimaryKeyValue() > 0) {
                    $clasePadre = $datos->getClassName();
                    $urlPadre = new CpanUrlAmigables();
                    $filtro = "Idioma='{$_SESSION['idiomas']['actual']}' and Entity='{$clasePadre}' and IdEntity='{$datos->getBelongsTo()->getPrimaryKeyValue()}'";
                    $rows = $urlPadre->cargaCondicion("Controller,Action,Template,Parameters", $filtro);
                    $row = $rows[0];
                    if ($row) {
                        // Si la entidad tiene padre (belongsto), pongo el controller del padre
                        $urls->setController($row['Controller']);
                        $urls->setAction($row['Action']);
                        $urls->setTemplate($row['Template']);
                        $urls->setParameters($row['Parameters']);
                    }
                }
                $urls->setIdioma($_SESSION['idiomas']['actual']);
                $urls->setUrlFriendly("Articulos" . $datos->getPrimaryKeyValue());
                $urls->setEntity("Articulos");
                $urls->setIdEntity($datos->getPrimaryKeyValue());
                $idUrl = $urls->create();
            }

            $rows = $urls->cargaCondicion("Id, Entity, IdEntity", "Idioma='{$_SESSION['idiomas']['actual']}' and UrlFriendly='{$urlAmigable}'");
            $row = $rows[0];
            if (($row['Id']) and ($row['Entity'] != "Articulos" or $row['IdEntity'] != "{$datos->getPrimaryKeyValue()}")) {
                // Ya existe esa url amigable, le pongo al final el id
                $urlAmigable .= "-" . $idUrl;
                $slug .= "-" . $idUrl;
            }
            $urls = new CpanUrlAmigables($idUrl);
            $urls->setUrlFriendly($urlAmigable);
            $urls->setEntity("Articulos");
            $urls->setIdEntity($datos->getPrimaryKeyValue());
            $urls->save();
        }

        $array = array();

        if ($urlPrefix . $urlAmigable . $slug)
            $array = array(
                'prefix' => $urlPrefix,
                'url' => $urlAmigable,
                'slug' => $slug,
            );

        return $array;
    }

    protected function calculaMetatagTitle($datos) {

        // Obtener el metatagtitle

        $bloqueoMetatagTitle = ($datos->getLockMetatagTitle()->getIDTipo() == '1');
        $datos->setLockMetatagTitle($bloqueoMetatagTitle);

        if ($bloqueoMetatagTitle) {
            $columnaMetatagTitle = $this->varEnvMod['fieldGeneratorMetatagTitle'];
            if ($columnaMetatagTitle != '')
                $metatagTitle = $datos->{"get$columnaMetatagTitle"}();
        }
        else
            $metatagTitle = $datos->getMetatagTitle();

        return $metatagTitle;
    }

    /**
     * Repercute los cambios realizados en el objeto del
     * idioma principal en el resto de idiomas.
     * 
     * Solo actualiza los campos que no son traducibles y los
     * traducibles que estén vacios
     * 
     * @param int $idEntidad
     * @return void
     */
    private function ActualizaIdiomas($idEntidad) {

        $objetoPrincipal = new Articulos($idEntidad);
        // Array de columnas y valores del objeto principal
        // Utilizo este array para no utilizar los metodos getters
        // que me pueden devolver objetos relacionados
        $valoresObjetoPrincipal = $objetoPrincipal->iterator();
        unset($objetoPrincipal);

        $idiomasAdicionales = $_SESSION['idiomas']['disponibles'];

        // Recorro los idiomas adicionales
        foreach ($idiomasAdicionales as $key => $value) {
            if ($key > 0) {
                $_SESSION['idiomas']['actual'] = $key;

                $objetoSecundario = new Articulos($idEntidad);

                foreach ($objetoSecundario->iterator() as $column => $value) {
                    $esTraducible = $this->varEnvMod['columns'][$column]['translatable'];
                    // Actualizo las columnas no traducibles y las traducibles que
                    // estén vacías.
                    if ((!$esTraducible) or ($value == '')) {
                        $objetoSecundario->{"set$column"}($valoresObjetoPrincipal[$column]);
                    }
                }
                $objetoSecundario->save();
            }
        }

        unset($objetoSecundario);
        $_SESSION['idiomas']['actual'] = 0;
    }

    /**
     * Actualiza la tabla de búsquedas
     * @param type $objeto
     */
    protected function ActualizaBusquedas($objeto) {

        $search = new CpanSearch();
        $search->actualiza($objeto);
        unset($search);
    }

}

?>
