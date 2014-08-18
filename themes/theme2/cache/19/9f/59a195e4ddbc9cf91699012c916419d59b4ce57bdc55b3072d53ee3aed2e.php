<?php

/* _global/meta.twig */
class __TwigTemplate_199f59a195e4ddbc9cf91699012c916419d59b4ce57bdc55b3072d53ee3aed2e extends Twig_Template
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
        echo "<title>";
        ob_start();
        // line 2
        echo "    ";
        if ($this->getAttribute($this->getAttribute((isset($context["values"]) ? $context["values"] : null), "meta"), "titleSimple")) {
            // line 3
            echo "        ";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["values"]) ? $context["values"] : null), "meta"), "title"), "html", null, true);
            echo "
    ";
        } else {
            // line 5
            echo "        ";
            if ($this->getAttribute($this->getAttribute((isset($context["values"]) ? $context["values"] : null), "meta"), "titlePosition")) {
                // line 6
                echo "            ";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["values"]) ? $context["values"] : null), "meta"), "webName"), "html", null, true);
                echo " ";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["values"]) ? $context["values"] : null), "meta"), "title"), "html", null, true);
                echo "
        ";
            } else {
                // line 8
                echo "            ";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["values"]) ? $context["values"] : null), "meta"), "title"), "html", null, true);
                echo " ";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["values"]) ? $context["values"] : null), "meta"), "webName"), "html", null, true);
                echo "    
        ";
            }
            // line 10
            echo "    ";
        }
        // line 11
        echo "    ";
        echo trim(preg_replace('/>\s+</', '><', ob_get_clean()));
        // line 12
        echo "</title>
<link rel=\"shortcut icon\" href=\"favicon.ico\"/>
<link rel=\"canonical\" href=\"";
        // line 14
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["app"]) ? $context["app"] : null), "url"), "html", null, true);
        echo twig_escape_filter($this->env, (isset($context["urlAmigable"]) ? $context["urlAmigable"] : null), "html", null, true);
        echo "\">
<meta name=\"Title\" content=\"";
        // line 15
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["values"]) ? $context["values"] : null), "meta"), "title"), "html", null, true);
        echo "\"/>
<meta name=\"Description\" content=\"";
        // line 16
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["values"]) ? $context["values"] : null), "meta"), "description"), "html", null, true);
        echo "\"/>
<meta name=\"Keywords\" content=\"";
        // line 17
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["values"]) ? $context["values"] : null), "meta"), "keyWords"), "html", null, true);
        echo "\"/>
<meta name=\"Robots\" content=\"all\"/>
<meta name=\"Author\" content=\"";
        // line 19
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["values"]) ? $context["values"] : null), "meta"), "author"), "html", null, true);
        echo "\"/>
";
        // line 20
        if (((isset($context["controller"]) ? $context["controller"] : null) == "Index")) {
            // line 21
            echo "    <meta name=\"resource-type\" content=\"Homepage\"/>
    <meta name=\"doc-type\" content=\"Homepage\"/>
";
        }
        // line 24
        echo "<meta name=\"Classification\" content=\"General\"/>
<meta name=\"Distribution\" content=\"Global\"/>
<meta http-equiv=\"Pragma\" content=\"no-cache\"/>
<meta http-equiv=\"Cache-Control\" content=\"no-cache\"/>
<meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf-8\"/>
<meta name=\"Revisit-after\" content=\"";
        // line 29
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["values"]) ? $context["values"] : null), "meta"), "revisitAfter"), "html", null, true);
        echo "\"/>
<meta name=\"robots\" content=\"";
        // line 30
        if (($this->getAttribute((isset($context["values"]) ? $context["values"] : null), "blockRobots") == "1")) {
            echo "noindex,nofollow";
        } else {
            echo "index,follow";
        }
        echo "\" />
<meta name=\"googlebot\" content=\"";
        // line 31
        if (($this->getAttribute((isset($context["values"]) ? $context["values"] : null), "blockRobots") == "1")) {
            echo "noindex,nofollow";
        } else {
            echo "index,follow";
        }
        echo "\" />
<meta name=\"geo.region\" content=\"";
        // line 32
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["values"]) ? $context["values"] : null), "meta"), "geoRegion"), "html", null, true);
        echo "\"/>
<meta name=\"geo.placename\" content=\"";
        // line 33
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["values"]) ? $context["values"] : null), "meta"), "geoPlaceName"), "html", null, true);
        echo "\"/>
";
        // line 34
        if (($this->getAttribute($this->getAttribute((isset($context["values"]) ? $context["values"] : null), "meta"), "geoPositionLatitude") && $this->getAttribute($this->getAttribute((isset($context["values"]) ? $context["values"] : null), "meta"), "geoPositionLongitude"))) {
            // line 35
            echo "    <meta name=\"geo.position\" content=\"";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["values"]) ? $context["values"] : null), "meta"), "geoPositionLatitude"), "html", null, true);
            echo ";";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["values"]) ? $context["values"] : null), "meta"), "geoPositionLongitude"), "html", null, true);
            echo "\"/>
    <meta name=\"ICBM\" content=\"";
            // line 36
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["values"]) ? $context["values"] : null), "meta"), "geoPositionLatitude"), "html", null, true);
            echo ", ";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["values"]) ? $context["values"] : null), "meta"), "geoPositionLongitude"), "html", null, true);
            echo "\"/>    
";
        }
        // line 38
        if ($this->getAttribute($this->getAttribute((isset($context["values"]) ? $context["values"] : null), "meta"), "urlImagen")) {
            // line 39
            echo "<meta property=\"og:image\" content=\"";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["values"]) ? $context["values"] : null), "meta"), "urlImagen"), "html", null, true);
            echo "\">
";
        }
        // line 41
        echo "<link href=\"";
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["app"]) ? $context["app"] : null), "path"), "html", null, true);
        echo "/favicon.ico\" rel=\"shortcut icon\" hreflang=\"es\" />
";
    }

    public function getTemplateName()
    {
        return "_global/meta.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  148 => 41,  142 => 39,  140 => 38,  133 => 36,  126 => 35,  124 => 34,  120 => 33,  116 => 32,  108 => 31,  100 => 30,  96 => 29,  89 => 24,  84 => 21,  82 => 20,  78 => 19,  73 => 17,  69 => 16,  65 => 15,  60 => 14,  56 => 12,  53 => 11,  50 => 10,  42 => 8,  34 => 6,  31 => 5,  25 => 3,  22 => 2,  19 => 1,);
    }
}
