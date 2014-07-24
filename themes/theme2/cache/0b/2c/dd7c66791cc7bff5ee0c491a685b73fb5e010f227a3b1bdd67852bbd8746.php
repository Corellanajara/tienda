<?php

/* Producto/productoInfo.html.twig */
class __TwigTemplate_0b2cdd7c66791cc7bff5ee0c491a685b73fb5e010f227a3b1bdd67852bbd8746 extends Twig_Template
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
        $context["galeria"] = $this->getAttribute((isset($context["values"]) ? $context["values"] : null), "galeria");
        // line 2
        $context["imagen"] = $this->getAttribute($this->getAttribute((isset($context["values"]) ? $context["values"] : null), "producto"), "PathNameImagenN", array(0 => 2), "method");
        // line 3
        echo "<section class=\"productoInfo\">

    <div class=\"imagenes\">                   
        <div class=\"imagen300\">
            ";
        // line 7
        if ((isset($context["imagen"]) ? $context["imagen"] : null)) {
            // line 8
            echo "            <img src=\"";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["app"]) ? $context["app"] : null), "path"), "html", null, true);
            echo "/";
            echo twig_escape_filter($this->env, (isset($context["theme"]) ? $context["theme"] : null), "html", null, true);
            echo "/";
            echo twig_escape_filter($this->env, (isset($context["imagen"]) ? $context["imagen"] : null), "html", null, true);
            echo "\" alt=\"";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["values"]) ? $context["values"] : null), "producto"), "Descripcion"), "html", null, true);
            echo "\" title=\"";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["values"]) ? $context["values"] : null), "producto"), "Descripcion"), "html", null, true);
            echo "\" />
            ";
        }
        // line 10
        echo "            ";
        if ((twig_length_filter($this->env, (isset($context["galeria"]) ? $context["galeria"] : null)) > 0)) {
            // line 11
            echo "            <a href=\"";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["app"]) ? $context["app"] : null), "path"), "html", null, true);
            echo "/";
            echo twig_escape_filter($this->env, (isset($context["theme"]) ? $context["theme"] : null), "html", null, true);
            echo "/";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["galeria"]) ? $context["galeria"] : null), 0), "PathName"), "html", null, true);
            echo "\" title=\"\"  rel=\"gallery\" class=";
            if ((isset($context["galeria"]) ? $context["galeria"] : null)) {
                echo "\"pirobox_gall";
                echo twig_escape_filter($this->env, (isset($context["key"]) ? $context["key"] : null), "html", null, true);
            } else {
                echo "pirobox";
            }
            echo "\">
                <img src=\"";
            // line 12
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["app"]) ? $context["app"] : null), "path"), "html", null, true);
            echo "/images/icono-lupa-mas.png\" alt=\"";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["values"]) ? $context["values"] : null), "TEXTS"), "masImagenes"), "html", null, true);
            echo "\" title=\"";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["values"]) ? $context["values"] : null), "TEXTS"), "masImagenes"), "html", null, true);
            echo "\" id=\"lupaMas\" />
            </a>
            ";
        }
        // line 15
        echo "        </div>

        ";
        // line 17
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["galeria"]) ? $context["galeria"] : null));
        foreach ($context['_seq'] as $context["keyItem"] => $context["item"]) {
            // line 18
            echo "            ";
            if (((isset($context["keyItem"]) ? $context["keyItem"] : null) > 0)) {
                // line 19
                echo "                <a href=\"";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["app"]) ? $context["app"] : null), "path"), "html", null, true);
                echo "/";
                echo twig_escape_filter($this->env, (isset($context["theme"]) ? $context["theme"] : null), "html", null, true);
                echo "/";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["item"]) ? $context["item"] : null), "PathName"), "html", null, true);
                echo "\" rel=\"gallery\" class=\"pirobox_gall";
                echo twig_escape_filter($this->env, (isset($context["key"]) ? $context["key"] : null), "html", null, true);
                echo "\" title=\"\"></a>
            ";
            }
            // line 21
            echo "        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['keyItem'], $context['item'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 22
        echo "
    </div>

    <div class=\"cajaPrecios\">
        <div><b>";
        // line 26
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["macro"]) ? $context["macro"] : null), "idioma", array(0 => "referencia"), "method"), "html", null, true);
        echo ":</b> ";
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["values"]) ? $context["values"] : null), "producto"), "Codigo"), "html", null, true);
        echo "</div>
        <div>";
        // line 27
        echo $this->getAttribute($this->getAttribute((isset($context["values"]) ? $context["values"] : null), "producto"), "Resumen");
        echo "</div>        
        ";
        // line 28
        if (($this->getAttribute($this->getAttribute((isset($context["values"]) ? $context["values"] : null), "producto"), "PrecioWeb") > 0)) {
            // line 29
            echo "            <div>
                ";
            // line 30
            if (($this->getAttribute($this->getAttribute((isset($context["values"]) ? $context["values"] : null), "producto"), "PvpAnterior") > 0)) {
                // line 31
                echo "                <span class=\"precioAnterior\">";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["macro"]) ? $context["macro"] : null), "moneda", array(0 => $this->getAttribute($this->getAttribute((isset($context["values"]) ? $context["values"] : null), "producto"), "PvpAnterior")), "method"), "html", null, true);
                echo "</span>
                ";
            }
            // line 33
            echo "                <span class=\"precioFinal\">PVP ";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["macro"]) ? $context["macro"] : null), "moneda", array(0 => $this->getAttribute($this->getAttribute((isset($context["values"]) ? $context["values"] : null), "producto"), "PrecioWeb")), "method"), "html", null, true);
            echo "</span>
            </div>
            <div class=\"comprar\">
                <input type=\"text\" class=\"comprarUnidades\" name=\"unidades";
            // line 36
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["values"]) ? $context["values"] : null), "producto"), "IDArticulo"), "html", null, true);
            echo "\" id=\"unidades";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["values"]) ? $context["values"] : null), "producto"), "IDArticulo"), "html", null, true);
            echo "\" value=\"1\"/>
                <input type=\"button\" class=\"boton btn_azul left\" value=\"Comprar\" onclick=\"addCart('";
            // line 37
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["values"]) ? $context["values"] : null), "producto"), "IDArticulo"), "html", null, true);
            echo "',\$('#unidades";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["values"]) ? $context["values"] : null), "producto"), "IDArticulo"), "html", null, true);
            echo "').val());\"/>
            </div>
            ";
            // line 39
            $this->env->loadTemplate("_global/addFavoritos.html.twig")->display(array_merge($context, array("idArticulo" => $this->getAttribute($this->getAttribute((isset($context["values"]) ? $context["values"] : null), "producto"), "IDArticulo"))));
            // line 40
            echo "            ";
            $this->env->loadTemplate("_global/wgStock.html.twig")->display(array_merge($context, array("articulo" => $this->getAttribute((isset($context["values"]) ? $context["values"] : null), "producto"))));
            // line 41
            echo "        ";
        }
        // line 42
        echo "    </div>
    
    ";
        // line 44
        $this->env->loadTemplate("_global/share.html.twig")->display($context);
        // line 45
        echo "    ";
        $template = $this->env->resolveTemplate(($this->getAttribute((isset($context["values"]) ? $context["values"] : null), "controller") . "/solapas.html.twig"));
        $template->display($context);
        // line 46
        echo "    <div class=\"salto10\"></div>
    <div class=\"salto10\"></div>    
    ";
        // line 48
        $this->env->loadTemplate("_global/wgArticulosRelacionados.html.twig")->display(array_merge($context, array("articulos" => $this->getAttribute((isset($context["values"]) ? $context["values"] : null), "articulosRelacionados"))));
        // line 49
        echo "
</section>

<div id=\"mensajes\" title=\"Mensajes\"></div>";
    }

    public function getTemplateName()
    {
        return "Producto/productoInfo.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  176 => 49,  174 => 48,  170 => 46,  166 => 45,  164 => 44,  160 => 42,  157 => 41,  154 => 40,  152 => 39,  145 => 37,  139 => 36,  132 => 33,  126 => 31,  124 => 30,  121 => 29,  119 => 28,  115 => 27,  109 => 26,  103 => 22,  97 => 21,  85 => 19,  82 => 18,  78 => 17,  74 => 15,  64 => 12,  48 => 11,  45 => 10,  31 => 8,  23 => 3,  21 => 2,  19 => 1,  46 => 12,  44 => 11,  36 => 6,  32 => 5,  29 => 7,  26 => 3,);
    }
}
