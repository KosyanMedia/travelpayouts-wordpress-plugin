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
		$limit = isset( $instance['limit'] ) ? esc_attr( $instance['limit'] ) : 100;
		$currency = isset( $instance['currency'] ) ? esc_attr( $instance['currency'] ) : TPPlugin::$options['local']['currency'];
		$paginate = isset( $instance['paginate'] ) ? $instance['paginate']  : true;
		$one_way = isset( $instance['one_way'] ) ? $instance['one_way']  : true;
		$off_title = isset( $instance['off_title'] ) ? $instance['off_title']  : false;
		$transplant = isset( $instance['transplant'] ) ? esc_attr( $instance['transplant'] ) : 0;
		$filter_airline = isset( $instance['filter_airline'] ) ? esc_attr( $instance['filter_airline'] ) : '';
		$filter_flight_number = isset( $instance['filter_flight_number'] ) ? esc_attr( $instance['filter_flight_number'] ) : '';

		$shortcodeLabels = array(
			__('Flights from origin to destination, One Way (next month)', TPOPlUGIN_TEXTDOMAIN),
			__('Flights from Origin to Destination (next few days)', TPOPlUGIN_TEXTDOMAIN),
			__('Cheapest Flights from origin to destination, Round-trip', TPOPlUGIN_TEXTDOMAIN),
			__('Cheapest Flights from origin to destination (next month)', TPOPlUGIN_TEXTDOMAIN),
			__('Cheapest Flights from origin to destination (next year)', TPOPlUGIN_TEXTDOMAIN),
			__('Direct Flights from origin to destination', TPOPlUGIN_TEXTDOMAIN),
			__('Direct Flights from origin', TPOPlUGIN_TEXTDOMAIN),
			__('Popular Destinations from origin', TPOPlUGIN_TEXTDOMAIN),
			__('Most popular flights within this Airlines', TPOPlUGIN_TEXTDOMAIN),
			__('Searched on our website', TPOPlUGIN_TEXTDOMAIN),
			__('Cheap Flights from origin', TPOPlUGIN_TEXTDOMAIN),
			__('Cheap Flights to destination', TPOPlUGIN_TEXTDOMAIN),
		)

		?>

		<div class="tp-flights-tables-widget">
			<p class="tp-flights-tables-widget-select">
				<label for="<?php echo $this->get_field_id('select'); ?>" class="tp-flights-tables-widget-select-label">
					<?php _e('Select the table:', TPOPlUGIN_TEXTDOMAIN);?>
					<select class="tp-flights-tables-widget-select-shortcode widefat"
					        id="<?php echo $this->get_field_id('select'); ?>"
					        name="<?php echo $this->get_field_name('select'); ?>"
					        data-select_table="<?php echo $select; ?>">
						<option value="null">
							<?php _e('Select the table', TPOPlUGIN_TEXTDOMAIN); ?>
						</option>
						<?php $item = 1; ?>
						<?php foreach ($shortcodeLabels as $key => $shortcodeLabel): ?>
							<?php
							if (TPPlugin::$options['local']['currency'] != TPCurrencyUtils::TP_CURRENCY_RUB
							    && $key == 7) {
								continue;
							}
							?>
							<option value="<?php echo $key; ?>" <?php selected( $select, $item ); ?>>
								<?php echo $item; ?>. <?php echo  $shortcodeLabel; ?>
							</option>
							<?php $item++; ?>
						<?php endforeach; ?>
					</select>
				</label>
			</p>
			<p class="tp-flights-tables-widget-title">
				<label for="<?php echo $this->get_field_id('title'); ?>">
					<?php _e('Alternate title:', TPOPlUGIN_TEXTDOMAIN);?>
					<input class="widefat" id="<?php echo $this->get_field_id('title'); ?>"
					       name="<?php echo $this->get_field_name('title'); ?>" type="text"
					       value="<?php echo $title; ?>" />
				</label>
			</p>
			<p class="tp-flights-tables-widget-origin">
				<label for="<?php echo $this->get_field_id('origin'); ?>">
					<?php _e('Origin:', TPOPlUGIN_TEXTDOMAIN);?>
					<input placeholder="<?php echo $origin; ?>" type="text"
					       id="<?php echo $this->get_field_id('origin'); ?>"
					       name="<?php echo $this->get_field_name('origin'); ?>"
					       class="constructorCityWidgetsAutocomplete widefat"/>
				</label>
			</p>
			<p class="tp-flights-tables-widget-destination">
				<label for="<?php echo $this->get_field_id('destination'); ?>">
					<?php _e('Destination:', TPOPlUGIN_TEXTDOMAIN);?>
					<input placeholder="<?php echo $destination; ?>" type="text"
					       id="<?php echo $this->get_field_id('destination'); ?>"
					       name="<?php echo $this->get_field_name('destination'); ?>"
					       class="constructorCityWidgetsAutocomplete widefat"/>
				</label>
			</p>
			<p class="tp-flights-tables-widget-airline">
				<label for="<?php echo $this->get_field_id('airline'); ?>">
					<?php _e('Airline:', TPOPlUGIN_TEXTDOMAIN);?>
					<input placeholder="<?php echo $airline; ?>" type="text"
					       id="<?php echo $this->get_field_id('airline'); ?>"
					       name="<?php echo $this->get_field_name('airline'); ?>"
					       class="constructorAirlineWidgetsAutocomplete widefat"/>
				</label>
			</p>
			<p class="tp-flights-tables-widget-subid">
				<label for="<?php echo $this->get_field_id('subid'); ?>">
					<?php _e('Subid:', TPOPlUGIN_TEXTDOMAIN);?>
					<input placeholder="<?php echo $subid; ?>" type="text"
					       id="<?php echo $this->get_field_id('subid'); ?>"
					       name="<?php echo $this->get_field_name('subid'); ?>"
					       class="widefat"/>
				</label>
			</p>
			<p class="tp-flights-tables-widget-filter-airline">
				<label for="<?php echo $this->get_field_id('filter_airline'); ?>">
					<?php _e('Filter by airline:', TPOPlUGIN_TEXTDOMAIN);?>
					<input placeholder="<?php echo $filter_airline; ?>" type="text"
					       id="<?php echo $this->get_field_id('filter_airline'); ?>"
					       name="<?php echo $this->get_field_name('filter_airline'); ?>"
					       class="constructorAirlineShortcodesAutocomplete widefat"
					       title="<?php _ex('Type aircompany name and chose the one you need. Only its flights will be shown.',
						       TPOPlUGIN_TEXTDOMAIN); ?>"
					/>
				</label>
			</p>
			<p class="tp-flights-tables-widget-filter-flight-number">
				<label for="<?php echo $this->get_field_id('filter_flight_number'); ?>">
					<?php _e('Filter by flight # (enter manually):', TPOPlUGIN_TEXTDOMAIN);?>
					<input placeholder="<?php echo $filter_flight_number; ?>" type="text"
					       id="<?php echo $this->get_field_id('filter_flight_number'); ?>"
					       name="<?php echo $this->get_field_name('filter_flight_number'); ?>"
					       class="widefat"
					       title="<?php _ex('Use this filter only if you absolutely accurately know the route number',
						       TPOPlUGIN_TEXTDOMAIN); ?>"
					/>
				</label>
			</p>
			<p class="tp-flights-tables-widget-limit">
				<label for="<?php echo $this->get_field_id('limit'); ?>">
					<?php _e('Limit:', TPOPlUGIN_TEXTDOMAIN);?>
					<input value="<?php echo $limit; ?>" type="number"
					       id="<?php echo $this->get_field_id('limit'); ?>"
					       name="<?php echo $this->get_field_name('limit'); ?>"
					       class=""/>
				</label>
			</p>
			<p class="tp-flights-tables-widget-currency">
				<label for="<?php echo $this->get_field_id('currency'); ?>">
					<?php _e('Currency:', TPOPlUGIN_TEXTDOMAIN);?>
					<select id="<?php echo $this->get_field_id('currency'); ?>"
					        name="<?php echo $this->get_field_name('currency'); ?>">
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
				<label for="<?php echo $this->get_field_id('paginate'); ?>">
					<input type="checkbox" id="<?php echo $this->get_field_id('paginate'); ?>"
					       name="<?php echo $this->get_field_name('paginate'); ?>"
					       value="1" <?php checked($paginate, true)?>>
					<?php _e('Paginate', TPOPlUGIN_TEXTDOMAIN);?>
				</label>
			</p>
			<p class="tp-flights-tables-widget-one-way">
				<label for="<?php echo $this->get_field_id('one_way'); ?>">
					<input type="checkbox" id="<?php echo $this->get_field_id('one_way'); ?>"
					       name="<?php echo $this->get_field_name('one_way'); ?>"
					       value="1" <?php checked($one_way, true)?>>
					<?php _e('One Way', TPOPlUGIN_TEXTDOMAIN);?>
				</label>
			</p>
			<p class="tp-flights-tables-widget-off-title">
				<label for="<?php echo $this->get_field_id('off_title'); ?>">
					<input type="checkbox" id="<?php echo $this->get_field_id('off_title'); ?>"
					       name="<?php echo $this->get_field_name('off_title'); ?>"
					       value="1" <?php checked($off_title, true)?>>
					<?php _e('No title', TPOPlUGIN_TEXTDOMAIN);?>
				</label>
			</p>
			<p class="tp-flights-tables-widget-transplant">
				<label for="<?php echo $this->get_field_id('transplant'); ?>">
					<?php _e('Number of stops', TPOPlUGIN_TEXTDOMAIN); ?>:
					<select id="<?php echo $this->get_field_id('transplant'); ?>"
					        name="<?php echo $this->get_field_name('transplant'); ?>">
						<option value="0" <?php selected( $transplant, 0 ); ?>>
							<?php _e('All', TPOPlUGIN_TEXTDOMAIN ); ?></option>
						<option value="1" <?php selected( $transplant, 1 ); ?>>
							<?php _e('No more than one stop', TPOPlUGIN_TEXTDOMAIN ); ?></option>
						<option value="2" <?php selected( $transplant, 2 ); ?>>
							<?php  _e('Direct', TPOPlUGIN_TEXTDOMAIN ); ?></option>
					</select>
				</label>
			</p>

		</div>
		<?php
	}

}
