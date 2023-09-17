<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Aquila
 */
   
?>

	<footer id="site-footer" class="bg-light p-4">
		<div class="row">
              <section class="col-lg-4 col-md-6 col-sm-12">
						Nobis orci consectetur excepturi? Cumque fringilla? Erat voluptatem sequi! Totam! Turpis lectus, porro mauris magnam officia ad. Earum. Diam unde? Viverra veritatis error pretium! Iure placerat per, quam distinctio lorem, fermentum, beatae dignissimos explicabo.
			  </section>
			   <section class="col-lg-4 col-md-6 col-sm-12">
					<?php

						if (is_active_sidebar('sidebar-2')) {
							?>
										<aside>
											<?php dynamic_sidebar('sidebar-2');?>
										</aside>
										<?php
						}
						?>
			  </section>
			   <section class="col-lg-4 col-md-6 col-sm-12">
                    <ul class="d-flex">
						<li class="list-unstyled">
							<a href="https://facebook" title="facebook">
								<svg width="50"><use href="#icon-facebook"></use></svg>
							</a>
						</li>
						<li class="list-unstyled">
							<a href="https://twitter.com" title="twitter">
								<svg width="50"><use href="#icon-twitter"></use></svg>
							</a>
						</li>
						<li class="list-unstyled">
							<a href="https://linkedin.com" title="linkedin">
								<svg width="50"><use href="#icon-linkedin"></use></svg>
							</a>
						</li>
					</ul>
			  </section>
		</div>
		
	</footer><!-- #colophon -->
	</div>
</div>

<?php 
get_template_part('template-parts/content','svgs') ;
wp_footer(); 
?>
</body>
</html>
