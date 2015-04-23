<?php

// =============================================================================
// FUNCTIONS/GLOBAL/ENQUEUE/SCRIPTS.PHP
// -----------------------------------------------------------------------------
// Enqueue all scripts for X.
// =============================================================================

// =============================================================================
// TABLE OF CONTENTS
// -----------------------------------------------------------------------------
//   01. Enqueue Site Scripts
//   02. Enqueue Admin Scripts
//   03. Enqueue Customizer Scripts
// =============================================================================

// Enqueue Site Scripts
// =============================================================================

if ( ! function_exists( 'x_enqueue_site_scripts' ) ) :
  function x_enqueue_site_scripts() {

    wp_register_script( 'x-site-head', X_TEMPLATE_URL . '/framework/js/dist/site/x-head.min.js', array( 'jquery' ), NULL, false );
    wp_register_script( 'x-site-body', X_TEMPLATE_URL . '/framework/js/dist/site/x-body.min.js', array( 'jquery' ), NULL, true );
    wp_register_script( 'x-site-icon', X_TEMPLATE_URL . '/framework/js/dist/site/x-icon.min.js', array( 'jquery' ), NULL, true );

    wp_enqueue_script( 'x-site-head' );
    wp_enqueue_script( 'x-site-body' );

    if ( x_get_stack() == 'icon' ) {
      wp_enqueue_script( 'x-site-icon' );
    }

    if ( is_singular() ) {
      wp_enqueue_script( 'comment-reply' );
    }

    if ( X_BUDDYPRESS_IS_ACTIVE ) {
      wp_dequeue_script( 'bp-legacy-js' );
      wp_dequeue_script( 'bp-parent-js' );
      wp_enqueue_script( 'x-site-buddypress', X_TEMPLATE_URL . '/framework/js/dist/site/x-buddypress.js', bp_core_get_js_dependencies(), NULL, false );
      wp_localize_script( 'x-site-buddypress', 'BP_DTheme', x_buddypress_core_get_js_strings() );
    }

  }
  add_action( 'wp_enqueue_scripts', 'x_enqueue_site_scripts' );
endif;



// Enqueue Admin Scripts
// =============================================================================

if ( ! function_exists( 'x_enqueue_post_meta_scripts' ) ) :
  function x_enqueue_post_meta_scripts( $hook ) {

    GLOBAL $post;
    GLOBAL $wp_customize;

    if ( isset( $wp_customize ) ) {
      return;
    }

    wp_enqueue_script( 'wp-color-picker');

    if ( $hook == 'widgets.php' ) {
      wp_enqueue_script( 'x-widgets-js', X_TEMPLATE_URL . '/framework/js/dist/admin/x-widgets.min.js', array( 'jquery' ), NULL, true );
    }

    if ( $hook == 'post.php' || $hook == 'post-new.php' || $hook == 'edit-tags.php' ) {
      wp_enqueue_script( 'x-meta-js', X_TEMPLATE_URL . '/framework/js/dist/admin/x-meta.min.js', array( 'jquery', 'media-upload', 'thickbox' ), NULL, true );
    }

    if ( $hook == 'post.php' || $hook == 'post-new.php' || strpos( $hook, 'x-extensions' ) != false ) {
      wp_enqueue_script( 'jquery-ui-datepicker' );
    }

    if ( $hook == 'post.php' || $hook == 'post-new.php' ) {

      wp_enqueue_script( 'media-upload' );
      wp_enqueue_script( 'thickbox' );

      echo '<script type="text/javascript" id="x-ajax">
              var x_ajax = { post_id : 0, nonce : "" };
              x_ajax.post_id = "' . $post->ID . '";
              x_ajax.nonce   = "' . wp_create_nonce( 'x-ajax' ) . '";
            </script>';

    }   

  }
  add_action( 'admin_enqueue_scripts', 'x_enqueue_post_meta_scripts' );
endif;



// Enqueue Customizer Scripts
// =============================================================================

//
// Admin.
//

if ( ! function_exists( 'x_enqueue_customizer_admin_scripts' ) ) :
  function x_enqueue_customizer_admin_scripts() {

    wp_enqueue_script( 'x-customizer-admin-js', X_TEMPLATE_URL . '/framework/js/dist/admin/x-customizer-admin.min.js', array( 'jquery' ), NULL, true );

  }
  add_action( 'admin_enqueue_scripts', 'x_enqueue_customizer_admin_scripts' );
endif;


//
// Controls.
//

if ( ! function_exists( 'x_enqueue_customizer_controls_scripts' ) ) :
  function x_enqueue_customizer_controls_scripts() {

    wp_enqueue_script( 'x-customizer-controls-js', X_TEMPLATE_URL . '/framework/js/dist/admin/x-customizer-controls.min.js', array( 'jquery' ), NULL, true );

  }
  add_action( 'customize_controls_print_footer_scripts', 'x_enqueue_customizer_controls_scripts' );
endif;


//
// Preview.
//

if ( ! function_exists( 'x_enqueue_customizer_preview_scripts' ) ) :
  function x_enqueue_customizer_preview_scripts() {

    wp_enqueue_script( 'x-customizer-preview-js', X_TEMPLATE_URL . '/framework/js/dist/admin/x-customizer-preview.min.js', array( 'jquery', 'customize-preview', 'heartbeat' ), NULL, true );

  }
  add_action( 'customize_preview_init', 'x_enqueue_customizer_preview_scripts' );
endif;