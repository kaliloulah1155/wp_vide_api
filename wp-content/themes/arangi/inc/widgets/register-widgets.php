<?php
// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
require_once ARANGI_FRAMEWORK_DIR . '/widgets/class-widget.php';
if ( ! class_exists( 'Apr_Core_Widgets' ) ) {
	class Apr_Core_Widgets {
		public function __construct() {
			$this->require_widgets();
			add_action( 'widgets_init', array(
				$this,
				'register_widgets',
			) );
		}

		public function require_widgets() {
			require_once 'facebook-page.php';
			require_once 'posts.php';
			require_once 'contact.php';
			require_once 'logo.php';
			require_once 'social.php';
			require_once 'instagram.php';
			require_once 'brands.php';
		}

		public function register_widgets() {
			register_widget( 'Apr_Core_Posts_Widget' );
			register_widget( 'Apr_Core_Facebook_Page_Widget' );
			register_widget( 'Apr_Core_Instagram_Widget' );
			register_widget( 'Apr_Core_Contact_Widget' );
			register_widget( 'Apr_Core_Logo_Widget' );
			register_widget( 'Apr_Core_Social_Widget' );
			register_widget( 'Apr_Brand_Widget' );
		}
	}

	new Apr_Core_Widgets();
}
