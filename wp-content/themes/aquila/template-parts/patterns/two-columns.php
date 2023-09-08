<?php

/**
 * Two Column Block Patterns Template template
 *
 * @package aquila
 */

$cover_style=sprintf('%s',esc_url(AQUILA_BUILD_IMG_URI.'/patterns/cover.jpg'));

?>
<!-- wp:cover {"url":"<?php echo $cover_style ?>","id":253,"dimRatio":50,"isDark":false,"align":"full","className":"aquila-cover"} -->
<div class="wp-block-cover alignfull is-light aquila-cover"><span aria-hidden="true" class="wp-block-cover__background has-background-dim"></span>
	<img class="wp-block-cover__image-background wp-image-253" alt="" src="<?php  echo $cover_style ?>" data-object-fit="cover"/><div class="wp-block-cover__inner-container"><!-- wp:heading {"textAlign":"center","level":1,"textColor":"white"} -->
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

<!-- wp:group {"backgroundColor":"black","layout":{"type":"constrained"}} -->
<div class="wp-block-group alignwide has-black-background-color has-background"><!-- wp:columns -->
	<div class="wp-block-columns"><!-- wp:column -->
		<div class="wp-block-column"><!-- wp:heading {"textColor":"luminous-vivid-amber","fontSize":"large"} -->
			<h2 class="wp-block-heading has-luminous-vivid-amber-color has-text-color has-large-font-size">Titre A</h2>
			<!-- /wp:heading -->

			<!-- wp:paragraph {"textColor":"white"} -->
			<p class="has-white-color has-text-color">Explicabo debitis cras itaque, praesentium? Elementum lobortis saepe morbi, donec ultricies interdum, facilisi ullamcorper illo animi quisquam asperiores consectetuer accusantium exercitation morbi netus aspernatur pharetra elit nec perferendis nihil aptent inventore orci voluptas taciti integer semper hac perferendis! Potenti montes, nam saepe, placerat vestibulum, sapiente nihil suspendisse iste, odio. Ut architecto autem habitant interdum? Magni? Sociosqu? Bibendum lectus sapiente metus! Fugiat? Molestias nec porta? Laoreet? Dolorum pellentesque hymenaeos  </p>
			<!-- /wp:paragraph --></div>
		<!-- /wp:column -->

		<!-- wp:column -->
		<div class="wp-block-column"><!-- wp:heading {"textColor":"luminous-vivid-amber","fontSize":"large"} -->
			<h2 class="wp-block-heading has-luminous-vivid-amber-color has-text-color has-large-font-size">Titre B</h2>
			<!-- /wp:heading -->

			<!-- wp:paragraph {"align":"left","textColor":"white"} -->
			<p class="has-text-align-left has-white-color has-text-color">Explicabo debitis cras itaque, praesentium? Elementum lobortis saepe morbi, donec ultricies interdum, facilisi ullamcorper illo animi quisquam asperiores consectetuer accusantium exercitation morbi netus aspernatur pharetra elit nec perferendis nihil aptent inventore orci voluptas taciti integer semper hac perferendis! Potenti montes, nam saepe, placerat vestibulum, sapiente nihil suspendisse iste, odio. Ut architecto autem habitant interdum? Magni? Sociosqu? Bibendum lectus sapiente metus! Fugiat? Molestias nec porta? Laoreet? Dolorum pellentesque hymenaeos </p>
			<!-- /wp:paragraph --></div>
		<!-- /wp:column --></div>
	<!-- /wp:columns --></div>
<!-- /wp:group -->
