// =============================================================================
// JS/SRC/SITE/INC/SHORTCODES/X-SLIDER.JS
// -----------------------------------------------------------------------------
// X data attribute API shortcode information.
// =============================================================================

// =============================================================================
// TABLE OF CONTENTS
// -----------------------------------------------------------------------------
//   01. Slider
// =============================================================================

// Slider
// =============================================================================

xData.api.map('slider', function(element, params) {
  jQuery(window).load(function() {

    jQuery(element).flexslider({
      selector       : '.x-slides > li',
      prevText       : '<i class=\"x-icon-chevron-left\"></i>',
      nextText       : '<i class=\"x-icon-chevron-right\"></i>',
      animation      : params.animation,
      controlNav     : params.controlNav,
      directionNav   : params.prevNextNav,
      slideshowSpeed : params.slideTime,
      animationSpeed : params.slideSpeed,
      slideshow      : params.slideshow,
      randomize      : params.random,
      pauseOnHover   : true,
      useCSS         : true,
      touch          : true,
      video          : true,
      smoothHeight   : true,
      easing         : 'easeInOutExpo'
    });

  });
});