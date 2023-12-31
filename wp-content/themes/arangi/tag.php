<?php 
get_header(); 
$arangi_class = arangi_get_layout_class();
?>
<?php get_sidebar('left'); ?> 
	<div class="<?php echo esc_attr($arangi_class);?>">			
		<div id="primary" class="content-area">
             <?php if (have_posts()): ?>                        
                 <?php get_template_part( 'templates/content', 'blog-archive' ); ?>
             <?php else: ?> 
                 <?php get_template_part('content', 'none'); ?>
             <?php endif; ?>
		</div> <!-- End primary -->
	</div>
<?php get_sidebar('right'); ?> 
<?php get_footer(); ?>