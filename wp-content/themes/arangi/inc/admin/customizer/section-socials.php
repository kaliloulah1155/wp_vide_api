<?php
$section  = 'socials';
$priority = 1;
$prefix   = 'social_';
arrowpress_customizer() ->add_field(   array(
	'type'     => 'radio-buttonset',
	'settings' => 'social_config',
	'label'    => esc_html__( 'Show/Hide social.', 'arangi' ),
	'section'  => $section,
	'priority' => $priority ++,
	'default'  => '1',
	'choices'  => array(
		'0' => esc_html__( 'No', 'arangi' ),
		'1' => esc_html__( 'Yes', 'arangi' ),
	),
) );
arrowpress_customizer() ->add_field(   array(
	'type'     => 'radio-buttonset',
	'settings' => 'social_link_target',
	'label'    => esc_html__( 'Open link in a new tab.', 'arangi' ),
	'section'  => $section,
	'priority' => $priority ++,
	'default'  => '1',
	'choices'  => array(
		'0' => esc_html__( 'No', 'arangi' ),
		'1' => esc_html__( 'Yes', 'arangi' ),
	),
	'required'  => array(
        array(
            'setting'  => 'social_config',
            'operator' => '==',
            'value'    => 1,
        ),
    ), 
) );
arrowpress_customizer() ->add_field(   array(
	'type'      => 'repeater',
	'settings'  => 'social_links',
	'section'   => $section,
	'priority'  => $priority ++,
	'choices'   => array(
		'labels' => array(
			'add-new-row' => esc_html__( 'Add new social network', 'arangi' ),
		),
	),
	'row_label' => array(
		'type'  => 'field',
		'field' => 'tooltip',
	),
	'required'  => array(
        array(
            'setting'  => 'social_config',
            'operator' => '==',
            'value'    => 1,
        ),
    ), 
	'default'   => array(
		array(
			'tooltip'    => esc_html__( 'Pinterest', 'arangi' ),
			'icon_class' => 'ti-pinterest-alt',
			'link_url'   => 'https://www.pinterest.com/',
		),
		array(
			'tooltip'    => esc_html__( 'Instagram', 'arangi' ),
			'icon_class' => 'ti-instagram',
			'link_url'   => 'https://www.instagram.com',
		),
		array(
			'tooltip'    => esc_html__( 'Twitter', 'arangi' ),
			'icon_class' => 'ti-twitter-alt',
			'link_url'   => 'https://twitter.com',
		),
		array(
			'tooltip'    => esc_html__( 'Facebook', 'arangi' ),
			'icon_class' => 'ti-facebook',
			'link_url'   => 'https://facebook.com',
		),
		array(
			'tooltip'    => esc_html__( 'Linkedin', 'arangi' ),
			'icon_class' => 'ti-linkedin',
			'link_url'   => '#',
		),
		array(
			'tooltip'    => esc_html__( 'Google', 'arangi' ),
			'icon_class' => 'ti-google',
			'link_url'   => '',
		),
		array(
			'tooltip'    => esc_html__( 'Youtube', 'arangi' ),
			'icon_class' => 'ti-youtube',
			'link_url'   => '',
		),
		array(
			'tooltip'    => esc_html__( 'Skype', 'arangi' ),
			'icon_class' => 'ti-skype',
			'link_url'   => '',
		),
		array(
			'tooltip'    => esc_html__( 'Dribbble', 'arangi' ),
			'icon_class' => 'ti-dribbble',
			'link_url'   => '',
		),
		
	),
	'fields'    => array(
		'tooltip'    => array(
			'type'        => 'text',
			'label'       => esc_html__( 'Tooltip', 'arangi' ),
			'description' => esc_html__( 'Enter your hint text for your icon', 'arangi' ),
			'default'     => '',
		),
		'icon_class' => array(
			'type'        => 'text',
			'label'       => esc_html__( 'Icon Class', 'arangi' ),
			'description' => esc_html__( 'This will be the icon class for your link', 'arangi' ),
			'default'     => '',
		),
		'link_url'   => array(
			'type'        => 'text',
			'label'       => esc_html__( 'Link URL', 'arangi' ),
			'description' => esc_html__( 'This will be the link URL', 'arangi' ),
			'default'     => '',
		),
	),
) );
