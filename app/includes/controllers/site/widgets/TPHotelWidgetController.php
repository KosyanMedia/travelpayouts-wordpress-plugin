<?php
/**
 * Created by PhpStorm.
 * User: freeman
 * Date: 13.08.15
 * Time: 13:34
 */
namespace app\includes\controllers\site\widgets;
class TPHotelWidgetController extends \app\includes\controllers\site\TPWigetsShortcodesController{

    public function initShortcode()
    {
        // TODO: Implement initShortcode() method.
        add_shortcode( 'tp_hotel_widget', array(&$this, 'action'));
    }

    public function render($data)
    {
        $widgets = 5;
        $defaults = array(
            'hotel_id' => false,
            'width' => \app\includes\TPPlugin::$options['widgets'][$widgets]['width']
        );
        extract( wp_parse_args( $data, $defaults ), EXTR_SKIP );
        $width = (isset($responsive) && $responsive == 'true')? "?" : "?width={$width}px&";
        $output = '';
        $output = '
            <div class="TPWidget TPHotelWidget">
            <script async src="//www.travelpayouts.com/chansey/iframe.js'.$width.'&hotel_id='.$hotel_id
            .'&locale='.$this->view->locale.'&host='.$this->view->getWhiteLabel($widgets).'%2Fsearch&marker='.$this->view->getMarker($widgets)
            .'&currency='.mb_strtolower($this->view->typeCurrency()).'">
                   </script></div>';

        return $output;
    }
}