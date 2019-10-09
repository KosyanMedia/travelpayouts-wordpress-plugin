<?php
/**
 * Created by PhpStorm.
 * User: freeman
 * Date: 04.01.16
 * Time: 15:03
 */

namespace app\includes\controllers\site\widgets;
use app\includes\common\TPCurrencyUtils;
use app\includes\common\TPHostURL;
use app\includes\controllers\site\TPWigetsShortcodesController;
use app\includes\TPPlugin;

class TPHotelSelectController extends TPWigetsShortcodesController
{

    public function initShortcode()
    {
        // TODO: Implement initShortcode() method.
        add_shortcode( 'tp_hotel_selections_widget', [&$this, 'action']);
    }

    public function render($data)
    {
        // TODO: Implement render() method.
        $widgets = 7;
        $defaults = [
            'id' => false,
            'cat1' => TPPlugin::$options['widgets'][$widgets]['cat1'],
            'cat2' => TPPlugin::$options['widgets'][$widgets]['cat2'],
            'cat3' => TPPlugin::$options['widgets'][$widgets]['cat3'],
            'type' => TPPlugin::$options['widgets'][$widgets]['type'],
            'width' => TPPlugin::$options['widgets'][$widgets]['width'],
            'responsive' => TPPlugin::$options['widgets'][$widgets]['responsive'],
            'limit' => TPPlugin::$options['widgets'][$widgets]['limit'],
            'subid' => '',
            'currency' => TPPlugin::$options['local']['currency'], //TPCurrencyUtils::TP_CURRENCY_USD,
            //'powered_by' => (isset(\app\includes\TPPlugin::$options['widgets'][$widgets]['powered_by']))? "true" : "false"
        ];
        extract( wp_parse_args( $data, $defaults ), EXTR_SKIP );

        $output = '';
        //$categories = '5stars%2Csea_view%2Cluxury';
        $width = (isset($responsive) )? '' : "&width={$width}px";

        $url = '';

        $url =  TPHostURL::getHotelSelectWidgetUrlScript();
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
