<?php

class Apr_Core_Product_Metabox extends Apr_Core_Metabox {
//	private $screen = array(
//		'product',
//	);
//
//	public function add_meta_boxes() {
//		foreach ( $this->screen as $single_screen ) {
//			add_meta_box(
//				'product_metabox',
//				__( 'Page Options', 'apr-core' ),
//				array( $this, 'meta_box_callback' ),
//				$single_screen,
//				'normal',
//				'default'
//			);
//		}
//	}
	function register_page_metabox( $meta_boxes ) {
		$meta_boxes[] = array(
			'id'         => 'product_metabox',
			'title'      => __( 'Product Options', 'lusion' ),
			'post_types' => 'product',
			'tabs'       => true,
			'fields'     => $this->general_meta_fields()
		);

		return $meta_boxes;
	}
	public function general_meta_fields() {
		$meta_fields = array(
			array(
				'title'  => esc_attr__( 'Product', 'apr-core' ),
				'id'     => 'product_option',
				'fields' => array(
					array(
						'id'      => 'meta_single_style',
						'type'    => 'select',
						'label'   => esc_html__( 'Single Style', 'apr-core' ),
						'desc'    => esc_html__( 'Choose single product style ', 'apr-core' ),
						'options' => array(
							'default'  => esc_html__( 'Default', 'apr-core' ),
							'single_1' => esc_html__( 'Single 1', 'apr-core' ),
							'single_2' => esc_html__( 'Single 2', 'apr-core' ),
							'single_3' => esc_html__( 'Single 3', 'apr-core' ),
							'single_4' => esc_html__( 'Single 4', 'apr-core' ),
						),
						'default' => 'default',
					),
					array(
						'id'      => 'element_product',
						'label'   => esc_attr__( 'Element', 'apr-core' ),
						'desc'    => esc_attr__( 'Enter element for the product.', 'apr-core' ),
						'type'    => 'text',
						'default' => '',
					),
					array(
						'id'      => 'unit_price',
						'label'   => esc_attr__( 'Unit Price', 'apr-core' ),
						'desc'    => esc_attr__( 'Enter unit price for the product.', 'apr-core' ),
						'type'    => 'text',
						'default' => '',
					),
					array(
						'id'      => 'video_product',
						'label'   => esc_attr__( 'Link Video', 'apr-core' ),
						'desc'    => esc_attr__( 'Enter link video Youtube, Vimeo,... for the product. (Ex: https://player.vimeo.com/video/125562082?autoplay=1)', 'apr-core' ),
						'type'    => 'text',
						'default' => '',
					),
					array(
						'id'      => 'custom_tab_title',
						'label'   => esc_attr__( 'Custom Tab Title', 'apr-core' ),
						'desc'    => esc_attr__( 'Input the custom tab title.', 'apr-core' ),
						'type'    => 'text',
						'default' => '',
					),

					array(
						'id'      => 'custom_tab_content',
						'label'   => esc_attr__( 'Content Tab', 'apr-core' ),
						'desc'    => esc_attr__( 'Input the content tab.', 'apr-core' ),
						'type'    => 'editor',
						'default' => '',
					),
					array(
						'id'      => 'meta_main_shop',
						'type'    => 'select',
						'label'   => esc_html__( 'Main Shop Layout', 'apr-core' ),
						'desc'    => esc_html__( 'Choose main layout product ', 'apr-core' ),
						'options' => array(
							'default' => esc_html__( 'Default', 'apr-core' ),
							'grid-1'  => esc_html__( 'Main Shop Layout 1', 'apr-core' ),
							'grid-3'  => esc_html__( 'Main Shop Layout 2', 'apr-core' ),
						),
						'default' => 'default',
					),
					array(
						'id'      => 'related_product',
						'label'   => esc_attr__( 'Hide Related Product', 'apr-core' ),
						'type'    => 'checkbox',
						'default' => '',
						'desc'    => esc_attr__( 'Choose to hide the related product', 'apr-core' ),
					),
					array(
						'id'      => 'upsell_product',
						'label'   => esc_attr__( 'Hide Upsell Product', 'apr-core' ),
						'type'    => 'checkbox',
						'default' => '',
						'desc'    => esc_attr__( 'Choose to hide the upsell product', 'apr-core' ),
					),
				),
			),
			$this->general_option(),
			$this->skin_option(),
			$this->breadcrumbs_option(),
			$this->header_option(),
			$this->footer_option(),
		);

		return $meta_fields;
	}
}

if ( class_exists( 'Apr_Core_Product_Metabox' ) ) {
	new Apr_Core_Product_Metabox;
};

