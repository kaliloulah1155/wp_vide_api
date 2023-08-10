<?php
$section  = 'general_shop';
$priority = 1;
$prefix   = 'general_shop_';
arrowpress_customizer() ->add_field(   array(
	'type'        => 'number',
	'settings'    => 'number_cate',
	'label'       => esc_html__( '[Desktop] Number of categories to show', 'arangi' ),
	'description' => esc_html__( 'This option will work if you select to display categories in shop archive page.', 'arangi' ),
	'section'     => $section,
	'priority'    => $priority ++,
	'default'     => '4',
) );
arrowpress_customizer() ->add_field(   array(
	'type'        => 'radio-buttonset',
	'settings'    => $prefix . 'main',
	'label'       => esc_html__( 'Main Shop Layout', 'arangi' ),
	'section'     => $section,
	'priority'    => $priority ++,
	'default'     => 'grid-1',
	'choices'     => array(
		'grid-1' => esc_html__( 'Default', 'arangi' ),
		'grid-3' => esc_html__( 'Layout 2', 'arangi' ),
	),
) );
/*--------------------------------------------------------------
# Product Button
--------------------------------------------------------------*/
arrowpress_customizer() ->add_field(   array(
	'type'     => 'custom',
	'settings' => $prefix . 'group_title_' . $priority ++,
	'section'  => $section,
	'priority' => $priority ++,
	'default'  => '<div class="big_title">' . esc_html__( 'Product Button', 'arangi' ) . '</div>',
) );
arrowpress_customizer() ->add_field(   array(
	'type'        => 'radio-buttonset',
	'settings'    => 'add_to_cart',
	'label'       => esc_html__( 'Show Add to Cart button', 'arangi' ),
	'section'     => $section,
	'priority'    => $priority ++,
	'default'     => '1',
	'choices'     => array(
		'0' => esc_html__( 'Off', 'arangi' ),
		'1' => esc_html__( 'On', 'arangi' ),
	),
) );
arrowpress_customizer() ->add_field(   array(
	'type'        => 'radio-buttonset',
	'settings'    => 'product_price',
	'label'       => esc_html__( 'Show Product Price', 'arangi' ),
	'section'     => $section,
	'priority'    => $priority ++,
	'default'     => '1',
	'choices'     => array(
		'0' => esc_html__( 'Off', 'arangi' ),
		'1' => esc_html__( 'On', 'arangi' ),
	),
) );
arrowpress_customizer() ->add_field(   array(
	'type'        => 'radio-buttonset',
	'settings'    => 'product_quickview',
	'label'       => esc_html__( 'Show Quickview', 'arangi' ),
	'section'     => $section,
	'priority'    => $priority ++,
	'default'     => '1',
	'choices'     => array(
		'0' => esc_html__( 'Off', 'arangi' ),
		'1' => esc_html__( 'On', 'arangi' ),
	),
) );
arrowpress_customizer() ->add_field(   array(
	'type'        => 'radio-buttonset',
	'settings'    => 'product_compare',
	'label'       => esc_html__( 'Show Compare', 'arangi' ),
	'section'     => $section,
	'priority'    => $priority ++,
	'default'     => '1',
	'choices'     => array(
		'0' => esc_html__( 'Off', 'arangi' ),
		'1' => esc_html__( 'On', 'arangi' ),
	),
) );
arrowpress_customizer() ->add_field(   array(
	'type'        => 'radio-buttonset',
	'settings'    => 'product_wishlist',
	'label'       => esc_html__( 'Show Wishlist', 'arangi' ),
	'section'     => $section,
	'priority'    => $priority ++,
	'default'     => '1',
	'choices'     => array(
		'0' => esc_html__( 'Off', 'arangi' ),
		'1' => esc_html__( 'On', 'arangi' ),
	),
) );
/*--------------------------------------------------------------
# Product Lable
--------------------------------------------------------------*/
arrowpress_customizer() ->add_field(   array(
	'type'     => 'custom',
	'settings' => $prefix . 'group_title_' . $priority ++,
	'section'  => $section,
	'priority' => $priority ++,
	'default'  => '<div class="big_title">' . esc_html__( 'Product Label', 'arangi' ) . '</div>',
) );
arrowpress_customizer() ->add_field(   array(
	'type'        => 'radio-buttonset',
	'settings'    => 'hot_lable',
	'label'       => esc_html__( 'Show "Hot" Label', 'arangi' ),
	'description' => esc_html__( 'Will be show in the featured product.', 'arangi' ),
	'section'     => $section,
	'priority'    => $priority ++,
	'default'     => '1',
	'choices'     => array(
		'0' => esc_html__( 'Off', 'arangi' ),
		'1' => esc_html__( 'On', 'arangi' ),
	),
) );
arrowpress_customizer() ->add_field(   array(
	'type'        => 'radio-buttonset',
	'settings'    => 'new_lable',
	'label'       => esc_html__( 'Show "New" Label', 'arangi' ),
	'description' => esc_html__( 'Will be show in the recent product.', 'arangi' ),
	'section'     => $section,
	'priority'    => $priority ++,
	'default'     => '1',
	'choices'     => array(
		'0' => esc_html__( 'Off', 'arangi' ),
		'1' => esc_html__( 'On', 'arangi' ),
	),
) );
arrowpress_customizer() ->add_field(   array(
	'type'        => 'radio-buttonset',
	'settings'    => 'sale_lable',
	'label'       => esc_html__( 'Show "Sale" Label', 'arangi' ),
	'description' => esc_html__( 'Will be show in the special product.', 'arangi' ),
	'section'     => $section,
	'priority'    => $priority ++,
	'default'     => '1',
	'choices'     => array(
		'0' => esc_html__( 'Off', 'arangi' ),
		'1' => esc_html__( 'On', 'arangi' ),
	),
) );
arrowpress_customizer() ->add_field(   array(
	'type'        => 'radio-buttonset',
	'settings'    => 'percentage_lable',
	'label'       => esc_html__( 'Show Sale Price Percentage', 'arangi' ),
	'description' => esc_html__( 'Will be show in the special product.', 'arangi' ),
	'section'     => $section,
	'priority'    => $priority ++,
	'default'     => '1',
	'choices'     => array(
		'0' => esc_html__( 'Off', 'arangi' ),
		'1' => esc_html__( 'On', 'arangi' ),
	),
) );
arrowpress_customizer() ->add_field(   array(
	'type'        => 'select',
	'settings'    => 'shop_archive_new_days',
	'label'       => esc_html__( 'New Badge (Days)', 'arangi' ),
	'description' => esc_html__( 'If the product was published within the newness time frame display the new badge.', 'arangi' ),
	'section'     => $section,
	'priority'    => $priority ++,
	'default'     => '7',
	'choices'     => array(
		'0'  => esc_html__( 'None', 'arangi' ),
		'1'  => esc_html__( '1 day', 'arangi' ),
		'2'  => esc_html__( '2 days', 'arangi' ),
		'3'  => esc_html__( '3 days', 'arangi' ),
		'4'  => esc_html__( '4 days', 'arangi' ),
		'5'  => esc_html__( '5 days', 'arangi' ),
		'6'  => esc_html__( '6 days', 'arangi' ),
		'7'  => esc_html__( '7 days', 'arangi' ),
		'8'  => esc_html__( '8 days', 'arangi' ),
		'9'  => esc_html__( '9 days', 'arangi' ),
		'10' => esc_html__( '10 days', 'arangi' ),
		'15' => esc_html__( '15 days', 'arangi' ),
		'20' => esc_html__( '20 days', 'arangi' ),
		'25' => esc_html__( '25 days', 'arangi' ),
		'30' => esc_html__( '30 days', 'arangi' ),
		'60' => esc_html__( '60 days', 'arangi' ),
		'90' => esc_html__( '90 days', 'arangi' ),
	),
) );