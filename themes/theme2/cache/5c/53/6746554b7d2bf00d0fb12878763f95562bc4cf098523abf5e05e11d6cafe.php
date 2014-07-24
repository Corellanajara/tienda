<?php

/* _global/listadoArticulos.html.twig */
class __TwigTemplate_5c536746554b7d2bf00d0fb12878763f95562bc4cf098523abf5e05e11d6cafe extends Twig_Template
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
        echo "<div class=\"destacados_home\">
    <h2>";
        // line 3
        echo twig_escape_filter($this->env, (isset($context["titulo"]) ? $context["titulo"] : null), "html", null, true);
        echo "</h2>
    <ul>
    ";
        // line 5
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
            // line 6
            echo "        <li class=\"";
            if ((0 == $this->getAttribute((isset($context["loop"]) ? $context["loop"] : null), "index") % 4)) {
                echo "endrow";
            } else {
                echo "regular";
            }
            echo "\">
            <p class=\"image_product_list\">
                <a href=\"";
            // line 8
            echo twig_escape_filter($this->env, (isset($context["appPath"]) ? $context["appPath"] : null), "html", null, true);
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["articulo"]) ? $context["articulo"] : null), "UrlFriendly"), "html", null, true);
            echo "\" class=\"product_img_link\" title=\"";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["articulo"]) ? $context["articulo"] : null), "Descripcion"), "html", null, true);
            echo "\">
                    <img src=\"";
            // line 9
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["app"]) ? $context["app"] : null), "path"), "html", null, true);
            echo "/";
            echo twig_escape_filter($this->env, (isset($context["theme"]) ? $context["theme"] : null), "html", null, true);
            echo "/";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["articulo"]) ? $context["articulo"] : null), "PathNameImagenN", array(0 => 1), "method"), "html", null, true);
            echo "\" alt=\"\"/>
                </a>
                <span class=\"icons\">
                    <span class=\"";
            // line 12
            echo twig_escape_filter($this->env, (isset($context["icono"]) ? $context["icono"] : null), "html", null, true);
            echo "\"> </span>
                </span>
            </p>
            <h3>
                <a href=\"";
            // line 16
            echo twig_escape_filter($this->env, (isset($context["appPath"]) ? $context["appPath"] : null), "html", null, true);
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["articulo"]) ? $context["articulo"] : null), "UrlFriendly"), "html", null, true);
            echo "\" title=\"";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["articulo"]) ? $context["articulo"] : null), "Descripcion"), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["articulo"]) ? $context["articulo"] : null), "Descripcion"), "html", null, true);
            echo "</a>
            </h3>
            <p class=\"product_desc\">";
            // line 18
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["macro"]) ? $context["macro"] : null), "recortaTexto", array(0 => $this->getAttribute((isset($context["articulo"]) ? $context["articulo"] : null), "Resumen"), 1 => 30), "method"), "html", null, true);
            echo "</p>
            <p class=\"pprice\">
                <span>";
            // line 20
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["macro"]) ? $context["macro"] : null), "moneda", array(0 => $this->getAttribute((isset($context["articulo"]) ? $context["articulo"] : null), "PrecioWeb")), "method"), "html", null, true);
            echo "</span>
            </p>
        </li>
    ";
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
        // line 24
        echo "    </ul>
</div>
";
    }

    public function getTemplateName()
    {
        return "_global/listadoArticulos.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  111 => 24,  93 => 20,  88 => 18,  78 => 16,  71 => 12,  61 => 9,  54 => 8,  44 => 6,  27 => 5,  22 => 3,  19 => 2,);
    }
}
