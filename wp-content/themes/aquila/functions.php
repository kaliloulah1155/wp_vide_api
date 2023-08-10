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

require AQUILA_DIR_PATH.'/inc/helpers/autoloader.php';
require AQUILA_DIR_PATH.'/inc/helpers/template-tags.php';

function aquila_get_theme_instance(){
	\Aquila\Inc\AQUILA_THEME::get_instance();
}
aquila_get_theme_instance();


?>



























