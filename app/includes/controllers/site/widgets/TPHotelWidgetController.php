<?php
/**
 * Created by PhpStorm.
 * User: freeman
 * Date: 13.08.15
 * Time: 13:34
 */
namespace app\includes\controllers\site\widgets;
use app\includes\common\TPCurrencyUtils;
use app\includes\common\TPLang;
use app\includes\controllers\site\TPWigetsShortcodesController;
use app\includes\TPPlugin;

class TPHotelWidgetController extends TPWigetsShortcodesController{

    public function initShortcode()
    {
        // TODO: Implement initShortcode() method.
        add_shortcode( 'tp_hotel_widget', [&$this, 'action']);
    }

    public function render($data)
    {
        $widgets = 5;
        $defaults = [
            'hotel_id' => false,
            'width' => TPPlugin::$options['widgets'][$widgets]['width'],
            'subid' => '',
            'currency' => TPPlugin::$options['local']['currency'], //TPCurrencyUtils::TP_CURRENCY_USD,
            //'powered_by' => (isset(\app\includes\TPPlugin::$options['widgets'][$widgets]['powered_by']))? "true" : "false"
        ];
        extract( wp_parse_args( $data, $defaults ), EXTR_SKIP );
        $width = (isset($responsive) && $responsive === 'true')? '?' : "?width={$width}px&";
        $white_label = $this->view->getWhiteLabel($widgets);

        if (!empty($powered_by)) {
            $powered_by = '&powered_by='.$powered_by;
        } else {
            $powered_by = '';
        }
        //$this->view->TypeCurrency()
        //$currency = '';
        //$currency = $this->view->getCurrency($widgets, $white_label);
        $output = '';
        $output = '
            <div class="TPWidget TPHotelWidget">
            <script data-cfasync="false" async src="//www.travelpayouts.com/chansey/iframe.js'.$width.'&hotel_id='.$hotel_id
            .'&locale='. TPLang::getLang().'&host='.$white_label.'&marker='.$this->view->getMarker($widgets, $subid)
            .'&currency='.mb_strtolower($currency).$powered_by.'" data-wpfc-render="false">
                   </script></div>';
        //%2Fsearch
        return $output;
    }
}
