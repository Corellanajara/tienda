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
            echo "   
        <form name=\"paginacion\" id=\"formPaginacion\" method=\"POST\" action=\"\">
            <div id=\"input_oculto\">
                <input name=\"controller\" value=\"";
            // line 5
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["values"]) ? $context["values"] : null), "controller"), "html", null, true);
            echo "\" />
                <input name=\"action\" id=\"action\" value=\"index\" />
                <input name=\"linkBy\" id=\"linkBy\" value=\"";
            // line 7
            echo twig_escape_filter($this->env, (isset($context["linkBy"]) ? $context["linkBy"] : null), "html", null, true);
            echo "\" />
                <input name=\"pagina\" id=\"pagina\" value=\"";
            // line 8
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["paginacion"]) ? $context["paginacion"] : null), "pagina"), "html", null, true);
            echo "\" />
            </div>

            ";
            // line 11
            if (($this->getAttribute((isset($context["paginacion"]) ? $context["paginacion"] : null), "totalPaginas") > 1)) {
                // line 12
                echo "                ";
                if (($this->getAttribute((isset($context["paginacion"]) ? $context["paginacion"] : null), "pagina") > 1)) {
                    // line 13
                    echo "                    ";
                    $context["anterior"] = ($this->getAttribute((isset($context["paginacion"]) ? $context["paginacion"] : null), "pagina") - 1);
                    // line 14
                    echo "                ";
                } else {
                    // line 15
                    echo "                    ";
                    $context["anterior"] = 1;
                    // line 16
                    echo "                ";
                }
                // line 17
                echo "                ";
                if (($this->getAttribute((isset($context["paginacion"]) ? $context["paginacion"] : null), "pagina") < $this->getAttribute((isset($context["paginacion"]) ? $context["paginacion"] : null), "totalPaginas"))) {
                    // line 18
                    echo "                    ";
                    $context["siguiente"] = ($this->getAttribute((isset($context["paginacion"]) ? $context["paginacion"] : null), "pagina") + 1);
                    // line 19
                    echo "                ";
                } else {
                    // line 20
                    echo "                    ";
                    $context["siguiente"] = $this->getAttribute((isset($context["paginacion"]) ? $context["paginacion"] : null), "totalPaginas");
                    // line 21
                    echo "                ";
                }
                // line 22
                echo "                ";
                $context["desde"] = ($this->getAttribute((isset($context["paginacion"]) ? $context["paginacion"] : null), "pagina") - 2);
                // line 23
                echo "                ";
                $context["hasta"] = ($this->getAttribute((isset($context["paginacion"]) ? $context["paginacion"] : null), "pagina") + 2);
                // line 24
                echo "                ";
                if (((isset($context["desde"]) ? $context["desde"] : null) < 1)) {
                    $context["desde"] = 1;
                }
                // line 25
                echo "                ";
                if (((isset($context["hasta"]) ? $context["hasta"] : null) > $this->getAttribute((isset($context["paginacion"]) ? $context["paginacion"] : null), "totalPaginas"))) {
                    $context["hasta"] = $this->getAttribute((isset($context["paginacion"]) ? $context["paginacion"] : null), "totalPaginas");
                }
                // line 26
                echo "
                <a href=\"#\" onclick=\"\$('#pagina').val('1');\$('#formPaginacion').submit();\" title=\"";
                // line 27
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["macro"]) ? $context["macro"] : null), "idioma", array(0 => "inicio"), "method"), "html", null, true);
                echo "\" class=\"inicio\"></a>                    
                <a href=\"#\" onclick=\"\$('#pagina').val('";
                // line 28
                echo twig_escape_filter($this->env, (isset($context["anterior"]) ? $context["anterior"] : null), "html", null, true);
                echo "');\$('#formPaginacion').submit();\" title=\"";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["macro"]) ? $context["macro"] : null), "idioma", array(0 => "anterior"), "method"), "html", null, true);
                echo "\" class=\"anterior\"></a>
                ";
                // line 29
                if (((isset($context["desde"]) ? $context["desde"] : null) > 1)) {
                    echo "<span class=\"separacion\"></span>";
                }
                // line 30
                echo "                ";
                $context['_parent'] = (array) $context;
                $context['_seq'] = twig_ensure_traversable(range((isset($context["desde"]) ? $context["desde"] : null), (isset($context["hasta"]) ? $context["hasta"] : null)));
                foreach ($context['_seq'] as $context["_key"] => $context["i"]) {
                    // line 31
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
                // line 33
                echo "                ";
                if (((isset($context["hasta"]) ? $context["hasta"] : null) < $this->getAttribute((isset($context["paginacion"]) ? $context["paginacion"] : null), "totalPaginas"))) {
                    echo "<span class=\"separacion\"></span>";
                }
                // line 34
                echo "                <a href=\"#\" onclick=\"\$('#pagina').val('";
                echo twig_escape_filter($this->env, (isset($context["siguiente"]) ? $context["siguiente"] : null), "html", null, true);
                echo "');\$('#formPaginacion').submit();\" title=\"";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["macro"]) ? $context["macro"] : null), "idioma", array(0 => "siguiente"), "method"), "html", null, true);
                echo "\" class=\"siguiente\"></a>              
                <a href=\"#\" onclick=\"\$('#pagina').val('";
                // line 35
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["paginacion"]) ? $context["paginacion"] : null), "totalPaginas"), "html", null, true);
                echo "');\$('#formPaginacion').submit();\" title=\"";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["macro"]) ? $context["macro"] : null), "idioma", array(0 => "final"), "method"), "html", null, true);
                echo "\" class=\"final\"></a>              
            ";
            }
            // line 37
            echo "                
            <p class=\"select\">
                <select name=\"orden\" onchange=\"\$('#formPaginacion').submit();\">
                ";
            // line 40
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["values"]) ? $context["values"] : null), "ordenes"));
            foreach ($context['_seq'] as $context["_key"] => $context["value"]) {
                // line 41
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
            // line 43
            echo "                </select>
            
            Mostrar:
            <select name=\"itemsPorPagina\" onchange=\"\$('#formPaginacion').submit();\">
                ";
            // line 47
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["values"]) ? $context["values"] : null), "articulosPorPagina"));
            foreach ($context['_seq'] as $context["_key"] => $context["value"]) {
                // line 48
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
            // line 50
            echo "            </select>
            </p>
        </form>
";
        }
        // line 53
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
        return array (  202 => 53,  196 => 50,  181 => 48,  177 => 47,  171 => 43,  156 => 41,  152 => 40,  147 => 37,  140 => 35,  133 => 34,  128 => 33,  113 => 31,  108 => 30,  104 => 29,  98 => 28,  94 => 27,  91 => 26,  86 => 25,  81 => 24,  78 => 23,  75 => 22,  72 => 21,  69 => 20,  66 => 19,  63 => 18,  60 => 17,  57 => 16,  54 => 15,  51 => 14,  48 => 13,  45 => 12,  43 => 11,  37 => 8,  33 => 7,  28 => 5,  22 => 2,  19 => 1,);
    }
}
