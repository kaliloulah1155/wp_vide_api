
<?php
	$footer_layout = Arangi::setting('footer_layout');
	$show_newsletter = Arangi::setting('show_newsletter');
	$footer_02_show_newsletter = Arangi::setting('footer_02_show_newsletter');
	$show_payment = Arangi::setting('show_payment');
	$newsletter_title = Arangi::setting( 'newsletter_title' );
	$newsletter_title2 = Arangi::setting( 'newsletter_title2' );
	$newsletter_after_title = Arangi::setting( 'newsletter_after_title' );
	$newsletter_desc = Arangi::setting( 'newsletter_desc' );
	$newsletter_desc2 = Arangi::setting( 'newsletter_desc2' );
	$text_privacy = Arangi::setting( 'text_privacy' );
	$show_social = Arangi::setting('footer_show_social');
	$newsletter_tyle = Arangi::setting('newsletter_tyle');
	$hide_newsletter_footer_page = get_post_meta(get_the_ID(), 'hide_newsletter_footer', true);
	$newsletter_type_page = get_post_meta(get_the_ID(), 'newsletter_type', true);
	$bg_newsletter = get_post_meta(get_the_ID(), 'bg_newsletter', true);
	$f_hide_newsletter_class ="";
	if($hide_newsletter_footer_page){
		$f_hide_newsletter_class = 'hide_newsletter';
	}
  	if ($footer_layout === 'wide'){
    	$f_container ='container-fluid';
	}elseif ($footer_layout === 'full_width'){
	    $f_container ='container';
	}else{
	    $f_container ='container-fluid boxed';
	}
	$animation_blog = Arangi::setting( 'blog_css_animation' );
	$animation_product = Arangi::setting( 'blog_css_animation' );
	$animation_delay = Arangi::setting( 'animation_delay' );
	$animation_blog_class = Arangi_Helper::get_animation_classes( $animation_blog ); 
	$animation_product_class = Arangi_Helper::get_animation_classes( $animation_product );
	if ($bg_newsletter == 1){
	    $class_bg_newsletter = 'bg-newsletter';
    }else{
        $class_bg_newsletter ='';
    }
?>
<footer id="page-footer" <?php Arangi::footer_class(); ?>>
	<div id="page-footer-inner" class="page-footer-inner <?php echo esc_attr($f_hide_newsletter_class); ?>" data-sticky="1">
		<?php if($footer_02_show_newsletter)  {
		   if($show_newsletter) {
			    if (is_active_sidebar('footer-newsletter')) {
			    ?> 
				<div class="footer-newsletter <?php echo esc_attr($class_bg_newsletter);?> <?php if(($newsletter_tyle === 'style1'|| $newsletter_type_page ==='newsletter_01') && $newsletter_type_page !=='newsletter_02'){ echo 'newsletter-style1';}?> <?php if(($newsletter_tyle === 'style2'|| $newsletter_type_page ==='newsletter_02') && $newsletter_type_page !=='newsletter_01'){ echo 'newsletter-style2';}?>">
					<div class="<?php echo esc_attr( $f_container ); ?>">
						<div class="newletter-form">
							<div class="newsletter-heading">
								<div class="newsletter_title">
									<?php if($newsletter_title !== '' && ($newsletter_tyle === 'style1'|| $newsletter_type_page === 'newsletter_01') && $newsletter_type_page !== 'newsletter_02'): ?>
										<?php if((in_array('sitepress-multilingual-cms/sitepress.php', apply_filters('active_plugins', get_option('active_plugins')))) && function_exists('icl_object_id') ): ?>
											<h2><?php echo esc_html__('Our Newsletter','arangi'); ?></h2>
										<?php else :?> 
											<h2><?php echo wp_kses_post($newsletter_title); ?></h2>
										<?php endif;?>
									<?php endif;?>		
									<?php if($newsletter_title2 !== '' && ($newsletter_tyle === 'style2'||$newsletter_type_page ==='newsletter_02') && $newsletter_type_page !== 'newsletter_01'): ?>
										<?php if((in_array('sitepress-multilingual-cms/sitepress.php', apply_filters('active_plugins', get_option('active_plugins')))) && function_exists('icl_object_id') ): ?>	
											<h2><?php echo esc_html__('Sign Up&nbsp;','arangi') . '<span>'. esc_html__('Newsletter','arangi') .'</span>'; ?></h2>
										<?php else:?>
											<h2><?php echo wp_kses_post($newsletter_title2); ?></h2>
										<?php endif;?>
									<?php endif;?>
									<?php if($newsletter_after_title !== '' && ($newsletter_tyle === 'style1'|| $newsletter_type_page === 'newsletter_01') && $newsletter_type_page !== 'newsletter_02'): ?>
										<?php if((in_array('sitepress-multilingual-cms/sitepress.php', apply_filters('active_plugins', get_option('active_plugins')))) && function_exists('icl_object_id') ): ?>
											<p class="title-after"><?php echo esc_html__('Arangi','arangi'); ?></p>
										<?php else :?>
											<p class="title-after"><?php echo wp_kses_post($newsletter_after_title); ?></p>
										<?php endif;?>
									<?php endif;?>
								</div>
								<?php if($newsletter_desc !== '' && ($newsletter_tyle === 'style1'|| $newsletter_type_page === 'newsletter_01') && $newsletter_type_page !== 'newsletter_02'): ?>
									<?php if((in_array('sitepress-multilingual-cms/sitepress.php', apply_filters('active_plugins', get_option('active_plugins')))) && function_exists('icl_object_id') ): ?>
										<p class="newletter-desc"><?php echo esc_html__( 'Don&rsquo;t miss any update', 'arangi' ) ?></p>
									<?php else:?>
										<p class="newletter-desc"><?php echo wp_kses_post($newsletter_desc); ?></p>
									<?php endif;?>
								<?php endif;?>
								<?php if($newsletter_desc2 !== '' && ($newsletter_tyle === 'style2'||$newsletter_type_page ==='newsletter_02') && $newsletter_type_page !== 'newsletter_01'): ?>
									<?php if((in_array('sitepress-multilingual-cms/sitepress.php', apply_filters('active_plugins', get_option('active_plugins')))) && function_exists('icl_object_id') ): ?>
										<p class="newletter-desc"><?php echo esc_html__( 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&rsquo;s standard dummy text.', 'arangi' ) ?></p>
									<?php else:?>
										<p class="newletter-desc"><?php echo wp_kses_post($newsletter_desc2); ?></p>
									<?php endif;?>
								<?php endif;?>
							</div>
							<div class="footer-mailchimp">
				            	<?php dynamic_sidebar('footer-newsletter'); ?>
				            	<?php if($show_social && ($newsletter_tyle === 'style1'|| $newsletter_type_page === 'newsletter_01') && $newsletter_type_page !== 'newsletter_02'){?>
				            		<div class="social-footer social-footer-style1">
				            			<button id="btn-show-social"><span class="ti-angle-right"></span></button>
										<?php Arangi_Templates::social_icons(); ?>
									</div>
				            	<?php }?>
							</div>
						</div>
						<?php if($text_privacy !== '' && ($newsletter_tyle === 'style2'||$newsletter_type_page ==='newsletter_02') && $newsletter_type_page !== 'newsletter_01'): ?>
							<?php if((in_array('sitepress-multilingual-cms/sitepress.php', apply_filters('active_plugins', get_option('active_plugins')))) && function_exists('icl_object_id') ): ?>
									<div class="text-privacy"><?php echo esc_html__('By signing up you agree our','arangi') .'<a href="#">' . esc_html__( '&nbsp;Term & Services', 'arangi') . '</a>' ?></div>
								<?php else:?>
									<div class="text-privacy"><?php echo wp_kses_post($text_privacy); ?></div>
								<?php endif; ?>
							<?php endif; ?>
						<?php if($show_social && ($newsletter_tyle === 'style2'||$newsletter_type_page ==='newsletter_02') && $newsletter_type_page !== 'newsletter_01'){?>
							<div class="social-footer social-footer-style2">
								<?php Arangi_Templates::social_icons(); ?>
							</div>
						<?php }?>
					</div>
				</div>
				<?php
			    }
			}
	    }
	    ?>
     	<?php
	        $cols = 0;
	        for ($i = 1; $i <= 4; $i++) {
	            if (is_active_sidebar('footer2-column-' . $i)){?>
	            	<div class="footer-top">
						<div class="<?php echo esc_attr( $f_container ); ?>">
							<?php
						        $cols = 0;
						        for ($i = 1; $i <= 4; $i++) {
						            if (is_active_sidebar('footer2-column-' . $i))
						                $cols++;
						        }
					        ?>
							<?php
					        if ($cols) :
					            $col_class = array();
					            switch ($cols) {
					                case 1:
					                    $col_class[1] = 'col-sm-12';
					                    break;
					                case 2:
					                    $col_class[1] = 'col-sm-6 col-xs-6 col-md-6';
					                    $col_class[2] = 'col-sm-6 col-xs-6 col-md-6';
					                    break;
					                case 3:
					                    $col_class[1] = 'col-xs-12 col-sm-4 col-md-4';
					                    $col_class[2] = 'col-xs-12 col-sm-4 col-md-4';
					                    $col_class[3] = 'col-xs-12 col-sm-4 col-md-4';
					                    break;
					                case 4:
					                    $col_class[1] = 'col-xs-12 col-sm-12 col-md-6 col-lg-4';
					                    $col_class[2] = 'col-xs-12 col-sm-6 col-md-3 col-lg-2';
					                    $col_class[3] = 'col-xs-12 col-sm-6 col-md-3 col-lg-2';
					                    $col_class[4] = 'col-xs-12 col-sm-12 col-md-12 col-lg-4';
					                    break;
					            }
					            ?>
					        <div class="row">
								<?php
			                    $cols = 1;
			                    for ($i = 1; $i <= 3; $i++) {
			                        if (is_active_sidebar('footer2-column-' . $i)) {
			                            ?>
			                            <div class="<?php echo esc_attr($col_class[$cols++]) ?>">
			                                <?php dynamic_sidebar('footer2-column-' . $i); ?>
			                            </div>
			                            <?php
			                        }
			                    }

                                $add_product_footer = get_post_meta(get_the_ID(), 'add_product_footer', true);
                                if ($add_product_footer){
                                    if (is_active_sidebar('footer2-home-wine')){
                                        ?>
                                        <div class="<?php echo esc_attr($col_class[4]) ?>">
                                            <?php dynamic_sidebar('footer2-home-wine'); ?>
                                        </div>
                                        <?php
                                    }
                                }else{

                                    if (is_active_sidebar('footer2-column-4')){
                                        ?>
                                        <div class="<?php echo esc_attr($col_class[4]) ?>">
                                            <?php dynamic_sidebar('footer2-column-4'); ?>
                                        </div>
                                        <?php
                                    }
                                }
			                    ?>
							</div>
							<?php endif; ?>
						</div>
					</div>
					<?php
	            }
	        }
        ?>
		<div class="footer-bottom">
			<div class="bottom-footer <?php echo esc_attr( $f_container ); ?> ">
				<div class="row">
					<div class="<?php if($show_payment) {
					echo esc_attr('col-md-6 col-sm-12 col-xs-12 copy-right');
				} else {
					echo esc_attr('col-md-12 col-sm-12 col-xs-12 copy-right text-center');
				} ?>">
						<div class="copyright-content">
							<?php echo  Arangi::setting( 'footer_copyright' ); ?>
						</div>	
					</div>
					<?php if($show_payment) {?>
					<div class="col-md-6 col-sm-12 col-xs-12 ">
						<div class="payment">
							<?php Arangi_Templates::payment_links(); ?>
						</div>
					</div>
					<?php } ?>	
				</div>
			</div>
		</div>
	</div>
</footer>