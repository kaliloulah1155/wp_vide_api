<?php
$section  = 'layout-config';
$priority = 1;
$prefix   = 'layout_';
$registered_sidebars = Arangi_Helper::get_registered_sidebars();
arrowpress_customizer() ->add_field(   array(
    'type'        => 'radio-buttonset',
    'settings'    => $prefix . 'site',
    'label'       => esc_html__( 'General Layout', 'arangi' ),
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
    'type'        => 'radio-buttonset',
    'settings'    => $prefix . 'main_layout',
    'label'       => esc_html__( 'Main Layout', 'arangi' ),
    'section'     => $section,
    'priority'    => $priority ++,
    'default'     => 'main-1',
    'choices'     => array(
        'main-1' => esc_html__( 'Default', 'arangi' ),
        'main-2'   => esc_html__( 'Main Layout 2', 'arangi' ),
    ),
) );
arrowpress_customizer() ->add_field(   array(
	'type'        => 'background',
	'settings'    => $prefix . 'background_section',
	'label'       => esc_html__( 'Background Section', 'arangi' ),
	'description' => esc_html__( 'Controls the background of section.', 'arangi' ),
	'section'     => $section,
	'priority'    => $priority ++,
	'default'     => array(
		'background-color'      => '#fde4e7',
		'background-image'      => '',
		'background-repeat'     => 'no-repeat',
		'background-size'       => 'cover',
		'background-attachment' => 'scroll',
		'background-position'   => 'top center',
    ),
    'required'  => array(
        array(
            'setting'  => $prefix . 'main_layout',
            'operator' => 'contains',
            'value'    => 'main-2',
        ),
    ),
	'output'      => array(
		array(
			'element' => '.main-2 .bg-layout-2',
		),
	),
) );
arrowpress_customizer() ->add_field(   array(
	'type'     => 'image',
	'settings' => $prefix . 'top_img',
	'label'    => esc_html__( 'Top Background Section', 'arangi' ),
	'section'  => $section,
	'priority' => $priority ++,
    'default'  => ARANGI_THEME_URI . '/assets/images/bg-sectop-top.png',
    'required'  => array(
        array(
            'setting'  => $prefix . 'main_layout',
            'operator' => 'contains',
            'value'    => 'main-2',
        ),
    ),
) );
arrowpress_customizer() ->add_field(   array(
	'type'     => 'image',
	'settings' => $prefix . 'bottom_img',
	'label'    => esc_html__( 'Bottom Background Section', 'arangi' ),
	'section'  => $section,
	'priority' => $priority ++,
    'default'  => ARANGI_THEME_URI . '/assets/images/bg-sectop-bottom.png',
    'required'  => array(
        array(
            'setting'  => $prefix . 'main_layout',
            'operator' => 'contains',
            'value'    => 'main-2',
        ),
    ),
) );
arrowpress_customizer() ->add_field(   array(
    'type'        => 'dimension',
    'settings'    => $prefix . 'width',
    'label'       => esc_html__( 'Site Width', 'arangi' ),
    'description' => esc_html__( 'Controls the overall site width (layout: full width). Enter value including any valid CSS unit, ex: 1170px.', 'arangi' ),
    'section'     => $section,
    'priority'    => $priority ++,
    'default'     => '',
    'output'      => array(
        array(
            'element' => '.container, .elementor-inner .elementor-section.elementor-section-boxed>.elementor-container',
            'property'    => 'max-width',
            'media_query' => '@media (min-width: 1200px)'
        ),
    ),
) );
arrowpress_customizer() ->add_field(   array(
    'type'        => 'select',
    'settings'    => 'general_left_sidebar',
    'label'       => esc_html__( 'Sidebar Left', 'arangi' ),
    'description' => esc_html__( 'Select sidebar left.', 'arangi' ),
    'section'     => $section,
    'priority'    => $priority ++,
    'default'     => '',
    'choices'     => $registered_sidebars,
) );
arrowpress_customizer() ->add_field(   array(
    'type'        => 'select',
    'settings'    => 'general_right_sidebar',
    'label'       => esc_html__( 'Sidebar Right', 'arangi' ),
    'description' => esc_html__( 'Select sidebar right.', 'arangi' ),
    'section'     => $section,
    'priority'    => $priority ++,
    'default'     => '',
    'choices'     => $registered_sidebars,
) );