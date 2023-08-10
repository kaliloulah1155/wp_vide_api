<?php
$panel    = 'footer';
$panel_footer = 'footer_layout';
$priority = 1;
arrowpress_customizer() ->add_section( array(
	'id' =>'footer', 
	'title'    => esc_html__( 'General', 'arangi' ),
	'panel'    => $panel,
	'priority' => $priority ++,
) );
arrowpress_customizer() ->add_section(  array( 
	'id' =>'footer_layout_01',
	'title'    => esc_html__( 'Footer Layout 1', 'arangi' ),
	'panel'    => $panel,
	'priority' => $priority ++,
) );
arrowpress_customizer() ->add_section(  array(
	'id' =>'footer_layout_02',
	'title'    => esc_html__( 'Footer Layout 2', 'arangi' ),
	'panel'    => $panel,
	'priority' => $priority ++,
) );
arrowpress_customizer() ->add_section( array(
	'id' => 'footer_layout_03',
	'title'    => esc_html__( 'Footer Layout 3', 'arangi' ),
	'panel'    => $panel,
	'priority' => $priority ++,
) );
arrowpress_customizer() ->add_section(  array(
	'id' =>'footer_layout_04',
	'title'    => esc_html__( 'Footer Layout 4', 'arangi' ),
	'panel'    => $panel,
	'priority' => $priority ++,
) );



