<?php
/**
 * Created by PhpStorm.
 * User: freeman
 * Date: 13.08.15
 * Time: 13:38
 */
namespace app\includes\controllers\site\widgets;
use app\includes\common\TPCurrencyUtils;
use app\includes\common\TPLang;
use app\includes\controllers\site\TPWigetsShortcodesController;
use app\includes\TPPlugin;

class TPPopularRoutesWidgetController extends TPWigetsShortcodesController{

    public function initShortcode()
    {
        // TODO: Implement initShortcode() method.
        add_shortcode( 'tp_popular_routes_widget', [&$this, 'action']);
    }


    public function render($data)
    {
        // TODO: Implement render() method.
        $widgets = 6;
        $defaults = [
            'destination' => false,
            'width' => TPPlugin::$options['widgets'][$widgets]['width'],
            'subid' => '',
            'currency' => TPPlugin::$options['local']['currency'], //TPCurrencyUtils::TP_CURRENCY_USD,
            //'powered_by' => (isset(\app\includes\TPPlugin::$options['widgets'][$widgets]['powered_by']))? "true" : "false"
        ];
        extract( wp_parse_args( $data, $defaults ), EXTR_SKIP );
        $width = (isset($responsive) && $responsive === 'true')? '?' : "?width={$width}px&";
        $white_label = $this->view->getWhiteLabel($widgets);
        //error_log('render = '.$white_label);
        //$this->view->TypeCurrency()
        //$currency = '';
        //$currency = $this->view->getCurrency($widgets, $white_label);
        if (!empty($powered_by)) {
            $powered_by = '&powered_by='.$powered_by;
        } else {
            $powered_by = '';
        }

        $output = '';
        $output = '
            <div class="TPWidget TPPopularRoutesWidget">
            <script data-cfasync="false" async src="//www.travelpayouts.com/weedle/widget.js'.$width
            .'&marker='.$this->view->getMarker($widgets, $subid).'&host='.$white_label
            .'&locale='. TPLang::getLang().'&currency='.mb_strtolower($currency)
            .'&destination='.$destination.$powered_by.'" charset="UTF-8" data-wpfc-render="false">
                   </script></div>';
        return $output;
    }
}
