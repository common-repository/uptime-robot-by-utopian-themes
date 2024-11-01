<?php
/**
 * Uptime Robot Options class.
 *
 * @version		UPTIME_ROBOT_VER
 * @package		Uptime Robot
 * @author 		Brian C. Welch
 */

/**
 * Options Class
 */
class Uptime_Robot_Data {
	/**
	 * Class constructor
	 */
	public function __construct() {
		// No actions or filters.
	}

	/**
	 * Get the uptime data.
	 *
	 * @method get_uptime_data
	 * @return [type]          [description]
	 */
	public static function get_uptime_data() {
		$api_key = get_option( 'uptime_robot_option_api_key' );
		$url     = 'http://api.uptimerobot.com/getMonitors?apiKey=' . $api_key['api_key'] . '&logs=1&showTimezone=1&format=json&noJsonCallback=1';
		$curl    = curl_init( $url );

		curl_setopt( $curl, CURLOPT_RETURNTRANSFER, true );
		$response = curl_exec( $curl );
		curl_close( $curl );

		$json = json_decode( $response );
		return $json;
	}

	/**
	 * Return a value based on the monitors status.
	 *
	 * @method status_type_text
	 * @param  [type] $status [description].
	 * @return [type]         [description]
	 */
	public static function status_type_text( $status ) {
		switch ( $status ) {
			case 0:
				$stat = __( 'Paused' , 'uptime_robot' );
				break;
			case 1:
				$stat = __( 'Unchecked', 'uptime_robot' );
				break;
			case 2:
				$stat = __( 'Up', 'uptime_robot' );
				break;
			case 8:
				$stat = __( 'Appears Down', 'uptime_robot' );
				break;
			case 9:
				$stat = __( 'Down', 'uptime_robot' );
				break;
			default:
				$stat = __( 'Unknown', 'uptime_robot' );
		}
		return $stat;
	}

	/**
	 * Return an icon based on the monitors status.
	 *
	 * @method status_type_icon
	 * @param  [type] $status [description].
	 * @return [type]         [description]
	 */
	public static function status_type_icon( $status ) {
		switch ( $status ) {
			case 0:
				$status_icon = esc_url( UPTIME_ROBOT_URL . '/assets/images/paused.png' );
				break;
			case 1:
				$status_icon = esc_url( UPTIME_ROBOT_URL . '/assets/images/unchecked.png' );
				break;
			case 2:
				$status_icon = esc_url( UPTIME_ROBOT_URL . '/assets/images/up.png' );
				break;
			case 8:
				$status_icon = esc_url( UPTIME_ROBOT_URL . '/assets/images/appears_down.png' );
				break;
			case 9:
				$status_icon = esc_url( UPTIME_ROBOT_URL . '/assets/images/down.png' );
				break;
			default:
				$status_icon = esc_url( UPTIME_ROBOT_URL . '/assets/images/unknown.png' );
		}
		return $status_icon;
	}

	/**
	 * Add a class to the table based on the monitors status.
	 *
	 * @method status_class
	 * @param  [type] $status [description].
	 * @return [type]         [description]
	 */
	public static function status_class( $status ) {
		switch ( $status ) {
			case 0:
				$class = __( 'warning', 'uptime_robot' );
				break;
			case 1:
				$class = __( 'warning', 'uptime_robot' );
				break;
			case 2:
				$class = __( 'success', 'uptime_robot' );
				break;
			case 8:
				$class = __( 'danger', 'uptime_robot' );
				break;
			case 9:
				$class = __( 'danger', 'uptime_robot' );
				break;
			default:
				$class = __( 'info', 'uptime_robot' );
		}
		return $class;
	}

	/**
	 * Set a description based on the monitor type.
	 *
	 * @method monitor_type
	 * @param  [type] $type [description].
	 * @return [type]       [description]
	 */
	public static function monitor_type( $type ) {
		switch ( $type ) {
			case 1:
				$type = __( 'HTTP(S)', 'uptime_robot' );
				break;
			case 2:
				$type = __( 'Keyword', 'uptime_robot' );
				break;
			case 3:
				$type = __( 'Ping', 'uptime_robot' );
				break;
			case 4:
				$type = __( 'Port', 'uptime_robot' );
				break;
		}
		return $type;
	}

	/**
	 * Set a description based on the monitor subtype.
	 *
	 * @method monitor_subtype
	 * @param  [type] $subtype [description].
	 * @return [type]          [description]
	 */
	public static function monitor_subtype( $subtype ) {
		switch ( $subtype ) {
			case 1:
				$subtype = __( 'HTTP', 'uptime_robot' );
				break;
			case 2:
				$subtype = __( 'HTTPS', 'uptime_robot' );
				break;
			case 3:
				$subtype = __( 'FTP', 'uptime_robot' );
				break;
			case 4:
				$subtype = __( 'SMTP', 'uptime_robot' );
				break;
			case 5:
				$subtype = __( 'POP3', 'uptime_robot' );
				break;
			case 6:
				$subtype = __( 'IMAP', 'uptime_robot' );
				break;
			case 99:
				$subtype = __( 'Custom Port', 'uptime_robot' );
				break;
		}
		return $subtype;
	}
}
