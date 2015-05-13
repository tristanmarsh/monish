<?php

// =============================================================================
// FUNCTIONS/ENQUEUE/SCRIPTS.PHP
// -----------------------------------------------------------------------------
// Plugin scripts.
// =============================================================================

// =============================================================================
// TABLE OF CONTENTS
// -----------------------------------------------------------------------------
//   01. Enqueue Site Scripts
// =============================================================================

// Enqueue Site Scripts
// =============================================================================

function x_shortcodes_enqueue_site_scripts() {

  wp_register_script( 'x-shortcodes-site-head', X_SHORTCODES_URL . '/js/dist/site/x-shortcodes-head.min.js', array( 'jquery' ), X_SHORTCODES_VERSION, false );
  wp_register_script( 'x-shortcodes-site-body', X_SHORTCODES_URL . '/js/dist/site/x-shortcodes-body.min.js', array( 'jquery' ), X_SHORTCODES_VERSION, true );
  wp_register_script( 'vendor-ilightbox',       X_SHORTCODES_URL . '/js/dist/site/vendor-ilightbox.min.js',  array( 'jquery' ), X_SHORTCODES_VERSION, true );
  wp_register_script( 'vendor-google-maps',     'https://maps.googleapis.com/maps/api/js?sensor=false',      array( 'jquery' ), NULL, true );

  wp_enqueue_script( 'x-shortcodes-site-head' );
  wp_enqueue_script( 'x-shortcodes-site-body' );

}

add_action( 'wp_enqueue_scripts', 'x_shortcodes_enqueue_site_scripts' );