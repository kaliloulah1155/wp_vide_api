<?php

namespace elementor;
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class Apr_Core_Contact_Form extends Widget_Base {
	public function get_name() {
		return 'Apr_Contact_Form';
	}

	public function get_title() {
		return __( 'APR Contact form', 'apr-core' );
	}

	public function get_icon() {
		return 'eicon-form-horizontal apr-badge';
	}

	public function get_categories() {
		return array( 'apr-core' );
	}

	protected function _register_controls() {
		$this->register_general_content_controls();
		$this->register_button_content_controls();
	}

	protected function register_general_content_controls() {

		$this->start_controls_section(
			'section_general_field',
			[
				'label' => __( 'General', 'apr-core' ),
			]
		);
		$this->add_control(
			'form_title',
			array(
				'label'       => __( 'Form Title', 'apr-core' ),
				'type'        => Controls_Manager::TEXT,
				'dynamic'     => array(
					'active' => true
				),
				'default'     => __( 'Welcome to Arangi.', 'apr-core' ),
				'label_block' => true,
			)
		);
		$this->add_control(
			'img_title',
			array(
				'label'   => __( 'Image Form Title', 'apr-core' ),
				'type'    => Controls_Manager::MEDIA,
				'default' => [
					'url' => Utils::get_placeholder_image_src(),
				],
			)
		);
		$this->add_control(
			'form_info',
			array(
				'label'       => __( 'Form Info', 'apr-core' ),
				'type'        => Controls_Manager::TEXT,
				'dynamic'     => array(
					'active' => true
				),
				'default'     => __( 'Plan is free as long as you want with 1 item', 'apr-core' ),
				'label_block' => true,
			)
		);

		$this->add_responsive_control(
			'cf7_form_title_align',
			[
				'label'     => __( 'Title Alignment', 'apr-core' ),
				'type'      => Controls_Manager::CHOOSE,
				'options'   => [
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
				'selectors' => [
					'{{WRAPPER}} .apr-cf7-style .form-name,{{WRAPPER}} .apr-cf7-style .form-info' => 'text-align: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'select_form',
			[
				'label'     => __( 'Select Form', 'apr-core' ),
				'type'      => Controls_Manager::SELECT,
				'options'   => $this->get_cf7_forms(),
				'default'   => '0',
				'help'      => __( 'Choose the form that you want for this page for styling', 'apr-core' ),
				'separator' => 'before',
			]
		);

		$this->add_control(
			'cf7_style',
			[
				'label'        => __( 'Field Style', 'apr-core' ),
				'type'         => Controls_Manager::SELECT,
				'default'      => 'box',
				'options'      => [
					'box'       => __( 'Box', 'apr-core' ),
					'underline' => __( 'Underline', 'apr-core' ),
				],
				'prefix_class' => 'apr-cf7-style-',
			]
		);

		$this->add_responsive_control(
			'cf7_input_padding',
			[
				'label'      => __( 'Field Padding', 'apr-core' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', '%' ],
				'selectors'  => [
					'{{WRAPPER}} .apr-cf7-style input:not([type="submit"]), {{WRAPPER}} .apr-cf7-style select,{{WRAPPER}} .apr-cf7-style textarea'                              => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					'{{WRAPPER}} .apr-cf7-style input[type="checkbox"] + span:before,{{WRAPPER}} .apr-cf7-style input[type="radio"] + span:before'                              => 'height: {{TOP}}{{UNIT}}; width: {{TOP}}{{UNIT}};',
					'{{WRAPPER}}.apr-cf7-style-underline input[type="checkbox"] + span:before,{{WRAPPER}} .apr-cf7-style-underline input[type="radio"] + span:before'           => 'height: {{TOP}}{{UNIT}}; width: {{TOP}}{{UNIT}};',
					'{{WRAPPER}} .apr-cf7-style input[type="checkbox"]:checked + span:before, {{WRAPPER}}.apr-cf7-style-underline input[type="checkbox"]:checked + span:before' => 'font-size: calc({{BOTTOM}}{{UNIT}} / 1.2);',
					'{{WRAPPER}} .apr-cf7-style input[type=range]::-webkit-slider-thumb'                                                                                        => 'font-size: {{BOTTOM}}{{UNIT}};',
					'{{WRAPPER}} .apr-cf7-style input[type=range]::-moz-range-thumb'                                                                                            => 'font-size: {{BOTTOM}}{{UNIT}};',
					'{{WRAPPER}} .apr-cf7-style input[type=range]::-ms-thumb'                                                                                                   => 'font-size: {{BOTTOM}}{{UNIT}};',
					'{{WRAPPER}} .apr-cf7-style input[type=range]::-webkit-slider-runnable-track'                                                                               => 'font-size: {{BOTTOM}}{{UNIT}};',
					'{{WRAPPER}} .apr-cf7-style input[type=range]::-moz-range-track'                                                                                            => 'font-size: {{BOTTOM}}{{UNIT}};',
					'{{WRAPPER}} .apr-cf7-style input[type=range]::-ms-fill-lower'                                                                                              => 'font-size: {{BOTTOM}}{{UNIT}};',
					'{{WRAPPER}} .apr-cf7-style input[type=range]::-ms-fill-upper'                                                                                              => 'font-size: {{BOTTOM}}{{UNIT}};',
				],
			]
		);

		$this->add_control(
			'input_border_style',
			[
				'label'       => __( 'Border Style', 'apr-core' ),
				'type'        => Controls_Manager::SELECT,
				'default'     => 'solid',
				'label_block' => false,
				'options'     => [
					'none'   => __( 'None', 'apr-core' ),
					'solid'  => __( 'Solid', 'apr-core' ),
					'double' => __( 'Double', 'apr-core' ),
					'dotted' => __( 'Dotted', 'apr-core' ),
					'dashed' => __( 'Dashed', 'apr-core' ),
				],
				'condition'   => [
					'cf7_style' => 'box',
				],
				'selectors'   => [
					'{{WRAPPER}} .apr-cf7-style input:not([type=submit]), {{WRAPPER}} .apr-cf7-style select,{{WRAPPER}} .apr-cf7-style textarea,{{WRAPPER}}.apr-cf7-style-box .wpcf7-checkbox input[type="checkbox"]:checked + span:before, {{WRAPPER}}.apr-cf7-style-box .wpcf7-checkbox input[type="checkbox"] + span:before,{{WRAPPER}}.apr-cf7-style-box .wpcf7-acceptance input[type="checkbox"]:checked + span:before, {{WRAPPER}}.apr-cf7-style-box .wpcf7-acceptance input[type="checkbox"] + span:before, {{WRAPPER}}.apr-cf7-style-box .wpcf7-radio input[type="radio"] + span:before' => 'border-style: {{VALUE}};',
				],
			]
		);
		$this->add_control(
			'input_border_size',
			[
				'label'      => __( 'Border Width', 'apr-core' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px' ],
				'default'    => [
					'top'    => '1',
					'bottom' => '1',
					'left'   => '1',
					'right'  => '1',
					'unit'   => 'px',
				],
				'condition'  => [
					'cf7_style'           => 'box',
					'input_border_style!' => 'none',
				],
				'selectors'  => [
					'{{WRAPPER}} .apr-cf7-style input:not([type=submit]), {{WRAPPER}} .apr-cf7-style select,{{WRAPPER}} .apr-cf7-style textarea,{{WRAPPER}}.apr-cf7-style-box .wpcf7-checkbox input[type="checkbox"]:checked + span:before, {{WRAPPER}}.apr-cf7-style-box .wpcf7-checkbox input[type="checkbox"] + span:before,{{WRAPPER}}.apr-cf7-style-box .wpcf7-acceptance input[type="checkbox"]:checked + span:before, {{WRAPPER}}.apr-cf7-style-box .wpcf7-acceptance input[type="checkbox"] + span:before,{{WRAPPER}}.apr-cf7-style-box .wpcf7-radio input[type="radio"] + span:before' => 'border-width: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_responsive_control(
			'cf7_border_bottom',
			[
				'label'      => __( 'Border Size', 'apr-core' ),
				'type'       => Controls_Manager::SLIDER,
				'size_units' => [ 'px', 'em', 'rem' ],
				'range'      => [
					'px' => [
						'min' => 1,
						'max' => 20,
					],
				],
				'default'    => [
					'size' => '2',
					'unit' => 'px',
				],
				'condition'  => [
					'cf7_style' => 'underline',
				],
				'selectors'  => [
					'{{WRAPPER}}.apr-cf7-style-underline input:not([type=submit]),{{WRAPPER}}.apr-cf7-style-underline select,{{WRAPPER}}.apr-cf7-style-underline textarea'                                                                                                                                                                                                                                                                                                 => 'border-width: 0 0 {{SIZE}}{{UNIT}} 0; border-style: solid;',
					'{{WRAPPER}}.apr-cf7-style-underline .wpcf7-checkbox input[type="checkbox"]:checked + span:before, {{WRAPPER}}.apr-cf7-style-underline .wpcf7-checkbox input[type="checkbox"] + span:before,{{WRAPPER}}.apr-cf7-style-underline .wpcf7-acceptance input[type="checkbox"]:checked + span:before, {{WRAPPER}}.apr-cf7-style-underline .wpcf7-acceptance input[type="checkbox"] + span:before,{{WRAPPER}} .wpcf7-radio input[type="radio"] + span:before' => 'border-width: {{SIZE}}{{UNIT}}; border-style: solid; box-sizing: content-box;',
				],
			]
		);

		$this->add_responsive_control(
			'cf7_input_radius',
			[
				'label'      => __( 'Rounded Corners', 'apr-core' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', '%' ],
				'selectors'  => [
					'{{WRAPPER}} .apr-cf7-style input:not([type="submit"]), {{WRAPPER}} .apr-cf7-style select, {{WRAPPER}} .apr-cf7-style textarea, {{WRAPPER}} .wpcf7-checkbox input[type="checkbox"] + span:before, {{WRAPPER}} .wpcf7-acceptance input[type="checkbox"] + span:before' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
				'default'    => [
					'top'    => '0',
					'bottom' => '0',
					'left'   => '0',
					'right'  => '0',
					'unit'   => 'px',
				],
			]
		);

		$this->add_responsive_control(
			'cf7_text_align',
			[
				'label'     => __( 'Field Alignment', 'apr-core' ),
				'type'      => Controls_Manager::CHOOSE,
				'options'   => [
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
				'selectors' => [
					'{{WRAPPER}} .apr-cf7-style .wpcf7, {{WRAPPER}} .apr-cf7-style input:not([type=submit]),{{WRAPPER}} .apr-cf7-style textarea' => 'text-align: {{VALUE}};',
					' {{WRAPPER}} .apr-cf7-style select'                                                                                         => 'text-align-last:{{VALUE}};',
				],
			]
		);

		$this->end_controls_section();
	}

	protected function register_button_content_controls() {

		$this->start_controls_section(
			'cf7_submit_button',
			[
				'label' => __( 'Submit Button', 'apr-core' ),
			]
		);

		$this->add_responsive_control(
			'cf7_button_align',
			[
				'label'        => __( 'Button Alignment', 'apr-core' ),
				'type'         => Controls_Manager::CHOOSE,
				'options'      => [
					'left'    => [
						'title' => __( 'Left', 'apr-core' ),
						'icon'  => 'fa fa-align-left',
					],
					'center'  => [
						'title' => __( 'Center', 'apr-core' ),
						'icon'  => 'fa fa-align-center',
					],
					'right'   => [
						'title' => __( 'Right', 'apr-core' ),
						'icon'  => 'fa fa-align-right',
					],
					'justify' => [
						'title' => __( 'Justified', 'apr-core' ),
						'icon'  => 'fa fa-align-justify',
					],
				],
				'default'      => 'left',
				'prefix_class' => 'apr%s-cf7-button-',
				'toggle'       => false,
			]
		);

		$this->add_responsive_control(
			'cf7_button_padding',
			[
				'label'      => __( 'Padding', 'apr-core' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', '%' ],
				'selectors'  => [
					'{{WRAPPER}} .apr-cf7-style input[type="submit"]' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
				'separator'  => 'after',
			]
		);
		$this->start_controls_tabs( 'tabs_button_style' );

		$this->start_controls_tab(
			'tab_button_normal',
			[
				'label' => __( 'Normal', 'apr-core' ),
			]
		);

		$this->add_control(
			'btn_background_color',
			[
				'label'     => __( 'Background Color', 'apr-core' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .apr-cf7-style input[type="submit"]' => 'background-color: {{VALUE}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name'        => 'btn_border',
				'label'       => __( 'Border', 'apr-core' ),
				'placeholder' => '1px',
				'default'     => '1px',
				'selector'    => '{{WRAPPER}} .apr-cf7-style input[type="submit"]',
			]
		);

		$this->add_responsive_control(
			'btn_border_radius',
			[
				'label'      => __( 'Border Radius', 'apr-core' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%' ],
				'selectors'  => [
					'{{WRAPPER}} .apr-cf7-style input[type="submit"]' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name'     => 'button_box_shadow',
				'selector' => '{{WRAPPER}} .apr-cf7-style input[type="submit"]',
			]
		);

		$this->end_controls_tab();

		$this->start_controls_tab(
			'tab_button_hover',
			[
				'label' => __( 'Hover', 'apr-core' ),
			]
		);

		$this->add_control(
			'button_hover_border_color',
			[
				'label'     => __( 'Border Hover Color', 'apr-core' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .apr-cf7-style input[type="submit"]:hover' => 'border-color: {{VALUE}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Background::get_type(),
			[
				'name'     => 'button_background_hover_color',
				'label'    => __( 'Background Color', 'apr-core' ),
				'types'    => [ 'classic', 'gradient' ],
				'selector' => '{{WRAPPER}} .apr-cf7-style input[type="submit"]:hover',
			]
		);

		$this->end_controls_tab();

		$this->end_controls_tabs();

		$this->end_controls_section();

		/* Tab style */

		$this->start_controls_section(
			'cf7_input_spacing',
			[
				'label' => __( 'Spacing', 'apr-core' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_responsive_control(
			'cf7_input_margin_top',
			[
				'label'      => __( 'Between Label & Input', 'apr-core' ),
				'type'       => Controls_Manager::SLIDER,
				'size_units' => [ 'px', 'em', 'rem' ],
				'range'      => [
					'px' => [
						'min' => 1,
						'max' => 60,
					],
				],
				'default'    => [
					'unit' => 'px',
					'size' => 5,
				],
				'selectors'  => [
					'{{WRAPPER}} .apr-cf7-style input:not([type=submit]):not([type=checkbox]):not([type=radio]), {{WRAPPER}} .apr-cf7-style select, {{WRAPPER}} .apr-cf7-style textarea, {{WRAPPER}} .apr-cf7-style span.wpcf7-list-item' => 'margin-top: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->add_responsive_control(
			'cf7_input_margin_bottom',
			[
				'label'      => __( 'Between Fields', 'apr-core' ),
				'type'       => Controls_Manager::SLIDER,
				'size_units' => [ 'px', 'em', 'rem' ],
				'range'      => [
					'px' => [
						'min' => 1,
						'max' => 60,
					],
				],
				'default'    => [
					'unit' => 'px',
					'size' => 10,
				],
				'selectors'  => [
					'{{WRAPPER}} .apr-cf7-style input:not([type=submit]):not([type=checkbox]):not([type=radio]), {{WRAPPER}} .apr-cf7-style select, {{WRAPPER}} .apr-cf7-style textarea, {{WRAPPER}} .apr-cf7-style span.wpcf7-list-item' => 'margin-bottom: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->end_controls_section();
		$this->start_controls_section(
			'cf7_typo',
			[
				'label' => __( 'Color & Typography', 'apr-core' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_control(
			'cf7_title_typo',
			[
				'label'     => __( 'Form Title', 'apr-core' ),
				'type'      => Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);
		$this->add_control(
			'cf7_title_color',
			[
				'label'     => __( 'Color', 'apr-core' ),
				'type'      => Controls_Manager::COLOR,
				'default'   => '#333333',
				'selectors' => [
					'{{WRAPPER}} .apr-cf7-style h3' => 'color: {{VALUE}};',
				],

			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name'     => 'form_title_typography',
				'label'    => __( 'Typography', 'apr-core' ),
				'selector' => '{{WRAPPER}} .apr-cf7-style .form-name',
			]
		);

		$this->add_control(
			'cf7_info_typo',
			[
				'label'     => __( 'Form Info', 'apr-core' ),
				'type'      => Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);

		$this->add_control(
			'cf7_info_color',
			[
				'label'     => __( 'Color', 'apr-core' ),
				'type'      => Controls_Manager::COLOR,
				'default'   => '#948e90',
				'selectors' => [
					'{{WRAPPER}} .form-info' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name'     => 'form_info_typography',
				'label'    => __( 'Typography', 'apr-core' ),
				'selector' => '{{WRAPPER}} .apr-cf7-style .form-info',
			]
		);
		$this->add_control(
			'cf7_label_typo',
			[
				'label'     => __( 'Form Label', 'apr-core' ),
				'type'      => Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);

		$this->add_control(
			'cf7_label_color',
			[
				'label'     => __( 'Label Color', 'apr-core' ),
				'type'      => Controls_Manager::COLOR,
				'default'   => '',
				'selectors' => [
					'{{WRAPPER}} .apr-cf7-style .wpcf7 form.wpcf7-form:not(input) label' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name'     => 'form_label_typography',
				'selector' => '{{WRAPPER}} .apr-cf7-style .wpcf7 form.wpcf7-form label',
			]
		);

		$this->add_control(
			'cf7_input_typo',
			[
				'label'     => __( 'Input Text / Placeholder', 'apr-core' ),
				'type'      => Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);

		$this->add_control(
			'cf7_input_bgcolor',
			[
				'label'     => __( 'Field Background Color', 'apr-core' ),
				'type'      => Controls_Manager::COLOR,
				'default'   => '#fafafa',
				'selectors' => [
					'{{WRAPPER}} .apr-cf7-style input:not([type=submit]), {{WRAPPER}} .apr-cf7-style select, {{WRAPPER}} .apr-cf7-style textarea, {{WRAPPER}} .apr-cf7-style .wpcf7-checkbox input[type="checkbox"] + span:before,{{WRAPPER}} .apr-cf7-style .wpcf7-acceptance input[type="checkbox"] + span:before, {{WRAPPER}} .apr-cf7-style .wpcf7-radio input[type="radio"]:not(:checked) + span:before' => 'background-color: {{VALUE}};',
					'{{WRAPPER}} .apr-cf7-style input[type=range]::-webkit-slider-runnable-track,{{WRAPPER}} .apr-cf7-style input[type=range]:focus::-webkit-slider-runnable-track'                                                                                                                                                                                                                           => 'background-color: {{VALUE}};',
					'{{WRAPPER}} .apr-cf7-style input[type=range]::-moz-range-track,{{WRAPPER}} input[type=range]:focus::-moz-range-track'                                                                                                                                                                                                                                                                    => 'background-color: {{VALUE}};',
					'{{WRAPPER}} .apr-cf7-style input[type=range]::-ms-fill-lower,{{WRAPPER}} .apr-cf7-style input[type=range]:focus::-ms-fill-lower'                                                                                                                                                                                                                                                         => 'background-color: {{VALUE}};',
					'{{WRAPPER}} .apr-cf7-style input[type=range]::-ms-fill-upper,{{WRAPPER}} .apr-cf7-style input[type=range]:focus::-ms-fill-upper'                                                                                                                                                                                                                                                         => 'background-color: {{VALUE}};',
					'{{WRAPPER}}.apr-cf7-style-box .wpcf7-radio input[type="radio"]:checked + span:before, {{WRAPPER}}.apr-cf7-style-underline .wpcf7-radio input[type="radio"]:checked + span:before'                                                                                                                                                                                                        => 'box-shadow:inset 0px 0px 0px 4px {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'cf7_input_color',
			[
				'label'     => __( 'Input Text / Placeholder Color', 'apr-core' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .apr-cf7-style .wpcf7 input:not([type=submit]),{{WRAPPER}} .apr-cf7-style .wpcf7 input::placeholder, {{WRAPPER}} .apr-cf7-style .wpcf7 select, {{WRAPPER}} .apr-cf7-style .wpcf7 textarea, {{WRAPPER}} .apr-cf7-style .wpcf7 textarea::placeholder,{{WRAPPER}} .apr-cf7-style .apr-cf7-select-custom:after' => 'color: {{VALUE}};',
					'{{WRAPPER}}.elementor-widget-apr-cf7-styler .wpcf7-checkbox input[type="checkbox"]:checked + span:before, {{WRAPPER}}.elementor-widget-apr-cf7-styler .wpcf7-acceptance input[type="checkbox"]:checked + span:before'                                                                                                   => 'color: {{VALUE}};',
					'{{WRAPPER}}.apr-cf7-style-box .wpcf7-radio input[type="radio"]:checked + span:before, {{WRAPPER}}.apr-cf7-style-underline .wpcf7-radio input[type="radio"]:checked + span:before'                                                                                                                                       => 'background-color: {{VALUE}};',
					'{{WRAPPER}} .apr-cf7-style input[type=range]::-webkit-slider-thumb'                                                                                                                                                                                                                                                     => 'border: 1px solid {{VALUE}}; background: {{VALUE}};',
					'{{WRAPPER}} .apr-cf7-style input[type=range]::-moz-range-thumb'                                                                                                                                                                                                                                                         => 'border: 1px solid {{VALUE}}; background: {{VALUE}};',
					'{{WRAPPER}} .apr-cf7-style input[type=range]::-ms-thumb'                                                                                                                                                                                                                                                                => 'border: 1px solid {{VALUE}}; background: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'cf7_border_color',
			[
				'label'     => __( 'Border Color', 'apr-core' ),
				'type'      => Controls_Manager::COLOR,
				'condition' => [
					'cf7_style' => 'underline',
				],
				'default'   => '#c4c4c4',
				'selectors' => [
					'{{WRAPPER}}.apr-cf7-style-underline input:not([type=submit]),{{WRAPPER}}.apr-cf7-style-underline select,{{WRAPPER}}.apr-cf7-style-underline textarea, {{WRAPPER}}.apr-cf7-style-underline .wpcf7-checkbox input[type="checkbox"]:checked + span:before, {{WRAPPER}}.apr-cf7-style-underline .wpcf7-checkbox input[type="checkbox"] + span:before, {{WRAPPER}}.apr-cf7-style-underline .wpcf7-acceptance input[type="checkbox"]:checked + span:before, {{WRAPPER}}.apr-cf7-style-underline .wpcf7-acceptance input[type="checkbox"] + span:before, {{WRAPPER}} .wpcf7-radio input[type="radio"] + span:before' => 'border-color: {{VALUE}};',
					'{{WRAPPER}} .apr-cf7-style-underline input[type=range]::-webkit-slider-runnable-track'                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                        => 'border: 0.2px solid {{VALUE}}; box-shadow: 1px 1px 1px {{VALUE}}, 0px 0px 1px {{VALUE}};',
					'{{WRAPPER}} .apr-cf7-style input[type=range]::-moz-range-track'                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                               => 'border: 0.2px solid {{VALUE}}; box-shadow: 1px 1px 1px {{VALUE}}, 0px 0px 1px {{VALUE}};',
					'{{WRAPPER}} .apr-cf7-style input[type=range]::-ms-fill-lower'                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                 => 'border: 0.2px solid {{VALUE}}; box-shadow: 1px 1px 1px {{VALUE}}, 0px 0px 1px {{VALUE}};',
					'{{WRAPPER}} .apr-cf7-style input[type=range]::-ms-fill-upper'                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                 => 'border: 0.2px solid {{VALUE}}; box-shadow: 1px 1px 1px {{VALUE}}, 0px 0px 1px {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'input_border_color',
			[
				'label'     => __( 'Border Color', 'apr-core' ),
				'type'      => Controls_Manager::COLOR,
				'condition' => [
					'cf7_style'           => 'box',
					'input_border_style!' => 'none',
				],
				'default'   => '#eaeaea',
				'selectors' => [
					'{{WRAPPER}} .apr-cf7-style input:not([type=submit]), {{WRAPPER}} .apr-cf7-style select,{{WRAPPER}} .apr-cf7-style textarea,{{WRAPPER}}.apr-cf7-style-box .wpcf7-checkbox input[type="checkbox"]:checked + span:before, {{WRAPPER}}.apr-cf7-style-box .wpcf7-checkbox input[type="checkbox"] + span:before,{{WRAPPER}}.apr-cf7-style-box .wpcf7-acceptance input[type="checkbox"]:checked + span:before, {{WRAPPER}}.apr-cf7-style-box .wpcf7-acceptance input[type="checkbox"] + span:before, {{WRAPPER}}.apr-cf7-style-box .wpcf7-radio input[type="radio"] + span:before' => 'border-color: {{VALUE}};',
					'{{WRAPPER}} .apr-cf7-style input[type=range]::-webkit-slider-runnable-track'                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                => 'border: 0.2px solid {{VALUE}}; box-shadow: 1px 1px 1px {{VALUE}}, 0px 0px 1px {{VALUE}};',
					'{{WRAPPER}} .apr-cf7-style input[type=range]::-moz-range-track'                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                             => 'border: 0.2px solid {{VALUE}}; box-shadow: 1px 1px 1px {{VALUE}}, 0px 0px 1px {{VALUE}};',
					'{{WRAPPER}} .apr-cf7-style input[type=range]::-ms-fill-lower'                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                               => 'border: 0.2px solid {{VALUE}}; box-shadow: 1px 1px 1px {{VALUE}}, 0px 0px 1px {{VALUE}};',
					'{{WRAPPER}} .apr-cf7-style input[type=range]::-ms-fill-upper'                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                               => 'border: 0.2px solid {{VALUE}}; box-shadow: 1px 1px 1px {{VALUE}}, 0px 0px 1px {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'cf7_ipborder_active',
			[
				'label'     => __( 'Border Active Color', 'apr-core' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .apr-cf7-style .wpcf7 form input:not([type=submit]):focus, {{WRAPPER}} .apr-cf7-style select:focus, {{WRAPPER}} .apr-cf7-style .wpcf7 textarea:focus, {{WRAPPER}} .apr-cf7-style .wpcf7-checkbox input[type="checkbox"]:checked + span:before,{{WRAPPER}} .apr-cf7-style .wpcf7-acceptance input[type="checkbox"]:checked + span:before, {{WRAPPER}} .apr-cf7-style .wpcf7-radio input[type="radio"]:checked + span:before' => 'border-color: {{VALUE}};',
				],
				'condition' => [
					'input_border_style!' => 'none',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name'     => 'input_typography',
				'selector' => '{{WRAPPER}} .apr-cf7-style .wpcf7 input:not([type=submit]), {{WRAPPER}} .apr-cf7-style .wpcf7 input::placeholder, {{WRAPPER}} .wpcf7 select,{{WRAPPER}} .apr-cf7-style .wpcf7 textarea, {{WRAPPER}} .apr-cf7-style .wpcf7 textarea::placeholder, {{WRAPPER}} .apr-cf7-style input[type=range]::-webkit-slider-thumb,{{WRAPPER}} .apr-cf7-style .apr-cf7-select-custom',
			]
		);

		$this->add_control(
			'btn_typography_label',
			[
				'label'     => __( 'Button', 'apr-core' ),
				'type'      => Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);

		$this->add_control(
			'button_text_color',
			[
				'label'     => __( 'Text Color', 'apr-core' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .apr-cf7-style input[type="submit"]' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'btn_hover_color',
			[
				'label'     => __( 'Text Hover Color', 'apr-core' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .apr-cf7-style input[type="submit"]:hover' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name'     => 'btn_typography',
				'label'    => __( 'Typography', 'apr-core' ),
				'selector' => '{{WRAPPER}} .apr-cf7-style input[type=submit]',
			]
		);
		$this->end_controls_section();
	}

	protected function render() {
		if ( ! class_exists( 'WPCF7_ContactForm' ) ) {
			return;
		}
		$settings           = $this->get_settings();
		$field_options      = array();
		$args               = array(
			'post_type'      => 'wpcf7_contact_form',
			'posts_per_page' => - 1,
		);
		$forms              = get_posts( $args );
		$field_options['0'] = __( 'select', 'apr-core' );
		if ( $forms ) {
			foreach ( $forms as $form ) {
				$field_options[$form->ID] = $form->post_title;
			}
		}
		$forms = $this->get_cf7_forms();
		$html  = '';

		if ( ! empty( $forms ) && ! isset( $forms[- 1] ) ) {
			if ( 0 == $settings['select_form'] ) {
				$html = __( 'Please select a Contact Form 7.', 'apr-core' );
			} else {
				?>
				<div class="apr-cf7 apr-cf7-style elementor-clickable">
					<?php if ( $settings['form_title'] != '' ) { ?>
						<h3 class="form-name"><?php echo $settings['form_title']; ?> <img
								src="<?php echo $settings['img_title']['url']; ?>" alt=""></h3>
					<?php } ?>
					<?php if ( $settings['form_info'] != '' ) { ?>
						<p class="form-info"><?php echo $settings['form_info']; ?></p>
					<?php } ?>
					<?php
					if ( $settings['select_form'] ) {
						echo do_shortcode( '[contact-form-7 id=' . $settings['select_form'] . ']' );
					}
					?>
				</div>
				<?php
			}
		} else {
			$html = __( 'You have not added any Contact Form 7 yet.', 'apr-core' );
		}
		echo $html;
	}

	protected function get_cf7_forms() {

		$field_options = array();

		if ( class_exists( 'WPCF7_ContactForm' ) ) {
			$args               = array(
				'post_type'      => 'wpcf7_contact_form',
				'posts_per_page' => - 1,
			);
			$forms              = get_posts( $args );
			$field_options['0'] = 'Select';
			if ( $forms ) {
				foreach ( $forms as $form ) {
					$field_options[$form->ID] = $form->post_title;
				}
			}
		}

		if ( empty( $field_options ) ) {
			$field_options = array(
				'-1' => __( 'You have not added any Contact Form 7 yet.', 'apr-core' ),
			);
		}

		return $field_options;
	}

}

Plugin::instance()->widgets_manager->register_widget_type( new Apr_Core_Contact_Form );
