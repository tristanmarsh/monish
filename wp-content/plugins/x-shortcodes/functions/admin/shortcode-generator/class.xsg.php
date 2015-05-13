<?php

// =============================================================================
// FUNCTIONS/ADMIN/CLASS.XSG.PHP
// -----------------------------------------------------------------------------
// Adds the shortcode generator button to the TinyMCE interface.
// =============================================================================

// =============================================================================
// TABLE OF CONTENTS
// -----------------------------------------------------------------------------
//   01. Add Shortcode Generator Button
// =============================================================================

// Add Shortcode Generator Button
// =============================================================================

class XSG {

  static $instance;
  private $map;

  public static function init() {
    self::$instance = new self;
  }

  public static function instance() {
    return self::$instance;
  }

  function __construct() {
    $this->map = new XSG_Map();
    add_action( 'admin_init', array( &$this, 'admin_init' ) );
    add_action( 'wp_ajax_xsg_list_shortcodes', array( &$this, 'model_endpoint' ) );
  }

  public function map() {
    return $this->map;
  }

  public function admin_init() {
    if ( ! current_user_can( 'edit_posts' ) && ! current_user_can( 'edit_pages' ) ) {
      return;
    }
    add_action( 'media_buttons', array( $this, 'add_media_button' ) );
  }

  public function enqueue( ) {

    wp_enqueue_script( 'x_shortcodes_generator',
      X_SHORTCODES_URL . '/js/dist/admin/x-shortcodes-generator.min.js',
      array(
        'backbone',
        'underscore',
        'jquery',
        'jquery-ui-core',
        'jquery-ui-accordion',
      ),
      X_SHORTCODES_VERSION, true
    );

    $data = array(
      'shortcodeCollectionUrl' => add_query_arg( array( 'action' => 'xsg_list_shortcodes' ), admin_url( 'admin-ajax.php' ) ),
      'sectionNames'           => $this->map->get_sections(),
      'stackNames'             => array(
        'integrity' => __( 'Integrity', '__x__' ),
        'renew'     => __( 'Renew', '__x__' ),
        'icon'      => __( 'Icon', '__x__' ),
        'ethos'     => __( 'Ethos', '__x__' )
      ),
      'activeStack' => ( function_exists( 'x_get_stack' ) ) ? x_get_stack() : 'integrity'
    );

    $strings = array();

    wp_localize_script( 'x_shortcodes_generator', 'xsg', array( 'data' => $data, 'strings' => $strings ) );

    wp_enqueue_style( 'xsg',           X_SHORTCODES_URL . '/css/admin/shortcode-generator.css' );
    wp_enqueue_style( 'xsg-jquery-ui', X_SHORTCODES_URL . '/css/admin/jquery-ui.structure.min.css' );

    add_action( 'admin_footer', array( $this, 'load_templates' ) );

  }

  public function load_templates() {
    include( 'templates.php' );
  }

  public function model_endpoint() {
    include( 'endpoint.php' );
  }

  public function add_media_button( $editor_id ) {
    $this->enqueue();
    echo "<a href=\"#\" id=\"xsg-media-modal-button\" class=\"button\">X &ndash; Shortcodes</a> ";
  }

}