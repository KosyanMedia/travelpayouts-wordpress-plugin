<?php
/**
 * Created by PhpStorm.
 * User: freeman
 * Date: 13.08.15
 * Time: 13:03
 */
namespace app\includes\views\site\widgets;
class TPWidgetsView {
    public $locale;
    public function __construct(){
        switch (\app\includes\TPPlugin::$options['local']['localization']){
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
        $marker = \app\includes\TPPlugin::$options['account']['marker'];
        if(!empty(\app\includes\TPPlugin::$options['account']['extra_marker']))
            $marker = $marker .'.'.\app\includes\TPPlugin::$options['account']['extra_marker'];
        if(!empty(\app\includes\TPPlugin::$options['widgets'][$widgetType]['extra_widget_marker'])){
            $marker = $marker.'_'.\app\includes\TPPlugin::$options['widgets'][$widgetType]['extra_widget_marker'];
        }
        switch($widgetType){
            case 1:
                //map
                $marker .= '_map.$69';
                break;
            case 2:
                //hotelsmap
                $marker .= '_hotelsmap.$69';
                break;
            case 3:
                //calendar
                $marker .= '_calendar';
                break;
            case 4:
                //subscriptions
                $marker .= '_subscr.$69';
                break;
            case 5:
                //chansey
                $marker .= '_hotel';
                break;
            case 6:
                //weedle
                $marker .= '_populardest';
                break;
        }


        //$marker = $marker.'.$69';
        return rawurlencode($marker);
    }

    /**
     * @param bool $widgetType
     * @return string
     */
    public function getWhiteLabel($widgetType = false){
        $white_label = \app\includes\TPPlugin::$options['account']['white_label'];
        if(!empty($white_label)){
            $white_label = preg_replace("(^https?://)", "", $white_label );
        }
        switch($widgetType){
            case 1:
                if( ! $white_label || empty( $white_label ) ){
                    switch (\app\includes\TPPlugin::$options['local']['localization']){
                        case 1:
                            $white_label = 'http://map.aviasales.ru';
                            break;
                        case 2:
                            $white_label = 'http://map.jetradar.com';
                            break;
                    }
                }else{
                    $white_label .= '/map';
                }
                break;
            case 2:
                if( ! $white_label || empty( $white_label ) ){
                    switch (\app\includes\TPPlugin::$options['local']['localization']){
                        case 1:
                            $white_label = 'hotellook.ru';
                            break;
                        case 2:
                            $white_label = 'hotellook.com';
                            break;
                    }
                }else{
                    $white_label .= '/hotels';
                }
                break;
            case 3:
                if( ! $white_label || empty( $white_label ) ){
                    switch (\app\includes\TPPlugin::$options['local']['localization']){
                        case 1:
                            $white_label = 'hydra.aviasales.ru';
                            break;
                        case 2:
                            $white_label = 'hydra.jetradar.com';
                            break;
                    }
                }else{
                    $white_label .= '/flights';
                }
                break;
            case 4:
                if( ! $white_label || empty( $white_label ) ){
                    $white_label = 'hydra.aviasales.ru';
                }
                break;
            case 5:
                if( ! $white_label || empty( $white_label ) ){
                    switch (\app\includes\TPPlugin::$options['local']['localization']){
                        case 1:
                            $white_label = 'hotellook.ru';
                            break;
                        case 2:
                            $white_label = 'hotellook.com';
                            break;
                    }
                }else{
                    $white_label .= '/hotels';
                }
                break;
            case 6:
                if( ! $white_label || empty( $white_label ) ){
                    switch (\app\includes\TPPlugin::$options['local']['localization']){
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
        switch((int) \app\includes\TPPlugin::$options['local']['currency']){
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