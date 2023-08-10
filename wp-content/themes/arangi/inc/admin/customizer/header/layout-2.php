<?php 
$section  = 'header_layout_2';
$priority = 1;
$prefix   = 'header_layout_2_';

arrowpress_customizer() ->add_field(   array(
    'type'     => 'image',
    'settings' => 'image-header-2',
    'section'  => $section,
    'priority' => $priority ++,
    'transport' => 'auto',
    'default'  => ARANGI_THEME_URI . '/assets/images/header/header-2.png',
) );
/*--------------------------------------------------------------
# Middle header
--------------------------------------------------------------*/
arrowpress_customizer() ->add_field(   array(
    'type'     => 'custom',
    'settings' => $prefix . 'group_title_' . $priority ++. "_2",
    'section'  => $section,
    'priority' => $priority ++,
    'default'  => '<div class="big_title">' . esc_html__( 'Header', 'arangi' ) . '</div>',
) );

arrowpress_customizer() ->add_field(   array(
    'type'     => 'image',
    'settings' => 'logo_2',
    'label'    => esc_html__( 'Logo', 'arangi' ),
    'description' => esc_html__('Select an image file for your logo','arangi'),
    'section'  => $section,
    'priority' => $priority ++,
    'transport' => 'auto',
    'default'  => ARANGI_THEME_URI . '/assets/images/logo.png',
) );

//Background Color
arrowpress_customizer() ->add_field(   array(
	'type'        => 'color',
	'settings'    => $prefix . 'bg',
	'label'       => esc_html__( 'Background Color', 'arangi' ),
	'description' => esc_html__( 'Controls the background color for header.', 'arangi' ),
	'section'     => $section,
	'priority'    => $priority ++,
	'transport'   => 'auto',
	'default'     => '',
	'output'      => array(
		array(
			'element'  => '.header-02',
			'property' => 'background-color',
		),
	),
) );
arrowpress_customizer() ->add_field(   array(
	'type'     => 'radio-buttonset',
	'settings' => $prefix . 'bg_img',
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
			'element'  => '.site-header.header-02',
		),
	),
	'required'  => array(
        array(
            'setting'  => 'header_layout_2_bg_img',
            'operator' => '==',
            'value'    => 1,
        ),
    ), 
) );
//background overlay color
arrowpress_customizer() ->add_field(   array(
	'type'        => 'color',
	'settings'    => $prefix . 'overlay_color_2',
	'label'       => esc_html__( 'Background', 'arangi' ),
	'description' => esc_html__( 'Header Background Overlay Color', 'arangi' ),
	'section'     => $section,
	'priority'    => $priority ++,
	'default'	  => '',
	'transport'   => 'auto',
	'output'      => array(
		array(
			'element'  => '.header-02:before',
			'property' => 'background-color',
		),
	),
	'required'  => array(
        array(
            'setting'  => 'header_layout_2_bg_img',
            'operator' => '==',
            'value'    => 1,
        ),
    ), 
) );
//logo width + height
arrowpress_customizer() ->add_field(   array(
	'type'        => 'dimension',
	'settings'    => 'logo_height_2',
	'label'       => esc_attr__( 'Header Height', 'arangi' ),
	'description' => esc_attr__( 'Enter height with unit', 'arangi' ),
	'section'     => $section,
	'priority' => $priority ++,
	'default'     => '132px',
	'output'    => array(
		array(
			'element'  => array(
				'.header-02:not(.is-sticky) .logo,
				.header-02:not(.is-sticky) .header-right,
				.header-02:not(.is-sticky) .header-menu .mega-menu > li',
			),
			'property' => 'height',
			'media_query' => '@media (min-width: 992px)'
		),
	),
) );
// Show search
arrowpress_customizer() ->add_field(   array(
	'type'        => 'toggle',
	'settings'    => 'show_search_2',
	'label'       => esc_html__( 'Show Search', 'arangi' ),
	'description' => esc_html__( 'Turn on to show search.', 'arangi' ),
	'section'     => $section,
	'priority'    => $priority ++,
	'default'     => 1,
) );
arrowpress_customizer() ->add_field(   array(
	'type'     => 'text',
	'settings' => 'icon_search_2',
	'label'    => __( 'Enter Search Class', 'arangi' ),
	'description' => esc_html__( 'Add icon class you want here. You can find a lot of icons in these links Awesome icon or Linearicons , Pe stroke icon7', 'arangi' ),
	'section'  => $section,
	'default'  => esc_attr__( 'ti-search', 'arangi' ),
	'priority' => $priority ++,
	'required'  => array(
        array(
            'setting'  => 'show_search_2',
            'operator' => '==',
            'value'    => 1,
        ),
    ),
) );

arrowpress_customizer() ->add_field(   array(
	'type'     => 'text',
	'settings' => 'icon_cart_2',
	'label'    => __( 'Enter Search Class', 'arangi' ),
	'description' => esc_html__( 'Add icon class you want here. You can find a lot of icons in these links Awesome icon or Linearicons , Pe stroke icon7', 'arangi' ),
	'section'  => $section,
	'default'  => esc_attr__( 'icon-search', 'arangi' ),
	'priority' => $priority ++,
) );
// Show minicart
arrowpress_customizer() ->add_field(   array(
	'type'        => 'toggle',
	'settings'    => 'show_mini_cart_2',
	'label'       => esc_html__( 'Show Mini Cart', 'arangi' ),
	'description' => esc_html__( 'Turn on to show mini cart.', 'arangi' ),
	'section'     => $section,
	'priority'    => $priority ++,
	'default'     => 1,
) );
arrowpress_customizer() ->add_field(   array(
	'type'     => 'text',
	'settings' => 'icon_cart_2',
	'label'    => __( 'Enter Cart Icon Class', 'arangi' ),
	'section'  => $section,
	'default'  => esc_attr__( 'icon-shopping-cart1', 'arangi' ),
	'priority' => $priority ++,
	'required'  => array(
        array(
            'setting'  => 'show_mini_cart_2',
            'operator' => '==',
            'value'    => 1,
        ),
    ),
) );
//Show settings
arrowpress_customizer() ->add_field(   array(
	'type'        => 'toggle',
	'settings'    => 'show_settings_2',
	'label'       => esc_html__( 'Show My Account', 'arangi' ),
	'description' => esc_html__( 'Turn on to show my account.', 'arangi' ),
	'section'     => $section,
	'priority'    => $priority ++,
	'default'     => 1,
) );
arrowpress_customizer() ->add_field(   array(
	'type'     => 'text',
	'settings' => 'icon_settings_2',
	'label'    => __( 'Enter my account icon class', 'arangi' ),
	'section'  => $section,
	'default'  => esc_attr__( 'icon-user1', 'arangi' ),
	'priority' => $priority ++,
	'required'  => array(
        array(
            'setting'  => 'show_settings_2',
            'operator' => '==',
            'value'    => 1,
        ),
    ),
) );
// Show Contact
arrowpress_customizer() ->add_field(   array(
	'type'        => 'toggle',
	'settings'    => 'show_contact_2',
	'label'       => esc_html__( 'Show contact', 'arangi' ),
	'description' => esc_html__( 'Turn on to show contact.', 'arangi' ),
	'section'     => $section,
	'priority'    => $priority ++,
	'default'     => '',
) );
// Show language
arrowpress_customizer() ->add_field(   array(
	'type'        => 'toggle',
	'settings'    => 'show_lang_2',
	'label'       => esc_html__( 'Show language', 'arangi' ),
	'description' => esc_html__( 'Turn on to show language.', 'arangi' ),
	'section'     => $section,
	'priority'    => $priority ++,
	'default'     => '',
) );
//header icon color
arrowpress_customizer() ->add_field(   array(
	'type'        => 'color',
	'settings'    => $prefix . 'icon_color_2',
	'label'       => esc_html__( 'Icon Color', 'arangi' ),
	'description' => esc_html__( 'Controls the icon color header.', 'arangi' ),
	'section'     => $section,
	'priority'    => $priority ++,
	'transport'   => 'auto',
	'default'     => '',
	'output'      => array(
		array(
			'element'  => '.header-02 .header-right .cart-header,
						   .header-02 .header-right .account-header a, 
						   .header-02 .header-right .header-contact i, 
						   .header-02 .header-right .search-header',
			'property' => 'color',
		),
	),
) );
//header icon color hover
arrowpress_customizer() ->add_field(   array(
	'type'        => 'color',
	'settings'    => $prefix . 'icon_color_hover_2',
	'label'       => esc_html__( 'Icon Color Hover', 'arangi' ),
	'description' => esc_html__( 'Controls the icon color hover header.', 'arangi' ),
	'section'     => $section,
	'priority'    => $priority ++,
	'transport'   => 'auto',
	'default'     => '',
	'output'      => array(
		array(
			'element'  => '.header-02 .cart-header:hover,
						   .header-02 .account-header a:hover, 
						   .header-02 .header-contact i:hover, 
						   .header-02 .search-header:hover',
			'property' => 'color',
		),
	),
) );
arrowpress_customizer() ->add_field(   array(
    'type'     => 'custom',
    'settings' => $prefix . 'group_menu' . $priority ++. "_2",
    'section'  => $section,
    'priority' => $priority ++,
    'default'  => '<div class="big_title">' . esc_html__( 'Header Menu', 'arangi' ) . '</div>',
) );
arrowpress_customizer() ->add_field(   array(
    'type'        => 'slider',
    'settings'    => $prefix . 'font_size',
    'label'       => esc_html__( 'Font Size', 'arangi' ),
    'description' => esc_html__( 'Controls the font size for main menu items.', 'arangi' ),
    'section'     => $section,
    'priority'    => $priority ++,
    'default'     => '',
    'transport'   => 'auto',
    'choices'     => array(
        'min'  => 10,
        'max'  => 50,
        'step' => 1,
    ),
    'output'      => array(
        array(
            'element'  => '.header-02 .mega-menu > li > a',
            'property' => 'font-size',
            'units'    => 'px',
        ),
    ),
) );
arrowpress_customizer() ->add_field(   array(
    'type'        => 'color',
    'settings'    => $prefix . 'menu_color',
    'label'       => esc_html__( 'Menu Color', 'arangi' ),
    'description' => esc_html__( 'Controls the color when hover for menu items.', 'arangi' ),
    'section'     => $section,
    'priority'    => $priority ++,
    'transport'   => 'auto',
    'default'     => '',
    'output'      => array(
        array(
            'element'  => '.header-02 .header-menu .mega-menu > li > a',
            'property' => 'color',
            'media_query' => '@media (min-width: 992px)'
        ),
    ),
) );
arrowpress_customizer() ->add_field(   array(
    'type'        => 'color',
    'settings'    => $prefix . 'menu_hover_color',
    'label'       => esc_html__( 'Menu Hover Color', 'arangi' ),
    'description' => esc_html__( 'Controls the color when hover for menu items.', 'arangi' ),
    'section'     => $section,
    'priority'    => $priority ++,
    'transport'   => 'auto',
    'default'     => '',
    'output'      => array(
        array(
            'element'  => '.header-02 .header-menu .mega-menu > li > a:focus,
						   .header-02 .header-menu .mega-menu > li > a:hover',
            'property' => 'color',
            'media_query' => '@media (min-width: 992px)'
        ),
    ),
) );
//Menu styling
arrowpress_customizer() ->add_field(   array(
    'type'        => 'typography',
    'settings'    => $prefix . 'navigation_typography_2',
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
            'element' => '.header-02 .mega-menu > li > a',
        ),
    ),
    'required'  => array(
        array(
            'setting'  => 'show_header_bottom_2',
            'operator' => '==',
            'value'    => 1,
        ),
    ),
) );

arrowpress_customizer() ->add_field(   array(
    'type'      => 'spacing',
    'settings'  => $prefix . 'navigation_2_item_padding',
    'label'     => esc_html__( 'Item Padding', 'arangi' ),
    'section'   => $section,
    'priority'  => $priority ++,
    'default'   => array(
        'left'   => '',
        'right'  => '',
    ),
    'transport' => 'auto',
    'output'    => array(
        array(
            'element'  => array(
                '.header-02 .header-middle .mega-menu > li > a',
            ),
            'property' => 'padding',
        ),
    ),
) );