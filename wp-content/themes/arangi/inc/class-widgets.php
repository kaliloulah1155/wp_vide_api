<?php
// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
if ( ! class_exists( 'Arangi_Widgets' ) ) {
	class Arangi_Widgets {
		public function __construct() {
			// Register widget areas.
			add_action( 'widgets_init', array(
				$this,
				'register_sidebars',
			) );
		}
		/**
		 * Register widget area.
		 *
		 * @access public
		 * @link   https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
		 */
		public function register_sidebars() {
			$defaults = array(
				'before_widget' => '<div id="%1$s" class="widget %2$s">',
				'after_widget'  => '</div>',
				'before_title'  => '<h2 class="widget-title">',
				'after_title'   => '</h2>',
			);
			register_sidebar( array_merge( $defaults, array(
				'id'          => 'blog_sidebar',
				'name'        => esc_html__( 'Blog Sidebar', 'arangi' ),
				'description' => esc_html__( 'Default Sidebar of blog.', 'arangi' ),
			) ) );
			register_sidebar( array_merge( $defaults, array(
				'id'          => 'page_sidebar',
				'name'        => esc_html__( 'Page Sidebar', 'arangi' ),
				'description' => esc_html__( 'Add widgets here.', 'arangi' ),
			) ) );
			register_sidebar( array_merge( $defaults, array(
				'id'          => 'shop_sidebar',
				'name'        => esc_html__( 'Shop Sidebar', 'arangi' ),
				'description' => esc_html__( 'Default Sidebar of shop.', 'arangi' ),
			) ) );
			register_sidebar( array_merge( $defaults, array(
				'id'          => 'shop_sidebar_left',
				'name'        => esc_html__( 'Shop Sidebar Left', 'arangi' ),
				'description' => esc_html__( 'Default Sidebar left of shop.', 'arangi' ),
			) ) );
			register_sidebar( array_merge( $defaults, array(
				'id'          => 'shop_sidebar_right',
				'name'        => esc_html__( 'Shop Sidebar Right', 'arangi' ),
				'description' => esc_html__( 'Default Sidebar Right of shop.', 'arangi' ),
			) ) );
			register_sidebar( array_merge( $defaults, array(
				'id'          => 'footer-newsletter',
				'name'        => esc_html__( 'Footer Newsletter', 'arangi' ),
			) ) );
			register_sidebar( array_merge( $defaults, array(
				'id'          => 'footer-column-1',
				'name'        => esc_html__( 'Footer 1 Widget 1', 'arangi' ),
			) ) );
			register_sidebar( array_merge( $defaults, array(
				'id'          => 'footer-column-2',
				'name'        => esc_html__( 'Footer 1 Widget 2', 'arangi' ),
			) ) );
			register_sidebar( array_merge( $defaults, array(
				'id'          => 'footer-column-3',
				'name'        => esc_html__( 'Footer 1 Widget 3', 'arangi' ),
			) ) );
			register_sidebar( array_merge( $defaults, array(
				'id'          => 'footer-column-4',
				'name'        => esc_html__( 'Footer 1 Widget 4', 'arangi' ),
			) ) );
			register_sidebar( array_merge( $defaults, array(
				'id'          => 'footer-column-5',
				'name'        => esc_html__( 'Footer 1 Widget 5', 'arangi' ),
			) ) );
			register_sidebar( array_merge( $defaults, array(
				'id'          => 'footer2-column-1',
				'name'        => esc_html__( 'Footer 2 Widget 1', 'arangi' ),
			) ) );
			register_sidebar( array_merge( $defaults, array(
				'id'          => 'footer2-column-2',
				'name'        => esc_html__( 'Footer 2 Widget 2', 'arangi' ),
			) ) );
			register_sidebar( array_merge( $defaults, array(
				'id'          => 'footer2-column-3',
				'name'        => esc_html__( 'Footer 2 Widget 3', 'arangi' ),
			) ) );
			register_sidebar( array_merge( $defaults, array(
				'id'          => 'footer2-column-4',
				'name'        => esc_html__( 'Footer 2 Widget 4', 'arangi' ),
			) ) );
			register_sidebar( array_merge( $defaults, array(
				'id'          => 'footer2-home-wine',
				'name'        => esc_html__( 'Footer home wine', 'arangi' ),
			) ) );
			register_sidebar( array_merge( $defaults, array(
				'id'          => 'footer3-column-1',
				'name'        => esc_html__( 'Footer 3 Widget 1', 'arangi' ),
			) ) );
			register_sidebar( array_merge( $defaults, array(
				'id'          => 'footer3-column-2',
				'name'        => esc_html__( 'Footer 3 Widget 2', 'arangi' ),
			) ) );
			register_sidebar( array_merge( $defaults, array(
				'id'          => 'footer3-column-3',
				'name'        => esc_html__( 'Footer 3 Widget 3', 'arangi' ),
			) ) );
			register_sidebar( array_merge( $defaults, array(
				'id'          => 'footer3-column-4',
				'name'        => esc_html__( 'Footer 3 Widget 4', 'arangi' ),
			) ) );
			register_sidebar( array_merge( $defaults, array(
				'id'          => 'footer3-column-5',
				'name'        => esc_html__( 'Footer 3 Widget 5', 'arangi' ),
			) ) );
			register_sidebar( array_merge( $defaults, array(
				'id'          => 'footer4-column-1',
				'name'        => esc_html__( 'Footer 4 Widget 1', 'arangi' ),
			) ) );
			register_sidebar( array_merge( $defaults, array(
				'id'          => 'footer4-column-2',
				'name'        => esc_html__( 'Footer 4 Widget 2', 'arangi' ),
			) ) );
			register_sidebar( array_merge( $defaults, array(
				'id'          => 'footer4-column-3',
				'name'        => esc_html__( 'Footer 4 Widget 3', 'arangi' ),
			) ) );
			register_sidebar( array_merge( $defaults, array(
				'id'          => 'footer4-column-4',
				'name'        => esc_html__( 'Footer 4 Widget 4', 'arangi' ),
			) ) );
            register_sidebar( array_merge( $defaults, array(
                'id'          => 'humburger_menu_sidebar',
                'name'        => esc_html__( 'Humburger Menu Sidebar', 'arangi' ),
                'description' => esc_html__( 'Default Sidebar of Humburger Menu Sidebar.', 'arangi' ),
            ) ) );
           register_sidebar( array_merge( $defaults, array(
				'id'          => 'popup-sale-off',
				'name'        => esc_html__( 'Popup Sale Off', 'arangi' ),
			) ) );
           	register_sidebar( array_merge( $defaults, array(
				'id'          => 'first-menu-header-5',
				'name'        => esc_html__( 'First Menu Header 5', 'arangi' ),
			) ) );
		}
	}
	new Arangi_Widgets();
}