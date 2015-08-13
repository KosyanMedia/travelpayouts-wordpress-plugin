<?php
/**
 * Created by PhpStorm.
 * User: freeman
 * Date: 13.08.15
 * Time: 13:38
 */

class TPPopularRoutesWidgetController extends TPWigetsShortcodesController{

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
            'width' => TPPlugin::$options['widgets'][$widgets]['width']
        );
        extract( wp_parse_args( $data, $defaults ), EXTR_SKIP );
        $width = (isset($responsive) && $responsive == 'true')? "?" : "?width={$width}px&";
        $output = '';
        $output = '<script async src="//www.travelpayouts.com/weedle/widget.js'.$width
            .'&marker='.$this->view->getMarker($widgets).'&host='.$this->view->getWhiteLabel($widgets)
            .'&locale='.$this->view->locale.'&currency='.mb_strtolower($this->view->typeCurrency())
            .'&destination='.$destination.'" charset="UTF-8">
                   </script>';
        return $output;
    }
}