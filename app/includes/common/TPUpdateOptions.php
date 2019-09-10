<?php
/**
 * Created by: Andrey Polyakov (andrey@polyakov.im)
 */

namespace app\includes\common;


class TPUpdateOptions
{

    public static function updateOptionsSafe($options)
    {
        $safeOptions = self::array_map_recursive(function ($value) {
            return self::replaceNonSafeSymbols($value);
        }, $options);

        $settings = array_replace_recursive(\app\includes\TPPlugin::$options, $safeOptions);
        update_option(TPOPlUGIN_OPTION_NAME, $settings);
    }

    protected static function array_map_recursive($callback, $array)
    {
        $fn = static function ($item) use (&$fn, &$callback) {
            return is_array($item) ? array_map($fn, $item) : $callback($item);
        };

        return array_map($fn, $array);
    }

    /**
     * Replacing non safe symbols
     * @param $input
     * @return mixed
     */
    protected static function replaceNonSafeSymbols($input)
    {
        $dictionary = [
            '<script',
            '</script>',
            'base64',
            'document',
            'eval',
            'fromCharCode',
        ];

        return str_ireplace($dictionary, array_fill(0, count($dictionary), ''), $input) === $input
            ? $input
            : '';
    }
}
