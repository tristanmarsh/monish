// =============================================================================
// JS/SRC/SITE/INC/X-BODY-CUSTOM.JS
// -----------------------------------------------------------------------------
// Includes all miscellaneous, custom functionality to be output near the
// closing </body> tag.
// =============================================================================

// =============================================================================
// TABLE OF CONTENTS
// -----------------------------------------------------------------------------
//   01. Custom Functionality
// =============================================================================

// Custom Functionality
// =============================================================================

jQuery(document).ready(function($) {

  //
  // Parallax effect.
  //

  var $window      = $(window);
  var windowHeight = $window.height();
  var $this        = $(this);

  $window.resize(function() {
    windowHeight = $window.height();
  });

  $.fn.parallaxContentBand = function(xAxis, parallaxSpeed) {
    var $this = $(this);
    var contentBandFirstTop;

    $this.each(function(){
      contentBandFirstTop = $this.offset().top;
    });

    $window.resize(function() {
      $this.each(function() {
        contentBandFirstTop = $this.offset().top;
      });
    });

    function windowUpdate() {
      var windowPosition = $window.scrollTop();

      $this.each(function() {
        var contentBandOffsetTop = $this.offset().top;
        var contentBandHeight    = $this.outerHeight();

        if (contentBandOffsetTop + contentBandHeight < windowPosition || contentBandOffsetTop > windowPosition + windowHeight) {
          return;
        }

        $this.css('background-position', xAxis + ' ' + Math.floor((contentBandFirstTop - windowPosition) * parallaxSpeed) + 'px');
      });
    }

    $window.bind('scroll', windowUpdate).resize(windowUpdate);
    windowUpdate();
  };


  //
  // Ensure accordion has proper collapse class.
  //

  $('.x-accordion-toggle[data-parent]').on('click', function() {
    $(this).closest('.x-accordion').find('.x-accordion-toggle:not(.collapsed)').addClass('collapsed');
  });

});