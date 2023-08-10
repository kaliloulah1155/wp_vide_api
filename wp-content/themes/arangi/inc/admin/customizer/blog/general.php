<?php
$section  = 'blog_general';
$priority = 1;
$prefix   = 'blog_general_';
$registered_sidebars = Arangi_Helper::get_registered_sidebars();
arrowpress_customizer() ->add_field(   array(
    'type'        => 'text',
    'settings'    => 'blog_title',
    'label'       => esc_html__( 'Blog Title', 'arangi' ),
    'section'     => $section,
    'priority'    => $priority ++,
    'default'     => esc_html__( 'Blog', 'arangi' ),
) );
arrowpress_customizer() ->add_field(   array(
    'type'        => 'radio-buttonset',
    'settings'    => $prefix . 'layout',
    'label'       => esc_html__( 'Blog Layout', 'arangi' ),
    'section'     => $section,
    'priority'    => $priority ++,
    'default'     => 'full_width',
    'choices'     => array(
        'wide' => esc_html__( 'Wide', 'arangi' ),
        'full_width'   => esc_html__( 'Full Width', 'arangi' ),
        'boxed' => esc_html__( 'Boxed', 'arangi' ),
    ),
) );
arrowpress_customizer() ->add_field(   array(
    'type'        => 'select',
    'settings'    => 'blog_sidebar_left',
    'label'       => esc_html__( 'Sidebar Left', 'arangi' ),
    'description' => esc_html__( 'Select sidebar left.', 'arangi' ),
    'section'     => $section,
    'priority'    => $priority ++,
    'default'     => 'blog_sidebar',
    'choices'     => $registered_sidebars,
) );
arrowpress_customizer() ->add_field(   array(
    'type'        => 'select',
    'settings'    => 'blog_sidebar_right',
    'label'       => esc_html__( 'Sidebar Right', 'arangi' ),
    'description' => esc_html__( 'Select sidebar right.', 'arangi' ),
    'section'     => $section,
    'priority'    => $priority ++,
    'default'     => '',
    'choices'     => $registered_sidebars,
) );
arrowpress_customizer() ->add_field(   array(
    'type'        => 'radio-buttonset',
    'settings'    => $prefix . 'date_format',
    'label'       => esc_html__( 'Use default date format setting in Settings > General', 'arangi' ),
    'section'     => $section,
    'priority'    => $priority ++,
    'default'     => '1',
    'choices'     => array(
        '0' => esc_html__( 'No', 'arangi' ),
        '1' => esc_html__( 'Yes', 'arangi' ),
    ),
) );