<?php

/* _global/layoutLaptopPopup.html.twig */
class __TwigTemplate_728a3e1cce65be05d205bb9d78b285c34743a4cd18f7b2547555871829897034 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'content' => array($this, 'block_content'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "<!DOCTYPE html>
<html lang=\"es-ES\">
    <head>
        ";
        // line 4
        $this->env->loadTemplate("_global/meta.twig")->display($context);
        // line 5
        echo "        ";
        $this->env->loadTemplate("_global/googleAnalytics.js.twig")->display($context);
        echo "          
        ";
        // line 6
        $template = $this->env->resolveTemplate($this->getAttribute((isset($context["values"]) ? $context["values"] : null), "archivoCss"));
        $template->display($context);
        echo "       
    </head>

    <body>
                    
        ";
        // line 11
        $this->displayBlock('content', $context, $blocks);
        // line 12
        echo "                    

        ";
        // line 14
        echo "        
        ";
        // line 15
        if ($this->getAttribute((isset($context["values"]) ? $context["values"] : null), "_debugMode")) {
            // line 16
            echo "            ";
            $this->env->loadTemplate("_global/debuger.html.twig")->display($context);
            // line 17
            echo "        ";
        }
        // line 18
        echo "            
        <!-- Para que esté disponible el path de la app en todos los java scripts -->
        <script type=\"text/javascript\">
            var appPath = \"";
        // line 21
        echo twig_escape_filter($this->env, (isset($context["appPath"]) ? $context["appPath"] : null), "html", null, true);
        echo "\";
            var language = \"";
        // line 22
        echo twig_escape_filter($this->env, (isset($context["language"]) ? $context["language"] : null), "html", null, true);
        echo "\";
        </script> 
        
        ";
        // line 25
        $template = $this->env->resolveTemplate($this->getAttribute((isset($context["values"]) ? $context["values"] : null), "archivoJs"));
        $template->display($context);
        // line 26
        echo "        <script type=\"text/javascript\" src=\"";
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["app"]) ? $context["app"] : null), "path"), "html", null, true);
        echo "/js/albatronic.js\"></script>          
    </body>
</html>";
    }

    // line 11
    public function block_content($context, array $blocks = array())
    {
        // line 12
        echo "        ";
    }

    public function getTemplateName()
    {
        return "_global/layoutLaptopPopup.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  87 => 12,  84 => 11,  76 => 26,  73 => 25,  67 => 22,  63 => 21,  58 => 18,  55 => 17,  52 => 16,  50 => 15,  47 => 14,  43 => 12,  41 => 11,  32 => 6,  27 => 5,  25 => 4,  20 => 1,  39 => 11,  31 => 5,  28 => 4,);
    }
}
