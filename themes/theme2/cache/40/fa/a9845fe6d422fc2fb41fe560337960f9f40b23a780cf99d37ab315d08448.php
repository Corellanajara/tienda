<?php

/* _global/js.twig */
class __TwigTemplate_40faa9845fe6d422fc2fb41fe560337960f9f40b23a780cf99d37ab315d08448 extends Twig_Template
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
        echo "<!-- Librerías -->
<script src=\"";
        // line 2
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["app"]) ? $context["app"] : null), "path"), "html", null, true);
        echo "/";
        echo twig_escape_filter($this->env, (isset($context["theme"]) ? $context["theme"] : null), "html", null, true);
        echo "/js/jquery-2.0.2.min.js\"></script>
<!-- <script type=\"text/javascript\" src=\"";
        // line 3
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["app"]) ? $context["app"] : null), "path"), "html", null, true);
        echo "/";
        echo twig_escape_filter($this->env, (isset($context["theme"]) ? $context["theme"] : null), "html", null, true);
        echo "/js/jquery-1.8.2.min.js\"></script>  -->
<script src=\"";
        // line 4
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["app"]) ? $context["app"] : null), "path"), "html", null, true);
        echo "/";
        echo twig_escape_filter($this->env, (isset($context["theme"]) ? $context["theme"] : null), "html", null, true);
        echo "/js/selectivizr-min.js\"></script>


<!-- JQUERY UI -->
<script src=\"http://code.jquery.com/ui/1.10.3/jquery-ui.js\"></script>
<!-- jQuery UI -->  
<script>
 \$(function() {
      
    \$( \".accordion\" ).accordion({
        event: \"click hoverintent\",
        active: 99,
        heightStyle: 'content'      
    });
    
    \$(\"#tabs\").tabs();
    
  });
 
  /*
   * hoverIntent | Copyright 2011 Brian Cherne
   * http://cherne.net/brian/resources/jquery.hoverIntent.html
   * modified by the jQuery UI team
   */
  \$.event.special.hoverintent = {
    setup: function() {
      \$( this ).bind( \"mouseover\", jQuery.event.special.hoverintent.handler );
    },
    teardown: function() {
      \$( this ).unbind( \"mouseover\", jQuery.event.special.hoverintent.handler );
    },
    handler: function( event ) {
      var currentX, currentY, timeout,
        args = arguments,
        target = \$( event.target ),
        previousX = event.pageX,
        previousY = event.pageY;
 
      function track( event ) {
        currentX = event.pageX;
        currentY = event.pageY;
      };
 
      function clear() {
        target
          .unbind( \"mousemove\", track )
          .unbind( \"mouseout\", clear );
        clearTimeout( timeout );
      }
 
      function handler() {
        var prop,
          orig = event;
 
        if ( ( Math.abs( previousX - currentX ) +
            Math.abs( previousY - currentY ) ) < 7 ) {
          clear();
 
          event = \$.Event( \"hoverintent\" );
          for ( prop in orig ) {
            if ( !( prop in event ) ) {
              event[ prop ] = orig[ prop ];
            }
          }
          // Prevent accessing the original event since the new event
          // is fired asynchronously and the old event is no longer
          // usable (#6028)
          delete event.originalEvent;
 
          target.trigger( event );
        } else {
          previousX = currentX;
          previousY = currentY;
          timeout = setTimeout( handler, 100 );
        }
      }
 
      timeout = setTimeout( handler, 100 );
      target.bind({
        mousemove: track,
        mouseout: clear
      });
    }
  };
  </script>


<script type=\"text/javascript\" src=\"";
        // line 91
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["app"]) ? $context["app"] : null), "path"), "html", null, true);
        echo "/";
        echo twig_escape_filter($this->env, (isset($context["theme"]) ? $context["theme"] : null), "html", null, true);
        echo "/js/pirobox_extended.js\"></script>
<script type=\"text/javascript\" src=\"";
        // line 92
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["app"]) ? $context["app"] : null), "path"), "html", null, true);
        echo "/";
        echo twig_escape_filter($this->env, (isset($context["theme"]) ? $context["theme"] : null), "html", null, true);
        echo "/js/pirobox_function.js\"></script>  ";
        // line 93
        echo "
<script type=\"text/javascript\" src=\"";
        // line 94
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["app"]) ? $context["app"] : null), "path"), "html", null, true);
        echo "/";
        echo twig_escape_filter($this->env, (isset($context["theme"]) ? $context["theme"] : null), "html", null, true);
        echo "/js/albatronic.js\"></script>

<script type=\"text/javascript\" src=\"";
        // line 96
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["app"]) ? $context["app"] : null), "path"), "html", null, true);
        echo "/";
        echo twig_escape_filter($this->env, (isset($context["theme"]) ? $context["theme"] : null), "html", null, true);
        echo "/js/jcarousellite.js\"></script>

";
        // line 99
        echo "<script type=\"text/javascript\" src=\"";
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["app"]) ? $context["app"] : null), "path"), "html", null, true);
        echo "/";
        echo twig_escape_filter($this->env, (isset($context["theme"]) ? $context["theme"] : null), "html", null, true);
        echo "/js/jquery.cookie.js\"></script>
<script type=\"text/javascript\" src=\"";
        // line 100
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["app"]) ? $context["app"] : null), "path"), "html", null, true);
        echo "/";
        echo twig_escape_filter($this->env, (isset($context["theme"]) ? $context["theme"] : null), "html", null, true);
        echo "/js/jquery.hoverIntent.minified.js\"></script>
<script type=\"text/javascript\" src=\"";
        // line 101
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["app"]) ? $context["app"] : null), "path"), "html", null, true);
        echo "/";
        echo twig_escape_filter($this->env, (isset($context["theme"]) ? $context["theme"] : null), "html", null, true);
        echo "/js/jquery.dcjqaccordion.2.7.min.js\"></script> 
<script type=\"text/javascript\" src=\"";
        // line 102
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["app"]) ? $context["app"] : null), "path"), "html", null, true);
        echo "/";
        echo twig_escape_filter($this->env, (isset($context["theme"]) ? $context["theme"] : null), "html", null, true);
        echo "/js/acordeon-menu-function.js\"></script>
";
        // line 104
        echo "


<script type=\"text/javascript\" src=\"";
        // line 107
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["app"]) ? $context["app"] : null), "path"), "html", null, true);
        echo "/";
        echo twig_escape_filter($this->env, (isset($context["theme"]) ? $context["theme"] : null), "html", null, true);
        echo "/js/jquery-uniform-formulario.js\"></script> <!-- Formulario -->
<script>
\t\$(function() {
\t\t\$(\":checkbox\").uniform();
\t});\t
</script>
<!-- TERMINA JQUERY UI -->



<script type=\"text/javascript\">
    jQuery(document).ready(function(\$){
\t
\t\$(\"a[rel='pop-up']\").click(function () {
\tvar caracteristicas = \"height=\"+(screen.availHeight - 40)+\",width=\"+(screen.availWidth - 13)+\",screenX=0,screenY=0,left=0,top=0,status=no,menubar=yes,scrollbars=yes,resizable=yes,toolbar=yes,location=yes\";
\tnueva=window.open(this.href, 'Popup', caracteristicas);
\treturn false;
    });
});
</script> ";
        // line 127
        echo "
<script src=\"//use.edgefonts.net/open-sans.js\"></script>";
    }

    public function getTemplateName()
    {
        return "_global/js.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  208 => 127,  184 => 107,  179 => 104,  173 => 102,  167 => 101,  161 => 100,  154 => 99,  147 => 96,  140 => 94,  137 => 93,  132 => 92,  126 => 91,  34 => 4,  22 => 2,  19 => 1,  87 => 12,  84 => 11,  76 => 26,  73 => 25,  67 => 22,  63 => 21,  58 => 18,  55 => 17,  52 => 16,  50 => 15,  47 => 14,  43 => 12,  41 => 11,  32 => 6,  27 => 5,  25 => 4,  20 => 1,  39 => 11,  31 => 5,  28 => 3,);
    }
}
