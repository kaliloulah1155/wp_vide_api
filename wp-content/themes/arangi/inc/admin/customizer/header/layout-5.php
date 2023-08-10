<?php 
$section  = 'header_layout_5';
$priority = 1;
$prefix   = 'header_layout_5_';
$registered_sidebars = Arangi_Helper::get_registered_sidebars();
arrowpress_customizer() ->add_field(   array(
    'type'     => 'image',
    'settings' => 'image-header-5',
    'section'  => $section,
    'priority' => $priority ++,
    'transport' => 'auto',
    'default'  => ARANGI_THEME_URI . '/assets/images/header/header-5.jpg',
) );
/*--------------------------------------------------------------
# header
--------------------------------------------------------------*/
arrowpress_customizer() ->add_field(   array(
    'type'     => 'custom',
    'settings' => $prefix . 'group_top_title_' . $priority ++. "_5",
    'section'  => $section,
    'priority' => $priority ++,
    'default'  => '<div class="big_title">' . esc_html__( 'Top Header', 'arangi' ) . '</div>',
) );
//Background Color
arrowpress_customizer() ->add_field(   array(
    'type'        => 'color',
    'settings'    => $prefix . 'bg',
    'label'       => esc_html__( 'Background Color', 'arangi' ),
    'description' => esc_html__( 'Controls the background color for header.', 'arangi' ),
    'section'     => $section,
    'priority'    => $priority ++,
    'transport'   => 'auto',
    'default'     => '',
    'output'      => array(
        array(
            'element'  => '#page:not(.header-fixed) .header-05 .header-top',
            'property' => 'background-color',
        ),
    ),
) );
arrowpress_customizer() ->add_field(   array(
    'type'        => 'toggle',
    'settings'    => 'show_menu_5',
    'label'       => esc_html__( 'Show Menu', 'arangi' ),
    'description' => esc_html__( 'Turn on to show menu.', 'arangi' ),
    'section'     => $section,
    'priority'    => $priority ++,
    'default'     => 1,
) );
arrowpress_customizer() ->add_field(   array(
    'type'        => 'toggle',
    'settings'    => 'show_contact_5',
    'label'       => esc_html__( 'Show contact', 'arangi' ),
    'description' => esc_html__( 'Turn on to show contact.', 'arangi' ),
    'section'     => $section,
    'priority'    => $priority ++,
    'default'     => 1,
) );
arrowpress_customizer() ->add_field(   array(
    'type'        => 'toggle',
    'settings'    => 'show_social_5',
    'label'       => esc_html__( 'Show social', 'arangi' ),
    'description' => esc_html__( 'Turn on to show social.', 'arangi' ),
    'section'     => $section,
    'priority'    => $priority ++,
    'default'     => 1,
) );
arrowpress_customizer() ->add_field(   array(
    'type'     => 'custom',
    'settings' => $prefix . 'group_main_title_' . $priority ++. "_5",
    'section'  => $section,
    'priority' => $priority ++,
    'default'  => '<div class="big_title">' . esc_html__( 'Main Header', 'arangi' ) . '</div>',
) );
// Show search
arrowpress_customizer() ->add_field(   array(
    'type'        => 'toggle',
    'settings'    => 'show_search_5',
    'label'       => esc_html__( 'Show Search', 'arangi' ),
    'description' => esc_html__( 'Turn on to show search.', 'arangi' ),
    'section'     => $section,
    'priority'    => $priority ++,
    'default'     => 1,
) );
arrowpress_customizer() ->add_field(   array(
    'type'     => 'text',
    'settings' => 'icon_search_5',
    'label'    => __( 'Enter Search Class', 'arangi' ),
    'description' => esc_html__( 'Add icon class you want here. You can find a lot of icons in these links Awesome icon or Linearicons , Pe stroke icon7', 'arangi' ),
    'section'  => $section,
    'default'  => esc_attr__( 'ti-search', 'arangi' ),
    'priority' => $priority ++,
    'required'  => array(
        array(
            'setting'  => 'show_search_5',
            'operator' => '==',
            'value'    => 1,
        ),
    ),
) );
//Logo
arrowpress_customizer() ->add_field(   array(
    'type'     => 'image',
    'settings' => 'logo_5',
    'label'    => esc_html__( 'Logo', 'arangi' ),
    'description' => esc_html__('Select an image file for your logo','arangi'),
    'section'  => $section,
    'priority' => $priority ++,
    'transport' => 'auto',
    'default'  => ARANGI_THEME_URI . '/assets/images/logo-5.png',
) );
// Show minicart
arrowpress_customizer() ->add_field(   array(
    'type'        => 'toggle',
    'settings'    => 'show_mini_cart_5',
    'label'       => esc_html__( 'Show Mini Cart', 'arangi' ),
    'description' => esc_html__( 'Turn on to show mini cart.', 'arangi' ),
    'section'     => $section,
    'priority'    => $priority ++,
    'default'     => 1,
) );
arrowpress_customizer() ->add_field(   array(
    'type'     => 'text',
    'settings' => 'icon_cart_5',
    'label'    => __( 'Enter Cart Icon Class', 'arangi' ),
    'section'  => $section,
    'default'  => esc_attr__( 'icon-shopping-cart1', 'arangi' ),
    'priority' => $priority ++,
    'required'  => array(
        array(
            'setting'  => 'show_mini_cart_5',
            'operator' => '==',
            'value'    => 1,
        ),
    ),
) );
//Show settings
arrowpress_customizer() ->add_field(   array(
    'type'        => 'toggle',
    'settings'    => 'show_settings_5',
    'label'       => esc_html__( 'Show My Account', 'arangi' ),
    'description' => esc_html__( 'Turn on to show my account.', 'arangi' ),
    'section'     => $section,
    'priority'    => $priority ++,
    'default'     => 1,
) );
arrowpress_customizer() ->add_field(   array(
    'type'     => 'text',
    'settings' => 'icon_settings_5',
    'label'    => __( 'Enter my account icon class', 'arangi' ),
    'section'  => $section,
    'default'  => esc_attr__( 'icon-user1', 'arangi' ),
    'priority' => $priority ++,
    'required'  => array(
        array(
            'setting'  => 'show_settings_5',
            'operator' => '==',
            'value'    => 1,
        ),
    ),
) );
/*--------------------------------------------------------------
# Header menu
--------------------------------------------------------------*/
arrowpress_customizer() ->add_field(   array(
    'type'     => 'custom',
    'settings' => $prefix . 'group_title_menu' . $priority ++. "_5",
    'section'  => $section,
    'priority' => $priority ++,
    'default'  => '<div class="big_title">' . esc_html__( 'Header Menu', 'arangi' ) . '</div>',
) );
arrowpress_customizer() ->add_field(   array(
    'type'        => 'color',
    'settings'    => $prefix . 'item_color_5',
    'label'       => esc_html__( 'Menu color', 'arangi' ),
    'description'       => esc_html__( 'Color For Main Menu Items', 'arangi' ),
    'section'     => $section,
    'priority'    => $priority ++,
    'transport'   => 'auto',
    'default'     => '',
    'output'      => array(
        array(
            'element'  => '.header-05 .header-bottom .header-menu .mega-menu>li>a',
            'property' => 'color',
        ),
    ),
) );

arrowpress_customizer() ->add_field(   array(
    'type'        => 'color',
    'settings'    => $prefix . 'navigation_link_hover_color_5',
    'label'       => esc_html__( 'Menu Hover Color', 'arangi' ),
    'description' => esc_html__( 'Controls the color when hover for menu items.', 'arangi' ),
    'section'     => $section,
    'priority'    => $priority ++,
    'transport'   => 'auto',
    'default'     => '',
    'output'      => array(
        array(
            'element'  =>
                '.header-05 .header-bottom .header-menu  .mega-menu > li:focus > a, 
                .header-05 .header-bottom .header-menu .mega-menu> li:hover > a,
                .header-05 .header-bottom .header-menu .mega-menu>li>a i',
            'property' => 'color',
        ),
    ),
) );
//Menu styling
arrowpress_customizer() ->add_field(   array(
    'type'        => 'typography',
    'settings'    => $prefix . 'navigation_typography_5',
    'label'       => esc_html__( 'Typography', 'arangi' ),
    'description' => esc_html__( 'These settings control the typography for menu items.', 'arangi' ),
    'section'     => $section,
    'priority'    => $priority ++,
    'transport'   => 'auto',
    'default'     => array(
        'font-family'    => 'Raleway',
        'font-weight'    => '600',
        'letter-spacing' => '0.05em',
        'text-transform' => 'uppercase',
        'font-size'      => '15px'
    ),
    'output'      => array(
        array(
            'element' => '.header-05 .header-bottom .header-menu .mega-menu>li>a',
        ),
    ),
) );

arrowpress_customizer() ->add_field(   array(
    'type'      => 'spacing',
    'settings'  => $prefix . 'navigation_5_item_padding',
    'label'     => esc_html__( 'Item Padding', 'arangi' ),
    'section'   => $section,
    'priority'  => $priority ++,
    'default'   => array(
        'top'    => '',
        'bottom' => '',
        'left'   => '',
        'right'  => '',
    ),
    'transport' => 'auto',
    'output'    => array(
        array(
            'element'  => array(
                '.header-05 .header-bottom .header-menu .mega-menu>li>a',
            ),
            'property' => 'padding',
        ),
    ),
) );