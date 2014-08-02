<?php

/* _global/listadoArticulosPaginados.html.twig */
class __TwigTemplate_e64e9984f1b714ef691164574087ed0815f6178ead1ec3d632a2c362591b3c9c extends Twig_Template
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
        $this->env->loadTemplate("_global/paginacion.html.twig")->display(array_merge($context, array("paginacion" => (isset($context["paginacion"]) ? $context["paginacion"] : null), "linkBy" => (isset($context["linkBy"]) ? $context["linkBy"] : null))));
        // line 4
        echo "
<ul id=\"product_list\" class=\"categorie_product clear\">
";
        // line 6
        $context["row"] = 0;
        // line 7
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["articulos"]) ? $context["articulos"] : null));
        $context['loop'] = array(
          'parent' => $context['_parent'],
          'index0' => 0,
          'index'  => 1,
          'first'  => true,
        );
        if (is_array($context['_seq']) || (is_object($context['_seq']) && $context['_seq'] instanceof Countable)) {
            $length = count($context['_seq']);
            $context['loop']['revindex0'] = $length - 1;
            $context['loop']['revindex'] = $length;
            $context['loop']['length'] = $length;
            $context['loop']['last'] = 1 === $length;
        }
        foreach ($context['_seq'] as $context["_key"] => $context["articulo"]) {
            // line 8
            echo "    <li class=\"";
            if ((($this->getAttribute((isset($context["loop"]) ? $context["loop"] : null), "index") - ((isset($context["row"]) ? $context["row"] : null) * 3)) % 2 == 1)) {
                echo "regular";
            } else {
                echo "centro";
            }
            echo " clearfix\">
        ";
            // line 9
            $this->env->loadTemplate("_global/minifichaProducto.html.twig")->display(array_merge($context, array("articulo" => (isset($context["articulo"]) ? $context["articulo"] : null))));
            // line 10
            echo "    </li>
    ";
            // line 11
            if ((0 == $this->getAttribute((isset($context["loop"]) ? $context["loop"] : null), "index") % 3)) {
                // line 12
                echo "        <li class=\"clear clear_line\"></li>
        ";
                // line 13
                $context["row"] = ((isset($context["row"]) ? $context["row"] : null) + 1);
                // line 14
                echo "    ";
            }
            ++$context['loop']['index0'];
            ++$context['loop']['index'];
            $context['loop']['first'] = false;
            if (isset($context['loop']['length'])) {
                --$context['loop']['revindex0'];
                --$context['loop']['revindex'];
                $context['loop']['last'] = 0 === $context['loop']['revindex0'];
            }
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['articulo'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 16
        echo "    <li class=\"clear clear_line\"></li>
</ul>

";
        // line 19
        $this->env->loadTemplate("_global/paginacion.html.twig")->display(array_merge($context, array("paginacion" => (isset($context["paginacion"]) ? $context["paginacion"] : null), "linkBy" => (isset($context["linkBy"]) ? $context["linkBy"] : null))));
    }

    public function getTemplateName()
    {
        return "_global/listadoArticulosPaginados.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  88 => 19,  83 => 16,  68 => 14,  66 => 13,  63 => 12,  61 => 11,  58 => 10,  56 => 9,  47 => 8,  30 => 7,  28 => 6,  24 => 4,  22 => 3,  19 => 2,);
    }
}
