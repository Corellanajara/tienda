<?php

/* _global/wgCategorias.html.twig */
class __TwigTemplate_217280c9f7a6ae7f3d99dcd396a2e339cbc81e53a6ddf4638db834d93ab9666e extends Twig_Template
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
        $context["categorias"] = $this->getAttribute($this->getAttribute((isset($context["values"]) ? $context["values"] : null), "widgets"), "getCategorias");
        // line 4
        $context["familiaActual"] = $this->getAttribute($this->getAttribute((isset($context["values"]) ? $context["values"] : null), "familia"), "IDFamilia");
        // line 5
        echo "
";
        // line 6
        if (twig_length_filter($this->env, (isset($context["categorias"]) ? $context["categorias"] : null))) {
            // line 7
            echo "<div id=\"categories_block_left\" class=\"block\">    
<h4 >";
            // line 8
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["macro"]) ? $context["macro"] : null), "idioma", array(0 => "categorias"), "method"), "html", null, true);
            echo "</h4>
    <div class=\"block_content\">
        <ul class=\"tree dhtml\">
        ";
            // line 11
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["categorias"]) ? $context["categorias"] : null));
            foreach ($context['_seq'] as $context["_key"] => $context["categoria"]) {
                // line 12
                echo "            <li>
                <span class=\"grower ";
                // line 13
                if (((isset($context["familiaActual"]) ? $context["familiaActual"] : null) == $this->getAttribute($this->getAttribute((isset($context["categoria"]) ? $context["categoria"] : null), "categoria"), "IDFamilia"))) {
                    echo "block;";
                } else {
                    echo "none;";
                }
                echo "\"></span>
                <a href=\"";
                // line 14
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["categoria"]) ? $context["categoria"] : null), "categoria"), "Href"), "url"), "html", null, true);
                echo "\" title=\"";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["categoria"]) ? $context["categoria"] : null), "categoria"), "Familia"), "html", null, true);
                echo "\">";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["categoria"]) ? $context["categoria"] : null), "categoria"), "Familia"), "html", null, true);
                echo "</a>                       
                ";
                // line 15
                if ((twig_length_filter($this->env, $this->getAttribute((isset($context["categoria"]) ? $context["categoria"] : null), "familias")) > 0)) {
                    // line 16
                    echo "                    <ul style=\"display: ";
                    if (((isset($context["familiaActual"]) ? $context["familiaActual"] : null) == $this->getAttribute($this->getAttribute((isset($context["categoria"]) ? $context["categoria"] : null), "categoria"), "IDFamilia"))) {
                        echo "block;";
                    } else {
                        echo "none;";
                    }
                    echo "\">
                    ";
                    // line 17
                    $context['_parent'] = (array) $context;
                    $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["categoria"]) ? $context["categoria"] : null), "familias"));
                    foreach ($context['_seq'] as $context["_key"] => $context["familia"]) {
                        echo "   
                        <li class=\"";
                        // line 18
                        if (((isset($context["familia"]) ? $context["familia"] : null) == twig_last($this->env, $this->getAttribute((isset($context["categoria"]) ? $context["categoria"] : null), "familias")))) {
                            echo " last ";
                        }
                        echo "\">
                            <a href=\"";
                        // line 19
                        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["familia"]) ? $context["familia"] : null), "Href"), "url"), "html", null, true);
                        echo "\" title=\"";
                        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["familia"]) ? $context["familia"] : null), "Familia"), "html", null, true);
                        echo "\">";
                        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["familia"]) ? $context["familia"] : null), "Familia"), "html", null, true);
                        echo "</a>
                        </li>
                    ";
                    }
                    $_parent = $context['_parent'];
                    unset($context['_seq'], $context['_iterated'], $context['_key'], $context['familia'], $context['_parent'], $context['loop']);
                    $context = array_intersect_key($context, $_parent) + $_parent;
                    // line 22
                    echo "                    </ul>   
                ";
                }
                // line 23
                echo "  
            </li>           
        ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['categoria'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 25
            echo "                          
        </ul>
    </div>
</div>
";
        }
    }

    public function getTemplateName()
    {
        return "_global/wgCategorias.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  111 => 25,  103 => 23,  99 => 22,  86 => 19,  80 => 18,  74 => 17,  65 => 16,  63 => 15,  55 => 14,  47 => 13,  44 => 12,  40 => 11,  34 => 8,  31 => 7,  29 => 6,  26 => 5,  24 => 4,  22 => 3,  19 => 2,);
    }
}
