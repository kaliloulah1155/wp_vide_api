<?php
// Exit if accessed directly.
if (!defined('ABSPATH')) {
    exit;
}

/**
 * Custom template tags for this theme.
 */
class Arangi_Templates{
    public static function popup_sale_off() {
        $sale_off_before_title = Arangi::setting( 'sale_off_before_title' );
        $sale_off_title = Arangi::setting( 'sale_off_title' );
        $sale_off_after_title = Arangi::setting( 'sale_off_after_title' );
        $setting_popup_sale_off = Arangi::setting( 'setting_popup_sale_off' );
        if($setting_popup_sale_off): 
        ?>
        <div id="list-builder"></div>
        <div class="popup-sale-off">
            <div class="content">
                <div class="sub-content">
                    <div class="popup-title">
                        <?php if((in_array('sitepress-multilingual-cms/sitepress.php', apply_filters('active_plugins', get_option('active_plugins')))) && function_exists('icl_object_id') ): ?>
                            <span class="before-title">
                                <?php echo esc_html__('Lucky You!','arangi'); ?>
                            </span>
                            <?php elseif(isset($sale_off_before_title) && $sale_off_before_title != ''): ?>
                            <span class="before-title">
                                <?php echo esc_attr($sale_off_before_title); ?>
                            </span>
                        <?php endif; ?>
                        <?php if((in_array('sitepress-multilingual-cms/sitepress.php', apply_filters('active_plugins', get_option('active_plugins')))) && function_exists('icl_object_id') ): ?>
                            <h3 class="title">
                                <?php echo esc_html__('Want an instant','arangi'); ?>
                            </h3>
                            <?php elseif(isset($sale_off_title) && $sale_off_title != ''): ?>
                            <h3 class="title">
                                <?php echo esc_attr($sale_off_title); ?>
                            </h3>
                        <?php endif; ?>
                        <?php if((in_array('sitepress-multilingual-cms/sitepress.php', apply_filters('active_plugins', get_option('active_plugins')))) && function_exists('icl_object_id') ): ?>
                            <span class="after-title"><?php echo esc_html__('10% off ?' , 'arangi');?></span>
                            <?php elseif(isset($sale_off_after_title) && $sale_off_after_title != ''): ?>
                            <span class="after-title"><?php echo esc_attr($sale_off_after_title);?></span>
                        <?php endif; ?>
                    </div>
                    <?php dynamic_sidebar('popup-sale-off'); ?>
                    <div class="checkbox-form">
                        <label for="not_show_popup_again" class="checkcontainer"><?php echo esc_html__("Don't show this popup again" , 'arangi');?>
                            <input type="checkbox" name="show" id="not_show_popup_again" />
                            <span class="checkmark"></span>
                        </label>
                    </div>
                </div>
            </div>
            <a href="#" class="close-popup"><i class="ti-close "></i></a>
        </div>
        <?php
        endif;
    }
    public static function get_related_posts( $args ) {
        $defaults = array(
            'post_id'      => '',
            'number_posts' => 3,
        );
        $args     = wp_parse_args( $args, $defaults );
        if ( $args['number_posts'] <= 0 || $args['post_id'] === '' ) {
            return false;
        }

        $categories = get_the_category( $args['post_id'] );

        if ( ! $categories ) {
            return false;
        }

        foreach ( $categories as $category ) {
            if ( $category->parent === 0 ) {
                $term_ids[] = $category->term_id;
            } else {
                $term_ids[] = $category->parent;
                $term_ids[] = $category->term_id;
            }
        }

        // Remove duplicate values from the array.
        $unique_array = array_unique( $term_ids );

        $query_args = array(
            'post_type'      => 'post',
            'orderby'        => 'date',
            'order'          => 'DESC',
            'posts_per_page' => $args['number_posts'],
            'post__not_in'   => array( $args['post_id'] ),
            'no_found_rows'  => true, // Skip pagination, makes the query faster.
            'tax_query'      => array(
                array(
                    'taxonomy'         => 'category',
                    'terms'            => $unique_array,
                    'include_children' => false,
                ),
            ),
        );

        $query = new WP_Query( $query_args );

        return $query;
    }
    public static function header($header_type = ''){
        $header_type = Arangi_Global::instance()->set_header_type();
        get_template_part('headers/header', $header_type);
    }

    public static function get_logo(){
        $show_sticky = Arangi::setting( 'header_sticky_enable' );
        
        $logo_general = Arangi::setting( 'logo' );
        $logo_2 = Arangi::setting( 'logo_2');
        $logo_3 = Arangi::setting( 'logo_3');
        $logo_4 = Arangi::setting( 'logo_4');
        $logo_5 = Arangi::setting( 'logo_5'); 
        $logo_6 = Arangi::setting( 'logo_6');
        $logo_header_metabox = get_post_meta(get_the_ID(), 'logo_header', true);
        $logo_header_is_sticky = get_post_meta(get_the_ID(), 'logo_header_sticky', true);
        $type = Arangi_Global::instance()->set_header_type();
		
        if (!empty($logo_header_metabox) && $logo_header_metabox !== ''){
            $logo = $logo_header_metabox;
        }else{
            if ($type =='02' && $logo_2 !=''){
                $logo = $logo_2;
            }elseif ($type =='03' && $logo_3 !==''){
                $logo = $logo_3;
            }elseif ($type =='04' && $logo_4 !==''){
                $logo = $logo_4;
            }elseif ($type =='05' && $logo_5 !==''){
                $logo = $logo_5;
            }elseif ($type =='06' && $logo_6 !==''){
                    $logo = $logo_6;
            }else{
                $logo = $logo_general;
            }
        }
        if($logo_header_is_sticky){
            $logo_header_is_sticky = $logo_header_is_sticky;
        }else{
            $logo_header_is_sticky = Arangi::setting( 'header_sticky_logo' );
        }
        
        ?>
        <?php $is_home_page = get_post_meta(get_the_ID(), 'is_home_page', true); ?>
        <?php if (is_front_page() || $is_home_page): ?>
            <h1 class="logo d-flex align-items-center">
        <?php else:?>
            <h2 class="logo d-flex align-items-center">
        <?php endif; ?>
            <?php if(isset($logo) && $logo ): ?>
                <a class="logo-default" href="<?php echo esc_url(home_url('/')); ?>"><img src="<?php echo esc_url($logo);?>" alt="<?php echo esc_attr(get_bloginfo('name', 'display')) ?>"></a>
            <?php else: ?>
                <a class="logo-default" href="<?php echo esc_url(home_url('/')); ?>"><?php echo esc_attr(get_bloginfo('name', 'display')) ?></a>
            <?php endif; ?>
            <?php if($show_sticky): ?>
                <?php if(isset($logo_header_is_sticky) && $logo_header_is_sticky ): ?>
                <a class="logo-sticky" href="<?php echo esc_url(home_url('/')); ?>"><img src="<?php echo esc_url($logo_header_is_sticky);?>" alt="<?php echo esc_attr(get_bloginfo('name', 'display')) ?>"></a>
                <?php else: ?>
                    <a class="logo-sticky" href="<?php echo esc_url(home_url('/')); ?>"><?php echo esc_attr(get_bloginfo('name', 'display')) ?></a>
                <?php endif; ?>
            <?php endif?>
       <?php if (is_front_page() || $is_home_page): ?>
            </h1>
        <?php else:?>
            </h2>
        <?php endif?>
        <?php 
    }
    
    public static function get_logo_mobile(){
        $logo_header = Arangi::setting( 'header_mobile_select_logo' );
        ?>
        <h2 class="mobile-logo d-flex align-items-center">
            <a href="<?php echo esc_url(home_url('/')); ?>"><img src="<?php echo esc_url($logo_header);?>" alt="<?php echo esc_attr(get_bloginfo('name', 'display')) ?>"/></a>
        </h2>
        <?php 
    }
    public static function get_search_box(){
        ?>
        <div class="search-box">
            <div class="search-box__header-container">
                <div class="container">
                    <div class="search-box__header row">
                        <div class="search-box__title col-xl-6 col-lg-6 col-md-6 col-sm-6 col-xs-10">
                            <p><?php echo esc_html__('What are you Looking for?', 'arangi')?></p>
                        </div>
                        <div class="search-box__close col-xl-6 col-lg-6 col-md-6 col-sm-6 col-xs-2 text-right">
                            <span class="close-search-box"><i class="ti-close"></i></span>
                        </div>
                    </div>
                </div>
            </div>
            <!--./search-box_header-container-->
            <div class="search-box__content">
                <div class="container">
                    <?php self::header_search(); ?>
                </div>
            </div>
        </div>
        <?php
    }
    public static function get_search_header_4(){
        ?>
        <div class="search-header4">
            <?php self::header_search(); ?>
        </div>
        <?php
    }
    public static function search_category(){
        $header_search_type = Arangi::setting('header_search');
        $show_search_category = Arangi::setting('show_search_category');
        ?>
        <div class="header-search-category">
        <?php
        if (!class_exists('Woocommerce')):?>
            <form role="search" method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
                <input type="search" autocomplete="off" class="search-field search_default" placeholder="<?php esc_html_e('Search entire store here ...','arangi')?>" value="" name="s" title="<?php esc_html_e('Enter your keywords','arangi')?>">
                <div class="search-submit">
                    <button type="submit"><i class="ti-search"></i></button>
                </div>
            </form>
        <?php
            else:
                if ($header_search_type == 'product'){
                    $arangi_terms = get_terms( 'product_cat');
                }else{
                    $arangi_terms = get_terms( 'category');
                }
            ?>
                <form role="search" method="get" class="woocommerce-product-search" action="<?php echo esc_url( home_url( '/' ) ); ?>">

                    <div class="block-search-cate">
                    <?php
                    if ($show_search_category){
                    if ( ! empty( $arangi_terms ) && ! is_wp_error( $arangi_terms ) ){
                        echo '<div class="category_dropdown">';
                        echo '<button class="chosen-single" type="button"><span>'. esc_html__('All categories','arangi').'</span><i class="ti-angle-down"></i></button>';
                        echo '<ul class="chosen-results">';
                        echo '<li>' . esc_html__('All categories','arangi') . '</li>';
                        foreach ( $arangi_terms as $term ) {
                            echo '<li data-val='. $term->slug .'>' . $term->name . '</li>';
                        }
                        echo '</ul>';
                        echo '</div>';
                    }}
                    ?>

                    <input type="search" autocomplete="off" id="woocommerce-product-search-field" class="search-field" placeholder="<?php esc_html_e('Search entire store here ...','arangi')?>" value="" name="s" title="<?php esc_html_e('Enter your keywords','arangi')?>">
                    </div>
                    <button type="submit"><i class="ti-search"></i></button>
                    <input type="hidden" name="post_type" value="product">
                    <input type="hidden" name="product_cat" value="">
                    <div class="auto_ajax_search"></div>
                </form>
            <?php endif; ?>
        </div>
        <?php
    }
    public static function mobile_menu(){
        ?>
        <div class="menu-mobile">
            <?php
            $logo_mobile = Arangi::setting('header_mobile_logo');
            ?>
            <div class="menu-mobile-content">
                <div class="top-mobile d-flex align-items-center">
                    <div class="close-menu-mobile d-flex align-items-center">
                        <div class="close-menu btn-menu">
                            <?php self::get_menu_icon();?>
                        </div>
                    </div>
                    <?php if($logo_mobile == 'show'){ ?>
                        <?php Arangi_Templates::get_logo_mobile(); ?>
                    <?php } ?>
                    <div class ="search-header  d-flex align-items-center">
                        <div class="icon-header btn-search">
                            <i class="ti-search"></i>
                        </div>
                    </div>
                </div>
                <div class="mobile-content">
                    <nav class="main-navigation">
                        <?php Arangi::menu_mobile(); ?>
                    </nav>
                </div>
                <?php
                $cart_mobile = Arangi::setting('header_mobile_cart');
                $acount_mobile = Arangi::setting('header_mobile_acount');
                $phone_mobile = Arangi::setting('header_mobile_phone');
                $phone_contact = Arangi::setting('phone_contact');
                $phone_language = Arangi::setting('header_mobile_language');
                ?>
                <?php if ($cart_mobile || $acount_mobile || $phone_mobile || $phone_language){?>
                    <div class="mobile-tool d-flex">
                        <div class="mobile-tool-left d-flex">
                            <?php if($cart_mobile == 'show'){ ?>
                                <div class="cart-mobile">
                                    <?php Arangi_Templates::get_minicart_template(); ?>
                                </div>
                            <?php } ?>
                            <?php if($acount_mobile == 'show'){ ?>
                                <?php self::get_setting_template();?>
                            <?php } ?>
                            <?php if($phone_mobile == 'show'){ ?>
                                <div class="phone-mobile">
                                    <a href="tel:<?php echo esc_attr($phone_contact)?>"><i class="icon-phone"></i></a>
                                </div>
                            <?php } ?>
                        </div>
                        <?php if($phone_language == 'show'){?>
                            <div class="mobile-tool-right d-flex justify-content-end">
                                <?php if (class_exists('SitePress')) {
                                    Arangi_WPML::show_language_dropdown();
                                }else{
                                    Arangi_WPML::show_language_dropdown_demo();
                                }?>
                            </div>
                        <?php }?>
                    </div>
                <?php }?>
            </div>
        </div>
        <?php
    }
    public static function header_social_networks(){
        $type = Arangi_Global::instance()->set_header_type();
        $social_enable = Arangi::setting("header_style_{$type}_social_enable");

        ?>
        <?php if ($social_enable === '1') : ?>
            <div class="header-social-networks">
                <?php if ($type === '14') : ?>
                    <?php self::social_icons(array(
                        'display' => 'text',
                        'link_classes' => 'fall-down-effect',
                        'tooltip_enable' => false,
                        )); ?>
                    <?php else : ?>
                        <?php self::social_icons(array(
                            'tooltip_position' => 'bottom',
                            )); ?>
                    <?php endif; ?>
                </div>
        <?php endif; ?>
         <?php
    }
    public static function footer($footer_type = ''){
        $footer_type = Arangi_Global::instance()->set_footer_type();
        get_template_part('footers/footer', $footer_type);
    }

    public static function footer_logo()
    {
        $logo_url = '';
        $logo_footer_url = Arangi::setting('logo_footer');
        ?>
        <div class="footer-logo">
            <a href="<?php echo esc_url(home_url('/')); ?>" rel="home">
                <?php if ($logo_footer_url !== '') { ?>
                <img src="<?php echo esc_url($logo_footer_url); ?>"
                alt="<?php bloginfo('name'); ?>" class="footer-logo">
                <?php } ?>
            </a>
        </div>
        <?php
    }
	
	public static function get_product_single_style(){
        $single_layout = get_post_meta(get_the_id(), 'meta_single_style', true);
        if ( $single_layout &&  $single_layout !== 'default'){
            $single_type = $single_layout;
        }elseif(Arangi::setting('single_style')){
            $single_type = Arangi::setting('single_style');
        }else{
            $single_type = 'single_1';
        }
        return $single_type;
    }
    
    public static function get_product_main_layout(){
        $main_shop_layout = get_post_meta(get_the_id(), 'meta_main_shop', true);
        if ( $main_shop_layout &&  $main_shop_layout !== 'default'){
            $main_shop_layout = $main_shop_layout;
        }elseif(Arangi::setting('general_shop_main')){
            $main_shop_layout = Arangi::setting('general_shop_main');
        }else{
            $main_shop_layout = '';
        }
        return $main_shop_layout;
    }
    
    public static function get_main_layout(){
        $main_layout = arangi_get_meta_value('main_layout', false);
        if (is_category()){
            $main_layout = arangi_get_meta_value('post_main_layout', false);
        }elseif ( is_tax('product_cat')){
            $main_layout = arangi_get_meta_value('product_main_layout', false);
        }elseif ( $main_layout &&  $main_layout !== 'default'){
            $main_layout = $main_layout;
        }else{
            $main_layout = Arangi::setting('layout_main_layout');
        }
        return $main_layout;
	}

    public static function paging_nav($query = false)
    {
        global $wp_query, $wp_rewrite;
        if ($query === false) {
            $query = $wp_query;
        }

// Don't print empty markup if there's only one page.
        if ($query->max_num_pages < 2) {
            return;
        }

        if (get_query_var('paged')) {
            $paged = get_query_var('paged');
        } elseif (get_query_var('page')) {
            $paged = get_query_var('page');
        } else {
            $paged = 1;
        }

        $page_num_link = html_entity_decode(get_pagenum_link());
        $query_args = array();
        $url_parts = explode('?', $page_num_link);

        if (isset($url_parts[1])) {
            wp_parse_str($url_parts[1], $query_args);
        }

        $page_num_link = esc_url(remove_query_arg(array_keys($query_args), $page_num_link));
        $page_num_link = trailingslashit($page_num_link) . '%_%';

        $format = '';
        if ($wp_rewrite->using_index_permalinks() && !strpos($page_num_link, 'index.php')) {
            $format = 'index.php/';
        }
        if ($wp_rewrite->using_permalinks()) {
            $format .= user_trailingslashit($wp_rewrite->pagination_base . '/%#%', 'paged');
        } else {
            $format .= '?paged=%#%';
        }

// Set up paginated links.

        $args = array(
            'base' => $page_num_link,
            'format' => $format,
            'total' => $query->max_num_pages,
            'current' => max(1, $paged),
            'mid_size' => 1,
            'add_args' => array_map('urlencode', $query_args),
            'prev_text' => esc_html__('Prev', 'arangi'),
            'next_text' => esc_html__('Next', 'arangi'),
            'type' => 'array',
        );
        $pages = paginate_links($args);

        if (is_array($pages)) {
            echo '<ul class="page-pagination">';
            foreach ($pages as $page) {
                printf('<li>%s</li>', $page);
            }
            echo '</ul>';
        }
    }
    public static function paging_nav_shop($query = false){
        $links = paginate_links( array(
            'prev_next'          => false,
            'type'               => 'array'
        ) );

        if ( $links ) :
            echo '<nav class="woocommerce-pagination">';
            echo '<ul class="page-numbers">';

            // get_previous_posts_link will return a string or void if no link is set.
            if ( $prev_posts_link = get_previous_posts_link( __( 'Previous','arangi' ) ) ) :
                echo '<li class="prev-list-item">';
                echo esc_attr( $prev_posts_link );
                echo '</li>';
            endif;
            // get_next_posts_link will return a string or void if no link is set.
            if ( $next_posts_link = get_next_posts_link( __( 'Next','arangi' ) ) ) :
                echo '<li class="next-list-item">';
                echo esc_attr( $next_posts_link );
                echo '</li>';
            endif;
            echo '<li>';
            echo join( '</li><li>', $links );
            echo '</li>';
            echo '</ul>';
            echo '</nav>';
        endif;
    }
    public static function page_links()
    {
        wp_link_pages(array(
            'before' => '<div class="page-links">',
            'after' => '</div>',
            'link_before' => '<span>',
            'link_after' => '</span>',
            'nextpagelink' => esc_html__('Next', 'arangi'),
            'previouspagelink' => esc_html__('Prev', 'arangi'),
        ));
    }

    public static function post_nav_links()
    {
        $args = array(
            'prev_text' => '%title',
            'next_text' => '%title',
            'in_same_term' => false,
            'excluded_terms' => '',
            'taxonomy' => 'category',
            'screen_reader_text' => esc_html__('Post navigation', 'arangi'),
        );

        $previous = get_previous_post_link('<div class="nav-previous">%link</div>', $args['prev_text'], $args['in_same_term'], $args['excluded_terms'], $args['taxonomy']);

        $next = get_next_post_link('<div class="nav-next">%link</div>', $args['next_text'], $args['in_same_term'], $args['excluded_terms'], $args['taxonomy']);

// Only add markup if there's somewhere to navigate to.
        if ($previous || $next) { ?>

        <nav class="navigation post-navigation" role="navigation">

            <?php $return_link = Arangi::setting('single_post_pagination_return_link'); ?>
            <?php if ($return_link !== '') : ?>
                <a href="<?php echo esc_url($return_link); ?>" class="return-blog-page"><span
                    class="ion-grid"></span></a>
                <?php endif; ?>

                <?php echo '<h2 class="screen-reader-text">' . $args['screen_reader_text'] . '</h2>'; ?>

                <div class="nav-links">
                    <?php echo '<div class="previous nav-item">' . $previous . '</div>'; ?>
                    <?php echo '<div class="next nav-item">' . $next . '</div>'; ?>
                </div>
            </nav>
            <?php
        }
    }

    public static function comment_navigation($args = array())
    {
// Are there comments to navigate through?
        if (get_comment_pages_count() > 1 && get_option('page_comments')) {
            $defaults = array(
                'container_id' => '',
                'container_class' => 'navigation comment-navigation',
            );
            $args = wp_parse_args($args, $defaults);
            ?>
            <nav id="<?php echo esc_attr($args['container_id']); ?>"
               class="<?php echo esc_attr($args['container_class']); ?>">
               <h2 class="screen-reader-text"><?php esc_html_e('Comment navigation', 'arangi'); ?></h2>

              <div class="comment-nav-links">
                    <?php
                        if ( $prev_link = get_previous_comments_link( __( 'Prev', 'arangi' ) ) ) :
                            printf( '<div class="nav-previous">%s</div>', $prev_link );
                        endif;

                        if ( $next_link = get_next_comments_link( __( 'Next', 'arangi' ) ) ) :
                            printf( '<div class="nav-next">%s</div>', $next_link );
                        endif;
                    ?>
                </div><!-- .nav-links -->
            </nav>
            <?php
        }
        ?>
        <?php
    }

    public static function comment_template($comment, $args, $depth)
    {
        $GLOBALS['comment'] = $comment;
        ?>
        <li <?php comment_class(); ?> id="li-comment-<?php comment_ID() ?>">
            <div class="comment-item" id="comment-<?php comment_ID(); ?>">
                    <div class="comment-content">
                        <div class="comment-datetime">
                            <?php 
                                $d = "d";
                                $m = "M";
                                $comment_day = get_comment_date( $d, $comment );
                                $comment_month = get_comment_date( $m, $comment );
                            ?>
                                <p class="date"><?php echo esc_attr( $comment_day ) ?></p>
                                <p class="month"><?php echo esc_attr( $comment_month ) ?></p>
                        </div>
                        <div class="comment-text">
                            <?php comment_text() ; ?>
                            <div class="box-info-comment">
                                <div class="img-author">
                                    <?php echo get_avatar( $comment);?>
                                </div>
                                <?php printf('<span class="name-author">%s</span>', get_comment_author_link()); ?>
                            </div>
                        </div>
                        
                    </div>
                    <div class="comment-actions">
                        <div class="comment-reply">
                        <?php comment_reply_link(array_merge($args, array(
                            'depth' => $depth,
                            'max_depth' => $args['max_depth'],
                            'reply_text' => esc_html__('Reply&nbsp;','arangi') . '<i class="fa fa-reply"></i>',
                            ))); ?>
                            <?php edit_comment_link('<i class="fa fa-edit"></i>'); ?>
                        </div>
                    </div>
                 <?php if ($comment->comment_approved == '0') : ?>
                    <em class="comment-awaiting-messages"><?php esc_html_e('Your comment is awaiting moderation.', 'arangi') ?></em>
                    <br/>
                <?php endif; ?>
            </div>
        <?php
    }

    public static function comment_form(){
        $commenter = wp_get_current_commenter();
        $req = get_option( 'require_name_email' );
        $aria_req = ( $req ? " aria-required='true'" : '' );
        $comment_login='';
        if ( is_user_logged_in() ) {$comment_login="comment-field-login";}

        $comment_args = array( 
            'class_form' => 'commentform ',
            'fields' => apply_filters( 'comment_form_default_fields', array(
                'author' => '<div class="comment-field fields row">
                <div class="col-md-6 col-sm-12 col-xs-12 inner-info comment-form-author ">'.'<label for="author">' . __( 'Name*','arangi' ) . '</label> ' .'<input id="author" class="required" name="author" type="text" value="' .
                esc_attr( $commenter['comment_author'] ) . '" size="30"' . $aria_req . ' />' .
                '</div>',
                'email'  => '<div class="col-md-6 col-sm-12 col-xs-12 inner-info comment-form-email ">'.'<label for="author">' . __( 'Email*','arangi' ) . '</label> ' . '<input id="email" class="required email" name="email" type="text" value="' . esc_attr(  $commenter['comment_author_email'] ) . '" size="30"' . $aria_req . ' />' .
                '</div>',
                '</div>',
                'url'    => '' ) ),
            'comment_field' => '<div class=" comment-textarea"><div class="comment-right-field ' . $comment_login.' ">' .'<label for="author">' . __( 'Enter your comment here...','arangi' ) . '</label> ' .
            '<textarea id="comment" class="required" name="comment" cols="45" rows="4" aria-required="true" placeholder="' .esc_attr__('', 'arangi' ) . '"></textarea>' .
            '</div></div>',
            'title_reply'  => esc_html__( 'Write a comment','arangi' ),
            'cancel_reply_link' => esc_html__('Cancel reply','arangi'),

            'logged_in_as' => '',
            'comment_notes_before' => '',
            'class_submit'         => 'btn btn-primary btn-radius',
            'label_submit'      => esc_html__('Post comment','arangi'),
            'comment_notes_after' => '',
        );

        comment_form($comment_args);
    }

    public static function post_author()
    {
        ?>
        <div class="entry-author">
            <div class="author-info">
                <div class="author-avatar">
                    <?php echo get_avatar(get_the_author_meta('email'), '90'); ?>
                </div>
                <div class="author-description">
                    <h5 class="author-name"><?php the_author(); ?></h5>
                    <div class="author-biographical-info">
                        <?php the_author_meta('description'); ?>
                    </div>
                </div>
            </div>
            <?php
            $email_address = get_the_author_meta('email_address');
            $facebook = get_the_author_meta('facebook');
            $twitter = get_the_author_meta('twitter');
            $google_plus = get_the_author_meta('google_plus');
            $instagram = get_the_author_meta('instagram');
            $linkedin = get_the_author_meta('linkedin');
            $pinterest = get_the_author_meta('pinterest');
            ?>
            <?php if ($facebook || $twitter || $google_plus || $instagram || $linkedin || $email_address) : ?>
                <div class="author-social-networks">
                    <?php if ($email_address) : ?>
                        <a class="hint--bounce hint--top"
                            aria-label="<?php echo esc_html__('Email', 'arangi') ?>"
                            href="mailto:<?php echo esc_url($email_address); ?>" target="_blank">
                            <i class="ion-email"></i>
                        </a>
                    <?php endif; ?>

                    <?php if ($facebook) : ?>
                        <a class="hint--bounce hint--top"
                        aria-label="<?php echo esc_html__('Facebook', 'arangi') ?>"
                        href="<?php echo esc_url($facebook); ?>" target="_blank">
                            <i class="ion-social-facebook"></i>
                        </a>
                     <?php endif; ?>
                    <?php if ($twitter) : ?>
                        <a class="hint--bounce hint--top"
                            aria-label="<?php echo esc_html__('Twitter', 'arangi') ?>"
                            href="<?php echo esc_url($twitter); ?>" target="_blank">
                            <i class="ion-social-twitter"></i>
                        </a>
                    <?php endif; ?>

                    <?php if ($google_plus) : ?>
                        <a class="hint--bounce hint--top"
                        aria-label="<?php echo esc_html__('Google +', 'arangi') ?>"
                        href="<?php echo esc_url($google_plus); ?>" target="_blank">
                            <i class="ion-social-googleplus"></i>
                        </a>
                    <?php endif; ?>

                    <?php if ($instagram) : ?>
                        <a class="hint--bounce hint--top"
                        aria-label="<?php echo esc_html__('Instagram', 'arangi') ?>"
                        href="<?php echo esc_url($google_plus); ?>" target="_blank">
                            <i class="ion-social-instagram-outline"></i>
                        </a>
                    <?php endif; ?>

                    <?php if ($linkedin) : ?>
                        <a class="hint--bounce hint--top"
                        aria-label="<?php echo esc_html__('Linkedin', 'arangi') ?>"
                        href="<?php echo esc_url($linkedin); ?>" target="_blank">
                            <i class="ion-social-linkedin"></i>
                        </a>
                    <?php endif; ?>

                    <?php if ($pinterest) : ?>
                        <a class="hint--bounce hint--top"
                        aria-label="<?php echo esc_html__('Pinterest', 'arangi') ?>"
                        href="<?php echo esc_url($pinterest); ?>" target="_blank">
                        <i class="ion-social-pinterest"></i>
                        </a>
                    <?php endif; ?>
                </div>
            <?php endif; ?>
        </div>
    <?php
    }

    public static function post_sharing($args = array())
    {
        $social_sharing = Arangi::setting('single_post_item_enable');
        if (!empty($social_sharing)) {
            ?>
            <div class="post-share">
                <div class="post-share-toggle">
                    <span class="ion-android-share-alt"></span>
                    <div class="post-share-list">
                        <?php self::get_sharing_list($args); ?>
                    </div>
                </div>
            </div>
            <?php
        }
    }

    public static function product_sharing($args = array())
    {
        ?>
		<div class="product-share meta-item">
			<div class="product-sharing-list"><?php self::get_sharing_list($args); ?></div>
		</div>
		<?php
    }

    public static function get_sharing_list($args = array()){
        $defaults = array(
            'target' => '_blank',
        );
        $args = wp_parse_args($args, $defaults);
        $social_sharing = Arangi::setting('single_post_item_enable');
        $arangi_single_post_item_enable = Arangi::setting('single_product_sharing_multi');
        if (!empty($social_sharing)) {
            foreach ($social_sharing as $social) {
                if ($social === 'facebook' && isset($arangi_single_post_item_enable) && in_array('fb', $arangi_single_post_item_enable)) {
                        if (!wp_is_mobile()) {
                            $facebook_url = 'http://www.facebook.com/sharer.php?m2w&s=100&p&#91;url&#93;=' . rawurlencode(get_permalink()) . '&p&#91;images&#93;&#91;0&#93;=' . wp_get_attachment_url(get_post_thumbnail_id(get_the_ID())) . '&p&#91;title&#93;=' . rawurlencode(get_the_title());
                        } else {
                            $facebook_url = 'https://m.facebook.com/sharer.php?u=' . rawurlencode(get_permalink());
                        }
                        ?>
                        <a class="facebook" target="<?php echo esc_attr($args['target']); ?>"
							 aria-label="<?php echo esc_html__('Facebook', 'arangi') ?>"
							 href="<?php echo esc_url($facebook_url); ?>">
							 <i class="ti-facebook"></i>
						</a>
                     <?php
                } elseif ($social === 'twitter' && isset($arangi_single_post_item_enable) && in_array('tw', $arangi_single_post_item_enable)) {
                    ?>
                    <a class="twitter" target="<?php echo esc_attr($args['target']); ?>"
						 aria-label="<?php echo esc_html__('Twitter', 'arangi') ?>"
						 href="https://twitter.com/share?text=<?php echo rawurlencode(html_entity_decode(get_the_title(), ENT_COMPAT, 'UTF-8')); ?>&url=<?php echo rawurlencode(get_permalink()); ?>">
						 <i class="ti-twitter-alt"></i>
					</a>
					<?php
                }elseif ($social === 'google_plus' && isset($arangi_single_post_item_enable) && in_array('gg', $arangi_single_post_item_enable)) {
                    ?>
                    <a class="google-plus"
						target="<?php echo esc_attr($args['target']); ?>"
						aria-label="<?php echo esc_html__('Google+', 'arangi') ?>"
						href="https://plus.google.com/share?url=<?php echo rawurlencode(get_permalink()); ?>">
						<i class="ti-google"></i>
					</a>
                <?php
                }elseif ($social === 'pinterest' && isset($arangi_single_post_item_enable) && in_array('pin', $arangi_single_post_item_enable)) {
                    ?>
                    <a class="pinterest"
                        target="<?php echo esc_attr($args['target']); ?>"
                        aria-label="<?php echo esc_html__('Pinterest', 'arangi') ?>"
                        href="https://pinterest.com/share?url=<?php echo rawurlencode(get_permalink()); ?>">
                        <i class="ti-pinterest"></i>
                    </a>
                <?php
                }  
            }
        }
    }
    
    public static function social_icons($args = array()){
        $defaults = array(
            'link_classes' => '',
            'display' => 'icon',
            'tooltip_enable' => true,
            'tooltip_position' => 'top',
        );
        $args = wp_parse_args($args, $defaults);
        $social_config = Arangi::setting('social_config');
        $social_link = Arangi::setting('social_links');

        if (!empty($social_link) && $social_config === '1') {
            $social_link_target = Arangi::setting('social_link_target');

            $args['link_classes'] .= ' social-link';
            if ($args['tooltip_enable']) {
                $args['link_classes'] .= ' hint-bounce';
                $args['link_classes'] .= " hint-{$args['tooltip_position']}";
            }
            echo '<ul class="list-social">';
            foreach ($social_link as $key => $row_values) {
                if ($row_values['link_url'] !== '') {
                    ?>
                    <li>
                        <a class="<?php echo esc_attr($args['link_classes']); ?>"
                            <?php if ($args['tooltip_enable']) : ?>
                                aria-label="<?php echo esc_attr($row_values['tooltip']); ?>"
                            <?php endif; ?>
                            href="<?php echo esc_url($row_values['link_url']); ?>"
                            data-hover="<?php echo esc_attr($row_values['tooltip']); ?>"
                            <?php if ($social_link_target === '1') : ?>
                                target="_blank"
                            <?php endif; ?>
                            >
                            <?php if (in_array($args['display'], array('icon', 'icon_text'), true)) : ?>
                                <i class="social-icon <?php echo esc_attr($row_values['icon_class']); ?>"></i>
                            <?php endif; ?>
                            <?php if (in_array($args['display'], array('text', 'icon_text'), true)) : ?>
                                <span class="social-text"><?php echo esc_html($row_values['tooltip']); ?></span>
                            <?php endif; ?>
                        </a>
                    </li>
                    <?php
                }
            }
             echo '</ul>';
        }
    }

    public static function topbar($arg = array()){
        $link = Arangi::setting('row_1_content_4');
        $title_row_1 = Arangi::setting('row_1_content_1');
        $icon_class_row_1 = Arangi::setting('row_1_content_2');
        $content_row_1 = Arangi::setting('row_1_content_3');
        $title_row_2 = Arangi::setting('row_2_content_1');
        $icon_class_row_2 = Arangi::setting('row_2_content_2');
        $content_row_2 = Arangi::setting('row_2_content_3');
        $title_row_3 = Arangi::setting('row_3_content_1');
        $icon_class_row_3 = Arangi::setting('row_3_content_2');
        $content_row_3 = Arangi::setting('row_3_content_3');
        ?>
        <div class="row">
            <?php if (isset($arg['topbar_left']) && $arg['topbar_left'] ) { ?>
            <div class="<?php if(isset($arg['topbar_right']) && !$arg['topbar_right']) { echo 'col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12';} else { echo 'col-12 col-sm-12 col-md-7 col-lg-8 col-xl-8';} ?>">
                <div class="cont d-flex align-items-center">
                    <div class="info-part d-flex">
                        <?php if(isset($icon_class_row_1) && $icon_class_row_1 != ''): ?>
                            <div class="icon align-self-center">
                                <i class="<?php echo esc_attr($icon_class_row_1); ?>"></i>
                            </div>
                        <?php endif; ?>
                        <div class="details align-self-center">
                            <div class="title-topbar">
                                <?php if((in_array('sitepress-multilingual-cms/sitepress.php', apply_filters('active_plugins', get_option('active_plugins')))) && function_exists('icl_object_id') ): ?>
                                    <?php echo esc_html__('Find us','arangi'); ?>
                                <?php elseif(isset($title_row_1) && $title_row_1 != ''): ?>
                                    <?php echo esc_attr($title_row_1); ?>
                                <?php endif; ?>
                            </div>
                            <div class="content-topbar">
                                <?php if((in_array('sitepress-multilingual-cms/sitepress.php', apply_filters('active_plugins', get_option('active_plugins')))) && function_exists('icl_object_id') ): ?>
                                    <?php echo esc_html__('325 admiral unit, North cost, USA ','arangi'); ?>
                                <?php elseif($content_row_1 != ''): ?>
                                    <?php if (isset($link) && $link != '') : ?>
                                        <a href="<?php echo esc_url($link) ?>"><?php echo esc_attr($content_row_1) ?></a>
                                    <?php else: ?>
                                        <?php echo esc_attr($content_row_1); ?>
                                    <?php endif; ?>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                    <div class="info-part d-flex">
                        <?php if(isset($icon_class_row_2) && $icon_class_row_2 != ''): ?>
                            <div class="icon align-self-center">
                                <i class="<?php echo esc_attr($icon_class_row_2); ?>"></i>
                            </div>
                        <?php endif; ?>
                        <div class="details align-self-center">
                            <div class="title-topbar">
                                <?php if((in_array('sitepress-multilingual-cms/sitepress.php', apply_filters('active_plugins', get_option('active_plugins')))) && function_exists('icl_object_id') ): ?>
                                    <?php echo esc_html__('Email us','arangi'); ?>
                                <?php elseif(isset($title_row_2) && $title_row_2 != ''): ?>
                                    <?php echo esc_attr($title_row_2); ?>
                                <?php endif; ?>
                            </div>
                            <div class="content-topbar">
                                <?php if((in_array('sitepress-multilingual-cms/sitepress.php', apply_filters('active_plugins', get_option('active_plugins')))) && function_exists('icl_object_id') ): ?>
                                    <a href="mailto:<?php echo esc_html__('admin@arangi.com','arangi'); ?>"><?php echo esc_html__('admin@arangi.com','arangi'); ?></a>
                                <?php elseif($content_row_2 != ''): ?>
                                    <a href="mailto:<?php echo esc_attr($content_row_2) ?>"><?php echo esc_attr($content_row_2) ?></a>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                    <div class="info-part d-flex">
                        <?php if(isset($icon_class_row_3) && $icon_class_row_3 != ''): ?>
                            <div class="icon align-self-center">
                                <i class="<?php echo esc_attr($icon_class_row_3); ?>"></i>
                            </div>
                        <?php endif; ?>
                        <div class="details align-self-center">
                            <div class="title-topbar">
                                <?php if((in_array('sitepress-multilingual-cms/sitepress.php', apply_filters('active_plugins', get_option('active_plugins')))) && function_exists('icl_object_id') ): ?>
                                    <?php echo esc_html__('Call us now','arangi'); ?>
                                <?php elseif(isset($title_row_3) && $title_row_3 != ''): ?>
                                    <?php echo esc_attr($title_row_3); ?>
                                <?php endif; ?>
                            </div>
                            <div class="content-topbar">
                                <?php if((in_array('sitepress-multilingual-cms/sitepress.php', apply_filters('active_plugins', get_option('active_plugins')))) && function_exists('icl_object_id') ): ?>
                                    <a href="tel:<?php echo esc_html__('00201008431112','arangi'); ?>"><?php echo esc_html__('002 - 01008431112','arangi'); ?></a>
                                <?php elseif($content_row_3 != ''): ?>
                                    <a href="tel:<?php echo esc_attr($content_row_3) ?>"><?php echo esc_attr($content_row_3) ?></a>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php } ?>
            <?php if (isset($arg['topbar_right']) && $arg['topbar_right']) { ?>
            <div class="<?php if(isset($arg['topbar_left']) && !$arg['topbar_left']){ echo 'col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12'; } else { echo 'col-12 col-sm-12 col-md-5 col-lg-4 col-xl-4'; }?> d-flex justify-content-end">
                <?php if (  isset($arg['lang']) && 
                            $arg['lang'] ) {
                    Arangi_WPML::show_language_dropdown(); } ?>
                    <?php 
                        if ( !empty($arg) &&
                                isset($arg['account']) &&
                                $arg['account'] ) { ?>
                        <div class="account align-self-center">
                            <?php 
                            if ( class_exists( 'arangi' )) {
                                $myaccount_page_id = get_option('woocommerce_myaccount_page_id');
                            }else{
                                $myaccount_page_id = wp_login_url();
                            }
                            $logout_url = wp_logout_url(get_permalink($myaccount_page_id));
                            if (get_option('woocommerce_force_ssl_checkout') == 'yes') {
                                $logout_url = str_replace('http:', 'https:', $logout_url);
                            }
                            ?>
                            <div class="top-link display-inline">
                                <ul class="top-link-content"> 
                                    <?php if (!is_user_logged_in()): ?>
                                        <li class="customlinks"><a href="<?php echo esc_url(get_permalink($myaccount_page_id)); ?>"><?php echo esc_html__('Login / Register', 'arangi') ?></a></li>
                                    <?php else: ?>
                                        <li class="customlinks"><a href="<?php echo esc_url(get_permalink($myaccount_page_id)); ?>"><?php echo esc_html__('My Account', 'arangi') ?></a></li>
                                    <?php endif; ?>                             
                                </ul>
                            </div>
                        </div>
                        <?php } ?>
                    </div>
                    <?php } ?>
            </div>
        <?php
    }
    public static function topbar_mobile($arg = array()){
        $link = Arangi::setting('row_1_content_4');
        $topbar_left_contents = array(


            array(
                'title'         => Arangi::setting('row_3_content_1'),
                'icon_class'    => Arangi::setting('row_3_content_2'),
                'content'       => Arangi::setting('row_3_content_3'),
            ),
        );
        ?>
        <div class="cont">
            <?php foreach ($topbar_left_contents as $content) {
                if ($content['content'] != '') { ?>
                <div class="info-part d-flex">
                    <div class="icon align-self-center">
                        <i class="<?php echo esc_attr($content['icon_class']); ?>"></i>
                    </div>
                    <div class="details align-self-center">
                        <?php if ($content['title'] != '') {
                        ?>
                        <div class="title-topbar">
                            <?php echo esc_attr($content['title']); ?>
                        </div>
                        <?php } ?>
                        <?php if ($content['title'] == 'Find us'):?>
                            <div class="content-topbar">
                                <?php
                                if (isset($link) && $link != '') {
                                ?>
                                <a href="<?php echo esc_attr($content['content']) ?>"><?php echo esc_attr($content['content']) ?></a>
                                <?php
                                } else {
                                    echo esc_attr($content['content']); 
                                }?>
                            </div>
                        <?php elseif($content['title'] == 'Email us'): ?>
                            <div class="content-topbar">
                                <a href="mailto:<?php echo esc_attr($content['content']); ?>">
                                    <?php echo esc_attr($content['content']); ?>
                                </a>
                            </div>
                        <?php elseif($content['title'] == 'Call us now'): ?>
                            <div class="content-topbar">
                                <a href="callto:<?php echo esc_attr($content['content']); ?>">
                                    <?php echo esc_attr($content['content']); ?>
                                </a>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            <?php } ?>
            <?php } ?>
        </div>
        <?php
    }
    
    public static function header_search($arg = array()){       
        $arangi_search_template = arangi_get_search_form();
        echo '<div class="search-block-top header-search">' .wp_kses($arangi_search_template, arangi_allow_html()) . '</div>';
    }

    public static function get_menu_icon() {
        ?>
        <a href="javascript:void(null);" class="icon-list">
            <span class="path1"></span>
            <span class="path2"></span>
            <span class="path3"></span>
            <span class="path4"></span>
            <span class="path5"></span>
            <span class="path6"></span>
            <span class="path7"></span>
            <span class="path8"></span>
            <span class="path9"></span>
            <span class="path10"></span>
            <span class="path11"></span>
            <span class="path12"></span>
            <span class="path13"></span>
            <span class="path14"></span>
            <span class="path15"></span>
        </a>
        <?php
    }

    public static function get_category(){
        $type = Arangi_Global::instance()->set_header_type();
        $category_title = Arangi::setting('category_title');
        $category_title_2 = Arangi::setting('category_title_2');
        ?>
        <div class="categories d-flex <?php if($type == '1') { echo esc_attr('align-items-center'); } ?>">
            <div class="category_bar">
                <div class="bars"></div>
                <div class="bars"></div>
                <div class="bars"></div>
            </div>
            <div class="category-title">
                <p>
                    <?php
                    if((in_array('sitepress-multilingual-cms/sitepress.php', apply_filters('active_plugins', get_option('active_plugins')))) && function_exists('icl_object_id')) {
                        echo esc_html__('Categories', 'arangi');
                    } else {
                        if ($type == '1') {
                            echo esc_attr($category_title);
                        } elseif ($type == '2') {
                            echo esc_attr($category_title_2);
                        }
                    }
                    ?>
                </p>
            </div>
            <div class="menu-cate">
                <?php Arangi::menu_categories(); ?>
            </div>
        </div>
        <?php
    }


    public static function get_minicart_template($arg = array()){
        if(class_exists( 'WooCommerce' )){
            $cart_item_count = WC()->cart->cart_contents_count;
            $cart_item_qty = WC()->cart->get_cart_total();
            $icon_cart = Arangi::setting('icon_cart');
            $icon_cart_2 = Arangi::setting('icon_cart_2');
            $icon_cart_3 = Arangi::setting('icon_cart_3');
            $icon_cart_4 = Arangi::setting('icon_cart_4');
            $icon_cart_5 = Arangi::setting('icon_cart_5');
            $icon_cart_6 = Arangi::setting('icon_cart_6');
            $header_type = Arangi_Global::instance()->set_header_type();
            ?>
            <div class="cart-header d-inline-block">
                <div class="cart_label">
                    <div class="text-header">
                        <div class="icon-header">
                            <span class="<?php
                            if (!empty($icon_cart) && $header_type == '01') {
                                echo esc_attr( $icon_cart );
                            } elseif (!empty($icon_cart_2) && $header_type == '02') {
                                echo esc_attr( $icon_cart_2 );
                            }elseif (!empty($icon_cart_3) && $header_type == '03') {
                                echo esc_attr( $icon_cart_3 );
                            }elseif (!empty($icon_cart_4) && $header_type == '04') {
                                echo esc_attr( $icon_cart_4 );
                            }elseif (!empty($icon_cart_5) && $header_type == '05') {
                                echo esc_attr( $icon_cart_5 );
                            }elseif (!empty($icon_cart_6) && $header_type == '06') {
                                echo esc_attr( $icon_cart_6 );
                            }
                            ?>"></span>
                        </div>

                        <div class="minicart-content">
                            <?php if($cart_item_count > 0): ?>
                                <?php printf( _n( '<span class="text-items">1</span>', '<span class="text-items">%1$s</span>', $cart_item_count, 'arangi' ),
                                number_format_i18n( $cart_item_count ) ); ?>
                            <?php else: ?>
                                <span class="text-items"><?php echo esc_html__('0','arangi'); ?></span>
                            <?php endif; ?>
                            <p class="cart_qty"><?php echo wp_kses($cart_item_qty,arangi_allow_html());?></p>
                        </div>
                    </div>
                    <?php if($header_type == '05') : ?>
                        <span class="label-cart"><?php echo esc_html__('My Bag','arangi'); ?></span>
                        <?php else: ?>
                        <?php if($cart_item_count > 0): ?>
                            <?php printf( _n( '<span class="count box-label">Cart (1)</span>', '<span class="count box-label">Cart (%1$s)</span>', $cart_item_count, 'arangi' ),
                                number_format_i18n( $cart_item_count ) ); ?>
                            <?php else: ?>
                            <span class="count-items box-label"><?php echo esc_html__('Cart (0)','arangi'); ?></span>
                        <?php endif; ?>
                    <?php endif; ?>
                    
                </div>
                <div class="cart-block content-filter">
                    <div class="widget_shopping_cart_content">
                        <?php woocommerce_mini_cart(); ?>
                    </div>
                </div>
            </div>
            <?php
        }
    }

    public static function get_setting_template($arg = array()){
        $icon_settings = Arangi::setting('icon_settings');
        $icon_settings_2 = Arangi::setting('icon_settings_2');
        $icon_settings_3 = Arangi::setting('icon_settings_3');
        $icon_settings_4 = Arangi::setting('icon_settings_4');
        $icon_settings_5 = Arangi::setting('icon_settings_5');
        $icon_settings_6 = Arangi::setting('icon_settings_6');
        $header_type = Arangi_Global::instance()->set_header_type();
        $arangi_myaccount_page_id = get_option('woocommerce_myaccount_page_id');
        $logout_url = wp_logout_url(get_permalink($arangi_myaccount_page_id));
        if (get_option('woocommerce_force_ssl_checkout') == 'yes') {
            $logout_url = str_replace('http:', 'https:', $logout_url);
        }
        ?>
		<?php  if(class_exists( 'WooCommerce' )): ?>
			<div class="account-header d-inline-block">
				<?php if (!is_user_logged_in() & !is_account_page()) {echo '<a href="#account-popup" data-fancybox>';}
				else{
					?>
                    <a href="<?php echo esc_url(get_permalink($arangi_myaccount_page_id));?>">
                    <?php
				}?><i class="<?php
					if (!empty($icon_settings) && $header_type == '01') {echo esc_attr( $icon_settings );
					} elseif (!empty($icon_settings_2) && $header_type == '02') {echo esc_attr( $icon_settings_2 );
					}elseif (!empty($icon_settings_3) && $header_type == '03') {echo esc_attr( $icon_settings_3 );
					}elseif (!empty($icon_settings_4) && $header_type == '04') {echo esc_attr( $icon_settings_4 );
                    }elseif (!empty($icon_settings_5) && $header_type == '05') {echo esc_attr( $icon_settings_5 );
					}elseif (!empty($icon_settings_6) && $header_type == '06') {echo esc_attr( $icon_settings_6 );
                    }
					?>"></i>
                    <?php if($header_type == '05') : ?>
                        <span class="label-acc"><?php echo esc_html__('Login', 'arangi')?></span>
                        <?php else : ?>
                        <span class="box-label"><?php echo esc_html__('Sign in', 'arangi')?></span>
                    <?php endif; ?>
                </a>
				<?php if (is_user_logged_in()): ?>
					<ul class="content-filter">
						<li class="customlinks"><a href="<?php echo esc_url(get_permalink($arangi_myaccount_page_id)); ?>"><?php echo esc_html__('My Account', 'arangi') ?></a></li>
						<li class="customlinks"><a href="<?php echo esc_url($logout_url) ?>"><?php echo esc_html__('Logout', 'arangi') ?></a></li>
					</ul>
				<?php endif; ?>
			</div>
		<?php endif; ?>
        <?php
    }
	public static function account_popup($arg = array()){
        $setting_popup = Arangi::setting('setting_popup');
        $logo_account = Arangi::setting('account_logo_account');
        $title_login = Arangi::setting('account_title_login');
        $title_register = Arangi::setting('account_title_register');
		?>
			<?php if(isset($setting_popup) && $setting_popup && !is_account_page()): ?>
				<div id="account-popup" class="account-popup">
					<div class="logo-account">
						<img src="<?php echo esc_url($logo_account);?>" alt="<?php echo esc_attr(get_bloginfo('name', 'display')) ?>">
					</div>
					<ul class="nav nav-tabs">
						<li class="nav-item"><a class="nav-link active" data-toggle="tab" href="#login-show">
								<?php if((in_array('sitepress-multilingual-cms/sitepress.php', apply_filters('active_plugins', get_option('active_plugins')))) && function_exists('icl_object_id') ): ?>
									<?php echo esc_html__('Login','arangi'); ?>
								<?php elseif(isset($title_login) && $title_login != ''): ?>
									<?php echo esc_attr($title_login); ?>
								<?php endif; ?>
							</a>
						</li>
						<li class="nav-item"><a class="nav-link" data-toggle="tab" href="#register-show">
								<?php if((in_array('sitepress-multilingual-cms/sitepress.php', apply_filters('active_plugins', get_option('active_plugins')))) && function_exists('icl_object_id') ): ?>
									<?php echo esc_html__('Register','arangi'); ?>
								<?php elseif(isset($title_register) && $title_register != ''): ?>
									<?php echo esc_attr($title_register); ?>
								<?php endif; ?>
							</a>
						</li>
					</ul>
					<div class="tab-content">
						<div class="tab-pane fade show active arangi-login" id="login-show">
							<form class="woocommerce-form woocommerce-form-login login" method="post" name="loginpopopform" id="login">
								<?php do_action( 'woocommerce_login_form_start' ); ?>
                                <div class="status "></div>
                                <?php wp_nonce_field('ajax-login-nonce', 'security'); ?>
								<p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide form-row-user">
									<label for="username"><?php esc_html_e( 'Email', 'arangi' ); ?></label>
									<input type="text" class="woocommerce-Input woocommerce-Input--text input-text required" placeholder="<?php esc_attr_e( 'Arangi@support.com', 'arangi' ); ?>" name="username" id="username" autocomplete="username"  />
								</p>
								<p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide form-row-pass">
									<label for="password"><?php esc_html_e( 'Password', 'arangi' ); ?></label>
                                    <span class="login-password">
									<input class="woocommerce-Input woocommerce-Input--text input-text required" placeholder="<?php esc_attr_e( '*********************', 'arangi' ); ?>" type="password" name="password" id="password" autocomplete="current-password" />
                                    <a href="<?php echo esc_url( wp_lostpassword_url() ); ?>" class="forgot-pass"><?php esc_html_e( 'Forgot password?', 'arangi' ); ?></a>
                                    </span>
                                </p>
                                <p class="form-row sm-login">
                                    <button type="submit" class="woocommerce-Button button" name="submit" value="<?php esc_attr_e( 'Login', 'arangi' ); ?>"><?php esc_html_e( 'Login', 'arangi' ); ?></button>
                                </p>
								<?php do_action( 'woocommerce_login_form' ); ?>
                                <?php wp_nonce_field( 'woocommerce-login', 'woocommerce-login-nonce' ); ?>
                                <label class="checkcontainer">
                                    <?php esc_html_e( 'Remember me', 'arangi' ); ?>
                                    <input class="woocommerce-form__input woocommerce-form__input-checkbox" name="rememberme" type="checkbox" id="rememberme" value="forever" />
                                    <span class="checkmark"></span>
                                </label>
								<?php do_action( 'woocommerce_login_form_end' ); ?>
							</form>

						</div>
						<div class="tab-pane fade" id="register-show">
							<form method="post" class="woocommerce-form woocommerce-form-register register" id="register" action="register" <?php do_action( 'woocommerce_register_form_tag' ); ?> >

                                <?php wp_nonce_field('ajax-register-nonce', 'signonsecurity'); ?>
                                <?php do_action( 'woocommerce_register_form_start' ); ?>
								<?php if ( 'no' === get_option( 'woocommerce_registration_generate_username' ) ) : ?>
                                    <div class="status"></div>
									<p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide form-row-user">
										<label for="reg_username"><?php esc_html_e( 'Username', 'arangi' ); ?></label>
										<input type="text" class="woocommerce-Input woocommerce-Input--text input-text required" placeholder="<?php esc_attr_e( 'Christopher', 'arangi' ); ?>" name="username" id="reg_username" autocomplete="username" value="<?php echo ( ! empty( $_POST['username'] ) ) ? esc_attr( wp_unslash( $_POST['username'] ) ) : ''; ?>" />
									</p>
								<?php endif; ?>
								<p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide form-row-email">
									<label for="reg_email"><?php esc_html_e( 'Email', 'arangi' ); ?></label>
									<input type="email" class="woocommerce-Input woocommerce-Input--text input-text required" name="email" id="reg_email" autocomplete="email" placeholder="<?php esc_attr_e( 'Arangi@support.com', 'arangi' ); ?>" value="<?php echo ( ! empty( $_POST['email'] ) ) ? esc_attr( wp_unslash( $_POST['email'] ) ) : ''; ?>" />
								</p>
								<?php if ( 'no' === get_option( 'woocommerce_registration_generate_password' ) ) : ?>
									<p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide form-row-pass">
										<label for="reg_password"><?php esc_html_e( 'Password', 'arangi' ); ?></label>
                                        <span class="login-password">
                                            <input type="password" class="woocommerce-Input woocommerce-Input--text input-text required" placeholder="<?php esc_attr_e( '*********************', 'arangi' ); ?>" name="password" id="reg_password" autocomplete="new-password" />
                                        </span>
                                    </p>
								<?php endif; ?>
								<?php do_action( 'woocommerce_register_form' ); ?>
								<p class="woocommerce-FormRow form-row justify-content-sm-center">
									<?php wp_nonce_field( 'woocommerce-register', 'woocommerce-register-nonce' ); ?>
									<button type="submit" class="woocommerce-Button button" value="<?php esc_attr_e( 'Register', 'arangi' ); ?>"><?php esc_attr_e( 'Register', 'arangi' ); ?></button>
								</p>
								<?php do_action( 'woocommerce_register_form_end' ); ?>
							</form>
						</div>
					</div>
				</div>
			<?php endif; ?>
        <?php
    }

    public static function payment_links($args = array()){
        $defaults = array(
            'link_classes'      => '',
            'tooltip_enable'    => true,
            'tooltip_position'  => 'top',
            'display'           => 'icon',
            'displayp'          =>'image',
        );
        $args = wp_parse_args($args, $defaults);

        $show_payment = Arangi::setting('show_payment');
        $payment_item = Arangi::setting('payment_item');
        $show_image = Arangi::setting('show_image');
        if (!empty($payment_item)) {
            $payment_link_target = Arangi::setting('payment_link_target');
            $args['link_classes'] .= ' payment_item';
            if ($args['tooltip_enable']) {
                $args['link_classes'] .= ' hint--bounce';
                $args['link_classes'] .= " hint--{$args['tooltip_position']}";
            }
            if ($show_payment === '1') {
                echo '<ul>';
                foreach ($payment_item as $key => $row_values) {
                    ?>
                    <li>
                        <a class="<?php echo esc_attr($args['link_classes']); ?>"
                            <?php if ($args['tooltip_enable']) : ?>
                                aria-label="<?php echo esc_attr($row_values['tooltip']); ?>"
                            <?php endif; ?>
                            href="<?php echo esc_url($row_values['link_url']); ?>"
                            data-hover="<?php echo esc_attr($row_values['tooltip']); ?>"
                            <?php if ($payment_link_target === '1') : ?>
                                target="_blank"
                            <?php endif; ?>
                            >
                            <?php if($show_image==='1') :?>
                                <?php if (in_array($args['displayp'], array('image', 'icon_text'), true)) : ?>
                                  <img src="<?php  echo wp_get_attachment_url($row_values['image_payment']);?> " alt="thumbnail"/>
                                <?php endif; ?>
                            <?php else:?>
                           <?php if (in_array($args['display'], array('icon', 'icon_text'), true)) : ?>
                            <i class="payment-icon <?php echo esc_attr($row_values['icon_class']); ?>"></i>
                            <?php endif; ?>
                            <?php endif; ?>
                        </a>
                     </li>
                 <?php
                }
                echo '</ul>';
            }
        }
    }

    public static function string_limit_words($string, $word_limit)
    {
        $words = explode(' ', $string, $word_limit + 1);
        if (count($words) > $word_limit) {
            array_pop($words);
        }

        return implode(' ', $words);
    }

    public static function string_limit_characters($string, $limit)
    {
        $string = substr($string, 0, $limit);
        $string = substr($string, 0, strripos($string, " "));

        return $string;
    }

    public static function excerpt($args = array())
    {
        $defaults = array(
            'limit' => 55,
            'after' => '&hellip;',
            'type' => 'word',
        );
        $args = wp_parse_args($args, $defaults);

        $excerpt = '';

        if ($args['type'] === 'word') {
            $excerpt = self::string_limit_words(get_the_excerpt(), $args['limit']);
        } elseif ($args['type'] === 'character') {
            $excerpt = self::string_limit_characters(get_the_excerpt(), $args['limit']);
        }
        if ($excerpt !== '' && $excerpt !== '&nbsp;') {
            printf('<p>%s %s</p>', $excerpt, $args['after']);
        }
    }

    public static function image_placeholder_url($width, $height)
    {
        $url = 'http://via.placeholder.com/' . $width . 'x' . $height . '?text=' . esc_html__('No+Image', 'arangi');

        return $url;
    }

    public static function image_placeholder($width, $height)
    {
        $url = self::image_placeholder_url($width, $height);

        echo '<img src="' . $url . '" alt="thumbnail"/>';
    }

    public static function grid_filters($post_type = 'post', $filter_enable = 0, $filter_align = null, $filter_counter = 0, $filter_wrap = '0')
    {
        if ($filter_enable == 1) :

            $_catPrefix = '';
            $_categories = array();

            switch ($post_type) {
                case 'portfolio' :
                $_categories = get_terms(array(
                    'taxonomy' => 'portfolio_category',
                    'hide_empty' => true,
                ));
                $_catPrefix = '.portfolio_category-';
                break;
                case 'product' :
                $_categories = get_terms(array(
                    'taxonomy' => 'product_cat',
                    'hide_empty' => true,
                ));

                $_catPrefix = '.product_cat-';
                break;
                default :
                $_categories = get_terms(array(
                    'taxonomy' => 'category',
                    'hide_empty' => true,
                ));

                $_catPrefix = '.category-';
                break;
            }

            $filter_classes = array('tm-filter-button-group', $filter_align);
            if ($filter_counter == 1) {
                $filter_classes[] = 'show-filter-counter';
            }
            ?>

            <div class="<?php echo implode(' ', $filter_classes); ?>"
                <?php
                if ($filter_counter == 1) {
                    echo 'data-filter-counter="true"';
                }
                ?>
                >
                <div class="tm-filter-button-group-inner">
                    <?php if ($filter_wrap == '1') { ?>
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12">
                                <?php } ?>
                                <a href="javascript:void(0);" class="btn-filter current"
                                data-filter="*">
                                <span class="filter-text"><?php esc_html_e('All', 'arangi'); ?></span>
                            </a>
                            <?php
                            foreach ($_categories as $term) {
                                printf('<a href="javascript:void(0);" class="btn-filter" data-filter="%s"><span class="filter-text">%s</span></a>', esc_attr($_catPrefix . $term->slug), $term->name);
                            }
                            ?>
                            <?php if ($filter_wrap == '1') { ?>
                        </div>
                    </div>
                </div>
                <?php } ?>
            </div>
        </div>
        <?php
    endif;
    }

    public static function grid_pagination($arangi_query, $number, $pagination, $pagination_align, $pagination_button_text)
    {
        if ($pagination !== '' && $arangi_query->found_posts > $number) { ?>
        <div class="tm-grid-pagination" style="text-align:<?php echo esc_attr($pagination_align); ?>">
            <?php if ($pagination === 'loadmore_alt' || $pagination === 'loadmore' || $pagination === 'infinite') { ?>
            <div class="tm-loader"></div>

            <?php if ($pagination === 'loadmore') { ?>
            <a href="#" class="tm-button style-outline tm-button-grey tm-grid-loadmore-btn">
                <span><?php echo esc_html($pagination_button_text); ?></span>
            </a>
            <?php } ?>
            <?php } elseif ($pagination === 'pagination') { ?>
            <?php Arangi_Templates::paging_nav($arangi_query); ?>
            <?php } ?>
        </div>
        <div class="tm-grid-messages" style="display: none;">
            <?php esc_html_e('All items displayed.', 'arangi'); ?>
        </div>
        <?php
        }
    }

    /**
     * Echo rating html template.
     *
     * @param int $rating
     */
    public static function get_rating_template($rating = 5)
    {
        $full_stars = intval($rating);
        $template = '';

        $template .= str_repeat('<i class="fa fa-star"></i>', $full_stars);

        $half_star = floatval($rating) - $full_stars;

        if ($half_star != 0) {
            $template .= '<i class="fa fa-star-half-alt"></i>';
        }

        $empty_stars = intval(5 - $rating);
        $template .= str_repeat('<i class="fa fa-star"></i>', $empty_stars);

        echo esc_attr( $template );
    }


    public static function page_title() {

       global  $post, $wp_query, $author;

        $home = esc_html__('Home', 'arangi');

        $shop_page_id = false;
        $front_page_shop = false;
        if ( defined( 'WOOCOMMERCE_VERSION' ) ) {
            $shop_page_id = wc_get_page_id( 'shop' );
            $front_page_shop = get_option( 'page_on_front' ) == wc_get_page_id( 'shop' );
        }

        if ( ( ! is_home() && ! is_front_page() && ! ( is_post_type_archive() && $front_page_shop ) ) || is_paged() ) {

            if ( is_home() ) {

            } else if ( is_category() ) {

                echo single_cat_title( '', false );

            } elseif ( is_search() ) {

                echo esc_html__( 'Search results for &ldquo;', 'arangi' ) . get_search_query() . '&rdquo;';

            } elseif ( is_tax('product_cat') || is_tax('portfolio_cat')) {

                $current_term = get_term_by( 'slug', get_query_var( 'term' ), get_query_var( 'taxonomy' ) );

                echo esc_html( $current_term->name );

            } elseif ( is_tax('portfolio_cat') ) {

                $queried_object = $wp_query->get_queried_object();
                echo esc_html($queried_object->name) ;

            } elseif ( is_tax('product_tag') ) {

                $queried_object = $wp_query->get_queried_object();
                echo esc_html__( 'Products tagged &ldquo;', 'arangi' ) . $queried_object->name . '&rdquo;';

            } elseif ( is_day() ) {

                printf( esc_html__( 'Daily Archives: %s', 'arangi' ), get_the_date() );

            } elseif ( is_month() ) {

                printf( esc_html__( 'Monthly Archives: %s', 'arangi' ), get_the_date( _x( 'F Y', 'monthly archives date format', 'arangi' ) ) );

            } elseif ( is_year() ) {

                printf( esc_html__( 'Yearly Archives: %s', 'arangi' ), get_the_date( _x( 'Y', 'yearly archives date format', 'arangi' ) ) );

            } elseif ( is_post_type_archive('product') && get_option('page_on_front') !== $shop_page_id ) {

                $_name = wc_get_page_id( 'shop' ) ? get_the_title( wc_get_page_id( 'shop' ) ) : '';

                if ( ! $_name ) {
                    $product_post_type = get_post_type_object( 'product' );
                    $_name = $product_post_type->labels->singular_name;
                }

                if ( is_search() ) {
                    echo esc_html__( 'Search results for &ldquo;', 'arangi' ) . get_search_query() . '&rdquo;';
                } elseif ( is_paged() ) {

                } else {

                    echo esc_html($_name);

                }

            }elseif(is_post_type_archive('portfolio')){

                echo esc_html(Arangi::setting( 'portfolio_title' ));

            } elseif (is_post_type_archive('service')){

                 echo esc_html(Arangi::setting( 'service_title' ));

            } elseif (is_post_type_archive('member')){

                echo esc_html(Arangi::setting( 'member_title' ));
                
            }else if ( is_post_type_archive() ) {
                sprintf( esc_html__( 'Archives: %s', 'arangi' ), post_type_archive_title( '', false ) );
            } elseif ( is_single() && ! is_attachment() ) {

                 if ('post'== get_post_type()) {

                    echo get_the_title();

                } elseif ('portfolio'== get_post_type()) {

                    echo esc_html(Arangi::setting( 'portfolio_title' ));

                }elseif ( 'wpsl_stores' == get_post_type() ){
                    echo esc_html__( 'STORE LOCATOR', 'arangi' );
                }else {

                    echo get_the_title();
                }
            } elseif ( is_404() ) {

                echo esc_html__( 'Error 404', 'arangi' );

            }elseif ( is_attachment() ) {

                echo get_the_title();

            } elseif ( is_page() && !$post->post_parent ) {

                echo get_the_title();

            } elseif ( is_page() && $post->post_parent ) {

                echo get_the_title();

            } elseif ( is_search() ) {

                echo esc_html__( 'Search results for &ldquo;', 'arangi' ) . get_search_query() . '&rdquo;';

            } elseif ( is_tag() ) {

                echo esc_html__( 'Posts tagged &ldquo;', 'arangi' ) . single_tag_title('', false) . '&rdquo;';

            } elseif ( is_author() ) {

                $userdata = get_userdata($author);
                echo esc_html__( 'Author:', 'arangi' ) . ' ' . $userdata->display_name;

            }

            if ( get_query_var( 'paged' ) ) {
                echo ' (' . esc_html__( 'Page', 'arangi' ) . ' ' . get_query_var( 'paged' ) . ')';
            }
        } else {
            if ( is_home() && !is_front_page() ) {
                if ( ! empty( $home ) ) {
                    echo force_balance_tags(Arangi::setting( 'blog_title' ));
                }
            }
        }
    }

    public static function breadcrumbs() {
         global $post, $wp_query, $author;
        $prepend = '';
        $before = '<li>';
        $after = '</li>';
        $home = '<span>' .esc_html__('Home', 'arangi'). '</span>';
        $shop_page_id = false;
        $shop_page = false;
        $front_page_shop = false;
        $show_icon = Arangi::setting('icon_link');
        if ( defined( 'WOOCOMMERCE_VERSION' ) ) {
            $permalinks   = get_option( 'woocommerce_permalinks' );
            $shop_page_id = wc_get_page_id( 'shop' );
            $shop_page    = get_post( $shop_page_id );
            $front_page_shop = get_option( 'page_on_front' ) == wc_get_page_id( 'shop' );
        }

        // If permalinks contain the shop page in the URI prepend the breadcrumb with shop
        if ( $shop_page_id && $shop_page && strstr( $permalinks['product_base'], '/' . $shop_page->post_name ) && get_option( 'page_on_front' ) != $shop_page_id ) {
            $prepend = $before . '<a href="' . get_permalink( $shop_page ) . '">' . $shop_page->post_title . '</a> ' . $after;
        }

        if ( ( ! is_home() && ! is_front_page() && ! ( is_post_type_archive() && $front_page_shop ) ) || is_paged() ) {
            echo '<ul class="breadcrumb">';

            if ( ! empty( $home ) ) {
                if(! empty ($show_icon)){
                    echo wp_kses($before,array('li'=>array())) . '<a class="home" href="' . apply_filters( 'woocommerce_breadcrumb_home_url', home_url('/') ) . '"><i class="'.esc_attr(Arangi::setting('icon_link')).'"></i> ' . $home . '</a>' . $after;
                }else{
                    echo wp_kses($before,array('li'=>array())) . '<a class="home" href="' . apply_filters( 'woocommerce_breadcrumb_home_url', home_url('/') ) . '">' . $home . '</a>' . $after;
                }
            }

            if ( is_home() ) {

                echo wp_kses($before,array('li'=>array())) . single_post_title('', false) . $after;

            } else if ( is_category()) {

                if ( get_option( 'show_on_front' ) == 'page' ) {
                    echo wp_kses($before,array('li'=>array())) . '<a href="' . get_permalink( get_option('page_for_posts' ) ) . '">' . get_the_title( get_option('page_for_posts', true) ) . '</a>' . $after;
                }

                $cat_obj = $wp_query->get_queried_object();
                $this_category = get_category( $cat_obj->term_id );

                echo wp_kses($before,array('li'=>array())) . single_cat_title( '', false ) . $after;

            } elseif ( is_search() ) {

                echo wp_kses($before,array('li'=>array())) . esc_html__( 'Search results for &ldquo;', 'arangi' ) . get_search_query() . '&rdquo;' . $after;

            } elseif ( is_tax('product_cat') || is_tax('product_cat')) {
                echo wp_kses($prepend, arangi_allow_html());
                if ( is_tax('product_cat') ) {
                    $post_type = get_post_type_object( 'product' );
                    echo wp_kses($before,array('li'=>array())) . '<a href="' . get_post_type_archive_link( 'product' ) . '">' . $post_type->labels->singular_name . '</a>' . $after;
                }
                $current_term = get_term_by( 'slug', get_query_var( 'term' ), get_query_var( 'taxonomy' ) );

                $ancestors = array_reverse( get_ancestors( $current_term->term_id, get_query_var( 'taxonomy' ) ) );

                foreach ( $ancestors as $ancestor ) {
                    $ancestor = get_term( $ancestor, get_query_var( 'taxonomy' ) );

                    echo wp_kses($before,array('li'=>array())) . '<a href="' . get_term_link( $ancestor->slug, get_query_var( 'taxonomy' ) ) . '">' . esc_html( $ancestor->name ) . '</a>' . $after;
                }

                echo wp_kses($before,array('li'=>array())) . esc_html( $current_term->name ) . $after;

            }elseif ( is_tax('product_tag') ) {

                $queried_object = $wp_query->get_queried_object();
                echo wp_kses($prepend, arangi_allow_html()). wp_kses($before,array('li'=>array())) . ' ' . esc_html__( 'Products tagged &ldquo;', 'arangi' ) . $queried_object->name . '&rdquo;' . $after;

            }elseif ( is_tax('portfolio_category') ){
                if(is_tax('portfolio_category')){
                    if(isset($apr_settings['portfolio_slug'])){
                        $portfolio_slug = $apr_settings['portfolio_slug'];
                    }
                    else {$portfolio_slug = "portfolio_category"; }                 
                    echo wp_kses($prepend, arangi_allow_html());

                    $current_term = get_term_by( 'slug', get_query_var( 'term' ), get_query_var( 'taxonomy' ) );

                    $ancestors = array_reverse( get_ancestors( $current_term->term_id, get_query_var( 'taxonomy' ) ) );

                    foreach ( $ancestors as $ancestor ) {
                        $ancestor = get_term( $ancestor, get_query_var( 'taxonomy' ) );

                        echo wp_kses($before,array('li'=>array())) . '<a href="' . get_term_link( $ancestor->slug, get_query_var( 'taxonomy' ) ) . '">' . esc_html( $ancestor->name ) . '</a>' . $after;
                    }

                    echo wp_kses($before,array('li'=>array())) . esc_html( $current_term->name ) . $after;
                }else{
                    $queried_object = $wp_query->get_queried_object();
                        echo wp_kses($prepend, arangi_allow_html()) . wp_kses($before,array('li'=>array())) . ' ' . esc_html__( 'Portfolio', 'arangi' ) . $queried_object->name . '&rdquo;' . $after;
                }
            }elseif ( is_tax('service_category') ){
                if(is_tax('service_category')){
                    if(isset($apr_settings['service_slug'])){
                        $service_slug = $apr_settings['service_slug'];
                    }
                    else {$service_slug = "service_category"; }                 
                    echo wp_kses($prepend, arangi_allow_html());

                    $current_term = get_term_by( 'slug', get_query_var( 'term' ), get_query_var( 'taxonomy' ) );

                    $ancestors = array_reverse( get_ancestors( $current_term->term_id, get_query_var( 'taxonomy' ) ) );

                    foreach ( $ancestors as $ancestor ) {
                        $ancestor = get_term( $ancestor, get_query_var( 'taxonomy' ) );

                        echo wp_kses($before,array('li'=>array())) . '<a href="' . get_term_link( $ancestor->slug, get_query_var( 'taxonomy' ) ) . '">' . esc_html( $ancestor->name ) . '</a>' . $after;
                    }

                    echo wp_kses($before,array('li'=>array())) . esc_html( $current_term->name ) . $after;
                }
            }elseif ( is_tax('member_category') ){
                if(is_tax('member_category')){
                    if(isset($apr_settings['member_slug'])){
                        $member_slug = $apr_settings['member_slug'];
                    }
                    else {$member_slug = "member_category"; }                 
                    echo wp_kses($prepend, arangi_allow_html());

                    $current_term = get_term_by( 'slug', get_query_var( 'term' ), get_query_var( 'taxonomy' ) );

                    $ancestors = array_reverse( get_ancestors( $current_term->term_id, get_query_var( 'taxonomy' ) ) );

                    foreach ( $ancestors as $ancestor ) {
                        $ancestor = get_term( $ancestor, get_query_var( 'taxonomy' ) );

                        echo wp_kses($before,array('li'=>array())) . '<a href="' . get_term_link( $ancestor->slug, get_query_var( 'taxonomy' ) ) . '">' . esc_html( $ancestor->name ) . '</a>' . $after;
                    }

                    echo wp_kses($before,array('li'=>array())) . esc_html( $current_term->name ) . $after;
                }
            } elseif ( is_day() ) {

                echo wp_kses($before,array('li'=>array())) . '<a href="' . get_year_link(get_the_time('Y')) . '">' . get_the_time('Y') . '</a>' . $delimiter . $after;
                echo wp_kses($before,array('li'=>array())) . '<a href="' . get_month_link(get_the_time('Y'),get_the_time('m')) . '">' . get_the_time('F') . '</a>' . $after;
                echo wp_kses($before,array('li'=>array())) . get_the_time('d') . $after;

            } elseif ( is_month() ) {

                echo wp_kses($before,array('li'=>array())) . '<a href="' . get_year_link(get_the_time('Y')) . '">' . get_the_time('Y') . '</a>' . $after;
                echo wp_kses($before,array('li'=>array())) . get_the_time('F') . $after;

            } elseif ( is_year() ) {

                echo wp_kses($before,array('li'=>array())) . get_the_time('Y') . $after;

            } elseif ( is_post_type_archive('product') && get_option('page_on_front') !== $shop_page_id ) {

                $_name = wc_get_page_id( 'shop' ) ? get_the_title( wc_get_page_id( 'shop' ) ) : '';

                if ( ! $_name ) {
                    $product_post_type = get_post_type_object( 'product' );
                    $_name = $product_post_type->labels->singular_name;
                }

                if ( is_search() ) {

                    echo wp_kses($before,array('li'=>array())) . '<a href="' . get_post_type_archive_link('product') . '">' . $_name . '</a>' . esc_html__( 'Search results for &ldquo;', 'arangi' ) . get_search_query() . '&rdquo;' . $after;

                } elseif ( is_paged() ) {

                    echo wp_kses($before,array('li'=>array())) . '<a href="' . get_post_type_archive_link('product') . '">' . $_name . '</a>' . $after;

                } else {

                    echo wp_kses($before,array('li'=>array())) . $_name . $after;

                }

            } elseif (is_post_type_archive('service')){

                if (Arangi::setting('service_title') && Arangi::setting('service_title') !=""){
                    $post_type = get_post_type_object( get_post_type() );
                    $slug = $post_type->rewrite;
                    echo wp_kses($before,array('li'=>array())) .esc_html(Arangi::setting('service_title')). $after;                
                } elseif (Arangi::setting('service_slug') && Arangi::setting('service_slug') !=""){
                    echo wp_kses($before,array('li'=>array())) . '<a href="' . get_post_type_archive_link( get_post_type() ) . '">' . esc_html(Arangi::setting('service_slug')). '</a>' . $after;                                
                } else {
                    $post_type = get_post_type_object( 'service' );
                    echo wp_kses($before,array('li'=>array())) . '<a href="' . get_post_type_archive_link('service') . '">' .  esc_html($post_type->labels->name) . '</a>' . $after;
                }   

            } elseif (is_post_type_archive('portfolio')){

                if (Arangi::setting('portfolio_title') && Arangi::setting('portfolio_title') !=""){
                    $post_type = get_post_type_object( get_post_type() );
                    $slug = $post_type->rewrite;
                    echo wp_kses($before,array('li'=>array())) .esc_html(Arangi::setting('portfolio_title')). $after;                
                } elseif (Arangi::setting('portfolio_slug') && Arangi::setting('portfolio_slug') !=""){
                    echo wp_kses($before,array('li'=>array())) . '<a href="' . get_post_type_archive_link( get_post_type() ) . '">' . esc_html(Arangi::setting('portfolio_slug')). '</a>' . $after;                                
                } else {
                    $post_type = get_post_type_object( 'portfolio' );
                    echo wp_kses($before,array('li'=>array())) . '<a href="' . get_post_type_archive_link('portfolio') . '">' .  esc_html($post_type->labels->name) . '</a>' . $after;
                }   

            }  else if(is_post_type_archive('member')){

                if(Arangi::setting('member_title') && Arangi::setting('member_title') !=""){
                    $post_type = get_post_type_object( get_post_type() );
                    $slug = $post_type->rewrite;
                    echo wp_kses($before,array('li'=>array())) .esc_html(Arangi::setting('member_title')). $after;                
                }elseif (Arangi::setting('member_slug') && Arangi::setting('member_slug') !=""){
                    echo wp_kses($before,array('li'=>array())) . '<a href="' . get_post_type_archive_link( get_post_type() ) . '">' . esc_html(Arangi::setting('member_slug')). '</a>' . $after;                                
                }else{
                    $post_type = get_post_type_object( 'member' );
                    echo wp_kses($before,array('li'=>array())) . '<a href="' . get_post_type_archive_link('member') . '">' .  esc_html($post_type->labels->name) . '</a>' . $after;
                }                

            } elseif ( is_single() && ! is_attachment() ) {

                if ( 'product' == get_post_type() ) {

                    echo wp_kses($prepend, arangi_allow_html());

                    if ( $terms = wc_get_product_terms( $post->ID, 'product_cat', array( 'orderby' => 'parent', 'order' => 'DESC' ) ) ) {
                        $main_term = $terms[0];
                        $ancestors = get_ancestors( $main_term->term_id, 'product_cat' );
                        $ancestors = array_reverse( $ancestors );

                        foreach ( $ancestors as $ancestor ) {
                            $ancestor = get_term( $ancestor, 'product_cat' );

                            if ( ! is_wp_error( $ancestor ) && $ancestor ) {
                                echo wp_kses($before,array('li'=>array())) . '<a href="' . get_term_link( $ancestor ) . '">' . $ancestor->name . '</a>' . $after;
                            }
                        }

                        echo wp_kses($before,array('li'=>array())) . '<a href="' . get_term_link( $main_term ) . '">' . $main_term->name . '</a>' . $after;

                    }

                    echo wp_kses($before,array('li'=>array())) . get_the_title() . $after;

                }elseif (is_post_type_archive('service')){

                    if (Arangi::setting('service_title') && Arangi::setting('service_title') !=""){
                        $post_type = get_post_type_object( get_post_type() );
                        $slug = $post_type->rewrite;
                        echo wp_kses($before,array('li'=>array())) .esc_html(Arangi::setting('service_title')). $after;                
                    } elseif (Arangi::setting('service_slug') && Arangi::setting('service_slug') !=""){
                        echo wp_kses($before,array('li'=>array())) . '<a href="' . get_post_type_archive_link( get_post_type() ) . '">' . esc_html(Arangi::setting('service_slug')). '</a>' . $after;                                
                    } else {
                        $post_type = get_post_type_object( 'service' );
                        echo wp_kses($before,array('li'=>array())) . '<a href="' . get_post_type_archive_link('service') . '">' .  esc_html($post_type->labels->name) . '</a>' . $after;
                    }   

                } elseif (is_post_type_archive('portfolio')){

                    if (Arangi::setting('portfolio_title') && Arangi::setting('portfolio_title') !=""){
                        $post_type = get_post_type_object( get_post_type() );
                        $slug = $post_type->rewrite;
                        echo wp_kses($before,array('li'=>array())) .esc_html(Arangi::setting('portfolio_title')). $after;                
                    } elseif (Arangi::setting('portfolio_slug') && Arangi::setting('portfolio_slug') !=""){
                        echo wp_kses($before,array('li'=>array())) . '<a href="' . get_post_type_archive_link( get_post_type() ) . '">' . esc_html(Arangi::setting('portfolio_slug')). '</a>' . $after;                                
                    } else {
                        $post_type = get_post_type_object( 'portfolio' );
                        echo wp_kses($before,array('li'=>array())) . '<a href="' . get_post_type_archive_link('portfolio') . '">' .  esc_html($post_type->labels->name) . '</a>' . $after;
                    }   

                }  else if(is_post_type_archive('member')){

                    if(Arangi::setting('member_title') && Arangi::setting('member_title') !=""){
                        $post_type = get_post_type_object( get_post_type() );
                        $slug = $post_type->rewrite;
                        echo wp_kses($before,array('li'=>array())) .esc_html(Arangi::setting('member_title')). $after;                
                    }elseif (Arangi::setting('member_slug') && Arangi::setting('member_slug') !=""){
                        echo wp_kses($before,array('li'=>array())) . '<a href="' . get_post_type_archive_link( get_post_type() ) . '">' . esc_html(Arangi::setting('member_slug')). '</a>' . $after;                                
                    }else{
                        $post_type = get_post_type_object( 'member' );
                        echo wp_kses($before,array('li'=>array())) . '<a href="' . get_post_type_archive_link('member') . '">' .  esc_html($post_type->labels->name) . '</a>' . $after;
                    }                

                } elseif ( 'wpsl_stores' == get_post_type() ) {
                    $post_type = get_post_type_object( get_post_type() );
                    echo wp_kses($before,array('li'=>array())) . '<a href="' .  get_permalink( $post->post_parent ) . '">' . esc_html__('Store Locator','arangi'). '</a>' . $after;
                    echo wp_kses($before,array('li'=>array())) . get_the_title() . $after;

                } elseif ( 'post' != get_post_type() ) {
                    $post_type = get_post_type_object( get_post_type() );
                    $slug = $post_type->rewrite;
                    echo wp_kses($before,array('li'=>array())) . '<a href="' . get_post_type_archive_link( get_post_type() ) . '">' . $post_type->labels->singular_name . '</a>' . $after;
                    echo wp_kses($before,array('li'=>array())) . get_the_title() . $after;

                }else {

                    if ( 'post' == get_post_type() && get_option( 'show_on_front' ) == 'page' ) {
                        echo wp_kses($before,array('li'=>array())) . '<a href="' . get_permalink( get_option('page_for_posts' ) ) . '">' . get_the_title( get_option('page_for_posts', true) ) . '</a>' . $after;
                    }

                    $cat = current( get_the_category() );
                    if ( ( $parents = get_category_parents( $cat, TRUE, $after . $before ) ) && ! is_wp_error( $parents ) ) {
                        echo wp_kses($before,array('li'=>array())) . substr( $parents, 0, strlen($parents) - strlen($after . $before) ) . $after;
                    }
                    echo wp_kses($before,array('li'=>array())) . get_the_title() . $after;

                }

            } elseif ( is_404() ) {

                echo wp_kses($before,array('li'=>array())) . esc_html__( 'Error 404', 'arangi' ) . $after;

            } elseif ( ! is_single() && ! is_page() && get_post_type() != 'post' ) {

                $post_type = get_post_type_object( get_post_type() );

                if ( $post_type ) {
                    echo wp_kses($before,array('li'=>array())) . $post_type->labels->singular_name . $after;
                }

            } elseif ( is_attachment() ) {

                $parent = get_post( $post->post_parent );
                $cat = get_the_category( $parent->ID );
                if(isset($cat[0])){
                    $cat = $cat[0];
                }
                if ( ( $parents = get_category_parents( $cat, TRUE, $after . $before ) ) && ! is_wp_error( $parents ) ) {
                    echo wp_kses($before,array('li'=>array())) . substr( $parents, 0, strlen($parents) - strlen($after . $before) ) . $after;
                }
                echo wp_kses($before,array('li'=>array())) . '<a href="' . get_permalink( $parent ) . '">' . $parent->post_title . '</a>'. $after;
                echo wp_kses($before,array('li'=>array())). get_the_title() . $after;

            } elseif ( is_page() && !$post->post_parent ) {

                echo wp_kses($before,array('li'=>array())) . get_the_title() . $after;

            } elseif ( is_page() && $post->post_parent ) {

                $parent_id  = $post->post_parent;
                $breadcrumbs = array();

                while ( $parent_id ) {
                    $page = get_post( $parent_id );
                    $breadcrumbs[] = '<a href="' . get_permalink($page->ID) . '">' . get_the_title( $page->ID ) . '</a>';
                    $parent_id  = $page->post_parent;
                }

                $breadcrumbs = array_reverse( $breadcrumbs );

                foreach ( $breadcrumbs as $crumb ) {
                    echo ''.$before . $crumb . $after;
                }

                echo wp_kses($before,array('li'=>array())) . get_the_title() . $after;

            } elseif ( is_search() ) {

                echo wp_kses($before,array('li'=>array())) . esc_html__( 'Search results for &ldquo;', 'arangi' ) . get_search_query() . '&rdquo;' . $after;

            } elseif ( is_tag() ) {

                echo wp_kses($before,array('li'=>array())) . esc_html__( 'Posts tagged &ldquo;', 'arangi' ) . single_tag_title('', false) . '&rdquo;' . $after;

            } elseif ( is_author() ) {

                $userdata = get_userdata($author);
                echo wp_kses($before,array('li'=>array())) . esc_html__( 'Author:', 'arangi' ) . ' ' . $userdata->display_name . $after;

            }

            if ( get_query_var( 'paged' ) ) {
                echo wp_kses($before,array('li'=>array())) . '&nbsp;(' . esc_html__( 'Page', 'arangi' ) . ' ' . get_query_var( 'paged' ) . ')' . $after;
            }

            echo '</ul>';
        } else {
            if ( is_home() && !is_front_page() ) {
                echo '<ul class="breadcrumb">';

                if ( ! empty( $home ) ) {
                    echo wp_kses($before,array('li'=>array())) . '<a class="home" href="' . apply_filters( 'woocommerce_breadcrumb_home_url', home_url('/') ) . '"> ' . $home . '</a>' . $after;

                    echo wp_kses($before,array('li'=>array())) . esc_html( Arangi::setting( 'blog_title')) . $after;
                }

                echo '</ul>';
            }
        }
    }
}
