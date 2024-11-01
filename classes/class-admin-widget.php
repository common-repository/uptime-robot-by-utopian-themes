<?php
/**
 * Uptime Robot Admin Widget class.
 *
 * @version		UPTIME_ROBOT_VER
 * @package		Uptime Robot
 * @author 		Brian C. Welch
 */

/**
 * Admin Widget Class
 */
class Uptime_Robot_Admin_Widget {
	/**
	 * Class constructor
	 */
	public function __construct() {
		// Add Actions.
		add_action( 'wp_dashboard_setup', array( $this, 'uptimerobot_add_dashboard_widget' ) );
	}

	/**
	 * Add the widget to the WordPress Dashboard.
	 *
	 * @method uptimerobot_add_dashboard_widget
	 */
	function uptimerobot_add_dashboard_widget() {
		wp_add_dashboard_widget(
			'uptimerobot_add_dashboard_widget',
			'Uptime Robot',
			array( $this, 'uptimerobot_widget_function' )
		);
	}

	/**
	 * Print out all the data and return the content in the widget.
	 *
	 * @method uptimerobot_widget_function
	 */
	public function uptimerobot_widget_function() {
		$json = uptime_robot()->uptime_robot_data->get_uptime_data();
		?>
		<div id="uptime_robot">
			<div class="table-responsive">
				<table class="table table-condensed">
					<thead>
					<?php if ( ! empty( $json->monitors->monitor ) ) { ?>
						<tr>
							<th><?php _e( 'Status', 'uptime_robot' ); ?>
							<?php if ( get_option( 'uptime_robot_option_show_id' ) ) { ?>
							<th><?php _e( 'ID', 'uptime_robot' ); ?></th>
							<?php } ?>
							<th><?php _e( 'Name', 'uptime_robot' ); ?></th>
							<?php if ( get_option( 'uptime_robot_option_show_type' ) ) { ?>
							<th><?php _e( 'Type', 'uptime_robot' ); ?></th>
							<?php } ?>
							<?php if ( get_option( 'uptime_robot_option_show_ratio' ) ) { ?>
							<th><?php _e( 'Ratio', 'uptime_robot' ); ?></th>
							<?php } ?>
						</tr>
					</thead>
					<tbody>
					<?php
					foreach ( $json->monitors->monitor as $monitor ) {
						// JSON Variables.
						$id           = $monitor->id;
						$name         = $monitor->friendlyname;
						$type         = $monitor->type;
						$subtype      = $monitor->subtype;
						$url          = $monitor->url;
						$status       = $monitor->status;
						$port         = $monitor->port;
						$ratio        = $monitor->alltimeuptimeratio;
						// Status Variables.
						$service_name = uptime_robot()->uptime_robot_data->monitor_type( $type );
						$status_class = uptime_robot()->uptime_robot_data->status_class( $status );
						$stats_icon   = uptime_robot()->uptime_robot_data->status_type_icon( $status );
						$status_text  = uptime_robot()->uptime_robot_data->status_type_text( $status );
					?>
					<tr class="<?php echo esc_attr( $status_class ); ?>">
						<td class="monitor_status">
							<span class="ur_tooltip" title="<?php echo $status_text; ?>">
								<img class="icon" src="<?php echo esc_url( $stats_icon ); ?>" alt="<?php echo $status_text; ?>" />
							</span>
						</td>
						<?php if ( get_option( 'uptime_robot_option_show_id' ) ) { ?>
						<td class="monitor_id">
							<?php echo $id; ?>
						</td>
						<?php } ?>
						<td class="monitor_name">
						<?php if ( 1 == $type || 2 == $type || 3 == $type ) { ?>
							<a href="<?php echo esc_url( $url ); ?>" target="_blank"><?php echo $name; ?></a>
						<?php } else { ?>
							<?php echo $name; ?>
						<?php } ?>
						</td>
						<?php if ( get_option( 'uptime_robot_option_show_type' ) ) { ?>
						<td class="monitor_type">
							<?php if ( $port ) { ?><span class="ur_tooltip" title="<?php echo $port; ?>"><?php } ?>
								<?php echo $service_name; ?>
							<?php if ( $port ) { ?></span><?php } ?>
						</td>
						<?php } ?>
						<?php if ( get_option( 'uptime_robot_option_show_ratio' ) ) { ?>
						<td class="monitor_ratio">
							<?php echo $ratio; ?>
						</td>
						<?php } ?>
					</tr>
					<?php } // End foreach. ?>
					<?php } else { ?>
					<tr class="info">
						<td>
							<p><?php _e( 'You have not entered your API key in the <a href="/wp-admin/options-general.php?page=uptime-robot">options section</a>', 'uptime_robot' ); ?></a>.</p>
							<p><?php _e( 'Please do so to see your available site monitors.', 'uptime_robot' ); ?></p>
						</td>
					<?php } // End if. ?>
					</tbody>
				</table>
			</div>
		</div>
		<?php
	}
}
