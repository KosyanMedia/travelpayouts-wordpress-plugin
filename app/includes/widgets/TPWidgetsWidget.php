<?php

/**
 * Created by PhpStorm.
 * User: solomashenko
 * Date: 01.08.17
 * Time: 19:30
 */
namespace app\includes\widgets;

use app\includes\TPPlugin;
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
		$select = isset( $instance['widgets_select'] ) ? esc_attr( $instance['widgets_select'] ) : 'select';
		$subid = isset( $instance['widgets_subid'] ) ? esc_attr( $instance['widgets_subid'] ) : '';
		$origin = isset( $instance['widgets_origin'] ) ? esc_attr( $instance['widgets_origin'] ) : '';
		$destination = isset( $instance['widgets_destination'] ) ? esc_attr( $instance['widgets_destination'] ) : '';
		$hotelId = isset( $instance['widgets_hotel_id'] ) ? esc_attr( $instance['widgets_hotel_id'] ) : '';
		$sizeWidth = isset( $instance['widgets_size_width'] ) ? esc_attr( $instance['widgets_size_width'] ) : 500;
		$sizeHeight = isset( $instance['widgets_size_height'] ) ? esc_attr( $instance['widgets_size_height'] ) : 500;
		$direct = isset( $instance['widgets_direct'] ) ? $instance['widgets_direct']  : false;
		$oneWay = isset( $instance['widgets_one_way'] ) ? $instance['widgets_one_way']  : false;
		$zoom = isset( $instance['widgets_zoom'] ) ? $instance['widgets_zoom']  : TPPlugin::$options['widgets']['2']['zoom'];
		$calendarPeriod = isset( $instance['widgets_calendar_period'] ) ? $instance['widgets_calendar_period']  : TPPlugin::$options['widgets']['3']['period'];
		$calendarPeriodRangeFrom = isset( $instance['widgets_calendar_period_range_from'] ) ? $instance['widgets_calendar_period_range_from']  : TPPlugin::$options['widgets']['3']['period_day']['from'];
		$calendarPeriodRangeTo = isset( $instance['widgets_calendar_period_range_to'] ) ? $instance['widgets_calendar_period_range_to']  : TPPlugin::$options['widgets']['3']['period_day']['to'];
		$responsive = isset( $instance['widgets_responsive'] ) ? $instance['widgets_responsive']  : true;
		$responsiveWidth = isset( $instance['widgets_responsive_width'] ) ? $instance['widgets_responsive_width']  : 500;
		$popularRoutesCount = isset( $instance['widgets_popular_routes_count'] ) ? $instance['widgets_popular_routes_count']  : TPPlugin::$options['widgets']['6']['count'];
		$popularRoutes = array();
		for($i = 0; $i < $popularRoutesCount; $i++){
			$key = 'widgets_popular_routes_'.$i;
			$popularRoutes[$i] = isset( $instance[$key] ) ? $instance[$key]  : '';
		}
		$widgetType6 = isset( $instance['widgets_widget_type_6'] ) ? $instance['widgets_widget_type_6']  : TPPlugin::$options["widgets"][7]['type'];
		$limit6 = isset( $instance['widgets_widget_limit_6'] ) ? $instance['widgets_widget_limit_6']  : TPPlugin::$options["widgets"][7]['limit'];
		$cat1 = isset( $instance['widgets_widget_cat_1'] ) ? $instance['widgets_widget_cat_1']  : TPPlugin::$options["widgets"][7]['cat1'];
		$cat2 = isset( $instance['widgets_widget_cat_2'] ) ? $instance['widgets_widget_cat_2']  : TPPlugin::$options["widgets"][7]['cat2'];
		$cat3 = isset( $instance['widgets_widget_cat_3'] ) ? $instance['widgets_widget_cat_3']  : TPPlugin::$options["widgets"][7]['cat3'];
		$widgetType7 = isset( $instance['widgets_widget_type_7'] ) ? $instance['widgets_widget_type_7']  : TPPlugin::$options["widgets"][8]['type'];
		$widgetFilter = isset( $instance['widgets_widget_filter'] ) ? $instance['widgets_widget_filter']  : TPPlugin::$options["widgets"][8]['filter'];
		$origin7 = isset( $instance['widgets_origin_7'] ) ? $instance['widgets_origin_7']  : '';
		$destination7 = isset( $instance['widgets_destination_7'] ) ? $instance['widgets_destination_7']  : '';
		$airline7Count = isset( $instance['widgets_airline_7_count'] ) ? $instance['widgets_airline_7_count']  : 1;
		$airline7 = array();
		for($i = 0; $i < $airline7Count; $i++){
			$key = 'widgets_airline_7_item_'.$i;
			$airline7[$i] = isset( $instance[$key] ) ? $instance[$key]  : '';
		}
		$limit7 = isset( $instance['widgets_widget_limit_7'] ) ? $instance['widgets_widget_limit_7']  :  TPPlugin::$options["widgets"][8]['limit'];

		$originCode = '';
		if(isset($origin)){
			preg_match('/\[(.+)\]/', $origin, $originCode);
		}
		$originAttr = 'origin="'.$originCode[1].'"';
		$destinationCode = '';
		if(isset($destination)){
			preg_match('/\[(.+)\]/', $destination, $destinationCode);
		}
		$destinationAttr = 'destination="'.$destinationCode[1].'"';
		$subidAttr = 'subid="'.$subid.'"';
		$sizeWidthAttr = 'width="'.$sizeWidth.'"';
		$sizeHeightAttr = 'height="'.$sizeHeight.'"';
		$directAttr = '';
		if($direct == true){
		    $directAttr = 'direct=true';
        }

		$oneWayAttr = '';
		if($oneWay == true){
			$oneWayAttr = 'one_way=true';
		}

        $zoomAttr = 'zoom="'.$zoom.'"';
		$coordinates = '';
		if(isset($hotelId)){
			preg_match('/\{(.+)\}/', $hotelId, $coordinates);
		}
		$coordinatesAttr = 'coordinates="'.$coordinates[1].'"';

		$hotelIdCode = '';
		if(isset($hotelId)){
			preg_match('/\[(.+)\]/', $hotelId, $hotelIdCode);
		}
		$hotelIdAttr = 'hotel_id="'.$hotelIdCode[1].'"';

		$cityIdCode = '';
		if(isset($hotelId)){
			preg_match('/\[(.+)\]/', $hotelId, $cityIdCode);
		}
		$cityIdAttr = 'id="'.$cityIdCode[1].'"';

		$responsiveAttr = '';
		$responsiveWidthAttr = '';
		if ($responsive == true){
			$responsiveAttr = 'responsive=true';
        } else {
			$responsiveWidthAttr = 'width="'.$responsiveWidth.'"';
        }

		$calendarPeriodAttr = 'period="'.$calendarPeriod.'"';
		$calendarPeriodRangeFromAttr = 'period_day_from="'.$calendarPeriodRangeFrom.'"';
		$calendarPeriodRangeToAttr = 'period_day_to="'.$calendarPeriodRangeTo.'"';

		$cat1Attr = 'cat1="'.$cat1.'"';
		$cat2Attr = 'cat2="'.$cat2.'"';
		$cat3Attr = 'cat3="'.$cat3.'"';
		$widgetType6Attr = 'type="'.$widgetType6.'"';
		$limit6Attr = 'limit="'.$limit6.'"';

		$shortcode = '';

		switch ($select) {
			case 0:
			    //Map Widget
				$shortcode = '[tp_map_widget '
                                .$originAttr.' '
                                .$subidAttr.' '
                                .$sizeWidthAttr.' '
                                .$sizeHeightAttr.' '
                                .$directAttr.' '
                                .']';
				break;
			case 1:
			    //Hotels Map Widget
				$shortcode = '[tp_hotelmap_widget '
				             .$coordinatesAttr.' '
				             .$subidAttr.' '
				             .$sizeWidthAttr.' '
				             .$sizeHeightAttr.' '
				             .$zoomAttr.' '
				             .']';
				break;
			case 2:
			    //Calendar Widget
				$shortcode = '[tp_calendar_widget '
				             .$originAttr.' '
				             .$destinationAttr.' '
				             .$subidAttr.' '
				             .$directAttr.' '
				             .$oneWayAttr.' '
				             .$responsiveAttr.' '
				             .$responsiveWidthAttr.' '
				             .$calendarPeriodAttr.' '
				             .$calendarPeriodRangeFromAttr.' '
				             .$calendarPeriodRangeToAttr.' '
				             .']';
				break;
			case 3:
			    //Subscription Widget
				$shortcode = '[tp_subscriptions_widget '
				             .$originAttr.' '
				             .$destinationAttr.' '
				             .$subidAttr.' '
				             .$responsiveAttr.' '
				             .$responsiveWidthAttr.' '
				             .']';
				break;
			case 4:
			    //Hotel Widget
				$shortcode = '[tp_hotel_widget '
				             .$hotelIdAttr.' '
				             .$subidAttr.' '
				             .$responsiveAttr.' '
				             .$responsiveWidthAttr.' '
				             .']';
				break;
			case 5:
			    //Popular Destinations Widget
				//$popularRoutes;
                if ($popularRoutesCount > 1){
			        $shortcode .= '<div class="TP-PopularRoutesWidgets">';
	                for($i = 0; $i < $popularRoutesCount; $i++){
	                    $destinationPopularRoutesAttr = '';
		                $destinationPopularRoutesCode = '';
		                if(isset($popularRoutes[$i])){
			                preg_match('/\[(.+)\]/', $popularRoutes[$i], $destinationPopularRoutesCode);
		                }
		                $destinationPopularRoutesAttr = 'destination="'.$destinationPopularRoutesCode[1].'"';

		                $shortcode .= '<div class="TP-PopularRoutesWidget">';
		                $shortcode .= '[tp_popular_routes_widget '
		                             .$destinationPopularRoutesAttr.' '
		                             .$subidAttr.' '
		                             .'responsive=true '
		                             .']';
		                $shortcode .= '</div>';
	                }
	                $shortcode .= '</div>';
                } else {
	                $destinationPopularRoutesAttr = '';
	                $destinationPopularRoutesCode = '';
	                if(isset($popularRoutes[0])){
		                preg_match('/\[(.+)\]/', $popularRoutes[0], $destinationPopularRoutesCode);
	                }
	                $destinationPopularRoutesAttr = 'destination="'.$destinationPopularRoutesCode[1].'"';
	                $shortcode = '[tp_popular_routes_widget '
	                             .$destinationPopularRoutesAttr.' '
	                             .$subidAttr.' '
	                             .$responsiveAttr.' '
	                             .$responsiveWidthAttr.' '
	                             .']';
                }

				break;
			case 6:
			    //Hotels Selections Widget
				$shortcode = '[tp_hotel_selections_widget '
                             .$cityIdAttr.' '
				             .$subidAttr.' '
				             .$cat1Attr.' '
				             .$cat2Attr.' '
				             .$cat3Attr.' '
				             .$widgetType6Attr.' '
				             .$limit6Attr.' '
				             .']';
				break;
			case 7:
			    //Best deals widget
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
        if (empty( $new_instance['widgets_subid'] )){
	        $new_instance['widgets_subid'] = $old_instance['widgets_subid'];
        }
		if (empty( $new_instance['widgets_origin'] )){
			$new_instance['widgets_origin'] = $old_instance['widgets_origin'];
		}
		if (empty( $new_instance['widgets_destination'] )){
			$new_instance['widgets_destination'] = $old_instance['widgets_destination'];
		}
		if (empty( $new_instance['widgets_hotel_id'] )){
			$new_instance['widgets_hotel_id'] = $old_instance['widgets_hotel_id'];
		}
		if (empty( $new_instance['widgets_size_width'] )){
			$new_instance['widgets_size_width'] = $old_instance['widgets_size_width'];
		}
		if (empty( $new_instance['widgets_size_height'] )){
			$new_instance['widgets_size_height'] = $old_instance['widgets_size_height'];
		}
		$new_instance['widgets_direct'] = (isset($new_instance['widgets_direct']))? true : false;
		$new_instance['widgets_one_way'] = (isset($new_instance['widgets_one_way']))? true : false;
		if (empty( $new_instance['widgets_zoom'] )){
			$new_instance['widgets_zoom'] = $old_instance['widgets_zoom'];
		}
		if (empty( $new_instance['widgets_calendar_period'] )){
			$new_instance['widgets_calendar_period'] = $old_instance['widgets_calendar_period'];
		}
		if (empty( $new_instance['widgets_calendar_period_range_from'] )){
			$new_instance['widgets_calendar_period_range_from'] = $old_instance['widgets_calendar_period_range_from'];
		}
		if (empty( $new_instance['widgets_calendar_period_range_to'] )){
			$new_instance['widgets_calendar_period_range_to'] = $old_instance['widgets_calendar_period_range_to'];
		}
		$new_instance['widgets_responsive'] = (isset($new_instance['widgets_responsive']))? true : false;
		if (empty( $new_instance['widgets_responsive_width'] )){
			$new_instance['widgets_responsive_width'] = $old_instance['widgets_responsive_width'];
		}
		if (empty( $new_instance['widgets_popular_routes_count'] )){
			$new_instance['widgets_popular_routes_count'] = $old_instance['widgets_popular_routes_count'];
		}
		if (empty( $new_instance['widgets_widget_type_6'] )){
			$new_instance['widgets_widget_type_6'] = $old_instance['widgets_widget_type_6'];
		}
		if (empty( $new_instance['widgets_widget_limit_6'] )){
			$new_instance['widgets_widget_limit_6'] = $old_instance['widgets_widget_limit_6'];
		}
		if (empty( $new_instance['widgets_widget_cat_1'] )){
			$new_instance['widgets_widget_cat_1'] = $old_instance['widgets_widget_cat_1'];
		}
		if (empty( $new_instance['widgets_widget_cat_2'] )){
			$new_instance['widgets_widget_cat_2'] = $old_instance['widgets_widget_cat_2'];
		}
		if (empty( $new_instance['widgets_widget_cat_3'] )){
			$new_instance['widgets_widget_cat_3'] = $old_instance['widgets_widget_cat_3'];
		}
		if (empty( $new_instance['widgets_widget_type_7'] )){
			$new_instance['widgets_widget_type_7'] = $old_instance['widgets_widget_type_7'];
		}
		if (empty( $new_instance['widgets_widget_filter'] )){
			$new_instance['widgets_widget_filter'] = $old_instance['widgets_widget_filter'];
		}
		if (empty( $new_instance['widgets_origin_7'] )){
			$new_instance['widgets_origin_7'] = $old_instance['widgets_origin_7'];
		}
		if (empty( $new_instance['widgets_destination_7'] )){
			$new_instance['widgets_destination_7'] = $old_instance['widgets_destination_7'];
		}
		if (empty( $new_instance['widgets_airline_7_count'] )){
			$new_instance['widgets_airline_7_count'] = $old_instance['widgets_airline_7_count'];
		}
		if (empty( $new_instance['widgets_widget_limit_7'] )){
			$new_instance['widgets_widget_limit_7'] = $old_instance['widgets_widget_limit_7'];
		}
		//error_log(print_r($new_instance, true));
        return $new_instance;
	}

	/**
	 * @param $instance
	 */
	public function form( $instance ) {
		$select = isset( $instance['widgets_select'] ) ? esc_attr( $instance['widgets_select'] ) : 'select';
		$subid = isset( $instance['widgets_subid'] ) ? esc_attr( $instance['widgets_subid'] ) : '';
		$origin = isset( $instance['widgets_origin'] ) ? esc_attr( $instance['widgets_origin'] ) : '';
		$destination = isset( $instance['widgets_destination'] ) ? esc_attr( $instance['widgets_destination'] ) : '';
		$hotelId = isset( $instance['widgets_hotel_id'] ) ? esc_attr( $instance['widgets_hotel_id'] ) : '';
		$sizeWidth = isset( $instance['widgets_size_width'] ) ? esc_attr( $instance['widgets_size_width'] ) : 500;
		$sizeHeight = isset( $instance['widgets_size_height'] ) ? esc_attr( $instance['widgets_size_height'] ) : 500;
		$direct = isset( $instance['widgets_direct'] ) ? $instance['widgets_direct']  : false;
		$oneWay = isset( $instance['widgets_one_way'] ) ? $instance['widgets_one_way']  : false;
		$zoom = isset( $instance['widgets_zoom'] ) ? $instance['widgets_zoom']  : TPPlugin::$options['widgets']['2']['zoom'];
		$calendarPeriod = isset( $instance['widgets_calendar_period'] ) ? $instance['widgets_calendar_period']  : TPPlugin::$options['widgets']['3']['period'];
		$calendarPeriodRangeFrom = isset( $instance['widgets_calendar_period_range_from'] ) ? $instance['widgets_calendar_period_range_from']  : TPPlugin::$options['widgets']['3']['period_day']['from'];
		$calendarPeriodRangeTo = isset( $instance['widgets_calendar_period_range_to'] ) ? $instance['widgets_calendar_period_range_to']  : TPPlugin::$options['widgets']['3']['period_day']['to'];
		$responsive = isset( $instance['widgets_responsive'] ) ? $instance['widgets_responsive']  : true;
		$responsiveWidth = isset( $instance['widgets_responsive_width'] ) ? $instance['widgets_responsive_width']  : 500;
		$popularRoutesCount = isset( $instance['widgets_popular_routes_count'] ) ? $instance['widgets_popular_routes_count']  : TPPlugin::$options['widgets']['6']['count'];
		$popularRoutes = array();
		for($i = 0; $i < $popularRoutesCount; $i++){
		    $key = 'widgets_popular_routes_'.$i;
			$popularRoutes[$i] = isset( $instance[$key] ) ? $instance[$key]  : '';
        }
		$widgetType6 = isset( $instance['widgets_widget_type_6'] ) ? $instance['widgets_widget_type_6']  : TPPlugin::$options["widgets"][7]['type'];
		$limit6 = isset( $instance['widgets_widget_limit_6'] ) ? $instance['widgets_widget_limit_6']  : TPPlugin::$options["widgets"][7]['limit'];
		$cat1 = isset( $instance['widgets_widget_cat_1'] ) ? $instance['widgets_widget_cat_1']  : TPPlugin::$options["widgets"][7]['cat1'];
		$cat2 = isset( $instance['widgets_widget_cat_2'] ) ? $instance['widgets_widget_cat_2']  : TPPlugin::$options["widgets"][7]['cat2'];
		$cat3 = isset( $instance['widgets_widget_cat_3'] ) ? $instance['widgets_widget_cat_3']  : TPPlugin::$options["widgets"][7]['cat3'];
		$widgetType7 = isset( $instance['widgets_widget_type_7'] ) ? $instance['widgets_widget_type_7']  : TPPlugin::$options["widgets"][8]['type'];
		$widgetFilter = isset( $instance['widgets_widget_filter'] ) ? $instance['widgets_widget_filter']  : TPPlugin::$options["widgets"][8]['filter'];
		$origin7 = isset( $instance['widgets_origin_7'] ) ? $instance['widgets_origin_7']  : '';
		$destination7 = isset( $instance['widgets_destination_7'] ) ? $instance['widgets_destination_7']  : '';
		$airline7Count = isset( $instance['widgets_airline_7_count'] ) ? $instance['widgets_airline_7_count']  : 1;
		$airline7 = array();
		for($i = 0; $i < $airline7Count; $i++){
			$key = 'widgets_airline_7_item_'.$i;
			$airline7[$i] = isset( $instance[$key] ) ? $instance[$key]  : '';
		}
		$limit7 = isset( $instance['widgets_widget_limit_7'] ) ? $instance['widgets_widget_limit_7']  :  TPPlugin::$options["widgets"][8]['limit'];
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

		$fieldSizeWidth1 = TPPlugin::$options['widgets']['1']['width'];
		$fieldSizeHeight1 = TPPlugin::$options['widgets']['1']['height'];
		$fieldSizeWidth2 = TPPlugin::$options['widgets']['2']['width'];
		$fieldSizeHeight2 = TPPlugin::$options['widgets']['2']['height'];
		$fieldDirect1 = (isset(TPPlugin::$options['widgets']['1']['direct']))? 1 : 0;
		$fieldDirect3 = (isset(TPPlugin::$options['widgets']['3']['direct']))? 1 : 0;
		$fieldOneWay3 = (isset(TPPlugin::$options['widgets']['3']['one_way']))? 1 : 0;
		$fieldWidth3 = TPPlugin::$options['widgets']['3']['width'];
		$fieldResponsive3 = (isset(TPPlugin::$options['widgets']['3']['responsive']))? 1 : 0;
		$fieldWidth4 = TPPlugin::$options['widgets']['4']['width'];
		$fieldResponsive4 = (isset(TPPlugin::$options['widgets']['4']['responsive']))? 1 : 0;
		$fieldWidth5 = TPPlugin::$options['widgets']['5']['width'];
		$fieldResponsive5 = (isset(TPPlugin::$options['widgets']['5']['responsive']))? 1 : 0;
		$fieldWidth6 = TPPlugin::$options['widgets']['6']['width'];
		$fieldResponsive6 = (isset(TPPlugin::$options['widgets']['6']['responsive']))? 1 : 0;
		$fieldWidth7 = TPPlugin::$options['widgets']['7']['width'];
		$fieldResponsive7 = (isset(TPPlugin::$options['widgets']['7']['responsive']))? 1 : 0;
		$fieldLimit7 = TPPlugin::$options['widgets']['7']['limit'];
		$fieldType7 = TPPlugin::$options['widgets']['7']['type'];
		$fieldWidth8 = TPPlugin::$options['widgets']['8']['width'];
		$fieldResponsive8 = (isset(TPPlugin::$options['widgets']['8']['responsive']))? 1 : 0;
		$fieldType8 = TPPlugin::$options['widgets']['8']['type'];
		$fieldFilter8 = TPPlugin::$options['widgets']['8']['filter'];
		$fieldLimit8 = TPPlugin::$options['widgets']['8']['limit'];

		?>
		<div class="tp-widgets-widget"
             data-field_size_width_1="<?php echo $fieldSizeWidth1; ?>"
             data-field_size_height_1="<?php echo $fieldSizeHeight1; ?>"
             data-field_size_width_2="<?php echo $fieldSizeWidth2; ?>"
             data-field_size_height_2="<?php echo $fieldSizeHeight2; ?>"
             data-field_direct_1="<?php echo $fieldDirect1; ?>"
             data-field_direct_3="<?php echo $fieldDirect3; ?>"
             data-field_one_way_3="<?php echo $fieldOneWay3; ?>"
             data-field_width_3="<?php echo $fieldWidth3; ?>"
             data-field_responsive_3="<?php echo $fieldResponsive3; ?>"
             data-field_width_4="<?php echo $fieldWidth4; ?>"
             data-field_responsive_4="<?php echo $fieldResponsive4; ?>"
             data-field_width_5="<?php echo $fieldWidth5; ?>"
             data-field_responsive_5="<?php echo $fieldResponsive5; ?>"
             data-field_width_6="<?php echo $fieldWidth6; ?>"
             data-field_responsive_6="<?php echo $fieldResponsive6; ?>"
             data-field_width_7="<?php echo $fieldWidth7; ?>"
             data-field_responsive_7="<?php echo $fieldResponsive7; ?>"
             data-field_limit_7="<?php echo $fieldLimit7; ?>"
             data-field_type_7="<?php echo $fieldType7; ?>"
             data-field_width_8="<?php echo $fieldWidth8; ?>"
             data-field_responsive_8="<?php echo $fieldResponsive8; ?>"
             data-field_type_8="<?php echo $fieldType8; ?>"
             data-field_filter_8="<?php echo $fieldFilter8; ?>"
             data-field_limit_8="<?php echo $fieldLimit8; ?>"
            >
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
			<p class="tp-widgets-widget-destination">
				<label for="<?php echo $this->get_field_id('widgets_destination'); ?>">
					<?php _e('Destination:', TPOPlUGIN_TEXTDOMAIN);?>
					<input placeholder="<?php echo $destination; ?>" type="text"
					       id="<?php echo $this->get_field_id('widgets_destination'); ?>"
					       name="<?php echo $this->get_field_name('widgets_destination'); ?>"
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
			<p class="tp-widgets-widget-calendar-period">
				<label for="<?php echo $this->get_field_id('widgets_calendar_period'); ?>">
					<?php _e('Period:', TPOPlUGIN_TEXTDOMAIN);?>
					<select class="tp-widgets-widget-calendar-period-select widefat"
					        id="<?php echo $this->get_field_id('widgets_calendar_period'); ?>"
					        name="<?php echo $this->get_field_name('widgets_calendar_period'); ?>"
					        data-select_period="<?php echo $calendarPeriod; ?>">
						<?php echo $this->getFieldCalendarPeriod($calendarPeriod) ?>
					</select>
				</label>
			</p>
			<p class="tp-widgets-widget-calendar-period-range">
				<label for="<?php echo $this->get_field_id('widgets_calendar_period_range_from'); ?>">
					<?php _e('Range, days:', TPOPlUGIN_TEXTDOMAIN) ?>
					<input placeholder="<?php echo $calendarPeriodRangeFrom; ?>" type="number"
					       id="<?php echo $this->get_field_id('widgets_calendar_period_range_from'); ?>"
					       name="<?php echo $this->get_field_name('widgets_calendar_period_range_from'); ?>"
					       class="small-text" min="1"/>
				</label>
				<label for="<?php echo $this->get_field_id('widgets_calendar_period_range_to'); ?>">
					X
					<input placeholder="<?php echo $calendarPeriodRangeTo; ?>" type="number"
					       id="<?php echo $this->get_field_id('widgets_calendar_period_range_to'); ?>"
					       name="<?php echo $this->get_field_name('widgets_calendar_period_range_to'); ?>"
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
			<p class="tp-widgets-widget-one-way">
				<label for="<?php echo $this->get_field_id('widgets_one_way'); ?>">
					<input type="checkbox" id="<?php echo $this->get_field_id('widgets_one_way'); ?>"
					       name="<?php echo $this->get_field_name('widgets_one_way'); ?>"
					       value="1" <?php checked($oneWay, true)?>>
					<?php _e('One way', TPOPlUGIN_TEXTDOMAIN);?>
				</label>
			</p>

            <p class="tp-widgets-widget-popular-routes-count">
                <label for="<?php echo $this->get_field_id('widgets_popular_routes_count'); ?>"
                       class="tp-widgets-widget-popular-routes-count-label">
					<?php _e('Count:', TPOPlUGIN_TEXTDOMAIN);?>
                    <input value="<?php echo $popularRoutesCount; ?>" type="number" min="1"
                           id="<?php echo $this->get_field_id('widgets_popular_routes_count'); ?>"
                           name="<?php echo $this->get_field_name('widgets_popular_routes_count'); ?>"
                           class="small-text tp-widgets-widget-popular-routes-count-input"/>
                </label>
            </p>
            <p class="tp-widgets-widget-popular-routes"
               data-field_name="<?php echo $this->get_field_name('widgets_popular_routes_'); ?>"
               data-field_id="<?php echo $this->get_field_id('widgets_popular_routes_'); ?>"
               data-field_class="constructorCityShortcodesAutocomplete widefat"
               data-field_label="<?php _e('Destination:', TPOPlUGIN_TEXTDOMAIN);?>">
				<?php for($i = 0; $i < $popularRoutesCount; $i++): ?>
                    <label for="<?php echo $this->get_field_id('widgets_popular_routes_'.$i); ?>"
                           class="tp-widgets-widget-popular-routes-label-<?php echo $i; ?>">
						<?php _e('Destination:', TPOPlUGIN_TEXTDOMAIN);?>
                        <input placeholder="<?php echo $popularRoutes[$i]; ?>" type="text"
                               id="<?php echo $this->get_field_id('widgets_popular_routes_'.$i); ?>"
                               name="<?php echo $this->get_field_name('widgets_popular_routes_'.$i); ?>"
                               class="constructorCityShortcodesAutocomplete widefat"/>

                    </label>
				<?php endfor; ?>
            </p>

            <p class="tp-widgets-widget-type-6">
                <label for="<?php echo $this->get_field_id('widgets_widget_type_6'); ?>">
					<?php _e('View widget', TPOPlUGIN_TEXTDOMAIN);?>
                    <select class="widefat"
                            id="<?php echo $this->get_field_id('widgets_widget_type_6'); ?>"
                            name="<?php echo $this->get_field_name('widgets_widget_type_6'); ?>"
                            data-select_type="<?php echo $widgetType6; ?>">
                        <option <?php selected( $widgetType6, 'full' ); ?>
                                value="full"><?php _e('Full', TPOPlUGIN_TEXTDOMAIN) ?></option>
                        <option <?php selected( $widgetType6, 'compact' ); ?>
                                value="compact"><?php _e('Compact', TPOPlUGIN_TEXTDOMAIN) ?></option>
                    </select>
                </label>
            </p>
            <p class="tp-widgets-widget-limit-6">
                <label for="<?php echo $this->get_field_id('widgets_widget_limit_6'); ?>">
		            <?php _e('Limit', TPOPlUGIN_TEXTDOMAIN);?>
                    <select id="<?php echo $this->get_field_id('widgets_widget_limit_6'); ?>"
                            name="<?php echo $this->get_field_name('widgets_widget_limit_6'); ?>"
                            data-select_type="<?php echo $limit6; ?>">
	                    <?php for($i = 1; $i < 11; $i++): ?>
                            <option <?php selected( $limit6, $i ); ?>
                                    value="<?php echo $i; ?>"><?php echo $i; ?></option>
	                    <?php endfor; ?>
                    </select>
                </label>
            </p>

            <p class="tp-widgets-widget-cat">
                <label for="<?php echo $this->get_field_id('widgets_widget_cat_1'); ?>"
                       class="tp-widgets-widget-cat-1">
                    <select id="<?php echo $this->get_field_id('widgets_widget_cat_1'); ?>"
                            name="<?php echo $this->get_field_name('widgets_widget_cat_1'); ?>"
                            data-select_cat="<?php echo $cat1; ?>" class="widefat">
                    </select>
                </label>
                <label for="<?php echo $this->get_field_id('widgets_widget_cat_2'); ?>"
                       class="tp-widgets-widget-cat-2">
                    <select id="<?php echo $this->get_field_id('widgets_widget_cat_2'); ?>"
                            name="<?php echo $this->get_field_name('widgets_widget_cat_2'); ?>"
                            data-select_cat="<?php echo $cat2; ?>" class="widefat">
                    </select>
                </label>
                <label for="<?php echo $this->get_field_id('widgets_widget_cat_3'); ?>"
                       class="tp-widgets-widget-cat-3">
                    <select id="<?php echo $this->get_field_id('widgets_widget_cat_3'); ?>"
                            name="<?php echo $this->get_field_name('widgets_widget_cat_3'); ?>"
                            data-select_cat="<?php echo $cat3; ?>" class="widefat">
                    </select>
                </label>
            </p>

            <p class="tp-widgets-widget-type-7">
                <label for="<?php echo $this->get_field_id('widgets_widget_type_7'); ?>">
					<?php _e('Widget type', TPOPlUGIN_TEXTDOMAIN);?>
                    <select class="widefat"
                            id="<?php echo $this->get_field_id('widgets_widget_type_7'); ?>"
                            name="<?php echo $this->get_field_name('widgets_widget_type_7'); ?>"
                            data-select_type="<?php echo $widgetType7; ?>">
                        <option <?php selected( $widgetType7, 'brickwork' ); ?>
                                value="brickwork"><?php _e('Tile', TPOPlUGIN_TEXTDOMAIN) ?></option>
                        <option <?php selected( $widgetType7, 'slider' ); ?>
                                value="slider"><?php _e('Slider', TPOPlUGIN_TEXTDOMAIN) ?></option>
                    </select>
                </label>
            </p>
            <p class="tp-widgets-widget-filter">
                <label for="<?php echo $this->get_field_id('widgets_widget_filter_0'); ?>">
                    <input type="radio" name="<?php echo $this->get_field_name('widgets_widget_filter'); ?>"
                           value="0" <?php checked($widgetFilter, 0) ?>
                           id="<?php echo $this->get_field_id('widgets_widget_filter_0'); ?>">
	                <?php _e('Filter by airlines', TPOPlUGIN_TEXTDOMAIN); ?>
                </label>
                <label for="<?php echo $this->get_field_id('widgets_widget_filter_1'); ?>">
                    <input type="radio" name="<?php echo $this->get_field_name('widgets_widget_filter'); ?>"
                           value="1" <?php checked($widgetFilter, 1) ?>
                           id="<?php echo $this->get_field_id('widgets_widget_filter_1'); ?>">
		            <?php _e('Filter by routes', TPOPlUGIN_TEXTDOMAIN); ?>
                </label>
            </p>
            <p class="tp-widgets-widget-origin-7">
                <label for="<?php echo $this->get_field_id('widgets_origin_7'); ?>">
		            <?php _e('Origin:', TPOPlUGIN_TEXTDOMAIN);?>
                    <input placeholder="<?php echo $origin7; ?>" type="text"
                           id="<?php echo $this->get_field_id('widgets_origin_7'); ?>"
                           name="<?php echo $this->get_field_name('widgets_origin_7'); ?>"
                           class="constructorCityShortcodesAutocomplete widefat"/>
                </label>
            </p>
            <p class="tp-widgets-widget-destination-7">
                <label for="<?php echo $this->get_field_id('widgets_destination_7'); ?>">
					<?php _e('Destination:', TPOPlUGIN_TEXTDOMAIN);?>
                    <input placeholder="<?php echo $destination7; ?>" type="text"
                           id="<?php echo $this->get_field_id('widgets_destination_7'); ?>"
                           name="<?php echo $this->get_field_name('widgets_destination_7'); ?>"
                           class="constructorCityShortcodesAutocomplete widefat"/>
                </label>
            </p>
            <p class="tp-widgets-widget-airline-7"
               data-field_name="<?php echo $this->get_field_name('widgets_airline_7_item_'); ?>"
               data-field_id="<?php echo $this->get_field_id('widgets_airline_7_item_'); ?>"
               data-field_class="constructorAirlineWidgetsAutocomplete widefat"
               data-field_label="<?php _e('Airline:', TPOPlUGIN_TEXTDOMAIN);?>">

	            <?php for($i = 0; $i < $airline7Count; $i++): ?>
                    <label for="<?php echo $this->get_field_id('widgets_airline_7_item_'.$i); ?>"
                           class="tp-widgets-widget-airline-7-label-<?php echo $i; ?> tp-widgets-widget-airline-7-label">
			            <?php _e('Airline:', TPOPlUGIN_TEXTDOMAIN);?>
                        <input placeholder="<?php echo $airline7[$i]; ?>" type="text"
                               id="<?php echo $this->get_field_id('widgets_airline_7_item_'.$i); ?>"
                               name="<?php echo $this->get_field_name('widgets_airline_7_item_'.$i); ?>"
                               class="constructorAirlineWidgetsAutocomplete widefat"/>
                        <?php if ($i > 0): ?>
                            <a href="#" class="TPBtnDelete">
                                <i></i>
                                <?php _e('Delete', TPOPlUGIN_TEXTDOMAIN); ?>
                            </a>
                        <?php endif;?>

                    </label>
	            <?php endfor; ?>

                <a href="#" class="TPBtnAdd">
                    <i></i>
		            <?php _e('Add', TPOPlUGIN_TEXTDOMAIN); ?>
                </a>
                <input type="hidden" class="tp-widgets-widget-airline-7-count"
                       value="<?php echo $airline7Count; ?>"
                       name="<?php echo $this->get_field_name('widgets_airline_7_count'); ?>">
            </p>

            <p class="tp-widgets-widget-limit-7">
                <label for="<?php echo $this->get_field_id('widgets_widget_limit_7'); ?>">
					<?php _e('Limit', TPOPlUGIN_TEXTDOMAIN);?>
                    <select id="<?php echo $this->get_field_id('widgets_widget_limit_7'); ?>"
                            name="<?php echo $this->get_field_name('widgets_widget_limit_7'); ?>"
                            data-select_type="<?php echo $limit7; ?>">
						<?php for($i = 1; $i < 22; $i++): ?>
                            <option <?php selected( $limit7, $i ); ?>
                                    value="<?php echo $i; ?>"><?php echo $i; ?></option>
						<?php endfor; ?>
                    </select>
                </label>
            </p>

			<p class="tp-widgets-widget-responsive">
				<label for="<?php echo $this->get_field_id('widgets_responsive'); ?>"
				       class="tp-widgets-widget-responsive-label">
					<input type="checkbox" id="<?php echo $this->get_field_id('widgets_responsive'); ?>"
					       name="<?php echo $this->get_field_name('widgets_responsive'); ?>"
					       value="1" <?php checked($responsive, true)?>
					       class="tp-widgets-widget-responsive-label-input">
					<?php _e('Responsive', TPOPlUGIN_TEXTDOMAIN);?>
				</label>
				<label for="<?php echo $this->get_field_id('widgets_responsive_width'); ?>"
					class="tp-widgets-widget-responsive-label-width">
					<input type="width" id="<?php echo $this->get_field_id('widgets_responsive_width'); ?>"
					       name="<?php echo $this->get_field_name('widgets_responsive_width'); ?>"
					       placeholder="<?php echo $responsiveWidth; ?>" min="1" class="small-text">
					<?php _e('Width', TPOPlUGIN_TEXTDOMAIN);?>
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

	public function getFieldCalendarPeriod($calendarPeriod){
		global $wp_locale;
		$output_month = '';
		$monthNames = array_map(array(&$wp_locale, 'get_month'), range(1, 12));
		$output_month .= '<option value="year" '
		                 .selected( $calendarPeriod, 'year' , false).'>'
		                 .__('Year', TPOPlUGIN_TEXTDOMAIN ).'</option>';
		$output_month .= '<option value="current_month" '
		                 .selected( $calendarPeriod, 'current_month' , false).'>'
		                 .__('Current month', TPOPlUGIN_TEXTDOMAIN ).'</option>';
		$current_date = getdate();
		$m = false;
		$out_c = '';
		$out_n = '';
		foreach ($monthNames as $key=>$month) {

			if(($key+1) == $current_date['mon']){
				$m = true;
			}
			if($m){
				$out_c .= '<option value="'.date('Y').'-'.str_pad(($key+1),  2, '0', STR_PAD_LEFT).'-01'.'"'
				          .selected( $calendarPeriod, date('Y').'-'.($key+1).'-01', false).'>'
				          .$month.'</option>';
			}else{

				$out_n .= '<option value="'.date('Y', strtotime('+1 year')).'-'.str_pad(($key+1),  2, '0', STR_PAD_LEFT).'-01'.'"'
				          .selected( $calendarPeriod, date('Y', strtotime('+1 year')).'-'.($key+1).'-01', false).'>'
				          .$month.'</option>';
			}
		}
		$output_month .= $out_c.$out_n;
		return $output_month;
	}
}