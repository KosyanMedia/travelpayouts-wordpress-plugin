<?php

/**
 * Created by PhpStorm.
 * User: freeman
 * Date: 18.04.16
 * Time: 13:11
 */
namespace app\includes\common;

use \app\includes\TPPlugin;

class TPHostURL
{
    const TP_HOST_URL_AIRLINE_LOGO = "https://pics.avs.io/";
    const TP_HOST_URL_RAILWAY = "";
    private static $hosts = array(
        'aviasales.ru' => array(
            'table' => 'hydra.aviasales.ru',//'engine.aviasales.ru',
            'widget' => array(
                1 => '',
                2 => '',
                3 => 'hydra.aviasales.ru',
                4 => '',
                5 => '',
                6 => '',
                7 => '',
                8 => 'hydra.aviasales.ru'
            )
        ),
        'jetradar.com' => array(
            'table' => 'jetradar.com',
            'widget' => array(
                1 => '',
                2 => '',
                //3 => 'jetradar.com/new_searches/',
                3 => 'jetradar.com/searches/new/',
                4 => '',
                5 => '',
                6 => '',
                7 => '',
                8 => 'jetradar.com/new_searches/'
            )
        ),
        'jetradar.com.br' => array(
            'table' => 'jetradar.com.br',
            'widget' => array(
                1 => '',
                2 => '',
                3 => 'jetradar.com.br/searches/new/',
                4 => '',
                5 => '',
                6 => '',
                7 => '',
                8 => 'jetradar.com.br/new_searches/'
            )
        ),
        'ca.jetradar.com' => array(
            'table' => 'ca.jetradar.com',
            'widget' => array(
                1 => '',
                2 => '',
                3 => 'ca.jetradar.com/searches/new/',
                4 => '',
                5 => '',
                6 => '',
                7 => '',
                8 => 'ca.jetradar.com/new_searches/'
            )
        ),
        'jetradar.ch' => array(
            'table' => 'jetradar.ch',
            'widget' => array(
                1 => '',
                2 => '',
                3 => 'jetradar.ch/searches/new/',
                4 => '',
                5 => '',
                6 => '',
                7 => '',
                8 => 'jetradar.ch/new_searches/'
            )
        ),
        'jetradar.at' => array(
            'table' => 'jetradar.at',
            'widget' => array(
                1 => '',
                2 => '',
                3 => 'jetradar.at/searches/new/',
                4 => '',
                5 => '',
                6 => '',
                7 => '',
                8 => 'jetradar.at/new_searches/'
            )
        ),
        'jetradar.be' => array(
            'table' => 'jetradar.be',
            'widget' => array(
                1 => '',
                2 => '',
                3 => 'jetradar.be/searches/new/',
                4 => '',
                5 => '',
                6 => '',
                7 => '',
                8 => 'jetradar.be/new_searches/'
            )
        ),
        'jetradar.co.nl' => array(
            'table' => 'jetradar.co.nl',
            'widget' => array(
                1 => '',
                2 => '',
                3 => 'jetradar.co.nl/searches/new/',
                4 => '',
                5 => '',
                6 => '',
                7 => '',
                8 => 'jetradar.co.nl/new_searches/'
            )
        ),
        'jetradar.gr' => array(
            'table' => 'jetradar.gr',
            'widget' => array(
                1 => '',
                2 => '',
                3 => 'jetradar.gr/searches/new/',
                4 => '',
                5 => '',
                6 => '',
                7 => '',
                8 => 'jetradar.gr/new_searches/'
            )
        ),
        'jetradar.com.au' => array(
            'table' => 'jetradar.com.au',
            'widget' => array(
                1 => '',
                2 => '',
                3 => 'jetradar.com.au/searches/new/',
                4 => '',
                5 => '',
                6 => '',
                7 => '',
                8 => 'jetradar.com.au/new_searches/'
            )
        ),
        'jetradar.de' => array(
            'table' => 'jetradar.de',
            'widget' => array(
                1 => '',
                2 => '',
                3 => 'jetradar.de/searches/new/',
                4 => '',
                5 => '',
                6 => '',
                7 => '',
                8 => 'jetradar.de/new_searches/'
            )
        ),
        'jetradar.es' => array(
            'table' => 'jetradar.es',
            'widget' => array(
                1 => '',
                2 => '',
                3 => 'jetradar.es/searches/new/',
                4 => '',
                5 => '',
                6 => '',
                7 => '',
                8 => 'jetradar.es/new_searches/'
            )
        ),
        'jetradar.fr' => array(
            'table' => 'jetradar.fr',
            'widget' => array(
                1 => '',
                2 => '',
                3 => 'jetradar.fr/searches/new/',
                4 => '',
                5 => '',
                6 => '',
                7 => '',
                8 => 'jetradar.fr/new_searches/'
            )
        ),
        'jetradar.it' => array(
            'table' => 'jetradar.it',
            'widget' => array(
                1 => '',
                2 => '',
                3 => 'jetradar.it/searches/new/',
                4 => '',
                5 => '',
                6 => '',
                7 => '',
                8 => 'jetradar.it/new_searches/'
            )
        ),
        'jetradar.pt' => array(
            'table' => 'jetradar.pt',
            'widget' => array(
                1 => '',
                2 => '',
                3 => 'jetradar.pt/searches/new/',
                4 => '',
                5 => '',
                6 => '',
                7 => '',
                8 => 'jetradar.pt/new_searches/'
            )
        ),
        'ie.jetradar.com' => array(
            'table' => 'ie.jetradar.com',
            'widget' => array(
                1 => '',
                2 => '',
                3 => 'ie.jetradar.com/searches/new/',
                4 => '',
                5 => '',
                6 => '',
                7 => '',
                8 => 'ie.jetradar.com/new_searches/'
            )
        ),
        'jetradar.co.uk' => array(
            'table' => 'jetradar.co.uk',
            'widget' => array(
                1 => '',
                2 => '',
                3 => 'jetradar.co.uk/searches/new/',
                4 => '',
                5 => '',
                6 => '',
                7 => '',
                8 => 'jetradar.co.uk/new_searches/'
            )
        ),
        'jetradar.hk' => array(
            'table' => 'jetradar.hk',
            'widget' => array(
                1 => '',
                2 => '',
                3 => 'jetradar.hk/searches/new/',
                4 => '',
                5 => '',
                6 => '',
                7 => '',
                8 => 'jetradar.hk/new_searches/'
            )
        ),
        'jetradar.in' => array(
            'table' => 'jetradar.in',
            'widget' => array(
                1 => '',
                2 => '',
                3 => 'jetradar.in/searches/new/',
                4 => '',
                5 => '',
                6 => '',
                7 => '',
                8 => 'jetradar.in/new_searches/'
            )
        ),
        'jetradar.co.nz' => array(
            'table' => 'jetradar.co.nz',
            'widget' => array(
                1 => '',
                2 => '',
                3 => 'jetradar.co.nz/searches/new/',
                4 => '',
                5 => '',
                6 => '',
                7 => '',
                8 => 'jetradar.co.nz/new_searches/'
            )
        ),
        'jetradar.ph' => array(
            'table' => 'jetradar.ph',
            'widget' => array(
                1 => '',
                2 => '',
                3 => 'jetradar.ph/searches/new/',
                4 => '',
                5 => '',
                6 => '',
                7 => '',
                8 => 'jetradar.ph/new_searches/'
            )
        ),
        'jetradar.pl' => array(
            'table' => 'jetradar.pl',
            'widget' => array(
                1 => '',
                2 => '',
                3 => 'jetradar.pl/searches/new/',
                4 => '',
                5 => '',
                6 => '',
                7 => '',
                8 => 'jetradar.pl/new_searches/'
            )
        ),
        'jetradar.sg' => array(
            'table' => 'jetradar.sg',
            'widget' => array(
                1 => '',
                2 => '',
                3 => 'jetradar.sg/searches/new/',
                4 => '',
                5 => '',
                6 => '',
                7 => '',
                8 => 'jetradar.sg/new_searches/'
            )
        ),
        'jetradar.co.th' => array(
            'table' => 'jetradar.co.th',
            'widget' => array(
                1 => '',
                2 => '',
                3 => 'jetradar.co.th/searches/new/',
                4 => '',
                5 => '',
                6 => '',
                7 => '',
                8 => 'jetradar.co.th/new_searches/'
            )
        ),
    );

    private static $hostsHotel = array(
        'hotellook.ru' => array(
            'label' => 'hotellook.ru',
            'host' => 'search.hotellook.com',
            'language' => 'ru-RU',
        ),
        'hotellook.com&language=en-GB' => array(
            'label' => 'hotellook.com en-GB',
            'host' => 'search.hotellook.com',
            'language' => 'en-GB',
        ),
        'hotellook.com&language=en-US' => array(
            'label' => 'hotellook.com en-US',
            'host' => 'search.hotellook.com',
            'language' => 'en-US',
        ),
        'hotellook.com&language=pt-BR' => array(
            'label' => 'hotellook.com pt-BR',
            'host' => 'search.hotellook.com',
            'language' => 'pt-BR',
        ),
        'hotellook.com&language=pt-PT' => array(
            'label' => 'hotellook.com pt-PT',
            'host' => 'search.hotellook.com',
            'language' => 'pt-PT',
        ),
        'hotellook.com&language=id-ID' => array(
            'label' => 'hotellook.com id-ID',
            'host' => 'search.hotellook.com',
            'language' => 'id-ID',
        ),
        'hotellook.com&language=fr-FR' => array(
            'label' => 'hotellook.com fr-FR',
            'host' => 'search.hotellook.com',
            'language' => 'fr-FR',
        ),
        'hotellook.com&language=it-IT' => array(
            'label' => 'hotellook.com it-IT',
            'host' => 'search.hotellook.com',
            'language' => 'it-IT',
        ),
        'hotellook.com&language=de-DE' => array(
            'label' => 'hotellook.com de-DE',
            'host' => 'search.hotellook.com',
            'language' => 'de-DE',
        ),
        'hotellook.com&language=pl-PL' => array(
            'label' => 'hotellook.com pl-PL',
            'host' => 'search.hotellook.com',
            'language' => 'pl-PL',
        ),
        'hotellook.com&language=es-ES' => array(
            'label' => 'hotellook.com es-ES',
            'host' => 'search.hotellook.com',
            'language' => 'es-ES',
        ),
        'hotellook.com&language=th-TH' => array(
            'label' => 'hotellook.com th-TH',
            'host' => 'search.hotellook.com',
            'language' => 'th-TH',
        ),
        'hotellook.com&language=en-AU' => array(
            'label' => 'hotellook.com en-AU',
            'host' => 'search.hotellook.com',
            'language' => 'en-AU',
        ),
        'hotellook.com&language=en-CA' => array(
            'label' => 'hotellook.com en-CA',
            'host' => 'search.hotellook.com',
            'language' => 'en-CA',
        ),
        'hotellook.com&language=en-IE' => array(
            'label' => 'hotellook.com en-IE',
            'host' => 'search.hotellook.com',
            'language' => 'en-IE',
        ),
    );

    public static function getDefaultHostHotel(){
        $host = "";
        $hostData = array(
            TPLang::getLangRU() => array(
                'label' => 'hotellook.ru',
                'host' => 'search.hotellook.com',
                'language' => 'ru-RU',
            ),
            TPLang::getLangEN() =>  array(
                'label' => 'hotellook.com en-GB',
                'host' => 'search.hotellook.com',
                'language' => 'en-GB',
            ),
        );
        if (!array_key_exists(TPLang::getLang(), $hostData)){
            $host = $hostData[TPLang::getDefaultLang()];
        } else {
            $host = $hostData[TPLang::getLang()];
        }
        return $host;
    }

    public static function getHostHotel(){
        $host = TPPlugin::$options['local']['host_hotel'];
        if (! $host || empty( $host )){
            $host = self::getDefaultHostHotel();
        } else {
            $host = self::$hostsHotel[$host];
            if (! $host || empty( $host )){
                $host = self::getDefaultHostHotel();
            }
        }
        return $host;
    }

    public static function getHostsHotel(){
        return self::$hostsHotel;
    }

    /**
     * @return string
     */
    public static function getHostTable(){
        $host = TPPlugin::$options['local']['host'];
        if (! $host || empty( $host )){
            $host = self::getDefaultHostTable();
        } else {
            $host = self::$hosts[$host]['table'];
            if (! $host || empty( $host )){
                $host = self::getDefaultHostTable();
            }else{
                $host = 'https://'.$host;
            }
        }
        return $host;
    }

    public static function getDefaultHostTable(){
        $host = "";
        $hostData = array(
            TPLang::getLangRU() => 'https://hydra.aviasales.ru',//'https://engine.aviasales.ru',
            TPLang::getLangEN() => 'https://jetradar.com',
            TPLang::getLangTH() => 'https://jetradar.co.th',
        );
        if (!array_key_exists(TPLang::getLang(), $hostData)){
            $host = $hostData[TPLang::getDefaultLang()];
        } else {
            $host = $hostData[TPLang::getLang()];
        }
        return $host;
    }


    /**
     * @param $widget
     * @return mixed
     */
    public static function getHostWidget($widget){
        $host = \app\includes\TPPlugin::$options['local']['host'];
        if (! $host || empty( $host )){
            $host = self::getDefaultHostTable();
        }

        //3,6,8
        if (array_key_exists($host, self::$hosts)){
            if (array_key_exists($widget, self::$hosts[$host]['widget'])){
                $host = self::$hosts[$host]['widget'][$widget];
            }
        }

        //error_log($widget.$host);
        return $host;
    }

    /**
     * @param $widgetType
     * @return string
     */
    public static function getHostWidgetWhenEmptyWhiteLabel($widgetType){
        $host = "";
        $hostData = array(
            1 => array(
                TPLang::getLangRU() => 'http://map.aviasales.ru',
                TPLang::getLangEN() => 'http://map.jetradar.com',
            ),
            2 => array(
                TPLang::getLangRU() => 'hotellook.ru',
                TPLang::getLangEN() => 'hotellook.com',
            ),
            3 => array(
                TPLang::getLangRU() => 'hydra.aviasales.ru',
                TPLang::getLangEN() => 'hydra.jetradar.com',
            ),
            4 => array(
                TPLang::getLangRU() => 'hydra.aviasales.ru',
                TPLang::getLangEN() => 'hydra.aviasales.ru',
            ),
            5 => array(
                TPLang::getLangRU() => 'hotellook.ru',
                TPLang::getLangEN() => 'hotellook.com',
            ),
            6 => array(
                TPLang::getLangRU() => 'hydra.aviasales.ru',
                TPLang::getLangEN() => 'hydra.aviasales.ru',
            ),
            7 => array(
                TPLang::getLangRU() => 'search.hotellook.com',
                TPLang::getLangEN() => 'search.hotellook.com',
            ),
            8 => array(
                TPLang::getLangRU() => 'hydra.aviasales.ru',
                TPLang::getLangEN() => 'www.jetradar.com%2Fsearches%2Fnew',
            ),
        );

        if (!array_key_exists($widgetType, $hostData)) return $host;

        if (!array_key_exists(\app\includes\common\TPLang::getLang(), $hostData[$widgetType])){
            $host = $hostData[$widgetType][\app\includes\common\TPLang::getDefaultLang()];
        } else {
            $host = $hostData[$widgetType][\app\includes\common\TPLang::getLang()];
        }
        return $host;

    }
    /**
     * @return array
     */
    public static function getHost(){
        return array_keys(self::$hosts);
    }

    /**
     * @param $typeLink
     * @return string
     */
    public static function getHostSearchLinkWhenEmptyWhiteLabel($typeLink){
        $host = "";
        $hostData = array(
            //searches_ticket
            1 => array(
                \app\includes\common\TPLang::getLangRU() => "https://hydra.aviasales.ru",
                \app\includes\common\TPLang::getLangEN() => "https://jetradar.com",
            ),
            //searches_hotel
            2 => array(
                \app\includes\common\TPLang::getLangEN() => "https://search.hotellook.com/",
            ),
        );
        if (!array_key_exists($typeLink, $hostData)) return $host;

        if (!array_key_exists(\app\includes\common\TPLang::getLang(), $hostData[$typeLink])){
            $host = $hostData[$typeLink][\app\includes\common\TPLang::getDefaultLang()];
        } else {
            $host = $hostData[$typeLink][\app\includes\common\TPLang::getLang()];
        }
        return $host;
    }

    /**
     * @return mixed|string
     */
    public static function getHostLangParamSearchHotel(){
        $langParam = "";
        $langParamData = array(
            \app\includes\common\TPLang::getLangRU() => "&language=ru-ru",
            \app\includes\common\TPLang::getLangEN() => "&language=en-us",
        );
        if (!array_key_exists(\app\includes\common\TPLang::getLang(), $langParamData)){
            $langParam = $langParamData[\app\includes\common\TPLang::getDefaultLang()];
        } else {
            $langParam = $langParamData[\app\includes\common\TPLang::getLang()];
        }
        return $langParam;
    }

    /**
     * @return mixed|string
     */
    public static function getDucklettWidgetUrlScript(){
        $urlDucklett = "";
        $urlDucklettData = array(
            \app\includes\common\TPLang::getLangRU() => "//www.travelpayouts.com/ducklett/scripts.js",
            \app\includes\common\TPLang::getLangEN() => "//www.travelpayouts.com/ducklett/scripts_en.js",
            \app\includes\common\TPLang::getLangTH() => "//www.travelpayouts.com/ducklett/scripts_th.js",
        );
        if (!array_key_exists(\app\includes\common\TPLang::getLang(), $urlDucklettData)){
            $urlDucklett = $urlDucklettData[\app\includes\common\TPLang::getDefaultLang()];
        } else {
            $urlDucklett = $urlDucklettData[\app\includes\common\TPLang::getLang()];
        }
        return $urlDucklett;

    }

    public static function getHotelSelectWidgetUrlScript(){
        $urlHotelSelect = "";
        $urlHotelSelectData = array(
            \app\includes\common\TPLang::getLangRU() => "//www.travelpayouts.com/blissey/scripts.js",
            \app\includes\common\TPLang::getLangEN() => "//www.travelpayouts.com/blissey/scripts_en.js",
            \app\includes\common\TPLang::getLangTH() => "//www.travelpayouts.com/blissey/scripts_th.js",
        );
        if (!array_key_exists(\app\includes\common\TPLang::getLang(), $urlHotelSelectData)){
            $urlHotelSelect = $urlHotelSelectData[\app\includes\common\TPLang::getDefaultLang()];
        } else {
            $urlHotelSelect = $urlHotelSelectData[\app\includes\common\TPLang::getLang()];
        }
        return $urlHotelSelect;
    }

    public static function getHostUrlAirlineLogo(){
        return self::TP_HOST_URL_AIRLINE_LOGO;
    }
}