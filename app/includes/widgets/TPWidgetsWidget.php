<?php

/**
 * Created by PhpStorm.
 * User: solomashenko
 * Date: 01.08.17
 * Time: 19:30
 */
namespace app\includes\widgets;

use WP_Widget;

class TPWidgetsWidget extends WP_Widget{
	public function __construct()
	{
		parent::__construct(
			'travelpayouts_widget', // Base ID
			__('Travelpayouts – Widgets', TPOPlUGIN_TEXTDOMAIN), // Name
			array(
				'description' => __('Travelpayouts – Widgets', TPOPlUGIN_TEXTDOMAIN)
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