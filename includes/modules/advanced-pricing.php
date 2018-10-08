<?php
namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit;

class Advanced_Pricing extends Widget_Base {

	public function get_name() {
		return 'advanced-pricing';
	}

	public function get_title() {
		return esc_html__( 'Pricing Table', 'advanced-elements' );
	}

	public function get_icon() {
		return 'eicon-price-table';
	}

	public function get_categories() {
		return array( 'advanced-elements' );
	}

	protected function _register_controls() {

		$this->start_controls_section(
			'pricing_title_settings',
			array(
				'label' => esc_html__( 'Title', 'advanced-elements' ),
				'tab'   => Controls_Manager::TAB_LAYOUT,
			)
		);
		$this->add_control(
			'pricing_icon',
			array(
				'label'       => esc_html__( 'Icon', 'advanced-elements' ),
				'type'        => Controls_Manager::ICON,
				'label_block' => true,
				'file'        => '',
				'default'     => 'fa fa-first-order',
			)
		);
		$this->add_control(
			'pricing_before_title',
			array(
				'label'   => esc_html__( 'Before Title', 'advanced-elements' ),
				'type'    => Controls_Manager::TEXT,
				'default' => 'Before Title',
			)
		);
		$this->add_control(
			'pricing_title',
			array(
				'label'   => esc_html__( 'Title', 'advanced-elements' ),
				'type'    => Controls_Manager::TEXT,
				'default' => 'Title',
			)
		);
		$this->add_control(
			'pricing_after_title',
			array(
				'label'   => esc_html__( 'After Title', 'advanced-elements' ),
				'type'    => Controls_Manager::TEXT,
				'default' => 'After Title',
			)
		);
		$this->add_control(
			'pricing_featured',
			array(
				'label'        => esc_html__( 'Is Featured?', 'advanced-elements' ),
				'type'         => Controls_Manager::SWITCHER,
				'label_on'     => esc_html__( 'Yes', 'advanced-elements' ),
				'label_off'    => esc_html__( 'No', 'advanced-elements' ),
				'return_value' => 'yes',
				'default'      => 'no',
			)
		);
		$this->add_control(
			'pricing_featured_badge',
			array(
				'label'   => esc_html__( 'Featured Badge', 'advanced-elements' ),
				'type'    => Controls_Manager::MEDIA,
				'default' => array(
					'url'   => $this->get_featured_badge_img(),
				),
				'condition' => array(
					'pricing_featured' => 'yes',
				),
			)
		);
		$this->add_control(
			'pricing_featured_position',
			array(
				'label'   => esc_html__( 'Featured Postition', 'advanced-elements' ),
				'type'    => Controls_Manager::SELECT,
				'default' => 'left',
				'options' => array(
					'left'  => esc_html__( 'Left', 'advanced-elements' ),
					'right' => esc_html__( 'Right', 'advanced-elements' ),
				),
				'condition' => array(
					'pricing_featured' => 'yes',
				),
			)
		);
		$this->add_responsive_control(
			'pricing_featured_left',
			array(
				'label'      => esc_html__( 'Left Indent', 'advanced-elements' ),
				'type'       => Controls_Manager::SLIDER,
				'size_units' => array( 'px', '%', 'em' ),
				'range'      => array(
					'px'       => array(
						'min'    => -200,
						'max'    => 200,
					),
					'%'        => array(
						'min'    => -50,
						'max'    => 50,
					),
					'em'       => array(
						'min'    => -50,
						'max'    => 50,
					),
				),
				'condition'                   => array(
					'pricing_featured_position' => 'left',
					'pricing_featured'          => 'yes',
				),
				'selectors' => array(
					'{{WRAPPER}} .advanced-pricing-badge' => 'left: {{SIZE}}{{UNIT}}; right: auto;',
				),
			)
		);
		$this->add_responsive_control(
			'pricing_featured_right',
			array(
				'label'      => esc_html__( 'Right Indent', 'advanced-elements' ),
				'type'       => Controls_Manager::SLIDER,
				'size_units' => array( 'px', '%', 'em' ),
				'range'      => array(
					'px'       => array(
						'min'    => -200,
						'max'    => 200,
					),
					'%'        => array(
						'min'    => -50,
						'max'    => 50,
					),
					'em'       => array(
						'min'    => -50,
						'max'    => 50,
					),
				),
				'condition'                   => array(
					'pricing_featured_position' => 'right',
					'pricing_featured'          => 'yes',
				),
				'selectors'  => array(
					'{{WRAPPER}} .advanced-pricing-badge' => 'right: {{SIZE}}{{UNIT}}; left: auto;',
				),
			)
		);
		$this->add_responsive_control(
			'pricing_featured_top',
			array(
				'label'      => esc_html__( 'Top Indent', 'advanced-elements' ),
				'type'       => Controls_Manager::SLIDER,
				'size_units' => array( 'px', '%', 'em' ),
				'range'      => array(
					'px'       => array(
						'min'    => -200,
						'max'    => 200,
					),
					'%'        => array(
						'min'    => -50,
						'max'    => 50,
					),
					'em'       => array(
						'min'    => -50,
						'max'    => 50,
					),
				),
				'selectors'  => array(
					'{{WRAPPER}} .advanced-pricing-badge' => 'top: {{SIZE}}{{UNIT}};',
				),
				'condition'  => array(
					'pricing_featured' => 'yes',
				),
			)
		);
		$this->end_controls_section();

		$this->start_controls_section(
			'price_section_action',
			array(
				'label' => esc_html__( 'Price', 'advanced-elements' ),
				'tab'   => Controls_Manager::TAB_LAYOUT,
			)
		);
		$this->add_control(
			'price_before_settings',
			array(
				'label'   => esc_html__( 'Before Price', 'advanced-elements' ),
				'type'    => Controls_Manager::TEXT,
				'default' => '$',
			)
		);
		$this->add_control(
			'price_settings',
			array(
				'label'   => esc_html__( 'Price', 'advanced-elements' ),
				'type'    => Controls_Manager::TEXT,
				'default' => '100',
			)
		);
		$this->add_control(
			'price_after_settings',
			array(
				'label'   => esc_html__( 'After Price', 'advanced-elements' ),
				'type'    => Controls_Manager::TEXT,
				'default' => '/month',
			)
		);
		$this->end_controls_section();

		$this->start_controls_section(
			'pricing_section_list',
			array(
				'label' => esc_html__( 'Icon List', 'advanced-elements' ),
				'tab'   => Controls_Manager::TAB_LAYOUT,
			)
		);
		$this->add_control(
			'pricing_list_show',
			array(
				'label'        => esc_html__( 'Show List?', 'advanced-elements' ),
				'type'         => Controls_Manager::SWITCHER,
				'label_on'     => esc_html__( 'Yes', 'advanced-elements' ),
				'label_off'    => esc_html__( 'No', 'advanced-elements' ),
				'return_value' => 'yes',
				'default'      => 'yes',
			)
		);
		$repeater = new Repeater();
		$repeater->add_control(
			'item_text',
			array(
				'label'       => esc_html__( 'Text', 'advanced-elements' ),
				'type'        => Controls_Manager::TEXT,
				'label_block' => true,
				'placeholder' => esc_html__( 'List Item', 'advanced-elements' ),
				'default'     => esc_html__( 'List Item', 'advanced-elements' ),
			)
		);
		$repeater->add_control(
			'item_icon',
			array(
				'name'        => 'icon',
				'label'       => esc_html__( 'Icon', 'advanced-elements' ),
				'type'        => Controls_Manager::ICON,
				'label_block' => true,
				'default'     => 'fa fa-folder-open-o',
			)
		);
		$repeater->add_control(
			'item_link',
			array(
				'name'        => 'link',
				'label'       => esc_html__( 'Link', 'advanced-elements' ),
				'type'        => Controls_Manager::URL,
				'label_block' => true,
				'placeholder' => __( 'https://link.com', 'advanced-elements' ),
				'default'     => array(
					'url'       => '#',
				),
			)
		);
		$this->add_control(
			'pricing_features_list',
			array(
				'type'          => Controls_Manager::REPEATER,
				'fields'        => array_values( $repeater->get_controls() ),
				'default'       => array(
					array(
						'item_text' => esc_html__( 'List Item 1', 'advanced-elements' ),
						'item_icon' => 'fa fa-folder-open-o',
					),
					array(
						'item_text' => esc_html__( 'List Item 2', 'advanced-elements' ),
						'item_icon' => 'fa fa-folder-open-o',
					),
					array(
						'item_text' => esc_html__( 'List Item 3', 'advanced-elements' ),
						'item_icon' => 'fa fa-folder-open-o',
					),
				),
				'title_field'   => '<i class="{{ item_icon }}"></i> {{{ item_text }}}',
				'condition'     => array(
					'pricing_list_show' => 'yes',
				),
			)
		);
		$this->end_controls_section();

		$this->start_controls_section(
			'pricing_description_section',
			array(
				'label' => esc_html__('Description', 'advanced-elements'),
				'tab'   => Controls_Manager::TAB_LAYOUT,
			)
		);
		$this->add_control(
			'pricing_description_show',
			array(
				'label'        => esc_html__( 'Show Description?', 'advanced-elements' ),
				'type'         => Controls_Manager::SWITCHER,
				'label_on'     => esc_html__( 'Yes', 'advanced-elements' ),
				'label_off'    => esc_html__( 'No', 'advanced-elements' ),
				'return_value' => 'yes',
				'default'      => 'no',
			)
		);
		$this->add_control(
			'pricing_description',
			array(
				'label'     => esc_html__('Description', 'advanced-elements'),
				'type'      => Controls_Manager::WYSIWYG,
				'default'   => esc_html__('Lorem ipsum dolor sit amet, consectetur adipiscing elit!', 'advanced-elements'),
				'condition' => array(
					'pricing_description_show' => 'yes',
				),
			)
		);
		$this->end_controls_section();

		$this->start_controls_section(
			'pricing_button_section',
			array(
				'label' => esc_html__( 'Button', 'advanced-elements' ),
				'tab'   => Controls_Manager::TAB_LAYOUT,
			)
		);
		$this->add_control(
			'pricing_button',
			array(
				'label'   => esc_html__( 'Button Text', 'advanced-elements' ),
				'type'    => Controls_Manager::TEXT,
				'default' => __( 'Read more', 'advanced-elements' ),
			)
		);
		$this->add_control(
			'pricing_button_url',
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
			)
		);
		$this->end_controls_section();

		$this->start_controls_section(
			'style_table',
			array(
				'label' => esc_html__( 'Table', 'advanced-elements' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			)
		);
		$this->add_group_control(
			Group_Control_Background::get_type(),
			array(
				'name'     => 'style_table_bg',
				'selector' => '{{WRAPPER}} ' . '.advanced-pricing-table',
			)
		);
		$this->add_group_control(
			Group_Control_Border::get_type(),
			array(
				'name'        => 'style_table_border',
				'label'       => esc_html__( 'Border', 'advanced-elements' ),
				'placeholder' => '1px',
				'selector'    => '{{WRAPPER}} ' . '.advanced-pricing-table',
			)
		);
		$this->add_responsive_control(
			'style_table_border_radius',
			array(
				'label'      => esc_html__( 'Border Radius', 'advanced-elements' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => array( 'px', '%' ),
				'selectors'  => array(
					'{{WRAPPER}} ' . '.advanced-pricing-table' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				),
			)
		);
		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			array(
				'name'     => 'style_table_box_shadow',
				'selector' => '{{WRAPPER}} ' . '.advanced-pricing-table',
			)
		);
		$this->add_responsive_control(
			'style_table_padding',
			array(
				'label'      => esc_html__( 'Table Padding', 'advanced-elements' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => array( 'px', '%', 'em' ),
				'selectors'  => array(
					'{{WRAPPER}} ' . '.advanced-pricing-table' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				),
			)
		);
		$this->end_controls_section();

		$this->start_controls_section(
			'style_icon',
			array(
				'label' => esc_html__( 'Icon', 'advanced-elements' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			)
		);
		$this->add_control(
			'style_icon_color',
			array(
				'label'     => esc_html__( 'Icon Color', 'advanced-elements' ),
				'type'      => Controls_Manager::COLOR,
				'scheme'    => array(
					'type'    => Scheme_Color::get_type(),
					'value'   => Scheme_Color::COLOR_4,
				),
				'selectors' => array(
					'{{WRAPPER}} ' . '.advanced-pricing-icon > i' => 'color: {{VALUE}}',
				),
			)
		);
		$this->add_responsive_control(
			'style_icon_font_size',
			array(
				'label'      => esc_html__( 'Icon Size', 'advanced-elements' ),
				'type'       => Controls_Manager::SLIDER,
				'size_units' => array( 'px', 'em' ),
				'range'      => array(
					'px'       => array(
						'min'    => 1,
						'max'    => 500,
					),
					'em'       => array(
						'min'    => 1,
						'max'    => 100,
					),
				),
				'selectors'  => array(
					'{{WRAPPER}} ' . '.advanced-pricing-icon > i:before' => 'font-size: {{SIZE}}{{UNIT}};',
				),
			)
		);
		$this->add_responsive_control(
			'style_icon_box_size',
			array(
				'label'      => esc_html__( 'Box Size', 'advanced-elements' ),
				'type'       => Controls_Manager::SLIDER,
				'size_units' => array( 'px' ),
				'range'      => array(
					'px'       => array(
						'max'    => 500,
					),
				),
				'selectors'  => array(
					'{{WRAPPER}} ' . '.advanced-pricing-icon > i' => 'width: {{SIZE}}{{UNIT}}; height: {{SIZE}}{{UNIT}};',
				),
			)
		);
		$this->add_group_control(
			Group_Control_Background::get_type(),
			array(
				'name'     => 'style_icon_bg',
				'selector' => '{{WRAPPER}} ' . '.advanced-pricing-icon > *',
			)
		);
		$this->add_group_control(
			Group_Control_Border::get_type(),
			array(
				'name'        => 'style_icon_border',
				'label'       => esc_html__( 'Border', 'advanced-elements' ),
				'placeholder' => '1px',
				'selector'    => '{{WRAPPER}} ' . '.advanced-pricing-icon > *',
			)
		);
		$this->add_responsive_control(
			'style_icon_border_radius',
			array(
				'label'      => esc_html__( 'Border Radius', 'advanced-elements' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => array( 'px', '%' ),
				'selectors'  => array(
					'{{WRAPPER}} ' . '.advanced-pricing-icon > *' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				),
			)
		);
		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			array(
				'name'     => 'style_icon_box_shadow',
				'selector' => '{{WRAPPER}} ' . '.advanced-pricing-icon > *',
			)
		);
		$this->add_responsive_control(
			'style_icon_padding',
			array(
				'label'      => esc_html__( 'Padding', 'advanced-elements' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => array( 'px', '%', 'em' ),
				'selectors'  => array(
					'{{WRAPPER}} ' . '.advanced-pricing-icon' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				),
				'separator'  => 'before',
			)
		);
		$this->add_responsive_control(
			'style_icon_alignment',
			array(
				'label'     => esc_html__( 'Alignment', 'advanced-elements' ),
				'type'      => Controls_Manager::CHOOSE,
				'default'   => 'center',
				'options'   => array(
					'start'   => array(
						'title' => esc_html__( 'Left', 'advanced-elements' ),
						'icon'  => 'fa fa-align-left',
					),
					'center'  => array(
						'title' => esc_html__( 'Center', 'advanced-elements' ),
						'icon'  => 'fa fa-align-center',
					),
					'end'     => array(
						'title' => esc_html__( 'Right', 'advanced-elements' ),
						'icon'  => 'fa fa-align-right',
					),
				),
				'selectors'  => array(
					'{{WRAPPER}} ' . '.advanced-pricing-icon' => 'justify-content: {{VALUE}};',
				),
			)
		);
		$this->end_controls_section();

		$this->start_controls_section(
			'style_title',
			array(
				'label' => esc_html__( 'Title', 'advanced-elements' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			)
		);
		$this->add_control(
			'style_title_bg_color',
			array(
				'label'     => esc_html__( 'Background Color', 'advanced-elements' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => array(
					'{{WRAPPER}} ' . '.advanced-pricing-title-box' => 'background-color: {{VALUE}}',
				),
			)
		);
		$this->add_control(
			'style_title_heading_before',
			array(
				'label'     => esc_html__( 'Before Title', 'advanced-elements' ),
				'type'      => Controls_Manager::HEADING,
				'separator' => 'before',
			)
		);
		$this->add_control(
			'style_title_color_before',
			array(
				'label'     => esc_html__( 'Color', 'advanced-elements' ),
				'type'      => Controls_Manager::COLOR,
				'scheme'    => array(
					'type'    => Scheme_Color::get_type(),
					'value'   => Scheme_Color::COLOR_4,
				),
				'selectors' => array(
					'{{WRAPPER}} ' . '.advanced-pricing-before-title' => 'color: {{VALUE}}',
				),
			)
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			array(
				'name'     => 'style_title_typography_before',
				'scheme'   => Scheme_Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} ' . '.advanced-pricing-before-title',
			)
		);
		$this->add_responsive_control(
			'style_title_before_padding',
			array(
				'label'      => esc_html__( 'Padding', 'advanced-elements' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => array( 'px', '%', 'em' ),
				'selectors'  => array(
					'{{WRAPPER}} '  . '.advanced-pricing-before-title' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				),
			)
		);
		$this->add_control(
			'style_title_heading',
			array(
				'label'     => esc_html__( 'Title', 'advanced-elements' ),
				'type'      => Controls_Manager::HEADING,
				'separator' => 'before',
			)
		);
		$this->add_control(
			'style_title_color',
			array(
				'label'     => esc_html__( 'Color', 'advanced-elements' ),
				'type'      => Controls_Manager::COLOR,
				'scheme'    => array(
					'type'    => Scheme_Color::get_type(),
					'value'   => Scheme_Color::COLOR_4,
				),
				'selectors' => array(
					'{{WRAPPER}} ' . '.advanced-pricing-title' => 'color: {{VALUE}}',
				),
			)
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			array(
				'name'     => 'style_title_typography',
				'scheme'   => Scheme_Typography::TYPOGRAPHY_3,
				'selector' => '{{WRAPPER}} ' . '.advanced-pricing-title',
			)
		);
		$this->add_responsive_control(
			'style_title_padding',
			array(
				'label'      => esc_html__( 'Padding', 'advanced-elements' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => array( 'px', '%', 'em' ),
				'selectors'  => array(
					'{{WRAPPER}} '  . '.advanced-pricing-title' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				),
			)
		);
		$this->add_control(
			'style_title_heading_after',
			array(
				'label'     => esc_html__( 'After Title', 'advanced-elements' ),
				'type'      => Controls_Manager::HEADING,
				'separator' => 'before',
			)
		);
		$this->add_control(
			'style_title_color_after',
			array(
				'label'     => esc_html__( 'Color', 'advanced-elements' ),
				'type'      => Controls_Manager::COLOR,
				'scheme'    => array(
					'type'    => Scheme_Color::get_type(),
					'value'   => Scheme_Color::COLOR_4,
				),
				'selectors' => array(
					'{{WRAPPER}} ' . '.advanced-pricing-after-title' => 'color: {{VALUE}}',
				),
			)
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			array(
				'name'     => 'style_title_typography_after',
				'scheme'   => Scheme_Typography::TYPOGRAPHY_2,
				'selector' => '{{WRAPPER}} ' . '.advanced-pricing-after-title',
			)
		);
		$this->add_responsive_control(
			'style_title_after_padding',
			array(
				'label'      => esc_html__( 'Padding', 'advanced-elements' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => array( 'px', '%', 'em' ),
				'selectors'  => array(
					'{{WRAPPER}} '  . '.advanced-pricing-after-title' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				),
			)
		);
		$this->add_responsive_control(
			'style_title_after_margin',
			array(
				'label'      => esc_html__( 'Margin', 'advanced-elements' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => array( 'px', '%', 'em' ),
				'selectors'  => array(
					'{{WRAPPER}} '  . '.advanced-pricing-after-title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				),
			)
		);
		$this->add_control(
			'style_title_heading_last',
			array(
				'type'      => Controls_Manager::HEADING,
				'separator' => 'before',
			)
		);
		$this->add_responsive_control(
			'style_title_alignment',
			array(
				'label'     => esc_html__( 'Alignment', 'advanced-elements' ),
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
					'{{WRAPPER}} ' . '.advanced-pricing-title-box' => 'text-align: {{VALUE}};',
				),
			)
		);
		$this->end_controls_section();

		$this->start_controls_section(
			'style_price',
			array(
				'label' => esc_html__( 'Price', 'advanced-elements' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			)
		);
		$this->add_control(
			'style_price_bg_color',
			array(
				'label'     => esc_html__( 'Background Color', 'advanced-elements' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => array(
					'{{WRAPPER}} ' . '.advanced-pricing-price-box' => 'background-color: {{VALUE}}',
				),
			)
		);
		$this->add_control(
			'style_before_price',
			array(
				'label'     => esc_html__( 'Before Price', 'advanced-elements' ),
				'type'      => Controls_Manager::HEADING,
				'separator' => 'before',
			)
		);
		$this->add_control(
			'style_before_price_color',
			array(
				'label'     => esc_html__( 'Before Price Color', 'advanced-elements' ),
				'type'      => Controls_Manager::COLOR,
				'scheme'    => array(
					'type'    => Scheme_Color::get_type(),
					'value'   => Scheme_Color::COLOR_4,
				),
				'selectors' => array(
					'{{WRAPPER}} ' . '.advanced-pricing-before-price' => 'color: {{VALUE}}',
				),
			)
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			array(
				'name'     => 'style_before_price_typography',
				'scheme'   => Scheme_Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}}  ' . '.advanced-pricing-before-price',
			)
		);
		$this->add_control(
			'style_before_price_vertical_align',
			array(
				'label'     => esc_html__( 'Vertical Alignment', 'advanced-elements' ),
				'type'      => Controls_Manager::SELECT,
				'options'   => array(
					'top'     => esc_html__( 'Top', 'advanced-elements' ),
					'middle'  => esc_html__( 'Middle', 'advanced-elements' ),
					'bottom'  => esc_html__( 'Bottom', 'advanced-elements' ),
				),
				'default'   => 'middle',
				'selectors' => array(
					'{{WRAPPER}} ' . '.advanced-pricing-before-price' => 'vertical-align: {{VALUE}};',
				),
			)
		);
		$this->add_control(
			'style_before_price_dispaly',
			array(
				'label'          => esc_html__( 'Before Price Display', 'advanced-elements' ),
				'type'           => Controls_Manager::SELECT,
				'options'        => array(
					'inline-block' => esc_html__( 'Inline', 'advanced-elements' ),
					'block'        => esc_html__( 'Block', 'advanced-elements' ),
				),
				'default'        => 'inline-block',
				'selectors'      => array(
					'{{WRAPPER}} ' . '.advanced-pricing-before-price' => 'display: {{VALUE}};',
				),
			)
		);
		$this->add_control(
			'style_price_val',
			array(
				'label'     => esc_html__( 'Price', 'advanced-elements' ),
				'type'      => Controls_Manager::HEADING,
				'separator' => 'before',
			)
		);
		$this->add_control(
			'style_price_color',
			array(
				'label'     => esc_html__( 'Price Color', 'advanced-elements' ),
				'type'      => Controls_Manager::COLOR,
				'scheme'    => array(
					'type'    => Scheme_Color::get_type(),
					'value'   => Scheme_Color::COLOR_4,
				),
				'selectors' => array(
					'{{WRAPPER}} ' . '.advanced-pricing-price' => 'color: {{VALUE}}',
				),
			)
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			array(
				'name'     => 'style_price_typography',
				'scheme'   => Scheme_Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}}  ' . '.advanced-pricing-price',
			)
		);
		$this->add_responsive_control(
			'style_price_padding',
			array(
				'label'      => esc_html__( 'Price Padding', 'advanced-elements' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => array( 'px', '%', 'em' ),
				'selectors'  => array(
					'{{WRAPPER}} ' . '.advanced-pricing-price' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				),
			)
		);
		$this->add_control(
			'style_after_price',
			array(
				'label'     => esc_html__( 'After Price', 'advanced-elements' ),
				'type'      => Controls_Manager::HEADING,
				'separator' => 'before',
			)
		);
		$this->add_control(
			'style_after_price_color',
			array(
				'label'     => esc_html__( 'After Price Color', 'advanced-elements' ),
				'type'      => Controls_Manager::COLOR,
				'scheme'    => array(
					'type'    => Scheme_Color::get_type(),
					'value'   => Scheme_Color::COLOR_4,
				),
				'selectors' => array(
					'{{WRAPPER}} ' . '.advanced-pricing-after-price' => 'color: {{VALUE}}',
				),
			)
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			array(
				'name'     => 'style_after_price_typography',
				'scheme'   => Scheme_Typography::TYPOGRAPHY_3,
				'selector' => '{{WRAPPER}}  ' . '.advanced-pricing-after-price',
			)
		);
		$this->add_control(
			'style_after_price_vertical_align',
			array(
				'label'     => esc_html__( 'Vertical Alignment', 'advanced-elements' ),
				'type'      => Controls_Manager::SELECT,
				'options'   => array(
					'top'     => esc_html__( 'Top', 'advanced-elements' ),
					'middle'  => esc_html__( 'Middle', 'advanced-elements' ),
					'bottom'  => esc_html__( 'Bottom', 'advanced-elements' ),
				),
				'default'   => 'middle',
				'selectors' => array(
					'{{WRAPPER}} ' . '.advanced-pricing-after-price' => 'vertical-align: {{VALUE}};',
				),
			)
		);
		$this->add_control(
			'style_after_price_dispaly',
			array(
				'label'          => esc_html__( 'After Price Display', 'advanced-elements' ),
				'type'           => Controls_Manager::SELECT,
				'options'        => array(
					'inline-block' => esc_html__( 'Inline', 'advanced-elements' ),
					'block'        => esc_html__( 'Block', 'advanced-elements' ),
				),
				'default'        => 'inline-block',
				'selectors'      => array(
					'{{WRAPPER}} ' . '.advanced-pricing-after-price' => 'display: {{VALUE}};',
				),
				'separator'      => 'after',
			)
		);
		$this->add_group_control(
			Group_Control_Border::get_type(),
			array(
				'name'        => 'style_price_border',
				'label'       => esc_html__( 'Border', 'advanced-elements' ),
				'placeholder' => '1px',
				'selector'    => '{{WRAPPER}} ' . '.advanced-pricing-price-box',
			)
		);
		$this->add_responsive_control(
			'style_price_border_radius',
			array(
				'label'      => esc_html__( 'Border Radius', 'advanced-elements' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => array( 'px', '%' ),
				'selectors'  => array(
					'{{WRAPPER}} ' . '.advanced-pricing-price-box' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				),
			)
		);
		$this->add_responsive_control(
			'style_price_padding',
			array(
				'label'      => esc_html__( 'Padding', 'advanced-elements' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => array( 'px', '%', 'em' ),
				'selectors'  => array(
					'{{WRAPPER}} ' . '.advanced-pricing-price-box' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				),
			)
		);
		$this->add_responsive_control(
			'style_price_margin',
			array(
				'label'      => esc_html__( 'Margin', 'advanced-elements' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => array( 'px', '%', 'em' ),
				'selectors'  => array(
					'{{WRAPPER}} ' . '.advanced-pricing-price-box' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				),
			)
		);
		$this->add_responsive_control(
			'style_price_alignment',
			array(
				'label'     => esc_html__( 'Alignment', 'advanced-elements' ),
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
					'{{WRAPPER}} ' . '.advanced-pricing-price-box' => 'text-align: {{VALUE}};',
				),
			)
		);
		$this->end_controls_section();

		$this->start_controls_section(
			'style_icon_list',
			array(
				'label'      => esc_html__( 'Icon List', 'advanced-elements' ),
				'tab'        => Controls_Manager::TAB_STYLE,
				'show_label' => false,
			)
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			array(
				'name'     => 'style_icon_list_typography',
				'label'    => esc_html__( 'Text Typography', 'advanced-elements' ),
				'scheme'   => Scheme_Typography::TYPOGRAPHY_3,
				'selector' => '{{WRAPPER}}  ' . '.advanced-pricing-list-item .advanced-pricing-list-text',
			)
		);
		$this->add_control(
			'style_icon_list_text_indent',
			array(
				'label'     => esc_html__( 'Text Indent', 'advanced-elements' ),
				'type'      => Controls_Manager::SLIDER,
				'default'   => array(
					'size'    => 0,
					'unit'    => 'px',
				),
				'range'     => array(
					'px'      => array(
						'min'   => 0,
						'max'   => 100,
					),
				),
				'selectors' => array(
					'{{WRAPPER}} ' . '.advanced-pricing-list-item .advanced-pricing-list-text' => 'padding-left: {{SIZE}}{{UNIT}};',
				),
			)
		);
		$this->add_control(
			'style_icon_list_text_color',
			array(
				'label'     => esc_html__( 'Text Color', 'advanced-elements' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => array(
					'{{WRAPPER}} ' . '.advanced-pricing-list-item .advanced-pricing-list-text' => 'color: {{VALUE}}',
				),
			)
		);
		$this->add_control(
			'style_icon_list_text_hover_color',
			array(
				'label'     => esc_html__( 'Text Hover Color', 'advanced-elements' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => array(
					'{{WRAPPER}} ' . '.advanced-pricing-list-item a:hover .advanced-pricing-list-text' => 'color: {{VALUE}}',
				),
			)
		);
		$this->add_control(
			'style_icon_list_icon_size',
			array(
				'label'   => esc_html__( 'Icon Size', 'advanced-elements' ),
				'type'    => Controls_Manager::SLIDER,
				'default' => array(
					'size'  => 14,
					'unit'  => 'px',
				),
				'range'   => array(
					'px'    => array(
						'min' => 6,
						'max' => 90,
					),
				),
				'selectors' => array(
					'{{WRAPPER}} ' . '.advanced-pricing-list-icon i'         => 'font-size: {{SIZE}}{{UNIT}};',
					'{{WRAPPER}} ' . '.advanced-pricing-list-icon i::before' => 'font-size: {{SIZE}}{{UNIT}};',
				),
			)
		);
		$this->add_control(
			'style_icon_list_icon_color',
			array(
				'label'     => esc_html__( 'Icon Color', 'advanced-elements' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => array(
					'{{WRAPPER}} ' . '.advanced-pricing-list-icon i::before' => 'color: {{VALUE}}',
				),
			)
		);
		$this->add_control(
			'style_icon_list_icon_hover_color',
			array(
				'label'     => esc_html__( 'Icon Hover Color', 'advanced-elements' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => array(
					'{{WRAPPER}} ' . '.advanced-pricing-list-item a:hover .advanced-pricing-list-icon i::before' => 'color: {{VALUE}}',
				),
			)
		);
		$this->add_control(
			'style_icon_list_between',
			array(
				'label'   => esc_html__( 'List Space Between', 'advanced-elements' ),
				'type'    => Controls_Manager::SLIDER,
				'default' => array(
					'size'  => 0,
					'unit'  => 'px',
				),
				'range'   => array(
					'px'    => array(
						'min' => 0,
						'max' => 100,
					),
				),
				'selectors' => array(
					'{{WRAPPER}} ' . '.advanced-pricing-list-item' => 'padding-bottom: {{SIZE}}{{UNIT}};',
				),
			)
		);
		$this->add_responsive_control(
			'style_icon_list_alignment',
			array(
				'label'     => esc_html__( 'Alignment', 'advanced-elements' ),
				'type'      => Controls_Manager::CHOOSE,
				'default'   => 'center',
				'options'   => array(
					'left'    => array(
						'title' => esc_html__( 'Left', 'advanced-elements' ),
						'icon'  => 'eicon-h-align-left',
					),
					'center'  => array(
						'title' => esc_html__( 'Center', 'advanced-elements' ),
						'icon'  => 'eicon-h-align-center',
					),
					'right'   => array(
						'title' => esc_html__( 'Right', 'advanced-elements' ),
						'icon'  => 'eicon-h-align-right',
					),
				),
				'selectors' => array(
					'{{WRAPPER}} ' . '.advanced-pricing-list' => 'text-align: {{VALUE}};',
				),
			)
		);
		$this->add_control(
			'style_icon_list_bg_color',
			array(
				'label'     => esc_html__( 'Background Color', 'advanced-elements' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => array(
					'{{WRAPPER}} ' . '.advanced-pricing-list-box' => 'background-color: {{VALUE}}',
				),
			)
		);
		$this->add_responsive_control(
			'style_icon_list_padding',
			array(
				'label'      => esc_html__( 'Padding', 'advanced-elements' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => array( 'px', '%', 'em' ),
				'selectors'  => array(
					'{{WRAPPER}} ' . '.advanced-pricing-list-box' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				),
			)
		);
		$this->add_responsive_control(
			'style_icon_list_margin',
			array(
				'label'      => esc_html__( 'Margin', 'advanced-elements' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => array( 'px', '%', 'em' ),
				'selectors'  => array(
					'{{WRAPPER}} ' . '.advanced-pricing-list-box' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				),
			)
		);
		$this->end_controls_section();

		$this->start_controls_section(
			'style_desc',
			array(
				'label' => esc_html__( 'Description', 'advanced-elements' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			)
		);
		$this->add_control(
			'style_desc_heading',
			array(
				'label' => esc_html__( 'Text', 'advanced-elements' ),
				'type'  => Controls_Manager::HEADING,
			)
		);
		$this->add_control(
			'style_desc_color',
			array(
				'label'   => esc_html__( 'Color', 'advanced-elements' ),
				'type'    => Controls_Manager::COLOR,
				'scheme'  => array(
					'type'  => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_2,
				),
				'selectors' => array(
					'{{WRAPPER}} ' . '.advanced-pricing-description' => 'color: {{VALUE}};'
				),
			)
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			array(
				'name'     => 'style_desc_typography',
				'scheme'   => Scheme_Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} ' . '.advanced-pricing-description',
			)
		);
		$this->add_control(
			'style_desc_container_head',
			array(
				'label' => esc_html__( 'Container', 'advanced-elements' ),
				'type'  => Controls_Manager::HEADING,
			)
		);
		$this->add_group_control(
			Group_Control_Background::get_type(),
			array(
				'name'     => 'style_desc_bg',
				'selector' => '{{WRAPPER}} ' . '.advanced-pricing-description',
			)
		);
		$this->add_responsive_control(
			'style_desc_padding',
			array(
				'label'      => esc_html__( 'Padding', 'advanced-elements' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => array( 'px', 'em', '%' ),
				'selectors'  => array(
					'{{WRAPPER}} ' . '.advanced-pricing-description' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				),
			)
		);
		$this->add_responsive_control(
			'style_desc_margin',
			array(
				'label'      => esc_html__( 'Margin', 'advanced-elements' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => array( 'px', 'em', '%' ),
				'selectors'  => array(
					'{{WRAPPER}} ' . '.advanced-pricing-description' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				),
			)     
		);
		$this->end_controls_section();

		$this->start_controls_section(
			'style_btn',
			array(
				'label'      => esc_html__( 'Button', 'advanced-elements' ),
				'tab'        => Controls_Manager::TAB_STYLE,
				'show_label' => false,
			)
		);
		$this->start_controls_tabs( 'style_btn_tabs' );
		$this->start_controls_tab(
			'style_btn_normal',
			array(
				'label' => esc_html__( 'Normal', 'advanced-elements' ),
			)
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			array(
				'name'     => 'style_btn_typography',
				'scheme'   => Scheme_Typography::TYPOGRAPHY_4,
				'selector' => '{{WRAPPER}}  ' . '.advanced-pricing-button .pricing-btn',
			)
		);
		$this->add_control(
			'style_btn_color',
			array(
				'label'     => esc_html__( 'Text Color', 'advanced-elements' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => array(
					'{{WRAPPER}} ' . '.advanced-pricing-button .pricing-btn' => 'color: {{VALUE}}',
				),
			)
		);
		$this->add_control(
			'style_btn_bg_color',
			array(
				'label'     => esc_html__( 'Background Color', 'advanced-elements' ),
				'type'      => Controls_Manager::COLOR,
				'scheme'    => array(
					'type'    => Scheme_Color::get_type(),
					'value'   => Scheme_Color::COLOR_4,
				),
				'selectors' => array(
					'{{WRAPPER}} ' . '.advanced-pricing-button .pricing-btn' => 'background-color: {{VALUE}}',
				),
			)
		);
		$this->add_responsive_control(
			'style_btn_padding',
			array(
				'label'      => esc_html__( 'Padding', 'advanced-elements' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => array( 'px', '%', 'em' ),
				'selectors'  => array(
					'{{WRAPPER}} ' . '.advanced-pricing-button .pricing-btn' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				),
			)
		);
		$this->add_group_control(
			Group_Control_Border::get_type(),
			array(
				'name'        => 'style_btn_border',
				'label'       => esc_html__( 'Border', 'advanced-elements' ),
				'placeholder' => '1px',
				'default'     => '1px',
				'selector'    => '{{WRAPPER}} ' . '.advanced-pricing-button .pricing-btn',
			)
		);
		$this->add_responsive_control(
			'style_btn_border_radius',
			array(
				'label'      => esc_html__( 'Border Radius', 'advanced-elements' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => array( 'px', '%' ),
				'selectors'  => array(
					'{{WRAPPER}} ' . '.advanced-pricing-button .pricing-btn' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				),
			)
		);
		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			array(
				'name'     => 'style_btn_shadow',
				'selector' => '{{WRAPPER}} ' . '.advanced-pricing-button .pricing-btn',
			)
		);
		$this->end_controls_tab();
		$this->start_controls_tab(
			'style_btn_hover',
			array(
				'label' => esc_html__( 'Hover', 'advanced-elements' ),
			)
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			array(
				'name'     => 'style_btn_typography_hover',
				'scheme'   => Scheme_Typography::TYPOGRAPHY_4,
				'selector' => '{{WRAPPER}}  ' . '.advanced-pricing-button .pricing-btn:hover',
			)
		);
		$this->add_control(
			'style_btn_color_hover',
			array(
				'label'     => esc_html__( 'Text Color', 'advanced-elements' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => array(
					'{{WRAPPER}} ' . '.advanced-pricing-button .pricing-btn:hover' => 'color: {{VALUE}}',
				),
			)
		);
		$this->add_control(
			'style_btn_bg_color_hover',
			array(
				'label'     => esc_html__( 'Background Color', 'advanced-elements' ),
				'type'      => Controls_Manager::COLOR,
				'scheme'    => array(
					'type'    => Scheme_Color::get_type(),
					'value'   => Scheme_Color::COLOR_4,
				),
				'selectors' => array(
					'{{WRAPPER}} ' . '.advanced-pricing-button .pricing-btn:hover' => 'background-color: {{VALUE}}',
				),
			)
		);
		$this->add_responsive_control(
			'style_btn_padding_hover',
			array(
				'label'      => esc_html__( 'Padding', 'advanced-elements' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => array( 'px', '%', 'em' ),
				'selectors'  => array(
					'{{WRAPPER}} ' . '.advanced-pricing-button .pricing-btn:hover' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				),
			)
		);
		$this->add_group_control(
			Group_Control_Border::get_type(),
			array(
				'name'        => 'style_btn_border_hover',
				'label'       => esc_html__( 'Border', 'advanced-elements' ),
				'placeholder' => '1px',
				'default'     => '1px',
				'selector'    => '{{WRAPPER}} ' . '.advanced-pricing-button .pricing-btn:hover',
			)
		);
		$this->add_responsive_control(
			'style_btn_border_radius_hover',
			array(
				'label'      => esc_html__( 'Border Radius', 'advanced-elements' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => array( 'px', '%' ),
				'selectors'  => array(
					'{{WRAPPER}} ' . '.advanced-pricing-button .pricing-btn:hover' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				),
			)
		);
		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			array(
				'name'     => 'style_btn_shadow_hover',
				'selector' => '{{WRAPPER}} ' . '.advanced-pricing-button .pricing-btn:hover',
			)
		);
		$this->end_controls_tab();
		$this->end_controls_tabs();
		$this->add_responsive_control(
			'style_btn_alignment',
			array(
				'label'     => esc_html__( 'Alignment', 'advanced-elements' ),
				'type'      => Controls_Manager::CHOOSE,
				'default'   => 'center',
				'options'   => array(
					'start'   => array(
						'title' => esc_html__( 'Left', 'advanced-elements' ),
						'icon'  => 'fa fa-align-left',
					),
					'center'  => array(
						'title' => esc_html__( 'Center', 'advanced-elements' ),
						'icon'  => 'fa fa-align-center',
					),
					'end'     => array(
						'title' => esc_html__( 'Right', 'advanced-elements' ),
						'icon'  => 'fa fa-align-right',
					),
				),
				'selectors' => array(
					'{{WRAPPER}} ' . '.advanced-pricing-button' => 'justify-content: {{VALUE}};',
				),
			)
		);
		$this->add_control(
			'style_btn_box_head',
			array(
				'label'     => esc_html__( 'Button Box', 'advanced-elements' ),
				'type'      => Controls_Manager::HEADING,
				'separator' => 'before',
			)
		);
		$this->add_control(
			'style_btn_box_bg_color',
			array(
				'label'     => esc_html__( 'Box Background Color', 'advanced-elements' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => array(
					'{{WRAPPER}} ' . '.advanced-pricing-button' => 'background-color: {{VALUE}}',
				),
			)
		);
		$this->add_responsive_control(
			'style_btn_box_padding',
			array(
				'label'      => esc_html__( 'Padding', 'advanced-elements' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => array( 'px', '%', 'em' ),
				'selectors'  => array(
					'{{WRAPPER}} ' . '.advanced-pricing-button' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				),
			)
		);
		$this->add_responsive_control(
			'style_btn_box_margin',
			array(
				'label'      => esc_html__( 'Margin', 'advanced-elements' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => array( 'px', '%', 'em' ),
				'selectors'  => array(
					'{{WRAPPER}} ' . '.advanced-pricing-button' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				),
			)
		);
		$this->end_controls_section();
	}

	protected function render() {
		$settings = $this->get_settings_for_display();

		?>
		 <div class="advanced-pricing-table">
		 	<?php if( 'yes' === $settings['pricing_featured'] ) : ?>
				<?php echo sprintf( '<img src="%1$s" alt="badge" class="advanced-pricing-badge">', $settings['pricing_featured_badge']['url'] ); ?>
			<?php endif; ?>

			<div class="advanced-pricing-title-box">
				<?php echo sprintf( '<div class="advanced-pricing-icon"><i class="%1$s"></i></div>', $settings['pricing_icon'] ); ?>
				<?php echo sprintf( '<h5 class="advanced-pricing-before-title">%1$s</h5>', $settings['pricing_before_title'] ); ?>
				<?php echo sprintf( '<h2 class="advanced-pricing-title">%1$s</h2>', $settings['pricing_title'] ); ?>
				<?php echo sprintf( '<h5 class="advanced-pricing-after-title">%1$s</h5>', $settings['pricing_after_title'] ); ?>
			</div>
			<div class="advanced-pricing-price-box">
				<?php echo sprintf( '<span class="advanced-pricing-before-price">%1$s</span>', $settings['price_before_settings'] ); ?>
				<?php echo sprintf( '<span class="advanced-pricing-price">%1$s</span>', $settings['price_settings'] ); ?>
				<?php echo sprintf( '<span class="advanced-pricing-after-price">%1$s</span>', $settings['price_after_settings'] ); ?>
			</div>
			
			<?php if( 'yes' === $settings['pricing_list_show'] ) : ?>
				<div class="advanced-pricing-list-box">
					<ul class="advanced-pricing-list">
					<?php
						foreach ( $settings['pricing_features_list'] as $index => $item ) :
							$repeater_setting_key = $this->get_repeater_setting_key( 'item_text', 'pricing_features_list', $index );
							$this->add_render_attribute( $repeater_setting_key, 'class', 'advanced-pricing-list-text' );
							$this->add_inline_editing_attributes( $repeater_setting_key );
					?>
						<li class="advanced-pricing-list-item" >
							<?php
								if ( !empty( $item['item_link']['url'] ) ) {
									$link_key = 'link_' . $index;
									$this->add_render_attribute( $link_key, 'href', $item['item_link']['url'] );
									if ( $item['item_link']['is_external'] ) {
										$this->add_render_attribute( $link_key, 'target', '_blank' );
									}
									if ( $item['item_link']['nofollow'] ) {
										$this->add_render_attribute( $link_key, 'rel', 'nofollow' );
									}
									echo '<a ' . $this->get_render_attribute_string( $link_key ) . '>';
								}
							?>
							<?php if ( !empty( $item['item_icon'] ) ) : ?>
								<span class="advanced-pricing-list-icon">
									<i class="<?php echo esc_attr( $item['item_icon'] ); ?>"></i>
								</span>
							<?php endif; ?>
							<span <?php echo $this->get_render_attribute_string( $repeater_setting_key ); ?>><?php echo $item['item_text']; ?></span>
							<?php if ( ! empty( $item['item_link']['url'] ) ) : ?>
								</a>
							<?php endif; ?>
						</li>
					<?php endforeach; ?>
					</ul>
				</div>
			<?php endif; ?>

			<?php if( 'yes' === $settings['pricing_description_show'] && !empty( $settings['pricing_description'] ) ) : ?>
				<?php echo sprintf( '<div class="advanced-pricing-description">%1$s</div>', $settings['pricing_description'] ); ?>
			<?php endif; ?>

			<?php if( !empty($settings['pricing_button']) ) : ?>
				<div class="advanced-pricing-button">
					<?php
						if ( !empty( $settings['pricing_button_url']['url'] ) ) {
							if( $settings['pricing_button_url']['is_external'] ) {
								$this->add_render_attribute( 'pricing_button_link', 'target', '_blank' );
							}
							if( $settings['pricing_button_url']['nofollow'] ) {
								$this->add_render_attribute( 'pricing_button_link', 'rel', 'nofollow' );
							}
						}
					?>
					<?php echo sprintf( '<a class="pricing-btn" href="%1$s" %2$s>%3$s</a>', $settings['pricing_button_url']['url']?$settings['pricing_button_url']['url']:'#', $this->get_render_attribute_string( 'pricing_button_link' ), $settings['pricing_button'] ); ?>
				</div>
			<?php endif; ?>

		 </div>
		<?php
	}

	public function get_featured_badge_img() {
		return advanced_elements()->plugin_url( 'assets/images/shield.png' );
	}
}