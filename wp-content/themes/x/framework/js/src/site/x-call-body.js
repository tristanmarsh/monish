// =============================================================================
// JS/X-CALL-BODY.JS
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

  //
  // Superfish.
  //

  $('.sf-menu').superfish({
    delay : 650,
    speed : 'fast'
  });


  //
  // Scrollspy.
  //

  var $body           = $('body');
  var $bodyHeight     = $body.outerHeight();
  var $adminbarHeight = $('#wpadminbar').outerHeight();
  var $navbarHeight   = $('.x-navbar').outerHeight();

  $body.scrollspy({
    target : '.x-nav-collapse',
    offset : $adminbarHeight + $navbarHeight
  });

  $('.x-nav-scrollspy > li > a[href^="#"]').click(function(e) {
    e.preventDefault();
    var $contentBand = $(this).attr('href');
    $('html, body').animate({
      scrollTop: $($contentBand).offset().top - $adminbarHeight - $navbarHeight + 1
    }, 850, 'easeInOutExpo');
  });

  $(window).resize(function() {
    $body.scrollspy('refresh');
  });

  var timesRun = 0;
  var interval = setInterval(function() {
    timesRun += 1;
    var $newBodyHeight = $body.outerHeight();
    if ( $newBodyHeight !== $bodyHeight ) {
      $body.scrollspy('refresh');
    }
    if ( timesRun === 10 ) {
      clearInterval(interval);
    }
  }, 500);


  //
  // Placeholder.
  //

  $('input, textarea').placeholder();

});