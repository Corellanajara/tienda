<?php

/* _global/layoutLaptop.html.twig */
class __TwigTemplate_62b295f9cc118694ede0d6b920b178068e63fc25f5ce28da2b0d9f6085bf93c1 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'header' => array($this, 'block_header'),
            'head' => array($this, 'block_head'),
            'content' => array($this, 'block_content'),
            'footer' => array($this, 'block_footer'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        $context["macro"] = $this->env->loadTemplate("_global/macros.html.twig");
        // line 2
        echo "
<!DOCTYPE html PUBLIC \"-//W3C//DTD XHTML 1.1//EN\" \"http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd\">
<html xmlns=\"http://www.w3.org/1999/xhtml\" xml:lang=\"es\">
<head>
    ";
        // line 6
        $this->env->loadTemplate("_global/meta.twig")->display($context);
        // line 7
        echo "    ";
        $this->env->loadTemplate("_global/googleAnalytics.js.twig")->display($context);
        // line 8
        echo "    ";
        $template = $this->env->resolveTemplate($this->getAttribute((isset($context["values"]) ? $context["values"] : null), "archivoCss"));
        $template->display($context);
        echo "             
</head>
<body id=\"index\" itemscope itemtype=\"http://schema.org/WebPage\">
    <div class=\"page\">
        ";
        // line 12
        $this->displayBlock('header', $context, $blocks);
        echo "        
        ";
        // line 13
        $this->displayBlock('head', $context, $blocks);
        // line 14
        echo "        <div id=\"main_center_column\">
            <div id=\"center_column\">
                ";
        // line 16
        $this->env->loadTemplate("_global/wgBreadcrumb.html.twig")->display($context);
        // line 17
        echo "                ";
        $this->env->loadTemplate("_global/wgCajaCarrito.html.twig")->display($context);
        // line 18
        echo "
                <div id=\"fb-root\"></div>
                <script>
                    (function(d, s, id) {
                    var js, fjs = d.getElementsByTagName(s)[0];
                    if (d.getElementById(id))
                    return;
                    js = d.createElement(s);
                    js.id = id;
                    js.src = \"//connect.facebook.net/es_ES/all.js#xfbml=1\";
                    fjs.parentNode.insertBefore(js, fjs);
                    }(document, 'script', 'facebook-jssdk'));
                </script>

                ";
        // line 32
        $this->displayBlock('content', $context, $blocks);
        // line 33
        echo "                ";
        $this->env->loadTemplate("_global/asideLeft.html.twig")->display($context);
        // line 34
        echo "            </div>
            <br class=\"clear\"/>
        </div>        
        
        ";
        // line 38
        $this->displayBlock('footer', $context, $blocks);
        // line 39
        echo "    </div>
    
    ";
        // line 41
        $this->env->loadTemplate("_global/avisoCookies.html.twig")->display($context);
        // line 42
        echo "
    <!-- Para que esté disponible el path de la app en todos los java scripts -->
    <script type=\"text/javascript\">
        var appPath = \"";
        // line 45
        echo twig_escape_filter($this->env, (isset($context["appPath"]) ? $context["appPath"] : null), "html", null, true);
        echo "\";
        var theme = \"";
        // line 46
        echo twig_escape_filter($this->env, (isset($context["theme"]) ? $context["theme"] : null), "html", null, true);
        echo "\";
        var language = \"";
        // line 47
        echo twig_escape_filter($this->env, (isset($context["language"]) ? $context["language"] : null), "html", null, true);
        echo "\";
    </script>

    ";
        // line 50
        $template = $this->env->resolveTemplate($this->getAttribute((isset($context["values"]) ? $context["values"] : null), "archivoJs"));
        $template->display($context);
        // line 51
        echo "    ";
        $this->env->loadTemplate("_global/wgZopim.js.twig")->display($context);
        echo "  
    
    <div id=\"mensajes\" title=\"Mensaje\"></div>
    
    ";
        // line 55
        if ($this->getAttribute((isset($context["values"]) ? $context["values"] : null), "_debugMode")) {
            // line 56
            echo "        <div style=\"clear: both;\">
            <pre>";
            // line 57
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["values"]) ? $context["values"] : null), "_debugValues"), "html", null, true);
            echo "</pre>
        </div>
    ";
        }
        // line 59
        echo "      
</body>
</html>";
    }

    // line 12
    public function block_header($context, array $blocks = array())
    {
        $this->env->loadTemplate("_global/header.html.twig")->display($context);
    }

    // line 13
    public function block_head($context, array $blocks = array())
    {
        $this->env->loadTemplate("_global/head.html.twig")->display($context);
    }

    // line 32
    public function block_content($context, array $blocks = array())
    {
    }

    // line 38
    public function block_footer($context, array $blocks = array())
    {
        $this->env->loadTemplate("_global/footer.html.twig")->display($context);
    }

    public function getTemplateName()
    {
        return "_global/layoutLaptop.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  159 => 38,  154 => 32,  148 => 13,  142 => 12,  136 => 59,  130 => 57,  127 => 56,  125 => 55,  117 => 51,  114 => 50,  108 => 47,  104 => 46,  100 => 45,  95 => 42,  93 => 41,  89 => 39,  87 => 38,  81 => 34,  78 => 33,  76 => 32,  60 => 18,  57 => 17,  55 => 16,  51 => 14,  49 => 13,  45 => 12,  36 => 8,  33 => 7,  31 => 6,  25 => 2,  23 => 1,);
    }
}
