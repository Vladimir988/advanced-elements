<?php
namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit;

class Advanced_Animated_Box extends Widget_Base {

	public function get_name() {
		return 'advanced-animated-box';
	}

	public function get_title() {
		return esc_html__( 'Animated Box', 'advanced-elements' );
	}

	public function get_icon() {
		return 'eicon-flip-box';
	}

	public function get_categories() {
		return array( 'advanced-elements' );
	}

	protected function _register_controls() {
		$this->start_controls_section(
			'anim_box_content',
			array(
				'label'      => esc_html__( 'Content', 'advanced-elements' ),
				'tab'        => Controls_Manager::TAB_LAYOUT,
				'show_label' => false,
			)
		);
		$this->start_controls_tabs( 'anim_box_tabs' );
		$this->start_controls_tab(
			'anim_box_front',
			array(
				'label' => esc_html__( 'Front Side', 'advanced-elements' ),
			)
		);
		$this->add_control(
			'anim_box_front_icon',
			array(
				'label'   => esc_html__( 'Icon', 'advanced-elements' ),
				'type'    => Controls_Manager::ICON,
				'file'    => '',
				'default' => 'fa fa-first-order',
			)
		);
		$this->add_control(
			'anim_box_front_title',
			array(
				'label'   => esc_html__( 'Title', 'advanced-elements' ),
				'type'    => Controls_Manager::TEXT,
				'default' => esc_html__( 'Title', 'advanced-elements' ),
			)
		);
		$this->add_control(
			'anim_box_front_subtitle',
			array(
				'label'   => esc_html__( 'Subtitle', 'advanced-elements' ),
				'type'    => Controls_Manager::TEXT,
				'default' => esc_html__( 'Subtitle', 'advanced-elements' ),
			)
		);
		$this->add_control(
			'anim_box_front_descr',
			array(
				'label'     => esc_html__( 'Description', 'advanced-elements' ),
				'type'      => Controls_Manager::TEXTAREA,
				'default'   => esc_html__( 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Culpa, nam?', 'advanced-elements' ),
			)
		);
		$this->add_control(
			'anim_box_front_badge_show',
			array(
				'label'        => esc_html__( 'Show Badge?', 'advanced-elements' ),
				'type'         => Controls_Manager::SWITCHER,
				'label_on'     => esc_html__( 'Yes', 'advanced-elements' ),
				'label_off'    => esc_html__( 'No', 'advanced-elements' ),
				'return_value' => 'yes',
				'default'      => 'no',
			)
		);
		$this->add_control(
			'anim_box_front_badge',
			array(
				'label'   => esc_html__( 'Featured Badge', 'advanced-elements' ),
				'type'    => Controls_Manager::MEDIA,
				'default' => array(
					'url'   => $this->get_featured_badge_img(),
				),
				'condition' => array(
					'anim_box_front_badge_show' => 'yes',
				),
			)
		);
		$this->add_control(
			'anim_box_front_badge_position',
			array(
				'label'   => esc_html__( 'Badge Postition', 'advanced-elements' ),
				'type'    => Controls_Manager::SELECT,
				'default' => 'left',
				'options' => array(
					'left'  => esc_html__( 'Left', 'advanced-elements' ),
					'right' => esc_html__( 'Right', 'advanced-elements' ),
				),
				'condition' => array(
					'anim_box_front_badge_show' => 'yes',
				),
			)
		);
		$this->add_responsive_control(
			'anim_box_front_badge_left',
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
				'condition'  => array(
					'anim_box_front_badge_position' => 'left',
					'anim_box_front_badge_show'     => 'yes',
				),
				'selectors'  => array(
					'{{WRAPPER}} .anim-box-front-badge' => 'left: {{SIZE}}{{UNIT}}; right: auto;',
				),
			)
		);
		$this->add_responsive_control(
			'anim_box_front_badge_right',
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
				'condition'  => array(
					'anim_box_front_badge_position' => 'right',
					'anim_box_front_badge_show'     => 'yes',
				),
				'selectors'  => array(
					'{{WRAPPER}} .anim-box-front-badge' => 'right: {{SIZE}}{{UNIT}}; left: auto;',
				),
			)
		);
		$this->add_responsive_control(
			'anim_box_front_badge_top',
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
					'{{WRAPPER}} .anim-box-front-badge' => 'top: {{SIZE}}{{UNIT}};',
				),
				'condition'  => array(
					'anim_box_front_badge_show' => 'yes',
				),
			)
		);
		$this->end_controls_tab();
		$this->start_controls_tab(
			'anim_box_back',
			array(
				'label' => esc_html__( 'Back Side', 'advanced-elements' ),
			)
		);
		$this->add_control(
			'anim_box_back_icon',
			array(
				'label'   => esc_html__( 'Icon', 'advanced-elements' ),
				'type'    => Controls_Manager::ICON,
				'file'    => '',
				'default' => 'fa fa-first-order',
			)
		);
		$this->add_control(
			'anim_box_back_title',
			array(
				'label'   => esc_html__( 'Title', 'advanced-elements' ),
				'type'    => Controls_Manager::TEXT,
				'default' => esc_html__( 'Back Side Title', 'advanced-elements' ),
			)
		);
		$this->add_control(
			'anim_box_back_subtitle',
			array(
				'label'   => esc_html__( 'Subtitle', 'advanced-elements' ),
				'type'    => Controls_Manager::TEXT,
				'default' => esc_html__( 'Back Side Subtitle', 'advanced-elements' ),
			)
		);
		$this->add_control(
			'anim_box_back_descr',
			array(
				'label'   => esc_html__( 'Description', 'advanced-elements' ),
				'type'    => Controls_Manager::TEXTAREA,
				'default' => esc_html__( 'Back Side Description! Lorem ipsum dolor sit amet, consectetur adipisicing elit. Culpa, nam?', 'advanced-elements' ),
			)
		);
		$this->add_control(
			'anim_box_back_btn_show',
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
			'anim_box_back_btn',
			array(
				'label'     => esc_html__( 'Button Text', 'advanced-elements' ),
				'type'      => Controls_Manager::TEXT,
				'default'   => esc_html__( 'Read more', 'advanced-elements' ),
				'condition' => array(
					'anim_box_back_btn_show' => 'yes',
				),
			)
		);
		$this->add_control(
			'anim_box_back_btn_url',
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
					'anim_box_back_btn_show' => 'yes',
				),
			)
		);
		$this->add_control(
			'anim_box_back_badge_show',
			array(
				'label'        => esc_html__( 'Show Badge?', 'advanced-elements' ),
				'type'         => Controls_Manager::SWITCHER,
				'label_on'     => esc_html__( 'Yes', 'advanced-elements' ),
				'label_off'    => esc_html__( 'No', 'advanced-elements' ),
				'return_value' => 'yes',
				'default'      => 'no',
			)
		);
		$this->add_control(
			'anim_box_back_badge',
			array(
				'label'   => esc_html__( 'Featured Badge', 'advanced-elements' ),
				'type'    => Controls_Manager::MEDIA,
				'default' => array(
					'url'   => $this->get_featured_badge_img(),
				),
				'condition' => array(
					'anim_box_back_badge_show' => 'yes',
				),
			)
		);
		$this->add_control(
			'anim_box_back_badge_position',
			array(
				'label'   => esc_html__( 'Featured Postition', 'advanced-elements' ),
				'type'    => Controls_Manager::SELECT,
				'default' => 'right',
				'options' => array(
					'left'  => esc_html__( 'Left', 'advanced-elements' ),
					'right' => esc_html__( 'Right', 'advanced-elements' ),
				),
				'condition' => array(
					'anim_box_back_badge_show' => 'yes',
				),
			)
		);
		$this->add_responsive_control(
			'anim_box_back_badge_left',
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
				'condition'  => array(
					'anim_box_back_badge_position' => 'left',
					'anim_box_back_badge_show'     => 'yes',
				),
				'selectors'  => array(
					'{{WRAPPER}} .anim-box-back-badge' => 'left: {{SIZE}}{{UNIT}}; right: auto;',
				),
			)
		);
		$this->add_responsive_control(
			'anim_box_back_badge_right',
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
				'condition'  => array(
					'anim_box_back_badge_position' => 'right',
					'anim_box_back_badge_show'     => 'yes',
				),
				'selectors'  => array(
					'{{WRAPPER}} .anim-box-back-badge' => 'right: {{SIZE}}{{UNIT}}; left: auto;',
				),
			)
		);
		$this->add_responsive_control(
			'anim_box_back_badge_top',
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
					'{{WRAPPER}} .anim-box-back-badge' => 'top: {{SIZE}}{{UNIT}};',
				),
				'condition'  => array(
					'anim_box_back_badge_show' => 'yes',
				),
			)
		);
		$this->end_controls_tab();
		$this->end_controls_tabs();

		$this->add_control(
			'anim_box_settings',
			array(
				'label'     => esc_html__( 'Settings', 'advanced-elements' ),
				'type'      => Controls_Manager::HEADING,
				'separator' => 'before',
			)
		);
		$this->add_control(
			'anim_box_back_show',
			array(
				'label'        => esc_html__( 'Show Back Side?', 'advanced-elements' ),
				'type'         => Controls_Manager::SWITCHER,
				'label_on'     => esc_html__( 'Yes', 'advanced-elements' ),
				'label_off'    => esc_html__( 'No', 'advanced-elements' ),
				'return_value' => 'yes',
				'default'      => 'no',
			)
		);
		$this->add_control(
			'anim_box_effect',
			array(
				'label'   => esc_html__( 'Animation Type', 'advanced-elements' ),
				'type'    => Controls_Manager::SELECT,
				'default' => 'advanced-effect-flip-vertical',
				'options' => array(
					'advanced-effect-flip-vertical'      => esc_html__( 'Flip Vertical', 'advanced-elements' ),
					'advanced-effect-flip-horizontal'    => esc_html__( 'Flip Horizontal', 'advanced-elements' ),
					'advanced-effect-flip-vertical-3d'   => esc_html__( 'Flip Vertical 3D', 'advanced-elements' ),
					'advanced-effect-flip-horizontal-3d' => esc_html__( 'Flip Horizontal 3D', 'advanced-elements' ),
					'advanced-effect-fall-up'            => esc_html__( 'Fall Up', 'advanced-elements' ),
					'advanced-effect-fall-right'         => esc_html__( 'Fall Right', 'advanced-elements' ),
					'advanced-effect-slide-down'         => esc_html__( 'Slide Down', 'advanced-elements' ),
					'advanced-effect-slide-right'        => esc_html__( 'Slide Right', 'advanced-elements' ),
				),
			)
		);
		$this->end_controls_section();

		$this->start_controls_section(
			'anim_box_style_general',
			array(
				'label'      => esc_html__( 'General', 'advanced-elements' ),
				'tab'        => Controls_Manager::TAB_STYLE,
				'show_label' => false,
			)
		);
		$this->add_responsive_control(
			'anim_box_height',
			array(
				'label'   => esc_html__( 'Height', 'advanced-elements' ),
				'type'    => Controls_Manager::SLIDER,
				'range'   => array(
					'px'    => array(
						'min' => 100,
						'max' => 1000,
					),
				),
				'default' => array(
					'size'  => 270,
				),
				'selectors' => array(
					'{{WRAPPER}} '. '.advanced-animated-box' => 'height: {{SIZE}}{{UNIT}};',
				),
			)
		);
		$this->start_controls_tabs( 'general_style_tabs' );
		$this->start_controls_tab(
			'tab_front_general_styles',
			array(
				'label' => esc_html__( 'Front Side', 'advanced-elements' ),
			)
		);
		$this->add_group_control(
			Group_Control_Background::get_type(),
			array(
				'name'           => 'front_general_background',
				'selector'       => '{{WRAPPER}} ' . '.advanced-animated-box-front',
				'fields_options' => array(
					'color'        => array(
						'scheme'     => array(
							'type'     => Scheme_Color::get_type(),
							'value'    => Scheme_Color::COLOR_1,
						),
					),
				),
			)
		);
		$this->add_group_control(
			Group_Control_Border::get_type(),
			array(
				'name'        => 'front_general_border',
				'label'       => esc_html__( 'Border', 'advanced-elements' ),
				'placeholder' => '1px',
				'default'     => '',
				'selector'    => '{{WRAPPER}} ' . '.advanced-animated-box-front',
			)
		);
		$this->add_responsive_control(
			'front_general_border_radius',
			array(
				'label'      => esc_html__( 'Border Radius', 'advanced-elements' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => array( 'px', '%' ),
				'selectors'  => array(
					'{{WRAPPER}} ' . '.advanced-animated-box-front' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				),
			)
		);
		$this->add_responsive_control(
			'front_general_padding',
			array(
				'label'      => esc_html__( 'Padding', 'advanced-elements' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => array( 'px', '%' ),
				'selectors'  => array(
					'{{WRAPPER}} ' . '.advanced-animated-box-front' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				),
			)
		);
		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			array(
				'name'     => 'front_general_box_shadow',
				'selector' => '{{WRAPPER}} ' . '.advanced-animated-box-front',
			)
		);
		$this->end_controls_tab();

		$this->start_controls_tab(
			'tab_back_general_styles',
			array(
				'label' => esc_html__( 'Back Side', 'advanced-elements' ),
			)
		);
		$this->add_group_control(
			Group_Control_Background::get_type(),
			array(
				'name'           => 'back_general_background',
				'selector'       => '{{WRAPPER}} ' . '.advanced-animated-box-back',
				'fields_options' => array(
					'color'        => array(
						'scheme'     => array(
							'type'     => Scheme_Color::get_type(),
							'value'    => Scheme_Color::COLOR_1,
						),
					),
				),
			)
		);
		$this->add_group_control(
			Group_Control_Border::get_type(),
			array(
				'name'        => 'back_general_border',
				'label'       => esc_html__( 'Border', 'advanced-elements' ),
				'placeholder' => '1px',
				'default'     => '',
				'selector'    => '{{WRAPPER}} ' . '.advanced-animated-box-back',
			)
		);
		$this->add_responsive_control(
			'back_general_border_radius',
			array(
				'label'      => esc_html__( 'Border Radius', 'advanced-elements' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => array( 'px', '%' ),
				'selectors'  => array(
					'{{WRAPPER}} ' . '.advanced-animated-box-back' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				),
			)
		);
		$this->add_responsive_control(
			'back_general_padding',
			array(
				'label'      => esc_html__( 'Padding', 'advanced-elements' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => array( 'px', '%' ),
				'selectors'  => array(
					'{{WRAPPER}} ' . '.advanced-animated-box-back' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				),
			)
		);
		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			array(
				'name'     => 'back_general_box_shadow',
				'selector' => '{{WRAPPER}} ' . '.advanced-animated-box-back',
			)
		);
		$this->end_controls_tab();
		$this->end_controls_tabs();
		$this->end_controls_section();

		$this->start_controls_section(
			'anim_box_style_icon',
			array(
				'label'      => esc_html__( 'Icon', 'advanced-elements' ),
				'tab'        => Controls_Manager::TAB_STYLE,
				'show_label' => false,
			)
		);
		$this->start_controls_tabs( 'icon_style_tabs' );
		$this->start_controls_tab(
			'tab_front_icon_styles',
			array(
				'label' => esc_html__( 'Front Side', 'advanced-elements' ),
			)
		);
		$this->add_control(
			'front_icon_color',
			array(
				'label'     => esc_html__( 'Icon Color', 'advanced-elements' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => array(
					'{{WRAPPER}} ' . '.advanced-animated-box-front .advanced-animated-box-icon-inner' . ' i:before' => 'color: {{VALUE}}',
				),
			)
		);
		$this->add_control(
			'front_icon_bg_color',
			array(
				'label'     => esc_html__( 'Icon Background Color', 'advanced-elements' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => array(
					'{{WRAPPER}} ' . '.advanced-animated-box-front .advanced-animated-box-icon-inner' => 'background-color: {{VALUE}}',
				),
			)
		);
		$this->add_responsive_control(
			'front_icon_font_size',
			array(
				'label'      => esc_html__( 'Icon Font Size', 'advanced-elements' ),
				'type'       => Controls_Manager::SLIDER,
				'size_units' => array(
					'px', 'em', 'rem',
				),
				'range'      => array(
					'px'       => array(
						'min'    => 18,
						'max'    => 200,
					),
				),
				'selectors'  => array(
					'{{WRAPPER}} ' . '.advanced-animated-box-front .advanced-animated-box-icon-inner' . ' i'        => 'font-size: {{SIZE}}{{UNIT}}',
					'{{WRAPPER}} ' . '.advanced-animated-box-front .advanced-animated-box-icon-inner' . ' i:before' => 'font-size: {{SIZE}}{{UNIT}}',
				),
			)
		);
		$this->add_responsive_control(
			'front_icon_size',
			array(
				'label'      => esc_html__( 'Icon Box Size', 'advanced-elements' ),
				'type'       => Controls_Manager::SLIDER,
				'size_units' => array(
					'px', 'em', '%',
				),
				'range'      => array(
					'px'       => array(
						'min'    => 10,
						'max'    => 200,
					),
				),
				'selectors'  => array(
					'{{WRAPPER}} ' . '.advanced-animated-box-front .advanced-animated-box-icon-inner' => 'width: {{SIZE}}{{UNIT}}; height: {{SIZE}}{{UNIT}};',
				),
			)
		);
		$this->add_group_control(
			Group_Control_Border::get_type(),
			array(
				'name'        => 'front_icon_border',
				'label'       => esc_html__( 'Border', 'advanced-elements' ),
				'placeholder' => '1px',
				'default'     => '1px',
				'selector'    => '{{WRAPPER}} ' . '.advanced-animated-box-front .advanced-animated-box-icon-inner',
			)
		);
		$this->add_control(
			'front_icon_box_border_radius',
			array(
				'label'      => esc_html__( 'Border Radius', 'advanced-elements' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => array( 'px', '%' ),
				'selectors'  => array(
					'{{WRAPPER}} ' . '.advanced-animated-box-front .advanced-animated-box-icon-inner' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				),
			)
		);
		$this->add_responsive_control(
			'front_icon_box_margin',
			array(
				'label'      => __( 'Margin', 'advanced-elements' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => array( 'px', '%' ),
				'selectors'  => array(
					'{{WRAPPER}} ' . '.advanced-animated-box-front .advanced-animated-box-icon-inner' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				),
			)
		);
		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			array(
				'name'     => 'front_icon_box_shadow',
				'selector' => '{{WRAPPER}} ' . '.advanced-animated-box-front .advanced-animated-box-icon-inner',
			)
		);
		$this->add_responsive_control(
			'front_icon_box_alignment',
			array(
				'label'        => esc_html__( 'Alignment', 'advanced-elements' ),
				'type'         => Controls_Manager::CHOOSE,
				'default'      => 'center',
				'options'      => array(
					'flex-start' => array(
						'title'    => esc_html__( 'Left', 'advanced-elements' ),
						'icon'     => 'fa fa-align-left',
					),
					'center'     => array(
						'title'    => esc_html__( 'Center', 'advanced-elements' ),
						'icon'     => 'fa fa-align-center',
					),
					'flex-end'   => array(
						'title'    => esc_html__( 'Right', 'advanced-elements' ),
						'icon'     => 'fa fa-align-right',
					),
				),
				'selectors'    => array(
					'{{WRAPPER}} ' . '.advanced-animated-box-front .advanced-animated-box-icon' => 'justify-content: {{VALUE}};',
				),
			)
		);
		$this->end_controls_tab();

		$this->start_controls_tab(
			'tab_back_icon_styles',
			array(
				'label' => esc_html__( 'Back Side', 'advanced-elements' ),
			)
		);
		$this->add_control(
			'back_icon_color',
			array(
				'label'     => esc_html__( 'Icon Color', 'advanced-elements' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => array(
					'{{WRAPPER}} ' . '.advanced-animated-box-back .advanced-animated-box-icon-inner' . ' i:before' => 'color: {{VALUE}}',
				),
			)
		);
		$this->add_control(
			'back_icon_bg_color',
			array(
				'label'     => esc_html__( 'Icon Background Color', 'advanced-elements' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => array(
					'{{WRAPPER}} ' . '.advanced-animated-box-back .advanced-animated-box-icon-inner' => 'background-color: {{VALUE}}',
				),
			)
		);
		$this->add_responsive_control(
			'back_icon_font_size',
			array(
				'label'      => esc_html__( 'Icon Font Size', 'advanced-elements' ),
				'type'       => Controls_Manager::SLIDER,
				'size_units' => array(
					'px', 'em', 'rem',
				),
				'range'      => array(
					'px'       => array(
						'min'    => 18,
						'max'    => 200,
					),
				),
				'selectors'  => array(
					'{{WRAPPER}} ' . '.advanced-animated-box-back .advanced-animated-box-icon-inner' . ' i'        => 'font-size: {{SIZE}}{{UNIT}}',
					'{{WRAPPER}} ' . '.advanced-animated-box-back .advanced-animated-box-icon-inner' . ' i:before' => 'font-size: {{SIZE}}{{UNIT}}',
				),
			)
		);
		$this->add_responsive_control(
			'back_icon_size',
			array(
				'label'      => esc_html__( 'Icon Box Size', 'advanced-elements' ),
				'type'       => Controls_Manager::SLIDER,
				'size_units' => array(
					'px', 'em', '%',
				),
				'range'      => array(
					'px'       => array(
						'min'    => 10,
						'max'    => 200,
					),
				),
				'selectors'  => array(
					'{{WRAPPER}} ' . '.advanced-animated-box-back .advanced-animated-box-icon-inner' => 'width: {{SIZE}}{{UNIT}}; height: {{SIZE}}{{UNIT}};',
				),
			)
		);
		$this->add_group_control(
			Group_Control_Border::get_type(),
			array(
				'name'        => 'back_icon_border',
				'label'       => esc_html__( 'Border', 'advanced-elements' ),
				'placeholder' => '1px',
				'default'     => '1px',
				'selector'    => '{{WRAPPER}} ' . '.advanced-animated-box-back .advanced-animated-box-icon-inner',
			)
		);
		$this->add_control(
			'back_icon_box_border_radius',
			array(
				'label'      => esc_html__( 'Border Radius', 'advanced-elements' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => array( 'px', '%' ),
				'selectors'  => array(
					'{{WRAPPER}} ' . '.advanced-animated-box-back .advanced-animated-box-icon-inner' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				),
			)
		);
		$this->add_responsive_control(
			'back_icon_box_margin',
			array(
				'label'      => __( 'Margin', 'advanced-elements' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => array( 'px', '%' ),
				'selectors'  => array(
					'{{WRAPPER}} ' . '.advanced-animated-box-back .advanced-animated-box-icon-inner' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				),
			)
		);
		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			array(
				'name'     => 'back_icon_box_shadow',
				'selector' => '{{WRAPPER}} ' . '.advanced-animated-box-back .advanced-animated-box-icon-inner',
			)
		);
		$this->add_responsive_control(
			'back_icon_box_alignment',
			array(
				'label'        => esc_html__( 'Alignment', 'advanced-elements' ),
				'type'         => Controls_Manager::CHOOSE,
				'default'      => 'center',
				'options'      => array(
					'flex-start' => array(
						'title'    => esc_html__( 'Left', 'advanced-elements' ),
						'icon'     => 'fa fa-align-left',
					),
					'center'     => array(
						'title'    => esc_html__( 'Center', 'advanced-elements' ),
						'icon'     => 'fa fa-align-center',
					),
					'flex-end'   => array(
						'title'    => esc_html__( 'Right', 'advanced-elements' ),
						'icon'     => 'fa fa-align-right',
					),
				),
				'selectors'    => array(
					'{{WRAPPER}} ' . '.advanced-animated-box-back .advanced-animated-box-icon' => 'justify-content: {{VALUE}};',
				),
			)
		);
		$this->end_controls_tab();
		$this->end_controls_tabs();
		$this->end_controls_section();

		$this->start_controls_section(
			'anim_box_style_title',
			array(
				'label'      => esc_html__( 'Title', 'advanced-elements' ),
				'tab'        => Controls_Manager::TAB_STYLE,
				'show_label' => false,
			)
		);
		$this->start_controls_tabs( 'title_style_tabs' );
		$this->start_controls_tab(
			'tab_front_title_styles',
			array(
				'label' => esc_html__( 'Front Side', 'advanced-elements' ),
			)
		);
		$this->add_control(
			'front_title_color',
			array(
				'label'     => esc_html__( 'Title Color', 'advanced-elements' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => array(
					'{{WRAPPER}} ' . '.advanced-animated-box-front .advanced-animated-box-title' => 'color: {{VALUE}}',
				),
			)
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			array(
				'name'     => 'front_title_typography',
				'scheme'   => Scheme_Typography::TYPOGRAPHY_3,
				'selector' => '{{WRAPPER}} ' . '.advanced-animated-box-front .advanced-animated-box-title',
			)
		);
		$this->add_responsive_control(
			'front_title_padding',
			array(
				'label'      => __( 'Padding', 'advanced-elements' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => array( 'px', '%' ),
				'selectors'  => array(
					'{{WRAPPER}} ' . '.advanced-animated-box-front .advanced-animated-box-title' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				),
			)
		);
		$this->add_responsive_control(
			'front_title_margin',
			array(
				'label'      => __( 'Margin', 'advanced-elements' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => array( 'px', '%' ),
				'selectors'  => array(
					'{{WRAPPER}} ' . '.advanced-animated-box-front .advanced-animated-box-title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				),
			)
		);
		$this->add_responsive_control(
			'front_title_text_alignment',
			array(
				'label'   => esc_html__( 'Text Alignment', 'advanced-elements' ),
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
					'{{WRAPPER}} ' . '.advanced-animated-box-front .advanced-animated-box-title' => 'text-align: {{VALUE}};',
				),
			)
		);
		$this->end_controls_tab();

		$this->start_controls_tab(
			'tab_back_title_styles',
			array(
				'label' => esc_html__( 'Back Side', 'advanced-elements' ),
			)
		);
		$this->add_control(
			'back_title_color',
			array(
				'label'     => esc_html__( 'Title Color', 'advanced-elements' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => array(
					'{{WRAPPER}} ' . '.advanced-animated-box-back .advanced-animated-box-title' => 'color: {{VALUE}}',
				),
			)
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			array(
				'name'     => 'back_title_typography',
				'scheme'   => Scheme_Typography::TYPOGRAPHY_3,
				'selector' => '{{WRAPPER}} ' . '.advanced-animated-box-back .advanced-animated-box-title',
			)
		);
		$this->add_responsive_control(
			'back_title_padding',
			array(
				'label'      => __( 'Padding', 'advanced-elements' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => array( 'px', '%' ),
				'selectors'  => array(
					'{{WRAPPER}} ' . '.advanced-animated-box-back .advanced-animated-box-title' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				),
			)
		);
		$this->add_responsive_control(
			'back_title_margin',
			array(
				'label'      => __( 'Margin', 'advanced-elements' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => array( 'px', '%' ),
				'selectors'  => array(
					'{{WRAPPER}} ' . '.advanced-animated-box-back .advanced-animated-box-title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				),
			)
		);
		$this->add_responsive_control(
			'back_title_text_alignment',
			array(
				'label'   => esc_html__( 'Text Alignment', 'advanced-elements' ),
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
					'{{WRAPPER}} ' . '.advanced-animated-box-back .advanced-animated-box-title' => 'text-align: {{VALUE}};',
				),
			)
		);
		$this->end_controls_tab();
		$this->end_controls_tabs();
		$this->end_controls_section();

		$this->start_controls_section(
			'anim_box_style_subtitle',
			array(
				'label'      => esc_html__( 'Subtitle', 'advanced-elements' ),
				'tab'        => Controls_Manager::TAB_STYLE,
				'show_label' => false,
			)
		);
		$this->start_controls_tabs( 'subtitle_style_tabs' );
		$this->start_controls_tab(
			'tab_front_subtitle_styles',
			array(
				'label' => esc_html__( 'Front Side', 'advanced-elements' ),
			)
		);
		$this->add_control(
			'front_subtitle_color',
			array(
				'label'     => esc_html__( 'Subtitle Color', 'advanced-elements' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => array(
					'{{WRAPPER}} ' . '.advanced-animated-box-front .advanced-animated-box-subtitle' => 'color: {{VALUE}}',
				),
			)
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			array(
				'name'     => 'front_subtitle_typography',
				'scheme'   => Scheme_Typography::TYPOGRAPHY_3,
				'selector' => '{{WRAPPER}} ' . '.advanced-animated-box-front .advanced-animated-box-subtitle',
			)
		);
		$this->add_responsive_control(
			'front_subtitle_padding',
			array(
				'label'      => __( 'Padding', 'advanced-elements' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => array( 'px', '%' ),
				'selectors'  => array(
					'{{WRAPPER}} ' . '.advanced-animated-box-front .advanced-animated-box-subtitle' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				),
			)
		);
		$this->add_responsive_control(
			'front_subtitle_margin',
			array(
				'label'      => __( 'Margin', 'advanced-elements' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => array( 'px', '%' ),
				'selectors'  => array(
					'{{WRAPPER}} ' . '.advanced-animated-box-front .advanced-animated-box-subtitle' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				),
			)
		);
		$this->add_responsive_control(
			'front_subtitle_text_alignment',
			array(
				'label'   => esc_html__( 'Text Alignment', 'advanced-elements' ),
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
					'{{WRAPPER}} ' . '.advanced-animated-box-front .advanced-animated-box-subtitle' => 'text-align: {{VALUE}};',
				),
			)
		);
		$this->end_controls_tab();

		$this->start_controls_tab(
			'tab_back_subtitle_styles',
			array(
				'label' => esc_html__( 'Back Side', 'advanced-elements' ),
			)
		);
		$this->add_control(
			'back_subtitle_color',
			array(
				'label'     => esc_html__( 'Subtitle Color', 'advanced-elements' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => array(
					'{{WRAPPER}} ' . '.advanced-animated-box-back .advanced-animated-box-subtitle' => 'color: {{VALUE}}',
				),
			)
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			array(
				'name'     => 'back_subtitle_typography',
				'scheme'   => Scheme_Typography::TYPOGRAPHY_3,
				'selector' => '{{WRAPPER}} ' . '.advanced-animated-box-back .advanced-animated-box-subtitle',
			)
		);
		$this->add_responsive_control(
			'back_subtitle_padding',
			array(
				'label'      => __( 'Padding', 'advanced-elements' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => array( 'px', '%' ),
				'selectors'  => array(
					'{{WRAPPER}} ' . '.advanced-animated-box-back .advanced-animated-box-subtitle' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				),
			)
		);
		$this->add_responsive_control(
			'back_subtitle_margin',
			array(
				'label'      => __( 'Margin', 'advanced-elements' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => array( 'px', '%' ),
				'selectors'  => array(
					'{{WRAPPER}} ' . '.advanced-animated-box-back .advanced-animated-box-subtitle' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				),
			)
		);
		$this->add_responsive_control(
			'back_subtitle_text_alignment',
			array(
				'label'   => esc_html__( 'Text Alignment', 'advanced-elements' ),
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
					'{{WRAPPER}} ' . '.advanced-animated-box-back .advanced-animated-box-subtitle' => 'text-align: {{VALUE}};',
				),
			)
		);
		$this->end_controls_tab();
		$this->end_controls_tabs();
		$this->end_controls_section();

		$this->start_controls_section(
			'anim_box_style_description',
			array(
				'label'      => esc_html__( 'Description', 'advanced-elements' ),
				'tab'        => Controls_Manager::TAB_STYLE,
				'show_label' => false,
			)
		);
		$this->start_controls_tabs( 'description_style_tabs' );
		$this->start_controls_tab(
			'tab_front_description_styles',
			array(
				'label' => esc_html__( 'Front Side', 'advanced-elements' ),
			)
		);
		$this->add_control(
			'front_description_color',
			array(
				'label'     => esc_html__( 'Description Color', 'advanced-elements' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => array(
					'{{WRAPPER}} ' . '.advanced-animated-box-front .advanced-animated-box-description' => 'color: {{VALUE}}',
				),
			)
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			array(
				'name'     => 'front_description_typography',
				'scheme'   => Scheme_Typography::TYPOGRAPHY_3,
				'selector' => '{{WRAPPER}} ' . '.advanced-animated-box-front .advanced-animated-box-description',
			)
		);
		$this->add_responsive_control(
			'front_description_padding',
			array(
				'label'      => __( 'Padding', 'advanced-elements' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => array( 'px', '%' ),
				'selectors'  => array(
					'{{WRAPPER}} ' . '.advanced-animated-box-front .advanced-animated-box-description' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				),
			)
		);
		$this->add_responsive_control(
			'front_description_margin',
			array(
				'label'      => __( 'Margin', 'advanced-elements' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => array( 'px', '%' ),
				'selectors'  => array(
					'{{WRAPPER}} ' . '.advanced-animated-box-front .advanced-animated-box-description' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				),
			)
		);
		$this->add_responsive_control(
			'front_description_text_alignment',
			array(
				'label'   => esc_html__( 'Text Alignment', 'advanced-elements' ),
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
					'{{WRAPPER}} ' . '.advanced-animated-box-front .advanced-animated-box-description' => 'text-align: {{VALUE}};',
				),
			)
		);
		$this->end_controls_tab();

		$this->start_controls_tab(
			'tab_back_description_styles',
			array(
				'label' => esc_html__( 'Back Side', 'advanced-elements' ),
			)
		);
		$this->add_control(
			'back_description_color',
			array(
				'label'     => esc_html__( 'Subtitle Color', 'advanced-elements' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => array(
					'{{WRAPPER}} ' . '.advanced-animated-box-back .advanced-animated-box-description' => 'color: {{VALUE}}',
				),
			)
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			array(
				'name'     => 'back_description_typography',
				'scheme'   => Scheme_Typography::TYPOGRAPHY_3,
				'selector' => '{{WRAPPER}} ' . '.advanced-animated-box-back .advanced-animated-box-description',
			)
		);
		$this->add_responsive_control(
			'back_description_padding',
			array(
				'label'      => __( 'Padding', 'advanced-elements' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => array( 'px', '%' ),
				'selectors'  => array(
					'{{WRAPPER}} ' . '.advanced-animated-box-back .advanced-animated-box-description' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				),
			)
		);
		$this->add_responsive_control(
			'back_description_margin',
			array(
				'label'      => __( 'Margin', 'advanced-elements' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => array( 'px', '%' ),
				'selectors'  => array(
					'{{WRAPPER}} ' . '.advanced-animated-box-back .advanced-animated-box-description' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				),
			)
		);
		$this->add_responsive_control(
			'back_description_text_alignment',
			array(
				'label'   => esc_html__( 'Text Alignment', 'advanced-elements' ),
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
					'{{WRAPPER}} ' . '.advanced-animated-box-back .advanced-animated-box-description' => 'text-align: {{VALUE}};',
				),
			)
		);
		$this->end_controls_tab();
		$this->end_controls_tabs();
		$this->end_controls_section();

		$this->start_controls_section(
			'anim_box_style_button',
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
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			array(
				'name'     => 'button_typography',
				'scheme'   => Scheme_Typography::TYPOGRAPHY_4,
				'selector' => '{{WRAPPER}}  ' . '.advanced-animated-box-btn-wrap .advanced-animated-box-btn',
			)
		);
		$this->add_control(
			'button_color',
			array(
				'label'     => esc_html__( 'Text Color', 'advanced-elements' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => array(
					'{{WRAPPER}} ' . '.advanced-animated-box-btn-wrap .advanced-animated-box-btn' => 'color: {{VALUE}}',
				),
			)
		);
		$this->add_control(
			'button_bg_color',
			array(
				'label' => esc_html__( 'Background Color', 'advanced-elements' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => array(
					'type'  => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				),
				'selectors' => array(
					'{{WRAPPER}} ' . '.advanced-animated-box-btn-wrap .advanced-animated-box-btn' => 'background-color: {{VALUE}}',
				),
			)
		);
		$this->add_group_control(
			Group_Control_Border::get_type(),
			array(
				'name'        => 'button_border',
				'label'       => esc_html__( 'Border', 'advanced-elements' ),
				'placeholder' => '1px',
				'default'     => '1px',
				'selector'    => '{{WRAPPER}} ' . '.advanced-animated-box-btn-wrap .advanced-animated-box-btn',
			)
		);
		$this->add_responsive_control(
			'button_border_radius',
			array(
				'label'      => esc_html__( 'Border Radius', 'advanced-elements' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => array( 'px', '%' ),
				'selectors'  => array(
					'{{WRAPPER}} ' . '.advanced-animated-box-btn-wrap .advanced-animated-box-btn' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				),
			)
		);
		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			array(
				'name'     => 'button_box_shadow',
				'selector' => '{{WRAPPER}} ' . '.advanced-animated-box-btn-wrap .advanced-animated-box-btn',
			)
		);
		$this->add_responsive_control(
			'button_padding',
			array(
				'label'      => esc_html__( 'Padding', 'advanced-elements' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => array( 'px', '%', 'em' ),
				'selectors'  => array(
					'{{WRAPPER}} ' . '.advanced-animated-box-btn-wrap .advanced-animated-box-btn' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				),
			)
		);
		$this->add_responsive_control(
			'button_margin',
			array(
				'label'      => esc_html__( 'Margin', 'advanced-elements' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => array( 'px', '%' ),
				'selectors'  => array(
					'{{WRAPPER}} ' . '.advanced-animated-box-btn-wrap .advanced-animated-box-btn' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				),
			)
		);
		$this->end_controls_tab();

		$this->start_controls_tab(
			'tab_button_hover',
			array(
				'label' => esc_html__( 'Hover', 'advanced-elements' ),
			)
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			array(
				'name'     => 'button_typography_hover',
				'scheme'   => Scheme_Typography::TYPOGRAPHY_4,
				'selector' => '{{WRAPPER}}  ' . '.advanced-animated-box-btn-wrap .advanced-animated-box-btn:hover',
			)
		);
		$this->add_control(
			'button_color_hover',
			array(
				'label'     => esc_html__( 'Text Color', 'advanced-elements' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => array(
					'{{WRAPPER}} ' . '.advanced-animated-box-btn-wrap .advanced-animated-box-btn:hover' => 'color: {{VALUE}}',
				),
			)
		);
		$this->add_control(
			'button_bg_color_hover',
			array(
				'label' => esc_html__( 'Background Color', 'advanced-elements' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => array(
					'type'  => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				),
				'selectors' => array(
					'{{WRAPPER}} ' . '.advanced-animated-box-btn-wrap .advanced-animated-box-btn:hover' => 'background-color: {{VALUE}}',
				),
			)
		);
		$this->add_group_control(
			Group_Control_Border::get_type(),
			array(
				'name'        => 'button_border_hover',
				'label'       => esc_html__( 'Border', 'advanced-elements' ),
				'placeholder' => '1px',
				'default'     => '1px',
				'selector'    => '{{WRAPPER}} ' . '.advanced-animated-box-btn-wrap .advanced-animated-box-btn:hover',
			)
		);
		$this->add_responsive_control(
			'button_border_radius_hover',
			array(
				'label'      => esc_html__( 'Border Radius', 'advanced-elements' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => array( 'px', '%' ),
				'selectors'  => array(
					'{{WRAPPER}} ' . '.advanced-animated-box-btn-wrap .advanced-animated-box-btn:hover' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				),
			)
		);
		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			array(
				'name'     => 'button_box_shadow_hover',
				'selector' => '{{WRAPPER}} ' . '.advanced-animated-box-btn-wrap .advanced-animated-box-btn:hover',
			)
		);
		$this->add_responsive_control(
			'button_padding_hover',
			array(
				'label'      => esc_html__( 'Padding', 'advanced-elements' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => array( 'px', '%', 'em' ),
				'selectors'  => array(
					'{{WRAPPER}} ' . '.advanced-animated-box-btn-wrap .advanced-animated-box-btn:hover' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				),
			)
		);
		$this->add_responsive_control(
			'button_margin_hover',
			array(
				'label'      => esc_html__( 'Margin', 'advanced-elements' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => array( 'px', '%' ),
				'selectors'  => array(
					'{{WRAPPER}} ' . '.advanced-animated-box-btn-wrap .advanced-animated-box-btn:hover' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				),
			)
		);
		$this->end_controls_tab();
		$this->end_controls_tabs();

		$this->add_responsive_control(
			'anim_box_button_alignment',
			array(
				'label'   => esc_html__( 'Alignment', 'advanced-elements' ),
				'type'    => Controls_Manager::CHOOSE,
				'default' => 'center',
				'options' => array(
					'flex-start'    => array(
						'title' => esc_html__( 'Left', 'advanced-elements' ),
						'icon'  => 'fa fa-align-left',
					),
					'center' => array(
						'title' => esc_html__( 'Center', 'advanced-elements' ),
						'icon'  => 'fa fa-align-center',
					),
					'flex-end' => array(
						'title' => esc_html__( 'Right', 'advanced-elements' ),
						'icon'  => 'fa fa-align-right',
					),
				),
				'selectors'  => array(
					'{{WRAPPER}} ' . '.advanced-animated-box-btn-wrap' => 'justify-content: {{VALUE}};',
				),
			)
		);
		$this->end_controls_section();
	}

	protected function render() {
		$settings = $this->get_settings();
		?>
			<div class="advanced-animated-box <?php echo $settings['anim_box_effect']; ?> <?php echo $this->get_back_side(); ?>">
				<div class="advanced-animated-box-front">
				 	<?php if( 'yes' === $settings['anim_box_front_badge_show'] ) : ?>
						<?php echo sprintf( '<img src="%1$s" alt="badge" class="anim-box-front-badge">', $settings['anim_box_front_badge']['url'] ); ?>
					<?php endif; ?>
					<div class="advanced-animated-box-inner">
						<div class="advanced-animated-box-icon">
							<?php echo sprintf( '<div class="advanced-animated-box-icon-inner"><i class="%1$s"></i></div>', $settings['anim_box_front_icon'] ); ?>
						</div>
						<div class="advanced-animated-box-content">
							<?php echo sprintf( '<h4 class="advanced-animated-box-title">%1$s</h4>', $settings['anim_box_front_title'] ); ?>
							<?php echo sprintf( '<h5 class="advanced-animated-box-subtitle">%1$s</h5>', $settings['anim_box_front_subtitle'] ); ?>
							<?php echo sprintf( '<p class="advanced-animated-box-description">%1$s</p>', $settings['anim_box_front_descr'] ); ?>
						</div>
					</div>
				</div>
				<div class="advanced-animated-box-back">
				 	<?php if( 'yes' === $settings['anim_box_back_badge_show'] ) : ?>
						<?php echo sprintf( '<img src="%1$s" alt="badge" class="anim-box-back-badge">', $settings['anim_box_back_badge']['url'] ); ?>
					<?php endif; ?>
					<div class="advanced-animated-box-inner">
						<div class="advanced-animated-box-icon">
							<?php echo sprintf( '<div class="advanced-animated-box-icon-inner"><i class="%1$s"></i></div>', $settings['anim_box_back_icon'] ); ?>
						</div>
						<div class="advanced-animated-box-content">
							<?php echo sprintf( '<h4 class="advanced-animated-box-title">%1$s</h4>', $settings['anim_box_back_title'] ); ?>
							<?php echo sprintf( '<h5 class="advanced-animated-box-subtitle">%1$s</h5>', $settings['anim_box_back_subtitle'] ); ?>
							<?php echo sprintf( '<p class="advanced-animated-box-description">%1$s</p>', $settings['anim_box_back_descr'] ); ?>
							<?php if( 'yes' === $settings['anim_box_back_btn_show'] ) : ?>
								<?php if( !empty($settings['anim_box_back_btn']) ) : ?>
									<div class="advanced-animated-box-btn-wrap">
										<?php
											if ( !empty( $settings['anim_box_back_btn_url']['url'] ) ) {
												if( $settings['anim_box_back_btn_url']['is_external'] ) {
													$this->add_render_attribute( 'anim_box_btn_link', 'target', '_blank' );
												}
												if( $settings['anim_box_back_btn_url']['nofollow'] ) {
													$this->add_render_attribute( 'anim_box_btn_link', 'rel', 'nofollow' );
												}
											}
										?>
										<?php echo sprintf( '<a class="advanced-animated-box-btn" href="%1$s" %2$s>%3$s</a>', $settings['anim_box_back_btn_url']['url']?$settings['anim_box_back_btn_url']['url']:'#', $this->get_render_attribute_string( 'anim_box_btn_link' ), $settings['anim_box_back_btn'] ); ?>
									</div>
								<?php endif; ?>
							<?php endif; ?>
						</div>
					</div>
				</div>
			</div>
		<?php
	}

	public function get_back_side() {
		$settings = $this->get_settings();
		if( is_admin() && $settings['anim_box_back_show'] === 'yes' ){
			return 'flipped-admin';
		} else {
			return '';
		}
	}

	public function get_featured_badge_img() {
		return advanced_elements()->plugin_url( 'assets/images/shield.png' );
	}
}