<?php
namespace Elementor;

if( ! defined( 'ABSPATH' ) ) exit;

class Advanced_Countdown_Timer extends Widget_Base {

	public function get_name() {
		return 'advanced-countdown-timer';
	}

	public function get_title() {
		return esc_html__( 'Countdown Timer', 'advanced-elements' );
	}

	public function get_icon() {
		return 'eicon-countdown';
	}

	public function get_categories() {
		return array( 'advanced-elements' );
	}

	protected function _register_controls() {
		$this->start_controls_section(
			'countdown_general',
			array(
				'label'      => esc_html__( 'General', 'advanced-elements' ),
				'tab'        => Controls_Manager::TAB_LAYOUT,
				'show_label' => false,
			)
		);
		$default_date = date( 'Y-m-d H:i', strtotime( '+1 month' ) + ( get_option( 'gmt_offset' ) * HOUR_IN_SECONDS ) );
		$this->add_control(
			'get_countdown_date',
			array(
				'label'       => esc_html__( 'Set Date', 'advanced-elements' ),
				'type'        => Controls_Manager::DATE_TIME,
				'default'     => $default_date,
				'description' => sprintf( esc_html__( 'Current timezone: %s.', 'advanced-elements' ), Utils::get_timezone_string() ),
			)
		);
		$this->add_control(
			'countdown_show_days',
			array(
				'label'        => esc_html__( 'Days', 'advanced-elements' ),
				'type'         => Controls_Manager::SWITCHER,
				'label_on'     => esc_html__( 'Show', 'advanced-elements' ),
				'label_off'    => esc_html__( 'Hide', 'advanced-elements' ),
				'return_value' => 'yes',
				'default'      => 'yes',
			)
		);
		$this->add_control(
			'countdown_label_days',
			array(
				'label'       => esc_html__( 'Days Label', 'advanced-elements' ),
				'type'        => Controls_Manager::TEXT,
				'default'     => esc_html__( 'Days', 'advanced-elements' ),
				'placeholder' => esc_html__( 'Days', 'advanced-elements' ),
				'condition'   => array(
					'countdown_show_days' => 'yes',
				),
			)
		);
		$this->add_control(
			'countdown_show_hours',
			array(
				'label'        => esc_html__( 'Hours', 'advanced-elements' ),
				'type'         => Controls_Manager::SWITCHER,
				'label_on'     => esc_html__( 'Show', 'advanced-elements' ),
				'label_off'    => esc_html__( 'Hide', 'advanced-elements' ),
				'return_value' => 'yes',
				'default'      => 'yes',
			)
		);
		$this->add_control(
			'countdown_label_hours',
			array(
				'label'       => esc_html__( 'Hours Label', 'advanced-elements' ),
				'type'        => Controls_Manager::TEXT,
				'default'     => esc_html__( 'Hours', 'advanced-elements' ),
				'placeholder' => esc_html__( 'Hours', 'advanced-elements' ),
				'condition'   => array(
					'countdown_show_hours' => 'yes',
				),
			)
		);
		$this->add_control(
			'countdown_show_minutes',
			array(
				'label'        => esc_html__( 'Minutes', 'advanced-elements' ),
				'type'         => Controls_Manager::SWITCHER,
				'label_on'     => esc_html__( 'Show', 'advanced-elements' ),
				'label_off'    => esc_html__( 'Hide', 'advanced-elements' ),
				'return_value' => 'yes',
				'default'      => 'yes',
			)
		);
		$this->add_control(
			'countdown_label_minutes',
			array(
				'label'       => esc_html__( 'Minutes Label', 'advanced-elements' ),
				'type'        => Controls_Manager::TEXT,
				'default'     => esc_html__( 'Minutes', 'advanced-elements' ),
				'placeholder' => esc_html__( 'Minutes', 'advanced-elements' ),
				'condition'   => array(
					'countdown_show_minutes' => 'yes',
				),
			)
		);
		$this->add_control(
			'countdown_show_seconds',
			array(
				'label'        => esc_html__( 'Seconds', 'advanced-elements' ),
				'type'         => Controls_Manager::SWITCHER,
				'label_on'     => esc_html__( 'Show', 'advanced-elements' ),
				'label_off'    => esc_html__( 'Hide', 'advanced-elements' ),
				'return_value' => 'yes',
				'default'      => 'yes',
			)
		);
		$this->add_control(
			'countdown_label_seconds',
			array(
				'label'       => esc_html__( 'Seconds Label', 'advanced-elements' ),
				'type'        => Controls_Manager::TEXT,
				'default'     => esc_html__( 'Seconds', 'advanced-elements' ),
				'placeholder' => esc_html__( 'Seconds', 'advanced-elements' ),
				'condition'   => array(
					'countdown_show_seconds' => 'yes',
				),
			)
		);
		$this->add_control(
			'countdown_show_separator',
			array(
				'label'        => esc_html__( 'Separator', 'advanced-elements' ),
				'type'         => Controls_Manager::SWITCHER,
				'label_on'     => esc_html__( 'Show', 'advanced-elements' ),
				'label_off'    => esc_html__( 'Hide', 'advanced-elements' ),
				'return_value' => 'yes',
				'default'      => 'yes',
			)
		);
		$this->add_control(
			'countdown_label_separator',
			array(
				'label'       => esc_html__( 'Separator Label', 'advanced-elements' ),
				'type'        => Controls_Manager::TEXT,
				'default'     => ':',
				'placeholder' => ':',
				'condition'   => array(
					'countdown_show_separator' => 'yes',
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
			'item_width_size',
			array(
				'label'      => esc_html__( 'Item Width', 'advanced-elements' ),
				'type'       => Controls_Manager::SLIDER,
				'size_units' => array( 'px', '%', 'em' ),
				'default'    => array(
					'unit' => 'px',
					'size' => 100,
				),
				'range'      => array(
					'px'    => array(
						'min' => 60,
						'max' => 600,
					),
					'em'    => array(
						'min' => 1,
						'max' => 20,
					),
				),
				'render_type' => 'template',
				'selectors'   => array(
					'{{WRAPPER}} ' . '.advanced-countdown-item' => 'width: {{SIZE}}{{UNIT}};',
				),
			)
		);
		$this->add_responsive_control(
			'item_height_size',
			array(
				'label'      => esc_html__( 'Item Height', 'advanced-elements' ),
				'type'       => Controls_Manager::SLIDER,
				'size_units' => array( 'px', 'em' ),
				'default'    => array(
					'unit' => 'px',
					'size' => 100,
				),
				'range'      => array(
					'px' => array(
						'min' => 60,
						'max' => 600,
					),
					'em' => array(
						'min' => 1,
						'max' => 20,
					),
				),
				'render_type' => 'template',
				'selectors' => array(
					'{{WRAPPER}} ' . '.advanced-countdown-item' => 'height: {{SIZE}}{{UNIT}};',
				),
			)
		);
		$this->add_group_control(
			Group_Control_Background::get_type(),
			array(
				'name'     => 'item_bg',
				'selector' => '{{WRAPPER}} ' . '.advanced-countdown-item',
			)
		);
		$this->add_responsive_control(
			'item_padding',
			array(
				'label'      => esc_html__( 'Item Padding', 'advanced-elements' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => array( 'px', '%', 'em' ),
				'selectors'  => array(
					'{{WRAPPER}} ' . '.advanced-countdown-item' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				),
			)
		);
		$this->add_responsive_control(
			'item_margin',
			array(
				'label'      => esc_html__( 'Item Margin', 'advanced-elements' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => array( 'px', '%', 'em' ),
				'selectors'  => array(
					'{{WRAPPER}} ' . '.advanced-countdown-item' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				),
			)
		);
		$this->add_group_control(
			Group_Control_Border::get_type(),
			array(
				'name'        => 'border',
				'placeholder' => '1px',
				'fields_options' => array(
					'border' => array(
						'default' => 'solid',
					),
					'width' => array(
						'default' => array(
							'top'      => '1',
							'right'    => '1',
							'bottom'   => '1',
							'left'     => '1',
							'isLinked' => true,
						),
					),
					'color' => array(
						'scheme' => array(
							'type'  => Scheme_Color::get_type(),
							'value' => Scheme_Color::COLOR_3,
						),
					),
				),
				'selector'    => '{{WRAPPER}} ' . '.advanced-countdown-item',
			)
		);
		$this->add_control(
			'item_border_radius',
			array(
				'label'      => esc_html__( 'Border Radius', 'advanced-elements' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => array( 'px', '%' ),
				'selectors'  => array(
					'{{WRAPPER}} ' . '.advanced-countdown-item' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				),
			)
		);
		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			array(
				'name'     => 'item_box_shadow',
				'selector' => '{{WRAPPER}} ' . '.advanced-countdown-item',
			)
		);
		$this->end_controls_section();

		$this->start_controls_section(
			'section_digits_styles',
			array(
				'label'      => esc_html__( 'Digits', 'advanced-elements' ),
				'tab'        => Controls_Manager::TAB_STYLE,
				'show_label' => false,
			)
		);
		$this->add_control(
			'digits_color',
			array(
				'label'     => esc_html__( 'Color', 'advanced-elements' ),
				'type'      => Controls_Manager::COLOR,
				'scheme'    => array(
					'type'  => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_4,
				),
				'selectors' => array(
					'{{WRAPPER}} ' . '.advanced-countdown-item .item-value' => 'color: {{VALUE}}',
				),
			)
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			array(
				'name'     => 'digits_typography',
				'scheme'   => Scheme_Typography::TYPOGRAPHY_4,
				'selector' => '{{WRAPPER}} ' . '.advanced-countdown-item .item-value',
			)
		);
		$this->add_group_control(
			Group_Control_Background::get_type(),
			array(
				'name'     => 'digits_bg',
				'selector' => '{{WRAPPER}} ' . '.advanced-countdown-item .item-value',
			)
		);
		$this->add_responsive_control(
			'digits_padding',
			array(
				'label'      => esc_html__( 'Padding', 'advanced-elements' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => array( 'px', '%', 'em' ),
				'selectors'  => array(
					'{{WRAPPER}} ' . '.advanced-countdown-item .item-value' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				),
			)
		);
		$this->add_responsive_control(
			'digits_margin',
			array(
				'label'      => esc_html__( 'Margin', 'advanced-elements' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => array( 'px', '%', 'em' ),
				'selectors'  => array(
					'{{WRAPPER}} ' . '.advanced-countdown-item .item-value' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				),
			)
		);
		$this->add_group_control(
			Group_Control_Border::get_type(),
			array(
				'name'        => 'digits_border',
				'placeholder' => '1px',
				'selector'    => '{{WRAPPER}} ' . '.advanced-countdown-item .item-value',
			)
		);
		$this->add_control(
			'digits_border_radius',
			array(
				'label'      => esc_html__( 'Border Radius', 'advanced-elements' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => array( 'px', '%' ),
				'selectors'  => array(
					'{{WRAPPER}} ' . '.advanced-countdown-item .item-value' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				),
			)
		);
		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			array(
				'name' => 'digits_box_shadow',
				'selector' => '{{WRAPPER}} ' . '.advanced-countdown-item .item-value',
			)
		);
		$this->end_controls_section();

		$this->start_controls_section(
			'section_labels_styles',
			array(
				'label'      => esc_html__( 'Labels', 'advanced-elements' ),
				'tab'        => Controls_Manager::TAB_STYLE,
				'show_label' => false,
			)
		);
		$this->add_control(
			'labels_color',
			array(
				'label'     => esc_html__( 'Color', 'advanced-elements' ),
				'type'      => Controls_Manager::COLOR,
				'scheme'    => array(
					'type'  => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_2,
				),
				'selectors' => array(
					'{{WRAPPER}} ' . '.advanced-countdown-item .item-label' => 'color: {{VALUE}}',
				),
			)
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			array(
				'name'     => 'labels_typography',
				'scheme'   => Scheme_Typography::TYPOGRAPHY_4,
				'selector' => '{{WRAPPER}} ' . '.advanced-countdown-item .item-label',
			)
		);
		$this->add_group_control(
			Group_Control_Background::get_type(),
			array(
				'name'     => 'labels_bg',
				'selector' => '{{WRAPPER}} ' . '.advanced-countdown-item .item-label',
			)
		);
		$this->add_responsive_control(
			'labels_padding',
			array(
				'label'      => esc_html__( 'Padding', 'advanced-elements' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => array( 'px', '%', 'em' ),
				'selectors'  => array(
					'{{WRAPPER}} ' . '.advanced-countdown-item .item-label' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				),
			)
		);
		$this->add_responsive_control(
			'labels_margin',
			array(
				'label'      => esc_html__( 'Margin', 'advanced-elements' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => array( 'px', '%', 'em' ),
				'selectors'  => array(
					'{{WRAPPER}} ' . '.advanced-countdown-item .item-label' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				),
			)
		);
		$this->add_group_control(
			Group_Control_Border::get_type(),
			array(
				'name'        => 'labels_border',
				'placeholder' => '1px',
				'selector'    => '{{WRAPPER}} ' . '.advanced-countdown-item .item-label',
			)
		);
		$this->add_control(
			'labels_border_radius',
			array(
				'label'      => esc_html__( 'Border Radius', 'advanced-elements' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => array( 'px', '%' ),
				'selectors'  => array(
					'{{WRAPPER}} ' . '.advanced-countdown-item .item-label' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				),
			)
		);
		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			array(
				'name' => 'labels_box_shadow',
				'selector' => '{{WRAPPER}} ' . '.advanced-countdown-item .item-label',
			)
		);
		$this->end_controls_section();

		$this->start_controls_section(
			'section_separator_styles',
			array(
				'label'      => esc_html__( 'Separator', 'advanced-elements' ),
				'tab'        => Controls_Manager::TAB_STYLE,
				'show_label' => false,
			)
		);
		$this->add_control(
			'separator_color',
			array(
				'label'     => esc_html__( 'Color', 'advanced-elements' ),
				'type'      => Controls_Manager::COLOR,
				'scheme'    => array(
					'type'  => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_2,
				),
				'selectors' => array(
					'{{WRAPPER}} ' . '.advanced-countdown-timer-separator' => 'color: {{VALUE}}',
				),
			)
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			array(
				'name'     => 'separator_typography',
				'scheme'   => Scheme_Typography::TYPOGRAPHY_2,
				'selector' => '{{WRAPPER}} ' . '.advanced-countdown-timer-separator',
			)
		);
		$this->add_group_control(
			Group_Control_Background::get_type(),
			array(
				'name'     => 'separator_bg',
				'selector' => '{{WRAPPER}} ' . '.advanced-countdown-timer-separator',
			)
		);
		$this->add_responsive_control(
			'separator_padding',
			array(
				'label'      => esc_html__( 'Padding', 'advanced-elements' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => array( 'px', '%', 'em' ),
				'selectors'  => array(
					'{{WRAPPER}} ' . '.advanced-countdown-timer-separator' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				),
			)
		);
		$this->add_responsive_control(
			'separator_margin',
			array(
				'label'      => esc_html__( 'Margin', 'advanced-elements' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => array( 'px', '%', 'em' ),
				'selectors'  => array(
					'{{WRAPPER}} ' . '.advanced-countdown-timer-separator' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				),
			)
		);
		$this->add_group_control(
			Group_Control_Border::get_type(),
			array(
				'name'        => 'separator_border',
				'placeholder' => '1px',
				'selector'    => '{{WRAPPER}} ' . '.advanced-countdown-timer-separator',
			)
		);
		$this->add_control(
			'separator_border_radius',
			array(
				'label'      => esc_html__( 'Border Radius', 'advanced-elements' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => array( 'px', '%' ),
				'selectors'  => array(
					'{{WRAPPER}} ' . '.advanced-countdown-timer-separator' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				),
			)
		);
		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			array(
				'name' => 'separator_box_shadow',
				'selector' => '{{WRAPPER}} ' . '.advanced-countdown-timer-separator',
			)
		);
		$this->end_controls_section();

		$this->start_controls_section(
			'section_order_style',
			array(
				'label'      => esc_html__( 'Order', 'advanced-elements' ),
				'tab'        => Controls_Manager::TAB_STYLE,
				'show_label' => false,
			)
		);
		$this->add_control(
			'value_order',
			array(
				'label'   => esc_html__( 'Digit Order', 'advanced-elements' ),
				'type'    => Controls_Manager::NUMBER,
				'default' => 1,
				'min'     => 1,
				'max'     => 2,
				'step'    => 1,
				'selectors' => array(
					'{{WRAPPER}} '. '.advanced-countdown-item .item-value' => 'order: {{VALUE}};',
				),
			)
		);
		$this->add_control(
			'label_order',
			array(
				'label'   => esc_html__( 'Label Order', 'advanced-elements' ),
				'type'    => Controls_Manager::NUMBER,
				'default' => 2,
				'min'     => 1,
				'max'     => 2,
				'step'    => 1,
				'selectors' => array(
					'{{WRAPPER}} '. '.advanced-countdown-item .item-label' => 'order: {{VALUE}};',
				),
			)
		);
		$this->end_controls_section();
	}

	protected function render() {
		$settings = $this->get_settings();

		echo sprintf( '<div id="advanced-countdown-timer" data-get-date="%s">', $settings['get_countdown_date' ] );
			if( 'yes' === $settings['countdown_show_days'] ) {
				$format_days = '<div class="advanced-countdown-item days"><div class="item-value day-value" data-value="days"></div><div class="item-label day-label">%s</div></div>';
				echo sprintf( $format_days, $settings['countdown_label_days' ] );
			}
			if( 'yes' === $settings['countdown_show_hours'] ) {
				if( !empty( $settings['countdown_label_separator'] && 'yes' === $settings['countdown_show_separator'] ) ) { echo sprintf( '<div class="advanced-countdown-timer-separator">%1$s</div>', $settings['countdown_label_separator'] ); }
				$format_hours = '<div class="advanced-countdown-item hours"><div class="item-value hours-value" data-value="hours"></div><div class="item-label hours-label">%s</div></div>';
				echo sprintf( $format_hours, $settings['countdown_label_hours' ] );
			}
			if( 'yes' === $settings['countdown_show_minutes'] ) {
				if( !empty( $settings['countdown_label_separator'] && 'yes' === $settings['countdown_show_separator'] ) ) { echo sprintf( '<div class="advanced-countdown-timer-separator">%1$s</div>', $settings['countdown_label_separator'] ); }
				$format_minutes = '<div class="advanced-countdown-item minutes"><div class="item-value minutes-value" data-value="minutes"></div><div class="item-label minutes-label">%s</div></div>';
				echo sprintf( $format_minutes, $settings['countdown_label_minutes' ] );
			}
			if( 'yes' === $settings['countdown_show_seconds'] ) {
				if( !empty( $settings['countdown_label_separator'] && 'yes' === $settings['countdown_show_separator'] ) ) { echo sprintf( '<div class="advanced-countdown-timer-separator">%1$s</div>', $settings['countdown_label_separator'] ); }
				$format_seconds = '<div class="advanced-countdown-item seconds"><div class="item-value seconds-value" data-value="seconds"></div><div class="item-label seconds-label">%s</div></div>';
				echo sprintf( $format_seconds, $settings['countdown_label_seconds' ] );
			}
		echo '</div>';
	}
}