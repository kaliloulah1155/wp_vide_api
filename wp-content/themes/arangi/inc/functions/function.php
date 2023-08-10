<?php
function arangi_pingback_header()
{
    echo '<link rel="pingback" href="', esc_url(get_bloginfo('pingback_url')), '">';
}
add_action('wp_head', 'arangi_pingback_header');
// Customs icon markers
if (class_exists('WP_Store_locator')) {
    add_filter('wpsl_admin_marker_dir', 'arangi_custom_admin_marker_dir');
    add_filter('wpsl_marker_props', 'arangi_custom_marker_props');
    function arangi_custom_admin_marker_dir()
    {
        $admin_marker_dir = get_stylesheet_directory() . '/wpsl-markers/';
        return $admin_marker_dir;
    }
    function arangi_custom_marker_props($marker_props)
    {
        $marker_props['scaledSize'] = '36,53'; // Set this to 50% of the original size
        $marker_props['origin'] = '0,0';
        $marker_props['anchor'] = '18,35';

        return $marker_props;
    }
    define('WPSL_MARKER_URI', dirname(get_bloginfo('stylesheet_url')) . '/wpsl-markers/');
}

if (!function_exists('arangi_get_search_form')) {
    function arangi_get_search_form()
    {
        $template = get_search_form(false);
        $output = '';
        ob_start();
?>
        <div class="top-search">
            <?php echo wp_kses($template, arangi_allow_html()); ?>
        </div>
    <?php
        $output .= ob_get_clean();
        return $output;
    }
}

if (defined('YITH_WCWL') && !function_exists('arangi_yith_wcwl_ajax_update_count')) {
    function arangi_yith_wcwl_ajax_update_count()
    {
        wp_send_json(array(
            'count' => yith_wcwl_count_all_products()
        ));
    }
    add_action('wp_ajax_yith_wcwl_update_wishlist_count', 'arangi_yith_wcwl_ajax_update_count');
    add_action('wp_ajax_nopriv_yith_wcwl_update_wishlist_count', 'arangi_yith_wcwl_ajax_update_count');
}

function arangi_get_meta_value($meta_key, $boolean = false)
{
    global $wp_query, $arangi_settings;

    $value = '';
    if (is_category()) {
        $cat = $wp_query->get_queried_object();
        $value = get_metadata('category', $cat->term_id, $meta_key, true);
    } elseif (is_tax('product_cat')) {
        $cat = $wp_query->get_queried_object();
        $value = get_metadata('product_cat', $cat->term_id, $meta_key, true);
    } elseif (is_tax()) {
        $term = get_term_by('slug', get_query_var('term'), get_query_var('taxonomy'));
        if ($term) {
            $value = get_metadata($term->taxonomy, $term->term_id, $meta_key, true);
        }
    } elseif (is_archive()) {
        if (function_exists('is_shop') && is_shop()) {
            $value = get_post_meta(wc_get_page_id('shop'), $meta_key, true);
        } else {
            $term = get_term_by('slug', get_query_var('term'), get_query_var('taxonomy'));
            if ($term) {
                $value = get_metadata($term->taxonomy, $term->term_id, $meta_key, true);
            }
        }
    } else {
        if (is_singular()) {
            $value = get_post_meta(get_the_id(), $meta_key, true);
        } else {
            if (!is_home() && is_front_page()) {
                if (isset($arangi_settings[$meta_key]))
                    $value = $arangi_settings[$meta_key];
            } elseif (is_home() && !is_front_page()) {

                if (isset($arangi_settings['blog-' . $meta_key])) {
                    $value = $arangi_settings['blog-' . $meta_key];
                } else {
                    $value = get_post_meta(get_queried_object_id(), $meta_key, true);
                }
            } elseif (is_home() || is_front_page()) {
                if (isset($arangi_settings[$meta_key]))
                    $value = $arangi_settings[$meta_key];
            }
        }
    }

    if ($boolean) {
        $value = ($value != $meta_key) ? true : false;
    }

    return $value;
}
if (!function_exists('arangi_get_layout_class')) {
    /**
     * Return layout class when sidebar displays
     * 
     * @return [string] [arangi_class]
     */
    function arangi_get_layout_class()
    {
        $arangi_class = '';
        $arangi_layout = Arangi_Helper::get_post_meta('layout');
        $arangi_sidebar_left =  Arangi_Global::get_left_sidebar();
        $arangi_sidebar_right =  Arangi_Global::get_right_sidebar();
        /** Sidebar left & right  */
        if ($arangi_sidebar_left && $arangi_sidebar_right && is_active_sidebar($arangi_sidebar_left) && is_active_sidebar($arangi_sidebar_right)) {
            $arangi_class .= 'col-xl-6 col-lg-6 col-md-12 col-sm-12 col-xs-12 main-sidebar has-sidebar';
            /** Only sidebar left  */
        } elseif ($arangi_sidebar_left && (!$arangi_sidebar_right || $arangi_sidebar_right == "none") && is_active_sidebar($arangi_sidebar_left)) {
            $arangi_class .= 'f-right col-lg-9 col-md-12 col-sm-12 col-xs-12 main-sidebar has-sidebar';
            /** Only sidebar right  */
        } elseif ((!$arangi_sidebar_left || $arangi_sidebar_left == "none") && $arangi_sidebar_right && is_active_sidebar($arangi_sidebar_right)) {
            $arangi_class .= 'col-lg-9 col-md-12 col-sm-12 col-xs-12 main-sidebar has-sidebar';
            /** No sidebar  */
        } else {
            $arangi_class .= 'col-lg-12 col-md-12 col-sm-12 col-xs-12 main-sidebar';
            if ($arangi_layout == 'fullwidth') {
                $arangi_class .= ' col-md-12';
            }
        }
        return $arangi_class;
    }
}
if (!function_exists('arangi_allow_html')) {
    function arangi_allow_html()
    {
        return array(
            'form' => array(
                'role' => array(),
                'method' => array(),
                'class' => array(),
                'action' => array(),
                'id' => array(),
            ),
            'input' => array(
                'type' => array(),
                'name' => array(),
                'class' => array(),
                'title' => array(),
                'id' => array(),
                'value' => array(),
                'placeholder' => array(),
                'autocomplete' => array(),
                'data-number' => array(),
                'data-keypress' => array(),
            ),
            'button' => array(
                'type' => array(),
                'name' => array(),
                'class' => array(),
                'title' => array(),
                'id' => array(),
            ),
            'img' => array(
                'src' => array(),
                'alt' => array(),
                'class' => array(),
            ),
            'div' => array(
                'class' => array(),
            ),
            'h4' => array(
                'class' => array(),
            ),
            'a' => array(
                'class' => array(),
                'href' => array(),
                'onclick' => array(),
                'aria-expanded' => array(),
                'aria-haspopup' => array(),
                'data-toggle' => array(),
            ),
            'i' => array(
                'class' => array(),
            ),
            'p' => array(
                'class' => array(),
            ),
            'br' => array(),
            'span' => array(
                'class' => array(),
                'onclick' => array(),
                'style' => array(),
            ),
            'strong' => array(
                'class' => array(),
            ),
            'ul' => array(
                'class' => array(),
            ),
            'li' => array(
                'class' => array(),
            ),
            'del' => array(),
            'ins' => array(),
            'select' => array(
                'class' => array(),
                'name' => array(),
            ),
            'option' => array(
                'class' => array(),
                'value' => array(),
            ),
        );
    }
}

function arangi_posts_per_page($query)
{
    global $wp_query;
    $arangi_post_per_page = Arangi::setting('blog_archive_number_item');
    $arangi_product_per_page = Arangi::setting('shop_archive_number_item');
    $arangi_member_per_page = Arangi::setting('member_archive_number_item');
    $arangi_service_per_page = Arangi::setting('service_archive_number_item');
    $arangi_portfolio_per_page = Arangi::setting('portfolio_archive_number_item');
    if (is_category()) {
        $category = $wp_query->get_queried_object();
        if (isset($category)) {
            $cat_id = $category->term_id;
            if (get_metadata('category', $cat_id, 'post_per_page', true) != '') {
                $arangi_post_per_page = get_metadata('category', $cat_id, 'post_per_page', true);
            }
        }
    }
    if (isset($arangi_post_per_page) && $arangi_post_per_page != '') {
        if (!is_admin() && $query->is_main_query() && (is_category() || is_tag() || is_home())) {
            $query->set('posts_per_page', $arangi_post_per_page);
        }
    }
    if (is_tax('product_cat')) {
        $cat = $wp_query->get_queried_object();
        if (get_metadata('product_cat', $cat->term_id, 'product_per_page', true)  != 'default') {
            $arangi_product_per_page = get_metadata('product_cat', $cat->term_id, 'product_per_page', true);
        }
    }
    if (isset($arangi_product_per_page) && $arangi_product_per_page != '') {
        if (!is_admin() && $query->is_main_query() && (is_post_type_archive('product') || is_tax('product_cat'))) {
            $query->set('posts_per_page', $arangi_product_per_page);
        }
    }
}
add_action('pre_get_posts', 'arangi_posts_per_page');

function arangi_get_block_name()
{
    $block_options = array();
    $args = array(
        'numberposts' => -1,
        'post_type' => 'static',
        'post_status' => 'publish',
    );
    $posts = get_posts($args);
    $block_options[0] = 'Please Select Option';
    foreach ($posts as $_post) {
        $block_options[$_post->ID] = $_post->post_title;
    }
    return $block_options;
}
function arangi_get_page_name()
{
    $block_options = array();
    $args = array(
        'numberposts' => -1,
        'post_type' => 'block',
        'post_status' => 'publish',
    );
    $posts = get_posts($args);
    $block_options[0] = 'Please Select Option';
    foreach ($posts as $_post) {
        $block_options[$_post->ID] = $_post->post_title;
    }
    return $block_options;
}

function arangi_static_block()
{
    $static = Arangi::setting('general_static_block');
    $static2 = Arangi::setting('service_static_block');
    $static3 = Arangi::setting('service_single_static_block');
    $static_coming_soon = Arangi::setting('cm_select_page');
    $show_hide_static_block = get_post_meta(get_the_ID(), 'show_hide_static_block', true);
    if (is_home() && !is_front_page() || $show_hide_static_block == true || (class_exists('Woocommerce') && is_shop()) || (class_exists('Woocommerce') && is_cart()) || (class_exists('Woocommerce') && is_checkout()) || (is_tax()  && 'service' !== get_post_type()) || (is_category() && 'service' !== get_post_type()) || 'post' == get_post_type() || 'member' == get_post_type() || (is_single() && 'wpsl_stores' == get_post_type())) {
        if ($static != '') {
            $block = get_post($static);
            if ($block) {
                $post_content = $block->post_content;
                echo '<div class = "static-block">' . $post_content . '</div>';
            }
        }
    }

    if (!is_single() && 'service' == get_post_type()) {
        if ($static2 != '') {
            $block = get_post($static2);
            if ($block) {
                $post_content = $block->post_content;
                echo '<div class = "static-block">' . $post_content . '</div>';
            }
        }
    }

    if (is_single() && 'service' == get_post_type()) {
        if ($static3 != '') {
            $block = get_post($static3);
            if ($block) {
                $post_content = $block->post_content;
                echo '<div class = "static-block">' . $post_content . '</div>';
            }
        }
    }
    if (is_page_template('coming-soon.php')) {
        if ($static_coming_soon != '') {
            $block = get_post($static_coming_soon);
            if ($block) {
                $post_content = $block->post_content;
                echo '<div class = "static-block">' . $post_content . '</div>';
            }
        }
    }
}

function arangi_get_save_template()
{
    $block_options = array();
    $args = array(
        'numberposts' => -1,
        'post_type' => 'elementor_library',
        'post_status' => 'publish',
    );
    $posts = get_posts($args);
    $block_options[0] = 'Please Select Option';
    foreach ($posts as $_post) {
        $block_options[$_post->ID] = $_post->post_title;
    }
    return $block_options;
}

function arangi_get_post_media()
{
    $gallery = get_post_meta(get_the_ID(), 'gallery_metabox', true);
    $blog_layout = Arangi::setting('blog_archive_layout');
    if ($blog_layout  === 'list') {
        $blog_column = Arangi::setting('blog_archive_columns_list');
    }
    if ($blog_layout  === 'grid') {
        $blog_column = Arangi::setting('blog_archive_columns_grid');
    }
    if ($blog_layout  === 'masonry') {
        $blog_column = Arangi::setting('blog_archive_columns_masonry');
    }
    if (is_category()) {
        $blog_layout = arangi_get_meta_value('blog_layout', false);
        $blog_column = arangi_get_meta_value('blog_columns', false);
    }
    $blog_id =  'blog_id-' . wp_rand();
    ?>
    <?php if (get_post_format() == 'video') : ?>
        <?php $video = get_post_meta(get_the_ID(), 'post_video', true); ?>
        <?php if ($video && $video != '') : ?>
            <?php if (is_singular()) : ?>
                <div class="blog-video">
                    <a class="fancybox" data-fancybox href="<?php echo esc_url($video); ?>">
                        <?php if (has_post_thumbnail()) {
                            echo get_the_post_thumbnail(null, array(1170, 560), array(
                                // 'alt' => the_title_attribute()
                            ));
                        }
                        ?>
                        <i class="icon icon-play32"></i></a>
                </div>
            <?php else : ?>
                <div class="blog-video blog-img">
                    <a class="fancybox" data-fancybox href="<?php echo esc_url($video); ?>">
                        <?php if (has_post_thumbnail()) { ?>
                        <?php
                            if ($blog_layout  === 'list') {
                                if ($blog_column === "2") {
                                    $image_size = array(500, 630);
                                } else {
                                    $image_size = array(991, 613);
                                }
                            } elseif ($blog_layout  === 'grid') {
                                if ($blog_column === "2") {
                                    $image_size = array(570, 386);
                                } else {
                                    $image_size = array(570, 570);
                                }
                            } elseif ($blog_layout  === 'masonry') {
                                $image_size = array(500, 572);
                            } else {
                                $image_size = array(570, 570);
                            }
                            echo get_the_post_thumbnail(null, $image_size, array(
                                // 'alt' => get_the_title()
                            ));
                        }
                        ?><i class="icon icon-play32"></i></a>
                </div>
            <?php endif; ?>
        <?php endif; ?>
    <?php elseif (get_post_format() == 'audio') : ?>
        <?php $audio = get_post_meta(get_the_ID(), 'post_audio', true); ?>
        <?php if ($audio && $audio != '') : ?>
            <?php if (is_singular()) : ?>
                <div class="blog-audio">
                    <?php if (get_post_format() == 'audio') {
                        echo '<div class="audio_container">';
                    }
                    ?>
                    <?php echo Arangi_Helper::w3c_iframe(wp_oembed_get($audio,  array('height' => 300))); ?>
                    <?php if (get_post_format() == 'audio') {
                        echo '</div>';
                    }
                    ?>
                </div>
            <?php else : ?>
                <div class="blog-audio">
                    <?php if (get_post_format() == 'audio') {
                        echo '<div class="audio_container">';
                    }
                    ?>
                    <?php echo Arangi_Helper::w3c_iframe(wp_oembed_get($audio,  array('height' => 200))); ?>
                    <?php if (get_post_format() == 'audio') {
                        echo '</div>';
                    }
                    ?>
                </div>
            <?php endif; ?>
        <?php endif; ?>
    <?php elseif (get_post_format() == 'link') : ?>
        <?php
        $link = get_post_meta(get_the_ID(), 'post_link', true);
        $link_title = get_post_meta(get_the_ID(), 'post_link', true);
        ?>
        <?php if (is_singular()) : ?>
            <?php if ($link && $link != '') : ?>
                <div class="blog-img">
                    <?php if (has_post_thumbnail()) {
                        echo get_the_post_thumbnail(null, array(1170, 560), array(
                            //'alt' => get_the_title()
                        ));
                    } ?>
                </div>
                <div class="link_section clearfix">
                    <div class="link-icon">
                        <i class="fa fa-link"></i>
                    </div>
                    <a class="link-post" href="<?php echo esc_url(is_ssl() ? str_replace('http://', 'https://', $link) : $link); ?>">
                        <?php if ($link_title && $link_title != '') : ?>
                            <?php echo wp_kses($link_title, array()); ?>
                        <?php endif; ?>
                    </a>
                </div>
            <?php endif; ?>
        <?php else : ?>
            <?php if ($link && $link != '') : ?>
                <div class="link_section clearfix">
                    <div class="link-icon">
                        <i class="fa fa-link"></i>
                    </div>
                    <a class="link-post" href="<?php echo esc_url(is_ssl() ? str_replace('http://', 'https://', $link) : $link); ?>">
                        <?php if ($link_title && $link_title != '') : ?>
                            <?php echo wp_kses($link_title, array()); ?>
                        <?php endif; ?>
                    </a>
                </div>
            <?php endif; ?>
        <?php endif; ?>
    <?php elseif (get_post_format() == 'quote') : ?>
        <?php
        $quote_text = get_post_meta(get_the_ID(), 'post_quote_text', true);
        $quote_author = get_post_meta(get_the_ID(), 'post_quote_name', true);
        $quote_link = get_post_meta(get_the_ID(), 'post_quote_url', true);
        ?>
        <?php if (is_singular()) : ?>
            <div class="blog-img">
                <?php if (has_post_thumbnail()) {
                    echo get_the_post_thumbnail(null, array(1170, 560), array(
                        //'alt' => get_the_title()
                    ));
                }
                ?>
            </div>
            <?php if ($quote_text && $quote_text != '') : ?>
                <div class="quote_section">
                    <span class="quote-icon">&ldquo;</span>
                    <blockquote class="var3">
                        <?php echo wp_kses($quote_text, array()); ?>
                        <?php if ($quote_author && $quote_author != '') : ?>
                            <div class="author_info"><?php echo  wp_kses($quote_author, array()); ?></div>
                        <?php endif; ?>
                        <?php if ($quote_link && $quote_link != '') : ?>
                            <a class="quote_link" href="<?php echo esc_url($quote_link); ?>" target="_blank">
                                <?php echo esc_html__('Via Twitter', 'arangi'); ?>
                            </a>
                        <?php endif; ?>
                    </blockquote>
                </div>
            <?php endif; ?>
        <?php else : ?>
            <?php if ($quote_text && $quote_text != '') : ?>
                <div class="quote_section">
                    <span class="quote-icon">&ldquo;</span>
                    <blockquote class="var3">
                        <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php echo wp_kses($quote_text, array()); ?></a>
                        <?php if ($quote_author && $quote_author != '') : ?>
                            <div class="author_info"><?php echo  wp_kses($quote_author, array()); ?></div>
                        <?php endif; ?>
                        <?php if ($quote_link && $quote_link != '') : ?>
                            <a class="quote_link" href="<?php echo esc_url($quote_link); ?>" target="_blank">
                                <?php echo esc_html__('Via Twitter', 'arangi'); ?>
                            </a>
                        <?php endif; ?>
                    </blockquote>
                </div>
            <?php endif; ?>
        <?php endif; ?>
    <?php elseif (get_post_format() == 'gallery') : ?>
        <?php if (is_array($gallery) && count($gallery) > 1) : ?>
            <?php if (is_singular()) : ?>
                <div class="blog-gallery-single blog-img arrows-custom">
                    <?php
                    $index = 0;
                    foreach ($gallery as $key => $value) :
                        $alt = get_post_meta($value, '_wp_attachment_image_alt', true);
                    ?>
                        <div class="img-gallery">
                            <?php 
                                echo wp_get_attachment_image($value, array(600,600),false,array(
                                    // 'alt' => $alt
                                ));
                            ?>
                        </div>
                    <?php
                        $index++;
                    endforeach;
                    ?>
                </div>
            <?php else : ?>
                <div id="<?php echo esc_attr($blog_id); ?>" class="blog-gallery blog-img arrows-custom">
                    <?php
                    $index = 0;
                    foreach ($gallery as $key => $value) :
                        $alt = get_post_meta($value, '_wp_attachment_image_alt', true);
                        if ($blog_layout  === 'list') {
                            if ($blog_column === "2") {
                                $img_size = array(500,630);
                            } else {
                                $img_size = array(991,613);
                            }
                        } elseif ($blog_layout  === 'grid') {
                            if ($blog_column === "2") {
                                $img_size = array(570,386);
                            } else {
                                $img_size = array(500,570);
                            }
                        } elseif ($blog_layout  === 'masonry') {
                            $img_size = array(500,733);
                        } else {
                            $img_size = array(848,420);
                        }

                    ?>
                        <div class="img-gallery">
                            <?php 
                                echo wp_get_attachment_image($value, $img_size,false,array(
                                    // 'alt' => $alt
                                ));
                            ?>
                        </div>
                    <?php

                        $index++;
                    endforeach;
                    ?>
                </div>
            <?php endif; ?>
        <?php endif; ?>
    <?php elseif (get_post_format() == 'image') : ?>
        <?php if (has_post_thumbnail()) : ?>
            <?php if (is_singular()) : ?>
                <div class="blog-img">
                    <?php
                    echo get_the_post_thumbnail(null,array(1170,560), array(
                        // 'alt'=> get_the_title()
                    ));
                    ?>
                </div>
            <?php else : ?>
                <div class="blog-img">
                    <?php
                    if ($blog_layout  === 'list') {
                        if ($blog_column === "2") {
                            $img_Size = array(991,584);
                        } else {
                            $img_Size = array(991,613);
                        }
                    } elseif ($blog_layout  === 'grid') {
                        if ($blog_column === "2") {
                            $img_Size = array(570,386);
                        } else {
                            $img_Size = array(570,570);
                        }
                    } elseif ($blog_layout  === 'masonry') {
                        $img_Size = array(500,572);
                    } else {
                        $img_Size = array(570,570);
                    }
                    echo get_the_post_thumbnail(null,$img_Size, array(
                        // 'alt'=> get_the_title()
                    ));
                    ?>
                </div>
            <?php endif; ?>
        <?php endif; ?>
    <?php else : ?>
        <?php if (has_post_thumbnail()) : ?>
            <?php if (is_singular()) : ?>
                <div class="blog-img">
                    <?php
                    echo get_the_post_thumbnail(null,array(1170,560), array(
                        // 'alt'=> get_the_title()
                    ));
                    ?>
                </div>
            <?php else : ?>
                <div class="blog-img">
                    <a href="<?php the_permalink(); ?>">
                        <?php

                        if ($blog_layout  === 'list') {
                            if ($blog_column === "2") {
                                $img_size = array(500,630);
                            } else {
                                $img_size = array(991,613);
                            }
                        } elseif ($blog_layout  === 'grid') {
                            if ($blog_column === "2") {
                                 $img_size = array(570,386);
                            } else {
                                $img_size = array(570,570);
                            }
                        } elseif ($blog_layout  === 'masonry') {
                            $img_size = 'full';
                        } else {
                            $img_size = array(848,420);
                        }
                        echo get_the_post_thumbnail(null,$img_size, array(
                            // 'alt' => get_the_title()
                        ));
                        ?>
                    </a>
                </div>
            <?php endif; ?>
        <?php endif; ?>
        <?php endif;
}

/**
 * [arangi_maintenance_mode description]
 * Enable coming soon mode for theme.
 */
if (!function_exists('arangi_maintenance_mode')) {
    function arangi_maintenance_mode()
    {
        $coming_soon_enable = Arangi::setting('coming_soon_enable');
        global $arangi_settings;
        if (isset($coming_soon_enable) && $coming_soon_enable && (!current_user_can('edit_themes') || !is_user_logged_in())) {
            add_filter('template_include', function () {
                return get_stylesheet_directory() . '/coming-soon.php';
            });
        }
    }
    add_action('template_redirect', 'arangi_maintenance_mode');
}

function arangi_resize_image($width, $height)
{
    $image_url   = arangi_get_attachment(get_post_thumbnail_id(), array($width, $height));
    return $image_url['src'];
}
function arangi_get_attachment( $attachment_id, $size ) {  
	if ( ! $attachment_id ) {
		return false;
	}
	if(empty($size)){
		$size = 'full';
	}
	$attachment = get_post( $attachment_id );
	$image = wp_get_attachment_image_src( $attachment_id, $size );  

	if ( ! $attachment ) {
		return false;
	}

	return array(
		'alt'         => esc_attr( get_post_meta( $attachment->ID, '_wp_attachment_image_alt', true ) ),
		'caption'     => esc_attr( $attachment->post_excerpt ),
		'description' => force_balance_tags( $attachment->post_content ),
		'href'        => get_permalink( $attachment->ID ),
		'src'         => esc_url( $image[0] ),
		'title'       => esc_attr( $attachment->post_title ),
		'width'  => ( $image[1] && $image[1] > 2 ) ? esc_attr( $image[1] ) : '',
		'height' => ( $image[2] && $image[2] > 2 ) ? esc_attr( $image[2] ) : ''
	);
}
function arangi_ajax_search_product()
{
    $search_val = $_POST['s'];
    $search_cat = $_POST['product_cat'];
    if (isset($_REQUEST['s']) && !empty($_REQUEST['s'])) {
        $query = sanitize_text_field($_REQUEST['s']);
        // native WordPress search
        $args = array(
            's'             => $query,
            'post_status'   => 'publish',
            'post_type'     => 'product',
        );
        if (isset($_POST['product_cat']) && $_POST['product_cat'] != '') {
            $args['tax_query'][] = array(
                'taxonomy' => 'product_cat',
                'field'    => 'slug',
                'terms'    => $_POST['product_cat'],
                'operator' => 'IN'
            );
        }
        query_posts($args);
        if (have_posts()) :
            while (have_posts()) : the_post();
                $post_type = get_post_type_object(get_post_type());
        ?>
                <div class="auto-search-result clearfix">
                    <div class="search-img">
                        <a href="<?php echo esc_url(get_permalink()) ?>">
                            <img src="<?php echo esc_url(arangi_resize_image('85', '85')); ?>">
                        </a>
                    </div>
                    <div class="search-info">
                        <a class="hover" href="<?php echo esc_url(get_permalink()); ?>">
                            <?php the_title(); ?>
                        </a>
                        <?php echo do_shortcode('[add_to_cart id="' . get_the_ID() . '"]'); ?>
                    </div>
                </div>
            <?php endwhile;
        else : ?>
            <p class="auto-search-no-results">
                <?php esc_html_e('No results found.', 'arangi'); ?>
            </p>
<?php endif;
    }
    die();
}
add_action('wp_ajax_au_ajax_search_product', 'arangi_ajax_search_product');
add_action('wp_ajax_nopriv_au_ajax_search_product', 'arangi_ajax_search_product');
