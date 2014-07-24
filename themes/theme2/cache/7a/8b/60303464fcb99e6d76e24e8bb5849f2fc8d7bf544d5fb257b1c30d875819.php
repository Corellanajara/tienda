<?php

/* _global/paginacion.html.twig */
class __TwigTemplate_7a8b60303464fcb99e6d76e24e8bb5849f2fc8d7bf544d5fb257b1c30d875819 extends Twig_Template
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
        // line 1
        echo "
";
        // line 2
        if (($this->getAttribute((isset($context["paginacion"]) ? $context["paginacion"] : null), "totalPaginas") > 0)) {
            // line 3
            echo "    <article class=\"paginacion\">   
        <form name=\"paginacion\" id=\"formPaginacion\" method=\"POST\" action=\"\">
            <div id=\"input_oculto\">
                <input name=\"controller\" value=\"";
            // line 6
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["values"]) ? $context["values"] : null), "controller"), "html", null, true);
            echo "\" />
                <input name=\"action\" id=\"action\" value=\"index\" />
                <input name=\"linkBy\" id=\"linkBy\" value=\"";
            // line 8
            echo twig_escape_filter($this->env, (isset($context["linkBy"]) ? $context["linkBy"] : null), "html", null, true);
            echo "\" />
                <input name=\"pagina\" id=\"pagina\" value=\"";
            // line 9
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["paginacion"]) ? $context["paginacion"] : null), "pagina"), "html", null, true);
            echo "\" />
            </div>

            ";
            // line 12
            if (($this->getAttribute((isset($context["paginacion"]) ? $context["paginacion"] : null), "totalPaginas") > 1)) {
                // line 13
                echo "                ";
                if (($this->getAttribute((isset($context["paginacion"]) ? $context["paginacion"] : null), "pagina") > 1)) {
                    // line 14
                    echo "                    ";
                    $context["anterior"] = ($this->getAttribute((isset($context["paginacion"]) ? $context["paginacion"] : null), "pagina") - 1);
                    // line 15
                    echo "                ";
                } else {
                    // line 16
                    echo "                    ";
                    $context["anterior"] = 1;
                    // line 17
                    echo "                ";
                }
                // line 18
                echo "                ";
                if (($this->getAttribute((isset($context["paginacion"]) ? $context["paginacion"] : null), "pagina") < $this->getAttribute((isset($context["paginacion"]) ? $context["paginacion"] : null), "totalPaginas"))) {
                    // line 19
                    echo "                    ";
                    $context["siguiente"] = ($this->getAttribute((isset($context["paginacion"]) ? $context["paginacion"] : null), "pagina") + 1);
                    // line 20
                    echo "                ";
                } else {
                    // line 21
                    echo "                    ";
                    $context["siguiente"] = $this->getAttribute((isset($context["paginacion"]) ? $context["paginacion"] : null), "totalPaginas");
                    // line 22
                    echo "                ";
                }
                // line 23
                echo "                ";
                $context["desde"] = ($this->getAttribute((isset($context["paginacion"]) ? $context["paginacion"] : null), "pagina") - 2);
                // line 24
                echo "                ";
                $context["hasta"] = ($this->getAttribute((isset($context["paginacion"]) ? $context["paginacion"] : null), "pagina") + 2);
                // line 25
                echo "                ";
                if (((isset($context["desde"]) ? $context["desde"] : null) < 1)) {
                    $context["desde"] = 1;
                }
                // line 26
                echo "                ";
                if (((isset($context["hasta"]) ? $context["hasta"] : null) > $this->getAttribute((isset($context["paginacion"]) ? $context["paginacion"] : null), "totalPaginas"))) {
                    $context["hasta"] = $this->getAttribute((isset($context["paginacion"]) ? $context["paginacion"] : null), "totalPaginas");
                }
                // line 27
                echo "
                <a href=\"#\" onclick=\"\$('#pagina').val('1');\$('#formPaginacion').submit();\" title=\"";
                // line 28
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["macro"]) ? $context["macro"] : null), "idioma", array(0 => "inicio"), "method"), "html", null, true);
                echo "\" class=\"inicio\"></a>                    
                <a href=\"#\" onclick=\"\$('#pagina').val('";
                // line 29
                echo twig_escape_filter($this->env, (isset($context["anterior"]) ? $context["anterior"] : null), "html", null, true);
                echo "');\$('#formPaginacion').submit();\" title=\"";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["macro"]) ? $context["macro"] : null), "idioma", array(0 => "anterior"), "method"), "html", null, true);
                echo "\" class=\"anterior\"></a>
                ";
                // line 30
                if (((isset($context["desde"]) ? $context["desde"] : null) > 1)) {
                    echo "<span class=\"separacion\"></span>";
                }
                // line 31
                echo "                ";
                $context['_parent'] = (array) $context;
                $context['_seq'] = twig_ensure_traversable(range((isset($context["desde"]) ? $context["desde"] : null), (isset($context["hasta"]) ? $context["hasta"] : null)));
                foreach ($context['_seq'] as $context["_key"] => $context["i"]) {
                    // line 32
                    echo "                    <a href=\"#\" onclick=\"\$('#pagina').val('";
                    echo twig_escape_filter($this->env, (isset($context["i"]) ? $context["i"] : null), "html", null, true);
                    echo "');\$('#formPaginacion').submit();\" class=\"numeracion ";
                    if (((isset($context["i"]) ? $context["i"] : null) == $this->getAttribute((isset($context["paginacion"]) ? $context["paginacion"] : null), "pagina"))) {
                        echo "activo";
                    }
                    echo "\">";
                    echo twig_escape_filter($this->env, (isset($context["i"]) ? $context["i"] : null), "html", null, true);
                    echo "</a>          
                ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['i'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 34
                echo "                ";
                if (((isset($context["hasta"]) ? $context["hasta"] : null) < $this->getAttribute((isset($context["paginacion"]) ? $context["paginacion"] : null), "totalPaginas"))) {
                    echo "<span class=\"separacion\"></span>";
                }
                // line 35
                echo "                <a href=\"#\" onclick=\"\$('#pagina').val('";
                echo twig_escape_filter($this->env, (isset($context["siguiente"]) ? $context["siguiente"] : null), "html", null, true);
                echo "');\$('#formPaginacion').submit();\" title=\"";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["macro"]) ? $context["macro"] : null), "idioma", array(0 => "siguiente"), "method"), "html", null, true);
                echo "\" class=\"siguiente\"></a>              
                <a href=\"#\" onclick=\"\$('#pagina').val('";
                // line 36
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["paginacion"]) ? $context["paginacion"] : null), "totalPaginas"), "html", null, true);
                echo "');\$('#formPaginacion').submit();\" title=\"";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["macro"]) ? $context["macro"] : null), "idioma", array(0 => "final"), "method"), "html", null, true);
                echo "\" class=\"final\"></a>              
            ";
            }
            // line 38
            echo "                
            Ordenar por:
            <select name=\"orden\" onchange=\"\$('#formPaginacion').submit();\">
                ";
            // line 41
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["values"]) ? $context["values"] : null), "ordenes"));
            foreach ($context['_seq'] as $context["_key"] => $context["value"]) {
                // line 42
                echo "                    <option value=\"";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["value"]) ? $context["value"] : null), "Id"), "html", null, true);
                echo "\" ";
                if (($this->getAttribute((isset($context["value"]) ? $context["value"] : null), "Id") == $this->getAttribute((isset($context["values"]) ? $context["values"] : null), "orden"))) {
                    echo "selected";
                }
                echo ">";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["value"]) ? $context["value"] : null), "Value"), "html", null, true);
                echo "</option>
                ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['value'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 44
            echo "            </select>
            
            Mostrar:
            <select name=\"itemsPorPagina\" onchange=\"\$('#formPaginacion').submit();\">
                ";
            // line 48
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["values"]) ? $context["values"] : null), "articulosPorPagina"));
            foreach ($context['_seq'] as $context["_key"] => $context["value"]) {
                // line 49
                echo "                    <option value=\"";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["value"]) ? $context["value"] : null), "Id"), "html", null, true);
                echo "\" ";
                if (($this->getAttribute((isset($context["value"]) ? $context["value"] : null), "Id") == $this->getAttribute((isset($context["values"]) ? $context["values"] : null), "itemsPorPagina"))) {
                    echo "selected";
                }
                echo ">";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["value"]) ? $context["value"] : null), "Value"), "html", null, true);
                echo "</option>
                ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['value'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 51
            echo "            </select>            
        </form>
    </article>
";
        }
        // line 54
        echo " 
";
    }

    public function getTemplateName()
    {
        return "_global/paginacion.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  203 => 54,  197 => 51,  182 => 49,  178 => 48,  172 => 44,  157 => 42,  153 => 41,  148 => 38,  141 => 36,  134 => 35,  129 => 34,  114 => 32,  109 => 31,  105 => 30,  95 => 28,  92 => 27,  79 => 24,  76 => 23,  70 => 21,  67 => 20,  58 => 17,  55 => 16,  52 => 15,  44 => 12,  38 => 9,  29 => 6,  120 => 33,  117 => 32,  99 => 29,  93 => 23,  87 => 26,  81 => 19,  73 => 22,  64 => 19,  61 => 18,  46 => 13,  39 => 9,  34 => 8,  31 => 6,  27 => 5,  24 => 3,  22 => 2,  19 => 1,  84 => 20,  82 => 25,  75 => 17,  71 => 27,  69 => 26,  65 => 24,  51 => 22,  49 => 14,  36 => 8,  33 => 16,  30 => 15,  25 => 13,  23 => 12,);
    }
}
