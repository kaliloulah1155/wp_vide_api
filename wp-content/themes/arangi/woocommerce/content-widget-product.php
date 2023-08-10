<?php

/**
 * The template for displaying product widget entries.
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-widget-product.php.
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 3.5.5
 */

if (!defined('ABSPATH')) {
    exit;
}

global $product;

if (!is_a($product, 'WC_Product')) {
    return;
}

?>
<li>
    <?php do_action('woocommerce_widget_product_item_start', $args); ?>
    <div class="product-content clearfix">
        <div class="product-top">
            <div class="product-image">
                <a href="<?php echo esc_url($product->get_permalink()); ?>">
                    <?php
                    echo wp_get_attachment_image(get_post_thumbnail_id(), array(70, 85), false, array(
                        'alt' => wp_kses_post($product->get_name())
                    ));
                    ?>
                </a>
            </div>
        </div>
        <div class="product-desc">
            <h6 class="product-title">
                <a href="<?php echo esc_url($product->get_permalink()); ?>">
                    <?php echo wp_kses_post($product->get_name()); ?>
                </a>
            </h6>
            <?php
            global $post;
            $countries = get_the_term_list($post->ID, 'countries', ' ', ', ');
            if ($countries != '') {
            ?>
                <div class="countries-cat">
                    <?php echo $countries; ?>
                </div>
            <?php
            } ?>
            <?php echo wp_kses_post(wc_get_rating_html($product->get_average_rating())); ?>
            <div class="product-price">
                <span class="price">
                    <?php echo wp_kses_post($product->get_price_html()); ?>
                </span>
            </div>
        </div>

    </div>
    <?php do_action('woocommerce_widget_product_item_end', $args); ?>
</li>