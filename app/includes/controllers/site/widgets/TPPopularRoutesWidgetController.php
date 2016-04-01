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
        $output = '';
        $output = '
            <div class="TPWidget TPPopularRoutesWidget">
            <script async src="//www.travelpayouts.com/weedle/widget.js'.$width
            .'&marker='.$this->view->getMarker($widgets, $subid).'&host='.$this->view->getWhiteLabel($widgets)
            .'&locale='.$this->view->locale.'&currency='.mb_strtolower($this->view->typeCurrency())
            .'&destination='.$destination.'" charset="UTF-8">
                   </script></div>';
        return $output;
    }
}