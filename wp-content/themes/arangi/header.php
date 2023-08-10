<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1"/>
    <?php 
        if (is_ssl()) {
            echo '<link rel="profile" href="//gmpg.org/xfn/11" />';
        }else{
            echo '<link rel="profile" href="http://gmpg.org/xfn/11" />';
        }
    ?>
    
    <?php wp_head(); ?>
</head>
<?php
$arangi_site_layout = get_post_meta(get_the_ID(), 'site_layout', true);
$arangi_main_layout = get_post_meta(get_the_ID(), 'main_layout', true);
$arangi_width = get_post_meta(get_the_ID(), 'site_width', true);
$arangi_remove_space_top = get_post_meta(get_the_ID(), 'remove_space_top', true);
$arangi_remove_space_bottom = get_post_meta(get_the_ID(), 'remove_space_bottom', true);
$arangi_header_fixed = arangi_get_meta_value('fixed_header', false);
$arangi_header_type = Arangi_Global::set_header_type();
$arangi_hide_header = get_post_meta(get_the_ID(), 'hide_header', true);
if(is_category() || is_tax()){
    $arangi_hide_header_cat = arangi_get_meta_value('hide_header', true);
    if (!$arangi_hide_header_cat) {
        $arangi_hide_header = true;
    }
    $arangi_header_fixed = arangi_get_meta_value('fixed_header', false);
}
$page_layout = '';
if(($arangi_site_layout !== '') && ($arangi_site_layout == 'wide')){
    $page_layout = 'wide';
}elseif(($arangi_site_layout !== '') && ($arangi_site_layout == 'full-width')){
    $page_layout = 'full-width';
}elseif(($arangi_site_layout !== '') && ($arangi_site_layout == 'boxed')){
    $page_layout = 'boxed';
}else{
    $page_layout = Arangi_Global::check_layout_type();
}
$container = Arangi_Global::check_container_type();

$header_fixed_class = '';
if($arangi_header_fixed || Arangi::setting('fixed_header')){
    $header_fixed_class = ' header-fixed';
}
$header_mobile_background = Arangi::setting('header_mobile_bg');
$main_layout = Arangi_Templates::get_main_layout();
$img_top = Arangi::setting( 'layout_top_img' );
?>
<body <?php body_class(); ?>>
	<?php Arangi_Functions::arangi_pre_loader(); ?>
    <div id="page" class="hfeed site <?php echo esc_attr($main_layout); ?> <?php echo esc_attr($page_layout); ?> <?php if($arangi_remove_space_top){echo 'remove_space_top';}?> <?php if($arangi_remove_space_bottom){echo 'remove_space_bottom';}?> <?php if($arangi_width){echo 'site-width';}?> <?php echo esc_attr($header_fixed_class); ?>">
        <?php if(!$arangi_hide_header && $arangi_header_type != 'none' && !is_404()) {
               Arangi_Templates::header();
            }
        ?>
        <?php get_template_part('breadcrumb'); ?>
        <div id="site-main" class="wrapper">
            <?php if($arangi_site_layout == 'full-width') :?>
                <div class="container">
            <?php elseif ($arangi_site_layout == 'wide' || $arangi_site_layout == 'boxed'): ?>
                <div class="container-fluid">
            <?php else: ?>
                <div class="<?php echo esc_attr($container);?>">
            <?php endif;?>
            <?php if(($main_layout === 'main-2' && !is_page()) || ($main_layout === 'main-2' && class_exists('WooCommerce') && is_cart()) || ($main_layout === 'main-2' && class_exists('WooCommerce') && is_checkout()) || ($main_layout === 'main-2' && class_exists('WooCommerce') && is_account_page())): ?>
                <div class="top-img">
                    <img src="<?php echo esc_url($img_top); ?>" alt=""/>
                </div>
                <div class="bg-layout-2">
            <?php endif; ?>
                <div class="row">