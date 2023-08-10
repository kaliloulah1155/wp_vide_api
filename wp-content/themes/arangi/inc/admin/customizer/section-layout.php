<?php
$section  = 'layout';
$priority = 1;
$prefix   = 'site_';
arrowpress_customizer() ->add_field(   array(
	'type'        => 'radio-buttonset',
	'settings'    => $prefix . 'layout',
	'label'       => esc_html__( 'General', 'arangi' ),
	'description' => esc_html__( 'Controls the site general.', 'arangi' ),
	'section'     => $section,
	'priority'    => $priority ++,
	'default'     => 'wide',
	'choices'     => array(
		'boxed' => esc_html__( 'Boxed', 'arangi' ),
		'wide'  => esc_html__( 'Wide', 'arangi' ),
	),
) );
arrowpress_customizer() ->add_field(   array(
	'type'        => 'dimension',
	'settings'    => $prefix . 'width',
	'label'       => esc_html__( 'Site Width', 'arangi' ),
	'description' => esc_html__( 'Controls the overall site width. Enter value including any valid CSS unit, ex: 1200px.', 'arangi' ),
	'section'     => $section,
	'priority'    => $priority ++,
	'default'     => '1200px',
) );