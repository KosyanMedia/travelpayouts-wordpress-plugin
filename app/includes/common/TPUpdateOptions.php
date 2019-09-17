<?php
/**
 * Created by: Andrey Polyakov (andrey@polyakov.im)
 */

namespace app\includes\common;


class TPUpdateOptions
{

    public static function updateOptionsSafe($options)
    {
        update_option(TPOPlUGIN_OPTION_NAME, self::sanitizeSettings($options));
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

    public static function sanitizeSettings($settings)
    {
        //TODO refactor replacement
        if (isset($settings['config']['code_ga_ym']) && !empty($settings['config']['code_ga_ym'])) {
            $settings['config']['code_ga_ym'] = self::replaceNonSafeSymbols($settings['config']['code_ga_ym']);
        }

        if (isset($settings['config']['code_table_ga_ym']) && !empty($settings['config']['code_table_ga_ym'])) {
            $settings['config']['code_table_ga_ym'] = self::replaceNonSafeSymbols($settings['config']['code_table_ga_ym']);
        }

        return $settings;
    }

    public static function sanitizeLinks($links)
    {
        if (isset($links['arl_event']) && !empty($links['arl_event'])) {
            $links['arl_event'] = self::replaceNonSafeSymbols($links['arl_event']);
        }

        return $links;
    }


    public static function unescapeOptions($options)
    {
        return self::array_map_recursive(static function ($value) {
            return preg_replace('/(\\\\+)/m', '', $value);
        }, $options);
    }
}
