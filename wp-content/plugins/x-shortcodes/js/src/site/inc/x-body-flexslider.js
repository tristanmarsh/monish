// =============================================================================
// JS/SRC/SITE/INC/X-BODY-FLEXSLIDER.JS
// -----------------------------------------------------------------------------
// Sets up Flexslider for certain theme features such as the "Gallery" post
// format and portfolio gallery.
// =============================================================================

// =============================================================================
// TABLE OF CONTENTS
// -----------------------------------------------------------------------------
//   01. Call Flexslider
// =============================================================================

// Call Flexslider
// =============================================================================

jQuery(window).load(function() {

  jQuery('.x-flexslider-featured-gallery').flexslider({
    controlNav   : false,
    selector     : '.x-slides > li',
    prevText     : '<i class="x-icon-chevron-left"></i>',
    nextText     : '<i class="x-icon-chevron-right"></i>',
    animation    : 'fade',
    easing       : 'easeInOutExpo',
    smoothHeight : true,
    slideshow    : false
  });

});