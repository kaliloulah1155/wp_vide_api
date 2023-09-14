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
		<main id="main" class="site-main mt-1" role="main">
			<div class="home-page-wrap">
						<?php
						if(have_posts()):
								//Start the loop.
								while(have_posts()) :the_post();
									// BEGIN CONTENT -->
									get_template_part('template-parts/content','page');
									// END CONTENT -->
								endwhile;
						else:
							get_template_part('template-parts/content-none');
						endif;

						get_template_part('template-parts/components/posts-carousel');

						?>
			</div>
		</main>
	</div><!-- #main -->
<?php
get_footer();
