// =============================================================================
// JS/SRC/SITE/INC/SHORTCODES/X-COLUMN.JS
// -----------------------------------------------------------------------------
// X data attribute API shortcode information.
// =============================================================================

// =============================================================================
// TABLE OF CONTENTS
// -----------------------------------------------------------------------------
//   01. Column
// =============================================================================

// Column
// =============================================================================

xData.api.map('column', function(element, params) {

  if ( params.fade ) {

    $(element).waypoint(function() {

      var options = { opacity: '1' };

      if      ( params.animation === 'in-from-top' )    { options.top = '0';    }
      else if ( params.animation === 'in-from-left' )   { options.left = '0';   }
      else if ( params.animation === 'in-from-right' )  { options.right = '0';  }
      else if ( params.animation === 'in-from-bottom' ) { options.bottom = '0'; }

      $(this).animate(options, 750, 'easeOutExpo');

    }, { offset : '65%', triggerOnce : true });

  }

});