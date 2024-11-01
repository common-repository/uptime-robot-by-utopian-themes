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
class Uptime_Robot_Options {
	/**
	 * Class constructor
	 */
	public function __construct() {
		// Add Actions.
		add_action( 'admin_menu', array( $this, 'uptime_robot_menu' ) );
		add_action( 'admin_init', array( $this, 'uptime_robot_page_init' ) );
	}

	/**
	 * Add WordPress Dashboard Settings Menu
	 *
	 * @method uptime_robot_menu.
	 */
	function uptime_robot_menu() {
		add_options_page(
			'Settings Admin',
			'Uptime Robot',
			'manage_options',
			'uptime-robot',
			array( $this, 'create_uptime_robot_settings_page' )
		);
	}

	/**
	 * Create WordPress Dashboard Settings Page
	 *
	 * @method create_uptime_robot_settings_page
	 */
	function create_uptime_robot_settings_page() {
		$this->api_key    = get_option( 'uptime_robot_option_api_key' );
		$this->show_id    = get_option( 'uptime_robot_option_show_id' );
		$this->show_type  = get_option( 'uptime_robot_option_show_type' );
		$this->show_ratio = get_option( 'uptime_robot_option_show_ratio' );
		?>
		<div class="wrap">
			<?php screen_icon(); ?>
			<h2><?php esc_html_e( 'Uptime Robot','uptime-robot' );?></h2>
			<form method="post" action="options.php">
			<?php
				settings_fields( 'uptime_robot_option_group' );
				do_settings_sections( 'uptimerobot-setting-admin' );
				submit_button( 'Save Settings' );
			?>
			</form>
		</div>
		<?php
	}

	/**
	 * Add Content to WordPress Dashboard Settings Page
	 *
	 * @method uptime_robot_page_init
	 */
	function uptime_robot_page_init() {
		register_setting(
			'uptime_robot_option_group',
			'uptime_robot_option_api_key',
			array( $this, 'sanitizekey' )
		);
		register_setting(
			'uptime_robot_option_group',
			'uptime_robot_option_show_id'
		);
		register_setting(
			'uptime_robot_option_group',
			'uptime_robot_option_show_type'
		);
		register_setting(
			'uptime_robot_option_group',
			'uptime_robot_option_show_ratio'
		);
		add_settings_section(
			'setting_section_id',
			' ',
			array( $this, 'uptime_robot_section_info' ),
			'uptimerobot-setting-admin'
		);
		add_settings_field(
			'api_key',
			'API Key',
			array( $this, 'api_key_callback' ),
			'uptimerobot-setting-admin',
			'setting_section_id'
		);
		add_settings_field(
			'show_id',
			'Show Monitor ID',
			array( $this, 'id_check_callback' ),
			'uptimerobot-setting-admin',
			'setting_section_id'
		);
		add_settings_field(
			'show_type',
			'Show Monitor Type',
			array( $this, 'type_check_callback' ),
			'uptimerobot-setting-admin',
			'setting_section_id'
		);
		add_settings_field(
			'show_ratio',
			'Show Uptime Ratio',
			array( $this, 'ratio_check_callback' ),
			'uptimerobot-setting-admin',
			'setting_section_id'
		);
	}

	/**
	 * Sanitize API Key Input
	 *
	 * @method sanitizekey
	 * @param  [type] $input [description].
	 * @return [type] [description]
	 */
	function sanitizekey( $input ) {
		$new_input = array();
		if ( isset( $input['api_key'] ) ) {
			$new_input['api_key'] = sanitize_key( $input['api_key'] );
		}
		return $new_input;
	}

	/**
	 * Settings Description
	 *
	 * @method uptime_robot_section_info
	 */
	function uptime_robot_section_info() {
		print 'Please enter your Uptime Robot API key.  If you do not have an API key, you will need to visit <a href="https://uptimerobot.com/dashboard" target="_blank">Uptime Robot</a> to acquire one.';
	}

	/**
	 * API Key Callback
	 *
	 * @method api_key_callback
	 */
	function api_key_callback() {
		printf(
			'<input type="text" id="api_key" name="uptime_robot_option_api_key[api_key]" value="%s" />',
			isset( $this->api_key['api_key'] ) ? esc_attr( $this->api_key['api_key'] ) : ''
		);
	}

	/**
	 * ID Checkbox Callback
	 *
	 * @method id_check_callback
	 */
	function id_check_callback() {
		printf(
			'<input type="checkbox" id="show_id" name="uptime_robot_option_show_id[show_id]" value="1";' . checked( isset( $this->show_id['show_id'] ), true, false ) . '/>', 'uptime_robot'
		);
	}

	/**
	 * Type Checkbox Callback
	 *
	 * @method type_check_callback
	 */
	function type_check_callback() {
		printf(
			'<input type="checkbox" id="show_type" name="uptime_robot_option_show_type[show_type]" value="1";' . checked( isset( $this->show_type['show_type'] ), true, false ) . '/>', 'uptime_robot'
		);
	}

	/**
	 * Ratio Checkbox Callback
	 *
	 * @method ratio_check_callback
	 */
	function ratio_check_callback() {
		printf(
			'<input type="checkbox" id="show_ratio" name="uptime_robot_option_show_ratio[show_ratio]" value="1";' . checked( isset( $this->show_ratio['show_ratio'] ), true, false ) . '/>', 'uptime_robot'
		);
	}
}
