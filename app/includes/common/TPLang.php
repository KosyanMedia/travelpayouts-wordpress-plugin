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
    private static $defaultLang = "en";

    /**
     * @return string
     */
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
     * @return string
     */
    public static function getDefaultLang()
    {
        return self::$defaultLang;
    }

}