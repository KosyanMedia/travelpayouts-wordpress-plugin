<?php
/**
 * Created by PhpStorm.
 * User: freeman
 * Date: 13.08.15
 * Time: 13:03
 */
namespace app\includes\views\site\widgets;

use \app\includes\common\TPCurrencyUtils;
use app\includes\common\TPHostURL;
use app\includes\common\TPOption;
use \app\includes\TPPlugin;

class TPWidgetsView {

    public function __construct(){

    }
    /**
     * @param bool $widgetType
     * @return string
     */
    public function getMarker($widgetType = false, $subid = ''){
        $marker = \app\includes\TPPlugin::$options['account']['marker'];
        $marker .= TPOption::getExtraMarker();
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

    public function serializeWhiteLabel($whiteLabel){
	    $whiteLabel = preg_replace("(^https?://)", "", $whiteLabel );
	    $whiteLabel = preg_replace("#/$#", "", $whiteLabel);
    	return $whiteLabel;
    }

    /**
     * @param bool $widgetType
     * @return string
     */
    public function getWhiteLabel($widgetType = false){
        $white_label = \app\includes\TPPlugin::$options['account']['white_label'];
        if(!empty($white_label)){
	        $white_label = $this->serializeWhiteLabel($white_label);
        }
        //3,6,8
        switch($widgetType){
            case 1:
                if( ! $white_label || empty( $white_label ) ){
                    $white_label = \app\includes\common\TPHostURL::getHostWidgetWhenEmptyWhiteLabel($widgetType);
                }else{
                    $white_label .= '/map';
                }
                break;
            case 2:
                $white_label = TPPlugin::$options['account']['white_label_hotel'];
                if( ! $white_label || empty( $white_label ) ){
                    $white_label = \app\includes\common\TPHostURL::getHostWidgetWhenEmptyWhiteLabel($widgetType);
                }else{
                    $white_label .= '/hotels';
                }
                break;
            case 3:
                if( ! $white_label || empty( $white_label ) ){
                    $white_label = \app\includes\common\TPHostURL::getHostWidget(3);
	                $white_label = $this->serializeWhiteLabel($white_label);
                    //error_log($white_label);
                    //$white_label = TPHostURL::getHostWidgetWhenEmptyWhiteLabel($widgetType);
	                error_log($white_label);

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
                $white_label = TPPlugin::$options['account']['white_label_hotel'];
                if( ! $white_label || empty( $white_label ) ){
                    $white_label = \app\includes\common\TPHostURL::getHostWidgetWhenEmptyWhiteLabel($widgetType);
                }else{
                    $white_label .= '/hotels';
                }
                break;
            case 6:
                if( ! $white_label || empty( $white_label ) ){

                    //$white_label = \app\includes\common\TPHostURL::getHostWidgetWhenEmptyWhiteLabel(6);
                    $white_label = \app\includes\common\TPHostURL::getHostWidgetWhenEmptyWhiteLabel($widgetType);
                    //$white_label = str_replace("http://", "", $white_label);
                    //
                    //error_log($white_label);
                    //error_log('6 = '.$white_label);
                    if( ! $white_label || empty( $white_label ) ) {
                        $white_label = 'hydra.aviasales.ru';
                    }
                }
                break;
            case 7:
                $white_label = TPPlugin::$options['account']['white_label_hotel'];
                if( ! $white_label || empty( $white_label ) ){
                    $white_label = 'search.hotellook.com';
                }else{
                    $white_label .= '/hotels';
                }
                break;
            case 8:
                if( ! $white_label || empty( $white_label ) ){
                    //$white_label = \app\includes\common\TPHostURL::getHostWidget(6);
                    //error_log($white_label);
                    $white_label = \app\includes\common\TPHostURL::getHostWidgetWhenEmptyWhiteLabel($widgetType);
                    //$white_label = 'hydra.aviasales.ru';
                }else{
                    $white_label .= '/flights';
                }
                break;
        }
        //error_log($white_label);
        return $white_label;

    }


    public function getCurrencyValid($currency_option){
        $currency_default = array(
            TPCurrencyUtils::TP_CURRENCY_USD,
            TPCurrencyUtils::TP_CURRENCY_RUB,
            TPCurrencyUtils::TP_CURRENCY_EUR
        );
        $currency = '';
        if (in_array($currency_option, $currency_default)) {
            //error_log("true");
            $currency = $currency_option;
        } else {
            //error_log("USD");
            $currency = $currency_default[0];
        }
        return $currency;
    }

    public function getCurrencyMaintained($widgetType, $currencySelected){
        $currencyNewNotMaintained = array(
            TPCurrencyUtils::TP_CURRENCY_ARS,
            TPCurrencyUtils::TP_CURRENCY_COP,
            TPCurrencyUtils::TP_CURRENCY_PEN,
            TPCurrencyUtils::TP_CURRENCY_CLP,
            TPCurrencyUtils::TP_CURRENCY_AED,
            TPCurrencyUtils::TP_CURRENCY_SAR,
            TPCurrencyUtils::TP_CURRENCY_SEK,
            TPCurrencyUtils::TP_CURRENCY_HUF,
            TPCurrencyUtils::TP_CURRENCY_KGS,
            TPCurrencyUtils::TP_CURRENCY_MXN,
            TPCurrencyUtils::TP_CURRENCY_AMD,
            TPCurrencyUtils::TP_CURRENCY_XOF,
            TPCurrencyUtils::TP_CURRENCY_VND,
            TPCurrencyUtils::TP_CURRENCY_BGN,
            TPCurrencyUtils::TP_CURRENCY_GEL,
            TPCurrencyUtils::TP_CURRENCY_RON,
            TPCurrencyUtils::TP_CURRENCY_DKK,
            TPCurrencyUtils::TP_CURRENCY_BDT,
            TPCurrencyUtils::TP_CURRENCY_KRW,
            TPCurrencyUtils::TP_CURRENCY_RSD
        );

        $currencyNotMaintained = array(
            3 => array_merge(
                array(
                    TPCurrencyUtils::TP_CURRENCY_TRY,
                    TPCurrencyUtils::TP_CURRENCY_ILS
                ), $currencyNewNotMaintained
            ),
            6 => array_merge(
                array(
                    TPCurrencyUtils::TP_CURRENCY_PLN,
                    TPCurrencyUtils::TP_CURRENCY_TRY,
                    TPCurrencyUtils::TP_CURRENCY_ILS
                ), $currencyNewNotMaintained),
            7 => array_merge(
                array(
                    TPCurrencyUtils::TP_CURRENCY_PLN,
                    TPCurrencyUtils::TP_CURRENCY_TRY,
                    TPCurrencyUtils::TP_CURRENCY_ILS
                ), $currencyNewNotMaintained),
            8 => array_merge(
                array(
                    TPCurrencyUtils::TP_CURRENCY_CAD,
                    TPCurrencyUtils::TP_CURRENCY_CHF,
                    TPCurrencyUtils::TP_CURRENCY_GBP,
                    TPCurrencyUtils::TP_CURRENCY_HKD,
                    TPCurrencyUtils::TP_CURRENCY_IDR,
                    TPCurrencyUtils::TP_CURRENCY_INR,
                    TPCurrencyUtils::TP_CURRENCY_NZD,
                    TPCurrencyUtils::TP_CURRENCY_PHP,
                    TPCurrencyUtils::TP_CURRENCY_PLN,
                    TPCurrencyUtils::TP_CURRENCY_SGD,
                    TPCurrencyUtils::TP_CURRENCY_TRY,
                    TPCurrencyUtils::TP_CURRENCY_ILS
                ), $currencyNewNotMaintained)
        );


        //error_log(print_r($currencyNotMaintained[$widgetType], true));

        $currency = '';

        if (in_array($currencySelected, $currencyNotMaintained[$widgetType])) {
            $currency = TPCurrencyUtils::TP_CURRENCY_USD;
        } else {
            $currency = $currencySelected;
        }
        return $currency;
    }

    public function getCurrency($widgetType = false, $white_label = ''){
        $currency = '';
        $currency_option = \app\includes\TPPlugin::$options['local']['currency'];
        /*$currency_default = array(
            TPCurrencyUtils::TP_CURRENCY_USD,
            TPCurrencyUtils::TP_CURRENCY_RUB,
            TPCurrencyUtils::TP_CURRENCY_EUR
        );
        $currencyNotMaintained = array(
            3 => array('TRY', 'ILS'),
            6 => array('PLN', 'TRY', 'ILS'),
            7 => array('PLN', 'TRY', 'ILS'),
            8 => array('CAD', 'CHF', 'GBP', 'HKD', 'IDR', 'INR', 'NZD', 'PHP','PLN', 'SGD', 'TRY', 'ILS' )
        );

        $this->getCurrencyMaintained($widgetType);*/

        //error_log($currency_option);
        switch($widgetType){
            case 1:
                $currency = $this->getCurrencyValid($currency_option);
                /*if(strpos($white_label, 'jetradar') !== false){
                    $currency = $currency_default[0];
                }else{
                    $currency = $currency_default[1];
                }*/
                break;
            case 2:
                /*if(strpos($white_label, 'jetradar') !== false){
                    $currency = $currency_default[0];
                }else{
                    $currency = $currency_default[1];
                }*/
                $currency = $this->getCurrencyValid($currency_option);
                break;
            case 3:
                /*if(strpos($white_label, 'jetradar') !== false){
                    if($currency_option == $currency_default[1]){
                        $currency = $currency_default[0];
                    }else{
                        $currency = $currency_option;
                    }
                }else{
                    $currency = $currency_option;
                }*/
                //$currency = $currency_option;
                /*if (in_array($currency_option, $currencyNotMaintained[$widgetType])) {
                    $currency = $currency_default[0];
                } else {
                    $currency = $currency_option;
                }*/
                $currency = $this->getCurrencyMaintained($widgetType, $currency_option);
                break;
            case 4:
                /*if(strpos($white_label, 'jetradar') !== false){
                    $currency = $currency_default[0];
                }else{
                    $currency = $currency_default[1];
                }*/
                $currency = $this->getCurrencyValid($currency_option);
                break;
            case 5:
                /*if(strpos($white_label, 'jetradar') !== false){
                    $currency = $currency_default[0];
                }else{
                    $currency = $currency_default[1];
                }*/
                $currency = $this->getCurrencyValid($currency_option);
                break;
            case 6:
                /*if(strpos($white_label, 'jetradar') !== false){
                    if($currency_option == $currency_default[1]){
                        $currency = $currency_default[0];
                    }else{
                        $currency = $currency_option;
                    }
                }else{
                    $currency = $currency_option;
                }*/
                /*if (in_array($currency_option, $currencyNotMaintained[$widgetType])) {
                    $currency = $currency_default[0];
                } else {
                    $currency = $currency_option;
                }*/
                $currency = $this->getCurrencyMaintained($widgetType, $currency_option);

                break;
            case 7:
                //$currency = $currency_option;
                /*if (in_array($currency_option, $currencyNotMaintained[$widgetType])) {
                    $currency = $currency_default[0];
                } else {
                    $currency = $currency_option;
                }*/
                $currency = $this->getCurrencyMaintained($widgetType, $currency_option);
                break;
            case 8:
                /*if(strpos($white_label, 'jetradar') !== false){
                    if($currency_option == $currency_default[1]){
                        $currency = $currency_default[0];
                    }else{
                        $currency = $currency_option;
                    }
                }else{
                    $currency = $currency_option;
                }*/
                //$currency = $currency_option;
               /* if (in_array($currency_option, $currencyNotMaintained[$widgetType])) {
                    $currency = $currency_default[0];
                } else {
                    $currency = $currency_option;
                }*/
                $currency = $this->getCurrencyMaintained($widgetType, $currency_option);
                break;
        }
        return $currency;
    }
}