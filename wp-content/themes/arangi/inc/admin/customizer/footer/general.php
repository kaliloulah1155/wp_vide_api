<?php
$section  = 'footer';
$priority = 1;
$prefix   = 'footer_';
$footers = Arangi_Helper::get_footer_list();
$yes = esc_html__( 'Yes', 'arangi' );
$no = esc_html__( 'No', 'arangi' );
arrowpress_customizer() ->add_field(   array(
    'type'        => 'radio-buttonset',
    'settings'    => 'footer_layout',
    'label'       => esc_html__( 'Footer Layout', 'arangi' ),
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
	'settings'    => 'global_footer',
	'label'       => esc_html__( 'Default Footer', 'arangi' ),
	'description' => esc_html__( 'Select default footer type for your site.', 'arangi' ),
	'section'     => $section,
	'priority'    => $priority ++,
	'default'     => '01',
	'choices'     => Arangi_Helper::get_footer_list(  ),
) );
arrowpress_customizer() ->add_field(   array(
	'type'     => 'image',
	'settings' => 'logo_footer',
	'label'    => esc_html__( 'Logo', 'arangi' ),
	'description' => esc_html__('Select an image file for your logo','arangi'),
	'section'  => $section,
	'priority' => $priority ++,
	'default'  => ARANGI_THEME_URI . '/assets/images/logo-footer.png',
) );
arrowpress_customizer() ->add_field(   array(
	'type'     => 'textarea',
	'settings' => 'footer_copyright',
	'label'    => esc_html__( 'Copyright', 'arangi' ),
	'section'  => $section,
	'priority' => $priority ++,
	'default' => wp_kses( __(' <p>&copy; 2019, Arangi. All Rights Reserved.</p>', 'arangi'),
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
    'type'        => 'radio-buttonset',
    'settings'    => $prefix . 'show_social',
    'label'       => esc_html__( 'Show/hide Social', 'arangi' ),
    'section'     => $section,
    'priority'    => $priority ++,
    'default'     => '0',
    'choices'     => array(
        '0' => $no,
        '1' => $yes,
    ),
) );
arrowpress_customizer() ->add_field(   array(
    'type'        => 'radio-buttonset',
    'settings'    => 'show_payment',
    'label'       => esc_html__( 'Show payment', 'arangi' ),
    'section'     => $section,
    'priority'    => $priority ++,
    'default'     => '0',
    'choices'     => array(
        '0' => $no,
        '1' => $yes,
    ),
) );
arrowpress_customizer() ->add_field(   array(
    'type'     => 'radio-buttonset',
    'settings' => 'payment_link_target',
    'label'    => esc_html__( 'Open link in a new tab.', 'arangi' ),
    'section'  => $section,
    'priority' => $priority ++,
    'default'  => '1',
    'required'  => array(
        array(
            'setting'  => 'show_payment',
            'operator' => '==',
            'value'    => 1,
        ),
    ), 
    'choices'  => array(
        '0' => $no,
        '1' => $yes,
    ),
) );
arrowpress_customizer() ->add_field(   array(
    'type'     => 'radio-buttonset',
    'settings' => 'show_image',
    'label'    => esc_html__( 'Show image payment', 'arangi' ),
    'section'  => $section,
    'priority' => $priority ++,
    'default'  => '0',
    'required'  => array(
        array(
            'setting'  => 'show_payment',
            'operator' => '==',
            'value'    => 1,
        ),
    ), 
    'choices'  => array(
        '0' => esc_html__( 'Icon', 'arangi' ),
        '1' => esc_html__( 'Image', 'arangi' ),
    ),
) );
arrowpress_customizer() ->add_field(   array(
    'type'      => 'repeater',
    'settings'  => 'payment_item',
    'section'   => $section,
    'priority'  => $priority ++,
    'choices'   => array(
        'labels' => array(
            'add-new-row' => esc_html__( 'Add new payment', 'arangi' ),
        ),
    ),
    'row_label' => array(
        'type'  => 'field',
        'field' => 'tooltip',
    ),
     'default'   => array(
        array(
            'tooltip'    => esc_html__( 'Visa', 'arangi' ),
            'icon_class' => 'icon-visa-pay',
            'link_url'   => '#',
            'image_payment' => ARANGI_THEME_URI . '/assets/images/visa.png',
        ),
        array(
            'tooltip'    => esc_html__( 'Master card', 'arangi' ),
            'icon_class' => 'icon-master-card',
            'link_url'   => '#',
            'image_payment' => ARANGI_THEME_URI . '/assets/images/master_card.png',
        ),
        array(
            'tooltip'    => esc_html__( 'Amex', 'arangi' ),
            'icon_class' => 'icon-american-express',
            'link_url'   => '#',
            'image_payment' => ARANGI_THEME_URI . '/assets/images/american.png',
        ),
        array(
            'tooltip'    => esc_html__( 'Paypal', 'arangi' ),
            'icon_class' => 'icon-paypal-logo',
            'link_url'   => '#',
            'image_payment' => ARANGI_THEME_URI . '/assets/images/paypal.png',
        ),
    ),
    'required'  => array(
        array(
            'setting'  => 'show_payment',
            'operator' => '==',
            'value'    => 1,
        ),
    ), 
    'fields'    => array(
        'tooltip'    => array(
        'type'        => 'text',
        'label'       => esc_html__( 'Tooltip', 'arangi' ),
        'description' => esc_html__( 'Enter your hint text for your icon', 'arangi' ),
        'default'     => '',
        ),
        'icon_class' => array(
            'type'        => 'text',
            'label'       => esc_html__( 'Icon Class', 'arangi' ),
            'description' => esc_html__( 'This will be the icon class for your link', 'arangi' ),
            'default'     => '',
        ),
        'link_url'   => array(
            'type'        => 'text',
            'label'       => esc_html__( 'Link URL', 'arangi' ),
            'description' => esc_html__( 'This will be the link URL', 'arangi' ),
            'default'     => '',
        ),
        'image_payment'   => array(
            'type'        => 'image',
            'label'       => esc_html__( 'Image payment ', 'arangi' ),
            'description' => esc_html__( 'This will be the image', 'arangi' ),
            'default'     =>  ARANGI_THEME_URI . '/assets/images/visa.png',
        ),
    ),
    
) );
arrowpress_customizer() ->add_field(   array(
	'type'        => 'radio-buttonset',
	'settings'    => 'show_newsletter',
	'label'       => esc_html__( 'Show/hide Newsletter', 'arangi' ),
	'section'     => $section,
	'priority'    => $priority ++,
	'default'     => '1',
	'choices'     => array(
		'0' => $no,
		'1' => $yes,
	),
) );
arrowpress_customizer() ->add_field(   array(
	'type'     => 'custom',
	'settings' => $prefix . 'group_title_' . $priority ++,
	'section'  => $section,
	'priority' => $priority ++,
	'default'  => '<div class="big_title">' . esc_html__( 'Newsletter', 'arangi' ) . '</div>',
	'required'  => array(
        array(
            'setting'  => 'show_newsletter',
            'operator' => '==',
            'value'    => 1,
        ),
    ), 
) );

arrowpress_customizer() ->add_field(   array(
	'type'        => 'select',
	'settings'    => 'newsletter_tyle',
	'label'       => esc_html__( 'Default Newsletter', 'arangi' ),
	'description' => esc_html__( 'Select default newsletter type for footer.', 'arangi' ),
	'section'     => $section,
	'priority'    => $priority ++,
	'default'     => 'style1',
	'choices'     => array(
		'style1' => esc_html__( 'Newsleter Style 1', 'arangi' ),
		'style2' => esc_html__( 'Newsleter Style 2', 'arangi' ),
	),
) );

arrowpress_customizer() ->add_field(   array(
	'type'     => 'textarea',
	'settings' => 'newsletter_title',
	'label'    => esc_html__( 'Title newsletter.', 'arangi' ),
	'section'  => $section,
	'priority' => $priority ++,
	'required'  => array(
        array(
            'setting'  => 'show_newsletter',
            'operator' => '==',
            'value'    => 1,
        ),
        array(
            'setting'  => 'newsletter_tyle',
            'operator' => '==',
            'value'    => 'style1',
        ),
    ), 
    'default' => wp_kses( __('Our Newsletter','arangi'),
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
	'settings' => 'newsletter_title2',
	'label'    => esc_html__( 'Title newsletter.', 'arangi' ),
	'section'  => $section,
	'priority' => $priority ++,
	'required'  => array(
        array(
            'setting'  => 'show_newsletter',
            'operator' => '==',
            'value'    => 1,
        ),
        array(
            'setting'  => 'newsletter_tyle',
            'operator' => '==',
            'value'    => 'style2',
        ),
    ), 
    'default' => wp_kses( __('Sign Up <span>Newsletter</span>','arangi'),
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
	'settings' => 'newsletter_after_title',
	'label'    => esc_html__( 'After title newsletter.', 'arangi' ),
	'section'  => $section,
	'priority' => $priority ++,
	'required'  => array(
        array(
            'setting'  => 'show_newsletter',
            'operator' => '==',
            'value'    => 1,
        ),
        array(
            'setting'  => 'newsletter_tyle',
            'operator' => '==',
            'value'    => 'style1',
        ),
    ), 
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
arrowpress_customizer() ->add_field(   array(
	'type'     => 'textarea',
	'settings' => 'newsletter_desc',
	'label'    => esc_html__( 'Description newsletter.', 'arangi' ),
	'section'  => $section,
	'priority' => $priority ++,
	'required'  => array(
        array(
            'setting'  => 'show_newsletter',
            'operator' => '==',
            'value'    => 1,
        ),
         array(
            'setting'  => 'newsletter_tyle',
            'operator' => '==',
            'value'    => 'style1',
        ),
    ), 
	'default' => wp_kses( __('Don&rsquo;t miss the any update','arangi'),
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
	'settings' => 'newsletter_desc2',
	'label'    => esc_html__( 'Description newsletter.', 'arangi' ),
	'section'  => $section,
	'priority' => $priority ++,
	'required'  => array(
        array(
            'setting'  => 'show_newsletter',
            'operator' => '==',
            'value'    => 1,
        ),
         array(
            'setting'  => 'newsletter_tyle',
            'operator' => '==',
            'value'    => 'style2',
        ),
    ), 
	'default' => wp_kses( __('Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&rsquo;s standard dummy text.','arangi'),
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
	'settings' => 'text_privacy',
	'label'    => esc_html__( 'Privacy of newsletter.', 'arangi' ),
	'section'  => $section,
	'priority' => $priority ++,
	'required'  => array(
        array(
            'setting'  => 'show_newsletter',
            'operator' => '==',
            'value'    => 1,
        ),
         array(
            'setting'  => 'newsletter_tyle',
            'operator' => '==',
            'value'    => 'style2',
        ),
    ), 
	'default' => wp_kses( __('By signing up you agree our<a href="#">&nbsp;Terms &amp; Services</a>','arangi'),
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
	'type'        => 'background',
	'settings'    => 'newsletter_background',
	'label'       => esc_html__( 'Background', 'arangi' ),
	'description' => esc_html__( 'Controls the background of newsletter footer.', 'arangi' ),
	'section'     => $section,
	'priority'    => $priority ++,
	'default'     => array(
		'background-color'      => '#e5c8c3',
		'background-image'      => '',
		'background-repeat'     => 'no-repeat',
		'background-size'       => 'cover',
		'background-attachment' => 'scroll',
		'background-position'   => 'center center',
	),
	'output'      => array(
		array(
			'element' => '.footer-newsletter.newsletter-style1',
		),
	),
	'required'  => array(
        array(
            'setting'  => 'newsletter_tyle',
            'operator' => '==',
            'value'    => 'style1',
        ),
    ), 
) );
arrowpress_customizer() ->add_field(   array(
	'type'        => 'background',
	'settings'    => 'newsletter_background2',
	'label'       => esc_html__( 'Background', 'arangi' ),
	'description' => esc_html__( 'Controls the background of newsletter footer.', 'arangi' ),
	'section'     => $section,
	'priority'    => $priority ++,
	'default'     => array(
		'background-color'      => '#dbe7f5',
		'background-image'      => '',
		'background-repeat'     => 'no-repeat',
		'background-size'       => 'cover',
		'background-attachment' => 'scroll',
		'background-position'   => 'center center',
	),
	'output'      => array(
		array(
			'element' => '.footer-newsletter.newsletter-style2',
		),
	),
	'required'  => array(
        array(
            'setting'  => 'newsletter_tyle',
            'operator' => '==',
            'value'    => 'style2',
        ),
    ), 
) );
arrowpress_customizer() ->add_field(   array(
	'type'        => 'color-alpha',
	'settings'    => $prefix . 'newsletter_tt_color',
	'label'       => esc_html__( 'Newsletter Title Color', 'arangi' ),
	'section'     => $section,
	'priority'    => $priority ++,
	'transport'   => 'auto',
	'default'     => '#333333',
	'output'      => array(
		array(
			'element'  => '
				.newsletter_title h2',
			'property' => 'color',
		),
	),
	'required'  => array(
        array(
            'setting'  => 'newsletter_tyle',
            'operator' => '==',
            'value'    => 'style1',
        ),
    ), 
) );
arrowpress_customizer() ->add_field(   array(
	'type'        => 'color-alpha',
	'settings'    => $prefix . 'newsletter_tt_color2',
	'label'       => esc_html__( 'Newsletter Title Color', 'arangi' ),
	'section'     => $section,
	'priority'    => $priority ++,
	'transport'   => 'auto',
	'default'     => '#333333',
	'output'      => array(
		array(
			'element'  => '
				.newsletter_title h2',
			'property' => 'color',
		),
	),
	'required'  => array(
        array(
            'setting'  => 'newsletter_tyle',
            'operator' => '==',
            'value'    => 'style2',
        ),
    ), 
) );
arrowpress_customizer() ->add_field(   array(
	'type'        => 'color-alpha',
	'settings'    => $prefix . 'newsletter_desc_color',
	'label'       => esc_html__( 'Newsletter Description Color', 'arangi' ),
	'section'     => $section,
	'priority'    => $priority ++,
	'transport'   => 'auto',
	'default'     => '#5f5b5d',
	'output'      => array(
		array(
			'element'  => '
				.footer-newsletter .mc4wp-form-fields input[type=email], .mc4wp-form-fields p,
				.newletter-desc',
			'property' => 'color',
		),
	),
	'required'  => array(
        array(
            'setting'  => 'newsletter_tyle',
            'operator' => '==',
            'value'    => 'style1',
        ),
    ), 
) );
arrowpress_customizer() ->add_field(   array(
	'type'        => 'color-alpha',
	'settings'    => $prefix . 'newsletter_desc_color2',
	'label'       => esc_html__( 'Newsletter Description Color', 'arangi' ),
	'section'     => $section,
	'priority'    => $priority ++,
	'transport'   => 'auto',
	'default'     => '#6d6b6c',
	'output'      => array(
		array(
			'element'  => '
                .footer-newsletter.newsletter-style2 .mc4wp-form-fields input[type=email], .mc4wp-form-fields p,
				.newsletter-style2 .newletter-desc',
			'property' => 'color',
		),
	),
	'required'  => array(
        array(
            'setting'  => 'newsletter_tyle',
            'operator' => '==',
            'value'    => 'style2',
        ),
    ), 
) );
arrowpress_customizer() ->add_field(   array(
	'type'        => 'color-alpha',
	'settings'    => $prefix . 'privacy_color',
	'label'       => esc_html__( 'Text Privacy Color', 'arangi' ),
	'section'     => $section,
	'priority'    => $priority ++,
	'transport'   => 'auto',
	'default'     => '#6d6b6c',
	'output'      => array(
		array(
			'element'  => '
				.text-privacy',
			'property' => 'color',
		),
	),
	'required'  => array(
        array(
            'setting'  => 'newsletter_tyle',
            'operator' => '==',
            'value'    => 'style2',
        ),
    ), 
) );
arrowpress_customizer() ->add_field(   array(
	'type'        => 'color-alpha',
	'settings'    => $prefix . 'newsletter_tt_after_color',
	'label'       => esc_html__( 'Newsletter after title Color', 'arangi' ),
	'section'     => $section,
	'priority'    => $priority ++,
	'transport'   => 'auto',
	'default'     => 'rgba(144,101,121,0.08)',
	'output'      => array(
		array(
			'element'  => '
				.newsletter_title .title-after',
			'property' => 'color',
		),
	),
) );
