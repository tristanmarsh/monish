// =============================================================================
// JS/SRC/SITE/INC/SHORTCODES/X-MEJS.JS
// -----------------------------------------------------------------------------
// X data attribute API shortcode information.
// =============================================================================

// =============================================================================
// TABLE OF CONTENTS
// -----------------------------------------------------------------------------
//   01. MEJS
// =============================================================================

// MEJS
// =============================================================================

xData.api.map('x_mejs', function(element, params) {

  //
  // Add Silverlight types (only once).
  //

  $.each([ 'video/x-ms-wmv', 'audio/x-ms-wma' ], function(i, type) {
    if ( ! $.inArray(type, mejs.plugins.silverlight[0].types) ) {
      mejs.plugins.silverlight[0].types.push(type);
    }
  });

  if ( $(element).find('.x-mejs').hasClass('advanced-controls') ) {
    enabledFeatures = ['playpause', 'current', 'progress', 'duration', 'tracks', 'volume', 'fullscreen'];
  } else {
    enabledFeatures = ['playpause', 'progress'];
  }

  $(element).find('.x-mejs').mediaelementplayer({

    pluginPath         : _wpmejsSettings.pluginPath,
    startVolume        : 1,
    features           : enabledFeatures,
    audioWidth         : '100%',
    audioHeight        : '32',
    audioVolume        : 'vertical',
    videoWidth         : '100%',
    videoHeight        : '100%',
    videoVolume        : 'vertical',
    pauseOtherPlayers  : true,
    alwaysShowControls : true,

    success : function( mejs ) {

      var play        = true;
      var $container  = $(element).find('.mejs-container');
      var $controls   = $(element).find('.mejs-controls');
      var controlsOn  = function() { $controls.stop().animate({ opacity : 1 }, 150); };
      var controlsOff = function() { $controls.stop().animate({ opacity : 0 }, 150); };


      //
      // Autoplay, muting, and looping.
      //

      mejs.addEventListener( 'canplay', function() {
        if ( mejs.attributes.autoplay && play ) {
          mejs.play();
          play = false;
        }
        if ( mejs.attributes.muted ) {
          mejs.setMuted(true);
        }
      });

      mejs.addEventListener( 'ended', function() {
        if ( mejs.attributes.loop ) {
          mejs.play();
        }
      });


      //
      // Video only.
      //

      if ( $container.hasClass('mejs-video') ) {
        mejs.addEventListener( 'playing', function() {
          $container.hover( controlsOn, controlsOff );
        });
        mejs.addEventListener( 'pause', function() {
          $container.off( 'mouseenter mouseleave' );
          controlsOn();
        });
      }

    },

    error : function() { console.log( 'MEJS media error.' ); }

  });

});