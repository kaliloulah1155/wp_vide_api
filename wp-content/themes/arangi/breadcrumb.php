<?php
global $product;
$breadcrumb = Arangi::setting('breadcrumb');
$page_title = Arangi::setting('page_title');
$bg_breadcrumb = Arangi::setting('general_background');
$page_titles = get_post_meta(get_the_ID(), 'page_title', true);
$breadcrumbs = get_post_meta(get_the_ID(), 'breadcrumbs', true);
$bg_breadcrumbs = get_post_meta(get_the_ID(), 'breadcrumbs_bg', true);
$is_home_page = get_post_meta(get_the_ID(), 'is_home_page', true);
$bg_breadcrumb_cate = arangi_get_meta_value('image');
$bg_breadcrumb_cate_post = arangi_get_meta_value('image');
if(is_category() || is_tax()){
	$page_title_cat = arangi_get_meta_value('page_title', true);
	if (!$page_title_cat) {
		$page_title = false;
	}
}else{
	if($page_titles === '1'){
		$page_title = false;
	}else{
		if ($page_title === '1') {
			$page_title = true;
		} else {
			$page_title = false;
		}
	}
}
	
if ((is_front_page() && is_home()) || is_front_page() || is_page_template('coming-soon.php')|| is_404()) {
    $breadcrumb = false;
    $page_title = false;
} else {
	if(is_category() || is_tax()){
		$breadcrumb_cat = arangi_get_meta_value('breadcrumb', true);
		if (!$breadcrumb_cat) {
			$breadcrumb = false;
		}
	}else{
		if ($breadcrumbs === '1') {
	        $breadcrumb = false;
	    }
	}
}
$bg_breadcrumb_image = '';
if (is_tax('product_cat') && $bg_breadcrumb_cate !=''){
	$bg_breadcrumb_image = $bg_breadcrumb_cate;
} elseif(is_category() && $bg_breadcrumb_cate_post != ''){
	$bg_breadcrumb_image = $bg_breadcrumb_cate_post;
} else{
	if (isset($bg_breadcrumbs) && $bg_breadcrumbs != '') {
		$bg_breadcrumb_image = $bg_breadcrumbs;
	} else {
		$bg_breadcrumb_image = $bg_breadcrumb["background-image"];
	}
}
?>

<!-- Page title + breadcrumb -->
<?php if($breadcrumb == true || $page_title == true): ?>
<div class="side-breadcrumb" <?php if($bg_breadcrumb_image): ?>style="background-image: url(<?php echo esc_url($bg_breadcrumb_image)?>);" <?php endif; ?>>
    <div class="container">
        <div class="row align-items-center">
			<div class="col-xl-12 col-md-12 col-sm-12 col-xs-12">
        	<?php if($page_title == true) { ?>
        		<?php if(!is_singular('product')):?>
					<?php if(($page_title == true) && (get_the_title() != '' || is_404())) :?>
						<div class="page-title">
							<?php if(is_singular('product') || $is_home_page ):?>
								<h2>
								<?php else: ?>
									<h1>
								<?php endif; ?>
								<?php Arangi_Templates::page_title();?>
								<?php if(is_singular('product')):?>
									</h2>
								<?php else: ?>
									</h1>
								<?php endif; ?>
						</div>
					<?php endif?>
				<?php endif;?>
			<?php } ?>
			<?php if ($breadcrumb):?>
	            <div class="breadcrumbs">
	                <?php Arangi_Templates::breadcrumbs(); ?>
	            </div>
	        <?php endif;?>
	    </div>
        </div>
    </div>
</div>
<?php endif; ?>

