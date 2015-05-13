<?php

// =============================================================================
// FUNCTIONS/GLOBAL/CONTENT.PHP
// -----------------------------------------------------------------------------
// Functions pertaining to content output.
// =============================================================================

// =============================================================================
// TABLE OF CONTENTS
// -----------------------------------------------------------------------------
//   01. Index Title
//   02. Link Pages
//   03. Excerpt Length
//   04. Excerpt More String
//   05. Content More String
//   06. Entry Navigation
//   07. Custom <title> Output
//   08. Site Icons
//   09. Does Not Need Entry Meta
// =============================================================================

// Index Title
// =============================================================================

if ( ! function_exists( 'x_the_alternate_title' ) ) :
  function x_the_alternate_title() {

    $meta  = get_post_meta( get_the_ID(), '_x_entry_alternate_index_title', true );
    $title = ( $meta != '' ) ? $meta : get_the_title();

    echo $title;

  }
endif;



// Link Pages
// =============================================================================

if ( ! function_exists( 'x_link_pages' ) ) :
  function x_link_pages() {

    wp_link_pages( array(
      'before' => '<div class="page-links">' . __( 'Pages:', '__x__' ),
      'after'  => '</div>'
    ) );

  }
endif;



// Excerpt Length
// =============================================================================

if ( ! function_exists( 'x_excerpt_length' ) ) :
  function x_excerpt_length( $length ) {

    return x_get_option( 'x_blog_excerpt_length', '60' );

  }
  add_filter( 'excerpt_length', 'x_excerpt_length' );
endif;



// Excerpt More String
// =============================================================================

if ( ! function_exists( 'x_excerpt_string' ) ) :
  function x_excerpt_string( $more ) {
    
    $stack = x_get_stack();

    if ( $stack == 'integrity' ) {
      return ' ... <div><a href="' . get_permalink() . '" class="more-link">' . __( 'Read More', '__x__' ) . '</a></div>';
    } else if ( $stack == 'renew' ) {
      return ' ... <a href="' . get_permalink() . '" class="more-link">' . __( 'Read More', '__x__' ) . '</a>';
    } else if ( $stack == 'icon' ) {
      return ' ...';
    } else if ( $stack == 'ethos' ) {
      return ' ...';
    }

  }
  add_filter( 'excerpt_more', 'x_excerpt_string' );
endif;



// Content More String
// =============================================================================

if ( ! function_exists( 'x_content_string' ) ) :
  function x_content_string( $more ) {

    return '<a href="' . get_permalink() . '" class="more-link">' . __( 'Read More', '__x__' ) . '</a>';

  }
  add_filter( 'the_content_more_link', 'x_content_string' );
endif;



// Entry Navigation
// =============================================================================

if ( ! function_exists( 'x_entry_navigation' ) ) :
  function x_entry_navigation() {

  $stack = x_get_stack();

  if ( $stack == 'ethos' ) {
    $left_icon  = '<i class="x-icon-chevron-left"></i>';
    $right_icon = '<i class="x-icon-chevron-right"></i>';
  } else {
    $left_icon  = '<i class="x-icon-arrow-left"></i>';
    $right_icon = '<i class="x-icon-arrow-right"></i>';
  }

  $is_ltr    = ! is_rtl();
  $prev_post = get_adjacent_post( false, '', false );
  $next_post = get_adjacent_post( false, '', true );
  $prev_icon = ( $is_ltr ) ? $left_icon : $right_icon;
  $next_icon = ( $is_ltr ) ? $right_icon : $left_icon;

  ?>

  <div class="x-nav-articles">

    <?php if ( $prev_post ) : ?>
      <a href="<?php echo get_permalink( $prev_post ); ?>" title="<?php __( 'Previous Post', '__x__' ); ?>" class="prev">
        <?php echo $prev_icon; ?>
      </a>
    <?php endif; ?>

    <?php if ( $next_post ) : ?>
      <a href="<?php echo get_permalink( $next_post ); ?>" title="<?php __( 'Next Post', '__x__' ); ?>" class="next">
        <?php echo $next_icon; ?>
      </a>
    <?php endif; ?>

  </div>

  <?php

  }
endif;



// Custom <title> Output
// =============================================================================

if ( ! function_exists( 'x_wp_title' ) ) :
  function x_wp_title( $title ) {

    if ( is_front_page() ) {
      return get_bloginfo( 'name' ) . ' | ' . get_bloginfo( 'description' );
    } elseif ( is_feed() ) {
      return ' | RSS Feed';
    } else {
      return trim( $title ) . ' | ' . get_bloginfo( 'name' ); 
    }

  }
  add_filter( 'wp_title', 'x_wp_title' );
endif;



// Site Icons
// =============================================================================

if ( ! function_exists( 'x_site_icons' ) ) :
  function x_site_icons() {

    $icon_favicon       = x_get_option( 'x_icon_favicon' );
    $icon_touch         = x_get_option( 'x_icon_touch' );
    $icon_tile          = x_get_option( 'x_icon_tile' );
    $icon_tile_bg_color = x_get_option( 'x_icon_tile_bg_color' );

    if ( $icon_favicon != '' ) {
      echo '<link rel="shortcut icon" href="' . x_make_protocol_relative( $icon_favicon ) . '">';
    }

    if ( $icon_touch != '' ) {
      echo '<link rel="apple-touch-icon-precomposed" href="' . x_make_protocol_relative( $icon_touch ) . '">';
    }

    if ( $icon_tile != '' ) {
      echo '<meta name="msapplication-TileColor" content="' . $icon_tile_bg_color . '">';
      echo '<meta name="msapplication-TileImage" content="' . x_make_protocol_relative( $icon_tile ) . '">';
    }

  }
  add_action( 'wp_head', 'x_site_icons' );
endif;



// Does Not Need Entry Meta
// =============================================================================

//
// Returns true if a condition is met where displaying the entry meta data is
// not desirable.
//

if ( ! function_exists( 'x_does_not_need_entry_meta' ) ) :
  function x_does_not_need_entry_meta() {

    $post_type           = get_post_type();
    $page_condition      = $post_type == 'page';
    $post_condition      = $post_type == 'post' && x_get_option( 'x_blog_enable_post_meta', '' ) == '';
    $portfolio_condition = $post_type == 'x-portfolio' && x_get_option( 'x_portfolio_enable_post_meta', '1' ) == '';

    if ( $page_condition || $post_condition || $portfolio_condition ) {
      return true;
    } else {
      return false;
    }

  }
endif;