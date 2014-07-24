<?php

/* Index/index.html.twig */
class __TwigTemplate_bee02411b5758e3a15a4b043f937f833e729c6c347b7e64b6314db65f37c2caf extends Twig_Template
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
        $this->getParent($context)->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_content($context, array $blocks = array())
    {
        // line 4
        echo "    <div class=\"portada\">
        ";
        // line 5
        if ($this->getAttribute((isset($context["values"]) ? $context["values"] : null), "carruselPortada")) {
            // line 6
            echo "            ";
            $context["lote"] = $this->getAttribute($this->getAttribute((isset($context["values"]) ? $context["values"] : null), "widgets"), "getLotesWeb", array(0 => 1), "method");
            // line 7
            echo "            ";
            $this->env->loadTemplate("_global/carousel.html.twig")->display(array_merge($context, array("objetos" => $this->getAttribute($this->getAttribute((isset($context["lote"]) ? $context["lote"] : null), 0, array(), "array"), "articulos"), "nImagen" => 3)));
            // line 8
            echo "        ";
        }
        // line 9
        echo "            
        ";
        // line 10
        $this->env->loadTemplate("_global/listadoArticulos.html.twig")->display(array_merge($context, array("icono" => "icono_novedad", "titulo" => $this->getAttribute((isset($context["macro"]) ? $context["macro"] : null), "idioma", array(0 => "novedades"), "method"), "articulos" => $this->getAttribute($this->getAttribute((isset($context["values"]) ? $context["values"] : null), "widgets"), "getArticulosZona", array(0 => $this->getAttribute((isset($context["values"]) ? $context["values"] : null), "controller"), 1 => 1), "method"))));
        echo "           
        ";
        // line 11
        $this->env->loadTemplate("_global/listadoArticulos.html.twig")->display(array_merge($context, array("icono" => "icono_oferta", "titulo" => $this->getAttribute((isset($context["macro"]) ? $context["macro"] : null), "idioma", array(0 => "ofertas"), "method"), "articulos" => $this->getAttribute($this->getAttribute((isset($context["values"]) ? $context["values"] : null), "widgets"), "getArticulosZona", array(0 => $this->getAttribute((isset($context["values"]) ? $context["values"] : null), "controller"), 1 => 2), "method"))));
        // line 12
        echo "        ";
        $this->env->loadTemplate("_global/listadoArticulos.html.twig")->display(array_merge($context, array("icono" => "", "titulo" => $this->getAttribute((isset($context["macro"]) ? $context["macro"] : null), "idioma", array(0 => "destacados"), "method"), "articulos" => $this->getAttribute($this->getAttribute((isset($context["values"]) ? $context["values"] : null), "widgets"), "getArticulosZona", array(0 => $this->getAttribute((isset($context["values"]) ? $context["values"] : null), "controller"), 1 => 3), "method"))));
        // line 13
        echo "    </div>
";
    }

    public function getTemplateName()
    {
        return "Index/index.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  55 => 13,  52 => 12,  50 => 11,  46 => 10,  43 => 9,  40 => 8,  37 => 7,  34 => 6,  32 => 5,  29 => 4,  26 => 3,);
    }
}
