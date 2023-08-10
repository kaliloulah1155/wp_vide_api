<?php 
$section  = 'header_layout_3';
$priority = 1;
$prefix   = 'header_layout_3_';

arrowpress_customizer() ->add_field(   array(
    'type'     => 'image',
    'settings' => 'image-header-3',
    'section'  => $section,
    'priority' => $priority ++,
    'transport' => 'auto',
    'default'  => ARANGI_THEME_URI . '/assets/images/header/header-3.jpg',
) );
/*--------------------------------------------------------------
# header
--------------------------------------------------------------*/
arrowpress_customizer() ->add_field(   array(
    'type'     => 'custom',
    'settings' => $prefix . 'group_title_' . $priority ++. "_3",
    'section'  => $section,
    'priority' => $priority ++,
    'default'  => '<div class="big_title">' . esc_html__( 'Header', 'arangi' ) . '</div>',
) );

arrowpress_customizer() ->add_field(   array(
    'type'     => 'image',
    'settings' => 'logo_3',
    'label'    => esc_html__( 'Logo', 'arangi' ),
    'description' => esc_html__('Select an image file for your logo','arangi'),
    'section'  => $section,
    'priority' => $priority ++,
    'transport' => 'auto',
    'default'  => ARANGI_THEME_URI . '/assets/images/logo-3.png',
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
			'element'  => '.header-03',
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
			'element'  => '.site-header.header-03',
		),
	),
	'required'  => array(
        array(
            'setting'  => 'header_layout_3_bg_img',
            'operator' => '==',
            'value'    => 1,
        ),
    ), 
) );
//background overlay color
arrowpress_customizer() ->add_field(   array(
	'type'        => 'color',
	'settings'    => $prefix . 'overlay_color_3',
	'label'       => esc_html__( 'Background', 'arangi' ),
	'description' => esc_html__( 'Header Background Overlay Color', 'arangi' ),
	'section'     => $section,
	'priority'    => $priority ++,
	'transport'   => 'auto',
	'default'	  => 'transparent',
	'output'      => array(
		array(
			'element'  => '.header-03:before',
			'property' => 'background-color',
		),
	),
	'required'  => array(
        array(
            'setting'  => 'header_layout_3_bg_img',
            'operator' => '==',
            'value'    => 1,
        ),
    ), 
) );
// Header background opacity
arrowpress_customizer() ->add_field(   array(
	'type'     => 'text',
	'settings' => 'opacity_3',
	'label'    => __( 'Enter Height For Header Opacity.', 'arangi' ),
	'section'  => $section,
	'default'  => esc_attr__( '0.6', 'arangi' ),
	'priority' => $priority ++,
	'output'      => array(
		array(
			'element'  => '.header-03:before',
			'property' => 'opacity',
		),
	),
	'required'  => array(
        array(
            'setting'  => 'header_layout_3_bg_img',
            'operator' => '==',
            'value'    => 1,
        ),
    ), 
) );
arrowpress_customizer() ->add_field(   array(
	'type'        => 'dimension',
	'settings'    => 'logo_height_3',
	'label'       => esc_attr__( 'Middle Header Height', 'arangi' ),
	'description' => esc_attr__( 'Enter height with unit', 'arangi' ),
	'section'     => $section,
	'priority' => $priority ++,
	'default'     => '132px',
	'output'    => array(
		array(
			'element'  => array(
				'.header-03 .logo,
				 .header-03 .header-middle .menu-icon,
				 .header-03 .header-middle .header-right,
				 .header-03 .header-middle .mega-menu > li,
				 .header-03 .header-middle .header-menu',
			),
			'property' => 'height',
		),
	),
) );

// Show search
arrowpress_customizer() ->add_field(   array(
    'type'        => 'toggle',
    'settings'    => 'show_search_3',
    'label'       => esc_html__( 'Show Search', 'arangi' ),
    'description' => esc_html__( 'Turn on to show search.', 'arangi' ),
    'section'     => $section,
    'priority'    => $priority ++,
    'default'     => '',
) );
arrowpress_customizer() ->add_field(   array(
    'type'     => 'text',
    'settings' => 'icon_search_3',
    'label'    => __( 'Enter Search Class', 'arangi' ),
    'description' => esc_html__( 'Add icon class you want here. You can find a lot of icons in these links Awesome icon or Linearicons , Pe stroke icon7', 'arangi' ),
    'section'  => $section,
    'default'  => esc_attr__( 'ti-search', 'arangi' ),
    'priority' => $priority ++,
    'required'  => array(
        array(
            'setting'  => 'show_search_3',
            'operator' => '==',
            'value'    => 1,
        ),
    ),
) );
// Show Contact
arrowpress_customizer() ->add_field(   array(
    'type'        => 'toggle',
    'settings'    => 'show_contact_3',
    'label'       => esc_html__( 'Show contact', 'arangi' ),
    'description' => esc_html__( 'Turn on to show contact.', 'arangi' ),
    'section'     => $section,
    'priority'    => $priority ++,
    'default'     => 1,
) );

arrowpress_customizer() ->add_field(   array(
    'type'     => 'text',
    'settings' => 'icon_contact_3',
    'label'    => __( 'Enter Cart Icon Class', 'arangi' ),
    'section'  => $section,
    'default'  => esc_attr__( 'icon-phone-solid', 'arangi' ),
    'priority' => $priority ++,
    'required'  => array(
        array(
            'setting'  => 'show_contact_3',
            'operator' => '==',
            'value'    => 1,
        ),
    ),
) );
// Show language
arrowpress_customizer() ->add_field(   array(
    'type'        => 'toggle',
    'settings'    => 'show_lang_3',
    'label'       => esc_html__( 'Show language', 'arangi' ),
    'description' => esc_html__( 'Turn on to show language.', 'arangi' ),
    'section'     => $section,
    'priority'    => $priority ++,
    'default'     => 1,
) );

// Show minicart
arrowpress_customizer() ->add_field(   array(
    'type'        => 'toggle',
    'settings'    => 'show_mini_cart_3',
    'label'       => esc_html__( 'Show Mini Cart', 'arangi' ),
    'description' => esc_html__( 'Turn on to show mini cart.', 'arangi' ),
    'section'     => $section,
    'priority'    => $priority ++,
    'default'     => 1,
) );
arrowpress_customizer() ->add_field(   array(
    'type'     => 'text',
    'settings' => 'icon_cart_3',
    'label'    => __( 'Enter Cart Icon Class', 'arangi' ),
    'section'  => $section,
    'default'  => esc_attr__( 'icon-shopping-basket', 'arangi' ),
    'priority' => $priority ++,
    'required'  => array(
        array(
            'setting'  => 'show_mini_cart_3',
            'operator' => '==',
            'value'    => 1,
        ),
    ),
) );
//Show settings
arrowpress_customizer() ->add_field(   array(
    'type'        => 'toggle',
    'settings'    => 'show_settings_3',
    'label'       => esc_html__( 'Show My Account', 'arangi' ),
    'description' => esc_html__( 'Turn on to show my account.', 'arangi' ),
    'section'     => $section,
    'priority'    => $priority ++,
    'default'     => 1,
) );
arrowpress_customizer() ->add_field(   array(
    'type'     => 'text',
    'settings' => 'icon_settings_3',
    'label'    => __( 'Enter my account icon class', 'arangi' ),
    'section'  => $section,
    'default'  => esc_attr__( 'icon-unlock-alt-solid', 'arangi' ),
    'priority' => $priority ++,
    'required'  => array(
        array(
            'setting'  => 'show_settings_3',
            'operator' => '==',
            'value'    => 1,
        ),
    ),
) );

// Show language
arrowpress_customizer() ->add_field(   array(
    'type'        => 'toggle',
    'settings'    => 'show_lang_3',
    'label'       => esc_html__( 'Show language', 'arangi' ),
    'description' => esc_html__( 'Turn on to show language.', 'arangi' ),
    'section'     => $section,
    'priority'    => $priority ++,
    'default'     => 0,
) );
//header icon color
arrowpress_customizer() ->add_field(   array(
    'type'        => 'color',
    'settings'    => $prefix . 'icon_color_3',
    'label'       => esc_html__( 'Icon Color', 'arangi' ),
    'description' => esc_html__( 'Controls the icon color header.', 'arangi' ),
    'section'     => $section,
    'priority'    => $priority ++,
    'transport'   => 'auto',
    'default'     => '',
    'output'      => array(
        array(
            'element'  => '.header-03 .header-icon .cart-header,
						   .header-03 .header-icon .account-header > a, 
						   .header-03 .header-icon .header-contact a, 
						   .header-03 .header-icon .search-header',
            'property' => 'color',
        ),
    ),
) );
//header icon color hover
arrowpress_customizer() ->add_field(   array(
    'type'        => 'color',
    'settings'    => $prefix . 'icon_color_hover_3',
    'label'       => esc_html__( 'Icon Color', 'arangi' ),
    'description' => esc_html__( 'Controls the icon color hover header.', 'arangi' ),
    'section'     => $section,
    'priority'    => $priority ++,
    'transport'   => 'auto',
    'default'     => '',
    'output'      => array(
        array(
            'element'  => '.header-03 .header-icon .cart-header:hover,
						   .header-03 .header-icon .account-header > a:hover, 
						   .header-03 .header-icon .header-contact i:hover, 
						   .header-03 .header-icon .search-header:hover',
            'property' => 'color',
        ),
    ),
) );
/*--------------------------------------------------------------
# Header menu
--------------------------------------------------------------*/
arrowpress_customizer() ->add_field(   array(
    'type'     => 'custom',
    'settings' => $prefix . 'group_title_menu' . $priority ++. "_3",
    'section'  => $section,
    'priority' => $priority ++,
    'default'  => '<div class="big_title">' . esc_html__( 'Header Menu', 'arangi' ) . '</div>',
) );

arrowpress_customizer() ->add_field(   array(
    'type'        => 'slider',
    'settings'    => $prefix . 'navigation_item_font_size_3',
    'label'       => esc_html__( 'Font Size', 'arangi' ),
    'description' => esc_html__( 'Controls the font size for main menu items.', 'arangi' ),
    'section'     => $section,
    'priority'    => $priority ++,
    'default'     => 17,
    'transport'   => 'auto',
    'choices'     => array(
        'min'  => 10,
        'max'  => 20,
        'step' => 1,
    ),
    'output'      => array(
        array(
            'element'  => '.header-03 .header-middle .mega-menu > li > a',
            'property' => 'font-size',
            'units'    => 'px',
        ),
    ),
) );

arrowpress_customizer() ->add_field(   array(
    'type'        => 'color',
    'settings'    => $prefix . 'item_color_3',
    'label'       => esc_html__( 'Menu color', 'arangi' ),
    'description'       => esc_html__( 'Color For Main Menu Items', 'arangi' ),
    'section'     => $section,
    'priority'    => $priority ++,
    'transport'   => 'auto',
    'default'     => '#333333',
    'output'      => array(
        array(
            'element'  => '.header-03 .header-middle .mega-menu > li > a',
            'property' => 'color',
        ),
    ),
) );

arrowpress_customizer() ->add_field(   array(
    'type'        => 'color',
    'settings'    => $prefix . 'navigation_link_hover_color_3',
    'label'       => esc_html__( 'Menu Hover Color', 'arangi' ),
    'description' => esc_html__( 'Controls the color when hover for menu items.', 'arangi' ),
    'section'     => $section,
    'priority'    => $priority ++,
    'transport'   => 'auto',
    'default'     => '#fff',
    'output'      => array(
        array(
            'element'  =>
                '.header-03 .header-middle  .mega-menu > li:focus > a, 
                .header-03 .header-middle .mega-menu> li:hover > a',
            'property' => 'color',
        ),
    ),
) );
//Menu styling
arrowpress_customizer() ->add_field(   array(
    'type'        => 'typography',
    'settings'    => $prefix . 'navigation_typography_3',
    'label'       => esc_html__( 'Typography', 'arangi' ),
    'description' => esc_html__( 'These settings control the typography for menu items.', 'arangi' ),
    'section'     => $section,
    'priority'    => $priority ++,
    'transport'   => 'auto',
    'default'     => array(
        'font-family'    => 'Raleway',
        'font-weight'        => '600',
        'letter-spacing' => '0',
        'text-transform' => 'uppercase',
        'font-size'      => '14px'
    ),
    'output'      => array(
        array(
            'element' => '.header-03 .header-middle .mega-menu > li > a',
        ),
    ),
) );

arrowpress_customizer() ->add_field(   array(
    'type'      => 'spacing',
    'settings'  => $prefix . 'navigation_3_item_padding',
    'label'     => esc_html__( 'Item Padding', 'arangi' ),
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
                '.header-03 .header-middle .mega-menu > li > a',
            ),
            'property' => 'padding',
        ),
    ),
) );
