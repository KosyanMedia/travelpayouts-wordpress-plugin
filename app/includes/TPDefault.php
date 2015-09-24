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
            'responsive' => 1,
            'head_color' => '#1db1db',
            'head_text_color' => '#ffffff',
        ),
        'button' => array(
            ''
        )
    );

    /**
     * @return array
     */
    public static function defaultOptions()
    {
        global $locale;
        switch($locale) {
            case "ru_RU":
                $localization = 1;
                $currency = 1;
                break;
            case "en_US":
                $localization = 2;
                $currency = 2;
                break;
            default:
                $localization = 1;
                $currency = 1;
                break;
        }
        // TODO: Implement defaultOptions() method.
        $defaults = array(
            'account' => array(
                'marker' => '',
                'extra_marker' => 'wpplugin',
                'token' => '',
                'white_label' => ''
            ),
            'config' =>array(
                'redirect' => 0,
                'message_error' => array(
                    'en' => 'Something went wrong, please try to update a page',
                    'ru' =>  'Что-то пошло не так, обновите страницу',
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
            ),
            'local' => array(
                'localization' => $localization,
                'currency' => $currency,
                'fields' => array(
                    'ru' => array(
                        'label_default' => array(
                            'flight_number' => 'Номер рейса',
                            'flight' => 'Рейс',
                            'departure_at' => 'Дата вылета',
                            'return_at' => 'Дата возвращения',
                            'number_of_changes' => 'Пересадки',
                            'price' => 'Стоимость',
                            'airline' => 'Авиакомпания',
                            'airline_logo' => 'Лого авиакомпании',
                            'origin' => 'Откуда',
                            'destination' => 'Куда',
                            'place' => 'Место',
                            'direction' => 'Направление',
                            'trip_class' => 'Класс перелета',
                            'distance' => 'Расстояние',
                            'price_distance' => 'Цена за километр',
                            'found_at' => 'Когда найден',
                            'back_and_forth' => 'В одну/обе стороны',
                            'button' => 'Кнопка',
                        ),
                        'label' => array(
                            'flight_number' => 'Номер рейса',
                            'flight' => 'Рейс',
                            'departure_at' => 'Дата вылета',
                            'return_at' => 'Дата возвращения',
                            'number_of_changes' => 'Пересадки',
                            'price' => 'Стоимость',
                            'airline' => 'Авиакомпания',
                            'airline_logo' => 'Авиакомпания',
                            'origin' => 'Откуда',
                            'destination' => 'Куда',
                            'place' => 'Место',
                            'direction' => 'Направление',
                            'trip_class' => 'Класс перелета',
                            'distance' => 'Расстояние',
                            'price_distance' => 'Цена за километр',
                            'found_at' => 'Когда найден',
                            'back_and_forth' => 'В одну/обе стороны',
                            'button' => 'Найти билет',
                        ),
                    ),
                    'en' => array(
                        'label_default' => array(
                            'flight_number' => 'Flight number',
                            'flight' => 'Flight',
                            'departure_at' => 'Departure date',
                            'return_at' => 'Return date',
                            'number_of_changes' => 'Stops',
                            'price' => 'Price',
                            'airline' => 'Airlines',
                            'airline_logo' => 'Logo airlines',
                            'origin' => 'Origin',
                            'destination' => 'Destination',
                            'place' => 'Rank',
                            'direction' => 'Direction',
                            'trip_class' => 'Flight class',
                            'distance' => 'Distance',
                            'price_distance' => 'Price/distance',
                            'found_at' => 'When found',
                            'back_and_forth' => 'One way / Round-Trip',
                            'button' => 'Button',
                        ),
                        'label' => array(
                            'flight_number' => 'Flight number',
                            'flight' => 'Flight',
                            'departure_at' => 'Departure date',
                            'return_at' => 'Return date',
                            'number_of_changes' => 'Stops',
                            'price' => 'Price',
                            'airline' => 'Airlines',
                            'airline_logo' => 'Airlines',
                            'origin' => 'Origin',
                            'destination' => 'Destination',
                            'place' => 'Rank',
                            'direction' => 'Direction',
                            'trip_class' => 'Flight class',
                            'distance' => 'Distance',
                            'price_distance' => 'Price/distance',
                            'found_at' => 'When found',
                            'back_and_forth' => 'One way / Round-Trip',
                            'button' => 'Find Ticket',
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
                    'extra_table_marker' => 'cal-month',
                    'paginate' => 10,
                    'paginate_switch' => true,
                    'transplant' => 0,
                    'title_button' => array(
                        'en' => 'OW from price',
                        'ru' => 'Найти от price'
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
                        'button'
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
                    'extra_table_marker' => 'cal-week',
                    'paginate' => 10,
                    'paginate_switch' => true,
                    'title_button' => array(
                        'en' => 'RT from price',
                        'ru' => 'Найти от price'
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
                        'button'
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
                        'en' => 'RT from price',
                        'ru' => 'Найти от price'
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
                        'button'
                    )
                ),
                '5' => array(
                    'title' => array(
                        'en' => 'The Cheapest Flights for this Month from origin to destination',
                        'ru' => 'Самые дешевые билеты  из origin в destination в этом месяце'
                    ),
                    'tag' => 'h3',
                    'extra_table_marker' => 'direction-month',
                    'paginate' => 10,
                    'paginate_switch' => true,
                    'transplant' => 0,
                    'title_button' => array(
                        'en' => 'RT from price',
                        'ru' => 'Найти от price'
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
                        'button'
                    )
                ),
                '6' => array(
                    'title' => array(
                        'en' => 'The Cheapest Flights from origin to destination for the Year Ahead',
                        'ru' => 'Самые дешевые авиабилеты из origin в destination на год вперед'
                    ),
                    'tag' => 'h3',
                    'extra_table_marker' => 'direction-12months',
                    'paginate' => 12,
                    'paginate_switch' => true,
                    'title_button' => array(
                        'en' => 'RT from price',
                        'ru' => 'Найти от price'
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
                        'button')
                ),
                '7' => array(
                    'title' => array(
                        'en' => 'Direct Flights from origin to destination',
                        'ru' => 'Билеты без пересадок из origin в destination'
                    ),
                    'tag' => 'h3',
                    'extra_table_marker' => 'direction-nostops',
                    'paginate' => 10,
                    'paginate_switch' => true,
                    'title_button' => array(
                        'en' => 'RT from price',
                        'ru' => 'Найти от price'
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
                        'button')

                ),
                '8' => array(
                    'title' => array(
                        'en' => 'Direct Flights from origin',
                        'ru' => 'Билеты без пересадок из origin'
                    ),
                    'tag' => 'h3',
                    'extra_table_marker' => 'nostops-from',
                    'limit' => 10,
                    'paginate' => 10,
                    'paginate_switch' => true,
                    'title_button' => array(
                        'en' => 'RT from price',
                        'ru' => 'Найти от price'
                    ),
                    'sort_column' => 0,
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
                        'button'
                    )

                ),
                '9' => array(
                    'title' => array(
                        'en' => 'Popular Destinations from origin',
                        'ru' => 'Популярные направления из origin'
                    ),
                    'tag' => 'h3',
                    'extra_table_marker' => 'popular-city',
                    'paginate' => 10,
                    'paginate_switch' => true,
                    'title_button' => array(
                        'en' => 'RT from price',
                        'ru' => 'Найти от price'
                    ),
                    'sort_column' => 0,
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
                        'button'
                    )
                ),
                '10' => array(
                    'title' => array(
                        'en' => 'Airline\'s popular flights airline',
                        'ru' =>  'Популярные направления авиакомпании airline',
                    ),
                    'tag' => 'h3',
                    'limit' => 10,
                    'extra_table_marker' => 'popular-airlines',
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
                        'ru' => 'Найти от price'
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
                        'button'
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
                    'extra_table_marker' => 'on-our-website',
                    'paginate' => 10,
                    'paginate_switch' => true,
                    'transplant' => 0,
                    'title_button' => array(
                        'en' => 'RT from price',
                        'ru' => 'Найти от price'
                    ),
                    'sort_column' => 0,
                    'selected' => array(
                        'origin',
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
                        'button'
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
                    'extra_table_marker' => 'from-city',
                    'paginate' => 10,
                    'paginate_switch' => true,
                    'transplant' => 0,
                    'title_button' => array(
                        'en' => 'RT from price',
                        'ru' => 'Найти от price'
                    ),
                    'sort_column' => 0,
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
                        'button'
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
                    'extra_table_marker' => 'to-city',
                    'paginate' => 10,
                    'paginate_switch' => true,
                    'transplant' => 0,
                    'title_button' => array(
                        'en' => 'RT from price',
                        'ru' => 'Найти от price'
                    ),
                    'sort_column' => 0,
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
                        'button'
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
                    'responsive' => 1,
                    'head_color' => '#1db1db',
                    'head_text_color' => '#ffffff',
                ),
                'button' => array(
                    ''
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
                    'contrast_color' => '#ffffff'
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
                )

            ),
            'admin_settings' => array(
            ),
        );
        $defaults = apply_filters('travelpayouts_defaults', $defaults );
        return $defaults;
    }
}