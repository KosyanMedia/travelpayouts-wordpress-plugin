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
		$select = isset( $instance['hotel_select'] ) ? esc_attr( $instance['hotel_select'] ) : 'select';
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

		$cityCode = '';
		if(isset($city)){
			preg_match('/\[(.+)\]/', $city, $cityCode);
		}
		$cityAttr = 'city="'.$cityCode[1].'"';
		$cityLabelAttr = 'city_label=""';
		$titleAttr = 'title='.$title.'';
		$subidAttr = 'subid="'.$subid.'"';
		$selectionsTypeAttr = 'type_selections="'.$selectionsType.'"';
		$selectionsTypeLabelAttr = 'type_selections_label=""';
		$checkInAttr = 'check_in="'.$checkIn.'"';
		$checkOutAttr = 'check_out="'.$checkOut.'"';
        $limitAttr = 'number_results="'.$limit.'"';
		$paginateAttr = (isset($paginate))? 'paginate=true':'paginate=false';
		$offTitleAttr = (isset($offTitle))? 'off_title=true':'';
		$linkWithoutDatesAttr = (isset($linkWithoutDates))? 'link_without_dates=true':'link_without_dates=false';
		$shortcode = '';
		switch ($select){
			case 0:
				$shortcode = '[tp_hotels_selections_discount_shortcodes '
				             .$cityAttr.' '
				             .$cityLabelAttr.' '
				             .$titleAttr.' '
				             .$subidAttr.' '
				             .$selectionsTypeAttr.' '
				             .$selectionsTypeLabelAttr.' '
				             .$limitAttr.' '
				             .$paginateAttr.' '
				             .$offTitleAttr.' '
				             .$linkWithoutDatesAttr.']';
			    break;
			case 1:
				$shortcode = '[tp_hotels_selections_date_shortcodes '
				             .$cityAttr.' '
				             .$cityLabelAttr.' '
				             .$titleAttr.' '
				             .$subidAttr.' '
				             .$selectionsTypeAttr.' '
				             .$selectionsTypeLabelAttr.' '
				             .$checkInAttr.' '
				             .$checkOutAttr.' '
				             .$limitAttr.' '
				             .$paginateAttr.' '
				             .$offTitleAttr.' '
				             .$linkWithoutDatesAttr.']';
				break;
        }
		echo do_shortcode($shortcode);
	}

	/**
	 * @param $new_instance
	 * @param $old_instance
	 * @return mixed
	 */
	public function update( $new_instance, $old_instance ) {
		// Save widget options
		//$new_instance['hotel_select'] = (!empty( $new_instance['hotel_select'])) ? $new_instance['hotel_select'] : $old_instance['hotel_select'];
		$new_instance['hotel_title'] = (!empty( $new_instance['hotel_title'])) ? $new_instance['hotel_title'] : $old_instance['hotel_title'];
		$new_instance['hotel_city'] = (!empty( $new_instance['hotel_city'])) ? $new_instance['hotel_city'] : $old_instance['hotel_city'];
		$new_instance['hotel_subid'] = (!empty( $new_instance['hotel_subid'])) ? $new_instance['hotel_subid'] : $old_instance['hotel_subid'];
		$new_instance['hotel_selections_type'] = (!empty( $new_instance['hotel_selections_type'])) ? $new_instance['hotel_selections_type'] : $old_instance['hotel_selections_type'];
		$new_instance['hotel_check_in'] = (!empty( $new_instance['hotel_check_in'])) ? $new_instance['hotel_check_in'] : $old_instance['hotel_check_in'];
		$new_instance['hotel_check_out'] = (!empty( $new_instance['hotel_check_out'])) ? $new_instance['hotel_check_out'] : $old_instance['hotel_check_out'];
		$new_instance['hotel_limit'] = (!empty( $new_instance['hotel_limit'])) ? $new_instance['hotel_limit'] : $old_instance['hotel_limit'];
		$new_instance['hotel_paginate'] = (!empty( $new_instance['hotel_paginate'])) ? $new_instance['hotel_paginate'] : $old_instance['hotel_paginate'];
		$new_instance['hotel_off_title'] = (!empty( $new_instance['hotel_off_title'])) ? $new_instance['hotel_off_title'] : $old_instance['hotel_off_title'];
		$new_instance['hotel_link_without_dates'] = (!empty( $new_instance['hotel_link_without_dates'])) ? $new_instance['hotel_link_without_dates'] : $old_instance['hotel_link_without_dates'];
		return $new_instance;
	}

	/**
	 * @param $instance
	 */
	public function form( $instance ) {
		$select = isset( $instance['hotel_select'] ) ? esc_attr( $instance['hotel_select'] ) : 'select';
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
				<label for="<?php echo $this->get_field_id('hotel_select'); ?>"
				       class="tp-hotels-tables-widget-select-label">
					<?php _e('Select the table:', TPOPlUGIN_TEXTDOMAIN);?>
					<select class="tp-hotels-tables-widget-select-shortcode widefat"
					        id="<?php echo $this->get_field_id('hotel_select'); ?>"
					        name="<?php echo $this->get_field_name('hotel_select'); ?>"
					        data-select_table="<?php echo $select; ?>">
						<option value="select" <?php selected( $select, 'select' ); ?>>
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
            <p class="tp-hotels-tables-widget-title">
                <label for="<?php echo $this->get_field_id('hotel_title'); ?>">
					<?php _e('Alternate title:', TPOPlUGIN_TEXTDOMAIN);?>
                    <input class="widefat" id="<?php echo $this->get_field_id('hotel_title'); ?>"
                           name="<?php echo $this->get_field_name('hotel_title'); ?>" type="text"
                           value="<?php echo $title; ?>" />
                </label>
            </p>
            <p class="tp-hotels-tables-widget-city">
                <label for="<?php echo $this->get_field_id('hotel_city'); ?>">
		            <?php _e('City:', TPOPlUGIN_TEXTDOMAIN);?>
                    <input placeholder="<?php echo $city; ?>" type="text"
                           id="<?php echo $this->get_field_id('hotel_city'); ?>"
                           name="<?php echo $this->get_field_name('hotel_city'); ?>"
                           class="constructorHotelShortcodesAutocomplete HotelWidgetCityAutocomplete
                           widefat"/>
                </label>
            </p>
            <p class="tp-hotels-tables-widget-subid">
                <label for="<?php echo $this->get_field_id('hotel_subid'); ?>">
		            <?php _e('Subid:', TPOPlUGIN_TEXTDOMAIN);?>
                    <input placeholder="<?php echo $subid; ?>" type="text"
                           id="<?php echo $this->get_field_id('hotel_subid'); ?>"
                           name="<?php echo $this->get_field_name('hotel_subid'); ?>"
                           class="widefat"/>
                </label>
            </p>
            <p class="tp-hotels-tables-widget-selections-type">
                <label for="<?php echo $this->get_field_id('hotel_selections_type'); ?>"
                       class="tp-hotels-tables-widget-selections-type-label">
		            <?php _e('Select the table:', TPOPlUGIN_TEXTDOMAIN);?>
                    <select class="tp-hotels-tables-widget-selections-type-select widefat"
                            id="<?php echo $this->get_field_id('hotel_selections_type'); ?>"
                            name="<?php echo $this->get_field_name('hotel_selections_type'); ?>"
                            data-selections_type="<?php echo $selectionsType; ?>">
                        <option selected="selected" value="all">
		                    <?php _e('Hotel type', TPOPlUGIN_TEXTDOMAIN); ?>
                        </option>
                    </select>
                </label>
            </p>
            <p class="tp-hotels-tables-widget-check_in">
                <label for="<?php echo $this->get_field_id('hotel_check_in'); ?>">
	                <?php _e('Check-in date:', TPOPlUGIN_TEXTDOMAIN); ?>
                    <input type="text" id="<?php echo $this->get_field_id('hotel_check_in'); ?>"
                           name="<?php echo $this->get_field_name('hotel_check_in'); ?>"
                           value="<?php echo $checkIn ?>" class="constructorDateShortcodes">
                </label>
            </p>
            <p class="tp-hotels-tables-widget-check_out">
                <label for="<?php echo $this->get_field_id('hotel_check_out'); ?>">
	                <?php _e('Check-out date:', TPOPlUGIN_TEXTDOMAIN); ?>
                    <input type="text" id="<?php echo $this->get_field_id('hotel_check_out'); ?>"
                           name="<?php echo $this->get_field_name('hotel_check_out'); ?>"
                           value="<?php echo $checkOut ?>" class="constructorDateShortcodes">
                </label>
            </p>
            <p class="tp-hotels-tables-widget-limit">
                <label for="<?php echo $this->get_field_id('hotel_limit'); ?>">
	                <?php _e('Number of results:', TPOPlUGIN_TEXTDOMAIN);?>
                    <input value="<?php echo $limit; ?>" type="number"
                           id="<?php echo $this->get_field_id('hotel_limit'); ?>"
                           name="<?php echo $this->get_field_name('hotel_limit'); ?>"
                           class=""/>
                </label>
            </p>
            <p class="tp-hotels-tables-widget-paginate">
                <label for="<?php echo $this->get_field_id('hotel_paginate'); ?>">
                    <input type="checkbox" id="<?php echo $this->get_field_id('hotel_paginate'); ?>"
                           name="<?php echo $this->get_field_name('hotel_paginate'); ?>"
                           value="1" <?php checked($paginate, true)?>>
	                <?php _e('Paginate', TPOPlUGIN_TEXTDOMAIN);?>
                </label>
            </p>
            <p class="tp-hotels-tables-widget-off_title">
                <label for="<?php echo $this->get_field_id('hotel_off_title'); ?>">
                    <input type="checkbox" id="<?php echo $this->get_field_id('hotel_off_title'); ?>"
                           name="<?php echo $this->get_field_name('hotel_off_title'); ?>"
                           value="1" <?php checked($offTitle, true)?>>
	                <?php _e('No title', TPOPlUGIN_TEXTDOMAIN);?>
                </label>
            </p>
            <p class="tp-hotels-tables-widget-link_without_dates">
                <label for="<?php echo $this->get_field_id('hotel_link_without_dates'); ?>">
                    <input type="checkbox" id="<?php echo $this->get_field_id('hotel_link_without_dates'); ?>"
                           name="<?php echo $this->get_field_name('hotel_link_without_dates'); ?>"
                           value="1" <?php checked($linkWithoutDates, true)?>>
	                <?php _e('Land without dates', TPOPlUGIN_TEXTDOMAIN);?>
                </label>
            </p>
		</div>
		<?php
	}
}