<?php

/* ZonaPrivada/index.html.twig */
class __TwigTemplate_3aac91b95b5c425ff2df38cd3cad1b0f7f9e6365867587999dc0e4bf2c848706 extends Twig_Template
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

    // line 13
    public function block_content($context, array $blocks = array())
    {
        // line 14
        echo "<section class=\"contenedorGrandeCentral\">
    <article class=\"colIzqda\">
        <h1>";
        // line 16
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["macro"]) ? $context["macro"] : null), "idioma", array(0 => "accesoPrivado"), "method"), "html", null, true);
        echo "</h1>
        <p>";
        // line 17
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["macro"]) ? $context["macro"] : null), "idioma", array(0 => "accesoPrivadoTexto"), "method"), "html", null, true);
        echo "</p>
                                 
        <form name=\"formLogin\" id=\"formLogin\" method=\"POST\" action=\"\">
            <div id=\"input_oculto\">
                <input name=\"controller\" value=\"ZonaPrivada\" />
                <input name=\"action\" value=\"login\" />
                <input name=\"return\" value=\"";
        // line 23
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["values"]) ? $context["values"] : null), "return"), "html", null, true);
        echo "\" />
            </div>

            <article>
                <!-- <label>";
        // line 27
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["macro"]) ? $context["macro"] : null), "idioma", array(0 => "eMail"), "method"), "html", null, true);
        echo "</label> -->
                <input autocomplete=\"off\" type=\"text\" name=\"login[Email]\" id=\"login_Email\" value=\"";
        // line 28
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["values"]) ? $context["values"] : null), "login"), "Email"), "html", null, true);
        echo "\" ";
        if (($this->getAttribute($this->getAttribute((isset($context["values"]) ? $context["values"] : null), "login"), "error") == "1")) {
            echo "class=\"celdaError\"";
        } else {
            echo "class=\"celda\"";
        }
        echo " placeholder=\"Usuario\" />
            </article>

            <article>
                <!-- <label>";
        // line 32
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["macro"]) ? $context["macro"] : null), "idioma", array(0 => "contrasena"), "method"), "html", null, true);
        echo "</label> -->
                <input autocomplete=\"off\" type=\"password\" name=\"login[Password]\" ";
        // line 33
        if (($this->getAttribute($this->getAttribute((isset($context["values"]) ? $context["values"] : null), "login"), "error") == "2")) {
            echo "class=\"celdaError\"";
        } else {
            echo "class=\"celda\"";
        }
        echo " placeholder=\"Contraseña\" />
            </article>

            <article id=\"contenedorEnviar\">
                <a href=\"";
        // line 37
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["app"]) ? $context["app"] : null), "path"), "html", null, true);
        echo "/olvido\" class=\"olvido\">";
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["macro"]) ? $context["macro"] : null), "idioma", array(0 => "olvideMiContrasena"), "method"), "html", null, true);
        echo "</a>
                <input type=\"submit\" value=\"";
        // line 38
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["macro"]) ? $context["macro"] : null), "idioma", array(0 => "enviar"), "method"), "html", null, true);
        echo "\" data-type=\"submit\" onclick=\"\$('#formLogin').submit();\" title=\"";
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["macro"]) ? $context["macro"] : null), "idioma", array(0 => "enviar"), "method"), "html", null, true);
        echo "\" class=\"boton btn_azul right\" />
            </article>
        </form>
    </article>     
    <article class=\"colDrcha\">
        <h1>";
        // line 43
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["macro"]) ? $context["macro"] : null), "idioma", array(0 => "accesoNuevo"), "method"), "html", null, true);
        echo "</h1>
        <p><a href=\"";
        // line 44
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["app"]) ? $context["app"] : null), "path"), "html", null, true);
        echo "/registro\">";
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["macro"]) ? $context["macro"] : null), "idioma", array(0 => "accesoNuevoTexto"), "method"), "html", null, true);
        echo "</a></p>
    </article>     
</section>
";
    }

    public function getTemplateName()
    {
        return "ZonaPrivada/index.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  105 => 44,  101 => 43,  91 => 38,  85 => 37,  74 => 33,  70 => 32,  57 => 28,  53 => 27,  46 => 23,  37 => 17,  33 => 16,  29 => 14,  26 => 13,);
    }
}
