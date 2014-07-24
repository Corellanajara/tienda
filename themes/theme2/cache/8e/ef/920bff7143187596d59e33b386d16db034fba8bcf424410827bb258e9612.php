<?php

/* _global/wgCajaCarrito.html.twig */
class __TwigTemplate_8eef920bff7143187596d59e33b386d16db034fba8bcf424410827bb258e9612 extends Twig_Template
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
        // line 3
        echo "
";
        // line 23
        echo "<ul class=\"shopping_cart_top\">
    <li>
        <a href=\"";
        // line 25
        echo twig_escape_filter($this->env, (isset($context["appPath"]) ? $context["appPath"] : null), "html", null, true);
        echo "/carrito\" title=\"";
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["macro"]) ? $context["macro"] : null), "idioma", array(0 => "hacerPedido"), "method"), "html", null, true);
        echo "\" rel=\"nofollow\">
            <span class=\"ajax_cart_no_product \">";
        // line 26
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["macro"]) ? $context["macro"] : null), "idioma", array(0 => "carroVacio"), "method"), "html", null, true);
        echo "</span>
            <span class=\"ajax_cart_quantity\"></span>
            <span class=\"ajax_cart_product hidden\">
                ";
        // line 29
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["macro"]) ? $context["macro"] : null), "idioma", array(0 => "articulo"), "method"), "html", null, true);
        echo " |
                <span class=\"ajax_cart_total\"><strong></strong></span>
            </span>
            <span class=\"ajax_cart_product  hidden\">
                ";
        // line 33
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["macro"]) ? $context["macro"] : null), "idioma", array(0 => "articulos"), "method"), "html", null, true);
        echo " |
                <span class=\"ajax_cart_total\"><strong></strong></span>
            </span>
        </a>
    </li>
</ul>";
    }

    public function getTemplateName()
    {
        return "_global/wgCajaCarrito.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  38 => 29,  32 => 26,  26 => 25,  27 => 5,  22 => 23,  19 => 3,  159 => 38,  154 => 32,  148 => 13,  142 => 12,  136 => 59,  130 => 57,  127 => 56,  125 => 55,  117 => 51,  114 => 50,  108 => 47,  104 => 46,  100 => 45,  95 => 42,  93 => 41,  89 => 39,  87 => 38,  81 => 34,  78 => 33,  76 => 32,  60 => 18,  57 => 17,  55 => 16,  51 => 14,  49 => 13,  45 => 33,  36 => 8,  33 => 6,  31 => 6,  25 => 2,  23 => 1,);
    }
}
