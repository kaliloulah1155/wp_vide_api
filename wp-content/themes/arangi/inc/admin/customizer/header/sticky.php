<?php
$section  = 'header_sticky';
$priority = 1;
$prefix   = 'header_sticky_';
arrowpress_customizer() ->add_field(   array(
	'type'        => 'toggle',
	'settings'    => $prefix . 'enable',
	'label'       => esc_html__( 'Enable', 'arangi' ),
	'description' => esc_html__( 'Enable this option to turn on header sticky feature.', 'arangi' ),
	'section'     => $section,
	'priority'    => $priority ++,
	'default'     => 0,
) );

arrowpress_customizer() ->add_field(   array(
	'type'     => 'image',
	'settings' => $prefix . 'logo',
	'label'    => esc_html__( 'Logo Sticky', 'arangi' ),
	'description' => esc_html__('Select an image file for your logo','arangi'),
	'section'  => $section,
	'priority' => $priority ++,
	'transport' => 'auto',
	'default'  => ARANGI_THEME_URI . '/assets/images/logo.png',
) );
arrowpress_customizer() ->add_field(   array(
	'type'      => 'slider',
	'settings'  => $prefix . 'height',
	'label'     => esc_html__( 'Height Sticky', 'arangi' ),
	'section'   => $section,
	'priority'  => $priority ++,
	'default'   => 100,
	'transport' => 'auto',
	'choices'   => array(
		'min'  => 50,
		'max'  => 200,
		'step' => 1,
	),
	'output'    => array(
		array(
			'element'  => '.header-01.is-sticky .logo, 
						   .header-01.is-sticky .header-right,
						   .header-01.is-sticky #site-navigation .mega-menu > li,
						   .header-01.is-sticky .cont,
						   .header-02.is-sticky .logo, 
						   .header-02.is-sticky .header-menu .mega-menu > li,
						   .header-02.is-sticky .header-right,
						   .header-03.is-sticky .logo, 
						   .header-03.is-sticky .header-middle .menu-icon, 
						   .header-03.is-sticky .header-middle .header-right, 
						   .header-03.is-sticky .header-middle .header-menu,
						   .header-02.is-sticky .header-content .menu-icon,
						   .header-02.is-sticky .header-right,
						   .header-03.is-sticky .logo, 
						   .header-03.is-sticky .header-content .menu-icon, 
						   .header-03.is-sticky .header-content .header-right, 
						   .header-03.is-sticky .header-content .header-menu,
						   .header-03.is-sticky .mega-menu > li',
			'property' => 'height',
            'suffix'   => ' !important',
			'units'    => 'px',
			'media_query' => '@media (min-width: 992px)'
		),
	),
) );
arrowpress_customizer() ->add_field(   array(
	'type'      => 'slider',
	'settings'  => $prefix . 'height_logo',
	'label'     => esc_html__( 'Max Height Logo', 'arangi' ),
	'section'   => $section,
	'priority'  => $priority ++,
	'default'   => 50,
	'transport' => 'auto',
	'choices'   => array(
		'min'  => 50,
		'max'  => 200,
		'step' => 1,
	),
	'output'    => array(
		array(
			'element'  => '.is-sticky .logo .logo-sticky img',
			'property' => 'max-height',
			'units'    => 'px',
		),
	),
) );

arrowpress_customizer() ->add_field(   array(
	'type'        => 'color-alpha',
	'settings'    => $prefix . 'background',
	'label'       => esc_html__( 'Background', 'arangi' ),
	'description' => esc_html__( 'Controls the background of header sticky.', 'arangi' ),
	'section'     => $section,
	'priority'    => $priority ++,
	'default'     => '#ffffff',
	'transport'   => 'auto',
	'output'      => array(
		array(
			'element' => 'header.site-header.bg-sticky',
			'property' => 'background-color',
		),
	),
) );

arrowpress_customizer() ->add_field(   array(
	'type'     => 'custom',
	'settings' => $prefix . 'group_title_' . $priority ++,
	'section'  => $section,
	'priority' => $priority ++,
	'default'  => '<div class="big_title">' . esc_html__( 'Navigation', 'arangi' ) . '</div>',
) );

arrowpress_customizer() ->add_field(   array(
	'type'        => 'color',
	'settings'    => $prefix . 'link_color',
	'label'       => esc_html__( 'Link Color', 'arangi' ),
	'description' => esc_html__( 'Controls the color of main menu items on sticky header.', 'arangi' ),
	'section'     => $section,
	'priority'    => $priority ++,
	'transport'   => 'auto',
	'default'     => '',
	'output'      => array(
		array(
			'element'  => 'header.is-sticky .mega-menu > li > a',
			'property' => 'color',
            'suffix'   => ' !important',
		),
	),
) );

arrowpress_customizer() ->add_field(   array(
	'type'        => 'color',
	'settings'    => $prefix . 'link_hover_color',
	'label'       => esc_html__( 'Link Hover Color', 'arangi' ),
	'description' => esc_html__( 'Controls the color when hover for main menu items on sticky header.', 'arangi' ),
	'section'     => $section,
	'priority'    => $priority ++,
	'transport'   => 'auto',
	'default'     => '',
	'output'      => array(
		array(
			'element'  => '
				header.is-sticky .mega-menu > li > a:focus, 
				header.is-sticky .mega-menu > li > a:hover',
			'property' => 'color',
            'suffix'   => ' !important',
		),
	),
) );

arrowpress_customizer() ->add_field(   array(
	'type'        => 'color-alpha',
	'settings'    => $prefix . 'icon_color',
	'label'       => esc_html__( 'Icon Color', 'arangi' ),
	'description' => esc_html__( 'Controls the color of icons in sticky header.', 'arangi' ),
	'section'     => $section,
	'priority'    => $priority ++,
	'transport'   => 'auto',
	'default'     => '',
	'output'      => array(
		array(
			'element'  => '
				header.is-sticky .cart-header,
				header.is-sticky .account-header a,
				header.is-sticky .search-header,
				header.is-sticky .header-icon i',
			'property' => 'color',
		),
	),
) );

arrowpress_customizer() ->add_field(   array(
	'type'        => 'color-alpha',
	'settings'    => $prefix . 'icon_hover_color',
	'label'       => esc_html__( 'Icon Hover Color', 'arangi' ),
	'description' => esc_html__( 'Controls the color when of icons in sticky header.', 'arangi' ),
	'section'     => $section,
	'priority'    => $priority ++,
	'transport'   => 'auto',
	'default'     => '',
	'output'      => array(
		array(
			'element'  => '
				header.is-sticky .cart-header:hover,
				header.is-sticky .account-header a:hover,
				header.is-sticky .search-header:hover,
				header.is-sticky .header-icon i:hover',
			'property' => 'color',
		),
	),
) );
