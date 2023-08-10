<?php

namespace elementor;

if (!defined('ABSPATH')) {
	exit;
}

class Apr_Core_Blog extends Widget_Base
{
	public function get_categories()
	{
		return array('apr-core');
	}

	public function get_name()
	{
		return 'apr_blog';
	}

	public function get_title()
	{
		return __('APR Blog', 'apr-core');
	}

	public function get_icon()
	{
		return 'eicon-post-excerpt';
	}

	public static function get_animation_options()
	{
		return [
			''                  => __('None', 'apr-core'),
			'fadeInDown'        => __('FadeInDown', 'apr-core'),
			'fadeInUp'          => __('FadeInUp', 'apr-core'),
			'fadeInRight'       => __('FadeInRight', 'apr-core'),
			'fadeInLeft'        => __('FadeInLeft', 'apr-core'),
			'fadeInDownBig'     => __('FadeInDownBig', 'apr-core'),
			'fadeInLeftBig'     => __('FadeInLeftBig', 'apr-core'),
			'fadeInRightBig'    => __('FadeInRightBig', 'apr-core'),
			'fadeInUpBig'       => __('FadeInUpBig', 'apr-core'),
			'lightSpeedIn'      => __('LightSpeedIn', 'apr-core'),
			'lightSpeedOut'     => __('LightSpeedOut', 'apr-core'),
			'zoomIn'            => __('Zoom', 'apr-core'),
			'zoomInDown'        => __('ZoomInDown', 'apr-core'),
			'zoomInLeft'        => __('ZoomInLeft', 'apr-core'),
			'zoomInRight'       => __('ZoomInRight', 'apr-core'),
			'zoomInUp'          => __('ZoomInUp', 'apr-core'),
			'pulse'             => __('Pulse', 'apr-core'),
			'bounceIn'          => __('BounceIn', 'apr-core'),
			'bounceInDown'      => __('BounceInDown', 'apr-core'),
			'bounceInLeft'      => __('BounceInLeft', 'apr-core'),
			'bounceInRight'     => __('BounceInRight', 'apr-core'),
			'bounceInUp'        => __('BounceInUp', 'apr-core'),
			'rotateIn'          => __('RotateIn', 'apr-core'),
			'rotateInDownLeft'  => __('RotateInDownLeft', 'apr-core'),
			'rotateInDownRight' => __('RotateInDownRight', 'apr-core'),
			'rotateInUpLeft'    => __('RotateInUpLeft', 'apr-core'),
			'rotateInUpRight'   => __('RotateInUpRight', 'apr-core'),
			'slideInUp'         => __('SlideInUp', 'apr-core'),
			'slideInDown'       => __('SlideInDown', 'apr-core'),
			'slideInLeft'       => __('SlideInLeft', 'apr-core'),
			'slideInRight'      => __('SlideInRight', 'apr-core'),
			'JackInTheBox'      => __('JackInTheBox', 'apr-core'),
		];
	}

	protected function _register_controls()
	{
		$this->start_controls_section(
			'blog_section',
			[
				'label' => __('APR Blog', 'apr-core')
			]
		);
		$this->add_control(
			'blog_style',
			[
				'label'   => __('Blog Style', 'apr-core'),
				'type'    => Controls_Manager::SELECT,
				'default' => 'style1',
				'options' => [
					'style1' => __('Grid Style 1', 'apr-core'),
					'style2' => __('Grid Style 2', 'apr-core'),
					'style4' => __('Grid Style 3', 'apr-core'),
					'style3' => __('Grid Slide', 'apr-core'),
				],
			]
		);
		$this->add_control(
			'blog_column_number_desktop',
			[
				'label'     => __('Number column on Desktop', 'apr-core'),
				'type'      => Controls_Manager::SELECT,
				'default'   => 3,
				'options'   => [
					4 => __('4 Column', 'apr-core'),
					3 => __('3 Column', 'apr-core'),
					2 => __('2 Column', 'apr-core'),
					1 => __('1 Column', 'apr-core'),
				],
				'condition' => [
					'blog_style' => ['style1', 'style2', 'style4'],
				],
			]
		);
		$this->add_control(
			'blog_column_number_tablet',
			[
				'label'     => __('Number column on Tablet', 'apr-core'),
				'type'      => Controls_Manager::SELECT,
				'default'   => 2,
				'options'   => [
					4 => __('4 Column', 'apr-core'),
					3 => __('3 Column', 'apr-core'),
					2 => __('2 Column', 'apr-core'),
					1 => __('1 Column', 'apr-core'),
				],
				'condition' => [
					'blog_style' => ['style1', 'style2', 'style4'],
				],
			]
		);
		$this->add_control(
			'blog_column_number_mobile',
			[
				'label'     => __('Number column on Mobile', 'apr-core'),
				'type'      => Controls_Manager::SELECT,
				'default'   => 1,
				'options'   => [
					4 => __('4 Column', 'apr-core'),
					3 => __('3 Column', 'apr-core'),
					2 => __('2 Column', 'apr-core'),
					1 => __('1 Column', 'apr-core'),
				],
				'condition' => [
					'blog_style' => ['style1', 'style2', 'style4'],
				],
			]
		);
		$this->add_control(
			'blog_select_cat',
			[
				'label'       => __('Select Category Post', 'apr-core'),
				'type'        => Controls_Manager::SELECT2,
				'options'     => apr_core_check_get_cat('category'),
				'multiple'    => true,
				'label_block' => true
			]
		);
		$this->add_control(
			'blog_limit',
			[
				'label'   => __('Number of Posts', 'apr-core'),
				'type'    => Controls_Manager::NUMBER,
				'default' => 3,
				'min'     => 1,
				'max'     => 100,
				'step'    => 1,
			]
		);
		$this->add_control(
			'show_custom_image',
			[
				'label'     => __('Show Custom Image Size', 'apr-core'),
				'type'      => Controls_Manager::SWITCHER,
				'label_on'  => __('On', 'apr-core'),
				'label_off' => __('Off', 'apr-core'),
				'default'   => 'Off',
			]
		);
		$this->add_control(
			'custom_dimension',
			[
				'label'       => __('Image Size', 'apr-core'),
				'type'        => Controls_Manager::IMAGE_DIMENSIONS,
				'description' => __('You can crop the original image size to any custom size. You can also set a single value for height or width in order to keep the original size ratio.', 'apr-core'),
				'condition'   => [
					'show_custom_image' => 'yes',
				],
			]
		);
		$this->add_control(
			'blog_order_by',
			[
				'label'   => __('Order By', 'apr-core'),
				'type'    => Controls_Manager::SELECT,
				'default' => 'id',
				'options' => [
					'id'            => __('Post ID', 'apr-core'),
					'author'        => __('Post Author', 'apr-core'),
					'title'         => __('Title', 'apr-core'),
					'date'          => __('Date', 'apr-core'),
					'rand'          => __('Random', 'apr-core'),
					'comment_count' => __('Comment count', 'apr-core'),
				],
			]
		);
		$this->add_control(
			'blog_order',
			[
				'label'   => __('Order', 'apr-core'),
				'type'    => Controls_Manager::SELECT,
				'default' => 'ASC',
				'options' => [
					'ASC'  => __('Ascending', 'apr-core'),
					'DESC' => __('Descending', 'apr-core'),
				],
			]
		);
		$this->add_control(
			'blog_show_more',
			[
				'label'     => __('Show View More', 'apr-core'),
				'type'      => Controls_Manager::SWITCHER,
				'label_on'  => __('On', 'apr-core'),
				'label_off' => __('Off', 'apr-core'),
				'default'   => 'Off',
			]
		);
		$this->end_controls_section();
		$this->start_controls_section(
			'animation_section',
			[
				'label' => __('APR Animation', 'apr-core')
			]
		);
		$this->add_control(
			'animation_sc',
			[
				'label'   => __('Animation', 'apr-core'),
				'type'    => Controls_Manager::SELECT,
				'default' => '',
				'options' => self::get_animation_options(),
			]
		);
		$this->add_control(
			'transition_delay_sc',
			[
				'label'   => __('Transition Delay(ms)', 'apr-core'),
				'type'    => Controls_Manager::NUMBER,
				'default' => 500,
			]
		);
		$this->end_controls_section();
	}

	protected function render()
	{
		$settings         = $this->get_settings_for_display();
		$cat_post         = $settings['blog_select_cat'];
		$column_desktop   = $settings['blog_column_number_desktop'];
		$column_tablet    = $settings['blog_column_number_tablet'];
		$column_mobile    = $settings['blog_column_number_mobile'];
		$blog_style       = $settings['blog_style'];
		$limit_post       = $settings['blog_limit'];
		$order_by_post    = $settings['blog_order_by'];
		$order_post       = $settings['blog_order'];
		$show_more_post   = $settings['blog_show_more'];
		$animation        = $settings['animation_sc'];
		$transition_delay = $settings['transition_delay_sc'];

		$show_custom_image = $settings['show_custom_image'];
		$custom_dimension  = $settings['custom_dimension'];
		if ($show_custom_image === 'yes') {
			$has_custom_size = false;
			if (!empty($custom_dimension['width'])) {
				$has_custom_size    = true;
				$attachment_size[0] = $custom_dimension['width'];
			}

			if (!empty($custom_dimension['height'])) {
				$has_custom_size    = true;
				$attachment_size[1] = $custom_dimension['height'];
			}

			if (!$has_custom_size) {
				$attachment_size = 'full';
			}
		} else {
			if ($blog_style !== 'style3') {
				if ($column_desktop === "2") {
					$attachment_size[0] = 570;
					$attachment_size[1] = 386;
				} else {
					$attachment_size[0] = 570;
					$attachment_size[1] = 570;
				}
			} else {
				$attachment_size[0] = 585;
				$attachment_size[1] = 320;
			}
		}
		$class = '';
		if (!empty($cat_post)) :
			$apr_post_type_arg = array(
				'post_type'      => 'post',
				'posts_per_page' => $limit_post,
				'orderby'        => $order_by_post,
				'order'          => $order_post,
				'col-desktop'    => $column_desktop,
				'col-tablet'     => $column_tablet,
				'col-mobile'     => $column_mobile,
				'tax_query'      => array(
					array(
						'taxonomy' => 'category',
						'field'    => 'slug',
						'terms'    => $cat_post
					)
				)
			);
		else :
			$apr_post_type_arg = array(
				'post_type'      => 'post',
				'posts_per_page' => $limit_post,
				'orderby'        => $order_by_post,
				'order'          => $order_post,
				'col-desktop'    => $column_desktop,
				'col-tablet'     => $column_tablet,
				'col-mobile'     => $column_mobile,
			);
		endif;
		if ($blog_style == 'style1' || $blog_style == 'style2' || $blog_style == 'style4') {
			$items_desktop = 12 / $column_desktop;
			$items_tablets = 12 / $column_tablet;
			$items_mobile  = 12 / $column_mobile;
			$class         .= 'blog-grid grid-' . $blog_style;
		}
		if ($blog_style == 'style3') {
			$class .= 'blog-slide';
		}
		if ($blog_style !== 'style3') {
			$class .= ' load-item  row  clearfix';
		}

		$apr_post_type_query = new \WP_Query($apr_post_type_arg);
		if ($apr_post_type_query->have_posts()) :
			$id = 'apr-blog-' . wp_rand();
			$id_img          = 'blog-img-' . wp_rand();
			$current_page    = get_query_var('paged') ? intval(get_query_var('paged')) : 1;
?>
			<div id="<?php echo esc_attr($id); ?>" class="blog-shortcode <?php echo $class; ?>">
				<?php while ($apr_post_type_query->have_posts()) :
					$apr_post_type_query->the_post(); ?>
					<?php
					$format_class = 'no-image';
					if (has_post_thumbnail()) {
						$format_class = 'blog-has-img';
					} elseif (get_post_format()) {
						$format_class = 'post-' . get_post_format();
					}
					?>
					<?php if ($blog_style === 'style3') : ?>
						<div class="item item-page<?php echo esc_attr($current_page); ?>" data-animation="<?php echo esc_attr($animation); ?>" data-delay="<?php echo esc_attr($transition_delay); ?>">
						<?php else : ?>
							<div class="item-page<?php echo esc_attr($current_page); ?> item col-md-<?php echo esc_html($items_desktop) ?> col-sm-<?php echo esc_html($items_tablets) ?> col-xs-<?php echo esc_html($items_mobile) ?>" data-animation="<?php echo esc_attr($animation); ?>" data-delay="<?php echo esc_attr($transition_delay); ?>">
							<?php endif; ?>
							<div class="blog-content">
								<div class="blog-item <?php echo esc_attr($format_class); ?>">
									<?php if (get_post_format() == 'gallery') : ?>
										<?php $gallery = get_post_meta(get_the_ID(), 'gallery_metabox', true); ?>
										<?php if (is_array($gallery) && count($gallery) > 1) : ?>
											<div class="blog-gallery blog-img arrows-custom">
												<?php
												$index   = 0;
												foreach ($gallery as $key => $value) :
													$alt = get_post_meta($value, '_wp_attachment_image_alt', true);
												?>
													<div class="img-gallery">
														<?php
														echo wp_get_attachment_image($value, array($attachment_size[0], $attachment_size[1]), false);
														?>
													</div>
												<?php
													$index++;
												endforeach;
												?>
											</div>
										<?php endif; ?>
									<?php elseif (get_post_format() == 'audio') : ?>
										<?php $audio = get_post_meta(get_the_ID(), 'post_audio', true); ?>
										<?php if ($audio && $audio != '') : ?>
											<div class="blog-audio">
												<?php if (get_post_format() == 'audio') {
													echo '<div class="audio_container">';
												}
												?>
												<?php echo wp_oembed_get($audio, array('height' => 200)); ?>
												<?php if (get_post_format() == 'audio') {
													echo '</div>';
												}
												?>
											</div>
										<?php endif; ?>
									<?php elseif (get_post_format() == 'link') : ?>
										<?php
										$link       = get_post_meta(get_the_ID(), 'post_link', true);
										$link_title = get_post_meta(get_the_ID(), 'post_link', true);
										?>
										<?php if ($link && $link != '') : ?>
											<div class="link_section clearfix">
												<div class="link-icon">
													<i class="fa fa-link"></i>
												</div>
												<a class="link-post" href="<?php echo esc_url(is_ssl() ? str_replace('http://', 'https://', $link) : $link); ?>">
													<?php if ($link_title && $link_title != '') : ?>
														<?php echo wp_kses($link_title, array()); ?>
													<?php endif; ?>
												</a>
											</div>
										<?php endif; ?>
									<?php elseif (get_post_format() == 'quote') : ?>
										<?php
										$quote_text   = get_post_meta(get_the_ID(), 'post_quote_text', true);
										$quote_author = get_post_meta(get_the_ID(), 'post_quote_name', true);
										$quote_link   = get_post_meta(get_the_ID(), 'post_quote_url', true);
										?>
										<?php if ($quote_text && $quote_text != '') : ?>
											<div class="quote_section">
												<span class="quote-icon">&ldquo;</span>
												<blockquote class="var3">
													<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php echo wp_kses($quote_text, array()); ?></a>
													<?php if ($quote_author && $quote_author != '') : ?>
														<div class="author_info"><?php echo wp_kses($quote_author, array()); ?></div>
													<?php endif; ?>
													<?php if ($quote_link && $quote_link != '') : ?>
														<a class="quote_link" href="<?php echo esc_url($quote_link); ?>" target="_blank">
															<?php echo esc_html__('Via Twitter', 'apr-core'); ?>
														</a>
													<?php endif; ?>
												</blockquote>
											</div>
										<?php endif; ?>
									<?php elseif (get_post_format() == 'video') : ?>
										<?php $video = get_post_meta(get_the_ID(), 'post_video', true); ?>
										<?php if ($video && $video != '') : ?>
											<?php if (has_post_thumbnail()) : ?>
												<div class="blog-video blog-img test">
													<a class="fancybox" data-fancybox href="<?php echo esc_url($video); ?>">
														<?php
														echo get_the_post_thumbnail(null, array($attachment_size[0], $attachment_size[1]), array(
															'alt' => get_the_title(),
														));
														?>
														<i class="icon icon-play32"></i>
													</a>
												</div>
											<?php endif; ?>
										<?php endif; ?>
									<?php else : ?>
										<?php if (has_post_thumbnail()) : ?>
											<div class="blog-img">
												<a href="<?php the_permalink(); ?>">
													<?php
													$full_image_size = get_the_post_thumbnail_url(null, 'full');
													if ($blog_style !== 'style3') {
														if ($column_desktop === "2") {
															$img_size = array(570, 386);
														} else {
															$img_size = array($attachment_size[0], $attachment_size[1]);
														}
													} else {
														$img_size = array(585, 320);
													}
													echo get_the_post_thumbnail(null, $img_size, array(
														'alt' => get_the_title(),
													));
													?>
												</a>
											</div>
										<?php endif; ?>
									<?php endif; ?>

									<?php if ($blog_style === 'style2' && get_post_format() !== 'link' && get_post_format() !== 'quote' && get_post_format() !== 'audio') : ?>
										<div class=" custom-date ">
											<a href="<?php the_permalink(); ?>">
												<span class="date"><?php echo get_the_time('d'); ?></span><br>
												<span class="month"><?php echo get_the_time('M'); ?></span>

											</a>
										</div>
									<?php endif; ?>
									<?php if (get_post_format() !== 'quote') : ?>
										<div class="blog-post-info">
											<?php if ($blog_style === 'style3') : ?>
												<div class="blog_info">
													<div class="info info-category">
														<?php echo get_the_term_list($apr_post_type_query->ID, 'category', '', ''); ?>
													</div>
												</div>
											<?php endif; ?>
											<h4 class="post-name"><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a>
											</h4>
											<?php if ($blog_style === 'style1' || $blog_style === 'style2') : ?>
												<div class="blog_info">
													<div class="info info-category">
														<?php echo get_the_term_list($apr_post_type_query->ID, 'category', '', ''); ?>
													</div>
												</div>
											<?php endif; ?>

											<?php if ($blog_style !== 'style3') : ?>
												<div class="blog_post_desc">
													<?php
													$content = the_excerpt();
													echo '<div class="entry-content">';
													wp_trim_words($content, '20');
													echo '</div>';
													?>
												</div>
												<?php if ($blog_style !== 'style4') : ?>
													<div class="read-more">
														<?php if ($blog_style === 'style2') : ?>
															<a href="<?php the_permalink(); ?>"><?php echo esc_html__('Read more', 'apr-core'); ?></a>
														<?php else : ?>
															<a class="btn btn-primary height-40" href="<?php the_permalink(); ?>"><?php echo esc_html__('+ Read more', 'apr-core'); ?></a>
														<?php endif; ?>
													</div>
												<?php endif; ?>
											<?php endif; ?>
											<?php if ($blog_style === 'style1') : ?>
												<div class="blog_info_ab">
													<ul>
														<li class="info date-post">
															<div class=" default-date">
																<i class="ti-calendar"></i><br>
																<a href="<?php the_permalink(); ?>">
																	<?php echo get_the_date(); ?>
																</a>
															</div>
														</li>
														<li class="info info-comment">
															<i class="ti-comment-alt"></i><br>
															<?php comments_popup_link(esc_html__('0 comment (s)', 'apr-core'), esc_html__('1 comment (s)', 'apr-core'), esc_html__('% comments', 'apr-core')); ?>
														</li>
													</ul>
												</div>
											<?php endif; ?>
										</div>
									<?php endif; ?>
								</div>
							</div>
							</div>
						<?php endwhile;
					wp_reset_postdata(); ?>
						</div>
						<?php if ($show_more_post === 'yes') : ?>
							<div class="btn-viewmore text-center">
								<a class="view_more " href="<?php echo esc_url(get_post_type_archive_link('post')); ?>"><?php echo esc_html('More', 'apr-core') . '<span class="icon-play32"></span>'; ?></a>
							</div>
						<?php endif; ?>
			<?php endif;
	}

	protected function content_template()
	{
	}
}

Plugin::instance()->widgets_manager->register_widget_type(new Apr_Core_Blog);
