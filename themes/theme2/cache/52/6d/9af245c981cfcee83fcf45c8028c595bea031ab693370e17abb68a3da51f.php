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
        echo "    <div class=\"central\">
        <h2><span>";
        // line 17
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["familia"]) ? $context["familia"] : null), "Familia"), "html", null, true);
        echo " (";
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["macro"]) ? $context["macro"] : null), "idioma", array(0 => "hay"), "method"), "html", null, true);
        echo " ";
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["values"]) ? $context["values"] : null), "articulos"), "paginacion"), "totalItems"), "html", null, true);
        echo " ";
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["macro"]) ? $context["macro"] : null), "idioma", array(0 => "articulos"), "method"), "html", null, true);
        echo ")</span></h2>
        
        <article id=\"infoPrincipal\">
            <div id=\"imagenes\" style=\"float:left;margin-right: 20px;\">
                ";
        // line 21
        if ((isset($context["logo"]) ? $context["logo"] : null)) {
            // line 22
            echo "                    <img src=\"";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["app"]) ? $context["app"] : null), "path"), "html", null, true);
            echo "/";
            echo twig_escape_filter($this->env, (isset($context["theme"]) ? $context["theme"] : null), "html", null, true);
            echo "/";
            echo twig_escape_filter($this->env, (isset($context["logo"]) ? $context["logo"] : null), "html", null, true);
            echo "\" alt=\"";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["familia"]) ? $context["familia"] : null), "Titulo"), "html", null, true);
            echo "\" title=\"";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["familia"]) ? $context["familia"] : null), "Titulo"), "html", null, true);
            echo "\" />             
                ";
        }
        // line 24
        echo "            </div>
            <div id=\"descripcion\" style=\"float:left;width:300px;\">
                ";
        // line 26
        echo $this->getAttribute((isset($context["familia"]) ? $context["familia"] : null), "Descripcion1");
        // line 27
        echo "            </div> 

            ";
        // line 29
        $this->env->loadTemplate("_global/listadoArticulos.html.twig")->display(array_merge($context, array("articulos" => $this->getAttribute((isset($context["values"]) ? $context["values"] : null), "destacados"))));
        echo "            
        </article>

        <section id=\"noticias\">
            ";
        // line 33
        $this->env->loadTemplate("_global/listadoArticulosPaginados.html.twig")->display(array_merge($context, array("articulos" => $this->getAttribute($this->getAttribute((isset($context["values"]) ? $context["values"] : null), "articulos"), "articulos"), "paginacion" => $this->getAttribute($this->getAttribute((isset($context["values"]) ? $context["values"] : null), "articulos"), "paginacion"), "linkBy" => $this->getAttribute((isset($context["familia"]) ? $context["familia"] : null), "PrimaryKeyValue"))));
        // line 34
        echo "        </section>        

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
        return array (  84 => 34,  82 => 33,  75 => 29,  71 => 27,  69 => 26,  65 => 24,  51 => 22,  49 => 21,  36 => 17,  33 => 16,  30 => 15,  25 => 13,  23 => 12,);
    }
}
