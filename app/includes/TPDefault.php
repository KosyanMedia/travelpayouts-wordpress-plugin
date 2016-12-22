<?php
/**
 * Created by PhpStorm.
 * User: freeman
 * Date: 06.08.15
 * Time: 13:50
 */
namespace app\includes;

use \app\includes\common\TPCurrencyUtils;

class TPDefault implements  \core\TPODefault{
    public  static $defaultTableStyle = array(
        'title_style' => array(
            'color' => '#191e23',
            'font_style' => array(),
            'font_size' => 22,
            'font_family' => 'Arial',
        ),
        'table' => array(
            'color' => '#262626',
            'font_style' => array(),
            'font_size' => 13,
            'font_family' => 'Arial',
            'line_type' => 'solid',
            'line_size' => 1,
            'line_color' => '#f2f2f2',
            'background_color' => '#f2f2f2',
            'head_color' => '#1db1db',
            'head_text_color' => '#ffffff',
        ),
        'button' => array(
            'background' => '#FEB20E',
            //'color' => '#571601',
            'color' => ' #FFFFFF',
            'border' => '#ce6408',
            'font_style' => array(
                'bold' => 1
            )

        )
    );



    public static function getDefaultLocal(){
        $localization = 2;
        global $locale;
        switch($locale) {
            case "ru_RU":
                $localization = 1;
                break;
            case "en_US":
                $localization = 2;
                break;
            case "th_TH":
                $localization = 3;
                break;
            default:
                $localization = 1;
                break;
        }
        return $localization;
    }

    /**
     * @return array
     */
    public static function defaultOptions()
    {
        // TODO: Implement defaultOptions() method.
        $localization = self::getDefaultLocal();
        $currency = TPCurrencyUtils::getDefaultCurrency();
        $defaults = array(
            'account' => array(
                'marker' => '',
                'extra_marker' => 'wpplugin',
                'token' => '',
                'white_label' => '',
            ),
            'config' =>array(
                'redirect' => 0,
                'message_error' => array(
                    'en' => _x('tp_plugin_request_api_error_msg_message_error_en',
                        '(Something went wrong, please try to update a page)', TPOPlUGIN_TEXTDOMAIN),
                    'ru' =>   _x('tp_plugin_request_api_error_msg_message_error_ru',
                        '(Что-то пошло не так, обновите страницу)', TPOPlUGIN_TEXTDOMAIN),
                ),
                'target_url' => 0,
                'nofollow' => 0,
                'script' => 1,
                'after_url' => 1,
                'cache' => 1,
                'cache_value' => 3,
                'airline_logo_size' => array(
                    'width' => 100,
                    'height' => 35
                ),
                'distance' => 1,
                'format_date' => 'd.m.Y',
                'code_ga_ym' => '',
                'code_table_ga_ym' => '',
                'compact_button' => 1,
                'media_button' => array(
                    'view' => 1
                )
            ),
            'local' => array(
                'host' => '',
                'localization' => $localization,
                'currency' => $currency,
                'fields' => array(
                    'ru' => \app\includes\common\TPFieldsLabelTable::getFieldsLabelRU(),
                    'en' => \app\includes\common\TPFieldsLabelTable::getFieldsLabelEN(),
                    'th' => \app\includes\common\TPFieldsLabelTable::getFieldsLabelTH(),
                ),
                'title_case' => array(
                    'origin' => 'ro',
                    'destination' => 'vi',
                ),
            ),
            'shortcodes' => array(
                '1' => array(
                    'title' => array(
                        'en' => _x('tp_plugin_local_en_table_shortcodes_1_title',
                            '(Flight Prices for a Month from origin to destination, One Way)', TPOPlUGIN_TEXTDOMAIN),
                        'ru' => _x('tp_plugin_local_ru_table_shortcodes_1_title',
                            '(Цены на месяц из origin в destination, в одну сторону)', TPOPlUGIN_TEXTDOMAIN),
                    ),
                    'tag' => 'h3',
                    'extra_table_marker' => 'calMonth',
                    'paginate' => 10,
                    'paginate_switch' => true,
                    'transplant' => 0,
                    'title_button' => array(
                        'en' => _x('tp_plugin_local_en_table_shortcodes_1_title_btn',
                            '(OW tickets from price)', TPOPlUGIN_TEXTDOMAIN),
                        'ru' => _x('tp_plugin_local_ru_table_shortcodes_1_title_btn',
                            '(Билеты от price)', TPOPlUGIN_TEXTDOMAIN),
                    ),
                    'sort_column' => 0,
                    'selected' => array(
                        'departure_at',//'depart_date',
                        'number_of_changes',
                        'button',
                    ),
                    'fields' => array(
                        'departure_at',//'depart_date',
                        'price',
                        'number_of_changes',
                        'trip_class',
                        'distance',
                        'button',
                    ),
                ),
                '2' => array(
                    //Календарь цен на неделю по маршруту из origin в destination
                    'title' => array(
                        'en' => _x('tp_plugin_local_en_table_shortcodes_2_title',
                            '(Flights from origin to destination for the Next Few Days)', TPOPlUGIN_TEXTDOMAIN),
                        'ru' => _x('tp_plugin_local_ru_table_shortcodes_2_title',
                            '(Билеты из origin в destination на ближайшие дни)', TPOPlUGIN_TEXTDOMAIN),
                    ),
                    'tag' => 'h3',
                    'plus_depart_date' => 1,
                    'plus_return_date' => 12,
                    'extra_table_marker' => 'calWeek',
                    'paginate' => 10,
                    'paginate_switch' => true,
                    'title_button' => array(
                        'en' => _x('tp_plugin_local_en_table_shortcodes_2_title_btn',
                            '(Tickets from price)', TPOPlUGIN_TEXTDOMAIN),
                        'ru' => _x('tp_plugin_local_ru_table_shortcodes_2_title_btn',
                            '(Билеты от price)', TPOPlUGIN_TEXTDOMAIN),
                    ),
                    'sort_column' => 0,
                    'selected' => array(
                        'departure_at',
                        'number_of_changes',
                        'button',
                    ),
                    'fields' => array(
                        'departure_at',
                        'return_at',
                        'price',
                        'number_of_changes',
                        'trip_class',
                        'distance',
                        'button',
                    ),

                ),
                /*'3' => array(
                    'title' => 'Дешевые авиабилеты на празничные дни из origin в destination',
                    'tag' => 'h3',
                    'paginate' => 10,
                    'title_button' => 'Найти билет от price',
                    'selected' => array(
                        'departure_date',
                        'price',
                        'return_date',),
                    'label_default' => array(
                        'en' => array(
                            'depart_date' => 'Departure date',
                            'price' => 'Price',
                            'return_date' => 'Return date',
                        ),
                        'ru' => array(
                            'departure_date' => 'Дата вылета',
                            'price' => 'Стоимость',
                            'return_date' => 'Дата возвращения',
                        )
                    ),
                    'label' => array(
                        'departure_date' => 'Дата вылета',
                        'price' => 'Стоимость',
                        'return_date' => 'Дата возвращения',
                    )
                ),*/
                '4' => array(
                    'title' => array(
                        'en' => _x('tp_plugin_local_en_table_shortcodes_4_title',
                            '(The Cheapest Round-trip Tickets from origin to destination)', TPOPlUGIN_TEXTDOMAIN),
                        'ru' => _x('tp_plugin_local_ru_table_shortcodes_4_title',
                            '(Самые дешевые билеты из origin в destination и обратно)', TPOPlUGIN_TEXTDOMAIN),
                    ),
                    'tag' => 'h3',
                    'extra_table_marker' => 'direction',
                    'paginate' => 10,
                    'paginate_switch' => true,
                    'title_button' => array(
                        'en' => _x('tp_plugin_local_en_table_shortcodes_4_title_btn',
                            '(Tickets from price)', TPOPlUGIN_TEXTDOMAIN),
                        'ru' => _x('tp_plugin_local_ru_table_shortcodes_4_title_btn',
                            '(Билеты от price)', TPOPlUGIN_TEXTDOMAIN),
                    ),
                    'sort_column' => 0,
                    'selected' => array(
                        'departure_at',
                        'return_at',
                        'number_of_changes',
                        'airline_logo',
                        'button',
                    ),
                    'fields' => array(
                        'flight_number',
                        'flight',
                        'departure_at',
                        'return_at',
                        'number_of_changes',
                        'price',
                        'airline',
                        'airline_logo',
                        'button',
                    )
                ),
                '5' => array(
                    'title' => array(
                        'en' =>  _x('tp_plugin_local_en_table_shortcodes_5_title',
                            '(The Cheapest Flights for this Month from origin to destination)', TPOPlUGIN_TEXTDOMAIN),
                        'ru' =>  _x('tp_plugin_local_ru_table_shortcodes_5_title',
                            '(Самые дешевые билеты  из origin в destination в этом месяце)', TPOPlUGIN_TEXTDOMAIN),
                    ),
                    'tag' => 'h3',
                    'extra_table_marker' => 'directionMonth',
                    'paginate' => 10,
                    'paginate_switch' => true,
                    'transplant' => 0,
                    'title_button' => array(
                        'en' =>  _x('tp_plugin_local_en_table_shortcodes_5_title_btn',
                            '(Tickets from price)', TPOPlUGIN_TEXTDOMAIN),
                        'ru' =>  _x('tp_plugin_local_ru_table_shortcodes_5_title_btn',
                            '(Билеты от price)', TPOPlUGIN_TEXTDOMAIN),
                    ),
                    'sort_column' => 4,
                    'selected' => array(
                        'departure_at',
                        'return_at',
                        'number_of_changes',
                        'airline_logo',
                        'button',
                    ),
                    'fields' => array(
                        'flight_number',
                        'flight',
                        'departure_at',
                        'return_at',
                        'number_of_changes',
                        'price',
                        'airline',
                        'airline_logo',
                        'button',

                    )
                ),
                '6' => array(
                    'title' => array(
                        'en' => _x('tp_plugin_local_en_table_shortcodes_6_title',
                            '(The Cheapest Flights from origin to destination for the Year Ahead)', TPOPlUGIN_TEXTDOMAIN),
                        'ru' => _x('tp_plugin_local_ru_table_shortcodes_6_title',
                            '(Самые дешевые авиабилеты из origin в destination на год вперед)', TPOPlUGIN_TEXTDOMAIN),
                    ),
                    'tag' => 'h3',
                    'extra_table_marker' => 'direction12months',
                    'paginate' => 12,
                    'paginate_switch' => true,
                    'title_button' => array(
                        'en' => _x('tp_plugin_local_en_table_shortcodes_6_title_btn',
                            '(Tickets from price)', TPOPlUGIN_TEXTDOMAIN),
                        'ru' => _x('tp_plugin_local_ru_table_shortcodes_6_title_btn',
                            '(Билеты от price)', TPOPlUGIN_TEXTDOMAIN),
                    ),
                    'sort_column' => 0,
                    'selected' => array(
                        'departure_at',
                        'return_at',
                        'number_of_changes',
                        'airline_logo',
                        'button',
                    ),
                    'fields' => array(
                        'flight_number',
                        'flight',
                        'departure_at',
                        'return_at',
                        'number_of_changes',
                        'price',
                        'airline',
                        'airline_logo',
                        'button',

                    )
                ),
                '7' => array(
                    'title' => array(
                        'en' => _x('tp_plugin_local_en_table_shortcodes_7_title',
                            '(Direct Flights from origin to destination)', TPOPlUGIN_TEXTDOMAIN),
                        'ru' => _x('tp_plugin_local_ru_table_shortcodes_7_title',
                            '(Билеты без пересадок из origin в destination)', TPOPlUGIN_TEXTDOMAIN),
                    ),
                    'tag' => 'h3',
                    'extra_table_marker' => 'directionNostops',
                    'paginate' => 10,
                    'paginate_switch' => true,
                    'title_button' => array(
                        'en' => _x('tp_plugin_local_en_table_shortcodes_7_title_btn',
                            '(Tickets from price)', TPOPlUGIN_TEXTDOMAIN),
                        'ru' => _x('tp_plugin_local_ru_table_shortcodes_7_title_btn',
                            '(Билеты от price)', TPOPlUGIN_TEXTDOMAIN),
                    ),
                    'sort_column' => 0,
                    'selected' => array(
                        'departure_at',
                        'return_at',
                        'airline_logo',
                        'button',
                    ),
                    'fields' => array(
                        'flight_number',
                        'flight',
                        'departure_at',
                        'return_at',
                        'price',
                        'airline',
                        'airline_logo',
                        'button',
                    )

                ),
                '8' => array(
                    'title' => array(
                        'en' => _x('tp_plugin_local_en_table_shortcodes_8_title',
                            '(Direct Flights from origin)', TPOPlUGIN_TEXTDOMAIN),
                        'ru' => _x('tp_plugin_local_ru_table_shortcodes_8_title',
                            '(Билеты без пересадок из origin)', TPOPlUGIN_TEXTDOMAIN),
                    ),
                    'tag' => 'h3',
                    'extra_table_marker' => 'nostopsFrom',
                    'limit' => 10,
                    'paginate' => 10,
                    'paginate_switch' => true,
                    'title_button' => array(
                        'en' => _x('tp_plugin_local_en_table_shortcodes_8_title_btn',
                            '(Tickets from price)', TPOPlUGIN_TEXTDOMAIN),
                        'ru' => _x('tp_plugin_local_ru_table_shortcodes_8_title_btn',
                            '(Билеты от price)', TPOPlUGIN_TEXTDOMAIN),
                    ),
                    'sort_column' => 4,
                    'selected' => array(
                        'destination',
                        'departure_at',
                        'return_at',
                        'airline_logo',
                        'button',
                    ),
                    'fields' => array(
                        'flight_number',
                        'flight',
                        'departure_at',
                        'return_at',
                        'price',
                        'airline',
                        'airline_logo',
                        'destination',
                        'button',
                        'origin_destination'
                    )

                ),
                '9' => array(
                    'title' => array(
                        'en' => _x('tp_plugin_local_en_table_shortcodes_9_title',
                            '(Popular Destinations from origin)', TPOPlUGIN_TEXTDOMAIN),
                        'ru' => _x('tp_plugin_local_ru_table_shortcodes_9_title',
                            '(Популярные направления из origin)', TPOPlUGIN_TEXTDOMAIN),
                    ),
                    'tag' => 'h3',
                    'extra_table_marker' => 'popularCity',
                    'paginate' => 10,
                    'paginate_switch' => true,
                    'title_button' => array(
                        'en' => _x('tp_plugin_local_en_table_shortcodes_9_title_btn',
                            '(Tickets from price)', TPOPlUGIN_TEXTDOMAIN),
                        'ru' => _x('tp_plugin_local_ru_table_shortcodes_9_title_btn',
                            '(Билеты от price)', TPOPlUGIN_TEXTDOMAIN),
                    ),
                    'sort_column' => 4,
                    'selected' => array(
                        'destination',
                        'departure_at',
                        'return_at',
                        'airline_logo',
                        'button',
                    ),
                    'fields' => array(
                        'flight_number',
                        'flight',
                        'departure_at',
                        'return_at',
                        'price',
                        'airline',
                        'airline_logo',
                        'destination',
                        'button',
                        'origin_destination'
                    )
                ),
                '10' => array(
                    'title' => array(
                        'en' =>  _x('tp_plugin_local_en_table_shortcodes_10_title',
                            '(Airline\'s popular flights airline)', TPOPlUGIN_TEXTDOMAIN),
                        'ru' =>   _x('tp_plugin_local_ru_table_shortcodes_10_title',
                            '(Популярные направления авиакомпании airline)', TPOPlUGIN_TEXTDOMAIN),
                    ),
                    'tag' => 'h3',
                    'limit' => 10,
                    'extra_table_marker' => 'popularAirlines',
                    'paginate' => 10,
                    'paginate_switch' => true,
                    'title_button' => array(
                        'en' => _x('tp_plugin_local_en_table_shortcodes_10_title_btn',
                            '(Find tickets)', TPOPlUGIN_TEXTDOMAIN),
                        'ru' => _x('tp_plugin_local_ru_table_shortcodes_10_title_btn',
                            '(Узнать цену)', TPOPlUGIN_TEXTDOMAIN),
                    ),
                    'sort_column' => 0,
                    'selected' => array('place', 'direction', 'button'),
                    'fields' => array(
                        'place',
                        'direction',
                        'button'
                    )
                ),
                '11' => array(
                    'title' => array(
                        'en' =>  _x('tp_plugin_local_en_table_shortcodes_11_title',
                            '(Special offer airlines)', TPOPlUGIN_TEXTDOMAIN),
                        'ru' =>  _x('tp_plugin_local_ru_table_shortcodes_11_title',
                            '(Спецпредложения авиакомпаний)', TPOPlUGIN_TEXTDOMAIN),
                    ),
                    'tag' => 'h3',
                    'paginate' => 10,
                    'paginate_switch' => true,
                    'title_button' => array(
                        'en' =>  _x('tp_plugin_local_en_table_shortcodes_11_title_btn',
                            '(Find tickets on price)', TPOPlUGIN_TEXTDOMAIN),
                        'ru' => _x('tp_plugin_local_ru_table_shortcodes_11_title_btn',
                            '(Билеты от price)', TPOPlUGIN_TEXTDOMAIN),
                    ),
                    'sort_column' => 0,
                    'selected' => array(
                        'origin',
                        'destination',
                        'trip_class',
                        'back_and_forth',
                        'button',
                    ),
                    'fields' => array(
                        'origin',
                        'destination',
                        'trip_class',
                        'back_and_forth',
                        'price',
                        'button',
                        'origin_destination'
                    )
                ),
                //"depart_date""return_date"
                '12' => array(
                    'title' => array(
                        'en' =>  _x('tp_plugin_local_en_table_shortcodes_12_title',
                            '(Flights That Have Been Found on Our Website)', TPOPlUGIN_TEXTDOMAIN),
                        'ru' =>   _x('tp_plugin_local_ru_table_shortcodes_12_title',
                            '(На нашем сайте искали)', TPOPlUGIN_TEXTDOMAIN),
                    ),
                    'tag' => 'h3',
                    'limit' => 100,
                    'period_type' => 'year',
                    'sort' => 0,
                    'extra_table_marker' => 'onOurWebsite',
                    'paginate' => 10,
                    'paginate_switch' => true,
                    'transplant' => 0,
                    'title_button' => array(
                        'en' => _x('tp_plugin_local_en_table_shortcodes_12_title_btn',
                            '(Tickets from price)', TPOPlUGIN_TEXTDOMAIN),
                        'ru' => _x('tp_plugin_local_ru_table_shortcodes_12_title_btn',
                            '(Билеты от price)', TPOPlUGIN_TEXTDOMAIN),
                    ),
                    'sort_column' => 0,
                    'selected' => array(
                        'origin_destination',
                        'departure_at',
                        'return_at',
                        'button',
                    ),
                    'fields' => array(
                        'origin',
                        'destination',
                        'departure_at',
                        'return_at',
                        'found_at',
                        'price',
                        'number_of_changes',
                        'trip_class',
                        'distance',
                        'price_distance',
                        'button',
                        'origin_destination'
                    )
                ),
                '13' => array(
                    'title' => array(
                        'en' => _x('tp_plugin_local_en_table_shortcodes_13_title',
                            '(Cheap Flights from origin)', TPOPlUGIN_TEXTDOMAIN),
                        'ru' =>  _x('tp_plugin_local_ru_table_shortcodes_13_title',
                            '(Дешевые перелеты из origin)', TPOPlUGIN_TEXTDOMAIN),
                    ),
                    'tag' => 'h3',
                    'period_type' => 'year',
                    'limit' => 100,
                    'sort' => 2,
                    'extra_table_marker' => 'fromCity',
                    'paginate' => 10,
                    'paginate_switch' => true,
                    'transplant' => 0,
                    'title_button' => array(
                        'en' => _x('tp_plugin_local_en_table_shortcodes_13_title_btn',
                            '(Tickets from price)', TPOPlUGIN_TEXTDOMAIN),
                        'ru' => _x('tp_plugin_local_ru_table_shortcodes_13_title_btn',
                            '(Билеты от price)', TPOPlUGIN_TEXTDOMAIN),
                    ),
                    'sort_column' => 3,
                    'selected' => array(
                        'destination',
                        'departure_at',
                        'return_at',
                        'button',
                    ),
                    'fields' => array(
                        'origin',
                        'destination',
                        'departure_at',
                        'return_at',
                        'found_at',
                        'price',
                        'number_of_changes',
                        'trip_class',
                        'distance',
                        'price_distance',
                        'button',
                        'origin_destination'
                    ),

                ),
                '14' => array(
                    'title' => array(
                        'en' => _x('tp_plugin_local_en_table_shortcodes_14_title',
                            '(Cheap Flights to destination)', TPOPlUGIN_TEXTDOMAIN),
                        'ru' =>  _x('tp_plugin_local_ru_table_shortcodes_14_title',
                            '(Дешевые перелеты в destination)', TPOPlUGIN_TEXTDOMAIN),
                    ),
                    'tag' => 'h3',
                    'period_type' => 'year',
                    'limit' => 100,
                    'sort' => 2,
                    'extra_table_marker' => 'toCity',
                    'paginate' => 10,
                    'paginate_switch' => true,
                    'transplant' => 0,
                    'title_button' => array(
                        'en' => _x('tp_plugin_local_en_table_shortcodes_14_title_btn',
                            '(Tickets from price)', TPOPlUGIN_TEXTDOMAIN),
                        'ru' => _x('tp_plugin_local_en_table_shortcodes_14_title_btn',
                            '(Билеты от price)', TPOPlUGIN_TEXTDOMAIN),
                    ),
                    'sort_column' => 3,
                    'selected' => array(
                        'origin',
                        'departure_at',
                        'return_at',
                        'button',
                    ),
                    'fields' => array(
                        'origin',
                        'destination',
                        'departure_at',
                        'return_at',
                        'found_at',
                        'price',
                        'number_of_changes',
                        'trip_class',
                        'distance',
                        'price_distance',
                        'button',
                        'origin_destination'
                    ),
                ),

            ),
            'shortcodes_settings' => array(
                'empty' => array(
                    'type' => 3,
                    'value' => array(
                        0 => array(
                            'en' => _x('tp_plugin_local_en_table_shortcodes_settings_link_msg',
                                '(Unfortunately we don\'t have actual data for flights from {origin} to {destination}. [link title="Find tickets from {origin} to {destination}"])', TPOPlUGIN_TEXTDOMAIN),
                            'ru' => _x('tp_plugin_local_ru_table_shortcodes_settings_link_msg',
                                '(К сожалению, сейчас у нас нет данных по перелетам из {origin} {destination}. [link title="К поиску билетов {origin} {destination}"])', TPOPlUGIN_TEXTDOMAIN),
                        ),
                        1 => '',
                        2 =>  array(
                            'en' => _x('tp_plugin_local_en_table_shortcodes_settings_button_msg',
                                '(Unfortunately we don\'t have actual data for flights from {origin} to {destination}. [button title="Find tickets from {origin} to {destination}"])', TPOPlUGIN_TEXTDOMAIN),
                            'ru' => _x('tp_plugin_local_ru_table_shortcodes_settings_button_msg',
                                '(К сожалению, сейчас у нас нет данных по перелетам из {origin} {destination}. [button title="Найти билеты {origin} - {destination}"])', TPOPlUGIN_TEXTDOMAIN),
                        ),
                        3 => ''
                    )
                )
            ),
            'themes_table' => array(
                'name' => self::getRandomThemesTable()
            ),
            'style_table' => array(
                'title_style' => array(
                    'color' => '#191e23',
                    'font_style' => array(),
                    'font_size' => 22,
                    'font_family' => 'Arial',
                ),
                'table' => array(
                    'color' => '#262626',
                    'font_style' => array(),
                    'font_size' => 13,
                    'font_family' => 'Arial',
                    'line_type' => 'solid',
                    'line_size' => 1,
                    'line_color' => '#f2f2f2',
                    'background_color' => '#f2f2f2',
                    'head_color' => '#1db1db',
                    'head_text_color' => '#ffffff',
                ),
                'button' => array(
                    'background' => '#FEB20E',
                    //'color' => '#571601',
                    'color' => '#FFFFFF',
                    'border' => '#ce6408',
                    'font_style' => array(
                        'bold' => 1
                    )

                )
            ),
            'widgets' => array(
                '1' => array(
                    //'direct' => false,
                    'extra_widget_marker' => '',
                    'width' => '500',
                    'height' => '500'
                ),
                '2' => array(
                    'extra_widget_marker' => '',
                    'width' => '500',
                    'height' => '500',
                    'base_diameter' => 16,
                    'color' => '#00b1dd',
                    'map_color' => '#00b1dd',
                    'contrast_color' => '#ffffff',
                    'zoom' => 12
                ),
                '3' => array(
                    'extra_widget_marker' => '',
                    'origin' => '',
                    'destination' => '',
                    'width' => '800',
                    'period' => 'year',
                    'period_day' => array(
                        'from' => 7,
                        'to' => 14,
                    ),
                    'responsive' => 1,
                ),
                '4' => array(
                    'extra_widget_marker' => '',
                    'origin' => '',
                    'destination' => '',
                    'width' => '500',
                    'color' => '#00b1dd',
                    'responsive' => 1,
                ),
                '5' => array(
                    'extra_widget_marker' => '',
                    'width' => '500',
                    'responsive' => 1,
                ),
                '6' => array(
                    'extra_widget_marker' => '',
                    'width' => '260',
                    'responsive' => 1,
                    'count' => 3,
                ),
                '7' => array(
                    'limit' => 10,
                    'type' => 'full',
                    'width' => '800',
                    'responsive' => 1,
                    'cat1' => '3stars',
                    'cat2' => 'distance',
                    'cat3' => 'tophotels'

                ),
                '8' => array(
                    'width' => '800',
                    'responsive' => 1,
                    'type' => 'brickwork',
                    'limit' => 9,
                    'filter' => 0,

                )

            ),
            'admin_settings' => array(
            ),
            'auto_repl_link' => array(
                'active' => 1,
                'all_link' => 1,
                'limit' => 2,
                'not_title' => 1,
            )
        );
        $defaults = apply_filters('travelpayouts_defaults', $defaults );
        return $defaults;
    }

    public static function getRandomThemesTable(){
        $TPFlightTicketsModel = new \app\includes\models\admin\menu\TPFlightTicketsModel();
        if(!function_exists("array_column"))
        {
            $themesNames = self::array_column($TPFlightTicketsModel->getThemesTables(), 'name');
        } else {
            $themesNames = array_column($TPFlightTicketsModel->getThemesTables(), 'name');
        }

        return $themesNames[array_rand($themesNames)];
    }

    public static function array_column($array,$column_name)
    {
        return array_map(function($element) use($column_name){return $element[$column_name];}, $array);
    }
}