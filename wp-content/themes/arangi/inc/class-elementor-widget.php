<?php

namespace Elementor;

class Apr_Core_Widgets {

	/**
	 * Plugin constructor.
	 */
	public function __construct() {
		$this->apr_core_add_actions();
		$this->apr_core_register_posttypes();
		// $this->apr_core_add_widget();
	}

	private function apr_core_add_actions() {
		add_action( 'elementor/widgets/widgets_registered', [ $this, 'apr_core_widgets_registered' ] );
		add_action( 'elementor/init', [ $this, 'apr_core_widgets_int' ] );
		add_action( 'elementor/editor/after_enqueue_styles', [ $this, 'apr_core_elementor_styles' ] );
		add_action( 'wp_enqueue_scripts', [ $this, 'apr_core_frontend_scripts' ] );
		//		add_action( 'admin_enqueue_scripts', [ $this, 'apr_core_load_admin_styles' ] );
		add_action( 'elementor/controls/controls_registered', [ $this, 'apr_core_icon_font_custom' ], 10, 1 );
	}

	private $shortcodes = array(
		"blog", "product", "advanced-tabs", "heading-modern", "banner", "pricing-table", "testimolials", "slides", "woo-categories", "mailchimp", "locator",
		"countdown", "contact-form", "slider-revolution", "list-category"
	);

	private $widgets = array( "contact", "facebook-page", "logo", "posts", "banner", "social" );

	/**
	 * register all post type here
	 * @return void
	 */
	protected function apr_core_register_posttypes() {
		require_once( ARANGI_ADMIN . '/posttypes/static-block.php' );
	}

	protected function apr_core_add_widget() {
		foreach ( $this->widgets as $widgets ) {
			require_once( ARANGI_FRAMEWORK_DIR . '/widgets/' . $widgets . '.php' );
		}
	}

	public function apr_core_widgets_registered() {
		$this->apr_core_includes();
	}

	public function apr_core_widgets_int() {
		$this->apr_core_register_widget();
	}

	private function apr_core_includes() {
		foreach ( $this->shortcodes as $shortcode ) {
			require_once( ARANGI_FRAMEWORK_DIR . '/elementor/' . $shortcode . '.php' );
		}
	}

	private function apr_core_register_widget() {

		Plugin::instance()->elements_manager->add_category(
			'apr-core',
			[
				'title' => esc_html__( 'Apr Elementor PRO', 'apr-core' ),
				'icon'  => 'icon-goes-here'
			]
		);
	}

	public function apr_core_elementor_styles() {

		wp_register_style( 'apr-icon', get_template_directory_uri() . '/assets/css/apr-font.css', array(), ARANGI_THEME_VERSION );
		wp_enqueue_style( 'apr-icon' );
	}

	function apr_core_frontend_scripts() {
		if ( is_rtl() ) {
			wp_enqueue_style( 'apr-core-rtl', get_template_directory_uri() . '/assets/css/apr-core-rtl.min.css?ver=' . ARANGI_THEME_VERSION );
		} else {
			wp_enqueue_style( 'apr-core', get_template_directory_uri() . '/assets/css/apr-core.min.css', array(), ARANGI_THEME_VERSION );
		}
	}

	function apr_core_load_admin_styles() {
		if ( ! class_exists( 'RevSlider' ) ) {
			wp_enqueue_script( 'apr-jquery-ui', ARANGI_JS . '/jquery-ui.min.js', array(), ARANGI_THEME_VERSION );
		}
		wp_enqueue_script( 'apr-metabox-script', ARANGI_JS . '/metabox.min.js', array(), ARANGI_THEME_VERSION );
		wp_enqueue_style( 'apr-metabox-css', get_template_directory_uri() . '/assets/css/metabox.min.css', array(), ARANGI_THEME_VERSION );
	}

	/**
	 * Adding custom icon to icon control in Elementor
	 */
	function apr_core_icon_font_custom( $controls_registry ) {
		// Get existing icons
		$icons = $controls_registry->get_control( 'icon' )->get_settings( 'options' );
		// Append new icons
		$new_icons = array_merge(
			array(
				'icon-cocktail'            => 'Cocktail',
				'icon-free-delivery'       => 'Free Delivery',
				'icon-like'                => 'Like',
				'icon-padlock'             => 'Padlock',
				'icon-smiling-baby'        => 'Smiling Baby',
				'icon-story'               => 'Story',
				'icon-dollar'              => 'Dollar',
				'icon-phone-call'          => 'Phone Call',
				'icon-search'              => 'Search',
				'icon-user'                => 'User',
				'icon-location'            => 'User',
				'icon-supermarket'         => 'Supermarket',
				'icon-support'             => 'Support',
				'icon-user1'               => 'User 2',
				'icon-cutlery'             => 'Cutlery',
				'icon-phone'               => 'Phone',
				'icon-shopping-cart'       => 'Shopping Cart',
				'icon-dessert'             => 'Dessert',
				'icon-logout'              => 'Logout',
				'icon-food-and-restaurant' => 'Food & Restaurant',
				'icon-view'                => 'View',
				'icon-repeat'              => 'Repeat',
				'icon-cell-phone'          => 'Cellphone',
				'icon-contact'             => 'Contact',
				'ti-minus'                 => 'Minus',
				'ti-plus'                  => 'Plus',
				'icon2-tree'               => 'Tree',
				'icon2-online-shop'        => 'Online Shop',
				'icon2-house'              => 'House',
			),
			$icons
		);
		// Then we set a new list of icons as the options of the icon control
		$controls_registry->get_control( 'icon' )->set_settings( 'options', $new_icons );
	}
}

new Apr_Core_Widgets();

/* Start get Category check box */
function apr_core_check_get_cat( $type_taxonomy ) {
	$category = get_categories( array( 'taxonomy' => $type_taxonomy ) );
	if ( isset( $category ) && ! empty( $category ) ) :
		foreach ( $category as $item ) {
			$cat_check[$item->slug] = $item->name . '(' . $item->count . ')';
		}
	endif;

	return $cat_check;
}

function apr_core_get_post_id( $post_type ) {
	$block_options = array();
	$args          = array(
		'numberposts' => - 1,
		'post_type'   => $post_type,
		'post_status' => 'publish',
	);
	$posts         = get_posts( $args );
	foreach ( $posts as $_post ) {
		$block_options[$_post->ID] = $_post->post_title;
	}

	return $block_options;
}

if ( ! is_admin() ) {
	add_action( 'wp_enqueue_scripts', function () {
		wp_deregister_script( 'jquery-slick' );
		wp_deregister_style( 'jquery-slick' );
	}, 11 );
}

// Get all elementor page templates
if ( ! function_exists( 'apr_core_get_page_templates' ) ) {
	function apr_core_get_page_templates() {
		$page_templates = get_posts( array(
			'post_type'      => 'elementor_library',
			'posts_per_page' => - 1
		) );

		$options = array();

		if ( ! empty( $page_templates ) && ! is_wp_error( $page_templates ) ) {
			foreach ( $page_templates as $post ) {
				$options[$post->ID] = $post->post_title;
			}
		}

		return $options;
	}
}



