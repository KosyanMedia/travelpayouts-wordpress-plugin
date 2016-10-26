<?php
/**
 * Created by PhpStorm.
 * User: freeman
 * Date: 25.10.16
 * Time: 16:41
 */

namespace app\includes\common;


class TPAutocompleteReplace
{
    public static function getLang()
    {
        $lang = "en";
        switch (\app\includes\TPPlugin::$options['local']['localization']) {
            case "1":
                $lang = "ru";
                break;
            case "2":
                $lang = "en";
                break;
            case "3":
                $lang = "th";
                break;
            default:
                $lang = "en";
                break;
        }
        return $lang;
    }

    /**
     * @param $data
     * @param $type
     * @param string $title
     * @return mixed
     */
    public static function iataAutocomplete($data, $type, $title = 'origin')
    {
        //error_log("TPAutocompleteReplace iataAutocomplete");
        //error_log($type);
        //error_log($title);
        //error_log(self::getLang());
        \app\includes\models\site\TPAutocomplete::getInstance();
        switch ($type) {
            case 0:
                $data = self::getTitleIataReplace($data, $title);
                break;
            case 1:
            case 2:
            if(!empty($data)) {
                foreach ($data as $key => $value) {
                    $value['origin_iata'] = $value['origin'];
                    $value['destination_iata'] = $value['destination'];
                    $value['origin'] = self::getTableIataReplace($value['origin']);
                    $value['destination'] = self::getTableIataReplace($value['destination']);
                    $data[$key] = $value;
                }
            }
                break;
            case 4:
            case 5:
            case 6:
            case 7:
            if(!empty($data)){
                foreach($data as $key => $value){
                    $value['airline_img'] = $value['airline'];
                    $value['airline_iata'] = $value['airline'];
                    $value['airline'] = self::getTableAirlineReplace($value['airline']);
                    $data[$key] = $value;
                }
            }
                break;
            case 8:
                if(!empty($data)){
                    foreach($data as $key => $value){
                        $value['airline_img'] = $value['airline'];
                        $value['airline_iata'] = $value['airline'];
                        $value['airline'] = self::getTableAirlineReplace($value['airline']);
                        $value['city'] = self::getTableIataReplace($key);
                        $data[$key] = $value;
                    }
                }
                break;
            case 9:
                if(!empty($data)){
                    foreach($data as $key => $value){
                        $value['airline_img'] = $value['airline'];
                        $value['airline_iata'] = $value['airline'];
                        $value['destination_iata'] = $key;
                        $value['origin_iata'] = $value['origin'];

                        $value['airline'] = self::getTableAirlineReplace($value['airline']);
                        $value['destination'] = self::getTableIataReplace($key);
                        $value['origin']  = self::getTableIataReplace($value['origin']);

                        $data[$key] = $value;
                    }
                }
                break;
            case 10:
                if(!empty($data)){
                    foreach($data as $key => $value){
                        $citys = explode( '-', $key );
                        $value  = self::getTableIataReplace($citys[0]);
                        $value .= ' → '.self::getTableIataReplace($citys[1]);
                        $data[$key] = $value;
                    }

                }
                break;
            case 12:
            case 13:
            case 14:
            if(!empty($data)) {
                foreach ($data as $key => $value) {
                    $value['origin_iata'] = $value['origin'];
                    $value['destination_iata'] = $value['destination'];
                    $value['origin'] = self::getTableIataReplace($value['origin']);
                    $value['destination'] = self::getTableIataReplace($value['destination']);
                    $data[$key] = $value;
                }
            }
                break;
        }
        //error_log("TPAutocompleteReplace iataAutocomplete");
       // error_log(print_r($data, true));
        return $data;
    }


    public static function getTableAirlineReplace($airline){
        $airlineName = "";
        if (!array_key_exists($airline, \app\includes\models\site\TPAutocomplete::$data_airline)) return $airline;
        if(isset(\app\includes\models\site\TPAutocomplete::$data_airline[$airline]['names'][self::getLang()])){
            $airlineName = \app\includes\models\site\TPAutocomplete::$data_airline[$airline]['names'][self::getLang()];
        }else{
            $airlineName = \app\includes\models\site\TPAutocomplete::$data_airline[$airline]['names']['en'];
        }
        return $airlineName;
    }
    /**
     * @param $iata
     * @return string
     */
    public static function getTableIataReplace($iata){
        $cityName = "";
        if (!array_key_exists($iata, \app\includes\models\site\TPAutocomplete::$data)) return $iata;
        if(isset(\app\includes\models\site\TPAutocomplete::$data[$iata]['name_translations'][self::getLang()])){
            $cityName = \app\includes\models\site\TPAutocomplete::$data[$iata]['name_translations'][self::getLang()];
        }else{
            $cityName = \app\includes\models\site\TPAutocomplete::$data[$iata]['name_translations']['en'];
        }
        return $cityName;
    }

    /**
     * @param $iata
     * @param $type
     * @return string
     */
    public static function getTitleIataReplace($iata, $type){
        $title = "";
        //error_log("getTitleIataReplace type = {$type}");
        //error_log("getTitleIataReplace iata = {$iata}");
        if ($type != 'airline') {
            if(self::getLang() == "ru"){
                if (!array_key_exists($iata, \app\includes\models\site\TPAutocomplete::$title)) return $iata;
                $title = \app\includes\models\site\TPAutocomplete::$title[$iata]['cases'][\app\includes\TPPlugin::$options['local']['title_case'][$type]];
            } else {
                if (!array_key_exists($iata, \app\includes\models\site\TPAutocomplete::$data)) return $iata;
                if(isset(\app\includes\models\site\TPAutocomplete::$data[$iata]['name_translations'][self::getLang()])){
                    $title = \app\includes\models\site\TPAutocomplete::$data[$iata]['name_translations'][self::getLang()];
                }else{
                    $title = \app\includes\models\site\TPAutocomplete::$data[$iata]['name_translations']['en'];
                }
            }
        } else {
            if (!array_key_exists($iata, \app\includes\models\site\TPAutocomplete::$data_airline)) return $iata;
            if(isset(\app\includes\models\site\TPAutocomplete::$data_airline[$iata]['names'][self::getLang()])){
                $title = \app\includes\models\site\TPAutocomplete::$data_airline[$iata]['names'][self::getLang()];
            }else{
                $title = \app\includes\models\site\TPAutocomplete::$data_airline[$iata]['names']['en'];
            }
        }

        return $title;
    }

}