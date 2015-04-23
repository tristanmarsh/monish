<?php

// =============================================================================
// FUNCTIONS/GLOBAL/ADMIN/THUMBNAILS/HEIGHT.PHP
// -----------------------------------------------------------------------------
// Sets up entry thumbnail sizes based on Customizer options.
// =============================================================================

// =============================================================================
// TABLE OF CONTENTS
// -----------------------------------------------------------------------------
//   01. Cropped Entry Thumbnail Height
//   02. Fullwidth Entry Thumbnail Height
// =============================================================================

// Cropped Entry Thumbnail Height
// =============================================================================

if ( ! function_exists( 'x_post_thumbnail_height' ) ) :
  function x_post_thumbnail_height( $stack ) {

    switch ( $stack ) {
      case 'integrity' :
        $output = round( x_integrity_post_thumbnail_width() * 0.558823529 );
        break;
      case 'renew' :
        $output = round( x_renew_post_thumbnail_width() * 0.558823529 );
        break;
      case 'icon' :
        $output = round( x_icon_post_thumbnail_width() * 0.558823529 );
        break;
      case 'ethos' :
        $output = round( x_ethos_post_thumbnail_width() * 0.558823529 );
        break;
    }

    return $output;

  }
  add_action( 'customize_save', 'x_post_thumbnail_height' );
endif;



// Fullwidth Entry Thumbnail Height
// =============================================================================

if ( ! function_exists( 'x_post_thumbnail_height_full' ) ) :
  function x_post_thumbnail_height_full( $stack ) {

    switch ( $stack ) {
      case 'integrity' :
        $output = round( x_integrity_post_thumbnail_width_full() * 0.558823529 );
        break;
      case 'renew' :
        $output = round( x_renew_post_thumbnail_width_full() * 0.558823529 );
        break;
      case 'icon' :
        $output = round( x_icon_post_thumbnail_width_full() * 0.558823529 );
        break;
      case 'ethos' :
        $output = round( x_ethos_post_thumbnail_width_full() * 0.558823529 );
        break;
    }

    return $output;

  }
  add_action( 'customize_save', 'x_post_thumbnail_height_full' );
endif;