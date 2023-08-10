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
$show_header_contact = Arangi::setting( 'show_header_contact' );
$icon_contact = Arangi::setting( 'icon_contact' );
$text_contact = Arangi::setting( 'text_contact' );
$phone_contact = Arangi::setting( 'phone_contact' );
$show_favorite = Arangi::setting( 'show_favorite' );
$show_lang_switcher_1 = Arangi::setting('show_lang_switcher_1');

$show_settings = Arangi::setting('show_settings');
$show_mini_cart = Arangi::setting('show_mini_cart');
Arangi_Templates::get_search_box();
?>
<header id="masthead" <?php Arangi::header_class(); ?>>
    <div class="header-content">
        <div class="<?php echo esc_attr($container);?>">
            <div class="row">
                <div class="col-sm-3 col-md-3 col-lg-2 col-xl-2 align-items-center menu-col-left ">
                    <?php
                    Arangi_Templates::get_logo();
                    ?>
                </div>
                <div class="<?php if ($show_header_contact == 'show'){echo "col-lg-8 col-xl-8 ";}else{ echo "col-lg-10 col-xl-10 ";}?> col-sm-12 col-md-6 menu-content align-items-center">
                    <div class="header-menu d-flex align-items-center <?php if ($show_header_contact == 'show'){echo "justify-content-sm-center";}else{ echo "justify-content-sm-end";}?>">
                        <nav id="site-navigation" class="main-navigation test">
                            <?php Arangi::menu_primary(); ?>
                        </nav>
                    </div>
                </div>
                <?php if ($show_header_contact == 'show'){?>
                    <div class="col-lg-2 col-xl-2 hidden-mobile align-items-center menu-col-right">
                        <div class="cont d-flex align-items-center">
                            <div class="info-part d-flex">
                                <div class="icon align-self-center">
                                    <i class="<?php echo esc_attr($icon_contact);?>"></i>
                                </div>
                                <div class="details align-self-center">
                                    <div class="title-topbar">
                                        <?php echo esc_attr($text_contact)?>
                                    </div>
                                    <div class="content-topbar">
                                        <a href="tel:<?php echo esc_attr($phone_contact)?>"><?php echo esc_attr($phone_contact)?></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php }?>
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
                <div class="<?php if ($show_lang_switcher_1) {echo 'col-xs-10 col-lg-10';}else{echo 'col-xs-12 col-lg-12 col-full custom-padding';}?> col-bottom-left">
                    <div class="header-nav-inner d-flex align-items-center">
                        <?php

                        $show_search = Arangi::setting('show_search');
                        if ($show_search) {
                            Arangi_Templates::search_category();
                        }
                        if (class_exists( 'WooCommerce' )) {?>
                            <div class="box-header-info">
                                <div class="header-icon d-flex align-items-center">
                                    <?php
                                        if ($show_favorite && class_exists( 'YITH_WCWL' )){?>
                                            <div class="favorite">
                                                <a href="<?php echo esc_url(home_url('/wishlist/')); ?>" class="icon-box"><i class="ti-heart"></i></a>
                                                <a class="box-label" href="<?php echo esc_url(home_url('/wishlist/')); ?>" class=""><?php echo esc_html__('Favorite', 'arangi')?></a>
                                            </div>
                                        <?php }
                                
                                    if ($show_mini_cart) {
                                        Arangi_Templates::get_minicart_template();
                                    }
                                    if ($show_settings) {
                                        Arangi_Templates::get_setting_template();
                                    }
                                    ?>
                                </div>
                            </div>
                        <?php } ?>
                    </div>

                </div>
                <?php
                if ($show_lang_switcher_1) {
                    ?>
                    <div class="col-xl-2 col-lg-2 col-bottom-right">
                        <?php
                        if (class_exists('SitePress')) {
                            Arangi_WPML::show_language_dropdown();
                        }else{
                            Arangi_WPML::show_language_dropdown_demo();
                        }
                        ?>
                    </div>
                    <?php
                }
                ?>
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

