<?php
/**
 * Cross-sells
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/cart/cross-sells.php.
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
 * @version     4.4.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$arangi_cross_sells_product = Arangi::setting( 'shopping_cart_cross_sells_enable' );
$cross_title = Arangi::setting( 'cross_title' );
$single_after_title_cross = Arangi::setting( 'single_after_title_cross' );

if ( $cross_sells && $arangi_cross_sells_product === '1' ) : ?>

	<div class="cross-sells">
		<div class="instagram_title">
			<?php if($cross_title !== ''): ?>
				<?php if((in_array('sitepress-multilingual-cms/sitepress.php', apply_filters('active_plugins', get_option('active_plugins')))) && function_exists('icl_object_id') ): ?>
					<h2><?php echo esc_html__( 'You may be interested in&hellip;', 'arangi' ) ?></h2>
				<?php else:?>
					<h2><?php echo esc_html($cross_title); ?></h2>
				<?php endif;?>
			<?php endif;?>
			<?php if($single_after_title_cross !== ''): ?>
				<?php if((in_array('sitepress-multilingual-cms/sitepress.php', apply_filters('active_plugins', get_option('active_plugins')))) && function_exists('icl_object_id') ): ?>
					<p class="title-after"><?php echo esc_html__('Arangi','arangi'); ?></p>
				<?php else:?>
					<p class="title-after"><?php echo esc_html($single_after_title_cross); ?></p>
				<?php endif;?>
			<?php endif;?>
		</div>

		<?php woocommerce_product_loop_start(); ?>

			<?php foreach ( $cross_sells as $cross_sell ) : ?>

				<?php
				 	$post_object = get_post( $cross_sell->get_id() );

					setup_postdata( $GLOBALS['post'] =& $post_object );

					wc_get_template_part( 'content', 'product' ); ?>

			<?php endforeach; ?>

		<?php woocommerce_product_loop_end(); ?>

	</div>

<?php endif;

wp_reset_postdata();
