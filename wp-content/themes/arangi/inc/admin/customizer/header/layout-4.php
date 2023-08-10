<?php 
$section  = 'header_layout_4';
$priority = 1;
$prefix   = 'header_layout_4_';

arrowpress_customizer() ->add_field(   array(
    'type'     => 'image',
    'settings' => 'image-header-4',
    'section'  => $section,
    'priority' => $priority ++,
    'transport' => 'auto',
    'default'  => ARANGI_THEME_URI . '/assets/images/header/header-4.jpg',
) );
/*--------------------------------------------------------------
# header
--------------------------------------------------------------*/
arrowpress_customizer() ->add_field(   array(
    'type'     => 'custom',
    'settings' => $prefix . 'group_title_' . $priority ++. "_4",
    'section'  => $section,
    'priority' => $priority ++,
    'default'  => '<div class="big_title">' . esc_html__( 'Header', 'arangi' ) . '</div>',
) );

arrowpress_customizer() ->add_field(   array(
    'type'     => 'image',
    'settings' => 'logo_4',
    'label'    => esc_html__( 'Logo', 'arangi' ),
    'description' => esc_html__('Select an image file for your logo','arangi'),
    'section'  => $section,
    'priority' => $priority ++,
    'transport' => 'auto',
    'default'  => ARANGI_THEME_URI . '/assets/images/logo-4.png',
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
			'element'  => '#page:not(.header-fixed) .fix-top.header-04, .header-04',
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
			'element'  => '.site-header.header-04',
		),
	),
	'required'  => array(
        array(
            'setting'  => 'header_layout_4_bg_img',
            'operator' => '==',
            'value'    => 1,
        ),
    ), 
) );
//background overlay color
arrowpress_customizer() ->add_field(   array(
	'type'        => 'color',
	'settings'    => $prefix . 'overlay_color_4',
	'label'       => esc_html__( 'Background', 'arangi' ),
	'description' => esc_html__( 'Header Background Overlay Color', 'arangi' ),
	'section'     => $section,
	'priority'    => $priority ++,
	'transport'   => 'auto',
	'default'	  => 'transparent',
	'output'      => array(
		array(
			'element'  => '.header-04:before',
			'property' => 'background-color',
		),
	),
	'required'  => array(
        array(
            'setting'  => 'header_layout_4_bg_img',
            'operator' => '==',
            'value'    => 1,
        ),
    ), 
) );
// Header background opacity
arrowpress_customizer() ->add_field(   array(
	'type'     => 'text',
	'settings' => 'opacity_4',
	'label'    => __( 'Enter Header Opacity.', 'arangi' ),
	'section'  => $section,
	'default'  => esc_attr__( '0.6', 'arangi' ),
	'priority' => $priority ++,
	'output'      => array(
		array(
			'element'  => '.header-04:before',
			'property' => 'opacity',
		),
	),
	'required'  => array(
        array(
            'setting'  => 'header_layout_4_bg_img',
            'operator' => '==',
            'value'    => 1,
        ),
    ), 
) );

// Show search
arrowpress_customizer() ->add_field(   array(
    'type'        => 'toggle',
    'settings'    => 'show_search_4',
    'label'       => esc_html__( 'Show Search', 'arangi' ),
    'description' => esc_html__( 'Turn on to show search.', 'arangi' ),
    'section'     => $section,
    'priority'    => $priority ++,
    'default'     => 1,
) );
arrowpress_customizer() ->add_field(   array(
    'type'     => 'text',
    'settings' => 'icon_search_4',
    'label'    => __( 'Enter Search Class', 'arangi' ),
    'description' => esc_html__( 'Add icon class you want here. You can find a lot of icons in these links Awesome icon or Linearicons , Pe stroke icon7', 'arangi' ),
    'section'  => $section,
    'default'  => esc_attr__( 'ti-search', 'arangi' ),
    'priority' => $priority ++,
    'required'  => array(
        array(
            'setting'  => 'show_search_4',
            'operator' => '==',
            'value'    => 1,
        ),
    ),
) );
// Show Contact
arrowpress_customizer() ->add_field(   array(
    'type'        => 'toggle',
    'settings'    => 'show_contact_4',
    'label'       => esc_html__( 'Show contact', 'arangi' ),
    'description' => esc_html__( 'Turn on to show contact.', 'arangi' ),
    'section'     => $section,
    'priority'    => $priority ++,
    'default'     => 1,
) );

arrowpress_customizer() ->add_field(   array(
    'type'     => 'text',
    'settings' => 'icon_contact_4',
    'label'    => __( 'Enter Cart Icon Class', 'arangi' ),
    'section'  => $section,
    'default'  => esc_attr__( 'ti-headphone-alt', 'arangi' ),
    'priority' => $priority ++,
    'required'  => array(
        array(
            'setting'  => 'show_contact_4',
            'operator' => '==',
            'value'    => 1,
        ),
    ),
) );
// Show language
arrowpress_customizer() ->add_field(   array(
    'type'        => 'toggle',
    'settings'    => 'show_lang_4',
    'label'       => esc_html__( 'Show language', 'arangi' ),
    'description' => esc_html__( 'Turn on to show language.', 'arangi' ),
    'section'     => $section,
    'priority'    => $priority ++,
    'default'     => 1,
) );

// Show minicart
arrowpress_customizer() ->add_field(   array(
    'type'        => 'toggle',
    'settings'    => 'show_mini_cart_4',
    'label'       => esc_html__( 'Show Mini Cart', 'arangi' ),
    'description' => esc_html__( 'Turn on to show mini cart.', 'arangi' ),
    'section'     => $section,
    'priority'    => $priority ++,
    'default'     => 1,
) );
arrowpress_customizer() ->add_field(   array(
    'type'     => 'text',
    'settings' => 'icon_cart_4',
    'label'    => __( 'Enter Cart Icon Class', 'arangi' ),
    'section'  => $section,
    'default'  => esc_attr__( 'icon-shopping-cart1', 'arangi' ),
    'priority' => $priority ++,
    'required'  => array(
        array(
            'setting'  => 'show_mini_cart_4',
            'operator' => '==',
            'value'    => 1,
        ),
    ),
) );
//Show settings
arrowpress_customizer() ->add_field(   array(
    'type'        => 'toggle',
    'settings'    => 'show_settings_4',
    'label'       => esc_html__( 'Show My Account', 'arangi' ),
    'description' => esc_html__( 'Turn on to show my account.', 'arangi' ),
    'section'     => $section,
    'priority'    => $priority ++,
    'default'     => 1,
) );
arrowpress_customizer() ->add_field(   array(
    'type'     => 'text',
    'settings' => 'icon_settings_4',
    'label'    => __( 'Enter my account icon class', 'arangi' ),
    'section'  => $section,
    'default'  => esc_attr__( 'icon-user1', 'arangi' ),
    'priority' => $priority ++,
    'required'  => array(
        array(
            'setting'  => 'show_settings_4',
            'operator' => '==',
            'value'    => 1,
        ),
    ),
) );

// Show language
arrowpress_customizer() ->add_field(   array(
    'type'        => 'toggle',
    'settings'    => 'show_lang_4',
    'label'       => esc_html__( 'Show language', 'arangi' ),
    'description' => esc_html__( 'Turn on to show language.', 'arangi' ),
    'section'     => $section,
    'priority'    => $priority ++,
    'default'     => 0,
) );
//header icon color
arrowpress_customizer() ->add_field(   array(
    'type'        => 'color',
    'settings'    => $prefix . 'icon_color_4',
    'label'       => esc_html__( 'Header Color', 'arangi' ),
    'description' => esc_html__( 'Controls the top header color .', 'arangi' ),
    'section'     => $section,
    'priority'    => $priority ++,
    'transport'   => 'auto',
    'default'     => '',
    'output'      => array(
        array(
            'element'  => '.header-04 .content-topbar a,
                           .header-04 .info-part .icon, 
                           .header-04 .icon-header,
                           .header-04 .searchsubmit.woosearch-submit.submit.btn-search,
                           .header-04 .languges-flags .lang-1,
                           .header-04.site-header .cart_label .count,
						   .header-04.site-header .account-header span.box-label, 
						   .header-04 .account-header > a',
            'property' => 'color',
        ),
    ),
) );
//header icon color hover
arrowpress_customizer() ->add_field(   array(
    'type'        => 'color',
    'settings'    => $prefix . 'icon_color_hover_4',
    'label'       => esc_html__( 'Header Color Hover', 'arangi' ),
    'description' => esc_html__( 'Controls the color hover header.', 'arangi' ),
    'section'     => $section,
    'priority'    => $priority ++,
    'transport'   => 'auto',
    'default'     => '',
    'output'      => array(
        array(
            'element'  => '.header-04 .content-topbar a:hover,
                .header-04 .icon-header:hover,
                .header-04 .searchsubmit.woosearch-submit.submit.btn-search:hover,
                .header-04 .languges-flags .lang-1:hover,
                .header-04 .cart-header:hover .cart_label .count,
                .header-04.site-header .account-header:hover span.box-label, 
                .header-04 .account-header > a:hover',
            'property' => 'color',
        ),
    ),
) );
/*--------------------------------------------------------------
# Header menu
--------------------------------------------------------------*/
arrowpress_customizer() ->add_field(   array(
    'type'     => 'custom',
    'settings' => $prefix . 'group_title_menu' . $priority ++. "_4",
    'section'  => $section,
    'priority' => $priority ++,
    'default'  => '<div class="big_title">' . esc_html__( 'Header Menu', 'arangi' ) . '</div>',
) );

arrowpress_customizer() ->add_field(   array(
    'type'        => 'slider',
    'settings'    => $prefix . 'navigation_item_font_size_4',
    'label'       => esc_html__( 'Font Size', 'arangi' ),
    'description' => esc_html__( 'Controls the font size for main menu items.', 'arangi' ),
    'section'     => $section,
    'priority'    => $priority ++,
    'default'     => 19,
    'transport'   => 'auto',
    'choices'     => array(
        'min'  => 10,
        'max'  => 25,
        'step' => 1,
    ),
    'output'      => array(
        array(
            'element'  => '.header-04 .header-bottom .mega-menu > li > a',
            'property' => 'font-size',
            'units'    => 'px',
        ),
    ),
) );

arrowpress_customizer() ->add_field(   array(
    'type'        => 'color',
    'settings'    => $prefix . 'item_color_4',
    'label'       => esc_html__( 'Menu color', 'arangi' ),
    'description'       => esc_html__( 'Color For Main Menu Items', 'arangi' ),
    'section'     => $section,
    'priority'    => $priority ++,
    'transport'   => 'auto',
    'default'     => '#333333',
    'output'      => array(
        array(
            'element'  => '.header-04 .header-bottom .mega-menu > li > a',
            'property' => 'color',
        ),
    ),
) );

arrowpress_customizer() ->add_field(   array(
    'type'        => 'color',
    'settings'    => $prefix . 'navigation_link_hover_color_4',
    'label'       => esc_html__( 'Menu Hover Color', 'arangi' ),
    'description' => esc_html__( 'Controls the color when hover for menu items.', 'arangi' ),
    'section'     => $section,
    'priority'    => $priority ++,
    'transport'   => 'auto',
    'default'     => '',
    'output'      => array(
        array(
            'element'  =>
                '.header-04 .header-bottom  .mega-menu > li:focus > a, 
                .header-04 .header-bottom .mega-menu> li:hover > a',
            'property' => 'color',
        ),
    ),
) );
//Menu styling
arrowpress_customizer() ->add_field(   array(
    'type'        => 'typography',
    'settings'    => $prefix . 'navigation_typography_4',
    'label'       => esc_html__( 'Typography', 'arangi' ),
    'description' => esc_html__( 'These settings control the typography for menu items.', 'arangi' ),
    'section'     => $section,
    'priority'    => $priority ++,
    'transport'   => 'auto',
    'default'     => array(
        'font-family'    => 'Raleway',
        'font-weight'        => '600',
        'letter-spacing' => '0',
        'text-transform' => 'none',
        'font-size'      => '14px'
    ),
    'output'      => array(
        array(
            'element' => '.header-04 .header-bottom .mega-menu > li > a',
        ),
    ),
) );

arrowpress_customizer() ->add_field(   array(
    'type'      => 'spacing',
    'settings'  => $prefix . 'navigation_4_item_padding',
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
                '.header-04 .header-bottom .mega-menu > li > a',
            ),
            'property' => 'padding',
        ),
    ),
) );
