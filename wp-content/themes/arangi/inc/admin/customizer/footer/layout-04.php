<?php
$section  = 'footer_layout_04';
$priority = 1;
$prefix   = 'footer_04_';
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
	'type'     => 'image',
	'settings' => 'top_img',
	'label'    => esc_html__( 'Top Background', 'arangi' ),
	'section'  => $section,
	'priority' => $priority ++,
	'default'  => ARANGI_THEME_URI . '/assets/images/bg-sectop-top2.png',
) );
arrowpress_customizer() ->add_field(   array(
	'type'        => 'background',
	'settings'    => $prefix . 'background',
	'label'       => esc_html__( 'Background', 'arangi' ),
	'description' => esc_html__( 'Controls the background of footer.', 'arangi' ),
	'section'     => $section,
	'priority'    => $priority ++,
	'default'     => array(
		'background-color'      => '',
		'background-image'      => '',
		'background-repeat'     => 'repeat',
		'background-size'       => 'cover',
		'background-attachment' => 'scroll',
		'background-position'   => 'top center',
	),
	'output'      => array(
		array(
			'element' => '.footer-04 .row-bg',
		),
	),
) );
arrowpress_customizer() ->add_field(   array(
	'type'     => 'image',
	'settings' => 'bottom_img',
	'label'    => esc_html__( 'Top Background', 'arangi' ),
	'section'  => $section,
	'priority' => $priority ++,
	'default'  => ARANGI_THEME_URI . '/assets/images/bg-sectop-bottom2.png',
) );
arrowpress_customizer() ->add_field(   array(
	'type'        => 'color-alpha',
	'settings'    => $prefix . 'text_color',
	'label'       => esc_html__( 'Text Color', 'arangi' ),
	'description' => esc_html__( 'Controls the color of text on footer.', 'arangi' ),
	'section'     => $section,
	'priority'    => $priority ++,
	'transport'   => 'auto',
	'default'     => '',
	'output'      => array(
		array(
			'element'  => '
				.footer-04,
				.footer-04 .widget_nav_menu ul li a,
				.footer-04 .footer-social ul li a,
				.footer-04 .copyright-content p,
				.footer-04 .copyright-content p a,
				.footer-04 .mc4wp-form-fields .desc,
				.footer-04 .list-info-contact li a',
			'property' => 'color',
		),
	),
) );
arrowpress_customizer() ->add_field(   array(
	'type'        => 'color-alpha',
	'settings'    => $prefix . 'tt_color',
	'label'       => esc_html__( 'Title Color', 'arangi' ),
	'description' => esc_html__( 'Controls the color of text on footer.', 'arangi' ),
	'section'     => $section,
	'priority'    => $priority ++,
	'transport'   => 'auto',
	'default'     => '#333',
	'output'      => array(
		array(
			'element'  => '
				.footer-04 .widget-title,
				.footer-04 .list-info-contact li span',
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
				.footer-04 .widget_nav_menu li a:hover,
				.footer-04 .list-info-contact li a:hover,
				.footer-04 .payment ul li a:hover,
				.footer-04 .list-info-contact li.info-mail a',
			'property' => 'color',
		),
		array(
			'element'  => '
				.footer-04 .widget_nav_menu li a:hover:before',
			'property' => 'background',
		),
	),
) );
arrowpress_customizer() ->add_field(   array(
	'type'        => 'color-alpha',
	'settings'    => $prefix . 'border_bottom',
	'label'       => esc_html__( 'Border bottom footer', 'arangi' ),
	'description' => esc_html__( 'Controls the border color of footer.', 'arangi' ),
	'section'     => $section,
	'priority'    => $priority ++,
	'default'     => '',
	'output'    => array(
		array(
			'element'  => '.footer-04 .border-line',
			'property' => 'border-bottom-color',
		),
	),
) );