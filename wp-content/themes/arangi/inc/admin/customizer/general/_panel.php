<?php
$panel    = 'general';
$priority = 1;
arrowpress_customizer() ->add_section(  array(
	'id' =>'layout-config',
    'title'    => esc_html__( 'Layout', 'arangi' ),
    'panel'    => $panel,
    'priority' => $priority ++,
) );
arrowpress_customizer() ->add_section(  array(
	'id' =>'color-config',
	'title'    => esc_html__( 'Color', 'arangi' ),
	'panel'    => $panel,
	'priority' => $priority ++,
) );
arrowpress_customizer() ->add_section( array(
	'id' => 'typography-config',
	'title'    => esc_html__( 'Typography', 'arangi' ),
	'panel'    => $panel,
	'priority' => $priority ++,
) );
arrowpress_customizer() ->add_section(  array(
	'id' =>'logo-config',
	'title'    => esc_html__( 'Logo', 'arangi' ),
	'panel'    => $panel,
	'priority' => $priority ++,
) );
arrowpress_customizer() ->add_section( array(
	'id' => 'preloader-config',
	'title'    => esc_html__( 'Preloader', 'arangi' ),
	'panel'    => $panel,
	'priority' => $priority ++,
) );
arrowpress_customizer() ->add_section(array(
	'id' => 'breadcrumb-config', 
	'title'    => esc_html__( 'Breadcrumbs & Page Title', 'arangi' ),
	'panel'    => $panel,
	'priority' => $priority ++,
) );
arrowpress_customizer() ->add_section( array(
	'id' =>'slide-config', 
	'title'    => esc_html__( 'Slide Color', 'arangi' ),
	'panel'    => $panel,
	'priority' => $priority ++,
) );