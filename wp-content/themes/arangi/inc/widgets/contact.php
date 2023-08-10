<?php
if ( ! class_exists( 'Apr_Core_Contact_Widget' ) ) {
	class Apr_Core_Contact_Widget extends Apr_Core_Widget {
		public function __construct() {
			$this->widget_cssclass    = 'tm-contact-widget';
			$this->widget_description = esc_html__( 'Get list contact info.', 'apr-core' );
			$this->widget_id          = 'tm-contact-widget';
			$this->widget_name        = esc_html__( '[APR] Contact', 'apr-core' );
			parent::__construct();
		}

		public function widget( $args, $instance ) {
			$before_widget = '<div id="tm-contact-widget" class="widget tm-contact-widget">';
			$after_widget  = '</div>';
			$before_title  = '<h2 class="widget-title">';
			$after_title   = '</h2>';
			$title         = apply_filters( 'widget_title', $instance['title'] );
			$desc_title    = isset( $instance['desc_title'] ) ? $instance['desc_title'] : $this->settings['desc_title']['std'];
			$address       = isset( $instance['address'] ) ? $instance['address'] : $this->settings['address']['std'];
			$address_2     = isset( $instance['address_2'] ) ? $instance['address_2'] : $this->settings['address_2']['std'];
			$phone         = isset( $instance['phone'] ) ? $instance['phone'] : $this->settings['phone']['std'];
			$phone_2       = isset( $instance['phone_2'] ) ? $instance['phone_2'] : $this->settings['phone_2']['std'];
			$mail          = isset( $instance['mail'] ) ? $instance['mail'] : $this->settings['mail']['std'];
			$mail_2        = isset( $instance['mail_2'] ) ? $instance['mail_2'] : $this->settings['mail_2']['std'];
			$time          = isset( $instance['time'] ) ? $instance['time'] : $this->settings['time']['std'];
			$output        = '';
			echo wp_kses_post( $args['before_widget'] );
			if ( $instance['title'] ) {
				echo wp_kses_post( $args['before_title'] . esc_html( $instance['title'] ) . $args['after_title'] );
			}
			if ( $desc_title != '' ) {
				?>
				<p class="title-desc">
					<?php echo esc_attr( $desc_title ); ?>
				</p>
				<?php
			}
			echo '<ul class="list-info-contact">';
			if ( $phone != '' || $phone_2 != '' ) {
				?>
				<li class="info-phone">
					<span><?php echo esc_html__( 'Phone: ', 'apr-core' ); ?></span><i class="icon icon-cell-phone"></i>
					<div class="info-content">
						<?php if ( $phone != '' ) {
							echo '<a href="tel:' . esc_html( $phone ) . '">' . esc_html( $phone ) . '</a>';
						}
						if ( $phone_2 != '' ) {
							echo '<a href="tel:' . esc_html( $phone_2 ) . '">' . esc_html( $phone_2 ) . '</a>';
						} ?>
					</div>
				</li>
				<?php
			}
			if ( $address != '' || $address_2 != '' ) {
				?>
				<li class="info-address">
					<span><?php echo esc_html__( 'Address: ', 'apr-core' ); ?></span><i class="ti-location-pin"></i>
					<div class="info-content">
						<?php if ( $address != '' ) {
							echo '<p>' . esc_html( $address ) . '</p>';
						}
						if ( $address_2 != '' ) {
							echo '<p>' . esc_html( $address_2 ) . '</p>';
						}
						?>
					</div>
				</li>
				<?php
			}
			if ( $mail != '' || $mail_2 != '' ) {
				?>
				<li class="info-mail">
					<span><?php echo esc_html__( 'Email: ', 'apr-core' ); ?></span><i class="ti-email"></i>
					<div class="info-content">
						<?php if ( $mail != '' ) {
							echo '<a href="mailto:' . esc_html( $mail ) . '">' . esc_html( $mail ) . '</a>';
						}
						if ( $mail_2 != '' ) {
							echo '<a href="mailto:' . esc_html( $mail_2 ) . '">' . esc_html( $mail_2 ) . '</a>';
						} ?>
					</div>
				</li>
				<?php
			}
			if ( $time != '' ) {
				?>
				<li class="info-time">
					<span><?php echo esc_html__( 'Working days/hours: ', 'apr-core' ); ?> </span>
					<i class="ti-time"></i>
					<div class="info-content">
						<?php echo esc_html( $time ); ?>
					</div>
				</li>
			<?php }
			echo '</ul>';
			echo wp_kses_post( $args['after_widget'] );
		}

		public function update( $new_instance, $old_instance ) {
			$instance               = $old_instance;
			$instance['title']      = strip_tags( $new_instance['title'] );
			$instance['desc_title'] = strip_tags( $new_instance['desc_title'] );
			$instance['address']    = strip_tags( $new_instance['address'] );
			$instance['address_2']  = strip_tags( $new_instance['address_2'] );
			$instance['phone']      = strip_tags( $new_instance['phone'] );
			$instance['phone_2']    = strip_tags( $new_instance['phone_2'] );
			$instance['mail']       = strip_tags( $new_instance['mail'] );
			$instance['mail_2']     = strip_tags( $new_instance['mail_2'] );
			$instance['time']       = strip_tags( $new_instance['time'] );

			return $instance;
		}

		public function form( $instance ) {
			$defaults = array(
				'title'      => 'Contact info',
				'desc_title' => '',
				'address'    => '16122 Collins Street Victoria 8007 Australia',
				'address_2'  => '',
				'phone'      => '+01-909-980-0032',
				'phone_2'    => '',
				'mail'       => 'info@company.com',
				'mail_2'     => '',
				'time'       => 'Mon - Sun/ 9:00AM - 8:00PM',
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
					for="<?php echo esc_attr( $this->get_field_id( 'desc_title' ) ); ?>"><?php esc_html_e( 'Description Title', 'apr-core' ); ?></label>
				<input id="<?php echo esc_attr( $this->get_field_id( 'desc_title' ) ); ?>"
					   name="<?php echo esc_attr( $this->get_field_name( 'desc_title' ) ); ?>"
					   value="<?php echo esc_attr( $instance['desc_title'] ); ?>" style="width:100%;"/>
			</p>
			<p>
				<label
					for="<?php echo esc_attr( $this->get_field_id( 'phone' ) ); ?>"><?php esc_html_e( 'Phone Number', 'apr-core' ); ?></label>
				<input id="<?php echo esc_attr( $this->get_field_id( 'phone' ) ); ?>"
					   name="<?php echo esc_attr( $this->get_field_name( 'phone' ) ); ?>"
					   value="<?php echo esc_attr( $instance['phone'] ); ?>" style="width:100%;"/>
			</p>
			<p>
				<label
					for="<?php echo esc_attr( $this->get_field_id( 'phone_2' ) ); ?>"><?php esc_html_e( 'Phone Number 2', 'apr-core' ); ?></label>
				<input id="<?php echo esc_attr( $this->get_field_id( 'phone_2' ) ); ?>"
					   name="<?php echo esc_attr( $this->get_field_name( 'phone_2' ) ); ?>"
					   value="<?php echo esc_attr( $instance['phone_2'] ); ?>" style="width:100%;"/>
			</p>
			<p>
				<label
					for="<?php echo esc_attr( $this->get_field_id( 'address' ) ); ?>"><?php esc_html_e( 'Address', 'apr-core' ); ?></label>
				<input id="<?php echo esc_attr( $this->get_field_id( 'address' ) ); ?>"
					   name="<?php echo esc_attr( $this->get_field_name( 'address' ) ); ?>"
					   value="<?php echo esc_attr( $instance['address'] ); ?>" style="width:100%;"/>
			</p>
			<p>
				<label
					for="<?php echo esc_attr( $this->get_field_id( 'address_2' ) ); ?>"><?php esc_html_e( 'Address 2', 'apr-core' ); ?></label>
				<input id="<?php echo esc_attr( $this->get_field_id( 'address_2' ) ); ?>"
					   name="<?php echo esc_attr( $this->get_field_name( 'address_2' ) ); ?>"
					   value="<?php echo esc_attr( $instance['address_2'] ); ?>" style="width:100%;"/>
			</p>
			<p>
				<label
					for="<?php echo esc_attr( $this->get_field_id( 'mail' ) ); ?>"><?php esc_html_e( 'Email', 'apr-core' ); ?></label>
				<input id="<?php echo esc_attr( $this->get_field_id( 'mail' ) ); ?>"
					   name="<?php echo esc_attr( $this->get_field_name( 'mail' ) ); ?>"
					   value="<?php echo esc_attr( $instance['mail'] ); ?>" style="width:100%;"/>
			</p>
			<p>
				<label
					for="<?php echo esc_attr( $this->get_field_id( 'mail_2' ) ); ?>"><?php esc_html_e( 'Email 2', 'apr-core' ); ?></label>
				<input id="<?php echo esc_attr( $this->get_field_id( 'mail_2' ) ); ?>"
					   name="<?php echo esc_attr( $this->get_field_name( 'mail_2' ) ); ?>"
					   value="<?php echo esc_attr( $instance['mail_2'] ); ?>" style="width:100%;"/>
			</p>
			<p>
				<label
					for="<?php echo esc_attr( $this->get_field_id( 'time' ) ); ?>"><?php esc_html_e( 'Time', 'apr-core' ); ?></label>
				<input id="<?php echo esc_attr( $this->get_field_id( 'time' ) ); ?>"
					   name="<?php echo esc_attr( $this->get_field_name( 'time' ) ); ?>"
					   value="<?php echo esc_attr( $instance['time'] ); ?>" style="width:100%;"/>
			</p>
			<?php
		}
	}
}
