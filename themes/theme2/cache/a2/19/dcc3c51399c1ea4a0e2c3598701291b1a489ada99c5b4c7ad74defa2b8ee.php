<?php

/* _global/wgBreadcrumb.html.twig */
class __TwigTemplate_a219dcc3c51399c1ea4a0e2c3598701291b1a489ada99c5b4c7ad74defa2b8ee extends Twig_Template
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
        echo "<div class=\"breadcrumb\">
    <p>";
        // line 3
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["macro"]) ? $context["macro"] : null), "idioma", array(0 => "saludo"), "method"), "html", null, true);
        echo "</p>
    <ul class=\"accountop\">
        <li><a href=\"";
        // line 5
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["app"]) ? $context["app"] : null), "path"), "html", null, true);
        echo "/zona-privada\" id=\"try-1\">";
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["macro"]) ? $context["macro"] : null), "idioma", array(0 => "entrar"), "method"), "html", null, true);
        echo "</a></li>
        <li><span>";
        // line 6
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["macro"]) ? $context["macro"] : null), "idioma", array(0 => "miCuenta"), "method"), "html", null, true);
        echo "</span></li>
    </ul>
</div>";
    }

    public function getTemplateName()
    {
        return "_global/wgBreadcrumb.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  27 => 5,  22 => 3,  19 => 2,  159 => 38,  154 => 32,  148 => 13,  142 => 12,  136 => 59,  130 => 57,  127 => 56,  125 => 55,  117 => 51,  114 => 50,  108 => 47,  104 => 46,  100 => 45,  95 => 42,  93 => 41,  89 => 39,  87 => 38,  81 => 34,  78 => 33,  76 => 32,  60 => 18,  57 => 17,  55 => 16,  51 => 14,  49 => 13,  45 => 12,  36 => 8,  33 => 6,  31 => 6,  25 => 2,  23 => 1,);
    }
}
