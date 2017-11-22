<?php
/**
 * Created by PhpStorm.
 * User: freeman
 * Date: 19.10.15
 * Time: 10:26
 */

namespace app\includes;




use WP_Widget;

class TPPluginWidget extends WP_Widget{
    /**
     *
     */
    public function __construct()
    {
        parent::__construct(
            'travelpayouts', // Base ID
            'Travelpayouts', // Name
            array( 'description' => 'Travelpayouts', ) // Args
        );
    }

    /**
     * @param $args
     * @param $instance
     */
    public function widget( $args, $instance ) {
        // Widget output
        $shortcode = '';
        $origin = '';
        $destination = '';
        $airline = '';
        if(isset($instance['origin']))
            preg_match('/\[(.+)\]/', $instance['origin'], $origin);
        if(isset($instance['destination']))
            preg_match('/\[(.+)\]/', $instance['destination'], $destination);
        if(isset($instance['airline']))
            preg_match('/\[(.+)\]/', $instance['airline'], $airline);

        $paginate = (isset($instance['paginate']))? 'paginate=true':'paginate=false';
        switch($instance['select']){
            case 11:
            case 12:
            case 13:
                $one_way = (isset($instance['one_way']))? 'one_way=true': 'one_way=false';
                break;
        }
        $off_title = (isset($instance['off_title']))? 'off_title=true': '';
        switch($instance['select']){
            case 1:
                $shortcode = '[tp_price_calendar_month_shortcodes origin='.$origin[1]
                    .' destination='.$destination[1].' title="'.$instance['title'] .'" '
                    .$paginate.' stops='.$instance['stops'].']';
                break;
            case 2:
                $shortcode = '[tp_price_calendar_week_shortcodes origin='.$origin[1]
                    .' destination='.$destination[1].' title="'.$instance['title'] .'" '
                    .$paginate.' '.$off_title.']';
                break;
            case 3:
                $shortcode = '[tp_cheapest_flights_shortcodes origin='.$origin[1]
                    .' destination='.$destination[1].' title="'.$instance['title'] .'" '
                    .$paginate.' '.$off_title.']';
                break;
            case 4:
                $shortcode = '[tp_cheapest_ticket_each_day_month_shortcodes origin='.$origin[1]
                    .' destination='.$destination[1].' title="'.$instance['title'] .'" '
                    .$paginate.' stops='.$instance['stops'].' '.$off_title.']';
                break;
            case 5:
                $shortcode = '[tp_cheapest_tickets_each_month_shortcodes origin='.$origin[1]
                    .' destination='.$destination[1].' title="'.$instance['title'] .'" '
                    .$paginate.' '.$off_title.']';
                break;
            case 6:
                $shortcode = '[tp_direct_flights_route_shortcodes origin='.$origin[1]
                    .' destination='.$destination[1].' title="'.$instance['title'] .'" '
                    .$paginate.' '.$off_title.']';
                break;
            case 7:
                $shortcode = '[tp_direct_flights_shortcodes origin='.$origin[1]
                    .' limit='.$instance['limit'].' title="'.$instance['title'] .'" '
                    .$paginate.' '.$off_title.']';
                break;
            case 8:
                $shortcode = '[tp_popular_routes_from_city_shortcodes origin='.$origin[1]
                    .' title="'.$instance['title'] .'" '.$paginate.' '.$off_title.']';
                break;
            case 9:
                $shortcode = '[tp_popular_destinations_airlines_shortcodes airline='.$airline[1]
                    .'limit='.$instance['limit']
                    .' title="'.$instance['title'] .'" '.$paginate.' '.$off_title.']';
                break;
            case 11:
                $shortcode = '[tp_our_site_search_shortcodes title="'.$instance['title'] .'" '
                    .'limit='.$instance['limit']
                    .$paginate.' stops='.$instance['stops'].' '.$one_way.' '.$off_title.']';
                break;
            case 12:
                $shortcode = '[tp_from_our_city_fly_shortcodes origin='.$origin[1]
                    .' destination='.$destination[1].' title="'.$instance['title'] .'" '
                    .'limit='.$instance['limit']
                    .$paginate.' stops='.$instance['stops'].' '.$one_way.' '.$off_title.']';
                break;
            case 13:
                $shortcode = '[tp_in_our_city_fly_shortcodes origin='.$origin[1]
                    .' destination='.$destination[1].' title="'.$instance['title'] .'" '
                    .'limit='.$instance['limit']
                    .$paginate.' stops='.$instance['stops'].' '.$one_way.' '.$off_title.']';
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
        $instance['title'] = (!empty( $new_instance['title'] )) ? $new_instance['title'] : $old_instance['title'];
        $instance['origin'] = (!empty( $new_instance['origin'])) ? $new_instance['origin'] : $old_instance['origin'];
        $instance['destination'] = (!empty( $new_instance['destination'] ) ) ? $new_instance['destination'] : $old_instance['destination'];
        $instance['select'] = (!empty( $new_instance['select'])) ? $new_instance['select'] : $old_instance['select'];
        $instance['stops'] = (!empty( $new_instance['stops'])) ? $new_instance['stops'] : $old_instance['stops'];
        $instance['paginate'] = (isset($new_instance['paginate']))? true : false;
        $instance['one_way'] = (isset($new_instance['one_way']))? true : false;
        $instance['off_title'] = (isset($new_instance['off_title']))? true : false;
        $instance['limit'] = (!empty( $new_instance['limit'])) ? $new_instance['limit'] : $old_instance['limit'];
        $instance['airline'] = (!empty( $new_instance['airline'])) ? $new_instance['airline'] : $old_instance['airline'];

        return $instance;
    }

    /**
     * @param $instance
     */
    public function form( $instance ) {
        // Output admin widget options form
        $title = isset( $instance['title'] ) ? esc_attr( $instance['title'] ) : '';
        $origin = isset( $instance['origin'] ) ? esc_attr( $instance['origin'] ) : '';
        $destination = isset( $instance['destination'] ) ? esc_attr( $instance['destination'] ) : '';
        $airline = isset( $instance['airline'] ) ? esc_attr( $instance['airline'] ) : '';
        $select = isset( $instance['select'] ) ? esc_attr( $instance['select'] ) : 0;
        $stops = isset( $instance['stops'] ) ? esc_attr( $instance['stops'] ) : 0;

        $paginate = isset( $instance['paginate'] ) ? $instance['paginate']  : true;
        $one_way = isset( $instance['one_way'] ) ? $instance['one_way']  : true;
        $off_title = isset( $instance['off_title'] ) ? $instance['off_title']  : false;
        $limit = isset( $instance['limit'] ) ? esc_attr( $instance['limit'] ) : 100;
        ?>
        <div class="TP-MainWidget">
            <p>
                <label for="<?php echo $this->get_field_id('title'); ?>">
                    <?php _ex('Title:',
                        'tp_plugin_widget_form_field_title_label', TPOPlUGIN_TEXTDOMAIN);?>
                    <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>"
                           name="<?php echo $this->get_field_name('title'); ?>" type="text"
                           value="<?php echo $title; ?>" />
                </label>
            </p>
            <p class="TP-SelectWidget">
                <label for="<?php echo $this->get_field_id('select'); ?>" class="TPSelectWidgetLabel">
                    <?php _ex('Select the table',
                        'tp_plugin_widget_form_field_select_table_label', TPOPlUGIN_TEXTDOMAIN); ?>:
                    <select class="TPSelectShortcodeWidget widefat"
                            id="<?php echo $this->get_field_id('select'); ?>"
                            name="<?php echo $this->get_field_name('select'); ?>"
                            style="max-width:400px;" data-select_table="<?php echo $select; ?>">
                        <?php if(\app\includes\TPPlugin::$options['local']['currency'] == 'RUB'){ ?>
                            <option value="0">
                                <?php _ex('Select the table',
                                    'tp_plugin_widget_form_field_select_table_value_0_label', TPOPlUGIN_TEXTDOMAIN); ?>
                            </option>
                            <option value="1" <?php selected( $select, 1 ); ?>>
                                1. <?php _ex('Flights from origin to destination, One Way (next month)',
                                    'tp_plugin_widget_form_field_select_table_value_1_label', TPOPlUGIN_TEXTDOMAIN); ?>
                            </option>
                            <option value="2" <?php selected( $select, 2 ); ?>>
                                2. <?php _ex('Flights from Origin to Destination (next few days)',
                                    'tp_plugin_widget_form_field_select_table_value_2_label', TPOPlUGIN_TEXTDOMAIN); ?>
                            </option>
                            <!--<option value="3">3. Дешевые авиабилеты на празничные дни</option>-->
                            <option value="3" <?php selected( $select, 3 ); ?>>
                                3. <?php _ex('Cheapest Flights from origin to destination, Round-trip',
                                    'tp_plugin_widget_form_field_select_table_value_3_label', TPOPlUGIN_TEXTDOMAIN); ?>
                            </option>
                            <option value="4" <?php selected( $select, 4 ); ?>>
                                4. <?php _ex('Cheapest Flights from origin to destination (next month)',
                                    'tp_plugin_widget_form_field_select_table_value_4_label', TPOPlUGIN_TEXTDOMAIN); ?>
                            </option>
                            <option value="5" <?php selected( $select, 5 ); ?>>
                                5. <?php _ex('Cheapest Flights from origin to destination (next year)',
                                    'tp_plugin_widget_form_field_select_table_value_5_label', TPOPlUGIN_TEXTDOMAIN); ?>
                            </option>
                            <option value="6" <?php selected( $select, 6 ); ?>>
                                6. <?php _ex('Direct Flights from origin to destination',
                                    'tp_plugin_widget_form_field_select_table_value_6_label', TPOPlUGIN_TEXTDOMAIN); ?>
                            </option>
                            <option value="7" <?php selected( $select, 7 ); ?>>
                                7. <?php _ex('Direct Flights from origin',
                                    'tp_plugin_widget_form_field_select_table_value_7_label', TPOPlUGIN_TEXTDOMAIN); ?>
                            </option>
                            <option value="8" <?php selected( $select, 8 ); ?>>
                                8. <?php _ex('Popular Destinations from origin',
                                    'tp_plugin_widget_form_field_select_table_value_8_label', TPOPlUGIN_TEXTDOMAIN); ?>
                            </option>
                            <option value="9" <?php selected( $select, 9 ); ?>>
                                9. <?php _ex('Most popular flights within this Airlines',
                                    'tp_plugin_widget_form_field_select_table_value_9_label', TPOPlUGIN_TEXTDOMAIN); ?>
                            </option>
                            <!--<option value="10">10.// _e('Special offers airline', TPOPlUGIN_TEXTDOMAIN);</option>-->
                            <option value="11" <?php selected( $select, 11 ); ?>>
                                10. <?php _ex('Searched on our website',
                                    'tp_plugin_widget_form_field_select_table_value_11_label', TPOPlUGIN_TEXTDOMAIN); ?>
                            </option>
                            <option value="12" <?php selected( $select, 12 ); ?>>
                                11. <?php _ex('Cheap Flights from origin',
                                    'tp_plugin_widget_form_field_select_table_value_12_label', TPOPlUGIN_TEXTDOMAIN); ?>
                            </option>
                            <option value="13" <?php selected( $select, 13 ); ?>>
                                12. <?php _ex('Cheap Flights to destination',
                                    'tp_plugin_widget_form_field_select_table_value_13_label', TPOPlUGIN_TEXTDOMAIN); ?>
                            </option>
                        <?php } else { ?>
                            <option selected="selected" value="0">
                                <?php _ex('Select the table',
                                    'tp_plugin_widget_form_field_select_table_value_0_label', TPOPlUGIN_TEXTDOMAIN); ?>
                            </option>
                            <option value="1" <?php selected( $select, 1 ); ?>>
                                1. <?php _ex('Flights from origin to destination, One Way (next month)',
                                    'tp_plugin_widget_form_field_select_table_value_1_label', TPOPlUGIN_TEXTDOMAIN); ?>
                            </option>
                            <option value="2" <?php selected( $select, 2 ); ?>>
                                2.  <?php _ex('Flights from Origin to Destination (next few days)',
                                    'tp_plugin_widget_form_field_select_table_value_2_label', TPOPlUGIN_TEXTDOMAIN); ?>
                            </option>
                            <!--<option value="3">3. Дешевые авиабилеты на празничные дни</option>-->
                            <option value="3" <?php selected( $select, 3 ); ?>>
                                3. <?php _ex('Cheapest Flights from origin to destination, Round-trip',
                                    'tp_plugin_widget_form_field_select_table_value_3_label', TPOPlUGIN_TEXTDOMAIN); ?>
                            </option>
                            <option value="4" <?php selected( $select, 4 ); ?>>
                                4. <?php _ex('Cheapest Flights from origin to destination (next month)',
                                    'tp_plugin_widget_form_field_select_table_value_4_label', TPOPlUGIN_TEXTDOMAIN); ?>
                            </option>
                            <option value="5" <?php selected( $select, 5 ); ?>>
                                5. <?php _ex('Cheapest Flights from origin to destination (next year)',
                                    'tp_plugin_widget_form_field_select_table_value_5_label', TPOPlUGIN_TEXTDOMAIN); ?>
                            </option>
                            <option value="6" <?php selected( $select, 6 ); ?>>
                                6. <?php _ex('Direct Flights from origin to destination',
                                    'tp_plugin_widget_form_field_select_table_value_6_label', TPOPlUGIN_TEXTDOMAIN); ?>
                            </option>
                            <option value="7" <?php selected( $select, 7 ); ?>>
                                7. <?php _ex('Direct Flights from origin',
                                    'tp_plugin_widget_form_field_select_table_value_7_label', TPOPlUGIN_TEXTDOMAIN); ?>
                            </option>
                            <option value="9" <?php selected( $select, 9 ); ?>>
                                8.  <?php _ex('Most popular flights within this Airlines',
                                    'tp_plugin_widget_form_field_select_table_value_9_label', TPOPlUGIN_TEXTDOMAIN); ?>
                            </option>
                            <!--<option value="10">10. <?php// _e('Special offers airline', TPOPlUGIN_TEXTDOMAIN); ?></option>-->
                            <option value="11" <?php selected( $select, 11 ); ?>>
                                9. <?php _ex('Searched on our website',
                                    'tp_plugin_widget_form_field_select_table_value_11_label', TPOPlUGIN_TEXTDOMAIN); ?>
                            </option>
                            <option value="12" <?php selected( $select, 12 ); ?>>
                                10. <?php _ex('Cheap Flights from origin',
                                    'tp_plugin_widget_form_field_select_table_value_12_label', TPOPlUGIN_TEXTDOMAIN); ?>
                            </option>
                            <option value="13" <?php selected( $select, 13 ); ?>>
                                11. <?php _ex('Cheap Flights to destination',
                                    'tp_plugin_widget_form_field_select_table_value_13_label', TPOPlUGIN_TEXTDOMAIN); ?>
                            </option>
                        <?php }?>

                    </select>
                </label>
            </p>
            <p class="TP-OriginWidget">
                <label for="<?php echo $this->get_field_id('origin'); ?>">
                    <?php _ex('Origin',
                        'tp_plugin_widget_form_field_origin_label', TPOPlUGIN_TEXTDOMAIN); ?>:
                    <input placeholder="<?php echo $origin; ?>" type="text"
                           id="<?php echo $this->get_field_id('origin'); ?>"
                           name="<?php echo $this->get_field_name('origin'); ?>"
                            class="constructorCityWidgetsAutocomplete widefat"/>
                </label>
            </p>
            <p class="TP-DestinationWidget">
                <label for="<?php echo $this->get_field_id('destination'); ?>">
                    <?php _ex('Destination',
                        'tp_plugin_widget_form_field_destination_label', TPOPlUGIN_TEXTDOMAIN); ?>:
                    <input placeholder="<?php echo $destination; ?>" type="text"
                           id="<?php echo $this->get_field_id('destination'); ?>"
                           name="<?php echo $this->get_field_name('destination'); ?>"
                           class="constructorCityWidgetsAutocomplete widefat"/>
                </label>
            </p>
            <p class="TP-AirlineWidget">
                <label for="<?php echo $this->get_field_id('airline'); ?>">
                    <?php _ex('Airline',
                        'tp_plugin_widget_form_field_airline_label', TPOPlUGIN_TEXTDOMAIN); ?>:
                    <input placeholder="<?php echo $airline; ?>" type="text"
                           id="<?php echo $this->get_field_id('airline'); ?>"
                           name="<?php echo $this->get_field_name('airline'); ?>"
                           class="constructorAirlineWidgetsAutocomplete widefat"/>
                </label>
            </p>
            <p class="TP-LimitWidget">
                <label for="<?php echo $this->get_field_id('limit'); ?>">
                    <?php _ex('Limit',
                        'tp_plugin_widget_form_field_limit_label', TPOPlUGIN_TEXTDOMAIN); ?>:
                    <input value="<?php echo $limit; ?>" type="number"
                           id="<?php echo $this->get_field_id('limit'); ?>"
                           name="<?php echo $this->get_field_name('limit'); ?>"
                           class=""/>
                </label>
            </p>
            <p class="TP-PaginateWidget">
                <label for="<?php echo $this->get_field_id('paginate'); ?>">
                    <input type="checkbox" id="<?php echo $this->get_field_id('paginate'); ?>"
                           name="<?php echo $this->get_field_name('paginate'); ?>"
                           value="1" <?php checked($paginate, true)?>>
                    <?php _ex('Paginate',
                        'tp_plugin_widget_form_field_paginate_label', TPOPlUGIN_TEXTDOMAIN ); ?>
                </label>
            </p>
            <p class="TP-OneWayWidget">
                <label for="<?php echo $this->get_field_id('one_way'); ?>">
                    <input type="checkbox" id="<?php echo $this->get_field_id('one_way'); ?>"
                           name="<?php echo $this->get_field_name('one_way'); ?>"
                           value="1" <?php checked($one_way, true)?>>
                    <?php _ex('One Way',
                        'tp_plugin_widget_form_field_one_way_label', TPOPlUGIN_TEXTDOMAIN ); ?>
                </label>
            </p>
            <p class="TP-Off_TitleWidget">
                <label for="<?php echo $this->get_field_id('off_title'); ?>">
                    <input type="checkbox" id="<?php echo $this->get_field_id('off_title'); ?>"
                           name="<?php echo $this->get_field_name('off_title'); ?>"
                           value="1" <?php checked($off_title, true)?>>
                    <?php _ex('No title',
                        'tp_plugin_widget_form_field_off_title_label', TPOPlUGIN_TEXTDOMAIN ); ?>
                </label>
            </p>

            <p class="TP-StopsWidget">
                <label for="<?php echo $this->get_field_id('stops'); ?>">
                    <?php _ex('Number of stops',
                        'tp_plugin_widget_form_field_stops_label', TPOPlUGIN_TEXTDOMAIN); ?>:
                    <select id="<?php echo $this->get_field_id('stops'); ?>"
                            name="<?php echo $this->get_field_name('stops'); ?>">
                        <option value="0" <?php selected( $stops, 0 ); ?>>
                            <?php _ex('All', 'tp_plugin_widget_form_field_stops_value_0_label', TPOPlUGIN_TEXTDOMAIN ); ?></option>
                        <option value="1" <?php selected( $stops, 1 ); ?>>
                            <?php _ex('No more than one stop', 'tp_plugin_widget_form_field_stops_value_1_label', TPOPlUGIN_TEXTDOMAIN ); ?></option>
                        <option value="2" <?php selected( $stops, 2 ); ?>>
                            <?php  _ex('Direct', 'tp_plugin_widget_form_field_stops_value_2_label', TPOPlUGIN_TEXTDOMAIN ); ?></option>
                    </select>
                </label>
            </p>


        </div>
        <?php
    }
}