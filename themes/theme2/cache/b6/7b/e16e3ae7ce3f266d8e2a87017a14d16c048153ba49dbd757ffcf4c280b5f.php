<?php

/* _global/addFavoritos.html.twig */
class __TwigTemplate_b67be16e3ae7ce3f266d8e2a87017a14d16c048153ba49dbd757ffcf4c280b5f extends Twig_Template
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
        if (($this->getAttribute((isset($context["user"]) ? $context["user"] : null), "Id") > 0)) {
            // line 3
            echo "<div class=\"addFavoritos\">
    <form name=\"formAddFavoritos";
            // line 4
            echo twig_escape_filter($this->env, (isset($context["idArticulo"]) ? $context["idArticulo"] : null), "html", null, true);
            echo "\" id=\"formAddFavoritos";
            echo twig_escape_filter($this->env, (isset($context["idArticulo"]) ? $context["idArticulo"] : null), "html", null, true);
            echo "\" method=\"POST\" action=\"\">
        <div id=\"input_oculto\">
        <input name=\"controller\" id=\"controller";
            // line 6
            echo twig_escape_filter($this->env, (isset($context["idArticulo"]) ? $context["idArticulo"] : null), "html", null, true);
            echo "\" value=\"Favoritos\"/>
        <input name=\"action\" id=\"action";
            // line 7
            echo twig_escape_filter($this->env, (isset($context["idArticulo"]) ? $context["idArticulo"] : null), "html", null, true);
            echo "\" value=\"add\"/>
        <input name=\"idArticulo\" value=\"";
            // line 8
            echo twig_escape_filter($this->env, (isset($context["idArticulo"]) ? $context["idArticulo"] : null), "html", null, true);
            echo "\"/>
        </div>        
        <input type=\"submit\" class=\"boton btn_azul right\" value=\"";
            // line 10
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["macro"]) ? $context["macro"] : null), "idioma", array(0 => "addFavorito"), "method"), "html", null, true);
            echo "\"/>
    </form>  
</div>
";
        }
    }

    public function getTemplateName()
    {
        return "_global/addFavoritos.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  39 => 8,  35 => 7,  24 => 4,  176 => 49,  174 => 48,  170 => 46,  166 => 45,  164 => 44,  160 => 42,  157 => 41,  154 => 40,  152 => 39,  145 => 37,  139 => 36,  132 => 33,  126 => 31,  124 => 30,  121 => 29,  119 => 28,  115 => 27,  109 => 26,  103 => 22,  97 => 21,  85 => 19,  82 => 18,  78 => 17,  74 => 15,  64 => 12,  48 => 11,  45 => 10,  31 => 6,  23 => 3,  21 => 3,  19 => 2,  46 => 12,  44 => 10,  36 => 6,  32 => 5,  29 => 7,  26 => 3,);
    }
}
