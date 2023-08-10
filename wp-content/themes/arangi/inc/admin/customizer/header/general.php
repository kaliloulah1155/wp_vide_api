<?php
$section  = 'header';
$priority = 1;
$prefix   = 'header_';
arrowpress_customizer() ->add_field(   array(
	'type'        => 'select',
	'settings'    => 'global_header',
	'label'       => esc_html__( 'Default Header', 'arangi' ),
	'description' => esc_html__( 'Select default header type for your site.', 'arangi' ),
	'section'     => $section,
	'priority'    => $priority ++,
	'default'     => '01',
	'choices'     => Arangi_Helper::get_header_list(),
) );
arrowpress_customizer() ->add_field(   array(
	'type'        => 'toggle',
	'settings'    => 'fixed_header',
	'label'       => esc_html__( 'Enable Fixed Header', 'arangi' ),
	'description' => esc_html__( 'Header displays over content', 'arangi' ),
	'section'     => $section,
	'priority'    => $priority ++,
	'default'     => 0,
) );
arrowpress_customizer() ->add_field (  array(
	'type'        => 'radio-buttonset',
	'settings'    => 'header_layout_style',
	'label'       => __( 'Header layout style', 'arangi' ),
	'section'     => $section,
	'default'     => 'full_width',
	'priority'    => $priority ++,
	'choices'     => array(
		'wide'        => esc_attr__( 'Wide', 'arangi' ),
		'full_width'  => esc_attr__( 'Full Width', 'arangi' ),
		'boxed'       => esc_attr__( 'Boxed', 'arangi' ),
	)
));

arrowpress_customizer() ->add_field(   array(
	'type'     => 'radio-buttonset',
	'settings' => 'header_search',
	'label'    => esc_html__( 'Header Search Type', 'arangi' ),
	'section'  => $section,
	'priority' => $priority ++,
	'default'  => 'product',
	'choices'  => array(
		'product' => esc_html__( 'Product (if Woocommerce enable)', 'arangi' ),
		'blog' => esc_html__( 'Blog', 'arangi' ),
	)
) );

arrowpress_customizer() ->add_field(   array(
    'type'     => 'custom',
    'settings' => $prefix . 'group_contact_' . $priority ++. "_2",
    'section'  => $section,
    'priority' => $priority ++,
    'default'  => '<div class="big_title">' . esc_html__( 'Contact', 'arangi' ) . '</div>',
) );
arrowpress_customizer() ->add_field(   array(
    'type'     => 'text',
    'settings' => 'text_contact',
    'label'    => esc_html__( 'Enter Contact Text', 'arangi' ),
    'section'  => $section,
    'default'  => esc_attr__( 'info line', 'arangi' ),
    'priority' => $priority ++,
) );
arrowpress_customizer() ->add_field(   array(
    'type'     => 'text',
    'settings' => 'phone_contact',
    'label'    => esc_html__( 'Enter Contact phone number', 'arangi' ),
    'section'  => $section,
    'default'  => esc_attr__( '01029001209', 'arangi' ),
    'priority' => $priority ++,
) );