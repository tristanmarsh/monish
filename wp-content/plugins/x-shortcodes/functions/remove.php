<?php

// =============================================================================
// FUNCTIONS/REMOVE.PHP
// -----------------------------------------------------------------------------
// Remove various bits of markup and styling from WordPress.
// =============================================================================

// =============================================================================
// TABLE OF CONTENTS
// -----------------------------------------------------------------------------
//   01. Remove Empty <p> and <br> Tags Around Shortcodes
//   02. Remove Gallery Style
//   03. Remove Gallery <br> Tags
// =============================================================================

// Remove Empty <p> and <br> Tags Around Shortcodes
// =============================================================================

if ( ! function_exists( 'x_clean_shortcodes' ) ) :
  function x_clean_shortcodes( $content ) {

    $array = array (
      '<p>['    => '[',
      ']</p>'   => ']',
      ']<br />' => ']'
    );

    $content = strtr( $content, $array );

    return $content;

  }
  add_filter( 'the_content', 'x_clean_shortcodes' );
endif;



// // Remove Gallery Style
// // =============================================================================

// if ( ! function_exists( 'x_remove_gallery_style' ) ) :
//   function x_remove_gallery_style() {
//     add_filter( 'use_default_gallery_style', '__return_false' );
//   }  
//   add_action( 'init', 'x_remove_gallery_style' );
// endif;



// // Remove Gallery <br> Tags
// // =============================================================================

// if ( ! function_exists( 'x_remove_gallery_br_tags' ) ) :
//   function x_remove_gallery_br_tags( $output ) {
//     return preg_replace( '/<br style=(.*?)>/mi', '', $output );
//   }
//   add_filter( 'the_content', 'x_remove_gallery_br_tags', 11, 2 );
// endif;