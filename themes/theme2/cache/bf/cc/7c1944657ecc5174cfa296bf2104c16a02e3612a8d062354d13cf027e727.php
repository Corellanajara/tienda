<?php

/* _global/footer.html.twig */
class __TwigTemplate_bfcc7c1944657ecc5174cfa296bf2104c16a02e3612a8d062354d13cf027e727 extends Twig_Template
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
        echo "<div id=\"footer\">
    <div class=\"path\" id=\"block_various_links_footer\">
        <p class=\"footercopy\">Conasi &copy; 2014 - Especialistas en productos de Cocina Natural </p>
        <script type=\"text/javascript\">var google_tag_params = {ecomm_pagetype: \"home\"};</script>
        <script type=\"text/javascript\">//<![CDATA[
            var google_conversion_id = 959731485;
            var google_custom_params = window.google_tag_params;
            var google_remarketing_only = true;
        //]]></script>
        <script type=\"text/javascript\" src=\"//www.googleadservices.com/pagead/conversion.js\"></script>
        <noscript>
            <div style=\"display:inline;\">
                <img height=\"1\" width=\"1\" style=\"border-style:none;\" alt=\"\" src=\"//googleads.g.doubleclick.net/pagead/viewthroughconversion/959731485/?value=0&amp;guid=ON&amp;script=0\"/>
            </div>
        </noscript>
        <div class=\"block_links\">
            <h4>";
        // line 17
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["macro"]) ? $context["macro"] : null), "idioma", array(0 => "masInfo"), "method"), "html", null, true);
        echo "</h4>
            <ul class=\"bullet\">
                ";
        // line 19
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["values"]) ? $context["values"] : null), "menuPie"));
        foreach ($context['_seq'] as $context["_key"] => $context["item"]) {
            // line 20
            echo "                <li><a href=\"";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["app"]) ? $context["app"] : null), "path"), "html", null, true);
            echo "/";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["item"]) ? $context["item"] : null), "url"), "url"), "html", null, true);
            echo "\" title=\"";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["item"]) ? $context["item"] : null), "titulo"), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["item"]) ? $context["item"] : null), "titulo"), "html", null, true);
            echo "</a></li>
                ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['item'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 22
        echo "            </ul>
        </div>
        <div id=\"contact_block\" class=\"block\">
            <h4 class=\"title_block\">Contacte con nosotros</h4>
            <div class=\"block_content clearfix\">
                <p>Nuestra línea directa está disponible 24/7</p>
            </div>
        </div>
        <div id=\"wishlist_block\" class=\"block account\">
            <h4>
                <a href=\"http://www.conasi.eu//modules/blockwishlist/mywishlist.php\">lista de regalos</a>
            </h4>
            <div class=\"block_content\">
                <div id=\"wishlist_block_list\" class=\"expanded\">
                    <dl class=\"products\">
                        <dt>Ningún producto</dt>
                    </dl>
                </div>
                <p class=\"align_center\">
                    <a href=\"http://www.conasi.eu/modules/blockwishlist/mywishlist.php\" class=\"exclusive\" title=\"Mis listas de regalo\">Mis listas de regalo</a>
                </p>
            </div>
        </div>
        <div id=\"social\">
            <p class=\"bocadillo\"><span class=\"remp\">Si necesita información más detallada para personas con alergias o detalles de nuestros productos. ¡Pónganse en contacto!</span></p>
            <ul>
                <li class=\"email\"><a href=\"";
        // line 48
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["app"]) ? $context["app"] : null), "path"), "html", null, true);
        echo "/contato\" title=\"Formulario de Contacto\"><span class=\"remp\">info arroba conasi.eu / 619 524 895 / 953 10 25 60</span></a></li>
                <li class=\"facebook\"><a href=\"http://www.facebook.com/conasi/\" title=\"Conasi en Facebook\"><span class=\"remp\">Facebook</span></a></li>
                <li class=\"twitter\"><a href=\"https://twitter.com/#!/ConasiCocina\" title=\"Conasi en Twitter\"><span class=\"remp\">Twitter</span></a></li>
            </ul>
        </div>
        <br class=\"clear\"/></div>
</div>
";
    }

    public function getTemplateName()
    {
        return "_global/footer.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  89 => 48,  61 => 22,  46 => 20,  42 => 19,  37 => 17,  19 => 1,);
    }
}
