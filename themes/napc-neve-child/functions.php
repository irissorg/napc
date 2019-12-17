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



// Shortcode to render edit button where we want it
add_shortcode('napc_edit_button', function () {
    $out = edit_post_link('Edit This', '', '', '', 'napc-edit-button');
    return $out;
});


//Add Edit button
add_action('neve_before_header_hook', 'napc_add_edit_button');

function napc_add_edit_button(){
    if (is_singular(array( 'resource', 'page', 'post' ))) {
		// echo do_shortcode('[napc_edit_button]');
		$out = edit_post_link('Edit This', '', '', '', 'napc-edit-button');
    	return $out;
    }
}