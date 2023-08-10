<?php
// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}
if (!class_exists('Arangi_Custom_Style')){
    Class Arangi_Custom_Style{
        public function __construct(){
            add_action( 'wp_enqueue_scripts', array( $this, 'style_css' ) );
        }
        public function style_css(){
            wp_register_style( 'custom-style', false );
            wp_enqueue_style( 'custom-style' );
            $style_css = "";
            $style_css .= $this->bg_grandient_login();
            $style_css .= $this->primary_color_css();
            $style_css .= $this->hightlight_color_css();
            $style_css .= $this->bg_grandient_css();
            $style_css .= $this->breadcrumbs();
            $style_css .= $this->site_background();
            $style_css .= $this->page_highlight_color();
            $style_css .= $this->body_bg_image();
            $style_css .= $this->headers();
            $style_css .= $this->footer();
            $style_css .= $this->site_width();
            $style_css .= $this->remove_space_top();
            $style_css .= $this->remove_space_bottom();
            $style_css .= $this->coming_soon_css();
            $style_css .= $this->error_404_css();
			$style_css = Arangi_Minify::css( $style_css );
            wp_add_inline_style( 'custom-style',html_entity_decode($style_css, ENT_QUOTES));
        }
        function bg_grandient_login(){
            $bg_grandient = Arangi::setting( 'account_background_gradient' );
            $css = '';
            if($bg_grandient !==''){
                $css = "
                    .account-popup {
                        background: -moz-linear-gradient(90deg, {$bg_grandient['top']} 0%, {$bg_grandient['bottom']} 100%); /* ff3.6+ */
                        background: -webkit-gradient(linear, left top, left bottom, color-stop(0%, {$bg_grandient['bottom']}), color-stop(100%, {$bg_grandient['top']})); /* safari4+,chrome */
                        background: -webkit-linear-gradient(90deg, {$bg_grandient['top']} 0%, {$bg_grandient['bottom']} 100%); /* safari5.1+,chrome10+ */
                        background: -o-linear-gradient(90deg, {$bg_grandient['top']} 0%, {$bg_grandient['bottom']} 100%); /* opera 11.10+ */
                        background: -ms-linear-gradient(90deg, {$bg_grandient['top']} 0%, {$bg_grandient['bottom']} 100%); /* ie10+ */
                        background: linear-gradient(0deg, {$bg_grandient['top']} 0%, {$bg_grandient['bottom']} 100%); /* w3c */
                        filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='{$bg_grandient['bottom']}', endColorstr='{$bg_grandient['top']}',GradientType=0 ); /* ie6-9 */ 
                    }
                ";
            }
            return $css;
        }
        function bg_grandient_css(){
            $primary_color = Arangi::setting( 'primary_color' );
            $secondary_color = Arangi::setting( 'secondary_color' );
            $site_color = arangi_get_meta_value('site_color');
            $page_secondary_color = arangi_get_meta_value('page_secondary_color');
            if ($site_color !== ''){
                 $primary_color = $site_color;
            }else{
                 $primary_color = $primary_color;
            }
            if ($page_secondary_color !== ''){
                 $secondary_color = $page_secondary_color;
            }else{
                 $secondary_color = $secondary_color;
            }
            $css = '';
            if ((isset ($primary_color) && $primary_color !== ''  ) && (isset ($secondary_color) && $secondary_color !== ''  ))  {
                $css .= "
                    .lost_reset_password button.button,
                    .footer-04 .footer-newsletter.newsletter-style1 .mc4wp-form .mc4wp-form-fields p:last-child input,
                    .btn.btn-primary, button.btn-primary, input[type=button].btn-primary, input[type=reset].btn-primary, input[type=submit].btn-primary, button, button.btn.btn-primary, .btn.btn-border, .label-product.percentage, .product-action .action-item .add-cart-btn a, .blog-video i:hover,  #cart_added_msg_popup, #compare_added_msg_popup, #yith-wcwl-message, .footer-02 .footer-newsletter.newsletter-style1 .mc4wp-form-fields input[type=submit], .header-03 .header-icon .text-items, #yith-quick-view-content div.entry-summary .summary-content .single_add_to_cart_button, .btn-primary:not(:disabled):not(.disabled).active, .btn-primary:not(:disabled):not(.disabled):active, .show>.btn-primary.dropdown-toggle, .cart-header a.button:nth-child(2):hover, .woocommerce-mini-cart__buttons.buttons a:first-child, .mega-menu .tip, #yith-quick-view-content div.entry-summary .variations .reset_variations, .text-items, .apr-advance-tabs.apr-tabs-vertical .apr-tabs-nav > ul > li.active, .apr-advance-tabs.apr-tabs-vertical .apr-tabs-nav > ul > li:hover,  .product-slide .slick-dots li button:hover, .popup-sale-off .mc4wp-form-fields input[type='submit'], table.compare-list .add-to-cart td a, .newsletter-style2 .mc4wp-form-fields input[type=submit], .elementor-widget.toggle-contact, .active-sidebar .widget.yith-woocompare-widget .compare.button, body:not(.elementor-editor-active) .busy-loader .w-ball-wrapper .w-ball, body:not(.elementor-editor-active) #object-7, body:not(.elementor-editor-active) .pacman>div:nth-child(3), body:not(.elementor-editor-active) .pacman>div:nth-child(4), body:not(.elementor-editor-active) .pacman>div:nth-child(5), body:not(.elementor-editor-active) .pacman>div:nth-child(6), body:not(.elementor-editor-active) .preloader8 span,  .btn-viewmore a:active, .btn-viewmore a:focus, .btn-viewmore a:hover, .load_more_button a:active, .load_more_button a:focus,  .link_section .link-icon, .post-single.single-2 .blog-item .action .post-share-list a:hover, .woocommerce div.entry-summary form.cart button[type=submit], .woocommerce-page .wishlist_table .product-add-to-cart .button, .woocommerce #respond input#submit, .video-product,  .woocommerce-account .woocommerce-MyAccount-navigation, .woocommerce-account .woocommerce-MyAccount-content .button, .woocommerce-account .woocommerce-MyAccount-content .shop_table thead tr th, .woocommerce-form.woocommerce-form-login button.button, .woocommerce-account .woocommerce-form .button, .woocommerce .wc-proceed-to-checkout a.button.alt, .checkout-col-right #order_review_heading, .woocommerce-checkout #payment #place_order{
                            background: -moz-linear-gradient(to bottom, $primary_color, $secondary_color);
                            background: -ms-linear-gradient(to bottom, $primary_color, $secondary_color);
                            background: -o-linear-gradient( to bottom, $primary_color, $secondary_color);
                            background: -webkit-gradient(linear,left top,left bottom,from($primary_color),to($secondary_color));
                            background: linear-gradient(to bottom,$primary_color,$secondary_color);
                    }
                    .tooltip-inner{
                        background: -moz-linear-gradient(to bottom, $secondary_color, $primary_color);
                            background: -ms-linear-gradient(to bottom, $secondary_color, $primary_color);
                            background: -o-linear-gradient( to bottom, $secondary_color, $primary_color);
                            background: -webkit-gradient(linear,left top,left bottom,from($secondary_color),to($primary_color));
                            background: linear-gradient(to bottom,$secondary_color,$primary_color);
                    }
                    .label-product,
                    .instagram_title::before,
                    .breadcrumb li::before,
                    .heading-modern.heading-1 .heading-title::before,
                    footer .widget_nav_menu li a::before,
                    .footer-04 .footer-newsletter.newsletter-style1 .newsletter_title h2::before,
                    .header-05 .cart-header .minicart-content .text-items,
                    .custom.tp-bullets .tp-bullet.selected:before, .custom.tp-bullets .tp-bullet:hover:before{
                        background-color: $primary_color;
                    }
                ";
                return $css;
            }else{
                $css .= "
                    .instagram_title:before, .btn.btn-primary, button.btn-primary, input[type=button].btn-primary, input[type=reset].btn-primary, input[type=submit].btn-primary, button, button.btn.btn-primary, .btn.btn-border, .box-deal-bg:before, .label-product.percentage, .product-action .action-item .add-cart-btn a, .custom.tp-bullets .tp-bullet.selected::before, .custom.tp-bullets .tp-bullet:hover::before, .blog-video i:hover, .product-packery span.label-product.on-sale, .tooltip-inner, .label-product .percentage, #cart_added_msg_popup, #compare_added_msg_popup, #yith-wcwl-message, #btn-show-social:hover, .footer-02 .footer-newsletter.newsletter-style1 .mc4wp-form-fields input[type=submit], .footer-02 .widget_nav_menu li a:hover:before, .footer-02 .footer-newsletter:after, .header-03 .header-icon .text-items, #yith-quick-view-content div.entry-summary .summary-content .single_add_to_cart_button, .btn-primary:not(:disabled):not(.disabled).active, .btn-primary:not(:disabled):not(.disabled):active, .show>.btn-primary.dropdown-toggle, .cart-header a.button:nth-child(2):hover, .woocommerce-mini-cart__buttons.buttons a:first-child, .mega-menu .tip, .label-product, .woo-product-category .cate-content .name-cate h3 a.woo-cate-title span:before, .heading-modern.heading-1 .heading-title:before, #yith-quick-view-content div.entry-summary .variations .reset_variations, .product-slide .slick-dots li.slick-active button, .text-items, .apr-advance-tabs.apr-tabs-vertical .apr-tabs-nav > ul > li.active, .apr-advance-tabs.apr-tabs-vertical .apr-tabs-nav > ul > li:hover, .bg-primary-op .product-image:after, .bg-primary-op:after, .product-slide .slick-dots li button:hover, .scroll-to-top:hover:after, .custom.tp-bullets .tp-bullet.selected:before, .custom.tp-bullets .tp-bullet:hover:before, .widget_categories li a:before, .widget_nav_menu li a:before, .widget_pages li a:before, .popup-sale-off .mc4wp-form-fields input[type='submit'], table.compare-list .add-to-cart td a, .box-deal figcaption.widget-image-caption .box-dl, .header-01 .header-bottom, .newsletter-style2 .mc4wp-form-fields input[type=submit], .elementor-widget.toggle-contact, .active-sidebar .widget.widget_product_categories ul.product-categories>li:hover:before, .active-sidebar .widget.widget_product_categories ul.product-categories>li.current-cat:before, .widget.brand li:hover:before, .active-sidebar .widget.yith-woocompare-widget .products-list li:hover:before, .active-sidebar .widget.yith-woocompare-widget .compare.button, body:not(.elementor-editor-active) .busy-loader .w-ball-wrapper .w-ball, body:not(.elementor-editor-active) #object-7, body:not(.elementor-editor-active) .pacman>div:nth-child(3), body:not(.elementor-editor-active) .pacman>div:nth-child(4), body:not(.elementor-editor-active) .pacman>div:nth-child(5), body:not(.elementor-editor-active) .pacman>div:nth-child(6), body:not(.elementor-editor-active) .preloader8 span, .welcome p a:before, .btn-viewmore a:active, .btn-viewmore a:focus, .btn-viewmore a:hover, .load_more_button a:active, .load_more_button a:focus, .load_more_button a:hover, .link_section .link-icon, .post-single .blog_post_desc .text-bold a:before, .post-single.single-2 .blog-item .action .post-share-list a:hover, .text-list li:hover:before, .post-info-author .post-share-list a:hover, .slick-dots li button, .woocommerce div.entry-summary form.cart button[type=submit], .woocommerce-page .wishlist_table .product-add-to-cart .button, .single-product .product-detail.single_1 .slick-dots li.slick-active button, .woocommerce #respond input#submit, .video-product, .active-sidebar .widget.yith-woocompare-widget .products-list li .remove:hover, .woocommerce-account .woocommerce-MyAccount-navigation, h3.tlt-woocommerce-MyAccount:after, .woocommerce-account .woocommerce-MyAccount-content .button, .woocommerce-account .woocommerce-MyAccount-content form>h3:after, .woocommerce-account .woocommerce-MyAccount-content .shop_table thead tr th, .woocommerce-account #customer_login h2:after, .woocommerce-form.woocommerce-form-login button.button, .woocommerce-account .woocommerce-form .button, .woocommerce .wc-proceed-to-checkout a.button.alt, .checkout-col-right #order_review_heading, .woocommerce-checkout #payment ul.payment_methods li input:checked~label:after, .woocommerce-checkout #payment #place_order,
                        .breadcrumb li:before,
                        .info-category a:before, .info-tag a:before,
                        .comment-content .comment-datetime,
                        .blog-gallery2.arrows-custom button.slick-arrow:hover,
                        footer .widget_archive li a:before, 
                        footer .widget_categories li a:before, 
                        footer .widget_meta li a:before, 
                        footer .widget_nav_menu li a:before, 
                        footer .widget_pages li a:before, 
                        footer .widget_recent_comments li a:before, 
                        footer .widget_recent_entries li a:before, 
                        footer .widget_rss li a:before,
                        .footer-04 .footer-newsletter.newsletter-style1 .mc4wp-form-fields p:last-child input,
                        .page-links>:not(.page-links-title).active, 
                        .active-sidebar .widget_archive li:before, .active-sidebar .widget_categories li:before, .active-sidebar .widget_meta li:before, .active-sidebar .widget_nav_menu li:before, .active-sidebar .widget_pages li:before, .active-sidebar .widget_recent_comments li:before, .active-sidebar .widget_recent_entries li:before, .active-sidebar .widget_rss li:before,
                        .post-single .blog-item>.blog_post_desc .text-bold a:before,
                        .active-sidebar .brand li:before, .active-sidebar .widget_archive li:before, .active-sidebar .widget_categories li:before, .active-sidebar .widget_meta li:before, .active-sidebar .widget_nav_menu li:before, .active-sidebar .widget_pages li:before, .active-sidebar .widget_product_categories li:before, .active-sidebar .widget_recent_comments li:before, .active-sidebar .widget_recent_entries li:before, .active-sidebar .widget_rss li:before,
                        .active-sidebar .yith-woocompare-widget li:before,
                        .account-popup form.login button[type=submit], .account-popup form.register button[type=submit],
                        .post-single .blog_info.blog_info_single .info.info-category a:before, .post-single .blog_info.blog_info_single .info.info-tag a:before,
                        .scroll-to-top:hover:after{
                            background-color:{$primary_color};
                    }
                ";
                return $css;
            }
        }
        function primary_color_css(){
            $primary_color = Arangi::setting( 'primary_color' );
            $secondary_color = Arangi::setting( 'secondary_color' );
            $site_color = arangi_get_meta_value('site_color');
            if ($site_color !== ''){
                 $primary_color = $site_color;
            }else{
                 $primary_color = $primary_color;
            }
            $css = '';
            
            if ( isset($primary_color) && $primary_color !== '' ) {
                $css = "
                    button.btn.btn-primary, button, .btn.btn-border,
                    .btn-primary:not(:disabled):not(.disabled).active, .btn-primary:not(:disabled):not(.disabled):active, .show>.btn-primary.dropdown-toggle,
                    .cart-header a.button:nth-child(2):hover,
                    .bn-border-gradient .apr-banner:before,
                    #yith-quick-view-content div.entry-summary .variations .reset_variations,
                    #yith-quick-view-content div.entry-summary .variations .reset_variations:hover,
                    .product-list-thumbnails .slick-current img,
                    button.btn.btn-primary, button, .btn.btn-border,
                    .custom.tp-bullets .tp-bullet,
                    .slick-dots li:before,
                    .languges-flags .lang-1,
                    .header-03 .header-icon .languges-flags .lang-1,
                    .header-03 .header-icon .account-header>a,
                    .header-03 .header-icon .cart_label .text-header,
                    .header-03 .header-icon .header-contact a,
                    .header-03 .header-icon .btn-search,
                    .box-icon-medicine:hover,
                    .active-sidebar .widget.yith-woocompare-widget .products-list li .remove,
                    body:not(.elementor-editor-active) .lds-ripple div,
                    .post-single.single-2 .blog-item .action .post-share-list a:hover,
                    .post-info-author .post-share-list a:hover,
                    .woocommerce #respond input#submit,
                    .woocommerce .checkout .form-row .woocommerce-input-wrapper input:hover,
                    .woocommerce .checkout .form-row .woocommerce-input-wrapper textarea:hover,
                    .woocommerce .checkout .form-row .select2-container--default .select2-selection--single:hover,
                    .page-links>:not(.page-links-title).active,
                    .header-05 .header-icon .account-header a:hover i,
                    .text-map a, .product-extra .slick-arrow:active, .product-extra .slick-arrow:focus, .product-extra .slick-arrow:hover{
                        border-color:{$primary_color};
                    }
                    .apr-advance-tabs .apr-tabs-nav>ul li:after{
                        border-top-color: {$primary_color};
                    }
                    .single-product .product-detail.single_1 .slick-dots li.slick-active button{
                        border-color:{$primary_color} !important;
                    }
                    .single-product .product-detail.single_1 .slick-dots li.slick-active:before{
                        border-right-color:{$primary_color} !important;
                    }
                    .wpulike.wpulike-robeen svg .heart,
                    .wpulike.wpulike-robeen .wp_ulike_btn:checked+svg .heart{
                        fill: {$primary_color};
                    }
                    body a:hover, body a:focus, .countries-cat a:hover,
                    .page-footer .widget_products .product_list_widget .product-desc .product-title a:hover, 
                    .page-footer .widget_top_rated_products .product_list_widget .product-desc .product-title a:hover,
                    .page-footer .widget_products .product_list_widget .product-desc .price,
                    .page-footer .widget_top_rated_products .product_list_widget .product-desc .price,
                    .woocommerce div.entry-summary p.price,
                    .post-single .blog-item>.blog_post_desc .text-bold a,
                    .page-links>:not(.page-links-title).active, .page-links>:not(.page-links-title):hover,
                    .comment-actions a:hover,
                    .product-share .product-sharing-list a:hover,
                    .account-popup .nav-tabs .nav-item a,
                    .cart-discount a,
                    .fancybox-inner .fancybox-close-small:hover,
                    .woocommerce-checkout-review-order-table .cart_item .product-name .product-info .woocommerce-Price-amount,
                    .woocommerce .shop_table.woocommerce-checkout-review-order-table tfoot tr.order-total td,
                    .lost_password a:hover,
                    .shop_table .product-price span, .shop_table .product-subtotal span,
                    .shop_table.cart .product-cart-content .product-name:hover,
                    .woocommerce-account .form-row label .required,
                    .single-product .product-detail.single_2 .product-list-thumbnails .slick-arrow:hover,
                    .woocommerce div.entry-summary form.cart .woocommerce-grouped-product-list.group_table tbody td span.amount,
                    .woocommerce div.entry-summary .yith-wcwl-add-to-wishlist a:hover,
                    .text-desc a,
                    .post-single .blog_info.blog_info_single .info a:hover,
                    .post-single .blog_info.blog_info_single .info.info-category:before,
                    .blog-gallery-single.arrows-custom button.slick-arrow:hover,
                    .post-single .blog_post_desc .text-bold a,
                    .post-single .blog_info.blog_info_single .info.info-category a,
                    .pagination-content li a:hover,
                    .pagination-content li a:hover,
                    .page-numbers:not(.next).current, .page-numbers:not(.prev).current,
                    .tm-posts-widget .post-widget-info .post-widget-categories a,
                    .blog-video i,
                    .text-privacy a,
                    .blog_info .info a,
                    .post-name a:hover,
                    .woocommerce ul.products li.type-product .price,
                    .product-title .product-name:hover,
                    .blog_info_ab .info i,
                    .woocommerce div.entry-summary .price .amount, 
                    .woocommerce div.entry-summary .price ins,
                    .list-item.style-2 li:hover,
                    #yith-quick-view-close:hover,
                    .cart-header .widget_shopping_cart_content ul li .quantity,
                    p.woocommerce-mini-cart__total.total .woocommerce-Price-amount,
                    .cart-header .widget_shopping_cart_content ul li a:hover,
                    .cart-header .widget_shopping_cart_content ul li a.remove:hover:after,
                    .ui-autocomplete .price .add_to_cart_inline span,
                    .ui-autocomplete .search-info>a:hover,
                    .header-menu .mega-menu>li .sub-menu>li:hover>a,
                    .mega-type-2 .apr-product .slick-arrow:hover,
                    .woo-product-category .cate-content .name-cate h3 a.woo-cate-title span,
                    .product-action .yith-wcwl-wishlistaddedbrowse a:before, 
                    .product-action .yith-wcwl-wishlistexistsbrowse a:before,
                    .product-action .compare-product a.added:before,
                    .list-item li a:hover,
                    #yith-quick-view-content div.entry-summary .variations .reset_variations:hover,
                    .apr-tabs-horizontal.apr-advance-tabs .apr-tabs-nav>ul li.active, .apr-tabs-horizontal.apr-advance-tabs .apr-tabs-nav>ul li:hover,
                    .site-header .icon-list .path1:before,
                    .woo-product-category .cate-content .name-cate h3:hover a.woo-cate-title,
                    .social-footer-style1 .list-social li a:hover,
                    .footer-01 .list-info-contact .info-phone a:hover,
                    .footer-01 .list-info-contact li a,
                    .footer-01 .widget_nav_menu li a:hover, 
                    .footer-01 .copyright-content p a:hover, 
                    .footer-01 .payment ul li a:hover,
                    .humburger-content ul.product_list_widget li .product-content .product-desc .product-price .price ins, 
                    .humburger-content ul.product_list_widget li .product-content .product-desc .product-price .price>span,
                    .humburger-content ul.list-info-contact li i,
                    .apr-banner .btn-bn:hover,
                    .languges-flags a:hover,
                    .apr-product.product-list.list-1 .product-title .product-name:hover,
                    .product-grid.grid-2 .woocommerce ul.products .product-title .product-name:hover,
                    .blog-grid.grid-style2 .read-more a,
                    .site-header .mega-menu>li:hover,
                    .humburger-content ul.product_list_widget li .product-content .product-desc .product-title a:hover,
                    .woocommerce-MyAccount-navigation .is-active a,
                    .header-02 .header-menu .mega-menu > li > a:focus,
                    .header-02 .header-menu .mega-menu > li > a:hover,
                    .header-menu .mega-menu > li .sub-menu > li:hover > a,
                    .header-03 .header-icon .account-header>a,
                    .header-03 .header-icon .cart_label .text-header,
                    .header-03 .header-icon .header-contact a,
                    .header-03 .header-icon .btn-search,
                    .footer-02 .list-info-contact li i, 
                    .footer-02 .widget_nav_menu li a:hover,
                    .footer-02 .list-info-contact li a:hover, 
                    .footer-02 .payment ul li a:hover,
                    .date_from_to span,
                    .footer-02 .social-footer-style1 .list-social li a:hover,
                    .header-01 .header-search-category .category_dropdown ul.chosen-results li:hover,
                    .content-topbar a:hover,
                    .header-01 .mega-menu li a:focus, .header-01 .mega-menu li a:hover,
                    .footer-03 .list-info-contact li.info-mail a,
                    .footer-03 .list-info-contact li a:hover,
                    .footer-03 .payment ul li a:hover, 
                    .footer-03 .widget_nav_menu li a:hover,
                    .breadcrumb li .home, .breadcrumb li a, 
                    .breadcrumb li:before,
                    .humburger-content ul.list-info-contact li a:hover,
                    .list-view li a.active, .list-view li a:hover,
                    .woocommerce nav.woocommerce-pagination .page-numbers li a.next:focus, .woocommerce nav.woocommerce-pagination .page-numbers li a.next:hover, .woocommerce nav.woocommerce-pagination .page-numbers li a.prev:focus, .woocommerce nav.woocommerce-pagination .page-numbers li a.prev:hover,
                    .woocommerce nav.woocommerce-pagination .page-numbers li span.current,
                    .woocommerce nav.woocommerce-pagination .page-numbers li a.active, .woocommerce nav.woocommerce-pagination .page-numbers li a:hover, .woocommerce nav.woocommerce-pagination .page-numbers li span.active, .woocommerce nav.woocommerce-pagination .page-numbers li span:hover,
                    .header-menu .mega-menu li.current_page_item>a,
                    .active-sidebar .widget a:hover, 
                    .active-sidebar .widget.widget_product_categories ul.product-categories li:hover>a, 
                    .active-sidebar .widget.widget_product_categories ul.product-categories li:hover>p, 
                    .active-sidebar .widget.widget_product_categories ul.product-categories li:hover>span.count, 
                    .active-sidebar .widget.brand li:hover a, 
                    .active-sidebar .widget.widget_categories a:hover, 
                    .active-sidebar .widget.yith-woocompare-widget .products-list li:hover .title, 
                    .active-sidebar .tm-posts-widget .post-widget-info .post-widget-title a:hover,
                    .active-sidebar .widget.widget_product_categories ul.product-categories li ul.children li:hover>a, 
                    .active-sidebar .widget.widget_product_categories ul.product-categories li ul.children li:hover>p, 
                    .active-sidebar .widget.widget_product_categories ul.product-categories li ul.children li:hover>span.count,
                    .active-sidebar .widget.widget_products .product_list_widget .product-desc .price, 
                    .active-sidebar .widget.widget_top_rated_products .product_list_widget .product-desc .price,
                    .welcome p a,
                    .testimonial .testimonial-content .elementor-testimonial-desc:before,
                    .testimonial .testimonial-content .elementor-testimonial-source,
                    .quote_section blockquote .quote_link:hover,
                    .widget_search .search-form.woosearch-search .searchsubmit.woosearch-submit.submit.btn-search:hover,
                    .text-list li a:hover,
                    .blog-slide .slick-arrow:hover,
                    .tagcloud a:hover,.box-info-comment .name-author, .woocommerce div.entry-summary .yith-wcwl-add-to-wishlist .yith-wcwl-wishlistexistsbrowse a:before,
                    .woocommerce div.entry-summary .compare.button:hover,
                    .woocommerce .wishlist_table .product-name a.yith-wcqv-button,
                    .woocommerce-page .wishlist_table .product-price .amount,
                    .woocommerce-wishlist table.wishlist_table.shop_table.cart .product-price .amount span,
                    .woocommerce #reviews #comments ol.commentlist li .comment-text p.meta strong,
                    .single-product div.product .woocommerce-tabs .tab-content .tagged_as a,
                    .woocommerce p.stars a:hover,
                    .woocommerce-Address-title.title .edit,
                    .title-hdwoo span:hover,
                    .woocommerce .box-cart-total table.shop_table tbody tr.order-total td,
                    .shop_table.cart tbody td.actions>button:before,
                    .shop_table .cart_item a.remove:hover i,
                    .showcoupon, .showlogin,
                     .product-extra .slick-arrow:active, 
                    .product-extra .slick-arrow:focus, 
                    .product-extra .slick-arrow:hover,
                    .comment-actions .wpulike.wpulike-default .wp_ulike_general_class .wp_ulike_btn:hover:after,
                    .welcome h3,
                    .header-04.site-header .account-header:hover span.box-label,
                    .header-04 .cart-header:hover .cart_label .count,
                    .header-04 .languges-flags .lang-1:hover,
                    .header-04 .header-menu .mega-menu > li > a:hover,
                    .footer-04 .widget_nav_menu li a:hover,
                    .blog-gallery2.arrows-custom button.slick-arrow,
                    .active-sidebar .widget_archive li:hover>a, .active-sidebar .widget_categories li:hover>a, .active-sidebar .widget_meta li:hover>a, .active-sidebar .widget_nav_menu li:hover>a, .active-sidebar .widget_pages li:hover>a,
                    .tab-product-custom .apr-advance-tabs .apr-tabs-nav>ul li.active-default,
                    .header-05 .header-top .content-topbar span,
                    .header-05 .header-top .content-topbar a:hover,
                    .social-header .list-social li a:hover,
                    .header-05 .header-top .header-menu .main-navigation .widget_nav_menu li>a:hover,
                    .header-05 .header-bottom .header-menu .mega-menu>li>a >i,
                    .header-menu .mega-menu>li>a:hover,
                    .box-garden-safe .elementor-icon-box-icon:before,
                    .header-05 .header-icon .account-header a:hover .label-acc,
                    .header-05 .header-icon .account-header a:hover i,
                    .text-map h3,
                    .text-map a,
                    .header-fixed .header-06.fix-top .header-icon i:hover, 
                    .header-fixed .header-06.fix-top .header-middle .mega-menu > li > a:hover, 
                    .header-fixed .header-06.fix-top .icon-header:hover, 
                    .header-fixed .header-06.fix-top .languges-flags .lang-1:hover,
                    .product_meta a:hover{
                        color:{$primary_color};
                    }
                    .widget_berocket_aapf_single .berocket_filter_price_slider.ui-widget-content .ui-slider-handle, 
                    .widget_berocket_aapf_single .berocket_filter_slider.ui-widget-content .ui-slider-handle{
                        background-color: {$primary_color} !important;
                    }
                    .tooltip .arrow:before ,
                    .account-popup .woocommerce-form .form-row .input-text{
                        border-bottom-color:{$primary_color} !important;
                    }
                    .tooltip .arrow:before {
                        border-top-color:{$primary_color} !important;
                    }
                    body:not(.elementor-editor-active) .object-3,
                    body:not(.elementor-editor-active) .pacman>div:first-of-type,
                    body:not(.elementor-editor-active) .pacman>div:nth-child(2){
                        border-top-color:{$primary_color};
                    }
                    body:not(.elementor-editor-active) .object-3,
                    body:not(.elementor-editor-active) .pacman>div:first-of-type,
                    body:not(.elementor-editor-active) .pacman>div:nth-child(2){
                        border-left-color:{$primary_color};
                    }
                    body:not(.elementor-editor-active) .pacman>div:first-of-type,
                    body:not(.elementor-editor-active) .pacman>div:nth-child(2){
                        border-bottom-color:{$primary_color};
                    }
                    .rtl .apr-advance-tabs.apr-tabs-vertical .apr-tabs-nav > ul li::after{
                        border-right-color: {$primary_color};
                    }
                    .apr-advance-tabs.apr-tabs-vertical .apr-tabs-nav>ul li::after{
                        border-left-color: {$primary_color};
                    }
                    .search-box .ui-autocomplete li .search-content .search-info .add-cart .add-cart-btn a:hover,
                    .product-action .action-item:not(.add-cart) a.button:hover,
                    .scroll-to-top:hover,
                    .scroll-to-top:hover span,
                    div.humburger-menu .humburger-content a:hover,
                    .custom-date a:hover,
                    .active-sidebar .widget.yith-woocompare-widget .products-list li .remove,
                    .single-product div.product .woocommerce-tabs ul.tabs li.active a,
                    .single-product div.product .woocommerce-tabs ul.tabs li:hover a,
                    .shop_table .cart_item a.remove:hover,
                    .popup-sale-off .after-title{
                        color: {$primary_color} !important;
                    }
                    body:not(.elementor-editor-active) .lds-dual-ring::after {
                        border-color: {$primary_color} transparent {$primary_color} transparent;
                    }
                    .apr-cf7-style input[type='submit']{
                        background-image: linear-gradient(180deg, rgba(0,0,0,0) 0%, {$primary_color} 0%);
                    }
                    .box-deal-bg:after{
                        background: -webkit-gradient(linear, center top, center bottom, from(#ffffff 30%), to{$primary_color});
                        background: -webkit-linear-gradient(#ffffff 30%, {$primary_color});
                        background: -moz-linear-gradient(#ffffff 30%, {$primary_color});
                        background: -o-linear-gradient(#ffffff 30%, {$primary_color});
                        background: -ms-linear-gradient(#ffffff 30%, {$primary_color});
                        background: linear-gradient(#ffffff 30%, {$primary_color});
                    }
                    .box-deal figcaption.widget-image-caption .box-dl:before{
                        box-shadow: 17px 8px 0 0 {$primary_color};
                        -webkit-box-shadow: 17px 8px 0 0 {$primary_color};
                        -moz-box-shadow: 17px 8px 0 0 {$primary_color};
                        -ms-box-shadow: 17px 8px 0 0 {$primary_color};
                    }
                    @media(min-width: 992px){
                        .header-02 .account-header a:hover, 
                        .header-02 .cart-header:hover, 
                        .header-02 .header-contact i:hover, 
                        .header-02 .search-header:hover,
                        .header-02 .header-menu .mega-menu>li>a:hover,
                        .header-02:not(.header-wine) .header-menu .mega-menu>li>a:hover,
                        .header-02:not(.header-wine) .account-header a:hover, .header-02:not(.header-wine) .cart-header:hover, .header-02:not(.header-wine) .header-contact i:hover, .header-02:not(.header-wine) .search-header:hover{
                            color: {$primary_color};
                        }
                        .header-03 .mega-menu>li>a:before{
                            background-color: {$primary_color};
                        }
                    }
                    @media (max-width: 991px){
                        .menu-mobile .mega-menu .sub-menu-active>.caret-submenu, 
                        .menu-mobile .mega-menu .sub-menu-active>a {
                            color: {$primary_color} !important;
                        }
                        .menu-mobile .mega-menu>li>.sub-menu{
                            border-top-color: $primary_color;
                        }
                        .mobile-tool .account-header > a, .mobile-tool .icon-header span, .mobile-tool .phone-mobile a{
                            color: $primary_color;
                        }
                        .mobile-tool .account-header > a, .mobile-tool .icon-header span, .mobile-tool .phone-mobile a{
                            border-color: $primary_color;
                        }
                        .menu-mobile .mega-menu > li .sub-menu > li .sub-menu{
                            border-top-color: $primary_color;
                        }
                    }
                    @media (max-width: 1024px) {
                        .bg-tab1:before{
                            background: -webkit-gradient(linear, center top, center bottom, from(#ffffff 30%), to($primary_color));
                            background: -webkit-linear-gradient(#ffffff 30%, $primary_color);
                            background: -moz-linear-gradient(#ffffff 30%, $primary_color);
                            background: -o-linear-gradient(#ffffff 30%, $primary_color);
                            background: -ms-linear-gradient(#ffffff 30%, $primary_color);
                            background: linear-gradient(#ffffff 30%, $primary_color);
                        }
                        .bg-tab2:before{
                            background-color:$primary_color;
                        }
                    }
                    @media screen and (-ms-high-contrast: active), (-ms-high-contrast: none) {
                      .woocommerce div.entry-summary form.cart .woocommerce-grouped-product-list.group_table thead{
                            background-color: $primary_color;
                       }
                    }
                ";
                
            }
            return $css;
        }
         function hightlight_color_css(){
             $customize_highlight_color = Arangi::setting( 'hightlight_color' );
             $page_highlight_color = arangi_get_meta_value('page_highlight_color');
             $site_color = arangi_get_meta_value('site_color');
             $primary_color = Arangi::setting( 'primary_color' );
             if ($page_highlight_color==''){
                 $highlight_color = $customize_highlight_color;
             }else{
                 $highlight_color = $page_highlight_color;
             }
             if ($site_color==''){
                 $primary_color = $primary_color;
             }else{
                 $primary_color = $site_color;
             }
            $css = '';
            if ( $highlight_color !== '' ) {
                $css = "
                .box-icon.icon-gradient .elementor-icon i:before{
                    background: -webkit-gradient(linear,left top,left bottom,from($primary_color),to($highlight_color));
                    background: linear-gradient(to bottom,$primary_color,$highlight_color);
                    -webkit-background-clip: text;
                    -webkit-text-fill-color: transparent;
                    -webkit-box-decoration-break: clone;
                }
                .woocommerce div.entry-summary form.cart .woocommerce-grouped-product-list.group_table thead{
                       background: -moz-linear-gradient(to right, $primary_color, $highlight_color);
                            background: -ms-linear-gradient(to right, $primary_color, $highlight_color);
                            background: -o-linear-gradient( to right, $primary_color, $highlight_color);
                            background: -webkit-gradient(linear,left top,left bottom,from($primary_color),to($highlight_color));
                            background: linear-gradient(to right,$primary_color,$highlight_color);
                }
                .footer-instagram .widget.instagram .instagram-gallery .instagram-img a:before{
                    background: $highlight_color;
                    background: -webkit-gradient(linear,left top,left bottom,from($primary_color),to($highlight_color));
                    background: -webkit-linear-gradient(top,$primary_color,$highlight_color);
                }
                .box-icon.icon-gradient:hover,
                .testimonial-image .img-wrap.slick-current:before{
                    background: -webkit-gradient(linear,left top,left bottom,from($primary_color),to($highlight_color));
                    background: linear-gradient(to bottom,$primary_color,$highlight_color);
                }
                .widget.instagram .instagram-gallery .instagram-img a:before{
                    background: $highlight_color;
                    background: -webkit-gradient(linear,left top,left bottom,from($primary_color),to($highlight_color));
                    background: -webkit-linear-gradient(top,$primary_color,$highlight_color);
                }
                .btn.btn-border.btn-gradient{
                    background: $highlight_color;
                  background: -webkit-gradient(linear, left top, left bottom, from($primary_color), to($highlight_color));
                  background: -webkit-linear-gradient(top, $primary_color, $highlight_color);
                  background: -moz-linear-gradient(top, $primary_color, $highlight_color);
                  background: -ms-linear-gradient(top, $primary_color, $highlight_color);
                  background: -o-linear-gradient(top, $primary_color, $highlight_color);
                }
                .btn.btn-border.btn-gradient:hover,
                .page-coming-soon .coming-subcribe .mc4wp-form-fields p:last-child{
                    background: $highlight_color;
                  background: -webkit-gradient(linear, left top, left bottom, from($primary_color), to($highlight_color));
                  background: -webkit-linear-gradient(top, $primary_color, $highlight_color);
                  background: -moz-linear-gradient(top, $primary_color, $highlight_color);
                  background: -ms-linear-gradient(top, $primary_color, $highlight_color);
                  background: -o-linear-gradient(top, $primary_color, $highlight_color);
                }
                .apr-banner .bn-before{
                    background: linear-gradient(to right,$primary_color 0,$highlight_color 100%);
                    -webkit-background-clip: text;
                    -webkit-text-fill-color: transparent;
                }
               .page-coming-soon .coming-soon h1{
                    color: #c44860;
                    background: -webkit-gradient(linear,left top,left bottom,from($primary_color),to($highlight_color));
                    -webkit-background-clip: text;
                    -webkit-text-fill-color: transparent;
               }
                .footer-01 .list-info-contact .info-phone i{
                    background: -webkit-gradient(linear,left top,left bottom,from($primary_color),to($highlight_color));
                    background: linear-gradient(to bottom,$primary_color,$highlight_color);
                    -webkit-background-clip: text;
                    -webkit-text-fill-color: transparent;
                    -webkit-box-decoration-break: clone;
                    box-decoration-break: clone;
                    text-shadow: none;
                }
                .bn-border-gradient .apr-banner:before {
                    border-image-source: linear-gradient($primary_color, $highlight_color);
                }
                .box-link a.text-link-hover:hover,
                .product-packery .product-action .compare-product a.added:before,
                .post-single .blog_post_desc .text-bold a:hover,
                .text-desc a:hover,
                .post-single .blog-item>.blog_post_desc .text-bold a:hover{
                    color: {$highlight_color};
                }
                .product-packery .product-action .yith-wcwl-wishlistaddedbrowse a:before, .product-packery .product-action .yith-wcwl-wishlistexistsbrowse a:before,
                .product-packery .product-action .action-item:not(.add-cart) a.button:hover{
                    color: {$highlight_color} !important;
                }
                button.btn.btn-primary.btn-hover, button.btn.btn-primary:active, button.btn.btn-primary:focus, button.btn.btn-primary:hover, button:hover, button:focus, button:active, .btn.btn-border:hover, .btn.btn-border:focus, .btn.btn-border:active,
                .product-packery .product-action .action-item .add-cart-btn a:hover,
                .apr-product.product-list.list-2 .product-content .product-top .product-action .action-item .add-cart-btn a:hover,
                .product-action .action-item .add-cart-btn a:hover,
                .cart-header a.button:first-child:hover,
                .label-new,
                .popup-sale-off .mc4wp-form-fields input[type='submit']:hover,
                .btn.btn-border.btn-gradient:not(:disabled):not(.disabled).active,
                .btn.btn-border.btn-gradient:not(:disabled):not(.disabled):active,
                button.btn-border.btn-gradient:not(:disabled):not(.disabled).active,
                button.btn-border.btn-gradient:not(:disabled):not(.disabled):active, input[type=button].btn-border.btn-gradient:not(:disabled):not(.disabled).active, input[type=button].btn-border.btn-gradient:not(:disabled):not(.disabled):active, input[type=reset].btn-border.btn-gradient:not(:disabled):not(.disabled).active, input[type=reset].btn-border.btn-gradient:not(:disabled):not(.disabled):active, input[type=submit].btn-border.btn-gradient:not(:disabled):not(.disabled).active, input[type=submit].btn-border.btn-gradient:not(:disabled):not(.disabled):active,
                .header-01 .mega-menu .tip,
                .newsletter-style2 .mc4wp-form-fields input[type=submit]:hover,
                .header-01 .col-bottom-right:after,
                .active-sidebar .widget.yith-woocompare-widget .compare.button:hover,
                .post-single .blog_post_desc .text-bold a:hover:before,
                .woocommerce div.entry-summary form.cart button[type=submit]:hover,
                .woocommerce-page .wishlist_table .product-add-to-cart .button:focus, .woocommerce-page .wishlist_table .product-add-to-cart .button:hover,
                .woocommerce #reviews #review_form .comment-form p.form-submit input#submit:hover,
                .woocommerce-account .woocommerce-MyAccount-content .button:hover,
                .woocommerce-account .woocommerce-MyAccount-content table.my_account_orders .button:hover,
                .woocommerce-account .woocommerce-form.woocommerce-form-login button.button:active, 
                .woocommerce-account .woocommerce-form.woocommerce-form-login button.button:focus, 
                .woocommerce-account .woocommerce-form.woocommerce-form-login button.button:hover,
                .woocommerce-account .woocommerce-form .button:hover,
                .woocommerce .wc-proceed-to-checkout a.button.alt:hover,
                .woocommerce-checkout #payment #place_order:hover,
                .label-product.on-hot,
                .account-popup form.login button[type=submit]:focus, .account-popup form.login button[type=submit]:hover, .account-popup form.register button[type=submit]:focus, .account-popup form.register button[type=submit]:hover{
                    background-color: {$highlight_color};
                }
                 button.btn.btn-primary.btn-hover, button.btn.btn-primary:active, button.btn.btn-primary:focus, button.btn.btn-primary:hover, button:hover, button:focus, button:active, .btn.btn-border:hover, .btn.btn-border:focus, .btn.btn-border:active,
                 .cart-header a.button:first-child:hover,
                 .woocommerce #reviews #review_form .comment-form p.form-submit input#submit:hover{
                    border-color: {$highlight_color};
                 }
                 .btn.btn-primary.btn-hover, .btn.btn-primary:active, .btn.btn-primary:focus, .btn.btn-primary:hover, button.btn-primary.btn-hover, button.btn-primary:active, button.btn-primary:focus, button.btn-primary:hover, input[type=button].btn-primary.btn-hover, input[type=button].btn-primary:active, input[type=button].btn-primary:focus, input[type=button].btn-primary:hover, input[type=reset].btn-primary.btn-hover, input[type=reset].btn-primary:active, input[type=reset].btn-primary:focus, input[type=reset].btn-primary:hover, input[type=submit].btn-primary.btn-hover, input[type=submit].btn-primary:active, input[type=submit].btn-primary:focus, input[type=submit].btn-primary:hover,
                 .cart-header a.button:nth-child(2){
                     background: {$highlight_color};
                 }
                ";

            }
            return $css;
        }
        function site_color(){
            $site_color = arangi_get_meta_value('site_color');
            $css = '';
            if ( $site_color != '' ) {
                $css = "
                #page .discount-tag, .medyplus-countdown .countdown-section .countdown-number,
                .element-banner .banner-mid span.discount-tag,
                #page .woocommerce ul.products li.product .price,
                #page .blog_info .info.author-post a{
                    color: {$site_color};
                }";
                /* Hover color*/
                $css .= "
                .slick-arrow:hover, .product-title .product-name:hover,
                .post-name a:hover{
                    color: {$site_color}!important;
                }";
                $css .= "
                #page .label-product.new, .banner-mid .btn-underline:after,
                #page .woo-product-category:hover .cate-content .woo-cate-title,
                .mc4wp-form-fields .submit input[type=submit]{
                    background-color: {$site_color};
                }";
                /* Hover Background-color*/
                $css .= "
                .product-action .yith-wcwl-add-to-wishlist .hide a:hover, .btn-underline:after{
                    background-color: {$site_color}!important;
                }";
                /* Border-color*/
                $css .= "
                input[type=email]:hover{
                    border-color: {$site_color}!important;
                }";
            }
            return $css;
        }
        function breadcrumbs() {
            $breadcrumbs_padding = arangi_get_meta_value('breadcrumbs_padding');
            $align_breadcrumbs = arangi_get_meta_value('align_breadcrumbs');
            $breadcrumbs_color = arangi_get_meta_value('breadcrumbs_color');
            $breadcrumbs_opacity = get_post_meta(get_the_ID(), 'breadcrumbs_opacity', true);
            $breadcrumbs_bg_overlay = get_post_meta(get_the_ID(), 'breadcrumbs_bg_overlay', true);
            $breadcrumbs_font_size = get_post_meta(get_the_ID(), 'breadcrumbs_font_size', true);
            $breadcrumbs_link_font_size = get_post_meta(get_the_ID(), 'breadcrumbs_link_font_size', true);
            $title_color = get_post_meta(get_the_ID(), 'title_color', true);
            $link_color = get_post_meta(get_the_ID(), 'link_color', true);
            $breadcrumbs = get_post_meta(get_the_ID(), 'breadcrumbs', true);
            $title = get_post_meta(get_the_ID(), 'page_title', true);
            $css = '';
            if (isset($breadcrumbs_color) && $breadcrumbs_color != '') {
                $css .= "
                div.side-breadcrumb .breadcrumb{
                    color: {$breadcrumbs_color};
                }";
            }
            if (isset($align_breadcrumbs) && $align_breadcrumbs !== 'default' && $align_breadcrumbs !== '') {
                $css .= "
                div.side-breadcrumb{
                    text-align: {$align_breadcrumbs};
                }";
            }
            if (isset($title_color) && $title_color != '') {
                $css .= "
                div.side-breadcrumb .page-title h1, div.side-breadcrumb .page-title h2 {
                    color: {$title_color};
                }";
            }
            if (isset($link_color) && $link_color != '') {
                $css .= "
                div.side-breadcrumb .breadcrumb .home,
                div.side-breadcrumb .breadcrumb li a,
                div.side-breadcrumb .breadcrumb li:before {
                    color: {$link_color};
                }
                div.side-breadcrumb .breadcrumb li:before,
                .main-2 .breadcrumb li:before {
                    background-color: {$link_color};
                }";
            }
            if (isset($breadcrumbs_padding) && $breadcrumbs_padding != '') {
                $css .= "
                div.side-breadcrumb {
                    padding-bottom: {$breadcrumbs_padding}px;
                    padding-top: {$breadcrumbs_padding}px;
                }";
            }
            if (isset($breadcrumbs_opacity) && $breadcrumbs_opacity != '') {
                $css .= "
                div.side-breadcrumb:before {
                    opacity: {$breadcrumbs_opacity};
                }";
            }
            if (isset($breadcrumbs_bg_overlay) && $breadcrumbs_bg_overlay != '') {
                $css .= "
                div.side-breadcrumb:before {
                    background-color: {$breadcrumbs_bg_overlay};
                }";
            }
            if (isset($breadcrumbs_font_size) && $breadcrumbs_font_size != '') {
                $css .= "
                div.side-breadcrumb .page-title h1, div.side-breadcrumb .page-title h2,
                .main-2 div.side-breadcrumb .page-title h1, .main-2 div.side-breadcrumb .page-title h2,
                .main-2 .breadcrumb li:last-child {
                    font-size: {$breadcrumbs_font_size}px;
                }";
            }
			if (isset($breadcrumbs_link_font_size) && $breadcrumbs_link_font_size != '') {
                $css .= "
                div.side-breadcrumb .breadcrumb li, div.side-breadcrumb .breadcrumb li a,
                .main-2 div.side-breadcrumb .breadcrumb li, .main-2 div.side-breadcrumb .breadcrumb li a{
                    font-size: {$breadcrumbs_link_font_size}px;
                }";
            }
            return $css;
        }
        function site_background(){
            $site_background = arangi_get_meta_value('site_background');
            $css = '';
            if ( $site_background != '' ) {
                $css = "
                body{
                    background-color: {$site_background}!important;
                }";
            }
            return $css;
        }
        function page_highlight_color(){
            $page_highlight_color = arangi_get_meta_value('page_highlight_color');
            $highlight_color_cst = Arangi::setting( 'hightlight_color' );
            $css = '';
            if ( $highlight_color_cst != '' ) {
                $css = "
                .label-product.new{
                    background-color: {$highlight_color_cst};
                }";
            }
            return $css;
        }
        function body_bg_image(){
            if (is_category()){
                $body_bg_image = arangi_get_meta_value('bg_body_section', false);
            }else if (is_tax('product_cat')){
                $body_bg_image = arangi_get_meta_value('bg_body_shop', false);
            }else{
                $body_bg_image = arangi_get_meta_value('body_bg_image');
            }
            $css = '';
            if ( $body_bg_image != '' ) {
                $css = "
                body{
                    background-image: url($body_bg_image) !important;
                }";
            }
            return $css;
        }
		
		function headers() {
            $header_bg = arangi_get_meta_value('header_bg');
            $header_bg_image = arangi_get_meta_value('header_bg_image');
            $header_text_color = get_post_meta(get_the_ID(), 'header_text_color', true);
            $header_menu_color = get_post_meta(get_the_ID(), 'header_menu_color', true);
            $header_menu_color_hover = get_post_meta(get_the_ID(), 'header_menu_color_hover', true);
            $header_icon_color = get_post_meta(get_the_ID(), 'header_icon_color', true);
            $header_link_color = get_post_meta(get_the_ID(), 'header_link_color', true);
            $header_link_hover_color = get_post_meta(get_the_ID(), 'header_link_hover_color', true);
            $css = '';
            if (isset($header_bg) && $header_bg != '') {
                $css = "
                .site header.site-header, .header-06:before{
                    background-color: {$header_bg} !important
                }";
            }
            if (isset($header_bg_image) && $header_bg_image != '') {
                $css .= "
                .site header.site-header{
                    background-image: url({$header_bg_image});
                }";
            }
            /* Header Text color */
            if (isset($header_text_color) && $header_text_color != '') {
                $css .= "
                @media(min-width: 992px){
                    header .lang{
                        color: {$header_text_color} ;
                    }
                }
				";
            }
            /* Menu color */
            if (isset($header_menu_color) && $header_menu_color != '') {
                $css .= "
                @media(min-width: 992px){
                    header .mega-menu > li > a{
                        color: {$header_menu_color} !important;
                    }
                }
				";
            }
            /* Menu hover*/
            if (isset($header_menu_color_hover) && $header_menu_color_hover != '') {
                $css .= "
                @media(min-width: 992px){
                    header .mega-menu > li > a:hover{
                        color: {$header_menu_color_hover} !important;
                    }
                }
				";
            }
			if (isset($header_link_color) && $header_link_color != '') {
                $css .= "
                .site header a,
                .content-topbar a{
                    color: {$header_link_color};
                }";
            }
			if (isset($header_link_hover_color) && $header_link_hover_color != '') {
                $css .= "
                .site header a:hover,
                .content-topbar a:hover{
                    color: {$header_link_hover_color};
                }";
            }
            if (isset($header_icon_color) && $header_icon_color != '') {
                $css .= "
                @media(min-width: 992px){
                   header .cart-header, 
                   header .account-header a,
                   header .header-contact i, 
                   header .favorite a, 
                   header .search-header{
                        color: {$header_icon_color} !important;
                   }
                }";
            }
            return $css;
        }

        function footer(){
            $footer_bg = arangi_get_meta_value('footer_bg');
            $css = '';
            if ( $footer_bg != '' ) {
                $css = "
               .footer-01,.footer-02,.footer-03{
                    background-color: {$footer_bg}!important;
                }";
            }
			$footer_bg_image = arangi_get_meta_value('footer_bg_image');
            if ( $footer_bg_image != '' ) {
                $css .= "
                 .footer-01,.footer-02,.footer-03{
                    background-image: url($footer_bg_image) !important;
                    background-repeat: repeat !important;
                }";
            }
			$footer_text_color = arangi_get_meta_value('footer_text_color');
            if ( $footer_text_color != '' ) {
                $css .= "
                .footer-01,
                .footer-01 .list-info-contact li span,
                .footer-01 .list-info-contact li span,
                .footer-02,
                .footer-02 .textwidget p,
                .footer-02 .list-info-footer li a,
                .footer-02 .widget_nav_menu li a,
                .footer-02 .list-info-contact li a,
                .footer-02 .list-info-contact li,
                .footer-02 .list-info-contact li p,
                .footer-02 .copyright-content p,
                .footer-02 .payment ul li a,
                .footer-03, 
                .footer-03 .widget_nav_menu ul li a, 
                .footer-03 .footer-social ul li a, 
                .footer-03 .copyright-content p, 
                .footer-03 .copyright-content p a, 
                .footer-03 .list-info-contact li a{
                    color: {$footer_text_color} !important;
                }";
            }
			$footer_link_color = arangi_get_meta_value('footer_link_color');
            if ( $footer_link_color != '' ) {
                $css .= "
                .footer-01 .widget_nav_menu li a,
                .footer-01 .copyright-content p,
                .footer-01 .copyright-content p a,
                .footer-01 .payment ul li a,
                .footer-01 .list-info-contact li,
                .footer-01 .list-info-contact li p,
                .footer-02 .list-info-contact li i {
                    color: {$footer_link_color} !important;
                }";
            }
			$footer_link_hover_color = arangi_get_meta_value('footer_link_hover_color');
            if ( $footer_link_hover_color != '' ) {
                $css .= "
                .widget_categories li a:hover:before, 
                .widget_nav_menu li a:hover:before, 
                .widget_pages li a:hover:before,
                .footer-01 .widget_nav_menu li a:hover,
                .footer-01 .copyright-content p a:hover,
                .footer-01 .payment ul li a:hover,
                .footer-02 .list-info-footer li a:hover,
                .footer-02 .widget_nav_menu li a:hover,
                .footer-02 .payment ul li a:hover,
                .footer-02 .list-info-contact li a:hover,
                .footer-03 .widget_nav_menu li a:hover,
                .footer-03 .list-info-contact li a:hover, 
                .footer-03 .payment ul li a:hover{
                    color: {$footer_link_hover_color} !important;
                }
                .widget_categories li a:hover:before, .widget_nav_menu li a:hover:before, .widget_pages li a:hover:before{
                    background: {$footer_link_hover_color} !important;
                }
                ";

            }
			$footer_tt_color = arangi_get_meta_value('footer_tt_color');
            if ( $footer_tt_color != '' ) {
                $css .= "
                .footer-01 .widget-title,
                .footer-02 .widget-title,
                .footer-03 .widget-title,
                .footer-03 .list-info-contact li span {
                    color: {$footer_tt_color} !important;
                }";
            }
			$footer_background_bottom = arangi_get_meta_value('footer_background_bottom');
            if ( $footer_background_bottom != '' ) {
                $css .= "
                .footer-01 .footer-bottom,
                .footer-02 .footer-bottom,
                .footer-03 .footer-bottom{
                    background-color: {$footer_background_bottom}!important;
                }";
            }
            $footer_border_bottom = arangi_get_meta_value('footer_border_bottom');
            if ( $footer_border_bottom != '' ) {
                $css .= "
                .footer-02 .bottom-footer:before,
                .footer-03 .bottom-footer:before{
                    background-color: {$footer_border_bottom}!important;
                }";
            }
            return $css;
        }
         function site_width(){
            $site_width = arangi_get_meta_value('site_width');
            $css = '';
            if ( $site_width != '' ) {
                $css = "
                 @media (min-width: 1200px){
                    .site-width > .wrapper > .container,
                    .elementor-inner .elementor-section.elementor-section-boxed>.elementor-container{
                        max-width: {$site_width};
                    }
                }";
            }
            return $css;
        }
         function remove_space_top(){
            $remove_space_top = arangi_get_meta_value('remove_space_top');
            $css = '';
            if ( $remove_space_top != '' ) {
                $css = "
                .remove_space_top .side-breadcrumb{
                    margin-bottom: 0 !important;
                }
                .remove_space_top .site-header+.wrapper{
                    padding-top: 0 !important;
                }";
            }
            return $css;
        }
         function remove_space_bottom(){
            $remove_space_bottom = arangi_get_meta_value('remove_space_bottom');
            $css = '';
            if ( $remove_space_bottom != '' ) {
                $css = "
               .remove_space_bottom .page-footer,
               .remove_space_bottom  + .page-footer,
               .remove_space_bottom + .wrapper + .page-footer{
                    margin-top: 0 !important;
                }
                ";
            }
            return $css;
        }
        function coming_soon_css(){
            $cm_gradient_second_color = Arangi::setting('cm_gradient_second_color');
            $cm_gradient_color = Arangi::setting('cm_gradient_color');
            $css = '';
            if ( $cm_gradient_color !== '' &&  $cm_gradient_second_color !==''){
                $css ="
                 .page-coming-soon .coming-soon h1{
                    background: -webkit-gradient(linear, left top, left bottom, from($cm_gradient_color), to($cm_gradient_second_color));
                        -webkit-background-clip: text;
                        -webkit-text-fill-color: transparent;
                 }
                ";
            }
            return $css;
        }
        function error_404_css(){

            $btn_404_gradient_color = Arangi::setting('btn_404_gradient_color');
            $btn_404_gradient_second_color = Arangi::setting('btn_404_gradient_second_color');

            $css = '';
            if ( $btn_404_gradient_color !== '' &&  $btn_404_gradient_second_color !==''){
                $css ="
                 .page-404 .go-home{
                    background-image: linear-gradient($btn_404_gradient_color, $btn_404_gradient_second_color);
                 }
                 .page-404 .go-home:hover{
                    background-image: linear-gradient($btn_404_gradient_second_color, $btn_404_gradient_color);
                 }
                ";
            }

            return $css;
        }
    }
    new Arangi_Custom_Style();
}