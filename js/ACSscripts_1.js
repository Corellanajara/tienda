function activar(url) {
    
    //Desactivar todas las empresas
    //$('a').css("background", "none");

    //Activar la empresa seleccionada
    //$('a.contains('+texto+')').css("background", "url(images/enviar.png) right 50% no-repeat");
    
    //Cargar el iframe por los proyectos de la empresa seleccionada
    $('#proyectos').html('<iframe src="'+url+'" width="100%" height="100%" align="top" frameborder="0" framespacing="0" scrolling="auto" border="0" allowTransparency="true"></iframe>');
}

/**
 * Captura la resolucion del dispositivo de navegación del cliente web y 
 * se la envía por ajax a lib/setResolucion.php para que la ponga en $_SESSION['resolucionVisitante']
 */
function chequeaResolucionVisitante() {
    
    var ventana_ancho = screen.width;
    var ventana_alto = screen.height;
    var var_resolucion = ventana_ancho+'x'+ventana_alto;
    var navInfo = window.navigator.appVersion.toLowerCase();
        
    //alert (var_resolucion);
    
    $.ajax({
        url: 'lib/setResolucion.php',
        type: 'POST',
        async: true,
        data: {
            navegador:navInfo,
            resolucion:var_resolucion
        }
    })
}