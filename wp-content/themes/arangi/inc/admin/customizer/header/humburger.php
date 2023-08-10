<?php
$section  = 'humberger_menu';
$priority = 1;
$prefix   = 'humberger_menu_';

//Background Color
arrowpress_customizer() ->add_field(   array(
    'type'        => 'color',
    'settings'    => $prefix . 'bg',
    'label'       => esc_html__( 'Background Color', 'arangi' ),
    'description' => esc_html__( 'Controls the background color for humberger menu.', 'arangi' ),
    'section'     => $section,
    'priority'    => $priority ++,
    'transport'   => 'auto',
    'default'     => '#faf9f7',
    'output'      => array(
        array(
            'element'  => '.humburger-menu',
            'property' => 'background-color',
        ),
    ),
) );
//Title widget Color
arrowpress_customizer() ->add_field(   array(
    'type'        => 'color',
    'settings'    => $prefix . 'title_color',
    'label'       => esc_html__( 'Title Color', 'arangi' ),
    'description' => esc_html__( 'Controls the color for title humberger menu.', 'arangi' ),
    'section'     => $section,
    'priority'    => $priority ++,
    'transport'   => 'auto',
    'default'     => '#333333',
    'output'      => array(
        array(
            'element'  => '.humburger-menu .widget-title',
            'property' => 'color',
        ),
    ),
) );
//Text Content Color
arrowpress_customizer() ->add_field(   array(
    'type'        => 'color',
    'settings'    => $prefix . 'color',
    'label'       => esc_html__( 'Text Content Color', 'arangi' ),
    'description' => esc_html__( 'Controls the color for content humberger menu.', 'arangi' ),
    'section'     => $section,
    'priority'    => $priority ++,
    'transport'   => 'auto',
    'default'     => '',
    'output'      => array(
        array(
            'element'  => '.humburger-menu p, 
            .humburger-content ul.list-info-contact li a,
            .humburger-content .product-price .price del',
            'property' => 'color',
        ),
    ),
));
//Price Color
arrowpress_customizer() ->add_field(   array(
    'type'        => 'color',
    'settings'    => $prefix . 'price_color',
    'label'       => esc_html__( 'Price Color', 'arangi' ),
    'description' => esc_html__( 'Controls the color for price.', 'arangi' ),
    'section'     => $section,
    'priority'    => $priority ++,
    'transport'   => 'auto',
    'default'     => '',
    'output'      => array(
        array(
            'element'  => '
            .humburger-content .product-price .price ins,
            .humburger-content .product-price .price > span',
            'property' => 'color',
            'suffix'   => ' !important',
        ),
    ),
));
//Link Color
arrowpress_customizer() ->add_field(   array(
    'type'        => 'color',
    'settings'    => $prefix . 'link_color',
    'label'       => esc_html__( 'Link Color', 'arangi' ),
    'description' => esc_html__( 'Controls the color for link humberger menu.', 'arangi' ),
    'section'     => $section,
    'priority'    => $priority ++,
    'transport'   => 'auto',
    'default'     => '',
    'output'      => array(
        array(
            'element'  => '.humburger-menu .humburger-content a',
            'property' => 'color',
            'suffix'   => ' !important',
        ),
    ),
));
//Link hover Color
arrowpress_customizer() ->add_field(   array(
    'type'        => 'color',
    'settings'    => $prefix . 'link_hover_color',
    'label'       => esc_html__( 'Link Hover Color', 'arangi' ),
    'description' => esc_html__( 'Controls the color for link hover humberger menu.', 'arangi' ),
    'section'     => $section,
    'priority'    => $priority ++,
    'transport'   => 'auto',
    'default'     => '',
    'output'      => array(
        array(
            'element'  => '.humburger-menu .humburger-content a:hover',
            'property' => 'color',
            'suffix'   => ' !important',
        ),
    ),
));
//Border Color
arrowpress_customizer() ->add_field(   array(
    'type'        => 'color',
    'settings'    => $prefix . 'border_widget_color',
    'label'       => esc_html__( 'Border widget Color', 'arangi' ),
    'description' => esc_html__( 'Controls the border color for widget', 'arangi' ),
    'section'     => $section,
    'priority'    => $priority ++,
    'transport'   => 'auto',
    'default'     => '#dfdfdf',
    'output'      => array(
        array(
            'element'  => '.humburger-content .widget, .humburger-content ul.product_list_widget li .product-content,.humburger-content ul.list-info-contact li',
            'property' => 'border-color',
        ),
    ),
) );

