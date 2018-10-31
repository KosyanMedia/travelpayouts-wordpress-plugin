<?php
/**
 * Created by PhpStorm.
 * User: freeman
 * Date: 04.01.16
 * Time: 15:03
 */

namespace app\includes\controllers\site\widgets;
use app\includes\common\TPCurrencyUtils;

class TPHotelSelectController extends \app\includes\controllers\site\TPWigetsShortcodesController
{

    public function initShortcode()
    {
        // TODO: Implement initShortcode() method.
        add_shortcode( 'tp_hotel_selections_widget', array(&$this, 'action'));
    }

    public function render($data)
    {
        // TODO: Implement render() method.
        $widgets = 7;
        $defaults = array(
            'id' => false,
            'cat1' => \app\includes\TPPlugin::$options["widgets"][$widgets]['cat1'],
            'cat2' => \app\includes\TPPlugin::$options["widgets"][$widgets]['cat2'],
            'cat3' => \app\includes\TPPlugin::$options["widgets"][$widgets]['cat3'],
            'type' => \app\includes\TPPlugin::$options["widgets"][$widgets]['type'],
            'width' => \app\includes\TPPlugin::$options['widgets'][$widgets]['width'],
            'responsive' => \app\includes\TPPlugin::$options['widgets'][$widgets]['responsive'],
            'limit' => \app\includes\TPPlugin::$options['widgets'][$widgets]['limit'],
            'subid' => '',
            'currency' => \app\includes\TPPlugin::$options['local']['currency'], //TPCurrencyUtils::TP_CURRENCY_USD,
            //'powered_by' => (isset(\app\includes\TPPlugin::$options['widgets'][$widgets]['powered_by']))? "true" : "false"
        );
        extract( wp_parse_args( $data, $defaults ), EXTR_SKIP );

        $output = '';
        //$categories = '5stars%2Csea_view%2Cluxury';
        $width = (isset($responsive) )? "" : "&width={$width}px";

        $url = '';

        $url =  \app\includes\common\TPHostURL::getHotelSelectWidgetUrlScript();
        $cat = $cat1.'%2C'.$cat2.'%2C'.$cat3;
        //error_log($cat);
        $white_label = $this->view->getWhiteLabel($widgets);

        if (!empty($powered_by)) {
            $powered_by = '&powered_by='.$powered_by;
        } else {
            $powered_by = '';
        }

        //$this->view->TypeCurrency()
        //$currency = '';
        //$currency = $this->view->getCurrency($widgets, $white_label);
        //error_log("currency = ".$currency);
        //error_log("currency = ".mb_strtolower($currency));
        $output = '
        <div class="TPWidget TPHotelSelectWidget">
        <script data-cfasync="false" async src="'.$url.'?categories='.$cat.'&id='
        .$id
        .'&type='.$type
        .'&currency='.mb_strtolower($currency)
        .$width.'&host='.$white_label
        .'&marker='.$this->view->getMarker($widgets, $subid).'.&limit='
        .$limit
        .$powered_by
        .'" charset="UTF-8" data-wpfc-render="false"></script></div>';
        return $output;
    }
}