<?php
/**
 * Aquila functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Aquila
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}




function aquila_enqueue_scripts(){
    wp_enqueue_style('stylesheet',get_stylesheet_uri(),[],filemtime(get_template_directory().'/style.css'));
}
add_action('wp_enqueue_scripts','aquila_enqueue_scripts');

?>
