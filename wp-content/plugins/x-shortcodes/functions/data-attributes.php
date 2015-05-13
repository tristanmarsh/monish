<?php

// =============================================================================
// DATA-ATTRIBUTES.PHP
// -----------------------------------------------------------------------------
// Helper functions that generate the JavaScript data attributes for various
// shortcodes.
// =============================================================================

// =============================================================================
// TABLE OF CONTENTS
// -----------------------------------------------------------------------------
//   01. Data Attribute Generator
//   02. Data Attribute Generator (Popovers and Tooltips)
// =============================================================================

// Data Attribute Generator
// =============================================================================

function x_generate_data_attributes( $element, $params = array() ) {

  $data = 'data-x-element="' . $element . '"';

  if ( ! empty( $params ) ) {
    $params_json = htmlspecialchars( json_encode( $params ), ENT_QUOTES, 'UTF-8' );
    $data .= ' data-x-params="' . $params_json . '"';
  }

  return $data;

}



// Data Attribute Generator (Popovers and Tooltips)
// =============================================================================

function x_generate_data_attributes_extra( $type, $trigger, $placement, $title = '', $content = '' ) {

  if ( ! in_array( $type, array( 'tooltip', 'popover' ) ) )
    return '';

  $js_params = array(
    'type'      => ( $type == 'tooltip' ) ? 'tooltip' : 'popover',
    'trigger'   => $trigger,
    'placement' => $placement,
    'title'     => $title,
    'content'   => $content
  );

  return x_generate_data_attributes( 'extra', $js_params );

}