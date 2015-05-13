// =============================================================================
// JS/SRC/SITE/INC/SHORTCODES/X-CONTENT-BAND.JS
// -----------------------------------------------------------------------------
// X data attribute API shortcode information.
// =============================================================================

// =============================================================================
// TABLE OF CONTENTS
// -----------------------------------------------------------------------------
//   01. Content Band
// =============================================================================

// Content Band
// =============================================================================

xData.api.map('content_band', function(element, params) {
  jQuery(window).load(function() {

    if ( params.parallax ) {
      if ( Modernizr.touch ) {
        $(element).css('background-attachment', 'scroll');
      } else {
        if ( params.type === 'image'   ) speed = 0.1;
        if ( params.type === 'pattern' ) speed = 0.3;
        if ( speed ) $(element).parallaxContentBand('50%', speed);
      }
    }

    if ( params.type === 'video' ) {
      var BV = new jQuery.BigVideo();
      BV.init();
      if ( Modernizr.touch ) {
        BV.show(params.poster);
      } else {
        BV.show(params.video, { ambient : true });
      }
    }

  });
});