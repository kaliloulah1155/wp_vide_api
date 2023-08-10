<?php
$section  = 'shop_single';
$priority = 1;
$prefix   = 'single_product_';
$registered_sidebars = Arangi_Helper::get_registered_sidebars();
$block_name = arangi_get_save_template();
arrowpress_customizer()->add_field(array(
	'type'        => 'color-alpha',
	'settings'    => 'single_bg',
	'label'       => esc_html__('Background Color Page', 'arangi'),
	'section'     => $section,
	'priority'    => $priority++,
	'default'     => '',
	'transport'   => 'auto',
	'output'      => array(
		array(
			'element'  => '
				.single-product .wrapper',
			'property' => 'background-color',
		),
	),
));
arrowpress_customizer()->add_field(array(
	'type'        => 'radio-buttonset',
	'settings'    => 'single_layout',
	'label'       => esc_html__('Single Layout', 'arangi'),
	'section'     => $section,
	'priority'    => $priority++,
	'default'     => 'full_width',
	'choices'     => array(
		'wide' => esc_html__('Wide', 'arangi'),
		'full_width'   => esc_html__('Full Width', 'arangi'),
		'boxed' => esc_html__('Boxed', 'arangi'),
	),
));
arrowpress_customizer()->add_field(array(
	'type'        => 'select',
	'settings'    => 'single_sidebar_left',
	'label'       => esc_html__('Sidebar Left', 'arangi'),
	'description' => esc_html__('Select sidebar left.', 'arangi'),
	'section'     => $section,
	'priority'    => $priority++,
	'default'     => '',
	'choices'     => $registered_sidebars,
));
arrowpress_customizer()->add_field(array(
	'type'        => 'select',
	'settings'    => 'single_sidebar_right',
	'label'       => esc_html__('Sidebar Right', 'arangi'),
	'description' => esc_html__('Select sidebar right.', 'arangi'),
	'section'     => $section,
	'priority'    => $priority++,
	'default'     => '',
	'choices'     => $registered_sidebars,
));
arrowpress_customizer()->add_field(array(
	'type'        => 'radio-buttonset',
	'settings'    => 'single_style',
	'label'       => esc_html__('Single Type', 'arangi'),
	'description' => esc_html__('Select single type', 'arangi'),
	'section'     => $section,
	'priority'    => $priority++,
	'default'     => 'single_1',
	'choices'     => array(
		'single_1' => esc_html__('Single 1', 'arangi'),
		'single_2' => esc_html__('Single 2', 'arangi'),
		'single_3' => esc_html__('Single 3', 'arangi'),
		'single_4' => esc_html__('Single 4', 'arangi'),
	),
));

arrowpress_customizer()->add_field(array(
	'type'        => 'radio-buttonset',
	'settings'    => 'single_ajax_cart',
	'label'       => esc_html__('Show/Hide Ajax Add To Cart', 'arangi'),
	'description' => esc_html__('Turn on to display ajax add to cart.', 'arangi'),
	'section'     => $section,
	'priority'    => $priority++,
	'default'     => '1',
	'choices'     => array(
		'0' => esc_html__('Off', 'arangi'),
		'1' => esc_html__('On', 'arangi'),
	),
));

arrowpress_customizer()->add_field(array(
	'type'        => 'text',
	'settings'    => 'single_product_prev',
	'label'       => esc_html__('Enter Name Button Prev', 'arangi'),
	'section'     => $section,
	'priority'    => $priority++,
	'default'     => esc_html__('Prev', 'arangi'),
	'required'  => array(
		array(
			'setting'  => 'single_style',
			'operator' => 'contains',
			'value'    => array('single_3', 'single_4'),
		),
	),
));

arrowpress_customizer()->add_field(array(
	'type'        => 'text',
	'settings'    => 'single_product_next',
	'label'       => esc_html__('Enter Name Button Next', 'arangi'),
	'section'     => $section,
	'priority'    => $priority++,
	'default'     => esc_html__('Next', 'arangi'),
	'required'  => array(
		array(
			'setting'  => 'single_style',
			'operator' => 'contains',
			'value'    => array('single_3', 'single_4'),
		),
	),
));

arrowpress_customizer()->add_field(array(
	'type'        => 'radio-buttonset',
	'settings'    => 'single_product_meta_enable',
	'label'       => esc_html__('Show/Hide Product Meta', 'arangi'),
	'description' => esc_html__('Turn on to display the product meta.', 'arangi'),
	'section'     => $section,
	'priority'    => $priority++,
	'default'     => '1',
	'choices'     => array(
		'0' => esc_html__('Off', 'arangi'),
		'1' => esc_html__('On', 'arangi'),
	),
));
arrowpress_customizer()->add_field(array(
	'type'        => 'multicheck',
	'settings'    => 'product_meta_multi',
	'label'       => esc_html__('Product Meta', 'arangi'),
	'section'     => $section,
	'priority'    => $priority++,
	'default'     => array('description', 'availability'),
	'choices'     => array(
		'availability' => esc_html__('Availability', 'arangi'),
		'sku' => esc_html__('SKU', 'arangi'),
		'categories' => esc_html__('Categories', 'arangi'),
		'tags' => esc_html__('Tags', 'arangi'),
		'brands' => esc_html__('Brands', 'arangi'),
		'description' => esc_html__('Quick Description', 'arangi')
	),
	'required'  => array(
		array(
			'setting'  => 'single_product_meta_enable',
			'operator' => '==',
			'value'    => 1,
		),
	),
));

arrowpress_customizer()->add_field(array(
	'type'        => 'radio-buttonset',
	'settings'    => 'show_single_delivery',
	'label'       => esc_html__('Show/Hide Delivery Popup', 'arangi'),
	'description' => esc_html__('Turn on to display the delivery popup.', 'arangi'),
	'section'     => $section,
	'priority'    => $priority++,
	'default'     => '1',
	'choices'     => array(
		'0' => esc_html__('Off', 'arangi'),
		'1' => esc_html__('On', 'arangi'),
	),
));
arrowpress_customizer()->add_field(array(
	'type'        => 'text',
	'settings'    => 'single_delivery_title',
	'label'       => esc_html__('Title', 'arangi'),
	'section'     => $section,
	'priority'    => $priority++,
	'default'     => esc_html__('Delivery & Return', 'arangi'),
	'required'  => array(
		array(
			'setting'  => 'show_single_delivery',
			'operator' => '==',
			'value'    => 1,
		),
	),
));
arrowpress_customizer()->add_field(array(
	'type'        => 'select',
	'settings'    => 'single_delivery',
	'label'       => esc_html__('Delivery Popup', 'arangi'),
	'description' => esc_html__('You can create templates in Templates -> Add New', 'arangi'),
	'section'     => $section,
	'priority'    => $priority++,
	'default'     => '',
	'choices'     => $block_name,
	'required'  => array(
		array(
			'setting'  => 'show_single_delivery',
			'operator' => '==',
			'value'    => 1,
		),
	),
));
arrowpress_customizer()->add_field(array(
	'type'        => 'number',
	'settings'    => 'per_limit',
	'label'       => esc_html__('Product Number', 'arangi'),
	'description' => esc_html__('Displayed Related, Upsell, Cross-sell Products.', 'arangi'),
	'section'     => $section,
	'priority'    => $priority++,
	'default'     => '4',
));
arrowpress_customizer()->add_field(array(
	'type'        => 'radio-buttonset',
	'settings'    => 'single_product_sharing_enable',
	'label'       => esc_html__('Product sharing', 'arangi'),
	'description' => esc_html__('Turn on to display the product sharing.', 'arangi'),
	'section'     => $section,
	'priority'    => $priority++,
	'default'     => '0',
	'choices'     => array(
		'0' => esc_html__('Off', 'arangi'),
		'1' => esc_html__('On', 'arangi'),
	),
));
arrowpress_customizer()->add_field(array(
	'type'        => 'multicheck',
	'settings'    => 'single_product_sharing_multi',
	'label'       => esc_html__('Product Socials', 'arangi'),
	'section'     => $section,
	'priority'    => $priority++,
	'default'     => array('fb', 'tw', 'gg', 'pin'),
	'choices'     => array(
		'fb' => esc_html__('Facebook', 'arangi'),
		'tw' => esc_html__('Twitter', 'arangi'),
		'gg' => esc_html__('Google Plus', 'arangi'),
		'pin' => esc_html__('Pinterest', 'arangi'),
	),
	'required'  => array(
		array(
			'setting'  => 'single_product_sharing_enable',
			'operator' => '==',
			'value'    => 1,
		),
	),
));
arrowpress_customizer()->add_field(array(
	'type'        => 'radio-buttonset',
	'settings'    => 'single_product_related_enable',
	'label'       => esc_html__('Related products', 'arangi'),
	'description' => esc_html__('Turn on to display the related products section.', 'arangi'),
	'section'     => $section,
	'priority'    => $priority++,
	'default'     => '0',
	'choices'     => array(
		'1' => esc_html__('Off', 'arangi'),
		'0' => esc_html__('On', 'arangi'),
	),
));

arrowpress_customizer()->add_field(array(
	'type'        => 'number',
	'settings'    => 'related_limit',
	'label'       => esc_html__('Related Products Limit', 'arangi'),
	'section'     => $section,
	'priority'    => $priority++,
	'default'     => '4',
	'required'  => array(
		array(
			'setting'  => 'single_product_related_enable',
			'operator' => '==',
			'value'    => 0,
		),
	),
));

arrowpress_customizer()->add_field(array(
	'type'        => 'radio-buttonset',
	'settings'    => 'single_product_up_sells_enable',
	'label'       => esc_html__('Up-sells products', 'arangi'),
	'description' => esc_html__('Turn on to display the up-sells products section.', 'arangi'),
	'section'     => $section,
	'priority'    => $priority++,
	'default'     => '0',
	'choices'     => array(
		'1' => esc_html__('Off', 'arangi'),
		'0' => esc_html__('On', 'arangi'),
	),
));

arrowpress_customizer()->add_field(array(
	'type'        => 'number',
	'settings'    => 'upsell_limit',
	'label'       => esc_html__('Up-sells Products Limit', 'arangi'),
	'section'     => $section,
	'priority'    => $priority++,
	'default'     => '4',
	'required'  => array(
		array(
			'setting'  => 'single_product_up_sells_enable',
			'operator' => '==',
			'value'    => 0,
		),
	),
));

arrowpress_customizer()->add_field(array(
	'type'     => 'text',
	'settings' => 'related_title',
	'label'    => esc_html__('Title Related Products', 'arangi'),
	'section'  => $section,
	'priority' => $priority++,
	'required'  => array(
		array(
			'setting'  => 'single_product_related_enable',
			'operator' => '==',
			'value'    => 0,
		),
	),
	'default' => wp_kses(
		__('Related Products', 'arangi'),
		array(
			'a' => array(
				'href' => array(),
				'title' => array(),
				'target' => array(),
			),
			'p' => array('class' => array()),
			'br' => array(),
			'i' => array(
				'class' => array(),
				'aria-hidden' => array(),
			),
		)
	),

));
arrowpress_customizer()->add_field(array(
	'type'     => 'text',
	'settings' => 'upsel_title',
	'label'    => esc_html__('Title Upsel Products', 'arangi'),
	'section'  => $section,
	'priority' => $priority++,
	'required'  => array(
		array(
			'setting'  => 'single_product_up_sells_enable',
			'operator' => '==',
			'value'    => 0,
		),
	),
	'default' => wp_kses(
		__('May you like also', 'arangi'),
		array(
			'a' => array(
				'href' => array(),
				'title' => array(),
				'target' => array(),
			),
			'p' => array('class' => array()),
			'br' => array(),
			'i' => array(
				'class' => array(),
				'aria-hidden' => array(),
			),
		)
	),

));
arrowpress_customizer()->add_field(array(
	'type'     => 'textarea',
	'settings' => 'single_after_title',
	'label'    => esc_html__('After title.', 'arangi'),
	'section'  => $section,
	'priority' => $priority++,
	'default' => wp_kses(
		__('Arangi', 'arangi'),
		array(
			'a' => array(
				'href' => array(),
				'title' => array(),
				'target' => array(),
			),
			'p' => array('class' => array()),
			'br' => array(),
			'i' => array(
				'class' => array(),
				'aria-hidden' => array(),
			),
		)
	),
));

arrowpress_customizer()->add_field(array(
	'type'     => 'custom',
	'settings' => $prefix . 'single_product_' . $priority++,
	'section'  => $section,
	'priority' => $priority++,
	'default'  => '<div class="big_title">' . esc_html__('Product Tab', 'arangi') . '</div>',
));

arrowpress_customizer()->add_field(array(
	'type'        => 'toggle',
	'settings'    => 'single_product_desc',
	'label'       => esc_html__('Remove Details Tab', 'arangi'),
	'section'     => $section,
	'priority'    => $priority++,
	'default'     => 0
));

arrowpress_customizer()->add_field(array(
	'type'        => 'toggle',
	'settings'    => 'single_product_review',
	'label'       => esc_html__('Remove Reviews Tab', 'arangi'),
	'section'     => $section,
	'priority'    => $priority++,
	'default'     => 0
));

arrowpress_customizer()->add_field(array(
	'type'        => 'toggle',
	'settings'    => 'single_product_info',
	'label'       => esc_html__('Remove Information Tab', 'arangi'),
	'section'     => $section,
	'priority'    => $priority++,
	'default'     => 0
));

arrowpress_customizer()->add_field(array(
	'type'        => 'toggle',
	'settings'    => 'single_product_tag',
	'label'       => esc_html__('Remove Tag Tab', 'arangi'),
	'section'     => $section,
	'priority'    => $priority++,
	'default'     => 0
));

arrowpress_customizer()->add_field(array(
	'type'        => 'text',
	'settings'    => 'single_product_rename_desc',
	'label'       => esc_html__('Rename Details Tab', 'arangi'),
	'section'     => $section,
	'priority'    => $priority++,
	'default'     => esc_html__('Details', 'arangi'),
));

arrowpress_customizer()->add_field(array(
	'type'        => 'text',
	'settings'    => 'single_product_rename_review',
	'label'       => esc_html__('Rename Review Tab', 'arangi'),
	'section'     => $section,
	'priority'    => $priority++,
	'default'     => esc_html__('Reviews', 'arangi'),
));


arrowpress_customizer()->add_field(array(
	'type'        => 'text',
	'settings'    => 'single_product_rename_info',
	'label'       => esc_html__('Rename Information Tab', 'arangi'),
	'section'     => $section,
	'priority'    => $priority++,
	'default'     => esc_html__('Information', 'arangi'),
));

arrowpress_customizer()->add_field(array(
	'type'        => 'text',
	'settings'    => 'single_product_rename_tag',
	'label'       => esc_html__('Rename Tag Tab', 'arangi'),
	'section'     => $section,
	'priority'    => $priority++,
	'default'     => esc_html__('Tags', 'arangi'),
));
