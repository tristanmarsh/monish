// =============================================================================
// JS/ADMIN/X-CUSTOMIZER-ADMIN.JS
// -----------------------------------------------------------------------------
// Customizer admin functionality.
// =============================================================================

// =============================================================================
// TABLE OF CONTENTS
// -----------------------------------------------------------------------------
//   01. Customizer Admin Functionality
// =============================================================================

// Customizer Admin Functionality
// =============================================================================

jQuery(document).ready(function($) {

  $('#x-addons-customizer-manager-import').change(function() {
    $('#x-addons-customizer-manager-import-submit').removeAttr('disabled');
  });

  $('#x-addons-customizer-manager-reset-confirm').change(function() {
    if ( $(this).is(':checked') ) {
      $('#x-addons-customizer-manager-reset-submit').removeAttr('disabled');
    } else {
      $('#x-addons-customizer-manager-reset-submit').attr('disabled', true);
    }
  });

});