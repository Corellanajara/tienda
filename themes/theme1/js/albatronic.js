/* 
 * @author Sergio Pérez <sergio.perez@albatronic.com>
 * @copyright Informática Albatronic, sl
 * @version 1.0 27-nov-2012
 */


/*
 * CALENDARIO ALBATRONIC
 *
 */

var meses = new Array();
meses["es"] = new Array('Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre');
meses["en"] = new Array('January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December');
meses["fr"] = new Array('Janvier', 'Février', 'Mars', 'Avril', 'Mai', 'Juin', 'Juillet', 'Août', 'September', 'October', 'November', 'December');
meses["it"] = new Array('Gennaio', 'Febbraio', 'Marzo', 'Aprile', 'Maggio', 'Giugno', 'Luglio', 'Agosto', 'Settembre', 'Ottobre', 'Novembre', 'Dicembre');
meses["de"] = new Array('Januar', 'Februar', 'März', 'April', 'Mai', 'Juni', 'Juli', 'August', 'September', 'Oktober', 'November', 'Dezember');

$(document).ready(function() {

    $('#calendarioBotonAnterior').click(
            function() {
                var mes = parseInt($('#calendarioMesActual').val());
                var ano = parseInt($('#calendarioAnoActual').val());

                mes = mes - 1;
                if (mes <= 0) {
                    mes = 12;
                    ano = ano - 1;
                }

                calendario('calendarioTablaDias', $('#calendarioTipo').val(), mes, ano);

                $('#calendarioMesActual').val(mes);
                $('#calendarioAnoActual').val(ano);
            }
    );

    $('#calendarioBotonSiguiente').click(
            function() {
                var mes = parseInt($('#calendarioMesActual').val());
                var ano = parseInt($('#calendarioAnoActual').val());

                mes = mes + 1;
                if (mes >= 13) {
                    mes = 1;
                    ano = ano + 1;
                }

                calendario('calendarioTablaDias', $('#calendarioTipo').val(), mes, ano);

                $('#calendarioMesActual').val(mes);
                $('#calendarioAnoActual').val(ano);
            }
    );


    $("a[rel='pop-up']").click(function() {
        var caracteristicas = "height=" + (screen.availHeight - 40) + ",width=" + (screen.availWidth - 13) + ",screenX=0,screenY=0,left=0,top=0,status=no,menubar=yes,scrollbars=yes,resizable=yes,toolbar=yes,location=yes";
        nueva = window.open(this.href, 'Popup', caracteristicas);
        return false;
    });

});


/**
 * Genera el html con el calendario del 'mes' y 'ano'
 * y lo pone dentro del div 'idDiv'
 */
function calendario(idDiv, tipo, mes, ano) {
    var url = appPath + '/lib/calendario.php';
    var parametros = 'tipo=' + tipo + '&mes=' + mes + '&ano=' + ano;

    // Coloco un gif "Cargando..." en la capa
    $('#' + idDiv).html("<img src='" + appPath + "/" + theme + "/images/loading.gif'>");

    // Pintar el literal del mes y año
    $('#calendarioTextoMes').html(meses[language][mes - 1] + " " + ano);
    // Pintar el calendario
    $('#' + idDiv).load(url, parametros);

}

/**
 * Captura la resolucion del dispositivo de navegación del cliente web y 
 * se la envía por ajax a lib/setResolucion.php para que la ponga en $_SESSION['resolucionVisitante']
 */
function chequeaResolucionVisitante() {

    var ventana_ancho = screen.width;
    var ventana_alto = screen.height;
    var var_resolucion = ventana_ancho + 'x' + ventana_alto;
    var navInfo = window.navigator.appVersion.toLowerCase();

    //alert (var_resolucion);

    $.ajax({
        url: 'lib/setResolucion.php',
        type: 'POST',
        async: true,
        data: {
            navegador: navInfo,
            resolucion: var_resolucion
        }
    })
}

function isEmail(email) {
    var posArroba = email.indexOf('@', 0);

    if (posArroba <= 0)
        return false;

    var posPunto = email.indexOf('.', posArroba);

    if (posPunto == -1)
        return false;

    if (posPunto + 1 == email.length)
        return false;
    // Despues del punto solo puede haber: a-z 0-9 . _-
    if (!contieneCaracteresPermitidos(email.substr(posPunto + 1), "._-"))
        return false;

    return true;
}

function isAlfanumerico(valor) {
    var longi = valor.length;
    var c;
    valor = valor.toLowerCase();

    if (longi > 0) {
        c = valor.charAt(0);
        if (!(c >= 'a' && c <= 'z')) {
            return false;
        }
    }

    for (var i = 1; i < longi; i++)
    {
        c = valor.charAt(i);
        if ((c >= '0' && c <= '9') || (c >= 'a' && c <= 'z') || c == '_' || c == '.')
            continue;
        else
            return false;
    }
    return true;
}

function contieneCaracteresPermitidos(valor, caracteresValidos) {
    var longi = valor.length;
    var c;
    valor = valor.toLowerCase();

    for (var i = 0; i < longi; i++)
    {
        c = valor.charAt(i);
        if ((c >= '0' && c <= '9') || (c >= 'a' && c <= 'z')) {
            continue;
        } else {
            for (var j = 0; j < caracteresValidos.length; j++) {
                if (caracteresValidos.indexOf(c) == -1) {
                    return false;
                }
            }
        }
    }
    return true;
}

/*
 * GENERA UN LISTA DE AUTOCOMPLETADO CON JQUERY. REQUIRE DE LA FUNCION 'devuelve'
 *
 * campoAutoCompletar   -> es el id del campo donde se genera el autocompletado
 * campoId              -> es el id del campo donde se devuelve el id obtenido
 * campoTexto           -> es el id del campo donde se devuelve el texto obtenido
 * entidad              -> indica en base a qué entidad de datos se genera el autocompletado
 * columna              -> la columna de la entidad de datos que se devolverá
 * filtroAdicional      -> valor para un filtro adicional, es opcional
 * desplegableAjax      -> array con parametros adicionales para disparar desplegables en cascada
 */
function autoComplete(campoAutoCompletar,campoId,campoTexto,entidad,columna,filtroAdicional,desplegableAjax) {

    var url = appPath + "/lib/autoCompletar.php?entidad=" + entidad + "&columna=" + columna + "&filtroAdicional=" + filtroAdicional;

    $("#"+campoAutoCompletar).autocomplete({
        source: url,
        minLength: 2,
        select: function( event, ui ) {
            devuelve( campoId, ui.item.id, campoTexto, ui.item.value, desplegableAjax );
        }
    });
}

function devuelve( campoId, id, campoTexto, value, desplegableAjax) {
    $( "#"+campoId ).val(id);
    $( "#"+campoTexto ).val(value);
    if (desplegableAjax.length > 0) {
        var params = desplegableAjax;
        DesplegableAjax(params[0],params[1],params[2],params[3],id);
    }
    $( "#"+campoTexto ).focus();
}

