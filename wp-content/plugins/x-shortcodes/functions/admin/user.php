<?php

// =============================================================================
// FUNCTIONS/ADMIN/USER.PHP
// -----------------------------------------------------------------------------
// Modify user admin page functionality.
// =============================================================================

// =============================================================================
// TABLE OF CONTENTS
// -----------------------------------------------------------------------------
//   01. Modify User Contact Information
// =============================================================================

// Modify User Contact Information
// =============================================================================

if ( ! function_exists( 'x_modify_contact_methods' ) ) :
  function x_modify_contact_methods( $user_contactmethods ) {

    unset( $user_contactmethods['yim'] );
    unset( $user_contactmethods['aim'] );
    unset( $user_contactmethods['jabber'] );

    $user_contactmethods['facebook']   = 'Facebook Profile';
    $user_contactmethods['twitter']    = 'Twitter Profile';
    $user_contactmethods['googleplus'] = 'Google+ Profile';

    return $user_contactmethods;

  }
  add_filter( 'user_contactmethods', 'x_modify_contact_methods' );
endif;