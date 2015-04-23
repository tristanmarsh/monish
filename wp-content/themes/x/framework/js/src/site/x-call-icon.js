// =============================================================================
// JS/X-CALL-ICON.JS
// -----------------------------------------------------------------------------
// Function calls.
// =============================================================================

// =============================================================================
// TABLE OF CONTENTS
// -----------------------------------------------------------------------------
//   01. Function Calls
// =============================================================================

// Function Calls
// =============================================================================

jQuery(document).ready(function($) {

  var body    = $('body');
  var sidebar = $('.x-sidebar');

  enquire.register("screen and (min-width: 1200px)", function() {
    if ( ! body.hasClass('x-full-width-active') ) {
      sidebar.find('.max.width').addClass('nano-content');
      sidebar.find('.max.width').removeClass('x-container-fluid');
      $('.nano').nanoScroller({
        contentClass         : 'nano-content',
        preventPageScrolling : true
      });
    }
  });

  enquire.register("screen and (max-width: 1199px)", function() {
    if ( ! body.hasClass('x-full-width-active') ) {
      sidebar.find('.max.width').addClass('x-container-fluid');
      $('.nano-content').removeClass('nano-content');
    }
  });

  if ( body.hasClass('x-full-width-active') ) {
    sidebar.find('.max.width').addClass('x-container-fluid');
  }

});