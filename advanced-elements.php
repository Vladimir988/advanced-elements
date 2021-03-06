<?php
/**
 * Plugin Name: Advanced Elements
 * Plugin URI:  
 * Description: Add elements for Elementor Page builder. It provides the set of modules to advanced different kinds of content, adds custom modules to your website and applies attractive styles!
 * Version:     1.0
 * Author:      Vladimir Prokopets
 * Author URI:  https://github.com/Vladimir988
 * Text Domain: advanced-elements
 * Domain Path: /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die();
}

// If class `Advanced_Elements` doesn't exists yet.
if( ! class_exists( 'Advanced_Elements' ) ){

	/**
	 * Sets up and initializes the plugin.
	 */
	class Advanced_Elements {

		/**
		 * A reference to an instance of this class.
		 *
		 * @since  1.0
		 * @access private
		 * @var    object
		 */
		private static $instance = null;

		/**
		 * Holder for base plugin URL
		 *
		 * @since  1.0
		 * @access private
		 * @var    string
		 */
		private $plugin_url = null;

		/**
		 * Plugin version
		 *
		 * @var string
		 */
		private $version = '1.0';

		/**
		 * Holder for base plugin path
		 *
		 * @since  1.0
		 * @access private
		 * @var    string
		 */
		private $plugin_path = null;

		public function __construct(){

			// Load modules.
			add_action( 'init', array( $this, 'init' ), -999 );

			// Register activation and deactivation hook.
			register_activation_hook( __FILE__, array( $this, 'activation' ) );
			register_deactivation_hook( __FILE__, array( $this, 'deactivation' ) );
		}

		/**
		 * Load modules
		 * @since  1.0
		 * @access public
		 */
		public function init(){
			require $this->plugin_path('includes/classes/class-advanced-elements-integration.php');
			get_elementor_create_element()->init();
		}

		/**
		 * Returns path to file or dir inside plugin folder
		 *
		 * @param  string $path Path inside plugin dir.
		 * @return string
		 */
		public function plugin_path( $path = null ) {

			if ( !$this->plugin_path ) {
				$this->plugin_path = trailingslashit( plugin_dir_path( __FILE__ ) );
			}

			return $this->plugin_path . $path;
		}

		/**
		 * Returns url to file or dir inside plugin folder
		 *
		 * @param  string $path Path inside plugin dir.
		 * @return string
		 */
		public function plugin_url( $path = null ) {

			if ( !$this->plugin_url ) {
				$this->plugin_url = trailingslashit( plugin_dir_url( __FILE__ ) );
			}

			return $this->plugin_url . $path;
		}

		/**
		 * Get the template path.
		 *
		 * @return string
		 */
		public function template_path() {
			return apply_filters( 'advanced-elements/template-path', 'advanced-elements/' );
		}

		/**
		 * Returns path to template file.
		 *
		 * @return string|bool
		 */
		public function get_template( $name = null ) {

			$template = locate_template( $this->template_path() . $name );

			if ( !$template ) {
				$template = $this->plugin_path( 'templates/' . $name );
			}

			if ( file_exists( $template ) ) {
				return $template;
			} else {
				return false;
			}
		}

		/**
		 * activation plugin hook function
		 * @since  0.1
		 * @access public
		 * @return none
		 */
		public function activation() {}

		/**
		 * deactivation plugin hook function
		 * @since  0.1
		 * @return none
		 */
		public function deactivation() {}

		/**
		 * Returns the instance.
		 *
		 * @since  0.1
		 * @access public
		 * @return object
		 */
		public static function get_instance() {
			// If the single instance hasn't been set, set it now.
			if ( null == self::$instance ) {
				self::$instance = new self;
			}
			return self::$instance;
		}
	}
}

if ( !function_exists( 'advanced_elements' ) ) {

	/**
	 * Returns instanse of the plugin class.
	 *
	 * @since  0.1
	 * @return object
	 */
	function advanced_elements() {
		return Advanced_Elements::get_instance();
	}
}

advanced_elements();