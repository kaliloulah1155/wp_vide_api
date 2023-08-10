<?php
// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}
class Arangi {
    const PRIMARY_FONT = 'Domine';
    const SECONDARY_FONT = 'Raleway';
    const PRIMARY_COLOR = '#c44860';
    const HIGHTLIGHT_COLOR = '#f4ae7b';
    const SECONDARY_COLOR = '';
    const THIRD_COLOR = '#ababab';
    const HEADING_COLOR = '#333333';
    /**
     * is_tablet
     *
     * @return bool
     */
    public static function is_tablet() {
        if ( ! class_exists( 'Mobile_Detect' ) ) {
            return false;
        }
        return Mobile_Detect::instance()->isTablet();
    }
    /**
     * is_mobile
     *
     * @return bool
     */
    public static function is_mobile() {
        if ( ! class_exists( 'Mobile_Detect' ) ) {
            return false;
        }
        if ( self::is_tablet() ) {
            return false;
        }
        return Mobile_Detect::instance()->isMobile();
    }
    /**
     * is_handheld
     *
     * @return bool
     */
    public static function is_handheld() {
        return ( self::is_mobile() || self::is_tablet() );
    }
    /**
     * is_desktop
     *
     * @since 0.9.8
     * @return bool
     */
    public static function is_desktop() {
        return ! self::is_handheld();
    }
    /**
     * Get setting from Kirki
     *
     * @param string $setting
     *
     * @return mixed
     */
    public static function setting( $setting = '' ) {
        if ( defined( 'ARROWPRESS_CORE_VERSION' ) && class_exists('ArrowPress_Core_Customizer') ) {
			$settings = ArrowPress_Core_Customizer::get_option_default( $setting );
		}else{
            $settings = Arangi_Kirki::get_option( 'theme', $setting );
		}

        return $settings;
    }
    /**
     * Requirement one file.
     *
     * @param string $file Enter your file path here (included .php)
     */
    public static function require_file( $file = '' ) {
        if ( file_exists( $file ) ) {
            require_once $file;
        } else {
            wp_die( esc_html__( 'Could not load theme file: ', 'arangi' ) . $file );
        }
    }
    /**
     * Primary Menu
     */
    public static function menu_primary( $args = array() ) {
        $menu = arangi_get_meta_value('menu_display');
        if($menu === ''){
            if ( has_nav_menu( 'primary' ) && class_exists( 'Arangi_Primary_Walker_Nav_Menu' ) ) {
                $defaults = array(
                    'theme_location' => 'primary',
                    'container'      => 'ul',
                    'menu_class'     => 'mega-menu',
                );
                $args['walker'] = new Arangi_Primary_Walker_Nav_Menu;

            }else{
                $defaults = array(
                    'container'      => 'ul',
                    'menu_class'     => 'mega-menu',
                );
            }
            $args     = wp_parse_args( $args, $defaults );
        }else{
            $defaults = array(
                'menu' => $menu,
                'container'      => 'ul',
                'menu_class'     => 'mega-menu',
            );
            $args['walker'] = new Arangi_Primary_Walker_Nav_Menu;
            $args     = wp_parse_args( $args, $defaults );
        }
        wp_nav_menu( $args );
    }
    public static function menu_mobile( $args = array() ) {
        if ( has_nav_menu( 'menu-mobile' ) && class_exists( 'Arangi_Primary_Walker_Nav_Menu' )){
            $defaults = array(
                'theme_location' => 'menu-mobile',
                'container'      => 'ul',
                'menu_class'     => 'mega-menu',
            );
        }else{
            $defaults = array(
                'container'      => 'ul',
                'menu_class'     => 'mega-menu',
            );
        }
        $args['walker'] = new Arangi_Primary_Walker_Nav_Menu;
        $args     = wp_parse_args( $args, $defaults );
        wp_nav_menu( $args );
    }
    /**
     * Categories Menu
     */
    public static function menu_categories( $args = array() ) {
        $menu_categories = Arangi::setting('select_category');
        $defaults = array(
            'menu' => $menu_categories,
            'container_class' => 'product-categories',
            'container'      => 'ul',
            'menu_class'     => 'mega-menu',
        );
        $args     = wp_parse_args( $args, $defaults );
        if (class_exists( 'Arangi_Primary_Walker_Nav_Menu' ) ) {
            $args['walker'] = new Arangi_Primary_Walker_Nav_Menu;
        }
        wp_nav_menu( $args );
    }
    /**
     * Logo
     */
    public static function branding_logo() {
        $logo_url       = '';
        $logo_light_url = Arangi::setting( 'logo_light' );
        $logo_dark_url  = Arangi::setting( 'logo_dark' );

        if ( Arangi_Helper::get_post_meta( 'custom_logo' ) ) {
            $logo_url = Arangi_Helper::get_post_meta( 'custom_logo' );
        }

        $sticky_logo_url = Arangi_Helper::get_post_meta( 'custom_sticky_logo', '' );
        if ( $sticky_logo_url === '' ) {
            $sticky_logo_url = Arangi::setting( 'sticky_logo' );
        }
        ?>
        <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
            <?php if ( $logo_url !== '' ) { ?>
                <img src="<?php echo esc_url( $logo_url ); ?>"
                     alt="<?php bloginfo( 'name' ); ?>" class="main-logo">
            <?php } else { ?>
                <img src="<?php echo esc_url( $logo_light_url ); ?>"
                     alt="<?php bloginfo( 'name' ); ?>" class="light-logo">
                <img src="<?php echo esc_url( $logo_dark_url ); ?>"
                     alt="<?php bloginfo( 'name' ); ?>" class="dark-logo">
            <?php } ?>
            <img src="<?php echo esc_url( $sticky_logo_url ); ?>"
                 alt="<?php bloginfo( 'name' ); ?>"
                 class="sticky-logo">
        </a>
        <?php
    }
    /**
     * Adds custom attributes to the body tag.
     */
    public static function body_attributes() {
        $attrs = apply_filters( 'insight_body_attributes', array() );

        $attrs_string = '';
        if ( ! empty( $attrs ) ) {
            foreach ( $attrs as $attr => $value ) {
                $attrs_string .= " {$attr}=" . '"' . esc_attr( $value ) . '"';
            }
        }
        echo '' . $attrs_string;
    }
    /**
     * Adds custom classes to the branding.
     */
    public static function branding_class( $class = '' ) {
        $classes = array( 'branding' );

        if ( ! empty( $class ) ) {
            if ( ! is_array( $class ) ) {
                $class = preg_split( '#\s+#', $class );
            }
            $classes = array_merge( $classes, $class );
        } else {
            // Ensure that we always coerce class to being an array.
            $class = array();
        }

        $classes = apply_filters( 'insight_branding_class', $classes, $class );

        echo 'class="' . esc_attr( join( ' ', $classes ) ) . '"';
    }
    /**
     * Adds custom classes to the navigation.
     */
    public static function navigation_class( $class = '' ) {
        $classes = array( 'navigation page-navigation' );

        if ( ! empty( $class ) ) {
            if ( ! is_array( $class ) ) {
                $class = preg_split( '#\s+#', $class );
            }
            $classes = array_merge( $classes, $class );
        } else {
            // Ensure that we always coerce class to being an array.
            $class = array();
        }
        $classes = apply_filters( 'insight_navigation_class', $classes, $class );

        echo 'class="' . esc_attr( join( ' ', $classes ) ) . '"';
    }
    /**
     * Adds custom classes to the header.
     */
    public static function header_class( $class = '' ) {
        $classes = array( 'site-header page-header' );
        $header_type = Arangi_Global::instance()->set_header_type();
        $classes[] = "header-{$header_type}";
        $is_home_page = get_post_meta(get_the_ID(), 'is_home_page', true);
        if ($is_home_page == true){
            $classes[]="header-wine";
        }
        $classes = apply_filters( 'arangi_header_class', $classes, $class );
        echo 'class="' . esc_attr( join( ' ', $classes ) ) . '"';
    }
    /**
     * Adds custom classes to the footer.
     */
    public static function footer_class( $class = '' ) {
        $classes = array( 'page-footer' );
        $footer_type = Arangi_Global::instance()->set_footer_type();
        $classes[] = "footer-{$footer_type}";
        if ( ! empty( $class ) ) {
            if ( ! is_array( $class ) ) {
                $class = preg_split( '#\s+#', $class );
            }
            $classes = array_merge( $classes, $class );
        } else {
            // Ensure that we always coerce class to being an array.
            $class = array();
        }
        $classes = apply_filters( 'arangi_footer_class', $classes, $class );
        echo 'class="' . esc_attr( join( ' ', $classes ) ) . '"';
    }
}
