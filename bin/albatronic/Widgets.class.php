<?php

/**
 * CONTENEDOR DE WIDGETS
 * 
 * @author Sergio Pérez
 * @copyright Informática Albatronic, SL
 * @version 1.0 27-oct-2013
 */
class Widgets {

    /**
     * Devuelve el objeto contenido cuyo id es $idContenido, o
     * un array con las columnas indicadas en $arrayColumnas
     * 
     * Este método existe por compatibilidad con otras versiones. Lo correcto
     * es usar el método más genérico 'getObjeto'
     * 
     * @param integer $idContenido El id del contenido
     * @param array $arrayColumnas Array con los nombres de las columnas a obtener. Opcional. 
     * Si se indica se devuelve array, sino se devuelve el objeto contenido
     * @return mixed Objeto contenido o array de columnas
     */
    static function getContenido($idContenido, $arrayColumnas = '') {
        return Contenidos::getContenido('GconContenidos', $idContenido, $arrayColumnas);
    }

    /**
     * Devuelve un array de contenidos paginados correspondientes a la sección $idSeccion
     * Si no se indica seccion, se devuelven todas
     * 
     * Los contenidos se ordenan ascendentemente por SortOrder
     * 
     * Si no se indica $nItems se paginará según el valor de la variable web
     * del módulo de contenidos ['especificas']['NumContenidosPorPaginaListado']
     * 
     * @param int $idSeccion El id de la seccion de contenidos
     * @param int $nPagina El número de página
     * @param int $nItems EL número de contenidos por página
     * @return array Array de contenidos
     */
    static function getContenidosSeccion($idSeccion = 0, $nPagina = 1, $nItems = 0) {
        return Contenidos::getContenidosSeccion($idSeccion, $nPagina, $nItems);
    }

    /**
     * Devuelve array con las contenidos más visitados
     * 
     * 
     * Las contenidos se ordenan descendentemente por número de visitas (NumberVisits)
     * 
     * El array tiene 2 elementos:
     * 
     * - subtitulo => el subtitulo de la noticia (seccion)
     * - url => array(url => texto, targetBlank => boolean)
     * 
     * @param integer $nItems El numero máximo de elementos a devolver. Opcional. (0=todos)
     * @return array Array con los contenidos
     */
    static function getContenidosMasVisitados($nItems = 0) {
        return Contenidos::getContenidosMasVisitados($nItems);
    }

    /**
     * Devuelve el calendario
     * @param integer $mes
     * @param integer $anio
     * @param string $tipo
     * @return array
     */
    public function getCalendario($mes = '', $anio = '', $tipo = 'Eventos') {
        return Calendario::getCalendario($mes, $anio, $tipo);
    }

    /**
     * Devuelve las categorias de productos
     * @param boolean $enPortada
     * @param integer $nitems
     * @return array
     */
    public function getCategorias($enPortada = true, $nitems = 0) {
        return ErpFamilias::getCategoriasFamilias($enPortada, $nitems);
    }

    /**
     * Devuelve las marcas/fabricantes
     * @param boolean $enPortada
     * @param integer $posicionInicio
     * @param integer $nItems Número de marcas a devolver, por defecto todas
     * @return array
     */
    public function getMarcas($enPortada = true, $posicionInicio = 0, $nItems = 0) {
        return ErpMarcas::getMarcas($enPortada, $posicionInicio, $nItems);
    }

    /**
     * Devuelve un array con las categorias y familias de los
     * artículos que son del fabricante del $idMarca
     * 
     * @param integer $idMarca EL id del fabricante/marca
     * @return array
     */
    public function getCategoriasFamiliaMarca($idMarca) {
        $marca = new Fabricantes($idMarca);
        $array = $marca->getCategoriasFamilias();
        unset($marca);
        return $array;
    }

    /**
     * Devuelve los artículos asociados a un controlador y una zona
     * según lo definido en el esquelo web
     * 
     * @param string $controller
     * @param integer $zona
     * @return array
     */
    public function getArticulosZona($controller, $zona, $filtroAdicional = '1') {
        return ErpArticulos::getArticulosZona($controller, $zona, $filtroAdicional);
    }

    /**
     * Devuelve los artículos más visitados
     * 
     * @param integer $nItems El número de artículos a devolver. Por defecto 10
     * @return array de objetos artículos
     */
    public function getArticulosMasVistos($nItems = 10) {
        return ErpArticulos::getLosMasVistos($nItems);
    }

    /**
     * Devuelve $nItems objetos articulos que están relacionados
     * con el articulo cuyo id es $idArticulo.
     * 
     * EL criterio que se sigue para relacionar es en base a la familia
     * y si no tiene familia en base a la categoria.
     * 
     * @param integer $idArticulo EL id de articulo
     * @param integer $nItems Número de artículos a devolver
     * @return array Array con objetos articulos
     */
    static function getArticulosRelacionados($idArticulo, $nItems) {
        return ErpArticulos::getArticulosRelacionados($idArticulo, $nItems);
    }

    /**
     * Devuelve array de objetos LotesWeb
     * con los objetos Articulos que constituyen cada lote
     * 
     * @param integer $mostrarEnPortada 0=No portada, 1=Si portada, 2=Todos
     * @param integer $nItems Número de lotes a devolver. Por defecto 1
     * @return array Array de lotes
     */
    public function getLotesWeb($mostrarEnPortada = 2, $nItems = 1) {
        return ErpArticulos::getLotesWeb($mostrarEnPortada, $nItems);
    }

    /**
     * Devuelve un array con el detalle técnico del artículo $idArticulo
     * 
     * El array tiene tantos items como propiedades técnicas
     * y cada item tiene dos elementos:
     * 
     * - titulo: el título de la propiedad
     * - valor: el valor de la propiedad
     * 
     * @param int $idArticulo El id del artículo
     * @return array
     */
    public function getArticuloDetalleTecnico($idArticulo) {
        return ErpArticulos::getDetalleTecnico($idArticulo);
    }

    /**
     * Devuelve un array con objetos artículos que son favoritos
     * del usuario web en curso
     * 
     * @return \Articulos Array de objetos articulos
     */
    static function getFavoritos() {
        return ErpFavoritosWeb::getFavoritos();
    }

    /**
     * Devuelve un array con BANNERS.
     * 
     * @param int $zona El nombre de la zona de banner a filtrar. Opcional. Defecto la primera que encuentre.
     * @param int $tipo El tipo de banner. Un valor negativo significa todos los tipos. Por defecto 0 (fijo). Valores posibles en entities/abstract/TiposBanners.class.php
     * @param boolean $mostrarEnListado Un valor negativo para todos, 0 para los NO y 1 para los SI mostrar en listado
     * @param int $nItems Número máximo de banners a devolver. Opcional. Defecto todos
     * @return array Array de banners
     */
    public function getBanners($zona = '*', $tipo = 0, $mostrarEnListado = 0, $nItems = 0) {
        return Banners::getBanners($zona, $tipo, $mostrarEnListado, $nItems);
    }

    /**
     * Devuelve un array con las secciones de enlaces de interes con
     * un máximo de $nItems secciones
     * 
     * Cada elemento del array es de la forma:
     * 
     * - titulo: el titulo de la seccion
     * - subtitulo: el subtitulo de la seccion
     * - resumen: el resumen de la seccion
     * - url: array ('url'=>, targetBlank=> boolean)
     *  
     * @param int $nItems Número máximo de secciones a devolver
     * @return array Array de secciones de enlaces
     */
    static function getSeccionesDeEnlaces($nItems = 999999) {
        return Enlaces::getSeccionesDeEnlaces($nItems);
    }

    /**
     * Devuelve un array con los parametros que definen las redes sociales
     * 
     * Cada ocurrencia del array tiene los siguientes elementos:
     * 
     * - titulo : el titulo de la red social
     * - idUsuario: el id o login de la red social
     * - url: la url
     * - numeroItems: número de tweets/caras a mostrar
     * - mostrarAvatar: Booleano, mostrar o no el avatar
     * - mensaje: El mensaje para el caso que no haya tweets a mostrar
     * - botonEnviar: Booleano, mostrar o no el boton eviar
     * - modoMostar:
     * - font
     * - class
     * - action
     * - ancho
     * - alto
     * - size
     * - colorFondo
     * - colorBorde
     * - count
     * - imagen: path a la imagen de diseño 1
     * 
     * @return array Array con la informacion de la red
     */
    static function getRedesSociales() {
        return RedesSociales::getRedes();
    }

    /**
     * Devuelve un array con objetos Servicios
     * 
     * @param int $idFamilia El id de la familia de servicios. Si es <= 0 se muestran todas las familias. Por defecto 0
     * @param int $mostrarEnPortada Menor a 0 para todos, 0 para los NO portada, 1 para los SI portada. Por defecto 0
     * @param int $nItems Número máximo de servicios a devolver. Por defecto todos.
     * @param int $idExcluir El id del servicio a excluir en la lista de servicios devueltos
     * @return array Array con objetos servicios
     */
    static function getServicios($idFamilia = 0, $mostrarEnPortada = 0, $nItems = 999999, $idExcluir = 0) {
        return Servicios::getServicios($idFamilia, $mostrarEnPortada, $nItems, $idExcluir);
    }

    /**
     * Devuelve un array con SLIDERS.
     * 
     * Están ordenados ASCEDENTEMENTE por Id.
     * 
     * Si el registro de slider existe pero no tiene imagen de diseño 1
     * o, teniéndola no está marcada publicar, no se tendrá en cuenta.
     * 
     * El array tiene 5 elementos:
     * 
     * - titulo => el titulo del slider
     * - subtitulo => el subtitulo del slider
     * - resumen => el resumen del slider si MostrarTextos = TRUE
     * - url => array(url => texto, targetBlank => boolean)
     * - imagen => Path de la imagen de diseño 1
     * 
     * @param int $idZona El id de la zona de slider a filtrar. Opcional. Defecto la primera que encuentre
     * @param int $tipo El tipo de sliders. Opcional. Por defecto el tipo 0. Valores posibles en entities/abstract/TiposSliders.class.php
     * @param int $nItems Número máximo de sliders a devolver. Opcional. Defecto todos
     * @return array Array de sliders
     */
    static function getSliders($idZona = '*', $tipo = 0, $nItems = 0) {
        return Sliders::getSliders($idZona, $tipo, $nItems);
    }

    /**
     * Genera el array con las noticias en base a los CONTENIDOS que:
     * 
     *      NoticiaPublicar = 1
     * 
     * Si las noticias a devolver son las de portada, además se tiene en cuenta
     * las variables web del módulo GconContenidos:
     * 
     * - NumNoticasMostrarHome, y
     * - NumNoticasPorPagina
     * 
     * El array tiene los siguientes elementos
     * 
     * - rows. Con n elementos de la forma:
     *   - fecha => la fecha de publicación (PublisehAt)
     *   - titulo => titulo de la noticia
     *   - subtitulo => subtitulo de la noticia
     *   - url => array(url => texto, targetBlank => boolean)
     *   - resumen => texto del resumen
     *   - desarrollo => texto del desarrollo
     *   - imagen => Path de la imagen de diseño 1
     * - pagina => El número de la página actual
     * - numeroPaginas => El número total de páginas
     * - numeroTotalItems => El número total de noticias
     * 
     * @param boolean $enPortada Si TRUE se devuelven solo las que están marcadas como portada, 
     * en caso contrario se devuelven todas las noticias
     * @param integer $nItems El numero máximo de elementos a devolver. Opcional.
     * Si no se indica valor, se mostrará el número de noticias indicado en las variables
     * web 'NumNoticasMostrarHome' o 'NumNoticasPorPagina' dependiendo de $enPortada
     * @param int $nPagina El número de la página. Opcional. Por defecto la primera
     * @param integer $nImagenDiseno El número de la imagen de diseño. Por defecto la primera
     * @return array Array con las noticias
     */
    public function getNoticias($enPortada = true, $nItems = 0, $nPagina = 1, $nImagenDiseno = 1) {
        return Noticias::getNoticias($enPortada, $nItems, $nPagina, $nImagenDiseno);
    }

    /**
     * Genera el array con las noticias más leidas
     * 
     * Las noticias son Contenidos que tienen a TRUE el campo NoticiaPublicar
     * 
     * Las noticias se ordenan descendentemente por número de visitas (NumberVisits)
     * 
     * Si no se indica el parámetro $nItems, se buscará el valor de la variable
     * web 'NumNoticasMostrarHome'
     * 
     * El array los siguientes elementos:
     * 
     * - fecha => la fecha de publicación (PublishedAt)
     * - titulo => el titulo de la noticia (seccion)
     * - subtitulo => el subtitulo de la noticia (seccion)
     * - url => array(url => texto, targetBlank => boolean)
     * - resumen => el resumen de la noticia (seccion)
     * - desarrollo => el desarrollo de la noticia
     * - imagen => Path de la imagen de diseño $nImagenDiseno
     * - thumbnail => Path del thumbnail del la imagen de diseño $nImagenDiseno
     * 
     * @param integer $nItems El numero máximo de elementos a devolver. Opcional.
     * Si no se indica valor, se mostrarán las indicadas en la VW 'NumNoticasMostrarHome'
     * @param integer $nImagenDiseno El número de la imagen de diseño. Por defecto la primera
     * @return array Array con las noticias
     */
    public function getNoticasMasLeidas($nItems = 0, $nImagenDiseno = 1) {
        return Noticias::getNoticiasMasLeidas($nItems, $nImagenDiseno);
    }

    /**
     * Devuelve un array con los dias del mes en los que hay noticias
     * 
     * El índice del array es el ordinal del día del mes y el valor es
     * el número de noticias de ese día.
     * 
     * @param integer $mes El mes
     * @param integer $ano El año
     * @return array Array de pares dia=>nNoticias
     */
    public function getDiasConNoticias($mes, $ano) {
        return Noticias::getDiasConNoticias($mes, $ano);
    }

    /**
     * Devuelve un array con contenidos que son EVENTOS.
     * 
     * Los contenidos que se devuelven deben estar marcados con EVENTO,
     * tener asignados fechas de evento y estar marcados como publicados.
     * 
     * Están ordenados ASCENDENTEMENTE por Fecha y Hora de inicio
     * 
     * El array tiene los siguientes elementos:
     * 
     * - fecha => la fecha del evento
     * - horaInicio => la hora de inicio del evento
     * - horaFin => La hora de finalización del evento
     * - titulo => el titulo del evento
     * - subtitulo => el subtitulo del evento
     * - url => array(url => texto, targetBlank => boolean)
     * - resumen => el texto resumen del evento
     * - desarrollo => el texto desarrollado del evento
     * - imagen => Path de la imagen de diseño 1
     * 
     * @param date $desdeFecha La fecha en formato aaaa-mm-dd a partir desde la que se muestran los eventos. Opcional. Defecto hoy
     * @param date $hastaFecha La fecha en formato aaaa-mm-dd hasta cuando se muestran los eventos. Opcional. Defecto sin límite
     * @param integer $nItems El numero máximo de elementos a devolver. (0=todos)
     * @param integer $nImagenDiseno El número de la imagen de diseño. Por defecto la primera
     * @param boolean $unicos Si TRUE solo se devuelven los eventos únicos
     * @return array Array con los eventos
     */
    public function getEventos($desdeFecha = '', $hastaFecha = '', $nItems = 0, $nImagenDiseno = 1, $unicos = 1) {
        return Eventos::getEventos($desdeFecha, $hastaFecha, $nItems, $nImagenDiseno, $unicos);
    }

    /**
     * Devuelve un array con los dias del mes en los que hay eventos
     * 
     * El índice del array es el ordinal del día del mes y el valor es
     * el número de eventos de ese día.
     * 
     * @param integer $mes El mes
     * @param integer $ano El año
     * @return array Array de pares dia=>nEventos
     */
    static function getDiasConEventos($mes, $ano) {
        return Eventos::getDiasConEventos($mes, $ano);
    }

    /**
     * Devuelve array de objetos $entidadVisitada que han sido visitados
     * por el usuario en la sesión en curso
     * 
     * @param string $entidadVisitada EL nombre de la entidad visitada. Opcional. Por defecto Articulos
     * @param integer $nVisitas El número de visitas a devolver. Opcional. Por defecto 5
     * @return array Array de objetos \entidadVisitada
     */
    static function getVisitasSesion($entidadVisitada = 'Articulos', $nVisitas = 5) {
        return SeguimientoVisitas::getVisitasSesion($entidadVisitada, $nVisitas);
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
        return SeguimientoVisitas::getVisitasUsuario($entidadVisitada, $nVisitas);
    }

}
