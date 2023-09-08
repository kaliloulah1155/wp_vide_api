<?php

/**
 * Cover Block Patterns Template template
 *
 * @package aquila
 */

$cover_style=sprintf('%s',esc_url(AQUILA_BUILD_IMG_URI.'/patterns/cover.jpg'));
/*
echo '<pre>';
print_r($cover_style);
wp_die(); */
?>

<!-- wp:cover {"url":"<?php echo $cover_style ?>","id":253,"dimRatio":50,"isDark":false,"align":"full","className":"aquila-cover"} -->
<div class="wp-block-cover alignfull is-light aquila-cover"><span aria-hidden="true" class="wp-block-cover__background has-background-dim"></span>
	<img class="wp-block-cover__image-background wp-image-253" alt="" src="<?php echo $cover_style ?>" data-object-fit="cover"/><div class="wp-block-cover__inner-container"><!-- wp:heading {"textAlign":"center","level":1,"textColor":"white"} -->
		<h1 class="wp-block-heading has-text-align-center has-white-color has-text-color"><strong>Image de couverture</strong></h1>
		<!-- /wp:heading -->

		<!-- wp:paragraph {"align":"center","textColor":"white"} -->
		<p class="has-text-align-center has-white-color has-text-color">c'est un sous titre de la page de couverture </p>
		<!-- /wp:paragraph -->

		<!-- wp:buttons {"layout":{"type":"flex","verticalAlignment":"center","justifyContent":"center"}} -->
		<div class="wp-block-buttons"><!-- wp:button {"textAlign":"right","textColor":"white","className":"is-style-outline"} -->
			<div class="wp-block-button is-style-outline"><a class="wp-block-button__link has-white-color has-text-color has-text-align-right wp-element-button">Blogs</a></div>
			<!-- /wp:button --></div>
		<!-- /wp:buttons --></div></div>
<!-- /wp:cover -->

<!-- wp:paragraph -->
<p></p>
<!-- /wp:paragraph -->
