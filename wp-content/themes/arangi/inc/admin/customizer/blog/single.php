<?php
$section  = 'blog_single';
$priority = 1;
$prefix   = 'single_post_';
$on = esc_html__( 'On', 'arangi' );
$off = esc_html__( 'Off', 'arangi' );
arrowpress_customizer() ->add_field(   array(
    'type'        => 'select',
    'settings'    => $prefix . 'layout',
    'label'       => esc_html__( 'Default Layout', 'arangi' ),
    'description' => esc_html__( 'Select default footer type for your site.', 'arangi' ),
    'section'     => $section,
    'priority'    => $priority ++,
    'default'     => 'single-1',
     'choices'     => array(
        'single-1' => esc_html__( 'Single layout 1', 'arangi' ),
        'single-2' => esc_html__( 'Single layout 2', 'arangi' ),
    ),
) );
arrowpress_customizer() ->add_field(   array(
    'type'        => 'multicheck',
    'settings'    => $prefix . 'meta',
    'label'       => esc_attr__( 'Post Meta', 'arangi' ),
    'section'     => $section,
    'priority'    => $priority ++,
    'default'     => array( 'categories','date','comment'),
    'choices'     => array(
        'author'      => esc_attr__( 'Author', 'arangi' ),
        'categories'  => esc_attr__( 'Categories', 'arangi' ),
        'date'        => esc_attr__( 'Date', 'arangi' ),
        'comment'     => esc_attr__( 'Comment', 'arangi' ),
        'tags'        => esc_attr__( 'Tags', 'arangi' ),
    ),
) );
arrowpress_customizer() ->add_field(   array(
    'type'        => 'radio-buttonset',
    'settings'    => $prefix . 'comment_enable',
    'label'       => esc_html__( 'Single comment', 'arangi' ),
    'section'     => $section,
    'priority'    => $priority ++,
    'default'     => '1',
    'choices'     => array(
        '0' => $off,
        '1' => $on,
    ),
) );
arrowpress_customizer() ->add_field(   array(
    'type'        => 'radio-buttonset',
    'settings'    => $prefix . 'share_enable',

    'label'       => esc_html__( 'Post Sharing', 'arangi' ),
    'description' => esc_html__( 'Turn on to display the social sharing on blog single posts.', 'arangi' ),
    'section'     => $section,
    'priority'    => $priority ++,
    'default'     => '1',
    'choices'     => array(
        '0' => esc_html__( 'Off', 'arangi' ),
        '1' => esc_html__( 'On', 'arangi' ),
    ),
) );
arrowpress_customizer() ->add_field(   array(
    'type'        => 'multicheck',
    'settings'    => $prefix . 'item_enable',
    'label'       => esc_attr__( 'Sharing Links', 'arangi' ),
    'description' => esc_html__( 'Check to the box to enable social share links.', 'arangi' ),
    'section'     => $section,
    'priority'    => $priority ++,
    'default'     => array( 'facebook', 'twitter', 'google_plus','pinterest' ),
    'choices'     => array(
    'facebook'    => esc_attr__( 'Facebook', 'arangi' ),
    'twitter'     => esc_attr__( 'Twitter', 'arangi' ),
    'google_plus' => esc_attr__( 'Google+', 'arangi' ),
    'pinterest' => esc_attr__( 'Pinterest', 'arangi' ),
    ),
    'required'    => array(
        array(
            'setting'  => $prefix . 'share_enable',
            'operator' => '==',
            'value'    => 1,
        ),
    ),
) );
arrowpress_customizer() ->add_field(   array(
    'type'        => 'radio-buttonset',
    'settings'    => 'single_post_related_enable',
    'label'       => esc_html__( 'Related', 'arangi' ),
    'description' => esc_html__( 'Turn on to display related posts on blog single posts.', 'arangi' ),
    'section'     => $section,
    'priority'    => $priority ++,
    'default'     => '0',
    'choices'     => array(
        '0' => esc_html__( 'Off', 'arangi' ),
        '1' => esc_html__( 'On', 'arangi' ),
    ),
) );

arrowpress_customizer() ->add_field(   array(
    'type'            => 'number',
    'settings'        => 'single_post_related_number',
    'label'           => esc_html__( 'Number of related posts item', 'arangi' ),
    'section'         => $section,
    'priority'        => $priority ++,
    'default'         => 3,
    'choices'         => array(
        'min'  => 0,
        'max'  => 50,
        'step' => 1,
    ),
    'active_callback' => array(
        array(
            'setting'  => 'single_post_related_enable',
            'operator' => '==',
            'value'    => '1',
        ),
    ),
) );