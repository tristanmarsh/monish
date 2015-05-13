<?php

// =============================================================================
// FUNCTIONS/ADMIN/CLASS.XSG-MAP.PHP
// -----------------------------------------------------------------------------
// Manages a map of registered shortcodes
// =============================================================================

class XSG_Map {

	private $shortcodes = array();
	private $sections = array();

	public function add( $attributes ) {
		if ( isset($attributes['id']) && is_string($attributes['id']) ) {

			$this->shortcodes[$attributes['id']] = $attributes;

			if ( isset($attributes['section']) && !in_array( $attributes['section'], $this->sections) ) {
				array_push($this->sections, $attributes['section']);
			}

		}  else {
			_doing_it_wrong( 'xsg_add', 'Invalid `id` attribute', '2.7' );
		}
	}

	public function remove( $id ) {
		if ( is_string($id) && isset($this->shortcodes[$id]) ) {
			unset($this->shortcodes[$id]);
		}
	}

	public function get( $id = '' ) {
		return isset( $this->shortcodes[$id] ) ? $this->shortcodes[$id] : false;
	}

	public function get_collection() {
		return array_values( $this->shortcodes );
	}

	public function get_sections() {
		return $this->sections;
	}
}