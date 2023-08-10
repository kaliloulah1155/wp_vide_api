<?php
$panel    = 'popup';
$priority = 1;
arrowpress_customizer() ->add_section(array(
    'id' => 'sale_off', 
    'title'    => esc_html__( 'Sale Off', 'arangi' ),
    'panel'    => $panel,
    'priority' => $priority ++,
) );
arrowpress_customizer() ->add_section( array(
    'id' =>'account', 
    'title'    => esc_html__( 'Account', 'arangi' ),
    'panel'    => $panel,
    'priority' => $priority ++,
) );