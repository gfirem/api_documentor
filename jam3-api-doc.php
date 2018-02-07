<?php
/**
 * @package           Jam3ApiDoc
 * @copyright         2017 to Jam3
 *
 * @wordpress-plugin
 * Plugin Name:       Jam3 Api Doc
 * Plugin URI:        http://www.jam3.com/
 * Description:       Add an endpoint for generated documentation.
 * Version:           1.0.0
 * Author:            Guillermo Figueroa Mesa
 * Author URI:        http://www.gfirem.com
 * License:           Apache License 2.0
 * License URI:       http://www.apache.org/licenses/
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
if ( ! class_exists( 'Jam3ApiDoc' ) ) {
	/**
	 * Class Jam3ApiDoc
	 */
	class Jam3ApiDoc {
		/**
		 * Instance of this class.
		 *
		 * @var object
		 */
		protected static $instance = null;
		/**
		 * @var string
		 */
		public static $view_path;
		/**
		 * @var string
		 */
		public static $project_url;
		/**
		 * @var string
		 */
		public static $project_path;
		/**
		 * @var string
		 */
		public static $assets_url;
		
		/**
		 * Initialize the plugin.
		 */
		private function __construct() {
			self::$view_path    = dirname( __FILE__ ) . DIRECTORY_SEPARATOR . 'view' . DIRECTORY_SEPARATOR;
			self::$project_path = dirname( __FILE__ ) . DIRECTORY_SEPARATOR . 'project' . DIRECTORY_SEPARATOR;
			self::$project_url  = trailingslashit( plugin_dir_url( __FILE__ ) ) . 'project/';
			self::$assets_url   = trailingslashit( plugin_dir_url( __FILE__ ) ) . 'assets/';
			require_once dirname( __FILE__ ) . DIRECTORY_SEPARATOR . 'classes' . DIRECTORY_SEPARATOR . 'class-jam3-api-doc-template.php';
			new Jam3ApiDocTemplate();
		}
		
		/**
		 * Return an instance of this class.
		 *
		 * @return object A single instance of this class.
		 */
		public static function get_instance() {
			// If the single instance hasn't been set, set it now.
			if ( null === self::$instance ) {
				self::$instance = new self;
			}
			
			return self::$instance;
		}
	}
	add_action( 'plugins_loaded', array( 'Jam3ApiDoc', 'get_instance' ), 1 );
}