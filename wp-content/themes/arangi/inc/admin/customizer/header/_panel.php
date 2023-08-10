<?php
$panel    = 'header';
$panel_header = 'header_layout';
$priority = 1;
arrowpress_customizer() ->add_section(  array(
	'id' =>'header',
	'title'    => esc_html__( 'General', 'arangi' ),
	'panel'    => $panel,
	'priority' => $priority ++,
) );
arrowpress_customizer() ->add_section( array(
	'id' =>'header_sticky', 
	'title'    => esc_html__( 'Header Sticky', 'arangi' ),
	'panel'    => $panel,
	'priority' => $priority ++,
) );
arrowpress_customizer() ->add_section( array(
	'id' => 'header_mobile',
	'title'    => esc_html__( 'Header Mobile', 'arangi' ),
	'panel'    => $panel,
	'priority' => $priority ++,
) );
arrowpress_customizer() ->add_section(  array(
	'id' =>'header_layout_1',
	'title'    => esc_html__( 'Header Layout 1', 'arangi' ),
	'panel'    => $panel,
	'priority' => $priority ++,
) );
arrowpress_customizer() ->add_section( array(
	'id' => 'header_layout_2',
	'title'    => esc_html__( 'Header Layout 2', 'arangi' ),
	'panel'    => $panel,
	'priority' => $priority ++,
) );
arrowpress_customizer() ->add_section( array(
	'id' => 'header_layout_3',
	'title'    => esc_html__( 'Header Layout 3', 'arangi' ),
	'panel'    => $panel,
	'priority' => $priority ++,
) );
arrowpress_customizer() ->add_section( array(
	'id' => 'header_layout_4',
	'title'    => esc_html__( 'Header Layout 4', 'arangi' ),
	'panel'    => $panel,
	'priority' => $priority ++,
) );
arrowpress_customizer() ->add_section( array(
	'id' => 'header_layout_5',
	'title'    => esc_html__( 'Header Layout 5', 'arangi' ),
	'panel'    => $panel,
	'priority' => $priority ++,
) );
arrowpress_customizer() ->add_section( array(
	'id' => 'header_layout_6',
	'title'    => esc_html__( 'Header Layout 6', 'arangi' ),
	'panel'    => $panel,
	'priority' => $priority ++,
) );
arrowpress_customizer() ->add_section( array(
	'id' => 'humberger_menu',
    'title'    => esc_html__( 'Humburger Menu', 'arangi' ),
    'panel'    => $panel,
    'priority' => $priority ++,
) );




