<?php

/* _global/wgBoletin.html.twig */
class __TwigTemplate_28c305e46255c858bd95c80315b82d2d6feb8d3a143aa9f035cd2e7a910bd137 extends Twig_Template
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
        echo "<script type=\"text/javascript\">
function is_checked() {
    if (document.getElementById('action').value === '0') {
        if (document.getElementById('politica').checked === false) {
            alert('";
        // line 6
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["macro"]) ? $context["macro"] : null), "idioma", array(0 => "debeAceptarPolitica"), "method"), "html", null, true);
        echo "');
            return false;
        } else
            return true;
    }
    return true;
}
</script>
<div class=\"block newsletter\">
    <h4>";
        // line 15
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["macro"]) ? $context["macro"] : null), "idioma", array(0 => "boletin"), "method"), "html", null, true);
        echo "</h4>
    <p>";
        // line 16
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["macro"]) ? $context["macro"] : null), "idioma", array(0 => "esloganBoletin"), "method"), "html", null, true);
        echo "</p>
    <form  method=\"post\" onsubmit=\"return is_checked();\">
        <input name=\"controller\" value=\"boletin\" type=\"hidden\"/>
        <p><input type=\"text\" name=\"email\" size=\"18\" value=\"Email\" 
                  onfocus=\"javascript:if (this.value === 'Email') this.value = '';\" 
                  onblur=\"javascript:if (this.value === '') this.value = 'Email';\" class=\"input_buttonnewsletter\"/>
        </p>
        <p>
            <select name=\"action\" id=\"action\">
                <option value=\"0\">Suscribirse</option>
                <option value=\"1\">Borrarse</option>
            </select>
            <input type=\"submit\" value=\"Enviar\" class=\"buttonnewsletter\" name=\"submitNewsletter\"/>
        </p>
        <p>
            <input type=\"checkbox\" name=\"politica\" id=\"politica\"/> ";
        // line 31
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["macro"]) ? $context["macro"] : null), "idioma", array(0 => "aceptoLa"), "method"), "html", null, true);
        echo " <a href=\"";
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["app"]) ? $context["app"] : null), "path"), "html", null, true);
        echo "/politica-privacidad\">";
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["macro"]) ? $context["macro"] : null), "idioma", array(0 => "politicaPrivacidad"), "method"), "html", null, true);
        echo "</a>
        </p>
    </form>
</div>";
    }

    public function getTemplateName()
    {
        return "_global/wgBoletin.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  59 => 31,  41 => 16,  37 => 15,  143 => 42,  137 => 39,  124 => 35,  122 => 34,  109 => 33,  101 => 31,  99 => 30,  91 => 27,  86 => 24,  81 => 22,  72 => 18,  68 => 17,  66 => 16,  43 => 12,  35 => 9,  30 => 7,  26 => 5,  95 => 28,  83 => 20,  70 => 17,  64 => 16,  58 => 15,  55 => 14,  53 => 15,  42 => 11,  38 => 10,  32 => 8,  29 => 6,  39 => 10,  27 => 5,  24 => 4,  22 => 3,  19 => 2,  170 => 54,  165 => 48,  159 => 13,  153 => 12,  147 => 75,  141 => 73,  138 => 72,  136 => 71,  128 => 36,  125 => 66,  119 => 63,  115 => 62,  111 => 61,  106 => 58,  104 => 57,  100 => 55,  98 => 54,  92 => 50,  89 => 49,  87 => 21,  51 => 14,  49 => 13,  45 => 13,  36 => 13,  33 => 7,  31 => 6,  25 => 6,  23 => 1,);
    }
}
