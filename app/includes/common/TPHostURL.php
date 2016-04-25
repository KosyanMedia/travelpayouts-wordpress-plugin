<?php

/**
 * Created by PhpStorm.
 * User: freeman
 * Date: 18.04.16
 * Time: 13:11
 */
namespace app\includes\common;
class TPHostURL
{
    private static $hosts = array(
        'aviasales.ru' => array(
            'table' => 'engine.aviasales.ru',
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
                3 => 'jetradar.com/new_searches/',
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
                3 => 'jetradar.com.br/new_searches/',
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
                3 => 'ca.jetradar.com/new_searches/',
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
                3 => 'jetradar.ch/new_searches/',
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
                3 => 'jetradar.at/new_searches/',
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
                3 => 'jetradar.be/new_searches/',
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
                3 => 'jetradar.co.nl/new_searches/',
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
                3 => 'jetradar.gr/new_searches/',
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
                3 => 'jetradar.com.au/new_searches/',
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
                3 => 'jetradar.de/new_searches/',
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
                3 => 'jetradar.es/new_searches/',
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
                3 => 'jetradar.fr/new_searches/',
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
                3 => 'jetradar.it/new_searches/',
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
                3 => 'jetradar.pt/new_searches/',
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
                3 => 'ie.jetradar.com/new_searches/',
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
                3 => 'jetradar.co.uk/new_searches/',
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
                3 => 'jetradar.hk/new_searches/',
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
                3 => 'jetradar.in/new_searches/',
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
                3 => 'jetradar.co.nz/new_searches/',
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
                3 => 'jetradar.ph/new_searches/',
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
                3 => 'jetradar.pl/new_searches/',
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
                3 => 'jetradar.sg/new_searches/',
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
                3 => 'jetradar.co.th/new_searches/',
                4 => '',
                5 => '',
                6 => '',
                7 => '',
                8 => 'jetradar.co.th/new_searches/'
            )
        ),
    );

    /**
     * @return string
     */
    public static function getHostTable(){
        $host = \app\includes\TPPlugin::$options['local']['host'];
        $host = self::$hosts[$host]['table'];
        if( ! $host || empty( $host ) ) {
            switch (\app\includes\TPPlugin::$options['local']['localization']) {
                case 1:
                    $host = 'http://engine.aviasales.ru';
                    break;
                case 2:
                    $host = 'http://jetradar.com';
                    break;
            }
        }else{
            $host = 'http://'.$host;
        }
        return $host;
    }

    /**
     * @param $widget
     * @return mixed
     */
    public static function getHostWidget($widget){
        $host = \app\includes\TPPlugin::$options['local']['host'];
        //3,6,8
        $host = self::$hosts[$host]['widget'][$widget];
        //error_log($widget.$host);
        return $host;
    }

    /**
     * @return array
     */
    public static function getHost(){
        return array_keys(self::$hosts);
    }
}