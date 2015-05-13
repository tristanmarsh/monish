<?php

// =============================================================================
// FUNCTIONS/VERSION-OUTPUT.PHP
// -----------------------------------------------------------------------------
// Outputs the plugin's version number as a <body> class.
// =============================================================================

// =============================================================================
// TABLE OF CONTENTS
// -----------------------------------------------------------------------------
//   01. Output Plugin Version as <body> Class
// =============================================================================

// Output Plugin Version as <body> Class
// =============================================================================

//
// 1. Places output after x_body_class_info() output located in X theme at in
//    functions/global/classes.php file.
//

function x_shortcodes_body_class( $output ) {

  $version = str_replace( '.', '_', X_SHORTCODES_VERSION );

  $output[] = 'x-shortcodes-v' . $version;

  return $output;

}

add_filter( 'body_class', 'x_shortcodes_body_class', 10001 ); // 1