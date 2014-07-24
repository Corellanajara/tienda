<?php

/* _global/wgBannersZona1.html.twig */
class __TwigTemplate_320870d262c0af38809a4b11d1853bd741617a7ff73d5de3037e0fc50f8d30f2 extends Twig_Template
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
        $context["banners"] = $this->getAttribute($this->getAttribute((isset($context["values"]) ? $context["values"] : null), "widgets"), "getBanners", array(0 => "Aside derecho", 1 => 0, 2 => (-1), 3 => 1), "method");
        // line 4
        $context["nBanner"] = twig_length_filter($this->env, (isset($context["banners"]) ? $context["banners"] : null));
        // line 5
        echo "
<div id=\"newsticker-demo\">    
";
        // line 7
        if (((isset($context["nBanner"]) ? $context["nBanner"] : null) <= 3)) {
            // line 8
            echo "    <ul>
        ";
            // line 9
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["banners"]) ? $context["banners"] : null));
            foreach ($context['_seq'] as $context["_key"] => $context["banner"]) {
                // line 10
                echo "        <li>
            <div class=\"thumbnail\">
                ";
                // line 12
                if ($this->getAttribute($this->getAttribute((isset($context["banner"]) ? $context["banner"] : null), "url"), "url")) {
                    // line 13
                    echo "                    <a href=\"";
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["banner"]) ? $context["banner"] : null), "url"), "url"), "html", null, true);
                    echo "\" title=\"";
                    echo twig_escape_filter($this->env, $this->getAttribute((isset($context["banner"]) ? $context["banner"] : null), "titulo"), "html", null, true);
                    echo "\" rel=\"pop-up\">
                ";
                }
                // line 15
                echo "                    <img src=\"";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["app"]) ? $context["app"] : null), "path"), "html", null, true);
                echo "/";
                echo twig_escape_filter($this->env, (isset($context["theme"]) ? $context["theme"] : null), "html", null, true);
                echo "/";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["banner"]) ? $context["banner"] : null), "imagenes"), 0, array(), "array"), "html", null, true);
                echo "\" title=\"";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["banner"]) ? $context["banner"] : null), "nombre"), "html", null, true);
                echo "\" alt=\"";
                echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute((isset($context["banner"]) ? $context["banner"] : null), "nombre"), ""), "html", null, true);
                echo "\" />
                ";
                // line 16
                if ($this->getAttribute($this->getAttribute((isset($context["banner"]) ? $context["banner"] : null), "url"), "url")) {
                    // line 17
                    echo "                    </a>
                ";
                }
                // line 18
                echo " 
            </div>
        </li>
        ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['banner'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 22
            echo "
    </ul>        
";
        } else {
            // line 24
            echo "  
    <div class=\"newsticker-jcarousellite\">              
        <ul>
            ";
            // line 27
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["banners"]) ? $context["banners"] : null));
            foreach ($context['_seq'] as $context["_key"] => $context["banner"]) {
                // line 28
                echo "            <li>
                <div class=\"thumbnail\">
                    ";
                // line 30
                if ($this->getAttribute($this->getAttribute((isset($context["banner"]) ? $context["banner"] : null), "url"), "url")) {
                    // line 31
                    echo "                        <a href=\"";
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["banner"]) ? $context["banner"] : null), "url"), "url"), "html", null, true);
                    echo "\" title=\"";
                    echo twig_escape_filter($this->env, $this->getAttribute((isset($context["banner"]) ? $context["banner"] : null), "titulo"), "html", null, true);
                    echo "\" rel=\"pop-up\">
                    ";
                }
                // line 33
                echo "                    <img src=\"";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["app"]) ? $context["app"] : null), "path"), "html", null, true);
                echo "/";
                echo twig_escape_filter($this->env, (isset($context["theme"]) ? $context["theme"] : null), "html", null, true);
                echo "/";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["banner"]) ? $context["banner"] : null), "imagenes"), 0, array(), "array"), "html", null, true);
                echo "\" title=\"";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["banner"]) ? $context["banner"] : null), "titulo"), "html", null, true);
                echo "\" alt=\"";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["banner"]) ? $context["banner"] : null), "titulo"), "html", null, true);
                echo "\" />
                    ";
                // line 34
                if ($this->getAttribute($this->getAttribute((isset($context["banner"]) ? $context["banner"] : null), "url"), "url")) {
                    // line 35
                    echo "                        </a>
                    ";
                }
                // line 36
                echo "                            
                </div>
            </li>  
            ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['banner'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 39
            echo "                                                                                                                           
        </ul>
    </div>
";
        }
        // line 42
        echo "           
</div> ";
    }

    public function getTemplateName()
    {
        return "_global/wgBannersZona1.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  143 => 42,  137 => 39,  124 => 35,  122 => 34,  109 => 33,  101 => 31,  99 => 30,  91 => 27,  86 => 24,  81 => 22,  72 => 18,  68 => 17,  66 => 16,  43 => 12,  35 => 9,  30 => 7,  26 => 5,  95 => 28,  83 => 20,  70 => 17,  64 => 16,  58 => 15,  55 => 14,  53 => 15,  42 => 11,  38 => 10,  32 => 8,  29 => 6,  39 => 10,  27 => 5,  24 => 4,  22 => 3,  19 => 2,  170 => 54,  165 => 48,  159 => 13,  153 => 12,  147 => 75,  141 => 73,  138 => 72,  136 => 71,  128 => 36,  125 => 66,  119 => 63,  115 => 62,  111 => 61,  106 => 58,  104 => 57,  100 => 55,  98 => 54,  92 => 50,  89 => 49,  87 => 21,  51 => 14,  49 => 13,  45 => 13,  36 => 13,  33 => 7,  31 => 6,  25 => 2,  23 => 1,);
    }
}
