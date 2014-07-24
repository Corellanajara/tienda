<?php

/* _global/error.html.twig */
class __TwigTemplate_1c5fee035f10ae277e1de63ddbbda4433d174fb4db640bf57f97a37e98fdf3ae extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->blocks = array(
            'content' => array($this, 'block_content'),
        );
    }

    protected function doGetParent(array $context)
    {
        return $this->env->resolveTemplate((isset($context["layout"]) ? $context["layout"] : null));
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->getParent($context)->display($context, array_merge($this->blocks, $blocks));
    }

    // line 4
    public function block_content($context, array $blocks = array())
    {
        // line 5
        echo "<div class=\"MensajeError\">
    <h1 class=\"TituloError\">Upps!! Algo falló</h1>
    ";
        // line 7
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["values"]) ? $context["values"] : null), "error"), "html", null, true);
        echo "
</div>
";
    }

    public function getTemplateName()
    {
        return "_global/error.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  33 => 7,  29 => 5,  26 => 4,);
    }
}
