<?php

class Apr_Core_Metabox {
	public function __construct() {
		add_filter( 'arrowpress_add_meta_boxes', array( $this, 'register_page_metabox' ) );
	}

	function register_page_metabox( $meta_boxes ) {
		$meta_boxes[] = array(
			'id'         => 'new',
			'title'      => __( 'Page Options', 'lusion' ),
			'post_types' => array( 'page' ),
			'tabs'       => true,
			'fields'     => $this->general_meta_fields()
		);

		return $meta_boxes;
	}

	public function general_option() {
		$apr_sidebars = Arangi_Helper::get_registered_sidebars( $default_option = true );

		return array(
			'title'  => esc_attr__( 'General', 'apr-core' ),
			'id'     => 'general',
			'fields' => array(
				array(
					'id'      => 'site_layout',
					'label'   => esc_attr__( 'Layout', 'apr-core' ),
					'desc'    => esc_attr__( 'Controls the layout of this page.', 'apr-core' ),
					'type'    => 'select',
					'default' => 'default',
					'options' => array(
						'default'    => esc_html__( 'Default', 'apr-core' ),
						'wide'       => esc_html__( 'Wide', 'apr-core' ),
						'full-width' => esc_html__( 'Full width', 'apr-core' ),
						'boxed'      => esc_html__( 'Boxed', 'apr-core' ),
					),
				),
				array(
					'id'      => 'main_layout',
					'label'   => esc_attr__( 'Main Layout', 'apr-core' ),
					'desc'    => esc_attr__( 'Controls the layout of this page.', 'apr-core' ),
					'type'    => 'select',
					'default' => 'default',
					'options' => array(
						'default' => esc_html__( 'Default', 'apr-core' ),
						'main-1'  => esc_html__( 'Main Layout 1', 'apr-core' ),
						'main-2'  => esc_html__( 'Main Layout 2', 'apr-core' ),
					),
				),
				array(
					'id'      => 'site_width',
					'label'   => esc_attr__( 'Site width', 'apr-core' ),
					'desc'    => esc_attr__( 'Controls the site width for this page. Enter value including any valid CSS unit, ex: 1200px. Leave blank to use global setting.', 'apr-core' ),
					'type'    => 'text',
					'default' => '',
				),
				array(
					'id'      => 'is_home_page',
					'label'   => esc_attr__( 'Is Home Page', 'apr-core' ),
					'desc'    => esc_attr__( 'Checked if want the logo to be covered with h1 tag.', 'apr-core' ),
					'type'    => 'checkbox',
					'default' => '',
				),
				array(
					'id'      => 'preload',
					'label'   => esc_attr__( 'Preload Layout', 'apr-core' ),
					'type'    => 'select',
					'default' => 'default',
					'options' => array(
						'default'   => esc_html__( 'Default Preload', 'apr-core' ),
						'preload-1' => esc_html__( 'Preload Type 1', 'apr-core' ),
						'preload-2' => esc_html__( 'Preload Type 2', 'apr-core' ),
						'preload-3' => esc_html__( 'Preload Type 3', 'apr-core' ),
						'preload-4' => esc_html__( 'Preload Type 4', 'apr-core' ),
						'preload-5' => esc_html__( 'Preload Type 5', 'apr-core' ),
						'preload-6' => esc_html__( 'Preload Type 6', 'apr-core' ),
						'preload-7' => esc_html__( 'Preload Type 7', 'apr-core' ),
						'preload-8' => esc_html__( 'Preload Type 8', 'apr-core' ),
						'preload-9' => esc_html__( 'Preload Type 9', 'apr-core' ),
					),
					'desc'    => esc_attr__( '', 'apr-core' ),
				),
				array(
					'id'      => 'left_sidebar',
					'label'   => esc_attr__( 'Left Sidebar', 'apr-core' ),
					'type'    => 'select',
					'default' => 'default',
					'options' => $apr_sidebars,
					'desc'    => esc_attr__( '', 'apr-core' ),
				),
				array(
					'id'      => 'right_sidebar',
					'label'   => esc_attr__( 'Right Sidebar', 'apr-core' ),
					'type'    => 'select',
					'default' => 'default',
					'options' => $apr_sidebars,
					'desc'    => esc_attr__( '', 'apr-core' ),
				),
				array(
					'id'      => 'remove_space_top',
					'label'   => esc_attr__( 'Remove top space', 'apr-core' ),
					'type'    => 'checkbox',
					'default' => '',
					'desc'    => esc_attr__( 'Remove top space', 'apr-core' ),
				),
				array(
					'id'      => 'remove_space_bottom',
					'label'   => esc_attr__( 'Remove bottom space', 'apr-core' ),
					'type'    => 'checkbox',
					'default' => '',
					'desc'    => esc_attr__( 'Remove bottom space', 'apr-core' ),
				),
			),

		);

	}

	public function skin_option() {
		return array(
			'title'  => esc_attr__( 'Skin', 'apr-core' ),
			'id'     => 'skin',
			'fields' => array(
				array(
					'id'      => 'site_color',
					'label'   => esc_attr__( 'Primary Color', 'apr-core' ),
					'desc'    => esc_attr__( 'Select different main color for page', 'apr-core' ),
					'type'    => 'color',
					'default' => ''
				),
				array(
					'id'      => 'page_secondary_color',
					'label'   => esc_attr__( 'Secondary Color', 'apr-core' ),
					'desc'    => esc_attr__( 'Select different secondary color for page. Suggestions: Secondary Color the same Highlight Color', 'apr-core' ),
					'type'    => 'color',
					'default' => ''
				),
				array(
					'id'      => 'page_highlight_color',
					'label'   => esc_attr__( 'Highlight Color', 'apr-core' ),
					'desc'    => esc_attr__( 'Select different highlight color for page', 'apr-core' ),
					'type'    => 'color',
					'default' => ''
				),
				array(
					'id'      => 'site_background',
					'label'   => esc_attr__( 'Body Background Color', 'apr-core' ),
					'desc'    => 'You should input hex color(ex: #e1e1e1)',
					'type'    => 'color',
					'default' => ''
				),
				array(
					'id'      => 'body_bg_image',
					'label'   => esc_attr__( 'Body Background Image', 'apr-core' ),
					'desc'    => '',
					"type"             => "image_advanced",
					'max_file_uploads' => 1,
				),
			)
		);
	}

	public function breadcrumbs_option() {
		return array(
			'title'  => esc_attr__( 'Breadcrumbs & Page title', 'apr-core' ),
			'id'     => 'breadcrumbs-title',
			'fields' => array(
				array(
					'id'      => 'breadcrumbs',
					'label'   => esc_attr__( 'Hide Breadcrumbs', 'apr-core' ),
					'type'    => 'checkbox',
					'default' => '',
				),
				array(
					'id'      => 'page_title',
					'label'   => esc_html__( 'Hide Page Title', 'apr-core' ),
					'desc'    => esc_html__( 'Hide Page Title', 'apr-core' ),
					'type'    => 'checkbox',
					'default' => '',
				),
				array(
					'id'      => 'align_breadcrumbs',
					'label'   => esc_html__( 'Align Breadcrumb', 'apr-core' ),
					'type'    => 'select',
					'options' => array(
						'default' => esc_html__( 'Default', 'apr-core' ),
						'left'    => esc_html__( 'Left', 'apr-core' ),
						'center'  => esc_html__( 'Center', 'apr-core' ),
						'right'   => esc_html__( 'Right', 'apr-core' ),
					),
					'default' => '',
				),
				array(
					"id"      => "breadcrumbs_bg",
					"label"   => esc_html__( "Breadcrumbs Background", 'apr-core' ),
					'desc'    => esc_html__( "Upload breadcrumbs background", 'apr-core' ),
					"type"             => "image_advanced",
					'max_file_uploads' => 1,
				),
				array(
					"id"      => "breadcrumbs_color",
					"label"   => esc_html__( "Breadcrumbs Color", 'apr-core' ),
					"type"    => "color",
					'default' => '',
				),
				array(
					"id"      => "title_color",
					"label"   => esc_html__( "Page Title Color", 'apr-core' ),
					"type"    => "color",
					'default' => '',
				),
				array(
					"id"      => "link_color",
					"label"   => esc_html__( "Breadcrumb Link Color", 'apr-core' ),
					"type"    => "color",
					'default' => '',
				),
				array(
					"id"      => "breadcrumbs_padding",
					"label"   => esc_html__( "Breadcrumbs top and bottom padding", 'apr-core' ),
					"type"    => "number",
					'desc'    => esc_html__( 'Enter a number here. (px)', 'apr-core' ),
					'default' => '',
				),
				array(
					"id"      => "breadcrumbs_bg_overlay",
					"label"   => esc_html__( "Breadcrumbs Background Overlay ", 'apr-core' ),
					"type"    => "color",
					'default' => '',
				),
				array(
					"id"      => "breadcrumbs_opacity",
					"label"   => esc_html__( "Breadcrumbs Opacity Background Overlay ", 'apr-core' ),
					"type"    => "text",
					'default' => '',
				),
				array(
					"id"      => "breadcrumbs_font_size",
					"label"   => esc_html__( "Page title font size", 'apr-core' ),
					"type"    => "number",
					'desc'    => esc_html__( 'Enter font size here. (px)', 'apr-core' ),
					'default' => '',
				),
				array(
					"id"      => "breadcrumbs_link_font_size",
					"label"   => esc_html__( "Breadcrumbs link font size", 'apr-core' ),
					"type"    => "number",
					'desc'    => esc_html__( 'Enter font size here. (px)', 'apr-core' ),
					'default' => '',
				),
			)
		);
	}

	public function header_option() {
		$apr_header = Arangi_Helper::get_header_list( $default_option = true );

		return array(
			'title'  => esc_attr__( 'Header', 'apr-core' ),
			'id'     => 'header',
			'fields' => array(
				array(
					'id'      => 'header_type',
					'label'   => esc_attr__( 'Header Type', 'apr-core' ),
					'desc'    => esc_attr__( 'Select header type that displays on this page.', 'apr-core' ),
					'type'    => 'select',
					'default' => '',
					'options' => $apr_header, 
				),
				array(
					'id'      => 'menu_display',
					'label'   => esc_attr__( 'Primary menu', 'apr-core' ),
					'desc'    => esc_attr__( 'Select which menu displays on this page.', 'apr-core' ),
					'type'    => 'select',
					'options' => Arangi_Helper::get_all_menus(),
					'default' => '',
				),
				array(
					'id'      => 'hide_header',
					'label'   => esc_attr__( 'Hide Header', 'apr-core' ),
					'desc'    => esc_attr__( 'Turn on hide status.', 'apr-core' ),
					'type'    => 'checkbox',
					'default' => '',
				),
				array(
					'id'      => 'fixed_header',
					'label'   => esc_attr__( 'Header fixed', 'apr-core' ),
					'desc'    => esc_attr__( 'Turn on fixed status.', 'apr-core' ),
					'type'    => 'checkbox',
					'default' => '',
				),
				array(
					'id'      => 'header_layout',
					'label'   => esc_attr__( 'Header Layout', 'apr-core' ),
					'desc'    => esc_attr__( 'Controls the layout of this page.', 'apr-core' ),
					'type'    => 'select',
					'default' => 'default',
					'options' => array(
						'default'    => esc_html__( 'Default', 'apr-core' ),
						'wide'       => esc_html__( 'Wide', 'apr-core' ),
						'full_width' => esc_html__( 'Full width', 'apr-core' ),
						'boxed'      => esc_html__( 'Boxed', 'apr-core' ),
					),
				),
				array(
					"id"      => "logo_header",
					"label"   => esc_html__( "Logo header for page", 'apr-core' ),
					'desc'    => esc_html__( "Upload logo header only page", 'apr-core' ),
					"type"             => "image_advanced",
					'max_file_uploads' => 1,
				),
				array(
					"id"      => "logo_header_sticky",
					"label"   => esc_html__( "Logo header sticky for page", 'apr-core' ),
					'desc'    => esc_html__( "Only show when active sticky header", 'apr-core' ),
					"type"             => "image_advanced",
					'max_file_uploads' => 1,
				),
				array(
					'id'      => 'header_bg',
					'label'   => esc_attr__( 'Header Background', 'apr-core' ),
					'desc'    => esc_html__( "You should input hex color(ex: #f5f5f5).", 'apr-core' ),
					'type'    => 'color',
					'default' => '',
				),
				array(
					'id'      => 'header_bg_image',
					'label'   => esc_attr__( 'Header Background Image', 'apr-core' ),
					'desc'    => esc_html__( "Works when fixed header.", 'apr-core' ),
					"type"             => "image_advanced",
					'max_file_uploads' => 1,
				),

				array(
					'id'      => 'header_text_color',
					'label'   => esc_attr__( 'Header text color', 'apr-core' ),
					'desc'    => esc_html__( "You should input hex color(ex: #333333).", 'apr-core' ),
					'type'    => 'color',
					'default' => '',
				),
				array(
					'id'      => 'header_menu_color',
					'label'   => esc_attr__( 'Header menu color', 'apr-core' ),
					'desc'    => esc_html__( "You should input hex color(ex: #333333).", 'apr-core' ),
					'type'    => 'color',
					'default' => '',
				),

				array(
					'id'      => 'header_menu_color_hover',
					'label'   => esc_attr__( 'Header menu hover color', 'apr-core' ),
					'desc'    => esc_html__( "You should input hex color(ex: #c44860).", 'apr-core' ),
					'type'    => 'color',
					'default' => '',
				),
				array(
					'id'      => 'header_link_color', 
					'label'   => esc_attr__( 'Header link color', 'apr-core' ),
					'desc'    => esc_html__( "You should input hex color(ex: #333333).", 'apr-core' ),
					'type'    => 'color',
					'default' => '',
				),
				array(
					'id'      => 'header_link_hover_color',
					'label'   => esc_attr__( 'Header hover color', 'apr-core' ),
					'desc'    => esc_html__( "You should input hex color(ex: #c44860).", 'apr-core' ),
					'type'    => 'color',
					'default' => '',
				),
				array(
					'id'      => 'header_icon_color',
					'label'   => esc_attr__( 'Header icon color', 'apr-core' ),
					'desc'    => esc_html__( "You should input hex color(ex: #333333).", 'apr-core' ),
					'type'    => 'color',
					'default' => '',
				),
			)
		);
	}

	public function footer_option() {
		$apr_footer = Arangi_Helper::get_footer_list( $default_option = true );

		return array(
			'title' => esc_attr__( 'Footer', 'apr-core' ),
			'id'    => 'footer', 'fields' => array(
				array(
					'id'      => 'footer_type',
					'label'   => esc_attr__( 'Footer Type', 'apr-core' ),
					'desc'    => esc_attr__( 'Select footer type that displays on this page.', 'apr-core' ),
					'type'    => 'select',
					'default' => '',
					'options' => $apr_footer,
				),
				array(
					'id'      => 'hide_footer',
					'label'   => esc_attr__( 'Hide Footer', 'apr-core' ),
					'desc'    => esc_attr__( 'Turn on hide status.', 'apr-core' ),
					'type'    => 'checkbox',
					'default' => '',
				),
				array(
					'id'      => 'newsletter_type',
					'label'   => esc_attr__( 'Newsletter Type', 'apr-core' ),
					'desc'    => esc_attr__( 'Select newsletter footer type that displays on this page.', 'apr-core' ),
					'type'    => 'select',
					'options' => array(
						'default'       => esc_html__( 'Default', 'apr-core' ),
						'newsletter_01' => esc_html__( 'Newsletter 1', 'apr-core' ),
						'newsletter_02' => esc_html__( 'Newsletter 2', 'apr-core' ),
					),
					'default' => '',
				),
				array(
					'id'      => 'hide_newsletter_footer',
					'label'   => esc_attr__( 'Hide Newsletter Footer', 'apr-core' ),
					'desc'    => esc_attr__( 'Turn on hide status.', 'apr-core' ),
					'type'    => 'checkbox',
					'default' => '',
				),
				array(
					'id'      => 'bg_newsletter',
					'label'   => esc_attr__( 'Newsletter Gradient', 'apr-core' ),
					'desc'    => esc_attr__( 'Turn on newsletter gradient.', 'apr-core' ),
					'type'    => 'checkbox',
					'default' => '',
				),
				array(
					'id'      => 'hide_instagram_footer',
					'label'   => esc_attr__( 'Hide Instagram Footer', 'apr-core' ),
					'desc'    => esc_attr__( 'Turn on hide status.', 'apr-core' ),
					'type'    => 'checkbox',
					'default' => '',
				),
				array(
					'id'      => 'add_product_footer',
					'label'   => esc_attr__( 'Hide Instagram add product', 'apr-core' ),
					'desc'    => esc_attr__( 'Turn on hide Hide Instagram add product', 'apr-core' ),
					'type'    => 'checkbox',
					'default' => '',
				),
				array(
					'id'      => 'footer_bg',
					'label'   => esc_attr__( 'Footer Background', 'apr-core' ),
					'desc'    => esc_html__( "You should input hex color(ex: #ffffff).", 'apr-core' ),
					'type'    => 'color',
					'default' => '',
				),
				array(
					'id'      => 'footer_bg_image',
					'label'   => esc_attr__( 'Footer Image Background', 'apr-core' ),
					'desc'    => esc_html__( "Upload background image footer only page", 'apr-core' ),
					"type"             => "image_advanced",
					'max_file_uploads' => 1,
				),
				array(
					'id'      => 'footer_tt_color',
					'label'   => esc_attr__( 'Footer title widget color', 'apr-core' ),
					'desc'    => esc_html__( "You should input hex color(ex: #948e90).", 'apr-core' ),
					'type'    => 'color',
					'default' => '',
				),
				array(
					'id'      => 'footer_text_color',
					'label'   => esc_attr__( 'Footer text color', 'apr-core' ),
					'desc'    => esc_html__( "You should input hex color(ex: #948e90).", 'apr-core' ),
					'type'    => 'color',
					'default' => '',
				),
				array(
					'id'      => 'footer_link_color',
					'label'   => esc_attr__( 'Footer link color', 'apr-core' ),
					'desc'    => esc_html__( "You should input hex color(ex: #948e90).", 'apr-core' ),
					'type'    => 'color',
					'default' => '',
				),
				array(
					'id'      => 'footer_link_hover_color',
					'label'   => esc_attr__( 'Footer link hover color', 'apr-core' ),
					'desc'    => esc_html__( "You should input hex color(ex: #948e90).", 'apr-core' ),
					'type'    => 'color',
					'default' => '',
				),
				array(
					'id'      => 'footer_background_bottom',
					'label'   => esc_attr__( 'Footer background bottom color', 'apr-core' ),
					'desc'    => esc_html__( "You should input hex color(ex: #948e90).", 'apr-core' ),
					'type'    => 'color',
					'default' => '',
				),
				array(
					'id'      => 'footer_border_bottom',
					'label'   => esc_attr__( 'Footer border bottom color', 'apr-core' ),
					'desc'    => esc_html__( "You should input hex color(ex: #948e90).", 'apr-core' ),
					'type'    => 'color',
					'default' => '',
				),
				array(
					"id"      => "logo_footer_page",
					"label"   => esc_html__( "Logo footer for page", 'apr-core' ),
					'desc'    => esc_html__( "Upload logo footer only page", 'apr-core' ),
					"type"             => "image_advanced",
					'max_file_uploads' => 1,
				),
			)
		);
	}

	public function general_meta_fields() {
		$meta_fields = array(
			$this->general_option(),
			$this->skin_option(),
			$this->breadcrumbs_option(),
			$this->header_option(),
			$this->footer_option(),
		);

		return $meta_fields;
	}

}

if ( class_exists( 'Apr_Core_Metabox' ) ) {
	new Apr_Core_Metabox;
};

require_once( ARANGI_ADMIN . '/metabox/class-post-metabox.php' );
require_once( ARANGI_ADMIN . '/metabox/class-product-metabox.php' );
require_once( ARANGI_ADMIN . '/metabox/class-taxonomy-metabox.php' );
require_once( ARANGI_ADMIN . '/metabox/class-taxonomy-product.php' );
require_once( ARANGI_ADMIN . '/metabox/related-post.php' );
