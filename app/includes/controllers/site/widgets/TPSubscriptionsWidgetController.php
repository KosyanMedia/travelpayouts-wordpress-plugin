<?php
/**
 * Created by PhpStorm.
 * User: freeman
 * Date: 13.08.15
 * Time: 13:31
 */
namespace app\includes\controllers\site\widgets;
use app\includes\common\TPCurrencyUtils;

class TPSubscriptionsWidgetController extends \app\includes\controllers\site\TPWigetsShortcodesController{

    public function initShortcode()
    {
        // TODO: Implement initShortcode() method.
        add_shortcode( 'tp_subscriptions_widget', array(&$this, 'action'));
    }

    public function render($data)
    {
        // TODO: Implement render() method.
        $widgets = 4;
        $origin_i = '';
        $destination_i = '';
        if(!empty(\app\includes\TPPlugin::$options['widgets'][$widgets]['origin'])){
            preg_match('/\[(.+)\]/',  \app\includes\TPPlugin::$options['widgets'][$widgets]['origin'], $origin_iata);
            $origin_i = $origin_iata[1];
        }
        if(!empty(\app\includes\TPPlugin::$options['widgets'][$widgets]['destination'])){
            preg_match('/\[(.+)\]/',  \app\includes\TPPlugin::$options['widgets'][$widgets]['destination'], $destination_iata);
            $destination_i = $destination_iata[1];
        }
        $defaults = array(
            'origin' => $origin_i,
            'destination' => $destination_i,
            'width' => \app\includes\TPPlugin::$options['widgets'][$widgets]['width'],
            'subid' => '',
            'currency' => \app\includes\TPPlugin::$options['local']['currency'], //TPCurrencyUtils::TP_CURRENCY_USD,
        );
        extract( wp_parse_args( $data, $defaults ), EXTR_SKIP );
        $color = rawurlencode(\app\includes\TPPlugin::$options['widgets'][$widgets]['color']);
        $width = (isset($responsive) && $responsive == 'true')? "?" : "?width={$width}px&";
        //error_log($width);
        $white_label = $this->view->getWhiteLabel($widgets);
        //$this->view->TypeCurrency()
        //$currency = '';
        //$currency = $this->view->getCurrency($widgets, $white_label);
        $output = '';
        $output = '
        <div class="TPWidget TPSubscriptionsWidget">
            <script data-cfasync="false" async src="//www.travelpayouts.com/subscription_widget/widget.js'.$width.'backgroundColor='.$color
            .'&marker='.$this->view->getMarker($widgets, $subid).'&host='.$white_label
            .'&originIata='.$origin.'&destinationIata='.$destination.'" data-wpfc-render="false"></script></div>';
        return $output;
    }
}