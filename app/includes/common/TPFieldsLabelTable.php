<?php
/**
 * Created by PhpStorm.
 * User: romansolomashenko
 * Date: 26.10.16
 * Time: 5:13 PM
 */

namespace app\includes\common;


class TPFieldsLabelTable
{

	/**
	 * @param $wagonType
	 *
	 * @return string
	 */
	/*
	 *  plazcard - Плац
		coupe - Купе
		sedentary - Сид
		lux - Люкс
		soft - Мягк
		common - Общ
	 * */
	public static function getRailwayWagonTypeLabel($wagonType){
		$wagonTypeLabel = "";
		$wagonTypeLabelData = array(
			'plazcard' => array(
				TPLang::getLangEN() => _x('Plazcard', 'en railway wagon plazcard type label', TPOPlUGIN_TEXTDOMAIN),
				TPLang::getLangRU() => _x('Plazcard', 'ru railway wagon plazcard type label', TPOPlUGIN_TEXTDOMAIN),
			),
			'coupe' => array(
				TPLang::getLangEN() => _x('Coupe', 'en railway wagon coupe type label', TPOPlUGIN_TEXTDOMAIN),
				TPLang::getLangRU() => _x('Coupe', 'ru railway wagon coupe type label', TPOPlUGIN_TEXTDOMAIN),
			),
			'sedentary' => array(
				TPLang::getLangEN() => _x('Sedentary', 'en railway wagon sedentary type label', TPOPlUGIN_TEXTDOMAIN),
				TPLang::getLangRU() => _x('Sedentary', 'ru railway wagon sedentary type label', TPOPlUGIN_TEXTDOMAIN),
			),
			'lux' => array(
				TPLang::getLangEN() => _x('Lux', 'en railway wagon lux type label', TPOPlUGIN_TEXTDOMAIN),
				TPLang::getLangRU() => _x('Lux', 'ru railway wagon lux type label', TPOPlUGIN_TEXTDOMAIN),
			),
			'soft' => array(
				TPLang::getLangEN() => _x('Soft', 'en railway wagon soft type label', TPOPlUGIN_TEXTDOMAIN),
				TPLang::getLangRU() => _x('Soft', 'ru railway wagon soft type label', TPOPlUGIN_TEXTDOMAIN),
			),
			'common' => array(
				TPLang::getLangEN() => _x('Common', 'en railway wagon common type label', TPOPlUGIN_TEXTDOMAIN),
				TPLang::getLangRU() => _x('Common', 'ru railway wagon common type label', TPOPlUGIN_TEXTDOMAIN),
			),
		);

		if(isset($wagonTypeLabelData[$wagonType][TPLang::getLang()])){

			$wagonTypeLabel = $wagonTypeLabelData[$wagonType][TPLang::getLang()];
		}else{
			$wagonTypeLabel = $wagonTypeLabelData[$wagonType][TPLang::getDefaultLang()];
		}

		return $wagonTypeLabel;
	}

	/** Railway */
	/*
	 * Номер поезда / Train
	 * Маршрут, Route
	 * Отправление / Departure
	 * Прибытие / Arrival
	 * В пути, Duration
	 * Примерные цены / Prices
	 * Дата поездки/ Dates
	 *
	 * Откуда / From
	 * Куда / To
	 * Время отправления / Departure Time
	 * Время прибытия/ Arrival Time
	 * Начальная станция маршрута / Route's First Station
	 * Конечная станция маршрута / Route's Last Station
	 *
	 */
	public static function getRailwayFieldsLabelRU(){
		return  array(
			'label_default' => array(
				'train' => _x('Train', 'local ru railway fields table label default', TPOPlUGIN_TEXTDOMAIN),
				'route' => _x('Route', 'local ru railway fields table label default', TPOPlUGIN_TEXTDOMAIN),
				'departure' => _x('Departure', 'local ru railway fields table label default', TPOPlUGIN_TEXTDOMAIN),
				'arrival' => _x('Arrival', 'local ru railway fields table label default', TPOPlUGIN_TEXTDOMAIN),
				'duration' => _x('Duration', 'local ru railway fields table label default', TPOPlUGIN_TEXTDOMAIN),
				'prices' => _x('Prices', 'local ru railway fields table label default', TPOPlUGIN_TEXTDOMAIN),
				'dates' => _x('Dates', 'local ru railway fields table label default', TPOPlUGIN_TEXTDOMAIN),
				'origin' => _x('From', 'local ru railway fields table label default', TPOPlUGIN_TEXTDOMAIN),
				'destination' => _x('To', 'local ru railway fields table label default', TPOPlUGIN_TEXTDOMAIN),
				'departure_time' => _x('Departure Time', 'local ru railway fields table label default', TPOPlUGIN_TEXTDOMAIN),
				'arrival_time' => _x('Arrival Time', 'local ru railway fields table label default', TPOPlUGIN_TEXTDOMAIN),
				'route_first_station' => _x('Route\'s First Station', 'local ru railway fields table label default', TPOPlUGIN_TEXTDOMAIN),
				'route_last_station' => _x('Route\'s Last Station', 'local ru railway fields table label default', TPOPlUGIN_TEXTDOMAIN),
			),
			'label' => array(
				'train' => _x('Train', 'local ru railway fields table label', TPOPlUGIN_TEXTDOMAIN),
				'route' => _x('Route', 'local ru railway fields table label', TPOPlUGIN_TEXTDOMAIN),
				'departure' => _x('Departure', 'local ru railway fields table label', TPOPlUGIN_TEXTDOMAIN),
				'arrival' => _x('Arrival', 'local ru railway fields table label', TPOPlUGIN_TEXTDOMAIN),
				'duration' => _x('Duration', 'local ru railway fields table label', TPOPlUGIN_TEXTDOMAIN),
				'prices' => _x('Prices', 'local ru railway fields table label', TPOPlUGIN_TEXTDOMAIN),
				'dates' => _x('Dates', 'local ru railway fields table label', TPOPlUGIN_TEXTDOMAIN),
				'origin' => _x('From', 'local ru railway fields table label', TPOPlUGIN_TEXTDOMAIN),
				'destination' => _x('To', 'local ru railway fields table label', TPOPlUGIN_TEXTDOMAIN),
				'departure_time' => _x('Departure Time', 'local ru railway fields table label', TPOPlUGIN_TEXTDOMAIN),
				'arrival_time' => _x('Arrival Time', 'local ru railway fields table label', TPOPlUGIN_TEXTDOMAIN),
				'route_first_station' => _x('Route\'s First Station', 'local ru railway fields table label', TPOPlUGIN_TEXTDOMAIN),
				'route_last_station' => _x('Route\'s Last Station', 'local ru railway fields table label', TPOPlUGIN_TEXTDOMAIN),
			),
		);
	}
	public static function getRailwayFieldsLabelEN(){
		return  array(
			'label_default' => array(
				'train' => _x('Train', 'local en railway fields table label default', TPOPlUGIN_TEXTDOMAIN),
				'route' => _x('Route', 'local en railway fields table label default', TPOPlUGIN_TEXTDOMAIN),
				'departure' => _x('Departure', 'local en railway fields table label default', TPOPlUGIN_TEXTDOMAIN),
				'arrival' => _x('Arrival', 'local en railway fields table label default', TPOPlUGIN_TEXTDOMAIN),
				'duration' => _x('Duration', 'local en railway fields table label default', TPOPlUGIN_TEXTDOMAIN),
				'prices' => _x('Prices', 'local en railway fields table label default', TPOPlUGIN_TEXTDOMAIN),
				'dates' => _x('Dates', 'local en railway fields table label default', TPOPlUGIN_TEXTDOMAIN),
				'origin' => _x('From', 'local en railway fields table label default', TPOPlUGIN_TEXTDOMAIN),
				'destination' => _x('To', 'local en railway fields table label default', TPOPlUGIN_TEXTDOMAIN),
				'departure_time' => _x('Departure Time', 'local en railway fields table label default', TPOPlUGIN_TEXTDOMAIN),
				'arrival_time' => _x('Arrival Time', 'local en railway fields table label default', TPOPlUGIN_TEXTDOMAIN),
				'route_first_station' => _x('Route\'s First Station', 'local en railway fields table label default', TPOPlUGIN_TEXTDOMAIN),
				'route_last_station' => _x('Route\'s Last Station', 'local en railway fields table label default', TPOPlUGIN_TEXTDOMAIN),
			),
			'label' => array(
				'train' => _x('Train', 'local en railway fields table label', TPOPlUGIN_TEXTDOMAIN),
				'route' => _x('Route', 'local en railway fields table label', TPOPlUGIN_TEXTDOMAIN),
				'departure' => _x('Departure', 'local en railway fields table label', TPOPlUGIN_TEXTDOMAIN),
				'arrival' => _x('Arrival', 'local en railway fields table label', TPOPlUGIN_TEXTDOMAIN),
				'duration' => _x('Duration', 'local en railway fields table label', TPOPlUGIN_TEXTDOMAIN),
				'prices' => _x('Prices', 'local en railway fields table label', TPOPlUGIN_TEXTDOMAIN),
				'dates' => _x('Dates', 'local en railway fields table label', TPOPlUGIN_TEXTDOMAIN),
				'origin' => _x('From', 'local en railway fields table label', TPOPlUGIN_TEXTDOMAIN),
				'destination' => _x('To', 'local en railway fields table label', TPOPlUGIN_TEXTDOMAIN),
				'departure_time' => _x('Departure Time', 'local en railway fields table label', TPOPlUGIN_TEXTDOMAIN),
				'arrival_time' => _x('Arrival Time', 'local en railway fields table label', TPOPlUGIN_TEXTDOMAIN),
				'route_first_station' => _x('Route\'s First Station', 'local en railway fields table label', TPOPlUGIN_TEXTDOMAIN),
				'route_last_station' => _x('Route\'s Last Station', 'local en railway fields table label', TPOPlUGIN_TEXTDOMAIN),
			),
		);
	}
	/** Railway END **/
    /*
     * Отель | Hotel | name
     * Звездность | Stars | stars
     * Рейтинг | Rating | rating
     * Расстояние до центра (км) | Distance to the center (km) | distance
     * Цена за ночь | Price per night | price_pn
     * Цена до скидки | Price before discount | old_price_pn
     * Скидка | Discount | discount
     *
     * Цена до скидки | Price before discount | (в настройках ` Старая цена и скидка` `Price before and discount`)
     * Цена за ночь | Price per night (в настройках Старая и новая цена Old and new price)
     *
     *  Цена за ночь | Price per night (в настройках Кнопка Button)
     *
     */

    public static function getHotelsFieldsLabelRU(){
        return  array(
            'label_default' => array(
                'name' => _x('Hotel',
                    'tp plugin local ru hotels fields table label default name', TPOPlUGIN_TEXTDOMAIN),
                'stars' => _x('Stars',
                    'tp plugin local ru hotels fields table label default stars', TPOPlUGIN_TEXTDOMAIN),
                'rating' => _x('Rating',
                    'tp plugin local ru hotels fields table label default rating', TPOPlUGIN_TEXTDOMAIN),
                'distance' => _x('To the center',
                    'tp plugin local ru hotels fields table label default distance', TPOPlUGIN_TEXTDOMAIN),
                'price_pn' => _x('Price per night, from',
                    'tp plugin local ru hotels fields table label default price_pn', TPOPlUGIN_TEXTDOMAIN),
                'old_price_pn' => _x('Price before discount',
                    'tp plugin local ru hotels fields table label default old price pn', TPOPlUGIN_TEXTDOMAIN),
                'discount' =>_x('Discount', 'tp plugin local ru hotels fields table label default discount', TPOPlUGIN_TEXTDOMAIN),
                'old_price_and_discount' =>_x('Price before and discount',
                    'tp plugin local ru hotels fields table label default old price and discount', TPOPlUGIN_TEXTDOMAIN),
                'old_price_and_new_price' =>_x('Old and new price',
                    'tp plugin local ru hotels fields table label default old price and new price', TPOPlUGIN_TEXTDOMAIN),
                'button' => _x('Button',
                    'tp plugin local ru hotels fields table label default button', TPOPlUGIN_TEXTDOMAIN),
                //'address' => _x('tp_plugin_local_ru_hotels_fields_table_label_default_address',
                //    '(Адрес)', TPOPlUGIN_TEXTDOMAIN),
                /*'property_type' => _x('tp_plugin_local_ru_hotels_fields_table_label_default_property_type',
                    '(Тип)', TPOPlUGIN_TEXTDOMAIN),
                'popularity' => _x('tp_plugin_local_ru_hotels_fields_table_label_default_popularity',
                    '(Популярность)', TPOPlUGIN_TEXTDOMAIN),
                'price_from' => _x('tp_plugin_local_ru_hotels_fields_table_label_default_price_from',
                    '(Цена от)', TPOPlUGIN_TEXTDOMAIN),
                'price_avg' => _x('tp_plugin_local_ru_hotels_fields_table_label_default_price_avg',
                    '(Средняя цена)', TPOPlUGIN_TEXTDOMAIN),*/

            ),
            'label' => array(
                'name' => _x('Hotel',
                    'tp plugin local ru hotels fields table label name',TPOPlUGIN_TEXTDOMAIN),
                'stars' => _x('Stars',
                    'tp plugin local ru hotels fields table label stars', TPOPlUGIN_TEXTDOMAIN),
                'rating' => _x('Rating',
                    'tp plugin local ru hotels fields table label rating', TPOPlUGIN_TEXTDOMAIN),
                'distance' => _x('To the center',
                    'tp plugin local ru hotels fields table label distance', TPOPlUGIN_TEXTDOMAIN),
                'price_pn' => _x('Price per night, from',
                    'tp plugin local ru hotels fields table label price_pn', TPOPlUGIN_TEXTDOMAIN),
                'old_price_pn' => _x('Price before discount',
                    'tp plugin local ru hotels fields table label old price pn', TPOPlUGIN_TEXTDOMAIN),
                'discount' =>_x('Discount', 'tp plugin local ru hotels fields table label discount', TPOPlUGIN_TEXTDOMAIN),
                //Цена до скидки  Старая цена и скидка
                'old_price_and_discount' =>_x('Price before discount',
                    'tp plugin local ru hotels fields table label old price and discount', TPOPlUGIN_TEXTDOMAIN),
                //Старая и новая цена
                'old_price_and_new_price' =>_x('Price per night',
                    'tp plugin local ru hotels fields table label old price and new price', TPOPlUGIN_TEXTDOMAIN),
                'button' => _x('Choose dates', 'tp plugin local ru hotels fields table label button',
                    TPOPlUGIN_TEXTDOMAIN),
                //'address' => _x('tp_plugin_local_ru_hotels_fields_table_label_address',
                //    '(Адрес)', TPOPlUGIN_TEXTDOMAIN),
                /*'property_type' => _x('tp_plugin_local_ru_hotels_fields_table_label_property_type',
                    '(Тип)', TPOPlUGIN_TEXTDOMAIN),
                'popularity' => _x('tp_plugin_local_ru_hotels_fields_table_label_popularity',
                    '(Популярность)', TPOPlUGIN_TEXTDOMAIN),
                'price_from' => _x('tp_plugin_local_ru_hotels_fields_table_label_price_from',
                    '(Цена от)', TPOPlUGIN_TEXTDOMAIN),
                'price_avg' => _x('tp_plugin_local_ru_hotels_fields_table_label_price_avg',
                    '(Средняя цена)', TPOPlUGIN_TEXTDOMAIN),*/

            ),
        );
    }
    public static function getHotelsFieldsLabelEN(){
        return  array(
            'label_default' => array(
                'name' => _x('Hotel',
                    'tp plugin local en hotels fields table label default name', TPOPlUGIN_TEXTDOMAIN),
                'stars' => _x('Stars',
                    'tp plugin local en hotels fields table label default stars', TPOPlUGIN_TEXTDOMAIN),
                'rating' => _x('Rating',
                    'tp plugin local en hotels fields table label default rating', TPOPlUGIN_TEXTDOMAIN),
                'distance' => _x('To the center',
                    'tp plugin local en hotels fields table label default distance', TPOPlUGIN_TEXTDOMAIN),
                'price_pn' => _x('Price per night, from',
                    'tp plugin local en hotels fields table label default price_pn', TPOPlUGIN_TEXTDOMAIN),
                'old_price_pn' => _x('Price before discount',
                    'tp plugin local en hotels fields table label default old price pn', TPOPlUGIN_TEXTDOMAIN),
                'discount' =>_x('Discount', 'tp plugin local en hotels fields table label default discount', TPOPlUGIN_TEXTDOMAIN),

                'old_price_and_discount' =>_x('Price before and discount',
                    'tp plugin local en hotels fields table label default old price and discount', TPOPlUGIN_TEXTDOMAIN),
                'old_price_and_new_price' =>_x('Old and new price',
                    'tp plugin local en hotels fields table label default old price and new price', TPOPlUGIN_TEXTDOMAIN),
                'button' => _x('Button',
                    'tp plugin local en hotels fields table label default button', TPOPlUGIN_TEXTDOMAIN),
                //'address' => _x('tp_plugin_local_en_hotels_fields_table_label_default_address',
                //    '(Address)', TPOPlUGIN_TEXTDOMAIN),
                /*'property_type' => _x('tp_plugin_local_en_hotels_fields_table_label_default_property_type',
                    '(Type)', TPOPlUGIN_TEXTDOMAIN),
                'popularity' => _x('tp_plugin_local_en_hotels_fields_table_label_default_popularity',
                    '(Popularity)', TPOPlUGIN_TEXTDOMAIN),
                'price_from' => _x('tp_plugin_local_en_hotels_fields_table_label_default_price_from',
                    '(Price from)', TPOPlUGIN_TEXTDOMAIN),
                'price_avg' => _x('tp_plugin_local_en_hotels_fields_table_label_default_price_avg',
                    '(Average price)', TPOPlUGIN_TEXTDOMAIN),*/



            ),
            'label' => array(
                'name' => _x('Hotel',
                    'tp plugin local en hotels fields table label name',TPOPlUGIN_TEXTDOMAIN),
                'stars' => _x('Stars',
                    'tp plugin local en hotels fields table label stars', TPOPlUGIN_TEXTDOMAIN),
                'rating' => _x('Rating',
                    'tp plugin local en hotels fields table label rating', TPOPlUGIN_TEXTDOMAIN),
                'distance' => _x('To the center',
                    'tp plugin local en hotels fields table label distance', TPOPlUGIN_TEXTDOMAIN),
                'price_pn' => _x('Price per night, from',
                    'tp plugin local en hotels fields table label price_pn', TPOPlUGIN_TEXTDOMAIN),
                'old_price_pn' => _x('Price before discount',
                    'tp plugin local en hotels fields table label old price pn', TPOPlUGIN_TEXTDOMAIN),
                'discount' =>_x('Discount', 'tp plugin local en hotels fields table label discount', TPOPlUGIN_TEXTDOMAIN),
                'old_price_and_discount' =>_x('Price before discount',
                    'tp plugin local en hotels fields table label old price and discount', TPOPlUGIN_TEXTDOMAIN),
                'old_price_and_new_price' =>_x('Price per night',
                    'tp plugin local en hotels fields table label old price and new price', TPOPlUGIN_TEXTDOMAIN),
                'button' => _x('Choose dates', 'tp plugin local en hotels fields table label button',
                    TPOPlUGIN_TEXTDOMAIN),
                //'address' => _x('tp_plugin_local_en_hotels_fields_table_label_address',
                //    '(Address)', TPOPlUGIN_TEXTDOMAIN),
                /*'property_type' => _x('tp_plugin_local_en_hotels_fields_table_label_property_type',
                    '(Type)', TPOPlUGIN_TEXTDOMAIN),
                'popularity' => _x('tp_plugin_local_en_hotels_fields_table_label_popularity',
                    '(Popularity)', TPOPlUGIN_TEXTDOMAIN),
                'price_from' => _x('tp_plugin_local_en_hotels_fields_table_label_price_from',
                    '(Price from)', TPOPlUGIN_TEXTDOMAIN),
                'price_avg' => _x('tp_plugin_local_en_hotels_fields_table_label_price_avg',
                    '(Average price)', TPOPlUGIN_TEXTDOMAIN),*/

            ),
        );
    }
    /**
     * @return array
     */
    public static function getFieldsLabelRU(){
        return  array(
            //tp plugin local ru fields table label default
            'label_default' => array(
                'flight_number' => _x('Flight number',
                    'tp plugin local ru fields table label default flight number', TPOPlUGIN_TEXTDOMAIN),
                'flight' => _x('Flight',
                    'tp plugin local ru fields table label default flight', TPOPlUGIN_TEXTDOMAIN),
                'departure_at' => _x('Departure date',
                    'tp plugin local ru fields table label default departure_at', TPOPlUGIN_TEXTDOMAIN),
                'return_at' => _x('Return date',
                    'tp plugin local ru fields table label default return_at', TPOPlUGIN_TEXTDOMAIN),
                'number_of_changes' => _x('Stops',
                    'tp plugin local ru fields table label default number_of_changes', TPOPlUGIN_TEXTDOMAIN),
                'price' => _x('Price',
                    'tp plugin local ru fields table label default default_price', TPOPlUGIN_TEXTDOMAIN),
                'airline' => _x('Airlines',
                    'tp plugin local ru fields table label default airline', TPOPlUGIN_TEXTDOMAIN),
                'airline_logo' => _x('Logo airlines',
                    'tp plugin local ru fields table label default airline_logo', TPOPlUGIN_TEXTDOMAIN),
                'origin' => _x('Origin',
                    'tp plugin local ru fields table label default origin', TPOPlUGIN_TEXTDOMAIN),
                'destination' => _x('Destination',
                    'tp plugin local ru fields table label default destination', TPOPlUGIN_TEXTDOMAIN),
                'place' => _x('Rank',
                    'tp plugin local ru fields table label default place', TPOPlUGIN_TEXTDOMAIN),
                'direction' => _x('Direction',
                    'tp plugin local ru fields table label default direction', TPOPlUGIN_TEXTDOMAIN),
                'trip_class' => _x('Flight class',
                    'tp plugin local ru fields table label default trip_class', TPOPlUGIN_TEXTDOMAIN),
                'distance' => _x('Distance',
                    'tp plugin local ru fields table label default distance', TPOPlUGIN_TEXTDOMAIN),
                'price_distance' => _x('Price/distance',
                    'tp plugin local ru fields table label default price_distance', TPOPlUGIN_TEXTDOMAIN),
                'found_at' => _x('When found',
                    'tp plugin local ru fields table label default found_at', TPOPlUGIN_TEXTDOMAIN),
                'back_and_forth' => _x('One way / Round-Trip',
                    'tp plugin local ru fields table label default back_and_forth', TPOPlUGIN_TEXTDOMAIN),
                'button' => _x('Button',
                    'tp plugin local ru fields table label default button', TPOPlUGIN_TEXTDOMAIN),
                'origin_destination' => _x('Origin - Destination',
                    'tp plugin local ru fields table label default origin_destination', TPOPlUGIN_TEXTDOMAIN),
            ),
            'label' => array(
                'flight_number' => _x('Flight number',
                    'tp plugin local ru fields table label flight number', TPOPlUGIN_TEXTDOMAIN),
                'flight' => _x('Flight',
                    'tp plugin local ru fields table label flight', TPOPlUGIN_TEXTDOMAIN),
                'departure_at' => _x('Departure date',
                    'tp plugin local ru fields table label departure_at', TPOPlUGIN_TEXTDOMAIN),
                'return_at' => _x('Return date',
                    'tp plugin local ru fields table label return_at', TPOPlUGIN_TEXTDOMAIN),
                'number_of_changes' => _x('Stops',
                    'tp plugin local ru fields table label number_of_changes', TPOPlUGIN_TEXTDOMAIN),
                'price' => _x('Price',
                    'tp plugin local ru fields table label default_price', TPOPlUGIN_TEXTDOMAIN),
                'airline' => _x('Airlines',
                    'tp plugin local ru fields table label airline', TPOPlUGIN_TEXTDOMAIN),
                'airline_logo' => _x('Airlines',
                    'tp plugin local ru fields table label airline_logo', TPOPlUGIN_TEXTDOMAIN),
                'origin' => _x('Origin',
                    'tp plugin local ru fields table label origin', TPOPlUGIN_TEXTDOMAIN),
                'destination' => _x('Destination',
                    'tp plugin local ru fields table label destination', TPOPlUGIN_TEXTDOMAIN),
                'place' => _x('Rank',
                    'tp plugin local ru fields table label place', TPOPlUGIN_TEXTDOMAIN),
                'direction' => _x('Direction',
                    'tp plugin local ru fields table label direction', TPOPlUGIN_TEXTDOMAIN),
                'trip_class' => _x('Flight class',
                    'tp plugin local ru fields table label trip_class', TPOPlUGIN_TEXTDOMAIN),
                'distance' => _x('Distance',
                    'tp plugin local ru fields table label distance', TPOPlUGIN_TEXTDOMAIN),
                'price_distance' => _x('Price/distance',
                    'tp plugin local ru fields table label price_distance', TPOPlUGIN_TEXTDOMAIN),
                'found_at' => _x('When found',
                    'tp plugin local ru fields table label found_at', TPOPlUGIN_TEXTDOMAIN),
                'back_and_forth' => _x('One way / Round-Trip',
                    'tp plugin local ru fields table label back_and_forth', TPOPlUGIN_TEXTDOMAIN),
                'button' => _x('Find Ticket',
                    'tp plugin local ru fields table label button', TPOPlUGIN_TEXTDOMAIN),
                'origin_destination' => _x('Origin - Destination',
                    'tp plugin local ru fields table label origin_destination', TPOPlUGIN_TEXTDOMAIN),
            ),
        );
    }

    /**
     * @return array
     */
    public static function getFieldsLabelEN(){
        return array(
            'label_default' => array(
                'flight_number' => _x('Flight number',
                    'tp plugin local en fields table label default flight number', TPOPlUGIN_TEXTDOMAIN),
                'flight' => _x('Flight',
                    'tp plugin local en fields table label default flight', TPOPlUGIN_TEXTDOMAIN),
                'departure_at' => _x('Departure date',
                    'tp plugin local en fields table label default departure_at', TPOPlUGIN_TEXTDOMAIN),
                'return_at' => _x('Return date',
                    'tp plugin local en fields table label default return_at', TPOPlUGIN_TEXTDOMAIN),
                'number_of_changes' => _x('Stops',
                    'tp plugin local en fields table label default number_of_changes', TPOPlUGIN_TEXTDOMAIN),
                'price' => _x('Price',
                    'tp plugin local en fields table label default default_price', TPOPlUGIN_TEXTDOMAIN),
                'airline' => _x('Airlines',
                    'tp plugin local en fields table label default airline', TPOPlUGIN_TEXTDOMAIN),
                'airline_logo' => _x('Logo airlines',
                    'tp plugin local en fields table label default airline_logo', TPOPlUGIN_TEXTDOMAIN),
                'origin' => _x('Origin',
                    'tp plugin local en fields table label default origin', TPOPlUGIN_TEXTDOMAIN),
                'destination' => _x('Destination',
                    'tp plugin local en fields table label default destination', TPOPlUGIN_TEXTDOMAIN),
                'place' => _x('Rank',
                    'tp plugin local en fields table label default place', TPOPlUGIN_TEXTDOMAIN),
                'direction' => _x('Direction',
                    'tp plugin local en fields table label default direction', TPOPlUGIN_TEXTDOMAIN),
                'trip_class' => _x('Flight class',
                    'tp plugin local en fields table label default trip_class', TPOPlUGIN_TEXTDOMAIN),
                'distance' => _x('Distance',
                    'tp plugin local en fields table label default distance', TPOPlUGIN_TEXTDOMAIN),
                'price_distance' => _x('Price/distance',
                    'tp plugin local en fields table label default price_distance', TPOPlUGIN_TEXTDOMAIN),
                'found_at' => _x('When found',
                    'tp plugin local en fields table label default found_at', TPOPlUGIN_TEXTDOMAIN),
                'back_and_forth' => _x('One way / Round-Trip',
                    'tp plugin local en fields table label default back_and_forth', TPOPlUGIN_TEXTDOMAIN),
                'button' => _x('Button',
                    'tp plugin local en fields table label default button', TPOPlUGIN_TEXTDOMAIN),
                'origin_destination' => _x('Origin - Destination',
                    'tp plugin local en fields table label default origin_destination', TPOPlUGIN_TEXTDOMAIN),
            ),
            'label' => array(
                'flight_number' => _x('Flight number',
                    'tp plugin local en fields table label flight number', TPOPlUGIN_TEXTDOMAIN),
                'flight' => _x('Flight',
                    'tp plugin local en fields table label flight', TPOPlUGIN_TEXTDOMAIN),
                'departure_at' => _x('Departure date',
                    'tp plugin local en fields table label departure_at', TPOPlUGIN_TEXTDOMAIN),
                'return_at' => _x('Return date',
                    'tp plugin local en fields table label return_at', TPOPlUGIN_TEXTDOMAIN),
                'number_of_changes' => _x('Stops',
                    'tp plugin local en fields table label number_of_changes', TPOPlUGIN_TEXTDOMAIN),
                'price' => _x('Price',
                    'tp plugin local en fields table label default_price', TPOPlUGIN_TEXTDOMAIN),
                'airline' => _x('Airlines',
                    'tp plugin local en fields table label airline', TPOPlUGIN_TEXTDOMAIN),
                'airline_logo' => _x('Airlines',
                    'tp plugin local en fields table label airline_logo', TPOPlUGIN_TEXTDOMAIN),
                'origin' => _x('Origin',
                    'tp plugin local en fields table label origin', TPOPlUGIN_TEXTDOMAIN),
                'destination' => _x('Destination',
                    'tp plugin local en fields table label destination', TPOPlUGIN_TEXTDOMAIN),
                'place' => _x('Rank',
                    'tp plugin local en fields table label place', TPOPlUGIN_TEXTDOMAIN),
                'direction' => _x('Direction',
                    'tp plugin local en fields table label direction', TPOPlUGIN_TEXTDOMAIN),
                'trip_class' => _x('Flight class',
                    'tp plugin local en fields table label trip_class', TPOPlUGIN_TEXTDOMAIN),
                'distance' => _x('Distance',
                    'tp plugin local en fields table label distance', TPOPlUGIN_TEXTDOMAIN),
                'price_distance' => _x('Price/distance',
                    'tp plugin local en fields table label price_distance', TPOPlUGIN_TEXTDOMAIN),
                'found_at' => _x('When found',
                    'tp plugin local en fields table label found_at', TPOPlUGIN_TEXTDOMAIN),
                'back_and_forth' => _x('One way / Round-Trip',
                    'tp plugin local en fields table label back_and_forth', TPOPlUGIN_TEXTDOMAIN),
                'button' => _x('Find Ticket',
                    'tp plugin local en fields table label button', TPOPlUGIN_TEXTDOMAIN),
                'origin_destination' => _x('Origin - Destination',
                    'tp plugin local en fields table label origin_destination', TPOPlUGIN_TEXTDOMAIN),
            ),
        );
    }

    /**
     * @return array
     */
    public static function getFieldsLabelTH(){
        return array(
            'label_default' => array(
                'flight_number' => _x('Flight number',
                    'tp plugin local th fields table label default flight number', TPOPlUGIN_TEXTDOMAIN),
                'flight' => _x('Flight',
                    'tp plugin local th fields table label default flight', TPOPlUGIN_TEXTDOMAIN),
                'departure_at' => _x('Departure date',
                    'tp plugin local th fields table label default departure_at', TPOPlUGIN_TEXTDOMAIN),
                'return_at' => _x('Return date',
                    'tp plugin local th fields table label default return_at', TPOPlUGIN_TEXTDOMAIN),
                'number_of_changes' => _x('Stops',
                    'tp plugin local th fields table label default number_of_changes', TPOPlUGIN_TEXTDOMAIN),
                'price' => _x('Price',
                    'tp plugin local th fields table label default default_price', TPOPlUGIN_TEXTDOMAIN),
                'airline' => _x('Airlines',
                    'tp plugin local th fields table label default airline', TPOPlUGIN_TEXTDOMAIN),
                'airline_logo' => _x('Logo airlines',
                    'tp plugin local th fields table label default airline_logo', TPOPlUGIN_TEXTDOMAIN),
                'origin' => _x('Origin',
                    'tp plugin local th fields table label default origin', TPOPlUGIN_TEXTDOMAIN),
                'destination' => _x('Destination',
                    'tp plugin local th fields table label default destination', TPOPlUGIN_TEXTDOMAIN),
                'place' => _x('Rank',
                    'tp plugin local th fields table label default place', TPOPlUGIN_TEXTDOMAIN),
                'direction' => _x('Direction',
                    'tp plugin local th fields table label default direction', TPOPlUGIN_TEXTDOMAIN),
                'trip_class' => _x('Flight class',
                    'tp plugin local th fields table label default trip_class', TPOPlUGIN_TEXTDOMAIN),
                'distance' => _x('Distance',
                    'tp plugin local th fields table label default distance', TPOPlUGIN_TEXTDOMAIN),
                'price_distance' => _x('Price/distance',
                    'tp plugin local th fields table label default price_distance', TPOPlUGIN_TEXTDOMAIN),
                'found_at' => _x('When found',
                    'tp plugin local th fields table label default found_at', TPOPlUGIN_TEXTDOMAIN),
                'back_and_forth' => _x('One way / Round-Trip',
                    'tp plugin local th fields table label default back_and_forth', TPOPlUGIN_TEXTDOMAIN),
                'button' => _x('Button',
                    'tp plugin local th fields table label default button', TPOPlUGIN_TEXTDOMAIN),
                'origin_destination' => _x('Origin - Destination',
                    'tp plugin local th fields table label default origin_destination', TPOPlUGIN_TEXTDOMAIN),
            ),
            'label' => array(
                'flight_number' => _x('Flight number',
                    'tp plugin local th fields table label flight number', TPOPlUGIN_TEXTDOMAIN),
                'flight' => _x('Flight',
                    'tp plugin local th fields table label flight', TPOPlUGIN_TEXTDOMAIN),
                'departure_at' => _x('Departure date',
                    'tp plugin local th fields table label departure_at', TPOPlUGIN_TEXTDOMAIN),
                'return_at' => _x('Return date',
                    'tp plugin local th fields table label return_at', TPOPlUGIN_TEXTDOMAIN),
                'number_of_changes' => _x('Stops',
                    'tp plugin local th fields table label number_of_changes', TPOPlUGIN_TEXTDOMAIN),
                'price' => _x('Price',
                    'tp plugin local th fields table label default_price', TPOPlUGIN_TEXTDOMAIN),
                'airline' => _x('Airlines',
                    'tp plugin local th fields table label airline', TPOPlUGIN_TEXTDOMAIN),
                'airline_logo' => _x('Airlines',
                    'tp plugin local th fields table label airline_logo', TPOPlUGIN_TEXTDOMAIN),
                'origin' => _x('Origin',
                    'tp plugin local th fields table label origin', TPOPlUGIN_TEXTDOMAIN),
                'destination' => _x('Destination',
                    'tp plugin local th fields table label destination', TPOPlUGIN_TEXTDOMAIN),
                'place' => _x('Rank',
                    'tp plugin local th fields table label place', TPOPlUGIN_TEXTDOMAIN),
                'direction' => _x('Direction',
                    'tp plugin local th fields table label direction', TPOPlUGIN_TEXTDOMAIN),
                'trip_class' => _x('Flight class',
                    'tp plugin local th fields table label trip_class', TPOPlUGIN_TEXTDOMAIN),
                'distance' => _x('Distance',
                    'tp plugin local th fields table label distance', TPOPlUGIN_TEXTDOMAIN),
                'price_distance' => _x('Price/distance',
                    'tp plugin local th fields table label price_distance', TPOPlUGIN_TEXTDOMAIN),
                'found_at' => _x('When found',
                    'tp plugin local th fields table label found_at', TPOPlUGIN_TEXTDOMAIN),
                'back_and_forth' => _x('One way / Round-Trip',
                    'tp plugin local th fields table label back_and_forth', TPOPlUGIN_TEXTDOMAIN),
                'button' => _x('Find Ticket',
                    'tp plugin local th fields table label button', TPOPlUGIN_TEXTDOMAIN),
                'origin_destination' => _x('Origin - Destination',
                    'tp plugin local th fields table label origin_destination', TPOPlUGIN_TEXTDOMAIN),
            ),
        );
    }

    /**
     * @param $tripClass
     * @return string
     */
    public static function getTripClassLabel($tripClass){
        $tripClassLabel = "";
        $tripClassLabelData = array(
            "0" => array(
                TPLang::getLangEN() => _x('Economy', 'tp plugin local en trip class economy', TPOPlUGIN_TEXTDOMAIN),
                TPLang::getLangRU() => _x('Economy', 'tp plugin local ru trip class economy', TPOPlUGIN_TEXTDOMAIN),
            ),
            "1" => array(
                TPLang::getLangEN() => _x('Business', 'tp plugin local en trip class business', TPOPlUGIN_TEXTDOMAIN),
                TPLang::getLangRU() => _x('Business', 'tp plugin local ru trip class business', TPOPlUGIN_TEXTDOMAIN),
            ),
            "2" => array(
                TPLang::getLangEN() => _x('First', 'tp plugin local en trip class first', TPOPlUGIN_TEXTDOMAIN),
                TPLang::getLangRU() => _x('First', 'tp plugin local ru trip class first', TPOPlUGIN_TEXTDOMAIN),
            ),
        );

        if(isset($tripClassLabelData[$tripClass][TPLang::getLang()])){
            $tripClassLabel = $tripClassLabelData[$tripClass][TPLang::getLang()];
        }else{
            $tripClassLabel = $tripClassLabelData[$tripClass][TPLang::getDefaultLang()];
        }

        return $tripClassLabel;
    }

    /**
     * @param $distanceType
     * @return string
     */
    public static function getDistanceLabel($distanceType){
        $distanceLabel = "";
        $distanceLabelData = array(
            1 => array(
                TPLang::getLangEN() => _x('km', 'tp plugin local en distance label km', TPOPlUGIN_TEXTDOMAIN),
                TPLang::getLangRU() => _x('km', 'tp plugin local ru distance label km', TPOPlUGIN_TEXTDOMAIN),
            ),
            2 => array(
                TPLang::getLangEN() => _x('m', 'tp plugin local en distance label m', TPOPlUGIN_TEXTDOMAIN),
                TPLang::getLangRU() => _x('m', 'tp plugin local ru distance label m', TPOPlUGIN_TEXTDOMAIN),
            ),
        );
        if(isset($distanceLabelData[$distanceType][TPLang::getLang()])){
            $distanceLabel = $distanceLabelData[$distanceType][TPLang::getLang()];
        }else{
            $distanceLabel = $distanceLabelData[$distanceType][TPLang::getDefaultLang()];
        }
        return $distanceLabel;

    }

    /**
     * @param $numberChangesType
     * @return string
     */
    public static function getNumberChangesLabel($numberChangesType){
        $numberChangesLabel = "";
        $numberChangesLabelData = array(
            0 => array(
                TPLang::getLangEN() => _x('Direct', 'tp plugin local en number changes label direct', TPOPlUGIN_TEXTDOMAIN),
                TPLang::getLangRU() => _x('Direct', 'tp plugin local ru number changes label direct', TPOPlUGIN_TEXTDOMAIN),
            ),
            1 => array(
                TPLang::getLangEN() => _x('stop', 'tp plugin local en number changes label stop', TPOPlUGIN_TEXTDOMAIN),
                TPLang::getLangRU() => _x('stop', 'tp plugin local ru number changes label stop', TPOPlUGIN_TEXTDOMAIN),
            ),
            2 => array(
                TPLang::getLangEN() => _x('stops', 'tp plugin local en number changes label stops', TPOPlUGIN_TEXTDOMAIN),
                TPLang::getLangRU() => _x('stops', 'tp plugin local ru number changes label stops', TPOPlUGIN_TEXTDOMAIN),
            ),
        );

        if(isset($numberChangesLabelData[$numberChangesType][TPLang::getLang()])){

            $numberChangesLabel = $numberChangesLabelData[$numberChangesType][TPLang::getLang()];
        }else{
            $numberChangesLabel = $numberChangesLabelData[$numberChangesType][TPLang::getDefaultLang()];
        }

        return $numberChangesLabel;
    }

	/**
	 * @param $dateType
	 *
	 * @return string
	 */
    public static function getDateLabel($dateType){
	    $dateLabel = "";
    	$dateLabelData = array(
    	    'day' => array(
                TPLang::getLangEN() => _x('d', 'local en date label day', TPOPlUGIN_TEXTDOMAIN),
                TPLang::getLangRU() => _x('д', 'local ru date label day', TPOPlUGIN_TEXTDOMAIN),
            ),
    		'hour' => array(
			    TPLang::getLangEN() => _x('h', 'local en date label hour', TPOPlUGIN_TEXTDOMAIN),
			    TPLang::getLangRU() => _x('ч', 'local ru date label hour', TPOPlUGIN_TEXTDOMAIN),
		    ),
    		'minute' => array(
			    TPLang::getLangEN() => _x('m', 'local en date label minute', TPOPlUGIN_TEXTDOMAIN),
			    TPLang::getLangRU() => _x('м', 'local ru date label minute', TPOPlUGIN_TEXTDOMAIN),
		    ),
	    );
	    if(isset($dateLabelData[$dateType][TPLang::getLang()])){
		    $dateLabel = $dateLabelData[$dateType][TPLang::getLang()];
	    }else{
		    $dateLabel = $dateLabelData[$dateType][TPLang::getDefaultLang()];
	    }

	    return $dateLabel;
    }

    /**
     * @param $number
     * @return string
     */
    public static function getDurationDayLabel($number){
        $dayLabel = "";
        $dayLabelData = array(
            TPLang::getLangEN() => array(
                _x('day', 'local en duration label day', TPOPlUGIN_TEXTDOMAIN),
                _x('days', 'local en duration label day', TPOPlUGIN_TEXTDOMAIN),
            ),
            TPLang::getLangRU() => array(
                _x('день', 'local ru duration label день', TPOPlUGIN_TEXTDOMAIN),
                _x('дня', 'local ru duration label дня', TPOPlUGIN_TEXTDOMAIN),
                _x('дней', 'local ru duration label дней', TPOPlUGIN_TEXTDOMAIN),
            )
        );

        if (array_key_exists(TPLang::getLang(), $dayLabelData)) {
            $dayLabel = $dayLabelData[TPLang::getLang()][$number];
        } else {
            $dayLabel = $dayLabelData[TPLang::getDefaultLang()][$number];
        }

        return $dayLabel;
    }
}