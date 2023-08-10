<?php
$url_image_preview = 'https://arrowtheme.github.io/demo-data/arangi/images';
$plugin_required   = array(
	'elementor',
	'classic-widgets',
	'woocommerce',
	'woocommerce-ajax-filters',
	'yith-woocommerce-brands-add-on',
	'mailchimp-for-wp',
	'contact-form-7'
);
$revolution        = array(
	'revslider'
);

return array(
	'demo-1' => array(
		'title' => 'Home 1',
		'demo_url' => 'https://arangi.arrowtheme.com/home-1', 
		'default_content' => true,
		'plugins_required' => array_merge($plugin_required, $revolution),
		'thumbnail_url' =>  $url_image_preview . '/home1.jpg',
		'revsliders'       => array(
			'home-organic.zip'
		),
	),
	'demo-2' => array(
		'title' => 'Home 2',
		'demo_url' => 'https://arangi.arrowtheme.com/home-2',
		'default_content' => true,
		'plugins_required' => array_merge($plugin_required, $revolution),
		'thumbnail_url' =>  $url_image_preview . '/home2.jpg',
		'revsliders'       => array(
			'home-food.zip'
		),

	),
	'demo-3' => array(
		'title' => 'Home 3',
		'demo_url' => 'https://arangi.arrowtheme.com/home-3',
		'default_content' => true,
		'plugins_required' => array_merge($plugin_required, $revolution),
		'thumbnail_url' =>  $url_image_preview . '/home3.jpg',
		'revsliders'       => array(
			'organic_medicine.zip'
		),
	),
	'demo-4' => array(
		'title' => 'Home 4',
		'demo_url' => 'https://arangi.arrowtheme.com/organic-wine',
		'default_content' => true,
		'plugins_required' => array_merge($plugin_required, $revolution),
		'thumbnail_url' =>  $url_image_preview . '/home4.jpg',
		'revsliders'       => array(
			'home-wine.zip'
		),
	),
	'demo-5' => array(
		'title' => 'Home 5',
		'demo_url' => 'https://arangi.arrowtheme.com/home-kids',
		'default_content' => true,
		'plugins_required' => array_merge($plugin_required, $revolution),
		'thumbnail_url' =>  $url_image_preview . '/home5.jpg',
		'revsliders'       => array(
			'home-kids.zip'
		),
	),
	'demo-6' => array(
		'title' => 'Home 6',
		'demo_url' => 'https://arangi.arrowtheme.com/home-tea',
		'default_content' => true,
		'plugins_required' => array_merge($plugin_required, $revolution),
		'thumbnail_url' =>  $url_image_preview . '/home6.jpg',
		'revsliders'       => array(
			'home-tea.zip'
		),
	),
	'demo-7' => array(
		'title' => 'Home 7',
		'demo_url' => 'https://arangi.arrowtheme.com/home-garden-safe',
		'default_content' => true,
		'plugins_required' => array_merge($plugin_required, $revolution),
		'thumbnail_url' =>  $url_image_preview . '/home7.jpg',
		'revsliders'       => array(
			'garden_safe.zip'
		),
	),
	'demo-8' => array(
		'title' => 'Home 8',
		'demo_url' => 'https://arangi.arrowtheme.com/food-farm',
		'default_content' => true,
		'plugins_required' => array_merge($plugin_required, $revolution),
		'thumbnail_url' =>  $url_image_preview . '/home8.jpg',
		'revsliders'       => array(
			'foodfarm.zip'
		),
	),
	// 'demo-9' => array(
	// 	'title' => 'Home 9',
	// 	'demo_url' => 'https://arangi.arrowtheme.com/home-instagram',
	// 	'default_content' => true,
	// 	'plugins_required' => $plugin_required,
	// 	'thumbnail_url' =>  $url_image_preview . '/home9.jpg'
	// ),
);
