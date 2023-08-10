<?php

namespace elementor;
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class Apr_Core_Heading extends Widget_Base {
	/* Get widget name */
	public function get_name() {
		return 'apr_modern_heading';
	}

	/* Get widget title */
	public function get_title() {
		return __( 'APR Heading', 'apr-core' );
	}

	/* Get widget icon */
	public function get_icon() {
		return 'eicon-heading apr-badge';
	}

	/* Get widget categories */
	public function get_categories() {
		return array( 'apr-core' );
	}

	public static function get_animation_options() {
		return [
			''                  => __( 'None', 'apr-core' ),
			'fadeInDown'        => __( 'FadeInDown', 'apr-core' ),
			'fadeInUp'          => __( 'FadeInUp', 'apr-core' ),
			'fadeInRight'       => __( 'FadeInRight', 'apr-core' ),
			'fadeInLeft'        => __( 'FadeInLeft', 'apr-core' ),
			'fadeInDownBig'     => __( 'FadeInDownBig', 'apr-core' ),
			'fadeInLeftBig'     => __( 'FadeInLeftBig', 'apr-core' ),
			'fadeInRightBig'    => __( 'FadeInRightBig', 'apr-core' ),
			'fadeInUpBig'       => __( 'FadeInUpBig', 'apr-core' ),
			'lightSpeedIn'      => __( 'LightSpeedIn', 'apr-core' ),
			'lightSpeedOut'     => __( 'LightSpeedOut', 'apr-core' ),
			'zoomIn'            => __( 'Zoom', 'apr-core' ),
			'zoomInDown'        => __( 'ZoomInDown', 'apr-core' ),
			'zoomInLeft'        => __( 'ZoomInLeft', 'apr-core' ),
			'zoomInRight'       => __( 'ZoomInRight', 'apr-core' ),
			'zoomInUp'          => __( 'ZoomInUp', 'apr-core' ),
			'pulse'             => __( 'Pulse', 'apr-core' ),
			'bounceIn'          => __( 'BounceIn', 'apr-core' ),
			'bounceInDown'      => __( 'BounceInDown', 'apr-core' ),
			'bounceInLeft'      => __( 'BounceInLeft', 'apr-core' ),
			'bounceInRight'     => __( 'BounceInRight', 'apr-core' ),
			'bounceInUp'        => __( 'BounceInUp', 'apr-core' ),
			'rotateIn'          => __( 'RotateIn', 'apr-core' ),
			'rotateInDownLeft'  => __( 'RotateInDownLeft', 'apr-core' ),
			'rotateInDownRight' => __( 'RotateInDownRight', 'apr-core' ),
			'rotateInUpLeft'    => __( 'RotateInUpLeft', 'apr-core' ),
			'rotateInUpRight'   => __( 'RotateInUpRight', 'apr-core' ),
			'slideInUp'         => __( 'SlideInUp', 'apr-core' ),
			'slideInDown'       => __( 'SlideInDown', 'apr-core' ),
			'slideInLeft'       => __( 'SlideInLeft', 'apr-core' ),
			'slideInRight'      => __( 'SlideInRight', 'apr-core' ),
			'JackInTheBox'      => __( 'JackInTheBox', 'apr-core' ),
		];
	}

	/* Register 'Heading' widget controls*/
	protected function _register_controls() {
		/*-----------------------------------------------------------------------------------*/
		/*  Content TAB
		/*-----------------------------------------------------------------------------------*/
		$this->start_controls_section(
			'title_section',
			array(
				'label' => __( 'APR Heading', 'apr-core' ),
			)
		);
		/* Heading 1*/
		$this->add_control(
			'heading_type',
			array(
				'label'   => __( 'Heading Type', 'apr-core' ),
				'type'    => Controls_Manager::SELECT,
				'options' => array(
					'1' => __( 'Type 1', 'apr-core' ),
					'2' => __( 'Type 2', 'apr-core' ),
				),
				'default' => '1',
			)
		);
		$this->add_control(
			'title',
			array(
				'label'       => __( 'Title', 'apr-core' ),
				'type'        => Controls_Manager::TEXTAREA,
				'dynamic'     => array(
					'active' => true
				),
				'placeholder' => __( 'Enter your title', 'apr-core' ),
				'default'     => __( 'Enter your title', 'apr-core' ),
				'label_block' => true,
			)
		);
		$this->add_control(
			'after_title',
			array(
				'label'       => __( 'After Title', 'apr-core' ),
				'type'        => Controls_Manager::TEXT,
				'dynamic'     => array(
					'active' => true
				),
				'placeholder' => __( 'After Title', 'apr-core' ),
				'default'     => __( 'Arangi', 'apr-core' ),
				'label_block' => true,
				'condition'   => array(
					'heading_type' => '1'
				)
			)
		);
		$this->add_control(
			'before_title',
			array(
				'label'       => __( 'Before Title', 'apr-core' ),
				'type'        => Controls_Manager::TEXT,
				'dynamic'     => array(
					'active' => true
				),
				'placeholder' => __( 'Before Title', 'apr-core' ),
				'label_block' => true,
				'condition'   => array(
					'heading_type' => '2'
				)
			)
		);
		$this->add_control(
			'heading_size',
			array(
				'label'   => __( 'HTML Tag', 'apr-core' ),
				'type'    => Controls_Manager::SELECT,
				'options' => array(
					'h1' => __( 'H1', 'apr-core' ),
					'h2' => __( 'H2', 'apr-core' ),
					'h3' => __( 'H3', 'apr-core' ),
					'h4' => __( 'H4', 'apr-core' ),
					'h5' => __( 'H5', 'apr-core' ),
					'p'  => __( 'p', 'apr-core' ),
				),
				'default' => 'p',
			)
		);

		$this->add_responsive_control(
			'alignment',
			array(
				'label'     => __( 'Alignment', 'apr-core' ),
				'type'      => Controls_Manager::CHOOSE,
				'default'   => 'left',
				'options'   => array(
					'left'     => array(
						'title' => __( 'Left', 'apr-core' ),
						'icon'  => 'fa fa-align-left',
					),
					'center'   => array(
						'title' => __( 'Center', 'apr-core' ),
						'icon'  => 'fa fa-align-center',
					),
					'flex-end' => array(
						'title' => __( 'Right', 'apr-core' ),
						'icon'  => 'fa fa-align-right',
					)
				),
				'condition' => array(
					'heading_type' => '1'
				)
			)
		);
		$this->add_responsive_control(
			'align_3',
			array(
				'label'     => __( 'Alignment', 'apr-core' ),
				'type'      => Controls_Manager::CHOOSE,
				'default'   => 'center',
				'options'   => array(
					'left'   => array(
						'title' => __( 'Left', 'apr-core' ),
						'icon'  => 'fa fa-align-left',
					),
					'center' => array(
						'title' => __( 'Center', 'apr-core' ),
						'icon'  => 'fa fa-align-center',
					),
					'right'  => array(
						'title' => __( 'Right', 'apr-core' ),
						'icon'  => 'fa fa-align-right',
					)
				),
				'selectors' => array(
					'{{WRAPPER}} .heading-2' => 'text-align: {{VALUE}};',

				),
				'condition' => array(
					'heading_type' => '2'
				)
			)
		);
		$this->add_control(
			'description',
			array(
				'label'   => __( 'Description', 'apr-core' ),
				'type'    => Controls_Manager::TEXTAREA,
				'dynamic' => array(
					'active' => true
				),
				'default' => '',
			)
		);

		$this->end_controls_section();
		/*-----------------------------------------------------------------------------------*/
		/*  Style TAB
		/*-----------------------------------------------------------------------------------*/
		$this->start_controls_section(
			'title_style_section',
			array(
				'label' => __( 'Color', 'apr-core' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			)
		);
		$this->add_control(
			'title_color',
			[
				'label'     => __( 'Title Color', 'apr-core' ),
				'type'      => Controls_Manager::COLOR,
				'default'   => '#333',
				'selectors' => [
					// Stronger selector to avoid section style from overwriting
					'{{WRAPPER}} .heading-modern .heading-title' => 'color: {{VALUE}};',
				],
			]
		);
		$this->add_control(
			'after_title_color',
			[
				'label'     => __( 'After Title Color', 'apr-core' ),
				'type'      => Controls_Manager::COLOR,
				'default'   => '#f4f4f4',
				'selectors' => [
					'{{WRAPPER}} .heading-1 .after-title' => 'color: {{VALUE}};',
				],
				'condition' => array(
					'heading_type' => '1'
				)
			]
		);
		$this->add_control(
			'first_letter_after_title_color',
			[
				'label'     => __( 'First Letter of After Title Color', 'apr-core' ),
				'type'      => Controls_Manager::COLOR,
				'default'   => '#f4f4f4',
				'selectors' => [
					'{{WRAPPER}} .heading-1 .after-title::first-letter' => 'color: {{VALUE}};',
				],
				'condition' => array(
					'heading_type' => '1'
				)
			]
		);
		$this->add_control(
			'before_title_color',
			[
				'label'     => __( 'Before Title Color', 'apr-core' ),
				'type'      => Controls_Manager::COLOR,
				'default'   => '#333',
				'selectors' => [
					'{{WRAPPER}} .heading-2 .before-title' => 'color: {{VALUE}};',
				],
				'condition' => array(
					'heading_type' => '2'
				)
			]
		);
		$this->add_control(
			'opacity',
			[
				'label'     => __( 'Opacity Before Title', 'apr-core' ),
				'type'      => Controls_Manager::SLIDER,
				'range'     => [
					'px' => [
						'max'  => 1,
						'min'  => 0.10,
						'step' => 0.01,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .heading-modern .after-title' => 'opacity: {{SIZE}};',
				],
			]
		);
		$this->add_control(
			'desc_color',
			[
				'label'     => __( 'Description color', 'apr-core' ),
				'type'      => Controls_Manager::COLOR,
				'default'   => '#8f8f8f',
				'selectors' => [
					'{{WRAPPER}} .heading-modern .desc' => 'color: {{VALUE}};',
				],
			]
		);
		$this->add_control(
			'line',
			[
				'label'     => __( 'Line color', 'apr-core' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .heading-title:before' => 'background-color: {{VALUE}};',
				],
				'condition' => array(
					'heading_type' => '1'
				)
			]
		);
		$this->end_controls_section();
		$this->start_controls_section(
			'desc_style',
			array(
				'label' => __( 'Typography', 'apr-core' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			)
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name'     => 'title_typo',
				'label'    => __( 'Title', 'apr-core' ),
				'selector' => '{{WRAPPER}} .heading-modern .heading-title',
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name'           => 'after_title_typo',
				'label'          => __( 'After title', 'apr-core' ),
				'selector'       => '{{WRAPPER}} .heading-1 .after-title',
				'fields_options' => [
					'font_family' => [
						'default' => 'Sail',
					],
					'font_size'   => [ 'default' => [ 'unit' => 'px', 'size' => 120 ] ],
					'font_weight' => [
						'default' => '400',
					]
				],
				'condition'      => array(
					'heading_type' => '1'
				)
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name'           => 'first_letter_after_title_typo',
				'label'          => __( 'First Letter of After title', 'apr-core' ),
				'selector'       => '{{WRAPPER}} .heading-1 .after-title::first-letter',
				'fields_options' => [
					'font_size' => [ 'default' => [ 'unit' => 'px', 'size' => 150 ] ],
				],
				'condition'      => array(
					'heading_type' => '1'
				)
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name'           => 'before_title_typo',
				'label'          => __( 'Before title', 'apr-core' ),
				'selector'       => '{{WRAPPER}} .heading-2 .before-title',
				'fields_options' => [
					'font_weight' => [
						'default' => '600',
					]
				],
				'condition'      => array(
					'heading_type' => '2'
				)
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name'           => 'desc_typo',
				'label'          => __( 'Description', 'apr-core' ),
				'selector'       => '{{WRAPPER}} .heading-modern p.desc',
				'fields_options' => [
					'font_family' => [
						'default' => 'Poppins',
					],
					'font_size'   => [ 'default' => [ 'unit' => 'px', 'size' => 14 ] ],
					'font_weight' => [
						'default' => '400',
					]
				],
			]
		);
		$this->add_responsive_control(
			'desc_width',
			array(
				'label'      => __( 'Max width Description', 'apr-core' ),
				'type'       => Controls_Manager::SLIDER,
				'size_units' => array( 'px', '%' ),
				'range'      => array(
					'%'  => array(
						'min' => 1,
						'max' => 100,
					),
					'px' => array(
						'min'  => 1,
						'max'  => 1600,
						'step' => 5
					)
				),
				'default'    => array(
					'unit' => '%',
					'size' => 100,
				),
				'selectors'  => array(
					'{{WRAPPER}} .heading-modern p.desc' => 'max-width:{{SIZE}}{{UNIT}};'
				),
			)
		);
		$this->add_responsive_control(
			'title_margin',
			array(
				'label'              => __( 'Margin Title', 'apr-core' ),
				'type'               => Controls_Manager::DIMENSIONS,
				'size_units'         => array( 'px', 'em' ),
				'allowed_dimensions' => 'all',
				'selectors'          => array(
					'{{WRAPPER}} .heading-modern .heading-title' => 'margin:{{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
				),
			)
		);
		$this->add_responsive_control(
			'desc_margin',
			array(
				'label'              => __( 'Margin Description', 'apr-core' ),
				'type'               => Controls_Manager::DIMENSIONS,
				'size_units'         => array( 'px', 'em' ),
				'allowed_dimensions' => 'all',
				'selectors'          => array(
					'{{WRAPPER}} .heading-modern .desc' => 'margin:{{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
				),
			)
		);
		$this->end_controls_section();
		$this->start_controls_section(
			'animation_section',
			[
				'label' => __( 'APR Animation', 'apr-core' )
			]
		);
		$this->add_control(
			'animation_sc',
			[
				'label'   => __( 'Animation', 'apr-core' ),
				'type'    => Controls_Manager::SELECT,
				'default' => '',
				'options' => self::get_animation_options(),
			]
		);
		$this->add_control(
			'transition_delay_sc',
			[
				'label'   => __( 'Transition Delay(ms)', 'apr-core' ),
				'type'    => Controls_Manager::NUMBER,
				'default' => 500,
			]
		);
		$this->end_controls_section();
	}

	protected function render() {
		$settings         = $this->get_settings_for_display();
		$heading_type     = $settings['heading_type'];
		$alignment        = $settings['alignment'];
		$alignment_class  = '';
		$animation        = $settings['animation_sc'];
		$transition_delay = $settings['transition_delay_sc'];
		$title            = $settings['title'];
		if ( $alignment === 'center' ) {
			$alignment_class = 'center';
		} elseif ( $alignment === 'flex-end' ) {
			$alignment_class = 'right';
		} else {
			$alignment_class = 'left';
		}
		$before_title = $settings['before_title'];
		$this->add_render_attribute( 'title', 'class', 'heading-title' );
		$id = 'apr-heading-' . wp_rand();
		?>
		<div id="<?php echo esc_attr( $id ); ?>"
			 class="heading-modern heading-<?php echo $heading_type; ?> <?php echo $alignment_class; ?>"
			 data-animation="<?php echo esc_attr( $animation ); ?>"
			 data-delay="<?php echo esc_attr( $transition_delay ); ?>ms">
			<?php
			/* Heading 1*/
			if ( $heading_type === '1' ):
				if ( ! empty( $settings['heading_size'] ) ) {
					$this->add_render_attribute( 'title', 'class', 'elementor-size-' . $settings['heading_size'] );
				}
				$this->add_inline_editing_attributes( 'title' );
				$title_html = sprintf( '<%1$s %2$s>%3$s</%1$s>', $settings['heading_size'], $this->get_render_attribute_string( 'title' ), $title );
				echo $title_html;
				if ( ! empty( $settings['after_title'] ) ) {
					printf( '<p class="after-title">%s</p>', $settings['after_title'] );
				};
			else:
				if ( ! empty( $settings['heading_size'] ) ) {
					$this->add_render_attribute( 'title', 'class', 'elementor-size-' . $settings['heading_size'] );
				}
				if ( ! empty( $settings['before_title'] ) ) {
					$title_html = sprintf( '<%1$s %2$s><span class="before-title">%3$s</span> %4$s</%1$s>', $settings['heading_size'], $this->get_render_attribute_string( 'title' ), $settings['before_title'], $title );
					echo $title_html;
				} else {
					$title_html = sprintf( '<%1$s %2$s>%3$s</%1$s>', $settings['heading_size'], $this->get_render_attribute_string( 'title' ), $title );
					echo $title_html;
				}

			endif;
			if ( ! empty( $settings['description'] ) ) {
				printf(
					'<p class="desc">%s</p>',
					$settings['description']
				);
			};
			?>
		</div>
		<!-- ./ heading-->
		<script>
			jQuery(document).ready(function ($) {
				function doAnimations(elements) {
					var animationEndEvents = 'webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend';
					elements.each(function () {
						var $this = $(this);
						var $animationDelay = $this.data('delay');
						var $animationType = 'animated ' + $this.data('animation');
						$this.css({
							'animation-delay'        : $animationDelay,
							'-webkit-animation-delay': $animationDelay
						});
						$this.addClass($animationType).one(animationEndEvents, function () {
							$this.removeClass($animationType);
						});
					});
				}

				$('#<?php echo esc_js( $id );?>.heading-modern').each(function () {
					var $this = $(this);
					doAnimations($this);
				});
			});
		</script>
		<?php
	}

}

Plugin::instance()->widgets_manager->register_widget_type( new Apr_Core_Heading );
