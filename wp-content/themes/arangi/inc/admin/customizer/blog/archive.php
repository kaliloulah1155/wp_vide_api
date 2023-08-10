<?php
$section  = 'blog_archive';
$priority = 1;
$prefix   = 'blog_archive_';
arrowpress_customizer() ->add_field(   array(
    'type'        => 'radio-buttonset',
    'settings'    => $prefix . 'layout',
    'label'       => esc_html__( 'Blog Layout', 'arangi' ),
    'section'     => $section,
    'priority'    => $priority ++,
    'default'     => 'list',
    'choices'     => array(
        'list'    => esc_html__( 'List', 'arangi' ),
        'grid'    => esc_html__( 'Grid', 'arangi' ),
        'masonry'    => esc_html__( 'Masonry', 'arangi' ),
    ),
) );
arrowpress_customizer() ->add_field(   array(
    'type'        => 'select',
    'settings'    => $prefix . 'grid_style',
    'label'       => esc_html__( 'Grid Style', 'arangi' ),
    'description' => esc_html__( 'Select style grid.', 'arangi' ),
    'section'     => $section,
    'priority'    => $priority ++,
    'default'     => 'style1',
    'choices'     => array(
        'style1' => esc_html__( 'Grid Style 1', 'arangi' ),
        'style2' => esc_html__( 'Grid Style 2', 'arangi' ),
    ),
    'required'  => array(
        array(
            'setting'  => 'blog_archive_layout',
            'operator' => '==',
            'value'    => 'grid',
        ),
    ), 
) );
arrowpress_customizer() ->add_field(   array(
    'type'        => 'radio-buttonset',
    'settings'    => $prefix . 'columns_list',
    'label'       => esc_html__( ' Number Columns', 'arangi' ),
    'description' => esc_html__( 'Select columns for blog.', 'arangi' ),
    'section'     => $section,
    'priority'    => $priority ++,
    'default'     => '1',
    'choices'     => array(
        '1' => esc_html__( '1 col', 'arangi' ),
        '2' => esc_html__( '2 col', 'arangi' ),
    ),
    'required'  => array(
        array(
            'setting'  => 'blog_archive_layout',
            'operator' => '==',
            'value'    => 'list',
        ),
    ),
) );
arrowpress_customizer() ->add_field(   array(
    'type'        => 'radio-buttonset',
    'settings'    => $prefix . 'columns_grid',
    'label'       => esc_html__( ' Number Columns', 'arangi' ),
    'description' => esc_html__( 'Select columns for blog.', 'arangi' ),
    'section'     => $section,
    'priority'    => $priority ++,
    'default'     => '2',
    'choices'     => array(
        '2' => esc_html__( '2 col', 'arangi' ),
        '3' => esc_html__( '3 col', 'arangi' ),
        '4' => esc_html__( '4 col', 'arangi' ),
    ),
    'required'  => array(
         array(
            'setting'  => 'blog_archive_layout',
            'operator' => '==',
            'value'    => 'grid',
        ),
    ),
) );
arrowpress_customizer() ->add_field(   array(
    'type'        => 'radio-buttonset',
    'settings'    => $prefix . 'columns_masonry',
    'label'       => esc_html__( ' Number Columns', 'arangi' ),
    'description' => esc_html__( 'Select columns for blog.', 'arangi' ),
    'section'     => $section,
    'priority'    => $priority ++,
    'default'     => '2',
    'choices'     => array(
        '2' => esc_html__( '2 col', 'arangi' ),
        '3' => esc_html__( '3 col', 'arangi' ),
        '4' => esc_html__( '4 col', 'arangi' ),
    ),
    'required'  => array(
         array(
            'setting'  => 'blog_archive_layout',
            'operator' => '==',
            'value'    =>  'masonry',
        ),
    ),
) );

arrowpress_customizer() ->add_field(   array(
    'type'        => 'multicheck',
    'settings'    => $prefix . 'post_meta_list',
    'label'       => esc_attr__( 'Post Meta', 'arangi' ),
    'section'     => $section,
    'priority'    => $priority ++,
    'default'     => array( 'date'),
    'choices'     => array(
        'author'      => esc_attr__( 'Author', 'arangi' ),
        'categories'  => esc_attr__( 'Categories', 'arangi' ),
        'date'        => esc_attr__( 'Date', 'arangi' ),
        'comment'     => esc_attr__( 'Comment', 'arangi' ),
        'tags'        => esc_attr__( 'Tags', 'arangi' ),
    ),
    'required'  => array(
         array(
            'setting'  => 'blog_archive_layout',
            'operator' => '==',
            'value'    =>  'list',
        ),
    ),
) );
arrowpress_customizer() ->add_field(   array(
    'type'        => 'multicheck',
    'settings'    => $prefix . 'post_meta_grid',
    'label'       => esc_attr__( 'Post Meta', 'arangi' ),
    'section'     => $section,
    'priority'    => $priority ++,
    'default'     => array( 'categories', 'date' , 'comment'),
    'choices'     => array(
        'author'      => esc_attr__( 'Author', 'arangi' ),
        'categories'  => esc_attr__( 'Categories', 'arangi' ),
        'date'        => esc_attr__( 'Date', 'arangi' ),
        'comment'     => esc_attr__( 'Comment', 'arangi' ),
        'tags'        => esc_attr__( 'Tags', 'arangi' ),
    ),
    'required'  => array(
        array(
            'setting'  => 'blog_archive_layout',
            'operator' => '==',
            'value'    =>  'grid',
        ),
        array(
            'setting'  => 'blog_archive_grid_style',
            'operator' => '==',
            'value'    =>  'style1',
        ),
    ),
) );

arrowpress_customizer() ->add_field(   array(
    'type'        => 'multicheck',
    'settings'    => $prefix . 'post_meta_grid2',
    'label'       => esc_attr__( 'Post Meta', 'arangi' ),
    'section'     => $section,
    'priority'    => $priority ++,
    'default'     => array( 'categories', 'date'),
    'choices'     => array(
        'author'      => esc_attr__( 'Author', 'arangi' ),
        'categories'  => esc_attr__( 'Categories', 'arangi' ),
        'date'        => esc_attr__( 'Date', 'arangi' ),
        'comment'     => esc_attr__( 'Comment', 'arangi' ),
        'tags'        => esc_attr__( 'Tags', 'arangi' ),
    ),
    'required'  => array(
        array(
            'setting'  => 'blog_archive_layout',
            'operator' => '==',
            'value'    =>  'grid',
        ),
        array(
            'setting'  => 'blog_archive_grid_style',
            'operator' => '==',
            'value'    =>  'style2',
        ),
    ),
) );

arrowpress_customizer() ->add_field(   array(
    'type'        => 'multicheck',
    'settings'    => $prefix . 'post_meta_masonry',
    'label'       => esc_attr__( 'Post Meta', 'arangi' ),
    'section'     => $section,
    'priority'    => $priority ++,
    'default'     => array( 'categories','date'),
    'choices'     => array(
        'author'      => esc_attr__( 'Author', 'arangi' ),
        'categories'  => esc_attr__( 'Categories', 'arangi' ),
        'date'        => esc_attr__( 'Date', 'arangi' ),
        'comment'     => esc_attr__( 'Comment', 'arangi' ),
        'tags'        => esc_attr__( 'Tags', 'arangi' ),
    ),
    'required'  => array(
         array(
            'setting'  => 'blog_archive_layout',
            'operator' => '==',
            'value'    =>  'masonry',
        ),
    ),
) );
arrowpress_customizer() ->add_field(   array(
    'type'        => 'radio-buttonset',
    'settings'    => $prefix . 'pagination',
    'label'       => esc_html__( 'Pagination type', 'arangi' ),
    'section'     => $section,
    'priority'    => $priority ++,
    'default'     => 'number',
    'choices'     => array(
        'load_more' => esc_html__( 'Load more', 'arangi' ),
        'next_prev'   => esc_html__( 'Next/Prev', 'arangi' ),
        'number' => esc_html__( 'Number', 'arangi' ),
    ),
) );
arrowpress_customizer() ->add_field(   array(
    'type'        => 'number',
    'settings'    => 'blog_archive_number_item',
    'label'       => esc_html__( 'Post show per page', 'arangi' ),
    'section'     => $section,
    'priority'    => $priority ++,
    'default'     => 8,
    'choices'     => array(
        'min'  => 1,
        'max'  => 30,
        'step' => 1,
    ),
) );