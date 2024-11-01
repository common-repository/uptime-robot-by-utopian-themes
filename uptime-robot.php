<?php
/**
 * Plugin Name:       Uptime Robot
 * Plugin URI:        http://onepixelright.com
 * Description:       A simple Wordpress dashboard widget that shows you the current uptime stats of your Uptime Robot monitored websites.
 * Version:           1.5.1
 * Author:            Brian C. Welch
 * Author URI:        http://briancwelch.com/
 * Requires at least: 4.0
 * Tested up to:      4.5.2
 * License:           GPLv3
 *
 * Text Domain:       uptime_robot
 * Domain Path:       /languages/
 *
 * @package           Uptime Robot
 * @category          Plugin
 * @author            Brian C. Welch
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

// Definitions.
if ( ! defined( 'UPTIME_ROBOT_VER' ) ) { define( 'UPTIME_ROBOT_VER', '1.5.1' ); }
if ( ! defined( 'UPTIME_ROBOT_FILE' ) ) { define( 'UPTIME_ROBOT_FILE', __FILE__ ); }
if ( ! defined( 'UPTIME_ROBOT_PATH' ) ) { define( 'UPTIME_ROBOT_PATH', dirname( __FILE__ ) ); }
if ( ! defined( 'UPTIME_ROBOT_URL' ) ) { define( 'UPTIME_ROBOT_URL', plugin_dir_url( __FILE__ ) ); }

/**
 * Register the uptime_robot() function.
 */
function uptime_robot() {
	return Uptime_Robot::get_instance();
}

// Uptime Robot Global.
$GLOBALS['uptime_robot'] = uptime_robot();
global $uptime_robot;

/**
 * The Uptime Robot Core Class.
 */
class Uptime_Robot {

	/**
	 * Instance.
	 *
	 * @var [type]
	 */
	private static $instance;

	/**
	 * Singleton.
	 *
	 * @method get_instance
	 * @return [type]       [description]
	 */
	public static function get_instance() {
		if ( null === self::$instance ) {
			self::$instance = new self;
		}
		return self::$instance;
	}

	/**
	 * Class Constructor.
	 *
	 * @method __construct
	 */
	public function __construct() {
		$this->includes();

		// Class Instantiation.
		$this->uptime_robot_admin_widget = new Uptime_Robot_Admin_Widget();
		$this->uptime_robot_data         = new Uptime_Robot_Data();
		$this->uptime_robot_options      = new Uptime_Robot_Options();
		$this->uptime_robot_scripts      = new Uptime_Robot_Scripts();
		$this->uptime_robot_shortcode    = new Uptime_Robot_Shortcode();

		// Add Actions.
		add_action( 'plugins_loaded', array( $this, 'translations' ) );
	}

	/**
	 * Include Additional Classes.
	 *
	 * @method includes
	 */
	function includes() {
		// Includes.
		require_once( UPTIME_ROBOT_PATH . '/classes/class-admin-widget.php' );
		require_once( UPTIME_ROBOT_PATH . '/classes/class-data.php' );
		require_once( UPTIME_ROBOT_PATH . '/classes/class-options.php' );
		require_once( UPTIME_ROBOT_PATH . '/classes/class-scripts.php' );
		require_once( UPTIME_ROBOT_PATH . '/classes/class-shortcode.php' );
		require_once( UPTIME_ROBOT_PATH . '/classes/class-widget.php' );
	}

	/**
	 * Load Plugin Translations.
	 *
	 * @method translations
	 */
	function translations() {
		load_plugin_textdomain(
			'uptime_robot',
			false,
			dirname( plugin_basename( __FILE__ ) ) . '/languages/'
		);
	}

} // End class.
