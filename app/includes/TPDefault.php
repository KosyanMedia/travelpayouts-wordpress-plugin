<?php
/**
 * Created by PhpStorm.
 * User: freeman
 * Date: 06.08.15
 * Time: 13:50
 */
namespace app\includes;
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

    public static function getDefaultCurrency(){
        $currency = 'USD';
        global $locale;
        switch($locale) {
            case "ru_RU":
                $currency = 'RUB';
                break;
            case "en_US":
                $currency = 'USD';
                break;
            default:
                $currency = 'RUB';
                break;
        }
        return $currency;
    }

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
        $currency = self::getDefaultCurrency();
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
                'cache_value' => 1,
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
                    'ru' => array(
                        'label_default' => array(
                            'flight_number' => _x('tp_plugin_local_ru_fields_table_label_default_flight_number',
                                '(Номер рейса)', TPOPlUGIN_TEXTDOMAIN),
                            'flight' => _x('tp_plugin_local_ru_fields_table_label_default_flight',
                                '(Рейс)', TPOPlUGIN_TEXTDOMAIN),
                            'departure_at' => _x('tp_plugin_local_ru_fields_table_label_default_departure_at',
                                '(Дата вылета)', TPOPlUGIN_TEXTDOMAIN),
                            'return_at' => _x('tp_plugin_local_ru_fields_table_label_default_return_at',
                                '(Дата возвращения)', TPOPlUGIN_TEXTDOMAIN),
                            'number_of_changes' => _x('tp_plugin_local_ru_fields_table_label_default_number_of_changes',
                                '(Пересадки)', TPOPlUGIN_TEXTDOMAIN),
                            'price' => _x('tp_plugin_local_ru_fields_table_label_default_price',
                                '(Стоимость)', TPOPlUGIN_TEXTDOMAIN),
                            'airline' => _x('tp_plugin_local_ru_fields_table_label_default_airline',
                                '(Авиакомпания)', TPOPlUGIN_TEXTDOMAIN),
                            'airline_logo' => _x('tp_plugin_local_ru_fields_table_label_default_airline_logo',
                                '(Лого авиакомпании)', TPOPlUGIN_TEXTDOMAIN),
                            'origin' => _x('tp_plugin_local_ru_fields_table_label_default_origin',
                                '(Откуда)', TPOPlUGIN_TEXTDOMAIN),
                            'destination' => _x('tp_plugin_local_ru_fields_table_label_default_destination',
                                '(Куда)', TPOPlUGIN_TEXTDOMAIN),
                            'place' => _x('tp_plugin_local_ru_fields_table_label_default_place',
                                '(Место)', TPOPlUGIN_TEXTDOMAIN),
                            'direction' => _x('tp_plugin_local_ru_fields_table_label_default_direction',
                                '(Направление)', TPOPlUGIN_TEXTDOMAIN),
                            'trip_class' => _x('tp_plugin_local_ru_fields_table_label_default_trip_class',
                                '(Класс перелета)', TPOPlUGIN_TEXTDOMAIN),
                            'distance' => _x('tp_plugin_local_ru_fields_table_label_default_distance',
                                '(Расстояние)', TPOPlUGIN_TEXTDOMAIN),
                            'price_distance' => _x('tp_plugin_local_ru_fields_table_label_default_price_distance',
                                '(Цена за километр)', TPOPlUGIN_TEXTDOMAIN),
                            'found_at' => _x('tp_plugin_local_ru_fields_table_label_default_found_at',
                                '(Когда найден)', TPOPlUGIN_TEXTDOMAIN),
                            'back_and_forth' => _x('tp_plugin_local_ru_fields_table_label_default_back_and_forth',
                                '(В одну/обе стороны)', TPOPlUGIN_TEXTDOMAIN),
                            'button' => _x('tp_plugin_local_ru_fields_table_label_default_button',
                                '(Кнопка)', TPOPlUGIN_TEXTDOMAIN),
                            'origin_destination' => _x('tp_plugin_local_ru_fields_table_label_default_origin_destination',
                                '(Откуда - Куда)', TPOPlUGIN_TEXTDOMAIN),
                        ),
                        'label' => array(
                            'flight_number' => _x('tp_plugin_local_ru_fields_table_label_flight_number',
                                '(Номер рейса)',TPOPlUGIN_TEXTDOMAIN),
                            'flight' => _x('tp_plugin_local_ru_fields_table_label_flight',
                                '(Рейс)',TPOPlUGIN_TEXTDOMAIN),
                            'departure_at' => _x('tp_plugin_local_ru_fields_table_label_departure_at',
                                '(Дата вылета)',TPOPlUGIN_TEXTDOMAIN),
                            'return_at' => _x('tp_plugin_local_ru_fields_table_label_return_at',
                                '(Дата возвращения)',TPOPlUGIN_TEXTDOMAIN),
                            'number_of_changes' => _x('tp_plugin_local_ru_fields_table_label_number_of_changes',
                                '(Пересадки)',TPOPlUGIN_TEXTDOMAIN),
                            'price' => _x('tp_plugin_local_ru_fields_table_label_price',
                                '(Стоимость)',TPOPlUGIN_TEXTDOMAIN),
                            'airline' => _x('tp_plugin_local_ru_fields_table_label_airline',
                                '(Авиакомпания)',TPOPlUGIN_TEXTDOMAIN),
                            'airline_logo' => _x('tp_plugin_local_ru_fields_table_label_airline_logo',
                                '(Авиакомпания)',TPOPlUGIN_TEXTDOMAIN),
                            'origin' => _x('tp_plugin_local_ru_fields_table_label_origin',
                                '(Откуда)',TPOPlUGIN_TEXTDOMAIN),
                            'destination' => _x('tp_plugin_local_ru_fields_table_label_destination',
                                '(Куда)',TPOPlUGIN_TEXTDOMAIN),
                            'place' => _x('tp_plugin_local_ru_fields_table_label_place',
                                '(Место)',TPOPlUGIN_TEXTDOMAIN),
                            'direction' => _x('tp_plugin_local_ru_fields_table_label_direction',
                                '(Направление)',TPOPlUGIN_TEXTDOMAIN),
                            'trip_class' => _x('tp_plugin_local_ru_fields_table_label_trip_class',
                                '(Класс перелета)',TPOPlUGIN_TEXTDOMAIN),
                            'distance' => _x('tp_plugin_local_ru_fields_table_label_distance',
                                '(Расстояние)',TPOPlUGIN_TEXTDOMAIN),
                            'price_distance' => _x('tp_plugin_local_ru_fields_table_label_price_distance',
                                '(Цена за километр)',TPOPlUGIN_TEXTDOMAIN),
                            'found_at' => _x('tp_plugin_local_ru_fields_table_label_found_at',
                                '(Когда найден)',TPOPlUGIN_TEXTDOMAIN),
                            'back_and_forth' => _x('tp_plugin_local_ru_fields_table_label_back_and_forth',
                                '(В одну/обе стороны)',TPOPlUGIN_TEXTDOMAIN),
                            'button' => _x('tp_plugin_local_ru_fields_table_label_button',
                                '(Найти билет)',TPOPlUGIN_TEXTDOMAIN),
                            'origin_destination' => _x('tp_plugin_local_ru_fields_table_label_origin_destination',
                                '(Откуда - Куда)',TPOPlUGIN_TEXTDOMAIN),
                        ),
                    ),
                    'en' => array(
                        'label_default' => array(
                            'flight_number' => _x('tp_plugin_local_en_fields_table_label_default_flight_number',
                                '(Flight number)',TPOPlUGIN_TEXTDOMAIN),
                            'flight' =>  _x('tp_plugin_local_en_fields_table_label_default_flight',
                                '(Flight)',TPOPlUGIN_TEXTDOMAIN),
                            'departure_at' =>  _x('tp_plugin_local_en_fields_table_label_default_departure_at',
                                '(Departure date)',TPOPlUGIN_TEXTDOMAIN),
                            'return_at' =>  _x('tp_plugin_local_en_fields_table_label_default_return_at',
                                '(Return date)',TPOPlUGIN_TEXTDOMAIN),
                            'number_of_changes' =>  _x('tp_plugin_local_en_fields_table_label_default_number_of_changes',
                                '(Stops)',TPOPlUGIN_TEXTDOMAIN),
                            'price' =>  _x('tp_plugin_local_en_fields_table_label_default_price',
                                '(Price)',TPOPlUGIN_TEXTDOMAIN),
                            'airline' =>  _x('tp_plugin_local_en_fields_table_label_default_airline',
                                '(Airlines)',TPOPlUGIN_TEXTDOMAIN),
                            'airline_logo' =>  _x('tp_plugin_local_en_fields_table_label_default_airline_logo',
                                '(Logo airlines)',TPOPlUGIN_TEXTDOMAIN),
                            'origin' =>  _x('tp_plugin_local_en_fields_table_label_default_origin',
                                '(Origin)',TPOPlUGIN_TEXTDOMAIN),
                            'destination' =>  _x('tp_plugin_local_en_fields_table_label_default_destination',
                                '(Destination)',TPOPlUGIN_TEXTDOMAIN),
                            'place' =>  _x('tp_plugin_local_en_fields_table_label_default_place',
                                '(Rank)',TPOPlUGIN_TEXTDOMAIN),
                            'direction' =>  _x('tp_plugin_local_en_fields_table_label_default_direction',
                                '(Direction)',TPOPlUGIN_TEXTDOMAIN),
                            'trip_class' =>  _x('tp_plugin_local_en_fields_table_label_default_trip_class',
                                '(Flight class)',TPOPlUGIN_TEXTDOMAIN),
                            'distance' => _x('tp_plugin_local_en_fields_table_label_default_distance',
                                    '(Distance)',TPOPlUGIN_TEXTDOMAIN),
                            'price_distance' =>  _x('tp_plugin_local_en_fields_table_label_default_price_distance',
                                '(Price/distance)',TPOPlUGIN_TEXTDOMAIN),
                            'found_at' =>  _x('tp_plugin_local_en_fields_table_label_default_found_at',
                                '(When found)',TPOPlUGIN_TEXTDOMAIN),
                            'back_and_forth' =>  _x('tp_plugin_local_en_fields_table_label_default_back_and_forth',
                                '(One way / Round-Trip)',TPOPlUGIN_TEXTDOMAIN),
                            'button' =>  _x('tp_plugin_local_en_fields_table_label_default_button',
                                '(Button)',TPOPlUGIN_TEXTDOMAIN),
                            'origin_destination' =>  _x('tp_plugin_local_en_fields_table_label_default_origin_destination',
                                '(Origin - Destination)',TPOPlUGIN_TEXTDOMAIN),
                        ),
                        'label' => array(
                            'flight_number' =>  _x('tp_plugin_local_en_fields_table_label_flight_number',
                                '(Flight number)',TPOPlUGIN_TEXTDOMAIN),
                            'flight' =>  _x('tp_plugin_local_en_fields_table_label_flight',
                                '(Flight)',TPOPlUGIN_TEXTDOMAIN),
                            'departure_at' =>  _x('tp_plugin_local_en_fields_table_label_departure_at',
                                '(Departure date)',TPOPlUGIN_TEXTDOMAIN),
                            'return_at' =>  _x('tp_plugin_local_en_fields_table_label_return_at',
                                '(Return date)',TPOPlUGIN_TEXTDOMAIN),
                            'number_of_changes' =>  _x('tp_plugin_local_en_fields_table_label_number_of_changes',
                                '(Stops)',TPOPlUGIN_TEXTDOMAIN),
                            'price' =>  _x('tp_plugin_local_en_fields_table_label_price',
                                '(Price)',TPOPlUGIN_TEXTDOMAIN),
                            'airline' =>  _x('tp_plugin_local_en_fields_table_label_airline',
                                '(Airlines)',TPOPlUGIN_TEXTDOMAIN),
                            'airline_logo' =>  _x('tp_plugin_local_en_fields_table_label_airline_logo',
                                '(Airlines)',TPOPlUGIN_TEXTDOMAIN),
                            'origin' =>  _x('tp_plugin_local_en_fields_table_label_origin',
                                '(Origin)',TPOPlUGIN_TEXTDOMAIN),
                            'destination' =>  _x('tp_plugin_local_en_fields_table_label_destination',
                                '(Destination)',TPOPlUGIN_TEXTDOMAIN),
                            'place' =>  _x('tp_plugin_local_en_fields_table_label_place',
                                '(Rank)',TPOPlUGIN_TEXTDOMAIN),
                            'direction' =>  _x('tp_plugin_local_en_fields_table_label_direction',
                                '(Direction)',TPOPlUGIN_TEXTDOMAIN),
                            'trip_class' =>  _x('tp_plugin_local_en_fields_table_label_trip_class',
                                '(Flight class)',TPOPlUGIN_TEXTDOMAIN),
                            'distance' =>  _x('tp_plugin_local_en_fields_table_label_distance',
                                '(Distance)',TPOPlUGIN_TEXTDOMAIN),
                            'price_distance' =>  _x('tp_plugin_local_en_fields_table_label_price_distance',
                                '(Price/distance)',TPOPlUGIN_TEXTDOMAIN),
                            'found_at' =>  _x('tp_plugin_local_en_fields_table_label_found_at',
                                '(When found)',TPOPlUGIN_TEXTDOMAIN),
                            'back_and_forth' =>  _x('tp_plugin_local_en_fields_table_label_back_and_forth',
                                '(One way / Round-Trip)',TPOPlUGIN_TEXTDOMAIN),
                            'button' =>  _x('tp_plugin_local_en_fields_table_label_button',
                                '(Find Ticket)',TPOPlUGIN_TEXTDOMAIN),
                            'origin_destination' =>  _x('tp_plugin_local_en_fields_table_label_origin_destination',
                                '(Origin - Destination)',TPOPlUGIN_TEXTDOMAIN),
                        ),
                    ),
                ),
                'title_case' => array(
                    'origin' => 'ro',
                    'destination' => 'vi',
                ),
            ),
            'shortcodes' => array(
                '1' => array(
                    'title' => array(
                        'en' => 'Flight Prices for a Month from origin to destination, One Way',
                        'ru' => 'Цены на месяц из origin в destination, в одну сторону'
                    ),
                    'tag' => 'h3',
                    'extra_table_marker' => 'calMonth',
                    'paginate' => 10,
                    'paginate_switch' => true,
                    'transplant' => 0,
                    'title_button' => array(
                        'en' => 'OW tickets from price',
                        'ru' => 'Билеты от price'
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
                        'en' => 'Flights from origin to destination for the Next Few Days',
                        'ru' => 'Билеты из origin в destination на ближайшие дни'
                    ),
                    'tag' => 'h3',
                    'plus_depart_date' => 1,
                    'plus_return_date' => 12,
                    'extra_table_marker' => 'calWeek',
                    'paginate' => 10,
                    'paginate_switch' => true,
                    'title_button' => array(
                        'en' => 'Tickets from price',
                        'ru' => 'Билеты от price'
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
                        'en' => 'The Cheapest Round-trip Tickets from origin to destination',
                        'ru' => 'Самые дешевые билеты из origin в destination и обратно'
                    ),
                    'tag' => 'h3',
                    'extra_table_marker' => 'direction',
                    'paginate' => 10,
                    'paginate_switch' => true,
                    'title_button' => array(
                        'en' => 'Tickets from price',
                        'ru' => 'Билеты от price'
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
                        'en' => 'The Cheapest Flights for this Month from origin to destination',
                        'ru' => 'Самые дешевые билеты  из origin в destination в этом месяце'
                    ),
                    'tag' => 'h3',
                    'extra_table_marker' => 'directionMonth',
                    'paginate' => 10,
                    'paginate_switch' => true,
                    'transplant' => 0,
                    'title_button' => array(
                        'en' => 'Tickets from price',
                        'ru' => 'Билеты от price'
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
                        'en' => 'The Cheapest Flights from origin to destination for the Year Ahead',
                        'ru' => 'Самые дешевые авиабилеты из origin в destination на год вперед'
                    ),
                    'tag' => 'h3',
                    'extra_table_marker' => 'direction12months',
                    'paginate' => 12,
                    'paginate_switch' => true,
                    'title_button' => array(
                        'en' => 'Tickets from price',
                        'ru' => 'Билеты от price'
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
                        'en' => 'Direct Flights from origin to destination',
                        'ru' => 'Билеты без пересадок из origin в destination'
                    ),
                    'tag' => 'h3',
                    'extra_table_marker' => 'directionNostops',
                    'paginate' => 10,
                    'paginate_switch' => true,
                    'title_button' => array(
                        'en' => 'Tickets from price',
                        'ru' => 'Билеты от price'
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
                        'en' => 'Direct Flights from origin',
                        'ru' => 'Билеты без пересадок из origin'
                    ),
                    'tag' => 'h3',
                    'extra_table_marker' => 'nostopsFrom',
                    'limit' => 10,
                    'paginate' => 10,
                    'paginate_switch' => true,
                    'title_button' => array(
                        'en' => 'Tickets from price',
                        'ru' => 'Билеты от price'
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
                        'en' => 'Popular Destinations from origin',
                        'ru' => 'Популярные направления из origin'
                    ),
                    'tag' => 'h3',
                    'extra_table_marker' => 'popularCity',
                    'paginate' => 10,
                    'paginate_switch' => true,
                    'title_button' => array(
                        'en' => 'Tickets from price',
                        'ru' => 'Билеты от price'
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
                        'en' => 'Airline\'s popular flights airline',
                        'ru' =>  'Популярные направления авиакомпании airline',
                    ),
                    'tag' => 'h3',
                    'limit' => 10,
                    'extra_table_marker' => 'popularAirlines',
                    'paginate' => 10,
                    'paginate_switch' => true,
                    'title_button' => array(
                        'en' => 'Find tickets',
                        'ru' => 'Узнать цену'
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
                        'en' => 'Special offer airlines',
                        'ru' =>  'Спецпредложения авиакомпаний',
                    ),
                    'tag' => 'h3',
                    'paginate' => 10,
                    'paginate_switch' => true,
                    'title_button' => array(
                        'en' => 'Find tickets on price',
                        'ru' => 'Билеты от price'
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
                        'en' => 'Flights That Have Been Found on Our Website',
                        'ru' =>  'На нашем сайте искали',
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
                        'en' => 'Tickets from price',
                        'ru' => 'Билеты от price'
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
                        'en' => 'Cheap Flights from origin',
                        'ru' =>  'Дешевые перелеты из origin',
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
                        'en' => 'Tickets from price',
                        'ru' => 'Билеты от price'
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
                        'en' => 'Cheap Flights to destination',
                        'ru' =>  'Дешевые перелеты в destination',
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
                        'en' => 'Tickets from price',
                        'ru' => 'Билеты от price'
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
}