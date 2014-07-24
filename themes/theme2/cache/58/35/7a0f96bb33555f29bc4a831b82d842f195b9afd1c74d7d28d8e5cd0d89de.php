<?php

/* _global/head.html.twig */
class __TwigTemplate_58357a0f96bb33555f29bc4a831b82d842f195b9afd1c74d7d28d8e5cd0d89de extends Twig_Template
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
        echo "<div class=\"sf-contener\">
    <ul class=\"sf-menu\">
        <li><a href=\"/\">";
        // line 4
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["macro"]) ? $context["macro"] : null), "idioma", array(0 => "inicio"), "method"), "html", null, true);
        echo "</a></li>
        ";
        // line 5
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["values"]) ? $context["values"] : null), "menuCabecera"));
        foreach ($context['_seq'] as $context["_key"] => $context["item"]) {
            // line 6
            echo "            <li><a href=\"";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["app"]) ? $context["app"] : null), "path"), "html", null, true);
            echo "/";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["item"]) ? $context["item"] : null), "url"), "url"), "html", null, true);
            echo "\" ";
            if ($this->getAttribute($this->getAttribute((isset($context["item"]) ? $context["item"] : null), "url"), "targetBlank")) {
                echo " target=\"_blank\"";
            }
            echo ">";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["item"]) ? $context["item"] : null), "titulo"), "html", null, true);
            echo "</a></li>
        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['item'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 8
        echo "        <li class=\"sf-search noBack\" style=\"float:right\">
            <form id=\"searchbox\" action=\"/search.php\" method=\"get\">
                <input type=\"hidden\" value=\"position\" name=\"orderby\"/>
                <input type=\"hidden\" value=\"desc\" name=\"orderway\"/>
                <input type=\"text\" id=\"search_query\" name=\"search_query\" value=\"";
        // line 12
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["macro"]) ? $context["macro"] : null), "idioma", array(0 => "palabraBusqueda"), "method"), "html", null, true);
        echo "\" 
                       onfocus=\"javascript:if (this.value === '";
        // line 13
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["macro"]) ? $context["macro"] : null), "idioma", array(0 => "palabraBusqueda"), "method"), "html", null, true);
        echo "') this.value = '';\" 
                       onblur=\"javascript:if (this.value === '') this.value = '";
        // line 14
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["macro"]) ? $context["macro"] : null), "idioma", array(0 => "palabraBusqueda"), "method"), "html", null, true);
        echo "';\"/>
                <input name=\"buscartop\" id=\"buscartop\" type=\"submit\" value=\"";
        // line 15
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["macro"]) ? $context["macro"] : null), "idioma", array(0 => "buscar"), "method"), "html", null, true);
        echo "\"/>
            </form>
        </li>
    </ul>
</div>";
    }

    public function getTemplateName()
    {
        return "_global/head.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  66 => 15,  62 => 14,  58 => 13,  54 => 12,  48 => 8,  31 => 6,  27 => 5,  23 => 4,  19 => 2,);
    }
}
