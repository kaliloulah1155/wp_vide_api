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

	<footer>
		<h3>Footer</h3>
		<?php

		    if(is_active_sidebar('sidebar-2')){
		    	?>
				 <aside>
					 <?php dynamic_sidebar('sidebar-2'); ?>
				 </aside>
		        <?php
			}
		?>
	</footer><!-- #colophon -->
	</div>
</div>

<?php wp_footer(); ?>
</body>
</html>
