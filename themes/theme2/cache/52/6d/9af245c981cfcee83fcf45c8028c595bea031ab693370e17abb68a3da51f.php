<?php

/* Familias/index.html.twig */
class __TwigTemplate_526d9af245c981cfcee83fcf45c8028c595bea031ab693370e17abb68a3da51f extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->blocks = array(
            'content' => array($this, 'block_content'),
        );
    }

    protected function doGetParent(array $context)
    {
        return $this->env->resolveTemplate((isset($context["layout"]) ? $context["layout"] : null));
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 12
        $context["familia"] = $this->getAttribute((isset($context["values"]) ? $context["values"] : null), "familia");
        // line 13
        $context["logo"] = $this->getAttribute((isset($context["familia"]) ? $context["familia"] : null), "PathNameImagenN", array(0 => 1), "method");
        $this->getParent($context)->display($context, array_merge($this->blocks, $blocks));
    }

    // line 15
    public function block_content($context, array $blocks = array())
    {
        // line 16
        echo "<div class=\"portada\">
    <div class=\"list_categorie_product\">    
        <div class=\"list_product\">
            <h1 class=\"category_title\">
            ";
        // line 20
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["familia"]) ? $context["familia"] : null), "Familia"), "html", null, true);
        echo " (";
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["macro"]) ? $context["macro"] : null), "idioma", array(0 => "hay"), "method"), "html", null, true);
        echo " ";
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["values"]) ? $context["values"] : null), "articulos"), "paginacion"), "totalItems"), "html", null, true);
        echo " ";
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["macro"]) ? $context["macro"] : null), "idioma", array(0 => "articulos"), "method"), "html", null, true);
        echo ")
            </h1>
            <div class=\"cat_desc\"><p>";
        // line 22
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["familia"]) ? $context["familia"] : null), "Observations"), "html", null, true);
        echo "</p></div>
        </div>

        ";
        // line 39
        echo "
        ";
        // line 40
        $this->env->loadTemplate("_global/listadoArticulosPaginados.html.twig")->display(array_merge($context, array("articulos" => $this->getAttribute($this->getAttribute((isset($context["values"]) ? $context["values"] : null), "articulos"), "articulos"), "paginacion" => $this->getAttribute($this->getAttribute((isset($context["values"]) ? $context["values"] : null), "articulos"), "paginacion"), "linkBy" => $this->getAttribute((isset($context["familia"]) ? $context["familia"] : null), "PrimaryKeyValue"))));
        echo "      

    </div>
</div>
";
    }

    public function getTemplateName()
    {
        return "Familias/index.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  59 => 40,  56 => 39,  50 => 22,  39 => 20,  33 => 16,  30 => 15,  25 => 13,  23 => 12,);
    }
}
