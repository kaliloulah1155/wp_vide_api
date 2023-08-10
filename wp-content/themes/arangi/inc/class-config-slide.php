<?php
// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}
if (!class_exists('Arangi_Config_Slide')){
    Class Arangi_Config_Slide{
        public function __construct(){
            add_action( 'wp_enqueue_scripts', array( $this, 'style_css' ) );
        }
        public function style_css(){
            wp_register_style( 'slide-style', false );
            wp_enqueue_style( 'slide-style' );
            $style_css = "";
            $style_css .= $this->slide_color();
			$style_css = Arangi_Minify::css( $style_css );
            wp_add_inline_style( 'slide-style',html_entity_decode($style_css, ENT_QUOTES));
        }
        function slide_color(){
            $slide_color = Arangi::setting( 'slide_background_gradient' );
            $secondary_color = Arangi::setting( 'secondary_color' );
            $page_secondary_color = arangi_get_meta_value('page_secondary_color');
             if ($page_secondary_color !== ''){
                 $secondary_color = $page_secondary_color;
            }else{
                 $secondary_color = $secondary_color;
            }
            $css = '';
            if( isset($slide_color) && $slide_color !=='' ){
                if($slide_color['color1'] !==''){
                    $css .= "
                        .color-1 .apr-product.product-list.list-1 .product-title .product-name:hover,
                        .color-1 .product-action .compare-product a.added:before,
                        .color-1 .woocommerce div.entry-summary .price .amount, 
                        .color-1 .woocommerce div.entry-summary .price ins,
                        .color-1 #yith-quick-view-close:hover,
                        .color-1 .product-grid.grid-2 .woocommerce ul.products .product-title .product-name:hover,
                        .color-1 .blog_info .info a,
                        .color-1 .blog-grid.grid-style2 .read-more a,
                        .color-1 .site-header .mega-menu>li:hover,
                        .color-1 .header-02 .cart-header:hover, 
                        .color-1 .header-02 .account-header a:hover, 
                        .color-1 .header-02 .header-contact i:hover, 
                        .color-1 .header-02 .search-header:hover,
                        .color-1 .humburger-content ul.product_list_widget li .product-content .product-desc .product-title a:hover,
                        .color-1 .humburger-content ul.product_list_widget li .product-content .product-desc .product-price .price ins, 
                        .color-1 .humburger-content ul.product_list_widget li .product-content .product-desc .product-price .price>span,
                        .color-1 .site-header .icon-list .path1:before,
                        body.color-1 a:hover, 
                        body.color-1  a:focus, 
                        body.color-1 .woocommerce-MyAccount-navigation .is-active a,
                        .color-1 .header-02 .header-menu .mega-menu > li > a:focus, 
                        .color-1 .header-02 .header-menu .mega-menu > li > a:hover,
                        .color-1 .header-menu .mega-menu > li .sub-menu > li:hover > a,
                        .color-1 .header-03 .header-icon .account-header>a, 
                        .color-1 .header-03 .header-icon .cart_label .text-header, 
                        .color-1 .header-03 .header-icon .btn-search, 
                        .color-1 .header-03 .header-icon .header-contact a,
                        .color-1 .social-footer-style1 .list-social li a:hover,
                        .color-1 .footer-02 .list-info-contact li i,
                        .color-1 .footer-02 .widget_nav_menu li a:hover, 
                        .color-1 .footer-02 .list-info-contact li a:hover, 
                        .color-1 .footer-02 .payment ul li a:hover,
                        .color-1 .footer-01 .list-info-contact .info-phone a:hover,
                        .color-1 .footer-01 .widget_nav_menu li a:hover, 
                        .color-1 .footer-01 .copyright-content p a:hover, 
                        .color-1 .footer-01 .payment ul li a:hover,
                        .color-1 .date_from_to span,
                        .color-1 .woocommerce ul.products li.type-product .price,
                        .color-1 .cart-header .widget_shopping_cart_content ul li a:hover,
                        .color-1 .cart-header .widget_shopping_cart_content ul li .quantity,
                        .color-1 .cart-header .widget_shopping_cart_content ul li a.remove:hover:after,
                        .color-1 .product-action .yith-wcwl-wishlistaddedbrowse a:before, 
                        .color-1 .product-action .yith-wcwl-wishlistexistsbrowse a:before,
                        .color-1 p.woocommerce-mini-cart__total.total .woocommerce-Price-amount,
                        .color-1 .mobile-tool .icon-header span, .color-1 .mobile-tool .account-header > a, 
                        .color-1 .mobile-tool .phone-mobile a{
                            color: {$slide_color['color1']};
							transition: all 0.7s ease;
                        }
                        .color-1 .apr-banner .btn-bn:hover,
                        .color-1 .apr-banner .bn-desc,
                        .color-1 .custom-date a:hover,
                        .color-1 .product-action .action-item.quick-view a.button:hover,
                        .color-1 .product-action .action-item.compare-product a.button:hover,
                        .color-1 .product-action .action-item.wishlist-btn a.button:hover,
                        .color-1 .scroll-to-top:hover span,
                        .color-1 .scroll-to-top:hover,
                        .color-1 .popup-sale-off .after-title{
                           color: {$slide_color['color1']} !important;
						   transition: all 0.7s ease;
                        }
                        .color-1 table.compare-list .add-to-cart td a,
                        .color-1 #yith-quick-view-content div.entry-summary .summary-content .single_add_to_cart_button,
                        .color-1 #cart_added_msg_popup, 
                        .color-1 #compare_added_msg_popup, 
                        .color-1 #yith-wcwl-message,
                        .color-1 .label-product .percentage,
                        .color-1 .header-03 .header-icon .text-items,
                        .color-1 .cart-header a.button:nth-child(2):hover,
                        .color-1 .mega-menu .tip,
                        .color-1 #btn-show-social:hover,
                        .color-1 .footer-02 .footer-newsletter.newsletter-style1 .mc4wp-form-fields input[type=submit],
                        .color-1 .footer-02 .footer-newsletter:after,
                        .color-1 .footer-02 .widget_nav_menu li a:hover:before,
                        .color-1 .heading-modern.heading-1 .heading-title:before,
                        .color-1 .bg-primary-op .product-image:after,
                        .color-1 .apr-advance-tabs.apr-tabs-vertical .apr-tabs-nav > ul > li.active, 
                        .color-1 .apr-advance-tabs.apr-tabs-vertical .apr-tabs-nav > ul > li:hover,
                        .color-1 .bg-primary-op:after,
                        .color-1 .instagram_title:before, 
                        .color-1 .btn.btn-primary, 
                        .color-1 button.btn-primary, 
                        .color-1 input[type=button].btn-primary, 
                        .color-1 input[type=reset].btn-primary, 
                        .color-1 input[type=submit].btn-primary, .color-1 button, 
                        .color-1 button.btn.btn-primary, 
                        .color-1 .btn.btn-border, 
                        .color-1 .label-product.percentage, 
                        .color-1 .product-action .action-item .add-cart-btn a,
                        .color-1 .box-deal-bg:before,
                        .color-1 .custom.tp-bullets .tp-bullet.selected::before, 
                        .color-1 .custom.tp-bullets .tp-bullet:hover::before,
                        .color-1 .text-items,
                        .color-1 button.btn.btn-primary, 
                        .color-1 button, 
                        .color-1 .tooltip-inner,
                        .color-1 .btn.btn-border,
                        .color-1 .instagram_title::before,
                        .color-1 .footer-01 .widget_nav_menu li a:hover::before,
                        .color-1 .widget_categories li a::before, 
                        .color-1 .widget_nav_menu li a::before, 
                        .color-1 .widget_pages li a::before,
                        .color-1 .box-deal figcaption.widget-image-caption .box-dl,
                        .color-1 .woocommerce-mini-cart__buttons.buttons a:first-child,
                        .color-1 .instagram_title:before,
                        .color-1 .popup-sale-off .mc4wp-form-fields input[type='submit']{
                            background-color: {$slide_color['color1']};
							transition: all 0.7s ease;
                        }
                        .color-1 .scroll-to-top:hover:after{
                            background-color: {$slide_color['color1']} !important;
                            transition: all 0.7s ease;
                        }
                        .color .languges-flags .lang-1,
                        .color-1 .header-03 .header-icon .languges-flags .lang-1,
                        .color-1 .bn-border-gradient .apr-banner:before,
                        .color-1 .header-03 .header-icon .account-header>a, 
                        .color-1 .header-03 .header-icon .cart_label .text-header, 
                        .color-1 .header-03 .header-icon .header-contact a,
                        .color-1 .header-03 .header-icon .btn-search,
                        .color-1 .cart-header a.button:nth-child(2):hover,
                        .color-1 .custom.tp-bullets .tp-bullet,
                        .color-1 .mobile-tool .icon-header span, .color-1 .mobile-tool .account-header > a, 
                        .color-1 .mobile-tool .phone-mobile a,
                        .color-1 .languges-flags .lang-1{
                            border-color: {$slide_color['color1']};
							transition: all 0.7s ease;
                        }
                        .color-1 .tooltip .arrow:before {
                            border-bottom-color:{$slide_color['color1']} !important;
                            border-top-color:{$slide_color['color1']} !important;
							transition: all 0.7s ease;
                        }
                        .color-1 .apr-advance-tabs.apr-tabs-vertical .apr-tabs-nav > ul li::after{
                            border-left-color: {$slide_color['color1']};
							transition: all 0.7s ease;
                        }
                        .rtl.color-1 .apr-advance-tabs.apr-tabs-vertical .apr-tabs-nav > ul li::after{
                            border-right-color: {$slide_color['color1']};
                        }
                        .color-1 .box-deal-bg:after{
                            background: -webkit-gradient(linear, center top, center bottom, from(#ffffff 30%), to{$slide_color['color1']});
                            background: -webkit-linear-gradient(#ffffff 30%, {$slide_color['color1']});
                            background: -moz-linear-gradient(#ffffff 30%, {$slide_color['color1']});
                            background: -o-linear-gradient(#ffffff 30%, {$slide_color['color1']});
                            background: -ms-linear-gradient(#ffffff 30%, {$slide_color['color1']});
                            background: linear-gradient(#ffffff 30%, {$slide_color['color1']});
							transition: all 0.7s ease;
                        }
                        .color-1 .box-deal figcaption.widget-image-caption .box-dl:before{
                            box-shadow: 17px 8px 0 0 {$slide_color['color1']};
                            -webkit-box-shadow: 17px 8px 0 0 {$slide_color['color1']};
                            -moz-box-shadow: 17px 8px 0 0 {$slide_color['color1']};
                            -ms-box-shadow: 17px 8px 0 0 {$slide_color['color1']};
							transition: all 0.7s ease;
                        }
                        .color-1 .bn-border-gradient .apr-banner:before{
                            border-image-source:linear-gradient({$slide_color['color1']},#f4ae7b);
							transition: all 0.7s ease;
                        }
                        .color-1 .apr-banner .bn-before {
                            background: -webkit-gradient(linear, left top, right top, from({$slide_color['color1']}), to(#f4ae7b));
                            background: linear-gradient(to right, {$slide_color['color1']} 0%, #f4ae7b 100%);
                            -webkit-background-clip: text;
                            -webkit-text-fill-color: transparent;
							transition: all 0.7s ease;
                        }
                        .color-1 .widget.instagram .instagram-gallery .instagram-img a:before{
                            background: #f4ae7b;
                            background: -webkit-gradient(linear,left top,left bottom,from({$slide_color['color1']}),to(#f4ae7b));
                            background: -webkit-linear-gradient(top,{$slide_color['color1']},#f4ae7b);
							transition: all 0.7s ease;
                        }
                        @media (min-width: 992px){
                            .color-1 .header-03 .mega-menu>li>a:before {  
                                background-color: {$slide_color['color1']}; 
								transition: all 0.7s ease;
                            }
                        }
                        @media (max-width: 1024px) {
                            .color-1 .bg-tab1:before{
                                background: -webkit-gradient(linear, center top, center bottom, from(#ffffff 30%), to{$slide_color['color1']});
                                background: -webkit-linear-gradient(#ffffff 30%, {$slide_color['color1']});
                                background: -moz-linear-gradient(#ffffff 30%, {$slide_color['color1']});
                                background: -o-linear-gradient(#ffffff 30%, {$slide_color['color1']});
                                background: -ms-linear-gradient(#ffffff 30%, {$slide_color['color1']});
                                background: linear-gradient(#ffffff 30%, {$slide_color['color1']});
								transition: all 0.7s ease;
                            }
                            .color-1 .bg-tab2:before{
                                background-color:{$slide_color['color1']};
								transition: all 0.7s ease;
                            }
                        }
                    ";
                    if($secondary_color !==''){
                     $css .= "
                        .color-1 .apr-advance-tabs.apr-tabs-vertical .apr-tabs-nav > ul > li.active,
                        .color-1 .apr-advance-tabs.apr-tabs-vertical .apr-tabs-nav > ul > li:hover,
                        .color-1 .product-action .action-item .add-cart-btn a,
                        .color-1 .label-product.percentage,
                        .color-1 .footer-02 .footer-newsletter.newsletter-style1 .mc4wp-form-fields input[type=submit],
                        .color-1 button,
                        .color-1 .mega-menu .tip,
                        .color-1 .header-03 .header-icon .text-items,
                        .color-1 .woocommerce-mini-cart__buttons.buttons a:first-child,
                        .color-1 .popup-sale-off .mc4wp-form-fields input[type='submit']
                        {
                            background: -moz-linear-gradient(to bottom, {$slide_color['color1']}, $secondary_color);
                            background: -ms-linear-gradient(to bottom, {$slide_color['color1']}, $secondary_color);
                            background: -o-linear-gradient( to bottom, {$slide_color['color1']}, $secondary_color);
                            background: -webkit-gradient(linear,left top,left bottom,from({$slide_color['color1']}),to($secondary_color));
                            background: linear-gradient(to bottom,{$slide_color['color1']},$secondary_color);
                        }
                        .color-1 .apr-banner .bn-before {
                            background: -webkit-gradient(linear, left top, right top, from({$slide_color['color1']}), to($secondary_color));
                            background: linear-gradient(to right, {$slide_color['color1']} 0%, $secondary_color 100%);
                            -webkit-background-clip: text;
                            -webkit-text-fill-color: transparent;
                            transition: all 0.7s ease;
                        }
                        .color-1 .btn.btn-border.btn-gradient{
                            background: -webkit-gradient(linear,left top,left bottom,from({$slide_color['color1']}),to($secondary_color));
                            background: linear-gradient(top,{$slide_color['color1']},$secondary_color);
                            transition: all 0.7s ease;
                        }
                        .color-1 .tooltip-inner,
                        .color-1 .btn.btn-border.btn-gradient{
                            background: -moz-linear-gradient(to bottom, $secondary_color, {$slide_color['color1']});
                                background: -ms-linear-gradient(to bottom, $secondary_color, {$slide_color['color1']});
                                background: -o-linear-gradient( to bottom, $secondary_color, {$slide_color['color1']});
                                background: -webkit-gradient(linear,left top,left bottom,from($secondary_color),to({$slide_color['color1']}));
                                background: linear-gradient(to bottom,$secondary_color,{$slide_color['color1']});
                        }                     
                        ";
                     }
                } if($slide_color['color2'] !==''){
                    $css .= "
                        .color-2 .apr-product.product-list.list-1 .product-title .product-name:hover,
                        .color-2 .product-action .compare-product a.added:before,
                        .color-2 .woocommerce div.entry-summary .price .amount, 
                        .color-2 .woocommerce div.entry-summary .price ins,
                        .color-2 #yith-quick-view-close:hover,
                        .color-2 .product-grid.grid-2 .woocommerce ul.products .product-title .product-name:hover,
                        .color-2 .blog_info .info a,
                        .color-2 .blog-grid.grid-style2 .read-more a,
                        .color-2 .site-header .mega-menu>li:hover,
                        .color-2 .header-02 .cart-header:hover, 
                        .color-2 .header-02 .account-header a:hover, 
                        .color-2 .header-02 .header-contact i:hover, 
                        .color-2 .header-02 .search-header:hover,
                        .color-2 .humburger-content ul.product_list_widget li .product-content .product-desc .product-title a:hover,
                        .color-2 .humburger-content ul.product_list_widget li .product-content .product-desc .product-price .price ins, 
                        .color-2 .humburger-content ul.product_list_widget li .product-content .product-desc .product-price .price>span,
                        .color-2 .site-header .icon-list .path1:before,
                        body.color-2 a:hover, 
                        body.color-2  a:focus, 
                        body.color-2 .woocommerce-MyAccount-navigation .is-active a,
                        .color-2 .header-02 .header-menu .mega-menu > li > a:focus, 
                        .color-2 .header-02 .header-menu .mega-menu > li > a:hover,
                        .color-2 .header-menu .mega-menu > li .sub-menu > li:hover > a,
                        .color-2 .header-03 .header-icon .account-header>a, 
                        .color-2 .header-03 .header-icon .cart_label .text-header, 
                        .color-2 .header-03 .header-icon .btn-search, 
                        .color-2 .header-03 .header-icon .header-contact a,
                        .color-2 .social-footer-style1 .list-social li a:hover,
                        .color-2 .footer-02 .list-info-contact li i,
                        .color-2 .footer-02 .widget_nav_menu li a:hover, 
                        .color-2 .footer-02 .list-info-contact li a:hover, 
                        .color-2 .footer-02 .payment ul li a:hover,
                        .color-2 .footer-01 .list-info-contact .info-phone a:hover,
                        .color-2 .footer-01 .widget_nav_menu li a:hover, 
                        .color-2 .footer-01 .copyright-content p a:hover, 
                        .color-2 .footer-01 .payment ul li a:hover,
                        .color-2 .date_from_to span,
                        .color-2 .woocommerce ul.products li.type-product .price,
                        .color-2 .cart-header .widget_shopping_cart_content ul li a:hover,
                        .color-2 .cart-header .widget_shopping_cart_content ul li .quantity,
                        .color-2 .cart-header .widget_shopping_cart_content ul li a.remove:hover:after,
                        .color-2 .product-action .yith-wcwl-wishlistaddedbrowse a:before, 
                        .color-2 .product-action .yith-wcwl-wishlistexistsbrowse a:before,
                        .color-2 p.woocommerce-mini-cart__total.total .woocommerce-Price-amount,
                        .color-2 .mobile-tool .icon-header span, .color-2 .mobile-tool .account-header > a, 
                        .color-2 .mobile-tool .phone-mobile a{
                            color: {$slide_color['color2']};
							transition: all 0.7s ease;
                        }
                        .color-2 .apr-banner .btn-bn:hover,
                        .color-2 .apr-banner .bn-desc,
                        .color-2 .custom-date a:hover,
                        .color-2 .product-action .action-item.quick-view a.button:hover,
                        .color-2 .product-action .action-item.compare-product a.button:hover,
                        .color-2 .scroll-to-top:hover span,
                        .color-2 .scroll-to-top:hover,
                        .color-2 .product-action .action-item.wishlist-btn a.button:hover,
                        .color-2 .popup-sale-off .after-title{
                           color: {$slide_color['color2']} !important;
						   transition: all 0.7s ease;
                        }
                        .color-2 .scroll-to-top:hover:after{
                            background-color: {$slide_color['color2']} !important;
                            transition: all 0.7s ease;
                        }
                        .color-2 table.compare-list .add-to-cart td a,
                        .color-2 #yith-quick-view-content div.entry-summary .summary-content .single_add_to_cart_button,
                        .color-2 #cart_added_msg_popup, 
                        .color-2 #compare_added_msg_popup, 
                        .color-2 #yith-wcwl-message,
                        .color-2 .label-product .percentage,
                        .color-2 .header-03 .header-icon .text-items,
                        .color-2 .cart-header a.button:nth-child(2):hover,
                        .color-2 .mega-menu .tip,
                        .color-2 #btn-show-social:hover,
                        .color-2 .footer-02 .footer-newsletter.newsletter-style1 .mc4wp-form-fields input[type=submit],
                        .color-2 .footer-02 .footer-newsletter:after,
                        .color-2 .footer-02 .widget_nav_menu li a:hover:before,
                        .color-2 .heading-modern.heading-1 .heading-title:before,
                        .color-2 .bg-primary-op .product-image:after,
                        .color-2 .apr-advance-tabs.apr-tabs-vertical .apr-tabs-nav > ul > li.active, 
                        .color-2 .apr-advance-tabs.apr-tabs-vertical .apr-tabs-nav > ul > li:hover,
                        .color-2 .bg-primary-op:after,
                        .color-2 .instagram_title:before,
                        .color-2 .btn.btn-primary, 
                        .color-2 button.btn-primary, 
                        .color-2 input[type=button].btn-primary, 
                        .color-2 input[type=reset].btn-primary, 
                        .color-2 input[type=submit].btn-primary,.color-2  button, 
                        .color-2 button.btn.btn-primary, 
                        .color-2 .btn.btn-border, 
                        .color-2 .label-product.percentage, 
                        .color-2 .product-action .action-item .add-cart-btn a,
                        .color-2 .box-deal-bg:before,
                        .color-2 .custom.tp-bullets .tp-bullet.selected::before, 
                        .color-2 .custom.tp-bullets .tp-bullet:hover::before,
                        .color-2 .text-items,
                        .color-2 button.btn.btn-primary, 
                        .color-2 button, 
                        .color-2 .tooltip-inner,
                        .color-2 .btn.btn-border,
                        .color-2 .instagram_title::before,
                        .color-2 .footer-01 .widget_nav_menu li a:hover::before,
                        .color-2 .widget_categories li a::before, 
                        .color-2 .widget_nav_menu li a::before, 
                        .color-2 .widget_pages li a::before,
                        .color-2 .box-deal figcaption.widget-image-caption .box-dl,
                        .color-2 .woocommerce-mini-cart__buttons.buttons a:first-child,
                        .color-2 .instagram_title:before,
                        .color-2 .popup-sale-off .mc4wp-form-fields input[type='submit']{
                            background-color: {$slide_color['color2']};
							transition: all 0.7s ease;
                        }
                        .color .languges-flags .lang-1,
                        .color-2 .header-03 .header-icon .languges-flags .lang-1,
                        .color-2 .bn-border-gradient .apr-banner:before,
                        .color-2 .header-03 .header-icon .account-header>a, 
                        .color-2 .header-03 .header-icon .cart_label .text-header, 
                        .color-2 .header-03 .header-icon .header-contact a,
                        .color-2 .header-03 .header-icon .btn-search,
                        .color-2 .cart-header a.button:nth-child(2):hover,
                        .color-2 .custom.tp-bullets .tp-bullet,
                        .color-2 .mobile-tool .icon-header span, .color-2 .mobile-tool .account-header > a, 
                        .color-2 .mobile-tool .phone-mobile a,
                        .color-2 .languges-flags .lang-1{
                            border-color: {$slide_color['color2']};
							transition: all 0.7s ease;
                        }
                        .color-2 .tooltip .arrow:before {
                            border-bottom-color:{$slide_color['color2']} !important;
                            border-top-color:{$slide_color['color2']} !important;
							transition: all 0.7s ease;
                        }
                        .color-2 .apr-advance-tabs.apr-tabs-vertical .apr-tabs-nav > ul li::after{
                            border-left-color: {$slide_color['color2']};
							transition: all 0.7s ease;
                        }
                        .rtl.color-2 .apr-advance-tabs.apr-tabs-vertical .apr-tabs-nav > ul li::after{
                            border-right-color: {$slide_color['color2']};
                        }
                        .color-2 .box-deal-bg:after{
                            background: -webkit-gradient(linear, center top, center bottom, from(#ffffff 30%), to{$slide_color['color2']});
                            background: -webkit-linear-gradient(#ffffff 30%, {$slide_color['color2']});
                            background: -moz-linear-gradient(#ffffff 30%, {$slide_color['color2']});
                            background: -o-linear-gradient(#ffffff 30%, {$slide_color['color2']});
                            background: -ms-linear-gradient(#ffffff 30%, {$slide_color['color2']});
                            background: linear-gradient(#ffffff 30%, {$slide_color['color2']});
							transition: all 0.7s ease;
                        }
                        .color-2 .box-deal figcaption.widget-image-caption .box-dl:before{
                            box-shadow: 17px 8px 0 0 {$slide_color['color2']};
                            -webkit-box-shadow: 17px 8px 0 0 {$slide_color['color2']};
                            -moz-box-shadow: 17px 8px 0 0 {$slide_color['color2']};
                            -ms-box-shadow: 17px 8px 0 0 {$slide_color['color2']};
							transition: all 0.7s ease;
                        }
                        .color-2 .bn-border-gradient .apr-banner:before{
                            border-image-source:linear-gradient({$slide_color['color2']},#f4ae7b);
							transition: all 0.7s ease;
                        }
                        .color-2 .apr-banner .bn-before {
                            background: -webkit-gradient(linear, left top, right top, from({$slide_color['color2']}), to(#f4ae7b));
                            background: linear-gradient(to right, {$slide_color['color2']} 0%, #f4ae7b 100%);
                            -webkit-background-clip: text;
                            -webkit-text-fill-color: transparent;
							transition: all 0.7s ease;
                        }
                        .color-2 .widget.instagram .instagram-gallery .instagram-img a:before{
                            background: #f4ae7b;
                            background: -webkit-gradient(linear,left top,left bottom,from({$slide_color['color2']}),to(#f4ae7b));
                            background: -webkit-linear-gradient(top,{$slide_color['color2']},#f4ae7b);
							transition: all 0.7s ease;
                        }
                        @media (min-width: 992px){
                            .color-2 .header-03 .mega-menu>li>a:before {  
                                background-color: {$slide_color['color2']};
								transition: all 0.7s ease;
                            }
                        }
                        @media (max-width: 1024px) {
                            .color-2 .bg-tab1:before{
                                background: -webkit-gradient(linear, center top, center bottom, from(#ffffff 30%), to{$slide_color['color2']});
                                background: -webkit-linear-gradient(#ffffff 30%, {$slide_color['color2']});
                                background: -moz-linear-gradient(#ffffff 30%, {$slide_color['color2']});
                                background: -o-linear-gradient(#ffffff 30%, {$slide_color['color2']});
                                background: -ms-linear-gradient(#ffffff 30%, {$slide_color['color2']});
                                background: linear-gradient(#ffffff 30%, {$slide_color['color2']}); 
								transition: all 0.7s ease;
                            }
                            .color-2 .bg-tab2:before{
                                background-color:{$slide_color['color2']};    
								transition: all 0.7s ease;
                            }
                        }
                       
                    ";
                    if($secondary_color !==''){
                     $css .= "
                        .color-2 .apr-advance-tabs.apr-tabs-vertical .apr-tabs-nav > ul > li.active,
                        .color-2 .apr-advance-tabs.apr-tabs-vertical .apr-tabs-nav > ul > li:hover,
                        .color-2 .product-action .action-item .add-cart-btn a,
                        .color-2 .label-product.percentage,
                        .color-2 .footer-02 .footer-newsletter.newsletter-style1 .mc4wp-form-fields input[type=submit],
                        .color-2 button,
                        .color-2 .mega-menu .tip,
                        .color-2 .header-03 .header-icon .text-items,
                        .color-2 .woocommerce-mini-cart__buttons.buttons a:first-child,
                        .color-2 .popup-sale-off .mc4wp-form-fields input[type='submit']{
                            background: -moz-linear-gradient(to bottom, {$slide_color['color2']}, $secondary_color);
                            background: -ms-linear-gradient(to bottom, {$slide_color['color2']}, $secondary_color);
                            background: -o-linear-gradient( to bottom, {$slide_color['color2']}, $secondary_color);
                            background: -webkit-gradient(linear,left top,left bottom,from({$slide_color['color2']}),to($secondary_color));
                            background: linear-gradient(to bottom,{$slide_color['color2']},$secondary_color);
                        }
                        .color-2 .apr-banner .bn-before {
                            background: -webkit-gradient(linear, left top, right top, from({$slide_color['color2']}), to($secondary_color));
                            background: linear-gradient(to right, {$slide_color['color2']} 0%, $secondary_color 100%);
                            -webkit-background-clip: text;
                            -webkit-text-fill-color: transparent;
                            transition: all 0.7s ease;
                        }
                        .color-2 .btn.btn-border.btn-gradient{
                            background: -webkit-gradient(linear,left top,left bottom,from({$slide_color['color1']}),to($secondary_color));
                            background: linear-gradient(top,{$slide_color['color1']},$secondary_color);
                            transition: all 0.7s ease;
                        }
                        .color-2 .tooltip-inner,
                        .color-2 .btn.btn-border.btn-gradient{
                            background: -moz-linear-gradient(to bottom, $secondary_color, {$slide_color['color2']});
                                background: -ms-linear-gradient(to bottom, $secondary_color, {$slide_color['color2']});
                                background: -o-linear-gradient( to bottom, $secondary_color, {$slide_color['color2']});
                                background: -webkit-gradient(linear,left top,left bottom,from($secondary_color),to({$slide_color['color2']}));
                                background: linear-gradient(to bottom,$secondary_color,{$slide_color['color2']});
                        }     
                     ";
                     }
                } if($slide_color['color3'] !==''){
                    $css .= "
                        .color-3 .apr-product.product-list.list-1 .product-title .product-name:hover,
                        .color-3 .product-action .compare-product a.added:before,
                        .color-3 .woocommerce div.entry-summary .price .amount, 
                        .color-3 .woocommerce div.entry-summary .price ins,
                        .color-3 #yith-quick-view-close:hover,
                        .color-3 .product-grid.grid-2 .woocommerce ul.products .product-title .product-name:hover,
                        .color-3 .blog_info .info a,
                        .color-3 .blog-grid.grid-style2 .read-more a,
                        .color-3 .site-header .mega-menu>li:hover,
                        .color-3 .header-02 .cart-header:hover, 
                        .color-3 .header-02 .account-header a:hover, 
                        .color-3 .header-02 .header-contact i:hover, 
                        .color-3 .header-02 .search-header:hover,
                        .color-3 .humburger-content ul.product_list_widget li .product-content .product-desc .product-title a:hover,
                        .color-3 .humburger-content ul.product_list_widget li .product-content .product-desc .product-price .price ins, 
                        .color-3 .humburger-content ul.product_list_widget li .product-content .product-desc .product-price .price>span,
                        .color-3 .site-header .icon-list .path1:before,
                        body.color-3 a:hover, 
                        body.color-3  a:focus, 
                        body.color-3 .woocommerce-MyAccount-navigation .is-active a,
                        .color-3 .header-02 .header-menu .mega-menu > li > a:focus, 
                        .color-3 .header-02 .header-menu .mega-menu > li > a:hover,
                        .color-3 .header-menu .mega-menu > li .sub-menu > li:hover > a,
                        .color-3 .header-03 .header-icon .account-header>a, 
                        .color-3 .header-03 .header-icon .cart_label .text-header, 
                        .color-3 .header-03 .header-icon .btn-search, 
                        .color-3 .header-03 .header-icon .header-contact a,
                        .color-3 .social-footer-style1 .list-social li a:hover,
                        .color-3 .footer-02 .list-info-contact li i,
                        .color-3 .footer-02 .widget_nav_menu li a:hover, 
                        .color-3 .footer-02 .list-info-contact li a:hover, 
                        .color-3 .footer-02 .payment ul li a:hover,
                        .color-3 .footer-01 .list-info-contact .info-phone a:hover,
                        .color-3 .footer-01 .widget_nav_menu li a:hover, 
                        .color-3 .footer-01 .copyright-content p a:hover, 
                        .color-3 .footer-01 .payment ul li a:hover,
                        .color-3 .date_from_to span,
                        .color-3 .woocommerce ul.products li.type-product .price,
                        .color-3 .cart-header .widget_shopping_cart_content ul li a:hover,
                        .color-3 .cart-header .widget_shopping_cart_content ul li .quantity,
                        .color-3 .cart-header .widget_shopping_cart_content ul li a.remove:hover:after,
                        .color-3 .product-action .yith-wcwl-wishlistaddedbrowse a:before, 
                        .color-3 .product-action .yith-wcwl-wishlistexistsbrowse a:before,
                        .color-3 p.woocommerce-mini-cart__total.total .woocommerce-Price-amount,
                        .color-3 .mobile-tool .icon-header span, .color-3 .mobile-tool .account-header > a, 
                        .color-3 .mobile-tool .phone-mobile a{
                            color: {$slide_color['color3']};
							transition: all 0.7s ease;
                        }
                        .color-3 .apr-banner .btn-bn:hover,
                        .color-3 .apr-banner .bn-desc,
                        .color-3 .custom-date a:hover,
                        .color-3 .product-action .action-item.quick-view a.button:hover,
                        .color-3 .product-action .action-item.compare-product a.button:hover,
                        .color-3 .scroll-to-top:hover span,
                        .color-3 .scroll-to-top:hover,
                        .color-3 .product-action .action-item.wishlist-btn a.button:hover,
                        .color-3 .popup-sale-off .after-title{
                           color: {$slide_color['color3']} !important;
						   transition: all 0.7s ease;
                        }
                        .color-3 .scroll-to-top:hover:after{
                            background-color: {$slide_color['color3']} !important;
                            transition: all 0.7s ease;
                        }
                        .color-3 table.compare-list .add-to-cart td a,
                        .color-3 #yith-quick-view-content div.entry-summary .summary-content .single_add_to_cart_button,
                        .color-3 #cart_added_msg_popup, 
                        .color-3 #compare_added_msg_popup, 
                        .color-3 #yith-wcwl-message,
                        .color-3 .label-product .percentage,
                        .color-3 .header-03 .header-icon .text-items,
                        .color-3 .cart-header a.button:nth-child(2):hover,
                        .color-3 .mega-menu .tip,
                        .color-3 #btn-show-social:hover,
                        .color-3 .footer-02 .footer-newsletter.newsletter-style1 .mc4wp-form-fields input[type=submit],
                        .color-3 .footer-02 .footer-newsletter:after,
                        .color-3 .footer-02 .widget_nav_menu li a:hover:before,
                        .color-3 .heading-modern.heading-1 .heading-title:before,
                        .color-3 .bg-primary-op .product-image:after,
                        .color-3 .apr-advance-tabs.apr-tabs-vertical .apr-tabs-nav > ul > li.active, 
                        .color-3 .apr-advance-tabs.apr-tabs-vertical .apr-tabs-nav > ul > li:hover,
                        .color-3 .bg-primary-op:after,
                        .color-3 .instagram_title:before,
                        .color-3  .btn.btn-primary, 
                        .color-3 button.btn-primary, 
                        .color-3 input[type=button].btn-primary, 
                        .color-3 input[type=reset].btn-primary, 
                        .color-3 input[type=submit].btn-primary, .color-3 button, 
                        .color-3 button.btn.btn-primary, 
                        .color-3 .btn.btn-border, 
                        .color-3 .label-product.percentage, 
                        .color-3 .product-action .action-item .add-cart-btn a,
                        .color-3 .box-deal-bg:before,
                        .color-3 .custom.tp-bullets .tp-bullet.selected::before, 
                        .color-3 .custom.tp-bullets .tp-bullet:hover::before,
                        .color-3 .text-items,
                        .color-3 button.btn.btn-primary, 
                        .color-3 button, 
                        .color-3 .tooltip-inner,
                        .color-3 .btn.btn-border,
                        .color-3 .instagram_title::before,
                        .color-3 .footer-01 .widget_nav_menu li a:hover::before,
                        .color-3 .widget_categories li a::before, 
                        .color-3 .widget_nav_menu li a::before, 
                        .color-3 .widget_pages li a::before,
                        .color-3 .box-deal figcaption.widget-image-caption .box-dl,
                        .color-3 .woocommerce-mini-cart__buttons.buttons a:first-child,
                        .color-3 .instagram_title:before,
                        .color-3 .popup-sale-off .mc4wp-form-fields input[type='submit']{
                            background-color: {$slide_color['color3']};
							transition: all 0.7s ease;
                        }
                        .color .languges-flags .lang-1,
                        .color-3 .header-03 .header-icon .languges-flags .lang-1,
                        .color-3 .bn-border-gradient .apr-banner:before,
                        .color-3 .header-03 .header-icon .account-header>a, 
                        .color-3 .header-03 .header-icon .cart_label .text-header, 
                        .color-3 .header-03 .header-icon .btn-search, 
                        .color-3 .header-03 .header-icon .header-contact a,
                        .color-3 .cart-header a.button:nth-child(2):hover,
                        .color-3 .custom.tp-bullets .tp-bullet,
                        .color-3 .mobile-tool .icon-header span, .color-3 .mobile-tool .account-header > a, 
                        .color-3 .mobile-tool .phone-mobile a,
                        .color-3 .languges-flags .lang-1{
                            border-color: {$slide_color['color3']};
							transition: all 0.7s ease;
                        }
                        .color-3 .tooltip .arrow:before {
                            border-bottom-color:{$slide_color['color3']} !important;
                            border-top-color:{$slide_color['color3']} !important;
							transition: all 0.7s ease;
                        }
                        .color-3 .apr-advance-tabs.apr-tabs-vertical .apr-tabs-nav > ul li::after{
                            border-left-color: {$slide_color['color3']};
							transition: all 0.7s ease;
                        }
                        .rtl.color-3 .apr-advance-tabs.apr-tabs-vertical .apr-tabs-nav > ul li::after{
                            border-right-color: {$slide_color['color3']};
                        }
                        .color-3 .box-deal-bg:after{
                            background: -webkit-gradient(linear, center top, center bottom, from(#ffffff 30%), to{$slide_color['color3']});
                            background: -webkit-linear-gradient(#ffffff 30%, {$slide_color['color3']});
                            background: -moz-linear-gradient(#ffffff 30%, {$slide_color['color3']});
                            background: -o-linear-gradient(#ffffff 30%, {$slide_color['color3']});
                            background: -ms-linear-gradient(#ffffff 30%, {$slide_color['color3']});
                            background: linear-gradient(#ffffff 30%, {$slide_color['color3']});
							transition: all 0.7s ease;
                        }
                        .color-3 .box-deal figcaption.widget-image-caption .box-dl:before{
                            box-shadow: 17px 8px 0 0 {$slide_color['color3']};
                            -webkit-box-shadow: 17px 8px 0 0 {$slide_color['color3']};
                            -moz-box-shadow: 17px 8px 0 0 {$slide_color['color3']};
                            -ms-box-shadow: 17px 8px 0 0 {$slide_color['color3']};
							transition: all 0.7s ease;
                        }
                        .color-3 .bn-border-gradient .apr-banner:before{
                            border-image-source:linear-gradient({$slide_color['color3']},#f4ae7b);
							transition: all 0.7s ease;
                        }
                        .color-3 .apr-banner .bn-before {
                            background: -webkit-gradient(linear, left top, right top, from({$slide_color['color3']}), to(#f4ae7b));
                            background: linear-gradient(to right, {$slide_color['color3']} 0%, #f4ae7b 100%);
                            -webkit-background-clip: text;
                            -webkit-text-fill-color: transparent;
							transition: all 0.7s ease;
                        }
                        .color-3 .widget.instagram .instagram-gallery .instagram-img a:before{
                            background: #f4ae7b;
							transition: all 0.7s ease;
                            background: -webkit-gradient(linear,left top,left bottom,from({$slide_color['color3']}),to(#f4ae7b));
                            background: -webkit-linear-gradient(top,{$slide_color['color3']},#f4ae7b);
                        }
                        @media (min-width: 992px){
                            .color-3 .header-03 .mega-menu>li>a:before {  
                                background-color: {$slide_color['color3']};                      
                            }
                        }
                        @media (max-width: 1024px) {
                            .color-3 .bg-tab1:before{
                                background: -webkit-gradient(linear, center top, center bottom, from(#ffffff 30%), to{$slide_color['color3']});
                                background: -webkit-linear-gradient(#ffffff 30%, {$slide_color['color3']});
                                background: -moz-linear-gradient(#ffffff 30%, {$slide_color['color3']});
                                background: -o-linear-gradient(#ffffff 30%, {$slide_color['color3']});
                                background: -ms-linear-gradient(#ffffff 30%, {$slide_color['color3']});
                                background: linear-gradient(#ffffff 30%, {$slide_color['color3']}); 
								transition: all 0.7s ease;
                            }
                            .color-3 .bg-tab2:before{
                                background-color:{$slide_color['color3']};  
								transition: all 0.7s ease;
                            }
                        }
                    ";
                    if($secondary_color !==''){
                     $css .= "
                        .color-3 .apr-advance-tabs.apr-tabs-vertical .apr-tabs-nav > ul > li.active,
                        .color-3 .apr-advance-tabs.apr-tabs-vertical .apr-tabs-nav > ul > li:hover,
                        .color-3 .product-action .action-item .add-cart-btn a,
                        .color-3 .label-product.percentage,
                        .color-3 .footer-02 .footer-newsletter.newsletter-style1 .mc4wp-form-fields input[type=submit],
                        .color-3 button,
                        .color-3 .mega-menu .tip,
                        .color-3 .header-03 .header-icon .text-items,
                        .color-3 .woocommerce-mini-cart__buttons.buttons a:first-child,
                        .color-3 .popup-sale-off .mc4wp-form-fields input[type='submit']{
                            background: -moz-linear-gradient(to bottom, {$slide_color['color3']}, $secondary_color);
                            background: -ms-linear-gradient(to bottom, {$slide_color['color3']}, $secondary_color);
                            background: -o-linear-gradient( to bottom, {$slide_color['color3']}, $secondary_color);
                            background: -webkit-gradient(linear,left top,left bottom,from({$slide_color['color3']}),to($secondary_color));
                            background: linear-gradient(to bottom,{$slide_color['color3']},$secondary_color);
                        }
                        .color-3 .apr-banner .bn-before {
                            background: -webkit-gradient(linear, left top, right top, from({$slide_color['color3']}), to($secondary_color));
                            background: linear-gradient(to right, {$slide_color['color3']} 0%, $secondary_color 100%);
                            -webkit-background-clip: text;
                            -webkit-text-fill-color: transparent;
                            transition: all 0.7s ease;
                        }
                        .color-3 .btn.btn-border.btn-gradient{
                            background: -webkit-gradient(linear,left top,left bottom,from({$slide_color['color1']}),to($secondary_color));
                            background: linear-gradient(top,{$slide_color['color1']},$secondary_color);
                            transition: all 0.7s ease;
                        }
                        .color-3 .tooltip-inner,
                        .color-3 .btn.btn-border.btn-gradient{
                            background: -moz-linear-gradient(to bottom, $secondary_color, {$slide_color['color3']});
                                background: -ms-linear-gradient(to bottom, $secondary_color, {$slide_color['color3']});
                                background: -o-linear-gradient( to bottom, $secondary_color, {$slide_color['color3']});
                                background: -webkit-gradient(linear,left top,left bottom,from($secondary_color),to({$slide_color['color3']}));
                                background: linear-gradient(to bottom,$secondary_color,{$slide_color['color3']});
                        }  
                     ";
                     }
                }
            }
            return $css;
        }
    }
    new Arangi_Config_Slide();
}