// =============================================================================
// JS/SRC/SITE/INC/X-HEAD-NAVBAR-FIXED-TOP.JS
// -----------------------------------------------------------------------------
// Includes all functionality pertaining to fixed top navigation when in use.
// =============================================================================

// =============================================================================
// TABLE OF CONTENTS
// -----------------------------------------------------------------------------
//   01. Fixed Top Navbar
// =============================================================================

// Fixed Top Navbar
// =============================================================================

jQuery(function($) {

  var $body = $('body');

  if ( ! $body.hasClass('page-template-template-blank-3-php') && ! $body.hasClass('page-template-template-blank-6-php') && ! $body.hasClass('page-template-template-blank-7-php') && ! $body.hasClass('page-template-template-blank-8-php') ) {
    if ( $body.hasClass('x-navbar-fixed-top-active') ) {

      var $navbar      = $('.x-navbar');
      var navbarTop    = $('.x-navbar-wrap').offset().top - $('#wpadminbar').outerHeight();
      var boxedClasses = '';

      if ( $body.hasClass('x-boxed-layout-active') ) {
        boxedClasses = ' x-container max width';
      }

      $(window).scroll(function() {

        if ( $(this).scrollTop() >= navbarTop ) {
          $navbar.addClass('x-navbar-fixed-top' + boxedClasses);
        } else {
          $navbar.removeClass('x-navbar-fixed-top' + boxedClasses);
        }

      });

    }
  }

});