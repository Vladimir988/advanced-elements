<?php
namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit;

class Advanced_Services_Box extends Widget_Base {

	public function get_name() {
		return 'advanced-services-box';
	}

	public function get_title() {
		return esc_html__( 'Advanced Services Box', 'advanced-elements' );
	}

	public function get_icon() {
		return 'eicon-featured-image';
	}

	public function get_categories() {
		return array( 'advanced-elements' );
	}

	protected function _register_controls() {
		$this->start_controls_section(
			'advanced_services_box',
			array(
				'label'      => esc_html__( 'Content', 'advanced-elements' ),
				'tab'        => Controls_Manager::TAB_CONTENT,
				'show_label' => false,
			)
		);
		$this->add_control(
			'services_box_header',
			array(
				'label'   => esc_html__( 'Kind of Heading?', 'advanced-elements' ),
				'type'    => Controls_Manager::SELECT,
				'default' => 'icon',
				'options' => array(
					'icon'  => esc_html__( 'Icon', 'advanced-elements' ),
					'image' => esc_html__( 'Image', 'advanced-elements' ),
					'text'  => esc_html__( 'Text', 'advanced-elements' ),
				),
			)
		);
		$this->add_control(
			'services_box_icon',
			array(
				'label'       => esc_html__( 'Icon', 'advanced-elements' ),
				'type'        => Controls_Manager::ICON,
				'label_block' => true,
				'file'        => '',
				'default'     => 'fa fa-sun-o',
				'condition'   => array(
					'services_box_header' => 'icon',
				),
			)
		);
		$this->add_control(
			'services_box_image',
			array(
				'label'     => esc_html__( 'Image', 'advanced-elements' ),
				'type'      => Controls_Manager::MEDIA,
				'default'   => array(
					'url'     => Utils::get_placeholder_image_src(),
				),
				'condition' => array(
					'services_box_header' => 'image',
				),
			)
		);
		$this->add_control(
			'services_box_text',
			array(
				'label'     => esc_html__( 'Heading Text', 'advanced-elements' ),
				'type'      => Controls_Manager::TEXT,
				'default'   => '01',
				'condition' => array(
					'services_box_header' => 'text',
				),
			)
		);
		$this->add_control(
			'services_box_text_tag',
			array(
				'label'   => esc_html__( 'Heading HTML Tag', 'advanced-elements' ),
				'type'    => Controls_Manager::SELECT,
				'options' => array(
					'h1'    => esc_html__( 'H1', 'advanced-elements' ),
					'h2'    => esc_html__( 'H2', 'advanced-elements' ),
					'h3'    => esc_html__( 'H3', 'advanced-elements' ),
					'h4'    => esc_html__( 'H4', 'advanced-elements' ),
					'h5'    => esc_html__( 'H5', 'advanced-elements' ),
					'h6'    => esc_html__( 'H6', 'advanced-elements' ),
					'p'     => esc_html__( 'p', 'advanced-elements' ),
					'div'   => esc_html__( 'div', 'advanced-elements' ),
				),
				'default' => 'p',
				'condition' => array(
					'services_box_header' => 'text',
				),
			)
		);
		$this->add_responsive_control(
			'services_box_heading_position',
			array(
				'label'     => esc_html__( 'Heading Position', 'advanced-elements' ),
				'type'      => Controls_Manager::CHOOSE,
				'default'   => 'column',
				'options'   => array(
					'row'     => array(
						'title' => esc_html__( 'Left', 'advanced-elements' ),
						'icon'  => 'fa fa-align-left',
					),
					'column'  => array(
						'title' => esc_html__( 'Center', 'advanced-elements' ),
						'icon'  => 'fa fa-align-center',
					),
					'row-reverse' => array(
						'title'     => esc_html__( 'Right', 'advanced-elements' ),
						'icon'      => 'fa fa-align-right',
					),
				),
				'prefix_class' => 'advanced-position-',
				'toggle'       => false,
				'selectors'    => array(
					'{{WRAPPER}} ' . '.advanced-services-box-inner' => '-webkit-flex-direction: {{VALUE}}; -ms-flex-direction: {{VALUE}}; flex-direction: {{VALUE}};',
				),
				'separator'    => 'before',
			)
		);
		$this->add_responsive_control(
			'services_box_heading_align_icon',
			array(
				'label'      => esc_html__( 'Heading Align', 'advanced-elements' ),
				'type'       => Controls_Manager::CHOOSE,
				'default'    => 'center',
				'options'    => array(
					'flex-start' => array(
						'title'  => esc_html__( 'Left', 'advanced-elements' ),
						'icon'   => 'fa fa-align-left',
					),
					'center'   => array(
						'title'  => esc_html__( 'Center', 'advanced-elements' ),
						'icon'   => 'fa fa-align-center',
					),
					'flex-end' => array(
						'title'  => esc_html__( 'Right', 'advanced-elements' ),
						'icon'   => 'fa fa-align-right',
					),
				),
				'condition' => array(
					'services_box_header' => 'icon',
				),
				'selectors'  => array(
					'{{WRAPPER}} ' . '.advanced-services-box-inner .advanced-services-box-heading' => 'justify-content: {{VALUE}};',
				),
			)
		);
		$this->add_responsive_control(
			'services_box_heading_align_text',
			array(
				'label'      => esc_html__( 'Heading Align', 'advanced-elements' ),
				'type'       => Controls_Manager::CHOOSE,
				'default'    => 'center',
				'options'    => array(
					'flex-start' => array(
						'title'  => esc_html__( 'Left', 'advanced-elements' ),
						'icon'   => 'fa fa-align-left',
					),
					'center'   => array(
						'title'  => esc_html__( 'Center', 'advanced-elements' ),
						'icon'   => 'fa fa-align-center',
					),
					'flex-end' => array(
						'title'  => esc_html__( 'Right', 'advanced-elements' ),
						'icon'   => 'fa fa-align-right',
					),
				),
				'condition' => array(
					'services_box_header' => 'text',
				),
				'selectors'  => array(
					'{{WRAPPER}} ' . '.advanced-services-box-inner .advanced-services-box-heading' => 'justify-content: {{VALUE}};',
				),
			)
		);
		$this->add_responsive_control(
			'services_box_content_align',
			array(
				'label'     => esc_html__( 'Content Align', 'advanced-elements' ),
				'type'      => Controls_Manager::CHOOSE,
				'default'   => 'center',
				'options'   => array(
					'left'    => array(
						'title' => esc_html__( 'Left', 'advanced-elements' ),
						'icon'  => 'fa fa-align-left',
					),
					'center'  => array(
						'title' => esc_html__( 'Center', 'advanced-elements' ),
						'icon'  => 'fa fa-align-center',
					),
					'right'   => array(
						'title' => esc_html__( 'Right', 'advanced-elements' ),
						'icon'  => 'fa fa-align-right',
					),
				),
				'selectors' => array(
					'{{WRAPPER}} ' . '.advanced-services-box-inner .advanced-services-box-content' => 'text-align: {{VALUE}};',
				),
			)
		);
		$this->add_control(
			'services_box_title',
			array(
				'label'     => esc_html__( 'Title', 'advanced-elements' ),
				'type'      => Controls_Manager::TEXT,
				'default'   => esc_html__( 'Title', 'advanced-elements' ),
				'separator' => 'before',
			)
		);
		$this->add_control(
			'services_box_description',
			array(
				'label'   => esc_html__( 'Description', 'advanced-elements' ),
				'type'    => Controls_Manager::TEXTAREA,
				'default' => esc_html__( 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', 'advanced-elements' ),
			)
		);
		$this->add_control(
			'services_box_btn_show',
			array(
				'label'        => esc_html__( 'Show Button?', 'advanced-elements' ),
				'type'         => Controls_Manager::SWITCHER,
				'label_on'     => esc_html__( 'Yes', 'advanced-elements' ),
				'label_off'    => esc_html__( 'No', 'advanced-elements' ),
				'return_value' => 'yes',
				'default'      => 'yes',
			)
		);
		$this->add_control(
			'services_box_btn',
			array(
				'label'     => esc_html__( 'Button', 'advanced-elements' ),
				'type'      => Controls_Manager::TEXT,
				'default'   => esc_html__( 'Read more', 'advanced-elements' ),
				'condition' => array(
					'services_box_btn_show' => 'yes',
				),
			)
		);
		$this->add_control(
			'services_box_btn_url',
			array(
				'label'       => esc_html__( 'Button Url', 'advanced-elements' ),
				'type'        => Controls_Manager::URL,
				'dynamic'     => array(
					'active'    => true,
				),
				'placeholder' => __( 'https://button-link.com', 'advanced-elements' ),
				'default'     => array(
					'url'       => '#',
				),
				'condition'   => array(
					'services_box_btn_show' => 'yes',
				),
			)
		);
		$this->end_controls_section();

		$this->start_controls_section(
			'services_box_general_style',
			array(
				'label'      => esc_html__( 'General', 'advanced-elements' ),
				'tab'        => Controls_Manager::TAB_STYLE,
				'show_label' => false,
			)
		);
		$this->add_group_control(
			Group_Control_Background::get_type(),
			array(
				'name'     => 'general_background',
				'selector' => '{{WRAPPER}} ' . '.advanced-services-box-inner',
			)
		);
		$this->add_group_control(
			Group_Control_Border::get_type(),
			array(
				'name'        => 'general_border',
				'label'       => esc_html__( 'Border', 'advanced-elements' ),
				'placeholder' => '1px',
				'default'     => '1px',
				'selector'  => '{{WRAPPER}} ' . '.advanced-services-box-inner',
			)
		);
		$this->add_responsive_control(
			'general_border_radius',
			array(
				'label'      => esc_html__( 'Border Radius', 'advanced-elements' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => array( 'px', '%' ),
				'selectors'  => array(
					'{{WRAPPER}} ' . '.advanced-services-box-inner' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				),
			)
		);
		$this->add_responsive_control(
			'general_padding',
			array(
				'label'      => esc_html__( 'Padding', 'advanced-elements' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => array( 'px', '%' ),
				'selectors'  => array(
					'{{WRAPPER}} ' . '.advanced-services-box-inner' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				),
			)
		);
		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			array(
				'name' => 'general_box_shadow',
				'exclude' => array(
					'box_shadow_position',
				),
				'selector' => '{{WRAPPER}} ' . '.advanced-services-box-inner',
			)
		);
		$this->end_controls_section();

		$this->start_controls_section(
			'services_box_heading_style',
			array(
				'label'      => esc_html__( 'Heading', 'advanced-elements' ),
				'tab'        => Controls_Manager::TAB_STYLE,
				'show_label' => false,
			)
		);
		$this->add_control(
			'heading_text_color',
			array(
				'label'     => esc_html__( 'Text Color', 'advanced-elements' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => array(
					'{{WRAPPER}} ' . '.advanced-services-box-heading .advanced-heading-text' => 'color: {{VALUE}}',
				),
				'condition' => array(
					'services_box_header' => 'text',
				),
			)
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			array(
				'name'     => 'heading_text_typography',
				'scheme'   => Scheme_Typography::TYPOGRAPHY_3,
				'selector' => '{{WRAPPER}} ' . '.advanced-services-box-heading .advanced-heading-text',
				'condition' => array(
					'services_box_header' => 'text',
				),
			)
		);
		$this->add_control(
			'heading_icon_color',
			array(
				'label'     => esc_html__( 'Icon Color', 'advanced-elements' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => array(
					'{{WRAPPER}} ' . '.advanced-services-box-heading .advanced-heading-icon i' => 'color: {{VALUE}}',
				),
				'condition' => array(
					'services_box_header' => 'icon',
				),
			)
		);
		$this->add_responsive_control(
			'heading_icon_size',
			array(
				'label'      => esc_html__( 'Icon Size', 'advanced-elements' ),
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
					'{{WRAPPER}} ' . '.advanced-services-box-heading .advanced-heading-icon i' => 'font-size: {{SIZE}}{{UNIT}};',
				),
				'condition' => array(
					'services_box_header' => 'icon',
				),
			)
		);
		$this->add_responsive_control(
			'heading_width',
			array(
				'label'      => esc_html__( 'Width', 'advanced-elements' ),
				'type'       => Controls_Manager::SLIDER,
				'size_units' => array(
					'px', '%',
				),
				'range'      => array(
					'px' => array(
						'min' => 10,
						'max' => 1000,
					),
					'%' => array(
						'min' => 0,
						'max' => 100,
					),
				),
				'default' => array(
					'size' => 90,
					'unit' => 'px',
				),
				'selectors'  => array(
					'{{WRAPPER}} ' . '.advanced-services-box-heading' => 'width: {{SIZE}}{{UNIT}};',
					'{{WRAPPER}} ' . '.advanced-services-box-content' => 'width: calc( 100% - {{SIZE}}{{UNIT}} );',
				),
			)
		);
		$this->add_responsive_control(
			'heading_height_image',
			array(
				'label'      => esc_html__( 'Height', 'advanced-elements' ),
				'type'       => Controls_Manager::SLIDER,
				'size_units' => array( 'px' ),
				'range'      => array(
					'px'    => array(
						'min' => 30,
						'max' => 800,
					),
				),
				'condition' => array(
					'services_box_header' => 'image',
				),
				'selectors'  => array(
					'{{WRAPPER}} ' . '.advanced-services-box-heading .advanced-services-box-image img' => 'height: {{SIZE}}{{UNIT}};',
				),
			)
		);
		$this->add_responsive_control(
			'heading_height_icon',
			array(
				'label'      => esc_html__( 'Height', 'advanced-elements' ),
				'type'       => Controls_Manager::SLIDER,
				'size_units' => array( 'px' ),
				'range'      => array(
					'px'    => array(
						'min' => 30,
						'max' => 800,
					),
				),
				'default' => array(
					'size' => 90,
					'unit' => 'px',
				),
				'condition' => array(
					'services_box_header' => 'icon',
				),
				'selectors'  => array(
					'{{WRAPPER}} ' . '.advanced-services-box-heading' => 'height: {{SIZE}}{{UNIT}};',
				),
			)
		);
		$this->add_responsive_control(
			'heading_height_text',
			array(
				'label'      => esc_html__( 'Height', 'advanced-elements' ),
				'type'       => Controls_Manager::SLIDER,
				'size_units' => array( 'px' ),
				'range'      => array(
					'px'    => array(
						'min' => 30,
						'max' => 800,
					),
				),
				'default' => array(
					'size' => 90,
					'unit' => 'px',
				),
				'condition' => array(
					'services_box_header' => 'text',
				),
				'selectors'  => array(
					'{{WRAPPER}} ' . '.advanced-services-box-heading' => 'height: {{SIZE}}{{UNIT}};',
				),
			)
		);
		$this->add_group_control(
			Group_Control_Background::get_type(),
			array(
				'name'     => 'heading_background',
				'selector' => '{{WRAPPER}} ' . '.advanced-services-box-heading',
			)
		);
		$this->add_group_control(
			Group_Control_Border::get_type(),
			array(
				'name'        => 'heading_border',
				'label'       => esc_html__( 'Border', 'advanced-elements' ),
				'placeholder' => '1px',
				'default'     => '1px',
				'selector'  => '{{WRAPPER}} ' . '.advanced-services-box-heading',
			)
		);
		$this->add_responsive_control(
			'heading_border_radius',
			array(
				'label'      => esc_html__( 'Border Radius', 'advanced-elements' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => array( 'px', '%' ),
				'selectors'  => array(
					'{{WRAPPER}} ' . '.advanced-services-box-heading' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				),
			)
		);
		$this->add_responsive_control(
			'heading_margin',
			array(
				'label'      => esc_html__( 'Margin', 'advanced-elements' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => array( 'px', '%' ),
				'selectors'  => array(
					'{{WRAPPER}} ' . '.advanced-services-box-heading' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				),
			)
		);
		$this->add_responsive_control(
			'heading_padding',
			array(
				'label'      => esc_html__( 'Padding', 'advanced-elements' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => array( 'px', '%' ),
				'selectors'  => array(
					'{{WRAPPER}} ' . '.advanced-services-box-heading' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				),
				'condition'  => array(
					'services_box_header' => 'image',
				),
			)
		);
		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			array(
				'name' => 'heading_box_shadow',
				'exclude' => array(
					'box_shadow_position',
				),
				'selector' => '{{WRAPPER}} ' . '.advanced-services-box-heading',
			)
		);
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
					'{{WRAPPER}} ' . '.advanced-services-box-title' => 'color: {{VALUE}}',
				),
			)
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			array(
				'name'     => 'title_typography',
				'scheme'   => Scheme_Typography::TYPOGRAPHY_3,
				'selector' => '{{WRAPPER}} ' . '.advanced-services-box-title',
			)
		);
		$this->add_group_control(
			Group_Control_Background::get_type(),
			array(
				'name'     => 'title_background',
				'selector' => '{{WRAPPER}} ' . '.advanced-services-box-title',
			)
		);
		$this->add_group_control(
			Group_Control_Border::get_type(),
			array(
				'name'        => 'title_border',
				'label'       => esc_html__( 'Border', 'advanced-elements' ),
				'placeholder' => '1px',
				'default'     => '',
				'selector'    => '{{WRAPPER}} ' . '.advanced-services-box-title',
			)
		);
		$this->add_responsive_control(
			'title_border_radius',
			array(
				'label'      => esc_html__( 'Border Radius', 'advanced-elements' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => array( 'px', '%', 'em' ),
				'selectors'  => array(
					'{{WRAPPER}} ' . '.advanced-services-box-title' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				),
			)
		);
		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			array(
				'name'     => 'title_box_shadow',
				'selector' => '{{WRAPPER}} ' . '.advanced-services-box-title',
			)
		);
		$this->add_responsive_control(
			'title_padding',
			array(
				'label'      => esc_html__( 'Padding', 'advanced-elements' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => array( 'px', '%', 'em' ),
				'selectors'  => array(
					'{{WRAPPER}} ' . '.advanced-services-box-title' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
					'{{WRAPPER}} ' . '.advanced-services-box-title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				),
			)
		);
		$this->add_responsive_control(
			'title_alignment',
			array(
				'label'   => esc_html__( 'Title Alignment', 'advanced-elements' ),
				'type'    => Controls_Manager::CHOOSE,
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
					'{{WRAPPER}} ' . '.advanced-services-box-title' => 'text-align: {{VALUE}};',
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
					'{{WRAPPER}} ' . '.advanced-services-box-descr' => 'color: {{VALUE}}',
				),
			)
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			array(
				'name'     => 'descr_typography',
				'scheme'   => Scheme_Typography::TYPOGRAPHY_3,
				'selector' => '{{WRAPPER}} ' . '.advanced-services-box-descr',
			)
		);
		$this->add_group_control(
			Group_Control_Background::get_type(),
			array(
				'name'     => 'descr_background',
				'selector' => '{{WRAPPER}} ' . '.advanced-services-box-descr',
			)
		);
		$this->add_group_control(
			Group_Control_Border::get_type(),
			array(
				'name'        => 'descr_border',
				'label'       => esc_html__( 'Border', 'advanced-elements' ),
				'placeholder' => '1px',
				'default'     => '',
				'selector'    => '{{WRAPPER}} ' . '.advanced-services-box-descr',
			)
		);
		$this->add_responsive_control(
			'descr_border_radius',
			array(
				'label'      => esc_html__( 'Border Radius', 'advanced-elements' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => array( 'px', '%', 'em' ),
				'selectors'  => array(
					'{{WRAPPER}} ' . '.advanced-services-box-descr' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				),
			)
		);
		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			array(
				'name'     => 'descr_box_shadow',
				'selector' => '{{WRAPPER}} ' . '.advanced-services-box-descr',
			)
		);
		$this->add_responsive_control(
			'descr_padding',
			array(
				'label'      => esc_html__( 'Padding', 'advanced-elements' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => array( 'px', '%', 'em' ),
				'selectors'  => array(
					'{{WRAPPER}} ' . '.advanced-services-box-descr' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
					'{{WRAPPER}} ' . '.advanced-services-box-descr' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				),
			)
		);
		$this->add_responsive_control(
			'descr_alignment',
			array(
				'label'   => esc_html__( 'Title Alignment', 'advanced-elements' ),
				'type'    => Controls_Manager::CHOOSE,
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
					'{{WRAPPER}} ' . '.advanced-services-box-descr' => 'text-align: {{VALUE}};',
				),
			)
		);
		$this->end_controls_section();

		$this->start_controls_section(
			'button_style',
			array(
				'label'      => esc_html__( 'Button', 'advanced-elements' ),
				'tab'        => Controls_Manager::TAB_STYLE,
				'show_label' => false,
			)
		);
		$this->start_controls_tabs( 'tabs_button_style' );
		$this->start_controls_tab(
			'tab_button_normal',
			array(
				'label' => esc_html__( 'Normal', 'advanced-elements' ),
			)
		);
		$this->add_control(
			'button_text_color',
			array(
				'label'     => esc_html__( 'Text Color', 'advanced-elements' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => array(
					'{{WRAPPER}} ' . '.advanced-services-box-btn-wrap .advanced-services-box-btn' => 'color: {{VALUE}}',
				),
			)
		);
		$this->add_control(
			'button_bg_color',
			array(
				'label' => esc_html__( 'Background Color', 'advanced-elements' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => array(
					'{{WRAPPER}} ' . '.advanced-services-box-btn-wrap .advanced-services-box-btn' => 'background-color: {{VALUE}}',
				),
			)
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			array(
				'name'     => 'button_typography',
				'scheme'   => Scheme_Typography::TYPOGRAPHY_4,
				'selector' => '{{WRAPPER}} ' . '.advanced-services-box-btn-wrap .advanced-services-box-btn',
			)
		);
		$this->add_responsive_control(
			'button_padding',
			array(
				'label'      => esc_html__( 'Padding', 'advanced-elements' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => array( 'px', '%', 'em' ),
				'selectors'  => array(
					'{{WRAPPER}} ' . '.advanced-services-box-btn-wrap .advanced-services-box-btn' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				),
			)
		);
		$this->add_responsive_control(
			'button_margin',
			array(
				'label'      => __( 'Margin', 'advanced-elements' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => array( 'px', '%', 'em' ),
				'selectors'  => array(
					'{{WRAPPER}} ' . '.advanced-services-box-btn-wrap .advanced-services-box-btn' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				),
			)
		);
		$this->add_group_control(
			Group_Control_Border::get_type(),
			array(
				'name'        => 'button_border',
				'label'       => esc_html__( 'Border', 'advanced-elements' ),
				'placeholder' => '1px',
				'default'     => '',
				'selector'    => '{{WRAPPER}} ' . '.advanced-services-box-btn-wrap .advanced-services-box-btn',
			)
		);
		$this->add_responsive_control(
			'button_border_radius',
			array(
				'label'      => esc_html__( 'Border Radius', 'advanced-elements' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => array( 'px', '%', 'em' ),
				'selectors'  => array(
					'{{WRAPPER}} ' . '.advanced-services-box-btn-wrap .advanced-services-box-btn' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				),
			)
		);
		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			array(
				'name'      => 'button_box_shadow',
				'selector'  => '{{WRAPPER}} ' . '.advanced-services-box-btn-wrap .advanced-services-box-btn',
				'separator' => 'after',
			)
		);
		$this->end_controls_tab();
		$this->start_controls_tab(
			'tab_button_hover',
			array(
				'label' => esc_html__( 'Hover', 'advanced-elements' ),
			)
		);
		$this->add_control(
			'button_text_color_hover',
			array(
				'label'     => esc_html__( 'Text Color', 'advanced-elements' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => array(
					'{{WRAPPER}} ' . '.advanced-services-box-btn-wrap .advanced-services-box-btn:hover' => 'color: {{VALUE}}',
				),
			)
		);
		$this->add_control(
			'button_bg_color_hover',
			array(
				'label' => esc_html__( 'Background Color', 'advanced-elements' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => array(
					'{{WRAPPER}} ' . '.advanced-services-box-btn-wrap .advanced-services-box-btn:hover' => 'background-color: {{VALUE}}',
				),
			)
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			array(
				'name'     => 'button_typography_hover',
				'scheme'   => Scheme_Typography::TYPOGRAPHY_4,
				'selector' => '{{WRAPPER}} ' . '.advanced-services-box-btn-wrap .advanced-services-box-btn:hover',
			)
		);
		$this->add_responsive_control(
			'button_padding_hover',
			array(
				'label'      => esc_html__( 'Padding', 'advanced-elements' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => array( 'px', '%', 'em' ),
				'selectors'  => array(
					'{{WRAPPER}} ' . '.advanced-services-box-btn-wrap .advanced-services-box-btn:hover' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				),
			)
		);
		$this->add_responsive_control(
			'button_margin_hover',
			array(
				'label'      => __( 'Margin', 'advanced-elements' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => array( 'px', '%', 'em' ),
				'selectors'  => array(
					'{{WRAPPER}} ' . '.advanced-services-box-btn-wrap .advanced-services-box-btn:hover' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				),
			)
		);
		$this->add_group_control(
			Group_Control_Border::get_type(),
			array(
				'name'        => 'button_border_hover',
				'label'       => esc_html__( 'Border', 'advanced-elements' ),
				'placeholder' => '1px',
				'default'     => '',
				'selector'    => '{{WRAPPER}} ' . '.advanced-services-box-btn-wrap .advanced-services-box-btn:hover',
			)
		);
		$this->add_responsive_control(
			'button_border_radius_hover',
			array(
				'label'      => esc_html__( 'Border Radius', 'advanced-elements' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => array( 'px', '%', 'em' ),
				'selectors'  => array(
					'{{WRAPPER}} ' . '.advanced-services-box-btn-wrap .advanced-services-box-btn:hover' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				),
			)
		);
		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			array(
				'name'      => 'button_box_shadow_hover',
				'selector'  => '{{WRAPPER}} ' . '.advanced-services-box-btn-wrap .advanced-services-box-btn:hover',
				'separator' => 'after',
			)
		);
		$this->end_controls_tab();
		$this->end_controls_tabs();
		$this->add_responsive_control(
			'button_alignment',
			array(
				'label'   => esc_html__( 'Title Alignment', 'advanced-elements' ),
				'type'    => Controls_Manager::CHOOSE,
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
					'{{WRAPPER}} ' . '.advanced-services-box-btn-wrap' => 'text-align: {{VALUE}};',
				),
				'separator' => 'before',
			)
		);
		$this->end_controls_section();
	}

	protected function render() {
		$settings = $this->get_settings();
		echo '<div class="advanced-services-box">';
			echo '<div class="advanced-services-box-inner">';
				echo '<div class="advanced-services-box-heading">';
					if( 'icon' === $settings['services_box_header'] ) {
						echo '<div class="advanced-services-box-icon">';
							echo sprintf( '<div class="advanced-heading-icon"><i class="%1$s"></i></div>', $settings['services_box_icon'] );
						echo '</div>';
					} elseif( 'image' === $settings['services_box_header'] ) {
						echo '<div class="advanced-services-box-image">';
							echo sprintf( '<img class="advanced-heading-image" src="%1$s" alt="%2$s">', $settings['services_box_image']['url'], $settings['services_box_title'] );
						echo '</div>';
					} else {
						echo '<div class="advanced-services-box-text">';
							echo sprintf( '<%1$s class="advanced-heading-text">%2$s</%1$s>', $settings['services_box_text_tag'], $settings['services_box_text'] );
						echo '</div>';
					}
				echo '</div>';
				echo '<div class="advanced-services-box-content">';
					if( !empty( $settings['services_box_title'] ) ) {
						echo sprintf( '<div class="advanced-services-box-title">%1$s</div>', $settings['services_box_title'] );
					}
					if( !empty( $settings['services_box_description'] ) ) {
						echo sprintf( '<div class="advanced-services-box-descr">%1$s</div>', $settings['services_box_description'] );
					}
					if( 'yes' === $settings['services_box_btn_show'] && !empty( $settings['services_box_btn'] ) ) {
						if ( !empty( $settings['services_box_btn_url']['url'] ) ) {
							if( $settings['services_box_btn_url']['is_external'] ) {
								$this->add_render_attribute( 'services_box_btn_attr', 'target', '_blank' );
							}
							if( $settings['services_box_btn_url']['nofollow'] ) {
								$this->add_render_attribute( 'services_box_btn_attr', 'rel', 'nofollow' );
							}
						}
						echo sprintf(
							'<div class="advanced-services-box-btn-wrap"><a class="advanced-services-box-btn" href="%1$s" %2$s>%3$s</a></div>',
							!empty( $settings['services_box_btn_url']['url'] ) ? $settings['services_box_btn_url']['url'] : '#',
							$this->get_render_attribute_string( 'services_box_btn_attr' ),
							$settings['services_box_btn']
						);
					}
				echo '</div>';
			echo '</div>';
		echo '</div>';
	}
}