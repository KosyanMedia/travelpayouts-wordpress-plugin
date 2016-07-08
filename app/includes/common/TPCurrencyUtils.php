<?php
/**
 * Created by PhpStorm.
 * User: freeman
 * Date: 18.04.16
 * Time: 17:43
 */

namespace app\includes\common;


class TPCurrencyUtils
{
    private static $currency = array(
        'RUB', 'USD','EUR', 'BRL', 'CAD', 'CHF',
        'HKD', 'IDR', 'INR', 'NZD', 'PHP', 'PLN',
        'SGD', 'THB', 'GBP', 'ZAR', 'UAH'
    );

    /**
     * @return mixed
     */
    public static function getCurrencyAll(){
        return self::$currency;
    }


}