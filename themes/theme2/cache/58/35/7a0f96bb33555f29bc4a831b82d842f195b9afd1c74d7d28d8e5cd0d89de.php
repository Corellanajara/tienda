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
        <li><a href=\"";
        // line 5
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["app"]) ? $context["app"] : null), "path"), "html", null, true);
        echo "/quienes-somos\">";
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["macro"]) ? $context["macro"] : null), "idioma", array(0 => "quienesSomos"), "method"), "html", null, true);
        echo "</a></li>        
        <li><a href=\"";
        // line 6
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["app"]) ? $context["app"] : null), "path"), "html", null, true);
        echo "/pedidos\">";
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["macro"]) ? $context["macro"] : null), "idioma", array(0 => "pedidos"), "method"), "html", null, true);
        echo "</a></li>        
        <li><a href=\"";
        // line 7
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["app"]) ? $context["app"] : null), "path"), "html", null, true);
        echo "/garantia\">";
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["macro"]) ? $context["macro"] : null), "idioma", array(0 => "serviciosYGarantia"), "method"), "html", null, true);
        echo "</a></li>        
        <li><a href=\"";
        // line 8
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["app"]) ? $context["app"] : null), "path"), "html", null, true);
        echo "/aviso-legal\">";
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["macro"]) ? $context["macro"] : null), "idioma", array(0 => "avisoLegal"), "method"), "html", null, true);
        echo "</a></li>        
        ";
        // line 14
        echo "        ";
        $this->env->loadTemplate("_global/wgBuscador.html.twig")->display($context);
        // line 15
        echo "    </ul>
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
        return array (  54 => 15,  51 => 14,  45 => 8,  39 => 7,  33 => 6,  27 => 5,  23 => 4,  19 => 2,);
    }
}
