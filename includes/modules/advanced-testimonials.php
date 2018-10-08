<?php
namespace Elementor;

if ( !defined( 'ABSPATH' ) ) exit;

class Advanced_Testimonials extends Widget_Base {

	public function get_name() {
		return 'advanced-testimonials';
	}

	public function get_title() {
		return esc_html__( 'Testimonials', 'advanced-elements' );
	}

	public function get_icon() {
		return 'eicon-editor-quote';
	}

	public function get_categories() {
		return array( 'advanced-elements' );
	}

	protected function _register_controls() {

		$this->start_controls_section(
			'testimonials_section_content',
			array(
				'label'      => esc_html__( 'Testimonials Items', 'advanced-elements' ),
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
				'label'   => esc_html__( 'Title', 'advanced-elements' ),
				'type'    => Controls_Manager::TEXT,
				'default' => 'Title',
			)
		);
		$repeater->add_control(
			'item_icon_before',
			array(
				'label'       => esc_html__( 'Icon Before', 'advanced-elements' ),
				'type'        => Controls_Manager::ICON,
				'label_block' => true,
				'file'        => '',
				'default'     => 'fa fa-quote-left',
			)
		);
		$repeater->add_control(
			'item_comment',
			array(
				'label' => esc_html__( 'Comment', 'advanced-elements' ),
				'type'  => Controls_Manager::TEXTAREA,
			)
		);
		$repeater->add_control(
			'item_icon_after',
			array(
				'label'       => esc_html__( 'Icon After', 'advanced-elements' ),
				'type'        => Controls_Manager::ICON,
				'label_block' => true,
				'file'        => '',
				'default'     => 'fa fa-quote-right',
			)
		);
		$repeater->add_control(
			'item_name',
			array(
				'label' => esc_html__( 'Name', 'advanced-elements' ),
				'type'  => Controls_Manager::TEXT,
			)
		);
		$repeater->add_control(
			'item_position',
			array(
				'label' => esc_html__( 'Position', 'advanced-elements' ),
				'type'  => Controls_Manager::TEXT,
			)
		);
		$repeater->add_control(
			'item_date',
			array(
				'label'   => esc_html__( 'Date', 'advanced-elements' ),
				'type'    => Controls_Manager::TEXT,
				'default' => esc_html__( 'Thursday, August 31, 2017', 'advanced-elements' ),
			)
		);
		$this->add_control(
			'item_list',
			array(
				'type'    => Controls_Manager::REPEATER,
				'fields'  => array_values( $repeater->get_controls() ),
				'default' => array(
					array(
						'item_title'    => esc_html__( 'Title 1', 'advanced-elements' ),
						'item_comment'  => esc_html__( 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', 'advanced-elements' ),
						'item_name'     => esc_html__( 'Boris Britva', 'advanced-elements' ),
						'item_position' => esc_html__( 'Administrator', 'advanced-elements' ),
						'item_date'     => esc_html__( 'Thursday, August 31, 2017', 'advanced-elements' ),
					),
					array(
						'item_title'    => esc_html__( 'Title 2', 'advanced-elements' ),
						'item_comment'  => esc_html__( 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', 'advanced-elements' ),
						'item_name'     => esc_html__( 'Mickey Oneil', 'advanced-elements' ),
						'item_position' => esc_html__( 'Founder & SEO', 'advanced-elements' ),
						'item_date'     => esc_html__( 'Thursday, August 31, 2017', 'advanced-elements' ),
					),
					array(
						'item_title'    => esc_html__( 'Title 3', 'advanced-elements' ),
						'item_comment'  => esc_html__( 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', 'advanced-elements' ),
						'item_name'     => esc_html__( 'John Browning', 'advanced-elements' ),
						'item_position' => esc_html__( 'Manager', 'advanced-elements' ),
						'item_date'     => esc_html__( 'Thursday, August 31, 2017', 'advanced-elements' ),
					),
					array(
						'item_title'    => esc_html__( 'Title 4', 'advanced-elements' ),
						'item_comment'  => esc_html__( 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', 'advanced-elements' ),
						'item_name'     => esc_html__( 'John Browning', 'advanced-elements' ),
						'item_position' => esc_html__( 'Manager', 'advanced-elements' ),
						'item_date'     => esc_html__( 'Thursday, August 31, 2017', 'advanced-elements' ),
					),
				),
				'title_field' => '{{{ item_title }}}',
			)
		);
		$this->end_controls_section();

		$this->start_controls_section(
			'section_settings',
			array(
				'label'      => esc_html__( 'Settings', 'advanced-elements' ),
				'tab'        => Controls_Manager::TAB_CONTENT,
				'show_label' => false,
			)
		);
		$this->add_responsive_control(
			'slides_to_show',
			array(
				'label'   => esc_html__( 'Slides to Show', 'advanced-elements' ),
				'type'    => Controls_Manager::NUMBER,
				'default' => 3,
				'min'     => 1,
				'max'     => 10,
				'step'    => 1,
				'device_args'  => array(
					Controls_Stack::RESPONSIVE_TABLET => array(
						'default'  => 2,
						'max'      => 6,
						'required' => false,
					),
					Controls_Stack::RESPONSIVE_MOBILE => array(
						'default'  => 1,
						'max'      => 3,
						'required' => false,
					),
				),
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
				'default'      => 'no',
			)
		);
		$this->add_control(
			'autoplay_speed',
			array(
				'label'      => esc_html__( 'Autoplay Timeout', 'advanced-elements' ),
				'type'       => Controls_Manager::NUMBER,
				'default'    => 5000,
				'condition'  => array(
					'autoplay' => 'yes',
				),
			)
		);
		$this->add_control(
			'speed',
			array(
				'label'   => esc_html__( 'Animation Speed', 'advanced-elements' ),
				'type'    => Controls_Manager::NUMBER,
				'default' => 500,
			)
		);
		$this->add_control(
			'margin_slide',
			array(
				'label'   => esc_html__( 'Space Between Slides', 'advanced-elements' ),
				'type'    => Controls_Manager::NUMBER,
				'default' => 20,
				'step'    => 1,
				'min'     => 1,
				'max'     => 200,
			)
		);
		$this->add_control(
			'pause_on_hover',
			array(
				'label'        => esc_html__( 'Pause on Hover', 'advanced-elements' ),
				'type'         => Controls_Manager::SWITCHER,
				'label_on'     => esc_html__( 'Yes', 'advanced-elements' ),
				'label_off'    => esc_html__( 'No', 'advanced-elements' ),
				'return_value' => 'yes',
				'default'      => 'no',
			)
		);
		$this->add_control(
			'infinite',
			array(
				'label'        => esc_html__( 'Infinite Loop', 'advanced-elements' ),
				'type'         => Controls_Manager::SWITCHER,
				'label_on'     => esc_html__( 'Yes', 'advanced-elements' ),
				'label_off'    => esc_html__( 'No', 'advanced-elements' ),
				'return_value' => 'yes',
				'default'      => 'yes',
			)
		);
		$this->add_control(
			'arrows',
			array(
				'label'        => esc_html__( 'Show Arrows Navigation', 'advanced-elements' ),
				'type'         => Controls_Manager::SWITCHER,
				'label_on'     => esc_html__( 'Yes', 'advanced-elements' ),
				'label_off'    => esc_html__( 'No', 'advanced-elements' ),
				'return_value' => 'yes',
				'default'      => 'yes',
			)
		);
		$this->add_control(
			'dots',
			array(
				'label'        => esc_html__( 'Show Dots Navigation', 'advanced-elements' ),
				'type'         => Controls_Manager::SWITCHER,
				'label_on'     => esc_html__( 'Yes', 'advanced-elements' ),
				'label_off'    => esc_html__( 'No', 'advanced-elements' ),
				'return_value' => 'yes',
				'default'      => 'yes',
			)
		);
		$this->add_control(
			'dots_each',
			array(
				'label'        => esc_html__( 'Show Dots Each X Item', 'advanced-elements' ),
				'label_on'     => esc_html__( 'Yes', 'advanced-elements' ),
				'label_off'    => esc_html__( 'No', 'advanced-elements' ),
				'type'         => Controls_Manager::SWITCHER,
				'return_value' => 'yes',
				'default'      => 'no',
				'condition'    => array(
					'dots'       => 'yes',
				),
			)
		);
		$this->end_controls_section();

		$this->start_controls_section(
			'testimonials_section_general',
			array(
				'label'      => esc_html__( 'General', 'advanced-elements' ),
				'tab'        => Controls_Manager::TAB_STYLE,
				'show_label' => false,
			)
		);
		$this->add_group_control(
			Group_Control_Background::get_type(),
			array(
				'name'     => 'item_background',
				'selector' => '{{WRAPPER}} ' . '.advanced-testimonials-inner',
			)
		);
		$this->add_group_control(
			Group_Control_Border::get_type(),
			array(
				'name'        => 'item_border',
				'label'       => esc_html__( 'Border', 'advanced-elements' ),
				'placeholder' => '1px',
				'default'     => '1px',
				'selector'    => '{{WRAPPER}} ' . '.advanced-testimonials-inner',
			)
		);
		$this->add_control(
			'item_border_radius',
			array(
				'label'      => esc_html__( 'Border Radius', 'advanced-elements' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => array( 'px', '%' ),
				'selectors'  => array(
					'{{WRAPPER}} ' . '.advanced-testimonials-inner' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				),
			)
		);
		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			array(
				'name'     => 'item_shadow',
				'selector' => '{{WRAPPER}} ' . '.advanced-testimonials-inner',
			)
		);

		$this->add_control(
			'item_padding',
			array(
				'label'       => esc_html__( 'Item Padding', 'advanced-elements' ),
				'type'        => Controls_Manager::DIMENSIONS,
				'size_units'  => array( 'px' ),
				'render_type' => 'template',
				'selectors'   => array(
					'{{WRAPPER}} ' . '.advanced-testimonials-inner' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				),
			)
		);
		$this->end_controls_section();

		$this->start_controls_section(
			'testimonials_section_image',
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
				'default'      => 'no',
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
						'max'    => 1000,
					),
					'%'        => array(
						'min'    => 1,
						'max'    => 100,
					),
				),
				'selectors'  => array(
					'{{WRAPPER}} ' . '.advanced-testimonials-img' => 'width: {{SIZE}}{{UNIT}};',
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
				'size_units' => array( 'px', 'em', '%', ),
				'range'      => array(
					'px'       => array(
						'min'    => 50,
						'max'    => 1000,
					),
					'%'        => array(
						'min'    => 1,
						'max'    => 100,
					),
				),
				'selectors'  => array(
					'{{WRAPPER}} ' . '.advanced-testimonials-img' => 'height: {{SIZE}}{{UNIT}};',
				),
				'condition'  => array(
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
				'selector'    => '{{WRAPPER}} ' . '.advanced-testimonials-img',
			)
		);
		$this->add_control(
			'image_border_radius',
			array(
				'label'      => esc_html__( 'Border Radius', 'advanced-elements' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => array( 'px', '%' ),
				'selectors'  => array(
					'{{WRAPPER}} ' . '.advanced-testimonials-img' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
					'{{WRAPPER}} ' . '.advanced-testimonials-img' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
					'{{WRAPPER}} ' . '.advanced-testimonials-img' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				),
			)
		);
		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			array(
				'name'     => 'image_shadow',
				'selector' => '{{WRAPPER}} ' . '.advanced-testimonials-img',
			)
		);
		$this->add_responsive_control(
			'image_alignment',
			array(
				'label'   => esc_html__( 'Alignment', 'advanced-elements' ),
				'type'    => Controls_Manager::CHOOSE,
				'options' => array(
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
					'{{WRAPPER}} ' . '.advanced-testimonials-img-wrap' => 'align-self: {{VALUE}};',
				),
			)
		);
		$this->end_controls_section();

		$this->start_controls_section(
			'testimonials_section_title',
			array(
				'label'      => esc_html__( 'Title', 'advanced-elements' ),
				'tab'        => Controls_Manager::TAB_STYLE,
				'show_label' => false,
			)
		);
		$this->add_control(
			'title_color',
			array(
				'label'  => esc_html__( 'Color', 'advanced-elements' ),
				'type'   => Controls_Manager::COLOR,
				'selectors' => array(
					'{{WRAPPER}} ' . '.advanced-testimonials-title' => 'color: {{VALUE}}',
				),
			)
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			array(
				'name'     => 'title_typography',
				'scheme'   => Scheme_Typography::TYPOGRAPHY_3,
				'selector' => '{{WRAPPER}} ' . '.advanced-testimonials-title',
			)
		);
		$this->add_responsive_control(
			'title_padding',
			array(
				'label'      => esc_html__( 'Padding', 'advanced-elements' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => array( 'px', '%' ),
				'selectors'  => array(
					'{{WRAPPER}} ' . '.advanced-testimonials-title' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				),
			)
		);
		$this->add_responsive_control(
			'title_margin',
			array(
				'label'      => esc_html__( 'Margin', 'advanced-elements' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => array( 'px', '%' ),
				'selectors'  => array(
					'{{WRAPPER}} ' . '.advanced-testimonials-title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				),
			)
		);$this->add_responsive_control(
			'title_text_alignment',
			array(
				'label'   => esc_html__( 'Text Alignment', 'advanced-elements' ),
				'type'    => Controls_Manager::CHOOSE,
				'default' => 'center',
				'options' => array(
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
					'{{WRAPPER}} ' . '.advanced-testimonials-title' => 'text-align: {{VALUE}};',
				),
			)
		);
		$this->end_controls_section();

		$this->start_controls_section(
			'testimonials_section_comment',
			array(
				'label'      => esc_html__( 'Comment', 'advanced-elements' ),
				'tab'        => Controls_Manager::TAB_STYLE,
				'show_label' => false,
			)
		);
		$this->add_control(
			'comment_color',
			array(
				'label'     => esc_html__( 'Color', 'advanced-elements' ),
				'type'      => Controls_Manager::COLOR,
				'default'   => '#ffffff',
				'selectors' => array(
					'{{WRAPPER}} ' . '.advanced-testimonials-comment' => 'color: {{VALUE}}',
				),
			)
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			array(
				'name'     => 'comment_typography',
				'scheme'   => Scheme_Typography::TYPOGRAPHY_3,
				'selector' => '{{WRAPPER}} ' . '.advanced-testimonials-comment',
			)
		);
		$this->add_responsive_control(
			'comment_width',
			array(
				'label'      => esc_html__( 'Width', 'advanced-elements' ),
				'type'       => Controls_Manager::SLIDER,
				'size_units' => array(
					'px', '%',
				),
				'range'   => array(
					'px'    => array(
						'min' => 10,
						'max' => 1000,
					),
					'%'     => array(
						'min' => 0,
						'max' => 100,
					),
				),
				'default' => array(
					'size'  => 350,
					'unit'  => 'px',
				),
				'selectors' => array(
					'{{WRAPPER}} ' . '.advanced-testimonials-comment' => 'width: {{SIZE}}{{UNIT}};',
				),
			)
		);
		$this->add_group_control(
			Group_Control_Background::get_type(),
			array(
				'name'           => 'comment_background',
				'selector'       => '{{WRAPPER}} ' . '.advanced-testimonials-comment',
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
				'name'        => 'comment_border',
				'label'       => esc_html__( 'Border', 'advanced-elements' ),
				'placeholder' => '1px',
				'default'     => '1px',
				'selector'    => '{{WRAPPER}} ' . '.advanced-testimonials-comment',
			)
		);
		$this->add_control(
			'comment_border_radius',
			array(
				'label'      => esc_html__( 'Border Radius', 'advanced-elements' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => array( 'px', '%' ),
				'default'    => array(
					'top'      => 5,
					'right'    => 5,
					'bottom'   => 5,
					'left'     => 5,
				),
				'selectors'  => array(
					'{{WRAPPER}} ' . '.advanced-testimonials-comment' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				),
			)
		);
		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			array(
				'name'     => 'comment_shadow',
				'selector' => '{{WRAPPER}} ' . '.advanced-testimonials-comment',
			)
		);
		$this->add_responsive_control(
			'comment_padding',
			array(
				'label'      => esc_html__( 'Padding', 'advanced-elements' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => array( 'px', '%' ),
				'default'    => array(
					'top'      => 25,
					'right'    => 15,
					'bottom'   => 25,
					'left'     => 15,
				),
				'selectors'  => array(
					'{{WRAPPER}} ' . '.advanced-testimonials-comment' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				),
			)
		);
		$this->add_responsive_control(
			'comment_margin',
			array(
				'label'      => esc_html__( 'Margin', 'advanced-elements' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => array( 'px', '%' ),
				'selectors'  => array(
					'{{WRAPPER}} ' . '.advanced-testimonials-comment' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				),
			)
		);
		$this->add_responsive_control(
			'comment_alignment',
			array(
				'label'   => esc_html__( 'Alignment', 'advanced-elements' ),
				'type'    => Controls_Manager::CHOOSE,
				'default' => 'center',
				'options' => array(
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
					'{{WRAPPER}} ' . '.advanced-testimonials-comment' => 'align-self: {{VALUE}};',
				),
			)
		);
		$this->add_responsive_control(
			'comment_text_alignment',
			array(
				'label'     => esc_html__( 'Text Alignment', 'advanced-elements' ),
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
					'{{WRAPPER}} ' . '.advanced-testimonials-comment' => 'text-align: {{VALUE}};',
				),
			)
		);
		$this->end_controls_section();

		$this->start_controls_section(
			'testimonials_section_icon',
			array(
				'label'      => esc_html__( 'Icons', 'advanced-elements' ),
				'tab'        => Controls_Manager::TAB_STYLE,
				'show_label' => false,
			)
		);
		$this->start_controls_tabs( 'tabs_icon' );
		$this->start_controls_tab(
			'tab_icon_before',
			array(
				'label' => esc_html__( 'Icon Before', 'advanced-elements' ),
			)
		);
		$this->add_control(
			'tab_icon_before_show',
			array(
				'label'        => esc_html__( 'Show Icon Before', 'advanced-elements' ),
				'type'         => Controls_Manager::SWITCHER,
				'label_on'     => esc_html__( 'Yes', 'advanced-elements' ),
				'label_off'    => esc_html__( 'No', 'advanced-elements' ),
				'return_value' => 'yes',
				'default'      => 'yes',
			)
		);
		$this->add_control(
			'icon_color_before',
			array(
				'label'     => esc_html__( 'Icon Color', 'advanced-elements' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => array(
					'{{WRAPPER}} ' . '.advanced-testimonials-icon-before' . ' i' => 'color: {{VALUE}}',
				),
				'condition' => array(
					'tab_icon_before_show' => 'yes',
				),
			)
		);
		$this->add_control(
			'icon_bg_color_before',
			array(
				'label'     => esc_html__( 'Icon Background Color', 'advanced-elements' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => array(
					'{{WRAPPER}} ' . '.advanced-testimonials-icon-before ' . '.advanced-testimonials-icon-inner' => 'background-color: {{VALUE}}',
				),
				'condition' => array(
					'tab_icon_before_show' => 'yes',
				),
			)
		);
		$this->add_responsive_control(
			'icon_font_size_before',
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
					'{{WRAPPER}} ' . '.advanced-testimonials-icon-before' . ' i' => 'font-size: {{SIZE}}{{UNIT}}',
				),
				'condition'  => array(
					'tab_icon_before_show' => 'yes',
				),
			)
		);
		$this->add_responsive_control(
			'icon_size_before',
			array(
				'label'      => esc_html__( 'Icon Box Size', 'advanced-elements' ),
				'type'       => Controls_Manager::SLIDER,
				'size_units' => array(
					'px', 'em', '%',
				),
				'range'      => array(
					'px'       => array(
						'min'    => 18,
						'max'    => 200,
					),
				),
				'selectors'  => array(
					'{{WRAPPER}} ' . '.advanced-testimonials-icon-before ' . '.advanced-testimonials-icon-inner' => 'width: {{SIZE}}{{UNIT}}; height: {{SIZE}}{{UNIT}};',
				),
				'condition'  => array(
					'tab_icon_before_show' => 'yes',
				),
			)
		);
		$this->add_group_control(
			Group_Control_Border::get_type(),
			array(
				'name'        => 'icon_border_before',
				'label'       => esc_html__( 'Border', 'advanced-elements' ),
				'placeholder' => '1px',
				'default'     => '1px',
				'selector'    => '{{WRAPPER}} ' . '.advanced-testimonials-icon-before ' . '.advanced-testimonials-icon-inner',
				'condition' => array(
					'tab_icon_before_show' => 'yes',
				),
			)
		);
		$this->add_control(
			'icon_box_border_radius_before',
			array(
				'label'      => esc_html__( 'Border Radius', 'advanced-elements' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => array( 'px', '%' ),
				'selectors'  => array(
					'{{WRAPPER}} ' . '.advanced-testimonials-icon-before ' . '.advanced-testimonials-icon-inner' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				),
				'condition'  => array(
					'tab_icon_before_show' => 'yes',
				),
			)
		);
		$this->add_responsive_control(
			'icon_box_margin_before',
			array(
				'label'      => esc_html__( 'Margin', 'advanced-elements' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => array( 'px', '%' ),
				'selectors'  => array(
					'{{WRAPPER}} ' . '.advanced-testimonials-icon-before ' . '.advanced-testimonials-icon-inner' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				),
				'condition'  => array(
					'tab_icon_before_show' => 'yes',
				),
			)
		);
		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			array(
				'name'      => 'icon_box_shadow_before',
				'selector'  => '{{WRAPPER}} ' . '.advanced-testimonials-icon-before ' . '.advanced-testimonials-icon-inner',
				'condition' => array(
					'tab_icon_before_show' => 'yes',
				),
			)
		);
		$this->add_responsive_control(
			'icon_box_alignment_before',
			array(
				'label'   => esc_html__( 'Alignment', 'advanced-elements' ),
				'type'    => Controls_Manager::CHOOSE,
				'default' => 'center',
				'options' => array(
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
				'selectors'  => array(
					'{{WRAPPER}} ' . '.advanced-testimonials-icon-before' => 'align-self: {{VALUE}};',
				),
				'condition'  => array(
					'tab_icon_before_show' => 'yes',
				),
			)
		);
		$this->end_controls_tab();
		$this->start_controls_tab(
			'tab_icon_after',
			array(
				'label' => esc_html__( 'Icon After', 'advanced-elements' ),
			)
		);
		$this->add_control(
			'tab_icon_after_show',
			array(
				'label'        => esc_html__( 'Show Icon After', 'advanced-elements' ),
				'type'         => Controls_Manager::SWITCHER,
				'label_on'     => esc_html__( 'Yes', 'advanced-elements' ),
				'label_off'    => esc_html__( 'No', 'advanced-elements' ),
				'return_value' => 'yes',
				'default'      => 'yes',
			)
		);
		$this->add_control(
			'icon_color_after',
			array(
				'label'     => esc_html__( 'Icon Color', 'advanced-elements' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => array(
					'{{WRAPPER}} ' . '.advanced-testimonials-icon-after' . ' i' => 'color: {{VALUE}}',
				),
				'condition' => array(
					'tab_icon_after_show' => 'yes',
				),
			)
		);
		$this->add_control(
			'icon_bg_color_after',
			array(
				'label'     => esc_html__( 'Icon Background Color', 'advanced-elements' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => array(
					'{{WRAPPER}} ' . '.advanced-testimonials-icon-after ' . '.advanced-testimonials-icon-inner' => 'background-color: {{VALUE}}',
				),
				'condition' => array(
					'tab_icon_after_show' => 'yes',
				),
			)
		);
		$this->add_responsive_control(
			'icon_font_size_after',
			array(
				'label'      => esc_html__( 'Icon Font Size', 'advanced-elements' ),
				'type'       => Controls_Manager::SLIDER,
				'size_units' => array( 'px', 'em', 'rem', ),
				'range'      => array(
					'px'    => array(
						'min' => 18,
						'max' => 200,
					),
				),
				'selectors' => array(
					'{{WRAPPER}} ' . '.advanced-testimonials-icon-after' . ' i' => 'font-size: {{SIZE}}{{UNIT}}',
				),
				'condition' => array(
					'tab_icon_after_show' => 'yes',
				),
			)
		);
		$this->add_responsive_control(
			'icon_size_after',
			array(
				'label'      => esc_html__( 'Icon Box Size', 'advanced-elements' ),
				'type'       => Controls_Manager::SLIDER,
				'size_units' => array(
					'px', 'em', '%',
				),
				'range'   => array(
					'px'    => array(
						'min' => 18,
						'max' => 200,
					),
				),
				'selectors' => array(
					'{{WRAPPER}} ' . '.advanced-testimonials-icon-after ' . '.advanced-testimonials-icon-inner' => 'width: {{SIZE}}{{UNIT}}; height: {{SIZE}}{{UNIT}};',
				),
				'condition' => array(
					'tab_icon_after_show' => 'yes',
				),
			)
		);
		$this->add_group_control(
			Group_Control_Border::get_type(),
			array(
				'name'        => 'icon_border_after',
				'label'       => esc_html__( 'Border', 'advanced-elements' ),
				'placeholder' => '1px',
				'default'     => '1px',
				'selector'    => '{{WRAPPER}} ' . '.advanced-testimonials-icon-after ' . '.advanced-testimonials-icon-inner',
				'condition'   => array(
					'tab_icon_after_show' => 'yes',
				),
			)
		);
		$this->add_control(
			'icon_box_border_radius_after',
			array(
				'label'      => esc_html__( 'Border Radius', 'advanced-elements' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => array( 'px', '%' ),
				'selectors'  => array(
					'{{WRAPPER}} ' . '.advanced-testimonials-icon-after ' . '.advanced-testimonials-icon-inner' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				),
				'condition'  => array(
					'tab_icon_after_show' => 'yes',
				),
			)
		);
		$this->add_responsive_control(
			'icon_box_margin_after',
			array(
				'label'      => esc_html__( 'Margin', 'advanced-elements' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => array( 'px', '%' ),
				'selectors'  => array(
					'{{WRAPPER}} ' . '.advanced-testimonials-icon-after ' . '.advanced-testimonials-icon-inner' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				),
				'condition'  => array(
					'tab_icon_after_show' => 'yes',
				),
			)
		);
		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			array(
				'name'      => 'icon_box_shadow_after',
				'selector'  => '{{WRAPPER}} ' . '.advanced-testimonials-icon-after ' . '.advanced-testimonials-icon-inner',
				'condition' => array(
					'tab_icon_after_show' => 'yes',
				),
			)
		);
		$this->add_responsive_control(
			'icon_box_alignment_after',
			array(
				'label'   => esc_html__( 'Alignment', 'advanced-elements' ),
				'type'    => Controls_Manager::CHOOSE,
				'default' => 'center',
				'options' => array(
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
					'{{WRAPPER}} ' . '.advanced-testimonials-icon-after' => 'align-self: {{VALUE}};',
				),
				'condition'    => array(
					'tab_icon_after_show' => 'yes',
				),
			)
		);
		$this->end_controls_tab();
		$this->end_controls_tabs();
		$this->end_controls_section();

		$this->start_controls_section(
			'testimonials_section_name',
			array(
				'label'      => esc_html__( 'Name', 'advanced-elements' ),
				'tab'        => Controls_Manager::TAB_STYLE,
				'show_label' => false,
			)
		);
		$this->add_control(
			'name_color',
			array(
				'label'     => esc_html__( 'Color', 'advanced-elements' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => array(
					'{{WRAPPER}} ' . '.advanced-testimonials-name' => 'color: {{VALUE}}',
				),
			)
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			array(
				'name'     => 'name_typography',
				'scheme'   => Scheme_Typography::TYPOGRAPHY_3,
				'selector' => '{{WRAPPER}} ' . '.advanced-testimonials-name',
			)
		);
		$this->add_responsive_control(
			'name_padding',
			array(
				'label'      => esc_html__( 'Padding', 'advanced-elements' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => array( 'px', '%' ),
				'selectors'  => array(
					'{{WRAPPER}} ' . '.advanced-testimonials-name' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
					'{{WRAPPER}} ' . '.advanced-testimonials-name' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				),
			)
		);$this->add_responsive_control(
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
					'{{WRAPPER}} ' . '.advanced-testimonials-name' => 'text-align: {{VALUE}};',
				),
			)
		);
		$this->end_controls_section();

		$this->start_controls_section(
			'testimonials_section_position',
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
					'{{WRAPPER}} ' . '.advanced-testimonials-position' => 'color: {{VALUE}}',
				),
			)
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			array(
				'name'     => 'position_typography',
				'scheme'   => Scheme_Typography::TYPOGRAPHY_3,
				'selector' => '{{WRAPPER}} ' . '.advanced-testimonials-position',
			)
		);
		$this->add_responsive_control(
			'position_padding',
			array(
				'label'      => esc_html__( 'Padding', 'advanced-elements' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => array( 'px', '%' ),
				'selectors'  => array(
					'{{WRAPPER}} ' . '.advanced-testimonials-position' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
					'{{WRAPPER}} ' . '.advanced-testimonials-position' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				),
			)
		);$this->add_responsive_control(
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
					'{{WRAPPER}} ' . '.advanced-testimonials-position' => 'text-align: {{VALUE}};',
				),
			)
		);
		$this->end_controls_section();

		$this->start_controls_section(
			'testimonials_section_date',
			array(
				'label'      => esc_html__( 'Date', 'advanced-elements' ),
				'tab'        => Controls_Manager::TAB_STYLE,
				'show_label' => false,
			)
		);
		$this->add_control(
			'date_color',
			array(
				'label'     => esc_html__( 'Color', 'advanced-elements' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => array(
					'{{WRAPPER}} ' . '.advanced-testimonials-date' => 'color: {{VALUE}}',
				),
			)
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			array(
				'name'     => 'date_typography',
				'scheme'   => Scheme_Typography::TYPOGRAPHY_3,
				'selector' => '{{WRAPPER}} ' . '.advanced-testimonials-date',
			)
		);
		$this->add_responsive_control(
			'date_padding',
			array(
				'label'      => esc_html__( 'Padding', 'advanced-elements' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => array( 'px', '%' ),
				'selectors'  => array(
					'{{WRAPPER}} ' . '.advanced-testimonials-date' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				),
			)
		);
		$this->add_responsive_control(
			'date_margin',
			array(
				'label'      => esc_html__( 'Margin', 'advanced-elements' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => array( 'px', '%' ),
				'selectors'  => array(
					'{{WRAPPER}} ' . '.advanced-testimonials-date' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				),
			)
		);
		$this->add_responsive_control(
			'date_text_alignment',
			array(
				'label'   => esc_html__( 'Text Alignment', 'advanced-elements' ),
				'type'    => Controls_Manager::CHOOSE,
				'default' => 'center',
				'options' => array(
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
					'{{WRAPPER}} ' . '.advanced-testimonials-date' => 'text-align: {{VALUE}};',
				),
			)
		);
		$this->end_controls_section();

		$this->start_controls_section(
			'testimonials_section_order',
			array(
				'label'      => esc_html__( 'Order Content', 'advanced-elements' ),
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
				'max'     => 8,
				'step'    => 1,
				'selectors' => array(
					'{{WRAPPER}} ' . '.advanced-testimonials-img-wrap' => 'order: {{VALUE}};',
				),
			)
		);
		$this->add_control(
			'title_order',
			array(
				'label'   => esc_html__( 'Title Order', 'advanced-elements' ),
				'type'    => Controls_Manager::NUMBER,
				'default' => 2,
				'min'     => 1,
				'max'     => 8,
				'step'    => 1,
				'selectors' => array(
					'{{WRAPPER}} ' . '.advanced-testimonials-title' => 'order: {{VALUE}};',
				),
			)
		);
		$this->add_control(
			'icon_before_order',
			array(
				'label'   => esc_html__( 'Icon Before Order', 'advanced-elements' ),
				'type'    => Controls_Manager::NUMBER,
				'default' => 3,
				'min'     => 1,
				'max'     => 8,
				'step'    => 1,
				'selectors' => array(
					'{{WRAPPER}} ' . '.advanced-testimonials-icon-before' => 'order: {{VALUE}};',
				),
			)
		);
		$this->add_control(
			'comment_order',
			array(
				'label'   => esc_html__( 'Comment Order', 'advanced-elements' ),
				'type'    => Controls_Manager::NUMBER,
				'default' => 4,
				'min'     => 1,
				'max'     => 8,
				'step'    => 1,
				'selectors' => array(
					'{{WRAPPER}} ' . '.advanced-testimonials-comment' => 'order: {{VALUE}};',
				),
			)
		);
		$this->add_control(
			'icon_after_order',
			array(
				'label'   => esc_html__( 'Icon After Order', 'advanced-elements' ),
				'type'    => Controls_Manager::NUMBER,
				'default' => 5,
				'min'     => 1,
				'max'     => 8,
				'step'    => 1,
				'selectors' => array(
					'{{WRAPPER}} ' . '.advanced-testimonials-icon-after' => 'order: {{VALUE}};',
				),
			)
		);
		$this->add_control(
			'name_order',
			array(
				'label'   => esc_html__( 'Name Order', 'advanced-elements' ),
				'type'    => Controls_Manager::NUMBER,
				'default' => 6,
				'min'     => 1,
				'max'     => 8,
				'step'    => 1,
				'selectors' => array(
					'{{WRAPPER}} ' . '.advanced-testimonials-name' => 'order: {{VALUE}};',
				),
			)
		);
		$this->add_control(
			'position_order',
			array(
				'label'   => esc_html__( 'Position Order', 'advanced-elements' ),
				'type'    => Controls_Manager::NUMBER,
				'default' => 7,
				'min'     => 1,
				'max'     => 8,
				'step'    => 1,
				'selectors' => array(
					'{{WRAPPER}} ' . '.advanced-testimonials-position' => 'order: {{VALUE}};',
				),
			)
		);
		$this->add_control(
			'date_order',
			array(
				'label'   => esc_html__( 'Date Order', 'advanced-elements' ),
				'type'    => Controls_Manager::NUMBER,
				'default' => 8,
				'min'     => 1,
				'max'     => 8,
				'step'    => 1,
				'selectors' => array(
					'{{WRAPPER}} ' . '.advanced-testimonials-date' => 'order: {{VALUE}};',
				),
			)
		);
		$this->end_controls_section();
	}

	protected function render() {
		echo $this->generate_setting_json( $this->get_content() );
	}

	public function generate_setting_json( $content = null ) {
		$settings = $this->get_settings();
		$opts_array = array(
			'responsive' => array(
				'0'        => array( 'items' => absint( $settings['slides_to_show_mobile'] ) ),
				'767'      => array( 'items' => absint( $settings['slides_to_show_tablet'] ) ),
				'1025'     => array( 'items' => absint( $settings['slides_to_show'] ) ),
			),
			'navText'            => '',
			'navSpeed'           => absint( $settings['speed'] ),
			'dotsSpeed'          => absint( $settings['speed'] ),
			'autoplaySpeed'      => absint( $settings['speed'] ),
			'margin'             => absint( $settings['margin_slide'] ),
			'autoplayTimeout'    => absint( $settings['autoplay_speed'] ),
			'dots'               => filter_var( $settings['dots'], FILTER_VALIDATE_BOOLEAN ),
			'nav'                => filter_var( $settings['arrows'], FILTER_VALIDATE_BOOLEAN ),
			'autoplay'           => filter_var( $settings['autoplay'], FILTER_VALIDATE_BOOLEAN ),
			'loop'               => filter_var( $settings['infinite'], FILTER_VALIDATE_BOOLEAN ),
			'dotsEach'           => filter_var( $settings['dots_each'], FILTER_VALIDATE_BOOLEAN ),
			'autoplayHoverPause' => filter_var( $settings['pause_on_hover'], FILTER_VALIDATE_BOOLEAN ),
		);

		return sprintf(
			'<div class="advanced-testimonials owl-carousel owl-theme" data-options="%1$s">%2$s</div>',
			htmlspecialchars( json_encode( $opts_array ) ), $content
		);
	}

	public function get_content() {
		ob_start();
		$settings    = $this->get_settings();
		$icon_before = filter_var( $settings['tab_icon_before_show'], FILTER_VALIDATE_BOOLEAN );
		$icon_after  = filter_var( $settings['tab_icon_after_show'], FILTER_VALIDATE_BOOLEAN );
		$item_list   = $this->get_settings( 'item_list' );
		foreach( $item_list as $item ) {
			echo '<div class="advanced-testimonials-inner">';
				echo '<div class="advanced-testimonials-content">';
					echo sprintf( '<div class="advanced-testimonials-img-wrap"><img class="advanced-testimonials-img" src="%1$s" alt=""></div>', $item['item_image']['url'] );
					echo sprintf( '<div class="advanced-testimonials-title">%1$s</div>', $item['item_title'] );
					if( $icon_before ) { echo sprintf( '<div class="advanced-testimonials-icon-before"><div class="advanced-testimonials-icon-inner"><i class="%1$s"></i></div></div>', $item['item_icon_before'] ); }
					echo sprintf( '<div class="advanced-testimonials-comment"><span>%1$s</span></div>', $item['item_comment'] );
					if( $icon_after ) { echo sprintf( '<div class="advanced-testimonials-icon-after"><div class="advanced-testimonials-icon-inner"><i class="%1$s"></i></div></div>', $item['item_icon_after'] ); }
					echo sprintf( '<div class="advanced-testimonials-name">%1$s</div>', $item['item_name'] );
					echo sprintf( '<div class="advanced-testimonials-position">%1$s</div>', $item['item_position'] );
					echo sprintf( '<div class="advanced-testimonials-date">%1$s</div>', $item['item_date'] );
				echo '</div>';
			echo '</div>';
		}
		return ob_get_clean();
	}
}