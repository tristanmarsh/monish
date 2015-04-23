<?php

// =============================================================================
// FUNCTIONS/GLOBAL/ADMIN/THUMBNAILS/INTEGRITY.PHP
// -----------------------------------------------------------------------------
// Sets up entry thumbnail sizes based on Customizer options.
// =============================================================================

// =============================================================================
// TABLE OF CONTENTS
// -----------------------------------------------------------------------------
//   01. Integrity Standard Entry Thumbnail Width
//   02. Integrity Fullwidth Entry Thumbnail Width
// =============================================================================

// Integrity Standard Entry Thumbnail Width
// =============================================================================

if ( ! function_exists( 'x_integrity_post_thumbnail_width' ) ) :
  function x_integrity_post_thumbnail_width() {

    //
    // 1. Subtract half of the span margin setup by the grid.
    //

    $a = x_get_option( 'x_integrity_layout_site' );
    $b = x_get_option( 'x_integrity_layout_content' );
    $c = x_get_option( 'x_integrity_sizing_site_width' );
    $d = x_get_option( 'x_integrity_sizing_site_max_width' );
    $e = x_get_option( 'x_integrity_sizing_content_width' );

    $site_layout    = ( $a == '' ) ? 'full-width'      : $a;
    $content_layout = ( $b == '' ) ? 'content-sidebar' : $b;
    $site_width     = ( $c == '' ) ? 88 / 100          : $c / 100;
    $site_max_width = ( $d == '' ) ? 1200              : $d;
    $content_width  = ( $e == '' ) ? 72 - 2.463055     : $e - 2.463055; // 1

    if ( $content_layout == 'full-width' ) {
      if ( $site_layout == 'full-width' ) {
        $output = $site_max_width;
      } elseif ( $site_layout == 'boxed' ) {
        $output = $site_max_width * $site_width;
      }
    } else {
      if ( $site_layout == 'full-width' ) {
        $output = round( $site_max_width * ( $content_width / 100 ) );
      } elseif ( $site_layout == 'boxed' ) {
        $output = round( $site_max_width * ( $content_width / 100 ) * $site_width );
      }
    }

    if ( $site_layout == 'full-width' ) {
      if ( $site_max_width < 979 * $site_width ) {
        $output = $site_max_width;
      } else {
        if ( $output < ( 979 * $site_width ) ) {
          $output = round( 979 * $site_width );
        }
      }
    } elseif ( $site_layout == 'boxed' ) {
      if ( $site_max_width * $site_width < 979 * $site_width * $site_width ) {
        $output = $site_max_width * $site_width;
      } else {
        if ( $output < ( 979 * $site_width * $site_width ) ) {
          $output = round( 979 * $site_width * $site_width );
        }
      }
    }
    
    return $output;

  }
  add_action( 'customize_save', 'x_integrity_post_thumbnail_width' );
endif;



// Integrity Fullwidth Entry Thumbnail Width
// =============================================================================

if ( ! function_exists( 'x_integrity_post_thumbnail_width_full' ) ) :
  function x_integrity_post_thumbnail_width_full() {

    $a = x_get_option( 'x_integrity_layout_site' );
    $b = x_get_option( 'x_integrity_sizing_site_width' );
    $c = x_get_option( 'x_integrity_sizing_site_max_width' );

    $site_layout    = ( $a == '' ) ? 'full-width' : $a;
    $site_width     = ( $b == '' ) ? 88 / 100     : $b / 100;
    $site_max_width = ( $c == '' ) ? 1200         : $c;

    if ( $site_layout == 'full-width' ) {
      $output = $site_max_width;
    } elseif ( $site_layout == 'boxed' ) {
      $output = $site_max_width * $site_width;
    }
    
    return $output;

  }
  add_action( 'customize_save', 'x_integrity_post_thumbnail_width_full' );
endif;