<?php 
$section  = 'header_layout_1';
$priority = 1;
$prefix   = 'header_layout_1_';

arrowpress_customizer() ->add_field(   array(
    'type'     => 'image',
    'settings' => 'image-header-1',
    'section'  => $section,
    'priority' => $priority ++,
    'transport' => 'auto',
    'default'  => ARANGI_THEME_URI . '/assets/images/header/header-1.jpg',
) );
/*--------------------------------------------------------------
# Top header
--------------------------------------------------------------*/
arrowpress_customizer() ->add_field(   array(
    'type'     => 'custom',
    'settings' => $prefix . 'group_title_' . $priority ++,
    'section'  => $section,
    'priority' => $priority ++,
    'default'  => '<div class="big_title">' . esc_html__( 'Top Header', 'arangi' ) . '</div>',
) );
arrowpress_customizer() ->add_field(   array(
	'type'        => 'color',
	'settings'    => $prefix . 'header_bg',
	'label'       => esc_html__( 'Background Color', 'arangi' ),
	'description' => esc_html__( 'Controls the background color for header.', 'arangi' ),
	'section'     => $section,
	'priority'    => $priority ++,
	'transport'   => 'auto',
	'default'     => '#fff',
	'output'      => array(
		array(
			'element'  => '.site-header.header-01',
			'property' => 'background-color',
		),
	),
) );
arrowpress_customizer() ->add_field(   array(
	'type'     => 'radio-buttonset',
	'settings' => 'header_bg_cf',
	'label'    => esc_html__( 'Show/Hide Header Background Image.', 'arangi' ),
	'description' => esc_html__( 'Option header fixed.', 'arangi' ),
	'section'  => $section,
	'priority' => $priority ++,
	'default'  => '0',
	'choices'  => array(
		'0' => esc_html__( 'No', 'arangi' ),
		'1' => esc_html__( 'Yes', 'arangi' ),
	),
) );
//Background image
arrowpress_customizer() ->add_field(   array(
	'type'        => 'background',
	'settings'    => $prefix . 'image_setting_array',
	'section'     => $section,
	'priority'    => $priority ++,
	'default'     => array(
		'background-color'      => '',
		'background-image'      => '',
		'background-repeat'     => 'repeat',
		'background-position'   => 'center center',
		'background-size'       => 'cover',
		'background-attachment' => 'scroll',
	),
	'output'      => array(
		array(
			'element'  => '.site-header.header-01',
		),
	),
	'required'  => array(
        array(
            'setting'  => 'header_bg_cf',
            'operator' => '==',
            'value'    => 1,
        ),
    ), 
) );
//Background overlay color
arrowpress_customizer() ->add_field(   array(
	'type'        => 'color',
	'settings'    => $prefix . 'overlay_color',
	'label'       => esc_html__( 'Background', 'arangi' ),
	'description' => esc_html__( 'Header Background Overlay Color', 'arangi' ),
	'section'     => $section,
	'priority'    => $priority ++,
	'transport'   => 'auto',
	'default' => '#ffffff',
	'output'      => array(
		array(
			'element'  => '.site-header.header-01:before',
			'property' => 'background',
		),
	),
	'required'  => array(
        array(
            'setting'  => 'header_bg_cf',
            'operator' => '==',
            'value'    => 1,
        ),
    ), 
) );
// Header opacity
arrowpress_customizer() ->add_field(   array(
	'type'     => 'text',
	'settings' => 'opacity',
	'label'    => __( 'Enter height for header opacity.', 'arangi' ),
	'section'  => $section,
	'default'  => esc_attr__( '0', 'arangi' ),
	'priority' => $priority ++,
	'output'   => array(
		array(
			'element'  => '.site-header.header-01:before',
			'property' => 'opacity',
		),
	),
	'required'  => array(
        array(
            'setting'  => 'header_bg_cf',
            'operator' => '==',
            'value'    => 1,
        ),
    ), 
) );


//height for middle
arrowpress_customizer() ->add_field(   array(
	'type'        => 'dimension',
	'settings'    => 'height',
	'label'       => esc_attr__( 'Height for top header', 'arangi' ),
	'description' => esc_attr__( 'Enter height with unit', 'arangi' ),
	'section'     => $section,
	'priority' => $priority ++,
	'default'     => '110px',
	'output'    => array(
		array(
			'element'  => array(
				'.header-01:not(.is-sticky) .header-content .logo, 
				.header-01:not(.is-sticky) .header-content .mega-menu > li,
				.header-01:not(.is-sticky) .header-content .cont,
				 .header-01:not(.is-sticky) .header-middle .menu-icon,
				 .header-01:not(.is-sticky) .header-content .header-menu',
			),
			'property' => 'height',
			'media_query' => '@media (min-width: 992px)'
		),
	),
) );
// Show Contact
arrowpress_customizer() ->add_field(   array(
    'type'        => 'toggle',
    'settings'    => 'show_header_contact',
    'label'       => esc_html__( 'Show Contact', 'arangi' ),
    'description' => esc_html__( 'Turn on to show Contact.', 'arangi' ),
    'section'     => $section,
    'priority'    => $priority ++,
    'default'     => '',
) );
arrowpress_customizer() ->add_field(   array(
    'type'     => 'text',
    'settings' => 'icon_contact',
    'label'    => esc_html__( 'Enter Contact icon class', 'arangi' ),
    'section'  => $section,
    'default'  => esc_attr__( 'ti-headphone-alt', 'arangi' ),
    'priority' => $priority ++,
    'required'  => array(
        array(
            'setting'  => 'show_header_contact',
            'operator' => '==',
            'value'    => 1,
        ),
    ),
) );

/*--------------------------------------------------------------
# Header Menu
--------------------------------------------------------------*/
arrowpress_customizer() ->add_field(   array(
    'type'     => 'custom',
    'settings' => $prefix . 'header_01_menu',
    'section'  => $section,
    'priority' => $priority ++,
    'default'  => '<div class="big_title">' . esc_html__( 'Header Menu', 'arangi' ) . '</div>',
) );

arrowpress_customizer() ->add_field(   array(
    'type'        => 'slider',
    'settings'    => $prefix . 'navigation_item_font_size',
    'label'       => esc_html__( 'Font Size', 'arangi' ),
    'description' => esc_html__( 'Controls the font size for main menu items.', 'arangi' ),
    'section'     => $section,
    'priority'    => $priority ++,
    'default'     => 15,
    'transport'   => 'auto',
    'choices'     => array(
        'min'  => 10,
        'max'  => 30,
        'step' => 1,
    ),
    'output'      => array(
        array(
            'element'  => '.header-01 .mega-menu > li > a',
            'property' => 'font-size',
            'units'    => 'px',
            'suffix'   => ' !important',
        ),
    ),
) );
arrowpress_customizer() ->add_field(   array(
    'type'        => 'color',
    'settings'    => $prefix . 'navigation_link_color',
    'label'       => esc_html__( 'Color', 'arangi' ),
    'description' => esc_html__( 'Controls the color for bottom header', 'arangi' ),
    'section'     => $section,
    'priority'    => $priority ++,
    'transport'   => 'auto',
    'default'     => '',
    'output'      => array(
        array(
            'element'  => '.header-01 .mega-menu > li > a',
            'property' => 'color',
            'media_query' => '@media (min-width: 992px)'
        ),
    ),
) );
arrowpress_customizer() ->add_field(   array(
    'type'        => 'color',
    'settings'    => $prefix . 'navigation_link_hover_color',
    'label'       => esc_html__( 'Hover Color', 'arangi' ),
    'description' => esc_html__( 'Controls the color when hover for main menu items.', 'arangi' ),
    'section'     => $section,
    'priority'    => $priority ++,
    'transport'   => 'auto',
    'default'     => '',
    'output'      => array(
        array(
            'element'  => '
            .header-01 .mega-menu li a:focus, 
            .header-01 .mega-menu li a:hover',
            'property' => 'color',
        ),
    ),
) );

//Menu styling
arrowpress_customizer() ->add_field(   array(
    'type'        => 'typography',
    'settings'    => $prefix . 'nav_typography',
    'label'       => esc_html__( 'Typography', 'arangi' ),
    'description' => esc_html__( 'These settings control the typography for menu items.', 'arangi' ),
    'section'     => $section,
    'priority'    => $priority ++,
    'transport'   => 'auto',
    'default'     => array(
        'font-family'    => '',
        'variant'        => '',
        'line-height'    => '',
        'letter-spacing' => '',
        'text-transform' => '',
    ),
    'output'      => array(
        array(
            'element' => '.header-01 .mega-menu > li > a',
        ),
    ),
) );


arrowpress_customizer() ->add_field(   array(
    'type'      => 'spacing',
    'settings'  => $prefix . 'navigation_1_item_padding',
    'label'     => esc_html__( 'Menu Padding', 'arangi' ),
    'section'   => $section,
    'priority'  => $priority ++,
    'default'   => array(
		'top'    => '',
        'bottom' => '',
        'left'   => '',
        'right'  => '',
    ),
    'transport' => 'auto',
    'output'    => array(
        array(
            'element'  => array(
                '.header-01 .header-content .mega-menu > li > a',
            ),
            'property' => 'padding',
        ),
    ),
) );
/*--------------------------------------------------------------
# Header Bottom
--------------------------------------------------------------*/
arrowpress_customizer() ->add_field(   array(
	'type'     => 'custom',
	'settings' => $prefix . 'group_title_' . $priority ++,
	'section'  => $section,
	'priority' => $priority ++,
	'default'  => '<div class="big_title">' . esc_html__( 'Bottom Header', 'arangi' ) . '</div>',
) );

//Height for header bottom
arrowpress_customizer() ->add_field(   array(
	'type'        => 'dimension',
	'settings'    => 'height_bottom',
	'label'       => esc_attr__( 'Height for header bottom', 'arangi' ),
	'description' => esc_attr__( 'Enter height with unit', 'arangi' ),
	'section'     => $section,
	'priority' => $priority ++,
	'default'     => '70px',
	'output'    => array(
		array(
			'element'  => array(
				'.header-01 .header-bottom',
			),
			'property' => 'height',
			'media_query' => '@media (min-width: 992px)'
		),
	),
) );

//header icon color
arrowpress_customizer() ->add_field(   array(
    'type'        => 'color',
    'settings'    => $prefix . 'icon_color',
    'label'       => esc_html__( 'Icon Color', 'arangi' ),
    'description' => esc_html__( 'Controls the color header.', 'arangi' ),
    'section'     => $section,
    'priority'    => $priority ++,
    'transport'   => 'auto',
    'default'     => '#ffffff',
    'output'      => array(
        array(
            'element'  => '.header-01 .box-header-info .cart-header,
						   .header-01 .box-header-info .account-header > a, 
						   .header-01 .box-header-info .favorite a, 
						   .header-01 .box-header-info .search-header',
            'property' => 'color',
        ),
    ),
) );
//header icon color hover
arrowpress_customizer() ->add_field(   array(
    'type'        => 'color',
    'settings'    => $prefix . 'icon_color_hover',
    'label'       => esc_html__( 'Icon Hover Color', 'arangi' ),
    'description' => esc_html__( 'Controls the hover color header.', 'arangi' ),
    'section'     => $section,
    'priority'    => $priority ++,
    'transport'   => 'auto',
    'default'     => '#000000',
    'output'      => array(
        array(
            'element'  => '.header-01 .cart-header .text-header:hover,
                           .header-01 .box-label:hover,
						   .header-01 .account-header a:hover, 
						   .header-01 .favorite a:hover, 
						   .header-01 .search-header:hover',
            'property' => 'color',
        ),
    ),
) );
//Background color
arrowpress_customizer() ->add_field(   array(
	'type'        => 'color',
	'settings'    => $prefix . 'background_color_bottom',
	'label'       => esc_html__( 'Background Color:', 'arangi' ),
	'description' => esc_html__( 'Controls the color for bottom header.', 'arangi' ),
	'section'     => $section,
	'priority'    => $priority ++,
	'transport'   => 'auto',
	'default'     => "",
	'output'      => array(
		array(
			'element'  => '.header-01 .header-bottom',
			'property' => 'background-color',
		),
	),
) );

// Show search
arrowpress_customizer() ->add_field(   array(
    'type'        => 'toggle',
    'settings'    => 'show_search',
    'label'       => esc_html__( 'Show Search', 'arangi' ),
    'description' => esc_html__( 'Turn on to show search.', 'arangi' ),
    'section'     => $section,
    'priority'    => $priority ++,
    'default'     => 1,
) );

arrowpress_customizer() ->add_field(   array(
    'type'        => 'toggle',
    'settings'    => 'show_search_category',
    'label'       => esc_html__( 'Show Search Categories', 'arangi' ),
    'description' => esc_html__( 'Turn on to show search categories.', 'arangi' ),
    'section'     => $section,
    'priority'    => $priority ++,
    'default'     => 1,
    'required'  => array(
        array(
            'setting'  => 'show_search',
            'operator' => '==',
            'value'    => 1,
        ),
    ),
) );

arrowpress_customizer() ->add_field(   array(
    'type'        => 'slider',
    'settings'    => $prefix . 'font_size_search',
    'label'       => esc_html__( 'Font Size', 'arangi' ),
    'description' => esc_html__( 'Controls the font size search box', 'arangi' ),
    'section'     => $section,
    'priority'    => $priority ++,
    'default'     => 14,
    'transport'   => 'auto',
    'choices'     => array(
        'min'  => 10,
        'max'  => 16,
        'step' => 1,
    ),
    'output'      => array(
        array(
            'element'  => '.header-01 .header-search .pro_cat_select, .header-01 .header-search .pro_cat_select option, .header-01 .product-search::placeholder',
            'property' => 'font-size',
            'units'    => 'px',
        ),
    ),
    'required'  => array(
        array(
            'setting'  => 'show_search',
            'operator' => '==',
            'value'    => 1,
        ),
    ),
) );

//Color and fontsize of search box
arrowpress_customizer() ->add_field(   array(
    'type'        => 'color',
    'settings'    => $prefix . 'color_search',
    'label'       => esc_html__( 'Color', 'arangi' ),
    'description' => esc_html__( 'Controls the color for search box.', 'arangi' ),
    'section'     => $section,
    'priority'    => $priority ++,
    'transport'   => 'auto',
    'default'     => '#ffffff',
    'output'      => array(
        array(
            'element'  => '.header-01 .header-search .pro_cat_select, 
			.header-01 .header-search .search-form .product-search,
			.header-01 .header-search .search-form .product-search::placeholder',
            'property' => 'color',
        ),
    ),
    'required'  => array(
        array(
            'setting'  => 'show_search',
            'operator' => '==',
            'value'    => 1,
        ),
    ),
) );

//Show My Account
arrowpress_customizer() ->add_field(   array(
    'type'        => 'toggle',
    'settings'    => 'show_settings',
    'label'       => esc_html__( 'Show My Account', 'arangi' ),
    'description' => esc_html__( 'Turn on to show my account.', 'arangi' ),
    'section'     => $section,
    'priority'    => $priority ++,
    'default'     => 1,
) );
arrowpress_customizer() ->add_field(   array(
    'type'     => 'text',
    'settings' => 'icon_settings',
    'label'    => esc_html__( 'Enter my account icon class', 'arangi' ),
    'section'  => $section,
    'default'  => esc_attr__( 'ti-user', 'arangi' ),
    'priority' => $priority ++,
    'required'  => array(
        array(
            'setting'  => 'show_settings',
            'operator' => '==',
            'value'    => 1,
        ),
    ),
) );

// Show Favorite
arrowpress_customizer() ->add_field(   array(
    'type'        => 'toggle',
    'settings'    => 'show_favorite',
    'label'       => esc_html__( 'Show Favorite', 'arangi' ),
    'description' => esc_html__( 'Turn on to show favorite.', 'arangi' ),
    'section'     => $section,
    'priority'    => $priority ++,
    'default'     => 1,
) );

// Show minicart
arrowpress_customizer() ->add_field(   array(
    'type'        => 'toggle',
    'settings'    => 'show_mini_cart',
    'label'       => esc_html__( 'Show Mini Cart', 'arangi' ),
    'description' => esc_html__( 'Turn on to show mini cart.', 'arangi' ),
    'section'     => $section,
    'priority'    => $priority ++,
    'default'     => 1,
) );
arrowpress_customizer() ->add_field(   array(
    'type'     => 'text',
    'settings' => 'icon_cart',
    'label'    => esc_html__( 'Enter cart icon class', 'arangi' ),
    'section'  => $section,
    'default'  => esc_attr__( 'ti-shopping-cart', 'arangi' ),
    'priority' => $priority ++,
    'required'  => array(
        array(
            'setting'  => 'show_mini_cart',
            'operator' => '==',
            'value'    => 1,
        ),
    ),
) );

// Show minicart
arrowpress_customizer() ->add_field(   array(
    'type'        => 'toggle',
    'settings'    => 'show_lang_switcher_1',
    'label'       => esc_html__( 'Show Language Switcher', 'arangi' ),
    'description' => esc_html__( 'Turn on to Language Switcher', 'arangi' ),
    'section'     => $section,
    'priority'    => $priority ++,
    'default'     => 0,
) );