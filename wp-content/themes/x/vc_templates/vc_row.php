<?php

// =============================================================================
// VC_TEMPLATES/VC_ROW.PHP
// -----------------------------------------------------------------------------
// Make [vc_row] behave like the [content_band] shortcode.
// =============================================================================

?>

<?php

extract( shortcode_atts( array(
  'class'           => '',
  'style'           => '',
  'type'            => '',
  'border'          => '',
  'bg_color'        => '',
  'bg_pattern'      => '',
  'bg_image'        => '',
  'bg_video'        => '',
  'bg_video_poster' => '',
  'no_margin'       => '',
  'padding_top'     => '',
  'padding_bottom'  => '',
  'inner_container' => '',
  'parallax'        => ''
), $atts ) );

$class = ( $class != '' ) ? 'x-content-band vc ' . esc_attr( $class ) : 'x-content-band vc';
$style = ( $style != '' ) ? ' ' . $style : '';
$type  = ( $type  != '' ) ? ' ' . $type : '';
switch ( $border ) {
  case 'top' :
    $border = ' border-top';
    break;
  case 'left' :
    $border = ' border-left';
    break;
  case 'right' :
    $border = ' border-right';
    break;
  case 'bottom' :
    $border = ' border-bottom';
    break;
  case 'vertical' :
    $border = ' border-top border-bottom';
    break;
  case 'horizontal' :
    $border = ' border-left border-right';
    break;
  case 'all' :
    $border = ' border-top border-left border-right border-bottom';
    break;
  default :
    $border = '';
}
$bg_color         = ( $bg_color        != ''     ) ? $bg_color : 'transparent';
$bg_pattern       = ( $bg_pattern      != ''     ) ? $bg_pattern : '';
$bg_pattern_class = ( $bg_pattern      != ''     ) ? ' bg-pattern' : '';
$bg_image         = ( $bg_image        != ''     ) ? $bg_image : '';
$bg_image_class   = ( $bg_image        != ''     ) ? ' bg-image' : '';
$bg_video         = ( $bg_video        != ''     ) ? $bg_video : '';
$bg_video_poster  = ( $bg_video_poster != ''     ) ? $bg_video_poster : '';
$bg_video_class   = ( $bg_video        != ''     ) ? ' bg-video' : '';
$no_margin        = ( $no_margin       == 'true' ) ? ' man' : '';
$padding_top      = ( $padding_top     != ''     ) ? ' padding-top: ' . $padding_top . ';' : '';
$padding_bottom   = ( $padding_bottom  != ''     ) ? ' padding-bottom: ' . $padding_bottom . ';' : '';
switch ( $inner_container ) {
  case 'true' :
    $container_start = '<div class="x-container-fluid max width">';
    $container_end   = '</div>';
    break;
  default :
    $container_start = '';
    $container_end   = '';
}
$parallax       = ( $parallax == 'true' ) ? $parallax : '';
$parallax_class = ( $parallax == 'true' ) ? ' parallax' : '';

$count = x_visual_composer_templates_id_increment();

if ( $bg_video != '' ) {

  $bg_video_poster = wp_get_attachment_image_src( $bg_video_poster, 'entry-full-' . x_get_stack() );
  $output = "<div id=\"x-content-band-{$count}\" class=\"{$class}{$bg_video_class}{$border}{$no_margin}\" style=\"{$padding_top}{$padding_bottom}{$style}\">"
            . $container_start . do_shortcode( $content ) . $container_end
          . '</div>'
          . "<script> jQuery(function(){ var BV = new jQuery.BigVideo(); BV.init(); if ( Modernizr.touch ) { BV.show('{$bg_video_poster[0]}'); } else { BV.show('{$bg_video}', { ambient : true }); } }); </script>";

} elseif ( $bg_image != '' ) {

  $bg_image = wp_get_attachment_image_src( $bg_image, 'entry-full-' . x_get_stack() );
  $output = "<div id=\"x-content-band-{$count}\" class=\"{$class}{$bg_image_class}{$parallax_class}{$border}{$no_margin}\" style=\"background-image: url({$bg_image[0]}); background-color: {$bg_color};{$padding_top}{$padding_bottom}{$style}\">"
            . $container_start . do_shortcode( $content ) . $container_end
          . '</div>';

} elseif ( $bg_pattern != '' ) {

  $bg_pattern = wp_get_attachment_image_src( $bg_pattern, 'entry-full-' . x_get_stack() );
  $output = "<div id=\"x-content-band-{$count}\" class=\"{$class}{$bg_pattern_class}{$parallax_class}{$border}{$no_margin}\" style=\"background-image: url({$bg_pattern[0]}); background-color: {$bg_color};{$padding_top}{$padding_bottom}{$style}\">"
            . $container_start . do_shortcode( $content ) . $container_end
          . '</div>';

} else {

  $output = "<div id=\"x-content-band-{$count}\" class=\"{$class}{$border}{$no_margin}\" style=\"background-color: {$bg_color};{$padding_top}{$padding_bottom}{$style}\">"
            . $container_start . do_shortcode( $content ) . $container_end
          . '</div>';

}

echo $output;

?>