<?php

/* _global/share.html.twig */
class __TwigTemplate_9175050a3edad0ddb2c288ea952e0768be6c976707d5017b4d8583c869fcd3be extends Twig_Template
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
        echo "<section class=\"social\">
    <article>
        <div class=\"g-plusone\" data-size=\"medium\" data-href=\"";
        // line 3
        echo twig_escape_filter($this->env, (isset($context["appPath"]) ? $context["appPath"] : null), "html", null, true);
        echo twig_escape_filter($this->env, (isset($context["urlAmigable"]) ? $context["urlAmigable"] : null), "html", null, true);
        echo "\"></div>                
    </article>
    <article>
        <div class=\"fb-like\" data-href=\"";
        // line 6
        echo twig_escape_filter($this->env, (isset($context["appPath"]) ? $context["appPath"] : null), "html", null, true);
        echo twig_escape_filter($this->env, (isset($context["urlAmigable"]) ? $context["urlAmigable"] : null), "html", null, true);
        echo "\" data-send=\"false\" data-layout=\"button_count\" data-show-faces=\"false\" data-font=\"arial\"></div>
    </article>
    <article>
        <a href=\"https://twitter.com/share\" class=\"twitter-share-button\" data-related=\"jasoncosta\" data-lang=\"";
        // line 9
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["values"]) ? $context["values"] : null), "LANGUAGE"), "html", null, true);
        echo "\" data-size=\"medium\" data-count=\"none\" data-url=\"";
        echo twig_escape_filter($this->env, (isset($context["appPath"]) ? $context["appPath"] : null), "html", null, true);
        echo twig_escape_filter($this->env, (isset($context["urlAmigable"]) ? $context["urlAmigable"] : null), "html", null, true);
        echo "\">";
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["values"]) ? $context["values"] : null), "LABELS"), "comparteEnTwitter"), "html", null, true);
        echo "</a>
    </article>
</section> ";
    }

    public function getTemplateName()
    {
        return "_global/share.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  30 => 6,  77 => 24,  73 => 22,  66 => 18,  62 => 17,  58 => 16,  54 => 15,  49 => 13,  43 => 11,  37 => 9,  27 => 5,  22 => 3,  39 => 8,  35 => 8,  24 => 4,  176 => 49,  174 => 48,  170 => 46,  166 => 45,  164 => 44,  160 => 42,  157 => 41,  154 => 40,  152 => 39,  145 => 37,  139 => 36,  132 => 33,  126 => 31,  124 => 30,  121 => 29,  119 => 28,  115 => 27,  109 => 26,  103 => 22,  97 => 21,  85 => 19,  82 => 18,  78 => 17,  74 => 15,  64 => 12,  48 => 11,  45 => 10,  31 => 6,  23 => 3,  21 => 3,  19 => 1,  46 => 12,  44 => 10,  36 => 6,  32 => 7,  29 => 6,  26 => 3,);
    }
}
