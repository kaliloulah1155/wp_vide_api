<?php
/**
 * Theme Customizer
 *
 * @package APR Arangi
 * @since   1.0
 */
/**
 * Setup configuration
 */
// arrowpress_customizer() ->add_config(   array(
// 	'option_type' => 'theme_mod',
// 	'capability'  => 'edit_theme_options', 
// ) );
/**
 * Add sections
 */
$priority = 1;
arrowpress_customizer()->add_panel( array(
	'id' => 'general',
	'title'    => esc_html__( 'General', 'arangi' ),
	'priority' => $priority ++,
) );
arrowpress_customizer() ->add_panel(  array(
	'id' => 'header',
	'title'    => esc_html__( 'Header', 'arangi' ),
	'priority' => $priority ++,
) );
arrowpress_customizer() ->add_panel( array(
	'id' =>  'footer',
	'title'    => esc_html__( 'Footer', 'arangi' ),
	'priority' => $priority ++,
) );
arrowpress_customizer() ->add_panel( array(
	'id' =>  'blog',
	'title'    => esc_html__( 'Blog', 'arangi' ),
	'priority' => $priority ++,
) );
arrowpress_customizer() ->add_panel(  array(
	'id' => 'shop',
	'title'    => esc_html__( 'Shop', 'arangi' ),
	'priority' => $priority ++,
) );
arrowpress_customizer() ->add_section(  array(
	'id' => 'socials',
	'title'    => esc_html__( 'Social Networks', 'arangi' ),
	'priority' => $priority ++,
) );
arrowpress_customizer() ->add_section(  array(
	'id' => 'sidebars',
	'title'    => esc_html__( 'Sidebars', 'arangi' ),
	'priority' => $priority ++,
) );
arrowpress_customizer() ->add_section(  array(
	'id' => 'error404_page',
	'title'    => esc_html__( '404 Page & Maintenance', 'arangi' ),
	'priority' => $priority ++,
) );
arrowpress_customizer() ->add_section(  array(
	'id' => 'advanced',
	'title'    => esc_html__( 'Advanced', 'arangi' ),
	'priority' => $priority ++,
) );
arrowpress_customizer() ->add_panel(  array(
	'id' => 'popup',
	'title'    => esc_html__( 'Popup', 'arangi' ),
	'priority' => $priority ++,
) );
/**
 * Load panel & section files
 */
/* General */
require_once ARANGI_CUSTOMIZER_DIR .'/general/_panel.php';
require_once ARANGI_CUSTOMIZER_DIR .'/general/typography.php';
require_once ARANGI_CUSTOMIZER_DIR .'/general/color.php';
require_once ARANGI_CUSTOMIZER_DIR .'/general/layout.php';
require_once ARANGI_CUSTOMIZER_DIR .'/general/logo.php';
require_once ARANGI_CUSTOMIZER_DIR .'/general/preloader.php';
require_once ARANGI_CUSTOMIZER_DIR .'/general/breadcrumb.php';
require_once ARANGI_CUSTOMIZER_DIR .'/general/slider.php';
/* Header */
require_once ARANGI_CUSTOMIZER_DIR .'/header/_panel.php';
require_once ARANGI_CUSTOMIZER_DIR .'/header/general.php';
require_once ARANGI_CUSTOMIZER_DIR .'/header/sticky.php';
require_once ARANGI_CUSTOMIZER_DIR .'/header/mobile.php';
require_once ARANGI_CUSTOMIZER_DIR .'/header/layout-1.php';
require_once ARANGI_CUSTOMIZER_DIR .'/header/layout-2.php';
require_once ARANGI_CUSTOMIZER_DIR .'/header/layout-3.php';
require_once ARANGI_CUSTOMIZER_DIR .'/header/layout-4.php';
require_once ARANGI_CUSTOMIZER_DIR .'/header/layout-5.php';
require_once ARANGI_CUSTOMIZER_DIR .'/header/layout-6.php';
require_once ARANGI_CUSTOMIZER_DIR .'/header/humburger.php';
/* Footer */
require_once ARANGI_CUSTOMIZER_DIR .'/footer/_panel.php';
require_once ARANGI_CUSTOMIZER_DIR .'/footer/general.php';
require_once ARANGI_CUSTOMIZER_DIR .'/footer/layout-01.php';
require_once ARANGI_CUSTOMIZER_DIR .'/footer/layout-02.php';
require_once ARANGI_CUSTOMIZER_DIR .'/footer/layout-03.php';
require_once ARANGI_CUSTOMIZER_DIR .'/footer/layout-04.php';
/* Advanced */
require_once ARANGI_CUSTOMIZER_DIR .'/section-advanced.php';
require_once ARANGI_CUSTOMIZER_DIR .'/section-error404.php';
/* Blog */
require_once ARANGI_CUSTOMIZER_DIR .'/blog/_panel.php';
require_once ARANGI_CUSTOMIZER_DIR .'/blog/general.php';
require_once ARANGI_CUSTOMIZER_DIR .'/blog/archive.php';
require_once ARANGI_CUSTOMIZER_DIR .'/blog/single.php';
/* Shop */
require_once ARANGI_CUSTOMIZER_DIR .'/shop/_panel.php';
require_once ARANGI_CUSTOMIZER_DIR .'/shop/general.php';
require_once ARANGI_CUSTOMIZER_DIR .'/shop/archive.php';
require_once ARANGI_CUSTOMIZER_DIR .'/shop/single.php';
require_once ARANGI_CUSTOMIZER_DIR .'/shop/cart.php';
require_once ARANGI_CUSTOMIZER_DIR .'/section-socials.php';
require_once ARANGI_CUSTOMIZER_DIR .'/section-sidebars.php';
require_once ARANGI_CUSTOMIZER_DIR .'/popup/_panel.php';
require_once ARANGI_CUSTOMIZER_DIR .'/popup/sale-off.php';
require_once ARANGI_CUSTOMIZER_DIR .'/popup/account.php';