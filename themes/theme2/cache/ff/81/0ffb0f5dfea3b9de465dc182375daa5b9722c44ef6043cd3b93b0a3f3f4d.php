<?php

/* _global/asideLeft.html.twig */
class __TwigTemplate_ff810ffb0f5dfea3b9de465dc182375daa5b9722c44ef6043cd3b93b0a3f3f4d extends Twig_Template
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
        echo "<div id=\"left_column\" class=\"column\">
    ";
        // line 3
        $this->env->loadTemplate("_global/wgCategorias.html.twig")->display($context);
        // line 4
        echo "    ";
        $this->env->loadTemplate("_global/wgBannersZona1.html.twig")->display($context);
        // line 5
        echo "
    ";
        // line 13
        echo "    
    ";
        // line 15
        echo "    ";
        $this->env->loadTemplate("_global/wgBoletin.html.twig")->display($context);
        // line 16
        echo "    <div id=\"confianza_online\" class=\"block conline\">
        <p><a href=\"https://www.confianzaonline.es/empresas/conasi.htm\" target=\"_blank\"><img src=\"https://www.confianzaonline.es/selloanimado.gif\" border=\"0\" alt=\"Entidad adherida a Confianza Online\"/></a> Tienda online adherida a <strong>Confianza Online</strong>.</p>
    </div>
    <div id=\"creative commons\" class=\"block ccommons\">
        <p>
            <a rel=\"license\" href=\"http://creativecommons.org/licenses/by-nc/3.0/deed.es_ES\"><img alt=\"Licencia Creative Commons\" style=\"border-width:0\" src=\"http://i.creativecommons.org/l/by-nc/3.0/88x31.png\"/></a>
            <div>Esta obra est&aacute; bajo una <a rel=\"license\" href=\"http://creativecommons.org/licenses/by-nc/3.0/deed.es_ES\">licencia Creative Commons Atribuci&oacute;n-NoComercial 3.0 Unported</a></div>
        </p>
    </div>
</div>

";
    }

    public function getTemplateName()
    {
        return "_global/asideLeft.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  36 => 16,  33 => 15,  30 => 13,  27 => 5,  24 => 4,  22 => 3,  19 => 2,);
    }
}
