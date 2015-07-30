<?php

class Cornerstone_Integration_Conflict_Resolution {

	public static function shouldLoad() {

		return true;
	}

	public function __construct() {

		add_action( 'cornerstone_load_builder', array( $this, 'loadBuilder' ) );

	}

	public static function preInit() {

		global $wp_version;

		if ( version_compare( $wp_version, '4.1', '<' ) ) {
			require_once( CS()->path('includes/utility/wp-json.php') );
		}

	}

	public function loadBuilder() {

		// Disable W3TC
		if ( class_exists('W3_Root') && apply_filters( 'cornerstone_compat_w3tc', true ) ) {
			define( 'DONOTCACHEPAGE', true );
			define( 'DONOTMINIFY', true );
			define( 'DONOTCDN', true );
		}

		if ( defined( 'WPCACHEHOME' ) && apply_filters( 'cornerstone_compat_wpcache', true ) ) {
			define( 'DONOTCACHEPAGE', true );
		}

	}
}