<?php
namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit;

class Advanced_Carousel extends Widget_Base {

	public function get_name() {
		return 'advanced-carousel';
	}

	public function get_title() {
		return esc_html__( 'Advanced Carousel', 'advanced-elements' );
	}

	public function get_icon() {
		return 'eicon-slider-push';
	}

	public function get_categories() {
		return array( 'advanced-elements' );
	}

	protected function _register_controls() {
		$this->start_controls_section(
			'advanced_carousel',
			array(
				'label'      => esc_html__( 'Advanced Carousel Items', 'advanced-elements' ),
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
				'label' => esc_html__( 'Item Title', 'advanced-elements' ),
				'type'  => Controls_Manager::TEXT,
			)
		);
		$repeater->add_control(
			'item_descr',
			array(
				'label'   => esc_html__( 'Description', 'advanced-elements' ),
				'type'    => Controls_Manager::TEXTAREA,
				'default' => esc_html__( 'Item Description', 'advanced-elements' ),
			)
		);
		$repeater->add_control(
			'item_btn_show',
			array(
				'label'        => esc_html__( 'Show Button?', 'advanced-elements' ),
				'type'         => Controls_Manager::SWITCHER,
				'label_on'     => esc_html__( 'Yes', 'advanced-elements' ),
				'label_off'    => esc_html__( 'No', 'advanced-elements' ),
				'return_value' => 'yes',
				'default'      => 'yes',
			)
		);
		$repeater->add_control(
			'item_btn',
			array(
				'label'     => esc_html__( 'Button Text', 'advanced-elements' ),
				'type'      => Controls_Manager::TEXT,
				'default'   => esc_html__( 'Read more', 'advanced-elements' ),
				'condition' => array(
					'item_btn_show' => 'yes',
				),
			)
		);
		$repeater->add_control(
			'item_btn_url',
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
						'item_image'    => array(
							'url'         => Utils::get_placeholder_image_src(),
						),
						'item_title'    => esc_html__( 'Item #1', 'advanced-elements' ),
						'item_descr'    => esc_html__( 'Item Description 1 ', 'advanced-elements' ),
						'item_btn_show' => 'yes',
						'item_btn'      => esc_html__( 'Read more', 'advanced-elements' ),
						'item_btn_url'  => array(
							'url'         => '#',
						),
					),
					array(
						'item_image'    => array(
							'url'         => Utils::get_placeholder_image_src(),
						),
						'item_title'    => esc_html__( 'Item #2', 'advanced-elements' ),
						'item_descr'    => esc_html__( 'Item Description 2 ', 'advanced-elements' ),
						'item_btn_show' => 'yes',
						'item_btn'      => esc_html__( 'Read more', 'advanced-elements' ),
						'item_btn_url'  => array(
							'url'         => '#',
						),
					),
					array(
						'item_image'    => array(
							'url'         => Utils::get_placeholder_image_src(),
						),
						'item_title'    => esc_html__( 'Item #3', 'advanced-elements' ),
						'item_descr'    => esc_html__( 'Item Description 3 ', 'advanced-elements' ),
						'item_btn_show' => 'yes',
						'item_btn'      => esc_html__( 'Read more', 'advanced-elements' ),
						'item_btn_url'  => array(
							'url'         => '#',
						),
					),
					array(
						'item_image'    => array(
							'url'         => Utils::get_placeholder_image_src(),
						),
						'item_title'    => esc_html__( 'Item #4', 'advanced-elements' ),
						'item_descr'    => esc_html__( 'Item Description 4 ', 'advanced-elements' ),
						'item_btn_show' => 'yes',
						'item_btn'      => esc_html__( 'Read more', 'advanced-elements' ),
						'item_btn_url'  => array(
							'url'         => '#',
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
				'default'      => 'yes',
			)
		);
		$this->add_control(
			'autoplay_speed',
			array(
				'label'      => esc_html__( 'Autoplay Timeout', 'advanced-elements' ),
				'type'       => Controls_Manager::NUMBER,
				'default'    => 5000,
				'step'       => 1000,
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
				'step'    => 100,
			)
		);
		$this->add_control(
			'margin_slide',
			array(
				'label'     => esc_html__( 'Space Between Slides', 'advanced-elements' ),
				'type'      => Controls_Manager::NUMBER,
				'default'   => 20,
				'step'      => 1,
				'min'       => 0,
				'max'       => 200,
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
				'default'      => 'yes',
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
				'default'      => 'yes',
				'condition'    => array(
					'dots'       => 'yes',
				),
			)
		);
		$this->end_controls_section();

		$this->start_controls_section(
			'advanced_lightbox_settings',
			array(
				'label'      => esc_html__( 'Lightbox', 'advanced-elements' ),
				'tab'        => Controls_Manager::TAB_CONTENT,
				'show_label' => false,
			)
		);
		$this->add_control(
			'enable_lightbox',
			array(
				'label'        => esc_html__( 'Enable Lightbox?', 'advanced-elements' ),
				'label_on'     => esc_html__( 'Yes', 'advanced-elements' ),
				'label_off'    => esc_html__( 'No', 'advanced-elements' ),
				'type'         => Controls_Manager::SWITCHER,
				'return_value' => 'yes',
				'default'      => 'no',
			)
		);
		$this->add_control(
			'enable_gallery',
			array(
				'label'        => esc_html__( 'Enable Gallery?', 'advanced-elements' ),
				'label_on'     => esc_html__( 'Yes', 'advanced-elements' ),
				'label_off'    => esc_html__( 'No', 'advanced-elements' ),
				'type'         => Controls_Manager::SWITCHER,
				'return_value' => 'yes',
				'default'      => 'no',
				'condition'   => array(
					'enable_lightbox' => 'yes',
				),
			)
		);
		$this->add_control(
			'lightbox_icon',
			array(
				'label'       => esc_html__( 'Lightbox Icon', 'advanced-elements' ),
				'type'        => Controls_Manager::ICON,
				'label_block' => true,
				'file'        => '',
				'default'     => 'fa fa-search-plus',
				'condition'   => array(
					'enable_lightbox' => 'yes',
				),
			)
		);
		$this->end_controls_section();

		$this->start_controls_section(
			'items',
			array(
				'label'      => esc_html__( 'Items', 'advanced-elements' ),
				'tab'        => Controls_Manager::TAB_STYLE,
				'show_label' => false,
			)
		);
		$this->add_group_control(
			Group_Control_Background::get_type(),
			array(
				'name'     => 'items_background',
				'selector' => '{{WRAPPER}} ' . '.advanced-carousel-inner',
			)
		);
		$this->add_responsive_control(
			'items_padding',
			array(
				'label'       => esc_html__( 'Column Padding', 'advanced-elements' ),
				'type'        => Controls_Manager::DIMENSIONS,
				'size_units'  => array( 'px', '%', 'em' ),
				'selectors'   => array(
					'{{WRAPPER}} ' . '.advanced-carousel-inner' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				),
			)
		);
		$this->add_responsive_control(
			'items_margin',
			array(
				'label'       => esc_html__( 'Column Margin', 'advanced-elements' ),
				'type'        => Controls_Manager::DIMENSIONS,
				'size_units'  => array( 'px', '%', 'em' ),
				'selectors'   => array(
					'{{WRAPPER}} ' . '.advanced-carousel-inner' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				),
			)
		);
		$this->add_group_control(
			Group_Control_Border::get_type(),
			array(
				'name'        => 'items_border',
				'label'       => esc_html__( 'Border', 'advanced-elements' ),
				'placeholder' => '1px',
				'default'     => '',
				'selector'    => '{{WRAPPER}} ' . '.advanced-carousel-inner',
			)
		);
		$this->add_responsive_control(
			'items_border_radius',
			array(
				'label'      => esc_html__( 'Border Radius', 'advanced-elements' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => array( 'px', '%', 'em' ),
				'selectors'  => array(
					'{{WRAPPER}} ' . '.advanced-carousel-inner' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				),
			)
		);
		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			array(
				'name'     => 'items_box_shadow',
				'selector' => '{{WRAPPER}} ' . '.advanced-carousel-inner',
			)
		);
		$this->end_controls_section();

		$this->start_controls_section(
			'image_style',
			array(
				'label'      => esc_html__( 'Image', 'advanced-elements' ),
				'tab'        => Controls_Manager::TAB_STYLE,
				'show_label' => false,
			)
		);
		$this->add_control(
			'image_bg_color',
			array(
				'label'     => esc_html__( 'Background Color', 'advanced-elements' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => array(
					'{{WRAPPER}} ' . '.advanced-carousel-img-wrap' => 'background-color: {{VALUE}}',
				),
			)
		);
		$this->add_responsive_control(
			'image_padding',
			array(
				'label'       => esc_html__( 'Column Padding', 'advanced-elements' ),
				'type'        => Controls_Manager::DIMENSIONS,
				'size_units'  => array( 'px', '%', 'em' ),
				'selectors'   => array(
					'{{WRAPPER}} ' . '.advanced-carousel-img-wrap' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				),
			)
		);
		$this->add_responsive_control(
			'image_margin',
			array(
				'label'       => esc_html__( 'Column Margin', 'advanced-elements' ),
				'type'        => Controls_Manager::DIMENSIONS,
				'size_units'  => array( 'px', '%', 'em' ),
				'selectors'   => array(
					'{{WRAPPER}} ' . '.advanced-carousel-img-wrap' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				),
			)
		);
		$this->add_group_control(
			Group_Control_Border::get_type(),
			array(
				'name'        => 'image_border',
				'label'       => esc_html__( 'Border', 'advanced-elements' ),
				'placeholder' => '1px',
				'default'     => '',
				'selector'    => '{{WRAPPER}} ' . '.advanced-carousel-img-wrap',
			)
		);
		$this->add_responsive_control(
			'image_border_radius',
			array(
				'label'      => esc_html__( 'Border Radius', 'advanced-elements' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => array( 'px', '%', 'em' ),
				'selectors'  => array(
					'{{WRAPPER}} ' . '.advanced-carousel-img-wrap' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					'{{WRAPPER}} ' . '.advanced-carousel-img-wrap .advanced-carousel-img' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				),
			)
		);
		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			array(
				'name'     => 'image_box_shadow',
				'selector' => '{{WRAPPER}} ' . '.advanced-carousel-img-wrap',
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
					'{{WRAPPER}} ' . '.advanced-carousel-title' => 'color: {{VALUE}}',
				),
			)
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			array(
				'name'     => 'title_typography',
				'scheme'   => Scheme_Typography::TYPOGRAPHY_3,
				'selector' => '{{WRAPPER}} ' . '.advanced-carousel-title',
			)
		);
		$this->add_group_control(
			Group_Control_Background::get_type(),
			array(
				'name'     => 'title_background',
				'selector' => '{{WRAPPER}} ' . '.advanced-carousel-title',
			)
		);
		$this->add_group_control(
			Group_Control_Border::get_type(),
			array(
				'name'        => 'title_border',
				'label'       => esc_html__( 'Border', 'advanced-elements' ),
				'placeholder' => '1px',
				'default'     => '',
				'selector'    => '{{WRAPPER}} ' . '.advanced-carousel-title',
			)
		);
		$this->add_responsive_control(
			'title_border_radius',
			array(
				'label'      => esc_html__( 'Border Radius', 'advanced-elements' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => array( 'px', '%', 'em' ),
				'selectors'  => array(
					'{{WRAPPER}} ' . '.advanced-carousel-title' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				),
			)
		);
		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			array(
				'name'     => 'title_box_shadow',
				'selector' => '{{WRAPPER}} ' . '.advanced-carousel-title',
			)
		);
		$this->add_responsive_control(
			'title_padding',
			array(
				'label'      => esc_html__( 'Padding', 'advanced-elements' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => array( 'px', '%', 'em' ),
				'selectors'  => array(
					'{{WRAPPER}} ' . '.advanced-carousel-title' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
					'{{WRAPPER}} ' . '.advanced-carousel-title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				),
			)
		);
		$this->add_responsive_control(
			'title_alignment',
			array(
				'label'   => esc_html__( 'Title Alignment', 'advanced-elements' ),
				'type'    => Controls_Manager::CHOOSE,
				'default' => 'left',
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
					'{{WRAPPER}} ' . '.advanced-carousel-title' => 'text-align: {{VALUE}};',
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
					'{{WRAPPER}} ' . '.advanced-carousel-description' => 'color: {{VALUE}}',
				),
			)
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			array(
				'name'     => 'descr_typography',
				'scheme'   => Scheme_Typography::TYPOGRAPHY_3,
				'selector' => '{{WRAPPER}} ' . '.advanced-carousel-description',
			)
		);
		$this->add_group_control(
			Group_Control_Background::get_type(),
			array(
				'name'     => 'descr_background',
				'selector' => '{{WRAPPER}} ' . '.advanced-carousel-description',
			)
		);
		$this->add_group_control(
			Group_Control_Border::get_type(),
			array(
				'name'        => 'descr_border',
				'label'       => esc_html__( 'Border', 'advanced-elements' ),
				'placeholder' => '1px',
				'default'     => '',
				'selector'    => '{{WRAPPER}} ' . '.advanced-carousel-description',
			)
		);
		$this->add_responsive_control(
			'descr_border_radius',
			array(
				'label'      => esc_html__( 'Border Radius', 'advanced-elements' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => array( 'px', '%', 'em' ),
				'selectors'  => array(
					'{{WRAPPER}} ' . '.advanced-carousel-description' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				),
			)
		);
		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			array(
				'name'     => 'descr_box_shadow',
				'selector' => '{{WRAPPER}} ' . '.advanced-carousel-description',
			)
		);
		$this->add_responsive_control(
			'descr_padding',
			array(
				'label'      => esc_html__( 'Padding', 'advanced-elements' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => array( 'px', '%', 'em' ),
				'selectors'  => array(
					'{{WRAPPER}} ' . '.advanced-carousel-description' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
					'{{WRAPPER}} ' . '.advanced-carousel-description' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				),
			)
		);
		$this->add_responsive_control(
			'descr_alignment',
			array(
				'label'   => esc_html__( 'Title Alignment', 'advanced-elements' ),
				'type'    => Controls_Manager::CHOOSE,
				'default' => 'left',
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
					'{{WRAPPER}} ' . '.advanced-carousel-description' => 'text-align: {{VALUE}};',
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
					'{{WRAPPER}} ' . '.advanced-carousel-btn-wrap .advanced-carousel-btn' => 'color: {{VALUE}}',
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
					'value' => Scheme_Color::COLOR_4,
				),
				'selectors' => array(
					'{{WRAPPER}} ' . '.advanced-carousel-btn-wrap .advanced-carousel-btn' => 'background-color: {{VALUE}}',
				),
			)
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			array(
				'name'     => 'button_typography',
				'scheme'   => Scheme_Typography::TYPOGRAPHY_4,
				'selector' => '{{WRAPPER}} ' . '.advanced-carousel-btn-wrap .advanced-carousel-btn',
			)
		);
		$this->add_responsive_control(
			'button_padding',
			array(
				'label'      => esc_html__( 'Padding', 'advanced-elements' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => array( 'px', '%', 'em' ),
				'selectors'  => array(
					'{{WRAPPER}} ' . '.advanced-carousel-btn-wrap .advanced-carousel-btn' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
					'{{WRAPPER}} ' . '.advanced-carousel-btn-wrap .advanced-carousel-btn' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
				'selector'    => '{{WRAPPER}} ' . '.advanced-carousel-btn-wrap .advanced-carousel-btn',
			)
		);
		$this->add_responsive_control(
			'button_border_radius',
			array(
				'label'      => esc_html__( 'Border Radius', 'advanced-elements' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => array( 'px', '%', 'em' ),
				'selectors'  => array(
					'{{WRAPPER}} ' . '.advanced-carousel-btn-wrap .advanced-carousel-btn' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				),
			)
		);
		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			array(
				'name'      => 'button_box_shadow',
				'selector'  => '{{WRAPPER}} ' . '.advanced-carousel-btn-wrap .advanced-carousel-btn',
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
					'{{WRAPPER}} ' . '.advanced-carousel-btn-wrap .advanced-carousel-btn:hover' => 'color: {{VALUE}}',
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
					'value' => Scheme_Color::COLOR_4,
				),
				'selectors' => array(
					'{{WRAPPER}} ' . '.advanced-carousel-btn-wrap .advanced-carousel-btn:hover' => 'background-color: {{VALUE}}',
				),
			)
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			array(
				'name'     => 'button_typography_hover',
				'scheme'   => Scheme_Typography::TYPOGRAPHY_4,
				'selector' => '{{WRAPPER}} ' . '.advanced-carousel-btn-wrap .advanced-carousel-btn:hover',
			)
		);
		$this->add_responsive_control(
			'button_padding_hover',
			array(
				'label'      => esc_html__( 'Padding', 'advanced-elements' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => array( 'px', '%', 'em' ),
				'selectors'  => array(
					'{{WRAPPER}} ' . '.advanced-carousel-btn-wrap .advanced-carousel-btn:hover' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
					'{{WRAPPER}} ' . '.advanced-carousel-btn-wrap .advanced-carousel-btn:hover' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
				'selector'    => '{{WRAPPER}} ' . '.advanced-carousel-btn-wrap .advanced-carousel-btn:hover',
			)
		);
		$this->add_responsive_control(
			'button_border_radius_hover',
			array(
				'label'      => esc_html__( 'Border Radius', 'advanced-elements' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => array( 'px', '%', 'em' ),
				'selectors'  => array(
					'{{WRAPPER}} ' . '.advanced-carousel-btn-wrap .advanced-carousel-btn:hover' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				),
			)
		);
		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			array(
				'name'      => 'button_box_shadow_hover',
				'selector'  => '{{WRAPPER}} ' . '.advanced-carousel-btn-wrap .advanced-carousel-btn:hover',
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
				'default' => 'left',
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
					'{{WRAPPER}} ' . '.advanced-carousel-btn-wrap' => 'text-align: {{VALUE}};',
				),
				'separator' => 'before',
			)
		);
		$this->end_controls_section();

		$this->start_controls_section(
			'section_arrows_style',
			array(
				'label'      => esc_html__( 'Carousel Arrows', 'advanced-elements' ),
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
					'{{WRAPPER}} ' . '.advanced-carousel .owl-nav button' => 'color: {{VALUE}}',
				),
			)
		);
		$this->add_control(
			'tabs_arrows_bg_color',
			array(
				'label'     => esc_html__( 'Background Color', 'advanced-elements' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => array(
					'{{WRAPPER}} ' . '.advanced-carousel .owl-nav button' => 'background-color: {{VALUE}}',
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
					'{{WRAPPER}} ' . '.advanced-carousel .owl-nav button::before' => 'font-size: {{SIZE}}{{UNIT}};',
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
					'{{WRAPPER}} ' . '.advanced-carousel .owl-nav button' => 'width: {{SIZE}}{{UNIT}}; height: {{SIZE}}{{UNIT}};',
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
				'selector'    => '{{WRAPPER}} ' . '.advanced-carousel .owl-nav button',
			)
		);
		$this->add_responsive_control(
			'tabs_arrows_border_radius',
			array(
				'label'      => esc_html__( 'Border Radius', 'advanced-elements' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => array( 'px', '%', 'em' ),
				'selectors'  => array(
					'{{WRAPPER}} ' . '.advanced-carousel .owl-nav button' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				),
			)
		);
		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			array(
				'name'     => 'tabs_arrows_box_shadow',
				'selector' => '{{WRAPPER}} ' . '.advanced-carousel .owl-nav button',
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
					'{{WRAPPER}} ' . '.advanced-carousel .owl-nav button:hover' => 'color: {{VALUE}}',
				),
			)
		);
		$this->add_control(
			'tabs_arrows_bg_color_hover',
			array(
				'label'     => esc_html__( 'Background Color', 'advanced-elements' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => array(
					'{{WRAPPER}} ' . '.advanced-carousel .owl-nav button:hover' => 'background-color: {{VALUE}}',
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
					'{{WRAPPER}} ' . '.advanced-carousel .owl-nav button:hover::before' => 'font-size: {{SIZE}}{{UNIT}};',
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
					'{{WRAPPER}} ' . '.advanced-carousel .owl-nav button:hover' => 'width: {{SIZE}}{{UNIT}}; height: {{SIZE}}{{UNIT}};',
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
				'selector'    => '{{WRAPPER}} ' . '.advanced-carousel .owl-nav button:hover',
			)
		);
		$this->add_responsive_control(
			'tabs_arrows_border_radius_hover',
			array(
				'label'      => esc_html__( 'Border Radius', 'advanced-elements' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => array( 'px', '%', 'em' ),
				'selectors'  => array(
					'{{WRAPPER}} ' . '.advanced-carousel .owl-nav button:hover' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				),
			)
		);
		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			array(
				'name'     => 'tabs_arrows_box_shadow_hover',
				'selector' => '{{WRAPPER}} ' . '.advanced-carousel .owl-nav button:hover',
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
					'{{WRAPPER}} .advanced-carousel .owl-nav button.owl-prev' => 'top: {{SIZE}}{{UNIT}}; bottom: auto;',
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
					'{{WRAPPER}} .advanced-carousel .owl-nav button.owl-prev' => 'bottom: {{SIZE}}{{UNIT}}; top: auto;',
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
					'{{WRAPPER}} .advanced-carousel .owl-nav button.owl-prev' => 'left: {{SIZE}}{{UNIT}}; right: auto;',
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
					'{{WRAPPER}} .advanced-carousel .owl-nav button.owl-prev' => 'right: {{SIZE}}{{UNIT}}; left: auto;',
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
					'{{WRAPPER}} .advanced-carousel .owl-nav button.owl-next' => 'top: {{SIZE}}{{UNIT}}; bottom: auto;',
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
					'{{WRAPPER}} .advanced-carousel .owl-nav button.owl-next' => 'bottom: {{SIZE}}{{UNIT}}; top: auto;',
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
					'{{WRAPPER}} .advanced-carousel .owl-nav button.owl-next' => 'left: {{SIZE}}{{UNIT}}; right: auto;',
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
					'{{WRAPPER}} .advanced-carousel .owl-nav button.owl-next' => 'right: {{SIZE}}{{UNIT}}; left: auto;',
				),
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
					'{{WRAPPER}} ' . '.owl-dots .owl-dot span' => 'background-color: {{VALUE}}',
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
					'{{WRAPPER}} ' . '.owl-dots .owl-dot span' => 'width: {{SIZE}}{{UNIT}}; height: {{SIZE}}{{UNIT}};',
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
					'{{WRAPPER}} ' . '.owl-dots .owl-dot' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
				'selector'    => '{{WRAPPER}} ' . '.owl-dots .owl-dot span',
			)
		);
		$this->add_responsive_control(
			'tabs_dots_border_radius',
			array(
				'label'      => esc_html__( 'Border Radius', 'advanced-elements' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => array( 'px', '%', 'em' ),
				'selectors'  => array(
					'{{WRAPPER}} ' . '.owl-dots .owl-dot span' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				),
			)
		);
		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			array(
				'name'     => 'tabs_dots_box_shadow',
				'selector' => '{{WRAPPER}} ' . '.owl-dots .owl-dot span',
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
					'{{WRAPPER}} ' . '.owl-dots .owl-dot:hover span' => 'background-color: {{VALUE}}',
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
					'{{WRAPPER}} ' . '.owl-dots .owl-dot:hover span' => 'width: {{SIZE}}{{UNIT}}; height: {{SIZE}}{{UNIT}};',
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
					'{{WRAPPER}} ' . '.owl-dots .owl-dot:hover' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
				'selector'    => '{{WRAPPER}} ' . '.owl-dots .owl-dot:hover span',
			)
		);
		$this->add_responsive_control(
			'tabs_dots_border_radius_hover',
			array(
				'label'      => esc_html__( 'Border Radius', 'advanced-elements' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => array( 'px', '%', 'em' ),
				'selectors'  => array(
					'{{WRAPPER}} ' . '.owl-dots .owl-dot:hover span' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				),
			)
		);
		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			array(
				'name'     => 'tabs_dots_box_shadow_hover',
				'selector' => '{{WRAPPER}} ' . '.owl-dots .owl-dot:hover span',
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
					'{{WRAPPER}} ' . '.owl-dots .owl-dot.active span' => 'background-color: {{VALUE}}',
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
					'{{WRAPPER}} ' . '.owl-dots .owl-dot.active span' => 'width: {{SIZE}}{{UNIT}}; height: {{SIZE}}{{UNIT}};',
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
					'{{WRAPPER}} ' . '.owl-dots .owl-dot.active' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
				'selector'    => '{{WRAPPER}} ' . '.owl-dots .owl-dot.active span',
			)
		);
		$this->add_responsive_control(
			'tabs_dots_border_radius_active',
			array(
				'label'      => esc_html__( 'Border Radius', 'advanced-elements' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => array( 'px', '%', 'em' ),
				'selectors'  => array(
					'{{WRAPPER}} ' . '.owl-dots .owl-dot.active span' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				),
			)
		);
		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			array(
				'name'     => 'tabs_dots_box_shadow_active',
				'selector' => '{{WRAPPER}} ' . '.owl-dots .owl-dot.active span',
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
					'{{WRAPPER}} ' . '.owl-dots' => 'text-align: {{VALUE}};',
				),
				'separator' => 'before',
			)
		);
		$this->end_controls_section();

		$this->start_controls_section(
			'section_lightbox_style',
			array(
				'label'      => esc_html__( 'Lightbox', 'advanced-elements' ),
				'tab'        => Controls_Manager::TAB_STYLE,
				'show_label' => false,
			)
		);
		$this->add_control(
			'overlay_style',
			array(
				'label'     => esc_html__( 'Overlay', 'advanced-elements' ),
				'type'      => Controls_Manager::HEADING,
				'separator' => 'after',
			)
		);
		$this->add_responsive_control(
			'overlay_margin',
			array(
				'label'       => esc_html__( 'Margin', 'advanced-elements' ),
				'type'        => Controls_Manager::DIMENSIONS,
				'size_units'  => array( 'px', '%', 'em' ),
				'selectors'   => array(
					'{{WRAPPER}} ' . '.advanced-carousel-img-wrap .advanced-carousel-img-overlay' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				),
			)
		);
		$this->add_control(
			'overlay_bg_color',
			array(
				'label'     => esc_html__( 'Background Color', 'advanced-elements' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => array(
					'{{WRAPPER}} ' . '.advanced-carousel-img-wrap .advanced-carousel-img-overlay' => 'background-color: {{VALUE}}',
				),
			)
		);
		$this->add_group_control(
			Group_Control_Border::get_type(),
			array(
				'name'        => 'overlay_border',
				'label'       => esc_html__( 'Border', 'advanced-elements' ),
				'placeholder' => '1px',
				'default'     => '',
				'selector'    => '{{WRAPPER}} ' . '.advanced-carousel-img-wrap .advanced-carousel-img-overlay',
			)
		);
		$this->add_responsive_control(
			'overlay_border_radius',
			array(
				'label'      => esc_html__( 'Border Radius', 'advanced-elements' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => array( 'px', '%', 'em' ),
				'selectors'  => array(
					'{{WRAPPER}} ' . '.advanced-carousel-img-wrap .advanced-carousel-img-overlay' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				),
			)
		);
		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			array(
				'name'      => 'overlay_box_shadow',
				'selector'  => '{{WRAPPER}} ' . '.advanced-carousel-img-wrap .advanced-carousel-img-overlay',
				'separator' => 'after',
			)
		);
		$this->add_control(
			'overlay_icon_style',
			array(
				'label'     => esc_html__( 'Icon', 'advanced-elements' ),
				'type'      => Controls_Manager::HEADING,
				'separator' => 'after',
			)
		);
		$this->start_controls_tabs( 'tabs_overlay_icon' );
		$this->start_controls_tab(
			'tabs_icon',
			array(
				'label' => esc_html__( 'Normal', 'advanced-elements' ),
			)
		);
		$this->add_control(
			'tabs_icon_color',
			array(
				'label'     => esc_html__( 'Color', 'advanced-elements' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => array(
					'{{WRAPPER}} ' . '.advanced-carousel-img-wrap .advanced-popup-img span' => 'color: {{VALUE}}',
				),
			)
		);
		$this->add_control(
			'tabs_icon_bg_color',
			array(
				'label'     => esc_html__( 'Background Color', 'advanced-elements' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => array(
					'{{WRAPPER}} ' . '.advanced-carousel-img-wrap .advanced-popup-img' => 'background-color: {{VALUE}}',
				),
			)
		);
		$this->add_responsive_control(
			'tabs_icon_size',
			array(
				'label'      => esc_html__( 'Icon Size', 'advanced-elements' ),
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
					'{{WRAPPER}} ' . '.advanced-carousel-img-wrap .advanced-popup-img span' => 'font-size: {{SIZE}}{{UNIT}};',
				),
			)
		);
		$this->add_group_control(
			Group_Control_Border::get_type(),
			array(
				'name'        => 'tabs_icon_border',
				'label'       => esc_html__( 'Border', 'advanced-elements' ),
				'placeholder' => '1px',
				'default'     => '',
				'selector'    => '{{WRAPPER}} ' . '.advanced-carousel-img-wrap .advanced-popup-img',
			)
		);
		$this->add_responsive_control(
			'tabs_icon_border_radius',
			array(
				'label'      => esc_html__( 'Border Radius', 'advanced-elements' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => array( 'px', '%', 'em' ),
				'selectors'  => array(
					'{{WRAPPER}} ' . '.advanced-carousel-img-wrap .advanced-popup-img' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				),
			)
		);
		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			array(
				'name'     => 'tabs_icon_box_shadow',
				'selector' => '{{WRAPPER}} ' . '.advanced-carousel-img-wrap .advanced-popup-img',
			)
		);
		$this->add_responsive_control(
			'overlay_icon_padding',
			array(
				'label'       => esc_html__( 'Padding', 'advanced-elements' ),
				'type'        => Controls_Manager::DIMENSIONS,
				'size_units'  => array( 'px', '%', 'em' ),
				'selectors'   => array(
					'{{WRAPPER}} ' . '.advanced-carousel-img-wrap .advanced-popup-img' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				),
			)
		);
		$this->end_controls_tab();
		$this->start_controls_tab(
			'tabs_icon_hover',
			array(
				'label' => esc_html__( 'Hover', 'advanced-elements' ),
			)
		);
		$this->add_control(
			'tabs_icon_color_hover',
			array(
				'label'     => esc_html__( 'Color', 'advanced-elements' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => array(
					'{{WRAPPER}} ' . '.advanced-carousel-img-wrap .advanced-popup-img:hover span' => 'color: {{VALUE}}',
				),
			)
		);
		$this->add_control(
			'tabs_icon_bg_color_hover',
			array(
				'label'     => esc_html__( 'Background Color', 'advanced-elements' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => array(
					'{{WRAPPER}} ' . '.advanced-carousel-img-wrap .advanced-popup-img:hover' => 'background-color: {{VALUE}}',
				),
			)
		);
		$this->add_responsive_control(
			'tabs_icon_size_hover',
			array(
				'label'      => esc_html__( 'Icon Size', 'advanced-elements' ),
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
					'{{WRAPPER}} ' . '.advanced-carousel-img-wrap .advanced-popup-img:hover span' => 'font-size: {{SIZE}}{{UNIT}};',
				),
			)
		);
		$this->add_group_control(
			Group_Control_Border::get_type(),
			array(
				'name'        => 'tabs_icon_border_hover',
				'label'       => esc_html__( 'Border', 'advanced-elements' ),
				'placeholder' => '1px',
				'default'     => '',
				'selector'    => '{{WRAPPER}} ' . '.advanced-carousel-img-wrap .advanced-popup-img:hover',
			)
		);
		$this->add_responsive_control(
			'tabs_icon_border_radius_hover',
			array(
				'label'      => esc_html__( 'Border Radius', 'advanced-elements' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => array( 'px', '%', 'em' ),
				'selectors'  => array(
					'{{WRAPPER}} ' . '.advanced-carousel-img-wrap .advanced-popup-img:hover' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				),
			)
		);
		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			array(
				'name'     => 'tabs_icon_box_shadow_hover',
				'selector' => '{{WRAPPER}} ' . '.advanced-carousel-img-wrap .advanced-popup-img:hover',
			)
		);
		$this->add_responsive_control(
			'overlay_icon_padding_hover',
			array(
				'label'       => esc_html__( 'Padding', 'advanced-elements' ),
				'type'        => Controls_Manager::DIMENSIONS,
				'size_units'  => array( 'px', '%', 'em' ),
				'selectors'   => array(
					'{{WRAPPER}} ' . '.advanced-carousel-img-wrap .advanced-popup-img:hover' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				),
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
			'responsive'   => array(
				'0'     => array( 'items' => absint( $settings['slides_to_show_mobile'] ) ),
				'767'   => array( 'items' => absint( $settings['slides_to_show_tablet'] ) ),
				'1025'  => array( 'items' => absint( $settings['slides_to_show'] ) ),
			),
			'navText'            => '',
			'navSpeed'           => absint( $settings['speed'] ),
			'dotsSpeed'          => absint( $settings['speed'] ),
			'autoplaySpeed'      => absint( $settings['speed'] ),
			'margin'             => absint( $settings['margin_slide'] ),
			'autoplayTimeout'    => absint( $settings['autoplay_speed'] ),
			'autoplay'           => filter_var( $settings['autoplay'], FILTER_VALIDATE_BOOLEAN ),
			'loop'               => filter_var( $settings['infinite'], FILTER_VALIDATE_BOOLEAN ),
			'autoplayHoverPause' => filter_var( $settings['pause_on_hover'], FILTER_VALIDATE_BOOLEAN ),
			'nav'                => filter_var( $settings['arrows'], FILTER_VALIDATE_BOOLEAN ),
			'dots'               => filter_var( $settings['dots'], FILTER_VALIDATE_BOOLEAN ),
			'dotsEach'           => filter_var( $settings['dots_each'], FILTER_VALIDATE_BOOLEAN ),
		);

		return sprintf(
			'<div class="advanced-carousel owl-carousel owl-theme" data-carousel-settings="%1$s">%2$s</div>',
			htmlspecialchars( json_encode( $opts_array ) ), $content
		);
	}

	public function get_content() {
		ob_start();
		$items_list = $this->get_settings( 'items_list' );
		foreach ( $items_list as $item ) {
			echo '<div class="advanced-carousel-inner">';
				echo '<div class="advanced-carousel-content">';
					echo '<div class="advanced-carousel-img-wrap">';
						echo sprintf( '<img class="advanced-carousel-img" src="%1$s" alt="%2$s">', $item['item_image']['url'], $item['item_title'] );
						if( 'yes' === $this->get_settings( 'enable_lightbox' ) ) {
							echo '<div class="advanced-carousel-img-overlay">';
								echo sprintf(
									'<a class="advanced-popup-img" href="%1$s" data-elementor-open-lightbox="yes" %3$s><span class="%2$s"></span></a>',
									$item['item_image']['url'],
									$this->get_settings( 'lightbox_icon' ),
									filter_var( $this->get_settings( 'enable_gallery' ), FILTER_VALIDATE_BOOLEAN ) ? 'data-elementor-lightbox-slideshow="' . uniqid() . '"' : ''
								);
							echo '</div>';
						}
					echo '</div>';
					if( !empty( $item['item_title'] ) ) {
						echo sprintf( '<div class="advanced-carousel-title"><h4>%1$s</h4></div>', $item['item_title'] );
					}
					if( !empty( $item['item_descr'] ) ) {
						echo sprintf( '<div class="advanced-carousel-description"><p>%1$s</p></div>', $item['item_descr'] );
					}
					if( 'yes' === $item['item_btn_show'] && !empty( $item['item_btn'] ) ) {
						if ( !empty( $item['item_btn_url']['url'] ) ) {
							if( $item['item_btn_url']['is_external'] ) {
								$this->add_render_attribute( 'advanced_btn_attribute', 'target', '_blank' );
							}
							if( $item['item_btn_url']['nofollow'] ) {
								$this->add_render_attribute( 'advanced_btn_attribute', 'rel', 'nofollow' );
							}
						}
						echo sprintf( '<div class="advanced-carousel-btn-wrap"><a class="advanced-carousel-btn" href="%1$s" %2$s>%3$s</a></div>', $item['item_btn_url']['url'] ? $item['item_btn_url']['url'] : '#', $this->get_render_attribute_string( 'advanced_btn_attribute' ), $item['item_btn'] );
					}
				echo '</div>';
			echo '</div>';
		}
		return ob_get_clean();
	}
}