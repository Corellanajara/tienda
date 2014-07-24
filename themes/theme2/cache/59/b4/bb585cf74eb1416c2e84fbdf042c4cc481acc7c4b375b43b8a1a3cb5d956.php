<?php

/* _global/header.html.twig */
class __TwigTemplate_59b4bb585cf74eb1416c2e84fbdf042c4cc481acc7c4b375b43b8a1a3cb5d956 extends Twig_Template
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
        echo "<div id=\"header\">
    <div id=\"logo\">
        <a href=\"";
        // line 4
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["app"]) ? $context["app"] : null), "path"), "html", null, true);
        echo "/\" title=\"Conasi\" id=\"conasi\">
            <span class=\"remp\">Conasi</span>
        </a>
        <p onclick=\"javascript:location.href = '";
        // line 7
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["app"]) ? $context["app"] : null), "path"), "html", null, true);
        echo "/contacto';\"><a href=\"";
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["app"]) ? $context["app"] : null), "path"), "html", null, true);
        echo "/contacto\" class=\"remp\">Atención al cliente: Lunes a Viernes de 9:30-13:30 h y 15:30-19:00 h. info .arroba. conasi.eu 619 524 895</a></p>
    </div>
</div>";
    }

    public function getTemplateName()
    {
        return "_global/header.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  21 => 3,  148 => 41,  142 => 39,  140 => 38,  133 => 36,  126 => 35,  124 => 34,  120 => 33,  116 => 32,  108 => 31,  100 => 30,  89 => 24,  84 => 21,  82 => 20,  50 => 10,  42 => 8,  532 => 156,  528 => 155,  517 => 154,  501 => 151,  486 => 150,  471 => 147,  468 => 146,  465 => 145,  462 => 144,  450 => 143,  438 => 127,  427 => 125,  424 => 124,  413 => 122,  411 => 121,  408 => 120,  395 => 119,  380 => 104,  374 => 103,  366 => 102,  360 => 101,  356 => 100,  351 => 99,  346 => 97,  341 => 96,  325 => 95,  313 => 82,  298 => 80,  294 => 79,  289 => 77,  278 => 75,  268 => 74,  263 => 73,  251 => 72,  233 => 60,  225 => 59,  214 => 57,  208 => 55,  206 => 54,  192 => 53,  178 => 43,  174 => 42,  169 => 41,  162 => 37,  158 => 35,  150 => 30,  134 => 27,  131 => 26,  122 => 24,  97 => 16,  93 => 15,  88 => 14,  78 => 19,  68 => 10,  63 => 8,  60 => 14,  44 => 153,  41 => 149,  38 => 4,  35 => 107,  28 => 64,  22 => 2,  19 => 2,  129 => 25,  123 => 14,  117 => 13,  111 => 23,  105 => 36,  99 => 34,  96 => 29,  94 => 32,  86 => 28,  83 => 27,  77 => 24,  69 => 16,  64 => 19,  62 => 18,  55 => 15,  53 => 11,  45 => 12,  36 => 8,  33 => 7,  31 => 3,  25 => 2,  23 => 4,  73 => 17,  71 => 26,  65 => 15,  61 => 24,  58 => 16,  56 => 12,  49 => 6,  47 => 20,  43 => 18,  40 => 17,  37 => 16,  34 => 6,  32 => 84,  29 => 7,  26 => 12,);
    }
}
