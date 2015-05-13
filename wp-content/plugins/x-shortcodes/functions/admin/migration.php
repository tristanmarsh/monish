<?php

// =============================================================================
// FUNCTIONS/ADMIN/MIGRATION.PHP
// -----------------------------------------------------------------------------
// Handles plugin migration.
// =============================================================================

// =============================================================================
// TABLE OF CONTENTS
// -----------------------------------------------------------------------------
//   01. Version Migration
//   02. Pairing Notice
// =============================================================================

// Version Migration
// =============================================================================

function x_shortcodes_version_migration() {

  $prior = get_option( 'x_shortcodes_version', '1.0.0' );

  if ( version_compare( $prior, X_SHORTCODES_VERSION, '<' ) ) {

    //
    // Update stored version number.
    //

    update_option( 'x_shortcodes_version', X_SHORTCODES_VERSION );

  }

}

add_action( 'admin_init', 'x_shortcodes_version_migration' );



// Pairing Notice
// =============================================================================

//
// Define current version of theme and prompt for theme update if:
//
// 1. Theme doesn't specify current plugin constant (i.e. is too old).
// 2. Theme is older than what the plugin desires it to be.
//

define( 'X_CURRENT', '3.2.3' );

function x_shortcodes_pairing_notice() {

  if ( function_exists( 'x_plugin_shortcodes_exists' ) ) {
    if ( ! defined( 'X_SHORTCODES_CURRENT' ) || version_compare( X_VERSION, X_CURRENT, '<' ) ) { ?>

      <div class="updated x-notice warning">
        <p><strong>IMPORTANT: Please update X</strong>. You are using a newer version of X &ndash; Shortcodes that may not be compatible. After updating, please ensure that you have cleared out your browser cache and any caching plugins you may be using. This message will self destruct upon updating X.</p>
      </div>

    <?php }
  }

}

add_action( 'admin_notices', 'x_shortcodes_pairing_notice' );