<?php
$section  = 'slide-config';
$priority = 1;
$prefix   = 'slide_';
arrowpress_customizer() ->add_field(   [
    'type'        => 'multicolor',
    'settings'    => $prefix . 'background_gradient',
    'label'       => esc_html__( 'Select the color for the homepage when changing the slide', 'arangi' ),
    'section'     => $section,
	'priority'    => $priority ++,
	'transport'   => 'auto',
    'choices'     => [
        'color1'  => esc_html__( 'Slide 1 Color', 'arangi' ),
        'color2'  => esc_html__( 'Slide 2 Color', 'arangi' ),
        'color3'  => esc_html__( 'Slide 3 Color', 'arangi' ),
        'color4'  => esc_html__( 'Slide 4 Color', 'arangi' ),
        'color5'  => esc_html__( 'Slide 5 Color', 'arangi' ),
        'color6'  => esc_html__( 'Slide 6 Color', 'arangi' ),
    ],
    'default'     => [
        'color1'  => '#4d772d',
        'color2'  => '#fcbe47',
        'color3'  => '#e32748',
        'color4'  => '',
        'color5'  => '',
        'color6'  => '',
    ],
] );