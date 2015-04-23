// =============================================================================
// JS/X.JS
// -----------------------------------------------------------------------------
// Theme specific functions.
// =============================================================================

// =============================================================================
// TABLE OF CONTENTS
// -----------------------------------------------------------------------------
//   01. Global Functions
// =============================================================================

// Global Functions
// =============================================================================

jQuery(document).ready(function($) {

  //
  // Prevent default behavior of various toggles.
  //

  $('.x-btn-navbar, .x-btn-navbar-search, .x-btn-widgetbar').click(function(e) {
    e.preventDefault();
  });


  //
  // Scroll to the bottom of the slider.
  //

  $('.x-slider-container.above .x-slider-scroll-bottom').click(function(e) {
    e.preventDefault();
    $('html, body').animate({
      scrollTop: $('.x-slider-container.above').outerHeight()
    }, 850, 'easeInOutExpo');
  });

  $('.x-slider-container.below .x-slider-scroll-bottom').click(function(e) {
    e.preventDefault();
    var $mastheadHeight       = $('.masthead').outerHeight();
    var $navbarFixedTopHeight = $('.x-navbar-fixed-top-active .x-navbar').outerHeight();
    var $sliderAboveHeight    = $('.x-slider-container.above').outerHeight();
    var $sliderBelowHeight    = $('.x-slider-container.below').outerHeight();
    var $heightSum            = $mastheadHeight + $sliderAboveHeight + $sliderBelowHeight - $navbarFixedTopHeight;
    $('html, body').animate({
      scrollTop: $heightSum
    }, 850, 'easeInOutExpo');
  });


  //
  // Apply appropriate classes for the fixed-top navbar.
  //

  var $window     = $(window);
  var $this       = $(this);
  var $body       = $('body');
  var $navbar     = $('.x-navbar');
  var $navbarWrap = $('.x-navbar-fixed-top-active .x-navbar-wrap');

  if ( ! $body.hasClass('page-template-template-blank-3-php') && ! $body.hasClass('page-template-template-blank-6-php') && ! $body.hasClass('page-template-template-blank-7-php') && ! $body.hasClass('page-template-template-blank-8-php') ) {
    if ( $body.hasClass('x-boxed-layout-active') && $body.hasClass('x-navbar-fixed-top-active') && $body.hasClass('admin-bar') ) {
      $window.scroll(function() {
        var $adminbarHeight = $('#wpadminbar').outerHeight();
        var $menuTop        = $navbarWrap.offset().top - $adminbarHeight;
        var $current        = $this.scrollTop();
        if ($current >= $menuTop) {
          $navbar.addClass('x-navbar-fixed-top x-container-fluid max width');
        } else {
          $navbar.removeClass('x-navbar-fixed-top x-container-fluid max width');
        }
      });
    } else if ( $body.hasClass('x-navbar-fixed-top-active') && $body.hasClass('admin-bar') ) {
      $window.scroll(function() {
        var $adminbarHeight = $('#wpadminbar').outerHeight();
        var $menuTop        = $navbarWrap.offset().top - $adminbarHeight;
        var $current        = $this.scrollTop();
        if ($current >= $menuTop) {
          $navbar.addClass('x-navbar-fixed-top');
        } else {
          $navbar.removeClass('x-navbar-fixed-top');
        }
      });
    } else if ( $body.hasClass('x-boxed-layout-active') && $body.hasClass('x-navbar-fixed-top-active') ) {
      $window.scroll(function() {
        var $menuTop = $navbarWrap.offset().top;
        var $current = $this.scrollTop();
        if ($current >= $menuTop) {
          $navbar.addClass('x-navbar-fixed-top x-container-fluid max width');
        } else {
          $navbar.removeClass('x-navbar-fixed-top x-container-fluid max width');
        }
      });
    } else if ( $body.hasClass('x-navbar-fixed-top-active') ) {
      $window.scroll(function() {
        var $menuTop = $navbarWrap.offset().top;
        var $current = $this.scrollTop();
        if ($current >= $menuTop) {
          $navbar.addClass('x-navbar-fixed-top');
        } else {
          $navbar.removeClass('x-navbar-fixed-top');
        }
      });
    }
  }


  //
  // YouTube z-index fix.
  //

  $('iframe[src*="youtube.com"]').each(function() {
    var url = $(this).attr('src');
    if ($(this).attr('src').indexOf('?') > 0) {
      $(this).attr({
        'src'   : url + '&wmode=transparent',
        'wmode' : 'Opaque'
      });
    } else {
      $(this).attr({
        'src'   : url + '?wmode=transparent',
        'wmode' : 'Opaque'
      });
    }
  });


  //
  // Navbar search.
  //

  var $trigger  = $('.x-btn-navbar-search');
  var $formWrap = $('.x-searchform-overlay');
  var $form     = $formWrap.find('.form-search');
  var $input    = $formWrap.find('.search-query');
  var escKey    = 27;

  function clearSearch() {
    $formWrap.toggleClass('in');
    setTimeout( function() { $input.val(''); }, 350 );
  }

  $trigger.click(function(e) {
    e.preventDefault();
    $formWrap.toggleClass('in');
    $input.focus();
  });

  $formWrap.click(function(e) {
    if ( ! $(e.target).hasClass('search-query') ) {
      clearSearch();
    }
  });

  $(document).keydown(function(e) {
    if ( e.which === escKey ) {
      if ( $formWrap.hasClass('in') ) {
        clearSearch();
      }
    }
  });


  //
  // scrollBottom function.
  //

  $.fn.scrollBottom = function() {
    return $(document).height() - this.scrollTop() - this.height();
  };

});