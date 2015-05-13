// =============================================================================
// JS/SRC/SITE/INC/SHORTCODES/X-RESPONSIVE-TEXT.JS
// -----------------------------------------------------------------------------
// X data attribute API shortcode information.
// =============================================================================

// =============================================================================
// TABLE OF CONTENTS
// -----------------------------------------------------------------------------
//   01. Responsive Text
// =============================================================================

// Responsive Text
// =============================================================================

xData.api.map('responsive_text', function(element, params) {

  var options = {};

  if (params.minFontSize !== '') {
    options.minFontSize = params.minFontSize;
  }

  if (params.maxFontSize !== '') {
    options.maxFontSize = params.maxFontSize;
  }

  $(params.selector).fitText(params.compression, options);

});