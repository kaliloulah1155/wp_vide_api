<?php
if ( ! class_exists( 'Apr_Core_Social_Widget' ) ) {
	class Apr_Core_Social_Widget extends Apr_Core_Widget {
		public function __construct() {
			$this->widget_cssclass    = 'tm-social-widget';
			$this->widget_description = esc_html__( 'Get list social info.', 'apr-core' );
			$this->widget_id          = 'tm-social-widget';
			$this->widget_name        = esc_html__( '[APR] Social', 'apr-core' );
			parent::__construct();
		}

		public function widget( $args, $instance ) {
			$before_widget = '<div id="tm-social-widget" class="widget tm-social-widget">';
			$after_widget  = '</div>';
			$before_title  = '<h2 class="widget-title">';
			$after_title   = '</h2>';
			$title         = isset( $instance['title'] ) ? apply_filters( 'widget_title', $instance['title'] ) : '';
			$facebook      = isset( $instance['facebook'] ) ? $instance['facebook'] : '';
			$twitter       = isset( $instance['twitter'] ) ? $instance['twitter'] : '';
			$instagram     = isset( $instance['instagram'] ) ? $instance['instagram'] : '';
			$pinterest     = isset( $instance['pinterest'] ) ? $instance['pinterest'] : '';
			$google        = isset( $instance['google'] ) ? $instance['google'] : '';
			$linkedin      = isset( $instance['linkedin'] ) ? $instance['linkedin'] : '';
			$youtube       = isset( $instance['youtube'] ) ? $instance['youtube'] : '';
			$dribble       = isset( $instance['dribble'] ) ? $instance['dribble'] : '';
			$behance       = isset( $instance['behance'] ) ? $instance['behance'] : '';
			$output        = '';
			$show_social   = Arangi::setting( "show_social" );
			echo wp_kses_post( $args['before_widget'] );
			if ( $instance['title'] ) {
				echo wp_kses_post( $args['before_title'] . esc_html( $instance['title'] ) . $args['after_title'] );
			}
			echo '<ul class="footer-social-networks">';
			if ( $facebook != '' ) {
				echo '<li class="fb"><a target="_blank" href="' . esc_attr( $facebook ) . '"><i class="fab fa-facebook-f"></i><span class="label">' . esc_html__( "Facebook", "apr-core" ) . '</span></a> </li>';
			}
			if ( $twitter != '' ) {
				echo '<li class="tw"><a target="_blank" href="' . esc_attr( $twitter ) . '"><i class="fab fa-twitter"></i><span class="label">' . esc_html__( "Twitter", "apr-core" ) . '</span></a> </li>';
			}
			if ( $google != '' ) {
				echo '<li class="gg"><a target="_blank" href="' . esc_attr( $google ) . '"><i class="fab fa-google-plus"></i><span class="label">' . esc_html__( "Google +", "apr-core" ) . '</span></a> </li>';
			}
			if ( $instagram != '' ) {
				echo '<li class="insta"><a target="_blank" href="' . esc_attr( $instagram ) . '"><i class="fab fa-instagram"></i><span class="label">' . esc_html__( "Instagram", "apr-core" ) . '</span></a> </li>';
			}
			if ( $pinterest != '' ) {
				echo '<li class="pin"><a target="_blank" href="' . esc_attr( $pinterest ) . '"><i class="fab fa-pinterest"></i><span class="label">' . esc_html__( "Pinterest", "apr-core" ) . '</span></a> </li>';
			}
			if ( $linkedin != '' ) {
				echo '<li class="linkedin"><a href="' . esc_attr( $linkedin ) . '"><i class="fab fa-linkedin"><span class="label">' . esc_html__( "Linkedin", "apr-core" ) . '</span></i></a> </li>';
			}
			if ( $youtube != '' ) {
				echo '<li class="yt"><a target="_blank" href="' . esc_attr( $youtube ) . '"><i class="fab fa-youtube"></i><span class="label">' . esc_html__( "Youtobe", "apr-core" ) . '</span></a> </li>';
			}
			if ( $dribble != '' ) {
				echo '<li class="dribble"><a target="_blank" href="' . esc_attr( $dribble ) . '"><i class="fab fa-dribbble"></i><span class="label">' . esc_html__( "Dribble", "apr-core" ) . '</span></a> </li>';
			}
			if ( $behance != '' ) {
				echo '<li class="behance"><a target="_blank" href="' . esc_attr( $behance ) . '"><i class="fab fa-behance"></i><span class="label">' . esc_html__( "Behance", "apr-core" ) . '</span></a> </li>';
			}
			echo '</ul>';
			echo wp_kses_post( $args['after_widget'] );
		}

		public function update( $new_instance, $old_instance ) {
			$instance              = $old_instance;
			$instance['title']     = strip_tags( $new_instance['title'] );
			$instance['facebook']  = strip_tags( $new_instance['facebook'] );
			$instance['twitter']   = strip_tags( $new_instance['twitter'] );
			$instance['instagram'] = strip_tags( $new_instance['instagram'] );
			$instance['pinterest'] = strip_tags( $new_instance['pinterest'] );
			$instance['google']    = strip_tags( $new_instance['google'] );
			$instance['linkedin']  = strip_tags( $new_instance['linkedin'] );
			$instance['youtube']   = strip_tags( $new_instance['youtube'] );
			$instance['dribble']   = strip_tags( $new_instance['dribble'] );
			$instance['behance']   = strip_tags( $new_instance['behance'] );

			return $instance;
		}

		public function form( $instance ) {
			$defaults = array(
				'title'     => 'Follow us',
				'facebook'  => '#',
				'twitter'   => '#',
				'instagram' => '#',
				'pinterest' => '#',
				'google'    => '#',
				'linkedin'  => '',
				'youtube'   => '',
				'dribble'   => '',
				'behance'   => '',

			);
			$instance = wp_parse_args( (array) $instance, $defaults );
			?>
			<p>
				<label
					for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php esc_html_e( 'Widget Title', 'apr-core' ); ?></label>
				<input id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"
					   name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>"
					   value="<?php echo esc_attr( $instance['title'] ); ?>" style="width:100%;"/>
			</p>
			<p>
				<label
					for="<?php echo esc_attr( $this->get_field_id( 'facebook' ) ); ?>"><?php esc_html_e( 'Facebook', 'apr-core' ); ?></label>
				<input id="<?php echo esc_attr( $this->get_field_id( 'facebook' ) ); ?>"
					   name="<?php echo esc_attr( $this->get_field_name( 'facebook' ) ); ?>"
					   value="<?php echo esc_attr( $instance['facebook'] ); ?>" style="width:100%;"/>
			</p>
			<p>
				<label
					for="<?php echo esc_attr( $this->get_field_id( 'twitter' ) ); ?>"><?php esc_html_e( 'Twitter', 'apr-core' ); ?></label>
				<input id="<?php echo esc_attr( $this->get_field_id( 'twitter' ) ); ?>"
					   name="<?php echo esc_attr( $this->get_field_name( 'twitter' ) ); ?>"
					   value="<?php echo esc_attr( $instance['twitter'] ); ?>" style="width:100%;"/>
			</p>
			<p>
				<label
					for="<?php echo esc_attr( $this->get_field_id( 'google' ) ); ?>"><?php esc_html_e( 'Google Plus', 'apr-core' ); ?></label>
				<input id="<?php echo esc_attr( $this->get_field_id( 'google' ) ); ?>"
					   name="<?php echo esc_attr( $this->get_field_name( 'google' ) ); ?>"
					   value="<?php echo esc_attr( $instance['google'] ); ?>" style="width:100%;"/>
			</p>
			<p>
				<label
					for="<?php echo esc_attr( $this->get_field_id( 'instagram' ) ); ?>"><?php esc_html_e( 'Instagram', 'apr-core' ); ?></label>
				<input id="<?php echo esc_attr( $this->get_field_id( 'instagram' ) ); ?>"
					   name="<?php echo esc_attr( $this->get_field_name( 'instagram' ) ); ?>"
					   value="<?php echo esc_attr( $instance['instagram'] ); ?>" style="width:100%;"/>
			</p>
			<p>
				<label
					for="<?php echo esc_attr( $this->get_field_id( 'pinterest' ) ); ?>"><?php esc_html_e( 'Pinterest', 'apr-core' ); ?></label>
				<input id="<?php echo esc_attr( $this->get_field_id( 'pinterest' ) ); ?>"
					   name="<?php echo esc_attr( $this->get_field_name( 'pinterest' ) ); ?>"
					   value="<?php echo esc_attr( $instance['pinterest'] ); ?>" style="width:100%;"/>
			</p>
			<p>
				<label
					for="<?php echo esc_attr( $this->get_field_id( 'linkedin' ) ); ?>"><?php esc_html_e( 'Linkedin', 'apr-core' ); ?></label>
				<input id="<?php echo esc_attr( $this->get_field_id( 'linkedin' ) ); ?>"
					   name="<?php echo esc_attr( $this->get_field_name( 'linkedin' ) ); ?>"
					   value="<?php echo esc_attr( $instance['linkedin'] ); ?>" style="width:100%;"/>
			</p>
			<p>
				<label
					for="<?php echo esc_attr( $this->get_field_id( 'youtube' ) ); ?>"><?php esc_html_e( 'Youtube', 'apr-core' ); ?></label>
				<input id="<?php echo esc_attr( $this->get_field_id( 'youtube' ) ); ?>"
					   name="<?php echo esc_attr( $this->get_field_name( 'youtube' ) ); ?>"
					   value="<?php echo esc_attr( $instance['youtube'] ); ?>" style="width:100%;"/>
			</p>
			<p>
				<label
					for="<?php echo esc_attr( $this->get_field_id( 'dribble' ) ); ?>"><?php esc_html_e( 'Dribble', 'apr-core' ); ?></label>
				<input id="<?php echo esc_attr( $this->get_field_id( 'dribble' ) ); ?>"
					   name="<?php echo esc_attr( $this->get_field_name( 'dribble' ) ); ?>"
					   value="<?php echo esc_attr( $instance['dribble'] ); ?>" style="width:100%;"/>
			</p>
			<p>
				<label
					for="<?php echo esc_attr( $this->get_field_id( 'behance' ) ); ?>"><?php esc_html_e( 'Behance', 'apr-core' ); ?></label>
				<input id="<?php echo esc_attr( $this->get_field_id( 'behance' ) ); ?>"
					   name="<?php echo esc_attr( $this->get_field_name( 'behance' ) ); ?>"
					   value="<?php echo esc_attr( $instance['behance'] ); ?>" style="width:100%;"/>
			</p>
			<?php
		}
	}
}
