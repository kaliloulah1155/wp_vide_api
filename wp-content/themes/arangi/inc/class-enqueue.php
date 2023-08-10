<?php
// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
if ( ! class_exists( 'Arangi_Enqueue' ) ) {
	class Arangi_Enqueue {
		protected static $instance = null;
		public function __construct() {
			add_action('after_setup_theme', array($this,'setup'));
			add_action('admin_enqueue_scripts', array($this,'admin_scripts_css'));
			add_action('wp_enqueue_scripts', array($this,'scripts_js',));
			add_filter('tiny_mce_before_init', array( $this, 'override_mce_options'));
			add_action( 'wp_enqueue_scripts', array( $this, 'dequeue_woocommerce_styles_scripts' ), 99 );
		}
		public function setup() {
			// Make theme available for translation.
			load_theme_textdomain('arangi', get_template_directory() . '/languages');
			// Theme editor style
			add_editor_style( array( 'style.css' ) );
			// Add theme support
			add_theme_support('automatic-feed-links');
			add_theme_support( 'title-tag' );
			/*
			 * Enable support for Post Formats.
			 *
			 * See: https://codex.wordpress.org/Post_Formats
			 */
			add_theme_support( 'post-formats', array(
				'image', 'video', 'audio', 'quote', 'link', 'gallery'
			) );
			// register menu locations
			register_nav_menus( array(
				'primary' => esc_html__('Primary Menu', 'arangi'),
			));
			// register menu locations
			register_nav_menus( array(
				'menu-mobile' => esc_html__('Menu Mobile', 'arangi'),
			));
			// Enable custom background image option
			add_theme_support( 'custom-background' );
		}
		function dequeue_woocommerce_styles_scripts() {
			// Remove prettyPhoto, default light box of woocommerce.
			wp_dequeue_script( 'prettyPhoto' );
			wp_dequeue_script( 'prettyPhoto-init' );
			wp_dequeue_style( 'woocommerce_prettyPhoto_css' );

			// Remove font awesome from Yith Wishlist plugin.
			wp_dequeue_style( 'yith-wcwl-font-awesome' );
		}

		public static function instance() {
			if ( null === self::$instance ) {
				self::$instance = new self();
			}

			return self::$instance;
		}
		public function admin_scripts_css() {
			// Register & enqueue admin script
			wp_enqueue_media();
			wp_enqueue_style( 'wp-color-picker');
			wp_enqueue_script( 'wp-color-picker');
			wp_register_script('arangi-admin-js', ARANGI_JS . '/un-minify/admin.js', array('common', 'jquery', 'media-upload', 'thickbox'), ARANGI_THEME_VERSION, true);
			wp_enqueue_script('arangi-admin-js');

		}
		function arangi_fonts_url() {
			$font_url                = '';
			$fonts                   = array();
			$subsets                 = 'latin,latin-ext';
			$arangi_breadcrumbs_font = get_post_meta( get_the_ID(), 'breadcrumbs_font', true );
			/*
			Translators: If there are characters in your language that are not supported
			by chosen font(s), translate this to 'off'. Do not translate into your own language.
			 */
			if ( 'off' !== _x( 'on', 'Google font: on or off', 'arangi' ) ) {
				$fonts[] = 'Domine' . ':300,400,500,600,700,800,900';
				$fonts[] = 'Raleway' . ':300,400,500,600,700,800,900';
				$fonts[] = 'Sail';
			}
			/*
			 * Translators: To add an additional character subset specific to your language,
			 * translate this to 'greek', 'cyrillic', 'devanagari' or 'vietnamese'. Do not translate into your own language.
			 */
			$subset = _x( 'no-subset', 'Add new subset (greek, cyrillic, devanagari, vietnamese)', 'arangi' );
			if ( 'cyrillic' == $subset ) {
				$subsets .= ',cyrillic,cyrillic-ext';
			} elseif ( 'greek' == $subset ) {
				$subsets .= ',greek,greek-ext';
			} elseif ( 'devanagari' == $subset ) {
				$subsets .= ',devanagari';
			} elseif ( 'vietnamese' == $subset ) {
				$subsets .= ',vietnamese';
			}
			if ( $fonts ) {
				$font_url = add_query_arg( array(
					'family' => urlencode( implode( '|', $fonts ) ),
					'subset' => urlencode( $subsets ),
				), '//fonts.googleapis.com/css' );
			}

			return esc_url_raw( $font_url );
		}
		public function scripts_js() {
			if ( ! is_admin() ) {
				global $wp_styles, $wp_query, $wp_scripts;
				$arangi_woo_enable = $arangi_preloader = $arangi_fancybox_enable = $arangi_rtl = $post_content = $arangi_slick_enable = $arangi_valid_form = $arangi_animation = $arangi_number_cate = '';
				$arangi_scripts    = array_map( 'basename', (array) wp_list_pluck( $wp_scripts->registered, 'src' ) );
				$arangi_suffix     = '.min';
				$arangi_srcs       = array_map( 'basename', (array) wp_list_pluck( $wp_styles->registered, 'src' ) );


				$arangi_sticky_menu        = Arangi::setting( 'header_sticky_enable' );
				$arangi_header_fix         = Arangi::setting( 'fixed_header' );
				$arangi_preloader          = Arangi::setting( 'preloader' );
				$arangi_metabox_header_fix = get_post_meta( get_the_ID(), 'fixed_header', true );
				if ( class_exists( 'WooCommerce' ) ) {
					$arangi_woo_enable = 'yes';
					$cat               = $wp_query->get_queried_object();
					if ( isset( $cat->term_id ) ) {
						$woo_cat = $cat->term_id;
					} else {
						$woo_cat = '';
					}
					$product_cate_number = get_metadata( 'product_cat', $woo_cat, 'product_cate_number', true );
					if ( $product_cate_number !== '' && is_tax( 'product_cat' ) ) {
						$arangi_number_cate = $product_cate_number;
					} else {
						$arangi_number_cate = Arangi::setting( 'number_cate' );
					}
				}
				if ( get_the_ID() != '' ) {
					$post         = get_post( get_the_ID() );
					$post_content = $post->post_content;
				}
				if ( isset( $arangi_preloader ) && $arangi_preloader ) {
					$arangi_preloader = 'yes';
				}
				$coming_subcribe_text  = Arangi::setting( 'coming_subcribe_text' );
				$coming_soon_countdown = Arangi::setting( 'coming_soon_countdown' );
				$single_product_prev   = Arangi::setting( 'single_product_prev' );
				$single_product_next   = Arangi::setting( 'single_product_next' );
				$single_per_limit      = Arangi::setting( 'per_limit' );
				$single_ajax_cart      = Arangi::setting( 'single_ajax_cart' );
				if ( is_singular() && get_option( 'thread_comments' ) ) {
					wp_enqueue_script( 'comment-reply' );
				}
				/* Register Script */
				wp_register_script( 'popper', get_template_directory_uri() . '/assets/js/popper' . esc_html( $arangi_suffix ) . '.js', array( 'jquery' ), ARANGI_THEME_VERSION, true );
				wp_register_script( 'bootstrap', get_template_directory_uri() . '/assets/js/bootstrap' . esc_html( $arangi_suffix ) . '.js', array( 'jquery' ), ARANGI_THEME_VERSION, true );
				wp_enqueue_script( 'isotope', get_template_directory_uri() . '/assets/js/isotope.pkgd' . esc_html( $arangi_suffix ) . '.js', array( 'jquery' ), ARANGI_THEME_VERSION, true );
				wp_register_script( 'fancybox', get_template_directory_uri() . '/assets/js/jquery.fancybox' . esc_html( $arangi_suffix ) . '.js', array( 'jquery' ), ARANGI_THEME_VERSION, true );
				wp_register_script( 'slick', get_template_directory_uri() . '/assets/js/slick' . esc_html( $arangi_suffix ) . '.js', array( 'jquery' ), ARANGI_THEME_VERSION, true );
				wp_register_script( 'validate', get_template_directory_uri() . '/assets/js/jquery.validate' . esc_html( $arangi_suffix ) . '.js', array( 'jquery' ), ARANGI_THEME_VERSION );
				wp_register_script( 'appear', get_template_directory_uri() . '/assets/js/un-minify/appear' . esc_html( $arangi_suffix ) . '.js', array( 'jquery' ), ARANGI_THEME_VERSION, true );
				wp_register_script( 'wow', get_template_directory_uri() . '/assets/js/wow' . esc_html( $arangi_suffix ) . '.js', array( 'jquery' ), ARANGI_THEME_VERSION, true );
				wp_register_script( 'arangi-scripts', get_template_directory_uri() . '/assets/js/un-minify/theme_function' . esc_html( $arangi_suffix ) . '.js', array( 'jquery' ), ARANGI_THEME_VERSION, true );
				wp_register_script( 'countdown-scripts', get_template_directory_uri() . '/assets/js/jquery.countdown' . esc_html( $arangi_suffix ) . '.js', array( 'jquery' ), ARANGI_THEME_VERSION, true );
				wp_register_script( 'cookie-scripts', get_template_directory_uri() . '/assets/js/js.cookie.js', array( 'jquery' ), ARANGI_THEME_VERSION, true );
				wp_register_script( 'slimscroll-scripts', get_template_directory_uri() . '/assets/js/jquery.slimscroll' . esc_html( $arangi_suffix ) . '.js', array( 'jquery' ), ARANGI_THEME_VERSION, true );
				wp_register_script( 'sticky-kit', get_template_directory_uri() . '/assets/js/sticky-kit' . esc_html( $arangi_suffix ) . '.js', array( 'jquery' ), ARANGI_THEME_VERSION, true );
				/* Register Styles*/
				wp_deregister_style( 'font-awesome' );
				wp_deregister_style( 'arangi-font' );
				wp_deregister_style( 'arangi-font-new' );
				wp_deregister_style( 'themify-icons' );
				wp_deregister_style( 'yith-wcwl-font-awesome' );
				wp_register_style( 'bootstrap', get_template_directory_uri() . '/assets/css/plugin/bootstrap' . esc_html( $arangi_suffix ) . '.css', array(), ARANGI_THEME_VERSION );
				wp_register_style( 'font-awesome', get_template_directory_uri() . '/assets/css/font-awesome' . esc_html( $arangi_suffix ) . '.css', array(), ARANGI_THEME_VERSION );
				wp_register_style( 'arangi-icon', get_template_directory_uri() . '/assets/css/arangi-font.css', array(), ARANGI_THEME_VERSION );
				wp_register_style( 'arangi-font-new', get_template_directory_uri() . '/assets/css/arangi-font-new.css', array(), ARANGI_THEME_VERSION );
				wp_register_style( 'themify-icons', get_template_directory_uri() . '/assets/css/themify-icons.css', array(), ARANGI_THEME_VERSION );
				wp_register_style( 'fancybox', get_template_directory_uri() . '/assets/css/jquery.fancybox' . esc_html( $arangi_suffix ) . '.css', array(), ARANGI_THEME_VERSION );
				wp_register_style( 'slick', get_template_directory_uri() . '/assets/css/plugin/slick' . esc_html( $arangi_suffix ) . '.css', array(), ARANGI_THEME_VERSION );
				wp_register_style( 'animate', get_template_directory_uri() . '/assets/css/animate' . esc_html( $arangi_suffix ) . '.css', array(), ARANGI_THEME_VERSION );
				wp_register_style( 'arangi-theme', get_template_directory_uri() . '/assets/css/theme.css', array(), ARANGI_THEME_VERSION );
				wp_deregister_style( 'arangi-style' );
				wp_register_style( 'arangi-style', get_template_directory_uri() . '/style.css' );

				if ( Arangi::setting( 'custom_css_enable' ) == 1 ) {
					wp_add_inline_style( 'arangi-style', html_entity_decode( Arangi::setting( 'custom_css' ), ENT_QUOTES ) );
				}
				if ( Arangi::setting( 'custom_js_enable' ) == 1 ) {
					wp_add_inline_script( 'arangi-scripts', html_entity_decode( Arangi::setting( 'custom_js' ) ) );
				}
				/* Enqueue Styles & Script */
				wp_enqueue_style( 'bootstrap' );
				wp_enqueue_script( 'popper' );
				wp_enqueue_script( 'bootstrap' );
				wp_enqueue_style( 'font-awesome' );
				wp_enqueue_style( 'arangi-icon' );
				wp_enqueue_style( 'arangi-font-new' );
				wp_enqueue_style( 'themify-icons' );
				if ( is_rtl() ) {
					wp_enqueue_style( 'arangi-theme-rtl', get_template_directory_uri() . '/assets/css/theme_rtl' . esc_html( $arangi_suffix ) . '.css', array(), ARANGI_THEME_VERSION, 999 );
				} else {
					wp_enqueue_style( 'arangi-theme', get_template_directory_uri() . '/assets/css/theme' . esc_html( $arangi_suffix ) . '.css', array(), ARANGI_THEME_VERSION, 999 );
				}

				wp_enqueue_script( 'wow' );
				wp_enqueue_style( 'arangi-fonts', $this->arangi_fonts_url(), array(), null );
				if ( get_the_ID() != '' ) {
					// Animation
					$arangi_animation = 'yes';
					wp_enqueue_script( 'appear' );
					wp_enqueue_style( 'animate' );
				}
				if ( post_type_supports( get_post_type(), 'comments' ) ) {
					if ( comments_open() ) {
						$arangi_valid_form = 'yes';
						wp_enqueue_script( 'validate' );
					}
				}

				wp_enqueue_script( 'fancybox' );
				wp_enqueue_style( 'fancybox' );
				$arangi_slick_enable = 'yes';
				wp_enqueue_script( 'slick' );
				wp_enqueue_style( 'slick' );

				wp_enqueue_script( 'jquery-ui-autocomplete' );
				wp_enqueue_style( 'arangi-style' );
				wp_enqueue_script( 'sticky-kit' );
				wp_enqueue_script( 'arangi-scripts' );
				wp_enqueue_script( 'countdown-scripts' );
				wp_enqueue_script( 'cookie-scripts' );
				wp_enqueue_script( 'slimscroll-scripts' );
				wp_localize_script( 'arangi-scripts', 'arangi_params', array(
					'ajax_url'                => esc_js( admin_url( 'admin-ajax.php' ) ),
					'ajax_loader_url'         => esc_js( str_replace( array( 'http:', 'https' ), array( '', '' ), ARANGI_CSS . '/assets/images/ajax-loader.gif' ) ),
					'ajax_cart_added_msg'     => esc_html__( 'A product has been added to cart.', 'arangi' ),
					'ajax_compare_added_msg'  => esc_html__( 'A product has been added to compare', 'arangi' ),
					'arangi_number_cate'      => esc_js( $arangi_number_cate ),
					'arangi_woo_enable'       => esc_js( $arangi_woo_enable ),
					'arangi_fancybox_enable'  => esc_js( $arangi_fancybox_enable ),
					'arangi_slick_enable'     => esc_js( $arangi_slick_enable ),
					'arangi_valid_form'       => esc_js( $arangi_valid_form ),
					'arangi_animation'        => esc_js( $arangi_animation ),
					'coming_subcribe_text'    => esc_js( $coming_subcribe_text ),
					'coming_soon_countdown'   => esc_js( $coming_soon_countdown ),
					'header_sticky'           => esc_js( $arangi_sticky_menu ),
					'header_fix'              => esc_js( $arangi_header_fix ),
					'header_fix_metabox'      => esc_js( $arangi_metabox_header_fix ),
					'arangi_preloader'        => esc_js( $arangi_preloader ),
					'single_product_prev'     => esc_js( $single_product_prev ),
					'single_product_next'     => esc_js( $single_product_next ),
					'single_per_limit'        => esc_js( $single_per_limit ),
					'single_ajax_cart'        => esc_js( $single_ajax_cart ),
					'arangi_rtl'              => esc_js( is_rtl() ? 'yes' : '' ),
					'arangi_search_no_result' => esc_js( __( 'Search no result', 'arangi' ) ),
					'arangi_like_text'        => esc_js( __( 'Like', 'arangi' ) ),
					'arangi_unlike_text'      => esc_js( __( 'Unlike', 'arangi' ) ),
					'request_error'           => esc_js( __( 'The requested content cannot be loaded.<br/>Please try again later.', 'arangi' ) ),
				) );
				wp_deregister_style( 'wpcr_font-awesome' );
			}
		}
		public function override_mce_options($initArray) {
			$opts = '*[*]';
			$initArray['valid_elements'] = $opts;
			$initArray['extended_valid_elements'] = $opts;
			return $initArray;
		}
	}
	new Arangi_Enqueue();
}
