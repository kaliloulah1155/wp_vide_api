<?php
/**
 * Aquila functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Aquila
 */

if ( ! defined( 'AQUILA_DIR_PATH' ) ) {
	// Replace the version number of the theme on each release.
	define( 'AQUILA_DIR_PATH',untrailingslashit(get_template_directory()));
}




if(!defined('AQUILA_DIR_URI')){
	define( 'AQUILA_DIR_URI',untrailingslashit(get_template_directory_uri()));
}

if(!defined('AQUILA_BUILD_URI')){
	define( 'AQUILA_BUILD_URI',untrailingslashit(get_template_directory_uri()).'/assets/build');
}

if(!defined('AQUILA_BUILD_PATH')){
	define( 'AQUILA_BUILD_PATH',untrailingslashit(get_template_directory_uri()).'/assets/build');
}

if(!defined('AQUILA_BUILD_JS_URI')){
	define( 'AQUILA_BUILD_JS_URI',untrailingslashit(get_template_directory_uri()).'/assets/build/js');
}


if(!defined('AQUILA_BUILD_JS_DIR_PATH')){
	define( 'AQUILA_BUILD_JS_DIR_PATH',untrailingslashit(get_template_directory_uri().'/assets/build/js'));
}

if(!defined('AQUILA_BUILD_IMG_URI')){
	define( 'AQUILA_BUILD_IMG_URI',untrailingslashit(get_template_directory_uri()).'/assets/build/assets/src/img');
}

if(!defined('AQUILA_BUILD_CSS_URI')){
	define( 'AQUILA_BUILD_CSS_URI',untrailingslashit(get_template_directory_uri()).'/assets/build/css');
}

if(!defined('AQUILA_BUILD_CSS_DIR_PATH')){
	define( 'AQUILA_BUILD_CSS_DIR_PATH',untrailingslashit(get_template_directory_uri()).'/assets/build/css');
}


require AQUILA_DIR_PATH.'/inc/helpers/autoloader.php';
require AQUILA_DIR_PATH.'/inc/helpers/template-tags.php';

function aquila_get_theme_instance(){
	\Aquila\Inc\AQUILA_THEME::get_instance();
}
aquila_get_theme_instance();

//Le style for wordpress block remove style and script
/*
function ebayads_remove_block_styles(){
	wp_dequeue_style('wp-block-library');
	wp_dequeue_style('wp-block-library-theme');
	wp_dequeue_style('wc-block-style'); //remove woocommerce block css
}

add_action('wp_enqueue_scripts','ebayads_remove_block_styles',100); */

//Remove the core block patterns

?>



























