<?php
/**
 * Created by: Andrey Polyakov (andrey@polyakov.im)
 */

namespace app\includes\common;


class TPUpdateOptions
{

    public static function updateOptionsSafe($options)
    {
        $nonSafeFields = ['code_ga_ym', 'code_table_ga_ym'];
        $safeOptions = self::array_map_recursive(function ($value, $key) use ($nonSafeFields) {
            return in_array($key, $nonSafeFields)
                ? self::replaceNonSafeSymbols($value)
                : $value;
        }, $options);

        $settings = array_replace_recursive(\app\includes\TPPlugin::$options, $safeOptions);
        update_option(TPOPlUGIN_OPTION_NAME, $settings);
    }

    protected static function array_map_recursive($callback, $array)
    {
        $fn = static function ($item, $key) use (&$fn, &$callback) {
            if (is_array($item)) {
                $keys = array_keys($item);
                return array_combine($keys, array_map($fn, $item, $keys));
            }

            return $callback($item, $key);
        };

        $keys = array_keys($array);
        return array_combine($keys, array_map($fn, $array, $keys));
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
