// =============================================================================
// JS/SRC/SITE/INC/SHORTCODES/X-RECENT-POSTS.JS
// -----------------------------------------------------------------------------
// X data attribute API shortcode information.
// =============================================================================

// =============================================================================
// TABLE OF CONTENTS
// -----------------------------------------------------------------------------
//   01. Recent Posts
// =============================================================================

// Recent Posts
// =============================================================================

xData.api.map('recent_posts', function(element, params) {

  if ( params.fade ) {

    $(element).waypoint(function() {

      $(this).find('a').each(function(i, item) {
        $(item).delay(i * 90).animate({ 'opacity' : '1' }, 750, 'easeOutExpo');
      });

      setTimeout(function() {
        $(this).addClass('complete');
      }, ($(this).find('a').length * 90) + 400);

    }, { offset : '75%', triggerOnce : true });

  }

});