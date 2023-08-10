<?php
/**
 * Theme Sidebars
 *
 * @package Aquila
 */
namespace Aquila\Inc;

use Aquila\Inc\Traits\Singleton;

class Sidebars{
	use Singleton;
	protected function __construct()
	{

		//load class
		$this->setup_hooks();
	}
	protected function setup_hooks(){
		/*
		 * Actions
		 */
		add_action('widgets_init',[$this,'register_sidebars']);
		add_action('widgets_init',[$this,'register_clock_widget']);
 	}

 	public function register_sidebars(){
		register_sidebar([
			'name'          => __( 'Sidebar', 'aquila' ),
			'id'            => 'sidebar-1',
			'description'=>__('Main sidebar','aquila'),
			'before_widget' => '<div id="%1$s" class="widget widget-sidebar %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		] );
		register_sidebar([
			'name'          => __( 'Footer', 'aquila' ),
			'id'            => 'sidebar-2',
			'description'=>__('Footer sidebar','aquila'),
			'before_widget' => '<div id="%1$s" class="widget widget-footer cell column %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		] );
	}

	public function register_clock_widget(){
       register_widget('Aquila\Inc\Clock_Widget');
	}


}
