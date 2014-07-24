<?php

/* _global/wgStock.html.twig */
class __TwigTemplate_793fd5877b831b13ae8e286944103dcbbd3a9cf108f4ca25d465b1461a5ecbb8 extends Twig_Template
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
        echo "
";
        // line 3
        if ($this->getAttribute((isset($context["values"]) ? $context["values"] : null), "mostrarStock")) {
            // line 4
            echo "    
    ";
            // line 5
            $context["existencias"] = $this->getAttribute((isset($context["articulo"]) ? $context["articulo"] : null), "getExistencias");
            // line 6
            echo "    ";
            $context["stock"] = $this->getAttribute((isset($context["existencias"]) ? $context["existencias"] : null), 0, array(), "array");
            // line 7
            echo "
    ";
            // line 8
            if (($this->getAttribute((isset($context["stock"]) ? $context["stock"] : null), "Disponibles") > 0)) {
                // line 9
                echo "        En stock ";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["stock"]) ? $context["stock"] : null), "Disponibles"), "html", null, true);
                echo "
    ";
            } else {
                // line 11
                echo "        ";
                if ($this->getAttribute((isset($context["values"]) ? $context["values"] : null), "avisadorStock")) {
                    // line 12
                    echo "            <div id=\"divAvisadorStock\">
                <a id=\"avisadorStock\">";
                    // line 13
                    echo twig_escape_filter($this->env, $this->getAttribute((isset($context["macro"]) ? $context["macro"] : null), "idioma", array(0 => "avisadorStock"), "method"), "html", null, true);
                    echo "</a>
                <div id=\"dialogoAvisador\" class=\"oculto\">
                    <p>";
                    // line 15
                    echo twig_escape_filter($this->env, $this->getAttribute((isset($context["macro"]) ? $context["macro"] : null), "idioma", array(0 => "indiqueEmailAvisadorStock"), "method"), "html", null, true);
                    echo "</p>
                    <input id=\"idArticuloAvisador\" value=\"";
                    // line 16
                    echo twig_escape_filter($this->env, $this->getAttribute((isset($context["articulo"]) ? $context["articulo"] : null), "IDArticulo"), "html", null, true);
                    echo "\" type=\"hidden\"/>
                    <input id=\"emailAvisadorStock\" value=\"";
                    // line 17
                    echo twig_escape_filter($this->env, $this->getAttribute((isset($context["user"]) ? $context["user"] : null), "email"), "html", null, true);
                    echo "\"/>
                    <input class=\"boton btn_azul left\" type=\"button\" id=\"botonAvisadorStock\" value=\"";
                    // line 18
                    echo twig_escape_filter($this->env, $this->getAttribute((isset($context["macro"]) ? $context["macro"] : null), "idioma", array(0 => "enviar"), "method"), "html", null, true);
                    echo "\"/>
                </div>
            </div>
        ";
                } else {
                    // line 22
                    echo "            Sin stock
        ";
                }
                // line 24
                echo "    ";
            }
        }
    }

    public function getTemplateName()
    {
        return "_global/wgStock.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  77 => 24,  73 => 22,  66 => 18,  62 => 17,  58 => 16,  54 => 15,  49 => 13,  43 => 11,  37 => 9,  27 => 5,  22 => 3,  39 => 8,  35 => 8,  24 => 4,  176 => 49,  174 => 48,  170 => 46,  166 => 45,  164 => 44,  160 => 42,  157 => 41,  154 => 40,  152 => 39,  145 => 37,  139 => 36,  132 => 33,  126 => 31,  124 => 30,  121 => 29,  119 => 28,  115 => 27,  109 => 26,  103 => 22,  97 => 21,  85 => 19,  82 => 18,  78 => 17,  74 => 15,  64 => 12,  48 => 11,  45 => 10,  31 => 6,  23 => 3,  21 => 3,  19 => 2,  46 => 12,  44 => 10,  36 => 6,  32 => 7,  29 => 6,  26 => 3,);
    }
}
