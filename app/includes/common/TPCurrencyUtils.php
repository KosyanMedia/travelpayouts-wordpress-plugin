<?php
/**
 * Created by PhpStorm.
 * User: freeman
 * Date: 18.04.16
 * Time: 17:43
 */

namespace app\includes\common;

use \app\includes\TPPlugin;

class TPCurrencyUtils
{
    const TP_CURRENCY_RUB = 'RUB';
    const TP_CURRENCY_USD = 'USD';
    const TP_CURRENCY_EUR = 'EUR';
    const TP_CURRENCY_BRL = 'BRL';
    const TP_CURRENCY_CAD = 'CAD';
    const TP_CURRENCY_CHF = 'CHF';
    const TP_CURRENCY_HKD = 'HKD';
    const TP_CURRENCY_IDR = 'IDR';
    const TP_CURRENCY_INR = 'INR';
    const TP_CURRENCY_NZD = 'NZD';
    const TP_CURRENCY_PHP = 'PHP';
    const TP_CURRENCY_PLN = 'PLN';
    const TP_CURRENCY_SGD = 'SGD';
    const TP_CURRENCY_THB = 'THB';
    const TP_CURRENCY_GBP = 'GBP';
    const TP_CURRENCY_ZAR = 'ZAR';
    const TP_CURRENCY_UAH = 'UAH';
    const TP_CURRENCY_KZT = 'KZT';
    const TP_CURRENCY_AUD = 'AUD';
    const TP_CURRENCY_TRY = 'TRY';
    const TP_CURRENCY_ILS = 'ILS';
    const TP_CURRENCY_ARS = 'ARS';
    const TP_CURRENCY_COP = 'COP';
    const TP_CURRENCY_PEN = 'PEN';
    const TP_CURRENCY_CLP = 'CLP';
    const TP_CURRENCY_AED = 'AED';
    const TP_CURRENCY_SAR = 'SAR';
    const TP_CURRENCY_SEK = 'SEK';
    const TP_CURRENCY_HUF = 'HUF';
    const TP_CURRENCY_KGS = 'KGS';
    const TP_CURRENCY_MXN = 'MXN';
    const TP_CURRENCY_AMD = 'AMD';
    const TP_CURRENCY_XOF = 'XOF';
    const TP_CURRENCY_VND = 'VND';
    const TP_CURRENCY_BGN = 'BGN';
    const TP_CURRENCY_GEL = 'GEL';
    const TP_CURRENCY_RON = 'RON';
    const TP_CURRENCY_DKK = 'DKK';
    const TP_CURRENCY_BDT = 'BDT';
    const TP_CURRENCY_KRW = 'KRW';
    const TP_CURRENCY_RSD = 'RSD';

    const TP_CURRENCY_AZN = 'AZN';
    const TP_CURRENCY_BYN = 'BYN';
    const TP_CURRENCY_CNY = 'CNY';
    const TP_CURRENCY_EGP = 'EGP';
    const TP_CURRENCY_JPY = 'JPY';
    const TP_CURRENCY_MYR = 'MYR';
    const TP_CURRENCY_NOK = 'NOK';
    const TP_CURRENCY_PKR = 'PKR';

    const TP_CURRENCY_BHD = 'BHD';
    const TP_CURRENCY_CZK = 'CZK';
    const TP_CURRENCY_IQD = 'IQD';
    const TP_CURRENCY_ISK = 'ISK';
    const TP_CURRENCY_JOD = 'JOD';
    const TP_CURRENCY_KWD = 'KWD';
    const TP_CURRENCY_LKR = 'LKR';
    const TP_CURRENCY_LYD = 'LYD';
    const TP_CURRENCY_MUR = 'MUR';
    const TP_CURRENCY_NGN = 'NGN';
    const TP_CURRENCY_NPR = 'NPR';
    const TP_CURRENCY_OMR = 'OMR';
    const TP_CURRENCY_QAR = 'QAR';
    const TP_CURRENCY_TJS = 'TJS';


    /**
     * @return mixed
     */
    public static function getCurrencyAll(){
        $currency = array();
        $currency = array(
            //self::TP_CURRENCY_RUB,
            //self::TP_CURRENCY_USD,
            //self::TP_CURRENCY_EUR,
            self::TP_CURRENCY_BRL,
            self::TP_CURRENCY_CAD,
            self::TP_CURRENCY_CHF,
            self::TP_CURRENCY_HKD,
            self::TP_CURRENCY_IDR,
            self::TP_CURRENCY_INR,
            self::TP_CURRENCY_NZD,
            self::TP_CURRENCY_PHP,
            self::TP_CURRENCY_PLN,
            self::TP_CURRENCY_SGD,
            self::TP_CURRENCY_THB,
            self::TP_CURRENCY_GBP,
            self::TP_CURRENCY_ZAR,
            self::TP_CURRENCY_UAH,
            self::TP_CURRENCY_KZT,
            self::TP_CURRENCY_AUD,
            self::TP_CURRENCY_TRY,
            self::TP_CURRENCY_ILS,
            self::TP_CURRENCY_ARS,
            self::TP_CURRENCY_COP,
            self::TP_CURRENCY_PEN,
            self::TP_CURRENCY_CLP,
            self::TP_CURRENCY_AED,
            self::TP_CURRENCY_SAR,
            self::TP_CURRENCY_SEK,
            self::TP_CURRENCY_HUF,
            self::TP_CURRENCY_KGS,
            self::TP_CURRENCY_MXN,
            self::TP_CURRENCY_AMD,
            self::TP_CURRENCY_XOF,
            self::TP_CURRENCY_VND,
            self::TP_CURRENCY_BGN,
            self::TP_CURRENCY_GEL,
            self::TP_CURRENCY_RON,
            self::TP_CURRENCY_DKK,
            self::TP_CURRENCY_BDT,
            self::TP_CURRENCY_KRW,
            self::TP_CURRENCY_RSD,

            self::TP_CURRENCY_AZN,
            self::TP_CURRENCY_BYN,
            self::TP_CURRENCY_CNY,
            self::TP_CURRENCY_EGP,
            self::TP_CURRENCY_JPY,
            self::TP_CURRENCY_MYR,
            self::TP_CURRENCY_NOK,
            self::TP_CURRENCY_PKR,
            self::TP_CURRENCY_BHD,
            self::TP_CURRENCY_CZK,
            self::TP_CURRENCY_IQD,
            self::TP_CURRENCY_ISK,
            self::TP_CURRENCY_JOD,
            self::TP_CURRENCY_KWD,
            self::TP_CURRENCY_LKR,
            self::TP_CURRENCY_LYD,
            self::TP_CURRENCY_MUR,
            self::TP_CURRENCY_NGN,
            self::TP_CURRENCY_NPR,
            self::TP_CURRENCY_OMR,
            self::TP_CURRENCY_QAR,
            self::TP_CURRENCY_TJS,
        );
        sort($currency);
        array_unshift($currency, self::TP_CURRENCY_RUB, self::TP_CURRENCY_USD, self::TP_CURRENCY_EUR);
        //error_log(print_r($currency, true));
        //error_log(count($currency));
        return $currency;
    }

    public static function getDefaultCurrency(){
        $currency = self::TP_CURRENCY_USD;
        global $locale;
        switch($locale) {
            case "ru_RU":
                $currency = self::TP_CURRENCY_RUB;
                break;
            case "en_US":
                $currency = self::TP_CURRENCY_USD;
                break;
            default:
                $currency = self::TP_CURRENCY_RUB;
                break;
        }
        return $currency;
    }

    /**
     * @return string
     */
    public static function getCurrency(){
        $currency = '';

        if (!empty(TPPlugin::$options['local']['currency'])){
            $currency = TPPlugin::$options['local']['currency'];
        } else {
            $currency = self::getDefaultCurrency();
        }
        return $currency;
    }


    public static function currencyValid(){
        if ( ! TPPlugin::$options['local']['currency'] ||
            ! in_array( TPPlugin::$options['local']['currency'], self::getCurrencyAll() ) ) {
            TPPlugin::$options['local']['currency'] = self::getDefaultCurrency();
            update_option( TPOPlUGIN_OPTION_NAME,  TPPlugin::$options);
        }
    }

    public static function isCurrency($currency){
        if (! $currency || ! in_array( $currency, self::getCurrencyAll() ))
            return false;
        return true;
    }

}