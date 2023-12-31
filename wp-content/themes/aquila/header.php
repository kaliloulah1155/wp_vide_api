<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Aquila
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<?php wp_head(); ?>

</head>
<body <?php body_class('hello-class') ?>>
<?php
  if(function_exists('wp_body_open')){
	  wp_body_open();
  }
 ?>

<div id="page " class="site">
	<header id="masthead" class="site-header" role="banner">
         <?php get_template_part('template-parts/header/nav'); ?>
	</header>
	<div id="content" class="site-content container-fluid mt-5">























