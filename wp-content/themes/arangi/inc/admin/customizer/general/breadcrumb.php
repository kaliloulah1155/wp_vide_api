<?php
$section  = 'breadcrumb-config';
$priority = 1;
$prefix   = 'general_';
arrowpress_customizer() ->add_field(   array(
    'type'     => 'custom',
    'settings' => $prefix . 'group_title_' . $priority ++,
    'section'  => $section,
    'priority' => $priority ++,
    'default'  => '<div class="big_title">' . esc_html__( 'Styling', 'arangi' ) . '</div>',
) );
arrowpress_customizer() ->add_field(   array(
    'type'      => 'spacing',
    'settings'  => $prefix . 'padding',
    'label'     => esc_html__( 'Padding', 'arangi' ),
    'description' => esc_html__( 'Default padding:76px(top), 74px(bottom).', 'arangi' ),
    'section'   => $section,
    'priority'  => $priority ++,
    'default'   => array(
        'top'    => '76px',
        'bottom' => '77px',
    ),
    'transport' => 'auto',
    'output'    => array(
        array(
            'element'  => array(
                '.side-breadcrumb',
            ),
            'property' => 'padding',
        ),
    ),
) );
arrowpress_customizer() ->add_field(   array(
    'type'      => 'radio-buttonset',
    'settings'  => $prefix . 'align',
    'label'     => esc_html__( 'Align', 'arangi' ),
    'section'  => $section,
    'priority' => $priority ++,
    'default'  => 'left',
    'choices'  => array(
        'left' => esc_html__( 'Left', 'arangi' ),
        'center' => esc_html__( 'Center', 'arangi' ),
        'right' => esc_html__( 'Right', 'arangi' ),
    ),
    'output'    => array(
        array(
            'element'  => array(
                '.side-breadcrumb',
            ),
            'property' => 'text-align',
        ),
    ),
) );
arrowpress_customizer() ->add_field(   array(
    'type'        => 'color',
    'settings'    => 'background_overlay',
    'label'       => esc_html__( 'Background Overlay', 'arangi' ),
    'description' => esc_html__( 'Controls the background overlay of breadcrumb.', 'arangi' ),
    'section'     => $section,
    'priority'    => $priority ++,
    'default'     => '',
    'output'      => array(
        array(
            'element' => '.side-breadcrumb:before',
            'property' => 'background'
        ),
    ),
) );
arrowpress_customizer() ->add_field(   array(
    'type'     => 'text',
    'settings' => 'bg_opacity',
    'label'    => __( 'Enter opacity to set background opacity, default: 0.8.', 'arangi' ),
    'section'  => $section,
    'default'  => esc_attr__( '0.8', 'arangi' ),
    'priority' => $priority ++,
    'output'   => array(
        array(
            'element'  => '.side-breadcrumb:before',
            'property' => 'opacity',
        ),
    ),
) );
arrowpress_customizer() ->add_field(   array(
    'type'        => 'background',
    'settings'    => $prefix . 'background',
    'label'       => esc_html__( 'Background', 'arangi' ),
    'description' => esc_html__( 'Controls the background of breadcrumb. Note: Setting background image for breadcrumbs on the specific page has priority over that on customizing section which is the default for all pages. Background color is not applied when background image is applied.', 'arangi' ),
    'section'     => $section,
    'priority'    => $priority ++,
    'default'     => array(
        'background-color'      => '',
        'background-image'      => '',
        'background-repeat'     => 'no-repeat',
        'background-size'       => 'cover',
        'background-attachment' => 'scroll',
        'background-position'   => 'center center',
    ),
    'output'      => array(
        array(
            'element' => '.side-breadcrumb',
        ),
    ),
) );

arrowpress_customizer() ->add_field(   array(
    'type'     => 'custom',
    'settings' => $prefix . 'group_title_' . $priority ++,
    'section'  => $section,
    'priority' => $priority ++,
    'default'  => '<div class="big_title">' . esc_html__( 'Page Title', 'arangi' ) . '</div>',
) );

arrowpress_customizer() ->add_field(   array(
    'type'     => 'radio-buttonset',
    'settings' => 'page_title',
    'label'    => esc_html__( 'Page Title.', 'arangi' ),
    'section'  => $section,
    'priority' => $priority ++,
    'default'  => '1',
    'choices'  => array(
        '0' => esc_html__( 'Hide', 'arangi' ),
        '1' => esc_html__( 'Show', 'arangi' ),
    ),
) );
arrowpress_customizer() ->add_field(   array(
    'type'     => 'radio-buttonset',
    'settings' => 'page_title_align',
    'label'    => esc_html__( 'Page title align.', 'arangi' ),
    'section'  => $section,
    'priority' => $priority ++,
    'default'  => 'left',
    'choices'  => array(
        'left' => esc_html__( 'Left', 'arangi' ),
        'right' => esc_html__( 'Right', 'arangi' ),
        'center' => esc_html__( 'Center', 'arangi' ),
    ),
    'output'      => array(
        array(
            'element'  => '.side-breadcrumb .page-title',
            'property' => 'text-align',
        ),
    ),
    'required'  => array(
        array(
            'setting'  => 'page_title',
            'operator' => '==',
            'value'    => 1,
        ),
        array(
            'setting' => 'breadcrumb',
            'operator' => '==',
            'value'    => 0,
        ),
    ),

) );
arrowpress_customizer() ->add_field(   array(
    'type'        => 'typography',
    'settings'    => 'page_title_typography',
    'label'       => esc_html__( 'Typography', 'arangi' ),
    'description' => esc_html__( 'These settings control the typography for page title.', 'arangi' ),
    'section'     => $section,
    'priority'    => $priority ++,
    'transport'   => 'auto',
    'default'     => array(
        'font-family'    => 'Raleway',
        'variant'        => '600',
        'letter-spacing' => '0.02em',
        'font-size'      =>  '45px',
        'text-transform' => 'capitalize'
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
            'element' => '.side-breadcrumb .page-title h1',
        ),
    ),
    'required'  => array(
        array(
            'setting'  => 'page_title',
            'operator' => '==',
            'value'    => 1,
        ),
    ),
) );
arrowpress_customizer() ->add_field(   array(
    'type'        => 'color',
    'settings'    => 'page_title_color',
    'label'       => esc_html__( 'Color for page title', 'arangi' ),
    'section'     => $section,
    'priority'    => $priority ++,
    'transport'   => 'auto',
    'default'     => '#fefefe',
    'output'      => array(
        array(
            'element'  => '.side-breadcrumb .page-title h1',
            'property' => 'color',
        ),
    ),
    'required'  => array(
        array(
            'setting'  => 'page_title',
            'operator' => '==',
            'value'    => 1,
        ),
    ),
) );

arrowpress_customizer() ->add_field(   array(
    'type'     => 'custom',
    'settings' => $prefix . 'group_title_' . $priority ++,
    'section'  => $section,
    'priority' => $priority ++,
    'default'  => '<div class="big_title">' . esc_html__( 'Breadcrumb', 'arangi' ) . '</div>',
) );
arrowpress_customizer() ->add_field(   array(
    'type'     => 'radio-buttonset',
    'settings' => 'breadcrumb',
    'label'    => esc_html__( 'Breadcrumb.', 'arangi' ),
    'section'  => $section,
    'priority' => $priority ++,
    'default'  => '1',
    'choices'  => array(
        '0' => esc_html__( 'Hide', 'arangi' ),
        '1' => esc_html__( 'Show', 'arangi' ),
    ),
) );

arrowpress_customizer() ->add_field(   array(
    'type'     => 'radio-buttonset',
    'settings' => 'link_align',
    'label'    => esc_html__( 'Align breadcrumb link.', 'arangi' ),
    'section'  => $section,
    'priority' => $priority ++,
    'default'  => 'left',
    'choices'  => array(
        'left' => esc_html__( 'Left', 'arangi' ),
        'right' => esc_html__( 'Right', 'arangi' ),
        'center' => esc_html__( 'Center', 'arangi' ),
    ),
    'output'      => array(
        array(
            'element'  => '.col-xl-12 .breadcrumb',
            'property' => 'text-align',
        ),
    ),
    'required'  => array(
        array(
            'setting'  => 'page_title',
            'operator' => '==',
            'value'    => 0,
        ),
        array(
            'setting' => 'breadcrumb',
            'operator' => '==',
            'value'    => 1,
        ),
    ),

) );

// Icon link

arrowpress_customizer() ->add_field(   array(
    'type'        => 'typography',
    'settings'    => 'link_typography',
    'label'       => esc_html__( 'Typography', 'arangi' ),
    'description' => esc_html__( 'These settings control the typography for breadcrumb link.', 'arangi' ),
    'section'     => $section,
    'priority'    => $priority ++,
    'transport'   => 'auto',
    'default'     => array(
        'font-family'    => 'Raleway',
        'variant'    => '600',
        'letter-spacing' => '0.075em',
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
            'element' => '.breadcrumb li, 
                        .breadcrumb li a',
        ),
    ),
    'required' => array(
        array(
            'setting' => 'breadcrumb',
            'operator' => '==',
            'value'    => 1,
        ),
    ),
) );
arrowpress_customizer() ->add_field(   array(
    'type'        => 'slider',
    'settings'    => 'text_font_size',
    'label'       => esc_html__( 'Breadcrumb Link Font Size', 'arangi' ),
    'section'     => $section,
    'priority'    => $priority ++,
    'default'     => 14,
    'transport'   => 'auto',
    'choices'     => array(
        'min'  => 10,
        'max'  => 30,
        'step' => 1,
    ),
    'output'      => array(
        array(
            'element'  => '.breadcrumb li:before, 
                            .breadcrumb li:last-child, 
                            .breadcrumb li a',
            'property' => 'font-size',
            'units'    => 'px',
        ),
    ),
    'required' => array(
        array(
            'setting' => 'breadcrumb',
            'operator' => '==',
            'value'    => 1,
        ),
    ),
) );

arrowpress_customizer() ->add_field(   array(
    'type'        => 'color',
    'settings'    => 'link_color',
    'label'       => esc_html__( 'Color for breadcrumb link', 'arangi' ),
    'section'     => $section,
    'priority'    => $priority ++,
    'transport'   => 'auto',
    'default'     => '',
    'output'      => array(
        array(
            'element'  => '.breadcrumb li .home, .breadcrumb li a, .breadcrumb li:before',
            'property' => 'color',
        ),
    ),
    'required' => array(
        array(
            'setting' => 'breadcrumb',
            'operator' => '==',
            'value'    => 1,
        ),
    ),
) );
arrowpress_customizer() ->add_field(   array(
    'type'        => 'color',
    'settings'    => 'text_color',
    'label'       => esc_html__( 'Color for breadcrumb', 'arangi' ),
    'section'     => $section,
    'priority'    => $priority ++,
    'transport'   => 'auto',
    'default'     => '#fff',
    'output'      => array(
        array(
            'element'  => '.breadcrumb',
            'property' => 'color',
        ),
    ),
    'required' => array(
        array(
            'setting' => 'breadcrumb',
            'operator' => '==',
            'value'    => 1,
        ),
    ),
) );


