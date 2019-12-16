<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
if ( ! function_exists( 'napc_neve_child_load_css' ) ):
	/**
	 * Load CSS file.
	 */
	function napc_neve_child_load_css() {
		wp_enqueue_style( 'napc-neve-child-style', trailingslashit( get_stylesheet_directory_uri() ) . 'style.css', array( 'neve-style' ), NEVE_VERSION );
	}
endif;
add_action( 'wp_enqueue_scripts', 'napc_neve_child_load_css', 20 );
