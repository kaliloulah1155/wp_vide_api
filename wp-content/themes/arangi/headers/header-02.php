<?php 
	$logo_header = Arangi::setting( 'logo_header' );
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
    $show_contact_2 = Arangi::setting( 'show_contact_2' );
    $show_lang_2 = Arangi::setting( 'show_lang_2' );
?>
<?php Arangi_Templates::get_search_box();?>
<header id="masthead" <?php Arangi::header_class(); ?>>
	<div class="header-middle">
		<div class="<?php echo esc_attr($container);?>">
			<div class="row">
				<div class="col-lg-2 col-xl-2 d-flex align-items-center menu-col-left">
                    <?php Arangi_Templates::get_logo(); ?>
				</div>
				<div class="col-lg-7 col-xl-7 align-items-center menu-content menu-col-center">
                    <div class="header-menu menu-desktop">
                        <nav id="site-navigation" class="main-navigation">
                            <?php Arangi::menu_primary(); ?>
                        </nav>
                    </div>
				</div>
				<div class="col-lg-3 col-xl-3 align-items-center menu-col-right">
					<div class="header-right d-flex align-items-center justify-content-end">
						<div class="header-icon">
							<?php 
							$show_search_2 = Arangi::setting('show_search_2');
							$icon_search_2 = Arangi::setting('icon_search_2');
							$show_settings_2 = Arangi::setting('show_settings_2');
                            $phone_contact = Arangi::setting('phone_contact');
							if ($show_settings_2) {
								Arangi_Templates::get_setting_template();
							}
                            if ($show_search_2 && $icon_search_2) {
                                ?>
                                <div class ="search-header">
                                    <div class="icon-header btn-search">
                                        <i class="<?php echo esc_attr($icon_search_2); ?>"></i>
                                    </div>
                                </div>
                                <?php
                            }
							$show_mini_cart_2 = Arangi::setting('show_mini_cart_2');
							if ($show_mini_cart_2) {
								Arangi_Templates::get_minicart_template(); 
							}
							?>
                            <?php if ($show_contact_2 == 'show'){?>
                            <div class="header-contact">
                                <a href="tel:<?php echo esc_attr($phone_contact)?>"><i class="fa fa-phone"></i></a>
                            </div>
                            <?php }?>
                            <?php if ($show_lang_2 == 'show'){?>
                                <?php  Arangi_WPML::show_language_dropdown();?>
                            <?php }?>
						</div>
                        <div class="menu-icon d-flex align-items-center btn-menu">
                            <?php Arangi_Templates::get_menu_icon();?>
                        </div>
                        <div class="btn-humburger btn-menu">
                            <?php Arangi_Templates::get_menu_icon();?>
                        </div>
					</div> 
				</div>
			</div>
		</div> 
	</div>
    <?php

    if ($show_settings_2) {
        if(!is_user_logged_in()){
            Arangi_Templates::account_popup();
        }
    }
    Arangi_Templates::mobile_menu(); ?>
</header> <!-- End masthead -->
<div class="humburger-menu">
    <div class="close-humburger-menu ti-close"></div>
    <div class="scroll-humubur">
        <div class="humburger-content">
            <?php dynamic_sidebar('humburger_menu_sidebar')?>
        </div>
    </div>
</div>
