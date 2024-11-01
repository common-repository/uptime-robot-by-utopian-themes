<?php
/**
 * Uptime Robot Widget class.
 *
 * @version		UPTIME_ROBOT_VER
 * @package		Uptime Robot
 * @author 		Brian C. Welch
 */

/**
 * Widget Class
 */
class Uptime_Robot_Widget extends WP_Widget {
	/**
	 * Class Constructor
	 */
	function __construct() {
		parent::__construct(
			'Uptime_Robot_Widget',
			__( 'Uptime Robot', 'uptime_robot' ),
			array(
				'description' => __( 'Adds an Uptime Robot widget to the any widget area.', 'uptime_robot' ),
			)
		);
	}

	/**
	 * Uptime Robot Widget
	 *
	 * @method widget
	 * @param  [type] $args     [description].
	 * @param  [type] $instance [description].
	 */
	public function widget( $args, $instance ) {
		$title = apply_filters( 'widget_title', $instance['title'] );
		echo $args['before_widget'];

		if ( ! empty( $title ) ) {
			echo $args['before_title'] . $title . $args['after_title'];
			$widget = uptime_robot()->uptime_robot_admin_widget;
			$widget->uptimerobot_widget_function();
		}

		echo $args['after_widget'];
	}

	/**
	 * Widget settings.
	 *
	 * @method form
	 * @param  [type] $instance [description].
	 */
	public function form( $instance ) {
		if ( isset( $instance['title'] ) ) {
			$title = $instance['title'];
		} else {
			$title = __( 'Uptime Robot', 'uptimerobot' );
		}

		?>
		<p>
			<label for="<?php esc_html_e( $this->get_field_id( 'title' ), 'uptime_robot' ); ?>"><?php esc_html_e( 'Title:', 'uptime_robot' ); ?></label>
			<input class="widefat" id="<?php esc_html_e( $this->get_field_id( 'title' ), 'uptime_robot' ); ?>" name="<?php esc_html_e( $this->get_field_name( 'title' ), 'uptime_robot' ); ?>" type="text" value="<?php esc_html_e( $title, 'uptime_robot' ); ?>" />
		</p>
		<?php
	}

	/**
	 * Update widget settings with a new instance if changed.
	 *
	 * @method update
	 * @param  [type] $new_instance [description].
	 * @param  [type] $old_instance [description].
	 * @return [type]               [description]
	 */
	public function update( $new_instance, $old_instance ) {
		$instance = array();
		$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';

		return $instance;
	}
}

/**
 * Register and load the Uptime Robot widget.
 */
function uptime_robot_load_widget() {
	register_widget( 'Uptime_Robot_Widget' );
}
add_action( 'widgets_init', 'uptime_robot_load_widget' );
