<?php

/**
 * Created by PhpStorm.
 * User: solomashenko
 * Date: 01.08.17
 * Time: 19:28
 */
namespace app\includes\widgets;

use app\includes\common\TPCurrencyUtils;
use app\includes\TPPlugin;
use WP_Widget;

class TPFlightsTablesWidget extends WP_Widget{
	public function __construct()
	{
		parent::__construct(
			'travelpayouts_flights_tables', // Base ID
			_x('Travelpayouts – Flights Tables',
                'Travelpayouts – Flights Tables Widget',
                TPOPlUGIN_TEXTDOMAIN), // Name
			array(
				'description' => _x('Travelpayouts – Flights Tables',
					'Travelpayouts – Flights Tables Widget',
					TPOPlUGIN_TEXTDOMAIN)
			) // Args
		);
	}

	/**
	 * @param $args
	 * @param $instance
	 */
	public function widget( $args, $instance ) {
	    //error_log(print_r($instance, true));
		$select = isset( $instance['flight_select'] ) ? esc_attr( $instance['flight_select'] ) : 'select';
		$title = isset( $instance['flight_title'] ) ? esc_attr( $instance['flight_title'] ) : '';
		$origin = isset( $instance['flight_origin'] ) ? esc_attr( $instance['flight_origin'] ) : '';
		$destination = isset( $instance['flight_destination'] ) ? esc_attr( $instance['flight_destination'] ) : '';
		$airline = isset( $instance['flight_airline'] ) ? esc_attr( $instance['flight_airline'] ) : '';
		$subid = isset( $instance['flight_subid'] ) ? esc_attr( $instance['flight_subid'] ) : '';
		$currency = isset( $instance['flight_currency'] ) ? esc_attr( $instance['flight_currency'] ) : TPPlugin::$options['local']['currency'];
		if (array_key_exists('flight_paginate', $instance)){
			$paginate = true;
		} else {
			$paginate = false;
		}
		if (array_key_exists('flight_off_title', $instance)){
			$off_title = true;
		} else {
			$off_title = false;
		}
		if (array_key_exists('flight_one_way', $instance)){
			$one_way = true;
		} else {
			$one_way = false;
		}
		$transplant = isset( $instance['flight_transplant'] ) ? esc_attr( $instance['flight_transplant'] ) : 0;
		$filter_airline = isset( $instance['flight_filter_airline'] ) ? esc_attr( $instance['flight_filter_airline'] ) : '';
		$filter_flight_number = isset( $instance['flight_filter_flight_number'] ) ? esc_attr( $instance['flight_filter_flight_number'] ) : '';
		$limit = isset( $instance['flight_limit'] ) ? esc_attr( $instance['flight_limit'] ) : 100;
        if ($select == 'select') return;
		$originCode = $this->getCode($origin);
		$destinationCode = $this->getCode($destination);
		$airlineCode = $this->getCode($airline);
		$filterAirlineCode = $this->getCode($filter_airline);
		$originAttr = 'origin="'.$originCode.'"';
		$destinationAttr = 'destination="'.$destinationCode.'"';
		$airlineAttr = 'airline="'.$airlineCode.'"';
		$subidAttr = 'subid="'.$subid.'"';
		$currencyAttr = 'currency="'.$currency.'"';
		$paginateAttr = ($paginate == true)? 'paginate=true':'paginate=false';
		$offTitleAttr = ($off_title == true)? 'off_title=true':'';
		$oneWayAttr = ($one_way == true)? 'one_way=true':'one_way=false';
		$transplantAttr = 'stops="'.$transplant.'"';
		$filterAirlineAttr = '';
		if (!empty($filterAirlineCode)){
			$filterAirlineAttr = 'filter_airline="'.$filterAirlineCode.'"';
        }
		$filterFlightNumberAttr = '';
		if (!empty($filter_flight_number)){
			$filterFlightNumberAttr = 'filter_flight_number="'.$filter_flight_number.'"';
		}
		$limitAttr = 'limit="'.$limit.'"';
		$titleAttr = 'title="'.$title.'"';
		$isWidgetAttr = 'widget="1"';
		$shortcode = '';

		if ($select == 0){
		    if (empty($originCode) || empty($destinationCode)){
		        return;
            }
			$shortcode = '[tp_price_calendar_month_shortcodes '
			             .$originAttr.' '
			             .$destinationAttr.' '
			             .$titleAttr.' '
			             .$paginateAttr.' '
			             .$transplantAttr.' '
			             .$offTitleAttr.' '
			             .$subidAttr.' '
			             .$isWidgetAttr.' '
			             .$currencyAttr.']';
        } elseif ($select == 1) {
			if (empty($originCode) || empty($destinationCode)){
				return;
			}
			$shortcode = '[tp_price_calendar_week_shortcodes '
			             .$originAttr.' '
			             .$destinationAttr.' '
			             .$titleAttr.' '
			             .$paginateAttr.' '
			             .$offTitleAttr.' '
			             .$subidAttr.' '
			             .$isWidgetAttr.' '
			             .$currencyAttr.']';
        } elseif ($select == 2) {
			if (empty($originCode) || empty($destinationCode)){
				return;
			}
			$shortcode = '[tp_cheapest_flights_shortcodes '
			             .$originAttr.' '
			             .$destinationAttr.' '
			             .$titleAttr.' '
			             .$paginateAttr.' '
			             .$filterAirlineAttr.' '
			             .$filterFlightNumberAttr.' '
			             .$offTitleAttr.' '
			             .$subidAttr.' '
			             .$isWidgetAttr.' '
			             .$currencyAttr.']';
        } elseif ($select == 3) {
			if (empty($originCode) || empty($destinationCode)){
				return;
			}
			$shortcode = '[tp_cheapest_ticket_each_day_month_shortcodes '
			             .$originAttr.' '
			             .$destinationAttr.' '
			             .$titleAttr.' '
			             .$paginateAttr.' '
			             .$transplantAttr.' '
			             .$filterAirlineAttr.' '
			             .$filterFlightNumberAttr.' '
			             .$offTitleAttr.' '
			             .$subidAttr.' '
			             .$isWidgetAttr.' '
			             .$currencyAttr.']';
		} elseif ($select == 4){
			if (empty($originCode) || empty($destinationCode)){
				return;
			}
			$shortcode = '[tp_cheapest_tickets_each_month_shortcodes '
			             .$originAttr.' '
			             .$destinationAttr.' '
			             .$titleAttr.' '
			             .$paginateAttr.' '
			             .$filterAirlineAttr.' '
			             .$filterFlightNumberAttr.' '
			             .$offTitleAttr.' '
			             .$subidAttr.' '
			             .$isWidgetAttr.' '
			             .$currencyAttr.']';
        } elseif ($select == 5){
			if (empty($originCode) || empty($destinationCode)){
				return;
			}
			$shortcode = '[tp_direct_flights_route_shortcodes '
			             .$originAttr.' '
			             .$destinationAttr.' '
			             .$titleAttr.' '
			             .$paginateAttr.' '
			             .$filterAirlineAttr.' '
			             .$filterFlightNumberAttr.' '
			             .$offTitleAttr.' '
			             .$subidAttr.' '
			             .$isWidgetAttr.' '
			             .$currencyAttr.']';
        } elseif ($select == 6){
			if (empty($originCode)){
			    return;
			}
			$shortcode = '[tp_direct_flights_shortcodes '
			             .$originAttr.' '
			             .$titleAttr.' '
			             .$paginateAttr.' '
			             .$filterAirlineAttr.' '
			             .$filterFlightNumberAttr.' '
			             .$offTitleAttr.' '
			             .$subidAttr.' '
			             .$limitAttr.' '
			             .$isWidgetAttr.' '
			             .$currencyAttr.']';
        } elseif ($select == 7){
			if (empty($originCode)){
				return;
			}
			$shortcode = '[tp_popular_routes_from_city_shortcodes '
			             .$originAttr.' '
			             .$titleAttr.' '
			             .$paginateAttr.' '
			             .$offTitleAttr.' '
			             .$isWidgetAttr.' '
			             .$subidAttr.']';
        } elseif ($select == 8){
			if (empty($airlineCode)){
				return;
			}
			$shortcode = '[tp_popular_destinations_airlines_shortcodes '
			             .$airlineAttr.' '
			             .$titleAttr.' '
			             .$paginateAttr.' '
			             .$offTitleAttr.' '
			             .$limitAttr.' '
			             .$isWidgetAttr.' '
			             .$subidAttr.']';
        }  elseif ($select == 9){
			$shortcode = '[tp_our_site_search_shortcodes '
			             .$titleAttr.' '
			             .$paginateAttr.' '
			             .$offTitleAttr.' '
			             .$limitAttr.' '
			             .$oneWayAttr.' '
			             .$currencyAttr.' '
			             .$transplantAttr.' '
			             .$isWidgetAttr.' '
			             .$subidAttr.']';
		}  elseif ($select == 10){
			if (empty($originCode)){
				return;
			}
			$shortcode = '[tp_from_our_city_fly_shortcodes '
			             .$originAttr.' '
			             .$titleAttr.' '
			             .$paginateAttr.' '
			             .$offTitleAttr.' '
			             .$limitAttr.' '
			             .$oneWayAttr.' '
			             .$currencyAttr.' '
			             .$transplantAttr.' '
			             .$isWidgetAttr.' '
			             .$subidAttr.']';
		} elseif ($select == 11) {
			if (empty($destinationCode)){
				return;
			}
			$shortcode = '[tp_in_our_city_fly_shortcodes '
			             .$destinationAttr.' '
			             .$titleAttr.' '
			             .$paginateAttr.' '
			             .$offTitleAttr.' '
			             .$limitAttr.' '
			             .$oneWayAttr.' '
			             .$currencyAttr.' '
			             .$transplantAttr.' '
			             .$isWidgetAttr.' '
			             .$subidAttr.']';
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
        //error_log(print_r($new_instance, true));
		/*if (array_key_exists('flight_origin', $new_instance)){
			if (empty( $new_instance['flight_origin'] )){
				$new_instance['flight_origin'] = $this->getOldInstance($old_instance, 'flight_origin');
			}
		}
		if (array_key_exists('flight_destination', $new_instance)){
			if (empty( $new_instance['flight_destination'] )){
				$new_instance['flight_destination'] =  $this->getOldInstance($old_instance, 'flight_destination');
			}
		}
		if (array_key_exists('flight_airline', $new_instance)){
			if (empty( $new_instance['flight_airline'] )){
				$new_instance['flight_airline'] = $this->getOldInstance($old_instance, 'flight_airline');
			}
		}
		if (array_key_exists('flight_subid', $new_instance)){
			if (empty( $new_instance['flight_subid'] )){
				$new_instance['flight_subid'] = $this->getOldInstance($old_instance, 'flight_subid');
			}
		}
		if (array_key_exists('flight_currency', $new_instance)){
			if (empty( $new_instance['flight_currency'] )){
				$new_instance['flight_currency'] = $this->getOldInstance($old_instance, 'flight_currency');
			}
		}
		if (array_key_exists('flight_filter_airline', $new_instance)){
			if (empty( $new_instance['flight_filter_airline'] )){
				$new_instance['flight_filter_airline'] = $this->getOldInstance($old_instance, 'flight_filter_airline');
			}
		}
		if (array_key_exists('flight_filter_flight_number', $new_instance)){
			if (empty( $new_instance['flight_filter_flight_number'] )){
				$new_instance['flight_filter_flight_number'] = $this->getOldInstance($old_instance, 'flight_filter_flight_number');
			}
		}*/
		if (array_key_exists('flight_limit', $new_instance)){
			if (empty( $new_instance['flight_limit'] )){
				$new_instance['flight_limit'] =  $this->getOldInstance($old_instance, 'flight_limit');
			}
		}
		return $new_instance;
	}

	/**
	 * @param $instance
	 */
	public function form( $instance ) {
		$select = isset( $instance['flight_select'] ) ? esc_attr( $instance['flight_select'] ) : 'select';
		$title = isset( $instance['flight_title'] ) ? esc_attr( $instance['flight_title'] ) : '';
		$origin = isset( $instance['flight_origin'] ) ? esc_attr( $instance['flight_origin'] ) : '';
		$destination = isset( $instance['flight_destination'] ) ? esc_attr( $instance['flight_destination'] ) : '';
		$airline = isset( $instance['flight_airline'] ) ? esc_attr( $instance['flight_airline'] ) : '';
		$subid = isset( $instance['flight_subid'] ) ? esc_attr( $instance['flight_subid'] ) : '';
		$limit = isset( $instance['flight_limit'] ) ? esc_attr( $instance['flight_limit'] ) : 100;
		$currency = isset( $instance['flight_currency'] ) ? esc_attr( $instance['flight_currency'] ) : TPPlugin::$options['local']['currency'];
		if (array_key_exists('flight_paginate', $instance)){
			$paginate = true;
		} else {
		    $paginate = false;
        }
		if (array_key_exists('flight_off_title', $instance)){
			$off_title = true;
		} else {
			$off_title = false;
		}
		if (array_key_exists('flight_one_way', $instance)){
			$one_way = true;
		} else {
			$one_way = false;
		}
		$transplant = isset( $instance['flight_transplant'] ) ? esc_attr( $instance['flight_transplant'] ) : 0;
		$filter_airline = isset( $instance['flight_filter_airline'] ) ? esc_attr( $instance['flight_filter_airline'] ) : '';
		$filter_flight_number = isset( $instance['flight_filter_flight_number'] ) ? esc_attr( $instance['flight_filter_flight_number'] ) : '';

		$shortcodeLabels = array(
			_x('Flights from origin to destination, One Way (next month)',
                'Travelpayouts – Flights Tables Widget', TPOPlUGIN_TEXTDOMAIN),
			_x('Flights from Origin to Destination (next few days)',
                'Travelpayouts – Flights Tables Widget', TPOPlUGIN_TEXTDOMAIN),
			_x('Cheapest Flights from origin to destination, Round-trip',
                'Travelpayouts – Flights Tables Widget', TPOPlUGIN_TEXTDOMAIN),
			_x('Cheapest Flights from origin to destination (next month)',
                'Travelpayouts – Flights Tables Widget', TPOPlUGIN_TEXTDOMAIN),
			_x('Cheapest Flights from origin to destination (next year)',
                'Travelpayouts – Flights Tables Widget', TPOPlUGIN_TEXTDOMAIN),
			_x('Direct Flights from origin to destination',
                'Travelpayouts – Flights Tables Widget', TPOPlUGIN_TEXTDOMAIN),
			_x('Direct Flights from origin',
                'Travelpayouts – Flights Tables Widget', TPOPlUGIN_TEXTDOMAIN),
			_x('Popular Destinations from origin',
                'Travelpayouts – Flights Tables Widget', TPOPlUGIN_TEXTDOMAIN),
			_x('Most popular flights within this Airlines',
                'Travelpayouts – Flights Tables Widget', TPOPlUGIN_TEXTDOMAIN),
			_x('Searched on our website',
                'Travelpayouts – Flights Tables Widget', TPOPlUGIN_TEXTDOMAIN),
			_x('Cheap Flights from origin',
                'Travelpayouts – Flights Tables Widget', TPOPlUGIN_TEXTDOMAIN),
			_x('Cheap Flights to destination',
                'Travelpayouts – Flights Tables Widget', TPOPlUGIN_TEXTDOMAIN),
		)

		?>

		<div class="tp-flights-tables-widget tp-widget">
			<p class="tp-flights-tables-widget-select">
				<label for="<?php echo $this->get_field_id('flight_select'); ?>"
                       class="tp-flights-tables-widget-select-label">
					<?php _ex('Select the table:',
                        'Travelpayouts – Flights Tables Widget', TPOPlUGIN_TEXTDOMAIN);?>
					<select class="tp-flights-tables-widget-select-shortcode widefat"
					        id="<?php echo $this->get_field_id('flight_select'); ?>"
					        name="<?php echo $this->get_field_name('flight_select'); ?>"
					        data-select_table="<?php echo $select; ?>">
						<option value="select" <?php selected( $select, 'select' ); ?>>
							<?php _ex('Select the table', 'Travelpayouts – Flights Tables Widget',
                                TPOPlUGIN_TEXTDOMAIN); ?>
						</option>
						<?php $item = 1; ?>
						<?php foreach ($shortcodeLabels as $key => $shortcodeLabel): ?>
							<?php
							if (TPPlugin::$options['local']['currency'] != TPCurrencyUtils::TP_CURRENCY_RUB
							    && $key == 7) {
								continue;
							}
							?>
							<option value="<?php echo $key; ?>" <?php selected( $select, $key ); ?>>
								<?php echo $item; ?>. <?php echo  $shortcodeLabel; ?>
							</option>
							<?php $item++; ?>
						<?php endforeach; ?>
					</select>
				</label>
			</p>
			<p class="tp-flights-tables-widget-title">
				<label for="<?php echo $this->get_field_id('flight_title'); ?>">
					<?php _ex('Alternate title:',
                        'Travelpayouts – Flights Tables Widget', TPOPlUGIN_TEXTDOMAIN);?>
					<input class="widefat" id="<?php echo $this->get_field_id('flight_title'); ?>"
					       name="<?php echo $this->get_field_name('flight_title'); ?>" type="text"
					       value="<?php echo $title; ?>" />
				</label>
			</p>
			<p class="tp-flights-tables-widget-origin">
				<label for="<?php echo $this->get_field_id('flight_origin'); ?>">
					<?php _ex('Origin:', 'Travelpayouts – Flights Tables Widget',
                        TPOPlUGIN_TEXTDOMAIN);?>
					<input value="<?php echo $origin; ?>" type="text"
					       id="<?php echo $this->get_field_id('flight_origin'); ?>"
					       name="<?php echo $this->get_field_name('flight_origin'); ?>"
					       class="constructorCityWidgetsAutocomplete widefat"/>
				</label>
			</p>
			<p class="tp-flights-tables-widget-destination">
				<label for="<?php echo $this->get_field_id('flight_destination'); ?>">
					<?php _ex('Destination:', 'Travelpayouts – Flights Tables Widget',
                        TPOPlUGIN_TEXTDOMAIN);?>
					<input value="<?php echo $destination; ?>" type="text"
					       id="<?php echo $this->get_field_id('flight_destination'); ?>"
					       name="<?php echo $this->get_field_name('flight_destination'); ?>"
					       class="constructorCityWidgetsAutocomplete widefat"/>
				</label>
			</p>
			<p class="tp-flights-tables-widget-airline">
				<label for="<?php echo $this->get_field_id('flight_airline'); ?>">
					<?php _ex('Airline:', 'Travelpayouts – Flights Tables Widget',
                        TPOPlUGIN_TEXTDOMAIN);?>
					<input value="<?php echo $airline; ?>" type="text"
					       id="<?php echo $this->get_field_id('flight_airline'); ?>"
					       name="<?php echo $this->get_field_name('flight_airline'); ?>"
					       class="constructorAirlineWidgetsAutocomplete widefat"/>
				</label>
			</p>
			<p class="tp-flights-tables-widget-subid">
				<label for="<?php echo $this->get_field_id('flight_subid'); ?>">
					<?php _ex('Subid:', 'Travelpayouts – Flights Tables Widget',
                        TPOPlUGIN_TEXTDOMAIN);?>
					<input value="<?php echo $subid; ?>" type="text"
					       id="<?php echo $this->get_field_id('flight_subid'); ?>"
					       name="<?php echo $this->get_field_name('flight_subid'); ?>"
					       class="widefat"/>
				</label>
			</p>
			<p class="tp-flights-tables-widget-filter-airline">
				<label for="<?php echo $this->get_field_id('flight_filter_airline'); ?>">
					<?php _ex('Filter by airline:', 'Travelpayouts – Flights Tables Widget',
                        TPOPlUGIN_TEXTDOMAIN);?>
					<input value="<?php echo $filter_airline; ?>" type="text"
					       id="<?php echo $this->get_field_id('filter_airline'); ?>"
					       name="<?php echo $this->get_field_name('filter_airline'); ?>"
					       class="constructorAirlineShortcodesAutocomplete widefat"
					       title="<?php _ex('Type aircompany name and chose the one you need. Only its flights will be shown.',
						       'Travelpayouts – Flights Tables Widget',
						       TPOPlUGIN_TEXTDOMAIN); ?>"
					/>
				</label>
			</p>
			<p class="tp-flights-tables-widget-filter-flight-number">
				<label for="<?php echo $this->get_field_id('filter_flight_number'); ?>">
					<?php _ex('Filter by flight # (enter manually):',
                        'Travelpayouts – Flights Tables Widget', TPOPlUGIN_TEXTDOMAIN);?>
					<input value="<?php echo $filter_flight_number; ?>" type="text"
					       id="<?php echo $this->get_field_id('filter_flight_number'); ?>"
					       name="<?php echo $this->get_field_name('filter_flight_number'); ?>"
					       class="widefat"
					       title="<?php _ex('Use this filter only if you absolutely accurately know the route number',
						       'Travelpayouts – Flights Tables Widget',
						       TPOPlUGIN_TEXTDOMAIN); ?>"
					/>
				</label>
			</p>
			<p class="tp-flights-tables-widget-limit">
				<label for="<?php echo $this->get_field_id('flight_limit'); ?>">
					<?php _ex('Limit:', 'Travelpayouts – Flights Tables Widget',
                        TPOPlUGIN_TEXTDOMAIN);?>
					<input value="<?php echo $limit; ?>" type="number"
					       id="<?php echo $this->get_field_id('flight_limit'); ?>"
					       name="<?php echo $this->get_field_name('flight_limit'); ?>"
					       class=""/>
				</label>
			</p>
			<p class="tp-flights-tables-widget-currency">
				<label for="<?php echo $this->get_field_id('flight_currency'); ?>">
					<?php _ex('Currency:', 'Travelpayouts – Flights Tables Widget',
                        TPOPlUGIN_TEXTDOMAIN);?>
					<select id="<?php echo $this->get_field_id('flight_currency'); ?>"
					        name="<?php echo $this->get_field_name('flight_currency'); ?>">
						<?php foreach(TPCurrencyUtils::getCurrencyAll() as $currency_item){ ?>
							<option
								<?php selected($currency, $currency_item); ?>
								value="<?php echo $currency_item ?>">
								<?php echo $currency_item; ?>
							</option>
						<?php } ?>

					</select>
				</label>
			</p>
			<p class="tp-flights-tables-widget-paginate">
				<label for="<?php echo $this->get_field_id('flight_paginate'); ?>">
					<input type="checkbox" id="<?php echo $this->get_field_id('flight_paginate'); ?>"
					       name="<?php echo $this->get_field_name('flight_paginate'); ?>"
					       value="1" <?php checked($paginate, true)?>>
					<?php _ex('Paginate', 'Travelpayouts – Flights Tables Widget',
                        TPOPlUGIN_TEXTDOMAIN);?>
				</label>
			</p>
			<p class="tp-flights-tables-widget-one-way">
				<label for="<?php echo $this->get_field_id('flight_one_way'); ?>">
					<input type="checkbox" id="<?php echo $this->get_field_id('flight_one_way'); ?>"
					       name="<?php echo $this->get_field_name('flight_one_way'); ?>"
					       value="1" <?php checked($one_way, true)?>>
					<?php _ex('One Way', 'Travelpayouts – Flights Tables Widget',
                        TPOPlUGIN_TEXTDOMAIN);?>
				</label>
			</p>
			<p class="tp-flights-tables-widget-off-title">
				<label for="<?php echo $this->get_field_id('flight_off_title'); ?>">
					<input type="checkbox" id="<?php echo $this->get_field_id('flight_off_title'); ?>"
					       name="<?php echo $this->get_field_name('flight_off_title'); ?>"
					       value="1" <?php checked($off_title, true)?>>
					<?php _ex('No title', 'Travelpayouts – Flights Tables Widget',
                        TPOPlUGIN_TEXTDOMAIN);?>
				</label>
			</p>
			<p class="tp-flights-tables-widget-transplant">
				<label for="<?php echo $this->get_field_id('flight_transplant'); ?>">
					<?php _ex('Number of stops', 'Travelpayouts – Flights Tables Widget',
                        TPOPlUGIN_TEXTDOMAIN); ?>:
					<select id="<?php echo $this->get_field_id('flight_transplant'); ?>"
					        name="<?php echo $this->get_field_name('flight_transplant'); ?>">
						<option value="0" <?php selected( $transplant, 0 ); ?>>
							<?php _ex('All', 'Travelpayouts – Flights Tables Widget',
                                TPOPlUGIN_TEXTDOMAIN ); ?></option>
						<option value="1" <?php selected( $transplant, 1 ); ?>>
							<?php _ex('No more than one stop', 'Travelpayouts – Flights Tables Widget',
                                TPOPlUGIN_TEXTDOMAIN ); ?></option>
						<option value="2" <?php selected( $transplant, 2 ); ?>>
							<?php  _ex('Direct', 'Travelpayouts – Flights Tables Widget',
                                TPOPlUGIN_TEXTDOMAIN ); ?></option>
					</select>
				</label>
			</p>

		</div>
		<?php
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

}
