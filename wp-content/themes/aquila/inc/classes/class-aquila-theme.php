<?php
/**
 * Bootstrap the theme
 *
 * @package Aquila
 */
namespace Aquila\Inc;

use Aquila\Inc\Traits\Singleton;

class AQUILA_THEME{
	use Singleton;

	protected function __construct()
	{
		//load class
		Assets::get_instance();
		Menus::get_instance();
		Meta_Boxes::get_instance();
		Sidebars::get_instance();
		Blocks::get_instance();
		Block_Patterns::get_instance();

		$this->setup_hooks();
	}

	protected function setup_hooks(){
		/*
		 * Actions
		 */
         add_action('after_setup_theme',[$this,'setup_theme']);
         add_action('after_setup_theme', [$this,'remove_default_block_patterns']);

	}

	function remove_default_block_patterns() {
		remove_theme_support('core-block-patterns');
	}

	public function setup_theme(){

		add_theme_support('title-tag');
		add_theme_support('custom-logo',[
			'height'=>100,
			'width'=>400,
			'flex-height'=>true,
			'flex-width'=>true,
			'header-text'=>['site-title','site-description']
		]);
		add_theme_support('custom-background',[
			'default-color'=>'#fff',
			'default-image'=>'',
			'default-repeat'=>'no-repeat'
		]);

		add_theme_support('post-thumbnails');
		add_image_size('featured-thumbnail',350,233,true);


		add_theme_support('customize-selective-refresh-widgets');
		add_theme_support('automatic-feed-links');
		add_theme_support('html5',[
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'script',
			'style'
		]);

		add_theme_support('wp-block-styles');
		add_theme_support('align-wide');
        add_theme_support('editor-styles');

        //style personnaliser de gutenborg
		add_editor_style('assets/build/css/editor.css');


		global $content_width;
		if(!isset($content_width)){
			$content_width=1240;
		}
	}



}





























