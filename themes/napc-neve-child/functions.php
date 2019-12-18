<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}


define('CHILD_THEME_NAPC_VERSION', '1.0.0');


if ( ! function_exists( 'napc_neve_child_load' ) ):
	/**
	 * Load CSS file.
	 */
	function napc_neve_child_load() {
		wp_enqueue_style( 'napc-neve-child-style', trailingslashit( get_stylesheet_directory_uri() ) . 'style.css', array( 'neve-style' ), CHILD_THEME_NAPC_VERSION );
		wp_enqueue_script('napc-theme-js', get_stylesheet_directory_uri() . 'napc-focus.js', array(), CHILD_THEME_NAPC_VERSION, 'all');
	}
endif;
add_action( 'wp_enqueue_scripts', 'napc_neve_child_load', 20 );





// SHORTCODES
// Shortcode to render edit button where we want it
add_shortcode('napc_edit_button', function () {
    $out = edit_post_link('Edit This', '', '', '', 'napc-edit-button');
    return $out;
});

add_shortcode('sg_logo_link', function () {
	// return Timber::compile( 'sg-logo.twig' );
	return 'HELLO';
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