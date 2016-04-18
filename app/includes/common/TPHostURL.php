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

            )
        ),
        'jetradar.com' => array(
            'table' => 'jetradar.com',
            'widget' => array(

            )
        ),
        'jetradar.com.br' => array(
            'table' => 'jetradar.com.br',
            'widget' => array(

            )
        ),
        'ca.jetradar.com' => array(
            'table' => 'ca.jetradar.com',
            'widget' => array(

            )
        ),
        'jetradar.ch' => array(
            'table' => 'jetradar.ch',
            'widget' => array(

            )
        ),
        'jetradar.at' => array(
            'table' => 'jetradar.at',
            'widget' => array(

            )
        ),
        'jetradar.be' => array(
            'table' => 'jetradar.be',
            'widget' => array(

            )
        ),
        'jetradar.co.nl' => array(
            'table' => 'jetradar.co.nl',
            'widget' => array(

            )
        ),
        'jetradar.gr' => array(
            'table' => 'jetradar.gr',
            'widget' => array(

            )
        ),
        'jetradar.com.au' => array(
            'table' => 'jetradar.com.au',
            'widget' => array(

            )
        ),
        'jetradar.de' => array(
            'table' => 'jetradar.de',
            'widget' => array(

            )
        ),
        'jetradar.es' => array(
            'table' => 'jetradar.es',
            'widget' => array(

            )
        ),
        'jetradar.fr' => array(
            'table' => 'jetradar.fr',
            'widget' => array(

            )
        ),
        'jetradar.it' => array(
            'table' => 'jetradar.it',
            'widget' => array(

            )
        ),
        'jetradar.pt' => array(
            'table' => 'jetradar.pt',
            'widget' => array(

            )
        ),
        'ie.jetradar.com' => array(
            'table' => 'ie.jetradar.com',
            'widget' => array(

            )
        ),
        'jetradar.co.uk' => array(
            'table' => 'jetradar.co.uk',
            'widget' => array(

            )
        ),
        'jetradar.hk' => array(
            'table' => 'jetradar.hk',
            'widget' => array(

            )
        ),
        'jetradar.in' => array(
            'table' => 'jetradar.in',
            'widget' => array(

            )
        ),
        'jetradar.co.nz' => array(
            'table' => 'jetradar.co.nz',
            'widget' => array(

            )
        ),
        'jetradar.ph' => array(
            'table' => 'jetradar.ph',
            'widget' => array(

            )
        ),
        'jetradar.pl' => array(
            'table' => 'jetradar.pl',
            'widget' => array(

            )
        ),
        'jetradar.sg' => array(
            'table' => 'jetradar.sg',
            'widget' => array(

            )
        ),
        'jetradar.co.th' => array(
            'table' => 'jetradar.co.th',
            'widget' => array(

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
    public static function getHostWidget($host){}

    /**
     * @return array
     */
    public static function getHost(){
        return array_keys(self::$hosts);
    }
}