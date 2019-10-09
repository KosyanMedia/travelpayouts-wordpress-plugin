<?php

/**
 * Created by PhpStorm.
 * User: freeman
 * Date: 18.04.16
 * Time: 13:11
 */
namespace app\includes\common;

use app\includes\TPPlugin;

class TPHostURL
{
    const TP_HOST_URL_AIRLINE_LOGO = 'https://pics.avs.io/';
    const TP_HOST_URL_RAILWAY = '';
    private static $hosts = [
        'aviasales.ru' => [
            'table' => 'hydra.aviasales.ru',//'engine.aviasales.ru',
            'widget' => [
                1 => '',
                2 => '',
                3 => 'hydra.aviasales.ru',
                4 => '',
                5 => '',
                6 => '',
                7 => '',
                8 => 'hydra.aviasales.ru'
            ]
        ],
        'jetradar.com' => [
            'table' => 'jetradar.com',
            'widget' => [
                1 => '',
                2 => '',
                //3 => 'jetradar.com/new_searches/',
                3 => 'jetradar.com/searches/new/',
                4 => '',
                5 => '',
                6 => '',
                7 => '',
                8 => 'jetradar.com/new_searches/'
            ]
        ],
        'aviasales.kz' => [
            'table' => 'aviasales.kz',
            'widget' => [
                1 => '',
                2 => '',
                3 => 'www.aviasales.kz/search/',
                4 => '',
                5 => '',
                6 => 'www.aviasales.kz/search/',
                7 => '',
                8 => ''
            ]
        ],
        'jetradar.com.br' => [
            'table' => 'jetradar.com.br',
            'widget' => [
                1 => '',
                2 => '',
                3 => 'jetradar.com.br/searches/new/',
                4 => '',
                5 => '',
                6 => '',
                7 => '',
                8 => 'jetradar.com.br/new_searches/'
            ]
        ],
        'ca.jetradar.com' => [
            'table' => 'ca.jetradar.com',
            'widget' => [
                1 => '',
                2 => '',
                3 => 'ca.jetradar.com/searches/new/',
                4 => '',
                5 => '',
                6 => '',
                7 => '',
                8 => 'ca.jetradar.com/new_searches/'
            ]
        ],
        'jetradar.ch' => [
            'table' => 'jetradar.ch',
            'widget' => [
                1 => '',
                2 => '',
                3 => 'jetradar.ch/searches/new/',
                4 => '',
                5 => '',
                6 => '',
                7 => '',
                8 => 'jetradar.ch/new_searches/'
            ]
        ],
        'jetradar.at' => [
            'table' => 'jetradar.at',
            'widget' => [
                1 => '',
                2 => '',
                3 => 'jetradar.at/searches/new/',
                4 => '',
                5 => '',
                6 => '',
                7 => '',
                8 => 'jetradar.at/new_searches/'
            ]
        ],
        'jetradar.be' => [
            'table' => 'jetradar.be',
            'widget' => [
                1 => '',
                2 => '',
                3 => 'jetradar.be/searches/new/',
                4 => '',
                5 => '',
                6 => '',
                7 => '',
                8 => 'jetradar.be/new_searches/'
            ]
        ],
        'jetradar.co.nl' => [
            'table' => 'jetradar.co.nl',
            'widget' => [
                1 => '',
                2 => '',
                3 => 'jetradar.co.nl/searches/new/',
                4 => '',
                5 => '',
                6 => '',
                7 => '',
                8 => 'jetradar.co.nl/new_searches/'
            ]
        ],
        'jetradar.gr' => [
            'table' => 'jetradar.gr',
            'widget' => [
                1 => '',
                2 => '',
                3 => 'jetradar.gr/searches/new/',
                4 => '',
                5 => '',
                6 => '',
                7 => '',
                8 => 'jetradar.gr/new_searches/'
            ]
        ],
        'jetradar.com.au' => [
            'table' => 'jetradar.com.au',
            'widget' => [
                1 => '',
                2 => '',
                3 => 'jetradar.com.au/searches/new/',
                4 => '',
                5 => '',
                6 => '',
                7 => '',
                8 => 'jetradar.com.au/new_searches/'
            ]
        ],
        'jetradar.de' => [
            'table' => 'jetradar.de',
            'widget' => [
                1 => '',
                2 => '',
                3 => 'jetradar.de/searches/new/',
                4 => '',
                5 => '',
                6 => '',
                7 => '',
                8 => 'jetradar.de/new_searches/'
            ]
        ],
        'jetradar.es' => [
            'table' => 'jetradar.es',
            'widget' => [
                1 => '',
                2 => '',
                3 => 'jetradar.es/searches/new/',
                4 => '',
                5 => '',
                6 => '',
                7 => '',
                8 => 'jetradar.es/new_searches/'
            ]
        ],
        'jetradar.fr' => [
            'table' => 'jetradar.fr',
            'widget' => [
                1 => '',
                2 => '',
                3 => 'jetradar.fr/searches/new/',
                4 => '',
                5 => '',
                6 => '',
                7 => '',
                8 => 'jetradar.fr/new_searches/'
            ]
        ],
        'jetradar.it' => [
            'table' => 'jetradar.it',
            'widget' => [
                1 => '',
                2 => '',
                3 => 'jetradar.it/searches/new/',
                4 => '',
                5 => '',
                6 => '',
                7 => '',
                8 => 'jetradar.it/new_searches/'
            ]
        ],
        'jetradar.pt' => [
            'table' => 'jetradar.pt',
            'widget' => [
                1 => '',
                2 => '',
                3 => 'jetradar.pt/searches/new/',
                4 => '',
                5 => '',
                6 => '',
                7 => '',
                8 => 'jetradar.pt/new_searches/'
            ]
        ],
        'ie.jetradar.com' => [
            'table' => 'ie.jetradar.com',
            'widget' => [
                1 => '',
                2 => '',
                3 => 'ie.jetradar.com/searches/new/',
                4 => '',
                5 => '',
                6 => '',
                7 => '',
                8 => 'ie.jetradar.com/new_searches/'
            ]
        ],
        'jetradar.co.uk' => [
            'table' => 'jetradar.co.uk',
            'widget' => [
                1 => '',
                2 => '',
                3 => 'jetradar.co.uk/searches/new/',
                4 => '',
                5 => '',
                6 => '',
                7 => '',
                8 => 'jetradar.co.uk/new_searches/'
            ]
        ],
        'jetradar.hk' => [
            'table' => 'jetradar.hk',
            'widget' => [
                1 => '',
                2 => '',
                3 => 'jetradar.hk/searches/new/',
                4 => '',
                5 => '',
                6 => '',
                7 => '',
                8 => 'jetradar.hk/new_searches/'
            ]
        ],
        'jetradar.in' => [
            'table' => 'jetradar.in',
            'widget' => [
                1 => '',
                2 => '',
                3 => 'jetradar.in/searches/new/',
                4 => '',
                5 => '',
                6 => '',
                7 => '',
                8 => 'jetradar.in/new_searches/'
            ]
        ],
        'jetradar.co.nz' => [
            'table' => 'jetradar.co.nz',
            'widget' => [
                1 => '',
                2 => '',
                3 => 'jetradar.co.nz/searches/new/',
                4 => '',
                5 => '',
                6 => '',
                7 => '',
                8 => 'jetradar.co.nz/new_searches/'
            ]
        ],
        'jetradar.ph' => [
            'table' => 'jetradar.ph',
            'widget' => [
                1 => '',
                2 => '',
                3 => 'jetradar.ph/searches/new/',
                4 => '',
                5 => '',
                6 => '',
                7 => '',
                8 => 'jetradar.ph/new_searches/'
            ]
        ],
        'jetradar.pl' => [
            'table' => 'jetradar.pl',
            'widget' => [
                1 => '',
                2 => '',
                3 => 'jetradar.pl/searches/new/',
                4 => '',
                5 => '',
                6 => '',
                7 => '',
                8 => 'jetradar.pl/new_searches/'
            ]
        ],
        'jetradar.sg' => [
            'table' => 'jetradar.sg',
            'widget' => [
                1 => '',
                2 => '',
                3 => 'jetradar.sg/searches/new/',
                4 => '',
                5 => '',
                6 => '',
                7 => '',
                8 => 'jetradar.sg/new_searches/'
            ]
        ],
        'jetradar.co.th' => [
            'table' => 'jetradar.co.th',
            'widget' => [
                1 => '',
                2 => '',
                3 => 'jetradar.co.th/searches/new/',
                4 => '',
                5 => '',
                6 => '',
                7 => '',
                8 => 'jetradar.co.th/new_searches/'
            ]
        ],
    ];

    private static $hostsHotel = [
        'hotellook.ru' => [
            'label' => 'hotellook.ru',
            'host' => 'search.hotellook.com',
            'language' => 'ru-RU',
        ],
        'hotellook.com&language=en-GB' => [
            'label' => 'hotellook.com en-GB',
            'host' => 'search.hotellook.com',
            'language' => 'en-GB',
        ],
        'hotellook.com&language=en-US' => [
            'label' => 'hotellook.com en-US',
            'host' => 'search.hotellook.com',
            'language' => 'en-US',
        ],
        'hotellook.com&language=pt-BR' => [
            'label' => 'hotellook.com pt-BR',
            'host' => 'search.hotellook.com',
            'language' => 'pt-BR',
        ],
        'hotellook.com&language=pt-PT' => [
            'label' => 'hotellook.com pt-PT',
            'host' => 'search.hotellook.com',
            'language' => 'pt-PT',
        ],
        'hotellook.com&language=id-ID' => [
            'label' => 'hotellook.com id-ID',
            'host' => 'search.hotellook.com',
            'language' => 'id-ID',
        ],
        'hotellook.com&language=fr-FR' => [
            'label' => 'hotellook.com fr-FR',
            'host' => 'search.hotellook.com',
            'language' => 'fr-FR',
        ],
        'hotellook.com&language=it-IT' => [
            'label' => 'hotellook.com it-IT',
            'host' => 'search.hotellook.com',
            'language' => 'it-IT',
        ],
        'hotellook.com&language=de-DE' => [
            'label' => 'hotellook.com de-DE',
            'host' => 'search.hotellook.com',
            'language' => 'de-DE',
        ],
        'hotellook.com&language=pl-PL' => [
            'label' => 'hotellook.com pl-PL',
            'host' => 'search.hotellook.com',
            'language' => 'pl-PL',
        ],
        'hotellook.com&language=es-ES' => [
            'label' => 'hotellook.com es-ES',
            'host' => 'search.hotellook.com',
            'language' => 'es-ES',
        ],
        'hotellook.com&language=th-TH' => [
            'label' => 'hotellook.com th-TH',
            'host' => 'search.hotellook.com',
            'language' => 'th-TH',
        ],
        'hotellook.com&language=en-AU' => [
            'label' => 'hotellook.com en-AU',
            'host' => 'search.hotellook.com',
            'language' => 'en-AU',
        ],
        'hotellook.com&language=en-CA' => [
            'label' => 'hotellook.com en-CA',
            'host' => 'search.hotellook.com',
            'language' => 'en-CA',
        ],
        'hotellook.com&language=en-IE' => [
            'label' => 'hotellook.com en-IE',
            'host' => 'search.hotellook.com',
            'language' => 'en-IE',
        ],
    ];

    public static function getDefaultHostHotel(){
        $host = '';
        $hostData = [
            TPLang::getLangRU() => [
                'label' => 'hotellook.ru',
                'host' => 'search.hotellook.com',
                'language' => 'ru-RU',
            ],
            TPLang::getLangEN() =>  [
                'label' => 'hotellook.com en-GB',
                'host' => 'search.hotellook.com',
                'language' => 'en-GB',
            ],
        ];
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
        $host = '';
        $hostData = [
            TPLang::getLangRU() => 'https://hydra.aviasales.ru',//'https://engine.aviasales.ru',
            TPLang::getLangEN() => 'https://jetradar.com',
            TPLang::getLangTH() => 'https://jetradar.co.th',
        ];
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
        $host = TPPlugin::$options['local']['host'];
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
        $host = '';
        $hostTable = self::getHostTable();
        $hostData = [
            1 => [
                TPLang::getLangRU() => 'http://map.aviasales.ru',
                TPLang::getLangEN() => 'http://map.jetradar.com',
            ],
            2 => [
                TPLang::getLangRU() => 'hotellook.ru',
                TPLang::getLangEN() => 'hotellook.com',
            ],
            3 => [
                TPLang::getLangRU() => 'hydra.aviasales.ru',
                TPLang::getLangEN() => 'hydra.jetradar.com',
            ],
            4 => [
                TPLang::getLangRU() => 'hydra.aviasales.ru',
                TPLang::getLangEN() => 'hydra.aviasales.ru',
            ],
            5 => [
                TPLang::getLangRU() => 'hotellook.ru',
                TPLang::getLangEN() => 'hotellook.com',
            ],
            6 => [
                TPLang::getLangRU() => 'hydra.aviasales.ru',
                TPLang::getLangEN() => 'hydra.aviasales.ru',
            ],
            7 => [
                TPLang::getLangRU() => 'search.hotellook.com',
                TPLang::getLangEN() => 'search.hotellook.com',
            ],
            8 => [
                TPLang::getLangRU() => 'hydra.aviasales.ru',
                TPLang::getLangEN() => 'www.jetradar.com%2Fsearches%2Fnew',
            ],
        ];


        if ($widgetType === 8 && preg_match('/aviasales.kz$/', $hostTable))
            return 'aviasales.kz';


        if (!array_key_exists($widgetType, $hostData)) return $host;

        if (!array_key_exists(TPLang::getLang(), $hostData[$widgetType])) {
            $host = $hostData[$widgetType][TPLang::getDefaultLang()];
        } else {
            $host = $hostData[$widgetType][TPLang::getLang()];
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
        $host = '';
        $hostData = [
            //searches_ticket
            1 => [
                TPLang::getLangRU() => 'https://hydra.aviasales.ru',
                TPLang::getLangEN() => 'https://jetradar.com',
            ],
            //searches_hotel
            2 => [
                TPLang::getLangEN() => 'https://search.hotellook.com/',
            ],
        ];
        if (!array_key_exists($typeLink, $hostData)) return $host;

        if (!array_key_exists(TPLang::getLang(), $hostData[$typeLink])){
            $host = $hostData[$typeLink][TPLang::getDefaultLang()];
        } else {
            $host = $hostData[$typeLink][TPLang::getLang()];
        }
        return $host;
    }

    /**
     * @return mixed|string
     */
    public static function getHostLangParamSearchHotel(){
        $langParam = '';
        $langParamData = [
            TPLang::getLangRU() => '&language=ru-ru',
            TPLang::getLangEN() => '&language=en-us',
        ];
        if (!array_key_exists(TPLang::getLang(), $langParamData)){
            $langParam = $langParamData[TPLang::getDefaultLang()];
        } else {
            $langParam = $langParamData[TPLang::getLang()];
        }
        return $langParam;
    }

    /**
     * @return mixed|string
     */
    public static function getDucklettWidgetUrlScript(){
        $urlDucklett = '';
        $urlDucklettData = [
            TPLang::getLangRU() => '//www.travelpayouts.com/ducklett/scripts.js',
            TPLang::getLangEN() => '//www.travelpayouts.com/ducklett/scripts_en.js',
            TPLang::getLangTH() => '//www.travelpayouts.com/ducklett/scripts_th.js',
        ];
        if (!array_key_exists(TPLang::getLang(), $urlDucklettData)){
            $urlDucklett = $urlDucklettData[TPLang::getDefaultLang()];
        } else {
            $urlDucklett = $urlDucklettData[TPLang::getLang()];
        }
        return $urlDucklett;

    }

    public static function getHotelSelectWidgetUrlScript(){
        $urlHotelSelect = '';
        $urlHotelSelectData = [
            TPLang::getLangRU() => '//www.travelpayouts.com/blissey/scripts.js',
            TPLang::getLangEN() => '//www.travelpayouts.com/blissey/scripts_en.js',
            TPLang::getLangTH() => '//www.travelpayouts.com/blissey/scripts_th.js',
        ];
        if (!array_key_exists(TPLang::getLang(), $urlHotelSelectData)){
            $urlHotelSelect = $urlHotelSelectData[TPLang::getDefaultLang()];
        } else {
            $urlHotelSelect = $urlHotelSelectData[TPLang::getLang()];
        }
        return $urlHotelSelect;
    }

    public static function getHostUrlAirlineLogo(){
        return self::TP_HOST_URL_AIRLINE_LOGO;
    }
}
