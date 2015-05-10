<?php

// =============================================================================
// FUNCTIONS/GLOBAL/ADMIN/ADDONS/DEMO/AJAX-HANDLER.PHP
// -----------------------------------------------------------------------------
// AJAX handler for the demo content setup.
// =============================================================================

// =============================================================================
// TABLE OF CONTENTS
// -----------------------------------------------------------------------------
//   01. Register Demo Content Setup Handler
//   02. Stage Tracking Functions
// =============================================================================

// Register Demo Content Setup Handler
// =============================================================================

function x_demo_content_setup_ajax_callback() {

  //
  // Get API data.
  //

  $demo    = $_GET['demo'];
  $request = wp_remote_get( 'https://theme.co/x/member/demo-api/' . $demo . '/' );


  //
  // Check if request returns an error.
  //

  if ( is_wp_error( $request ) ) {

    echo json_encode( array(
      'result'  => 'error',
      'message' => $request->get_error_message()
    ) );

    die( 0 );

  }


  //
  // Run demo setup.
  //

  require_once( 'setup.php' );

  echo json_encode( array(
    'result' => 'success'
  ) );

  die( 0 );

}

add_action( 'wp_ajax_x_demo_content_setup', 'x_demo_content_setup_ajax_callback' );



// Stage Tracking Functions
// =============================================================================

//
// Clear stages.
//

function x_demo_content_clear_stages() {
  delete_transient( 'x_demo_content_stage' );
}


//
// Stage completed.
//

function x_demo_content_set_stage_completed( $stage ) {
  $transient      = get_transient( 'x_demo_content_stage' );
  $stages         = ( is_array( $transient ) ) ? $transient : array();
  $stages[$stage] = true;
  set_transient( 'x_demo_content_stage', $stages );
}


//
// Stage not completed.
//

function x_demo_content_stage_not_completed( $stage ) {
  $stages = get_transient( 'x_demo_content_stage' );
  return ! ( isset( $stages[$stage] ) && $stages[$stage] );
}