<?php

/* Familias/index.js.twig */
class __TwigTemplate_d149bc7eb47cdf5bb2278251f55c1d1feee86122e92649a733c98bf4e4e07c3b extends Twig_Template
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
        echo "<script type=\"text/javascript\" src=\"";
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["app"]) ? $context["app"] : null), "path"), "html", null, true);
        echo "/";
        echo twig_escape_filter($this->env, (isset($context["theme"]) ? $context["theme"] : null), "html", null, true);
        echo "/js/jquery-1.8.2.min.js\"></script> ";
        // line 2
        echo "<script src=\"";
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["app"]) ? $context["app"] : null), "path"), "html", null, true);
        echo "/";
        echo twig_escape_filter($this->env, (isset($context["theme"]) ? $context["theme"] : null), "html", null, true);
        echo "/js/modernizr.custom.12319.js\"></script> ";
        // line 3
        echo "<!-- JQUERY UI -->
<script src=\"http://code.jquery.com/ui/1.10.3/jquery-ui.js\"></script> <!-- jQuery UI -->  
<script>
 \$(function() {
      
    \$( \".accordion\" ).accordion({
        event: \"click hoverintent\",
        heightStyle: 'content'      
    });
    
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

<!-- ------------------------------ -->


<script src=\"";
        // line 85
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["app"]) ? $context["app"] : null), "path"), "html", null, true);
        echo "/";
        echo twig_escape_filter($this->env, (isset($context["theme"]) ? $context["theme"] : null), "html", null, true);
        echo "/js/albatronic.js\"></script>
<script src=\"";
        // line 86
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["app"]) ? $context["app"] : null), "path"), "html", null, true);
        echo "/";
        echo twig_escape_filter($this->env, (isset($context["theme"]) ? $context["theme"] : null), "html", null, true);
        echo "/js/pirobox_extended.js\"></script>
<script src=\"";
        // line 87
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["app"]) ? $context["app"] : null), "path"), "html", null, true);
        echo "/";
        echo twig_escape_filter($this->env, (isset($context["theme"]) ? $context["theme"] : null), "html", null, true);
        echo "/js/pirobox_function.js\"></script> ";
        // line 88
        echo "
<!-- SLIDER HOME -->
<script src=\"";
        // line 90
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["app"]) ? $context["app"] : null), "path"), "html", null, true);
        echo "/";
        echo twig_escape_filter($this->env, (isset($context["theme"]) ? $context["theme"] : null), "html", null, true);
        echo "/js/bjqs-1.3.min.js\"></script>
<script src=\"";
        // line 91
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["app"]) ? $context["app"] : null), "path"), "html", null, true);
        echo "/";
        echo twig_escape_filter($this->env, (isset($context["theme"]) ? $context["theme"] : null), "html", null, true);
        echo "/js/bjqs-function.js\"></script>

<script src=\"";
        // line 93
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["app"]) ? $context["app"] : null), "path"), "html", null, true);
        echo "/";
        echo twig_escape_filter($this->env, (isset($context["theme"]) ? $context["theme"] : null), "html", null, true);
        echo "/js/jcarousellite_1.0.1c4.js\" type=\"text/javascript\"></script>
<script src=\"";
        // line 94
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["app"]) ? $context["app"] : null), "path"), "html", null, true);
        echo "/";
        echo twig_escape_filter($this->env, (isset($context["theme"]) ? $context["theme"] : null), "html", null, true);
        echo "/js/jcarousellite-function.js\" type=\"text/javascript\"></script> ";
        // line 95
        echo "


<script type=\"text/javascript\" src=\"";
        // line 98
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["app"]) ? $context["app"] : null), "path"), "html", null, true);
        echo "/";
        echo twig_escape_filter($this->env, (isset($context["theme"]) ? $context["theme"] : null), "html", null, true);
        echo "/js/jquery-uniform-formulario.js\"></script>
    <script type=\"text/javascript\">
      \$(function(){
        \$(\":checkbox\").uniform();
    });
</script>  ";
        // line 104
        echo "
<script type=\"text/javascript\">
  jQuery(document).ready(function(\$){
  
  \$(\"a[rel='pop-up']\").click(function () {
  var caracteristicas = \"height=\"+(screen.availHeight - 40)+\",width=\"+(screen.availWidth - 13)+\",screenX=0,screenY=0,left=0,top=0,status=no,menubar=yes,scrollbars=yes,resizable=yes,toolbar=yes,location=yes\";
  nueva=window.open(this.href, 'Popup', caracteristicas);
  return false;
  });
});
</script> ";
        // line 115
        echo "
<script src=\"//use.edgefonts.net/open-sans.js\"></script>";
    }

    public function getTemplateName()
    {
        return "Familias/index.js.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  187 => 115,  175 => 104,  165 => 98,  160 => 95,  155 => 94,  149 => 93,  142 => 91,  136 => 90,  132 => 88,  127 => 87,  121 => 86,  115 => 85,  203 => 54,  197 => 51,  182 => 49,  178 => 48,  172 => 44,  157 => 42,  153 => 41,  148 => 38,  141 => 36,  134 => 35,  129 => 34,  114 => 32,  109 => 31,  105 => 30,  95 => 28,  92 => 27,  79 => 24,  76 => 23,  70 => 21,  67 => 20,  58 => 17,  55 => 16,  52 => 15,  44 => 12,  38 => 9,  29 => 6,  120 => 33,  117 => 32,  99 => 29,  93 => 23,  87 => 26,  81 => 19,  73 => 22,  64 => 19,  61 => 18,  46 => 13,  39 => 9,  34 => 8,  31 => 3,  27 => 5,  24 => 3,  22 => 2,  19 => 1,  84 => 20,  82 => 25,  75 => 17,  71 => 27,  69 => 26,  65 => 24,  51 => 22,  49 => 14,  36 => 8,  33 => 16,  30 => 15,  25 => 2,  23 => 12,);
    }
}
