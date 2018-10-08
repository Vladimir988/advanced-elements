<?php
namespace Elementor;

if ( !defined( 'ABSPATH' ) ) exit;

class Advanced_Team_Member extends Widget_Base {

	public function get_name() {
		return 'advanced-team-member';
	}

	public function get_title() {
		return esc_html__( 'Team Member', 'advanced-elements' );
	}

	public function get_icon() {
		return 'eicon-person';
	}

	public function get_categories() {
		return array( 'advanced-elements' );
	}

	protected function _register_controls() {

		$this->start_controls_section(
			'team_member_section_content',
			array(
				'label'      => esc_html__( 'Content', 'advanced-elements' ),
				'tab'        => Controls_Manager::TAB_CONTENT,
				'show_label' => false,
			)
		);
		$this->add_control(
			'member_image',
			array(
				'label'   => esc_html__( 'Member Image', 'advanced-elements' ),
				'type'    => Controls_Manager::MEDIA,
				'default' => array(
					'url'   => Utils::get_placeholder_image_src(),
				),
			)
		);
		$this->add_control(
			'member_first_name',
			array(
				'label'   => esc_html__( 'First Name', 'advanced-elements' ),
				'type'    => Controls_Manager::TEXT,
				'default' => 'Boris',
			)
		);
		$this->add_control(
			'member_last_name',
			array(
				'label'   => esc_html__( 'Last Name', 'advanced-elements' ),
				'type'    => Controls_Manager::TEXT,
				'default' => 'Brolin',
			)
		);
		$this->add_control(
			'member_position',
			array(
				'label'   => esc_html__( 'Position', 'advanced-elements' ),
				'type'    => Controls_Manager::TEXT,
				'default' => 'Position',
			)
		);
		$this->add_control(
			'member_descr',
			array(
				'label'   => esc_html__( 'Description', 'advanced-elements' ),
				'type'    => Controls_Manager::TEXTAREA,
				'default' => 'Team Member Description',
			)
		);
		$this->add_control(
			'member_icon_list_show',
			array(
				'label'        => esc_html__( 'Show Social List', 'advanced-elements' ),
				'type'         => Controls_Manager::SWITCHER,
				'label_on'     => esc_html__( 'Yes', 'advanced-elements' ),
				'label_off'    => esc_html__( 'No', 'advanced-elements' ),
				'return_value' => 'yes',
				'default'      => 'true',
			)
		);
		$this->add_control(
			'member_icon_list',
			array(
				'label'   => '',
				'type'    => Controls_Manager::REPEATER,
				'default' => array(
					array(
						'text' => esc_html__( 'Facebook', 'advanced-elements' ),
						'icon' => 'fa fa-facebook',
					),
					array(
						'text' => esc_html__( 'Twitter', 'advanced-elements' ),
						'icon' => 'fa fa-twitter',
					),
					array(
						'text' => esc_html__( 'Linkedin', 'advanced-elements' ),
						'icon' => 'fa fa-linkedin',
					),
				),
				'fields'   => array(
					array(
						'name'  => 'text',
						'label' => esc_html__( 'Text', 'advanced-elements' ),
						'type'  => Controls_Manager::TEXT,
						'label_block' => true,
						'placeholder' => esc_html__( 'List Item', 'advanced-elements' ),
						'default'     => __( 'List Item', 'advanced-elements' ),
					),
					array(
						'name'  => 'icon',
						'label' => esc_html__( 'Icon', 'advanced-elements' ),
						'type'  => Controls_Manager::ICON,
						'label_block' => true,
						'default'     => 'fa fa-facebook',
					),
					array(
						'name'  => 'link',
						'label' => esc_html__( 'Link', 'advanced-elements' ),
						'type'  => Controls_Manager::URL,
						'label_block' => true,
						'default'     => array(
							'url'       => '#',
						),
						'placeholder' => __( 'https://your-link.com', 'advanced-elements' ),
					),
					array(
						'name'  => 'label_visible',
						'label' => esc_html__( 'Label visible', 'advanced-elements' ),
						'type'  => Controls_Manager::SWITCHER,
						'label_on'     => esc_html__( 'Yes', 'advanced-elements' ),
						'label_off'    => esc_html__( 'No', 'advanced-elements' ),
						'return_value' => 'yes',
						'default'      => 'false',
					),
				),
				'title_field' => '<i class="{{ icon }}" aria-hidden="true"></i> {{{ text }}}',
				'condition' => array(
					'member_icon_list_show' => 'yes',
				),
			)
		);
		$this->add_control(
			'member_button_text',
			array(
				'label'   => esc_html__( 'Button Text', 'advanced-elements' ),
				'type'    => Controls_Manager::TEXT,
				'default' => __( 'Read More', 'advanced-elements' ),
			)
		);
		$this->add_control(
			'member_button_url',
			array(
				'label'       => esc_html__( 'Button Url', 'advanced-elements' ),
				'type'        => Controls_Manager::URL,
				'placeholder' => 'http://your-link.com',
				'default'     => array(
					'url'       => '#',
				),
			)
		);
		$this->end_controls_section();

		$this->start_controls_section(
			'team_member_section_general',
			array(
				'label'      => esc_html__( 'General', 'advanced-elements' ),
				'tab'        => Controls_Manager::TAB_STYLE,
				'show_label' => false,
			)
		);
		$this->add_group_control(
			Group_Control_Background::get_type(),
			array(
				'name'     => 'container_background',
				'selector' => '{{WRAPPER}} ' . '.advanced-team-member-inner',
			)
		);
		$this->add_group_control(
			Group_Control_Border::get_type(),
			array(
				'name'        => 'container_border',
				'label'       => esc_html__( 'Border', 'advanced-elements' ),
				'placeholder' => '1px',
				'default'     => '1px',
				'selector'    => '{{WRAPPER}} ' . '.advanced-team-member-inner',
			)
		);
		$this->add_responsive_control(
			'container_border_radius',
			array(
				'label'      => esc_html__( 'Border Radius', 'advanced-elements' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => array( 'px', '%' ),
				'selectors'  => array(
					'{{WRAPPER}} ' . '.advanced-team-member-inner' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				),
			)
		);
		$this->add_responsive_control(
			'container_padding',
			array(
				'label'      => esc_html__( 'Padding', 'advanced-elements' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => array( 'px', '%' ),
				'selectors'  => array(
					'{{WRAPPER}} ' . '.advanced-team-member-inner' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				),
			)
		);
		$this->add_responsive_control(
			'container_margin',
			array(
				'label'      => esc_html__( 'Margin', 'advanced-elements' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => array( 'px', '%' ),
				'selectors'  => array(
					'{{WRAPPER}} ' . '.advanced-team-member-inner' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				),
			)
		);
		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			array(
				'name' => 'container_box_shadow',
				'exclude' => array(
					'box_shadow_position',
				),
				'selector' => '{{WRAPPER}} ' . '.advanced-team-member-inner',
			)
		);
		$this->end_controls_section();

		$this->start_controls_section(
			'team_member_section_image',
			array(
				'label'      => esc_html__( 'Image', 'advanced-elements' ),
				'tab'        => Controls_Manager::TAB_STYLE,
				'show_label' => false,
			)
		);
		$this->add_control(
			'custom_image_size',
			array(
				'label'        => esc_html__( 'Custom size', 'advanced-elements' ),
				'type'         => Controls_Manager::SWITCHER,
				'label_on'     => esc_html__( 'Yes', 'advanced-elements' ),
				'label_off'    => esc_html__( 'No', 'advanced-elements' ),
				'return_value' => 'yes',
				'default'      => 'false',
			)
		);
		$this->add_responsive_control(
			'image_width',
			array(
				'label'      => esc_html__( 'Width', 'advanced-elements' ),
				'type'       => Controls_Manager::SLIDER,
				'size_units' => array( 'px', 'em', '%', ),
				'range'      => array(
					'px'       => array(
						'min'    => 50,
						'max'    => 800,
					),
					'%'        => array(
						'min'    => 1,
						'max'    => 100,
					),
				),
				'selectors'  => array(
					'{{WRAPPER}} ' . '.advanced-team-member-img-wrap' => 'width: {{SIZE}}{{UNIT}};',
					'{{WRAPPER}} ' . '.advanced-team-member-figure'   => 'width: {{SIZE}}{{UNIT}};',
				),
				'condition'  => array(
					'custom_image_size' => 'yes',
				),
			)
		);
		$this->add_responsive_control(
			'image_height',
			array(
				'label'      => esc_html__( 'Height', 'advanced-elements' ),
				'type'       => Controls_Manager::SLIDER,
				'size_units' => array(
					'px', 'em', '%',
				),
				'range'      => array(
					'px'       => array(
						'min'    => 50,
						'max'    => 800,
					),
					'%'        => array(
						'min'    => 1,
						'max'    => 100,
					),
				),
				'selectors'  => array(
					'{{WRAPPER}} ' . '.advanced-team-member-img-wrap' => 'height: {{SIZE}}{{UNIT}};',
					'{{WRAPPER}} ' . '.advanced-team-member-figure'   => 'height: {{SIZE}}{{UNIT}};',
				),
				'condition' => array(
					'custom_image_size' => 'yes',
				),
			)
		);
		$this->add_group_control(
			Group_Control_Border::get_type(),
			array(
				'name'        => 'image_border',
				'label'       => esc_html__( 'Border', 'advanced-elements' ),
				'placeholder' => '1px',
				'default'     => '1px',
				'selector'  => '{{WRAPPER}} ' . '.advanced-team-member-img-wrap',
			)
		);
		$this->add_responsive_control(
			'image_border_radius',
			array(
				'label'      => esc_html__( 'Border Radius', 'advanced-elements' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => array( 'px', '%' ),
				'selectors'  => array(
					'{{WRAPPER}} ' . '.advanced-team-member-img-wrap' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					'{{WRAPPER}} ' . '.advanced-team-member-figure'   => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				),
			)
		);
		$this->add_responsive_control(
			'image_padding',
			array(
				'label'      => esc_html__( 'Padding', 'advanced-elements' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => array( 'px', '%' ),
				'selectors'  => array(
					'{{WRAPPER}} ' . '.advanced-team-member-img-wrap' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				),
			)
		);
		$this->add_responsive_control(
			'image_margin',
			array(
				'label'      => esc_html__( 'Margin', 'advanced-elements' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => array( 'px', '%' ),
				'selectors'  => array(
					'{{WRAPPER}} ' . '.advanced-team-member-img-wrap' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				),
			)
		);
		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			array(
				'name' => 'image_box_shadow',
				'exclude' => array(
					'box_shadow_position',
				),
				'selector' => '{{WRAPPER}} ' . '.advanced-team-member-img-wrap',
			)
		);
		$this->end_controls_section();

		$this->start_controls_section(
			'team_member_section_name',
			array(
				'label'      => esc_html__( 'Name', 'advanced-elements' ),
				'tab'        => Controls_Manager::TAB_STYLE,
				'show_label' => false,
			)
		);
		$this->start_controls_tabs( 'tabs_name' );
		$this->start_controls_tab(
			'tab_first_name',
			array(
				'label' => esc_html__( 'First name', 'advanced-elements' ),
			)
		);
		$this->add_control(
			'first_name_color',
			array(
				'label'  => esc_html__( 'Color', 'advanced-elements' ),
				'type'   => Controls_Manager::COLOR,
				'selectors' => array(
					'{{WRAPPER}} ' . '.advanced-team-member-name' . ' .advanced-team-member-first-name' => 'color: {{VALUE}}',
				),
			)
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			array(
				'name'     => 'first_name_typography',
				'scheme'   => Scheme_Typography::TYPOGRAPHY_3,
				'selector' => '{{WRAPPER}} ' . '.advanced-team-member-name' . ' .advanced-team-member-first-name',
			)
		);
		$this->end_controls_tab();
		$this->start_controls_tab(
			'tab_last_name',
			array(
				'label' => esc_html__( 'Last name', 'advanced-elements' ),
			)
		);
		$this->add_control(
			'last_name_color',
			array(
				'label'  => esc_html__( 'Color', 'advanced-elements' ),
				'type'   => Controls_Manager::COLOR,
				'selectors' => array(
					'{{WRAPPER}} ' . '.advanced-team-member-name' . ' .advanced-team-member-last-name' => 'color: {{VALUE}}',
				),
			)
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			array(
				'name'     => 'last_name_typography',
				'scheme'   => Scheme_Typography::TYPOGRAPHY_3,
				'selector' => '{{WRAPPER}} ' . '.advanced-team-member-name' . ' .advanced-team-member-last-name',
			)
		);
		$this->end_controls_tab();
		$this->end_controls_tabs();
		$this->add_responsive_control(
			'name_padding',
			array(
				'label'      => esc_html__( 'Padding', 'advanced-elements' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => array( 'px', '%' ),
				'selectors'  => array(
					'{{WRAPPER}} ' . '.advanced-team-member-name' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				),
			)
		);
		$this->add_responsive_control(
			'name_margin',
			array(
				'label'      => esc_html__( 'Margin', 'advanced-elements' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => array( 'px', '%' ),
				'selectors'  => array(
					'{{WRAPPER}} ' . '.advanced-team-member-name' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				),
			)
		);
		$this->add_responsive_control(
			'name_text_alignment',
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
					'{{WRAPPER}} ' . '.advanced-team-member-name' => 'text-align: {{VALUE}};',
				),
			)
		);
		$this->end_controls_section();

		$this->start_controls_section(
			'team_member_section_position',
			array(
				'label'      => esc_html__( 'Position', 'advanced-elements' ),
				'tab'        => Controls_Manager::TAB_STYLE,
				'show_label' => false,
			)
		);
		$this->add_control(
			'position_color',
			array(
				'label'     => esc_html__( 'Color', 'advanced-elements' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => array(
					'{{WRAPPER}} ' . '.advanced-team-member-position' => 'color: {{VALUE}}',
				),
			)
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			array(
				'name'     => 'position_typography',
				'scheme'   => Scheme_Typography::TYPOGRAPHY_3,
				'selector' => '{{WRAPPER}} ' . '.advanced-team-member-position',
			)
		);
		$this->add_responsive_control(
			'position_padding',
			array(
				'label'      => esc_html__( 'Padding', 'advanced-elements' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => array( 'px', '%' ),
				'selectors'  => array(
					'{{WRAPPER}} ' . '.advanced-team-member-position' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				),
			)
		);
		$this->add_responsive_control(
			'position_margin',
			array(
				'label'      => esc_html__( 'Margin', 'advanced-elements' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => array( 'px', '%' ),
				'selectors'  => array(
					'{{WRAPPER}} ' . '.advanced-team-member-position' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				),
			)
		);
		$this->add_responsive_control(
			'position_text_alignment',
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
					'{{WRAPPER}} ' . '.advanced-team-member-position' => 'text-align: {{VALUE}};',
				),
			)
		);
		$this->end_controls_section();

		$this->start_controls_section(
			'team_member_section_description',
			array(
				'label'      => esc_html__( 'Description', 'advanced-elements' ),
				'tab'        => Controls_Manager::TAB_STYLE,
				'show_label' => false,
			)
		);
		$this->add_control(
			'description_color',
			array(
				'label'  => esc_html__( 'Color', 'advanced-elements' ),
				'type'   => Controls_Manager::COLOR,
				'selectors' => array(
					'{{WRAPPER}} ' . '.advanced-team-member-description' => 'color: {{VALUE}}',
				),
			)
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			array(
				'name'     => 'description_typography',
				'scheme'   => Scheme_Typography::TYPOGRAPHY_3,
				'selector' => '{{WRAPPER}} ' . '.advanced-team-member-description',
			)
		);
		$this->add_responsive_control(
			'description_padding',
			array(
				'label'      => esc_html__( 'Padding', 'advanced-elements' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => array( 'px', '%' ),
				'selectors'  => array(
					'{{WRAPPER}} ' . '.advanced-team-member-description' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				),
			)
		);
		$this->add_responsive_control(
			'description_margin',
			array(
				'label'      => esc_html__( 'Margin', 'advanced-elements' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => array( 'px', '%' ),
				'selectors'  => array(
					'{{WRAPPER}} ' . '.advanced-team-member-description' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				),
			)
		);
		$this->add_responsive_control(
			'description_text_alignment',
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
					'{{WRAPPER}} ' . '.advanced-team-member-description' => 'text-align: {{VALUE}};',
				),
			)
		);
		$this->end_controls_section();

		$this->start_controls_section(
			'team_member_section_social_list',
			array(
				'label'      => esc_html__( 'Social List', 'advanced-elements' ),
				'tab'        => Controls_Manager::TAB_STYLE,
				'show_label' => false,
			)
		);
		$this->add_responsive_control(
			'social_alignment',
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
					'{{WRAPPER}} ' . '.advanced-team-member-socials' => 'align-self: {{VALUE}};',
				),
			)
		);
		$this->start_controls_tabs( 'tabs_social_icon_style' );
		$this->start_controls_tab(
			'tab_social_icon_normal',
			array(
				'label' => esc_html__( 'Normal', 'advanced-elements' ),
			)
		);
		$this->add_control(
			'social_icon_color',
			array(
				'label' => esc_html__( 'Icon Color', 'advanced-elements' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => array(
					'{{WRAPPER}} ' . '.advanced-team-member-socials-icon' . ' i' => 'color: {{VALUE}}',
				),
			)
		);
		$this->add_control(
			'social_icon_bg_color',
			array(
				'label' => esc_html__( 'Icon Background Color', 'advanced-elements' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => array(
					'{{WRAPPER}} ' . '.advanced-team-member-socials-icon' . ' .inner' => 'background-color: {{VALUE}}',
				),
			)
		);
		$this->add_control(
			'social_label_color',
			array(
				'label' => esc_html__( 'Label Color', 'advanced-elements' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => array(
					'{{WRAPPER}} ' . '.advanced-team-member-socials-label' => 'color: {{VALUE}}',
				),
			)
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			array(
				'label'    => esc_html__('Label Typography', 'advanced-elements'),
				'name'     => 'social_icon_label_typography',
				'scheme'   => Scheme_Typography::TYPOGRAPHY_3,
				'selector' => '{{WRAPPER}} ' . '.advanced-team-member-socials-label',
			)
		);
		$this->add_responsive_control(
			'social_icon_font_size',
			array(
				'label'      => esc_html__( 'Icon Font Size', 'advanced-elements' ),
				'type'       => Controls_Manager::SLIDER,
				'size_units' => array(
					'px', 'em', 'rem',
				),
				'range'      => array(
					'px' => array(
						'min' => 10,
						'max' => 200,
					),
				),
				'selectors'  => array(
					'{{WRAPPER}} ' . '.advanced-team-member-socials-icon' . ' i' => 'font-size: {{SIZE}}{{UNIT}}',
				),
			)
		);
		$this->add_responsive_control(
			'social_icon_size',
			array(
				'label'      => esc_html__( 'Icon Box Size', 'advanced-elements' ),
				'type'       => Controls_Manager::SLIDER,
				'size_units' => array(
					'px', 'em',
				),
				'range'      => array(
					'px' => array(
						'min' => 10,
						'max' => 200,
					),
				),
				'selectors'  => array(
					'{{WRAPPER}} ' . '.advanced-team-member-socials-icon' . ' .inner' => 'width: {{SIZE}}{{UNIT}}; height: {{SIZE}}{{UNIT}};',
				),
			)
		);
		$this->add_group_control(
			Group_Control_Border::get_type(),
			array(
				'name'        => 'social_icon_border',
				'label'       => esc_html__( 'Border', 'advanced-elements' ),
				'placeholder' => '1px',
				'default'     => '1px',
				'selector'    => '{{WRAPPER}} ' . '.advanced-team-member-socials-icon' . ' .inner',
			)
		);
		$this->add_control(
			'social_icon_box_border_radius',
			array(
				'label'      => esc_html__( 'Border Radius', 'advanced-elements' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => array( 'px', '%' ),
				'selectors'  => array(
					'{{WRAPPER}} ' . '.advanced-team-member-socials-icon' . ' .inner' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				),
			)
		);
		$this->add_responsive_control(
			'social_icon_box_margin',
			array(
				'label'      => esc_html__( 'Margin', 'advanced-elements' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => array( 'px', '%' ),
				'selectors'  => array(
					'{{WRAPPER}} ' . '.advanced-team-member-socials-icon' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				),
			)
		);
		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			array(
				'name'     => 'social_icon_box_shadow',
				'selector' => '{{WRAPPER}} ' . '.advanced-team-member-socials-icon' . ' .inner',
			)
		);
		$this->end_controls_tab();
		$this->start_controls_tab(
			'tab_social_icon_hover',
			array(
				'label' => esc_html__( 'Hover', 'advanced-elements' ),
			)
		);
		$this->add_control(
			'social_icon_color_hover',
			array(
				'label' => esc_html__( 'Icon Color', 'advanced-elements' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => array(
					'{{WRAPPER}} ' . '.advanced-team-member-socials-icon' . ' .inner:hover i' => 'color: {{VALUE}}',
				),
			)
		);
		$this->add_control(
			'social_icon_bg_color_hover',
			array(
				'label' => esc_html__( 'Icon Background Color', 'advanced-elements' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => array(
					'{{WRAPPER}} ' . '.advanced-team-member-socials-icon' . ' .inner:hover' => 'background-color: {{VALUE}}',
				),
			)
		);
		$this->add_control(
			'social_label_color_hover',
			array(
				'label' => esc_html__( 'Label Color', 'advanced-elements' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => array(
					'{{WRAPPER}} ' . '.advanced-team-member-socials-label' . ':hover' => 'color: {{VALUE}}',
				),
			)
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			array(
				'label'    => esc_html__( 'Label Typography', 'advanced-elements' ),
				'name'     => 'social_icon_label_typography_hover',
				'scheme'   => Scheme_Typography::TYPOGRAPHY_3,
				'selector' => '{{WRAPPER}} ' . '.advanced-team-member-socials-label' . ':hover',
			)
		);
		$this->add_responsive_control(
			'social_icon_font_size_hover',
			array(
				'label'      => esc_html__( 'Icon Font Size', 'advanced-elements' ),
				'type'       => Controls_Manager::SLIDER,
				'size_units' => array(
					'px', 'em', 'rem',
				),
				'range'      => array(
					'px' => array(
						'min' => 10,
						'max' => 200,
					),
				),
				'selectors'  => array(
					'{{WRAPPER}} ' . '.advanced-team-member-socials-icon' . ' .inner:hover i' => 'font-size: {{SIZE}}{{UNIT}}',
				),
			)
		);
		$this->add_responsive_control(
			'social_icon_size_hover',
			array(
				'label'      => esc_html__( 'Icon Box Size', 'advanced-elements' ),
				'type'       => Controls_Manager::SLIDER,
				'size_units' => array(
					'px', 'em',
				),
				'range'      => array(
					'px' => array(
						'min' => 10,
						'max' => 200,
					),
				),
				'selectors'  => array(
					'{{WRAPPER}} ' . '.advanced-team-member-socials-icon' . ' .inner:hover' => 'width: {{SIZE}}{{UNIT}}; height: {{SIZE}}{{UNIT}};',
				),
			)
		);
		$this->add_group_control(
			Group_Control_Border::get_type(),
			array(
				'name'        => 'social_icon_border_hover',
				'label'       => esc_html__( 'Border', 'advanced-elements' ),
				'placeholder' => '1px',
				'default'     => '1px',
				'selector'    => '{{WRAPPER}} ' . '.advanced-team-member-socials-icon' . ' .inner:hover',
			)
		);
		$this->add_control(
			'social_icon_box_border_radius_hover',
			array(
				'label'      => esc_html__( 'Border Radius', 'advanced-elements' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => array( 'px', '%' ),
				'selectors'  => array(
					'{{WRAPPER}} ' . '.advanced-team-member-socials-icon' . ' .inner:hover' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				),
			)
		);
		$this->add_responsive_control(
			'social_icon_box_margin_hover',
			array(
				'label'      => esc_html__( 'Margin', 'advanced-elements' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => array( 'px', '%' ),
				'selectors'  => array(
					'{{WRAPPER}} ' . '.advanced-team-member-socials-icon' . ':hover' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				),
			)
		);
		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			array(
				'name'     => 'social_icon_box_shadow_hover',
				'selector' => '{{WRAPPER}} ' . '.advanced-team-member-socials-icon' . ' .inner:hover',
			)
		);
		$this->end_controls_tab();
		$this->end_controls_tabs();
		$this->end_controls_section();

		$this->start_controls_section(
			'team_member_section_button',
			array(
				'label'      => esc_html__( 'Button', 'advanced-elements' ),
				'tab'        => Controls_Manager::TAB_STYLE,
				'show_label' => false,
			)
		);
		$this->add_responsive_control(
			'button_alignment',
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
					'{{WRAPPER}} ' . '.advanced-team-member-button-container' => 'justify-content: {{VALUE}};',
				),
			)
		);
		$this->start_controls_tabs( 'tabs_button' );
		$this->start_controls_tab(
			'tab_button_normal',
			array(
				'label' => esc_html__( 'Normal', 'advanced-elements' ),
			)
		);
		$this->add_control(
			'button_bg_color',
			array(
				'label' => esc_html__( 'Background Color', 'advanced-elements' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => array(
					'type'  => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_2,
				),
				'selectors' => array(
					'{{WRAPPER}} ' . '.advanced-team-member-button' => 'background-color: {{VALUE}}',
				),
			)
		);
		$this->add_control(
			'button_color',
			array(
				'label'     => esc_html__( 'Text Color', 'advanced-elements' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => array(
					'{{WRAPPER}} ' . '.advanced-team-member-button' => 'color: {{VALUE}}',
				),
			)
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			array(
				'name'     => 'button_typography',
				'scheme'   => Scheme_Typography::TYPOGRAPHY_3,
				'selector' => '{{WRAPPER}}  ' . '.advanced-team-member-button',
			)
		);
		$this->add_responsive_control(
			'button_padding',
			array(
				'label'      => esc_html__( 'Padding', 'advanced-elements' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => array( 'px', '%', 'em' ),
				'selectors'  => array(
					'{{WRAPPER}} ' . '.advanced-team-member-button' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
					'{{WRAPPER}} ' . '.advanced-team-member-button' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				),
			)
		);
		$this->add_responsive_control(
			'button_border_radius',
			array(
				'label'      => esc_html__( 'Border Radius', 'advanced-elements' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => array( 'px', '%' ),
				'selectors'  => array(
					'{{WRAPPER}} ' . '.advanced-team-member-button' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
				'selector'    => '{{WRAPPER}} ' . '.advanced-team-member-button',
			)
		);
		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			array(
				'name'     => 'button_box_shadow',
				'selector' => '{{WRAPPER}} ' . '.advanced-team-member-button',
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
			'button_bg_color_hover',
			array(
				'label'   => esc_html__( 'Background Color', 'advanced-elements' ),
				'type'    => Controls_Manager::COLOR,
				'scheme'  => array(
					'type'  => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_2,
				),
				'selectors' => array(
					'{{WRAPPER}} ' . '.advanced-team-member-button' . ':hover' => 'background-color: {{VALUE}}',
				),
			)
		);
		$this->add_control(
			'button_color_hover',
			array(
				'label'     => esc_html__( 'Text Color', 'advanced-elements' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => array(
					'{{WRAPPER}} ' . '.advanced-team-member-button' . ':hover' => 'color: {{VALUE}}',
				),
			)
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			array(
				'name'     => 'button_typography_hover',
				'scheme'   => Scheme_Typography::TYPOGRAPHY_3,
				'selector' => '{{WRAPPER}}  ' . '.advanced-team-member-button' . ':hover',
			)
		);
		$this->add_responsive_control(
			'button_padding_hover',
			array(
				'label'      => esc_html__( 'Padding', 'advanced-elements' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => array( 'px', '%', 'em' ),
				'selectors'  => array(
					'{{WRAPPER}} ' . '.advanced-team-member-button' . ':hover' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
					'{{WRAPPER}} ' . '.advanced-team-member-button' . ':hover' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				),
			)
		);
		$this->add_responsive_control(
			'button_border_radius_hover',
			array(
				'label'      => esc_html__( 'Border Radius', 'advanced-elements' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => array( 'px', '%' ),
				'selectors'  => array(
					'{{WRAPPER}} ' . '.advanced-team-member-button' . ':hover' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
				'selector'    => '{{WRAPPER}} ' . '.advanced-team-member-button' . ':hover',
			)
		);
		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			array(
				'name'     => 'button_box_shadow_hover',
				'selector' => '{{WRAPPER}} ' . '.advanced-team-member-button' . ':hover',
			)
		);
		$this->end_controls_tab();
		$this->end_controls_tabs();
		$this->end_controls_section();

		$this->start_controls_section(
			'team_member_section_order',
			array(
				'label'      => esc_html__( 'Content Order', 'advanced-elements' ),
				'tab'        => Controls_Manager::TAB_STYLE,
				'show_label' => false,
			)
		);
		$this->add_control(
			'image_order',
			array(
				'label'   => esc_html__( 'Image Order', 'advanced-elements' ),
				'type'    => Controls_Manager::NUMBER,
				'default' => 1,
				'min'     => 1,
				'max'     => 6,
				'step'    => 1,
				'selectors' => array(
					'{{WRAPPER}} '. '.advanced-team-member-img-wrap' => 'order: {{VALUE}};',
				),
			)
		);
		$this->add_control(
			'name_order',
			array(
				'label'   => esc_html__( 'Name Order', 'advanced-elements' ),
				'type'    => Controls_Manager::NUMBER,
				'default' => 2,
				'min'     => 1,
				'max'     => 6,
				'step'    => 1,
				'selectors' => array(
					'{{WRAPPER}} '. '.advanced-team-member-name' => 'order: {{VALUE}};',
				),
			)
		);
		$this->add_control(
			'position_order',
			array(
				'label'   => esc_html__( 'Position Order', 'advanced-elements' ),
				'type'    => Controls_Manager::NUMBER,
				'default' => 3,
				'min'     => 1,
				'max'     => 6,
				'step'    => 1,
				'selectors' => array(
					'{{WRAPPER}} '. '.advanced-team-member-position' => 'order: {{VALUE}};',
				),
			)
		);
		$this->add_control(
			'description_order',
			array(
				'label'   => esc_html__( 'Description Order', 'advanced-elements' ),
				'type'    => Controls_Manager::NUMBER,
				'default' => 4,
				'min'     => 1,
				'max'     => 6,
				'step'    => 1,
				'selectors' => array(
					'{{WRAPPER}} '. '.advanced-team-member-description' => 'order: {{VALUE}};',
				),
			)
		);
		$this->add_control(
			'social_list_order',
			array(
				'label'   => esc_html__( 'Social List Order', 'advanced-elements' ),
				'type'    => Controls_Manager::NUMBER,
				'default' => 5,
				'min'     => 1,
				'max'     => 6,
				'step'    => 1,
				'selectors' => array(
					'{{WRAPPER}} '. '.advanced-team-member-socials' => 'order: {{VALUE}};',
				),
			)
		);
		$this->add_control(
			'button_order',
			array(
				'label'   => esc_html__( 'Button Order', 'advanced-elements' ),
				'type'    => Controls_Manager::NUMBER,
				'default' => 6,
				'min'     => 1,
				'max'     => 6,
				'step'    => 1,
				'selectors' => array(
					'{{WRAPPER}} '. '.advanced-team-member-button-container' => 'order: {{VALUE}};',
				),
			)
		);
		$this->end_controls_section();
	}

	protected function render() {
	?>
		<div class="advanced-team-member">
			<div class="advanced-team-member-inner">
				<div class="advanced-team-member-content">
					<div class="advanced-team-member-img-wrap">
						<?php echo $this->get_image(); ?>
					</div>
					<?php
					echo $this->get_member_name();
					echo $this->get_member_position();
					echo $this->get_member_description();
					echo $this->get_member_social_icon_list();
					echo $this->get_member_action_button();
					?>
				</div>
			</div>
		</div>
	<?php
	}

	public function get_image() {
		$image = $this->get_settings( 'member_image' );
		if ( empty( $image['id'] ) && empty( $image['url'] ) ) {
			return;
		}
		$format = apply_filters( 'advanced-team-member-image', '<figure class="advanced-team-member-figure"><img class="advanced-team-member-img" src="%s" alt=""></figure>' );
		return sprintf( $format, $image['url'] );
	}

	public function get_member_name() {
		$first_name      = $this->get_settings( 'member_first_name' );
		$last_name       = $this->get_settings( 'member_last_name' );
		$first_name_html = '';
		$last_name_html  = '';
		if ( empty( $first_name ) && empty( $last_name ) ) { return; }
		if ( !empty( $first_name ) ) {
			$first_name_html = sprintf( '<span class="advanced-team-member-first-name">%s</span>', $first_name );
		}
		if ( !empty( $last_name ) ) {
			$last_name_html = sprintf( '<span class="advanced-team-member-last-name"> %s</span>', $last_name );
		}
		$render = apply_filters( 'advanced-team-member-name-format', '<h3 class="advanced-team-member-name">%1$s%2$s</h3>' );
		return sprintf( $render, $first_name_html, $last_name_html );
	}

	public function get_member_position() {
		$position = $this->get_settings( 'member_position' );
		if ( empty( $position ) ) { return false; }
		$render = apply_filters( 'advanced-team-member-position-format', '<p class="advanced-team-member-position">%s</p>' );
		return sprintf( $render, $position );
	}

	public function get_member_description() {
		$description = $this->get_settings( 'member_descr' );
		if ( empty( $description ) ) { return false; }
		$render = apply_filters( 'advanced-team-member-description-format', '<p class="advanced-team-member-description">%s</p>' );
		return sprintf( $render, $description );
	}

	public function get_member_social_icon_list() {
		$social_icon_list = $this->get_settings( 'member_icon_list' );
		if ( empty( $social_icon_list ) ) { return false; }
		if('yes' !== $this->get_settings('member_icon_list_show')) { return false; }
		$icon_list = '';
		foreach ( $social_icon_list as $key => $icon_data ) {
			$label = '';
			if ( ! empty( $icon_data['link']['url'] ) ) {
				$icon = sprintf( '<div class="advanced-team-member-socials-icon"><div class="inner"><i class="%s"></i></div></div>', $icon_data['icon'] );
				if ('yes' === $icon_data['label_visible']) {
					$label = sprintf( '<div class="advanced-team-member-socials-label">%s</div>', $icon_data['text'] );
				}
				if ( $icon ) {
					if ( $icon_data['link']['is_external'] ) {
						$target = 'target="_blank"';
					}
					if ( $icon_data['link']['nofollow'] ) {
						$rel = 'rel="nofollow"';
					}
					$icon_list .= sprintf( '<div class="advanced-team-member-socials-item"><a href="%1$s" %3$s %4$s>%2$s%5$s</a></div>', $icon_data['link']['url'], $icon, $target, $rel, $label );
				}
			}
		}
		$render = apply_filters( 'advanced-team-member-social-list-format', '<div class="advanced-team-member-socials">%1$s</div>' );
		return sprintf( $render, $icon_list );
	}

	public function get_member_action_button() {
		$button_text = $this->get_settings( 'member_button_text' );
		$button_url  = $this->get_settings( 'member_button_url' );
		if ( empty( $button_url ) ) { return false; }
		if ( is_array( $button_url ) && empty( $button_url['url'] ) ) { return false; }
		$this->add_render_attribute( 'url', 'class', array(
			'elementor-button',
			'elementor-size-md',
			'advanced-team-member-button',
		) );
		if ( is_array( $button_url ) ) {
			$this->add_render_attribute( 'url', 'href', $button_url['url'] );
			if ( $button_url['is_external'] ) {
				$this->add_render_attribute( 'url', 'target', '_blank' );
			}
			if ( ! empty( $button_url['nofollow'] ) ) {
				$this->add_render_attribute( 'url', 'rel', 'nofollow' );
			}
		} else {
			$this->add_render_attribute( 'url', 'href', $button_url );
		}
		$render = apply_filters( 'advanced-team-member-button-format', '<div class="advanced-team-member-button-container"><a %1$s>%2$s</a></div>' );
		return sprintf( $render, $this->get_render_attribute_string( 'url' ), $button_text );
	}
}