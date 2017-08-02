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
		$instance['select'] = (!empty( $new_instance['select'])) ? $new_instance['select'] : $old_instance['select'];
		$instance['title'] = (!empty( $new_instance['title'] )) ? $new_instance['title'] : $old_instance['title'];
		$instance['origin'] = (!empty( $new_instance['origin'])) ? $new_instance['origin'] : $old_instance['origin'];
		$instance['destination'] = (!empty( $new_instance['destination'] ) ) ? $new_instance['destination'] : $old_instance['destination'];
		$instance['airline'] = (!empty( $new_instance['airline'])) ? $new_instance['airline'] : $old_instance['airline'];
		$instance['subid'] = (!empty( $new_instance['subid'])) ? $new_instance['subid'] : $old_instance['subid'];
		$instance['currency'] = (!empty( $new_instance['currency'])) ? $new_instance['currency'] : $old_instance['currency'];
		$instance['paginate'] = (isset($new_instance['paginate']))? true : false;
		$instance['off_title'] = (isset($new_instance['off_title']))? true : false;
		$instance['transplant'] = (!empty( $new_instance['transplant'])) ? $new_instance['transplant'] : $old_instance['transplant'];
		$instance['filter_airline'] = (!empty( $new_instance['filter_airline'])) ? $new_instance['filter_airline'] : $old_instance['filter_airline'];
		$instance['filter_flight_number'] = (!empty( $new_instance['filter_flight_number'])) ? $new_instance['filter_flight_number'] : $old_instance['filter_flight_number'];
		$instance['limit'] = (!empty( $new_instance['limit'])) ? $new_instance['limit'] : $old_instance['limit'];
		$instance['one_way'] = (isset($new_instance['one_way']))? true : false;
		return $instance;
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
			<p class="TP-SelectWidget"></p>

		</div>
		<?php
	}

}
