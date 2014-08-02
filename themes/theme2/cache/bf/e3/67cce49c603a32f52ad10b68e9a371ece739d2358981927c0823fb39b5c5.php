<?php

/* _global/carousel.html.twig */
class __TwigTemplate_bfe367cce49c603a32f52ad10b68e9a371ece739d2358981927c0823fb39b5c5 extends Twig_Template
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
 <div class=\"flex-container\">
<div class=\"flexslider\">

    <ul class=\"slides\">
    ";
        // line 7
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["objetos"]) ? $context["objetos"] : null));
        foreach ($context['_seq'] as $context["_key"] => $context["objeto"]) {
            // line 8
            echo "    <li>
        <a href=\"";
            // line 9
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["objeto"]) ? $context["objeto"] : null), "Href"), "url"), "html", null, true);
            echo "\" title=\"";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["objeto"]) ? $context["objeto"] : null), "__toString"), "html", null, true);
            echo "\" target=\"_self\">
        <img src=\"";
            // line 10
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["app"]) ? $context["app"] : null), "path"), "html", null, true);
            echo "/";
            echo twig_escape_filter($this->env, (isset($context["theme"]) ? $context["theme"] : null), "html", null, true);
            echo "/";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["objeto"]) ? $context["objeto"] : null), "getPathNameImagenN", array(0 => (isset($context["nImagen"]) ? $context["nImagen"] : null)), "method"), "html", null, true);
            echo "\" alt=\"";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["objeto"]) ? $context["objeto"] : null), "__toString"), "html", null, true);
            echo "\" width=\"340\" height=\"340\"/>
        </a>
        <p class=\"flex-caption1\">hola
            <h2><a href=\"";
            // line 13
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["objeto"]) ? $context["objeto"] : null), "Href"), "url"), "html", null, true);
            echo "\" title=\"";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["objeto"]) ? $context["objeto"] : null), "__toString", array(), "method"), "html", null, true);
            echo "\" target=\"_self\">";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["objeto"]) ? $context["objeto"] : null), "__toString", array(), "method"), "html", null, true);
            echo "</a></h2>
            <p class=\"desc\">";
            // line 14
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["objeto"]) ? $context["objeto"] : null), "__toString"), "html", null, true);
            echo "</p>
            <p class=\"boton\"><a href=\"";
            // line 15
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["objeto"]) ? $context["objeto"] : null), "Href"), "url"), "html", null, true);
            echo "\" title=\"";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["objeto"]) ? $context["objeto"] : null), "__toString", array(), "method"), "html", null, true);
            echo "\" target=\"_self\">";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["macro"]) ? $context["macro"] : null), "idioma", array(0 => "masInfo"), "method"), "html", null, true);
            echo "</a></p>
        </p>
    </li>
    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['objeto'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 18
        echo "                    
    </ul>

</div>
 </div>
 ";
    }

    public function getTemplateName()
    {
        return "_global/carousel.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  77 => 18,  63 => 15,  59 => 14,  51 => 13,  39 => 10,  33 => 9,  30 => 8,  26 => 7,  19 => 2,);
    }
}
