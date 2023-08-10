<?php

namespace elementor;
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
if ( class_exists( 'WooCommerce' ) ) {
	class Apr_Core_Product_Cat_List extends Widget_Base {
		public function get_name() {
			return 'apr-product-cat-list';
		}

		public function get_title() {
			return __( 'APR Woo - Product List Categories', 'apr-core' );
		}

		public function get_icon() {
			return 'eicon-woocommerce';
		}

		public function get_categories() {
			return array( 'apr-core' );
		}

		protected function _register_controls() {
			$this->start_controls_section(
				'woo_categories_section',
				array(
					'label' => __( 'Content', 'apr-core' ),
				)
			);
			$this->add_control(
				'category_filter',
				[
					'label'    => __( 'Category Filter', 'apr-core' ),
					'type'     => Controls_Manager::SELECT,
					'multiple' => true,
					'default'  => '',
					'options'  => apr_core_check_get_cat( 'product_cat' ),

				]
			);

			$this->add_control(
				'cate_thumb',
				[
					'label'       => __( 'Choose Image', 'elementor' ),
					'description' => __( 'You should choose a small, square image.', 'elementor' ),
					'type'        => Controls_Manager::MEDIA,
					'default'     => [
						'url' => Utils::get_placeholder_image_src(),
					],
				]
			);
			$this->add_group_control(
				Group_Control_Image_Size::get_type(),
				[
					'name'      => 'cate_thumb',
					'default'   => 'large',
					'separator' => 'none',
				]
			);
			$this->end_controls_section();
		}

		protected function render() {
			$settings       = $this->get_settings_for_display();
			$category       = $settings['category_filter'];
			$cate_thumb     = $settings['cate_thumb'];
			$cate_thumb_url = Group_Control_Image_Size::get_attachment_image_html( $settings, 'cate_thumb', 'cate_thumb' );
			?>
			<div class="woo-list-category">
				<?php
				if ( $category !== '' ) {
					$term = get_term_by( 'slug', $category, 'product_cat' );
				}

				?>
				<a href="<?php echo get_term_link( $term->slug, 'product_cat' ); ?>" class="list-cate-title">
					<?php echo $term->name; ?>
				</a>
				<?php if ( ! empty( $cate_thumb_url ) ) { ?>
					<a href="<?php echo get_term_link( $term->slug, 'product_cat' ); ?>" class="cate-thumb">
						<?php echo Group_Control_Image_Size::get_attachment_image_html( $settings, 'cate_thumb', 'cate_thumb' ); ?>
					</a>
				<?php }
				$children = get_terms( $term->taxonomy, array(
					'parent'     => $term->term_id,
					'hide_empty' => false
				) );
				if ( $children ) {
					echo '<ul class="children-cate">';
					foreach ( $children as $subcat ) {
						$term_meta       = get_term_meta( $subcat->term_id, 'product_cat_label', true );
						$term_meta_color = get_term_meta( $subcat->term_id, 'categories_label_color', true );
						?>
						<li>
							<a href="<?php echo esc_url( get_term_link( $subcat, $subcat->taxonomy ) ); ?>"><?php echo $subcat->name; ?>
								<?php if ( $term_meta !== '' ){
								?>
								<span class="label-new" <?php if ( $term_meta_color !== '' ) {
									echo 'style =' . "background:$term_meta_color";
								} ?>>
                                    <?php
									echo $term_meta;
									echo '</span>';
									} ?>
							</a>
						</li>
						<?php
					}
					echo '</ul>';
				} ?>
			</div>
			<?php
		}

		protected function content_template() {
		}
	}

	Plugin::instance()->widgets_manager->register_widget_type( new Apr_Core_Product_Cat_List );
}
