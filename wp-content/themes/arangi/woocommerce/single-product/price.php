<?php
/**
 * Single Product Price
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/price.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @author  WooThemes
 * @package WooCommerce/Templates
 * @version 3.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

global $product;
$unit_price = get_post_meta(get_the_ID(), 'unit_price', true);
$element_product = get_post_meta(get_the_ID(), 'element_product', true);
?>
<?php if ($element_product !== '') : ?>
			<p class="element-product"> <?php echo esc_attr($element_product);?></p>
	<?php endif;?>
<?php if (Arangi::setting('product_price')): ?>
	<?php if ( $price_html = $product->get_price_html() ) : ?>
		<p class="price">
			<?php echo wp_kses($price_html,array(
				'div'=> array(
					'class'=> array(),
				),
				'span'=> array(
					'class'=> array(),
				),
				'ins'=> array(),
				'del'=> array(),
			)); ?>	
			<?php if($unit_price): ?>
				<span class="unit_price">/ <?php echo esc_attr($unit_price);?></span>
			<?php endif;?>	
			<?php arangi_percentage_price_sale();?>
		</p>
		<?php arangi_custom_price_html();?>
	<?php endif;?>
<?php endif;?>
