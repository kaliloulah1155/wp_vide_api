<?php
$section             = 'sidebars';
$priority            = 1;
$prefix              = 'sidebars_';
arrowpress_customizer() ->add_field(   array(
	'type'        => 'color',
	'settings'    => 'title_sidebar_color',
	'label'       => esc_html__( 'Title Color', 'arangi' ),
	'section'     => $section,
	'priority'    => $priority ++,
	'transport'   => 'auto',
	'default'     => Arangi::HEADING_COLOR,
	'output'      => array(
		array(
			'element'  => '
				.active-sidebar .widget .widget-title',
			'property' => 'color',
		),
	),
) );
arrowpress_customizer() ->add_field(   array(
	'type'        => 'color',
	'settings'    => 'link_sidebar_color',
	'label'       => esc_html__( 'Link Color', 'arangi' ),
	'section'     => $section,
	'priority'    => $priority ++,
	'transport'   => 'auto',
	'default'     => '#333',
	'output'      => array(
		array(
			'element'  => '
				.active-sidebar .widget a,
				.active-sidebar .tm-posts-widget .post-widget-info .post-widget-title a,
				.active-sidebar .widget.widget_product_categories ul.product-categories li.current-cat>a, 
				.active-sidebar .widget.widget_product_categories ul.product-categories li.current-cat>p, 
				.active-sidebar .widget.widget_product_categories ul.product-categories li.current-cat>span.count',
			'property' => 'color',
		),
	),
) );
arrowpress_customizer() ->add_field(   array(
	'type'        => 'color',
	'settings'    => 'link_hover_sidebar_color',
	'label'       => esc_html__( 'Link Hover Color', 'arangi' ),
	'section'     => $section,
	'priority'    => $priority ++,
	'transport'   => 'auto',
	'default'     => '',
	'output'      => array(
		array(
			'element'  => '
				.active-sidebar .widget a:hover,
				.active-sidebar .widget.widget_product_categories ul.product-categories li:hover>a, 
				.active-sidebar .widget.widget_product_categories ul.product-categories li:hover>p, 
				.active-sidebar .widget.widget_product_categories ul.product-categories li:hover>span.count,
				.active-sidebar .widget.brand li:hover a,
				.active-sidebar .widget.widget_categories a:hover,
				.active-sidebar .widget.yith-woocompare-widget .products-list li:hover .title,
				.active-sidebar .tm-posts-widget .post-widget-info .post-widget-title a:hover',
			'property' => 'color',
		),
	),
) );
arrowpress_customizer() ->add_field(   array(
	'type'        => 'color',
	'settings'    => 'content_sidebar_color',
	'label'       => esc_html__( 'Content Color', 'arangi' ),
	'section'     => $section,
	'priority'    => $priority ++,
	'transport'   => 'auto',
	'default'     => '#948e90',
	'output'      => array(
		array(
			'element'  => '
				.active-sidebar',
			'property' => 'color',
		),
	),
) );