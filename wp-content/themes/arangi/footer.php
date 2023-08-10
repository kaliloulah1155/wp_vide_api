					<?php	
						$main_layout = Arangi_Templates::get_main_layout();
						$img_bottom = Arangi::setting( 'layout_bottom_img' );
					?>
					<?php if(($main_layout === 'main-2' && !is_page()) || ($main_layout === 'main-2' && class_exists('WooCommerce') && is_cart()) || ($main_layout === 'main-2' && class_exists('WooCommerce') && is_checkout()) || ($main_layout === 'main-2' && class_exists('WooCommerce') && is_account_page())): ?>
						</div><!-- End bg layout 2-->
					<?php endif; ?>
					</div><!-- End row-->
					<?php if(($main_layout === 'main-2' && !is_page()) || ($main_layout === 'main-2' && class_exists('WooCommerce') && is_cart()) || ($main_layout === 'main-2' && class_exists('WooCommerce') && is_checkout()) || ($main_layout === 'main-2' && class_exists('WooCommerce') && is_account_page())): ?>
						<div class="bottom-img">
							<img src="<?php echo esc_url($img_bottom); ?>" alt=""/>
						</div>
					<?php endif; ?>
					<div class="row">
						<?php if(is_singular('product') && class_exists( 'WooCommerce' )) :?>
							<?php do_action('woocommerce_after_single_product_summary_custom'); ?>
						<?php endif;?>
					</div>
				</div><!-- End container-->
			</div> <!-- End main-->

			<?php
                arangi_static_block();
				$arangi_footer_type = Arangi_Global::instance()->set_footer_type();
				$arangi_hide_footer = get_post_meta(get_the_ID(), 'hide_footer', true);
				if(is_category() || is_tax()){
				    $arangi_hide_footer_cat = arangi_get_meta_value('hide_footer', true);
				    if (!$arangi_hide_footer_cat) {
				        $arangi_hide_footer = true;
				    }
				}
				if(!$arangi_hide_footer && $arangi_footer_type != 'none' && !is_404()) {
					Arangi_Templates::footer(); 
				}
			?>
			<?php Arangi_Templates::popup_sale_off(); ?>
            <div class="overlay"></div>
        </div> <!-- End page-->
        <?php wp_footer(); ?>
    </body>
</html>


