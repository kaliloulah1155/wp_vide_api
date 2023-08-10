<?php
$section  = 'account';
$priority = 1;
$prefix   = 'account_';
arrowpress_customizer() ->add_field(   array(
	'type'     => 'radio-buttonset',
	'settings' => 'setting_popup',
	'label'    => esc_html__( 'Show/Hide Account.', 'arangi' ),
	'section'  => $section,
	'priority' => $priority ++,
	'default'  => '1',
	'choices'  => array(
		'0' => esc_html__( 'No', 'arangi' ),
		'1' => esc_html__( 'Yes', 'arangi' ),
	),
) );
arrowpress_customizer() ->add_field(   [
    'type'        => 'multicolor',
    'settings'    => $prefix . 'background_gradient',
    'label'       => esc_html__( 'Background Color Account', 'arangi' ),
    'section'     => $section,
	'priority'    => $priority ++,
	'transport'   => 'auto',
    'choices'     => [
        'top'     => esc_html__( 'Top Color', 'arangi' ),
        'bottom'  => esc_html__( 'Bottom Color', 'arangi' ),
    ],
    'default'     => [
        'top'     => '',
        'bottom'  => '',
    ],
	'required'  => array(
        array(
            'setting'  => 'setting_popup',
            'operator' => '==',
            'value'    => 1,
        ),
    ), 
] );
arrowpress_customizer() ->add_field(   array(
	'type'     => 'text',
	'settings' => $prefix . 'width',
	'label'    => esc_html__( 'Width Account', 'arangi' ),
	'section'  => $section,
	'priority' => $priority ++,
	'default'  => '',
	'output'      => array(
        array(
			'media_query' => '@media (min-width: 767px)',
            'element' => '.account-popup',
			'property' => 'width',
        ),
    ),
	'required'  => array(
        array(
            'setting'  => 'setting_popup',
            'operator' => '==',
            'value'    => 1,
        ),
    ), 
) );
arrowpress_customizer() ->add_field(   array(
	'type'     => 'image',
	'settings' => $prefix . 'logo_account',
	'label'    => esc_html__( 'Logo Account', 'arangi' ),
	'description' => esc_html__('Select an image file for your logo','arangi'),
	'section'  => $section,
	'priority' => $priority ++,
	'transport' => 'auto',
	'default'  => ARANGI_THEME_URI . '/assets/images/logo-account.png',
	'required'  => array(
        array(
            'setting'  => 'setting_popup',
            'operator' => '==',
            'value'    => 1,
        ),
    ), 
) );
arrowpress_customizer() ->add_field(   array(
	'type'     => 'text',
	'settings' => $prefix . 'title_login',
	'label'    => esc_html__( 'Title Login', 'arangi' ),
	'description'    => esc_html__( 'Show with site using one language', 'arangi' ),
	'section'  => $section,
	'priority' => $priority ++,
	'default'  => esc_html__( 'Login', 'arangi' ),
	'required'  => array(
        array(
            'setting'  => 'setting_popup',
            'operator' => '==',
            'value'    => 1,
        ),
    ), 
) );
arrowpress_customizer() ->add_field(   array(
	'type'     => 'text',
	'settings' => $prefix . 'title_register',
	'label'    => esc_html__( 'Title Register', 'arangi' ),
	'description'    => esc_html__( 'Show with site using one language', 'arangi' ),
	'section'  => $section,
	'priority' => $priority ++,
	'default'  => esc_html__( 'Register', 'arangi' ),
	'required'  => array(
        array(
            'setting'  => 'setting_popup',
            'operator' => '==',
            'value'    => 1,
        ),
    ), 
) );
arrowpress_customizer() ->add_field(   array(
    'type'        => 'color',
    'settings'    => $prefix . 'title_color',
	'label'    => esc_html__( 'Title Color', 'arangi' ),
    'section'     => $section,
    'priority'    => $priority ++,
    'transport'   => 'auto',
    'default'     => '',
	'output'      => array(
        array(
            'element' => '.account-popup .nav-tabs .nav-link.active',
			'property' => 'color',
            'suffix'   => ' !important',
        ),
    ),
	'required'  => array(
        array(
            'setting'  => 'setting_popup',
            'operator' => '==',
            'value'    => 1,
        ),
    ), 
) );
arrowpress_customizer() ->add_field(   array(
    'type'        => 'color',
    'settings'    => $prefix . 'color',
	'label'    => esc_html__( 'Text Color', 'arangi' ),
    'section'     => $section,
    'priority'    => $priority ++,
    'transport'   => 'auto',
    'default'     => '',
	'output'      => array(
        array(
            'element' => '.account-popup .form-row label,
						.account-popup .lost_password a,
						.account-popup .input-text,
						.account-popup .woocommerce-form__label-for-checkbox span',
			'property' => 'color',
            'suffix'   => ' !important',
        ),
    ),
	'required'  => array(
        array(
            'setting'  => 'setting_popup',
            'operator' => '==',
            'value'    => 1,
        ),
    ), 
) );
arrowpress_customizer() ->add_field(   array(
    'type'        => 'color',
    'settings'    => $prefix . 'border',
	'label'    => esc_html__( 'Border Color Input', 'arangi' ),
    'section'     => $section,
    'priority'    => $priority ++,
    'transport'   => 'auto',
    'default'     => '',
	'output'      => array(
        array(
            'element' => '.account-popup .tab-content form .form-row .input-text',
			'property' => 'border-bottom-color',
            'suffix'   => ' !important',
        ),
    ),
	'required'  => array(
        array(
            'setting'  => 'setting_popup',
            'operator' => '==',
            'value'    => 1,
        ),
    ), 
) );
arrowpress_customizer() ->add_field(   array(
    'type'        => 'color',
    'settings'    => $prefix . 'button',
	'label'    => esc_html__( 'Background Color Button', 'arangi' ),
    'section'     => $section,
    'priority'    => $priority ++,
    'transport'   => 'auto',
    'default'     => '',
	'output'      => array(
        array(
            'element' => '.account-popup form.woocommerce-form button.button',
			'property' => 'background-color',
        ),
    ),
	'required'  => array(
        array(
            'setting'  => 'setting_popup',
            'operator' => '==',
            'value'    => 1,
        ),
    ), 
) );