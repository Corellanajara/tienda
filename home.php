<?php
/* Redirecciona a una página diferente en el mismo directorio el cual se hizo la petición */
$host  = $_SERVER['HTTP_HOST'];
$uri   = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');

if ($_SERVER['PHP_SELF'] == '/home.php') {
    $extra = "index.php";
} else {
    $extra = "carton.html";
}
header("Location: http://$host$uri/$extra");
//echo ("Location: http://$host$uri/$extra");
exit;



