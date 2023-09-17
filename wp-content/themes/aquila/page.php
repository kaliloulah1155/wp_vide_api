
<?php
/**
 * Page template
 *
 * @package aquila
 */

get_header();

if (have_posts()) {
	while (have_posts()) {
		the_post();



		if (is_page('contact')) {
			//get_template_part('content', 'about');
			//echo 'contact';
		} elseif (is_page('enquiry')) {
			//echo 'enquiry';
			//get_template_part('content', 'about');
			get_template_part('template-parts/pages/content','enquiry');
		 } elseif (is_page('loadmore-demo')) {
			   
			 get_template_part('template-parts/content', 'loadmore');

		} else {
			// Si aucune des conditions précédentes n'est remplie, afficher le contenu par défaut
			the_content();
		}
	}
}

?>



	<div>Single Page</div>

<?php  get_footer(); ?>


