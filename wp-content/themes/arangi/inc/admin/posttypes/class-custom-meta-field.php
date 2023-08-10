<?php

class Apr_Core_Custom_Term_Meta {

	public function __construct() {

		if ( is_admin() ) {

			add_action( 'product_cat_add_form_fields', array( $this, 'create_screen_fields' ), 10, 1 );
			add_action( 'product_cat_edit_form_fields', array( $this, 'edit_screen_fields' ), 10, 2 );

			add_action( 'created_term', array( $this, 'save_data' ), 10, 1 );
			add_action( 'edit_term', array( $this, 'save_data' ), 10, 1 );

			add_action( 'admin_enqueue_scripts', array( $this, 'load_scripts_styles' ) );
			add_action( 'admin_footer', array( $this, 'add_admin_js' ) );
		}

	}

	public function create_screen_fields( $taxonomy ) {

		// Set default values.
		$product_cat_label      = '';
		$categories_label_color = '';
		// Form fields.

		echo '<div class="form-field term-product_cat_label-wrap">';
		echo '	<label for="product_cat_label">' . __( 'Categories label', 'apr-core' ) . '</label>';
		echo '	<input type="text" id="product_cat_label" name="product_cat_label" placeholder="' . esc_attr__( '', 'apr-core' ) . '" value="' . esc_attr( $product_cat_label ) . '">';
		echo wp_oembed_get( $product_cat_label );
		echo '	<p class="description">' . __( 'Categories label.', 'apr-core' ) . '</p>';
		echo '</div>';

		echo '<div class="form-field term-categories_label_color-wrap">';
		echo '	<label for="categories_label_color">' . __( 'Categories label background color', 'apr-core' ) . '</label>';
		echo '	<input type="text" id="categories_label_color" name="categories_label_color" class="categories_label_color_picker" value="' . esc_attr( $categories_label_color ) . '"><br>';
		echo '	<p class="description">' . __( 'The hex background color of the Categories label.', 'apr-core' ) . '</p>';
		echo '</div>';
	}

	public function edit_screen_fields( $term, $taxonomy ) {

		// Retrieve an existing value from the database.
		$product_cat_label      = get_term_meta( $term->term_id, 'product_cat_label', true );
		$categories_label_color = get_term_meta( $term->term_id, 'categories_label_color', true );

		if ( empty( $product_cat_label ) ) {
			$product_cat_label = '';
		}
		if ( empty( $categories_label_color ) ) {
			$categories_label_color = '';
		}

		echo '<tr class="form-field term-product_cat_label-wrap">';
		echo '<th scope="row">';
		echo '	<label for="product_cat_label">' . __( 'Categories label', 'apr-core' ) . '</label>';
		echo '</th>';
		echo '<td>';
		echo '	<input type="text" id="product_cat_label" name="product_cat_label" placeholder="' . esc_attr__( '', 'apr-core' ) . '" value="' . esc_attr( $product_cat_label ) . '">';
		echo wp_oembed_get( $product_cat_label );
		echo '	<p class="description">' . __( 'Region descriptive video.', 'apr-core' ) . '</p>';
		echo '</td>';
		echo '</tr>';

		echo '<tr class="form-field term-categories_label_color-wrap">';
		echo '<th scope="row">';
		echo '	<label for="categories_label_color">' . __( 'Categories label color', 'apr-core' ) . '</label>';
		echo '</th>';
		echo '<td>';
		echo '	<input type="text" id="categories_label_color" name="categories_label_color" class="categories_label_color_picker" value="' . esc_attr( $categories_label_color ) . '"><br>';
		echo '	<p class="description">' . __( 'The hex color of the region title.', 'apr-core' ) . '</p>';
		echo '</td>';
		echo '</tr>';

	}

	public function save_data( $term_id ) {

		// Sanitize user input.
		$categories_new_label       = isset( $_POST['product_cat_label'] ) ? $_POST['product_cat_label'] : '';
		$categories_new_label_color = isset( $_POST['categories_label_color'] ) ? sanitize_hex_color( $_POST['categories_label_color'] ) : '';

		// Update the meta field in the database.
		update_term_meta( $term_id, 'product_cat_label', $categories_new_label );
		update_term_meta( $term_id, 'categories_label_color', $categories_new_label_color );

	}

	public function load_scripts_styles() {

		// Color picker
		wp_enqueue_script( 'wp-color-picker' );
		wp_enqueue_style( 'wp-color-picker' );

	}

	public function add_admin_js() {

		// Print js only once per page
		if ( did_action( 'Categories_label_Term_Meta_js' ) >= 1 ) {
			return;
		}

		?>
		<script type="text/javascript">
			jQuery(document).ready(function ($) {
				$('.categories_label_color_picker').wpColorPicker();
			});
		</script>
		<?php

		do_action( 'Categories_label_Term_Meta_js', $this );

	}

}

new Apr_Core_Custom_Term_Meta;
