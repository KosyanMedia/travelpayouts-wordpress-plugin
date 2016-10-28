<?php
/**
 * Created by PhpStorm.
 * User: freeman
 * Date: 13.08.15
 * Time: 13:38
 */
namespace app\includes\controllers\site\widgets;
class TPPopularRoutesWidgetController extends \app\includes\controllers\site\TPWigetsShortcodesController{

    public function initShortcode()
    {
        // TODO: Implement initShortcode() method.
        add_shortcode( 'tp_popular_routes_widget', array(&$this, 'action'));
    }


    public function render($data)
    {
        // TODO: Implement render() method.
        $widgets = 6;
        $defaults = array(
            'destination' => false,
            'width' => \app\includes\TPPlugin::$options['widgets'][$widgets]['width'],
            'subid' => ''
        );
        extract( wp_parse_args( $data, $defaults ), EXTR_SKIP );
        $width = (isset($responsive) && $responsive == 'true')? "?" : "?width={$width}px&";
        $white_label = $this->view->getWhiteLabel($widgets);
        //error_log('render = '.$white_label);
        //$this->view->TypeCurrency()
        $currency = '';
        $currency = $this->view->getCurrency($widgets, $white_label);
        $output = '';
        $output = '
            <div class="TPWidget TPPopularRoutesWidget">
            <script async src="//www.travelpayouts.com/weedle/widget.js'.$width
            .'&marker='.$this->view->getMarker($widgets, $subid).'&host='.$white_label
            .'&locale='.\app\includes\common\TPLang::getLang().'&currency='.mb_strtolower($currency)
            .'&destination='.$destination.'" charset="UTF-8">
                   </script></div>';
        return $output;
    }
}