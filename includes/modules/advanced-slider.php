<?php
namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit;

class Advanced_Slider extends Widget_Base {

	public function get_name() {
		return 'advanced-slider';
	}

	public function get_title() {
		return esc_html__( 'Advanced Slider', 'advanced-elements' );
	}

	public function get_icon() {
		return 'eicon-post-slider';
	}

	public function get_categories() {
		return array( 'advanced-elements' );
	}

	protected function _register_controls() {
		$this->start_controls_section(
			'advanced_slider',
			array(
				'label'      => esc_html__( 'Advanced Slider Items', 'advanced-elements' ),
				'tab'        => Controls_Manager::TAB_CONTENT,
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
				'label' => esc_html__( 'Title', 'advanced-elements' ),
				'type'  => Controls_Manager::TEXT,
			)
		);
		$repeater->add_control(
			'item_subtitle',
			array(
				'label' => esc_html__( 'Subtitle', 'advanced-elements' ),
				'type'  => Controls_Manager::TEXT,
			)
		);
		$repeater->add_control(
			'item_descr',
			array(
				'label'   => esc_html__( 'Description', 'advanced-elements' ),
				'type'    => Controls_Manager::TEXTAREA,
			)
		);
		$repeater->add_control(
			'item_btn_show',
			array(
				'label'        => esc_html__( 'Show Buttons?', 'advanced-elements' ),
				'type'         => Controls_Manager::SWITCHER,
				'label_on'     => esc_html__( 'Yes', 'advanced-elements' ),
				'label_off'    => esc_html__( 'No', 'advanced-elements' ),
				'return_value' => 'yes',
				'default'      => 'yes',
			)
		);
		$repeater->add_control(
			'item_btn_1',
			array(
				'label'     => esc_html__( 'Button Text #1', 'advanced-elements' ),
				'type'      => Controls_Manager::TEXT,
				'default'   => esc_html__( 'Read more', 'advanced-elements' ),
				'condition' => array(
					'item_btn_show' => 'yes',
				),
			)
		);
		$repeater->add_control(
			'item_btn_url_1',
			array(
				'label'       => esc_html__( 'Button Url #1', 'advanced-elements' ),
				'type'        => Controls_Manager::URL,
				'dynamic'     => array(
					'active'    => true,
				),
				'placeholder' => __( 'https://button-link.com', 'advanced-elements' ),
				'default'     => array(
					'url'       => '#',
				),
				'condition'   => array(
					'item_btn_show' => 'yes',
				),
			)
		);
		$repeater->add_control(
			'item_btn_2',
			array(
				'label'     => esc_html__( 'Button Text #2', 'advanced-elements' ),
				'type'      => Controls_Manager::TEXT,
				'default'   => esc_html__( 'Read more', 'advanced-elements' ),
				'condition' => array(
					'item_btn_show' => 'yes',
				),
			)
		);
		$repeater->add_control(
			'item_btn_url_2',
			array(
				'label'       => esc_html__( 'Button Url #2', 'advanced-elements' ),
				'type'        => Controls_Manager::URL,
				'dynamic'     => array(
					'active'    => true,
				),
				'placeholder' => __( 'https://button-link.com', 'advanced-elements' ),
				'default'     => array(
					'url'       => '#',
				),
				'condition'   => array(
					'item_btn_show' => 'yes',
				),
			)
		);
		$this->add_control(
			'items_list',
			array(
				'type'        => Controls_Manager::REPEATER,
				'fields'      => array_values( $repeater->get_controls() ),
				'default'     => array(
					array(
						'item_image'     => array(
							'url'          => Utils::get_placeholder_image_src(),
						),
						'item_title'     => esc_html__( 'Slide #1', 'advanced-elements' ),
						'item_subtitle'  => esc_html__( 'Sub Title #1', 'advanced-elements' ),
						'item_descr'     => esc_html__( 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.', 'advanced-elements' ),
						'item_btn_show'  => 'yes',
						'item_btn_1'     => esc_html__( 'Button #1', 'advanced-elements' ),
						'item_btn_url_1' => array(
							'url'          => '#',
						),
						'item_btn_2'     => esc_html__( '', 'advanced-elements' ),
						'item_btn_url_2' => array(
							'url'          => '',
						),
					),
					array(
						'item_image'     => array(
							'url'          => Utils::get_placeholder_image_src(),
						),
						'item_title'     => esc_html__( 'Slide #2', 'advanced-elements' ),
						'item_subtitle'  => esc_html__( 'Sub Title #2', 'advanced-elements' ),
						'item_descr'     => esc_html__( 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.', 'advanced-elements' ),
						'item_btn_show'  => 'yes',
						'item_btn_1'     => esc_html__( 'Button #1', 'advanced-elements' ),
						'item_btn_url_1' => array(
							'url'          => '#',
						),
						'item_btn_2'     => esc_html__( '', 'advanced-elements' ),
						'item_btn_url_2' => array(
							'url'          => '',
						),
					),
					array(
						'item_image'     => array(
							'url'          => Utils::get_placeholder_image_src(),
						),
						'item_title'     => esc_html__( 'Slide #3', 'advanced-elements' ),
						'item_subtitle'  => esc_html__( 'Sub Title #3', 'advanced-elements' ),
						'item_descr'     => esc_html__( 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.', 'advanced-elements' ),
						'item_btn_show'  => 'yes',
						'item_btn_1'     => esc_html__( 'Button #1', 'advanced-elements' ),
						'item_btn_url_1' => array(
							'url'          => '#',
						),
						'item_btn_2'     => esc_html__( '', 'advanced-elements' ),
						'item_btn_url_2' => array(
							'url'          => '',
						),
					),
				),
				'title_field' => '{{{ item_title }}}',
			)
		);
		$this->end_controls_section();

		$this->start_controls_section(
			'advanced_carousel_settings',
			array(
				'label'      => esc_html__( 'Settings', 'advanced-elements' ),
				'tab'        => Controls_Manager::TAB_CONTENT,
				'show_label' => false,
			)
		);
		$this->add_control(
			'full_screen',
			array(
				'label'        => esc_html__( 'Display Fullscreen Button?', 'advanced-elements' ),
				'type'         => Controls_Manager::SWITCHER,
				'label_on'     => esc_html__( 'Yes', 'advanced-elements' ),
				'label_off'    => esc_html__( 'No', 'advanced-elements' ),
				'return_value' => 'yes',
				'default'      => 'yes',
			)
		);
		$this->add_control(
			'slider_arrows',
			array(
				'label'        => esc_html__( 'Display Arrows Navigation?', 'advanced-elements' ),
				'type'         => Controls_Manager::SWITCHER,
				'label_on'     => esc_html__( 'Yes', 'advanced-elements' ),
				'label_off'    => esc_html__( 'No', 'advanced-elements' ),
				'return_value' => 'yes',
				'default'      => 'yes',
			)
		);
		$this->add_control(
			'slider_arrows_fade',
			array(
				'label'        => esc_html__( 'Display Arrows Only On Hover?', 'advanced-elements' ),
				'type'         => Controls_Manager::SWITCHER,
				'label_on'     => esc_html__( 'Yes', 'advanced-elements' ),
				'label_off'    => esc_html__( 'No', 'advanced-elements' ),
				'return_value' => 'yes',
				'default'      => 'yes',
				'condition'    => array(
					'slider_arrows' => 'yes',
				),
			)
		);
		$this->add_control(
			'slider_buttons',
			array(
				'label'        => esc_html__( 'Display Dots Navigation?', 'advanced-elements' ),
				'type'         => Controls_Manager::SWITCHER,
				'label_on'     => esc_html__( 'Yes', 'advanced-elements' ),
				'label_off'    => esc_html__( 'No', 'advanced-elements' ),
				'return_value' => 'yes',
				'default'      => 'no',
			)
		);
		$this->add_control(
			'slider_autoplay',
			array(
				'label'        => esc_html__( 'Use Autoplay?', 'advanced-elements' ),
				'type'         => Controls_Manager::SWITCHER,
				'label_on'     => esc_html__( 'Yes', 'advanced-elements' ),
				'label_off'    => esc_html__( 'No', 'advanced-elements' ),
				'return_value' => 'yes',
				'default'      => 'no',
			)
		);
		$this->add_control(
			'slider_autoplay_delay',
			array(
				'label'   => esc_html__( 'Animation Delay', 'advanced-elements' ),
				'type'    => Controls_Manager::NUMBER,
				'default' => 5000,
				'min'     => 2000,
				'max'     => 20000,
				'step'    => 100,
				'condition' => array(
					'slider_autoplay' => 'yes',
				),
			)
		);
		$this->add_control(
			'slide_autoplay_on_hover',
			array(
				'label'   => esc_html__( 'Autoplay On Hover', 'advanced-elements' ),
				'type'    => Controls_Manager::SELECT,
				'default' => 'pause',
				'options' => array(
					'pause' => esc_html__( 'Pause', 'advanced-elements' ),
					'stop'  => esc_html__( 'Stop', 'advanced-elements' ),
					'none'  => esc_html__( 'None', 'advanced-elements' ),
				),
			)
		);
		$this->add_control(
			'slider_animation_speed',
			array(
				'label'   => esc_html__( 'Animation Speed', 'advanced-elements' ),
				'type'    => Controls_Manager::NUMBER,
				'default' => 500,
				'min'     => 100,
				'max'     => 10000,
				'step'    => 100,
			)
		);
		$this->add_control(
			'slider_shuffle',
			array(
				'label'        => esc_html__( 'Shuffled Slides?', 'advanced-elements' ),
				'type'         => Controls_Manager::SWITCHER,
				'label_on'     => esc_html__( 'Yes', 'advanced-elements' ),
				'label_off'    => esc_html__( 'No', 'advanced-elements' ),
				'return_value' => 'yes',
				'default'      => 'no',
			)
		);
		$this->add_control(
			'slider_loop',
			array(
				'label'        => esc_html__( 'Infinity loop?', 'advanced-elements' ),
				'type'         => Controls_Manager::SWITCHER,
				'label_on'     => esc_html__( 'Yes', 'advanced-elements' ),
				'label_off'    => esc_html__( 'No', 'advanced-elements' ),
				'return_value' => 'yes',
				'default'      => 'yes',
			)
		);
		$this->add_control(
			'thumbnails',
			array(
				'label'        => esc_html__( 'Display thumbnails?', 'advanced-elements' ),
				'type'         => Controls_Manager::SWITCHER,
				'label_on'     => esc_html__( 'Yes', 'advanced-elements' ),
				'label_off'    => esc_html__( 'No', 'advanced-elements' ),
				'return_value' => 'yes',
				'default'      => 'yes',
			)
		);
		$this->add_control(
			'thumbnail_width',
			array(
				'label'   => esc_html__( 'Thumbnail width', 'advanced-elements' ),
				'type'    => Controls_Manager::NUMBER,
				'default' => 120,
				'min'     => 20,
				'max'     => 200,
				'step'    => 1,
				'condition' => array(
					'thumbnails' => 'yes',
				),
			)
		);
		$this->add_control(
			'thumbnail_height',
			array(
				'label'   => esc_html__( 'Thumbnail height', 'advanced-elements' ),
				'type'    => Controls_Manager::NUMBER,
				'default' => 80,
				'min'     => 20,
				'max'     => 200,
				'step'    => 1,
				'condition' => array(
					'thumbnails' => 'yes',
				),
			)
		);
		$this->add_control(
			'thumbnails_position',
			array(
				'label'    => esc_html__( 'Thumbnail Position', 'advanced-elements' ),
				'type'     => Controls_Manager::SELECT,
				'default'  => 'bottom',
				'options'  => array(
					'left'   => esc_html__( 'Left', 'advanced-elements' ),
					'right'  => esc_html__( 'Right', 'advanced-elements' ),
					'bottom' => esc_html__( 'Bottom', 'advanced-elements' ),
				),
				'condition' => array(
					'thumbnails' => 'yes',
				),
			)
		);
		$this->end_controls_section();

		$this->start_controls_section(
			'slider_general_style',
			array(
				'label'      => esc_html__( 'General', 'advanced-elements' ),
				'tab'        => Controls_Manager::TAB_STYLE,
				'show_label' => false,
			)
		);
		$this->add_control(
			'slider_width',
			array(
				'label' => esc_html__( 'Slider Width', 'advanced-elements' ),
				'type'  => Controls_Manager::SLIDER,
				'size_units' => array( '%' ),
				'range' => array(
					'%' => array(
						'min' => 50,
						'max' => 100,
					),
				),
				'default' => array(
					'unit' => '%',
					'size' => 100,
				),
			)
		);
		$this->add_responsive_control(
			'slider_height',
			array(
				'label' => esc_html__( 'Slider Height', 'advanced-elements' ),
				'type'  => Controls_Manager::SLIDER,
				'size_units' => array( 'px' ),
				'range' => array(
					'px' => array(
						'min' => 300,
						'max' => 1000,
					),
				),
				'default' => array(
					'unit' => 'px',
					'size' => 600,
				),
			)
		);
		$this->end_controls_section();

		$this->start_controls_section(
			'overlay',
			array(
				'label'      => esc_html__( 'Overlay', 'advanced-elements' ),
				'tab'        => Controls_Manager::TAB_STYLE,
				'show_label' => false,
			)
		);
		$this->add_group_control(
			Group_Control_Background::get_type(),
			array(
				'name'     => 'overlay_background',
				'selector' => '{{WRAPPER}} ' . '.advanced-slider .sp-layer::before',
			)
		);
		$this->add_control(
			'overlay_opacity',
			array(
				'label'    => esc_html__( 'Opacity', 'advanced-elements' ),
				'type'     => Controls_Manager::NUMBER,
				'default'  => 0.3,
				'min'      => 0,
				'max'      => 1,
				'step'     => 0.1,
				'selectors'  => array(
					'{{WRAPPER}} ' . '.advanced-slider .sp-layer::before' => 'opacity: {{VALUE}};',
				),
			)
		);
		$this->end_controls_section();

		$this->start_controls_section(
			'section_dots_style',
			array(
				'label'      => esc_html__( 'Pagination', 'advanced-elements' ),
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
					'{{WRAPPER}} ' . '.advanced-slider .sp-buttons .sp-button' => 'background-color: {{VALUE}}',
				),
			)
		);
		$this->add_responsive_control(
			'tabs_dots_box_size',
			array(
				'label'      => esc_html__( 'Size', 'advanced-elements' ),
				'type'       => Controls_Manager::SLIDER,
				'size_units' => array( 'px' ),
				'range'      => array(
					'px'       => array(
						'min'    => 5,
						'max'    => 100,
					),
				),
				'selectors'  => array(
					'{{WRAPPER}} ' . '.advanced-slider .sp-buttons .sp-button' => 'width: {{SIZE}}{{UNIT}}; height: {{SIZE}}{{UNIT}};',
				),
			)
		);
		$this->add_responsive_control(
			'tabs_dots_margin',
			array(
				'label'       => esc_html__( 'Margin', 'advanced-elements' ),
				'type'        => Controls_Manager::DIMENSIONS,
				'size_units'  => array( 'px', '%', 'em' ),
				'selectors'   => array(
					'{{WRAPPER}} ' . '.advanced-slider .sp-buttons .sp-button' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
				'selector'    => '{{WRAPPER}} ' . '.advanced-slider .sp-buttons .sp-button',
			)
		);
		$this->add_responsive_control(
			'tabs_dots_border_radius',
			array(
				'label'      => esc_html__( 'Border Radius', 'advanced-elements' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => array( 'px', '%', 'em' ),
				'selectors'  => array(
					'{{WRAPPER}} ' . '.advanced-slider .sp-buttons .sp-button' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				),
			)
		);
		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			array(
				'name'     => 'tabs_dots_box_shadow',
				'selector' => '{{WRAPPER}} ' . '.advanced-slider .sp-buttons .sp-button',
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
					'{{WRAPPER}} ' . '.advanced-slider .sp-buttons .sp-button:hover' => 'background-color: {{VALUE}}',
				),
			)
		);
		$this->add_responsive_control(
			'tabs_dots_box_size_hover',
			array(
				'label'      => esc_html__( 'Size', 'advanced-elements' ),
				'type'       => Controls_Manager::SLIDER,
				'size_units' => array( 'px' ),
				'range'      => array(
					'px'       => array(
						'min'    => 5,
						'max'    => 100,
					),
				),
				'selectors'  => array(
					'{{WRAPPER}} ' . '.advanced-slider .sp-buttons .sp-button:hover' => 'width: {{SIZE}}{{UNIT}}; height: {{SIZE}}{{UNIT}};',
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
					'{{WRAPPER}} ' . '.advanced-slider .sp-buttons .sp-button:hover' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
				'selector'    => '{{WRAPPER}} ' . '.advanced-slider .sp-buttons .sp-button:hover',
			)
		);
		$this->add_responsive_control(
			'tabs_dots_border_radius_hover',
			array(
				'label'      => esc_html__( 'Border Radius', 'advanced-elements' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => array( 'px', '%', 'em' ),
				'selectors'  => array(
					'{{WRAPPER}} ' . '.advanced-slider .sp-buttons .sp-button:hover' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				),
			)
		);
		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			array(
				'name'     => 'tabs_dots_box_shadow_hover',
				'selector' => '{{WRAPPER}} ' . '.advanced-slider .sp-buttons .sp-button:hover',
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
					'{{WRAPPER}} ' . '.advanced-slider .sp-buttons .sp-button.sp-selected-button' => 'background-color: {{VALUE}}',
				),
			)
		);
		$this->add_responsive_control(
			'tabs_dots_box_size_active',
			array(
				'label'      => esc_html__( 'Size', 'advanced-elements' ),
				'type'       => Controls_Manager::SLIDER,
				'size_units' => array( 'px' ),
				'range'      => array(
					'px'       => array(
						'min'    => 5,
						'max'    => 100,
					),
				),
				'selectors'  => array(
					'{{WRAPPER}} ' . '.advanced-slider .sp-buttons .sp-button.sp-selected-button' => 'width: {{SIZE}}{{UNIT}}; height: {{SIZE}}{{UNIT}};',
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
					'{{WRAPPER}} ' . '.advanced-slider .sp-buttons .sp-button.sp-selected-button' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
				'selector'    => '{{WRAPPER}} ' . '.advanced-slider .sp-buttons .sp-button.sp-selected-button',
			)
		);
		$this->add_responsive_control(
			'tabs_dots_border_radius_active',
			array(
				'label'      => esc_html__( 'Border Radius', 'advanced-elements' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => array( 'px', '%', 'em' ),
				'selectors'  => array(
					'{{WRAPPER}} ' . '.advanced-slider .sp-buttons .sp-button.sp-selected-button' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				),
			)
		);
		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			array(
				'name'     => 'tabs_dots_box_shadow_active',
				'selector' => '{{WRAPPER}} ' . '.advanced-slider .sp-buttons .sp-button.sp-selected-button',
			)
		);
		$this->end_controls_tab();
		$this->end_controls_tabs();
		$this->add_responsive_control(
			'tabs_dots_alignment',
			array(
				'label'   => esc_html__( 'Alignment', 'advanced-elements' ),
				'type'    => Controls_Manager::CHOOSE,
				'default' => 'center',
				'options' => array(
					'left'    => array(
						'title' => esc_html__( 'Left', 'advanced-elements' ),
						'icon'  => 'fa fa-align-left',
					),
					'center' => array(
						'title' => esc_html__( 'Center', 'advanced-elements' ),
						'icon'  => 'fa fa-align-center',
					),
					'right' => array(
						'title' => esc_html__( 'Right', 'advanced-elements' ),
						'icon'  => 'fa fa-align-right',
					),
				),
				'selectors'  => array(
					'{{WRAPPER}} ' . '.advanced-slider .sp-buttons' => 'text-align: {{VALUE}};',
				),
				'separator' => 'before',
			)
		);
		$this->end_controls_section();

		$this->start_controls_section(
			'slider_arrows_style',
			array(
				'label'      => esc_html__( 'Arrows', 'advanced-elements' ),
				'tab'        => Controls_Manager::TAB_STYLE,
				'show_label' => false,
			)
		);
		$this->add_control(
			'arrows_icon',
			array(
				'label'     => esc_html__( 'Icon', 'advanced-elements' ),
				'type'      => Controls_Manager::ICON,
				'file'      => '',
				'default'   => 'fa fa-angle-left',
				'separator' => 'after',
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
					'{{WRAPPER}} ' . '.advanced-slider .sp-arrows .sp-arrow i' => 'color: {{VALUE}}',
				),
			)
		);
		$this->add_control(
			'tabs_arrows_bg_color',
			array(
				'label'     => esc_html__( 'Background Color', 'advanced-elements' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => array(
					'{{WRAPPER}} ' . '.advanced-slider .sp-arrows .sp-arrow i' => 'background-color: {{VALUE}}',
				),
			)
		);
		$this->add_responsive_control(
			'tabs_arrows_size',
			array(
				'label'      => esc_html__( 'Arrows Size', 'advanced-elements' ),
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
					'{{WRAPPER}} ' . '.advanced-slider .sp-arrows .sp-arrow i' => 'font-size: {{SIZE}}{{UNIT}};',
				),
			)
		);
		$this->add_responsive_control(
			'tabs_arrows_box_size',
			array(
				'label'      => esc_html__( 'Arrows Box Size', 'advanced-elements' ),
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
					'{{WRAPPER}} ' . '.advanced-slider .sp-arrows .sp-arrow i' => 'width: {{SIZE}}{{UNIT}}; height: {{SIZE}}{{UNIT}};',
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
				'selector'    => '{{WRAPPER}} ' . '.advanced-slider .sp-arrows .sp-arrow i',
			)
		);
		$this->add_responsive_control(
			'tabs_arrows_border_radius',
			array(
				'label'      => esc_html__( 'Border Radius', 'advanced-elements' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => array( 'px', '%', 'em' ),
				'selectors'  => array(
					'{{WRAPPER}} ' . '.advanced-slider .sp-arrows .sp-arrow i' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				),
			)
		);
		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			array(
				'name'     => 'tabs_arrows_box_shadow',
				'selector' => '{{WRAPPER}} ' . '.advanced-slider .sp-arrows .sp-arrow i',
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
					'{{WRAPPER}} ' . '.advanced-slider .sp-arrows .sp-arrow i:hover' => 'color: {{VALUE}}',
				),
			)
		);
		$this->add_control(
			'tabs_arrows_bg_color_hover',
			array(
				'label'     => esc_html__( 'Background Color', 'advanced-elements' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => array(
					'{{WRAPPER}} ' . '.advanced-slider .sp-arrows .sp-arrow i:hover' => 'background-color: {{VALUE}}',
				),
			)
		);
		$this->add_responsive_control(
			'tabs_arrows_size_hover',
			array(
				'label'      => esc_html__( 'Arrows Size', 'advanced-elements' ),
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
					'{{WRAPPER}} ' . '.advanced-slider .sp-arrows .sp-arrow i:hover' => 'font-size: {{SIZE}}{{UNIT}};',
				),
			)
		);
		$this->add_responsive_control(
			'tabs_arrows_box_size_hover',
			array(
				'label'      => esc_html__( 'Arrows Box Size', 'advanced-elements' ),
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
					'{{WRAPPER}} ' . '.advanced-slider .sp-arrows .sp-arrow i:hover' => 'width: {{SIZE}}{{UNIT}}; height: {{SIZE}}{{UNIT}};',
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
				'selector'    => '{{WRAPPER}} ' . '.advanced-slider .sp-arrows .sp-arrow i:hover',
			)
		);
		$this->add_responsive_control(
			'tabs_arrows_border_radius_hover',
			array(
				'label'      => esc_html__( 'Border Radius', 'advanced-elements' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => array( 'px', '%', 'em' ),
				'selectors'  => array(
					'{{WRAPPER}} ' . '.advanced-slider .sp-arrows .sp-arrow i:hover' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				),
			)
		);
		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			array(
				'name'     => 'tabs_arrows_box_shadow_hover',
				'selector' => '{{WRAPPER}} ' . '.advanced-slider .sp-arrows .sp-arrow i:hover',
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
					'{{WRAPPER}} ' . '.advanced-slider .sp-arrows .sp-previous-arrow' => 'top: {{SIZE}}{{UNIT}}; bottom: auto;',
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
					'{{WRAPPER}} ' . '.advanced-slider .sp-arrows .sp-previous-arrow' => 'bottom: {{SIZE}}{{UNIT}}; top: auto;',
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
					'{{WRAPPER}} ' . '.advanced-slider .sp-arrows .sp-previous-arrow' => 'left: {{SIZE}}{{UNIT}}; right: auto;',
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
					'{{WRAPPER}} ' . '.advanced-slider .sp-arrows .sp-previous-arrow' => 'right: {{SIZE}}{{UNIT}}; left: auto;',
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
					'{{WRAPPER}} ' . '.advanced-slider .sp-arrows .sp-next-arrow' => 'top: {{SIZE}}{{UNIT}}; bottom: auto;',
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
					'{{WRAPPER}} ' . '.advanced-slider .sp-arrows .sp-next-arrow' => 'bottom: {{SIZE}}{{UNIT}}; top: auto;',
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
					'{{WRAPPER}} ' . '.advanced-slider .sp-arrows .sp-next-arrow' => 'left: {{SIZE}}{{UNIT}}; right: auto;',
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
					'{{WRAPPER}} ' . '.advanced-slider .sp-arrows .sp-next-arrow' => 'right: {{SIZE}}{{UNIT}}; left: auto;',
				),
			)
		);
		$this->end_controls_section();

		$this->start_controls_section(
			'slider_fullscreen_style',
			array(
				'label'      => esc_html__( 'Fullscreen Button', 'advanced-elements' ),
				'tab'        => Controls_Manager::TAB_STYLE,
				'show_label' => false,
			)
		);
		$this->add_control(
			'fullscreen_icon',
			array(
				'label'     => esc_html__( 'Icon', 'advanced-elements' ),
				'type'      => Controls_Manager::ICON,
				'file'      => '',
				'default'   => 'fa fa-arrows-alt',
				'separator' => 'after',
			)
		);
		$this->start_controls_tabs( 'tabs_fullscreen_icons' );
		$this->start_controls_tab(
			'tabs_fullscreen_icon',
			array(
				'label' => esc_html__( 'Normal', 'advanced-elements' ),
			)
		);
		$this->add_control(
			'fullscreen_color',
			array(
				'label'     => esc_html__( 'Color', 'advanced-elements' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => array(
					'{{WRAPPER}} ' . '.advanced-slider .sp-full-screen-button i' => 'color: {{VALUE}}',
				),
			)
		);
		$this->add_control(
			'fullscreen_bg_color',
			array(
				'label'     => esc_html__( 'Background Color', 'advanced-elements' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => array(
					'{{WRAPPER}} ' . '.advanced-slider .sp-full-screen-button i' => 'background-color: {{VALUE}}',
				),
			)
		);
		$this->add_group_control(
			Group_Control_Border::get_type(),
			array(
				'name'        => 'fullscreen_border',
				'label'       => esc_html__( 'Border', 'advanced-elements' ),
				'placeholder' => '1px',
				'default'     => '',
				'selector'    => '{{WRAPPER}} ' . '.advanced-slider .sp-full-screen-button i',
			)
		);
		$this->add_responsive_control(
			'fullscreen_border_radius',
			array(
				'label'      => esc_html__( 'Border Radius', 'advanced-elements' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => array( 'px', '%', 'em' ),
				'selectors'  => array(
					'{{WRAPPER}} ' . '.advanced-slider .sp-full-screen-button i' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				),
			)
		);
		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			array(
				'name'      => 'fullscreen_box_shadow',
				'selector'  => '{{WRAPPER}} ' . '.advanced-slider .sp-full-screen-button i',
				'separator' => 'after',
			)
		);
		$this->add_responsive_control(
			'fullscreen_padding',
			array(
				'label'       => esc_html__( 'Padding', 'advanced-elements' ),
				'type'        => Controls_Manager::DIMENSIONS,
				'size_units'  => array( 'px', '%', 'em' ),
				'selectors'   => array(
					'{{WRAPPER}} ' . '.advanced-slider .sp-full-screen-button i' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				),
			)
		);
		$this->add_responsive_control(
			'fullscreen_margin',
			array(
				'label'       => esc_html__( 'Margin', 'advanced-elements' ),
				'type'        => Controls_Manager::DIMENSIONS,
				'size_units'  => array( 'px', '%', 'em' ),
				'selectors'   => array(
					'{{WRAPPER}} ' . '.advanced-slider .sp-full-screen-button i' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				),
			)
		);
		$this->end_controls_tab();
		$this->start_controls_tab(
			'tabs_fullscreen_icon_hover',
			array(
				'label' => esc_html__( 'Hover', 'advanced-elements' ),
			)
		);
		$this->add_control(
			'fullscreen_color_hover',
			array(
				'label'     => esc_html__( 'Color', 'advanced-elements' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => array(
					'{{WRAPPER}} ' . '.advanced-slider .sp-full-screen-button i:hover' => 'color: {{VALUE}}',
				),
			)
		);
		$this->add_control(
			'fullscreen_bg_color_hover',
			array(
				'label'     => esc_html__( 'Background Color', 'advanced-elements' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => array(
					'{{WRAPPER}} ' . '.advanced-slider .sp-full-screen-button i:hover' => 'background-color: {{VALUE}}',
				),
			)
		);
		$this->add_group_control(
			Group_Control_Border::get_type(),
			array(
				'name'        => 'fullscreen_border_hover',
				'label'       => esc_html__( 'Border', 'advanced-elements' ),
				'placeholder' => '1px',
				'default'     => '',
				'selector'    => '{{WRAPPER}} ' . '.advanced-slider .sp-full-screen-button i:hover',
			)
		);
		$this->add_responsive_control(
			'fullscreen_border_radius_hover',
			array(
				'label'      => esc_html__( 'Border Radius', 'advanced-elements' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => array( 'px', '%', 'em' ),
				'selectors'  => array(
					'{{WRAPPER}} ' . '.advanced-slider .sp-full-screen-button i:hover' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				),
			)
		);
		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			array(
				'name'      => 'fullscreen_box_shadow_hover',
				'selector'  => '{{WRAPPER}} ' . '.advanced-slider .sp-full-screen-button i:hover',
				'separator' => 'after',
			)
		);
		$this->add_responsive_control(
			'fullscreen_padding_hover',
			array(
				'label'       => esc_html__( 'Padding', 'advanced-elements' ),
				'type'        => Controls_Manager::DIMENSIONS,
				'size_units'  => array( 'px', '%', 'em' ),
				'selectors'   => array(
					'{{WRAPPER}} ' . '.advanced-slider .sp-full-screen-button i:hover' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				),
			)
		);
		$this->add_responsive_control(
			'fullscreen_margin_hover',
			array(
				'label'       => esc_html__( 'Margin', 'advanced-elements' ),
				'type'        => Controls_Manager::DIMENSIONS,
				'size_units'  => array( 'px', '%', 'em' ),
				'selectors'   => array(
					'{{WRAPPER}} ' . '.advanced-slider .sp-full-screen-button i:hover' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				),
			)
		);
		$this->end_controls_tab();
		$this->end_controls_tabs();
		$this->end_controls_section();

		$this->start_controls_section(
			'section_thumbnails_style',
			array(
				'label'      => esc_html__( 'Thumbnails', 'advanced-elements' ),
				'tab'        => Controls_Manager::TAB_STYLE,
				'show_label' => false,
			)
		);
		$this->add_responsive_control(
			'thumbnail_item_margin',
			array(
				'label'      => esc_html__( 'Margin', 'advanced-elements' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => array( 'px', '%' ),
				'selectors'  => array(
					'{{WRAPPER}} ' . '.advanced-slider .sp-thumbnail-container' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				),
				'separator'   => 'before',
				'render_type' => 'template',
			)
		);
		$this->start_controls_tabs( 'tabs_thumbnails_style' );
		$this->start_controls_tab(
			'tab_thumbnails_normal',
			array(
				'label' => esc_html__( 'Normal', 'advanced-elements' ),
			)
		);
		$this->add_group_control(
			Group_Control_Background::get_type(),
			array(
				'name'     => 'thumbnails_normal_background',
				'selector' => '{{WRAPPER}} ' . '.advanced-slider .sp-thumbnail-container' . ':before',
			)
		);
		$this->add_group_control(
			Group_Control_Border::get_type(),
			array(
				'name'        => 'thumbnails_normal_border',
				'label'       => esc_html__( 'Border', 'advanced-elements' ),
				'placeholder' => '1px',
				'default'     => '1px',
				'selector'  => '{{WRAPPER}} ' . '.advanced-slider .sp-thumbnail-container' . ':before',
				'fields_options' => array(
					'border' => array(
						'default' => 'solid',
					),
					'width' => array(
						'default' => array(
							'top'      => '2',
							'right'    => '2',
							'bottom'   => '2',
							'left'     => '2',
						),
					),
				),
			)
		);
		$this->end_controls_tab();
		$this->start_controls_tab(
			'tab_thumbnails_hover',
			array(
				'label' => esc_html__( 'Hover', 'advanced-elements' ),
			)
		);
		$this->add_group_control(
			Group_Control_Background::get_type(),
			array(
				'name'     => 'thumbnails_hover_background',
				'selector' => '{{WRAPPER}} ' . '.advanced-slider .sp-thumbnail-container' . ':hover:before',
			)
		);
		$this->add_group_control(
			Group_Control_Border::get_type(),
			array(
				'name'        => 'thumbnails_hover_border',
				'label'       => esc_html__( 'Border', 'advanced-elements' ),
				'placeholder' => '2px',
				'default'     => '2px',
				'selector'  => '{{WRAPPER}} ' . '.advanced-slider .sp-thumbnail-container' . ':hover:before',
				'fields_options' => array(
					'border' => array(
						'default' => 'solid',
					),
					'width' => array(
						'default' => array(
							'top'      => '2',
							'right'    => '2',
							'bottom'   => '2',
							'left'     => '2',
						),
					),
					'color' => array(
						'scheme' => array(
							'type'  => Scheme_Color::get_type(),
							'value' => Scheme_Color::COLOR_4,
						),
					),
				),
			)
		);
		$this->end_controls_tab();
		$this->start_controls_tab(
			'tab_thumbnails_active',
			array(
				'label' => esc_html__( 'Active', 'advanced-elements' ),
			)
		);
		$this->add_group_control(
			Group_Control_Background::get_type(),
			array(
				'name'     => 'thumbnails_active_background',
				'selector' => '{{WRAPPER}} ' . '.advanced-slider .sp-thumbnail-container' . '.sp-selected-thumbnail:before',
			)
		);
		$this->add_group_control(
			Group_Control_Border::get_type(),
			array(
				'name'        => 'thumbnails_active_border',
				'label'       => esc_html__( 'Border', 'advanced-elements' ),
				'placeholder' => '2px',
				'default'     => '2px',
				'selector'  => '{{WRAPPER}} ' . '.advanced-slider .sp-thumbnail-container' . '.sp-selected-thumbnail:before',
				'fields_options' => array(
					'border' => array(
						'default' => 'solid',
					),
					'width' => array(
						'default' => array(
							'top'      => '2',
							'right'    => '2',
							'bottom'   => '2',
							'left'     => '2',
						),
					),
					'color' => array(
						'scheme' => array(
							'type'  => Scheme_Color::get_type(),
							'value' => Scheme_Color::COLOR_4,
						),
					),
				),
			)
		);
		$this->end_controls_tab();

		$this->end_controls_tabs();

		$this->end_controls_section();

		$this->start_controls_section(
			'title_style',
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
				'selectors' => array(
					'{{WRAPPER}} ' . '.advanced-slider .advanced-slider-title h4' => 'color: {{VALUE}}',
				),
			)
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			array(
				'name'     => 'title_typography',
				'scheme'   => Scheme_Typography::TYPOGRAPHY_3,
				'selector' => '{{WRAPPER}} ' . '.advanced-slider .advanced-slider-title h4',
			)
		);
		$this->add_group_control(
			Group_Control_Background::get_type(),
			array(
				'name'     => 'title_background',
				'selector' => '{{WRAPPER}} ' . '.advanced-slider .advanced-slider-title h4',
			)
		);
		$this->add_responsive_control(
			'title_box_width',
			array(
				'label'      => esc_html__( 'Title Max Width', 'advanced-elements' ),
				'type'       => Controls_Manager::SLIDER,
				'size_units' => array( 'px', '%' ),
				'range'      => array(
					'px'       => array(
						'min'    => 250,
						'max'    => 2560,
					),
					'%'        => array(
						'min'    => 1,
						'max'    => 100,
					),
				),
				'selectors'  => array(
					'{{WRAPPER}} ' . '.advanced-slider .advanced-slider-title h4' => 'max-width: {{SIZE}}{{UNIT}};',
				),
			)
		);
		$this->add_group_control(
			Group_Control_Border::get_type(),
			array(
				'name'        => 'title_border',
				'label'       => esc_html__( 'Border', 'advanced-elements' ),
				'placeholder' => '1px',
				'default'     => '',
				'selector'    => '{{WRAPPER}} ' . '.advanced-slider .advanced-slider-title h4',
			)
		);
		$this->add_responsive_control(
			'title_border_radius',
			array(
				'label'      => esc_html__( 'Border Radius', 'advanced-elements' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => array( 'px', '%', 'em' ),
				'selectors'  => array(
					'{{WRAPPER}} ' . '.advanced-slider .advanced-slider-title h4' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				),
			)
		);
		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			array(
				'name'     => 'title_box_shadow',
				'selector' => '{{WRAPPER}} ' . '.advanced-slider .advanced-slider-title h4',
			)
		);
		$this->add_responsive_control(
			'title_padding',
			array(
				'label'      => esc_html__( 'Padding', 'advanced-elements' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => array( 'px', '%', 'em' ),
				'selectors'  => array(
					'{{WRAPPER}} ' . '.advanced-slider .advanced-slider-title h4' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
					'{{WRAPPER}} ' . '.advanced-slider .advanced-slider-title h4' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				),
			)
		);
		$this->add_responsive_control(
			'title_alignment',
			array(
				'label'   => esc_html__( 'Title Alignment', 'advanced-elements' ),
				'type'    => Controls_Manager::CHOOSE,
				'default' => 'center',
				'options' => array(
					'left'    => array(
						'title' => esc_html__( 'Left', 'advanced-elements' ),
						'icon'  => 'fa fa-align-left',
					),
					'center' => array(
						'title' => esc_html__( 'Center', 'advanced-elements' ),
						'icon'  => 'fa fa-align-center',
					),
					'right' => array(
						'title' => esc_html__( 'Right', 'advanced-elements' ),
						'icon'  => 'fa fa-align-right',
					),
				),
				'selectors'  => array(
					'{{WRAPPER}} ' . '.advanced-slider .advanced-slider-title h4' => 'text-align: {{VALUE}};',
				),
			)
		);
		$this->add_responsive_control(
			'title_box_alignment',
			array(
				'label'   => esc_html__( 'Title Box Alignment', 'advanced-elements' ),
				'type'    => Controls_Manager::CHOOSE,
				'default' => 'center',
				'options' => array(
					'margin-right: auto' => array(
						'title' => esc_html__( 'Left', 'advanced-elements' ),
						'icon'  => 'fa fa-align-left',
					),
					'margin: auto' => array(
						'title' => esc_html__( 'Center', 'advanced-elements' ),
						'icon'  => 'fa fa-align-center',
					),
					'margin-left: auto' => array(
						'title' => esc_html__( 'Right', 'advanced-elements' ),
						'icon'  => 'fa fa-align-right',
					),
				),
				'selectors'  => array(
					'{{WRAPPER}} ' . '.advanced-slider .advanced-slider-title h4' => '{{VALUE}};',
				),
			)
		);
		$this->end_controls_section();

		$this->start_controls_section(
			'subtitle_style',
			array(
				'label'      => esc_html__( 'Sub Title', 'advanced-elements' ),
				'tab'        => Controls_Manager::TAB_STYLE,
				'show_label' => false,
			)
		);
		$this->add_control(
			'subtitle_color',
			array(
				'label'     => esc_html__( 'Color', 'advanced-elements' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => array(
					'{{WRAPPER}} ' . '.advanced-slider .advanced-slider-subtitle h6' => 'color: {{VALUE}}',
				),
			)
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			array(
				'name'     => 'subtitle_typography',
				'scheme'   => Scheme_Typography::TYPOGRAPHY_3,
				'selector' => '{{WRAPPER}} ' . '.advanced-slider .advanced-slider-subtitle h6',
			)
		);
		$this->add_group_control(
			Group_Control_Background::get_type(),
			array(
				'name'     => 'subtitle_background',
				'selector' => '{{WRAPPER}} ' . '.advanced-slider .advanced-slider-subtitle h6',
			)
		);
		$this->add_responsive_control(
			'subtitle_box_width',
			array(
				'label'      => esc_html__( 'Title Max Width', 'advanced-elements' ),
				'type'       => Controls_Manager::SLIDER,
				'size_units' => array( 'px', '%' ),
				'range'      => array(
					'px'       => array(
						'min'    => 250,
						'max'    => 2560,
					),
					'%'        => array(
						'min'    => 1,
						'max'    => 100,
					),
				),
				'selectors'  => array(
					'{{WRAPPER}} ' . '.advanced-slider .advanced-slider-subtitle h6' => 'max-width: {{SIZE}}{{UNIT}};',
				),
			)
		);
		$this->add_group_control(
			Group_Control_Border::get_type(),
			array(
				'name'        => 'subtitle_border',
				'label'       => esc_html__( 'Border', 'advanced-elements' ),
				'placeholder' => '1px',
				'default'     => '',
				'selector'    => '{{WRAPPER}} ' . '.advanced-slider .advanced-slider-subtitle h6',
			)
		);
		$this->add_responsive_control(
			'subtitle_border_radius',
			array(
				'label'      => esc_html__( 'Border Radius', 'advanced-elements' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => array( 'px', '%', 'em' ),
				'selectors'  => array(
					'{{WRAPPER}} ' . '.advanced-slider .advanced-slider-subtitle h6' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				),
			)
		);
		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			array(
				'name'     => 'subtitle_box_shadow',
				'selector' => '{{WRAPPER}} ' . '.advanced-slider .advanced-slider-subtitle h6',
			)
		);
		$this->add_responsive_control(
			'subtitle_padding',
			array(
				'label'      => esc_html__( 'Padding', 'advanced-elements' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => array( 'px', '%', 'em' ),
				'selectors'  => array(
					'{{WRAPPER}} ' . '.advanced-slider .advanced-slider-subtitle h6' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				),
			)
		);
		$this->add_responsive_control(
			'subtitle_margin',
			array(
				'label'      => esc_html__( 'Margin', 'advanced-elements' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => array( 'px', '%', 'em' ),
				'selectors'  => array(
					'{{WRAPPER}} ' . '.advanced-slider .advanced-slider-subtitle h6' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				),
			)
		);
		$this->add_responsive_control(
			'subtitle_alignment',
			array(
				'label'   => esc_html__( 'Title Alignment', 'advanced-elements' ),
				'type'    => Controls_Manager::CHOOSE,
				'default' => 'center',
				'options' => array(
					'left'    => array(
						'title' => esc_html__( 'Left', 'advanced-elements' ),
						'icon'  => 'fa fa-align-left',
					),
					'center' => array(
						'title' => esc_html__( 'Center', 'advanced-elements' ),
						'icon'  => 'fa fa-align-center',
					),
					'right' => array(
						'title' => esc_html__( 'Right', 'advanced-elements' ),
						'icon'  => 'fa fa-align-right',
					),
				),
				'selectors'  => array(
					'{{WRAPPER}} ' . '.advanced-slider .advanced-slider-subtitle h6' => 'text-align: {{VALUE}};',
				),
			)
		);
		$this->add_responsive_control(
			'subtitle_box_alignment',
			array(
				'label'   => esc_html__( 'Title Box Alignment', 'advanced-elements' ),
				'type'    => Controls_Manager::CHOOSE,
				'default' => 'center',
				'options' => array(
					'margin-right: auto' => array(
						'title' => esc_html__( 'Left', 'advanced-elements' ),
						'icon'  => 'fa fa-align-left',
					),
					'margin: auto' => array(
						'title' => esc_html__( 'Center', 'advanced-elements' ),
						'icon'  => 'fa fa-align-center',
					),
					'margin-left: auto' => array(
						'title' => esc_html__( 'Right', 'advanced-elements' ),
						'icon'  => 'fa fa-align-right',
					),
				),
				'selectors'  => array(
					'{{WRAPPER}} ' . '.advanced-slider .advanced-slider-subtitle h6' => '{{VALUE}};',
				),
			)
		);
		$this->end_controls_section();

		$this->start_controls_section(
			'descr_style',
			array(
				'label'      => esc_html__( 'Description', 'advanced-elements' ),
				'tab'        => Controls_Manager::TAB_STYLE,
				'show_label' => false,
			)
		);
		$this->add_control(
			'descr_color',
			array(
				'label'     => esc_html__( 'Color', 'advanced-elements' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => array(
					'{{WRAPPER}} ' . '.advanced-slider .advanced-slider-descr p' => 'color: {{VALUE}}',
				),
			)
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			array(
				'name'     => 'descr_typography',
				'scheme'   => Scheme_Typography::TYPOGRAPHY_3,
				'selector' => '{{WRAPPER}} ' . '.advanced-slider .advanced-slider-descr p',
			)
		);
		$this->add_group_control(
			Group_Control_Background::get_type(),
			array(
				'name'     => 'descr_background',
				'selector' => '{{WRAPPER}} ' . '.advanced-slider .advanced-slider-descr p',
			)
		);
		$this->add_responsive_control(
			'descr_box_width',
			array(
				'label'      => esc_html__( 'Title Max Width', 'advanced-elements' ),
				'type'       => Controls_Manager::SLIDER,
				'size_units' => array( 'px', '%' ),
				'range'      => array(
					'px'       => array(
						'min'    => 250,
						'max'    => 2560,
					),
					'%'        => array(
						'min'    => 1,
						'max'    => 100,
					),
				),
				'selectors'  => array(
					'{{WRAPPER}} ' . '.advanced-slider .advanced-slider-descr p' => 'max-width: {{SIZE}}{{UNIT}};',
				),
			)
		);
		$this->add_group_control(
			Group_Control_Border::get_type(),
			array(
				'name'        => 'descr_border',
				'label'       => esc_html__( 'Border', 'advanced-elements' ),
				'placeholder' => '1px',
				'default'     => '',
				'selector'    => '{{WRAPPER}} ' . '.advanced-slider .advanced-slider-descr p',
			)
		);
		$this->add_responsive_control(
			'descr_border_radius',
			array(
				'label'      => esc_html__( 'Border Radius', 'advanced-elements' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => array( 'px', '%', 'em' ),
				'selectors'  => array(
					'{{WRAPPER}} ' . '.advanced-slider .advanced-slider-descr p' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				),
			)
		);
		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			array(
				'name'     => 'descr_box_shadow',
				'selector' => '{{WRAPPER}} ' . '.advanced-slider .advanced-slider-descr p',
			)
		);
		$this->add_responsive_control(
			'descr_padding',
			array(
				'label'      => esc_html__( 'Padding', 'advanced-elements' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => array( 'px', '%', 'em' ),
				'selectors'  => array(
					'{{WRAPPER}} ' . '.advanced-slider .advanced-slider-descr p' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				),
			)
		);
		$this->add_responsive_control(
			'descr_margin',
			array(
				'label'      => esc_html__( 'Margin', 'advanced-elements' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => array( 'px', '%', 'em' ),
				'selectors'  => array(
					'{{WRAPPER}} ' . '.advanced-slider .advanced-slider-descr p' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				),
			)
		);
		$this->add_responsive_control(
			'descr_alignment',
			array(
				'label'   => esc_html__( 'Title Alignment', 'advanced-elements' ),
				'type'    => Controls_Manager::CHOOSE,
				'default' => 'center',
				'options' => array(
					'left'    => array(
						'title' => esc_html__( 'Left', 'advanced-elements' ),
						'icon'  => 'fa fa-align-left',
					),
					'center' => array(
						'title' => esc_html__( 'Center', 'advanced-elements' ),
						'icon'  => 'fa fa-align-center',
					),
					'right' => array(
						'title' => esc_html__( 'Right', 'advanced-elements' ),
						'icon'  => 'fa fa-align-right',
					),
				),
				'selectors'  => array(
					'{{WRAPPER}} ' . '.advanced-slider .advanced-slider-descr p' => 'text-align: {{VALUE}};',
				),
			)
		);
		$this->add_responsive_control(
			'descr_box_alignment',
			array(
				'label'   => esc_html__( 'Title Box Alignment', 'advanced-elements' ),
				'type'    => Controls_Manager::CHOOSE,
				'default' => 'center',
				'options' => array(
					'margin-right: auto' => array(
						'title' => esc_html__( 'Left', 'advanced-elements' ),
						'icon'  => 'fa fa-align-left',
					),
					'margin: auto' => array(
						'title' => esc_html__( 'Center', 'advanced-elements' ),
						'icon'  => 'fa fa-align-center',
					),
					'margin-left: auto' => array(
						'title' => esc_html__( 'Right', 'advanced-elements' ),
						'icon'  => 'fa fa-align-right',
					),
				),
				'selectors'  => array(
					'{{WRAPPER}} ' . '.advanced-slider .advanced-slider-descr p' => '{{VALUE}};',
				),
			)
		);
		$this->end_controls_section();

		$this->start_controls_section(
			'buttons_style',
			array(
				'label'      => esc_html__( 'Buttons', 'advanced-elements' ),
				'tab'        => Controls_Manager::TAB_STYLE,
				'show_label' => false,
			)
		);
		$this->add_responsive_control(
			'buttons_box_width',
			array(
				'label'      => esc_html__( 'Title Max Width', 'advanced-elements' ),
				'type'       => Controls_Manager::SLIDER,
				'size_units' => array( 'px', '%' ),
				'range'      => array(
					'px'       => array(
						'min'    => 250,
						'max'    => 2560,
					),
					'%'        => array(
						'min'    => 1,
						'max'    => 100,
					),
				),
				'selectors'  => array(
					'{{WRAPPER}} ' . '.advanced-slider .advanced-slider-btn-wrap' => 'max-width: {{SIZE}}{{UNIT}};',
				),
			)
		);
		$this->add_responsive_control(
			'buttons_alignment',
			array(
				'label'   => esc_html__( 'Title Alignment', 'advanced-elements' ),
				'type'    => Controls_Manager::CHOOSE,
				'default' => 'center',
				'options' => array(
					'left'    => array(
						'title' => esc_html__( 'Left', 'advanced-elements' ),
						'icon'  => 'fa fa-align-left',
					),
					'center' => array(
						'title' => esc_html__( 'Center', 'advanced-elements' ),
						'icon'  => 'fa fa-align-center',
					),
					'right' => array(
						'title' => esc_html__( 'Right', 'advanced-elements' ),
						'icon'  => 'fa fa-align-right',
					),
				),
				'selectors'  => array(
					'{{WRAPPER}} ' . '.advanced-slider .advanced-slider-btn-wrap' => 'text-align: {{VALUE}};',
				),
			)
		);
		$this->add_responsive_control(
			'buttons_box_alignment',
			array(
				'label'   => esc_html__( 'Title Box Alignment', 'advanced-elements' ),
				'type'    => Controls_Manager::CHOOSE,
				'default' => 'center',
				'options' => array(
					'margin-right: auto' => array(
						'title' => esc_html__( 'Left', 'advanced-elements' ),
						'icon'  => 'fa fa-align-left',
					),
					'margin: auto' => array(
						'title' => esc_html__( 'Center', 'advanced-elements' ),
						'icon'  => 'fa fa-align-center',
					),
					'margin-left: auto' => array(
						'title' => esc_html__( 'Right', 'advanced-elements' ),
						'icon'  => 'fa fa-align-right',
					),
				),
				'selectors'  => array(
					'{{WRAPPER}} ' . '.advanced-slider .advanced-slider-btn-wrap' => '{{VALUE}};',
				),
			)
		);
		$this->add_control(
			'tab_button_1',
			array(
				'label'     => esc_html__( 'Button #1', 'advanced-elements' ),
				'type'      => Controls_Manager::HEADING,
				'separator' => 'before',
			)
		);
		$this->start_controls_tabs( 'tabs_button_1_style' );
		$this->start_controls_tab(
			'tab_button_1_normal',
			array(
				'label' => esc_html__( 'Normal', 'advanced-elements' ),
			)
		);
		$this->add_control(
			'button_1_text_color',
			array(
				'label'     => esc_html__( 'Text Color', 'advanced-elements' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => array(
					'{{WRAPPER}} ' . '.advanced-slider .advanced-slider-btn-wrap .advanced-btn-1' => 'color: {{VALUE}}',
				),
			)
		);
		$this->add_control(
			'button_1_bg_color',
			array(
				'label' => esc_html__( 'Background Color', 'advanced-elements' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => array(
					'type'  => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_4,
				),
				'selectors' => array(
					'{{WRAPPER}} ' . '.advanced-slider .advanced-slider-btn-wrap .advanced-btn-1' => 'background-color: {{VALUE}}',
				),
			)
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			array(
				'name'     => 'button_1_typography',
				'scheme'   => Scheme_Typography::TYPOGRAPHY_4,
				'selector' => '{{WRAPPER}} ' . '.advanced-slider .advanced-slider-btn-wrap .advanced-btn-1',
			)
		);
		$this->add_responsive_control(
			'button_1_padding',
			array(
				'label'      => esc_html__( 'Padding', 'advanced-elements' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => array( 'px', '%', 'em' ),
				'selectors'  => array(
					'{{WRAPPER}} ' . '.advanced-slider .advanced-slider-btn-wrap .advanced-btn-1' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				),
			)
		);
		$this->add_responsive_control(
			'button_1_margin',
			array(
				'label'      => esc_html__( 'Margin', 'advanced-elements' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => array( 'px', '%', 'em' ),
				'selectors'  => array(
					'{{WRAPPER}} ' . '.advanced-slider .advanced-slider-btn-wrap .advanced-btn-1' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				),
			)
		);
		$this->add_group_control(
			Group_Control_Border::get_type(),
			array(
				'name'        => 'button_1_border',
				'label'       => esc_html__( 'Border', 'advanced-elements' ),
				'placeholder' => '1px',
				'default'     => '',
				'selector'    => '{{WRAPPER}} ' . '.advanced-slider .advanced-slider-btn-wrap .advanced-btn-1',
			)
		);
		$this->add_responsive_control(
			'button_1_border_radius',
			array(
				'label'      => esc_html__( 'Border Radius', 'advanced-elements' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => array( 'px', '%', 'em' ),
				'selectors'  => array(
					'{{WRAPPER}} ' . '.advanced-slider .advanced-slider-btn-wrap .advanced-btn-1' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				),
			)
		);
		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			array(
				'name'      => 'button_1_box_shadow',
				'selector'  => '{{WRAPPER}} ' . '.advanced-slider .advanced-slider-btn-wrap .advanced-btn-1',
			)
		);
		$this->end_controls_tab();

		$this->start_controls_tab(
			'tab_button_1_hover',
			array(
				'label' => esc_html__( 'Hover', 'advanced-elements' ),
			)
		);
		$this->add_control(
			'button_1_text_color_hover',
			array(
				'label'     => esc_html__( 'Text Color', 'advanced-elements' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => array(
					'{{WRAPPER}} ' . '.advanced-slider .advanced-slider-btn-wrap .advanced-btn-1:hover' => 'color: {{VALUE}}',
				),
			)
		);
		$this->add_control(
			'button_1_bg_color_hover',
			array(
				'label' => esc_html__( 'Background Color', 'advanced-elements' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => array(
					'type'  => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_4,
				),
				'selectors' => array(
					'{{WRAPPER}} ' . '.advanced-slider .advanced-slider-btn-wrap .advanced-btn-1:hover' => 'background-color: {{VALUE}}',
				),
			)
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			array(
				'name'     => 'button_1_typography_hover',
				'scheme'   => Scheme_Typography::TYPOGRAPHY_4,
				'selector' => '{{WRAPPER}} ' . '.advanced-slider .advanced-slider-btn-wrap .advanced-btn-1:hover',
			)
		);
		$this->add_responsive_control(
			'button_1_padding_hover',
			array(
				'label'      => esc_html__( 'Padding', 'advanced-elements' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => array( 'px', '%', 'em' ),
				'selectors'  => array(
					'{{WRAPPER}} ' . '.advanced-slider .advanced-slider-btn-wrap .advanced-btn-1:hover' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				),
			)
		);
		$this->add_responsive_control(
			'button_1_margin_hover',
			array(
				'label'      => esc_html__( 'Margin', 'advanced-elements' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => array( 'px', '%', 'em' ),
				'selectors'  => array(
					'{{WRAPPER}} ' . '.advanced-slider .advanced-slider-btn-wrap .advanced-btn-1:hover' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				),
			)
		);
		$this->add_group_control(
			Group_Control_Border::get_type(),
			array(
				'name'        => 'button_1_border_hover',
				'label'       => esc_html__( 'Border', 'advanced-elements' ),
				'placeholder' => '1px',
				'default'     => '',
				'selector'    => '{{WRAPPER}} ' . '.advanced-slider .advanced-slider-btn-wrap .advanced-btn-1:hover',
			)
		);
		$this->add_responsive_control(
			'button_1_border_radius_hover',
			array(
				'label'      => esc_html__( 'Border Radius', 'advanced-elements' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => array( 'px', '%', 'em' ),
				'selectors'  => array(
					'{{WRAPPER}} ' . '.advanced-slider .advanced-slider-btn-wrap .advanced-btn-1:hover' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				),
			)
		);
		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			array(
				'name'      => 'button_1_box_shadow_hover',
				'selector'  => '{{WRAPPER}} ' . '.advanced-slider .advanced-slider-btn-wrap .advanced-btn-1:hover',
			)
		);
		$this->end_controls_tab();
		$this->end_controls_tabs();
		$this->add_control(
			'tab_button_2',
			array(
				'label'     => esc_html__( 'Button #2', 'advanced-elements' ),
				'type'      => Controls_Manager::HEADING,
				'separator' => 'before',
			)
		);
		$this->start_controls_tabs( 'tabs_button_2_style' );
		$this->start_controls_tab(
			'tab_button_2_normal',
			array(
				'label' => esc_html__( 'Normal', 'advanced-elements' ),
			)
		);
		$this->add_control(
			'button_2_text_color',
			array(
				'label'     => esc_html__( 'Text Color', 'advanced-elements' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => array(
					'{{WRAPPER}} ' . '.advanced-slider .advanced-slider-btn-wrap .advanced-btn-2' => 'color: {{VALUE}}',
				),
			)
		);
		$this->add_control(
			'button_2_bg_color',
			array(
				'label' => esc_html__( 'Background Color', 'advanced-elements' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => array(
					'type'  => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_4,
				),
				'selectors' => array(
					'{{WRAPPER}} ' . '.advanced-slider .advanced-slider-btn-wrap .advanced-btn-2' => 'background-color: {{VALUE}}',
				),
			)
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			array(
				'name'     => 'button_2_typography',
				'scheme'   => Scheme_Typography::TYPOGRAPHY_4,
				'selector' => '{{WRAPPER}} ' . '.advanced-slider .advanced-slider-btn-wrap .advanced-btn-2',
			)
		);
		$this->add_responsive_control(
			'button_2_padding',
			array(
				'label'      => esc_html__( 'Padding', 'advanced-elements' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => array( 'px', '%', 'em' ),
				'selectors'  => array(
					'{{WRAPPER}} ' . '.advanced-slider .advanced-slider-btn-wrap .advanced-btn-2' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				),
			)
		);
		$this->add_responsive_control(
			'button_2_margin',
			array(
				'label'      => esc_html__( 'Margin', 'advanced-elements' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => array( 'px', '%', 'em' ),
				'selectors'  => array(
					'{{WRAPPER}} ' . '.advanced-slider .advanced-slider-btn-wrap .advanced-btn-2' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				),
			)
		);
		$this->add_group_control(
			Group_Control_Border::get_type(),
			array(
				'name'        => 'button_2_border',
				'label'       => esc_html__( 'Border', 'advanced-elements' ),
				'placeholder' => '1px',
				'default'     => '',
				'selector'    => '{{WRAPPER}} ' . '.advanced-slider .advanced-slider-btn-wrap .advanced-btn-2',
			)
		);
		$this->add_responsive_control(
			'button_2_border_radius',
			array(
				'label'      => esc_html__( 'Border Radius', 'advanced-elements' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => array( 'px', '%', 'em' ),
				'selectors'  => array(
					'{{WRAPPER}} ' . '.advanced-slider .advanced-slider-btn-wrap .advanced-btn-2' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				),
			)
		);
		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			array(
				'name'      => 'button_2_box_shadow',
				'selector'  => '{{WRAPPER}} ' . '.advanced-slider .advanced-slider-btn-wrap .advanced-btn-2',
			)
		);
		$this->end_controls_tab();

		$this->start_controls_tab(
			'tab_button_2_hover',
			array(
				'label' => esc_html__( 'Hover', 'advanced-elements' ),
			)
		);
		$this->add_control(
			'button_2_text_color_hover',
			array(
				'label'     => esc_html__( 'Text Color', 'advanced-elements' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => array(
					'{{WRAPPER}} ' . '.advanced-slider .advanced-slider-btn-wrap .advanced-btn-2:hover' => 'color: {{VALUE}}',
				),
			)
		);
		$this->add_control(
			'button_2_bg_color_hover',
			array(
				'label' => esc_html__( 'Background Color', 'advanced-elements' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => array(
					'type'  => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_4,
				),
				'selectors' => array(
					'{{WRAPPER}} ' . '.advanced-slider .advanced-slider-btn-wrap .advanced-btn-2:hover' => 'background-color: {{VALUE}}',
				),
			)
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			array(
				'name'     => 'button_2_typography_hover',
				'scheme'   => Scheme_Typography::TYPOGRAPHY_4,
				'selector' => '{{WRAPPER}} ' . '.advanced-slider .advanced-slider-btn-wrap .advanced-btn-2:hover',
			)
		);
		$this->add_responsive_control(
			'button_2_padding_hover',
			array(
				'label'      => esc_html__( 'Padding', 'advanced-elements' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => array( 'px', '%', 'em' ),
				'selectors'  => array(
					'{{WRAPPER}} ' . '.advanced-slider .advanced-slider-btn-wrap .advanced-btn-2:hover' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				),
			)
		);
		$this->add_responsive_control(
			'button_2_margin_hover',
			array(
				'label'      => esc_html__( 'Margin', 'advanced-elements' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => array( 'px', '%', 'em' ),
				'selectors'  => array(
					'{{WRAPPER}} ' . '.advanced-slider .advanced-slider-btn-wrap .advanced-btn-2:hover' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				),
			)
		);
		$this->add_group_control(
			Group_Control_Border::get_type(),
			array(
				'name'        => 'button_2_border_hover',
				'label'       => esc_html__( 'Border', 'advanced-elements' ),
				'placeholder' => '1px',
				'default'     => '',
				'selector'    => '{{WRAPPER}} ' . '.advanced-slider .advanced-slider-btn-wrap .advanced-btn-2:hover',
			)
		);
		$this->add_responsive_control(
			'button_2_border_radius_hover',
			array(
				'label'      => esc_html__( 'Border Radius', 'advanced-elements' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => array( 'px', '%', 'em' ),
				'selectors'  => array(
					'{{WRAPPER}} ' . '.advanced-slider .advanced-slider-btn-wrap .advanced-btn-2:hover' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				),
			)
		);
		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			array(
				'name'      => 'button_2_box_shadow_hover',
				'selector'  => '{{WRAPPER}} ' . '.advanced-slider .advanced-slider-btn-wrap .advanced-btn-2:hover',
			)
		);
		$this->end_controls_tab();
		$this->end_controls_tabs();
		$this->end_controls_section();
	}

	protected function render() {
		echo $this->generate_setting_json( $this->get_content() );
	}

	public function generate_setting_json( $content = null ) {
		$settings = $this->get_settings();

		$opts_array = array(
			'arrows_icon'            => $settings['arrows_icon'],
			'fullscreen_icon'        => $settings['fullscreen_icon'],
			'thumbnailsPosition'     => $settings['thumbnails_position'],
			'autoplayOnHover'        => $settings['slide_autoplay_on_hover'],
			'slideAnimationDuration' => absint( $settings['slider_animation_speed'] ),
			'autoplayDelay'          => absint( $settings['slider_autoplay_delay'] ),
			'thumbnailWidth'         => absint( $settings['thumbnail_width'] ),
			'thumbnailHeight'        => absint( $settings['thumbnail_height'] ),
			'height'                 => absint( $settings['slider_height']['size'] ),
			'width'                  => absint( $settings['slider_width']['size'] ) . $settings['slider_width']['unit'],
			'autoplay'               => filter_var( $settings['slider_autoplay'], FILTER_VALIDATE_BOOLEAN ),
			'fullScreen'             => filter_var( $settings['full_screen'], FILTER_VALIDATE_BOOLEAN ),
			'arrows'                 => filter_var( $settings['slider_arrows'], FILTER_VALIDATE_BOOLEAN ),
			'buttons'                => filter_var( $settings['slider_buttons'], FILTER_VALIDATE_BOOLEAN ),
			'shuffle'                => filter_var( $settings['slider_shuffle'], FILTER_VALIDATE_BOOLEAN ),
			'loop'                   => filter_var( $settings['slider_loop'], FILTER_VALIDATE_BOOLEAN ),
			'fadeArrows'             => filter_var( $settings['slider_arrows_fade'], FILTER_VALIDATE_BOOLEAN ),
			'breakpoints'            => array(
				'1024' => array( 'height' => absint( $settings['slider_height_tablet']['size'] ) ),
				'767'  => array( 'height' => absint( $settings['slider_height_mobile']['size'] ) ),
			),
		);

		return sprintf(
			'<div class="advanced-slider slider-pro" data-slider-settings="%1$s">%2$s</div>',
			htmlspecialchars( json_encode( $opts_array ) ), $content
		);
	}

	public function get_content() {
		ob_start();
		$items_list = $this->get_settings( 'items_list' );
		$delay      = $this->get_settings( 'slider_animation_speed' );
		echo '<div class="advanced-slider-inner sp-slides">';
		foreach ( $items_list as $item ) {
			echo '<div class="advanced-slider-content sp-slide">';
				echo sprintf( '<img class="sp-image" src="%1$s" alt="%2$s">', $item['item_image']['url'], $item['item_title'] );
					echo '<div class="sp-layer" data-position="centerCenter" data-width="100%" data-height="100%" data-horizontal="0%" data-show-transition="up" data-show-duration="400" data-show-delay="'.$delay.'">';
					if( $this->get_settings( 'thumbnails_position' ) === 'left' || $this->get_settings( 'thumbnails_position' ) === 'right' ) {
						$thumbnail_width = ( absint( $this->get_settings( 'thumbnail_width' ) ) / 2 ) + 8;
						echo '<div class="sp-layer-inner" style="padding:0 '.$thumbnail_width.'px;">';
					} else {
						echo '<div class="sp-layer-inner">';
					}
						if( !empty( $item['item_title'] ) ) {
							echo sprintf( '<div class="advanced-slider-title"><h4>%1$s</h4></div>', $item['item_title'] );
						}
						if( !empty( $item['item_subtitle'] ) ) {
							echo sprintf( '<div class="advanced-slider-subtitle"><h6>%1$s</h6></div>', $item['item_subtitle'] );
						}
						if( !empty( $item['item_descr'] ) ) {
							echo sprintf( '<div class="advanced-slider-descr"><p>%1$s</p></div>', $item['item_descr'] );
						}
						if( 'yes' === $item['item_btn_show'] && !empty( $item['item_btn_1'] || $item['item_btn_2'] ) ) {
							echo '<div class="advanced-slider-btn-wrap">';
								if ( !empty( $item['item_btn_url_1']['url'] ) ) {
									if( $item['item_btn_url_1']['is_external'] ) {
										$this->add_render_attribute( 'advanced_btn_attribute_1', 'target', '_blank' );
									}
									if( $item['item_btn_url_1']['nofollow'] ) {
										$this->add_render_attribute( 'advanced_btn_attribute_1', 'rel', 'nofollow' );
									}
								}
								if( !empty( $item['item_btn_1'] ) ) {
									echo sprintf( '<a class="advanced-btn-1" href="%1$s" %2$s>%3$s</a>', $item['item_btn_url_1']['url'] ? $item['item_btn_url_1']['url'] : '#', $this->get_render_attribute_string( 'advanced_btn_attribute_1' ), $item['item_btn_1'] );
								}
								if ( !empty( $item['item_btn_url_2']['url'] ) ) {
									if( $item['item_btn_url_2']['is_external'] ) {
										$this->add_render_attribute( 'advanced_btn_attribute_2', 'target', '_blank' );
									}
									if( $item['item_btn_url_2']['nofollow'] ) {
										$this->add_render_attribute( 'advanced_btn_attribute_2', 'rel', 'nofollow' );
									}
								}
								if( !empty( $item['item_btn_2'] ) ) {
									echo sprintf( '<a class="advanced-btn-2" href="%1$s" %2$s>%3$s</a>', $item['item_btn_url_2']['url'] ? $item['item_btn_url_2']['url'] : '#', $this->get_render_attribute_string( 'advanced_btn_attribute_2' ), $item['item_btn_2'] );
								}
							echo '</div>';
						}
					echo '</div>';
				echo '</div>';
			echo '</div>';
		}
		echo '</div>';
		if( 'yes' === $this->get_settings( 'thumbnails' ) ) {
			echo '<div class="sp-thumbnails">';
			foreach ( $items_list as $item ) {
				echo sprintf( '<img class="sp-thumbnail" src="%s">', $item['item_image']['url'] );
			}
			echo '</div>';
		}
		return ob_get_clean();
	}
}