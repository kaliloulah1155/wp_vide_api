<?php
$section  = 'logo-config';
$priority = 1;
$prefix   = 'general_';
arrowpress_customizer() ->add_field(   array(
	'type'     => 'image',
	'settings' => 'logo',
	'label'    => esc_html__( 'Logo', 'arangi' ),
	'description' => esc_html__('Select an image file for your logo','arangi'),
	'section'  => $section,
	'priority' => $priority ++,
	'transport' => 'auto',
	'default'  => ARANGI_THEME_URI . '/assets/images/logo.png',
) );
arrowpress_customizer() ->add_field(   array(
	'type'      => 'slider',
	'settings'  => 'logo_size',
	'label'     => esc_html__( 'Height Logo', 'arangi' ),
	'description' => esc_html__('Select max height for your logo','arangi'),
	'section'   => $section,
	'priority'  => $priority ++,
	'default'   => '50',
	'transport' => 'refresh',
	'choices'   => array(
		'min'  => 30,
		'max'  => 200,
		'step' => 1,
	),
	'output'    => array(
		array(
			'element'     => '.logo img, .mobile-logo img',
			'property'    => 'max-height',
			'units'       => 'px',
		),
	),
) );