<?php
/**
 * TEC Theme functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package NAPC
 * @since 1.0.0
 */

/**
 * Define Constants
 */
define( 'CHILD_THEME_NAPC_VERSION', '1.0.0' );

/**
 * Enqueue styles
 */
function child_enqueue_styles() {
	wp_enqueue_style( 'napc-theme-css', get_stylesheet_directory_uri() . '/style.css', array('astra-theme-css'), CHILD_THEME_NAPC_VERSION, 'all' );
}
add_action( 'wp_enqueue_scripts', 'child_enqueue_styles', 15 );


// Add "nocookie" To WordPress oEmbeded Youtube Videos
function ev_youtube_nocookie_oembed( $html ) {
	return str_replace( 'youtube.com', 'youtube-nocookie.com', $html );
}
add_filter( 'embed_oembed_html', 'ev_youtube_nocookie_oembed' ); // WordPress
add_filter( 'video_embed_html', 'ev_youtube_nocookie_oembed' ); //Jetpack


function remove_api () {
	remove_action( 'wp_head', 'rest_output_link_wp_head', 10 );
	remove_action( 'wp_head', 'wp_oembed_add_discovery_links', 10 );
}
add_action( 'after_setup_theme', 'remove_api' );

