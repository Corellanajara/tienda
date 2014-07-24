<?php

/* _global/wgArticulosRelacionados.html.twig */
class __TwigTemplate_9739e85196c36c308ea6c3410acc9b46f57881f36a5888246e09071350fa76ba extends Twig_Template
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
        if ((twig_length_filter($this->env, (isset($context["articulos"]) ? $context["articulos"] : null)) > 0)) {
            // line 4
            echo "<div class=\"widget_persianart_cycleposts widget\">
    <div class=\"h-wrapper\">
        <h2 class=\"tituloOtrosProductos\">";
            // line 6
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["macro"]) ? $context["macro"] : null), "idioma", array(0 => "tambienTePuedeInteresar"), "method"), "html", null, true);
            echo "<span class=\"line\"></span></h3>
    </div>
    <div id=\"testimonial-cycle-widget\">
        <div class=\"testimonial-widget-nav\">
            <div class=\"next\"></div>
            <div class=\"prev\"></div>
        </div>

        <div id=\"testimonial-widget-1\">
            <ul>
\t\t";
            // line 16
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["articulos"]) ? $context["articulos"] : null));
            foreach ($context['_seq'] as $context["_key"] => $context["articulo"]) {
                // line 17
                echo "                ";
                $context["imagen"] = $this->getAttribute((isset($context["articulo"]) ? $context["articulo"] : null), "PathNameImagenN", array(0 => 3), "method");
                echo "              
                <li class=\"testimonial testi-widget ";
                // line 18
                if ((!(isset($context["imagen"]) ? $context["imagen"] : null))) {
                    echo "testi-noimage";
                }
                echo "\">
                    ";
                // line 19
                if ((isset($context["imagen"]) ? $context["imagen"] : null)) {
                    // line 20
                    echo "                    <div class=\"testi-pic\">
                        <a href=\"";
                    // line 21
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["articulo"]) ? $context["articulo"] : null), "Href"), "url"), "html", null, true);
                    echo "\"><img src=\"";
                    echo twig_escape_filter($this->env, $this->getAttribute((isset($context["app"]) ? $context["app"] : null), "path"), "html", null, true);
                    echo "/";
                    echo twig_escape_filter($this->env, (isset($context["theme"]) ? $context["theme"] : null), "html", null, true);
                    echo "/";
                    echo twig_escape_filter($this->env, (isset($context["imagen"]) ? $context["imagen"] : null), "html", null, true);
                    echo "\" alt=\"";
                    echo twig_escape_filter($this->env, $this->getAttribute((isset($context["articulo"]) ? $context["articulo"] : null), "Descripcion"), "html", null, true);
                    echo "\" /></a>
                    </div>
                    ";
                }
                // line 23
                echo "                    

                    <div>
                    <a href=\"";
                // line 26
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["articulo"]) ? $context["articulo"] : null), "Href"), "url"), "html", null, true);
                echo "\">";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["articulo"]) ? $context["articulo"] : null), "Resumen"), "html", null, true);
                echo "</a>
                    <span class=\"testi-name\">
                        <span class=\"testi-user\">";
                // line 28
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["macro"]) ? $context["macro"] : null), "moneda", array(0 => $this->getAttribute((isset($context["articulo"]) ? $context["articulo"] : null), "PrecioVentaConImpuestos")), "method"), "html", null, true);
                echo "</span>
                    </span>
                    </div>
                </li>
                ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['articulo'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 33
            echo "            </ul>
        </div>
    </div>
</div>
";
        }
    }

    public function getTemplateName()
    {
        return "_global/wgArticulosRelacionados.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  98 => 33,  87 => 28,  80 => 26,  61 => 21,  50 => 18,  28 => 6,  51 => 20,  140 => 43,  137 => 42,  134 => 41,  125 => 39,  117 => 36,  111 => 35,  108 => 34,  96 => 30,  91 => 27,  75 => 23,  71 => 21,  67 => 19,  65 => 18,  60 => 16,  56 => 19,  41 => 16,  33 => 8,  30 => 8,  77 => 24,  73 => 22,  66 => 18,  62 => 17,  58 => 20,  54 => 15,  49 => 13,  43 => 11,  37 => 12,  27 => 5,  22 => 3,  39 => 8,  35 => 9,  24 => 4,  176 => 49,  174 => 48,  170 => 46,  166 => 45,  164 => 44,  160 => 42,  157 => 41,  154 => 40,  152 => 39,  145 => 45,  139 => 36,  132 => 33,  126 => 31,  124 => 30,  121 => 29,  119 => 28,  115 => 27,  109 => 26,  103 => 33,  97 => 21,  85 => 19,  82 => 24,  78 => 23,  74 => 15,  64 => 12,  48 => 11,  45 => 17,  31 => 6,  23 => 3,  21 => 3,  19 => 2,  46 => 12,  44 => 16,  36 => 6,  32 => 7,  29 => 7,  26 => 3,);
    }
}
