<?php

// =============================================================================
// FUNCTIONS/GLOBAL/STACK-DATA.PHP
// -----------------------------------------------------------------------------
// Get stack information.
// =============================================================================

// =============================================================================
// TABLE OF CONTENTS
// -----------------------------------------------------------------------------
//   01. Get Option
//   02. Get Stack
//   03. Get Site Layout
//   04. Get Content Layout
//   05. Define Constants
// =============================================================================

// Get Option
// =============================================================================

if ( ! function_exists( 'x_get_option' ) ) :
  function x_get_option( $option, $default = false ) {

    $output = get_option( $option, $default );

    return apply_filters( 'x_option_' . $option, $output );

  }
endif;



// Get Stack
// =============================================================================

if ( ! function_exists( 'x_get_stack' ) ) :
  function x_get_stack() {

    return x_get_option( 'x_stack', 'integrity' );

  }
endif;



// Get Site Layout
// =============================================================================

if ( ! function_exists( 'x_get_site_layout' ) ) :
  function x_get_site_layout() {

    return x_get_option( 'x_layout_site', 'full-width' );

  }
endif;



// Get Content Layout
// =============================================================================

//
// First checks if the global content layout is "full-width." If the global
// content layout is not "full-width," (i.e. displays a sidebar) then it runs
// through all possible pages to determine the correct layout for that template.
//

if ( ! function_exists( 'x_get_content_layout' ) ) :
  function x_get_content_layout() {

    $content_layout = x_get_option( 'x_layout_content', 'content-sidebar' );

    if ( $content_layout != 'full-width' ) {
      if ( is_home() ) {
        $opt    = x_get_option( 'x_blog_layout', 'sidebar' );
        $layout = ( $opt == 'sidebar' ) ? $content_layout : $opt;
      } elseif ( is_singular( 'post' ) ) {
        $meta   = get_post_meta( get_the_ID(), '_x_post_layout', true );
        $layout = ( $meta == 'on' ) ? 'full-width' : $content_layout;
      } elseif ( x_is_portfolio_item() ) {
        $layout = 'full-width';
      } elseif ( x_is_portfolio() ) {
        $meta   = get_post_meta( get_the_ID(), '_x_portfolio_layout', true );
        $layout = ( $meta == 'sidebar' ) ? $content_layout : $meta;
      } elseif ( is_page_template( 'template-layout-content-sidebar.php' ) ) {
        $layout = 'content-sidebar';
      } elseif ( is_page_template( 'template-layout-sidebar-content.php' ) ) {
        $layout = 'sidebar-content';
      } elseif ( is_page_template( 'template-layout-full-width.php' ) ) {
        $layout = 'full-width';
      } elseif ( is_archive() ) {
        if ( x_is_shop() || x_is_product_category() || x_is_product_tag() ) {
          $opt    = x_get_option( 'x_woocommerce_shop_layout_content', 'sidebar' );
          $layout = ( $opt == 'sidebar' ) ? $content_layout : $opt;
        } else {
          $opt    = x_get_option( 'x_archive_layout', 'sidebar' );
          $layout = ( $opt == 'sidebar' ) ? $content_layout : $opt;
        }
      } elseif ( x_is_product() ) {
        $layout = 'full-width';
      } elseif ( x_is_bbpress() ) {
        $opt    = x_get_option( 'x_bbpress_layout_content', 'sidebar' );
        $layout = ( $opt == 'sidebar' ) ? $content_layout : $opt;
      } elseif ( x_is_buddypress() ) {
        $opt    = x_get_option( 'x_buddypress_layout_content', 'sidebar' );
        $layout = ( $opt == 'sidebar' ) ? $content_layout : $opt;
      } elseif ( is_404() ) {
        $layout = 'full-width';
      } else {
        $layout = $content_layout;
      }
    } else {
      $layout = $content_layout;
    }

    return $layout;

  }
endif;



// Define Constants
// =============================================================================

define( 'X_VERSION', '4.0.7' );
define( 'X_TEMPLATE_PATH', get_template_directory() );
define( 'X_TEMPLATE_URL', get_template_directory_uri() );
define( 'X_BBPRESS_IS_ACTIVE', class_exists( 'bbPress' ) );
define( 'X_BUDDYPRESS_IS_ACTIVE', class_exists( 'BuddyPress' ) );
define( 'X_CONTACT_FORM_7_IS_ACTIVE', class_exists( 'WPCF7_ContactForm' ) );
define( 'X_GRAVITY_FORMS_IS_ACTIVE', class_exists( 'GFForms' ) );
define( 'X_REVOLUTION_SLIDER_IS_ACTIVE', class_exists( 'RevSlider' ) );
define( 'X_SOLILOQUY_IS_ACTIVE', class_exists( 'Soliloquy' ) );
define( 'X_VISUAL_COMOPSER_IS_ACTIVE', defined( 'WPB_VC_VERSION' ) );
define( 'X_WOOCOMMERCE_IS_ACTIVE', class_exists( 'WC_API' ) );
define( 'X_WPML_IS_ACTIVE', defined( 'ICL_SITEPRESS_VERSION' ) );