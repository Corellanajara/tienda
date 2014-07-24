<?php

/* Producto/index.js.twig */
class __TwigTemplate_1980d90f1340a05aee7ed824918d450cee25a50325d582298f75742e67dec466 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "<script type=\"text/javascript\" src=\"";
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["app"]) ? $context["app"] : null), "path"), "html", null, true);
        echo "/";
        echo twig_escape_filter($this->env, (isset($context["theme"]) ? $context["theme"] : null), "html", null, true);
        echo "/js/jquery-1.8.2.min.js\"></script> ";
        // line 2
        echo "<script src=\"";
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["app"]) ? $context["app"] : null), "path"), "html", null, true);
        echo "/";
        echo twig_escape_filter($this->env, (isset($context["theme"]) ? $context["theme"] : null), "html", null, true);
        echo "/js/modernizr.custom.12319.js\"></script> ";
        // line 3
        echo "<!-- JQUERY UI -->
<script type=\"text/javascript\" src=\"http://code.jquery.com/ui/1.10.3/jquery-ui.js\"></script> <!-- jQuery UI -->  
<script type=\"text/javascript\" src=\"";
        // line 5
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["app"]) ? $context["app"] : null), "path"), "html", null, true);
        echo "/";
        echo twig_escape_filter($this->env, (isset($context["theme"]) ? $context["theme"] : null), "html", null, true);
        echo "/js/albatronic.js\"></script>
<script type=\"text/javascript\" src=\"";
        // line 6
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["app"]) ? $context["app"] : null), "path"), "html", null, true);
        echo "/";
        echo twig_escape_filter($this->env, (isset($context["theme"]) ? $context["theme"] : null), "html", null, true);
        echo "/js/pirobox_extended.js\"></script>
<script type=\"text/javascript\" src=\"";
        // line 7
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["app"]) ? $context["app"] : null), "path"), "html", null, true);
        echo "/";
        echo twig_escape_filter($this->env, (isset($context["theme"]) ? $context["theme"] : null), "html", null, true);
        echo "/js/pirobox_function.js\"></script> ";
        // line 8
        echo "<!-- SLIDER HOME -->
<script type=\"text/javascript\" src=\"";
        // line 9
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["app"]) ? $context["app"] : null), "path"), "html", null, true);
        echo "/";
        echo twig_escape_filter($this->env, (isset($context["theme"]) ? $context["theme"] : null), "html", null, true);
        echo "/js/bjqs-1.3.min.js\"></script>
<script type=\"text/javascript\" src=\"";
        // line 10
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["app"]) ? $context["app"] : null), "path"), "html", null, true);
        echo "/";
        echo twig_escape_filter($this->env, (isset($context["theme"]) ? $context["theme"] : null), "html", null, true);
        echo "/js/bjqs-function.js\"></script>
<script type=\"text/javascript\" src=\"";
        // line 11
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["app"]) ? $context["app"] : null), "path"), "html", null, true);
        echo "/";
        echo twig_escape_filter($this->env, (isset($context["theme"]) ? $context["theme"] : null), "html", null, true);
        echo "/js/jcarousellite.js\" type=\"text/javascript\"></script>
<script type=\"text/javascript\" src=\"";
        // line 12
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["app"]) ? $context["app"] : null), "path"), "html", null, true);
        echo "/";
        echo twig_escape_filter($this->env, (isset($context["theme"]) ? $context["theme"] : null), "html", null, true);
        echo "/js/jquery-uniform-formulario.js\"></script>
<script type=\"text/javascript\" src=\"";
        // line 13
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["app"]) ? $context["app"] : null), "path"), "html", null, true);
        echo "/";
        echo twig_escape_filter($this->env, (isset($context["theme"]) ? $context["theme"] : null), "html", null, true);
        echo "/js/jquery.ui.dialog.js\"></script>
<script src=\"//use.edgefonts.net/open-sans.js\"></script>
<script>
\$(function() {
    
    \$('#solapa').tabs();
    
    \$('#enviarComentario').click(function(){

     var nombre = \$.trim(\$('#nombre').val());
     var email = \$.trim(\$('#email').val());
     var comentario = \$.trim(\$('#comentario').val());

     if ( nombre === '' || !isEmail(email) || comentario === '') {
         alert('";
        // line 27
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["macro"]) ? $context["macro"] : null), "idioma", array(0 => "debeIndicarTodosLosDatos"), "method"), "html", null, true);
        echo "'+nombre+email+comentario);
         return;
     } else {
         \$(this).hide(\"slow\");
         \$('#formComentario').submit();
     }
    }); 
    
    \$('#avisadorStock').click(function(){
        \$('#dialogoAvisador').removeClass('oculto');
        \$('#emailAvisadorStock').focus();
    });
    
    \$('#botonAvisadorStock').click(function(){
        if (!isEmail( \$('#emailAvisadorStock').val() )) {
            return false;
        } else {
            
            var datos = { 
                'email': \$('#emailAvisadorStock').val(),
                'idArticulo' : \$('#idArticuloAvisador').val()
            };
            \$.ajax({
                url: appPath + '/lib/avisadorStock.php',
                datatype: 'html',
                type: 'post',
                data: {'accion' : 'registrar', 'datos': datos},
                success: function (resultado) {
                    \$('#divAvisadorStock').html(\"<p>";
        // line 55
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["macro"]) ? $context["macro"] : null), "idioma", array(0 => "avisoRegistrado"), "method"), "html", null, true);
        echo "</p>\");
                    \$('#divAvisadorStock').slideUp(8000).delay(7900);
                }
            });
        }      
    });
});

function addCart(IDArticulo,unidades) {

    if (IDArticulo === '' || unidades <= 0)
        return;

    var datos = {
        'IDArticulo' : IDArticulo,
        'Unidades' : unidades
    };

    \$.ajax({
        url: appPath + '/lib/carrito.php',
        dataType: 'html',
        type: 'post',
        data: {'parametros': {'accion': 'add', 'datos': datos} },
        success: function(resultado) {
            var datos = \$.parseJSON(resultado);  
            if (datos.status === 'error') {
                \$('#mensajes').html(datos.errores);
                \$('#mensajes').dialog('open');
            } else {
                html = \"<ul>\";
                html = html + \"<li><span>";
        // line 85
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["macro"]) ? $context["macro"] : null), "idioma", array(0 => "productos"), "method"), "html", null, true);
        echo "</span><span>\"+datos.totales.Unidades+\"</span></li>\";
                html = html + \"<li><span>";
        // line 86
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["macro"]) ? $context["macro"] : null), "idioma", array(0 => "importe"), "method"), "html", null, true);
        echo "</span><span>\"+datos.totales.Importe+\"</span></li>\";
                html = html + \"</ul>\";

                \$('#cajaCarrito').html(html);           
                \$('#verCarrito').html(\"<a href='";
        // line 90
        echo twig_escape_filter($this->env, (isset($context["appPath"]) ? $context["appPath"] : null), "html", null, true);
        echo "/carrito'>";
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["macro"]) ? $context["macro"] : null), "idioma", array(0 => "verCarrito"), "method"), "html", null, true);
        echo "</a>\");
            }
        }
    });
}
</script>";
    }

    public function getTemplateName()
    {
        return "Producto/index.js.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  173 => 90,  162 => 85,  129 => 55,  79 => 13,  55 => 9,  52 => 8,  47 => 7,  25 => 2,  98 => 27,  87 => 28,  80 => 26,  61 => 10,  50 => 18,  28 => 6,  51 => 20,  140 => 43,  137 => 42,  134 => 41,  125 => 39,  117 => 36,  111 => 35,  108 => 34,  96 => 30,  91 => 27,  75 => 23,  71 => 21,  67 => 11,  65 => 18,  60 => 16,  56 => 19,  41 => 6,  33 => 8,  30 => 8,  77 => 24,  73 => 12,  66 => 18,  62 => 17,  58 => 20,  54 => 15,  49 => 13,  43 => 11,  37 => 12,  27 => 5,  22 => 3,  39 => 8,  35 => 5,  24 => 4,  176 => 49,  174 => 48,  170 => 46,  166 => 86,  164 => 44,  160 => 42,  157 => 41,  154 => 40,  152 => 39,  145 => 45,  139 => 36,  132 => 33,  126 => 31,  124 => 30,  121 => 29,  119 => 28,  115 => 27,  109 => 26,  103 => 33,  97 => 21,  85 => 19,  82 => 24,  78 => 23,  74 => 15,  64 => 12,  48 => 11,  45 => 17,  31 => 3,  23 => 3,  21 => 3,  19 => 1,  46 => 12,  44 => 16,  36 => 6,  32 => 7,  29 => 7,  26 => 3,);
    }
}
