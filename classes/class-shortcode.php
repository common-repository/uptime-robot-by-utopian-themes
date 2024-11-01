<?php
/**
 * Uptime Robot Shortcode class.
 *
 * @version		UPTIME_ROBOT_VER
 * @package		Uptime Robot
 * @author 		Brian C. Welch
 */

/**
 * Shortcode Class.
 */
class Uptime_Robot_Shortcode {

	/**
	 * Class constructor
	 */
	public function __construct() {
		// Add Actions.
		add_shortcode( 'uptime_robot',	array( $this, 'uptime_robot_shortcode' ) );
	}

	/**
	 * Render the widget shortcode.
	 *
	 * @method uptime_robot_shortcode
	 * @return [type] [description]
	 */
	function uptime_robot_shortcode() {
		ob_start();
		$widget = uptime_robot()->uptime_robot_admin_widget;
		$widget->uptimerobot_widget_function();
		return ob_get_clean();
	}
}
