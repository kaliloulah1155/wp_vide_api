<?php
/**
 * Single Product Up-Sells
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/up-sells.php.
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
$arangi_upsell_product = '';
$arangi_upsell = get_post_meta(get_the_ID(), 'upsell_product', true);
if($arangi_upsell ){
	$arangi_upsell_product = $arangi_upsell;
}else{
	$arangi_upsell_product = Arangi::setting( 'single_product_up_sells_enable' );
}
$upsel_title = Arangi::setting( 'upsel_title' );
$single_after_title = Arangi::setting( 'single_after_title' );
$main_shop_layout = Arangi_Templates::get_product_main_layout();
$main_layout = Arangi_Templates::get_main_layout();
$img_top = Arangi::setting( 'layout_top_img' );
$img_bottom = Arangi::setting( 'layout_bottom_img' );

if ( $upsells && $arangi_upsell_product !== '1') : ?>
	<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
		<div class="product-extra product-grid <?php echo esc_attr($main_shop_layout); ?>">
			<?php if($main_layout === 'main-2'): ?>
				<div class="top-img">
					<img src="<?php echo esc_url($img_top); ?>" alt=""/>
				</div>
			<?php endif; ?>
			<section class="up-sells upsells products bg-layout-2">
				<div class="other-products">
					<div class="instagram_title">
						<?php if($upsel_title !== ''): ?>
							<?php if((in_array('sitepress-multilingual-cms/sitepress.php', apply_filters('active_plugins', get_option('active_plugins')))) && function_exists('icl_object_id') ): ?>
								<h2><?php echo esc_html__( 'May you like also', 'arangi' ) ?></h2>
							<?php else:?>
								<h2><?php echo esc_html($upsel_title); ?></h2>
							<?php endif;?>
						<?php endif;?>
						<?php if($single_after_title !== ''): ?>
							<?php if((in_array('sitepress-multilingual-cms/sitepress.php', apply_filters('active_plugins', get_option('active_plugins')))) && function_exists('icl_object_id') ): ?>
								<p class="title-after"><?php echo esc_html__('Arangi','arangi'); ?></p>
							<?php else:?>
								<p class="title-after"><?php echo esc_html($single_after_title); ?></p>
							<?php endif;?>
						<?php endif;?>
					</div>

					<?php woocommerce_product_loop_start(); ?>

						<?php foreach ( $upsells as $upsell ) : ?>

							<?php
								$post_object = get_post( $upsell->get_id() );

								setup_postdata( $GLOBALS['post'] =& $post_object );

								wc_get_template_part( 'content', 'product' ); ?>

						<?php endforeach; ?>

					<?php woocommerce_product_loop_end(); ?>
				</div>
			</section>
			<?php if($main_layout === 'main-2'): ?>
				<div class="bottom-img">
					<img src="<?php echo esc_url($img_bottom); ?>" alt=""/>
				</div>
			<?php endif; ?>
		</div>
	</div>
<?php endif;

wp_reset_postdata();
