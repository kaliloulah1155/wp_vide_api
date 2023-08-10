<?php
// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Helper functions
 */
class Arangi_Helper {
	public static function get_post_meta( $name, $default = false ) {
		global $arangi_page_options;
		if ( $arangi_page_options != false && isset( $arangi_page_options[ $name ] ) ) {
			return $arangi_page_options[ $name ];
		}
		return $default;
	}
	public static function get_the_post_meta( $options, $name, $default = false ) {
		if ( $options != false && isset( $options[ $name ] ) ) {
			return $options[ $name ];
		}
		return $default;
	}
	/**
	 * @param bool $default_option
	 *
	 * @return array
	 */
	public static function get_registered_sidebars( $default_option = false, $empty_option = true ) {
		global $wp_registered_sidebars;
		$sidebars = array();
		if ( $default_option == true ) {
			$sidebars['default'] = esc_html__( 'Default Sidebar', 'arangi' );
		}
		if ( $empty_option == true ) {
			$sidebars['none'] = esc_html__( 'No Sidebar', 'arangi' );
		}
		foreach ( $wp_registered_sidebars as $sidebar ) {
			$sidebars[ $sidebar['id'] ] = $sidebar['name'];
		}
		return $sidebars;
	}
	/**
	 * Get content of file
	 *
	 * @param string $path
	 *
	 * @return mixed
	 */
	static function get_file_contents( $path = '' ) {
		$content = '';
		if ( $path !== '' ) {
			global $wp_filesystem;
			Arangi::require_file( ABSPATH . '/wp-admin/includes/file.php' );
			WP_Filesystem();
			if ( file_exists( $path ) ) {
				$content = $wp_filesystem->get_contents( $path );
			}
		}
		return $content;
	}
	/**
	 * Get size information for all currently-registered image sizes.
	 *
	 * @global $_wp_additional_image_sizes
	 * @uses   get_intermediate_image_sizes()
	 * @return array $sizes Data for all currently-registered image sizes.
	 */
	public static function get_image_sizes() {
		global $_wp_additional_image_sizes;
		$sizes = array( 'full' => 'full' );
		foreach ( get_intermediate_image_sizes() as $_size ) {
			if ( in_array( $_size, array( 'thumbnail', 'medium', 'medium_large', 'large' ) ) ) {
				$_size_w                               = get_option( "{$_size}_size_w" );
				$_size_h                               = get_option( "{$_size}_size_h" );
				$sizes["$_size {$_size_w}x{$_size_h}"] = $_size;
			} elseif ( isset( $_wp_additional_image_sizes[ $_size ] ) ) {
				$sizes["$_size {$_wp_additional_image_sizes[ $_size ]['width']}x{$_wp_additional_image_sizes[ $_size ]['height']}"] = $_size;
			}
		}

		return $sizes;
	}
	public static function arangi_resize( $args = array() ) { 
		// $defaults = array(
		// 	'url'     => '',
		// 	'width'   => null,
		// 	'height'  => null,
		// 	'crop'    => true,
		// 	'single'  => true,
		// 	'upscale' => false,
		// 	'echo'    => false,
		// );
		// $args  = wp_parse_args( $args, $defaults );
		// $image = arangi_resize( $args['url'], $args['width'], $args['height'], $args['crop'], $args['single'], $args['upscale'] );
		// if ( $image === false ) {
		// 	$image = $args['url'];
		// }
		return '';
	}
	public static function get_animation_list( $args = array() ) {
		return array(
			'none'             	=> esc_html__( 'None', 'arangi' ),
			'fadeIn'          	=> esc_html__( 'Fade In', 'arangi' ),
			'fadeInUp'          => esc_html__( 'Fade In Up', 'arangi' ),
			'fadeInDown'        => esc_html__( 'Fade In Down', 'arangi' ),
			'fadeInLeft'        => esc_html__( 'Fade In Left', 'arangi' ),
			'fadeInRight'       => esc_html__( 'Fade In Right', 'arangi' ),
			'pulse'         	=> esc_html__( 'Pulse', 'arangi' ),
			'lightSpeedIn' 		=> esc_html__( 'LightSpeedIn', 'arangi' ),
			'zoomIn'            => esc_html__( 'Zoom In', 'arangi' ),
			'zoomInDown'        => esc_html__( 'Zoom In Down ', 'arangi' ),
			'zoomInLeft'        => esc_html__( 'Zoom In Left', 'arangi' ),
			'zoomInRight'       => esc_html__( 'Zoom In Right', 'arangi' ),
		);
	}
	public static function get_animation_classes( $animation ) {
		$classes = '';
		$animation_enable = Arangi::setting( 'setting_animation' );
		if ( isset( $animation ) && $animation !== '' && $animation !== 'none' ) {
			if ($animation_enable === '1'){
				$classes .= "wow $animation";
			} else {
				$classes .= "";
			}
		}

		return $classes;
	}

	public static function get_header_list( $default_option = false ) {

		$headers = array(
			'none' => esc_html__( 'Hide', 'arangi' ),
			'01'   => esc_html__( 'Header 1', 'arangi' ),
			'02'   => esc_html__( 'Header 2', 'arangi' ),
			'03'   => esc_html__( 'Header 3', 'arangi' ),
			'04'   => esc_html__( 'Header 4', 'arangi' ),
			'05'   => esc_html__( 'Header 5', 'arangi' ),
			'06'   => esc_html__( 'Header 6', 'arangi' ),
		);

		if ( $default_option === true ) {
			$headers = array( '' => esc_html__( 'Default', 'arangi' ) ) + $headers;
		}

		return $headers;
	}
	
	public static function get_footer_list( $default_option = false ) {

		$footers = array(
			'none' => esc_html__( 'Hide', 'arangi' ),
			'01'   => esc_html__( 'Footer 1', 'arangi' ),
			'02'   => esc_html__( 'Footer 2', 'arangi' ),
			'03'   => esc_html__( 'Footer 3', 'arangi' ),
			'04'   => esc_html__( 'Footer 4', 'arangi' ),
		);

		if ( $default_option === true ) {
			$footers = array( '' => esc_html__( 'Default', 'arangi' ) ) + $footers;
		}

		return $footers;
	}
	
	public static function get_header_button_style_list( $default_option = false ) {
		return array(
			'outline'            => esc_html__( 'Outline', 'arangi' ),
			'flat'               => esc_html__( 'Flat', 'arangi' ),
			'flat-white-alt'     => esc_html__( 'Flat White Alt', 'arangi' ),
			'flat-black-alpha'   => esc_html__( 'Black Flat Alpha', 'arangi' ),
			'flat-black-alpha-2' => esc_html__( 'Black Flat Alpha 2', 'arangi' ),
			'flat-black-alpha-3' => esc_html__( 'Black Flat Alpha 3', 'arangi' ),
		);
	}
    public static function get_coming_soon_demo_date() {
        $date = date( 'm/d/Y', strtotime( '+2 months', strtotime( date( 'Y/m/d' ) ) ) );

        return $date;
    }

    public static function the_date( $date_string ) {
		$date_format = get_option( 'date_format' );
		echo date( $date_format, strtotime( $date_string ) );
	}
	/**
	 * Get all menu
	 */
	public static function get_all_menus() {
		$args = array(
			'hide_empty' => true,
		);
		$menus   = get_terms( 'nav_menu', $args );
		$results = array();
		foreach ( $menus as $key => $menu ) {
			$results[ $menu->slug ] = $menu->name;
		}
		$results[''] = esc_html__( 'Default Menu', 'arangi' );
		return $results;
	}
	public static function w3c_iframe( $iframe ) {
		$iframe = str_replace( 'frameborder="0"', '', $iframe );
		$iframe = str_replace( 'frameborder="no"', '', $iframe );
		$iframe = str_replace( 'scrolling="no"', '', $iframe );
		$iframe = str_replace( 'gesture="media"', '', $iframe );
		$iframe = str_replace( 'allow="encrypted-media"', '', $iframe );
		$iframe = str_replace( 'allowfullscreen', '', $iframe );

		return $iframe;
	}
}
