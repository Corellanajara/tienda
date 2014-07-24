<?php

/* Producto/solapas.html.twig */
class __TwigTemplate_81f30d02f68571d2eb6eb152e5a73de899c230a63039545d75cd7ca133848eac extends Twig_Template
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
";
        // line 3
        if ((($this->getAttribute($this->getAttribute((isset($context["values"]) ? $context["values"] : null), "producto"), "Caracteristicas") || $this->getAttribute((isset($context["values"]) ? $context["values"] : null), "detalleTecnico")) || $this->getAttribute((isset($context["values"]) ? $context["values"] : null), "conComentarios"))) {
            // line 4
            echo "<div class=\"salto10\"></div>    
<div id=\"solapa\">
    <ul>
        <li><a href=\"#caracteristicas\">";
            // line 7
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["macro"]) ? $context["macro"] : null), "idioma", array(0 => "caracteristicas"), "method"), "html", null, true);
            echo "</a></li>
        ";
            // line 8
            if ($this->getAttribute((isset($context["values"]) ? $context["values"] : null), "detalleTecnico")) {
                // line 9
                echo "        <li><a href=\"#detallesTecnicos\">";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["macro"]) ? $context["macro"] : null), "idioma", array(0 => "detallesTecnicos"), "method"), "html", null, true);
                echo "</a></li>
        ";
            }
            // line 11
            echo "        ";
            if ($this->getAttribute((isset($context["values"]) ? $context["values"] : null), "conComentarios")) {
                // line 12
                echo "        <li><a href=\"#comentarios\">";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["macro"]) ? $context["macro"] : null), "idioma", array(0 => "comentarios"), "method"), "html", null, true);
                echo " ";
                if ((twig_length_filter($this->env, $this->getAttribute((isset($context["values"]) ? $context["values"] : null), "comentarios")) > 0)) {
                    echo "(";
                    echo twig_escape_filter($this->env, twig_length_filter($this->env, $this->getAttribute((isset($context["values"]) ? $context["values"] : null), "comentarios")), "html", null, true);
                    echo ")";
                }
                echo "</a></li>
        ";
            }
            // line 14
            echo "    </ul>
    <div id=\"caracteristicas\" class=\"caracteristicas\">
        ";
            // line 16
            echo $this->getAttribute($this->getAttribute((isset($context["values"]) ? $context["values"] : null), "producto"), "Caracteristicas");
            // line 17
            echo "    </div>
    ";
            // line 18
            if ($this->getAttribute((isset($context["values"]) ? $context["values"] : null), "detalleTecnico")) {
                // line 19
                echo "    <div id=\"detallesTecnicos\" class=\"detallesTecnicos\">
    <ul>
        ";
                // line 21
                $context['_parent'] = (array) $context;
                $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["values"]) ? $context["values"] : null), "detalleTecnico"));
                foreach ($context['_seq'] as $context["_key"] => $context["detalle"]) {
                    // line 22
                    echo "        <li>
            ";
                    // line 23
                    echo twig_escape_filter($this->env, $this->getAttribute((isset($context["detalle"]) ? $context["detalle"] : null), "titulo"), "html", null, true);
                    echo ":
            <span>";
                    // line 24
                    echo twig_escape_filter($this->env, $this->getAttribute((isset($context["detalle"]) ? $context["detalle"] : null), "valor"), "html", null, true);
                    echo "</span>
        </li>
        ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['detalle'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 27
                echo "    </ul>
    </div>
    ";
            }
            // line 30
            echo "    ";
            if ($this->getAttribute((isset($context["values"]) ? $context["values"] : null), "conComentarios")) {
                echo "    
    <div id=\"comentarios\" class=\"comentarios\">
    <ul>
        ";
                // line 33
                $context['_parent'] = (array) $context;
                $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["values"]) ? $context["values"] : null), "comentarios"));
                $context['_iterated'] = false;
                foreach ($context['_seq'] as $context["_key"] => $context["comentario"]) {
                    // line 34
                    echo "        <li>
            <span>";
                    // line 35
                    echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute((isset($context["comentario"]) ? $context["comentario"] : null), "TiempoUnix"), "d/m/Y"), "html", null, true);
                    echo "</span> </span>";
                    echo twig_escape_filter($this->env, $this->getAttribute((isset($context["comentario"]) ? $context["comentario"] : null), "nombre"), "html", null, true);
                    echo "</span>
            ";
                    // line 36
                    echo twig_escape_filter($this->env, $this->getAttribute((isset($context["comentario"]) ? $context["comentario"] : null), "Comentario"), "html", null, true);
                    echo "
        </li>
        ";
                    $context['_iterated'] = true;
                }
                if (!$context['_iterated']) {
                    // line 39
                    echo "        <span>";
                    echo twig_escape_filter($this->env, $this->getAttribute((isset($context["macro"]) ? $context["macro"] : null), "idioma", array(0 => "seElPrimeroEnComentar"), "method"), "html", null, true);
                    echo "</span>
        ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['comentario'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 41
                echo "        
        ";
                // line 42
                $template = $this->env->resolveTemplate(($this->getAttribute((isset($context["values"]) ? $context["values"] : null), "controller") . "/formularioComentario.html.twig"));
                $template->display(array_merge($context, array("idArticulo" => $this->getAttribute($this->getAttribute((isset($context["values"]) ? $context["values"] : null), "producto"), "IDArticulo"))));
                // line 43
                echo "    </ul>
    </div> 
    ";
            }
            // line 45
            echo "    
</div>
";
        }
    }

    public function getTemplateName()
    {
        return "Producto/solapas.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  140 => 43,  137 => 42,  134 => 41,  125 => 39,  117 => 36,  111 => 35,  108 => 34,  96 => 30,  91 => 27,  75 => 22,  71 => 21,  67 => 19,  65 => 18,  60 => 16,  56 => 14,  41 => 11,  33 => 8,  30 => 6,  77 => 24,  73 => 22,  66 => 18,  62 => 17,  58 => 16,  54 => 15,  49 => 13,  43 => 11,  37 => 9,  27 => 5,  22 => 3,  39 => 8,  35 => 9,  24 => 4,  176 => 49,  174 => 48,  170 => 46,  166 => 45,  164 => 44,  160 => 42,  157 => 41,  154 => 40,  152 => 39,  145 => 45,  139 => 36,  132 => 33,  126 => 31,  124 => 30,  121 => 29,  119 => 28,  115 => 27,  109 => 26,  103 => 33,  97 => 21,  85 => 19,  82 => 24,  78 => 23,  74 => 15,  64 => 12,  48 => 11,  45 => 10,  31 => 6,  23 => 3,  21 => 3,  19 => 2,  46 => 12,  44 => 12,  36 => 6,  32 => 7,  29 => 7,  26 => 3,);
    }
}
