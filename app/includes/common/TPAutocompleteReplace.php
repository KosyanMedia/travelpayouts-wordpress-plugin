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
                $lang = "en";
                break;
            case "2":
                $lang = "ru";
                break;
            case "3":
                $lang = "th";
                break;
            default:
                $lang = "en";
                break;
                return $lang;
        }
    }

    /**
     * @param $data
     * @param $type
     * @param string $title
     * @return mixed
     */
    public static function iataAutocomplete($data, $type, $title = 'origin')
    {
        error_log("TPAutocompleteReplace iataAutocomplete");
        error_log($type);
        error_log($title);
        \app\includes\models\site\TPAutocomplete::getInstance();
        switch ($type) {
            case 0:
                if ($title != 'airline') {
                    $data = self::getTitleIataAutocomplete($data, $title);
                } else {

                }
                break;
            case 1:
            case 2:
                break;
            case 4:
            case 5:
            case 6:
            case 7:
                break;
            case 8:
                break;
            case 9:
                break;
            case 10:
                break;
            case 12:
            case 13:
            case 14:
                break;
        }
        error_log("TPAutocompleteReplace iataAutocomplete");
        error_log(print_r($data, true));
        return $data;
    }

    public static function getTitleIataAutocomplete($iata, $type){
        $title = "";
        if(self::getLang() == "ru"){
            $title = \app\includes\models\site\TPAutocomplete::$title[$iata]['cases'][\app\includes\TPPlugin::$options['local']['title_case'][$type]];
        } else {
            if(isset(\app\includes\models\site\TPAutocomplete::$data[$iata]['name_translations'][self::getLang()])){
                $title = \app\includes\models\site\TPAutocomplete::$data[$iata]['name_translations'][self::getLang()];
            }else{
                $title = \app\includes\models\site\TPAutocomplete::$data[$iata]['name_translations']['en'];
            }
        }
        return $title;
    }

}