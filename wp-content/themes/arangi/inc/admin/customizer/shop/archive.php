<?php
$section  = 'shop_archive';
$priority = 1;
$prefix   = 'shop_archive_';
$registered_sidebars = Arangi_Helper::get_registered_sidebars();
arrowpress_customizer() ->add_field(   array(
	'type'     => 'custom',
	'settings' => $prefix . 'group_title_' . $priority ++,
	'section'  => $section,
	'priority' => $priority ++,
	'default'  => '<div class="big_title">' . esc_html__( 'General', 'arangi' ) . '</div>',
) );
arrowpress_customizer() ->add_field(   array(
    'type'        => 'radio-buttonset',
    'settings'    => 'shop_layout',
    'label'       => esc_html__( 'Shop Layout', 'arangi' ),
    'section'     => $section,
    'priority'    => $priority ++,
    'default'     => 'full_width',
    'choices'     => array(
        'wide' => esc_html__( 'Wide', 'arangi' ),
        'full_width'   => esc_html__( 'Full Width', 'arangi' ),
        'boxed' => esc_html__( 'Boxed', 'arangi' ),
    ),
) );
arrowpress_customizer() ->add_field(   array(
    'type'        => 'select',
    'settings'    => 'shop_sidebar_left',
    'label'       => esc_html__( 'Sidebar Left', 'arangi' ),
    'description' => esc_html__( 'Select sidebar left.', 'arangi' ),
    'section'     => $section,
    'priority'    => $priority ++,
    'default'     => '',
    'choices'     => $registered_sidebars,
) );
arrowpress_customizer() ->add_field(   array(
    'type'        => 'select',
    'settings'    => 'shop_sidebar_right',
    'label'       => esc_html__( 'Sidebar Right', 'arangi' ),
    'description' => esc_html__( 'Select sidebar right.', 'arangi' ),
    'section'     => $section,
    'priority'    => $priority ++,
    'default'     => '',
    'choices'     => $registered_sidebars,
) );
arrowpress_customizer() ->add_field(   array(
	'type'     => 'custom',
	'settings' => $prefix . 'group_title_' . $priority ++,
	'section'  => $section,
	'priority' => $priority ++,
	'default'  => '<div class="big_title">' . esc_html__( 'Toolbar', 'arangi' ) . '</div>',
) );
arrowpress_customizer() ->add_field(   array(
	'type'        => 'toggle',
	'settings'    => 'shop_archive_toolbar',
	'label'       => esc_html__( 'Show/Hide Toolbar', 'arangi' ),
	'description' => esc_html__( 'Turn on to show toolbar', 'arangi' ),
	'section'     => $section,
	'priority'    => $priority ++,
	'default'     => 1,
) );
arrowpress_customizer() ->add_field(   array(
	'type'        => 'toggle',
	'settings'    => 'shop_archive_left_toolbar',
	'label'       => esc_html__( 'Show/Hide Left Toolbar', 'arangi' ),
	'description' => esc_html__( 'Turn on to show left toolbar', 'arangi' ),
	'section'     => $section,
	'priority'    => $priority ++,
	'default'     => 1,
	'required'  => array(
        array(
            'setting'  => 'shop_archive_toolbar',
            'operator' => '==',
            'value'    => 1,
        ),
    ), 
) );
arrowpress_customizer() ->add_field(   array(
	'type'        => 'toggle',
	'settings'    => 'shop_archive_right_toolbar',
	'label'       => esc_html__( 'Show/Hide Right Toolbar', 'arangi' ),
	'description' => esc_html__( 'Turn on to show right toolbar', 'arangi' ),
	'section'     => $section,
	'priority'    => $priority ++,
	'default'     => 1,
	'required'  => array(
        array(
            'setting'  => 'shop_archive_toolbar',
            'operator' => '==',
            'value'    => 1,
        ),
    ), 
) );
arrowpress_customizer() ->add_field(   array(
	'type'        => 'toggle',
	'settings'    => 'shop_archive_catalog_ordering',
	'label'       => esc_html__( 'Show/Hide Catalog Ordering', 'arangi' ),
	'section'     => $section,
	'priority'    => $priority ++,
	'default'     => 1,
	'required'  => array(
        array(
            'setting'  => 'shop_archive_toolbar',
            'operator' => '==',
            'value'    => 1,
        ),
		array(
            'setting'  => 'shop_archive_right_toolbar',
            'operator' => '==',
            'value'    => 1,
        ),
    ), 
) );
arrowpress_customizer() ->add_field(   array(
	'type'        => 'toggle',
	'settings'    => 'shop_archive_view',
	'label'       => esc_html__( 'Show/Hide Grid-List View', 'arangi' ),
	'section'     => $section,
	'priority'    => $priority ++,
	'default'     => 1,
	'required'  => array(
        array(
            'setting'  => 'shop_archive_toolbar',
            'operator' => '==',
            'value'    => 1,
        ),
		array(
            'setting'  => 'shop_archive_right_toolbar',
            'operator' => '==',
            'value'    => 1,
        ),
    ), 
) );
arrowpress_customizer() ->add_field(   array(
    'type'        => 'radio-buttonset',
    'settings'    => 'product_layouts',
    'label'       => esc_html__( 'Product Layouts', 'arangi' ),
    'section'     => $section,
    'priority'    => $priority ++,
    'default'     => 'grid_list',
    'choices'     => array(
        'grid' => esc_html__( 'Grid', 'arangi' ),
        'list'   => esc_html__( 'List', 'arangi' ),
        'grid_list' => esc_html__( 'Grid(default) / List', 'arangi' ),
        'list_grid' => esc_html__( 'List(default) / Grid', 'arangi' ),
    ),
) );
arrowpress_customizer() ->add_field(   array(
    'type'        => 'radio-buttonset',
    'settings'    => 'product_column',
    'label'       => esc_html__( 'Product Column', 'arangi' ),
    'description' => esc_html__( 'Option 4 col, 5 col, 6 col not for cases where the page has 2 sidebar (left and right); Option 6 col not for cases where the page has sidebar left or right.', 'arangi' ),
    'section'     => $section,
    'priority'    => $priority ++,
    'default'     => '3',
    'choices'     => array(
        '2' => esc_html__( '2', 'arangi' ),
        '3' => esc_html__( '3', 'arangi' ),
        '4' => esc_html__( '4', 'arangi' ),
        '5' => esc_html__( '5', 'arangi' ),
        '6' => esc_html__( '6', 'arangi' ),
    ),
	'required'  => array(
        array(
            'setting'  => 'product_layouts',
            'operator' => 'contains',
            'value'    => array('grid', 'grid_list'),
        ),
    ), 
) );
arrowpress_customizer() ->add_field(   array(
	'type'        => 'number',
	'settings'    => 'shop_archive_number_item',
	'label'       => esc_html__( 'Number items', 'arangi' ),
    'description' => esc_html__( 'Controls the number of products display on shop archive page', 'arangi' ),
	'section'     => $section,
	'priority'    => $priority ++,
	'default'     => 9,
	'choices'     => array(
		'min'  => 1,
		'max'  => 30,
		'step' => 1,
	),
) );
arrowpress_customizer() ->add_field(   array(
	'type'        => 'number',
	'settings'    => 'limit_title',
	'label'       => esc_html__( 'Limit title product', 'arangi' ),
    'description' => esc_html__( 'Restricting the number of display titles to title', 'arangi' ),
	'section'     => $section,
	'priority'    => $priority ++,
	'default'     => 35,
	'choices'     => array(
		'min'  => 1,
		'max'  => 150,
		'step' => 1,
	),
) );
arrowpress_customizer() ->add_field(   array(
    'type'        => 'toggle',
    'settings'    => 'custom_size_product_image',
    'label'       => esc_html__( 'Show/Hide Custom Product Image', 'arangi' ),
    'section'     => $section,
    'priority'    => $priority ++,
    'default'     => 0,
) );
arrowpress_customizer() ->add_field(   array(
    'type'        => 'number',
    'settings'    => 'product_image_width',
    'label'       => esc_html__( 'Product Image Width (Required)', 'arangi' ),
    'section'     => $section,
    'priority'    => $priority ++,
    'default'     => 444,
    'choices'     => array(
        'min'  => 1,
        'max'  => 1000,
        'step' => 1,
    ),
    'required'  => array(
        array(
            'setting'  => 'custom_size_product_image',
            'operator' => '==',
            'value'    => 1,
        ),
    ), 
) );
arrowpress_customizer() ->add_field(   array(
    'type'        => 'number',
    'settings'    => 'product_image_height',
    'label'       => esc_html__( 'Product Image Height (Required)', 'arangi' ),
    'section'     => $section,
    'priority'    => $priority ++,
    'default'     => 370,
    'choices'     => array(
        'min'  => 1,
        'max'  => 1000,
        'step' => 1,
    ),
    'required'  => array(
        array(
            'setting'  => 'custom_size_product_image',
            'operator' => '==',
            'value'    => 1,
        ),
    ), 
) );