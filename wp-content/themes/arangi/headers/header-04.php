<?php
$header_layout_style = get_post_meta(get_the_ID(), 'header_layout', true);
if($header_layout_style && $header_layout_style != 'default'){
    $header_layout_style = $header_layout_style;
}else{
    $header_layout_style = Arangi::setting( 'header_layout_style' );
}
if($header_layout_style == 'wide'){
    $container = 'container-fluid';
}elseif($header_layout_style == 'boxed'){
    $container = 'container-fluid boxed';
}else{
    $container = 'container';
}
$show_header_contact = Arangi::setting( 'show_contact_4' );
$icon_contact = Arangi::setting( 'icon_contact_4' );
$phone_contact = Arangi::setting( 'phone_contact' );
$show_search = Arangi::setting( 'show_search_4' );
$show_lang_switcher_4 = Arangi::setting('show_lang_4');

$show_settings = Arangi::setting('show_settings_4');
$show_mini_cart = Arangi::setting('show_mini_cart_4');
Arangi_Templates::get_search_box();
?>
<header id="masthead" <?php Arangi::header_class(); ?>>
    <div class="header-top">
        <div class="<?php echo esc_attr($container);?>">
            <div class="row">
                <div class="col-sm-3 col-md-3 col-lg-3 col-xl-3">
                    <?php Arangi_Templates::get_logo();?>
                </div>
				<div class="col-sm-9 col-md-9 col-lg-9 col-xl-9 text-right hidden-mobile">
					<?php if ($show_header_contact == 'show'){?>
                        <div class="d-inline-block">
                            <div class="info-part d-flex">
                                <div class="icon align-self-center">
                                    <i class="<?php echo esc_attr($icon_contact);?>"></i>
                                </div>
                                <div class="details align-self-center">
                                    <div class="content-topbar">
                                        <a href="tel:<?php echo esc_attr($phone_contact)?>"><?php echo esc_attr($phone_contact)?></a>
                                    </div>
                                </div>
                            </div>
                        </div>
					<?php }?>
					<?php if (class_exists( 'WooCommerce' )) {?>
						<div class="d-inline-block header-icon">
                            <?php
                                if ($show_settings) {
                                    Arangi_Templates::get_setting_template();
                                }
                                if ($show_mini_cart) {
                                    Arangi_Templates::get_minicart_template();
                                }
                            ?>
						</div>
                    <?php } ?> 
					<?php
						if ($show_lang_switcher_4) {
							if (class_exists('SitePress')) {
								Arangi_WPML::show_language_dropdown();
							}else{
								Arangi_WPML::show_language_dropdown_demo();
							}
						}
					?>
                </div>
                <div class="hidden-desktop col-md-6 col-sm-3 align-items-center menu-col-right">
                    <div class="menu-icon align-items-center justify-content-sm-end">
                        <span class="ti-menu"></span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="header-bottom">
        <div class="<?php echo esc_attr($container);?>">
            <div class="row">
                <div class="<?php if ($show_search == 'show'){echo "col-lg-9 col-xl-10 ";}else{ echo "col-lg-12 col-xl-12 ";}?> col-sm-12 col-md-6 align-items-left">
                    <div class="header-menu d-flex align-items-center justify-content-sm-left">
                        <nav id="site-navigation" class="main-navigation">
                            <?php Arangi::menu_primary(); ?>
                        </nav>
                    </div>
                </div>
                <?php if ($show_search == 'show'): ?>
                    <div class="<?php if ($show_search) {echo 'col-xl-2 col-lg-3 hidden-mobile';}else{echo 'col-xs-12 col-lg-12';}?>">
                        <div class="header-nav-inner d-flex align-items-center">
                            <?php Arangi_Templates::get_search_header_4(); ?>
                        </div>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
    <?php

    if ($show_settings && class_exists( 'WooCommerce' )) {
        if(!is_user_logged_in()){
            Arangi_Templates::account_popup();
        }
    }
    Arangi_Templates::mobile_menu();
    ?>
</header> <!-- End masthead -->

