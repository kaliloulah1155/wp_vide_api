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
$phone_contact = Arangi::setting( 'phone_contact' );
$show_header_contact = Arangi::setting( 'show_contact_5' );
$show_header_social = Arangi::setting( 'show_social_5' );
$show_search = Arangi::setting( 'show_search_5' );
$show_settings = Arangi::setting('show_settings_5');
$show_mini_cart = Arangi::setting('show_mini_cart_5');
$show_menu = Arangi::setting('show_menu_5');
Arangi_Templates::get_search_box();
?>
<header id="masthead" <?php Arangi::header_class(); ?>>
    	<div class="header-top hidden-mobile">
	    	<div class="<?php echo esc_attr($container);?>">
	            <div class="row">
	                <div class="<?php if ($show_header_contact || $show_header_social) {echo 'col-sm-6 col-md-6 col-lg-6 col-xl-6';}else{echo 'col-xs-12 col-lg-12';}?>">
		            	<?php if ($show_menu == 'show'){?>
		                	<div class="header-menu d-flex align-items-center justify-content-sm-left">
		                        <nav id="site-navigation" class="main-navigation">
		                            <?php dynamic_sidebar('first-menu-header-5'); ?>
		                        </nav>
		                    </div>
		                <?php }?>
	                </div>
					<div class="<?php if ($show_menu) {echo 'col-sm-6 col-md-6 col-lg-6 col-xl-6 text-right';}else{echo 'col-xs-12 col-lg-12 text-right';}?>">
						<?php if ($show_header_contact == 'show'){?>
	                        <div class="d-inline-block">
	                            <div class="info-part d-flex">
	                                <div class="details align-self-center">
	                                    <div class="content-topbar">
	                                    	<span><?php echo esc_html__('T:' , 'arangi') ?></span>
	                                        <a href="tel:<?php echo esc_attr($phone_contact)?>"><?php echo esc_attr($phone_contact)?></a>
	                                    </div>
	                                </div>
	                            </div>
	                        </div>
						<?php }?>
						<?php if($show_header_social == 'show'){?>
		            		<div class="d-inline-block social-header">
								<?php Arangi_Templates::social_icons(); ?>
							</div>
		            	<?php }?>
	                </div>
	            </div>
	        </div>
        </div>
	    <div class="header-center">
	    	<div class="<?php echo esc_attr($container);?>">
			    <div class="row">
			    	<?php if ($show_search == 'show'): ?>
		                <div class="col-xl-4 col-lg-4 hidden-mobile">
		                    <div class="header-nav-inner d-flex align-items-center">
		                        <?php Arangi_Templates::get_search_header_4(); ?>
		                    </div>
		                </div>
		            <?php endif; ?>
		            <div class="<?php if ($show_search && ($show_mini_cart || $show_settings)) {echo 'col-sm-4 col-md-4 col-lg-4 col-xl-4 menu-col-left';}elseif(!$show_search  && ($show_mini_cart || $show_settings)){echo 'col-sm-6 col-md-6 col-lg-6 col-xl-6 menu-col-left';}else{echo 'col-xs-12 col-lg-12 text-right menu-col-left';}?>">
		                <?php Arangi_Templates::get_logo();?>
		            </div>
	                <div class="hidden-desktop col-md-6 col-sm-3 align-items-center menu-col-right">
	                    <div class="menu-icon align-items-center justify-content-end">
	                        <span class="ti-menu"></span>
	                    </div>
	                </div>
		            <?php if ($show_mini_cart == 'show' || $show_settings == 'show'): ?>
			            <div class="<?php if (!$show_search ){echo 'col-sm-6 col-md-6 col-lg-6 col-xl-6';}else{echo 'col-sm-4 col-md-4 col-lg-4 col-xl-4';}?>">
				            <?php if (class_exists( 'WooCommerce' )) {?>
								<div class="header-icon hidden-mobile">
				                    <?php
				                        if ($show_mini_cart) {
				                            Arangi_Templates::get_minicart_template();
				                        }
				                        if ($show_settings) {
				                            Arangi_Templates::get_setting_template();
				                        }
				                    ?>
								</div>
				            <?php } ?>
				        </div>
			        <?php endif; ?>
			    </div>
			</div>
	    </div>
	    <div class="header-bottom">
	    	<div class="<?php echo esc_attr($container);?>">
	            <div class="row">
	                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
	                	<div class="header-menu d-flex align-items-center justify-content-sm-center">
	                        <nav id="site-navigation" class="main-navigation">
	                            <?php Arangi::menu_primary(); ?>
	                        </nav>
	                    </div>
	                </div>
	            </div>
	        </div>
	    </div>
	<?php
    if ($show_settings) {
        if(!is_user_logged_in()){
            Arangi_Templates::account_popup();
        }
    }
    ?>
	<?php 
		Arangi_Templates::mobile_menu();
    ?>
</header>