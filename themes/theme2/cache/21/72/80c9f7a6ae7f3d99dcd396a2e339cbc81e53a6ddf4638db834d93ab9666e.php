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
        echo "
";
        // line 5
        if (twig_length_filter($this->env, (isset($context["categorias"]) ? $context["categorias"] : null))) {
            // line 6
            echo "<div id=\"categories_block_left\" class=\"block\">    
<h4 >";
            // line 7
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["macro"]) ? $context["macro"] : null), "idioma", array(0 => "categorias"), "method"), "html", null, true);
            echo "</h4>
    <div class=\"block_content\">
        <ul class=\"tree dhtml\">
        ";
            // line 10
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["categorias"]) ? $context["categorias"] : null));
            foreach ($context['_seq'] as $context["_key"] => $context["categoria"]) {
                // line 11
                echo "            <li>
                <a href=\"";
                // line 12
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["categoria"]) ? $context["categoria"] : null), "categoria"), "Href"), "url"), "html", null, true);
                echo "\" title=\"";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["categoria"]) ? $context["categoria"] : null), "categoria"), "Familia"), "html", null, true);
                echo "\">";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["categoria"]) ? $context["categoria"] : null), "categoria"), "Familia"), "html", null, true);
                echo "</a>                       
                ";
                // line 13
                if ((twig_length_filter($this->env, $this->getAttribute((isset($context["categoria"]) ? $context["categoria"] : null), "familias")) > 0)) {
                    // line 14
                    echo "                    <ul>
                    ";
                    // line 15
                    $context['_parent'] = (array) $context;
                    $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["categoria"]) ? $context["categoria"] : null), "familias"));
                    foreach ($context['_seq'] as $context["_key"] => $context["familia"]) {
                        echo "   
                        <li class=\"";
                        // line 16
                        if (((isset($context["familia"]) ? $context["familia"] : null) == twig_last($this->env, $this->getAttribute((isset($context["categoria"]) ? $context["categoria"] : null), "familias")))) {
                            echo " last ";
                        }
                        echo "\">
                            <a href=\"";
                        // line 17
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
                    // line 20
                    echo "                    </ul>   
                ";
                }
                // line 21
                echo "  
            </li>           
        ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['categoria'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 23
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
        return array (  95 => 23,  83 => 20,  70 => 17,  64 => 16,  58 => 15,  55 => 14,  53 => 13,  42 => 11,  38 => 10,  32 => 7,  29 => 6,  39 => 14,  27 => 5,  24 => 4,  22 => 3,  19 => 2,  170 => 54,  165 => 48,  159 => 13,  153 => 12,  147 => 75,  141 => 73,  138 => 72,  136 => 71,  128 => 67,  125 => 66,  119 => 63,  115 => 62,  111 => 61,  106 => 58,  104 => 57,  100 => 55,  98 => 54,  92 => 50,  89 => 49,  87 => 21,  51 => 14,  49 => 13,  45 => 12,  36 => 13,  33 => 7,  31 => 6,  25 => 2,  23 => 1,);
    }
}
