<?php
 
// =============================================================================
// FUNCTIONS/GLOBAL/ADMIN/CUSTOMIZER/OUTPUT/ETHOS.PHP
// -----------------------------------------------------------------------------
// Ethos CSS ouptut.
// =============================================================================

// =============================================================================
// TABLE OF CONTENTS
// -----------------------------------------------------------------------------
//   01. Body Background
//   02. Site Link Color Accents
//   03. Container Sizing
//   04. Layout Sizing
//   05. Navbar
//   06. Navbar - Positioning
//   07. Navbar - Dropdowns
//   08. Design Options
//   09. Post Slider
//   10. Custom Fonts - Colors
//   11. Responsive Styling
// =============================================================================

$x_ethos_sizing_site_max_width            = x_get_option( 'x_ethos_sizing_site_max_width' );
$x_ethos_sizing_site_width                = x_get_option( 'x_ethos_sizing_site_width' );
$x_ethos_sizing_content_width             = x_get_option( 'x_ethos_sizing_content_width' );
$x_ethos_bg_color                         = x_get_option( 'x_ethos_bg_color' );
$x_ethos_bg_image_pattern                 = x_get_option( 'x_ethos_bg_image_pattern' );
$x_ethos_navbar_desktop_link_side_padding = x_get_option( 'x_ethos_navbar_desktop_link_side_padding' );
$x_ethos_topbar_background                = x_get_option( 'x_ethos_topbar_background' );
$x_ethos_navbar_background                = x_get_option( 'x_ethos_navbar_background' );
$x_ethos_sidebar_widget_headings_color    = x_get_option( 'x_ethos_sidebar_widget_headings_color' );
$x_ethos_sidebar_color                    = x_get_option( 'x_ethos_sidebar_color' );
$x_ethos_post_slider_blog_height          = x_get_option( 'x_ethos_post_slider_blog_height' );
$x_ethos_post_slider_archive_height       = x_get_option( 'x_ethos_post_slider_archive_height' );

$x_ethos_navbar_outer_border_width        = '2';

?>

/* Body Background
// ========================================================================== */

<?php if ( $x_ethos_bg_image_pattern == '' ) : ?>

  body {
    background-color: <?php echo $x_ethos_bg_color; ?>;
  }

<?php else : ?>

  body {
    background: <?php echo $x_ethos_bg_color; ?> url(<?php echo x_make_protocol_relative( $x_ethos_bg_image_pattern ); ?>) center top repeat;
  }

<?php endif; ?>



/* Site Link Color Accents
// ========================================================================== */

/*
// Color.
*/

a,
h1 a:hover,
h2 a:hover,
h3 a:hover,
h4 a:hover,
h5 a:hover,
h6 a:hover,
.x-breadcrumb-wrap a:hover,
.x-comment-author a:hover,
.x-comment-time:hover,
.p-meta > span > a:hover,
.format-link .link a:hover,
.x-sidebar .widget ul li a:hover,
.x-sidebar .widget ol li a:hover,
.x-sidebar .widget_tag_cloud .tagcloud a:hover,
.x-portfolio .entry-extra .x-ul-tags li a:hover {
  color: <?php echo $x_site_link_color; ?>;
}

a:hover {
  color: <?php echo $x_site_link_color_hover; ?>;
}

<?php if ( X_WOOCOMMERCE_IS_ACTIVE ) : ?>

  .woocommerce .price > .amount,
  .woocommerce .price > ins > .amount,
  .woocommerce-page .price > .amount,
  .woocommerce-page .price > ins > .amount,
  .woocommerce .star-rating:before,
  .woocommerce-page .star-rating:before,
  .woocommerce .star-rating span:before,
  .woocommerce-page .star-rating span:before {
    color: <?php echo $x_site_link_color; ?>;
  }

<?php endif; ?>


/*
// Border color.
*/

a.x-img-thumbnail:hover {
  border-color: <?php echo $x_site_link_color; ?>;
}


/*
// Background color.
*/

<?php if ( X_WOOCOMMERCE_IS_ACTIVE ) : ?>

  .woocommerce .onsale,
  .woocommerce-page .onsale,
  .widget_price_filter .ui-slider .ui-slider-range {
    background-color: <?php echo $x_site_link_color; ?>;
  }

<?php endif; ?>



/* Container Sizing
// ========================================================================== */

.x-container-fluid.width {
  width: <?php echo $x_ethos_sizing_site_width . '%'; ?>;
}

.x-container-fluid.max {
  max-width: <?php echo $x_ethos_sizing_site_max_width . 'px'; ?>;
}

<?php if ( x_get_option( 'x_ethos_layout_site' ) == 'boxed' ) : ?>

  .site,
  .x-navbar.x-navbar-fixed-top.x-container-fluid.max.width {
    width: <?php echo $x_ethos_sizing_site_width . '%'; ?>;
    max-width: <?php echo $x_ethos_sizing_site_max_width . 'px'; ?>;
  }

<?php endif; ?>



/* Layout Sizing
// ========================================================================== */

/*
// Main structural elements.
*/

.x-main {
  width: <?php echo $x_ethos_sizing_content_width . '%'; ?>;
}

.x-sidebar {
  width: <?php echo 100 - $x_ethos_sizing_content_width . '%'; ?>;
}


/*
// Main content background.
*/

.x-content-sidebar-active .x-container-fluid.main:before {
  right: <?php echo 100 - $x_ethos_sizing_content_width . '%'; ?>;
}

.x-sidebar-content-active .x-container-fluid.main:before {
  left: <?php echo 100 - $x_ethos_sizing_content_width . '%'; ?>;
}

.x-full-width-active .x-container-fluid.main:before {
  left: -5000em;
}



/* Navbar
// ========================================================================== */

/*
// Desktop link side padding.
*/

.x-navbar .x-nav > li > a {
  padding-left: <?php echo $x_ethos_navbar_desktop_link_side_padding . 'px'; ?>;
  padding-right: <?php echo $x_ethos_navbar_desktop_link_side_padding . 'px'; ?>;
}


/*
// Color.
*/

.x-navbar .x-nav > li > a,
.x-navbar .sub-menu a,
.x-nav-collapse .sub-menu a,
.x-breadcrumb-wrap a,
.x-breadcrumbs .delimiter {
  color: <?php echo $x_navbar_link_color; ?>;
}

.x-topbar .p-info a:hover,
.x-social-global a:hover,
.x-navbar .x-nav > li > a:hover,
.x-navbar .x-nav > .sfHover > a,
.x-navbar .x-nav > .current-menu-item > a,
.x-navbar .sub-menu a:hover,
.x-navbar .sub-menu .sfHover > a,
.x-navbar .sub-menu .current-menu-item > a,
.x-nav .x-megamenu > .sub-menu > li > a,
.x-widgetbar .widget a:hover,
.x-colophon .widget a:hover,
.x-colophon.bottom .x-colophon-content a:hover,
.x-colophon.bottom .x-nav a:hover {
  color: <?php echo $x_navbar_link_color_hover; ?>;
}


/*
// Box shadow.
*/

<?php

$locations = get_nav_menu_locations();
$items     = wp_get_nav_menu_items( $locations['primary'] );

foreach ( $items as $item ) {
  if ( $item->type == 'taxonomy' && $item->menu_item_parent == 0 ) {

    $t_id   = $item->object_id;
    $accent = x_ethos_category_accent_color( $t_id, $x_site_link_color );

    ?>

    <?php if ( $x_navbar_positioning == 'static-top' || $x_navbar_positioning == 'fixed-top' ) : ?>

      .x-navbar .x-nav > li.tax-item-<?php echo $t_id; ?> > a:hover,
      .x-navbar .x-nav > li.tax-item-<?php echo $t_id; ?>.sfHover > a {
        box-shadow: 0 <?php echo $x_ethos_navbar_outer_border_width; ?>px 0 0 <?php echo $accent; ?>;
      }

    <?php elseif ( $x_navbar_positioning == 'fixed-left' ) : ?>

      .x-navbar .x-nav > li.tax-item-<?php echo $t_id; ?> > a:hover,
      .x-navbar .x-nav > li.tax-item-<?php echo $t_id; ?>.sfHover > a {
        box-shadow: <?php echo $x_ethos_navbar_outer_border_width; ?>px 0 0 0 <?php echo $accent; ?>;
      }

    <?php elseif ( $x_navbar_positioning == 'fixed-right' ) : ?>

      .x-navbar .x-nav > li.tax-item-<?php echo $t_id; ?> > a:hover,
      .x-navbar .x-nav > li.tax-item-<?php echo $t_id; ?>.sfHover > a {
        box-shadow: -<?php echo $x_ethos_navbar_outer_border_width; ?>px 0 0 0 <?php echo $accent; ?>;
      }

    <?php endif; ?>

    <?php

  }
}

?>



/* Navbar - Positioning
// ========================================================================== */

<?php if ( $x_navbar_positioning == 'static-top' || $x_navbar_positioning == 'fixed-top' ) : ?>

  .x-navbar .x-nav > li > a:hover,
  .x-navbar .x-nav > .sfHover > a,
  .x-navbar .x-nav > .current-menu-item > a {
    box-shadow: 0 <?php echo $x_ethos_navbar_outer_border_width; ?>px 0 0 <?php echo $x_site_link_color; ?>;
  }

  .x-navbar .x-nav > li > a {
    height: <?php echo $x_navbar_height . 'px'; ?>;
    padding-top: <?php echo $x_navbar_adjust_links_top . 'px'; ?>;
  }

<?php endif; ?>

<?php if ( $x_navbar_positioning == 'fixed-left' || $x_navbar_positioning == 'fixed-right' ) : ?>

  .x-navbar .x-nav > li > a {
    padding-top: <?php echo round( ( $x_navbar_adjust_links_side - $x_navbar_font_size ) / 2 ) . 'px'; ?>;
    padding-bottom: <?php echo round( ( $x_navbar_adjust_links_side - $x_navbar_font_size ) / 2 ) . 'px'; ?>;
    padding-left: 7%;
    padding-right: 7%;
  }

  .x-megamenu > .sub-menu {
    width: <?php echo 879 - $x_navbar_width . 'px'; ?>
  }

<?php endif; ?>

<?php if ( $x_navbar_positioning == 'fixed-left' ) : ?>

  .x-navbar .x-nav > li > a:hover,
  .x-navbar .x-nav > .sfHover > a,
  .x-navbar .x-nav > .current-menu-item > a {
    box-shadow: <?php echo $x_ethos_navbar_outer_border_width; ?>px 0 0 0 <?php echo $x_site_link_color; ?>;
  }

  .x-widgetbar {
    left: <?php echo $x_navbar_width . 'px'; ?>;
  }

<?php endif; ?>

<?php if ( $x_navbar_positioning == 'fixed-right' ) : ?>

  .x-navbar .x-nav > li > a:hover,
  .x-navbar .x-nav > .sfHover > a,
  .x-navbar .x-nav > .current-menu-item > a {
    box-shadow: -<?php echo $x_ethos_navbar_outer_border_width; ?>px 0 0 0 <?php echo $x_site_link_color; ?>;
  }

  .x-widgetbar {
    right: <?php echo $x_navbar_width . 'px'; ?>;
  }

<?php endif; ?>



/* Navbar - Dropdowns
// ========================================================================== */

.sf-menu > li ul {
  top: <?php echo $x_navbar_height + $x_ethos_navbar_outer_border_width . 'px'; ?>;
}



/* Design Options
// ========================================================================== */

/*
// Color.
*/

.h-landmark,
.x-sidebar .h-widget,
.x-sidebar .h-widget a.rsswidget,
.x-sidebar .h-widget a.rsswidget:hover,
.x-sidebar .widget.widget_pages .current_page_item a,
.x-sidebar .widget.widget_nav_menu .current-menu-item a,
.x-sidebar .widget.widget_pages .current_page_item a:hover,
.x-sidebar .widget.widget_nav_menu .current-menu-item a:hover {
  color: <?php echo $x_ethos_sidebar_widget_headings_color; ?>;
}

.x-sidebar .widget,
.x-sidebar .widget a,
.x-sidebar .widget ul li a,
.x-sidebar .widget ol li a,
.x-sidebar .widget_tag_cloud .tagcloud a,
.x-sidebar .widget_product_tag_cloud .tagcloud a,
.x-sidebar .widget a:hover,
.x-sidebar .widget ul li a:hover,
.x-sidebar .widget ol li a:hover,
.x-sidebar .widget_tag_cloud .tagcloud a:hover,
.x-sidebar .widget_product_tag_cloud .tagcloud a:hover,
.x-sidebar .widget_shopping_cart .buttons .button,
.x-sidebar .widget_price_filter .price_slider_amount .button {
  color: <?php echo $x_ethos_sidebar_color; ?>;
}


/*
// Border color.
*/

.x-sidebar .h-widget,
.x-sidebar .widget.widget_pages .current_page_item,
.x-sidebar .widget.widget_nav_menu .current-menu-item {
  border-color: <?php echo $x_ethos_sidebar_widget_headings_color; ?>;
}


/*
// Background color.
*/

.x-topbar,
.x-colophon.bottom {
  background-color: <?php echo $x_ethos_topbar_background; ?>;
}

.x-logobar,
.x-navbar,
.x-navbar .sub-menu,
.x-colophon.top {
  background-color: <?php echo $x_ethos_navbar_background; ?>;
}



/* Post Slider
// ========================================================================== */

.x-post-slider {
  height: <?php echo $x_ethos_post_slider_blog_height . 'px'; ?>;
}
 
.archive .x-post-slider {
  height: <?php echo $x_ethos_post_slider_archive_height . 'px'; ?>;
}

.x-post-slider .x-post-slider-entry {
  padding-bottom: <?php echo $x_ethos_post_slider_blog_height . 'px'; ?>;
}
 
.archive .x-post-slider .x-post-slider-entry {
  padding-bottom: <?php echo $x_ethos_post_slider_archive_height . 'px'; ?>;
}



/* Custom Fonts - Colors
// ========================================================================== */

/*
// Brand.
*/

<?php if ( $x_logo_font_color_enable == '1' ) : ?>

  .x-brand,
  .x-brand:hover {
    color: <?php echo $x_logo_font_color; ?>;
  }

<?php endif; ?>


/*
// Body.
*/

<?php if ( $x_body_font_color_enable == '1' ) : ?>

  .format-link .link a,
  .x-portfolio .entry-extra .x-ul-tags li a {
    color: <?php echo $x_body_font_color; ?>;
  }

<?php endif; ?>


/*
// Headings.
*/

<?php if ( $x_headings_font_color_enable == '1' ) : ?>

  .p-meta > span > a,
  .x-nav-articles a,
  .entry-top-navigation .entry-parent,
  .option-set .x-index-filters,
  .option-set .x-portfolio-filters,
  .option-set .x-index-filters-menu >li >a:hover,
  .option-set .x-index-filters-menu >li >a.selected,
  .option-set .x-portfolio-filters-menu > li > a:hover,
  .option-set .x-portfolio-filters-menu > li > a.selected {
    color: <?php echo $x_headings_font_color; ?>;
  }

  .x-nav-articles a,
  .entry-top-navigation .entry-parent,
  .option-set .x-index-filters,
  .option-set .x-portfolio-filters,
  .option-set .x-index-filters i,
  .option-set .x-portfolio-filters i {
    border-color: <?php echo $x_headings_font_color; ?>;
  }

  .x-nav-articles a:hover,
  .entry-top-navigation .entry-parent:hover,
  .option-set .x-index-filters:hover i,
  .option-set .x-portfolio-filters:hover i {
    background-color: <?php echo $x_headings_font_color; ?>;
  }

<?php endif; ?>



/* Responsive Styling
// ========================================================================== */

@media (max-width: 979px) {

  <?php if ( $x_navbar_positioning == 'fixed-left' || $x_navbar_positioning == 'fixed-right' ) : ?>

    .x-navbar .x-navbar-inner > .x-container-fluid.width {
      width: <?php echo $x_ethos_sizing_site_width . '%'; ?>;
    }

  <?php endif; ?>

  .x-navbar .x-nav-collapse .x-nav li a {
    color: <?php echo $x_navbar_link_color; ?>;
    box-shadow: none !important;
  }

  .x-navbar .x-nav-collapse .x-nav li a:hover,
  .x-navbar .x-nav-collapse .x-nav .current-menu-item > a {
    color: <?php echo $x_navbar_link_color_hover; ?>;
  }

  .x-widgetbar {
    left: 0;
    right: 0;
  }

  .x-content-sidebar-active .x-container-fluid.main:before,
  .x-sidebar-content-active .x-container-fluid.main:before {
    left: -5000em;
  }

  <?php if ( $x_body_font_color_enable == '1' ) : ?>

    body .x-sidebar .widget,
    body .x-sidebar .widget a,
    body .x-sidebar .widget a:hover,
    body .x-sidebar .widget ul li a,
    body .x-sidebar .widget ol li a,
    body .x-sidebar .widget ul li a:hover,
    body .x-sidebar .widget ol li a:hover {
      color: <?php echo $x_body_font_color; ?>;
    }

  <?php endif; ?>

  <?php if ( $x_headings_font_color_enable == '1' ) : ?>

    body .x-sidebar .h-widget,
    body .x-sidebar .widget.widget_pages .current_page_item a,
    body .x-sidebar .widget.widget_nav_menu .current-menu-item a,
    body .x-sidebar .widget.widget_pages .current_page_item a:hover,
    body .x-sidebar .widget.widget_nav_menu .current-menu-item a:hover {
      color: <?php echo $x_headings_font_color; ?>;
    }

    body .x-sidebar .h-widget,
    body .x-sidebar .widget.widget_pages .current_page_item,
    body .x-sidebar .widget.widget_nav_menu .current-menu-item {
      border-color: <?php echo $x_headings_font_color; ?>;
    }

  <?php endif; ?>

}

@media (max-width: 767px) {
  .x-post-slider,
  .archive .x-post-slider {
    height: auto !important;
  }

  .x-post-slider .x-post-slider-entry,
  .archive .x-post-slider .x-post-slider-entry {
    padding-bottom: 65% !important;
  }
}