<?php

/**
 * Created by PhpStorm.
 * User: solomashenko
 * Date: 01.08.17
 * Time: 19:33
 */
namespace app\includes\widgets;

use WP_Widget;

class TPHotelsTablesWidget extends WP_Widget{
	public function __construct()
	{
		parent::__construct(
			'travelpayouts_hotels_tables', // Base ID
			__('Travelpayouts – Hotel Tables', TPOPlUGIN_TEXTDOMAIN), // Name
			array(
				'description' => __('Travelpayouts – Hotel Tables', TPOPlUGIN_TEXTDOMAIN)
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
		$select = isset( $instance['hotel_select'] ) ? esc_attr( $instance['hotel_select'] ) : 'null';
		$title = isset( $instance['hotel_title'] ) ? esc_attr( $instance['hotel_title'] ) : '';
		$city = isset( $instance['hotel_city'] ) ? esc_attr( $instance['hotel_city'] ) : '';
		$subid = isset( $instance['hotel_subid'] ) ? esc_attr( $instance['hotel_subid'] ) : '';
		$selectionsType = isset( $instance['hotel_selections_type'] ) ? esc_attr( $instance['hotel_selections_type'] ) : 'all';
		$checkIn = isset( $instance['hotel_check_in'] ) ? esc_attr( $instance['hotel_check_in'] ) :  date('d-m-Y');
		$checkOut = isset( $instance['hotel_check_out'] ) ? esc_attr( $instance['hotel_check_out'] ) :  date('d-m-Y', time()+DAY_IN_SECONDS);
		$limit = isset( $instance['hotel_limit'] ) ? esc_attr( $instance['hotel_limit'] ) : 20;
		$paginate = isset( $instance['hotel_paginate'] ) ? $instance['hotel_paginate']  : true;
		$offTitle = isset( $instance['hotel_off_title'] ) ? $instance['hotel_off_title']  : false;
		$linkWithoutDates = isset( $instance['hotel_link_without_dates'] ) ? $instance['hotel_link_without_dates']  : false;
		$shortcodeLabels = array(
			__('Hotels collection - Discounts', TPOPlUGIN_TEXTDOMAIN),
			__('Hotels collections for dates', TPOPlUGIN_TEXTDOMAIN),
		);
		?>
		<div class="tp-hotels-tables-widget">
			<p class="tp-hotels-tables-widget-select">
				<label for="<?php echo $this->get_field_id('select'); ?>"
				       class="tp-hotels-tables-widget-select-label">
					<?php _e('Select the table:', TPOPlUGIN_TEXTDOMAIN);?>
					<select class="tp-hotels-tables-widget-select-shortcode widefat"
					        id="<?php echo $this->get_field_id('select'); ?>"
					        name="<?php echo $this->get_field_name('select'); ?>"
					        data-select_table="<?php echo $select; ?>">
						<option value="select">
							<?php _e('Select the table', TPOPlUGIN_TEXTDOMAIN); ?>
						</option>
						<?php $item = 1; ?>
						<?php foreach ($shortcodeLabels as $key => $shortcodeLabel): ?>
							<option value="<?php echo $key; ?>" <?php selected( $select, $key ); ?>>
								<?php echo $item; ?>. <?php echo  $shortcodeLabel; ?>
							</option>
							<?php $item++; ?>
						<?php endforeach; ?>
					</select>
				</label>
			</p>
		</div>
		<?php
	}
}