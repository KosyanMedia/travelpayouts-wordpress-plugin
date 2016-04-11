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
    public function getMarker($widgetType = false, $subid = ''){
        $marker = \app\includes\TPPlugin::$options['account']['marker'];
        if(!empty(\app\includes\TPPlugin::$options['account']['extra_marker']))
            $marker = $marker .'.'.\app\includes\TPPlugin::$options['account']['extra_marker'];
        if(!empty(\app\includes\TPPlugin::$options['widgets'][$widgetType]['extra_widget_marker'])){
            $marker = $marker.'_'.\app\includes\TPPlugin::$options['widgets'][$widgetType]['extra_widget_marker'];
        }
        if(!empty($subid)){
            $subid = trim($subid);
            $subid = preg_replace('/[^a-zA-Z0-9_]/', '', $subid);
            //error_log($subid);
        }
        switch($widgetType){
            case 1:
                //map
                $marker .= '_map';
                if(!empty($subid))
                    $marker = $marker.'_'.$subid;
                $marker .= '.$69';
                break;
            case 2:
                //hotelsmap
                $marker .= '_hotelsmap';
                if(!empty($subid))
                    $marker = $marker.'_'.$subid;
                $marker .= '.$69';
                break;
            case 3:
                //calendar
                $marker .= '_calendar';
                if(!empty($subid))
                    $marker = $marker.'_'.$subid;
                break;
            case 4:
                //subscriptions
                $marker .= '_subscr';
                if(!empty($subid))
                    $marker = $marker.'_'.$subid;
                $marker .= '.$69';
                break;
            case 5:
                //chansey
                $marker .= '_hotel';
                if(!empty($subid))
                    $marker = $marker.'_'.$subid;
                break;
            case 6:
                //weedle
                $marker .= '_populardest';
                if(!empty($subid))
                    $marker = $marker.'_'.$subid;
                break;
            case 7:
                $marker .= '_hotelsselections';
                if(!empty($subid))
                    $marker = $marker.'_'.$subid;
                break;
            case 8:
                $marker .= '_specialoff';
                if(!empty($subid))
                    $marker = $marker.'_'.$subid;
                break;

        }

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
            $white_label = preg_replace("#/$#", "", $white_label);
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
                    /*switch (\app\includes\TPPlugin::$options['local']['localization']){
                        case 1:
                            $white_label = 'hydra.aviasales.ru';
                            break;
                        case 2:
                            $white_label = 'hydra.jetradar.com';
                            break;
                    }    */
                    $white_label = 'hydra.aviasales.ru';
                }
                break;
            case 7:
                if( ! $white_label || empty( $white_label ) ){
                    $white_label = 'search.hotellook.com';
                }else{
                    $white_label .= '/hotels';
                }
                break;
            case 8:
                if( ! $white_label || empty( $white_label ) ){
                    switch (\app\includes\TPPlugin::$options['local']['localization']){
                        case 1:
                            $white_label = 'hydra.aviasales.ru';
                            break;
                        case 2:
                            $white_label = 'www.jetradar.com%2Fsearches%2Fnew';
                            break;
                    }
                    //$white_label = 'hydra.aviasales.ru';
                }else{
                    $white_label .= '/flights';
                }
                break;
        }
        //error_log($white_label);
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