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
                6 => 'hydra.aviasales.ru',
                7 => '',
                8 => 'hydra.aviasales.ru'
            )
        ),
        'jetradar.com' => array(
            'table' => 'jetradar.com',
            'widget' => array(
                1 => '',
                2 => '',
                3 => '',
                4 => '',
                5 => '',
                6 => '',
                7 => '',
                8 => ''
            )
        ),
        'jetradar.com.br' => array(
            'table' => 'jetradar.com.br',
            'widget' => array(
                1 => '',
                2 => '',
                3 => '',
                4 => '',
                5 => '',
                6 => '',
                7 => '',
                8 => ''
            )
        ),
        'ca.jetradar.com' => array(
            'table' => 'ca.jetradar.com',
            'widget' => array(
                1 => '',
                2 => '',
                3 => '',
                4 => '',
                5 => '',
                6 => '',
                7 => '',
                8 => ''
            )
        ),
        'jetradar.ch' => array(
            'table' => 'jetradar.ch',
            'widget' => array(
                1 => '',
                2 => '',
                3 => '',
                4 => '',
                5 => '',
                6 => '',
                7 => '',
                8 => ''
            )
        ),
        'jetradar.at' => array(
            'table' => 'jetradar.at',
            'widget' => array(
                1 => '',
                2 => '',
                3 => '',
                4 => '',
                5 => '',
                6 => '',
                7 => '',
                8 => ''
            )
        ),
        'jetradar.be' => array(
            'table' => 'jetradar.be',
            'widget' => array(
                1 => '',
                2 => '',
                3 => '',
                4 => '',
                5 => '',
                6 => '',
                7 => '',
                8 => ''
            )
        ),
        'jetradar.co.nl' => array(
            'table' => 'jetradar.co.nl',
            'widget' => array(
                1 => '',
                2 => '',
                3 => '',
                4 => '',
                5 => '',
                6 => '',
                7 => '',
                8 => ''
            )
        ),
        'jetradar.gr' => array(
            'table' => 'jetradar.gr',
            'widget' => array(
                1 => '',
                2 => '',
                3 => '',
                4 => '',
                5 => '',
                6 => '',
                7 => '',
                8 => ''
            )
        ),
        'jetradar.com.au' => array(
            'table' => 'jetradar.com.au',
            'widget' => array(
                1 => '',
                2 => '',
                3 => '',
                4 => '',
                5 => '',
                6 => '',
                7 => '',
                8 => ''
            )
        ),
        'jetradar.de' => array(
            'table' => 'jetradar.de',
            'widget' => array(
                1 => '',
                2 => '',
                3 => '',
                4 => '',
                5 => '',
                6 => '',
                7 => '',
                8 => ''
            )
        ),
        'jetradar.es' => array(
            'table' => 'jetradar.es',
            'widget' => array(
                1 => '',
                2 => '',
                3 => '',
                4 => '',
                5 => '',
                6 => '',
                7 => '',
                8 => ''
            )
        ),
        'jetradar.fr' => array(
            'table' => 'jetradar.fr',
            'widget' => array(
                1 => '',
                2 => '',
                3 => '',
                4 => '',
                5 => '',
                6 => '',
                7 => '',
                8 => ''
            )
        ),
        'jetradar.it' => array(
            'table' => 'jetradar.it',
            'widget' => array(
                1 => '',
                2 => '',
                3 => '',
                4 => '',
                5 => '',
                6 => '',
                7 => '',
                8 => ''
            )
        ),
        'jetradar.pt' => array(
            'table' => 'jetradar.pt',
            'widget' => array(
                1 => '',
                2 => '',
                3 => '',
                4 => '',
                5 => '',
                6 => '',
                7 => '',
                8 => ''
            )
        ),
        'ie.jetradar.com' => array(
            'table' => 'ie.jetradar.com',
            'widget' => array(
                1 => '',
                2 => '',
                3 => '',
                4 => '',
                5 => '',
                6 => '',
                7 => '',
                8 => ''
            )
        ),
        'jetradar.co.uk' => array(
            'table' => 'jetradar.co.uk',
            'widget' => array(
                1 => '',
                2 => '',
                3 => '',
                4 => '',
                5 => '',
                6 => '',
                7 => '',
                8 => ''
            )
        ),
        'jetradar.hk' => array(
            'table' => 'jetradar.hk',
            'widget' => array(
                1 => '',
                2 => '',
                3 => '',
                4 => '',
                5 => '',
                6 => '',
                7 => '',
                8 => ''
            )
        ),
        'jetradar.in' => array(
            'table' => 'jetradar.in',
            'widget' => array(
                1 => '',
                2 => '',
                3 => '',
                4 => '',
                5 => '',
                6 => '',
                7 => '',
                8 => ''
            )
        ),
        'jetradar.co.nz' => array(
            'table' => 'jetradar.co.nz',
            'widget' => array(
                1 => '',
                2 => '',
                3 => '',
                4 => '',
                5 => '',
                6 => '',
                7 => '',
                8 => ''
            )
        ),
        'jetradar.ph' => array(
            'table' => 'jetradar.ph',
            'widget' => array(
                1 => '',
                2 => '',
                3 => '',
                4 => '',
                5 => '',
                6 => '',
                7 => '',
                8 => ''
            )
        ),
        'jetradar.pl' => array(
            'table' => 'jetradar.pl',
            'widget' => array(
                1 => '',
                2 => '',
                3 => '',
                4 => '',
                5 => '',
                6 => '',
                7 => '',
                8 => ''
            )
        ),
        'jetradar.sg' => array(
            'table' => 'jetradar.sg',
            'widget' => array(
                1 => '',
                2 => '',
                3 => '',
                4 => '',
                5 => '',
                6 => '',
                7 => '',
                8 => ''
            )
        ),
        'jetradar.co.th' => array(
            'table' => 'jetradar.co.th',
            'widget' => array(
                1 => '',
                2 => '',
                3 => '',
                4 => '',
                5 => '',
                6 => '',
                7 => '',
                8 => ''
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
        $host = self::$hosts[$host]['widget'][$widget];
        return $host;
    }

    /**
     * @return array
     */
    public static function getHost(){
        return array_keys(self::$hosts);
    }
}