<?php
$section  = 'footer_layout_02';
$priority = 1;
$prefix   = 'footer_02_';
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
	'type'        => 'color-alpha',
	'settings'    => $prefix . 'background_newsletter',
	'label'       => esc_html__( 'Background Newsletter', 'arangi' ),
	'description' => esc_html__( 'Controls the background of Newsletter.', 'arangi' ),
	'section'     => $section,
	'priority'    => $priority ++,
	'default'     => Arangi::PRIMARY_COLOR,
	'output'      => array(
		array(
			'element' => '.footer-02 .footer-newsletter:after',
			'property' => 'background',
		),
	),
	'required'  => array(
        array(
            'setting'  => 'footer_02_show_newsletter',
            'operator' => '==',
            'value'    => 1,
        ),
    ), 
) );

arrowpress_customizer() ->add_field(   array(
	'type'        => 'color-alpha',
	'settings'    => $prefix . 'newsletter_tt_after_color',
	'label'       => esc_html__( 'After Title Newsletter Color', 'arangi' ),
	'description' => esc_html__( 'Controls the title after color of text on Newsletter.', 'arangi' ),
	'section'     => $section,
	'priority'    => $priority ++,
	'transport'   => 'auto',
	'default'     => 'rgba(67,67,67,0.08)',
	'output'      => array(
		array(
			'element'  => '
				.footer-02 .newsletter_title .title-after',
			'property' => 'color',
		),
	),
	'required'  => array(
        array(
            'setting'  => 'footer_02_show_newsletter',
            'operator' => '==',
            'value'    => 1,
        ),
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
		'background-color'      => 'rgba(69, 69, 69, 1)',
		'background-image'      => '',
		'background-repeat'     => 'no-repeat',
		'background-size'       => 'cover',
		'background-attachment' => 'scroll',
		'background-position'   => 'center center',
	),
	'output'      => array(
		array(
			'element' => '.footer-02',
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
	'default'     => '#fff',
	'output'      => array(
		array(
			'element'  => '
				.footer-02 .widget-title',
			'property' => 'color',
		),
	),
) );
arrowpress_customizer() ->add_field(   array(
	'type'        => 'color-alpha',
	'settings'    => $prefix . 'text_color',
	'label'       => esc_html__( 'Text Color', 'arangi' ),
	'description' => esc_html__( 'Controls the color of text on footer.', 'arangi' ),
	'section'     => $section,
	'priority'    => $priority ++,
	'transport'   => 'auto',
	'default'     => '#a39d9f',
	'output'      => array(
		array(
			'element'  => '
				.footer-02,
				.footer-02 .textwidget p,
				.footer-02 .widget_nav_menu li a,
				.footer-02 .list-info-contact li,
				.footer-02 .list-info-contact li p,
				.footer-02 .list-info-contact li a,
				.footer-02 .copyright-content p,
				.footer-02 .payment ul li a',
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
				.footer-02 .widget_nav_menu li a:hover,
				.footer-02 .list-info-contact li a:hover,
				.footer-02 .payment ul li a:hover',
			'property' => 'color',
		),
		array(
			'element'  => '
				.footer-02 .widget_nav_menu li a:hover:before',
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
	'default'     => '#3c3c3c',
	'output'    => array(
		array(
			'element'  => '.footer-02 .bottom-footer:before',
			'property' => 'background',
		),
	),
) );