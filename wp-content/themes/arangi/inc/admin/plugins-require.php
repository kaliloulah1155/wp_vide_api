<?php
function arrow_get_all_plugins_require( $plugins ) { 
	/*
	* Array of plugin arrays. Required keys are name and slug.
	* If the source is NOT from the .org repo, then source is also required. 
	*/

	$plugins = array( 
		array(
            'name' => esc_html__('Elementor','arangi'),
            'slug' => 'elementor',
            'required' => true
        ),
		// This is an example of how to include a plugin bundled with a theme.
		array(
			'name'     => 'Slider Revolution', 
			'slug'     => 'revslider',
			'premium'  => true,
			'required' => true,
			'icon'     => 'https://arrowtheme.github.io/arrowpress-core/icon-plugins/revslider.png',
		),
		array(
			'name'     => 'Contact Form 7',
			'slug'     => 'contact-form-7',
			'required' =>	false,
		),
		array(
			'name'     => 'Classic Widgets',
			'slug'     => 'classic-widgets',
			'icon'     => 'https://s.w.org/plugins/geopattern-icon/classic-widgets.svg',
			'required' => false
		),
		array(
			'name'     => 'MailChimp for WordPress', 
			'slug'     => 'mailchimp-for-wp', 
			'required' => false,
		),
		array(
			'name'     => 'Woocommerce',
			'slug'     => 'woocommerce', 
			'required' => true
		),

		array(
            'name' => esc_html__('Advanced AJAX Product Filters for WooCommerce','arangi'),
            'slug' => 'woocommerce-ajax-filters',
            'required' => true,
			'icon'     => 'https://ps.w.org/woocommerce-ajax-filters/assets/icon-256x256.gif'
        ),
		array(
			'name'     => esc_html__( 'YITH WooCommerce Compare', 'arangi' ),
			'slug'     => 'yith-woocommerce-compare',
			'required' => false,
			'icon'     => 'https://ps.w.org/yith-woocommerce-compare/assets/icon-128x128.jpg'
		),
		array(
			'name'     => esc_html__( 'YITH WooCommerce Quick View', 'arangi' ),
			'slug'     => 'yith-woocommerce-quick-view',
			'required' => true,
			'icon'     => 'https://ps.w.org/yith-woocommerce-quick-view/assets/icon-128x128.jpg'
		),

		array(
			'name'     => esc_html__( 'YITH WooCommerce Wishlist', 'arangi' ),
			'slug'     => 'yith-woocommerce-wishlist',
			'required' => true,
			'icon'     => 'https://ps.w.org/yith-woocommerce-wishlist/assets/icon-128x128.jpg'
		),
		array(
            'name' => 'Yith Woocommerce Brands Add On',
            'slug' => 'yith-woocommerce-brands-add-on',
            'required' => true,
			'icon'     => 'https://ps.w.org/yith-woocommerce-brands-add-on/assets/icon-256x256.jpg'
        ),
	);

	return $plugins;
}

add_filter( 'arrowpress_core_get_all_plugins_require', 'arrow_get_all_plugins_require' );

//Add info for Dashboard Admin
if ( ! function_exists( 'arrowpress_arangi_links_guide_user' ) ) {
	function arrowpress_arangi_links_guide_user() {
		return array(
			'docs'      => 'https://guid.arrowtheme.com/arangi/',
			'support'   => 'https://arrowhitech.ticksy.com/',
			'knowledge' => 'https://arrowhitech.ticksy.com/articles/',
		);
	}
}
add_filter( 'arrowpress_theme_links_guide_user', 'arrowpress_arangi_links_guide_user' );

/**
 * Link purchase theme.
 */
if ( ! function_exists( 'arrowpress_arangi_link_purchase' ) ) {
	function arrowpress_arangi_link_purchase() {
		return 'https://1.envato.market/eK4OjD';
	}
}
add_filter( 'arrowpress_envato_link_purchase', 'arrowpress_arangi_link_purchase' );

/**
 * Envato id.
 */
if ( ! function_exists( 'arrowpress_arangi_envato_item_id' ) ) {
	function arrowpress_arangi_envato_item_id() {
		return '23610683';
	}
}

add_filter( 'arrowpress_envato_item_id', 'arrowpress_arangi_envato_item_id' );

add_filter( 'arrowpress_prefix_folder_download_data_demo', function () {
	return 'arangi';
} );

add_filter( 'arrowpress_importer_basic_settings', 'arrowpress_import_add_basic_settings' );
add_filter( 'arrowpress_importer_page_id_settings', 'arrowpress_import_add_page_id_settings' );
function arrowpress_import_add_basic_settings( $settings ) {
	$settings[] = 'elementor_css_print_method';
	$settings[] = 'elementor_experiment-e_font_icon_svg';
	$settings[] = 'elementor_cpt_support';
	$settings[] = 'elementor_scheme_color';
	$settings[] = 'elementor_scheme_typography';
	$settings[] = 'elementor_scheme_color-picker';
	$settings[] = 'elementor_google_font';
	$settings[] = 'permalink_structure';
	$settings[] = '_transient_wc_attribute_taxonomies';
	return $settings;
}

function arrowpress_import_add_page_id_settings( $settings ) {
	$settings[] = 'elementor_active_kit';

	return $settings;
}

// add_action('arrowpress_core_importer_start_step','arrowpress_import_wc_attribute_taxonomies_product',1);
// function arrowpress_import_wc_attribute_taxonomies_product(){
// 	$vc_att_taxonomies = 'a:3:{i:0;O:8:"stdClass":6:{s:12:"attribute_id";s:1:"2";s:14:"attribute_name";s:5:"color";s:15:"attribute_label";s:5:"color";s:14:"attribute_type";s:6:"select";s:17:"attribute_orderby";s:10:"menu_order";s:16:"attribute_public";s:1:"0";}i:1;O:8:"stdClass":6:{s:12:"attribute_id";s:1:"1";s:14:"attribute_name";s:4:"size";s:15:"attribute_label";s:4:"size";s:14:"attribute_type";s:6:"select";s:17:"attribute_orderby";s:10:"menu_order";s:16:"attribute_public";s:1:"0";}i:2;O:8:"stdClass":6:{s:12:"attribute_id";s:1:"3";s:14:"attribute_name";s:5:"size3";s:15:"attribute_label";s:5:"size3";s:14:"attribute_type";s:6:"select";s:17:"attribute_orderby";s:10:"menu_order";s:16:"attribute_public";s:1:"0";}}';
// 	update_option('_transient_wc_attribute_taxonomies', maybe_unserialize($vc_att_taxonomies));
// }

add_filter( 'arrowpress_core_list_child_themes', 'arrowpress_list_child_themes' );
function arrowpress_list_child_themes() {
	return array(
		'arangi-child' => array(
			'name'       => 'arangi Child',
			'slug'       => 'arangi-child',
			'screenshot' => 'https://arrowtheme.github.io/demo-data/arangi/child-themes/screenshot.png',
			'source'     => 'https://arrowtheme.github.io/demo-data/arangi/child-themes/arangi-child.zip',
			'version'    => '1.0.0'
		),
	);
}
