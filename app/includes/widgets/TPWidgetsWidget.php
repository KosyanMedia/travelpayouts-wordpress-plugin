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
			_x('Travelpayouts – Widgets',
                'Travelpayouts – Widgets Widget',
                TPOPlUGIN_TEXTDOMAIN), // Name
			array(
				'description' => _x('Travelpayouts – Widgets',
                    'Travelpayouts – Widgets Widget',
                    TPOPlUGIN_TEXTDOMAIN)
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
		if (array_key_exists('widgets_direct', $instance)){
			$direct = true;
		} else {
			$direct = false;
		}
		if (array_key_exists('widgets_one_way', $instance)){
			$oneWay = true;
		} else {
			$oneWay = false;
		}
		if (array_key_exists('widgets_responsive', $instance)){
			$responsive = true;
		} else {
			$responsive = false;
		}
		$zoom = isset( $instance['widgets_zoom'] ) ? $instance['widgets_zoom']  : TPPlugin::$options['widgets']['2']['zoom'];
		$calendarPeriod = isset( $instance['widgets_calendar_period'] ) ? $instance['widgets_calendar_period']  : TPPlugin::$options['widgets']['3']['period'];
		$calendarPeriodRangeFrom = isset( $instance['widgets_calendar_period_range_from'] ) ? $instance['widgets_calendar_period_range_from']  : TPPlugin::$options['widgets']['3']['period_day']['from'];
		$calendarPeriodRangeTo = isset( $instance['widgets_calendar_period_range_to'] ) ? $instance['widgets_calendar_period_range_to']  : TPPlugin::$options['widgets']['3']['period_day']['to'];
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
		$originCode = $this->getCode($origin);
		$originAttr = 'origin="'.$originCode.'"';
		$destinationCode = $this->getCode($destination);
		$destinationAttr = 'destination="'.$destinationCode.'"';
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
		$coordinates = $this->getHotelData($hotelId);
		$coordinatesAttr = 'coordinates="'.$coordinates.'"';
		$hotelIdCode = $this->getCode($hotelId);
		$hotelIdAttr = 'hotel_id="'.$hotelIdCode.'"';
		$cityIdCode = $this->getCode($hotelId);
		$cityIdAttr = 'id="'.$cityIdCode.'"';
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
		$limit7Attr = 'limit="'.$limit7.'"';
		$widgetType7Attr = 'type="'.$widgetType7.'"';
		$widgetFilterAttr = 'filter="'.$widgetFilter.'"';
		$shortcode = '';
        if ($select == 0){
	        //Map Widget
	        if (empty($originCode)){
		        return;
	        }
	        $shortcode = '[tp_map_widget '
	                     .$originAttr.' '
	                     .$subidAttr.' '
	                     .$sizeWidthAttr.' '
	                     .$sizeHeightAttr.' '
	                     .$directAttr.' '
	                     .']';
        } elseif ($select == 1) {
	        //Hotels Map Widget
	        if (empty($coordinates)){
		        return;
	        }
	        $shortcode = '[tp_hotelmap_widget '
	                     .$coordinatesAttr.' '
	                     .$subidAttr.' '
	                     .$sizeWidthAttr.' '
	                     .$sizeHeightAttr.' '
	                     .$zoomAttr.' '
	                     .']';
        } elseif ($select == 2){
	        //Calendar Widget
	        if (empty($originCode) || empty($destinationCode)){
		        return;
	        }
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
        } elseif ($select == 3){
	        //Subscription Widget
	        if (empty($originCode) || empty($destinationCode)){
		        return;
	        }
	        $shortcode = '[tp_subscriptions_widget '
	                     .$originAttr.' '
	                     .$destinationAttr.' '
	                     .$subidAttr.' '
	                     .$responsiveAttr.' '
	                     .$responsiveWidthAttr.' '
	                     .']';
        } elseif ($select == 4){
	        //Hotel Widget
	        if (empty($hotelIdCode)){
		        return;
	        }
	        $shortcode = '[tp_hotel_widget '
	                     .$hotelIdAttr.' '
	                     .$subidAttr.' '
	                     .$responsiveAttr.' '
	                     .$responsiveWidthAttr.' '
	                     .']';
        } elseif ($select == 5){
	        //Popular Destinations Widget
	        //$popularRoutes;
	        if ($popularRoutesCount > 1){
		        $shortcode .= '<div class="TP-PopularRoutesWidgets">';
		        for($i = 0; $i < $popularRoutesCount; $i++){
			        $destinationPopularRoutesAttr = '';
			        $destinationPopularRoutesCode = $this->getCode($popularRoutes[$i]);
			        $destinationPopularRoutesAttr = 'destination="'.$destinationPopularRoutesCode.'"';
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
		        $destinationPopularRoutesCode = $this->getCode($popularRoutes[0]);
		        $destinationPopularRoutesAttr = 'destination="'.$destinationPopularRoutesCode.'"';
		        $shortcode = '[tp_popular_routes_widget '
		                     .$destinationPopularRoutesAttr.' '
		                     .$subidAttr.' '
		                     .$responsiveAttr.' '
		                     .$responsiveWidthAttr.' '
		                     .']';
	        }
        } elseif ($select == 6){
	        //Hotels Selections Widget
            if (empty($cityIdCode)){
                return;
            }
	        $shortcode = '[tp_hotel_selections_widget '
	                     .$cityIdAttr.' '
	                     .$subidAttr.' '
	                     .$cat1Attr.' '
	                     .$cat2Attr.' '
	                     .$cat3Attr.' '
	                     .$widgetType6Attr.' '
	                     .$limit6Attr.' '
	                     .']';
        }  elseif ($select == 7){
            //Best deals widget
	        $dataAttr = '';
	        if ($widgetFilter == 0){
		        $dataAttr .= 'airline="';
		        for($i = 0; $i < $airline7Count; $i++){
			        $airline7Code = $this->getCode($airline7[$i]);
			        $dataAttr .= $airline7Code.',';
		        }
		        $dataAttr .= '"';
	        } else if ($widgetFilter == 1) {
		        $dataAttr = '';
		        $origin7Code = $this->getCode($origin7);
		        $dataAttr .= 'origin="'.$origin7Code.'" ';
		        $destination7Code = $this->getCode($destination7);
		        $dataAttr .= 'destination="'.$destination7Code.'" ';
	        }
	        $shortcode = '[tp_ducklett_widget '
	                     .$dataAttr.' '
	                     .$widgetType7Attr.' '
	                     .$widgetFilterAttr.' '
	                     .$limit7Attr.' '
	                     .$subidAttr.' '
	                     .$responsiveAttr.' '
	                     .$responsiveWidthAttr.' '
	                     .']';
        }

		//error_log($shortcode);
        echo do_shortcode($shortcode);
	}

	/**
	 * @param $new_instance
	 * @param $old_instance
	 * @return mixed
	 */
	public function update( $new_instance, $old_instance ) {
		// Save widget options
		/*if (array_key_exists('widgets_origin', $new_instance)){
			if (empty( $new_instance['widgets_origin'] )){
				$new_instance['widgets_origin'] = $this->getOldInstance($old_instance, 'widgets_origin');
			}
		}
		if (array_key_exists('widgets_destination', $new_instance)){
			if (empty( $new_instance['widgets_destination'] )){
				$new_instance['widgets_destination'] = $this->getOldInstance($old_instance, 'widgets_destination');
			}
		}
		if (array_key_exists('widgets_hotel_id', $new_instance)){
			if (empty( $new_instance['widgets_hotel_id'] )){
				$new_instance['widgets_hotel_id'] = $this->getOldInstance($old_instance, 'widgets_hotel_id');
			}
		}*/
		if (array_key_exists('widgets_size_width', $new_instance)){
			if (empty( $new_instance['widgets_size_width'] )){
				$new_instance['widgets_size_width'] = $this->getOldInstance($old_instance, 'widgets_size_width');
			}
		}
		if (array_key_exists('widgets_size_height', $new_instance)){
			if (empty( $new_instance['widgets_size_height'] )){
				$new_instance['widgets_size_height'] = $this->getOldInstance($old_instance, 'widgets_size_height');
			}
		}
		if (array_key_exists('widgets_calendar_period_range_from', $new_instance)){
			if (empty( $new_instance['widgets_calendar_period_range_from'] )){
				$new_instance['widgets_calendar_period_range_from'] = $this->getOldInstance($old_instance, 'widgets_calendar_period_range_from');
			}
		}
		if (array_key_exists('widgets_calendar_period_range_to', $new_instance)){
			if (empty( $new_instance['widgets_calendar_period_range_to'] )){
				$new_instance['widgets_calendar_period_range_to'] = $this->getOldInstance($old_instance, 'widgets_calendar_period_range_to');
			}
		}
		if (array_key_exists('widgets_responsive_width', $new_instance)){
			if (empty( $new_instance['widgets_responsive_width'] )){
				$new_instance['widgets_responsive_width'] = $this->getOldInstance($old_instance, 'widgets_responsive_width');
			}
		}
		if (array_key_exists('widgets_popular_routes_count', $new_instance)){
			if (empty( $new_instance['widgets_popular_routes_count'] )){
				$new_instance['widgets_popular_routes_count'] = $this->getOldInstance($old_instance, 'widgets_popular_routes_count');
			}
		}
		if (array_key_exists('widgets_widget_limit_6', $new_instance)){
			if (empty( $new_instance['widgets_widget_limit_6'] )){
				$new_instance['widgets_widget_limit_6'] = $this->getOldInstance($old_instance, 'widgets_widget_limit_6');
			}
		}
		/*if (array_key_exists('widgets_origin_7', $new_instance)){
			if (empty( $new_instance['widgets_origin_7'] )){
				$new_instance['widgets_origin_7'] = $this->getOldInstance($old_instance, 'widgets_origin_7');
			}
		}
		if (array_key_exists('widgets_destination_7', $new_instance)){
			if (empty( $new_instance['widgets_destination_7'] )){
				$new_instance['widgets_destination_7'] = $this->getOldInstance($old_instance, 'widgets_destination_7');
			}
		}
		if (array_key_exists('widgets_airline_7_count', $new_instance)){
			if (empty( $new_instance['widgets_airline_7_count'] )){
				$new_instance['widgets_airline_7_count'] = $this->getOldInstance($old_instance, 'widgets_airline_7_count');
			}
		}*/
		if (array_key_exists('widgets_widget_limit_7', $new_instance)){
			if (empty( $new_instance['widgets_widget_limit_7'] )){
				$new_instance['widgets_widget_limit_7'] = $this->getOldInstance($old_instance, 'widgets_widget_limit_7');
			}
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
		if (array_key_exists('widgets_direct', $instance)){
			$direct = true;
		} else {
			$direct = false;
		}
		if (array_key_exists('widgets_one_way', $instance)){
			$oneWay = true;
		} else {
			$oneWay = false;
		}
		if (array_key_exists('widgets_responsive', $instance)){
			$responsive = true;
		} else {
			$responsive = false;
		}
		$zoom = isset( $instance['widgets_zoom'] ) ? $instance['widgets_zoom']  : TPPlugin::$options['widgets']['2']['zoom'];
		$calendarPeriod = isset( $instance['widgets_calendar_period'] ) ? $instance['widgets_calendar_period']  : TPPlugin::$options['widgets']['3']['period'];
		$calendarPeriodRangeFrom = isset( $instance['widgets_calendar_period_range_from'] ) ? $instance['widgets_calendar_period_range_from']  : TPPlugin::$options['widgets']['3']['period_day']['from'];
		$calendarPeriodRangeTo = isset( $instance['widgets_calendar_period_range_to'] ) ? $instance['widgets_calendar_period_range_to']  : TPPlugin::$options['widgets']['3']['period_day']['to'];
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
			_x('Map Widget', 'Travelpayouts – Widgets Widget', TPOPlUGIN_TEXTDOMAIN),
			_x('Hotels Map Widget', 'Travelpayouts – Widgets Widget', TPOPlUGIN_TEXTDOMAIN),
			_x('Calendar Widget', 'Travelpayouts – Widgets Widget', TPOPlUGIN_TEXTDOMAIN),
			_x('Subscription Widget', 'Travelpayouts – Widgets Widget', TPOPlUGIN_TEXTDOMAIN),
			_x('Hotel Widget', 'Travelpayouts – Widgets Widget', TPOPlUGIN_TEXTDOMAIN),
			_x('Popular Destinations Widget', 'Travelpayouts – Widgets Widget', TPOPlUGIN_TEXTDOMAIN),
			_x('Hotels Selections Widget', 'Travelpayouts – Widgets Widget', TPOPlUGIN_TEXTDOMAIN),
			_x('Best deals widget', 'Travelpayouts – Widgets Widget', TPOPlUGIN_TEXTDOMAIN),
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
		<div class="tp-widgets-widget tp-widget"
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
					<?php _ex('Select widget:', 'Travelpayouts – Widgets Widget',
                        TPOPlUGIN_TEXTDOMAIN);?>
					<select class="tp-widgets-widget-select-shortcode widefat"
					        id="<?php echo $this->get_field_id('widgets_select'); ?>"
					        name="<?php echo $this->get_field_name('widgets_select'); ?>"
					        data-select_table="<?php echo $select; ?>">
						<option value="select" <?php selected( $select, 'select' ); ?>>
							<?php _ex('Select widget', 'Travelpayouts – Widgets Widget',
                                TPOPlUGIN_TEXTDOMAIN); ?>
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
					<?php _ex('Subid:', 'Travelpayouts – Widgets Widget',
                        TPOPlUGIN_TEXTDOMAIN);?>
					<input value="<?php echo $subid; ?>" type="text"
					       id="<?php echo $this->get_field_id('widgets_subid'); ?>"
					       name="<?php echo $this->get_field_name('widgets_subid'); ?>"
					       class="widefat"/>
				</label>
			</p>
			<p class="tp-widgets-widget-origin">
				<label for="<?php echo $this->get_field_id('widgets_origin'); ?>">
					<?php _ex('Origin:', 'Travelpayouts – Widgets Widget',
                        TPOPlUGIN_TEXTDOMAIN);?>
					<input value="<?php echo $origin; ?>" type="text"
					       id="<?php echo $this->get_field_id('widgets_origin'); ?>"
					       name="<?php echo $this->get_field_name('widgets_origin'); ?>"
					       class="constructorCityShortcodesAutocomplete widefat"/>
				</label>
			</p>
			<p class="tp-widgets-widget-destination">
				<label for="<?php echo $this->get_field_id('widgets_destination'); ?>">
					<?php _ex('Destination:', 'Travelpayouts – Widgets Widget',
                        TPOPlUGIN_TEXTDOMAIN);?>
					<input value="<?php echo $destination; ?>" type="text"
					       id="<?php echo $this->get_field_id('widgets_destination'); ?>"
					       name="<?php echo $this->get_field_name('widgets_destination'); ?>"
					       class="constructorCityShortcodesAutocomplete widefat"/>
				</label>
			</p>
			<p class="tp-widgets-widget-hotel-id">
				<label for="<?php echo $this->get_field_id('widgets_hotel_id'); ?>">
					<?php _ex('Hotel:', 'Travelpayouts – Widgets Widget',
                        TPOPlUGIN_TEXTDOMAIN);?>
					<input value="<?php echo $hotelId; ?>" type="text"
					       id="<?php echo $this->get_field_id('widgets_hotel_id'); ?>"
					       name="<?php echo $this->get_field_name('widgets_hotel_id'); ?>"
					       class="constructorWidgetHotelShortcodesAutocomplete widefat"/>
				</label>
			</p>
			<p class="tp-widgets-widget-size">
				<label for="<?php echo $this->get_field_id('widgets_size_width'); ?>">
					<?php _ex('Size:', 'Travelpayouts – Widgets Widget',
                        TPOPlUGIN_TEXTDOMAIN) ?>
					<input value="<?php echo $sizeWidth; ?>" type="number"
					       id="<?php echo $this->get_field_id('widgets_size_width'); ?>"
					       name="<?php echo $this->get_field_name('widgets_size_width'); ?>"
					       class="small-text" min="1"/>
				</label>
				<label for="<?php echo $this->get_field_id('widgets_size_height'); ?>">
					X
					<input value="<?php echo $sizeHeight; ?>" type="number"
					       id="<?php echo $this->get_field_id('widgets_size_height'); ?>"
					       name="<?php echo $this->get_field_name('widgets_size_height'); ?>"
					       class="small-text" min="1"/>
				</label>
			</p>
			<p class="tp-widgets-widget-calendar-period">
				<label for="<?php echo $this->get_field_id('widgets_calendar_period'); ?>">
					<?php _ex('Period:', 'Travelpayouts – Widgets Widget',
                        TPOPlUGIN_TEXTDOMAIN);?>
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
					<?php _ex('Range, days:', 'Travelpayouts – Widgets Widget',
                        TPOPlUGIN_TEXTDOMAIN) ?>
					<input value="<?php echo $calendarPeriodRangeFrom; ?>" type="number"
					       id="<?php echo $this->get_field_id('widgets_calendar_period_range_from'); ?>"
					       name="<?php echo $this->get_field_name('widgets_calendar_period_range_from'); ?>"
					       class="small-text" min="1"/>
				</label>
				<label for="<?php echo $this->get_field_id('widgets_calendar_period_range_to'); ?>">
					X
					<input value="<?php echo $calendarPeriodRangeTo; ?>" type="number"
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
					<?php _ex('Direct Flights Only', 'Travelpayouts – Widgets Widget',
                        TPOPlUGIN_TEXTDOMAIN);?>
				</label>
			</p>
			<p class="tp-widgets-widget-one-way">
				<label for="<?php echo $this->get_field_id('widgets_one_way'); ?>">
					<input type="checkbox" id="<?php echo $this->get_field_id('widgets_one_way'); ?>"
					       name="<?php echo $this->get_field_name('widgets_one_way'); ?>"
					       value="1" <?php checked($oneWay, true)?>>
					<?php _ex('One way', 'Travelpayouts – Widgets Widget',
                        TPOPlUGIN_TEXTDOMAIN);?>
				</label>
			</p>

            <p class="tp-widgets-widget-popular-routes-count">
                <label for="<?php echo $this->get_field_id('widgets_popular_routes_count'); ?>"
                       class="tp-widgets-widget-popular-routes-count-label">
					<?php _ex('Count:', 'Travelpayouts – Widgets Widget',
                        TPOPlUGIN_TEXTDOMAIN);?>
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
               data-field_label="<?php _ex('Destination:', 'Travelpayouts – Widgets Widget',
                   TPOPlUGIN_TEXTDOMAIN);?>">
				<?php for($i = 0; $i < $popularRoutesCount; $i++): ?>
                    <label for="<?php echo $this->get_field_id('widgets_popular_routes_'.$i); ?>"
                           class="tp-widgets-widget-popular-routes-label-<?php echo $i; ?>">
						<?php _ex('Destination:', 'Travelpayouts – Widgets Widget',
                            TPOPlUGIN_TEXTDOMAIN);?>
                        <input value="<?php echo $popularRoutes[$i]; ?>" type="text"
                               id="<?php echo $this->get_field_id('widgets_popular_routes_'.$i); ?>"
                               name="<?php echo $this->get_field_name('widgets_popular_routes_'.$i); ?>"
                               class="constructorCityShortcodesAutocomplete widefat"/>

                    </label>
				<?php endfor; ?>
            </p>

            <p class="tp-widgets-widget-type-6">
                <label for="<?php echo $this->get_field_id('widgets_widget_type_6'); ?>">
					<?php _ex('View widget', 'Travelpayouts – Widgets Widget',
                        TPOPlUGIN_TEXTDOMAIN);?>
                    <select class="widefat"
                            id="<?php echo $this->get_field_id('widgets_widget_type_6'); ?>"
                            name="<?php echo $this->get_field_name('widgets_widget_type_6'); ?>"
                            data-select_type="<?php echo $widgetType6; ?>">
                        <option <?php selected( $widgetType6, 'full' ); ?>
                                value="full">
                            <?php _ex('Full', 'Travelpayouts – Widgets Widget',
                                TPOPlUGIN_TEXTDOMAIN) ?>
                        </option>
                        <option <?php selected( $widgetType6, 'compact' ); ?>
                                value="compact">
                            <?php _ex('Compact', 'Travelpayouts – Widgets Widget',
                                TPOPlUGIN_TEXTDOMAIN) ?>
                        </option>
                    </select>
                </label>
            </p>
            <p class="tp-widgets-widget-limit-6">
                <label for="<?php echo $this->get_field_id('widgets_widget_limit_6'); ?>">
		            <?php _ex('Limit', 'Travelpayouts – Widgets Widget',
                        TPOPlUGIN_TEXTDOMAIN);?>
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
					<?php _ex('Widget type', 'Travelpayouts – Widgets Widget',
                        TPOPlUGIN_TEXTDOMAIN);?>
                    <select class="widefat"
                            id="<?php echo $this->get_field_id('widgets_widget_type_7'); ?>"
                            name="<?php echo $this->get_field_name('widgets_widget_type_7'); ?>"
                            data-select_type="<?php echo $widgetType7; ?>">
                        <option <?php selected( $widgetType7, 'brickwork' ); ?>
                                value="brickwork">
                            <?php _ex('Tile', 'Travelpayouts – Widgets Widget',
                                TPOPlUGIN_TEXTDOMAIN) ?>
                        </option>
                        <option <?php selected( $widgetType7, 'slider' ); ?>
                                value="slider">
                            <?php _ex('Slider', 'Travelpayouts – Widgets Widget',
                                TPOPlUGIN_TEXTDOMAIN) ?>
                        </option>
                    </select>
                </label>
            </p>
            <p class="tp-widgets-widget-filter">
                <label for="<?php echo $this->get_field_id('widgets_widget_filter_0'); ?>">
                    <input type="radio" name="<?php echo $this->get_field_name('widgets_widget_filter'); ?>"
                           value="0" <?php checked($widgetFilter, 0) ?>
                           id="<?php echo $this->get_field_id('widgets_widget_filter_0'); ?>">
	                <?php _ex('Filter by airlines', 'Travelpayouts – Widgets Widget',
                        TPOPlUGIN_TEXTDOMAIN); ?>
                </label>
                <label for="<?php echo $this->get_field_id('widgets_widget_filter_1'); ?>">
                    <input type="radio" name="<?php echo $this->get_field_name('widgets_widget_filter'); ?>"
                           value="1" <?php checked($widgetFilter, 1) ?>
                           id="<?php echo $this->get_field_id('widgets_widget_filter_1'); ?>">
		            <?php _ex('Filter by routes', 'Travelpayouts – Widgets Widget',
                        TPOPlUGIN_TEXTDOMAIN); ?>
                </label>
            </p>
            <p class="tp-widgets-widget-origin-7">
                <label for="<?php echo $this->get_field_id('widgets_origin_7'); ?>">
		            <?php _ex('Origin:', 'Travelpayouts – Widgets Widget',
                        TPOPlUGIN_TEXTDOMAIN);?>
                    <input value="<?php echo $origin7; ?>" type="text"
                           id="<?php echo $this->get_field_id('widgets_origin_7'); ?>"
                           name="<?php echo $this->get_field_name('widgets_origin_7'); ?>"
                           class="constructorCityShortcodesAutocomplete widefat"/>
                </label>
            </p>
            <p class="tp-widgets-widget-destination-7">
                <label for="<?php echo $this->get_field_id('widgets_destination_7'); ?>">
					<?php _ex('Destination:', 'Travelpayouts – Widgets Widget',
                        TPOPlUGIN_TEXTDOMAIN);?>
                    <input value="<?php echo $destination7; ?>" type="text"
                           id="<?php echo $this->get_field_id('widgets_destination_7'); ?>"
                           name="<?php echo $this->get_field_name('widgets_destination_7'); ?>"
                           class="constructorCityShortcodesAutocomplete widefat"/>
                </label>
            </p>
            <p class="tp-widgets-widget-airline-7"
               data-field_name="<?php echo $this->get_field_name('widgets_airline_7_item_'); ?>"
               data-field_id="<?php echo $this->get_field_id('widgets_airline_7_item_'); ?>"
               data-field_class="constructorAirlineWidgetsAutocomplete widefat"
               data-field_label="<?php _ex('Airline:', 'Travelpayouts – Widgets Widget',
                   TPOPlUGIN_TEXTDOMAIN);?>">

	            <?php for($i = 0; $i < $airline7Count; $i++): ?>
                    <label for="<?php echo $this->get_field_id('widgets_airline_7_item_'.$i); ?>"
                           class="tp-widgets-widget-airline-7-label-<?php echo $i; ?> tp-widgets-widget-airline-7-label">
			            <?php _ex('Airline:', 'Travelpayouts – Widgets Widget',
                            TPOPlUGIN_TEXTDOMAIN);?>
                        <input value="<?php echo $airline7[$i]; ?>" type="text"
                               id="<?php echo $this->get_field_id('widgets_airline_7_item_'.$i); ?>"
                               name="<?php echo $this->get_field_name('widgets_airline_7_item_'.$i); ?>"
                               class="constructorAirlineWidgetsAutocomplete widefat"/>
                        <?php if ($i > 0): ?>
                            <a href="#" class="TPBtnDelete">
                                <i></i>
                                <?php _ex('Delete', 'Travelpayouts – Widgets Widget',
                                    TPOPlUGIN_TEXTDOMAIN); ?>
                            </a>
                        <?php endif;?>

                    </label>
	            <?php endfor; ?>

                <a href="#" class="TPBtnAdd">
                    <i></i>
		            <?php _ex('Add', 'Travelpayouts – Widgets Widget',
                        TPOPlUGIN_TEXTDOMAIN); ?>
                </a>
                <input type="hidden" class="tp-widgets-widget-airline-7-count"
                       value="<?php echo $airline7Count; ?>"
                       name="<?php echo $this->get_field_name('widgets_airline_7_count'); ?>">
            </p>

            <p class="tp-widgets-widget-limit-7">
                <label for="<?php echo $this->get_field_id('widgets_widget_limit_7'); ?>">
					<?php _ex('Limit', 'Travelpayouts – Widgets Widget',
                        TPOPlUGIN_TEXTDOMAIN);?>
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
					<?php _ex('Responsive', 'Travelpayouts – Widgets Widget',
                        TPOPlUGIN_TEXTDOMAIN);?>
				</label>
				<label for="<?php echo $this->get_field_id('widgets_responsive_width'); ?>"
					class="tp-widgets-widget-responsive-label-width">
					<input type="width" id="<?php echo $this->get_field_id('widgets_responsive_width'); ?>"
					       name="<?php echo $this->get_field_name('widgets_responsive_width'); ?>"
					       value="<?php echo $responsiveWidth; ?>" min="1" class="small-text">
					<?php _ex('Width', 'Travelpayouts – Widgets Widget',
                        TPOPlUGIN_TEXTDOMAIN);?>
				</label>
			</p>



			<p class="tp-widgets-widget-zoom">
				<label for="<?php echo $this->get_field_id('widgets_zoom'); ?>">
					<?php _ex('Zoom:', 'Travelpayouts – Widgets Widget',
                        TPOPlUGIN_TEXTDOMAIN);?>
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

	/**
	 * @param $calendarPeriod
	 *
	 * @return string
	 */
	public function getFieldCalendarPeriod($calendarPeriod){
		global $wp_locale;
		$output_month = '';
		$monthNames = array_map(array(&$wp_locale, 'get_month'), range(1, 12));
		$output_month .= '<option value="year" '
		                 .selected( $calendarPeriod, 'year' , false).'>'
		                 ._x('Year', 'Travelpayouts – Widgets Widget', TPOPlUGIN_TEXTDOMAIN ).'</option>';
		$output_month .= '<option value="current_month" '
		                 .selected( $calendarPeriod, 'current_month' , false).'>'
		                 ._x('Current month', 'Travelpayouts – Widgets Widget', TPOPlUGIN_TEXTDOMAIN ).'</option>';
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

	/**
	 * @param $oldInstance
	 * @param $key
	 *
	 * @return string
	 */
	public function getOldInstance($oldInstance, $key){
		$instance = '';
		if (array_key_exists($key, $oldInstance)){
			$instance = $oldInstance[$key];
		}
		return $instance;
	}

	/**
	 * @param $data
	 *
	 * @return string
	 */
	public function getCode($data){
		if (empty($data)) return '';
		$dataCode = array();
		preg_match('/\[(.+)\]/', $data, $dataCode);
		$code = '';
		if (array_key_exists(1, $dataCode)){
			$code = $dataCode[1];
		}
		return $code;
	}

	/**
	 * @param $hotelCity
	 *
	 * @return mixed|string
	 */
	public function getHotelData($hotelCity){
		if (empty($hotelCity)) return '';
		$hotelCityCode = array();
		preg_match('/\{(.+)\}/', $hotelCity, $hotelCityCode);
		$code = '';
		if (array_key_exists(1, $hotelCityCode)){
			$code = $hotelCityCode[1];
		}
		return $code;
	}
}