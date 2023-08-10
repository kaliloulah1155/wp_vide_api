<?php
$section  = 'sale_off';
$priority = 1;
$prefix   = 'sale_off_';
arrowpress_customizer() ->add_field(   array(
	'type'     => 'radio-buttonset',
	'settings' => 'setting_popup_sale_off',
	'label'    => esc_html__( 'Show/Hide Popup.', 'arangi' ),
	'section'  => $section,
	'priority' => $priority ++,
	'default'  => '0',
	'choices'  => array(
		'0' => esc_html__( 'No', 'arangi' ),
		'1' => esc_html__( 'Yes', 'arangi' ),
	),
) );
arrowpress_customizer() ->add_field(   array(
	'type'     => 'text',
	'settings' => 'height_popup',
	'label'    => esc_html__( 'Height Popup', 'arangi' ),
	'section'  => $section,
	'priority' => $priority ++,
	'default'  => '502px',
	'required'  => array(
        array(
            'setting'  => 'setting_popup_sale_off',
            'operator' => '==',
            'value'    => 1,
        ),
    ),
    'output'      => array(
		array(
			'element'  => '.popup-sale-off',
			'property' => 'height',
		),
	), 
) );
arrowpress_customizer() ->add_field(   array(
	'type'     => 'text',
	'settings' => 'width_popup',
	'label'    => esc_html__( 'Width Popup', 'arangi' ),
	'section'  => $section,
	'priority' => $priority ++,
	'default'  => '770px',
	'required'  => array(
        array(
            'setting'  => 'setting_popup_sale_off',
            'operator' => '==',
            'value'    => 1,
        ),
    ),
    'output'      => array(
		array(
			'element'  => '.popup-sale-off',
			'property' => 'width',
		),
	),  
) );
arrowpress_customizer() ->add_field(   array(
	'type'     => 'color',
	'settings' => $prefix . 'main_bg',
	'label'    => esc_html__( 'Background Main Color', 'arangi' ),
	'section'  => $section,
	'priority' => $priority ++,
	'default'  => '#fff',
	'required'  => array(
        array(
            'setting'  => 'setting_popup_sale_off',
            'operator' => '==',
            'value'    => 1,
        ),
    ),
    'output'      => array(
		array(
			'element'  => '.popup-sale-off',
			'property' => 'background-color',
		),
	),  
) );
arrowpress_customizer() ->add_field(   array(
    'type'        => 'background',
    'settings'    => $prefix . 'bg',
    'label'       => esc_html__( 'Background', 'arangi' ),
    'description' => esc_html__( 'Controls background of the outer background area in boxed mode.', 'arangi' ),
    'section'     => $section,
    'priority'    => $priority ++,
    'default'     => array(
        'background-color'      => '#dfdfdf',
        'background-image'      => '',
        'background-repeat'     => 'no-repeat',
        'background-size'       => 'cover',
        'background-attachment' => 'fixed',
        'background-position'   => 'center center',
    ),
    'output'      => array(
        array(
            'element' => '.popup-sale-off:before',
        ),
    ),
    'required'  => array(
        array(
            'setting'  => 'setting_popup_sale_off',
            'operator' => '==',
            'value'    => 1,
        ),
    ), 
) );
arrowpress_customizer() ->add_field(   array(
	'type'     => 'custom',
	'settings' => $prefix . 'group_before_title' . $priority ++,
	'section'  => $section,
	'priority' => $priority ++,
	'default'  => '<div class="big_title">' . esc_html__( 'Before title', 'arangi' ) . '</div>',
	'required'  => array(
        array(
            'setting'  => 'setting_popup_sale_off',
            'operator' => '==',
            'value'    => 1,
        ),
    ), 
) );
arrowpress_customizer() ->add_field(   array(
	'type'     => 'text',
	'settings' => $prefix . 'before_title',
	'label'    => esc_html__( 'Text', 'arangi' ),
	'section'  => $section,
	'priority' => $priority ++,
	'default'  => 'Lucky You!',
	'required'  => array(
        array(
            'setting'  => 'setting_popup_sale_off',
            'operator' => '==',
            'value'    => 1,
        ),
    ), 
) );
arrowpress_customizer() ->add_field(   array(
	'type'        => 'typography',
	'settings'    => $prefix . 'body_before_title',
	'label'       => esc_html__( 'Font family', 'arangi' ),
	'description' => esc_html__( 'These settings control the title text.', 'arangi' ),
	'section'     => $section,
	'priority'    => $priority ++,
	'transport'   => 'auto',
	'required'  => array(
        array(
            'setting'  => 'setting_popup_sale_off',
            'operator' => '==',
            'value'    => 1,
        ),
    ), 
	'default'     => array(
		'font-family'    => Arangi::SECONDARY_FONT,
		'variant'        => 'regular',
		'line-height'    => '25px',
		'letter-spacing' => '0.2em',
		'text-transform' => 'uppercase'
	),
	'choices'     => array(
		'variant' => array(
			'100',
			'100italic',
			'200',
			'200italic',
			'300',
			'300italic',
			'regular',
			'italic',
			'500',
			'500italic',
			'600',
			'600italic',
			'700',
			'700italic',
			'800',
			'800italic',
			'900',
			'900italic',
		),
	),
	'output'      => array(
		array(
			'element' => '.popup-sale-off .before-title',
		),
	),
) );
arrowpress_customizer() ->add_field(   array(
	'type'        => 'color',
	'settings'    => 'color_before_title',
	'label'       => esc_html__( 'Color', 'arangi' ),
	'section'     => $section,
	'priority'    => $priority ++,
	'transport'   => 'auto',
	'default'     => '#333',
	'required'  => array(
        array(
            'setting'  => 'setting_popup_sale_off',
            'operator' => '==',
            'value'    => 1,
        ),
    ), 
	'output'      => array(
		array(
			'element'  => '.popup-sale-off .before-title',
			'property' => 'color',
		),
	),
) );
arrowpress_customizer() ->add_field(   array(
	'type'      => 'slider',
	'settings'  => 'font_size_before_title',
	'label'     => esc_html__( 'Font size', 'arangi' ),
	'section'   => $section,
	'priority'  => $priority ++,
	'default'   => 16,
	'transport' => 'auto',
	'choices'   => array(
		'min'  => 10,
		'max'  => 50,
		'step' => 1,
	),
	'output'    => array(
		array(
			'element'     => '.popup-sale-off .before-title',
			'property'    => 'font-size',
			'units'       => 'px',
		),
	),
	'required'  => array(
        array(
            'setting'  => 'setting_popup_sale_off',
            'operator' => '==',
            'value'    => 1,
        ),
    ), 
) );
arrowpress_customizer() ->add_field(   array(
	'type'     => 'custom',
	'settings' => $prefix . 'group_title' . $priority ++,
	'section'  => $section,
	'priority' => $priority ++,
	'default'  => '<div class="big_title">' . esc_html__( 'Form', 'arangi' ) . '</div>',
	'required'  => array(
        array(
            'setting'  => 'setting_popup_sale_off',
            'operator' => '==',
            'value'    => 1,
        ),
    ), 
) );
arrowpress_customizer() ->add_field(   array(
	'type'     => 'text',
	'settings' => $prefix . 'title',
	'label'    => esc_html__( 'Text', 'arangi' ),
	'section'  => $section,
	'priority' => $priority ++,
	'default'  => 'Want an instant',
	'required'  => array(
        array(
            'setting'  => 'setting_popup_sale_off',
            'operator' => '==',
            'value'    => 1,
        ),
    ), 
) );
arrowpress_customizer() ->add_field(   array(
	'type'        => 'typography',
	'settings'    => $prefix . 'body',
	'label'       => esc_html__( 'Font family', 'arangi' ),
	'description' => esc_html__( 'These settings control the title text.', 'arangi' ),
	'section'     => $section,
	'priority'    => $priority ++,
	'transport'   => 'auto',
	'required'  => array(
        array(
            'setting'  => 'setting_popup_sale_off',
            'operator' => '==',
            'value'    => 1,
        ),
    ),
	'default'     => array(
		'font-family'    => 'Raleway',
		'variant'        => '600',
		'line-height'    => '25px',
		'letter-spacing' => '0',
		'text-transform' => 'initial'
	),
	'choices'     => array(
		'variant' => array(
			'100',
			'100italic',
			'200',
			'200italic',
			'300',
			'300italic',
			'regular',
			'italic',
			'500',
			'500italic',
			'600',
			'600italic',
			'700',
			'700italic',
			'800',
			'800italic',
			'900',
			'900italic',
		),
	),
	'output'      => array(
		array(
			'element' => '.popup-sale-off .title',
		),
	),
) );
arrowpress_customizer() ->add_field(   array(
	'type'        => 'color',
	'settings'    => 'color_title',
	'label'       => esc_html__( 'Color', 'arangi' ),
	'section'     => $section,
	'priority'    => $priority ++,
	'transport'   => 'auto',
	'default'     => '#333',
	'output'      => array(
		array(
			'element'  => '.popup-sale-off .title',
			'property' => 'color',
		),
	),
	'required'  => array(
        array(
            'setting'  => 'setting_popup_sale_off',
            'operator' => '==',
            'value'    => 1,
        ),
    ), 
) );
arrowpress_customizer() ->add_field(   array(
	'type'      => 'slider',
	'settings'  => 'font_size_title',
	'label'     => esc_html__( 'Font size', 'arangi' ),
	'section'   => $section,
	'priority'  => $priority ++,
	'default'   => 40,
	'transport' => 'auto',
	'required'  => array(
        array(
            'setting'  => 'setting_popup_sale_off',
            'operator' => '==',
            'value'    => 1,
        ),
    ), 
	'choices'   => array(
		'min'  => 10,
		'max'  => 50,
		'step' => 1,
	),
	'output'    => array(
		array(
			'element'     => '.popup-sale-off .title',
			'property'    => 'font-size',
			'units'       => 'px',
		),
	),
) );
arrowpress_customizer() ->add_field(   array(
	'type'     => 'custom',
	'settings' => $prefix . 'group_after_title' . $priority ++,
	'section'  => $section,
	'priority' => $priority ++,
	'default'  => '<div class="big_title">' . esc_html__( 'After Title', 'arangi' ) . '</div>',
	'required'  => array(
        array(
            'setting'  => 'setting_popup_sale_off',
            'operator' => '==',
            'value'    => 1,
        ),
    ), 
) );
arrowpress_customizer() ->add_field(   array(
	'type'     => 'text',
	'settings' => $prefix . 'after_title',
	'label'    => esc_html__( 'Text', 'arangi' ),
	'section'  => $section,
	'priority' => $priority ++,
	'default'  => '10% off ?',
	'required'  => array(
        array(
            'setting'  => 'setting_popup_sale_off',
            'operator' => '==',
            'value'    => 1,
        ),
    ), 
) );
arrowpress_customizer() ->add_field(   array(
	'type'        => 'typography',
	'settings'    => $prefix . 'body_after_title',
	'label'       => esc_html__( 'Font family', 'arangi' ),
	'description' => esc_html__( 'These settings control the title text.', 'arangi' ),
	'section'     => $section,
	'priority'    => $priority ++,
	'transport'   => 'auto',
	'required'  => array(
        array(
            'setting'  => 'setting_popup_sale_off',
            'operator' => '==',
            'value'    => 1,
        ),
    ), 
	'default'     => array(
		'font-family'    => 'Raleway',
		'variant'        => '600',
		'line-height'    => '25px',
		'letter-spacing' => '0',
		'text-transform' => 'initial'
	),
	'choices'     => array(
		'variant' => array(
			'100',
			'100italic',
			'200',
			'200italic',
			'300',
			'300italic',
			'regular',
			'italic',
			'500',
			'500italic',
			'600',
			'600italic',
			'700',
			'700italic',
			'800',
			'800italic',
			'900',
			'900italic',
		),
	),
	'output'      => array(
		array(
			'element' => '.popup-sale-off .after-title',
		),
	),
) );
arrowpress_customizer() ->add_field(   array(
	'type'        => 'color',
	'settings'    => 'color_after_title',
	'label'       => esc_html__( 'Color', 'arangi' ),
	'section'     => $section,
	'priority'    => $priority ++,
	'transport'   => 'auto',
	'default'     => Arangi::PRIMARY_COLOR,
	'output'      => array(
		array(
			'element'  => '.popup-sale-off .after-title',
			'property' => 'color',
		),
	),
	'required'  => array(
        array(
            'setting'  => 'setting_popup_sale_off',
            'operator' => '==',
            'value'    => 1,
        ),
    ), 
) );
arrowpress_customizer() ->add_field(   array(
	'type'      => 'slider',
	'settings'  => 'font_size_after_title',
	'label'     => esc_html__( 'Font size', 'arangi' ),
	'section'   => $section,
	'priority'  => $priority ++,
	'default'   => 40,
	'transport' => 'auto',
	'choices'   => array(
		'min'  => 10,
		'max'  => 50,
		'step' => 1,
	),
	'output'    => array(
		array(
			'element'     => '.popup-sale-off .after-title',
			'property'    => 'font-size',
			'units'       => 'px',
		),
	),
	'required'  => array(
        array(
            'setting'  => 'setting_popup_sale_off',
            'operator' => '==',
            'value'    => 1,
        ),
    ), 
) );
arrowpress_customizer() ->add_field(   array(
	'type'     => 'custom',
	'settings' => $prefix . 'group_title' . $priority ++,
	'section'  => $section,
	'priority' => $priority ++,
	'default'  => '<div class="big_title">' . esc_html__( 'Form Style', 'arangi' ) . '</div>',
	'required'  => array(
        array(
            'setting'  => 'setting_popup_sale_off',
            'operator' => '==',
            'value'    => 1,
        ),
    ), 
) );
arrowpress_customizer() ->add_field(   array(
	'type'        => 'color',
	'settings'    => 'color_input',
	'label'       => esc_html__( ' Input and Label Color', 'arangi' ),
	'section'     => $section,
	'priority'    => $priority ++,
	'transport'   => 'auto',
	'default'     => '#787475',
	'required'  => array(
        array(
            'setting'  => 'setting_popup_sale_off',
            'operator' => '==',
            'value'    => 1,
        ),
    ), 
	'output'      => array(
		array(
			'element'  => '.popup-sale-off .mc4wp-form-fields input[type=email], 
							.popup-sale-off .mc4wp-form-fields input[type=email]::placeholder,
							.popup-sale-off .checkbox-form label.checkcontainer,
							.popup-sale-off .checkbox-form input~.checkmark',
			'property' => 'color',
		),
	),
) );
arrowpress_customizer() ->add_field(   array(
	'type'        => 'color',
	'settings'    => 'border_color',
	'label'       => esc_html__( 'Input Border Color', 'arangi' ),
	'section'     => $section,
	'priority'    => $priority ++,
	'transport'   => 'auto',
	'default'     => '#dfdfdf',
	'required'  => array(
        array(
            'setting'  => 'setting_popup_sale_off',
            'operator' => '==',
            'value'    => 1,
        ),
    ), 
	'output'      => array(
		array(
			'element'  => '.popup-sale-off .mc4wp-form-fields input[type=email],
						.popup-sale-off .checkbox-form input~.checkmark',
			'property' => 'border-color',
		),
	),
) );
arrowpress_customizer() ->add_field(   array(
	'type'        => 'color',
	'settings'    => 'color_button',
	'label'       => esc_html__( 'Button Color ', 'arangi' ),
	'section'     => $section,
	'priority'    => $priority ++,
	'transport'   => 'auto',
	'default'     => '#fff',
	'required'  => array(
        array(
            'setting'  => 'setting_popup_sale_off',
            'operator' => '==',
            'value'    => 1,
        ),
    ), 
	'output'      => array(
		array(
			'element'  => '.popup-sale-off .mc4wp-form-fields input[type=submit]',
			'property' => 'color',
		),
	),
) );
arrowpress_customizer() ->add_field(   array(
	'type'        => 'color',
	'settings'    => 'bg_button',
	'label'       => esc_html__( ' Button Background Color', 'arangi' ),
	'section'     => $section,
	'priority'    => $priority ++,
	'transport'   => 'auto',
	'default'     => '',
	'required'  => array(
        array(
            'setting'  => 'setting_popup_sale_off',
            'operator' => '==',
            'value'    => 1,
        ),
    ), 
	'output'      => array(
		array(
			'element'  => '.popup-sale-off .mc4wp-form-fields input[type=submit]',
			'property' => 'background-color',
		),
	),
) );
arrowpress_customizer() ->add_field(   array(
	'type'        => 'color',
	'settings'    => 'bg_hover_button',
	'label'       => esc_html__( 'Button Background Color Hover ', 'arangi' ),
	'section'     => $section,
	'priority'    => $priority ++,
	'transport'   => 'auto',
	'default'     => '',
	'required'  => array(
        array(
            'setting'  => 'setting_popup_sale_off',
            'operator' => '==',
            'value'    => 1,
        ),
    ), 
	'output'      => array(
		array(
			'element'  => '.popup-sale-off .mc4wp-form-fields input[type=submit]:hover',
			'property' => 'background-color',
		),
	),
) );