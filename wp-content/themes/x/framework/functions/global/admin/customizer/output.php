<?php
 
// =============================================================================
// FUNCTIONS/GLOBAL/ADMIN/CUSTOMIZER/OUTPUT.PHP
// -----------------------------------------------------------------------------
// Sets up custom output from the Customizer.
// =============================================================================

// =============================================================================
// TABLE OF CONTENTS
// -----------------------------------------------------------------------------
//   01. Generated CSS Output
//   02. User CSS Output
//   02. User JavaScript Output
// =============================================================================

// Generated CSS
// =============================================================================
 
function x_customizer_generated_css_output() {

  $outp_path = X_TEMPLATE_PATH . '/framework/functions/global/admin/customizer/output';

  require_once( $outp_path . '/variables.php' );

  ob_start();

  echo '<style id="x-customizer-css-output" type="text/css">';

    require_once( $outp_path . '/' . x_get_stack() . '.php' );
    require_once( $outp_path . '/base.php' );
    require_once( $outp_path . '/masthead.php' );
    require_once( $outp_path . '/buttons.php' );
    require_once( $outp_path . '/widgets.php' );
    require_once( $outp_path . '/bbpress.php' );
    require_once( $outp_path . '/buddypress.php' );
    require_once( $outp_path . '/gravity-forms.php' );

    do_action( 'x_head_css' );

  echo '</style>';

  $css = ob_get_contents(); ob_end_clean();


  //
  // 1. Remove comments.
  // 2. Remove whitespace.
  // 3. Remove starting whitespace.
  //

  $output = preg_replace( '#/\*.*?\*/#s', '', $css );            // 1
  $output = preg_replace( '/\s*([{}|:;,])\s+/', '$1', $output ); // 2
  $output = preg_replace( '/\s\s+(.*)/', '$1', $output );        // 3

  echo $output;

}

add_action( 'wp_head', 'x_customizer_generated_css_output', 9998, 0 );



// User CSS
// =============================================================================

function x_customizer_user_css_output() {
  if ( x_get_option( 'x_custom_styles' ) ) :
  ?>

    <style id="x-customizer-css-custom" type="text/css">
      <?php echo x_get_option( 'x_custom_styles' ); ?>
    </style>

  <?php
  endif;
}

add_action( 'wp_head', 'x_customizer_user_css_output', 9999, 0 );



// User JavaScript
// =============================================================================

function x_customizer_user_javascript_output() {

  $stack                                = x_get_stack();
  $entry_id                             = get_the_ID();
  $x_integrity_design                   = x_get_option( 'x_integrity_design', 'light' );
  $x_integrity_light_bg_image_full      = x_get_option( 'x_integrity_light_bg_image_full' );
  $x_integrity_light_bg_image_full_fade = x_get_option( 'x_integrity_light_bg_image_full_fade' );
  $x_integrity_dark_bg_image_full       = x_get_option( 'x_integrity_dark_bg_image_full' );
  $x_integrity_dark_bg_image_full_fade  = x_get_option( 'x_integrity_dark_bg_image_full_fade' );
  $x_renew_bg_image_full                = x_get_option( 'x_renew_bg_image_full' );
  $x_renew_bg_image_full_fade           = x_get_option( 'x_renew_bg_image_full_fade' );
  $x_icon_bg_image_full                 = x_get_option( 'x_icon_bg_image_full' );
  $x_icon_bg_image_full_fade            = x_get_option( 'x_icon_bg_image_full_fade' );
  $x_ethos_bg_image_full                = x_get_option( 'x_ethos_bg_image_full' );
  $x_ethos_bg_image_full_fade           = x_get_option( 'x_ethos_bg_image_full_fade' );
  $x_entry_bg_image_full                = get_post_meta( $entry_id, '_x_entry_bg_image_full', true );
  $x_entry_bg_image_full_fade           = get_post_meta( $entry_id, '_x_entry_bg_image_full_fade', true );
  $x_entry_bg_image_full_duration       = get_post_meta( $entry_id, '_x_entry_bg_image_full_duration', true );

  ?>


  <?php if ( x_get_option( 'x_custom_scripts' ) ) : ?>

    <script id="x-customizer-js-custom">
      <?php echo x_get_option( 'x_custom_scripts' ); ?>
    </script>

  <?php endif; ?>


  <?php if ( $x_entry_bg_image_full ) : ?>

    <?php
    $page_bg_images_output = '';
    $page_bg_images        = explode( ',', $x_entry_bg_image_full );
    foreach ( $page_bg_images as $page_bg_image ) {
      $page_bg_images_output .= '"' . $page_bg_image . '", ';
    }
    $page_bg_images_output = trim( $page_bg_images_output, ', ' );
    ?>

    <script>jQuery.backstretch([<?php echo $page_bg_images_output; ?>], {duration: <?php echo $x_entry_bg_image_full_duration; ?>, fade: <?php echo $x_entry_bg_image_full_fade; ?>});</script>

  <?php else : ?>

    <?php if ( $stack == 'integrity' && $x_integrity_design == 'light' && $x_integrity_light_bg_image_full ) : ?>

      <script>jQuery.backstretch(['<?php echo x_make_protocol_relative( $x_integrity_light_bg_image_full ); ?>'], {fade: <?php echo $x_integrity_light_bg_image_full_fade; ?>});</script>

    <?php elseif ( $stack == 'integrity' && $x_integrity_design == 'dark' && $x_integrity_dark_bg_image_full ) : ?>

      <script>jQuery.backstretch(['<?php echo x_make_protocol_relative( $x_integrity_dark_bg_image_full ); ?>'], {fade: <?php echo $x_integrity_dark_bg_image_full_fade; ?>});</script>

    <?php elseif ( $stack == 'renew' && $x_renew_bg_image_full ) : ?>

      <script>jQuery.backstretch(['<?php echo x_make_protocol_relative( $x_renew_bg_image_full ); ?>'], {fade: <?php echo $x_renew_bg_image_full_fade; ?>});</script>

    <?php elseif ( $stack == 'icon' && $x_icon_bg_image_full ) : ?>

      <script>jQuery.backstretch(['<?php echo x_make_protocol_relative( $x_icon_bg_image_full ); ?>'], {fade: <?php echo $x_icon_bg_image_full_fade; ?>});</script>

    <?php elseif ( $stack == 'ethos' && $x_ethos_bg_image_full ) : ?>

      <script>jQuery.backstretch(['<?php echo x_make_protocol_relative( $x_ethos_bg_image_full ); ?>'], {fade: <?php echo $x_ethos_bg_image_full_fade; ?>});</script>

    <?php endif; ?>

  <?php endif;
}

add_action( 'wp_footer', 'x_customizer_user_javascript_output', 9999, 0 );