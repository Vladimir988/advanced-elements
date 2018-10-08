<?php 

// If this file is called directly, abort.
if ( !defined( 'WPINC' ) ) {
	die;
}

if( !class_exists( 'Advanced_Elements_Integration' ) ){

	class Advanced_Elements_Integration {

		private static $instance = null;

		public static function get_instance() {
			if ( ! self::$instance )
				self::$instance = new self;
			return self::$instance;
		}

		public function init(){
			add_action( 'admin_menu', array( $this, 'advanced_settings_page' ), 99 );
			add_action( 'admin_init', array( $this, 'advanced_google_api_setting' ) );
			add_action( 'admin_enqueue_scripts', array( $this, 'advanced_admin_enqueue_scripts' ) );
			add_action( 'elementor/init', array( $this, 'register_category' ) );
			add_action( 'elementor/widgets/widgets_registered', array( $this, 'widgets_registered' ) );
			add_action( 'elementor/frontend/before_enqueue_scripts', array( $this, 'enqueue_scripts' ) );
			add_action( 'elementor/editor/after_enqueue_styles', array( $this, 'editor_styles' ) );
		}

		public function register_category() {

			\Elementor\Plugin::$instance->elements_manager->add_category(
				'advanced-elements',
				array(
					'title' => __( 'Advanced Elements', 'advanced-elements' ),
					'icon' => 'fa fa-plug',
				),
				1
			);
		}

		public function widgets_registered( $widgets_manager ) {
			if(defined('ELEMENTOR_PATH') && class_exists('Elementor\Widget_Base')){
				$this->register_modules( $widgets_manager );
			}
		}

		private function register_modules( $widgets_manager ){
			foreach ( glob( advanced_elements()->plugin_path( 'includes/modules/' ) . '*.php' ) as $file ) {
				$this->required_module( $file, $widgets_manager );
			}
		}

		private function required_module( $file, $widgets_manager ){
			if( file_exists( $file ) ){
				$this->register_type( $file, $widgets_manager );
			}
		}

		private function register_type( $file, $widgets_manager ){

			$name  = basename( str_replace('.php', '', $file) );
			$class_name = explode('-', $name );
			$class_name[0] = strtoupper( $class_name[0] );
			$class = ucwords( join( $class_name, '_' ), '_' );
			$class = sprintf( 'Elementor\%s', $class );

			require $file;

			if( class_exists( $class ) ){
				$widgets_manager->register_widget_type( new $class );
			}
		}

		public function enqueue_scripts(){

			foreach ( glob( advanced_elements()->plugin_path( 'assets/js/' ) . '*.js' ) as $jsfile ) {

				$jsfile_name = basename( $jsfile );

				wp_enqueue_script(
					'advanced-' . $jsfile_name,
					advanced_elements()->plugin_url( 'assets/js/' . $jsfile_name ),
					array( 'jquery', 'elementor-frontend' ),
					'',
					true
				);
			}

			foreach ( glob( advanced_elements()->plugin_path( 'assets/css/' ) . '*.css' ) as $cssfile ) {

				$cssfile_name = basename( $cssfile );

				wp_enqueue_style(
					'advanced-' . $cssfile_name,
					advanced_elements()->plugin_url( 'assets/css/' . $cssfile_name ),
					array(),
					''
				);
			}

			wp_register_script(
				'advanced-google-maps',
				add_query_arg( array( 'key' => $this->_get_google_api_key() ), 'https://maps.googleapis.com/maps/api/js' ),
				false,
				false,
				true
			);
			wp_enqueue_script( 'advanced-google-maps' );
		}

		public function advanced_admin_enqueue_scripts() {
			wp_enqueue_style( 'advanced-settings-page', advanced_elements()->plugin_url( 'assets/css/admin/settings-page.css' ), array(),	'', 'all' );
		}

		public function advanced_settings_page() {
			add_submenu_page(	'elementor', esc_html__( 'Advanced Settings', 'advanced-elements' ),	esc_html__( 'Advanced Settings', 'advanced-elements' ), 'manage_options', 'advanced-elements-settings', array( $this, 'advanced_render_page' ) );
		}

		public function advanced_render_page() {
			?>
				<div class="advanced-settings-wrapper">
					<form action="options.php" method="POST" enctype="multipart/form-data">
						<?php settings_fields('advanced_options_group'); ?>
						<?php do_settings_sections('advanced_upload_plugin_page'); ?>
						<?php submit_button('Save'); ?>
					</form>
				</div>
			<?php
		}

		public function advanced_google_api_setting() {
			register_setting('advanced_options_group', 'advanced_elements_settings', 'advanced_elements_settings_sanitize');
			add_settings_section('advanced_elements_section', esc_html__( 'Advanced Elements Options:', 'advanced-elements' ), '', 'advanced_upload_plugin_page');
			add_settings_field('advanced_api_key_id', 'Google Maps API Key:', array( $this, 'advanced_api_key_callback' ), 'advanced_upload_plugin_page', 'advanced_elements_section', array('label_for' => 'advanced_api_key_id'));
		}

		public function advanced_api_key_callback() {
			$options = get_option('advanced_elements_settings');
			?>
				<input type="text" name="advanced_elements_settings[api_key]" id="advanced_api_key_id" placeholder="<?php esc_html_e( 'API key', 'advanced-elements' ); ?>" value="<?php echo esc_attr($options['api_key']); ?>" class="regular-text">
				<div class="api-key-description">Create API Key: <a href="https://developers.google.com/maps/documentation/javascript/get-api-key" rel="nofollow" target="_blank">https://developers.google.com/maps/documentation/javascript/get-api-key</a></div>
			<?php
		}
		public function _get_google_api_key() {
			$options = get_option('advanced_elements_settings');
			return $options['api_key'];
		}

		public function editor_styles(){}

	}
}

function get_elementor_create_element(){
	return Advanced_Elements_Integration::get_instance();
}

?>