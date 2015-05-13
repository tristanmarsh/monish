// =============================================================================
// JS/SRC/SITE/INC/SHORTCODES/X-EXTRA.JS
// -----------------------------------------------------------------------------
// X data attribute API shortcode information.
// =============================================================================

// =============================================================================
// TABLE OF CONTENTS
// -----------------------------------------------------------------------------
//   01. Popovers and Tooltips
//   02. Legacy
// =============================================================================

// Popovers and Tooltips
// =============================================================================

xData.api.map('extra', function(element, params) {

  if ( params.type === 'tooltip' ) {

    var optionsTooltip = {
      animation : true,
      html      : false,
      placement : params.placement,
      trigger   : params.trigger,
      delay     : {
        show : 0,
        hide : 0
      }
    };

    if ( params.title && params.title !== '' ) {
      optionsTooltip.title = params.title;
    }

    $(element).tooltip(optionsTooltip);

  }

  if ( params.type === 'popover' ) {

    var optionsPopover = {
      animation : true,
      html      : false,
      placement : params.placement,
      trigger   : params.trigger,
      content   : params.content,
      delay     : {
        show : 0,
        hide : 0
      }
    };

    if ( params.title && params.title !== '' ) {
      optionsPopover.title = params.title;
    }

    $(element).popover(optionsPopover);
  }

});



// Legacy
// =============================================================================

jQuery(document).ready(function($) {

  $('[data-toggle="tooltip"]').tooltip({
    animation : true,
    html      : false,
    delay     : {
      show : 0,
      hide : 0
    }
  });

  $('[data-toggle="popover"]').popover({
    animation : true,
    html      : false,
    delay     : {
      show : 0,
      hide : 0
    }
  });

});