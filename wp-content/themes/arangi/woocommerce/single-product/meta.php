<?php
/**
 * Single Product Meta
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/meta.php.
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
 * @version     3.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

global $product;
$featured = $product->is_featured();
$postdatestamp = '';
$arangi_sale_lable = Arangi::setting('sale_lable');
$arangi_product_meta = Arangi::setting('single_product_meta_enable');
$arangi_product_meta_multi = Arangi::setting('product_meta_multi');
?>
<?php if($arangi_product_meta) :?>
<div class="product_meta <?php if(isset($arangi_product_meta_multi) && in_array('brands', $arangi_product_meta_multi)) {echo 'show-brands';} ?>">

	<?php do_action( 'woocommerce_product_meta_start' ); ?>
	<?php if (isset($arangi_product_meta_multi) && in_array('sku', $arangi_product_meta_multi)) : ?>
		<?php if ( wc_product_sku_enabled() && ( $product->get_sku() || $product->is_type( 'variable' ) ) ) : ?>
			<span class="sku_wrapper"><strong><?php esc_html_e( 'SKU:', 'arangi' ); ?></strong> <span class="sku"><?php echo esc_attr( $sku = $product->get_sku() ) ? $sku : esc_html__( 'N/A', 'arangi' ); ?></span></span>
		<?php endif; ?>
	<?php endif;?>
	<?php if (isset($arangi_product_meta_multi) && in_array('categories', $arangi_product_meta_multi)) : ?>
		<?php echo wc_get_product_category_list( $product->get_id(), ', ', '<span class="posted_in"><strong>' . _n( 'Category:', 'Categories:', count( $product->get_category_ids() ), 'arangi' ) . ' </strong>', '</span>' ); ?>
	<?php endif;?>	
	<?php if (isset($arangi_product_meta_multi) && in_array('tags', $arangi_product_meta_multi)) : ?>
		<?php echo wc_get_product_tag_list( $product->get_id(), ', ', '<span class="tagged_as"><strong>' . _n( 'Tag:', 'Tags:', count( $product->get_tag_ids() ), 'arangi' ) . '</strong> ', '</span>' ); ?>
	<?php endif;?>	
	<?php do_action( 'woocommerce_product_meta_end' ); ?>

</div>
<?php endif;?>