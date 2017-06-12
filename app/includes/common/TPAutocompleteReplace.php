<?php
/**
 * Created by PhpStorm.
 * User: freeman
 * Date: 25.10.16
 * Time: 16:41
 */

namespace app\includes\common;

use \app\includes\models\site\TPAutocomplete;

class TPAutocompleteReplace
{

	public static function replaceNumberRailway($number){
		if(empty($number) || $number == false) return false;
		TPAutocomplete::getInstance();
		$name = '';
		$name = TPAutocomplete::getRailwayAutocomplete($number);
		return $name;
	}


    public static function replaceIataCase($iata, $case = 'ro'){
        if(empty($iata) || $iata == false) return false;
        TPAutocomplete::getInstance();
        $city = '';
        if(TPLang::getLang() == TPLang::getLangRU()){
            if (!array_key_exists($iata, TPAutocomplete::$title)) return $iata;
            $city = TPAutocomplete::$title[$iata]['cases'][$case];
        } else {
            if (!array_key_exists($iata, TPAutocomplete::$data)) return $iata;
            if(isset(TPAutocomplete::$data[$iata]['name_translations'][TPLang::getLang()])){
                $city = TPAutocomplete::$data[$iata]['name_translations'][TPLang::getLang()];
            }else{
                $city = TPAutocomplete::$data[$iata]['name_translations'][TPLang::getDefaultLang()];
            }
        }
        return $city;
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
        //error_log(TPLang::getLang());
        TPAutocomplete::getInstance();
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
        if(isset(\app\includes\models\site\TPAutocomplete::$data_airline[$airline]['names'][TPLang::getLang()])){
            $airlineName = \app\includes\models\site\TPAutocomplete::$data_airline[$airline]['names'][TPLang::getLang()];
        }else{
            $airlineName = \app\includes\models\site\TPAutocomplete::$data_airline[$airline]['names'][TPLang::getDefaultLang()];
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
        if(isset(\app\includes\models\site\TPAutocomplete::$data[$iata]['name_translations'][TPLang::getLang()])){
            $cityName = \app\includes\models\site\TPAutocomplete::$data[$iata]['name_translations'][TPLang::getLang()];
        }else{
            $cityName = \app\includes\models\site\TPAutocomplete::$data[$iata]['name_translations'][TPLang::getDefaultLang()];
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
            if(TPLang::getLang() == TPLang::getLangRU()){
                if (!array_key_exists($iata, \app\includes\models\site\TPAutocomplete::$title)) return $iata;
                $title = \app\includes\models\site\TPAutocomplete::$title[$iata]['cases'][\app\includes\TPPlugin::$options['local']['title_case'][$type]];
            } else {
                if (!array_key_exists($iata, \app\includes\models\site\TPAutocomplete::$data)) return $iata;
                if(isset(\app\includes\models\site\TPAutocomplete::$data[$iata]['name_translations'][TPLang::getLang()])){
                    $title = \app\includes\models\site\TPAutocomplete::$data[$iata]['name_translations'][TPLang::getLang()];
                }else{
                    $title = \app\includes\models\site\TPAutocomplete::$data[$iata]['name_translations'][TPLang::getDefaultLang()];
                }
            }
        } else {
            if (!array_key_exists($iata, \app\includes\models\site\TPAutocomplete::$data_airline)) return $iata;
            if(isset(\app\includes\models\site\TPAutocomplete::$data_airline[$iata]['names'][TPLang::getLang()])){
                $title = \app\includes\models\site\TPAutocomplete::$data_airline[$iata]['names'][TPLang::getLang()];
            }else{
                $title = \app\includes\models\site\TPAutocomplete::$data_airline[$iata]['names'][TPLang::getDefaultLang()];
            }
        }

        return $title;
    }

   /* public static function getCityById($id){
       // TPAutocomplete::getInstance();
        return TPAutocomplete::getLocationsById($id);
    }*/


}