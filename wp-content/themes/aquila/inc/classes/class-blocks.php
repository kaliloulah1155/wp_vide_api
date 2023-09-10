<?php

/**
 * Blocks
 *
 * @package Aquila
 */

namespace Aquila\Inc;

use Aquila\Inc\Traits\Singleton;

class Blocks
{
	use Singleton;

	protected function __construct()
	{

		//load class
		$this->setup_hooks();
	}

	protected function setup_hooks()
	{
		/*
		 * Actions
		 */
		add_action('block_categories_all', [$this, 'add_block_categories']);

	}

	public function add_block_categories($categories){
		$category_slugs=wp_list_pluck($categories,'slug');


		 return in_array('aquila',$category_slugs,true) ? $categories:
			array_merge(
				$categories,
				[
					[
						'slug' => 'aquila',
						'title' => __('Aquila Blocks','aquila'),
						'icon' => 'table-row-after'
					]
				]

			);

	}


}
