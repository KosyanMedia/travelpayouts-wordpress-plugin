<?php
/**
 * Created by PhpStorm.
 * User: freeman
 * Date: 06.08.15
 * Time: 13:50
 */
namespace app\includes;

use app\includes\common\TPCurrencyUtils;
use app\includes\common\TPFieldsLabelTable;
use app\includes\common\TPThemes;
use core\TPODefault;

class TPDefault implements  TPODefault{
    public  static $defaultTableStyle = [
        'title_style' => [
            'color' => '#191e23',
            'font_style' => [],
            'font_size' => 22,
            'font_family' => 'Arial',
        ],
        'table' => [
            'color' => '#262626',
            'font_style' => [],
            'font_size' => 13,
            'font_family' => 'Arial',
            'line_type' => 'solid',
            'line_size' => 1,
            'line_color' => '#f2f2f2',
            'background_color' => '#f2f2f2',
            'head_color' => '#1db1db',
            'head_text_color' => '#ffffff',
        ],
        'button' => [
            'background' => '#FEB20E',
            //'color' => '#571601',
            'color' => ' #FFFFFF',
            'border' => '#ce6408',
            'font_style' => [
                'bold' => 1
            ]

        ]
    ];



    public static function getDefaultLocal(){
        $localization = 2;
        global $locale;
        switch($locale) {
            case 'ru_RU':
                $localization = 1;
                break;
            case 'en_US':
                $localization = 2;
                break;
            case 'th_TH':
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
        $defaults = [
            'account' => [
                'marker' => '',
                'extra_marker' => 'wpplugin',
                'token' => '',
                'white_label' => '',
                'white_label_hotel' => '',
            ],
            'config' => [
                'redirect' => 0,
                'message_error' => [
                    'en' => _x('Something went wrong, please try to update a page',
                        'tp_plugin_request_api_error_msg_message_error_en', TPOPlUGIN_TEXTDOMAIN),
                    'ru' =>   _x('Something went wrong, please try to update a page',
                        'tp_plugin_request_api_error_msg_message_error_ru', TPOPlUGIN_TEXTDOMAIN),
                ],
                'target_url' => 0,
                'nofollow' => 0,
                'script' => 1,
                'after_url' => 1,
                'hotel_after_url' => 1,
                'cache' => 1,
                //'cache_value' => 3,
                'cache_value' => [
                    'hotel' => 24,
                    'flight' => 3,
                ],
                'airline_logo_size' => [
                    'width' => 100,
                    'height' => 35
                ],
                'distance' => 1,
                'format_date' => 'd.m.Y',
                'code_ga_ym' => '',
                'code_table_ga_ym' => '',
                'compact_button' => 1,
                'media_button' => [
                    'view' => 1
                ]
            ],
            'local' => [
                'host' => '',
                'host_hotel' => '',
                'localization' => $localization,
                'currency' => $currency,
                'currency_symbol_display' => 0,
                'fields' => [
                    'ru' => TPFieldsLabelTable::getFieldsLabelRU(),
                    'en' => TPFieldsLabelTable::getFieldsLabelEN(),
                    'th' => TPFieldsLabelTable::getFieldsLabelTH(),
                ],
                'hotels_fields' => [
                    'ru' => TPFieldsLabelTable::getHotelsFieldsLabelRU(),
                    'en' => TPFieldsLabelTable::getHotelsFieldsLabelEN(),
                ],
                'railway_fields' => [
                	'ru' => TPFieldsLabelTable::getRailwayFieldsLabelRU(),
                	'en' => TPFieldsLabelTable::getRailwayFieldsLabelEN(),
                ],
                'title_case' => [
                    'origin' => 'ro',
                    'destination' => 'vi',
                ],
            ],
            'shortcodes' => [
                '1' => [
                    'title' => [
                        'en' => _x('Flight Prices for a Month from origin to destination, One Way',
                            'tp_plugin_local_en_table_shortcodes_1_title', TPOPlUGIN_TEXTDOMAIN),
                        'ru' => _x('Flight Prices for a Month from origin to destination, One Way',
                            'tp_plugin_local_ru_table_shortcodes_1_title', TPOPlUGIN_TEXTDOMAIN),
                    ],
                    'tag' => 'h3',
                    'extra_table_marker' => 'calMonth',
                    'paginate' => 10,
                    'paginate_switch' => true,
                    'transplant' => 0,
                    'title_button' => [
                        'en' => _x('OW tickets from price',
                            'tp_plugin_local_en_table_shortcodes_1_title_btn', TPOPlUGIN_TEXTDOMAIN),
                        'ru' => _x('OW tickets from price',
                            'tp_plugin_local_ru_table_shortcodes_1_title_btn', TPOPlUGIN_TEXTDOMAIN),
                    ],
                    'sort_column' => 0,
                    'selected' => [
                        'departure_at',//'depart_date',
                        'number_of_changes',
                        'button',
                    ],
                    'fields' => [
                        'departure_at',//'depart_date',
                        'price',
                        'number_of_changes',
                        'trip_class',
                        'distance',
                        'button',
                    ],
                ],
                '2' => [
                    //Календарь цен на неделю по маршруту из origin в destination
                    'title' => [
                        'en' => _x('Flights from origin to destination for the Next Few Days',
                            'tp_plugin_local_en_table_shortcodes_2_title', TPOPlUGIN_TEXTDOMAIN),
                        'ru' => _x('Flights from origin to destination for the Next Few Days',
                            'tp_plugin_local_ru_table_shortcodes_2_title', TPOPlUGIN_TEXTDOMAIN),
                    ],
                    'tag' => 'h3',
                    'plus_depart_date' => 1,
                    'plus_return_date' => 12,
                    'extra_table_marker' => 'calWeek',
                    'paginate' => 10,
                    'paginate_switch' => true,
                    'title_button' => [
                        'en' => _x('Tickets from price',
                            'tp_plugin_local_en_table_shortcodes_2_title_btn', TPOPlUGIN_TEXTDOMAIN),
                        'ru' => _x('Tickets from price',
                            'tp_plugin_local_ru_table_shortcodes_2_title_btn', TPOPlUGIN_TEXTDOMAIN),
                    ],
                    'sort_column' => 0,
                    'selected' => [
                        'departure_at',
                        'number_of_changes',
                        'button',
                    ],
                    'fields' => [
                        'departure_at',
                        'return_at',
                        'price',
                        'number_of_changes',
                        'trip_class',
                        'distance',
                        'button',
                    ],

                ],
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
                '4' => [
                    'title' => [
                        'en' => _x('The Cheapest Round-trip Tickets from origin to destination',
                            'tp_plugin_local_en_table_shortcodes_4_title', TPOPlUGIN_TEXTDOMAIN),
                        'ru' => _x('The Cheapest Round-trip Tickets from origin to destination',
                            'tp_plugin_local_ru_table_shortcodes_4_title', TPOPlUGIN_TEXTDOMAIN),
                    ],
                    'tag' => 'h3',
                    'extra_table_marker' => 'direction',
                    'paginate' => 10,
                    'paginate_switch' => true,
                    'title_button' => [
                        'en' => _x('Tickets from price',
                            'tp_plugin_local_en_table_shortcodes_4_title_btn', TPOPlUGIN_TEXTDOMAIN),
                        'ru' => _x('Tickets from price',
                            'tp_plugin_local_ru_table_shortcodes_4_title_btn', TPOPlUGIN_TEXTDOMAIN),
                    ],
                    'sort_column' => 0,
                    'selected' => [
                        'departure_at',
                        'return_at',
                        'number_of_changes',
                        'airline_logo',
                        'button',
                    ],
                    'fields' => [
                        'flight_number',
                        'flight',
                        'departure_at',
                        'return_at',
                        'number_of_changes',
                        'price',
                        'airline',
                        'airline_logo',
                        'button',
                    ]
                ],
                '5' => [
                    'title' => [
                        'en' =>  _x('The Cheapest Flights for this Month from origin to destination',
                            'tp_plugin_local_en_table_shortcodes_5_title', TPOPlUGIN_TEXTDOMAIN),
                        'ru' =>  _x('The Cheapest Flights for this Month from origin to destination',
                            'tp_plugin_local_ru_table_shortcodes_5_title', TPOPlUGIN_TEXTDOMAIN),
                    ],
                    'tag' => 'h3',
                    'extra_table_marker' => 'directionMonth',
                    'paginate' => 10,
                    'paginate_switch' => true,
                    'transplant' => 0,
                    'title_button' => [
                        'en' =>  _x('Tickets from price',
                            'tp_plugin_local_en_table_shortcodes_5_title_btn', TPOPlUGIN_TEXTDOMAIN),
                        'ru' =>  _x('Tickets from price',
                            'tp_plugin_local_ru_table_shortcodes_5_title_btn', TPOPlUGIN_TEXTDOMAIN),
                    ],
                    'sort_column' => 4,
                    'selected' => [
                        'departure_at',
                        'return_at',
                        'number_of_changes',
                        'airline_logo',
                        'button',
                    ],
                    'fields' => [
                        'flight_number',
                        'flight',
                        'departure_at',
                        'return_at',
                        'number_of_changes',
                        'price',
                        'airline',
                        'airline_logo',
                        'button',

                    ]
                ],
                '6' => [
                    'title' => [
                        'en' => _x('The Cheapest Flights from origin to destination for the Year Ahead',
                            'tp_plugin_local_en_table_shortcodes_6_title', TPOPlUGIN_TEXTDOMAIN),
                        'ru' => _x('The Cheapest Flights from origin to destination for the Year Ahead',
                            'tp_plugin_local_ru_table_shortcodes_6_title', TPOPlUGIN_TEXTDOMAIN),
                    ],
                    'tag' => 'h3',
                    'extra_table_marker' => 'direction12months',
                    'paginate' => 12,
                    'paginate_switch' => true,
                    'title_button' => [
                        'en' => _x('Tickets from price',
                            'tp_plugin_local_en_table_shortcodes_6_title_btn', TPOPlUGIN_TEXTDOMAIN),
                        'ru' => _x('Tickets from price',
                            'tp_plugin_local_ru_table_shortcodes_6_title_btn', TPOPlUGIN_TEXTDOMAIN),
                    ],
                    'sort_column' => 0,
                    'selected' => [
                        'departure_at',
                        'return_at',
                        'number_of_changes',
                        'airline_logo',
                        'button',
                    ],
                    'fields' => [
                        'flight_number',
                        'flight',
                        'departure_at',
                        'return_at',
                        'number_of_changes',
                        'price',
                        'airline',
                        'airline_logo',
                        'button',

                    ]
                ],
                '7' => [
                    'title' => [
                        'en' => _x('Direct Flights from origin to destination',
                            'tp_plugin_local_en_table_shortcodes_7_title', TPOPlUGIN_TEXTDOMAIN),
                        'ru' => _x('Direct Flights from origin to destination',
                            'tp_plugin_local_ru_table_shortcodes_7_title', TPOPlUGIN_TEXTDOMAIN),
                    ],
                    'tag' => 'h3',
                    'extra_table_marker' => 'directionNostops',
                    'paginate' => 10,
                    'paginate_switch' => true,
                    'title_button' => [
                        'en' => _x('Tickets from price',
                            'tp_plugin_local_en_table_shortcodes_7_title_btn', TPOPlUGIN_TEXTDOMAIN),
                        'ru' => _x('Tickets from price',
                            'tp_plugin_local_ru_table_shortcodes_7_title_btn', TPOPlUGIN_TEXTDOMAIN),
                    ],
                    'sort_column' => 0,
                    'selected' => [
                        'departure_at',
                        'return_at',
                        'airline_logo',
                        'button',
                    ],
                    'fields' => [
                        'flight_number',
                        'flight',
                        'departure_at',
                        'return_at',
                        'price',
                        'airline',
                        'airline_logo',
                        'button',
                    ]

                ],
                '8' => [
                    'title' => [
                        'en' => _x('Direct Flights from origin',
                            'tp_plugin_local_en_table_shortcodes_8_title', TPOPlUGIN_TEXTDOMAIN),
                        'ru' => _x('Direct Flights from origin',
                            'tp_plugin_local_ru_table_shortcodes_8_title', TPOPlUGIN_TEXTDOMAIN),
                    ],
                    'tag' => 'h3',
                    'extra_table_marker' => 'nostopsFrom',
                    'limit' => 10,
                    'paginate' => 10,
                    'paginate_switch' => true,
                    'title_button' => [
                        'en' => _x('Tickets from price',
                            'tp_plugin_local_en_table_shortcodes_8_title_btn', TPOPlUGIN_TEXTDOMAIN),
                        'ru' => _x('Tickets from price',
                            'tp_plugin_local_ru_table_shortcodes_8_title_btn', TPOPlUGIN_TEXTDOMAIN),
                    ],
                    'sort_column' => 4,
                    'selected' => [
                        'destination',
                        'departure_at',
                        'return_at',
                        'airline_logo',
                        'button',
                    ],
                    'fields' => [
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
                    ]

                ],
                '9' => [
                    'title' => [
                        'en' => _x('Popular Destinations from origin',
                            'tp_plugin_local_en_table_shortcodes_9_title', TPOPlUGIN_TEXTDOMAIN),
                        'ru' => _x('Popular Destinations from origin',
                            'tp_plugin_local_ru_table_shortcodes_9_title', TPOPlUGIN_TEXTDOMAIN),
                    ],
                    'tag' => 'h3',
                    'extra_table_marker' => 'popularCity',
                    'paginate' => 10,
                    'paginate_switch' => true,
                    'title_button' => [
                        'en' => _x('Tickets from price',
                            'tp_plugin_local_en_table_shortcodes_9_title_btn', TPOPlUGIN_TEXTDOMAIN),
                        'ru' => _x('Tickets from price',
                            'tp_plugin_local_ru_table_shortcodes_9_title_btn', TPOPlUGIN_TEXTDOMAIN),
                    ],
                    'sort_column' => 4,
                    'selected' => [
                        'destination',
                        'departure_at',
                        'return_at',
                        'airline_logo',
                        'button',
                    ],
                    'fields' => [
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
                    ]
                ],
                '10' => [
                    'title' => [
                        'en' =>  _x('Airline\'s popular flights airline',
                            'tp_plugin_local_en_table_shortcodes_10_title', TPOPlUGIN_TEXTDOMAIN),
                        'ru' =>   _x('Airline\'s popular flights airline',
                            'tp_plugin_local_ru_table_shortcodes_10_title', TPOPlUGIN_TEXTDOMAIN),
                    ],
                    'tag' => 'h3',
                    'limit' => 10,
                    'extra_table_marker' => 'popularAirlines',
                    'paginate' => 10,
                    'paginate_switch' => true,
                    'title_button' => [
                        'en' => _x('Find tickets',
                            'tp_plugin_local_en_table_shortcodes_10_title_btn', TPOPlUGIN_TEXTDOMAIN),
                        'ru' => _x('Find tickets',
                            'tp_plugin_local_ru_table_shortcodes_10_title_btn', TPOPlUGIN_TEXTDOMAIN),
                    ],
                    'sort_column' => 0,
                    'selected' => ['place', 'direction', 'button'],
                    'fields' => [
                        'place',
                        'direction',
                        'button'
                    ]
                ],
                '11' => [
                    'title' => [
                        'en' =>  _x('Special offer airlines',
                            'tp_plugin_local_en_table_shortcodes_11_title', TPOPlUGIN_TEXTDOMAIN),
                        'ru' =>  _x('Special offer airlines',
                            'tp_plugin_local_ru_table_shortcodes_11_title', TPOPlUGIN_TEXTDOMAIN),
                    ],
                    'tag' => 'h3',
                    'paginate' => 10,
                    'paginate_switch' => true,
                    'title_button' => [
                        'en' =>  _x('Find tickets on price',
                            'tp_plugin_local_en_table_shortcodes_11_title_btn', TPOPlUGIN_TEXTDOMAIN),
                        'ru' => _x('Find tickets on price',
                            'tp_plugin_local_ru_table_shortcodes_11_title_btn', TPOPlUGIN_TEXTDOMAIN),
                    ],
                    'sort_column' => 0,
                    'selected' => [
                        'origin',
                        'destination',
                        'trip_class',
                        'back_and_forth',
                        'button',
                    ],
                    'fields' => [
                        'origin',
                        'destination',
                        'trip_class',
                        'back_and_forth',
                        'price',
                        'button',
                        'origin_destination'
                    ]
                ],
                //"depart_date""return_date"
                '12' => [
                    'title' => [
                        'en' =>  _x('Flights That Have Been Found on Our Website',
                            'tp_plugin_local_en_table_shortcodes_12_title', TPOPlUGIN_TEXTDOMAIN),
                        'ru' =>   _x('Flights That Have Been Found on Our Website',
                            'tp_plugin_local_ru_table_shortcodes_12_title', TPOPlUGIN_TEXTDOMAIN),
                    ],
                    'tag' => 'h3',
                    'limit' => 100,
                    'period_type' => 'year',
                    'sort' => 0,
                    'extra_table_marker' => 'onOurWebsite',
                    'paginate' => 10,
                    'paginate_switch' => true,
                    'transplant' => 0,
                    'title_button' => [
                        'en' => _x('Tickets from price',
                            'tp_plugin_local_en_table_shortcodes_12_title_btn', TPOPlUGIN_TEXTDOMAIN),
                        'ru' => _x('Tickets from price',
                            'tp_plugin_local_ru_table_shortcodes_12_title_btn', TPOPlUGIN_TEXTDOMAIN),
                    ],
                    'sort_column' => 0,
                    'selected' => [
                        'origin_destination',
                        'departure_at',
                        'return_at',
                        'button',
                    ],
                    'fields' => [
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
                    ]
                ],
                '13' => [
                    'title' => [
                        'en' => _x('Cheap Flights from origin',
                            'tp_plugin_local_en_table_shortcodes_13_title', TPOPlUGIN_TEXTDOMAIN),
                        'ru' =>  _x('Cheap Flights from origin',
                            'tp_plugin_local_ru_table_shortcodes_13_title', TPOPlUGIN_TEXTDOMAIN),
                    ],
                    'tag' => 'h3',
                    'period_type' => 'year',
                    'limit' => 100,
                    'sort' => 2,
                    'extra_table_marker' => 'fromCity',
                    'paginate' => 10,
                    'paginate_switch' => true,
                    'transplant' => 0,
                    'title_button' => [
                        'en' => _x('Tickets from price',
                            'tp_plugin_local_en_table_shortcodes_13_title_btn', TPOPlUGIN_TEXTDOMAIN),
                        'ru' => _x('Tickets from price',
                            'tp_plugin_local_ru_table_shortcodes_13_title_btn', TPOPlUGIN_TEXTDOMAIN),
                    ],
                    'sort_column' => 3,
                    'selected' => [
                        'destination',
                        'departure_at',
                        'return_at',
                        'button',
                    ],
                    'fields' => [
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
                    ],

                ],
                '14' => [
                    'title' => [
                        'en' => _x('Cheap Flights to destination',
                            'tp_plugin_local_en_table_shortcodes_14_title', TPOPlUGIN_TEXTDOMAIN),
                        'ru' =>  _x('Cheap Flights to destination',
                            'tp_plugin_local_ru_table_shortcodes_14_title', TPOPlUGIN_TEXTDOMAIN),
                    ],
                    'tag' => 'h3',
                    'period_type' => 'year',
                    'limit' => 100,
                    'sort' => 2,
                    'extra_table_marker' => 'toCity',
                    'paginate' => 10,
                    'paginate_switch' => true,
                    'transplant' => 0,
                    'title_button' => [
                        'en' => _x('Tickets from price',
                            'tp_plugin_local_en_table_shortcodes_14_title_btn', TPOPlUGIN_TEXTDOMAIN),
                        'ru' => _x('Tickets from price',
                            'tp_plugin_local_ru_table_shortcodes_14_title_btn', TPOPlUGIN_TEXTDOMAIN),
                    ],
                    'sort_column' => 3,
                    'selected' => [
                        'origin',
                        'departure_at',
                        'return_at',
                        'button',
                    ],
                    'fields' => [
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
                    ],
                ],

            ],
            'shortcodes_settings' => [
                'empty' => [
                    'type' => 3,
                    'value' => [
                        0 => [
                            'en' => _x('Unfortunately we don\'t have actual data for flights from {origin} to {destination}. [link title="Find tickets from {origin} to {destination}"]',
                                'tp_plugin_local_en_table_shortcodes_settings_link_msg', TPOPlUGIN_TEXTDOMAIN),
                            'ru' => _x('Unfortunately we don\'t have actual data for flights from {origin} to {destination}. [link title="Find tickets from {origin} to {destination}"]',
                                'tp_plugin_local_ru_table_shortcodes_settings_link_msg', TPOPlUGIN_TEXTDOMAIN),
                        ],
                        1 => '',
                        2 =>  [
                            'en' => _x('Unfortunately we don\'t have actual data for flights from {origin} to {destination}. [button title="Find tickets from {origin} to {destination}"]',
                                'tp_plugin_local_en_table_shortcodes_settings_button_msg', TPOPlUGIN_TEXTDOMAIN),
                            'ru' => _x('Unfortunately we don\'t have actual data for flights from {origin} to {destination}. [button title="Find tickets from {origin} to {destination}"]',
                                'tp_plugin_local_ru_table_shortcodes_settings_button_msg', TPOPlUGIN_TEXTDOMAIN),
                        ],
                        3 => ''
                    ]
                ]
            ],
            'themes_table' => [
                'name' => self::getRandomThemesTable()
            ],
            'style_table' => [
                'title_style' => [
                    'color' => '#191e23',
                    'font_style' => [],
                    'font_size' => 22,
                    'font_family' => 'Arial',
                ],
                'table' => [
                    'color' => '#262626',
                    'font_style' => [],
                    'font_size' => 13,
                    'font_family' => 'Arial',
                    'line_type' => 'solid',
                    'line_size' => 1,
                    'line_color' => '#f2f2f2',
                    'background_color' => '#f2f2f2',
                    'head_color' => '#1db1db',
                    'head_text_color' => '#ffffff',
                ],
                'button' => [
                    'background' => '#FEB20E',
                    //'color' => '#571601',
                    'color' => '#FFFFFF',
                    'border' => '#ce6408',
                    'font_style' => [
                        'bold' => 1
                    ]

                ]
            ],
            'widgets' => [
                '1' => [
                    //'direct' => false,
                    'extra_widget_marker' => '',
                    'width' => '500',
                    'height' => '500'
                ],
                '2' => [
                    'extra_widget_marker' => '',
                    'width' => '500',
                    'height' => '500',
                    'base_diameter' => 16,
                    'color' => '#00b1dd',
                    'map_color' => '#00b1dd',
                    'contrast_color' => '#ffffff',
                    'zoom' => 12,
                ],
                '3' => [
                    'extra_widget_marker' => '',
                    'origin' => '',
                    'destination' => '',
                    'width' => '800',
                    'period' => 'year',
                    'period_day' => [
                        'from' => 7,
                        'to' => 14,
                    ],
                    'responsive' => 1,
                    'powered_by' => 1
                ],
                '4' => [
                    'extra_widget_marker' => '',
                    'origin' => '',
                    'destination' => '',
                    'width' => '500',
                    'color' => '#00b1dd',
                    'responsive' => 1,
                ],
                '5' => [
                    'extra_widget_marker' => '',
                    'width' => '500',
                    'responsive' => 1,
                    'powered_by' => 1
                ],
                '6' => [
                    'extra_widget_marker' => '',
                    'width' => '260',
                    'responsive' => 1,
                    'count' => 3,
                    'powered_by' => 1
                ],
                '7' => [
                    'limit' => 10,
                    'type' => 'full',
                    'width' => '800',
                    'responsive' => 1,
                    'cat1' => '3stars',
                    'cat2' => 'popularity', //distance
                    'cat3' => 'distance', //tophotels
                    'powered_by' => 1

                ],
                '8' => [
                    'width' => '800',
                    'responsive' => 1,
                    'type' => 'brickwork',
                    'limit' => 9,
                    'filter' => 0,
                    'powered_by' => 1
                ]

            ],
            'admin_settings' => [
            ],
            'auto_repl_link' => [
                'active' => 1,
                'all_link' => 1,
                'limit' => 2,
                'not_title' => 1,
            ],
            'themes_table_hotels' => [
                'name' => self::getRandomThemesTable()
            ],
            'shortcodes_hotels' => [
                //Подборка отелей - Скидки
                '1' => [
                    'title' => [
                        'en' => _x('Hotels {location}: {selection_name}',
                            'tp_plugin_local_en_table_shortcodes_hotels_1_title', TPOPlUGIN_TEXTDOMAIN),
                        'ru' =>  _x('Hotels {location}: {selection_name}',
                            'tp_plugin_local_ru_table_shortcodes_hotels_1_title', TPOPlUGIN_TEXTDOMAIN),
                    ],
                    'tag' => 'h3',
                    'extra_table_marker' => 'hotelsSelections',
                    'paginate' => 10,
                    'paginate_switch' => true,
                    'title_button' => [
                        'en' => _x('View Hotel',
                            'tp_plugin_local_en_table_shortcodes_hotels_1_title_btn', TPOPlUGIN_TEXTDOMAIN),
                        'ru' => _x('View Hotel',
                            'tp_plugin_local_ru_table_shortcodes_hotels_1_title_btn', TPOPlUGIN_TEXTDOMAIN),
                    ],
                    'sort_column' => 3,
                    'selected' => [
                        // Отель
                        'name',
                        // Звездность
                        'stars',
                        // Скидка
                        'discount',
                        // Старая новая цена
                        'old_price_and_new_price',
                        /*'rating',
                        'distance',
                        'price_pn',
                        'old_price_pn',*/
                        // Кнопка
                        'button',
                    ],
                    'fields' => [
                        'name',
                        'stars',
                        'discount',
                        'old_price_and_new_price',
                        'price_pn',
                        'old_price_and_discount',
                        'distance',
                        'old_price_pn',
                        'rating',
                        'button',
                    ],
                ],
                //Подборки отелей на даты
                '2' => [
                    'title' => [
                        'en' => _x('Hotels {location}: {selection_name} ({dates})',
                            'tp_plugin_local_en_table_shortcodes_hotels_2_title', TPOPlUGIN_TEXTDOMAIN),
                        'ru' =>  _x('Hotels {location}: {selection_name} ({dates})',
                            'tp_plugin_local_ru_table_shortcodes_hotels_2_title', TPOPlUGIN_TEXTDOMAIN),
                    ],
                    'tag' => 'h3',
                    'extra_table_marker' => 'hotelsSelections',
                    'paginate' => 10,
                    'paginate_switch' => true,
                    'title_button' => [
                        'en' => _x('View Hotel',
                            'tp_plugin_local_en_table_shortcodes_hotels_2_title_btn', TPOPlUGIN_TEXTDOMAIN),
                        'ru' => _x('View Hotel',
                            'tp_plugin_local_ru_table_shortcodes_hotels_2_title_btn', TPOPlUGIN_TEXTDOMAIN),
                    ],
                    'sort_column' => 3,
                    'selected' => [
                        'name',
                        'stars',
                        'rating',
                        //'distance',
                        'price_pn',
                        'button',
                    ],
                    'fields' => [
                        'name',
                        'stars',
                        'price_pn',
                        'distance',
                        'rating',
                        'button',
                    ],
                ],
                //Отели Города по цене ОТ-ДО
                '3' => [
                    'title' => [
                        'en' => _x('location hotels with price from priceAvgMin to priceAvgMax',
                            'tp_plugin_local_en_table_shortcodes_hotels_3_title', TPOPlUGIN_TEXTDOMAIN),
                        'ru' =>  _x('location hotels with price from priceAvgMin to priceAvgMax',
                            'tp_plugin_local_ru_table_shortcodes_hotels_3_title', TPOPlUGIN_TEXTDOMAIN),
                    ],
                    'tag' => 'h3',
                    'extra_table_marker' => 'hotelsFromTo',
                    'paginate' => 10,
                    'paginate_switch' => true,
                    'title_button' => [
                        'en' => _x('Book now',
                            'tp_plugin_local_en_table_shortcodes_hotels_3_title_btn', TPOPlUGIN_TEXTDOMAIN),
                        'ru' => _x('Book now',
                            'tp_plugin_local_ru_table_shortcodes_hotels_3_title_btn', TPOPlUGIN_TEXTDOMAIN),
                    ],
                    'sort_column' => 0,
                    'selected' => [
                        'name',
                        'stars',
                        'distance',
                        'rating',
                        'address',
                        'property_type',
                        'popularity',
                        'price_from',
                        'price_avg',
                        'button',
                    ],
                    'fields' => [
                        'name',
                        'stars',
                        'distance',
                        'rating',
                        'address',
                        'property_type',
                        'popularity',
                        'price_from',
                        'price_avg',
                        'button',
                    ],
                ],
                //Отели в городе по звездам
                '4' => [
                    'title' => [
                        'en' => _x('location hotels with stars stars',
                            'tp_plugin_local_en_table_shortcodes_hotels_4_title', TPOPlUGIN_TEXTDOMAIN),
                        'ru' =>  _x('location hotels with stars stars ',
                            'tp_plugin_local_ru_table_shortcodes_hotels_4_title', TPOPlUGIN_TEXTDOMAIN),
                    ],
                    'tag' => 'h3',
                    'extra_table_marker' => 'hotelsStars',
                    'paginate' => 10,
                    'paginate_switch' => true,
                    'title_button' => [
                        'en' => _x('Book now',
                            'tp_plugin_local_en_table_shortcodes_hotels_4_title_btn', TPOPlUGIN_TEXTDOMAIN),
                        'ru' => _x('Book now',
                            'tp_plugin_local_ru_table_shortcodes_hotels_4_title_btn', TPOPlUGIN_TEXTDOMAIN),
                    ],
                    'sort_column' => 0,
                    'selected' => [
                        'name',
                        'stars',
                        'distance',
                        'rating',
                        'address',
                        'property_type',
                        'popularity',
                        'price_from',
                        'price_avg',
                        'button',
                    ],
                    'fields' => [
                        'name',
                        'stars',
                        'distance',
                        'rating',
                        'address',
                        'property_type',
                        'popularity',
                        'price_from',
                        'price_avg',
                        'button',
                    ],
                ],
                //Стоимость проживания В ГОРОДЕ на Х дней
                '5' => [
                    'title' => [
                        'en' => _x('Stay price in location for number days',
                            'tp_plugin_local_en_table_shortcodes_hotels_5_title', TPOPlUGIN_TEXTDOMAIN),
                        'ru' =>  _x('Stay price in location for number days',
                            'tp_plugin_local_ru_table_shortcodes_hotels_5_title', TPOPlUGIN_TEXTDOMAIN),
                    ],
                    'tag' => 'h3',
                    'extra_table_marker' => 'hotelsPrice',
                    'paginate' => 10,
                    'paginate_switch' => true,
                    'title_button' => [
                        'en' => _x('Book now',
                            'tp_plugin_local_en_table_shortcodes_hotels_5_title_btn', TPOPlUGIN_TEXTDOMAIN),
                        'ru' => _x('Book now',
                            'tp_plugin_local_ru_table_shortcodes_hotels_5_title_btn', TPOPlUGIN_TEXTDOMAIN),
                    ],
                    'sort_column' => 0,
                    'selected' => [
                        'name',
                        'stars',
                        'distance',
                        'rating',
                        'address',
                        'property_type',
                        'popularity',
                        'price_from',
                        'price_avg',
                        'button',
                    ],
                    'fields' => [
                        'name',
                        'stars',
                        'distance',
                        'rating',
                        'address',
                        'property_type',
                        'popularity',
                        'price_from',
                        'price_avg',
                        'button',
                    ],
                ],
                //Стоимость проживания В ГОРОДЕ на уикенд
                '6' => [
                    'title' => [
                        'en' => _x('Stay price in location for weekend',
                            'tp_plugin_local_en_table_shortcodes_hotels_6_title', TPOPlUGIN_TEXTDOMAIN),
                        'ru' =>  _x('Stay price in location for weekend',
                            'tp_plugin_local_ru_table_shortcodes_hotels_6_title', TPOPlUGIN_TEXTDOMAIN),
                    ],
                    'tag' => 'h3',
                    'extra_table_marker' => 'hotelsPriceWeekend',
                    'paginate' => 10,
                    'paginate_switch' => true,
                    'title_button' => [
                        'en' => _x('Book now',
                            'tp_plugin_local_en_table_shortcodes_hotels_6_title_btn', TPOPlUGIN_TEXTDOMAIN),
                        'ru' => _x('Book now',
                            'tp_plugin_local_ru_table_shortcodes_hotels_6_title_btn', TPOPlUGIN_TEXTDOMAIN),
                    ],
                    'sort_column' => 0,
                    'selected' => [
                        'name',
                        'stars',
                        'distance',
                        'rating',
                        'address',
                        'property_type',
                        'popularity',
                        'price_from',
                        'price_avg',
                        'button',
                    ],
                    'fields' => [
                        'name',
                        'stars',
                        'distance',
                        'rating',
                        'address',
                        'property_type',
                        'popularity',
                        'price_from',
                        'price_avg',
                        'button',
                    ],
                ],
            ],
	        'themes_table_railway' => [
		        'name' => self::getRandomThemesTable()
            ],
            'railway' => [
				'active' => 0
            ],
	        'shortcodes_railway' => [
	        	'1' => [
			        'title' => [
				        'en' => _x('Train schedule {origin} — {destination}',
					        'local en table shortcodes railway 1 title text', TPOPlUGIN_TEXTDOMAIN),
				        'ru' => _x('Train schedule {origin} — {destination}',
					        'local ru table shortcodes railway 1 title text', TPOPlUGIN_TEXTDOMAIN),
                    ],
			        'tag' => 'h3',
			        'extra_table_marker' => 'calMonth',
			        'paginate' => 10,
	        		'paginate_switch' => true,
			        'title_button' => [
				        'en' => _x('Select date',
					        'local en table shortcodes railway 1 title_button text', TPOPlUGIN_TEXTDOMAIN),
				        'ru' => _x('Select date',
					        'local ru table shortcodes railway 1 title_button text', TPOPlUGIN_TEXTDOMAIN),
                    ],
			        'sort_column' => 0,
			        'selected' => [
				        'train',
				        'route',
				        'departure',
				        'arrival',
				        'duration',
				        'prices',
				        'dates',
                    ],
			        'fields' => [
				        'train',
						'route',
						'departure',
						'arrival',
						'duration',
						'prices',
						'dates',
						'origin',
						'destination',
						'departure_time',
						'arrival_time',
						'route_first_station',
						'route_last_station',
                    ],

                ]
            ],
        ];
        $defaults = apply_filters('travelpayouts_defaults', $defaults );
        return $defaults;
    }

    public static function getRandomThemesTable(){
        $themes = TPThemes::getThemesTables();
        if(!function_exists('array_column'))
        {
            $themesNames = self::array_column($themes, 'name');
        } else {
            $themesNames = array_column($themes, 'name');
        }

        return $themesNames[array_rand($themesNames)];
    }

    public static function array_column($array,$column_name)
    {
        return array_map(function($element) use($column_name){return $element[$column_name];}, $array);
    }
}
