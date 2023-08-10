<?php
$section  = 'header_mobile';
$priority = 1;
$prefix   = 'header_mobile_';
$show = esc_html__( 'Show', 'arangi' );
$hide = esc_html__( 'Hide', 'arangi' );

arrowpress_customizer() ->add_field (  array(
	'type'        => 'radio-buttonset',
	'settings'    => $prefix .'logo',
	'label'       => __( 'Show/Hide Header Menu Logo', 'arangi' ),
	'section'     => $section,
	'default'     => 'show',
	'priority'    => $priority ++,
	'choices'     => array(
		'show'    => $show,
		'hide'    => $hide,
	),
));
arrowpress_customizer() ->add_field(   array(
    'type'     => 'image',
    'settings' => $prefix . 'select_logo',
    'label'    => esc_html__( 'Logo Mobile', 'arangi' ),
    'description' => esc_html__('Select an image file for your logo','arangi'),
    'section'  => $section,
    'priority' => $priority ++,
    'transport' => 'auto',
    'default'  => ARANGI_THEME_URI . '/assets/images/logo.png',
    'required'  => array(
        array(
            'setting'  => $prefix .'logo',
            'operator' => '==',
            'value'    => 'show',
        ),
    ),
) );

arrowpress_customizer() ->add_field(   array(
    'type'      => 'slider',
    'settings'  => $prefix . 'height',
    'label'     => esc_html__( 'Height Header Mobile', 'arangi' ),
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
            'element'  => '.header-01 .logo, 
						   .header-01 .menu-col-right .menu-icon,
						   .header-02 .logo, 
						   .header-02 .header-right,
						   .header-03 .logo, 
						   .header-03 .header-middle .menu-icon, 
						   .header-03 .header-middle .header-right, 
						   .header-03 .header-middle .header-menu,
						   .header-02 .header-content .menu-icon,
						   .header-02 .header-right,
						   .header-03 .logo, 
						   .header-03 .header-content .menu-icon, 
						   .header-03 .header-content .header-right, 
						   .header-03 .header-content .header-menu',
            'property' => 'height',
            'suffix'   => ' !important',
            'units'    => 'px',
            'media_query' => '@media (max-width: 991px)'
        ),
    ),
) );
arrowpress_customizer() ->add_field (  array(
    'type'        => 'radio-buttonset',
    'settings'    => $prefix .'cart',
    'label'       => __( 'Show/Hide Cart', 'arangi' ),
    'section'     => $section,
    'default'     => 'show',
    'priority'    => $priority ++,
    'choices'     => array(
        'show'    => $show,
        'hide'    => $hide,
    ),
));
arrowpress_customizer() ->add_field (  array(
    'type'        => 'radio-buttonset',
    'settings'    => $prefix .'acount',
    'label'       => __( 'Show/Hide Acount', 'arangi' ),
    'section'     => $section,
    'default'     => 'show',
    'priority'    => $priority ++,
    'choices'     => array(
        'show'        => $show,
        'hide'  => $hide,
    ),
));

arrowpress_customizer() ->add_field (  array(
    'type'        => 'radio-buttonset',
    'settings'    => $prefix .'phone',
    'label'       => __( 'Show/Hide Header Phone', 'arangi' ),
    'section'     => $section,
    'default'     => 'hide',
    'priority'    => $priority ++,
    'choices'     => array(
        'show'        => $show,
        'hide'  => $hide,
    ),
));

arrowpress_customizer() ->add_field (  array(
	'type'        => 'radio-buttonset',
	'settings'    => $prefix .'language',
	'label'       => __( 'Show/Hide Header Language', 'arangi' ),
	'section'     => $section,
	'default'     => 'hide',
	'priority'    => $priority ++,
	'choices'     => array(
		'show'        => $show,
		'hide'  => $hide,
	),
));
arrowpress_customizer() ->add_field(   array(
	'type'        => 'color-alpha',
	'settings'    => $prefix . 'background_color',
	'label'       => esc_html__( 'Background Color', 'arangi' ),
	'description' => esc_html__( 'Controls the background color of header mobile.', 'arangi' ),
	'section'     => $section,
	'priority'    => $priority ++,
	'default'     => '#e8e6e3',
	'output'      => array(
		array(
			'element' => '.header-menu, .menu-mobile .mobile-content',
			'property' => 'background-color',
			'media_query' => '@media (max-width: 991px)',
            'suffix'   => ' !important',
		),
	),
) );
arrowpress_customizer() ->add_field(   array(
	'type'        => 'color-alpha',
	'settings'    => $prefix . 'icon_menu_color',
	'label'       => esc_html__( 'Icon Menu Color', 'arangi' ),
	'description' => esc_html__( 'Controls the color of icon menu.', 'arangi' ),
	'section'     => $section,
	'priority'    => $priority ++,
	'default'     => '#000000',
	'output'      => array(
		array(
			'element' => '.close-menu-mobile .bars',
			'property' => 'border-color',
			'media_query' => '@media (max-width: 991px)'
		),
	),
) );
arrowpress_customizer() ->add_field(   array(
	'type'        => 'color-alpha',
	'settings'    => $prefix . 'menu_color',
	'label'       => esc_html__( 'Menu Color', 'arangi' ),
	'description' => esc_html__( 'Controls the color of menu.', 'arangi' ),
	'section'     => $section,
	'priority'    => $priority ++,
	'default'     => '#333333',
	'output'      => array(
		array(
			'element' => 'header.site-header .menu-mobile .mega-menu > li > a,
						  .caret-submenu',
			'property' => 'color',
			'media_query' => '@media (max-width: 991px)'
		),
	),
) );
arrowpress_customizer() ->add_field(   array(
	'type'        => 'color-alpha',
	'settings'    => $prefix . 'sub_menu_color',
	'label'       => esc_html__( 'Sub Menu Color', 'arangi' ),
	'description' => esc_html__( 'Controls the color of sub menu.', 'arangi' ),
	'section'     => $section,
	'priority'    => $priority ++,
	'default'     => '#333333',
	'output'      => array(
		array(
			'element' => '.menu-mobile .mega-menu > li .sub-menu > li a',
			'property' => 'color',
			'media_query' => '@media (max-width: 991px)'
		),
	),
) );
arrowpress_customizer() ->add_field(   array(
	'type'        => 'color-alpha',
	'settings'    => $prefix . 'border',
	'label'       => esc_html__( 'Border Color', 'arangi' ),
	'description' => esc_html__( 'Controls the border color of header mobile.', 'arangi' ),
	'section'     => $section,
	'priority'    => $priority ++,
	'default'     => '#cac9c7',
	'output'      => array(
		array(
			'element' => '#site-navigation li',
			'property' => 'border-color',
			'media_query' => '@media (max-width: 991px)'
		),
	),
) );

