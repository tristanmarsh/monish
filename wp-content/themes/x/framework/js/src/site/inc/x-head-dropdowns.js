// =============================================================================
// JS/SRC/SITE/INC/X-HEAD-DROPDOWNS.JS
// -----------------------------------------------------------------------------
// Includes all functionality pertaining to dropdown menus for both "desktop"
// and "mobile" navigation.
// =============================================================================

// =============================================================================
// TABLE OF CONTENTS
// -----------------------------------------------------------------------------
//   01. Dropdowns
// =============================================================================

// Dropdowns
// =============================================================================

jQuery(function($) {

  //
  // Desktop dropdown functionality.
  //

  var $desktopMenu   = $('.desktop .x-nav');
  var desktopTargets = 'li.menu-item-has-children';
  var mActiveClass   = 'x-active';
  var mActionData    = 'x-action';
  var timer          = {};

  function showDropdowns(element) {
    element.addClass(mActiveClass).siblings(desktopTargets).removeClass(mActiveClass);
    if ( Modernizr.touch ) {
      element.siblings(desktopTargets).data(mActionData, 0);
      element.find('.' + mActiveClass).removeClass(mActiveClass).data(mActionData, 0);
    }
  }

  function hideDropdowns(element) {
    element.find('.' + mActiveClass).removeClass(mActiveClass);
  }

  function hoverIn(e) {
    clearTimeout(timer.id);
    var $li = $(e.target).closest('li');
    if ( $li.hasClass('menu-item-has-children') ) {
      showDropdowns($li);
    }
  }

  function hoverOut(e) {
    clearTimeout(timer.id);
    var $ul  = $(this).closest('ul');
    timer.id = setTimeout( function() { hideDropdowns($ul); }, 500);
  }

  function touchIn(e) {
    var $li = $(e.target).closest('li');
    $li.data(mActionData, $li.data(mActionData) + 1);
    if ( $li.hasClass('menu-item-has-children') && $li.data(mActionData) === 1 ) {
      e.preventDefault();
      e.stopPropagation();
      showDropdowns($li);
    }
  }

  function touchOut(e) {
    $(desktopTargets).data(mActionData, 0);
    hideDropdowns($desktopMenu);
  }

  if ( Modernizr.touch ) {
    $(desktopTargets).data(mActionData, 0);
    $desktopMenu.on('touchstart click', desktopTargets, touchIn);
    $desktopMenu.on('touchstart click', function(e) { e.stopPropagation(); });
    $('body').on('touchstart click', touchOut);
  } else {
    $desktopMenu.hoverIntent({
      over     : hoverIn,
      out      : hoverOut,
      selector : desktopTargets,
      timeout  : 250
    });
    $desktopMenu.on('focusin', desktopTargets, hoverIn);
    $desktopMenu.on('focusout', desktopTargets, hoverOut);
  }


  //
  // Mobile dropdown functionality.
  //

  var $mobileMenu    = $('.mobile .x-nav');
  var $mobileTargets = $mobileMenu.find('li.menu-item-has-children > a');
  var $mobileSubs    = $mobileMenu.find('.sub-menu');

  $mobileTargets.each(function(i) {
    $(this).append('<div class="x-sub-toggle" data-toggle="collapse" data-target=".sub-menu.sm-' + i + '"><span><i class="x-icon x-icon-angle-double-down"></i></span></div>');
  });

  $mobileSubs.each(function(i) {
    $(this).addClass('sm-' + i + ' collapse');
  });

  $('.x-sub-toggle').on('click', function(e) {
    e.preventDefault();
    $(this).toggleClass(mActiveClass).closest('li').toggleClass(mActiveClass);
  });

});