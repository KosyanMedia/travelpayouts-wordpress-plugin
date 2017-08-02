<?php

/**
 * Created by PhpStorm.
 * User: solomashenko
 * Date: 01.08.17
 * Time: 19:28
 */
namespace app\includes\widgets;

use app\includes\TPPlugin;
use WP_Widget;

class TPFlightsTablesWidget extends WP_Widget{
	public function __construct()
	{
		parent::__construct(
			'travelpayouts_flights_tables', // Base ID
			__('Travelpayouts – Flights Tables', TPOPlUGIN_TEXTDOMAIN), // Name
			array(
				'description' => __('Travelpayouts – Flights Tables', TPOPlUGIN_TEXTDOMAIN)
			) // Args
		);
	}

	/**
	 * @param $args
	 * @param $instance
	 */
	public function widget( $args, $instance ) {

	}

	/**
	 * @param $new_instance
	 * @param $old_instance
	 * @return mixed
	 */
	public function update( $new_instance, $old_instance ) {
		// Save widget options
	}

	/**
	 * @param $instance
	 */
	public function form( $instance ) {
		$select = isset( $instance['select'] ) ? esc_attr( $instance['select'] ) : 0;
		$title = isset( $instance['title'] ) ? esc_attr( $instance['title'] ) : '';
		$origin = isset( $instance['origin'] ) ? esc_attr( $instance['origin'] ) : '';
		$destination = isset( $instance['destination'] ) ? esc_attr( $instance['destination'] ) : '';
		$airline = isset( $instance['airline'] ) ? esc_attr( $instance['airline'] ) : '';
		$subid = isset( $instance['subid'] ) ? esc_attr( $instance['subid'] ) : '';
		$currency = isset( $instance['currency'] ) ? esc_attr( $instance['currency'] ) : TPPlugin::$options['local']['currency'];
		$paginate = isset( $instance['paginate'] ) ? $instance['paginate']  : true;
		$off_title = isset( $instance['off_title'] ) ? $instance['off_title']  : false;
		$transplant = isset( $instance['transplant'] ) ? esc_attr( $instance['transplant'] ) : 0;
		$filter_airline = isset( $instance['filter_airline'] ) ? esc_attr( $instance['filter_airline'] ) : '';
		$filter_flight_number = isset( $instance['filter_flight_number'] ) ? esc_attr( $instance['filter_flight_number'] ) : '';
		$limit = isset( $instance['limit'] ) ? esc_attr( $instance['limit'] ) : 100;
		$one_way = isset( $instance['one_way'] ) ? $instance['one_way']  : true;
		?>

		<div class="TP-MainWidget">
			<p>
				<label for="<?php echo $this->get_field_id('title'); ?>">
					<?php _e('Title:', TPOPlUGIN_TEXTDOMAIN);?>
					<input class="widefat" id="<?php echo $this->get_field_id('title'); ?>"
					       name="<?php echo $this->get_field_name('title'); ?>" type="text"
					       value="<?php echo $title; ?>" />
				</label>
			</p>
		</div>
		<?php
	}

}
