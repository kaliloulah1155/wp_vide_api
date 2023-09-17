<?php
/**
 * Single post template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Aquila
 */


 
get_header();
?>
	<div id="primary" >
		<main id="main" class="site-main mt-2" role="main">
			<div class="container">
				<div class="row">
					<div class="col-lg-8 col-md-8 col-sm-12">
						<?php
						if(have_posts()):
							?>
							<div class="post-wrap">
								<?php
								if(is_home() && ! is_front_page()){
									?>
									<header class="mb-2">
										<h1 class="page-title">
											<?php single_post_title(); ?>
										</h1>
									</header>
									<?php
								}
								?>

								<?php

								//Start the loop.
								while(have_posts()) :the_post();
									// BEGIN CONTENT -->
									get_template_part('template-parts/content');
									// END CONTENT -->
								endwhile;
								?>

							</div>
						<?php
						else:
							get_template_part('template-parts/content-none');
						endif;
						// For Single Post loadmore button, uncomment this code and comment next and prev link code below.
                            echo do_shortcode( '[single_post_listings]' )

						?>
						<!-- Next and previous link for page navigation-->
						<div class="prev-link"><?php previous_post_link(); ?></div>
						<div class="next-link"><?php next_post_link(); ?> </div>
					</div>
					<div class="col-lg-4 col-md-4 col-sm-12">
						<?php get_sidebar(); ?>
					</div>
				</div>
			</div>
		</main>
	</div><!-- #main -->
<?php

get_footer();
