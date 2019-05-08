<?php
/**
 * Created by: Andrey Polyakov (andrey@polyakov.im)
 */

namespace app\includes\common;


class TpPluginHelper
{
    public static function count($data)
    {
        return self::is_countable($data)
            ? count($data)
            : 0;
    }

    protected static function is_countable($var)
    {
        return is_array($var)
            || $var instanceof \Countable
            || $var instanceof \SimpleXMLElement
            || $var instanceof \ResourceBundle;
    }
}
