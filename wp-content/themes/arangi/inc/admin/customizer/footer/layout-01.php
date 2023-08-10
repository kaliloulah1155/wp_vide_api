<?php
$section  = 'footer_layout_01';
$priority = 1;
$prefix   = 'footer_01_';
$yes = esc_html__( 'Yes', 'arangi' );
$no = esc_html__( 'No', 'arangi' );
arrowpress_customizer() ->add_field(   array(
	'type'        => 'radio-buttonset',
	'settings'    => $prefix . 'show_newsletter',
	'label'       => esc_html__( 'Show/hide Newsletter', 'arangi' ),
	'section'     => $section,
	'priority'    => $priority ++,
	'default'     => '1',
	'choices'     => array(
		'0' => $no,
		'1' => $yes,
	),
) );
arrowpress_customizer() ->add_field(   array(
	'type'        => 'background',
	'settings'    => $prefix . 'background',
	'label'       => esc_html__( 'Background', 'arangi' ),
	'description' => esc_html__( 'Controls the background of footer.', 'arangi' ),
	'section'     => $section,
	'priority'    => $priority ++,
	'default'     => array(
		'background-color'      => 'rgba(255, 255, 255, 1)',
		'background-image'      => '',
		'background-repeat'     => 'no-repeat',
		'background-size'       => 'cover',
		'background-attachment' => 'scroll',
		'background-position'   => 'center center',
	),
	'output'      => array(
		array(
			'element' => '.footer-01',
		),
	),
) );
arrowpress_customizer() ->add_field(   array(
	'type'        => 'color-alpha',
	'settings'    => $prefix . 'tt_color',
	'label'       => esc_html__( 'Text Title Color', 'arangi' ),
	'description' => esc_html__( 'Controls the title color of text on footer.', 'arangi' ),
	'section'     => $section,
	'priority'    => $priority ++,
	'transport'   => 'auto',
	'default'     => '#333',
	'output'      => array(
		array(
			'element'  => '
				.footer-01 .widget-title',
			'property' => 'color',
		),
	),
) );
arrowpress_customizer() ->add_field(   array(
	'type'        => 'color-alpha',
	'settings'    => $prefix . 'text_color',
	'label'       => esc_html__( 'Text color', 'arangi' ),
	'description' => esc_html__( 'Controls the color of text on footer.', 'arangi' ),
	'section'     => $section,
	'priority'    => $priority ++,
	'transport'   => 'auto',
	'default'     => '#333',
	'output'      => array(
		array(
			'element'  => '
				.footer-01,
				.footer-01 .list-info-contact li span,
				.footer-01 .list-info-contact li span',
			'property' => 'color',
		),
	),
) );
arrowpress_customizer() ->add_field(   array(
	'type'        => 'color-alpha',
	'settings'    => $prefix . 'link_color',
	'label'       => esc_html__( 'Link color', 'arangi' ),
	'description' => esc_html__( 'Controls the color of text on footer.', 'arangi' ),
	'section'     => $section,
	'priority'    => $priority ++,
	'transport'   => 'auto',
	'default'     => '#6d6b6c',
	'output'      => array(
		array(
			'element'  => '
				.footer-01 .widget_nav_menu li a,
				.footer-01 .copyright-content p,
				.footer-01 .copyright-content p a,
				.footer-01 .payment ul li a,
				.footer-01 .list-info-contact li,
				.footer-01 .list-info-contact li p',
			'property' => 'color',
		),
	),
) );
arrowpress_customizer() ->add_field(   array(
	'type'        => 'color-alpha',
	'settings'    => $prefix . 'link_hover_color',
	'label'       => esc_html__( 'Link hover color', 'arangi' ),
	'description' => esc_html__( 'Controls the color of text on footer.', 'arangi' ),
	'section'     => $section,
	'priority'    => $priority ++,
	'transport'   => 'auto',
	'default'     => '',
	'output'      => array(
		array(
			'element'  => '
				.footer-01 .widget_nav_menu li a:hover,
				.footer-01 .copyright-content p a:hover,
				.footer-01 .payment ul li a:hover',
			'property' => 'color',
		),
		array(
			'element'  => '
				.footer-01 .widget_nav_menu li a:hover:before',
			'property' => 'background',
		),
	),
) );
arrowpress_customizer() ->add_field(   array(
	'type'        => 'background',
	'settings'    => $prefix . 'background_bottom',
	'label'       => esc_html__( 'Background bottom footer', 'arangi' ),
	'description' => esc_html__( 'Controls the background of footer.', 'arangi' ),
	'section'     => $section,
	'priority'    => $priority ++,
	'default'     => array(
		'background-color'      => 'rgba(244, 245, 248, 1)',
		'background-image'      => '',
		'background-repeat'     => 'no-repeat',
		'background-size'       => 'cover',
		'background-attachment' => 'scroll',
		'background-position'   => 'center center',
	),
	'output'      => array(
		array(
			'element' => '.footer-01 .footer-bottom',
		),
	),
) );