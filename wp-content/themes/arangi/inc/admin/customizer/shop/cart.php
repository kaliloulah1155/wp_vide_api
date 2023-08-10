<?php
$section  = 'shopping_cart';
$priority = 1;
$prefix   = 'shopping_cart_';
arrowpress_customizer() ->add_field(   array(
	'type'        => 'radio-buttonset',
	'settings'    => $prefix . 'cross_sells_enable',
	'label'       => esc_html__( 'Cross-sells products', 'arangi' ),
	'description' => esc_html__( 'Turn on to display the cross-sells products section. This is helpful if you have dozens of products with cross-sells and you don\'t want to go and edit each single page.', 'arangi' ),
	'section'     => $section,
	'priority'    => $priority ++,
	'default'     => '1',
	'choices'     => array(
		'0' => esc_html__( 'Off', 'arangi' ),
		'1' => esc_html__( 'On', 'arangi' ),
	),
) );
arrowpress_customizer() ->add_field(   array(
	'type'     => 'text',
	'settings' => 'cross_title',
	'label'    => esc_html__( 'Title Cross Sells Products', 'arangi' ),
	'section'  => $section,
	'priority' => $priority ++,
	'required'  => array(
        array(
            'setting'  => 'shopping_cart_cross_sells_enable',
            'operator' => '==',
            'value'    => 0,
        ),
    ), 
    'default' => wp_kses( __('You may be interested in&hellip;','arangi'),
        array(
        'a' => array(
            'href' => array(),
            'title' => array(),
            'target' => array(),
        ),
        'p' => array('class' => array()),
        'br' => array(),
        'i' => array(
            'class' => array(),
            'aria-hidden' => array(),
        ),
    )), 
	
) );

arrowpress_customizer() ->add_field(   array(
	'type'     => 'textarea',
	'settings' => 'single_after_title_cross',
	'label'    => esc_html__( 'After title.', 'arangi' ),
	'section'  => $section,
	'priority' => $priority ++, 
	'default' => wp_kses( __('Arangi','arangi'),
        array(
        'a' => array(
            'href' => array(),
            'title' => array(),
            'target' => array(),
        ),
        'p' => array('class' => array()),
        'br' => array(),
        'i' => array(
            'class' => array(),
            'aria-hidden' => array(),
        ),
    )), 
) );