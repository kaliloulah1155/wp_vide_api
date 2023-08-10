<?php
$section  = 'error404_page';
$priority = 1;
$prefix   = 'error404_page_';
arrowpress_customizer() ->add_field(   array(
    'type'     => 'custom',
    'settings' => $prefix . 'group_404' . $priority ++,
    'section'  => $section,
    'priority' => $priority ++,
    'default'  => '<div class="big_title">' . esc_html__( '404 Page', 'arangi' ) . '</div>',
) );

arrowpress_customizer() ->add_field(   array(
    'type'        => 'text',
    'settings'    => 'error_title',
    'label'       => esc_html__( 'Title', 'arangi' ),
    'section'     => $section,
    'priority'    => $priority ++,
    'default'     => esc_html__( '404', 'arangi' ),
) );

arrowpress_customizer() ->add_field(   array(
    'type'        => 'color',
    'settings'    => 'title_404_color',
    'label'       => esc_html__( 'Title Color.', 'arangi' ),
    'section'     => $section,
    'priority'    => $priority ++,
    'transport'   => 'auto',
    'default'     => '#ffffff',
    'output'      => array(
        array(
            'element'  => '.page-404 h1',
            'property' => 'color',
            'suffix'   => ' !important',
        ),
    ),
) );

arrowpress_customizer() ->add_field(   array(
    'type'        => 'text',
    'settings'    => 'error404_content',
    'label'       => esc_html__( 'Text content', 'arangi' ),
    'section'     => $section,
    'priority'    => $priority ++,
    'default'     => esc_html__( 'Recipe not found', 'arangi' ),
) );

arrowpress_customizer() ->add_field(   array(
    'type'        => 'color',
    'settings'    => 'content_404_color',
    'label'       => esc_html__( 'Text Content Color.', 'arangi' ),
    'section'     => $section,
    'priority'    => $priority ++,
    'transport'   => 'auto',
    'default'     => '#333333',
    'output'      => array(
        array(
            'element'  => '.page-404 p',
            'property' => 'color',
        ),
    ),
) );

arrowpress_customizer() ->add_field(   array(
    'type'        => 'text',
    'settings'    => 'go_back_home_404',
    'label'       => esc_html__( 'Button Go To Home', 'arangi' ),
    'section'     => $section,
    'priority'    => $priority ++,
    'default'     => esc_html__( 'Back to home', 'arangi' ),
) );

arrowpress_customizer() ->add_field(   array(
    'type'        => 'color',
    'settings'    => 'go_back_home_404_color',
    'label'       => esc_html__( 'Button Text Color.', 'arangi' ),
    'section'     => $section,
    'priority'    => $priority ++,
    'transport'   => 'auto',
    'default'     => '#ffffff',
    'output'      => array(
        array(
            'element'  => '.page-404 .go-home',
            'property' => 'color',
        ),
    ),
) );

arrowpress_customizer() ->add_field(   array(
    'type'        => 'color',
    'settings'    => 'btn_404_gradient_color',
    'label'       => esc_html__( 'Button Gradient Color', 'arangi' ),
    'section'     => $section,
    'priority'    => $priority ++,
    'transport'   => 'auto',
    'default'     => '#c64c61',
) );

arrowpress_customizer() ->add_field(   array(
    'type'        => 'color',
    'settings'    => 'btn_404_gradient_second_color',
    'label'       => esc_html__( 'Button Gradient Second Color', 'arangi' ),
    'section'     => $section,
    'priority'    => $priority ++,
    'transport'   => 'auto',
    'default'     => '#e99775',
) );

arrowpress_customizer() ->add_field(   array(
    'type'        => 'background',
    'settings'    => $prefix . 'bg_404',
    'label'       => esc_html__( 'Background images', 'arangi' ),
    'description' => esc_html__( 'Background image for 404 page', 'arangi' ),
    'section'     => $section,
    'priority'    => $priority ++,
    'default'     => array(
        'background-image'      => '',
        'background-repeat'     => 'no-repeat',
        'background-size'       => 'cover',
        'background-attachment' => 'fixed',
        'background-position'   => 'center center',
    ),
    'output'      => array(
        array(
            'element' => 'body .page-404',
        ),
    ),
) );

/*Coming soon */
arrowpress_customizer() ->add_field(   array(
    'type'     => 'custom',
    'settings' => $prefix . 'group_coming' . $priority ++,
    'section'  => $section,
    'priority' => $priority ++,
    'default'  => '<div class="big_title">' . esc_html__( 'Coming Soon', 'arangi' ) . '</div>',
) );

arrowpress_customizer() ->add_field(   array(
    'type'        => 'radio-buttonset',
    'settings'    => 'coming_soon_enable',
    'label'       => esc_html__( 'Activate under construction mode', 'arangi' ),
    'section'     => $section,
    'priority'    => $priority ++,
    'default'     => '0',
    'choices'     => array(
        '0' => esc_html__( 'Off', 'arangi' ),
        '1' => esc_html__( 'On', 'arangi' ),
    ),
) );

arrowpress_customizer() ->add_field(   array(
    'type'        => 'text',
    'settings'    => 'cm_title',
    'label'       => esc_html__( 'Title', 'arangi' ),
    'section'     => $section,
    'priority'    => $priority ++,
    'default'     => esc_html__( 'Daily Deals', 'arangi' ),
) );

arrowpress_customizer() ->add_field(   array(
    'type'        => 'color',
    'settings'    => 'cm_gradient_color',
    'label'       => esc_html__( 'Gradient Color', 'arangi' ),
    'section'     => $section,
    'priority'    => $priority ++,
    'transport'   => 'auto',
    'default'     => '',
) );

arrowpress_customizer() ->add_field(   array(
    'type'        => 'color',
    'settings'    => 'cm_gradient_second_color',
    'label'       => esc_html__( 'Gradient Second Color', 'arangi' ),
    'section'     => $section,
    'priority'    => $priority ++,
    'transport'   => 'auto',
    'default'     => '',
) );

arrowpress_customizer() ->add_field(   array(
    'type'        => 'text',
    'settings'    => 'cm_text_content',
    'label'       => esc_html__( 'Text content', 'arangi' ),
    'section'     => $section,
    'priority'    => $priority ++,
    'default'     => esc_html__( 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.', 'arangi' ),
) );

arrowpress_customizer() ->add_field(   array(
    'type'        => 'color',
    'settings'    => 'cm_text_content_color',
    'label'       => esc_html__( 'Text Content Color.', 'arangi' ),
    'section'     => $section,
    'priority'    => $priority ++,
    'transport'   => 'auto',
    'default'     => '',
    'output'      => array(
        array(
            'element'  => '.coming-soon p.cm-info',
            'property' => 'color',
            'suffix'   => ' !important',
        ),
    ),
) );

arrowpress_customizer() ->add_field(   array(
    'type'        => 'background',
    'settings'    => $prefix . 'bg_cm_img_overlay',
    'label'       => esc_html__( 'Background images', 'arangi' ),
    'description' => esc_html__( 'Background image for coming soon page', 'arangi' ),
    'section'     => $section,
    'priority'    => $priority ++,
    'default'     => array(
        'background-image'      => '',
        'background-repeat'     => 'no-repeat',
        'background-size'       => 'cover',
        'background-attachment' => 'fixed',
        'background-position'   => 'center center',
    ),
    'output'      => array(
        array(
            'element' => 'body .coming-soon-container',
        ),
    ),
) );

arrowpress_customizer() ->add_field(   array(
    'type'        => 'color',
    'settings'    => 'coming_subcribe_border-color',
    'label'       => esc_html__( 'Form Coming Soon Input Border Color.', 'arangi' ),
    'section'     => $section,
    'priority'    => $priority ++,
    'transport'   => 'auto',
    'default'     => '',
    'output'      => array(
        array(
            'element'  => '.page-coming-soon .coming-subcribe .mc4wp-form-fields input[type=email]',
            'property' => 'border-color',
            'suffix'   => ' !important',
        ),
    ),
) );

arrowpress_customizer() ->add_field(   array(
    'type'        => 'color',
    'settings'    => 'coming_subcribe_input',
    'label'       => esc_html__( 'Form Coming Soon Input Color.', 'arangi' ),
    'section'     => $section,
    'priority'    => $priority ++,
    'transport'   => 'auto',
    'default'     => '',
    'output'      => array(
        array(
            'element'  => '.page-coming-soon .coming-subcribe .mc4wp-form-fields input[type=email],
            .page-coming-soon .coming-subcribe .mc4wp-form-fields input[type=email]::placeholder
            ',
            'property' => 'color',
            'suffix'   => ' !important',
        ),
    ),
) );

arrowpress_customizer() ->add_field(   array(
    'type'        => 'text',
    'settings'    => 'coming_subcribe_text',
    'label'       => esc_html__( 'Submit button text', 'arangi' ),
    'section'     => $section,
    'priority'    => $priority ++,
    'default'     => esc_html__( 'Notify Me', 'arangi' ),
) );

arrowpress_customizer() ->add_field(   array(
    'type'     => 'date',
    'settings' => 'coming_soon_countdown',
    'label'    => esc_html__( 'Countdown', 'arangi' ),
    'section'  => $section,
    'priority' => $priority ++,
    'default'  => Arangi_Helper::get_coming_soon_demo_date(),
) );