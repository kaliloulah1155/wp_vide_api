<?php
// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}
/**
 * Initialize Global Variables
 */
if ( ! class_exists( 'Arangi_Global' ) ) {
    class Arangi_Global {
        protected static $instance = null;
        protected static $header_type = '01';
        protected static $footer_type = '01';
        public $has_sidebar = false;
        public $has_both_sidebar = false;
        public $wishlist_tooltip_position = 'left';
        function __construct() {
            add_action( 'wp', array( $this, 'init_global_variable' ) );
        }
        public static function instance() {
            if ( null === self::$instance ) {
                self::$instance = new self();
            }
            return self::$instance;
        }
        function init_global_variable() {
            global $arangi_page_options;
            if ( is_singular( 'portfolio' ) ) {
                $arangi_page_options = unserialize( get_post_meta( get_the_ID(), 'apr_portfolio_options', true ) );
            } elseif ( is_singular( 'post' ) ) {
                $arangi_page_options = unserialize( get_post_meta( get_the_ID(), 'apr_post_options', true ) );
            } elseif ( is_singular( 'page' ) ) {
                $arangi_page_options = unserialize( get_post_meta( get_the_ID(), 'apr_page_options', true ) );
            } elseif ( is_singular( 'product' ) ) {
                $arangi_page_options = unserialize( get_post_meta( get_the_ID(), 'apr_product_options', true ) );
            }
            if ( function_exists( 'is_shop' ) && is_shop() ) {
                // Get page id of shop.
                $page_id              = wc_get_page_id( 'shop' );
                $arangi_page_options = unserialize( get_post_meta( $page_id, 'apr_page_options', true ) );
            }
            $this->set_header_type();
            $this->set_footer_type();
        }
		public static function set_header_type() {
			$result = '';
			global $wp_query, $header_type;
			if (empty($header_type)) {
				$result = Arangi::setting('global_header');
				if (is_category()) {
					$cat = $wp_query->get_queried_object();
					$cat_layout = get_metadata('category', $cat->term_id, 'header_type', true);
                    if (!empty($cat_layout) && $cat_layout != 'default') {
							$result = $cat_layout;
						}
				}elseif (is_tax('product_cat')) {
					$cat = $wp_query->get_queried_object();
					$cat_layout = get_metadata('product_cat', $cat->term_id, 'header_type', true);
                    if (!empty($cat_layout) && $cat_layout != 'default') {
                        $result = $cat_layout;
                    }
				}elseif (is_archive()) {
					if (function_exists('is_shop') && is_shop()) {
						$shop_layout = get_post_meta(wc_get_page_id('shop'), 'header_type', true);
						if(!empty($shop_layout) && $shop_layout != 'default') {
							$result = $shop_layout;
						}
					} 
				}else {
                    $header_layout_page = arangi_get_meta_value('header_type', false);
                    if($header_layout_page && $header_layout_page != 'default'){
                        $result = $header_layout_page;
                    }else{
                        $result = $result;
                    }
				}
				$header_type = $result;
			}
			return $header_type;
		}
        function get_header_type() {
            return self::$header_type;
        }
        function set_footer_type() {
			$result = '';
			global $wp_query, $footer_type;
			if (empty($footer_type)) {
				$result = Arangi::setting('global_footer');
				if (is_category()) {
					$cat = $wp_query->get_queried_object();
					$cat_layout = get_metadata('category', $cat->term_id, 'footer_type', true);
					if (!empty($cat_layout) && $cat_layout != 'default') {
							$result = $cat_layout;
						}
				}else if (is_tax('product_cat')) {
					$cat = $wp_query->get_queried_object();
					$cat_layout = get_metadata('product_cat', $cat->term_id, 'footer_type', true);
                    if (!empty($cat_layout) && $cat_layout != 'default') {
                        $result = $cat_layout;
                    }
				}else if (is_archive()) {
					if (function_exists('is_shop') && is_shop()) {
						$shop_layout = get_post_meta(wc_get_page_id('shop'), 'footer_type', true);
						if(!empty($shop_layout) && $shop_layout != 'default') {
							$result = $shop_layout;
						}
					} 
				}else {
                    $footer_layout_page = arangi_get_meta_value('footer_type', false);
                    if($footer_layout_page && $footer_layout_page != 'default'){
                        $result = $footer_layout_page;
                    }else{
                        $result = $result;
                    }
				}
				$footer_type = $result;
			}
			return $footer_type;
		}
        function get_footer_type() {
            return self::$footer_type;
        }
        public static function is_blog () {
            global  $post;
            $posttype = get_post_type($post );
            return ( ((is_archive()) || (is_author()) || (is_category()) || (is_home()) || (is_single()) || (is_tag())) && ( $posttype == 'post')  ) ? true : false ;
        }
        public static function is_shop () {
             return ( is_post_type_archive( 'product' ) );
        }
        public static function check_container_type () {
            $layout_site = Arangi::setting( 'layout_site' );
            $blog_layout = Arangi::setting( 'blog_general_layout' );
            $member_layout = Arangi::setting( 'member_layout' );
            $service_layout = Arangi::setting( 'service_layout' );
            $portfolio_layout = Arangi::setting( 'portfolio_layout' );
            $shop_layout = Arangi::setting( 'shop_layout' );
            $single_shop_layout = Arangi::setting( 'single_layout' );
            if (is_404()){
                $container ='container-fluid';
            }elseif (self::is_blog()){
                if ($blog_layout === 'wide'){
                    $container ='container-fluid';
                }elseif ($blog_layout === 'full_width'){
                    $container ='container';
                }else{
                    $container ='container-fluid';
                }
            }elseif ( 'member' == get_post_type()){
                if ($member_layout === 'wide'){
                    $container ='container-fluid';
                }elseif ($member_layout === 'full_width'){
                    $container ='container';
                }else{
                    $container ='container-fluid';
                }
            }elseif ( 'service' == get_post_type()){
                if ($service_layout === 'wide'){
                    $container ='container-fluid';
                }elseif ($service_layout === 'full_width'){
                    $container ='container';
                }else{
                    $container ='container-fluid';
                }
            }elseif ( 'portfolio' == get_post_type()){
                if ($portfolio_layout === 'wide'){
                    $container ='container-fluid';
                }elseif ($portfolio_layout === 'full_width'){
                    $container ='container';
                }else{
                    $container ='container-fluid';
                }
            }elseif (class_exists('WooCommerce') && is_product()){
                if ($single_shop_layout === 'wide'){
                    $container ='container-fluid';
                }elseif ($single_shop_layout === 'full_width'){
                    $container ='container';
                }else{
                    $container ='container-fluid boxed';
                }
            }elseif ( 'product' == get_post_type()){
                if ($shop_layout === 'wide'){
                    $container ='container-fluid';
                }elseif ($shop_layout === 'full_width'){
                    $container ='container';
                }else{
                    $container ='container-fluid boxed';
                }
            }else{
                if ($layout_site === 'wide'){
                    $container ='container-fluid';
                }elseif ($layout_site === 'full_width'){
                    $container ='container';
                }else {
                    $container = 'container-fluid';
                }
            }
            return $container;
        }
        public static function check_layout_type () {
            $layout_site = Arangi::setting( 'layout_site' );
            $blog_layout = Arangi::setting( 'blog_general_layout' );
            $member_layout = Arangi::setting( 'member_layout' );
            $service_layout = Arangi::setting( 'service_layout' );
            $portfolio_layout = Arangi::setting( 'portfolio_layout' );
            $layout_width = Arangi::setting( 'layout_width' );
			$shop_layout = Arangi::setting( 'shop_layout' );
            $single_shop_layout = Arangi::setting( 'single_layout' );
            if (is_404()){
                $page_layout= 'wide';
            }elseif (self::is_blog()){
                if ($blog_layout === 'wide'){
                    $page_layout= 'wide';
                }elseif ($blog_layout === 'full_width'){
                    $page_layout= 'full';
                }else{
                    $page_layout= 'boxed';
                }
            }elseif ( 'member' == get_post_type()){
                if ($member_layout === 'wide'){
                    $page_layout= 'wide';
                }elseif ($member_layout === 'full_width'){
                    $page_layout= 'full';
                }else{
                    $page_layout= 'boxed';
                }
            }elseif ( 'portfolio' == get_post_type()){
                if ($portfolio_layout === 'wide'){
                    $page_layout= 'wide';
                }elseif ($portfolio_layout === 'full_width'){
                    $page_layout= 'full';
                }else{
                    $page_layout= 'boxed';
                }
            }elseif ( 'service' == get_post_type()){
                if ($service_layout === 'wide'){
                    $page_layout= 'wide';
                }elseif ($service_layout === 'full_width'){
                    $page_layout= 'full';
                }else{
                    $page_layout= 'boxed';
                }
            }elseif (class_exists('WooCommerce') && is_product()){
                if ($single_shop_layout === 'wide'){
                    $page_layout ='wide';
                }elseif ($single_shop_layout === 'full_width'){
                    $page_layout ='full';
                }else{
                    $page_layout ='boxed';
                }
            }elseif ( 'product' == get_post_type()){
                if ($shop_layout === 'wide'){
                    $page_layout ='wide';
                }elseif ($shop_layout === 'full_width'){
                    $page_layout ='full';
                }else{
					$page_layout ='boxed';
				}
            }else{
                if ($layout_site === 'wide'){
                    $page_layout= 'wide';
                }elseif ($layout_site === 'full_width'){
                    $page_layout= 'full';
                }else {
                    $page_layout= 'boxed';
                }
            }
            return $page_layout;
        }
        public static function get_left_sidebar(){
            $arangi_left_sidebar = get_post_meta(get_the_ID(), 'left_sidebar', true);
            if (!is_404()){
                if (self::is_blog()){
                    if (is_category()){                            
                        $arangi_left_sidebar_cat = arangi_get_meta_value('left_sidebar', false);
                        if( $arangi_left_sidebar_cat != 'default' && $arangi_left_sidebar_cat !== 'none' && $arangi_left_sidebar !== ''){
                            $sidebar_left = $arangi_left_sidebar_cat;
                        }elseif($arangi_left_sidebar_cat === 'none'){
							$sidebar_left = 'none';
						}else {
                            $sidebar_left = Arangi::setting('blog_sidebar_left');
                        } 
                    } else{
                        if (self::is_blog() || is_tax()){
                            if( $arangi_left_sidebar != 'default' && $arangi_left_sidebar !== 'none' && $arangi_left_sidebar !== ''){
                                $sidebar_left = $arangi_left_sidebar;
                            }else{ 
                                $sidebar_left = Arangi::setting('blog_sidebar_left');
                            }
                        }
                    }
                }elseif (is_tax('product_cat')){                            
                    $arangi_left_sidebar_product = arangi_get_meta_value('product_left_sidebar');
                    if($arangi_left_sidebar_product !== 'default' && $arangi_left_sidebar_product !== 'none' && $arangi_left_sidebar !== ''){
                        $sidebar_left = $arangi_left_sidebar_product;
                    }elseif($arangi_left_sidebar_product === 'none'){
						$sidebar_left = 'none';
					}else {
                        $sidebar_left = Arangi::setting('shop_sidebar_left');
                    } 
                }elseif (self::is_shop() || (is_tax() && class_exists('WooCommerce'))){
                    $sidebar_left = Arangi::setting('shop_sidebar_left');
                }elseif (is_singular('product')){    
                    if($arangi_left_sidebar !== 'default' && $arangi_left_sidebar !== 'none' && $arangi_left_sidebar !== ''){
                        $sidebar_left = $arangi_left_sidebar;
                    }elseif($arangi_left_sidebar === 'none'){
						$sidebar_left = 'none';
					}else {
                        $sidebar_left = Arangi::setting('single_sidebar_left');
                    } 
                }else {
                    if( $arangi_left_sidebar != 'default' && $arangi_left_sidebar !== 'none' && $arangi_left_sidebar !== ''){
                        $sidebar_left = $arangi_left_sidebar;
                    }elseif($arangi_left_sidebar === 'none'){
                        $sidebar_left = 'none';
                    }else{
                        $sidebar_left = Arangi::setting('general_left_sidebar');
                    }
                }

            }
            return $sidebar_left;
        }
        public static function get_right_sidebar(){
            $arangi_right_sidebar = get_post_meta(get_the_ID(), 'right_sidebar', true);
            if (!is_404()){
                if (self::is_blog()){
                    if (is_category()){                            
                        $arangi_right_sidebar_cat = arangi_get_meta_value('right_sidebar', false);
                        if($arangi_right_sidebar_cat != 'default' && $arangi_right_sidebar_cat !== 'none' && $arangi_right_sidebar !== ''){
                            $sidebar_right = $arangi_right_sidebar_cat;
                        }elseif($arangi_right_sidebar_cat === 'none'){
							$sidebar_right = 'none';
						}else {
                            $sidebar_right = Arangi::setting('blog_sidebar_right');
                        }
                    } else{
                        if (self::is_blog() || is_tax()){
                            if( $arangi_right_sidebar != 'default' && $arangi_right_sidebar !== 'none' && $arangi_right_sidebar !== ''){
                                $sidebar_right = $arangi_right_sidebar;
                            }else{ 
                                $sidebar_right = Arangi::setting('blog_sidebar_right');
                            }
                        }
                    }
                }elseif (is_tax('product_cat')){                            
                    $arangi_right_sidebar_product = arangi_get_meta_value('product_right_sidebar');
                    if($arangi_right_sidebar_product !== 'default' && $arangi_right_sidebar_product !== 'none' && $arangi_right_sidebar !== ''){
                        $sidebar_right = $arangi_right_sidebar_product;
                    }elseif($arangi_right_sidebar_product === 'none'){
						$sidebar_right = 'none';
					}else {
                        $sidebar_right = Arangi::setting('shop_sidebar_right');
                    } 
                }elseif (self::is_shop() || (is_tax() && class_exists('WooCommerce'))){
                    $sidebar_right = Arangi::setting('shop_sidebar_right');
                }elseif (is_singular('product')){    
                    if($arangi_right_sidebar !== 'default' && $arangi_right_sidebar !== 'none' && $arangi_right_sidebar !== ''){
                        $sidebar_right = $arangi_right_sidebar;
                    }elseif($arangi_right_sidebar === 'none'){
						$sidebar_right = 'none';
					}else {
                        $sidebar_right = Arangi::setting('single_sidebar_right');
                    } 
                } else{
                    if( ($arangi_right_sidebar !== 'default') && ($arangi_right_sidebar !== 'none') && $arangi_right_sidebar !== ''){
                        $sidebar_right = $arangi_right_sidebar;
                    }elseif($arangi_right_sidebar === 'none'){
                        $sidebar_right = 'none';
                    }else{ 
                        $sidebar_right = Arangi::setting('general_right_sidebar');
                    }
                }
            }
            return $sidebar_right;
        }
        public static function get_page_sidebar(){
            $page_sidebar1 = self::get_left_sidebar();
            $page_sidebar2 = self::get_right_sidebar();
            if (!is_404() || is_page_template('coming-soon.php')){
                if ( $page_sidebar1  !== 'none' && $page_sidebar1  !== '' && $page_sidebar2 !== 'none' && $page_sidebar2  !== '' && is_active_sidebar($page_sidebar1)) {
                    $cols = 'col-xl-6 col-lg-6 col-md-12 col-sm-12 main-sidebar has-sidebar';
                } elseif (($page_sidebar1  !== 'none' && $page_sidebar1  !== '' && is_active_sidebar($page_sidebar1)) || ($page_sidebar2 !== 'none'&& $page_sidebar2 !== '')){
                    $cols = 'col-xl-9 col-lg-9 col-md-12 col-sm-12 main-sidebar has-sidebar';
                }else {
                    $cols = 'col-xl-12 col-lg-12 col-md-12 col-sm-12 main-sidebar';
                }
                return $cols;
            }
        }
    }
    global $arangi_vars;
    $arangi_vars = new Arangi_Global();
}