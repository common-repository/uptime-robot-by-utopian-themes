<?php
/**
 * Uptime Robot Scripts class.
 *
 * @version		UPTIME_ROBOT_VER
 * @package		Uptime Robot
 * @author 		Brian C. Welch
 */

/**
 * Scripts Class.
 */
class Uptime_Robot_Scripts {

	/**
	 * Class constructor
	 */
	public function __construct() {
		// Add Actions.
		add_action( 'wp_enqueue_scripts',    array( $this, 'uptimerobot_scripts' ), 99 );
		add_action( 'admin_enqueue_scripts', array( $this, 'uptimerobot_scripts' ), 99 );
	}

	/**
	 * Add Widget Scripts
	 *
	 * @method uptimerobot_scripts
	 */
	function uptimerobot_scripts() {
		// CSS.
		wp_enqueue_style(
			'uptime_robot',
			UPTIME_ROBOT_URL . 'assets/css/uptime_robot.min.css',
			array(),
			time(),
			null
		);
	}
}
