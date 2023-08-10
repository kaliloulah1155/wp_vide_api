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
$logo_header = Arangi::setting( 'logo_header' );
?>
<?php Arangi_Templates::get_search_box();?>
<header id="masthead" <?php Arangi::header_class(); ?>>
	<div class="header-middle">
		<div class="<?php echo esc_attr($container);?>">
			<div class="row">
                <div class="col-sm-6 col-md-6 col-lg-3 col-xl-3 d-flex align-items-center menu-col-left">
                    <?php Arangi_Templates::get_logo(); ?>
                </div>
				<div class="col-sm-6 col-md-6 col-lg-9 col-xl-9 menu-col-right d-flex justify-content-end">
					<div class="header-menu d-inline-block">
						<nav id="site-navigation" class="main-navigation">
							<?php Arangi::menu_primary(); ?>
						</nav>
					</div>
					<div class="header-right d-inline-block">
                        <div class="header-icon">
                            <?php
                            $show_search_6 = Arangi::setting('show_search_6');
                            $icon_search_6 = Arangi::setting('icon_search_6');
                            $show_contact_6 = Arangi::setting( 'show_contact_6' );
                            $show_lang_6 = Arangi::setting( 'show_lang_6' );
                            $phone_contact = Arangi::setting('phone_contact');
                            $icon_contact_6 = Arangi::setting('icon_contact_6');
							if ($show_lang_6 == 'show'){
                                if (class_exists('SitePress')) {
                                    Arangi_WPML::show_language_dropdown();
                                }else{
                                    Arangi_WPML::show_language_dropdown_demo();
                                }
                            }
                            if ($show_search_6 && $icon_search_6) {
                                ?>
                                <div class ="search-header d-inline-block">
                                    <div class="icon-header btn-search">
                                        <i class="<?php echo esc_attr($icon_search_6); ?>"></i>
                                    </div>
                                </div>
                                <?php
                            }
                            $show_mini_cart_6 = Arangi::setting('show_mini_cart_6');
                            if ($show_mini_cart_6) {
                                Arangi_Templates::get_minicart_template();
                            }
                            $show_settings_6 = Arangi::setting('show_settings_6');
                            if ($show_settings_6) {
                                Arangi_Templates::get_setting_template();
                            }
                            ?>
                            <?php if ($show_contact_6 == 'show'){?>
                                <div class="header-contact">
                                    <a href="tel:<?php echo esc_attr($phone_contact)?>"><i class="<?php echo esc_attr($icon_contact_6);?>"></i></a>
                                </div>
                            <?php }?>
                        </div>
                        <div class="menu-icon menu_bar align-items-center">
                            <span class="ti-menu"></span>
                        </div>
                    </div>
				</div>
			</div>
		</div> 
	</div>
    <?php
    if ($show_settings_6) {
        if(!is_user_logged_in()){
            Arangi_Templates::account_popup();
        }
    }
    ?>
    <?php Arangi_Templates::mobile_menu(); ?>
</header> <!-- End masthead -->