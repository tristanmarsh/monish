// =============================================================================
// JS/SRC/SITE/INC/SHORTCODES/X-LIGHTBOX.JS
// -----------------------------------------------------------------------------
// X data attribute API shortcode information.
// =============================================================================

// =============================================================================
// TABLE OF CONTENTS
// -----------------------------------------------------------------------------
//   01. Lightbox
// =============================================================================

// Lightbox
// =============================================================================

xData.api.map('lightbox', function(element, params) {

  var options = {
    skin    : 'light',
    overlay : {
      opacity : params.opacity,
      blur    : true
    },
    styles : {
      prevScale   : params.prevScale,
      prevOpacity : params.prevOpacity,
      nextScale   : params.nextScale,
      nextOpacity : params.nextOpacity
    },
    path     : params.orientation,
    controls : {
      thumbnail : params.thumbnails
    }
  };

  if ( params.deeplink ) {
    options.linkId = 'gallery-image';
  }

  jQuery(params.selector).iLightBox(options);

});