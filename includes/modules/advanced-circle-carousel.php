<?php
namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit;

class Advanced_Circle_Carousel extends Widget_Base {

	public function get_name() {
		return 'advanced-circle-carousel';
	}

	public function get_title() {
		return esc_html__( 'Advanced Circle Carousel', 'advanced-elements' );
	}

	public function get_icon() {
		return 'eicon-settings';
	}

	public function get_categories() {
		return array( 'advanced-elements' );
	}

	protected function _register_controls() {
		$this->start_controls_section(
			'circle_carousel',
			array(
				'label'      => esc_html__( 'Circle Carousel', 'advanced-elements' ),
				'tab'        => Controls_Manager::TAB_LAYOUT,
				'show_label' => false,
			)
		);
		$repeater = new Repeater();
		$repeater->add_control(
			'item_image',
			array(
				'label'   => esc_html__( 'Image', 'advanced-elements' ),
				'type'    => Controls_Manager::MEDIA,
				'default' => array(
					'url'   => Utils::get_placeholder_image_src(),
				),
			)
		);
		$repeater->add_control(
			'item_title',
			array(
				'label'   => esc_html__( 'Title', 'advanced-elements' ),
				'type'    => Controls_Manager::TEXT,
				'default' => 'Item Title',
			)
		);
		$repeater->add_control(
			'item_descr',
			array(
				'label'   => esc_html__( 'Description', 'advanced-elements' ),
				'type'    => Controls_Manager::TEXTAREA,
				'default' => '',
			)
		);
		$repeater->add_control(
			'item_icon',
			array(
				'label'       => esc_html__( 'Icon', 'elementor' ),
				'type'        => Controls_Manager::ICON,
				'label_block' => true,
				'default'     => 'fa fa-check',
			)
		);
		$this->add_control(
			'items_list',
			array(
				'type'        => Controls_Manager::REPEATER,
				'fields'      => array_values( $repeater->get_controls() ),
				'default'     => array(
					array(
						'item_image' => array(
							'url'      => Utils::get_placeholder_image_src(),
						),
						'item_title' => esc_html__( 'Item #1', 'advanced-elements' ),
						'item_descr' => '',
						'item_icon'  => 'fa fa-check',
					),
					array(
						'item_image' => array(
							'url'      => Utils::get_placeholder_image_src(),
						),
						'item_title' => esc_html__( 'Item #2', 'advanced-elements' ),
						'item_descr' => '',
						'item_icon'  => 'fa fa-check',
					),
					array(
						'item_image' => array(
							'url'      => Utils::get_placeholder_image_src(),
						),
						'item_title' => esc_html__( 'Item #3', 'advanced-elements' ),
						'item_descr' => '',
						'item_icon'  => 'fa fa-check',
					),
					array(
						'item_image' => array(
							'url'      => Utils::get_placeholder_image_src(),
						),
						'item_title' => esc_html__( 'Item #4', 'advanced-elements' ),
						'item_descr' => '',
						'item_icon'  => 'fa fa-check',
					),
					array(
						'item_image' => array(
							'url'      => Utils::get_placeholder_image_src(),
						),
						'item_title' => esc_html__( 'Item #5', 'advanced-elements' ),
						'item_descr' => '',
						'item_icon'  => 'fa fa-check',
					),
					array(
						'item_image' => array(
							'url'      => Utils::get_placeholder_image_src(),
						),
						'item_title' => esc_html__( 'Item #6', 'advanced-elements' ),
						'item_descr' => '',
						'item_icon'  => 'fa fa-check',
					),
				),
				'title_field' => '{{{ item_title }}}',
			)
		);
		$this->end_controls_section();

		$this->start_controls_section(
			'carousel_settings',
			array(
				'label'      => esc_html__( 'Carousel Settings', 'advanced-elements' ),
				'tab'        => Controls_Manager::TAB_LAYOUT,
				'show_label' => false,
			)
		);
		$this->add_control(
			'animation_speed',
			array(
				'label'   => esc_html__( 'Animation Speed', 'advanced-elements' ),
				'type'    => Controls_Manager::NUMBER,
				'default' => 500,
				'step'    => 100,
			)
		);
		$this->add_control(
			'autoplay',
			array(
				'label'        => esc_html__( 'Autoplay', 'advanced-elements' ),
				'type'         => Controls_Manager::SWITCHER,
				'label_on'     => esc_html__( 'Yes', 'advanced-elements' ),
				'label_off'    => esc_html__( 'No', 'advanced-elements' ),
				'return_value' => 'yes',
				'default'      => 'yes',
			)
		);
		$this->add_control(
			'autoplay_timeout',
			array(
				'label'      => esc_html__( 'Autoplay Timeout', 'advanced-elements' ),
				'type'       => Controls_Manager::NUMBER,
				'default'    => 5000,
				'step'       => 500,
				'condition'  => array(
					'autoplay' => 'yes',
				),
			)
		);
		$this->add_control(
			'show_arrows_btn',
			array(
				'label'        => esc_html__( 'Show Buttons', 'advanced-elements' ),
				'type'         => Controls_Manager::SWITCHER,
				'label_on'     => esc_html__( 'Yes', 'advanced-elements' ),
				'label_off'    => esc_html__( 'No', 'advanced-elements' ),
				'return_value' => 'yes',
				'default'      => 'yes',
			)
		);
		$this->add_control(
			'arrows_btn_prev',
			array(
				'label'     => esc_html__( 'Prev Button Text', 'advanced-elements' ),
				'type'      => Controls_Manager::TEXT,
				'default'   => esc_html__( 'Prev', 'advanced-elements' ),
				'condition' => array(
					'show_arrows_btn' => 'yes',
				),
			)
		);
		$this->add_control(
			'arrows_btn_next',
			array(
				'label'     => esc_html__( 'Next Button Text', 'advanced-elements' ),
				'type'      => Controls_Manager::TEXT,
				'default'   => esc_html__( 'Next', 'advanced-elements' ),
				'condition' => array(
					'show_arrows_btn' => 'yes',
				),
			)
		);
		$this->end_controls_section();

		$this->start_controls_section(
			'section_item_styles',
			array(
				'label'      => esc_html__( 'Item', 'advanced-elements' ),
				'tab'        => Controls_Manager::TAB_STYLE,
				'show_label' => false,
			)
		);
		$this->add_responsive_control(
			'item_size',
			array(
				'label'      => esc_html__( 'Item Size', 'advanced-elements' ),
				'type'       => Controls_Manager::SLIDER,
				'size_units' => array( '%' ),
				'default'    => array(
					'unit' => '%',
					'size' => 55,
				),
				'render_type' => 'template',
				'selectors'   => array(
					'{{WRAPPER}} ' . '.advanced-circle-carousel .content-box-inner' => 'width: {{SIZE}}{{UNIT}}; height: {{SIZE}}{{UNIT}};',
				),
			)
		);
		$this->add_group_control(
			Group_Control_Background::get_type(),
			array(
				'name'     => 'item_bg',
				'selector' => '{{WRAPPER}} ' . '.advanced-circle-carousel .content-box-inner',
			)
		);
		$this->add_group_control(
			Group_Control_Border::get_type(),
			array(
				'name'        => 'border',
				'selector'    => '{{WRAPPER}} ' . '.advanced-circle-carousel .content-box-inner',
			)
		);
		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			array(
				'name'     => 'item_box_shadow',
				'selector' => '{{WRAPPER}} ' . '.advanced-circle-carousel .content-box-inner',
			)
		);
		$this->end_controls_section();

		$this->start_controls_section(
			'section_title_styles',
			array(
				'label'      => esc_html__( 'Title', 'advanced-elements' ),
				'tab'        => Controls_Manager::TAB_STYLE,
				'show_label' => false,
			)
		);
		$this->add_control(
			'title_color',
			array(
				'label'     => esc_html__( 'Color', 'advanced-elements' ),
				'type'      => Controls_Manager::COLOR,
				'scheme'    => array(
					'type'  => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_4,
				),
				'selectors' => array(
					'{{WRAPPER}} ' . '.advanced-circle-carousel .content-title h4' => 'color: {{VALUE}}',
				),
			)
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			array(
				'name'     => 'title_typography',
				'scheme'   => Scheme_Typography::TYPOGRAPHY_4,
				'selector' => '{{WRAPPER}} ' . '.advanced-circle-carousel .content-title h4',
			)
		);
		$this->add_group_control(
			Group_Control_Background::get_type(),
			array(
				'name'     => 'title_bg',
				'selector' => '{{WRAPPER}} ' . '.advanced-circle-carousel .content-title h4',
			)
		);
		$this->add_responsive_control(
			'title_padding',
			array(
				'label'      => esc_html__( 'Padding', 'advanced-elements' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => array( 'px', '%', 'em' ),
				'selectors'  => array(
					'{{WRAPPER}} ' . '.advanced-circle-carousel .content-title h4' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				),
			)
		);
		$this->add_responsive_control(
			'title_margin',
			array(
				'label'      => esc_html__( 'Margin', 'advanced-elements' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => array( 'px', '%', 'em' ),
				'selectors'  => array(
					'{{WRAPPER}} ' . '.advanced-circle-carousel .content-title h4' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				),
			)
		);
		$this->add_group_control(
			Group_Control_Border::get_type(),
			array(
				'name'        => 'title_border',
				'placeholder' => '1px',
				'selector'    => '{{WRAPPER}} ' . '.advanced-circle-carousel .content-title h4',
			)
		);
		$this->add_control(
			'title_border_radius',
			array(
				'label'      => esc_html__( 'Border Radius', 'advanced-elements' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => array( 'px', '%' ),
				'selectors'  => array(
					'{{WRAPPER}} ' . '.advanced-circle-carousel .content-title h4' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				),
			)
		);
		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			array(
				'name' => 'title_box_shadow',
				'selector' => '{{WRAPPER}} ' . '.advanced-circle-carousel .content-title h4',
			)
		);
		$this->end_controls_section();

		$this->start_controls_section(
			'section_description_styles',
			array(
				'label'      => esc_html__( 'Description', 'advanced-elements' ),
				'tab'        => Controls_Manager::TAB_STYLE,
				'show_label' => false,
			)
		);
		$this->add_control(
			'description_color',
			array(
				'label'     => esc_html__( 'Color', 'advanced-elements' ),
				'type'      => Controls_Manager::COLOR,
				'scheme'    => array(
					'type'  => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_2,
				),
				'selectors' => array(
					'{{WRAPPER}} ' . '.advanced-circle-carousel .content-title p' => 'color: {{VALUE}}',
				),
			)
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			array(
				'name'     => 'description_typography',
				'scheme'   => Scheme_Typography::TYPOGRAPHY_2,
				'selector' => '{{WRAPPER}} ' . '.advanced-circle-carousel .content-title p',
			)
		);
		$this->add_group_control(
			Group_Control_Background::get_type(),
			array(
				'name'     => 'description_bg',
				'selector' => '{{WRAPPER}} ' . '.advanced-circle-carousel .content-title p',
			)
		);
		$this->add_responsive_control(
			'description_padding',
			array(
				'label'      => esc_html__( 'Padding', 'advanced-elements' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => array( 'px', '%', 'em' ),
				'selectors'  => array(
					'{{WRAPPER}} ' . '.advanced-circle-carousel .content-title p' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				),
			)
		);
		$this->add_responsive_control(
			'description_margin',
			array(
				'label'      => esc_html__( 'Margin', 'advanced-elements' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => array( 'px', '%', 'em' ),
				'selectors'  => array(
					'{{WRAPPER}} ' . '.advanced-circle-carousel .content-title p' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				),
			)
		);
		$this->add_group_control(
			Group_Control_Border::get_type(),
			array(
				'name'        => 'description_border',
				'placeholder' => '1px',
				'selector'    => '{{WRAPPER}} ' . '.advanced-circle-carousel .content-title p',
			)
		);
		$this->add_control(
			'description_border_radius',
			array(
				'label'      => esc_html__( 'Border Radius', 'advanced-elements' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => array( 'px', '%' ),
				'selectors'  => array(
					'{{WRAPPER}} ' . '.advanced-circle-carousel .content-title p' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				),
			)
		);
		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			array(
				'name' => 'description_box_shadow',
				'selector' => '{{WRAPPER}} ' . '.advanced-circle-carousel .content-title p',
			)
		);
		$this->end_controls_section();

		$this->start_controls_section(
			'section_dots_style',
			array(
				'label'      => esc_html__( 'Carousel Dots', 'advanced-elements' ),
				'tab'        => Controls_Manager::TAB_STYLE,
				'show_label' => false,
			)
		);
		$this->start_controls_tabs( 'tabs_dots_style' );
		$this->start_controls_tab(
			'tabs_dots',
			array(
				'label' => esc_html__( 'Normal', 'advanced-elements' ),
			)
		);
		$this->add_control(
			'tabs_dots_color',
			array(
				'label'     => esc_html__( 'Color', 'advanced-elements' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => array(
					'{{WRAPPER}} ' . '.advanced-circle-carousel .pagination .dot' => 'color: {{VALUE}}',
				),
			)
		);
		$this->add_control(
			'tabs_dots_bg_color',
			array(
				'label'     => esc_html__( 'Background Color', 'advanced-elements' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => array(
					'{{WRAPPER}} ' . '.advanced-circle-carousel .pagination .dot' => 'background-color: {{VALUE}}',
				),
			)
		);
		$this->add_control(
			'tabs_dots_suffix_color',
			array(
				'label'     => esc_html__( 'Suffix Color', 'advanced-elements' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => array(
					'{{WRAPPER}} ' . '.advanced-circle-carousel .pagination .dot::before' => 'border-color: {{VALUE}}',
				),
			)
		);
		$this->add_control(
			'tabs_dots_prefix_color',
			array(
				'label'     => esc_html__( 'Prefix Color', 'advanced-elements' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => array(
					'{{WRAPPER}} ' . '.advanced-circle-carousel .pagination .dot::after' => 'border-color: {{VALUE}}',
				),
			)
		);
		$this->add_responsive_control(
			'tabs_dots_box_size',
			array(
				'label'      => esc_html__( 'Box Size', 'advanced-elements' ),
				'type'       => Controls_Manager::SLIDER,
				'size_units' => array( 'px', '%' ),
				'range'      => array(
					'px'       => array(
						'min'    => 5,
						'max'    => 100,
					),
					'%'        => array(
						'min'    => 5,
						'max'    => 22,
					),
				),
				'selectors'  => array(
					'{{WRAPPER}} ' . '.advanced-circle-carousel .pagination .dot' => 'width: {{SIZE}}{{UNIT}}; height: {{SIZE}}{{UNIT}};',
				),
			)
		);
		$this->add_responsive_control(
			'tabs_dots_font_size',
			array(
				'label'      => esc_html__( 'Font Size', 'advanced-elements' ),
				'type'       => Controls_Manager::SLIDER,
				'size_units' => array( 'px', 'em' ),
				'range'      => array(
					'px'       => array(
						'min'    => 5,
						'max'    => 100,
					),
					'em'       => array(
						'min'    => 1,
						'max'    => 20,
					),
				),
				'selectors'  => array(
					'{{WRAPPER}} ' . '.advanced-circle-carousel .pagination .dot i' => 'font-size: {{SIZE}}{{UNIT}};',
				),
			)
		);
		$this->add_group_control(
			Group_Control_Border::get_type(),
			array(
				'name'        => 'tabs_dots_border',
				'label'       => esc_html__( 'Border', 'advanced-elements' ),
				'placeholder' => '1px',
				'default'     => '',
				'selector'    => '{{WRAPPER}} ' . '.advanced-circle-carousel .pagination .dot',
			)
		);
		$this->add_responsive_control(
			'tabs_dots_border_radius',
			array(
				'label'      => esc_html__( 'Border Radius', 'advanced-elements' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => array( 'px', '%', 'em' ),
				'selectors'  => array(
					'{{WRAPPER}} ' . '.advanced-circle-carousel .pagination .dot' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				),
			)
		);
		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			array(
				'name'     => 'tabs_dots_box_shadow',
				'selector' => '{{WRAPPER}} ' . '.advanced-circle-carousel .pagination .dot',
			)
		);
		$this->end_controls_tab();
		$this->start_controls_tab(
			'tabs_dots_hover',
			array(
				'label' => esc_html__( 'Hover', 'advanced-elements' ),
			)
		);
		$this->add_control(
			'tabs_dots_color_hover',
			array(
				'label'     => esc_html__( 'Color', 'advanced-elements' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => array(
					'{{WRAPPER}} ' . '.advanced-circle-carousel .pagination .dot:hover' => 'color: {{VALUE}}',
				),
			)
		);
		$this->add_control(
			'tabs_dots_bg_color_hover',
			array(
				'label'     => esc_html__( 'Background Color', 'advanced-elements' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => array(
					'{{WRAPPER}} ' . '.advanced-circle-carousel .pagination .dot:hover' => 'background-color: {{VALUE}}',
				),
			)
		);
		$this->add_control(
			'tabs_dots_suffix_color_hover',
			array(
				'label'     => esc_html__( 'Suffix Color', 'advanced-elements' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => array(
					'{{WRAPPER}} ' . '.advanced-circle-carousel .pagination .dot:hover::before' => 'border-color: {{VALUE}}',
				),
			)
		);
		$this->add_control(
			'tabs_dots_prefix_color_hover',
			array(
				'label'     => esc_html__( 'Prefix Color', 'advanced-elements' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => array(
					'{{WRAPPER}} ' . '.advanced-circle-carousel .pagination .dot:hover::after' => 'border-color: {{VALUE}}',
				),
			)
		);
		$this->add_responsive_control(
			'tabs_dots_box_size_hover',
			array(
				'label'      => esc_html__( 'Box Size', 'advanced-elements' ),
				'type'       => Controls_Manager::SLIDER,
				'size_units' => array( 'px', '%' ),
				'range'      => array(
					'px'       => array(
						'min'    => 5,
						'max'    => 100,
					),
					'%'        => array(
						'min'    => 5,
						'max'    => 22,
					),
				),
				'selectors'  => array(
					'{{WRAPPER}} ' . '.advanced-circle-carousel .pagination .dot:hover' => 'width: {{SIZE}}{{UNIT}}; height: {{SIZE}}{{UNIT}};',
				),
			)
		);
		$this->add_responsive_control(
			'tabs_dots_font_size_hover',
			array(
				'label'      => esc_html__( 'Font Size', 'advanced-elements' ),
				'type'       => Controls_Manager::SLIDER,
				'size_units' => array( 'px', 'em' ),
				'range'      => array(
					'px'       => array(
						'min'    => 5,
						'max'    => 100,
					),
					'em'       => array(
						'min'    => 1,
						'max'    => 20,
					),
				),
				'selectors'  => array(
					'{{WRAPPER}} ' . '.advanced-circle-carousel .pagination .dot i:hover' => 'font-size: {{SIZE}}{{UNIT}};',
				),
			)
		);
		$this->add_responsive_control(
			'tabs_dots_margin_hover',
			array(
				'label'       => esc_html__( 'Margin', 'advanced-elements' ),
				'type'        => Controls_Manager::DIMENSIONS,
				'size_units'  => array( 'px', '%', 'em' ),
				'selectors'   => array(
					'{{WRAPPER}} ' . '.advanced-circle-carousel .pagination .dot:hover' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				),
			)
		);
		$this->add_group_control(
			Group_Control_Border::get_type(),
			array(
				'name'        => 'tabs_dots_border_hover',
				'label'       => esc_html__( 'Border', 'advanced-elements' ),
				'placeholder' => '1px',
				'default'     => '',
				'selector'    => '{{WRAPPER}} ' . '.advanced-circle-carousel .pagination .dot:hover',
			)
		);
		$this->add_responsive_control(
			'tabs_dots_border_radius_hover',
			array(
				'label'      => esc_html__( 'Border Radius', 'advanced-elements' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => array( 'px', '%', 'em' ),
				'selectors'  => array(
					'{{WRAPPER}} ' . '.advanced-circle-carousel .pagination .dot:hover' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				),
			)
		);
		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			array(
				'name'     => 'tabs_dots_box_shadow_hover',
				'selector' => '{{WRAPPER}} ' . '.advanced-circle-carousel .pagination .dot:hover',
			)
		);
		$this->end_controls_tab();
		$this->start_controls_tab(
			'tabs_dots_active',
			array(
				'label' => esc_html__( 'Active', 'advanced-elements' ),
			)
		);
		$this->add_control(
			'tabs_dots_color_active',
			array(
				'label'     => esc_html__( 'Color', 'advanced-elements' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => array(
					'{{WRAPPER}} ' . '.advanced-circle-carousel .pagination .item.active .dot' => 'color: {{VALUE}}',
				),
			)
		);
		$this->add_control(
			'tabs_dots_bg_color_active',
			array(
				'label'     => esc_html__( 'Background Color', 'advanced-elements' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => array(
					'{{WRAPPER}} ' . '.advanced-circle-carousel .pagination .item.active .dot' => 'background-color: {{VALUE}}',
				),
			)
		);
		$this->add_control(
			'tabs_dots_suffix_color_active',
			array(
				'label'     => esc_html__( 'Suffix Color', 'advanced-elements' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => array(
					'{{WRAPPER}} ' . '.advanced-circle-carousel .pagination .item.active .dot::before' => 'border-color: {{VALUE}}',
				),
			)
		);
		$this->add_control(
			'tabs_dots_prefix_color_active',
			array(
				'label'     => esc_html__( 'Prefix Color', 'advanced-elements' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => array(
					'{{WRAPPER}} ' . '.advanced-circle-carousel .pagination .item.active .dot::after' => 'border-color: {{VALUE}}',
				),
			)
		);
		$this->add_responsive_control(
			'tabs_dots_box_size_active',
			array(
				'label'      => esc_html__( 'Box Size', 'advanced-elements' ),
				'type'       => Controls_Manager::SLIDER,
				'size_units' => array( 'px', '%' ),
				'range'      => array(
					'px'       => array(
						'min'    => 5,
						'max'    => 100,
					),
					'%'        => array(
						'min'    => 5,
						'max'    => 22,
					),
				),
				'selectors'  => array(
					'{{WRAPPER}} ' . '.advanced-circle-carousel .pagination .item.active .dot' => 'width: {{SIZE}}{{UNIT}}; height: {{SIZE}}{{UNIT}};',
				),
			)
		);
		$this->add_responsive_control(
			'tabs_dots_font_size_active',
			array(
				'label'      => esc_html__( 'Font Size', 'advanced-elements' ),
				'type'       => Controls_Manager::SLIDER,
				'size_units' => array( 'px', 'em' ),
				'range'      => array(
					'px'       => array(
						'min'    => 5,
						'max'    => 100,
					),
					'em'       => array(
						'min'    => 1,
						'max'    => 20,
					),
				),
				'selectors'  => array(
					'{{WRAPPER}} ' . '.advanced-circle-carousel .pagination .item.active .dot i' => 'font-size: {{SIZE}}{{UNIT}};',
				),
			)
		);
		$this->add_responsive_control(
			'tabs_dots_margin_active',
			array(
				'label'       => esc_html__( 'Margin', 'advanced-elements' ),
				'type'        => Controls_Manager::DIMENSIONS,
				'size_units'  => array( 'px', '%', 'em' ),
				'selectors'   => array(
					'{{WRAPPER}} ' . '.advanced-circle-carousel .pagination .item.active .dot' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				),
			)
		);
		$this->add_group_control(
			Group_Control_Border::get_type(),
			array(
				'name'        => 'tabs_dots_border_active',
				'label'       => esc_html__( 'Border', 'advanced-elements' ),
				'placeholder' => '1px',
				'default'     => '',
				'selector'    => '{{WRAPPER}} ' . '.advanced-circle-carousel .pagination .item.active .dot',
			)
		);
		$this->add_responsive_control(
			'tabs_dots_border_radius_active',
			array(
				'label'      => esc_html__( 'Border Radius', 'advanced-elements' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => array( 'px', '%', 'em' ),
				'selectors'  => array(
					'{{WRAPPER}} ' . '.advanced-circle-carousel .pagination .item.active .dot' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				),
			)
		);
		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			array(
				'name'     => 'tabs_dots_box_shadow_active',
				'selector' => '{{WRAPPER}} ' . '.advanced-circle-carousel .pagination .item.active .dot',
			)
		);
		$this->end_controls_tab();
		$this->end_controls_tabs();
		$this->end_controls_section();

		$this->start_controls_section(
			'section_arrows_style',
			array(
				'label'      => esc_html__( 'Carousel Buttons', 'advanced-elements' ),
				'tab'        => Controls_Manager::TAB_STYLE,
				'show_label' => false,
			)
		);
		$this->start_controls_tabs( 'tabs_arrows_style' );
		$this->start_controls_tab(
			'tabs_arrows',
			array(
				'label' => esc_html__( 'Normal', 'advanced-elements' ),
			)
		);
		$this->add_control(
			'tabs_arrows_color',
			array(
				'label'     => esc_html__( 'Color', 'advanced-elements' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => array(
					'{{WRAPPER}} ' . '.advanced-circle-carousel .navigation .nav-btn span' => 'color: {{VALUE}}',
				),
			)
		);
		$this->add_control(
			'tabs_arrows_bg_color',
			array(
				'label'     => esc_html__( 'Background Color', 'advanced-elements' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => array(
					'{{WRAPPER}} ' . '.advanced-circle-carousel .navigation .nav-btn' => 'background-color: {{VALUE}}',
				),
			)
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			array(
				'name'     => 'tabs_arrows_size',
				'scheme'   => Scheme_Typography::TYPOGRAPHY_4,
				'selector' => '{{WRAPPER}} ' . '.advanced-circle-carousel .navigation .nav-btn span',
			)
		);
		$this->add_responsive_control(
			'tabs_arrows_box_width',
			array(
				'label'      => esc_html__( 'Arrows Box Width', 'advanced-elements' ),
				'type'       => Controls_Manager::SLIDER,
				'size_units' => array( 'px', 'em' ),
				'range'      => array(
					'px'       => array(
						'min'    => 5,
						'max'    => 200,
					),
					'em'       => array(
						'min'    => 1,
						'max'    => 20,
					),
				),
				'selectors'  => array(
					'{{WRAPPER}} ' . '.advanced-circle-carousel .navigation .nav-btn' => 'width: {{SIZE}}{{UNIT}};',
				),
			)
		);
		$this->add_responsive_control(
			'tabs_arrows_box_height',
			array(
				'label'      => esc_html__( 'Arrows Box Height', 'advanced-elements' ),
				'type'       => Controls_Manager::SLIDER,
				'size_units' => array( 'px', 'em' ),
				'range'      => array(
					'px'       => array(
						'min'    => 5,
						'max'    => 200,
					),
					'em'       => array(
						'min'    => 1,
						'max'    => 20,
					),
				),
				'selectors'  => array(
					'{{WRAPPER}} ' . '.advanced-circle-carousel .navigation .nav-btn' => 'height: {{SIZE}}{{UNIT}};',
				),
			)
		);
		$this->add_group_control(
			Group_Control_Border::get_type(),
			array(
				'name'        => 'tabs_arrows_border',
				'label'       => esc_html__( 'Border', 'advanced-elements' ),
				'placeholder' => '1px',
				'default'     => '',
				'selector'    => '{{WRAPPER}} ' . '.advanced-circle-carousel .navigation .nav-btn',
			)
		);
		$this->add_responsive_control(
			'tabs_arrows_border_radius',
			array(
				'label'      => esc_html__( 'Border Radius', 'advanced-elements' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => array( 'px', '%', 'em' ),
				'selectors'  => array(
					'{{WRAPPER}} ' . '.advanced-circle-carousel .navigation .nav-btn' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				),
			)
		);
		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			array(
				'name'     => 'tabs_arrows_box_shadow',
				'selector' => '{{WRAPPER}} ' . '.advanced-circle-carousel .navigation .nav-btn',
			)
		);
		$this->end_controls_tab();

		$this->start_controls_tab(
			'tabs_arrows_hover',
			array(
				'label' => esc_html__( 'Hover', 'advanced-elements' ),
			)
		);
		$this->add_control(
			'tabs_arrows_color_hover',
			array(
				'label'     => esc_html__( 'Color', 'advanced-elements' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => array(
					'{{WRAPPER}} ' . '.advanced-circle-carousel .navigation .nav-btn:hover span' => 'color: {{VALUE}}',
				),
			)
		);
		$this->add_control(
			'tabs_arrows_bg_color_hover',
			array(
				'label'     => esc_html__( 'Background Color', 'advanced-elements' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => array(
					'{{WRAPPER}} ' . '.advanced-circle-carousel .navigation .nav-btn:hover' => 'background-color: {{VALUE}}',
				),
			)
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			array(
				'name'     => 'tabs_arrows_size_hover',
				'scheme'   => Scheme_Typography::TYPOGRAPHY_4,
				'selector' => '{{WRAPPER}} ' . '.advanced-circle-carousel .navigation .nav-btn:hover span',
			)
		);
		$this->add_responsive_control(
			'tabs_arrows_box_width_hover',
			array(
				'label'      => esc_html__( 'Arrows Box Width', 'advanced-elements' ),
				'type'       => Controls_Manager::SLIDER,
				'size_units' => array( 'px', 'em' ),
				'range'      => array(
					'px'       => array(
						'min'    => 5,
						'max'    => 200,
					),
					'em'       => array(
						'min'    => 1,
						'max'    => 20,
					),
				),
				'selectors'  => array(
					'{{WRAPPER}} ' . '.advanced-circle-carousel .navigation .nav-btn:hover' => 'width: {{SIZE}}{{UNIT}};',
				),
			)
		);
		$this->add_responsive_control(
			'tabs_arrows_box_height_hover',
			array(
				'label'      => esc_html__( 'Arrows Box Height', 'advanced-elements' ),
				'type'       => Controls_Manager::SLIDER,
				'size_units' => array( 'px', 'em' ),
				'range'      => array(
					'px'       => array(
						'min'    => 5,
						'max'    => 200,
					),
					'em'       => array(
						'min'    => 1,
						'max'    => 20,
					),
				),
				'selectors'  => array(
					'{{WRAPPER}} ' . '.advanced-circle-carousel .navigation .nav-btn:hover' => 'height: {{SIZE}}{{UNIT}};',
				),
			)
		);
		$this->add_group_control(
			Group_Control_Border::get_type(),
			array(
				'name'        => 'tabs_arrows_border_hover',
				'label'       => esc_html__( 'Border', 'advanced-elements' ),
				'placeholder' => '1px',
				'default'     => '',
				'selector'    => '{{WRAPPER}} ' . '.advanced-circle-carousel .navigation .nav-btn:hover',
			)
		);
		$this->add_responsive_control(
			'tabs_arrows_border_radius_hover',
			array(
				'label'      => esc_html__( 'Border Radius', 'advanced-elements' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => array( 'px', '%', 'em' ),
				'selectors'  => array(
					'{{WRAPPER}} ' . '.advanced-circle-carousel .navigation .nav-btn:hover' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				),
			)
		);
		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			array(
				'name'     => 'tabs_arrows_box_shadow_hover',
				'selector' => '{{WRAPPER}} ' . '.advanced-circle-carousel .navigation .nav-btn:hover',
			)
		);
		$this->end_controls_tab();
		$this->end_controls_tabs();
		$this->add_control(
			'prev_arrow_position',
			array(
				'label'     => esc_html__( 'Prev Arrow Position', 'advanced-elements' ),
				'type'      => Controls_Manager::HEADING,
				'separator' => 'before',
			)
		);
		$this->add_control(
			'prev_vert_position',
			array(
				'label'   => esc_html__( 'Vertical Postition', 'advanced-elements' ),
				'type'    => Controls_Manager::SELECT,
				'default' => 'top',
				'options' => array(
					'top'    => esc_html__( 'Top', 'advanced-elements' ),
					'bottom' => esc_html__( 'Bottom', 'advanced-elements' ),
				),
			)
		);
		$this->add_responsive_control(
			'prev_top_position',
			array(
				'label'      => esc_html__( 'Top Indent', 'advanced-elements' ),
				'type'       => Controls_Manager::SLIDER,
				'size_units' => array( 'px', '%', 'em' ),
				'range'      => array(
					'px' => array(
						'min' => -400,
						'max' => 400,
					),
					'%' => array(
						'min' => -100,
						'max' => 100,
					),
					'em' => array(
						'min' => -50,
						'max' => 50,
					),
				),
				'condition' => array(
					'prev_vert_position' => 'top',
				),
				'selectors'  => array(
					'{{WRAPPER}} ' . '.advanced-circle-carousel .navigation .nav-btn.prev' => 'top: {{SIZE}}{{UNIT}}; bottom: auto;',
				),
			)
		);
		$this->add_responsive_control(
			'prev_bottom_position',
			array(
				'label'      => esc_html__( 'Bottom Indent', 'advanced-elements' ),
				'type'       => Controls_Manager::SLIDER,
				'size_units' => array( 'px', '%', 'em' ),
				'range'      => array(
					'px' => array(
						'min' => -400,
						'max' => 400,
					),
					'%' => array(
						'min' => -100,
						'max' => 100,
					),
					'em' => array(
						'min' => -50,
						'max' => 50,
					),
				),
				'condition' => array(
					'prev_vert_position' => 'bottom',
				),
				'selectors'  => array(
					'{{WRAPPER}} ' . '.advanced-circle-carousel .navigation .nav-btn.prev' => 'bottom: {{SIZE}}{{UNIT}}; top: auto;',
				),
			)
		);
		$this->add_control(
			'prev_hor_position',
			array(
				'label'   => esc_html__( 'Horizontal Postition', 'advanced-elements' ),
				'type'    => Controls_Manager::SELECT,
				'default' => 'left',
				'options' => array(
					'left'  => esc_html__( 'Left', 'advanced-elements' ),
					'right' => esc_html__( 'Right', 'advanced-elements' ),
				),
			)
		);
		$this->add_responsive_control(
			'prev_left_position',
			array(
				'label'      => esc_html__( 'Left Indent', 'advanced-elements' ),
				'type'       => Controls_Manager::SLIDER,
				'size_units' => array( 'px', '%', 'em' ),
				'range'      => array(
					'px' => array(
						'min' => -400,
						'max' => 400,
					),
					'%' => array(
						'min' => -100,
						'max' => 100,
					),
					'em' => array(
						'min' => -50,
						'max' => 50,
					),
				),
				'condition' => array(
					'prev_hor_position' => 'left',
				),
				'selectors'  => array(
					'{{WRAPPER}} ' . '.advanced-circle-carousel .navigation .nav-btn.prev' => 'left: {{SIZE}}{{UNIT}}; right: auto;',
				),
			)
		);
		$this->add_responsive_control(
			'prev_right_position',
			array(
				'label'      => esc_html__( 'Right Indent', 'advanced-elements' ),
				'type'       => Controls_Manager::SLIDER,
				'size_units' => array( 'px', '%', 'em' ),
				'range'      => array(
					'px' => array(
						'min' => -400,
						'max' => 400,
					),
					'%' => array(
						'min' => -100,
						'max' => 100,
					),
					'em' => array(
						'min' => -50,
						'max' => 50,
					),
				),
				'condition' => array(
					'prev_hor_position' => 'right',
				),
				'selectors'  => array(
					'{{WRAPPER}} ' . '.advanced-circle-carousel .navigation .nav-btn.prev' => 'right: {{SIZE}}{{UNIT}}; left: auto;',
				),
			)
		);
		$this->add_control(
			'next_arrow_position',
			array(
				'label'     => esc_html__( 'Next Arrow Position', 'advanced-elements' ),
				'type'      => Controls_Manager::HEADING,
				'separator' => 'before',
			)
		);
		$this->add_control(
			'next_vert_position',
			array(
				'label'   => esc_html__( 'Vertical Postition', 'advanced-elements' ),
				'type'    => Controls_Manager::SELECT,
				'default' => 'top',
				'options' => array(
					'top'    => esc_html__( 'Top', 'advanced-elements' ),
					'bottom' => esc_html__( 'Bottom', 'advanced-elements' ),
				),
			)
		);
		$this->add_responsive_control(
			'next_top_position',
			array(
				'label'      => esc_html__( 'Top Indent', 'advanced-elements' ),
				'type'       => Controls_Manager::SLIDER,
				'size_units' => array( 'px', '%', 'em' ),
				'range'      => array(
					'px' => array(
						'min' => -400,
						'max' => 400,
					),
					'%' => array(
						'min' => -100,
						'max' => 100,
					),
					'em' => array(
						'min' => -50,
						'max' => 50,
					),
				),
				'condition' => array(
					'next_vert_position' => 'top',
				),
				'selectors'  => array(
					'{{WRAPPER}} ' . '.advanced-circle-carousel .navigation .nav-btn.next' => 'top: {{SIZE}}{{UNIT}}; bottom: auto;',
				),
			)
		);
		$this->add_responsive_control(
			'next_bottom_position',
			array(
				'label'      => esc_html__( 'Bottom Indent', 'advanced-elements' ),
				'type'       => Controls_Manager::SLIDER,
				'size_units' => array( 'px', '%', 'em' ),
				'range'      => array(
					'px' => array(
						'min' => -400,
						'max' => 400,
					),
					'%' => array(
						'min' => -100,
						'max' => 100,
					),
					'em' => array(
						'min' => -50,
						'max' => 50,
					),
				),
				'condition' => array(
					'next_vert_position' => 'bottom',
				),
				'selectors'  => array(
					'{{WRAPPER}} ' . '.advanced-circle-carousel .navigation .nav-btn.next' => 'bottom: {{SIZE}}{{UNIT}}; top: auto;',
				),
			)
		);
		$this->add_control(
			'next_hor_position',
			array(
				'label'   => esc_html__( 'Horizontal Postition', 'advanced-elements' ),
				'type'    => Controls_Manager::SELECT,
				'default' => 'right',
				'options' => array(
					'left'  => esc_html__( 'Left', 'advanced-elements' ),
					'right' => esc_html__( 'Right', 'advanced-elements' ),
				),
			)
		);
		$this->add_responsive_control(
			'next_left_position',
			array(
				'label'      => esc_html__( 'Left Indent', 'advanced-elements' ),
				'type'       => Controls_Manager::SLIDER,
				'size_units' => array( 'px', '%', 'em' ),
				'range'      => array(
					'px' => array(
						'min' => -400,
						'max' => 400,
					),
					'%' => array(
						'min' => -100,
						'max' => 100,
					),
					'em' => array(
						'min' => -50,
						'max' => 50,
					),
				),
				'condition' => array(
					'next_hor_position' => 'left',
				),
				'selectors'  => array(
					'{{WRAPPER}} ' . '.advanced-circle-carousel .navigation .nav-btn.next' => 'left: {{SIZE}}{{UNIT}}; right: auto;',
				),
			)
		);
		$this->add_responsive_control(
			'next_right_position',
			array(
				'label'      => esc_html__( 'Right Indent', 'advanced-elements' ),
				'type'       => Controls_Manager::SLIDER,
				'size_units' => array( 'px', '%', 'em' ),
				'range'      => array(
					'px' => array(
						'min' => -400,
						'max' => 400,
					),
					'%' => array(
						'min' => -100,
						'max' => 100,
					),
					'em' => array(
						'min' => -50,
						'max' => 50,
					),
				),
				'condition' => array(
					'next_hor_position' => 'right',
				),
				'selectors'  => array(
					'{{WRAPPER}} ' . '.advanced-circle-carousel .navigation .nav-btn.next' => 'right: {{SIZE}}{{UNIT}}; left: auto;',
				),
			)
		);
		$this->end_controls_section();
	}

	protected function render() {
		echo $this->get_circle_setting_json( $this->get_circle_content() );
	}

	public function get_circle_setting_json( $content = null ) {
		$settings = $this->get_settings();
		$speed    = absint( $settings['animation_speed'] );
		$autoplay = filter_var( $settings['autoplay'], FILTER_VALIDATE_BOOLEAN ) ? absint( $settings['autoplay_timeout'] ) : false;
		return sprintf(
			'<div class="advanced-carousel-wrapper"><div class="advanced-circle-carousel" data-speed="%1$s" data-autoplay="%2$s"><div class="slides">%3$s</div>%4$s</div></div>',
			$speed, $autoplay, $content, $this->get_navigation_code()
		);
	}

	public function get_circle_content() {
		ob_start();
		$items_list = $this->get_settings( 'items_list' );
		foreach ( $items_list as $item ) {
			echo '<div class="content-box">';
				echo '<div class="content-box-inner">';
					echo sprintf( '<div class="content-box-img" style="background-image: url(%s)">', $item['item_image']['url'] );
						echo '<div class="content-title-wrap">';
							echo '<div class="content-title">';
								echo sprintf( '<h4>%s</h4>', $item['item_title'] );
								echo sprintf( '<p>%s</p>', $item['item_descr'] );
							echo '</div>';
						echo '</div>';
					echo '</div>';
				echo '</div>';
			echo '</div>';
		}
		echo '</div>';
		echo '<div class="pagination">';
		foreach ( $items_list as $item ) {
			echo sprintf( '<div class="item"><div class="dot"><i class="%s"></i><span></span></div></div>', $item['item_icon'] );
		}
		return ob_get_clean();
	}

	public function get_navigation_code() {
		if( 'yes' === $this->get_settings( 'show_arrows_btn' ) && ( !empty( $this->get_settings( 'arrows_btn_prev' ) || $this->get_settings( 'arrows_btn_next' ) ) ) ) {
			return sprintf(
				'<div class="navigation"><div class="nav-btn prev"><span>%1$s</span></div><div class="nav-btn next"><span>%2$s</span></div></div>',
				$this->get_settings( 'arrows_btn_prev' ),
				$this->get_settings( 'arrows_btn_next' )
			);
		}
	}
}