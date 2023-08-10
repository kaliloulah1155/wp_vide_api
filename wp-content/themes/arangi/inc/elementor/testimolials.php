<?php

namespace elementor;

use Elementor\Controls_Manager;
use Elementor\Repeater;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class Apr_Core_Testimolials extends Widget_Base {
	public function get_name() {
		return 'apr-testimolials';
	}

	public function get_categories() {
		return array( 'apr-core' );
	}

	public function get_title() {
		return __( ' APR Testimolials', 'apr-core' );
	}

	public function get_icon() {
		return 'eicon-testimonial';
	}

	protected function _register_controls() {
		$this->start_controls_section(
			'section_testimonial',
			[
				'label' => __( 'Testimonial', 'apr-core' ),
			]
		);
		$repeater = new Repeater();
		$repeater->add_control(
			'testimonial_name',
			[
				'label'   => __( 'Name', 'apr-core' ),
				'type'    => Controls_Manager::TEXT,
				'dynamic' => [
					'active' => true,
				],
				'default' => 'David Jones',
			]
		);
		$repeater->add_control(
			'testimonial_desc',
			[
				'label'   => __( 'Content', 'apr-core' ),
				'type'    => Controls_Manager::TEXTAREA,
				'dynamic' => [
					'active' => true,
				],
				'rows'    => '10',
				'default' => 'Lorem ipsum dolor sit amet, his ad detracto quaerendum. Nec no harum alterum bonorum, has movet persius et,',
			]
		);
		$repeater->add_control(
			'testimonial_slider_image',
			[
				'label'       => __( 'Choose Image', 'elementor' ),
				'description' => __( 'You should choose a small, rectangle image.', 'elementor' ),
				'type'        => Controls_Manager::MEDIA,
				'default'     => [
					'url' => Utils::get_placeholder_image_src(),
				],
			]
		);
		$repeater->add_control(
			'testimonial_source',
			[
				'label'   => __( 'Source', 'apr-core' ),
				'type'    => Controls_Manager::TEXT,
				'dynamic' => [
					'active' => true,
				],
				'default' => 'Via Twitter',
			]
		);
		$repeater->add_control(
			'link',
			[
				'label'       => __( 'Link to', 'apr-core' ),
				'type'        => Controls_Manager::URL,
				'placeholder' => __( 'https://your-link.com', 'apr-core' ),
			]
		);
		$this->add_control(
			'slides',
			[
				'type'        => Controls_Manager::REPEATER,
				'fields'      => $repeater->get_controls(),
				'default'     => [
					[
						'testimonial_name'   => __( 'David Jones', 'apr-core' ),
						'testimonial_source' => __( 'Via Twitter', 'apr-core' ),
						'testimonial_desc'   => 'Lorem ipsum dolor sit amet, his ad detracto quaerendum. Nec no harum alterum bonorum, has movet persius et,',
					],
					[
						'testimonial_name'   => __( 'David Jones', 'apr-core' ),
						'testimonial_source' => __( 'Via Twitter', 'apr-core' ),
						'testimonial_desc'   => 'Lorem ipsum dolor sit amet, his ad detracto quaerendum. Nec no harum alterum bonorum, has movet persius et,',
					],
					[
						'testimonial_name'   => __( 'David Jones', 'apr-core' ),
						'testimonial_source' => __( 'Via Twitter', 'apr-core' ),
						'testimonial_desc'   => 'Lorem ipsum dolor sit amet, his ad detracto quaerendum. Nec no harum alterum bonorum, has movet persius et,',
					],
					[
						'testimonial_name'   => __( 'David Jones', 'apr-core' ),
						'testimonial_source' => __( 'Via Twitter', 'apr-core' ),
						'testimonial_desc'   => 'Lorem ipsum dolor sit amet, his ad detracto quaerendum. Nec no harum alterum bonorum, has movet persius et,',
					],
				],
				'title_field' => '{{{ testimonial_name }}}',
			]
		);
		$this->add_control(
			'testimonial_slider_image_position',
			[
				'label'          => __( 'Image Position', 'apr-core' ),
				'type'           => Controls_Manager::SELECT,
				'default'        => 'aside',
				'options'        => [
					'aside' => __( 'Aside', 'apr-core' ),
					'top'   => __( 'Top', 'apr-core' ),
				],
				'condition'      => [
					'testimonial_slider_image[url]!' => '',
				],
				'separator'      => 'before',
				'style_transfer' => true,
			]
		);
		$this->add_control(
			'testimonial_alignment',
			[
				'label'          => __( 'Alignment', 'apr-core' ),
				'type'           => Controls_Manager::CHOOSE,
				'default'        => 'center',
				'options'        => [
					'left'   => [
						'title' => __( 'Left', 'apr-core' ),
						'icon'  => 'fa fa-align-left',
					],
					'center' => [
						'title' => __( 'Center', 'apr-core' ),
						'icon'  => 'fa fa-align-center',
					],
					'right'  => [
						'title' => __( 'Right', 'apr-core' ),
						'icon'  => 'fa fa-align-right',
					],
				],
				'label_block'    => false,
				'style_transfer' => true,
			]
		);
		$this->add_control(
			'view',
			[
				'label'   => __( 'View', 'apr-core' ),
				'type'    => Controls_Manager::HIDDEN,
				'default' => 'traditional',
			]
		);
		$this->end_controls_section();
		$this->start_controls_section(
			'section_slider_options',
			[
				'label' => __( 'Slider Options', 'apr-core' ),
				'type'  => Controls_Manager::SECTION,
			]
		);
		$this->add_control(
			'navigation',
			[
				'label'   => __( 'Navigation', 'apr-core' ),
				'type'    => Controls_Manager::SELECT,
				'default' => 'both',
				'options' => [
					'both'   => __( 'Arrows and Dots', 'apr-core' ),
					'arrows' => __( 'Arrows', 'apr-core' ),
					'dots'   => __( 'Dots', 'apr-core' ),
					'none'   => __( 'None', 'apr-core' ),
				],
			]
		);
		$this->add_control(
			'pause_on_hover',
			[
				'label'   => __( 'Pause on Hover', 'apr-core' ),
				'type'    => Controls_Manager::SWITCHER,
				'default' => 'yes',
			]
		);
		$this->add_control(
			'autoplay',
			[
				'label'   => __( 'Autoplay', 'apr-core' ),
				'type'    => Controls_Manager::SWITCHER,
				'default' => 'yes',
			]
		);
		$this->add_control(
			'autoplay_speed',
			[
				'label'     => __( 'Autoplay Speed', 'apr-core' ),
				'type'      => Controls_Manager::NUMBER,
				'default'   => 5000,
				'condition' => [
					'autoplay' => 'yes',
				],
			]
		);
		$this->add_control(
			'infinite',
			[
				'label'   => __( 'Infinite Loop', 'apr-core' ),
				'type'    => Controls_Manager::SWITCHER,
				'default' => 'yes',
			]
		);
		$this->add_control(
			'transition_speed',
			[
				'label'   => __( 'Transition Speed (ms)', 'apr-core' ),
				'type'    => Controls_Manager::NUMBER,
				'default' => 500,
			]
		);
		$this->end_controls_section();
		// Image.
		$this->start_controls_section(
			'section_style_testimonial_image',
			[
				'label' => __( 'Image', 'apr-core' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_control(
			'size_image',
			[
				'label'      => __( 'Width', 'apr-core' ),
				'type'       => Controls_Manager::SLIDER,
				'size_units' => [ 'px' ],
				'range'      => [
					'px' => [
						'min' => 20,
						'max' => 200,
					],
				],
				'selectors'  => [
					'{{WRAPPER}} .testimonial-image .img-wrap img' => 'width: {{SIZE}}{{UNIT}};',
				],
			]
		);
		$this->add_control(
			'width_bg_overlay',
			[
				'label'      => __( 'Width background overlay', 'apr-core' ),
				'type'       => Controls_Manager::SLIDER,
				'size_units' => [ 'px' ],
				'range'      => [
					'px' => [
						'min' => 20,
						'max' => 200,
					],
				],
				'selectors'  => [
					'{{WRAPPER}} .testimonial-image .img-wrap:before' => 'width: {{SIZE}}{{UNIT}};',
				],
			]
		);
		$this->add_control(
			'height_bg_overlay',
			[
				'label'      => __( 'Height background overlay', 'apr-core' ),
				'type'       => Controls_Manager::SLIDER,
				'size_units' => [ 'px' ],
				'range'      => [
					'px' => [
						'min' => 20,
						'max' => 200,
					],
				],
				'selectors'  => [
					'{{WRAPPER}} .testimonial-image .img-wrap:before' => 'height: {{SIZE}}{{UNIT}};',
				],
			]
		);
		$this->end_controls_section();
		// Name.
		$this->start_controls_section(
			'section_style_testimonial_name',
			[
				'label' => __( 'Name', 'apr-core' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_control(
			'name_text_color',
			[
				'label'     => __( 'Text Color', 'apr-core' ),
				'type'      => Controls_Manager::COLOR,
				'default'   => '',
				'selectors' => [
					'{{WRAPPER}} .elementor-testimonial-name' => 'color: {{VALUE}};',
				],
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name'     => 'name_typography',
				'selector' => '{{WRAPPER}} .elementor-testimonial-name',
			]
		);
		$this->end_controls_section();
		//Source
		$this->start_controls_section(
			'section_style_testimonial_source',
			[
				'label' => __( 'Source', 'apr-core' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_control(
			'source_text_color',
			[
				'label'     => __( 'Text Color', 'apr-core' ),
				'type'      => Controls_Manager::COLOR,
				'default'   => '',
				'selectors' => [
					'{{WRAPPER}} .elementor-testimonial-source' => 'color: {{VALUE}};',
				],
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name'     => 'source_typography',
				'selector' => '{{WRAPPER}} .elementor-testimonial-source',
			]
		);
		$this->end_controls_section();
		// Content.
		$this->start_controls_section(
			'section_style_testimonial_desc',
			[
				'label' => __( 'Description', 'apr-core' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_control(
			'content_desc_color',
			[
				'label'     => __( 'Text Color', 'apr-core' ),
				'type'      => Controls_Manager::COLOR,
				'default'   => '',
				'selectors' => [
					'{{WRAPPER}} .elementor-testimonial-desc' => 'color: {{VALUE}};',
				],
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name'     => 'desc_typography',
				'selector' => '{{WRAPPER}} .elementor-testimonial-desc',
			]
		);
		$this->end_controls_section();
		$this->start_controls_section(
			'section_style_navigation',
			[
				'label'     => __( 'Navigation', 'apr-core' ),
				'tab'       => Controls_Manager::TAB_STYLE,
				'condition' => [
					'navigation' => [ 'arrows', 'dots', 'both' ],
				],
			]
		);
		$this->add_control(
			'heading_style_dots',
			[
				'label'     => __( 'Dots', 'apr-core' ),
				'type'      => Controls_Manager::HEADING,
				'separator' => 'before',
				'condition' => [
					'navigation' => [ 'dots', 'both' ],
				],
			]
		);
		$this->add_control(
			'dots_color',
			[
				'label'     => __( 'Dots Color', 'apr-core' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .testimonial-image ul.slick-dots li button' => 'background: {{VALUE}};',
				],
				'condition' => [
					'navigation' => [ 'dots', 'both' ],
				],
			]
		);
		$this->add_control(
			'dots_border_color',
			[
				'label'     => __( 'Dots Border Color', 'apr-core' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .testimonial-image ul.slick-dots li' => 'border-color: {{VALUE}};',
				],
				'condition' => [
					'navigation' => [ 'dots', 'both' ],
				],
			]
		);
		$this->add_control(
			'heading_style_arrows',
			[
				'label'     => __( 'Arrows', 'apr-core' ),
				'type'      => Controls_Manager::HEADING,
				'separator' => 'before',
				'condition' => [
					'navigation' => [ 'arrows', 'both' ],
				],
			]
		);
		$this->add_control(
			'arrows_color',
			[
				'label'     => __( 'Arrows Color', 'apr-core' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .testimonial-content .slick-arrow' => 'color: {{VALUE}};',
				],
				'condition' => [
					'navigation' => [ 'arrows', 'both' ],
				],
			]
		);
		$this->end_controls_section();
	}

	/**
	 * Render testimonial widget output on the frontend.
	 *
	 * Written in PHP and used to generate the final HTML.
	 *
	 * @since  1.0.0
	 * @access protected
	 */
	protected function render() {
		$settings = $this->get_settings_for_display();
		if ( empty( $settings['slides'] ) ) {
			return;
		}
		$this->add_render_attribute( 'wrapper', 'class', 'elementor-testimonial-wrapper' );
		if ( $settings['testimonial_alignment'] ) {
			$this->add_render_attribute( 'wrapper', 'class', 'text-' . $settings['testimonial_alignment'] );
		}
		$this->add_render_attribute( 'meta', 'class', 'elementor-testimonial-meta' );
		$slides       = [];
		$slides_image = [];
		$slide_count  = 0;
		foreach ( $settings['slides'] as $slide ) {
			$slide_html  = $slide_attributes = $btn_attributes = '';
			$btn_element = $slide_element = 'div';
			if ( $slide['testimonial_desc'] ) {
				$slide_html .= '<div class="elementor-testimonial-desc">' . $slide['testimonial_desc'] . '</div>';
			}
			if ( $slide['testimonial_name'] ) {
				$slide_html .= '<div class="elementor-testimonial-name">' . $slide['testimonial_name'] . '</div>';
			}
			if ( $slide['testimonial_source'] ) {
				$slide_html .= '<div class="elementor-testimonial-source">' . $slide['testimonial_source'] . '</div>';
			}
			$slide_html = '<' . $slide_element . ' ' . $slide_attributes . ' class="slick-slide-inner">' . $slide_html . '</' . $slide_element . '>';
			$slides[]   = '<div class="elementor-repeater-item-' . $slide['_id'] . ' slick-slide">' . $slide_html . '</div>';
			$slide_count ++;
		}
		foreach ( $settings['slides'] as $slide_image ) {
			$slide_html1 = '';
			if ( $slide_image['testimonial_slider_image'] ) {
				$image_url  = $slide_image['testimonial_slider_image']['url'];
				$image_html = '<img src="' . esc_attr( $image_url ) . '" alt="" />';
			}
			$slides_image[] = '<div class="img-wrap' . '">' . $image_html . '</div>';
			$slide_count ++;
		}
		$is_rtl      = is_rtl();
		$direction   = $is_rtl ? 'true' : 'false';
		$show_dots   = ( in_array( $settings['navigation'], [ 'dots', 'both' ] ) );
		$show_arrows = ( in_array( $settings['navigation'], [ 'arrows', 'both' ] ) );
		$id          = 'apr-testimolial-' . wp_rand();
		$show_arr    = 'false';
		$show_dot    = 'false';
		if ( $settings['navigation'] == 'both' ) {
			$show_arr = 'true';
			$show_dot = 'true';
		} elseif ( $settings['navigation'] == 'arrows' ) {
			$show_arr = 'true';
		} elseif ( $settings['navigation'] == 'dots' ) {
			$show_dot = 'true';
		}
		$pause_on_hover = $autoplay = $infinite = '';
		if ( $settings['pause_on_hover'] == 'yes' ) {
			$pause_on_hover = 'true';
		} else {
			$pause_on_hover = 'false';
		}
		if ( $settings['autoplay'] == 'yes' ) {
			$autoplay = 'true';
		} else {
			$autoplay = 'false';
		}
		if ( $settings['infinite'] == 'yes' ) {
			$infinite = 'true';
		} else {
			$infinite = 'false';
		}
		$slick_options    = [
			'rtl' => $is_rtl,
		];
		$carousel_classes = [ 'testimonial-content' ];
		if ( $show_arrows ) {
			$carousel_classes[] = 'slick-arrows';
		}
		if ( $show_dots ) {
			$carousel_classes[] = 'slick-dots';
		}
		$this->add_render_attribute( 'slides', [
			'class'               => $carousel_classes,
			'data-slider_options' => wp_json_encode( $slick_options ),
		] );
		?>
		<div id="<?php echo esc_attr( $id ); ?>" class="testimonial">
			<div <?php echo $this->get_render_attribute_string( 'wrapper' ); ?>>
				<div <?php echo $this->get_render_attribute_string( 'slides' ); ?>>
					<?php echo implode( '', $slides ); ?>
				</div>
				<div class="testimonial-image"> <?php echo implode( '', $slides_image ); ?></div>
			</div>
		</div>
		<script>
			jQuery(document).ready(function ($) {
				$('#<?php echo esc_js( $id );?> .testimonial-image').slick({
					slidesToShow  : 3,
					slidesToScroll: 1,
					asNavFor      : '#<?php echo esc_js( $id );?> .testimonial-content',
					dots          : <?php echo esc_attr( $show_dot );?>,
					rtl           : <?php echo esc_attr( $direction );?>,
					focusOnSelect : true,
					pauseOnHover  : <?php echo esc_attr( $pause_on_hover );?>,
					infinite      : true,
					arrows        : false,
					centerPadding : '50px',
					responsive    : [
						{
							breakpoint: 600,
							settings  : {
								centerPadding: '15px',
							}
						},
						{
							breakpoint: 480,
							settings  : {
								slidesToShow : 2,
								centerPadding: '0',
							}
						},
					]
				});
				$('#<?php echo esc_js( $id );?> .testimonial-content').slick({
					slidesToShow  : 1,
					slidesToScroll: 1,
					fade          : true,
					rtl           : <?php echo esc_attr( $direction );?>,
					centerMode    : true,
					asNavFor      : '#<?php echo esc_js( $id );?> .testimonial-image',
					dots          : false,
					arrows        : <?php echo esc_attr( $show_arr );?>,
					nextArrow     : '<button class="btn-next"><i class="ti-angle-right"></i></button>',
					prevArrow     : '<button class="btn-prev"><i class="ti-angle-left"></i></button>',
					autoplay      : <?php echo esc_attr( $autoplay );?>,
					pauseOnHover  : <?php echo esc_attr( $pause_on_hover );?>,
					infinite      : <?php echo esc_attr( $infinite );?>,
					autoplaySpeed : <?php echo absint( $settings['autoplay_speed'] );?>,
					speed         : <?php echo absint( $settings['transition_speed'] );?>,

				});
			});
		</script>
		<?php
	}
}

Plugin::instance()->widgets_manager->register_widget_type( new Apr_Core_Testimolials );
