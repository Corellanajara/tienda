<?php

/* Producto/formularioComentario.html.twig */
class __TwigTemplate_a846de479f4f57a5f37379f73584e4e32c99a80e7b9ad2c13e0737859b351611 extends Twig_Template
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
        // line 2
        echo "<div>
    <form name=\"formComentario\" id=\"formComentario\" method=\"post\" action=\"\">
        <div id=\"input_oculto\">
            <input name=\"controller\" value=\"";
        // line 5
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["values"]) ? $context["values"] : null), "controller"), "html", null, true);
        echo "\"/>
            <input name=\"action\" value=\"Comentario\"/>
            <input name=\"datos[Entidad]\" value=\"Articulos\"/>
            <input name=\"datos[IdEntidad]\" value=\"";
        // line 8
        echo twig_escape_filter($this->env, (isset($context["idArticulo"]) ? $context["idArticulo"] : null), "html", null, true);
        echo "\"/>
        </div>
        <fieldset>
\t<div class=\"field\">
            <label for=\"nombre\">";
        // line 12
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["macro"]) ? $context["macro"] : null), "idioma", array(0 => "nombre"), "method"), "html", null, true);
        echo "*</label>
            <input type=\"text\" name=\"datos[Nombre]\" id=\"nombre\" class=\"largo\" value=\"\" maxlength=\"50\" />
\t</div>
\t<div class=\"field\">
            <label for=\"email\">";
        // line 16
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["macro"]) ? $context["macro"] : null), "idioma", array(0 => "email"), "method"), "html", null, true);
        echo "*</label>
            <input type=\"text\" name=\"datos[Email]\" id=\"email\" class=\"largo\" value=\"\" maxlength=\"60\" />
\t</div>
\t<div class=\"field\">
            <label for=\"comentario\">";
        // line 20
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["macro"]) ? $context["macro"] : null), "idioma", array(0 => "comentario"), "method"), "html", null, true);
        echo "*</label>            
            <textarea name=\"datos[Comentario]\" id=\"comentario\" rows=\"4\" cols=\"50\"></textarea>
\t</div>            
        <span id=\"enviarComentario\" class=\"btn_azul\">Enviar</span>
    </form>
</div>
";
    }

    public function getTemplateName()
    {
        return "Producto/formularioComentario.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  51 => 20,  140 => 43,  137 => 42,  134 => 41,  125 => 39,  117 => 36,  111 => 35,  108 => 34,  96 => 30,  91 => 27,  75 => 22,  71 => 21,  67 => 19,  65 => 18,  60 => 16,  56 => 14,  41 => 11,  33 => 8,  30 => 8,  77 => 24,  73 => 22,  66 => 18,  62 => 17,  58 => 16,  54 => 15,  49 => 13,  43 => 11,  37 => 12,  27 => 5,  22 => 3,  39 => 8,  35 => 9,  24 => 5,  176 => 49,  174 => 48,  170 => 46,  166 => 45,  164 => 44,  160 => 42,  157 => 41,  154 => 40,  152 => 39,  145 => 45,  139 => 36,  132 => 33,  126 => 31,  124 => 30,  121 => 29,  119 => 28,  115 => 27,  109 => 26,  103 => 33,  97 => 21,  85 => 19,  82 => 24,  78 => 23,  74 => 15,  64 => 12,  48 => 11,  45 => 10,  31 => 6,  23 => 3,  21 => 3,  19 => 2,  46 => 12,  44 => 16,  36 => 6,  32 => 7,  29 => 7,  26 => 3,);
    }
}
