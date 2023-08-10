<?php
/**
 * The template for displaying product content in the single-product.php template
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-single-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 3.6.0
 */

defined('ABSPATH') || exit;
global $product;

/**
 * Hook: woocommerce_before_single_product.
 *
 * @hooked wc_print_notices - 10
 */
do_action('woocommerce_before_single_product');

if (post_password_required()) {
    echo get_the_password_form(); // WPCS: XSS ok.
    return;
}

$single_type = Arangi_Templates::get_product_single_style();
?>
<div id="product-<?php the_ID(); ?>" <?php wc_product_class( '', $product ); ?>>
    <div class="product-detail <?php echo esc_attr($single_type); ?>">
        <div class="row">
            <?php
            global $product, $post;
            $gallery_ids = $product->get_gallery_image_ids();
            $gallery = empty($gallery_ids) ? 'no-gallery' : 'has-gallery';

            ?>
            <?php if($single_type === 'single_4'): ?>
                <div class="col-xl-5 col-lg-5 col-sm-12 col-md-12">
                    <div class="row">
            <?php endif; ?>
            <div class="col-xl-6 col-lg-6 col-sm-12 col-md-12 product-images-wrapper <?php echo esc_attr( $gallery ); ?>">
                <?php
                /**
                 * Hook: woocommerce_before_single_product_summary.
                 *
                 * @hooked woocommerce_show_product_sale_flash - 10
                 * @hooked woocommerce_show_product_images - 20
                 */
                do_action('woocommerce_before_single_product_summary');
                ?>
            </div>
            <div class="col-xl-6 col-lg-6 col-sm-12 col-md-12 product-detail-summary">
                <div class="summary entry-summary">
                    <?php
                    /**
                     * Hook: woocommerce_single_product_summary.
                     *
                     * @hooked woocommerce_template_single_title - 5
                     * @hooked woocommerce_template_single_rating - 10
                     * @hooked woocommerce_template_single_price - 10
                     * @hooked woocommerce_template_single_excerpt - 10
                     * @hooked arangi_stock_text_shop_page - 15
                     * @hooked woocommerce_template_single_meta - 15 - 5
                     * @hooked arangi_delivery_return - 15 - 7
                     * @hooked woocommerce_template_single_add_to_cart - 30
                     * @hooked woocommerce_template_single_sharing - 50
                     * @hooked WC_Structured_Data::generate_product_data() - 60
                     */
                    do_action('woocommerce_single_product_summary');
                    ?>
                    <?php if ( Arangi::setting( 'single_product_sharing_enable' ) === '1' ) : ?>
                        <?php Arangi_Templates::product_sharing(); ?>
                    <?php endif; ?>
                </div>
            </div>
            <?php if($single_type === 'single_4'): ?>
                    </div>
                </div>
            <?php endif; ?>
            <?php if($single_type === 'single_4'): ?>
                <div class="col-xl-7 col-lg-7 col-sm-12 col-md-12">
                    <?php
                        /**
                         * Hook: woocommerce_after_single_product_summary.
                         *
                         * @hooked woocommerce_output_product_data_tabs - 10
                         */
                        do_action('woocommerce_after_single_product_summary');
                    ?>
                </div>
            <?php endif; ?>
        </div>
    </div><!-- /. Product detail -->
    <?php if($single_type !== 'single_4'): ?>
        <?php
            /**
             * Hook: woocommerce_after_single_product_summary.
             *
             * @hooked woocommerce_output_product_data_tabs - 10
             */
            do_action('woocommerce_after_single_product_summary');
        ?>
    <?php endif; ?>
</div>

<?php do_action('woocommerce_after_single_product'); ?>
