<?php
/**
 * Product Loop Start
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/loop/loop-start.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see 	    https://docs.woocommerce.com/document/template-structure/
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     3.3.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
global $woocommerce_loop;
$arangi_product_layout = arangi_get_meta_value('product_layout');
$arangi_product_columns = arangi_get_meta_value('product_columns');
$arangi_product_layout_class = $product_layout_list = '';
$woocommerce_loop['product_column_number'] = '';
if($arangi_product_layout){
	$arangi_product_layout = arangi_get_meta_value('product_layout');
}else{
	$arangi_product_layout = Arangi::setting('product_layouts');
}
if(isset($woocommerce_loop['product_column_number']) && (isset($woocommerce_loop['product_type']) && $woocommerce_loop['product_type'] === '1') || (isset($woocommerce_loop['product_type']) && $woocommerce_loop['product_type'] === '5')){
	$arangi_product_column = wc_get_loop_prop( 'columns' );
}elseif($arangi_product_layout === 'list' || $arangi_product_layout ==='list_grid'){
	$arangi_product_column = '1';	
}elseif($arangi_product_columns && ($arangi_product_layout === 'grid' || $arangi_product_layout ==='grid_list')){
	$arangi_product_column = $arangi_product_columns;
}else{
	$arangi_product_column = Arangi::setting('product_column');
}
if(isset($woocommerce_loop['product_type']) && ($woocommerce_loop['product_type'] === '2' || $woocommerce_loop['product_type'] === '4')){
	$arangi_product_layout_class = 'product-list';
}else if(isset($woocommerce_loop['product_type']) && ($woocommerce_loop['product_type'] === '1' || $woocommerce_loop['product_type'] === '3')){
	$arangi_product_layout_class = 'product-grid';
}else if($arangi_product_layout === 'list' || $arangi_product_layout ==='list_grid'){
	$arangi_product_layout_class = 'product-list';
}else{
	$arangi_product_layout_class = 'product-grid';
}
$main_layout = Arangi_Templates::get_main_layout();
?>

<ul class="products <?php if($main_layout === 'main-2') {echo 'grid-3';} ?> <?php echo esc_attr($arangi_product_layout_class); ?> columns-<?php echo esc_attr($arangi_product_column); ?>">
