<?php
/**
 * Created by PhpStorm.
 * User: freeman
 * Date: 23.02.16
 * Time: 14:24
 */

namespace app\includes\controllers\site\widgets;
use app\includes\common\TPCurrencyUtils;

class TPDucklettWidgetController extends \app\includes\controllers\site\TPWigetsShortcodesController
{

    public function initShortcode()
    {
        // TODO: Implement initShortcode() method.
        add_shortcode( 'tp_ducklett_widget', array(&$this, 'action'));
    }

    public function render($data)
    {
        // TODO: Implement render() method.
        $widgets = 8;
        $defaults = array(
            'limit' => \app\includes\TPPlugin::$options['widgets'][$widgets]['limit'],
            'type' => \app\includes\TPPlugin::$options['widgets'][$widgets]['type'],
            'filter' => \app\includes\TPPlugin::$options['widgets'][$widgets]['filter'],
            'width' => \app\includes\TPPlugin::$options['widgets'][$widgets]['width'],
            'origin' => false,
            'destination' => false,
            'airline' => false,
            'currency' => \app\includes\TPPlugin::$options['local']['currency'], //TPCurrencyUtils::TP_CURRENCY_USD,
            'subid' => '',
            //'powered_by' => (isset(\app\includes\TPPlugin::$options['widgets'][$widgets]['powered_by']))? "true" : "false"
        );
        extract( wp_parse_args( $data, $defaults ), EXTR_SKIP );
        $url_params = '';
        $url_params .= '&limit='.$limit;
        switch($filter){
            case 0:
                if(isset($airline) && !empty($airline)){
                    //$url_params .= '&airline_iatas='.$airline;
                    $airlines = explode(',', $airline);
                    $air = '';
                    foreach($airlines as $value){
                        $air .= $value.'%2C';
                    }
                    $air = substr($air, 0, -6);
                    //error_log($air);
                    $url_params .= '&airline_iatas='.$air;
                }

                break;
            case 1:
                if(isset($origin) && !empty($origin))
                    $url_params .= '&origin_iatas='.$origin;
                if(isset($destination) && !empty($destination))
                    $url_params .= '&destination_iatas='.$destination;
                break;
        }
        $width = (isset($responsive) && $responsive == 'true')? "" : "&width={$width}px";
        $url_params .= $width;
        $url = \app\includes\common\TPHostURL::getDucklettWidgetUrlScript();
       // error_log($url);
        $white_label = $this->view->getWhiteLabel($widgets);
        //$this->view->TypeCurrency()
        //$currency = '';
        //$currency = $this->view->getCurrency($widgets, $white_label);
        //error_log($currency);
        //error_log($white_label);

        if (!empty($powered_by)) {
            $powered_by = '&powered_by='.$powered_by;
        } else {
            $powered_by = '';
        }

        $output = '';
        $output = '<script data-cfasync="false" async src="'.$url.'?widget_type='.$type
            .'&currency='.mb_strtolower($currency).'&host='.$white_label.'&marker='
            .$this->view->getMarker($widgets, $subid).'.'.$url_params.$powered_by.'" charset="UTF-8" data-wpfc-render="false">
        </script>';

        return $output;
    }
}
