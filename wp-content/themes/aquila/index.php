<?php
/**
 * The main template file
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
		<main id="main" class="site-main mt-4" role="main">
			<?php
			   if(have_posts()):
			   	?>
				   <div class="container">
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
					   <div class="row">
						   <?php

						   //Start the loop.
						   while(have_posts()) :the_post();
							       ?>
                                    <div class="col-lg-4 col-md-6 col-sm-12">

									<?php
									// BEGIN CONTENT -->
 									get_template_part('template-parts/content')
									// END CONTENT -->

							       ?>
									</div>
									<?php

						   endwhile;
						   ?>
					   </div>
				   </div>
				   <?php
			   else:
				   get_template_part('template-parts/content-none');
			   endif;

			?>
			<div class="container d-flex justify-content-center">
				 <?php aquila_pagination(); ?>
			</div>
		</main>
	</div><!-- #main -->

<?php

get_footer();
