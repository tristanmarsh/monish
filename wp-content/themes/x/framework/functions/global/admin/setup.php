<?php

// =============================================================================
// FUNCTIONS/GLOBAL/ADMIN/SETUP.PHP
// -----------------------------------------------------------------------------
// Sets up theme defaults and registers various WordPress features.
// =============================================================================

// =============================================================================
// TABLE OF CONTENTS
// -----------------------------------------------------------------------------
//   01. Content Width
//   02. Theme Setup
//   03. Theme Switch
//   04. Version Migration
// =============================================================================

// Content Width
// =============================================================================

if ( ! isset( $content_width ) ) :

  $stack = x_get_stack();

  switch ( $stack ) {
    case 'integrity' :
      $content_width = x_integrity_post_thumbnail_width() - 120;
      break;
    case 'renew' :
      $content_width = x_renew_post_thumbnail_width();
      break;
    case 'icon' :
      $content_width = x_icon_post_thumbnail_width();
      break;
    case 'ethos' :
      $content_width = x_ethos_post_thumbnail_width();
      break;
  }

endif;



// Theme Setup
// =============================================================================

if ( ! function_exists( 'x_setup_theme' ) ) :
  function x_setup_theme() {

    //
    // Localization.
    //
    // Translations can be added to the /framework/lang/ directory.
    //

    load_theme_textdomain( '__x__', X_TEMPLATE_PATH . '/framework/lang' );


    //
    // Automatic feed links.
    //
    // Adds RSS feed links to <head> for posts and comments.
    //

    add_theme_support( 'automatic-feed-links' );


    //
    // Post formats.
    //
    // Adds support for a variety of post formats.
    //

    add_theme_support( 'post-formats', array( 'link', 'gallery', 'quote', 'image', 'video', 'audio' ) );


    //
    // WordPress menus.
    //
    // This theme uses wp_nav_menu() in two locations.
    //

    register_nav_menus( array(
      'primary' => __( 'Primary Menu', '__x__' ),
      'footer'  => __( 'Footer Menu', '__x__' )
    ) );


    //
    // Featured images.
    //
    // Theme support for featured images and thumbnail sizes.
    //

    add_theme_support( 'post-thumbnails' );
    set_post_thumbnail_size( 100, 9999 );
    add_image_size( 'entry-integrity',                   x_integrity_post_thumbnail_width(),      9999,                                        false );
    add_image_size( 'entry-integrity-cropped',           x_integrity_post_thumbnail_width(),      x_post_thumbnail_height( 'integrity' ),      true );
    add_image_size( 'entry-integrity-fullwidth',         x_integrity_post_thumbnail_width_full(), 9999,                                        false );
    add_image_size( 'entry-integrity-cropped-fullwidth', x_integrity_post_thumbnail_width_full(), x_post_thumbnail_height_full( 'integrity' ), true );
    add_image_size( 'entry-renew',                       x_renew_post_thumbnail_width(),          9999,                                        false );
    add_image_size( 'entry-renew-cropped',               x_renew_post_thumbnail_width(),          x_post_thumbnail_height( 'renew' ),          true );
    add_image_size( 'entry-renew-fullwidth',             x_renew_post_thumbnail_width_full(),     9999,                                        false );
    add_image_size( 'entry-renew-cropped-fullwidth',     x_renew_post_thumbnail_width_full(),     x_post_thumbnail_height_full( 'renew' ),     true );
    add_image_size( 'entry-icon',                        x_icon_post_thumbnail_width(),           9999,                                        false );
    add_image_size( 'entry-icon-cropped',                x_icon_post_thumbnail_width(),           x_post_thumbnail_height( 'icon' ),           true );
    add_image_size( 'entry-icon-fullwidth',              x_icon_post_thumbnail_width_full(),      9999,                                        false );
    add_image_size( 'entry-icon-cropped-fullwidth',      x_icon_post_thumbnail_width_full(),      x_post_thumbnail_height_full( 'icon' ),      true );
    add_image_size( 'entry-ethos',                       x_ethos_post_thumbnail_width(),          9999,                                        false );
    add_image_size( 'entry-ethos-cropped',               x_ethos_post_thumbnail_width(),          x_post_thumbnail_height( 'ethos' ),          true );
    add_image_size( 'entry-ethos-fullwidth',             x_ethos_post_thumbnail_width_full(),     9999,                                        false );
    add_image_size( 'entry-ethos-cropped-fullwidth',     x_ethos_post_thumbnail_width_full(),     x_post_thumbnail_height_full( 'ethos' ),     true );


    //
    // WooCommerce.
    //
    // Theme support for the WooCommerce plugin.
    //

    add_theme_support( 'woocommerce' );


    //
    // Allow shortcodes in widgets.
    //

    add_filter( 'widget_text', 'do_shortcode' );


    //
    // Remove unnecessary stuff.
    //
    // 1. Version number (for security).
    // 2. Really simple discovery.
    // 3. Windows live writer.
    // 4. Post relational links.
    //

    remove_action( 'wp_head', 'wp_generator' );                    // 1
    remove_action( 'wp_head', 'rsd_link' );                        // 2
    remove_action( 'wp_head', 'wlwmanifest_link' );                // 3
    remove_action( 'wp_head', 'start_post_rel_link' );             // 4
    remove_action( 'wp_head', 'index_rel_link' );                  // 4
    remove_action( 'wp_head', 'adjacent_posts_rel_link_wp_head' ); // 4

  }
  add_action( 'after_setup_theme', 'x_setup_theme' );
endif;



// Theme Switch
// =============================================================================

function x_switch_theme( $new_name, $new_theme ) {

  if ( $new_theme == 'X' || $new_theme->get( 'Template' ) == 'x' ) {
    return false;
  }

  include_once( ABSPATH . '/wp-admin/includes/plugin.php' );

  $plugins   = get_plugins();
  $x_plugins = array();

  foreach ( (array) $plugins as $plugin => $headers ) {
    if ( ! empty( $headers['X Plugin'] ) ) {
      $x_plugins[] = $plugin;
    }
  }

  deactivate_plugins( $x_plugins );

}

add_action( 'switch_theme', 'x_switch_theme', 10, 2 );



// Version Migration
// =============================================================================

function x_version_migration() {

  $prior = get_option( 'x_version', '1.0.0' );

  if ( version_compare( $prior, X_VERSION, '<' ) ) {

    if ( version_compare( $prior, '2.2.0', '<' ) ) {
      $mods = get_theme_mods();
      foreach( $mods as $key => $value ) {
        update_option( $key, $value );
      }
    }

    update_option( 'x_version', X_VERSION );

  }

}

add_action( 'admin_init', 'x_version_migration' );