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
		$select = isset( $instance['widgets_select'] ) ? esc_attr( $instance['widgets_select'] ) : 'select';
		$subid = isset( $instance['widgets_subid'] ) ? esc_attr( $instance['widgets_subid'] ) : '';
		$origin = isset( $instance['widgets_origin'] ) ? esc_attr( $instance['widgets_origin'] ) : '';
		$hotelId = isset( $instance['widgets_hotel_id'] ) ? esc_attr( $instance['widgets_hotel_id'] ) : '';
		$sizeWidth = isset( $instance['widgets_size_width'] ) ? esc_attr( $instance['widgets_size_width'] ) : 500;
		$sizeHeight = isset( $instance['widgets_size_height'] ) ? esc_attr( $instance['widgets_size_height'] ) : 500;
		$direct = isset( $instance['widgets_direct'] ) ? $instance['widgets_direct']  : false;
		$zoom = isset( $instance['widgets_zoom'] ) ? $instance['widgets_zoom']  : 12;

		$shortcodeLabels = array(
			__('Map Widget', TPOPlUGIN_TEXTDOMAIN),
			__('Hotels Map Widget', TPOPlUGIN_TEXTDOMAIN),
			__('Calendar Widget', TPOPlUGIN_TEXTDOMAIN),
			__('Subscription Widget', TPOPlUGIN_TEXTDOMAIN),
			__('Hotel Widget', TPOPlUGIN_TEXTDOMAIN),
			__('Popular Destinations Widget', TPOPlUGIN_TEXTDOMAIN),
			__('Hotels Selections Widget', TPOPlUGIN_TEXTDOMAIN),
			__('Best deals widget', TPOPlUGIN_TEXTDOMAIN),
		);

		?>
		<div class="tp-widgets-widget">
			<p class="tp-widgets-widget-select">
				<label for="<?php echo $this->get_field_id('widgets_select'); ?>"
				       class="tp-widgets-widget-select-label">
					<?php _e('Select widget:', TPOPlUGIN_TEXTDOMAIN);?>
					<select class="tp-widgets-widget-select-shortcode widefat"
					        id="<?php echo $this->get_field_id('widgets_select'); ?>"
					        name="<?php echo $this->get_field_name('widgets_select'); ?>"
					        data-select_table="<?php echo $select; ?>">
						<option value="select" <?php selected( $select, 'select' ); ?>>
							<?php _e('Select widget', TPOPlUGIN_TEXTDOMAIN); ?>
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
			<p class="tp-widgets-widget-subid">
				<label for="<?php echo $this->get_field_id('widgets_subid'); ?>">
					<?php _e('Subid:', TPOPlUGIN_TEXTDOMAIN);?>
					<input placeholder="<?php echo $subid; ?>" type="text"
					       id="<?php echo $this->get_field_id('widgets_subid'); ?>"
					       name="<?php echo $this->get_field_name('widgets_subid'); ?>"
					       class="widefat"/>
				</label>
			</p>
			<p class="tp-widgets-widget-origin">
				<label for="<?php echo $this->get_field_id('widgets_origin'); ?>">
					<?php _e('Origin:', TPOPlUGIN_TEXTDOMAIN);?>
					<input placeholder="<?php echo $origin; ?>" type="text"
					       id="<?php echo $this->get_field_id('widgets_origin'); ?>"
					       name="<?php echo $this->get_field_name('widgets_origin'); ?>"
					       class="constructorCityShortcodesAutocomplete widefat"/>
				</label>
			</p>
			<p class="tp-widgets-widget-hotel-id">
				<label for="<?php echo $this->get_field_id('widgets_hotel_id'); ?>">
					<?php _e('Hotel:', TPOPlUGIN_TEXTDOMAIN);?>
					<input placeholder="<?php echo $hotelId; ?>" type="text"
					       id="<?php echo $this->get_field_id('widgets_hotel_id'); ?>"
					       name="<?php echo $this->get_field_name('widgets_hotel_id'); ?>"
					       class="constructorWidgetHotelShortcodesAutocomplete widefat"/>
				</label>
			</p>
			<p class="tp-widgets-widget-size">
				<label for="<?php echo $this->get_field_id('widgets_size_width'); ?>">
					<?php _e('Size:', TPOPlUGIN_TEXTDOMAIN) ?>
					<input placeholder="<?php echo $sizeWidth; ?>" type="number"
					       id="<?php echo $this->get_field_id('widgets_size_width'); ?>"
					       name="<?php echo $this->get_field_name('widgets_size_width'); ?>"
					       class="small-text" min="1"/>
				</label>
				<label for="<?php echo $this->get_field_id('widgets_size_height'); ?>">
					X
					<input placeholder="<?php echo $sizeHeight; ?>" type="number"
					       id="<?php echo $this->get_field_id('widgets_size_height'); ?>"
					       name="<?php echo $this->get_field_name('widgets_size_height'); ?>"
					       class="small-text" min="1"/>
				</label>
			</p>
			<p class="tp-widgets-widget-direct">
				<label for="<?php echo $this->get_field_id('widgets_direct'); ?>">
					<input type="checkbox" id="<?php echo $this->get_field_id('widgets_direct'); ?>"
					       name="<?php echo $this->get_field_name('widgets_direct'); ?>"
					       value="1" <?php checked($direct, true)?>>
					<?php _e('Direct Flights Only', TPOPlUGIN_TEXTDOMAIN);?>
				</label>
			</p>

			<p class="tp-widgets-widget-zoom">
				<label for="<?php echo $this->get_field_id('widgets_zoom'); ?>">
					<?php _e('Zoom:', TPOPlUGIN_TEXTDOMAIN);?>
					<select class="tp-widgets-widget-zoom-select widefat"
					        id="<?php echo $this->get_field_id('widgets_zoom'); ?>"
					        name="<?php echo $this->get_field_name('widgets_zoom'); ?>"
					        data-select_zoom="<?php echo $zoom; ?>">
						<?php for($z = 1; $z < 20; $z++):?>
							<option <?php selected( $zoom, $z ); ?>
								value="<?php echo $z; ?>"><?php echo $z; ?></option>
						<?php endfor; ?>
					</select>
				</label>
			</p>
		</div>
		<?php
	}
}