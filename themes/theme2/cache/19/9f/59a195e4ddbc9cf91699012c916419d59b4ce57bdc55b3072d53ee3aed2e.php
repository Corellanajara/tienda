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
<meta name=\"Keywords\" content=\"'";
        // line 17
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["values"]) ? $context["values"] : null), "meta"), "keyWords"), "html", null, true);
        echo "\"/>
<meta name=\"Robots\" content=\"all\"/>
<meta name=\"Author\" content=\"'";
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
        return array (  148 => 41,  142 => 39,  140 => 38,  133 => 36,  126 => 35,  124 => 34,  120 => 33,  116 => 32,  108 => 31,  100 => 30,  89 => 24,  84 => 21,  82 => 20,  50 => 10,  42 => 8,  532 => 156,  528 => 155,  517 => 154,  501 => 151,  486 => 150,  471 => 147,  468 => 146,  465 => 145,  462 => 144,  450 => 143,  438 => 127,  427 => 125,  424 => 124,  413 => 122,  411 => 121,  408 => 120,  395 => 119,  380 => 104,  374 => 103,  366 => 102,  360 => 101,  356 => 100,  351 => 99,  346 => 97,  341 => 96,  325 => 95,  313 => 82,  298 => 80,  294 => 79,  289 => 77,  278 => 75,  268 => 74,  263 => 73,  251 => 72,  233 => 60,  225 => 59,  214 => 57,  208 => 55,  206 => 54,  192 => 53,  178 => 43,  174 => 42,  169 => 41,  162 => 37,  158 => 35,  150 => 30,  134 => 27,  131 => 26,  122 => 24,  97 => 16,  93 => 15,  88 => 14,  78 => 19,  68 => 10,  63 => 8,  60 => 14,  44 => 153,  41 => 149,  38 => 129,  35 => 107,  28 => 64,  22 => 2,  19 => 1,  129 => 25,  123 => 14,  117 => 13,  111 => 23,  105 => 36,  99 => 34,  96 => 29,  94 => 32,  86 => 28,  83 => 27,  77 => 24,  69 => 16,  64 => 19,  62 => 18,  55 => 15,  53 => 11,  45 => 12,  36 => 8,  33 => 7,  31 => 5,  25 => 3,  23 => 1,  73 => 17,  71 => 26,  65 => 15,  61 => 24,  58 => 16,  56 => 12,  49 => 6,  47 => 20,  43 => 18,  40 => 17,  37 => 16,  34 => 6,  32 => 84,  29 => 13,  26 => 12,);
    }
}
