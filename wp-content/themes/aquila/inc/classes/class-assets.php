<?php
/**
 * Enqueue theme assets
 *
 * @package Aquila
 */
namespace Aquila\Inc;

use Aquila\Inc\Traits\Singleton;

class Assets{
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
		add_action('wp_enqueue_scripts',[$this,'register_styles']);
		add_action('wp_enqueue_scripts',[$this,'register_scripts']);
	}

	public function register_styles(){
		//Register Styles
		wp_register_style('style-css',get_stylesheet_uri(),[],filemtime(AQUILA_DIR_PATH.'/style.css'),'all');
		wp_register_style('bootstrap-css',AQUILA_DIR_URI.'/assets/src/library/css/bootstrap.css',[],false,'all');

		//Enqueue Styles
		wp_enqueue_style('style-css');
		wp_enqueue_style('bootstrap-css');
	}
	public function register_scripts(){


		//Register Script
 		$jsFilePath = AQUILA_BUILD_JS_DIR_PATH . '/main.js';
		if (file_exists($jsFilePath)) {
			$modificationTime = filemtime($jsFilePath);
			wp_register_script('main-js', AQUILA_BUILD_JS_URI . '/main.js', [], $modificationTime, true);
		} else {
			// Handle the case when the script file doesn't exist
			wp_register_script('main-js', AQUILA_BUILD_JS_URI . '/main.js', [], null, true);
		}

		wp_register_script('bootstrap-js',AQUILA_DIR_URI.'/assets/src/library/js/bootstrap.js',['jquery'],false,true);

		//Enqueue Scripts
		wp_enqueue_script('main-js');
		wp_enqueue_script('bootstrap-js');
	}

}
