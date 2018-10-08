<?php
namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit;

class Advanced_Image_Gallery extends Widget_Base {

	public function get_name() {
		return 'advanced-image-gallery';
	}

	public function get_title() {
		return esc_html__( 'Image Gallery', 'advanced-elements' );
	}

	public function get_icon() {
		return 'eicon-apps';
	}

	public function get_categories() {
		return array( 'advanced-elements' );
	}

	protected function _register_controls() {
		$this->start_controls_section(
			'gallery_images',
			array(
				'label'      => esc_html__( 'Gallery Images', 'advanced-elements' ),
				'tab'        => Controls_Manager::TAB_CONTENT,
				'show_label' => false,
			)
		);
		$repeater = new Repeater();
		$repeater->add_control(
			'gallery_item_image',
			array(
				'label'   => esc_html__( 'Image', 'advanced-elements' ),
				'type'    => Controls_Manager::MEDIA,
				'default' => array(
					'url'   => Utils::get_placeholder_image_src(),
				),
			)
		);
		$repeater->add_control(
			'gallery_item_icon',
			array(
				'label'       => esc_html__( 'Icon', 'advanced-elements' ),
				'type'        => Controls_Manager::ICON,
				'label_block' => true,
				'default'     => 'fa fa-search-plus',
			)
		);
		$repeater->add_control(
			'gallery_item_title',
			array(
				'label' => esc_html__( 'Item Title', 'advanced-elements' ),
				'type'  => Controls_Manager::TEXT,
			)
		);
		$repeater->add_control(
			'gallery_item_descr',
			array(
				'label'   => esc_html__( 'Description', 'advanced-elements' ),
				'type'    => Controls_Manager::TEXTAREA,
				'default' => 'Item Description',
			)
		);
		$this->add_control(
			'gallery_items_list',
			array(
				'type'        => Controls_Manager::REPEATER,
				'fields'      => array_values( $repeater->get_controls() ),
				'default'     => array(
					array(
						'gallery_item_image'      => array(
							'url'                   => Utils::get_placeholder_image_src(),
						),
						'gallery_item_icon'       => 'fa fa-search-plus',
						'gallery_item_title'      => esc_html__( 'Image #1', 'advanced-elements' ),
						'gallery_item_descr'      => esc_html__( 'Image Description #1', 'advanced-elements' ),
					),
					array(
						'gallery_item_image'      => array(
							'url'                   => Utils::get_placeholder_image_src(),
						),
						'gallery_item_icon'       => 'fa fa-search-plus',
						'gallery_item_title'      => esc_html__( 'Image #2', 'advanced-elements' ),
						'gallery_item_descr'      => esc_html__( 'Image Description #2', 'advanced-elements' ),
					),
					array(
						'gallery_item_image'      => array(
							'url'                   => Utils::get_placeholder_image_src(),
						),
						'gallery_item_icon'       => 'fa fa-search-plus',
						'gallery_item_title'      => esc_html__( 'Image #3', 'advanced-elements' ),
						'gallery_item_descr'      => esc_html__( 'Image Description #3', 'advanced-elements' ),
					),
					array(
						'gallery_item_image'      => array(
							'url'                   => Utils::get_placeholder_image_src(),
						),
						'gallery_item_icon'       => 'fa fa-search-plus',
						'gallery_item_title'      => esc_html__( 'Image #4', 'advanced-elements' ),
						'gallery_item_descr'      => esc_html__( 'Image Description #4', 'advanced-elements' ),
					),
					array(
						'gallery_item_image'      => array(
							'url'                   => Utils::get_placeholder_image_src(),
						),
						'gallery_item_icon'       => 'fa fa-search-plus',
						'gallery_item_title'      => esc_html__( 'Image #5', 'advanced-elements' ),
						'gallery_item_descr'      => esc_html__( 'Image Description #5', 'advanced-elements' ),
					),
					array(
						'gallery_item_image'      => array(
							'url'                   => Utils::get_placeholder_image_src(),
						),
						'gallery_item_icon'       => 'fa fa-search-plus',
						'gallery_item_title'      => esc_html__( 'Image #6', 'advanced-elements' ),
						'gallery_item_descr'      => esc_html__( 'Image Description #6', 'advanced-elements' ),
					),
				),
				'title_field' => '{{{ gallery_item_title }}}',
			)
		);
		$this->end_controls_section();

		$this->start_controls_section(
			'gallery_settings',
			array(
				'label'      => esc_html__( 'Settings', 'advanced-elements' ),
				'tab'        => Controls_Manager::TAB_CONTENT,
				'show_label' => false,
			)
		);
		$this->add_control(
			'gallery_gallery_enable',
			array(
				'label'        => esc_html__( 'Enable Gallery?', 'advanced-elements' ),
				'label_on'     => esc_html__( 'Yes', 'advanced-elements' ),
				'label_off'    => esc_html__( 'No', 'advanced-elements' ),
				'type'         => Controls_Manager::SWITCHER,
				'return_value' => 'yes',
				'default'      => 'yes',
				'separator'    => 'after',
			)
		);
		$this->add_control(
			'gallery_layout_type',
			array(
				'label'   => esc_html__( 'Layout Type', 'advanced-elements' ),
				'type'    => Controls_Manager::SELECT,
				'default' => 'grid',
				'options' => array(
					'masonry' => esc_html__( 'Masonry', 'advanced-elements' ),
					'grid'    => esc_html__( 'Grid', 'advanced-elements' ),
					'justify' => esc_html__( 'Justify', 'advanced-elements' ),
					'list'    => esc_html__( 'List', 'advanced-elements' ),
				),
			)
		);
		$this->add_responsive_control(
			'gallery_columns',
			array(
				'label'        => esc_html__( 'Columns', 'advanced-elements' ),
				'type'         => Controls_Manager::NUMBER,
				'default'      => 3,
				'min'          => 1,
				'max'          => 6,
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
				'condition'     => array(
					'gallery_layout_type' => array( 'masonry', 'grid' ),
				),
			)
		);
		$this->add_responsive_control(
			'gallery_item_height',
			array(
				'label' => esc_html__( 'Item Height', 'advanced-elements' ),
				'type'  => Controls_Manager::SLIDER,
				'range' => array(
					'px' => array(
						'min' => 100,
						'max' => 1000,
					),
				),
				'default' => array(
					'size' => 300,
				),
				'condition' => array(
					'gallery_layout_type' => 'grid',
				),
				'selectors' => array(
					'{{WRAPPER}} ' . '.advanced-gallery-img' => 'height: {{SIZE}}{{UNIT}};',
				),
			)
		);
		$this->add_control(
			'gallery_justify_height',
			array(
				'label'    => esc_html__( 'Justify Height', 'advanced-elements' ),
				'type'     => Controls_Manager::NUMBER,
				'default'  => 300,
				'min'      => 100,
				'max'      => 1000,
				'step'     => 1,
				'condition' => array(
					'gallery_layout_type' => array( 'justify' ),
				),
			)
		);
		$this->end_controls_section();

		$this->start_controls_section(
			'gallery_general_style',
			array(
				'label'      => esc_html__( 'General', 'advanced-elements' ),
				'tab'        => Controls_Manager::TAB_STYLE,
				'show_label' => false,
			)
		);
		$this->add_responsive_control(
			'gallery_item_margin',
			array(
				'label' => esc_html__( 'Items Margin', 'advanced-elements' ),
				'type'  => Controls_Manager::SLIDER,
				'range' => array(
					'px' => array(
						'min' => 0,
						'max' => 50,
					),
				),
				'default' => array(
					'size' => 10,
				),
				'selectors' => array(
					'{{WRAPPER}} ' . '.advanced-image-gallery-item-inner' => 'margin: {{SIZE}}{{UNIT}};',
					'{{WRAPPER}} ' . '.advanced-image-gallery-list'       => 'margin: -{{SIZE}}{{UNIT}};',
				),
			)
		);
		$this->add_responsive_control(
			'gallery_item_padding',
			array(
				'label'      => esc_html__( 'Padding', 'advanced-elements' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => array( 'px', '%' ),
				'selectors'  => array(
					'{{WRAPPER}} ' . '.advanced-image-gallery-item-inner' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				),
			)
		);
		$this->add_control(
			'gallery_item_bg_color',
			array(
				'label'     => esc_html__( 'Background Color', 'advanced-elements' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => array(
					'{{WRAPPER}} ' . '.advanced-image-gallery-item-inner' => 'background-color: {{VALUE}}',
				),
			)
		);
		$this->add_group_control(
			Group_Control_Border::get_type(),
			array(
				'name'        => 'gallery_item_border',
				'label'       => esc_html__( 'Border', 'advanced-elements' ),
				'placeholder' => '1px',
				'default'     => '1px',
				'selector'    => '{{WRAPPER}} ' . '.advanced-image-gallery-item-inner',
			)
		);
		$this->add_responsive_control(
			'gallery_item_border_radius',
			array(
				'label'      => esc_html__( 'Border Radius', 'advanced-elements' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => array( 'px', '%' ),
				'selectors'  => array(
					'{{WRAPPER}} ' . '.advanced-image-gallery-item-inner' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				),
			)
		);
		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			array(
				'name'    => 'gallery_item_shadow',
				'exclude' => array(
					'box_shadow_position',
				),
				'selector' => '{{WRAPPER}} ' . '.advanced-image-gallery-item-inner',
			)
		);
		$this->end_controls_section();

		$this->start_controls_section(
			'gallery_icon_style',
			array(
				'label'      => esc_html__( 'Icon', 'advanced-elements' ),
				'tab'        => Controls_Manager::TAB_STYLE,
				'show_label' => false,
			)
		);
		$this->add_control(
			'gallery_icon_color',
			array(
				'label' => esc_html__( 'Icon Color', 'advanced-elements' ),
				'type'  => Controls_Manager::COLOR,
				'selectors' => array(
					'{{WRAPPER}} ' . '.advanced-gallery-icon .icon-inner' . ' i' => 'color: {{VALUE}}',
				),
			)
		);
		$this->add_control(
			'gallery_icon_bg_color',
			array(
				'label' => esc_html__( 'Icon Background Color', 'advanced-elements' ),
				'type'  => Controls_Manager::COLOR,
				'selectors' => array(
					'{{WRAPPER}} ' . '.advanced-gallery-icon' . ' .icon-inner' => 'background-color: {{VALUE}}',
				),
			)
		);
		$this->add_responsive_control(
			'gallery_icon_font_size',
			array(
				'label'      => esc_html__( 'Icon Font Size', 'advanced-elements' ),
				'type'       => Controls_Manager::SLIDER,
				'size_units' => array(
					'px', 'em', 'rem',
				),
				'range'      => array(
					'px'    => array(
						'min' => 18,
						'max' => 200,
					),
				),
				'selectors'  => array(
					'{{WRAPPER}} ' . '.advanced-gallery-icon .icon-inner' . ' i' => 'font-size: {{SIZE}}{{UNIT}}',
				),
			)
		);
		$this->add_responsive_control(
			'gallery_icon_size',
			array(
				'label'      => esc_html__( 'Icon Box Size', 'advanced-elements' ),
				'type'       => Controls_Manager::SLIDER,
				'size_units' => array(
					'px', 'em', '%',
				),
				'range'      => array(
					'px' => array(
						'min' => 18,
						'max' => 200,
					),
				),
				'selectors'  => array(
					'{{WRAPPER}} ' . '.advanced-gallery-icon' . ' .icon-inner'        => 'width: {{SIZE}}{{UNIT}}; height: {{SIZE}}{{UNIT}};',
					'{{WRAPPER}} ' . '.advanced-gallery-icon' . ' .icon-inner' . ' i' => 'line-height: {{SIZE}}{{UNIT}};',
				),
			)
		);
		$this->add_group_control(
			Group_Control_Border::get_type(),
			array(
				'name'        => 'gallery_icon_border',
				'label'       => esc_html__( 'Border', 'advanced-elements' ),
				'placeholder' => '1px',
				'default'     => '1px',
				'selector'    => '{{WRAPPER}} ' . '.advanced-gallery-icon' . ' .icon-inner',
			)
		);
		$this->add_control(
			'gallery_icon_box_border_radius',
			array(
				'label'      => esc_html__( 'Border Radius', 'advanced-elements' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => array( 'px', '%' ),
				'selectors'  => array(
					'{{WRAPPER}} ' . '.advanced-gallery-icon' . ' .icon-inner' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				),
			)
		);
		$this->add_responsive_control(
			'gallery_icon_box_margin',
			array(
				'label'      => esc_html__( 'Margin', 'advanced-elements' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => array( 'px', '%' ),
				'selectors'  => array(
					'{{WRAPPER}} ' . '.advanced-gallery-icon' . ' .icon-inner' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				),
			)
		);
		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			array(
				'name'     => 'gallery_icon_box_shadow',
				'selector' => '{{WRAPPER}} ' . '.advanced-gallery-icon' . ' .icon-inner',
			)
		);
		$this->add_responsive_control(
			'gallery_icon_alignment',
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
					'{{WRAPPER}} ' . '.advanced-gallery-icon' => 'justify-content: {{VALUE}};',
				),
			)
		);
		$this->end_controls_section();

		$this->start_controls_section(
			'gallery_title_style',
			array(
				'label'      => esc_html__( 'Title', 'advanced-elements' ),
				'tab'        => Controls_Manager::TAB_STYLE,
				'show_label' => false,
			)
		);
		$this->add_control(
			'gallery_title_color',
			array(
				'label'  => esc_html__( 'Color', 'advanced-elements' ),
				'type'   => Controls_Manager::COLOR,
				'selectors' => array(
					'{{WRAPPER}} ' . '.advanced-gallery-title h4' => 'color: {{VALUE}}',
				),
			)
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			array(
				'name'     => 'gallery_title_typography',
				'scheme'   => Scheme_Typography::TYPOGRAPHY_3,
				'selector' => '{{WRAPPER}} ' . '.advanced-gallery-title h4',
			)
		);
		$this->add_responsive_control(
			'gallery_title_padding',
			array(
				'label'      => esc_html__( 'Padding', 'advanced-elements' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => array( 'px', '%' ),
				'selectors'  => array(
					'{{WRAPPER}} ' . '.advanced-gallery-title h4' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				),
			)
		);
		$this->add_responsive_control(
			'gallery_title_margin',
			array(
				'label'      => esc_html__( 'Margin', 'advanced-elements' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => array( 'px', '%' ),
				'selectors'  => array(
					'{{WRAPPER}} ' . '.advanced-gallery-title h4' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				),
			)
		);
		$this->add_responsive_control(
			'gallery_title_alignment',
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
					'{{WRAPPER}} ' . '.advanced-gallery-title h4' => 'text-align: {{VALUE}};',
				),
			)
		);
		$this->end_controls_section();

		$this->start_controls_section(
			'gallery_descr_style',
			array(
				'label'      => esc_html__( 'Description', 'advanced-elements' ),
				'tab'        => Controls_Manager::TAB_STYLE,
				'show_label' => false,
			)
		);
		$this->add_control(
			'gallery_descr_color',
			array(
				'label'  => esc_html__( 'Color', 'advanced-elements' ),
				'type'   => Controls_Manager::COLOR,
				'selectors' => array(
					'{{WRAPPER}} ' . '.advanced-gallery-description p' => 'color: {{VALUE}}',
				),
			)
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			array(
				'name'     => 'gallery_descr_typography',
				'scheme'   => Scheme_Typography::TYPOGRAPHY_3,
				'selector' => '{{WRAPPER}} ' . '.advanced-gallery-description p',
			)
		);
		$this->add_responsive_control(
			'gallery_descr_padding',
			array(
				'label'      => esc_html__( 'Padding', 'advanced-elements' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => array( 'px', '%' ),
				'selectors'  => array(
					'{{WRAPPER}} ' . '.advanced-gallery-description p' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				),
			)
		);
		$this->add_responsive_control(
			'gallery_descr_margin',
			array(
				'label'      => esc_html__( 'Margin', 'advanced-elements' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => array( 'px', '%' ),
				'selectors'  => array(
					'{{WRAPPER}} ' . '.advanced-gallery-description p' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				),
			)
		);
		$this->add_responsive_control(
			'gallery_descr_alignment',
			array(
				'label'   => esc_html__( 'Alignment', 'advanced-elements' ),
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
				'selectors'  => array(
					'{{WRAPPER}} ' . '.advanced-gallery-description p' => 'text-align: {{VALUE}};',
				),
			)
		);
		$this->end_controls_section();

		$this->start_controls_section(
			'gallery_overlay_style',
			array(
				'label'      => esc_html__( 'Overlay', 'advanced-elements' ),
				'tab'        => Controls_Manager::TAB_STYLE,
				'show_label' => false,
			)
		);
		$this->add_group_control(
			Group_Control_Background::get_type(),
			array(
				'name'     => 'gallery_overlay_background',
				'selector' => '{{WRAPPER}} ' . '.advanced-image-gallery-content' . ':before',
			)
		);
		$this->add_control(
			'gallery_overlay_opacity',
			array(
				'label'    => esc_html__( 'Opacity', 'advanced-elements' ),
				'type'     => Controls_Manager::NUMBER,
				'default'  => 0.5,
				'min'      => 0,
				'max'      => 1,
				'step'     => 0.1,
				'selectors'  => array(
					'{{WRAPPER}} ' . '.advanced-image-gallery-content' . ':before' => 'opacity: {{VALUE}};',
				),
			)
		);
		$this->add_responsive_control(
			'gallery_overlay_paddings',
			array(
				'label'      => esc_html__( 'Padding', 'advanced-elements' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => array( 'px', '%' ),
				'selectors'  => array(
					'{{WRAPPER}} ' . '.advanced-image-gallery-content' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				),
			)
		);
		$this->end_controls_section();

		$this->start_controls_section(
			'gallery_order_style',
			array(
				'label'      => esc_html__( 'Content Order', 'advanced-elements' ),
				'tab'        => Controls_Manager::TAB_STYLE,
				'show_label' => false,
			)
		);
		$this->add_control(
			'gallery_icon_order',
			array(
				'label'   => esc_html__( 'Icon Order', 'advanced-elements' ),
				'type'    => Controls_Manager::NUMBER,
				'default' => 1,
				'min'     => 1,
				'max'     => 3,
				'step'    => 1,
				'selectors' => array(
					'{{WRAPPER}} '. '.advanced-gallery-icon' => 'order: {{VALUE}};',
				),
			)
		);
		$this->add_control(
			'gallery_title_order',
			array(
				'label'   => esc_html__( 'Title Order', 'advanced-elements' ),
				'type'    => Controls_Manager::NUMBER,
				'default' => 2,
				'min'     => 1,
				'max'     => 3,
				'step'    => 1,
				'selectors' => array(
					'{{WRAPPER}} '. '.advanced-gallery-title' => 'order: {{VALUE}};',
				),
			)
		);
		$this->add_control(
			'gallery_content_order',
			array(
				'label'   => esc_html__( 'Content Order', 'advanced-elements' ),
				'type'    => Controls_Manager::NUMBER,
				'default' => 3,
				'min'     => 1,
				'max'     => 3,
				'step'    => 1,
				'selectors' => array(
					'{{WRAPPER}} '. '.advanced-gallery-description' => 'order: {{VALUE}};',
				),
			)
		);
		$this->add_control(
			'item_content_alignment',
			array(
				'label'   => esc_html__( 'Content Vertical Alignment', 'advanced-elements' ),
				'type'    => Controls_Manager::SELECT,
				'default' => 'center',
				'options' => array(
					'flex-start' => esc_html__( 'Top', 'advanced-elements' ),
					'center'     => esc_html__( 'Center', 'advanced-elements' ),
					'flex-end'   => esc_html__( 'Bottom', 'advanced-elements' ),
				),
				'selectors'  => array(
					'{{WRAPPER}} '. '.advanced-image-gallery-content'  => 'justify-content: {{VALUE}};',
				),
			)
		);
		$this->end_controls_section();
	}

	protected function render() {
		echo $this->generate_setting_json( $this->get_content() );
	}

	public function generate_setting_json( $content = null ) {
		$settings   = $this->get_settings();
		$opts_array = array();
		if ( 'masonry' === $settings['gallery_layout_type'] || 'justify' === $settings['gallery_layout_type'] ) {
			$opts_array = array(
				'layoutType'    => $settings['gallery_layout_type'],
				'columns'       => $settings['gallery_columns'],
				'columnsTablet' => $settings['gallery_columns_tablet'],
				'columnsMobile' => $settings['gallery_columns_mobile'],
				'justifyHeight' => $settings['gallery_justify_height'],
			);
		}
		return sprintf(
			'<div class="advanced-image-gallery" data-options="%1$s">%2$s</div>',
			htmlspecialchars( json_encode( $opts_array ) ), $content
		);
	}

	public function get_classes( $columns = array() ) {
		$columns = wp_parse_args( $columns, array(
			'desk' => 1,
			'tab'  => 1,
			'mob'  => 1,
		) );
		$classes = array();
		foreach ( $columns as $device => $cols ) {
			if ( ! empty( $cols ) ) {
				$classes[] = sprintf( 'col-%1$s-%2$s', $device, $cols );
			}
		}
		return implode( ' ' , $classes );
	}

	public function get_masonry_classes( $columns = array() ) {
		$columns = wp_parse_args( $columns, array(
			'desktop' => 1,
			'tablet'  => 1,
			'mobile'  => 1,
		) );
		$classes = array();
		foreach ( $columns as $device => $cols ) {
			if ( ! empty( $cols ) ) {
				$classes[] = sprintf( 'col-%1$s-%2$s', $device, $cols );
			}
		}
		return implode( ' ' , $classes );
	}

	public function get_justify_img_size() {
		$settings = $this->get_settings();
		if ( !empty( $settings['gallery_item_image'] ) ) {
			$image_data = wp_get_attachment_image_src( $settings['gallery_item_image']['id'], 'full' );
			$params[]   = $image_data[0];
			$params[]   = $image_data[1];
			$params[]   = $image_data[2];
		} else {
			$params[]   = $settings['gallery_item_image']['url'];
			$params[]   = 1200;
			$params[]   = 800;
		}
		return $params;
	}

	public function get_content() {
		ob_start();
		$settings = $this->get_settings();
		$columns  = '';
		if ( 'grid' === $settings['gallery_layout_type'] ) {
			$columns = $this->get_classes( array(
				'desk' => $this->get_settings( 'gallery_columns' ),
				'tab'  => $this->get_settings( 'gallery_columns_tablet' ),
				'mob'  => $this->get_settings( 'gallery_columns_mobile' ),
			) );
		}
		if ( 'masonry' === $settings['gallery_layout_type'] ) {
			$col_masonry = $this->get_masonry_classes( array(
				'desktop'  => $this->get_settings( 'gallery_columns' ),
				'tablet'   => $this->get_settings( 'gallery_columns_tablet' ),
				'mobile'   => $this->get_settings( 'gallery_columns_mobile' ),
			) );
			$data_col = 'data-columns';
		}
		$gallery_items_list = $settings['gallery_items_list'];
		echo '<div class="advanced-image-gallery-list layout-type-' . $settings['gallery_layout_type'] . ' ' . $col_masonry . '" ' . $data_col . '>';
		foreach ( $gallery_items_list as $item ) {
			echo '<div class="advanced-image-gallery-item ' . $columns . '">';
				echo '<div class="advanced-image-gallery-item-inner">';
					echo sprintf(
						'<a class="advanced-image-gallery-link" href="%1$s" data-elementor-open-lightbox="yes" %2$s>',
						$item['gallery_item_image']['url'],
						filter_var( $this->get_settings( 'gallery_gallery_enable' ), FILTER_VALIDATE_BOOLEAN ) ? 'data-elementor-lightbox-slideshow="' . uniqid() . '"' : ''
				);
						echo '<div class="advanced-gallery-img-wrap">';
							if( 'justify' === $settings['gallery_layout_type'] ) {
								$image_data = $this->get_justify_img_size();
								echo sprintf( '<img class="advanced-gallery-img" src="%1$s" alt="%2$s" data-width="%3$s" data-height="%4$s">', $item['gallery_item_image']['url'], $item['gallery_item_title'], $image_data[1], $image_data[2] );
							} else {
								echo sprintf( '<img class="advanced-gallery-img" src="%1$s" alt="%2$s">', $item['gallery_item_image']['url'], $item['gallery_item_title'] );
							}
						echo '</div>';
						echo '<div class="advanced-image-gallery-content">';
							if( !empty( $item['gallery_item_icon'] ) ) {
								echo sprintf( '<div class="advanced-gallery-icon"><div class="icon-inner"><i class="%1$s"></i></div></div>', $item['gallery_item_icon'] );
							}
							if( !empty( $item['gallery_item_title'] ) ) {
								echo sprintf( '<div class="advanced-gallery-title"><h4>%1$s</h4></div>', $item['gallery_item_title'] );
							}
							if( !empty( $item['gallery_item_descr'] ) ) {
								echo sprintf( '<div class="advanced-gallery-description"><p>%1$s</p></div>', $item['gallery_item_descr'] );
							}
						echo '</div>';
					echo '</a>';
				echo '</div>';
			echo '</div>';
		}
		echo '</div>';
		return ob_get_clean();
	}
}