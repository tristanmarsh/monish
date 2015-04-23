<?php

// =============================================================================
// FUNCTIONS/GLOBAL/NAVBAR.PHP
// -----------------------------------------------------------------------------
// Handles all custom functionality for the navbar.
// =============================================================================

// =============================================================================
// TABLE OF CONTENTS
// -----------------------------------------------------------------------------
//   01. Get One Page Navigation Menu
//   02. Is One Page Navigation
//   03. Get Navbar Positioning
//   04. Get Logo and Navigation Layout
//   05. Navbar Searchform Popup
//   06. Navbar Search Navigation Item
// =============================================================================

// Get One Page Navigation Menu
// =============================================================================

if ( ! function_exists( 'x_get_one_page_navigation_menu' ) ) :
  function x_get_one_page_navigation_menu() {

    $meta = get_post_meta( get_the_ID(), '_x_page_one_page_navigation', true );
    $menu = ( $meta == '' ) ? 'Deactivated' : $meta;

    return $menu;

  }
endif;



// Is One Page Navigation
// =============================================================================

if ( ! function_exists( 'x_is_one_page_navigation' ) ) :
  function x_is_one_page_navigation() {

    $one_page_navigation = x_get_one_page_navigation_menu();

    if ( $one_page_navigation == 'Deactivated' ) {
      $output = false;
    } else {
      $output = true;
    }

    return $output;

  }
endif;



// Get Navbar Positioning
// =============================================================================

if ( ! function_exists( 'x_get_navbar_positioning' ) ) :
  function x_get_navbar_positioning() {

    if ( x_is_one_page_navigation() ) {
      $output = 'fixed-top';
    } else {
      $output = x_get_option( 'x_navbar_positioning', 'static-top' );
    }

    return $output;

  }
  add_action( 'customize_save', 'x_get_navbar_positioning' );
endif;



// Get Logo and Navigation Layout
// =============================================================================

if ( ! function_exists( 'x_get_logo_navigation_layout' ) ) :
  function x_get_logo_navigation_layout() {

    return x_get_option( 'x_logo_navigation_layout', 'inline' );

  }
endif;



// Navbar Searchform Popup
// =============================================================================

if ( ! function_exists( 'x_navbar_searchform_overlay' ) ) :
  function x_navbar_searchform_overlay() {

    if ( x_get_option( 'x_header_search_enable', '' ) == '1' ) :

      ?>

      <div class="x-searchform-overlay">
        <div class="x-searchform-overlay-inner">
          <div class="x-container-fluid max width">
            <form method="get" id="searchform" class="form-search center-text" action="<?php echo esc_url( home_url( '/' ) ); ?>">
              <label for="s" class="cfc-h-tx tt-upper"><?php _e( 'Type and Press &ldquo;enter&rdquo; to Search', '__x__' ); ?></label>
              <input type="text" id="s" class="search-query cfc-h-tx center-text tt-upper" name="s">
            </form>
          </div>
        </div>
      </div>

      <?php

    endif;

  }
  add_action( 'x_before_site_end', 'x_navbar_searchform_overlay' );
endif;



// Navbar Search Navigation Item
// =============================================================================

if ( ! function_exists( 'x_navbar_search_navigation_item' ) ) :
  function x_navbar_search_navigation_item( $items, $args ) {

    if ( x_get_option( 'x_header_search_enable', '' ) == '1' ) {
      if ( $args->theme_location == 'primary' ) {
        $items .= '<li class="menu-item menu-item-navbar-search">'
                  . '<a href="#" class="x-btn-navbar-search">'
                    . '<i class="x-icon x-icon-search"></i><span class="x-hidden-desktop"> Search</span>'
                  . '</a>'
                . '</li>';
      }
    }

    return $items;

  }
  add_filter( 'wp_nav_menu_items', 'x_navbar_search_navigation_item', 9999, 2 );
endif;