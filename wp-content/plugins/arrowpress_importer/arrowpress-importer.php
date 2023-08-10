<?php
/**
* Plugin Name: ArrowPress Importer
* Description: ArrowPress One click demo import
* Version: 1.0.2
* Author: ArrowPress
* Author URI: http://arrowpress.net/
*/

// don't load directly
if (!defined('ABSPATH'))
    die('-1');


define('ARROWPRESS_IMPORTER_URL', plugin_dir_url(__FILE__));
// require_once( 'inc/functions.php' );
require_once( 'one-click-demo-import/one-click-demo-import.php' );


/** Enqueue admin style file for import page */
add_action('admin_enqueue_scripts', 'arrowpress_importer_enqueue');
function arrowpress_importer_enqueue() {
  	wp_enqueue_style('arrowpress_importer_style', plugin_dir_url(__FILE__) . 'assets/css/style.css');
}

/**
 * Import file setup
 */
if ( ! function_exists( 'arrowpress_importer_files' ) ) {
	function arrowpress_importer_files() {
		$demo_link = 'demo.arrowpress.net/arangi/';
	  	return array(
			array(
				'import_file_name'             => 'Base Content',
				'categories'                   => array( 'Base Content'),
				'local_import_file'            => plugin_dir_path( __FILE__ ) . 'data/content.xml',
				'local_import_widget_file'     => plugin_dir_path( __FILE__ ) . 'data/widget.wie',
				'local_import_customizer_file' => plugin_dir_path( __FILE__ ) . 'data/customizer.dat',
				'import_preview_image_url'     => trailingslashit( ARROWPRESS_IMPORTER_URL ) .'assets/images/base.jpg',
				'import_notice'                => __( 'Please waiting for a few minutes, do not close the window or refresh the page until the data is imported.', 'arrowpress_importer' ),
			),
			array(
				'import_file_name'             => 'Home 1',
				'categories'                 => array( 'Home Demos'),
				'import_preview_image_url'     => trailingslashit( ARROWPRESS_IMPORTER_URL ) .'assets/images/home1.jpg',
				'import_notice'                => __( 'Please waiting for a few minutes, do not close the window or refresh the page until the data is imported.', 'arrowpress_importer' ),
				'preview_url'                => $demo_link.'home-1',
			),
			array(
				'import_file_name'             => 'Home 2',
				'categories'                 => array( 'Home Demos'),
				'import_preview_image_url'     => trailingslashit( ARROWPRESS_IMPORTER_URL ) .'assets/images/home2.jpg',
				'import_notice'                => __( 'Please waiting for a few minutes, do not close the window or refresh the page until the data is imported.', 'arrowpress_importer' ),
				'preview_url'                => $demo_link.'home-2',
			),
			array(
				'import_file_name'             => 'Home 3',
				'categories'                 => array( 'Home Demos'),
				'import_preview_image_url'     => trailingslashit( ARROWPRESS_IMPORTER_URL ) .'assets/images/home3.jpg',
				'import_notice'                => __( 'Please waiting for a few minutes, do not close the window or refresh the page until the data is imported.', 'arrowpress_importer' ),
				'preview_url'                => $demo_link.'home-3',
			),
			array(
				'import_file_name'             => 'Home 4',
				'categories'                 => array( 'Home Demos'),
				'import_preview_image_url'     => trailingslashit( ARROWPRESS_IMPORTER_URL ) .'assets/images/home4.jpg',
				'import_notice'                => __( 'Please waiting for a few minutes, do not close the window or refresh the page until the data is imported.', 'arrowpress_importer' ),
				'preview_url'                => $demo_link.'organic-wine',
			),
			array(
				'import_file_name'             => 'Home 5',
				'categories'                 => array( 'Home Demos'),
				'import_preview_image_url'     => trailingslashit( ARROWPRESS_IMPORTER_URL ) .'assets/images/home5.jpg',
				'import_notice'                => __( 'Please waiting for a few minutes, do not close the window or refresh the page until the data is imported.', 'arrowpress_importer' ),
				'preview_url'                => $demo_link.'home-kids',
			),
			array(
				'import_file_name'             => 'Home 6',
				'categories'                 => array( 'Home Demos'),
				'import_preview_image_url'     => trailingslashit( ARROWPRESS_IMPORTER_URL ) .'assets/images/home6.jpg',
				'import_notice'                => __( 'Please waiting for a few minutes, do not close the window or refresh the page until the data is imported.', 'arrowpress_importer' ),
				'preview_url'                => $demo_link.'home-tea',
			),
			array(
				'import_file_name'             => 'Home 7',
				'categories'                 => array( 'Home Demos'),
				'import_preview_image_url'     => trailingslashit( ARROWPRESS_IMPORTER_URL ) .'assets/images/home7.jpg',
				'import_notice'                => __( 'Please waiting for a few minutes, do not close the window or refresh the page until the data is imported.', 'arrowpress_importer' ),
				'preview_url'                => $demo_link.'home-garden-safe',
			),
			array(
				'import_file_name'             => 'Home 8',
				'categories'                 => array( 'Home Demos'),
				'import_preview_image_url'     => trailingslashit( ARROWPRESS_IMPORTER_URL ) .'assets/images/home8.jpg',
				'import_notice'                => __( 'Please waiting for a few minutes, do not close the window or refresh the page until the data is imported.', 'arrowpress_importer' ),
				'preview_url'                => $demo_link.'food-farm',
			),
			array(
				'import_file_name'             => 'Home 9',
				'categories'                 => array( 'Home Demos'),
				'import_preview_image_url'     => trailingslashit( ARROWPRESS_IMPORTER_URL ) .'assets/images/home9.jpg',
				'import_notice'                => __( 'Please waiting for a few minutes, do not close the window or refresh the page until the data is imported.', 'arrowpress_importer' ),
				'preview_url'                => $demo_link.'home-instagram',
			),
		);
	}
	add_filter( 'pt-ocdi/import_files', 'arrowpress_importer_files' );
}


/**
 * Steps after importing content:
 *
 * - Set menu location
 * - Import theme options
 * - Set front page & blog page
 * - Import slider
 */
if ( ! function_exists( 'arrowpress_importer_after_import' ) ) {
	function arrowpress_importer_after_import( $selected_import ) {
    	global $wp_filesystem;
            if ( empty( $wp_filesystem ) ) {
                require_once ABSPATH . '/wp-admin/includes/file.php';
                WP_Filesystem();
            }
    		$chosen_template = $selected_import['import_file_name'];

    	    if ( 'Base Content' === $selected_import['import_file_name'] ) {

    	       	//Set Main Menu
    			$main_menu = get_term_by( 'name', 'Menu Primary', 'nav_menu' );
    			set_theme_mod( 'nav_menu_locations', array(
    					'primary' => $main_menu->term_id,
    				)
    			);


                echo 'Delete Default Post and Page \n';

                /** Delete Hello Post */
    		    wp_delete_post( 1, true );

    		    /** Delete "Sample Page" Page */
    		    wp_delete_post( 2, true );

                // /*Widgets*/
                // $widgets_file = ARROWPRESS_IMPORTER_URL . 'data/widget_data.json';
                // echo $widgets_file;
                // // if ( file_exists( $widgets_file ) ) {
                // 	echo 'file exits';
                //     $encode_widgets_array = $wp_filesystem->get_contents( $widgets_file );
                //     arrowpress_import_widgets( $encode_widgets_array );
                //     print_r($encode_widgets_array);
                // // }

    	    }elseif('Home 1' === $selected_import['import_file_name']){
                //front page
                echo "Set Front Page \n";
                $front_page = get_page_by_title( 'Home 1' );
                if ( isset( $front_page->ID ) ) {
                    update_option( 'page_on_front', $front_page->ID );
                    update_option( 'show_on_front', 'page' );
                }

                $blog_page = get_page_by_title( 'Blog' );
                if ( isset( $blog_page->ID ) ) {
                    update_option( 'page_for_posts', $blog_page->ID );
                }
				if ( class_exists( 'RevSlider' ) ) {
                    $main_slider = plugin_dir_path( __FILE__ ) . '/data/home1/home-1.zip';

                    if ( file_exists( $main_slider ) ) {
                        $slider = new RevSlider();
                        $slider->importSliderFromPost( true, true, $main_slider );
                    }
                }

    		}elseif('Home 2' === $selected_import['import_file_name']) {
                //front page
                $front_page = get_page_by_title( 'Home 2' );
                if ( isset( $front_page->ID ) ) {
                    update_option( 'page_on_front', $front_page->ID );
                    update_option( 'show_on_front', 'page' );
                }

                $blog_page = get_page_by_title( 'Blog' );
                if ( isset( $blog_page->ID ) ) {
                    update_option( 'page_for_posts', $blog_page->ID );
                }
				if ( class_exists( 'RevSlider' ) ) {
                    $main_slider = plugin_dir_path( __FILE__ ) . '/data/home2/home-2.zip';

                    if ( file_exists( $main_slider ) ) {
                        $slider = new RevSlider();
                        $slider->importSliderFromPost( true, true, $main_slider );
                    }
                }

            }elseif('Home 3' === $selected_import['import_file_name']) {
                //front page
                $front_page = get_page_by_title( 'Home 3' );
                if ( isset( $front_page->ID ) ) {
                    update_option( 'page_on_front', $front_page->ID );
                    update_option( 'show_on_front', 'page' );
                }

                $blog_page = get_page_by_title( 'Blog' );
                if ( isset( $blog_page->ID ) ) {
                    update_option( 'page_for_posts', $blog_page->ID );
                }
				if ( class_exists( 'RevSlider' ) ) {
                    $main_slider = plugin_dir_path( __FILE__ ) . '/data/home3/home-3.zip';

                    if ( file_exists( $main_slider ) ) {
                        $slider = new RevSlider();
                        $slider->importSliderFromPost( true, true, $main_slider );
                    }
                }
            }elseif('Home 4' === $selected_import['import_file_name']) {
                //front page
                $front_page = get_page_by_title( 'Home 4' );
                if ( isset( $front_page->ID ) ) {
                    update_option( 'page_on_front', $front_page->ID );
                    update_option( 'show_on_front', 'page' );
                }

                $blog_page = get_page_by_title( 'Blog' );
                if ( isset( $blog_page->ID ) ) {
                    update_option( 'page_for_posts', $blog_page->ID );
                }
				if ( class_exists( 'RevSlider' ) ) {
                    $main_slider = plugin_dir_path( __FILE__ ) . '/data/home4/home-4.zip';

                    if ( file_exists( $main_slider ) ) {
                        $slider = new RevSlider();
                        $slider->importSliderFromPost( true, true, $main_slider );
                    }
                }
            }elseif('Home 5' === $selected_import['import_file_name']) {
                //front page
                $front_page = get_page_by_title( 'Home 5' );
                if ( isset( $front_page->ID ) ) {
                    update_option( 'page_on_front', $front_page->ID );
                    update_option( 'show_on_front', 'page' );
                }

                $blog_page = get_page_by_title( 'Blog' );
                if ( isset( $blog_page->ID ) ) {
                    update_option( 'page_for_posts', $blog_page->ID );
                }
				if ( class_exists( 'RevSlider' ) ) {
                    $main_slider = plugin_dir_path( __FILE__ ) . '/data/home5/home-5.zip';

                    if ( file_exists( $main_slider ) ) {
                        $slider = new RevSlider();
                        $slider->importSliderFromPost( true, true, $main_slider );
                    }
                }
            }elseif('Home 6' === $selected_import['import_file_name']) {
                //front page
                $front_page = get_page_by_title( 'Home 6' );
                if ( isset( $front_page->ID ) ) {
                    update_option( 'page_on_front', $front_page->ID );
                    update_option( 'show_on_front', 'page' );
                }

                $blog_page = get_page_by_title( 'Blog' );
                if ( isset( $blog_page->ID ) ) {
                    update_option( 'page_for_posts', $blog_page->ID );
                }
				if ( class_exists( 'RevSlider' ) ) {
                    $main_slider = plugin_dir_path( __FILE__ ) . '/data/home6/home-6.zip';

                    if ( file_exists( $main_slider ) ) {
                        $slider = new RevSlider();
                        $slider->importSliderFromPost( true, true, $main_slider );
                    }
                }
            }elseif('Home 7' === $selected_import['import_file_name']) {
                //front page
                $front_page = get_page_by_title( 'Home 7' );
                if ( isset( $front_page->ID ) ) {
                    update_option( 'page_on_front', $front_page->ID );
                    update_option( 'show_on_front', 'page' );
                }

                $blog_page = get_page_by_title( 'Blog' );
                if ( isset( $blog_page->ID ) ) {
                    update_option( 'page_for_posts', $blog_page->ID );
                }
				if ( class_exists( 'RevSlider' ) ) {
                    $main_slider = plugin_dir_path( __FILE__ ) . '/data/home7/home-7.zip';

                    if ( file_exists( $main_slider ) ) {
                        $slider = new RevSlider();
                        $slider->importSliderFromPost( true, true, $main_slider );
                    }
                }
            }elseif('Home 8' === $selected_import['import_file_name']) {
                //front page
                $front_page = get_page_by_title( 'Home 8' );
                if ( isset( $front_page->ID ) ) {
                    update_option( 'page_on_front', $front_page->ID );
                    update_option( 'show_on_front', 'page' );
                }

                $blog_page = get_page_by_title( 'Blog' );
                if ( isset( $blog_page->ID ) ) {
                    update_option( 'page_for_posts', $blog_page->ID );
                }
				if ( class_exists( 'RevSlider' ) ) {
                    $main_slider = plugin_dir_path( __FILE__ ) . '/data/home8/home-8.zip';

                    if ( file_exists( $main_slider ) ) {
                        $slider = new RevSlider();
                        $slider->importSliderFromPost( true, true, $main_slider );
                    }
                }
            } elseif('Home 9' === $selected_import['import_file_name']) {
                //front page
                $front_page = get_page_by_title( 'Home 9' );
                if ( isset( $front_page->ID ) ) {
                    update_option( 'page_on_front', $front_page->ID );
                    update_option( 'show_on_front', 'page' );
                }

                $blog_page = get_page_by_title( 'Blog' );
                if ( isset( $blog_page->ID ) ) {
                    update_option( 'page_for_posts', $blog_page->ID );
                }
            }

    	}
	add_action( 'pt-ocdi/after_import', 'arrowpress_importer_after_import' );
}


/** Echo text before importing widget in log file */
if ( ! function_exists( 'arrowpress_importer_before_widgets_import' ) ) {
	function arrowpress_importer_before_widgets_import( $selected_import ) {
		echo "Import Widget";
	}
	add_action( 'pt-ocdi/before_widgets_import', 'arrowpress_importer_before_widgets_import' );
}

/**
 * Changing Import Page slug
 */
if ( ! function_exists( 'arrowpress_importer_plugin_page_setup' ) ) {
	function arrowpress_importer_plugin_page_setup( $default_settings ) {
		$default_settings['parent_slug'] = 'themes.php';
		$default_settings['page_title']  = esc_html__( 'ArrowPress Importer' , 'arrowpress-importer' );
		$default_settings['menu_title']  = esc_html__( 'Import Demo Content' , 'arrowpress-importer' );
		$default_settings['capability']  = 'import';
		$default_settings['menu_slug']   = 'arrowpress-importer';

		return $default_settings;
	}
	add_filter( 'pt-ocdi/plugin_page_setup', 'arrowpress_importer_plugin_page_setup' );
}

add_filter( 'pt-ocdi/disable_pt_branding', '__return_true' );

// Increase PHP max execution time. Just in case, even though the AJAX calls are only 25 sec long.
$disabled = explode(',', ini_get('disable_functions'));
if( !ini_get('safe_mode') && !in_array('set_time_limit', $disabled) ) {
	set_time_limit( apply_filters( 'pt-ocdi/set_time_limit_for_demo_data_import', 600 ) );
}
