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
     * @return array
     */
    public static function getFieldsLabelRU(){
        return  array(
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
        );
    }

    /**
     * @return array
     */
    public static function getFieldsLabelEN(){
        return array(
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
        );
    }

    /**
     * @return array
     */
    public static function getFieldsLabelTH(){
        return array(
            'label_default' => array(
                'flight_number' => _x('tp_plugin_local_th_fields_table_label_default_flight_number',
                    '(Flight number)',TPOPlUGIN_TEXTDOMAIN),
                'flight' =>  _x('tp_plugin_local_th_fields_table_label_default_flight',
                    '(Flight)',TPOPlUGIN_TEXTDOMAIN),
                'departure_at' =>  _x('tp_plugin_local_th_fields_table_label_default_departure_at',
                    '(Departure date)',TPOPlUGIN_TEXTDOMAIN),
                'return_at' =>  _x('tp_plugin_local_th_fields_table_label_default_return_at',
                    '(Return date)',TPOPlUGIN_TEXTDOMAIN),
                'number_of_changes' =>  _x('tp_plugin_local_th_fields_table_label_default_number_of_changes',
                    '(Stops)',TPOPlUGIN_TEXTDOMAIN),
                'price' =>  _x('tp_plugin_local_th_fields_table_label_default_price',
                    '(Price)',TPOPlUGIN_TEXTDOMAIN),
                'airline' =>  _x('tp_plugin_local_th_fields_table_label_default_airline',
                    '(Airlines)',TPOPlUGIN_TEXTDOMAIN),
                'airline_logo' =>  _x('tp_plugin_local_th_fields_table_label_default_airline_logo',
                    '(Logo airlines)',TPOPlUGIN_TEXTDOMAIN),
                'origin' =>  _x('tp_plugin_local_th_fields_table_label_default_origin',
                    '(Origin)',TPOPlUGIN_TEXTDOMAIN),
                'destination' =>  _x('tp_plugin_local_th_fields_table_label_default_destination',
                    '(Destination)',TPOPlUGIN_TEXTDOMAIN),
                'place' =>  _x('tp_plugin_local_th_fields_table_label_default_place',
                    '(Rank)',TPOPlUGIN_TEXTDOMAIN),
                'direction' =>  _x('tp_plugin_local_th_fields_table_label_default_direction',
                    '(Direction)',TPOPlUGIN_TEXTDOMAIN),
                'trip_class' =>  _x('tp_plugin_local_th_fields_table_label_default_trip_class',
                    '(Flight class)',TPOPlUGIN_TEXTDOMAIN),
                'distance' => _x('tp_plugin_local_th_fields_table_label_default_distance',
                    '(Distance)',TPOPlUGIN_TEXTDOMAIN),
                'price_distance' =>  _x('tp_plugin_local_th_fields_table_label_default_price_distance',
                    '(Price/distance)',TPOPlUGIN_TEXTDOMAIN),
                'found_at' =>  _x('tp_plugin_local_th_fields_table_label_default_found_at',
                    '(When found)',TPOPlUGIN_TEXTDOMAIN),
                'back_and_forth' =>  _x('tp_plugin_local_th_fields_table_label_default_back_and_forth',
                    '(One way / Round-Trip)',TPOPlUGIN_TEXTDOMAIN),
                'button' =>  _x('tp_plugin_local_th_fields_table_label_default_button',
                    '(Button)',TPOPlUGIN_TEXTDOMAIN),
                'origin_destination' =>  _x('tp_plugin_local_th_fields_table_label_default_origin_destination',
                    '(Origin - Destination)',TPOPlUGIN_TEXTDOMAIN),
            ),
            'label' => array(
                'flight_number' =>  _x('tp_plugin_local_th_fields_table_label_flight_number',
                    '(Flight number)',TPOPlUGIN_TEXTDOMAIN),
                'flight' =>  _x('tp_plugin_local_th_fields_table_label_flight',
                    '(Flight)',TPOPlUGIN_TEXTDOMAIN),
                'departure_at' =>  _x('tp_plugin_local_th_fields_table_label_departure_at',
                    '(Departure date)',TPOPlUGIN_TEXTDOMAIN),
                'return_at' =>  _x('tp_plugin_local_th_fields_table_label_return_at',
                    '(Return date)',TPOPlUGIN_TEXTDOMAIN),
                'number_of_changes' =>  _x('tp_plugin_local_th_fields_table_label_number_of_changes',
                    '(Stops)',TPOPlUGIN_TEXTDOMAIN),
                'price' =>  _x('tp_plugin_local_th_fields_table_label_price',
                    '(Price)',TPOPlUGIN_TEXTDOMAIN),
                'airline' =>  _x('tp_plugin_local_th_fields_table_label_airline',
                    '(Airlines)',TPOPlUGIN_TEXTDOMAIN),
                'airline_logo' =>  _x('tp_plugin_local_th_fields_table_label_airline_logo',
                    '(Airlines)',TPOPlUGIN_TEXTDOMAIN),
                'origin' =>  _x('tp_plugin_local_th_fields_table_label_origin',
                    '(Origin)',TPOPlUGIN_TEXTDOMAIN),
                'destination' =>  _x('tp_plugin_local_th_fields_table_label_destination',
                    '(Destination)',TPOPlUGIN_TEXTDOMAIN),
                'place' =>  _x('tp_plugin_local_th_fields_table_label_place',
                    '(Rank)',TPOPlUGIN_TEXTDOMAIN),
                'direction' =>  _x('tp_plugin_local_th_fields_table_label_direction',
                    '(Direction)',TPOPlUGIN_TEXTDOMAIN),
                'trip_class' =>  _x('tp_plugin_local_th_fields_table_label_trip_class',
                    '(Flight class)',TPOPlUGIN_TEXTDOMAIN),
                'distance' =>  _x('tp_plugin_local_th_fields_table_label_distance',
                    '(Distance)',TPOPlUGIN_TEXTDOMAIN),
                'price_distance' =>  _x('tp_plugin_local_th_fields_table_label_price_distance',
                    '(Price/distance)',TPOPlUGIN_TEXTDOMAIN),
                'found_at' =>  _x('tp_plugin_local_th_fields_table_label_found_at',
                    '(When found)',TPOPlUGIN_TEXTDOMAIN),
                'back_and_forth' =>  _x('tp_plugin_local_th_fields_table_label_back_and_forth',
                    '(One way / Round-Trip)',TPOPlUGIN_TEXTDOMAIN),
                'button' =>  _x('tp_plugin_local_th_fields_table_label_button',
                    '(Find Ticket)',TPOPlUGIN_TEXTDOMAIN),
                'origin_destination' =>  _x('tp_plugin_local_th_fields_table_label_origin_destination',
                    '(Origin - Destination)',TPOPlUGIN_TEXTDOMAIN),
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
                TPLang::getLangEN() => _x('tp_plugin_local_en_trip_class_economy', '(Economy)', TPOPlUGIN_TEXTDOMAIN),
                TPLang::getLangRU() => _x('tp_plugin_local_ru_trip_class_economy', '(Эконом)', TPOPlUGIN_TEXTDOMAIN),
            ),
            "1" => array(
                TPLang::getLangEN() => _x('tp_plugin_local_en_trip_class_business', '(Business)', TPOPlUGIN_TEXTDOMAIN),
                TPLang::getLangRU() => _x('tp_plugin_local_ru_trip_class_business', '(Бизнес)', TPOPlUGIN_TEXTDOMAIN),
            ),
            "2" => array(
                TPLang::getLangEN() => _x('tp_plugin_local_en_trip_class_first', '(First)', TPOPlUGIN_TEXTDOMAIN),
                TPLang::getLangRU() => _x('tp_plugin_local_ru_trip_class_first', '(Первый)', TPOPlUGIN_TEXTDOMAIN),
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
                TPLang::getLangEN() => _x('tp_plugin_local_en_distance_label_km', '(km)', TPOPlUGIN_TEXTDOMAIN),
                TPLang::getLangRU() => _x('tp_plugin_local_ru_distance_label_km', '(км)', TPOPlUGIN_TEXTDOMAIN),
            ),
            2 => array(
                TPLang::getLangEN() => _x('tp_plugin_local_en_distance_label_m', '(m)', TPOPlUGIN_TEXTDOMAIN),
                TPLang::getLangRU() => _x('tp_plugin_local_ru_distance_label_m', '(м)', TPOPlUGIN_TEXTDOMAIN),
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
                TPLang::getLangEN() => _x('tp_plugin_local_en_number_changes_label_direct', '(Direct)', TPOPlUGIN_TEXTDOMAIN),
                TPLang::getLangRU() => _x('tp_plugin_local_ru_number_changes_label_direct', '(Прямой)', TPOPlUGIN_TEXTDOMAIN),
            ),
            1 => array(
                TPLang::getLangEN() => _x('tp_plugin_local_en_number_changes_label_stop', '(stop)', TPOPlUGIN_TEXTDOMAIN),
                TPLang::getLangRU() => _x('tp_plugin_local_ru_number_changes_label_stop', '(пересадка)', TPOPlUGIN_TEXTDOMAIN),
            ),
            2 => array(
                TPLang::getLangEN() => _x('tp_plugin_local_en_number_changes_label_stops', '(stops)', TPOPlUGIN_TEXTDOMAIN),
                TPLang::getLangRU() => _x('tp_plugin_local_ru_number_changes_label_stops', '(пересадки)', TPOPlUGIN_TEXTDOMAIN),
            ),
        );

        if(isset($numberChangesLabelData[$numberChangesType][TPLang::getLang()])){

            $numberChangesLabel = $numberChangesLabelData[$numberChangesType][TPLang::getLang()];
        }else{
            $numberChangesLabel = $numberChangesLabelData[$numberChangesType][TPLang::getDefaultLang()];
        }

        return $numberChangesLabel;
    }
}