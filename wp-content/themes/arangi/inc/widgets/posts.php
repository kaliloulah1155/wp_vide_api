<?php
if (!class_exists('Apr_Core_Posts_Widget')) {
	class Apr_Core_Posts_Widget extends Apr_Core_Widget
	{

		public function __construct()
		{

			$cat_options = array(
				'recent_posts' => esc_html__('Recent Posts', 'apr-core'),
				'sticky_posts' => esc_html__('Sticky Posts', 'apr-core'),
			);
			$categories  = get_categories('hide_empty=0');
			if ($categories) {
				foreach ($categories as $category) {
					$cat_options[$category->term_id] = esc_html__('Category: ', 'apr-core') . $category->name;
				}
			}

			$this->widget_cssclass    = 'tm-posts-widget';
			$this->widget_description = esc_html__('Get list blog post.', 'apr-core');
			$this->widget_id          = 'tm-posts-widget';
			$this->widget_name        = esc_html__('[APR] Posts', 'apr-core');
			$this->settings           = array(
				'style'           => array(
					'type'    => 'select',
					'label'   => esc_html__('Style', 'apr-core'),
					'options' => array(
						'01' => 'Left Thumbnail',
						'02' => 'First Feature Post',
					),
					'std'     => '01',
				),
				'title'           => array(
					'type'  => 'text',
					'label' => esc_html__('Title', 'apr-core'),
					'std'   => '',
				),
				'cat'             => array(
					'type'    => 'select',
					'label'   => esc_html__('Category', 'apr-core'),
					'options' => $cat_options,
					'std'     => 'recent_posts',
				),
				'show_thumbnail'  => array(
					'type'  => 'checkbox',
					'label' => esc_html__('Show Thumbnail', 'apr-core'),
					'std'   => 1,
				),
				'show_categories' => array(
					'type'  => 'checkbox',
					'label' => esc_html__('Show Categories', 'apr-core'),
					'std'   => 1,
				),
				'show_date'       => array(
					'type'  => 'checkbox',
					'label' => esc_html__('Show Date', 'apr-core'),
					'std'   => 0,
				),
				'num'             => array(
					'type'  => 'number',
					'label' => esc_html__('Number Posts', 'apr-core'),
					'step'  => 1,
					'min'   => 1,
					'max'   => 40,
					'std'   => 5,
				),
			);

			parent::__construct();
		}

		public function widget($args, $instance)
		{
			$style           = isset($instance['style']) ? $instance['style'] : $this->settings['style']['std'];
			$cat             = isset($instance['cat']) ? $instance['cat'] : $this->settings['cat']['std'];
			$num             = isset($instance['num']) ? $instance['num'] : $this->settings['num']['std'];
			$show_thumbnail  = isset($instance['show_thumbnail']) && $instance['show_thumbnail'] === 1 ? 'true' : 'false';
			$show_categories = isset($instance['show_categories']) && $instance['show_categories'] === 1 ? 'true' : 'false';
			$show_date       = isset($instance['show_date']) && $instance['show_date'] === 1 ? 'true' : 'false';

			$this->widget_start($args, $instance);

			if ($cat === 'recent_posts') {
				$query_args = array(
					'post_type'           => 'post',
					'ignore_sticky_posts' => 1,
					'posts_per_page'      => $num,
					'orderby'             => 'date',
					'order'               => 'DESC',
				);
			} elseif ($cat === 'sticky_posts') {
				$sticky     = get_option('sticky_posts');
				$query_args = array(
					'post_type'      => 'post',
					'post__in'       => $sticky,
					'posts_per_page' => $num,
				);
			} else {
				$query_args = array(
					'post_type'           => 'post',
					'cat'                 => $cat,
					'ignore_sticky_posts' => 1,
					'posts_per_page'      => $num,
				);
			}

			$apr_query = new WP_Query($query_args);
			if ($apr_query->have_posts()) {
				$count        = $apr_query->post_count;
				$i            = 0;
				$wrap_classes = "tm-posts-widget-wrapper style-$style";
?>
				<div class="<?php echo esc_attr($wrap_classes); ?>">
					<?php
					while ($apr_query->have_posts()) {
						$apr_query->the_post();
						$i++;
						$classes = array('post-item');
						if ($i === 1) {
							$classes[] = 'first-post';
						} elseif ($i === $count) {
							$classes[] = 'last-post';
						}
					?>
						<div <?php post_class(implode(' ', $classes)); ?>>
							<?php if ($show_thumbnail === 'true') : ?>
								<?php if (get_post_format() !== 'link' && get_post_format() !== 'quote' && get_post_format() !== 'audio') : ?>
									<?php if (get_post_format() == 'gallery') : ?>
										<?php $gallery = get_post_meta(get_the_ID(), 'gallery_metabox', true); ?>
										<?php if (is_array($gallery) && count($gallery) > 1) : ?>
											<div class="blog-img">
												<div class="blog-gallery blog-img arrows-custom">
													<?php
													$index         = 0;
													foreach ($gallery as $key => $value) :
														$alt       = get_post_meta($value, '_wp_attachment_image_alt', true);
													?>
														<div class="img-gallery">
															<?php
															echo wp_get_attachment_image($value, array(270, 220), false, array(
																'alt' => $alt
															));
															?>
														</div>
													<?php
														$index++;
													endforeach;
													?>
												</div>
												<?php if ($show_date === 'true') : ?>
													<div class=" custom-date ">
														<a href="<?php the_permalink(); ?>">
															<span class="date"><?php echo get_the_time('d'); ?></span><br>
															<span class="month"><?php echo get_the_time('M'); ?></span>

														</a>
													</div>
												<?php endif; ?>
											</div>
										<?php endif; ?>
									<?php elseif (get_post_format() == 'video') : ?>
										<?php $video = get_post_meta(get_the_ID(), 'post_video', true); ?>
										<?php if ($video && $video != '') : ?>
											<?php if (has_post_thumbnail()) : ?>
												<div class="blog-video blog-img test">
													<a class="fancybox" data-fancybox href="<?php echo esc_url($video); ?>">
														<?php
														echo get_the_post_thumbnail_url(null, array(270, 220), array(
															'alt' => get_the_title()
														));
														?>
														<i class="icon icon-play32"></i>
													</a>
													<?php if ($show_date === 'true') : ?>
														<div class=" custom-date ">
															<a href="<?php the_permalink(); ?>">
																<span class="date"><?php echo get_the_time('d'); ?></span><br>
																<span class="month"><?php echo get_the_time('M'); ?></span>

															</a>
														</div>
													<?php endif; ?>
												</div>
											<?php endif; ?>
										<?php endif; ?>
									<?php else : ?>
										<?php if (has_post_thumbnail()) : ?>
											<div class="blog-img">
												<a href="<?php the_permalink(); ?>">
													<?php
													echo get_the_post_thumbnail_url(null, array(270, 220), array(
														'alt' => get_the_title()
													));
													?>
												</a>
												<?php if ($show_date === 'true') : ?>
													<div class=" custom-date ">
														<a href="<?php the_permalink(); ?>">
															<span class="date"><?php echo get_the_time('d'); ?></span><br>
															<span class="month"><?php echo get_the_time('M'); ?></span>

														</a>
													</div>
												<?php endif; ?>
											</div>
										<?php endif; ?>
									<?php endif; ?>
								<?php endif; ?>

								<?php if (get_post_format() == 'link' || get_post_format() == 'quote' || get_post_format() == 'audio') : ?>
									<?php if (get_post_format() == 'audio') : ?>
										<?php $audio = get_post_meta(get_the_ID(), 'post_audio', true); ?>
										<?php if ($audio && $audio != '') : ?>
											<div class="blog-audio">
												<?php if (get_post_format() == 'audio') {
													echo '<div class="iframe_audio_container">';
												}
												?>
												<?php if (strpos($audio, 'iframe') !== false) : ?>
													<?php echo wp_kses($audio, array(
														'iframe' => array(
															'height'          => array(),
															'style'           => array(),
															'src'             => array(),
															'allowfullscreen' => array(),
														)
													)); ?>
												<?php else : ?>
													<iframe src="<?php echo esc_url(is_ssl() ? str_replace('http://', 'https://', $audio) : $audio); ?> " width="100%" <?php if (get_post_format() == 'audio') {
																																												echo 'height="200"';
																																											} ?>></iframe>
												<?php endif; ?>
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
									<?php endif; ?>
								<?php endif; ?>
							<?php endif; ?>
							<?php if (get_post_format() !== 'quote') : ?>
								<div class="post-widget-info">
									<?php if ($show_categories === 'true') : ?>
										<div class="post-widget-categories">
											<?php the_category(', '); ?>
										</div>
									<?php endif; ?>
									<h5 class="post-widget-title">
										<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a>
									</h5>
								</div>
							<?php endif; ?>
							<?php if (get_post_format() == 'standard' && !has_post_thumbnail()) : ?>
								<div class="blog_post_desc">
									<?php the_excerpt(); ?>
									<?php
									wp_link_pages(array(
										'before'      => '<div class="page-links"><span class="page-links-title">' . esc_html__('Pages:', 'apr-core') . '</span>',
										'after'       => '</div>',
										'link_before' => '<span>',
										'link_after'  => '</span>',
										'pagelink'    => '<span class="screen-reader-text">' . esc_html__('Page', 'apr-core') . ' </span>%',
										'separator'   => '<span class="screen-reader-text">, </span>',
									));
									?>
								</div>
							<?php endif; ?>
						</div>
					<?php
					} ?>
				</div>
<?php
			}
			wp_reset_postdata();

			$this->widget_end($args);
		}
	}
}
