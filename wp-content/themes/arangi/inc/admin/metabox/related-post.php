<?php
if ( ! class_exists( 'Apr_Core_Related_Posts' ) ) :

	class Apr_Core_Related_Posts {

		private $supported_post_types;
		private $metakey;

		function __construct() {

			// Set default supported post types
			$this->supported_post_types = array( 'gallery', 'post' );

			// if ( $metakey ) {
			//     $this->metakey = $metakey;
			// }
			// else {
			$this->metakey = 'related_entries';
			//}

			wp_register_script( 'jquery-select2', ARANGI_JS . '/select2.min.js', array(), ARANGI_THEME_VERSION );
			wp_register_script( 'related-metabox-scripts', ARANGI_JS . '/related.metabox.js', array( 'jquery', 'jquery-select2' ), ARANGI_THEME_VERSION );
			wp_register_style( 'style-select2', get_template_directory_uri() . '/assets/css/select2.min.css', array(), ARANGI_THEME_VERSION );

			add_action( 'admin_enqueue_scripts', array( $this, 'related_metabox_enqueues' ) );
			add_action( 'add_meta_boxes', array( $this, 'related_add_metabox' ) );
			add_action( 'save_post', array( $this, 'related_metabox_save' ) );
		}

		function related_metabox_enqueues( $screen ) {
			if ( $screen == 'post.php' || $screen == 'post-new.php' ) {
				wp_enqueue_script( 'jquery-select2' );
				wp_enqueue_script( 'related-metabox-scripts' );
				wp_enqueue_style( 'style-select2' );
			}
		}

		function related_add_metabox( $post_type ) {
			if ( in_array( $post_type, $this->supported_post_types ) ) {
				add_meta_box(
					'related-metabox',
					esc_html__( 'Related post', 'arrowpress-core' ),
					array( $this, 'related_metabox_fields' ),
					$post_type,
					'side',
					'default'
				);
			}
		}

		function related_metabox_fields( $post ) {
			wp_nonce_field( 'sn_related_metabox', 'sn_related_metabox_nonce' );
			$post_ids = get_post_meta( $post->ID, $this->metakey, true );

			if ( ! is_array( $post_ids ) ) {
				$post_ids = array();
			}

			$query_posts    = new WP_Query;
			$post_obj_array = $query_posts->query(
				array(
					'post_type'      => array( 'gallery', 'post' ),
					'post_status'    => 'publish',
					'pagination'     => false,
					'posts_per_page' => '-1',
					'post__not_in'   => array( $post->ID ),
				)
			);
			if ( count( $post_obj_array ) > 1 ) : ?>
				<select id="related-post-select" name="related-post-ids[]" multiple="multiple"><?php
				foreach ( $post_obj_array as $key => $post_obj ) : ?>
					<option
						value="<?php echo esc_attr( $post_obj->ID ); ?>"<?php echo ( in_array( $post_obj->ID, $post_ids ) ) ? ' selected="selected"' : ''; ?>><?php echo '' . $post_obj->post_title; ?></option>
				<?php
				endforeach; ?>
				</select><?php
			endif;
		}

		function related_metabox_save( $post_id ) {

			if ( ! isset( $_POST['sn_related_metabox_nonce'] )
				|| ! wp_verify_nonce( $_POST['sn_related_metabox_nonce'], 'sn_related_metabox' )
				|| ! current_user_can( 'edit_post', $post_id ) ) {
				return;
			}

			if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
				return;
			}

			$new_meta_data = array();
			$old_meta_data = get_post_meta( $post_id, $this->metakey, true );

			if ( isset ( $_POST['related-post-ids'] ) ) {
				$new_meta_data = $_POST['related-post-ids'];
			}

			if ( ! empty( $new_meta_data ) ) {
				if ( empty( $old_meta_data ) ) {
					add_post_meta( $post_id, $this->metakey, $new_meta_data, true );
				} elseif ( array_diff( $old_meta_data, $new_meta_data ) || $old_meta_data !== $new_meta_data ) {
					update_post_meta( $post_id, $this->metakey, $new_meta_data );
				}
			} else {
				delete_post_meta( $post_id, $this->metakey );
			}
		}
	}

	if ( is_admin() ) {
		add_action( 'load-post.php', 'sn_related_init' );
		add_action( 'load-post-new.php', 'sn_related_init' );
	}

	function sn_related_init() {
		new Apr_Core_Related_Posts();
	}

endif;
?>
