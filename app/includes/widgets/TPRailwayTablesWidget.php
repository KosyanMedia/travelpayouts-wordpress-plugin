<?php
/**
 * Created by PhpStorm.
 * User: solomashenko
 * Date: 02.08.17
 * Time: 11:14
 */

namespace app\includes\widgets;

use WP_Widget;

class TPRailwayTablesWidget extends WP_Widget{
	public function __construct()
	{
		parent::__construct(
			'travelpayouts_railway_tables', // Base ID
			__('Travelpayouts – Railways schedule', TPOPlUGIN_TEXTDOMAIN), // Name
			array(
				'description' => __('Travelpayouts – Railways schedule', TPOPlUGIN_TEXTDOMAIN)
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

	}
}