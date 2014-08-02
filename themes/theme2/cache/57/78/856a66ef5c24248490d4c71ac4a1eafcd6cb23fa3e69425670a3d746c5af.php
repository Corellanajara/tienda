<?php

/* _global/css.twig */
class __TwigTemplate_5778856a66ef5c24248490d4c71ac4a1eafcd6cb23fa3e69425670a3d746c5af extends Twig_Template
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
        echo "<link href=\"http://fonts.googleapis.com/css?family=Yanone+Kaffeesatz\" rel=\"stylesheet\" type=\"text/css\"/>
<link type=\"text/css\" rel=\"stylesheet\" href=\"";
        // line 2
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["app"]) ? $context["app"] : null), "path"), "html", null, true);
        echo "/";
        echo twig_escape_filter($this->env, (isset($context["theme"]) ? $context["theme"] : null), "html", null, true);
        echo "/css/style.css\" /> ";
        // line 3
        echo "<link type=\"text/css\" rel=\"stylesheet\" href=\"";
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["app"]) ? $context["app"] : null), "path"), "html", null, true);
        echo "/";
        echo twig_escape_filter($this->env, (isset($context["theme"]) ? $context["theme"] : null), "html", null, true);
        echo "/css/estilos_pirobox/pirobox.css\"/> ";
        // line 4
        echo "<link type=\"text/css\" rel=\"stylesheet\" href=\"";
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["app"]) ? $context["app"] : null), "path"), "html", null, true);
        echo "/";
        echo twig_escape_filter($this->env, (isset($context["theme"]) ? $context["theme"] : null), "html", null, true);
        echo "/css/bjqs.css\"> <!-- SLIDER HOME -->
<link type=\"text/css\" rel=\"stylesheet\" href=\"";
        // line 5
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["app"]) ? $context["app"] : null), "path"), "html", null, true);
        echo "/";
        echo twig_escape_filter($this->env, (isset($context["theme"]) ? $context["theme"] : null), "html", null, true);
        echo "/css/jquery.ui.dialog.css\"> <!-- SLIDER HOME -->
<link type=\"text/css\" rel=\"stylesheet\" href=\"";
        // line 6
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["app"]) ? $context["app"] : null), "path"), "html", null, true);
        echo "/";
        echo twig_escape_filter($this->env, (isset($context["theme"]) ? $context["theme"] : null), "html", null, true);
        echo "/css/flexslider.css\"> <!-- SLIDER HOME -->";
    }

    public function getTemplateName()
    {
        return "_global/css.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  46 => 6,  40 => 5,  33 => 4,  27 => 3,  22 => 2,  19 => 1,);
    }
}
