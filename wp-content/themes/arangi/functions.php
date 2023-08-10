<?php
$theme = wp_get_theme();
define('ARANGI_CSS', get_template_directory_uri() . '/css');
define('ARANGI_JS', get_template_directory_uri() . '/assets/js');

define('ARANGI_THEME_NAME', $theme['Name']);
// define('ARANGI_THEME_VERSION', $theme->get('Version'));
define('ARANGI_THEME_VERSION', '2.0.3');
define('ARANGI_THEME_DIR', get_template_directory());
define('ARANGI_THEME_URI', get_template_directory_uri());
define('ARANGI_THEME_IMAGE_URI', get_template_directory_uri() . '/assets/images');
define('ARANGI_CHILD_THEME_URI', get_stylesheet_directory_uri());
define('ARANGI_CHILD_THEME_DIR', get_stylesheet_directory());
define('ARANGI_FRAMEWORK_DIR', get_template_directory() . '/inc');
define('ARANGI_ADMIN', get_template_directory() . '/inc/admin');
define('ARANGI_FRAMEWORK_FUNCTION', get_template_directory() . '/inc/functions');
define('ARANGI_FRAMEWORK_PLUGIN', get_template_directory() . '/inc/plugins');
define('ARANGI_CUSTOMIZER_DIR', ARANGI_ADMIN . '/customizer');
define('ARANGI_WIDGETS_DIR', ARANGI_THEME_DIR . '/widgets');

// require_once ARANGI_FRAMEWORK_PLUGIN . '/functions.php';
require_once ARANGI_FRAMEWORK_FUNCTION . '/function.php';
require_once ARANGI_FRAMEWORK_FUNCTION . '/woocommerce.php';
require_once ARANGI_FRAMEWORK_FUNCTION . '/ajax_search/ajax-search.php';
require_once ARANGI_FRAMEWORK_FUNCTION . '/menus/menu.php';
require_once ARANGI_FRAMEWORK_FUNCTION . '/menus/class-edit-menu-walker.php';
require_once ARANGI_FRAMEWORK_FUNCTION . '/menus/class-walker-nav-menu.php';
require_once ARANGI_FRAMEWORK_FUNCTION . '/ajax-account/custom-ajax.php';
require_once ARANGI_FRAMEWORK_DIR . '/class-functions.php';
require_once ARANGI_FRAMEWORK_DIR . '/class-helper.php';
require_once ARANGI_FRAMEWORK_DIR . '/class-static.php';
require_once ARANGI_FRAMEWORK_DIR . '/class-templates.php';
// require_once ARANGI_FRAMEWORK_DIR . '/class-aqua-resizer.php';
require_once ARANGI_FRAMEWORK_DIR . '/class-global.php';
require_once ARANGI_FRAMEWORK_DIR . '/class-widgets.php';
require_once ARANGI_FRAMEWORK_DIR . '/class-wpml.php';
require_once ARANGI_FRAMEWORK_DIR . '/class-post-type-blog.php';
require_once ARANGI_FRAMEWORK_DIR . '/class-actions-filters.php';
require_once ARANGI_FRAMEWORK_DIR . '/class-minify.php';
require_once ARANGI_FRAMEWORK_DIR . '/class-enqueue.php';
require_once ARANGI_FRAMEWORK_DIR . '/class-custom-style.php';
require_once ARANGI_FRAMEWORK_DIR . '/class-config-slide.php';
//APR_CORE_PATH
require ARANGI_ADMIN . '/arrow-core-installer/installer.php';
// check with arrowcore 2.0
if ( defined( 'ARROWPRESS_CORE_VERSION' ) ) {
	require_once ARANGI_ADMIN . '/plugins-require.php';
    require_once ARANGI_ADMIN . '/posttypes/class-custom-meta-field.php';
    require_once ARANGI_ADMIN . '/metabox/metabox.php';
    require_once ARANGI_FRAMEWORK_DIR . '/widgets/register-widgets.php';
    require_once ARANGI_FRAMEWORK_DIR . '/class-elementor-widget.php';
	if ( function_exists( 'arrowpress_importer_files' ) ) {
		deactivate_plugins( 'arrowpress_importer/arrowpress-importer.php' );
        deactivate_plugins( 'kirki/kirki.php' );
	}
} else {
	require_once( ARANGI_FRAMEWORK_PLUGIN . '/functions.php' );
    require_once ARANGI_FRAMEWORK_DIR . '/class-kirki.php';
}
require_once ARANGI_FRAMEWORK_DIR . '/class-customize.php';

if (!isset($content_width)) {
    $content_width = 1170;
}
function arangi_limit_title($numberlimit)
{
    $tit = the_title('', '', FALSE);
    echo substr($tit, 0, $numberlimit);
    if (strlen($tit) > $numberlimit) echo esc_html__('...', 'arangi');
}

function arangi_theme_setup()
{
    add_theme_support('post-thumbnails');
    add_theme_support('custom-header');
    add_theme_support( 'arrowpress-core' );
}

add_action('after_setup_theme', 'arangi_theme_setup');
/**
 * Display favicon
 */
function arangi_favicon()
{
    if (function_exists('wp_site_icon')) {
        if (function_exists('has_site_icon')) {
            if (!has_site_icon()) {
                // Icon default
                $arangi_favicon_src = get_template_directory_uri() . "/assets/images/favicon.png";
                echo '<link rel="shortcut icon" href="' . esc_url($arangi_favicon_src) . '" type="image/x-icon" />';
                return;
            }
            return;
        }
    }
    /**
     * Support WordPress < 4.3
     */

    $theme_options_data = get_theme_mods();
    $arangi_favicon_src = '';
    if (isset($theme_options_data['arangi_favicon'])) {
        $arangi_favicon = $theme_options_data['arangi_favicon'];
        $favicon_attachment = wp_get_attachment_image_src($arangi_favicon, 'full');
        $arangi_favicon_src = $favicon_attachment[0];
    }
    if (!$arangi_favicon_src) {
        $arangi_favicon_src = get_template_directory_uri() . "/assets/images/favicon.png";
    }
    echo '<link rel="shortcut icon" href="' . esc_url($arangi_favicon_src) . '" type="image/x-icon" />';
}

add_action('wp_head', 'arangi_favicon');

if (class_exists('Woocommerce')) {
// Let us create Taxonomy for Custom Post Type
    add_action('init', 'arangi_create_countries_custom_taxonomy', 0);
//create a custom taxonomy name it "Countries" for your posts
    function arangi_create_countries_custom_taxonomy()
    {
        $labels = array(
            'name' => _x('Countries', 'taxonomy general name'),
            'singular_name' => _x('Countries', 'taxonomy singular name'),
            'search_items' => __('Search Countries', 'arangi'),
            'all_items' => __('All Countries', 'arangi'),
            'parent_item' => __('Parent Countries', 'arangi'),
            'parent_item_colon' => __('Parent Countries:', 'arangi'),
            'edit_item' => __('Edit Countries', 'arangi'),
            'update_item' => __('Update Countries', 'arangi'),
            'add_new_item' => __('Add New Countries', 'arangi'),
            'new_item_name' => __('New Countries Name', 'arangi'),
            'menu_name' => __('Countries', 'arangi'),
        );

        register_taxonomy('countries', array('product'), array(
            'hierarchical' => true,
            'labels' => $labels,
            'show_ui' => true,
            'show_admin_column' => true,
            'query_var' => true,
            'rewrite' => array('slug' => 'countries'),
        ));
    }
}
