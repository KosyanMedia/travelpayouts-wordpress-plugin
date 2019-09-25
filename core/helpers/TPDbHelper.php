<?php
/**
 * Created by: Andrey Polyakov (andrey@polyakov.im)
 */

namespace core\helpers;


class TPDbHelper
{
    public static function getFormat($data, $formatData)
    {
        if (is_array($data) &&
            is_array($formatData) &&
            self::isMultidimensionalArray($data) &&
            self::isMultidimensionalArray($formatData)
        ) {
            $mappedData = array_map(static function ($key) use ($formatData) {
                if (array_key_exists($key, $formatData)) {
                    $format = $formatData[$key];
                    if (self::isValidFormat($format)) {
                        return $format;
                    }
                }
                return '%s';
            }, array_keys($data));
            return $mappedData;
        }
    }

    protected static function isMultidimensionalArray($data)
    {
        return count($data) == count($data, COUNT_RECURSIVE);
    }


    //  A format is one of '%d', '%f', '%s' (integer, float, string).
    protected static function isValidFormat($format)
    {
        $validFormatList = ['%d', '%f', '%s'];
        return in_array($format, $validFormatList, true);
    }
}
