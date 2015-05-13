<?php
// =============================================================================
// FUNCTIONS/ADMIN/SHORTCODE-GENERATOR/ENDPOINT.PHP
// -----------------------------------------------------------------------------
// Response to Backbone request for a collection of Shortcode Models
// =============================================================================

//
// Construct Model Data
//

$data = $this->map->get_collection();

//
// Issue Response
//

header('Content-Type: application/json');
echo json_encode($data);
die(0);