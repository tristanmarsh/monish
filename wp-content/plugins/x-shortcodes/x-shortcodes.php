<?php

/*

Plugin Name: X &ndash; Shortcodes
Plugin URI: http://theme.co/x/
Description: This plugin is required to run X as it includes all of our shortcode functionality, which is tightly integrated into the theme.
Version: 3.0.5
Author: Themeco
Author URI: http://theme.co/
Text Domain: __x__
X Plugin: x-shortcodes

*/

// =============================================================================
// TABLE OF CONTENTS
// -----------------------------------------------------------------------------
//   01. Define Constants
//   02. Initialize the Plugin and Require Files
// =============================================================================

// Define Constants
// =============================================================================

define( 'X_SHORTCODES_VERSION', '3.0.5' );
define( 'X_SHORTCODES_URL', plugins_url( '', __FILE__ ) );



// Initialize the Plugin and Require Files
// =============================================================================

function x_shortcodes_init() {

  //
  // Load plugin textdomain.
  //

  load_plugin_textdomain( '__x__', false, dirname( plugin_basename( __FILE__ ) ) . '/lang/' );


  //
  // Include frontend functionality.
  //

  require_once( 'functions/version-output.php' );
  require_once( 'functions/get-option.php' );
  require_once( 'functions/data-attributes.php' );
  require_once( 'functions/shortcodes-native.php' );
  require_once( 'functions/shortcodes.php' );
  require_once( 'functions/remove.php' );


  //
  // Styles and scripts.
  //

  require_once( 'functions/enqueue/styles.php' );
  require_once( 'functions/enqueue/scripts.php' );

}

add_action( 'init', 'x_shortcodes_init' );

require_once( 'functions/admin/migration.php' );
require_once( 'functions/admin/user.php' );
require_once( 'functions/admin/shortcode-generator/functions.php' );
require_once( 'functions/admin/map-shortcodes.php' );