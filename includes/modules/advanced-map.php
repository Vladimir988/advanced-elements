<?php
namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit;

class Advanced_Map extends Widget_Base {

	public function get_name() {
		return 'advanced-map';
	}

	public function get_title() {
		return esc_html__( 'Advanced Map', 'advanced-elements' );
	}

	public function get_icon() {
		return 'eicon-image-hotspot';
	}

	public function get_categories() {
		return array( 'advanced-elements' );
	}

	public function get_script_depends() {
		return array( 'advanced-google-maps' );
	}

	protected function _register_controls() {
		$this->start_controls_section(
			'map_settings',
			array(
				'label' => esc_html__( 'Map Settings', 'advanced-elements' ),
			)
		);
		$key = $this->get_google_api_key();
		if ( !$key ) {
			$this->add_control(
			'set_api_key',
				array(
					'type' => Controls_Manager::RAW_HTML,
					'raw'  => sprintf(
						esc_html__( 'Please set Google maps API key. You can create API key %1$s. Paste created key on %2$s', 'advanced-elements' ),
						'<a target="_blank" href="https://developers.google.com/maps/documentation/javascript/get-api-key">' . esc_html__( 'here', 'advanced-elements' ) . '</a>',
						'<a target="_blank" href="' . $this->get_current_page_settings() . '">' . esc_html__( 'settings page.', 'advanced-elements' ) . '</a>'
					)
				)
			);
		}
		$default_address = esc_html__( 'New York City, Two Bridges', 'advanced-elements' );
		$this->add_control(
			'map_center',
			array(
				'label'       => esc_html__( 'Map Center', 'advanced-elements' ),
				'type'        => Controls_Manager::TEXT,
				'placeholder' => esc_html__( 'Your Map Address', 'advanced-elements' ),
				'default'     => $default_address,
				'label_block' => true,
			)
		);
		$this->add_control(
			'zoom',
			array(
				'label'      => esc_html__( 'Map Zoom', 'advanced-elements' ),
				'type'       => Controls_Manager::SLIDER,
				'size_units' => array( '%' ),
				'default'    => array(
					'unit'     => 'zoom',
					'size'     => 14,
				),
				'range'      => array(
					'zoom'     => array(
						'min'    => 1,
						'max'    => 20,
					),
				),
			)
		);
		$this->add_control(
			'map_style',
			array(
				'label'       => esc_html__( 'Map Styles', 'advanced-elements' ),
				'type'        => Controls_Manager::SELECT,
				'default'     => 'default',
				'options'     => $this->get_map_styles(),
				'label_block' => true,
				'description' => __( 'You can add own map style in your theme. Add file in <strong>.json</strong> format into <strong>advanced-elements/maps/</strong> folder in your theme. Example in: <strong>plugins/advanced-elements/templates/maps-templates</strong>', 'advanced-elements' ),
			)
		);
		$this->add_control(
			'drggable',
			array(
				'label'   => esc_html__( 'Is Map Draggable?', 'advanced-elements' ),
				'type'    => Controls_Manager::SELECT,
				'default' => 'false',
				'options' => array(
					'false' => esc_html__( 'No', 'advanced-elements' ),
					'true'  => esc_html__( 'Yes', 'advanced-elements' ),
				),
			)
		);
		$this->add_control(
			'scrollwheel',
			array(
				'label'   => esc_html__( 'Scrollwheel Zoom', 'advanced-elements' ),
				'type'    => Controls_Manager::SELECT,
				'default' => 'false',
				'options' => array(
					'false' => esc_html__( 'Disabled', 'advanced-elements' ),
					'true'  => esc_html__( 'Enabled', 'advanced-elements' ),
				),
				'condition'   => array(
					'drggable'  => 'true',
				),
			)
		);
		$this->add_control(
			'map_type',
			array(
				'label'   => esc_html__( 'Type Control (Map/Satellite)', 'advanced-elements' ),
				'type'    => Controls_Manager::SELECT,
				'default' => 'true',
				'options' => array(
					'false' => esc_html__( 'Hide', 'advanced-elements' ),
					'true'  => esc_html__( 'Show', 'advanced-elements' ),
				),
			)
		);
		$this->add_control(
			'street_view',
			array(
				'label'   => esc_html__( 'Street View Control', 'advanced-elements' ),
				'type'    => Controls_Manager::SELECT,
				'default' => 'true',
				'options' => array(
					'true'  => esc_html__( 'Show', 'advanced-elements' ),
					'false' => esc_html__( 'Hide', 'advanced-elements' ),
				),
			)
		);
		$this->add_control(
			'fullscreen_control',
			array(
				'label'   => esc_html__( 'Fullscreen Control', 'advanced-elements' ),
				'type'    => Controls_Manager::SELECT,
				'default' => 'true',
				'options' => array(
					'true'  => esc_html__( 'Show', 'advanced-elements' ),
					'false' => esc_html__( 'Hide', 'advanced-elements' ),
				),
			)
		);
		$this->add_control(
			'zoom_controls',
			array(
				'label'   => esc_html__( 'Zoom Control', 'advanced-elements' ),
				'type'    => Controls_Manager::SELECT,
				'default' => 'true',
				'options' => array(
					'true'  => esc_html__( 'Show', 'advanced-elements' ),
					'false' => esc_html__( 'Hide', 'advanced-elements' ),
				),
			)
		);
		$this->add_control(
			'map_height',
			array(
				'label'       => esc_html__( 'Map Height', 'advanced-elements' ),
				'type'        => Controls_Manager::NUMBER,
				'min'         => 50,
				'placeholder' => '',
				'default'     => 350,
				'render_type' => 'template',
				'selectors'   => array(
					'{{WRAPPER}} .advanced-map' => 'height: {{VALUE}}px',
				),
			)
		);
		$this->end_controls_section();
		$this->start_controls_section(
			'section_map_markers',
			array(
				'label' => esc_html__( 'Map Marker', 'advanced-elements' ),
			)
		);
		$repeater = new Repeater();
		$repeater->add_control(
			'marker_address',
			array(
				'label'       => esc_html__( 'Marker Address', 'advanced-elements' ),
				'type'        => Controls_Manager::TEXT,
				'default'     => $default_address,
				'label_block' => true,
			)
		);
		$repeater->add_control(
			'marker_desc',
			array(
				'label'   => esc_html__( 'Marker Description', 'advanced-elements' ),
				'type'    => Controls_Manager::TEXTAREA,
				'default' => $default_address,
			)
		);
		$repeater->add_control(
			'marker_image',
			array(
				'label'   => esc_html__( 'Marker Icon', 'advanced-elements' ),
				'type'    => Controls_Manager::MEDIA,
			)
		);
		$repeater->add_control(
			'marker_state',
			array(
				'label'     => esc_html__( 'Show Marker Description?', 'advanced-elements' ),
				'type'      => Controls_Manager::SELECT,
				'default'   => 'hidden',
				'options'   => array(
					'hidden'  => esc_html__( 'No', 'advanced-elements' ),
					'visible' => esc_html__( 'Yes', 'advanced-elements' ),
				),
			)
		);
		$this->add_control(
			'markers',
			array(
				'type'               => Controls_Manager::REPEATER,
				'fields'             => array_values( $repeater->get_controls() ),
				'default'            => array(
					array(
						'marker_address' => $default_address,
						'marker_desc'    => $default_address,
						'marker_image'   => '',
						'marker_state'   => 'hidden',
					),
				),
				'title_field'        => '{{{ marker_address }}}',
			)
		);
		$this->end_controls_section();
	}

	protected function render() {
		$settings = $this->get_settings();
		if ( empty( $settings[ 'map_center' ] ) ) {
			return;
		}
		$coordinates = $this->get_coordinates( $settings[ 'map_center' ] );
		if ( !$coordinates ) {
			return;
		}
		$streetview_ctrl = isset( $settings['street_view'] ) ? $settings['street_view'] : '';
		$fullscreen_ctrl = isset( $settings['fullscreen_control'] ) ? $settings['fullscreen_control'] : '';
		$scroll_ctrl     = isset( $settings['scrollwheel'] ) ? $settings['scrollwheel'] : '';
		$zoom_ctrl       = isset( $settings['zoom_controls'] ) ? $settings['zoom_controls'] : '';

		$init = array(
			'center'            => $coordinates,
			'zoom'              => isset( $settings['zoom']['size'] ) ? intval( $settings['zoom']['size'] ) : 14,
			'fullscreenControl' => filter_var( $fullscreen_ctrl, FILTER_VALIDATE_BOOLEAN ),
			'streetViewControl' => filter_var( $streetview_ctrl, FILTER_VALIDATE_BOOLEAN ),
			'mapTypeControl'    => filter_var( $settings['map_type'], FILTER_VALIDATE_BOOLEAN ),
			'scrollwheel'       => filter_var( $scroll_ctrl, FILTER_VALIDATE_BOOLEAN ),
			'zoomControl'       => filter_var( $zoom_ctrl, FILTER_VALIDATE_BOOLEAN ),
		);

		if ( 'false' === $settings[ 'drggable' ] ) {
			$init[ 'gestureHandling' ] = 'none';
		}

		if ( 'default' !== $settings[ 'map_style' ] ) {
			$init[ 'styles' ] = json_decode( $this->get_current_map_style( $settings[ 'map_style' ] ) );
		}
		$this->add_render_attribute( 'map-data', 'data-settings', json_encode( $init ) );
		$pins = array();
		if ( !empty( $settings[ 'markers' ] ) ) {
			foreach ( $settings[ 'markers' ] as $pin ) {
				if ( empty( $pin[ 'marker_address' ] ) ) {
					continue;
				}
				$current = array(
					'position' => $this->get_coordinates( $pin[ 'marker_address' ] ),
					'desc'     => $pin[ 'marker_desc' ],
					'state'    => $pin[ 'marker_state' ],
				);
				if ( !empty( $pin[ 'marker_image' ][ 'url' ] ) ) {
					$current[ 'image' ] = esc_url( $pin[ 'marker_image' ][ 'url' ] );
				}
				$pins[] = $current;
			}
		}

		$this->add_render_attribute( 'map-pins', 'data-markers', json_encode( $pins ) );
		printf(
			'<div class="advanced-map" %1$s %2$s></div>',
			$this->get_render_attribute_string( 'map-data' ),
			$this->get_render_attribute_string( 'map-pins' )
		);
	}

	public function get_map_styles() {
		$result = array();
		$plugin_templates =  $this->get_map_styles_from_path( advanced_elements()->plugin_path( 'templates/map-templates/' ) );
		$theme_templates  =  $this->get_map_styles_from_path( get_template_directory() . '/' . advanced_elements()->template_path() . 'maps/' );
		if ( get_stylesheet_directory() !== get_template_directory() ) {
			$child_templates = $this->get_map_styles_from_path( get_stylesheet_directory() . '/' . advanced_elements()->template_path() . 'maps/' );
		} else {
			$child_templates = array();
		}
		return array_merge(
			array( 'default' => esc_html__( 'Default', 'advanced-elements' ) ),
			$plugin_templates, $theme_templates, $child_templates
		);
	}

	public function get_map_styles_from_path( $path = null ) {
		if ( !file_exists( $path ) ) {
			return array();
		}
		$result = array();
		$absp   = untrailingslashit( ABSPATH );
		foreach ( glob( $path . '*.json' ) as $file ) {
			$data = get_file_data( $file, array( 'name' => 'Name' ) );
			$result[ str_replace( $absp, '', $file ) ] = ! empty( $data[ 'name' ] ) ? $data[ 'name' ] : basename( $file );
		}
		return $result;
	}

	public function get_current_map_style( $style_path ) {
		
		$full_path    = untrailingslashit( ABSPATH ) . $style_path;
		$include_path = null;

		if ( file_exists( $full_path ) ) {
			$include_path = $full_path;
		} elseif ( file_exists( $style_path ) ) {
			$include_path = $style_path;
		} elseif ( file_exists( str_replace( '\\', '/', $full_path ) ) ) {
			$include_path = str_replace( '\\', '/', $full_path );
		}

		if ( !$include_path ) {
			return '';
		}

		ob_start();
		include $include_path;
		return preg_replace( '/\/\/?\s*\*[\s\S]*?\*\s*\/\/?/m', '', ob_get_clean() );
	}

	public function get_coordinates( $coordinates ) {

		$map_key = $this->get_google_api_key();

		if ( !$map_key ) {
			$message = esc_html__( 'Please set Google maps API key before using this widget.', 'advanced-elements' );
			echo sprintf( '<div class="tt-map-message"><span class="tt-map-message-text">%s</span></div>', $message );
			return;
		}

		$key = md5( $coordinates );
		$coord = get_transient( $key );

		if ( !empty( $coord ) ) {
			return $coord;
		}

		$coordinates = esc_attr( $coordinates );
		$map_key  = esc_attr( $map_key );

		$reques_url = esc_url( add_query_arg(
			array(
				'address' => urlencode( $coordinates ),
				'key'     => urlencode( $map_key )
			),
			'https://maps.googleapis.com/maps/api/geocode/json'
		) );

		$response = wp_remote_get( $reques_url );
		$json     = wp_remote_retrieve_body( $response );
		$data     = json_decode( $json, true );

		$coord = isset( $data['results'][0]['geometry']['location'] )	? $data['results'][0]['geometry']['location']	: false;

		if ( !$coord ) {
			$message = esc_html__( 'Coordinates of this location not found', 'advanced-elements' );
			echo sprintf( '<div class="tt-map-message"><span class="tt-map-message-text">%s</span></div>', $message );
			return;
		}
		set_transient( $key, $coord, WEEK_IN_SECONDS );
		return $coord;
	}

	public function get_google_api_key() {
		$options = get_option( 'advanced_elements_settings' );
		return $options[ 'api_key' ];
	}

	public function get_current_page_settings() {
		return add_query_arg(
			array(
				'page' => 'advanced-elements-settings',
			),
			esc_url( admin_url( 'admin.php' ) )
		);
	}
}