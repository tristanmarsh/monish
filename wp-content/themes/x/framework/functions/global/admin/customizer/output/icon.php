<?php
 
// =============================================================================
// FUNCTIONS/GLOBAL/ADMIN/CUSTOMIZER/OUTPUT/ICON.PHP
// -----------------------------------------------------------------------------
// Icon CSS ouptut.
// =============================================================================

// =============================================================================
// TABLE OF CONTENTS
// -----------------------------------------------------------------------------
//   01. Body Background
//   02. Site Link Color Accents
//   03. Container Sizing
//   04. Post Colors - Standard
//   05. Post Colors - Image
//   06. Post Colors - Gallery
//   07. Post Colors - Video
//   08. Post Colors - Audio
//   09. Post Colors - Quote
//   10. Post Colors - Link
//   11. Navbar
//   12. Navbar - Positioning
//   13. Navbar - Dropdowns
//   14. Custom Fonts
//   15. Custom Fonts - Colors
//   16. Responsive Styling
// =============================================================================

$x_icon_sizing_site_max_width = x_get_option( 'x_icon_sizing_site_max_width' );
$x_icon_sizing_site_width     = x_get_option( 'x_icon_sizing_site_width' );
$x_icon_sidebar_width         = x_get_option( 'x_icon_sidebar_width' );
$x_icon_bg_color              = x_get_option( 'x_icon_bg_color' );
$x_icon_bg_image_pattern      = x_get_option( 'x_icon_bg_image_pattern' );

?>

/* Body Background
// ========================================================================== */

<?php if ( $x_icon_bg_image_pattern == '' ) : ?>

  body {
    background-color: <?php echo $x_icon_bg_color; ?>;
  }

<?php else : ?>

  body {
    background: <?php echo $x_icon_bg_color; ?> url(<?php echo x_make_protocol_relative( $x_icon_bg_image_pattern ); ?>) center top repeat;
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
#respond .required,
.pagination a:hover,
.pagination span.current,
.widget_tag_cloud .tagcloud a:hover,
.widget_product_tag_cloud .tagcloud a:hover,
.x-scroll-top:hover,
.x-comment-author a:hover,
.jp-controls:hover a,
.jp-controls a:hover {
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
  .woocommerce li.product .entry-header h3 a:hover,
  .woocommerce-page li.product .entry-header h3 a:hover,
  .woocommerce .star-rating:before,
  .woocommerce-page .star-rating:before,
  .woocommerce .star-rating span:before,
  .woocommerce-page .star-rating span:before,
  .woocommerce .onsale,
  .woocommerce-page .onsale {
    color: <?php echo $x_site_link_color; ?>;
  }

<?php endif; ?>


/*
// Border color.
*/

a.x-img-thumbnail:hover,
textarea:focus,
input[type="text"]:focus,
input[type="password"]:focus,
input[type="datetime"]:focus,
input[type="datetime-local"]:focus,
input[type="date"]:focus,
input[type="month"]:focus,
input[type="time"]:focus,
input[type="week"]:focus,
input[type="number"]:focus,
input[type="email"]:focus,
input[type="url"]:focus,
input[type="search"]:focus,
input[type="tel"]:focus,
input[type="color"]:focus,
.uneditable-input:focus,
.pagination a:hover,
.pagination span.current,
.widget_tag_cloud .tagcloud a:hover,
.widget_product_tag_cloud .tagcloud a:hover,
.x-scroll-top:hover {
  border-color: <?php echo $x_site_link_color; ?>;
}


/*
// Background color.
*/

.flex-direction-nav a,
.flex-control-nav a:hover,
.flex-control-nav a.flex-active,
.x-dropcap,
.x-skill-bar .bar,
.x-pricing-column.featured h2,
.x-portfolio-filters,
.x-entry-share .x-share:hover,
.widget_price_filter .ui-slider .ui-slider-range,
.jp-play-bar {
  background-color: <?php echo $x_site_link_color; ?>;
}

.x-portfolio-filters:hover {
  background-color: <?php echo $x_site_link_color_hover; ?>;
}



/* Container Sizing
// ========================================================================== */

.x-container-fluid.width {
  width: <?php echo $x_icon_sizing_site_width . '%'; ?>;
}

.x-container-fluid.max {
  max-width: <?php echo $x_icon_sizing_site_max_width . 'px'; ?>;
}

<?php if ( x_get_option( 'x_icon_layout_site' ) == 'boxed' ) :; ?>

  .site,
  .x-navbar.x-navbar-fixed-top.x-container-fluid.max.width {
    width: <?php echo $x_icon_sizing_site_width . '%'; ?>;
    max-width: <?php echo $x_icon_sizing_site_max_width . 'px'; ?>;
  }

<?php endif; ?>



/* Post Colors - Standard
// ========================================================================== */

<?php if ( x_get_option( 'x_icon_post_standard_colors_enable', '' ) == '1' ) : ?>

  <?php $standard_text_color       = x_get_option( 'x_icon_post_standard_color' ); ?>
  <?php $standard_background_color = x_get_option( 'x_icon_post_standard_background' ); ?>

  .format-standard .entry-wrap {
    color: <?php echo $standard_text_color ?> !important;
    background-color: <?php echo $standard_background_color ?> !important;
  }

  .format-standard a:not(.x-btn):not(.meta-comments),
  .format-standard h1,
  .format-standard h2,
  .format-standard h3,
  .format-standard h4,
  .format-standard h5,
  .format-standard h6,
  .format-standard .entry-title,
  .format-standard .entry-title a,
  .format-standard .entry-title a:hover,
  .format-standard .p-meta,
  .format-standard blockquote,
  .format-standard .x-cite {
    color: <?php echo $standard_text_color; ?>;
  }

  .format-standard .meta-comments {
    border: 0;
    color: <?php echo $standard_background_color; ?>;
    background-color: <?php echo $standard_text_color; ?>;
  }

  .format-standard .entry-content a:not(.x-btn):not(.x-img-thumbnail) {
    border-bottom: 1px dotted;
  }

  .format-standard .entry-content a:hover:not(.x-btn):not(.x-img-thumbnail) {
    opacity: 0.65;
    filter: alpha(opacity=65);
  }

  .format-standard .entry-content a.x-img-thumbnail {
    border-color: #fff;
  }

  .format-standard blockquote,
  .format-standard .x-toc,
  .format-standard .entry-content a.x-img-thumbnail:hover {
    border-color: <?php echo $standard_text_color; ?>;
  }

<?php endif; ?>



/* Post Colors - Image
// ========================================================================== */

<?php if ( x_get_option( 'x_icon_post_image_colors_enable', '' ) == '1' ) : ?>

  <?php $image_text_color       = x_get_option( 'x_icon_post_image_color' ); ?>
  <?php $image_background_color = x_get_option( 'x_icon_post_image_background' ); ?>

  .format-image .entry-wrap {
    color: <?php echo $image_text_color ?> !important;
    background-color: <?php echo $image_background_color ?> !important;
  }

  .format-image a:not(.x-btn):not(.meta-comments),
  .format-image h1,
  .format-image h2,
  .format-image h3,
  .format-image h4,
  .format-image h5,
  .format-image h6,
  .format-image .entry-title,
  .format-image .entry-title a,
  .format-image .entry-title a:hover,
  .format-image .p-meta,
  .format-image blockquote,
  .format-image .x-cite {
    color: <?php echo $image_text_color; ?>;
  }

  .format-image .meta-comments {
    border: 0;
    color: <?php echo $image_background_color; ?>;
    background-color: <?php echo $image_text_color; ?>;
  }

  .format-image .entry-content a:not(.x-btn):not(.x-img-thumbnail) {
    border-bottom: 1px dotted;
  }

  .format-image .entry-content a:hover:not(.x-btn):not(.x-img-thumbnail) {
    opacity: 0.65;
    filter: alpha(opacity=65);
  }

  .format-image .entry-content a.x-img-thumbnail {
    border-color: #fff;
  }

  .format-image blockquote,
  .format-image .x-toc,
  .format-image .entry-content a.x-img-thumbnail:hover {
    border-color: <?php echo $image_text_color; ?>;
  }

<?php endif; ?>



/* Post Colors - Gallery
// ========================================================================== */

<?php if ( x_get_option( 'x_icon_post_gallery_colors_enable', '' ) == '1' ) : ?>

  <?php $gallery_text_color       = x_get_option( 'x_icon_post_gallery_color' ); ?>
  <?php $gallery_background_color = x_get_option( 'x_icon_post_gallery_background' ); ?>

  .format-gallery .entry-wrap {
    color: <?php echo $gallery_text_color ?> !important;
    background-color: <?php echo $gallery_background_color ?> !important;
  }

  .format-gallery a:not(.x-btn):not(.meta-comments),
  .format-gallery h1,
  .format-gallery h2,
  .format-gallery h3,
  .format-gallery h4,
  .format-gallery h5,
  .format-gallery h6,
  .format-gallery .entry-title,
  .format-gallery .entry-title a,
  .format-gallery .entry-title a:hover,
  .format-gallery .p-meta,
  .format-gallery blockquote,
  .format-gallery .x-cite {
    color: <?php echo $gallery_text_color; ?>;
  }

  .format-gallery .meta-comments {
    border: 0;
    color: <?php echo $gallery_background_color; ?>;
    background-color: <?php echo $gallery_text_color; ?>;
  }

  .format-gallery .entry-content a:not(.x-btn):not(.x-img-thumbnail) {
    border-bottom: 1px dotted;
  }

  .format-gallery .entry-content a:hover:not(.x-btn):not(.x-img-thumbnail) {
    opacity: 0.65;
    filter: alpha(opacity=65);
  }

  .format-gallery .entry-content a.x-img-thumbnail {
    border-color: #fff;
  }

  .format-gallery blockquote,
  .format-gallery .x-toc,
  .format-gallery .entry-content a.x-img-thumbnail:hover {
    border-color: <?php echo $gallery_text_color; ?>;
  }

<?php endif; ?>



/* Post Colors - Video
// ========================================================================== */

<?php if ( x_get_option( 'x_icon_post_video_colors_enable', '' ) == '1' ) : ?>

  <?php $video_text_color       = x_get_option( 'x_icon_post_video_color' ); ?>
  <?php $video_background_color = x_get_option( 'x_icon_post_video_background' ); ?>

  .format-video .entry-wrap {
    color: <?php echo $video_text_color ?> !important;
    background-color: <?php echo $video_background_color ?> !important;
  }

  .format-video a:not(.x-btn):not(.meta-comments),
  .format-video h1,
  .format-video h2,
  .format-video h3,
  .format-video h4,
  .format-video h5,
  .format-video h6,
  .format-video .entry-title,
  .format-video .entry-title a,
  .format-video .entry-title a:hover,
  .format-video .p-meta,
  .format-video blockquote,
  .format-video .x-cite {
    color: <?php echo $video_text_color; ?>;
  }

  .format-video .meta-comments {
    border: 0;
    color: <?php echo $video_background_color; ?>;
    background-color: <?php echo $video_text_color; ?>;
  }

  .format-video .entry-content a:not(.x-btn):not(.x-img-thumbnail) {
    border-bottom: 1px dotted;
  }

  .format-video .entry-content a:hover:not(.x-btn):not(.x-img-thumbnail) {
    opacity: 0.65;
    filter: alpha(opacity=65);
  }

  .format-video .entry-content a.x-img-thumbnail {
    border-color: #fff;
  }

  .format-video blockquote,
  .format-video .x-toc,
  .format-video .entry-content a.x-img-thumbnail:hover {
    border-color: <?php echo $video_text_color; ?>;
  }

<?php endif; ?>



/* Post Colors - Audio
// ========================================================================== */

<?php if ( x_get_option( 'x_icon_post_audio_colors_enable', '' ) == '1' ) : ?>

  <?php $audio_text_color       = x_get_option( 'x_icon_post_audio_color' ); ?>
  <?php $audio_background_color = x_get_option( 'x_icon_post_audio_background' ); ?>

  .format-audio .entry-wrap {
    color: <?php echo $audio_text_color ?> !important;
    background-color: <?php echo $audio_background_color ?> !important;
  }

  .format-audio a:not(.x-btn):not(.meta-comments),
  .format-audio h1,
  .format-audio h2,
  .format-audio h3,
  .format-audio h4,
  .format-audio h5,
  .format-audio h6,
  .format-audio .entry-title,
  .format-audio .entry-title a,
  .format-audio .entry-title a:hover,
  .format-audio .p-meta,
  .format-audio blockquote,
  .format-audio .x-cite {
    color: <?php echo $audio_text_color; ?>;
  }

  .format-audio .meta-comments {
    border: 0;
    color: <?php echo $audio_background_color; ?>;
    background-color: <?php echo $audio_text_color; ?>;
  }

  .format-audio .entry-content a:not(.x-btn):not(.x-img-thumbnail) {
    border-bottom: 1px dotted;
  }

  .format-audio .entry-content a:hover:not(.x-btn):not(.x-img-thumbnail) {
    opacity: 0.65;
    filter: alpha(opacity=65);
  }

  .format-audio .entry-content a.x-img-thumbnail {
    border-color: #fff;
  }

  .format-audio blockquote,
  .format-audio .x-toc,
  .format-audio .entry-content a.x-img-thumbnail:hover {
    border-color: <?php echo $audio_text_color; ?>;
  }

<?php endif; ?>



/* Post Colors - Quote
// ========================================================================== */

<?php if ( x_get_option( 'x_icon_post_quote_colors_enable', '' ) == '1' ) : ?>

  <?php $quote_text_color       = x_get_option( 'x_icon_post_quote_color' ); ?>
  <?php $quote_background_color = x_get_option( 'x_icon_post_quote_background' ); ?>

  .format-quote .entry-wrap {
    color: <?php echo $quote_text_color ?> !important;
    background-color: <?php echo $quote_background_color ?> !important;
  }

  .format-quote a:not(.x-btn):not(.meta-comments),
  .format-quote h1,
  .format-quote h2,
  .format-quote h3,
  .format-quote h4,
  .format-quote h5,
  .format-quote h6,
  .format-quote .entry-title,
  .format-quote .entry-title a,
  .format-quote .entry-title a:hover,
  .format-quote .entry-title-sub,
  .format-quote .p-meta,
  .format-quote blockquote,
  .format-quote .x-cite {
    color: <?php echo $quote_text_color; ?>;
  }

  .format-quote .meta-comments {
    border: 0;
    color: <?php echo $quote_background_color; ?>;
    background-color: <?php echo $quote_text_color; ?>;
  }

  .format-quote .entry-content a:not(.x-btn):not(.x-img-thumbnail) {
    border-bottom: 1px dotted;
  }

  .format-quote .entry-content a:hover:not(.x-btn):not(.x-img-thumbnail) {
    opacity: 0.65;
    filter: alpha(opacity=65);
  }

  .format-quote .entry-content a.x-img-thumbnail {
    border-color: #fff;
  }

  .format-quote blockquote,
  .format-quote .x-toc,
  .format-quote .entry-content a.x-img-thumbnail:hover {
    border-color: <?php echo $quote_text_color; ?>;
  }

<?php endif; ?>



/* Post Colors - Link
// ========================================================================== */

<?php if ( x_get_option( 'x_icon_post_link_colors_enable', '' ) == '1' ) : ?>

  <?php $link_text_color       = x_get_option( 'x_icon_post_link_color' ); ?>
  <?php $link_background_color = x_get_option( 'x_icon_post_link_background' ); ?>

  .format-link .entry-wrap {
    color: <?php echo $link_text_color ?> !important;
    background-color: <?php echo $link_background_color ?> !important;
  }

  .format-link a:not(.x-btn):not(.meta-comments),
  .format-link h1,
  .format-link h2,
  .format-link h3,
  .format-link h4,
  .format-link h5,
  .format-link h6,
  .format-link .entry-title,
  .format-link .entry-title a,
  .format-link .entry-title a:hover,
  .format-link .entry-title .entry-external-link:hover,
  .format-link .p-meta,
  .format-link blockquote,
  .format-link .x-cite {
    color: <?php echo $link_text_color; ?>;
  }

  .format-link .meta-comments {
    border: 0;
    color: <?php echo $link_background_color; ?>;
    background-color: <?php echo $link_text_color; ?>;
  }

  .format-link .entry-content a:not(.x-btn):not(.x-img-thumbnail) {
    border-bottom: 1px dotted;
  }

  .format-link .entry-content a:hover:not(.x-btn):not(.x-img-thumbnail) {
    opacity: 0.65;
    filter: alpha(opacity=65);
  }

  .format-link .entry-content a.x-img-thumbnail {
    border-color: #fff;
  }

  .format-link blockquote,
  .format-link .x-toc,
  .format-link .entry-content a.x-img-thumbnail:hover {
    border-color: <?php echo $link_text_color; ?>;
  }

<?php endif; ?>



/* Navbar
// ========================================================================== */

/*
// Color.
*/

.x-navbar .x-nav > li > a,
.x-navbar .sub-menu a {
  color: <?php echo $x_navbar_link_color; ?>;
}

.x-navbar .x-nav > li > a:hover,
.x-navbar .x-nav > .sfHover > a,
.x-navbar .x-nav > .current-menu-item > a,
.x-navbar .sub-menu a:hover,
.x-navbar .sub-menu .sfHover > a,
.x-navbar .sub-menu .current-menu-item > a,
.x-nav .x-megamenu > .sub-menu > li > a {
  color: <?php echo $x_navbar_link_color_hover; ?>;
}



/* Navbar - Positioning
// ========================================================================== */

<?php if ( $x_navbar_positioning == 'static-top' || $x_navbar_positioning == 'fixed-top' ) : ?>

  .x-navbar .x-nav > li {
    height: <?php echo $x_navbar_height . 'px'; ?>;
    padding-top: <?php echo $x_navbar_adjust_links_top . 'px'; ?>;
  }

<?php endif; ?>

<?php if ( $x_navbar_positioning == 'fixed-left' || $x_navbar_positioning == 'fixed-right' ) : ?>

  .x-navbar .x-nav > li > a {
    padding-top: <?php echo round( ( $x_navbar_adjust_links_side - $x_navbar_font_size - 4 ) / 2 ) . 'px'; ?>;
    padding-bottom: <?php echo round( ( $x_navbar_adjust_links_side - $x_navbar_font_size - 4 ) / 2 ) . 'px'; ?>;
    padding-left: 35px;
    padding-right: 35px;
  }

  .x-megamenu > .sub-menu {
    width: <?php echo 879 - $x_navbar_width . 'px'; ?>
  }

<?php endif; ?>

<?php if ( $x_navbar_positioning == 'fixed-left' ) : ?>

  .x-widgetbar {
    left: <?php echo $x_navbar_width . 'px'; ?>;
  }

<?php endif; ?>

<?php if ( $x_navbar_positioning == 'fixed-right' ) : ?>

  .x-widgetbar {
    right: <?php echo $x_navbar_width . 'px'; ?>;
  }

<?php endif; ?>



/* Navbar - Dropdowns
// ========================================================================== */

.sf-menu > li ul {
  top: <?php echo $x_navbar_height . 'px'; ?>;
}



/* Custom Fonts
// ========================================================================== */

<?php if ( $x_custom_fonts == '1' ) : ?>

  .x-comment-author,
  .x-comment-time,
  .comment-form-author label,
  .comment-form-email label,
  .comment-form-url label,
  .comment-form-rating label,
  .comment-form-comment label {
    font-family: "<?php echo $x_headings_font_family; ?>", "Helvetica Neue", Helvetica, sans-serif;;
  }

<?php endif; ?>



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

  .x-comment-time,
  .entry-thumb:before,
  .p-meta {
    color: <?php echo $x_body_font_color; ?>;
  }

  <?php if ( X_WOOCOMMERCE_IS_ACTIVE ) : ?>

    .woocommerce .price > .from,
    .woocommerce .price > del,
    .woocommerce p.stars span a:after,
    .woocommerce-page .price > .from,
    .woocommerce-page .price > del,
    .woocommerce-page p.stars span a:after {
      color: <?php echo $x_body_font_color; ?>;
    }

  <?php endif; ?>

<?php endif; ?>


/*
// Headings.
*/

<?php if ( $x_headings_font_color_enable == '1' ) : ?>

  .entry-title a:hover,
  .x-comment-author,
  .x-comment-author a,
  .comment-form-author label,
  .comment-form-email label,
  .comment-form-url label,
  .comment-form-rating label,
  .comment-form-comment label,
  .x-accordion-heading .x-accordion-toggle,
  .x-nav-tabs > li > a:hover,
  .x-nav-tabs > .active > a,
  .x-nav-tabs > .active > a:hover,
  .jp-controls a:before,
  .jp-controls a:hover:before {
    color: <?php echo $x_headings_font_color; ?>;
  }

  .h-comments-title small,
  .h-feature-headline span i,
  .x-portfolio-filters-menu,
  .jp-seek-bar {
    background-color: <?php echo $x_headings_font_color; ?> !important;
  }

<?php endif; ?>



/* Responsive Styling
// ========================================================================== */

@media (min-width: 1200px) {
  .x-sidebar {
    width: <?php echo $x_icon_sidebar_width . 'px'; ?>;
  }

  body.x-sidebar-content-active,
  body[class*="page-template-template-blank"].x-sidebar-content-active.x-blank-template-sidebar-active {
    padding-left: <?php echo $x_icon_sidebar_width . 'px'; ?>;
  }

  body.x-content-sidebar-active,
  body[class*="page-template-template-blank"].x-content-sidebar-active.x-blank-template-sidebar-active {
    padding-right: <?php echo $x_icon_sidebar_width . 'px'; ?>;
  }

  body.x-sidebar-content-active .x-widgetbar,
  body.x-sidebar-content-active .x-navbar-fixed-top,
  body[class*="page-template-template-blank"].x-sidebar-content-active.x-blank-template-sidebar-active .x-widgetbar,
  body[class*="page-template-template-blank"].x-sidebar-content-active.x-blank-template-sidebar-active .x-navbar-fixed-top {
    left: <?php echo $x_icon_sidebar_width . 'px'; ?>;
  }

  body.x-content-sidebar-active .x-widgetbar,
  body.x-content-sidebar-active .x-navbar-fixed-top,
  body[class*="page-template-template-blank"].x-content-sidebar-active.x-blank-template-sidebar-active .x-widgetbar,
  body[class*="page-template-template-blank"].x-content-sidebar-active.x-blank-template-sidebar-active .x-navbar-fixed-top {
    right: <?php echo $x_icon_sidebar_width . 'px'; ?>;
  }
}


@media (max-width: 979px) {

  <?php if ( $x_navbar_positioning == 'static-top' || $x_navbar_positioning == 'fixed-top' ) : ?>

  .x-navbar .x-nav > li {
    height: auto;
    padding: 0;
  }

  <?php endif; ?>

  <?php if ( $x_navbar_positioning == 'fixed-left' || $x_navbar_positioning == 'fixed-right' ) : ?>

    .x-navbar .x-navbar-inner > .x-container-fluid.width {
      width: <?php echo $x_icon_sizing_site_width . '%'; ?>;
    }

  <?php endif; ?>

  .x-navbar .x-nav-collapse .x-nav li a {
    color: <?php echo $x_navbar_link_color; ?>;
  }

  .x-navbar .x-nav-collapse .x-nav li a:hover,
  .x-navbar .x-nav-collapse .x-nav .current-menu-item > a {
    color: <?php echo $x_navbar_link_color_hover; ?>;
  }

  .x-widgetbar {
    left: 0;
    right: 0;
  }
}