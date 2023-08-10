<?php
$section  = 'color-config';
$priority = 1;
$prefix   = 'general_';
arrowpress_customizer() ->add_field(   array(
    'type'        => 'background',
    'settings'    => $prefix . 'image_body',
    'label'       => esc_html__( 'Background', 'arangi' ),
    'description' => esc_html__( 'Controls background of the outer background area in boxed mode.', 'arangi' ),
    'section'     => $section,
    'priority'    => $priority ++,
    'default'     => array(
        'background-color'      => '#fff',
        'background-image'      => '',
        'background-repeat'     => 'no-repeat',
        'background-size'       => 'cover',
        'background-attachment' => 'scroll',
        'background-position'   => 'top center',
    ),
    'output'      => array(
        array(
            'element' => 'html body',
        ),
    ),
) );
arrowpress_customizer() ->add_field(   array(
	'type'        => 'color-alpha',
	'settings'    => 'primary_color',
	'label'       => esc_html__( 'Primary Color', 'arangi' ),
	'description' => esc_html__( 'If you select a color, there is only one main color, while two colors change it to a gradient.', 'arangi' ),
	'section'     => $section,
	'priority'    => $priority ++,
	'transport'   => 'auto',
	'default'     => Arangi::PRIMARY_COLOR,
) );
arrowpress_customizer() ->add_field(   array(
    'type'        => 'color-alpha',
    'settings'    => 'secondary_color',
    'section'     => $section,
    'priority'    => $priority ++,
    'transport'   => 'auto',
    'default'     => Arangi::SECONDARY_COLOR,
) );
arrowpress_customizer() ->add_field(   array(
    'type'        => 'color-alpha',
    'settings'    => 'hightlight_color',
    'label'       => esc_html__( 'Hightlight Color', 'arangi' ),
    'description' => esc_html__( ' Controls the gradient color.', 'arangi' ),
    'section'     => $section,
    'priority'    => $priority ++,
    'transport'   => 'auto',
    'default'     => Arangi::HIGHTLIGHT_COLOR,
) );