<?php
/**
 * Created by PhpStorm.
 * User: freeman
 * Date: 13.08.15
 * Time: 13:03
 */

class TPWidgetsView {
    public $locale;
    public function __construct(){
        switch (TPPlugin::$options['local']['localization']){
            case 1:
                $this->locale = 'ru';
                break;
            case 2:
                $this->locale = 'en';
                break;
        }
    }
    /**
     * @param bool $widgetType
     * @return string
     */
    public function getMarker($widgetType = false){
        $marker = TPPlugin::$options['account']['marker'];
        if(!empty(TPPlugin::$options['account']['extra_marker']))
            $marker = $marker .'.'.TPPlugin::$options['account']['extra_marker'];
        if(!empty(TPPlugin::$options['widgets'][$widgetType]['extra_widget_marker'])){
            $marker = $marker.'_'.TPPlugin::$options['widgets'][$widgetType]['extra_widget_marker'].'_';
        }
        switch($widgetType){
            case 1:
                //map
                $marker .= 'map';
                break;
            case 2:
                //hotelsmap
                $marker .= 'hotelsmap';
                break;
            case 3:
                //calendar
                $marker .= 'calendar';
                break;
            case 4:
                //subscriptions
                $marker .= 'subscriptions';
                break;
            case 5:
                //chansey
                $marker .= 'chansey';
                break;
            case 6:
                //weedle
                $marker .= 'weedle';
                break;
        }


        $marker = $marker.'.$69';
        return $marker;
    }

    /**
     * @param bool $widgetType
     * @return string
     */
    public function getWhiteLabel($widgetType = false){
        $white_label = TPPlugin::$options['account']['white_label'];
        if(!empty($white_label)){
            if(strpos($white_label, 'http') === false){
                $white_label = 'http://'.$white_label;
            }
        }
        switch($widgetType){
            case 1:
                if( ! $white_label || empty( $white_label ) ){
                    switch (TPPlugin::$options['local']['localization']){
                        case 1:
                            $white_label = 'http://map.aviasales.ru';
                            break;
                        case 2:
                            $white_label = 'http://map.jetradar.com';
                            break;
                    }
                }
                break;
            case 2:
                if( ! $white_label || empty( $white_label ) ){
                    switch (TPPlugin::$options['local']['localization']){
                        case 1:
                            $white_label = 'hotellook.ru';
                            break;
                        case 2:
                            $white_label = 'hotellook.com';
                            break;
                    }
                }
                break;
            case 3:
                if( ! $white_label || empty( $white_label ) ){
                    switch (TPPlugin::$options['local']['localization']){
                        case 1:
                            $white_label = 'hydra.aviasales.ru';
                            break;
                        case 2:
                            $white_label = 'hydra.jetradar.com';
                            break;
                    }
                }
                break;
            case 4:
                if( ! $white_label || empty( $white_label ) ){
                    $white_label = 'hydra.aviasales.ru';
                }
                break;
            case 5:
                if( ! $white_label || empty( $white_label ) ){
                    switch (TPPlugin::$options['local']['localization']){
                        case 1:
                            $white_label = 'hotellook.ru';
                            break;
                        case 2:
                            $white_label = 'hotellook.com';
                            break;
                    }
                }
                break;
            case 6:
                if( ! $white_label || empty( $white_label ) ){
                    switch (TPPlugin::$options['local']['localization']){
                        case 1:
                            $white_label = 'hydra.aviasales.ru';
                            break;
                        case 2:
                            $white_label = 'hydra.jetradar.com';
                            break;
                    }
                }
                break;
        }
        return $white_label;

    }
    /**
     * @return string
     */
    public function typeCurrency(){
        switch((int) TPPlugin::$options['local']['currency']){
            case 1:
                $currency = 'RUB';
                break;
            case 2:
                $currency = 'USD';
                break;
            case 3:
                $currency = 'EUR';
                break;
        }
        return $currency;
    }
}