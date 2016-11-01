<?php
/**
 * Created by PhpStorm.
 * User: romansolomashenko
 * Date: 26.10.16
 * Time: 6:52 PM
 */

namespace app\includes\common;


class TPLang
{

    const TP_LANG_EN = "en";
    const TP_LANG_RU = "ru";
    const TP_LANG_TH = "th";
    private static $defaultLang = self::TP_LANG_EN;
    /**
     * @return string
     */
    public static function getLang()
    {
        $lang = "en";
        switch (\app\includes\TPPlugin::$options['local']['localization']) {
            case "1":
                $lang = self::getLangRU();
                break;
            case "2":
                $lang = self::getLangEN();
                break;
            case "3":
                $lang = self::getLangTH();
                break;
            default:
                $lang = self::getLangEN();
                break;
        }
        return $lang;
    }

    /**
     * @return string
     */
    public static function getDefaultLang()
    {
        return self::$defaultLang;
    }

    /**
     * @return string
     */
    public static function getLangEN(){
        return self::TP_LANG_EN;
    }
    public static function getLangRU(){
        return self::TP_LANG_RU;
    }
    public static function getLangTH(){
        return self::TP_LANG_TH;
    }

    public static function getLangAdminAutocomplete(){
        //error_log(get_locale());
    }
}