<?php

/* _global/carousel.html.twig */
class __TwigTemplate_bfe367cce49c603a32f52ad10b68e9a371ece739d2358981927c0823fb39b5c5 extends Twig_Template
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
<div class=\"lof-module-slideshow basic\">
    <div class=\"lof-slideshow-bd-10434722391406214208 lof-slideshow-bd\">
        <div class=\"lofslideshow-container lofslideshow-container-10434722391406214208\">
            <div id=\"lof-begin-slide-10434722391406214208\" class=\"lofflexslider\">
                <ul class=\"slides\">
                ";
        // line 8
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["objetos"]) ? $context["objetos"] : null));
        foreach ($context['_seq'] as $context["_key"] => $context["objeto"]) {
            // line 9
            echo "                <li>
                    <a href=\"";
            // line 10
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["objeto"]) ? $context["objeto"] : null), "Href"), "url"), "html", null, true);
            echo "\" title=\"";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["objeto"]) ? $context["objeto"] : null), "__toString"), "html", null, true);
            echo "\" target=\"_self\">
                    <img src=\"";
            // line 11
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["app"]) ? $context["app"] : null), "path"), "html", null, true);
            echo "/";
            echo twig_escape_filter($this->env, (isset($context["theme"]) ? $context["theme"] : null), "html", null, true);
            echo "/";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["objeto"]) ? $context["objeto"] : null), "getPathNameImagenN", array(0 => (isset($context["nImagen"]) ? $context["nImagen"] : null)), "method"), "html", null, true);
            echo "\" alt=\"";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["objeto"]) ? $context["objeto"] : null), "__toString"), "html", null, true);
            echo "\" width=\"340\" height=\"340\"/>
                    </a>
                    <h2><a href=\"";
            // line 13
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["objeto"]) ? $context["objeto"] : null), "Href"), "url"), "html", null, true);
            echo "\" title=\"";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["objeto"]) ? $context["objeto"] : null), "__toString", array(), "method"), "html", null, true);
            echo "\" target=\"_self\">";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["objeto"]) ? $context["objeto"] : null), "__toString", array(), "method"), "html", null, true);
            echo "</a></h2>
                    <p class=\"desc\">";
            // line 14
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["objeto"]) ? $context["objeto"] : null), "__toString"), "html", null, true);
            echo "</p>
                    <p class=\"boton\"><a href=\"";
            // line 15
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["objeto"]) ? $context["objeto"] : null), "Href"), "url"), "html", null, true);
            echo "\" title=\"";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["objeto"]) ? $context["objeto"] : null), "__toString", array(), "method"), "html", null, true);
            echo "\" target=\"_self\">";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["macro"]) ? $context["macro"] : null), "idioma", array(0 => "masInfo"), "method"), "html", null, true);
            echo "</a></p>
                </li>
                ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['objeto'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 17
        echo "                    
                </ul>
            </div>
            <div class=\"lof-panel-nav-10434722391406214208 lof-panel-nav\">
                <ol class=\"lof-control-nav lof-control-nav-10434722391406214208\">
                    ";
        // line 22
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["objetos"]) ? $context["objetos"] : null));
        foreach ($context['_seq'] as $context["_key"] => $context["objeto"]) {
            // line 23
            echo "                    <li>
                        <a href=\"#\">1</a>
                    </li>
                    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['objeto'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 27
        echo "                </ol>
            </div>
        </div>
    </div>
</div>
<script type=\"text/javascript\">//<![CDATA[
    \$(window).load(function() {
        \$('#lof-begin-slide-10434722391406214208').lofflexslider({animation: \"slide\", loftheme: \"basic\", slideshow: 1, slideshowSpeed: 3500, animationDuration: 700, showButtonControlNav: 1, totalItemSlide: 4, startScroll: 3, lenghtscroll: 242, captionMain: 'lof-cap-bottom', pauseOnHover: 1, startNavSlide: 0, slideToStart: 0, itemPrePage: 4, controlNavScaffold: false, moduleId: '10434722391406214208', manualControls: \".lof-control-nav li a\", controlsContainer: \".lofslideshow-container\"});
        \$(\".lof-slideshow-bd-10434722391406214208\").hover(function() {
            \$('.lof-buttons-10434722391406214208').addClass(\"buttons-hover-10434722391406214208\")
        }, function() {
            \$('.lof-buttons-10434722391406214208').removeClass(\"buttons-hover-10434722391406214208\")
        });
    });
//]]></script>
<script language=\"javascript\" type=\"text/javascript\">//<![CDATA[
    \$(document).ready(function() {
        \$(\".lof-tool-item-10434722391406214208\").tooltip({effect: 'slide', offset: [0, 2], onBeforeShow: function(event, position) {
                this.getTip().appendTo(document.body);
                return true;
            }}).dynamic({bottom: {direction: 'up', bounce: true}});
    });
//]]></script>   ";
    }

    public function getTemplateName()
    {
        return "_global/carousel.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  96 => 27,  87 => 23,  83 => 22,  76 => 17,  63 => 15,  59 => 14,  51 => 13,  40 => 11,  34 => 10,  31 => 9,  27 => 8,  19 => 2,);
    }
}
