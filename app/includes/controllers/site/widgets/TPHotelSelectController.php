<?php
/**
 * Created by PhpStorm.
 * User: freeman
 * Date: 04.01.16
 * Time: 15:03
 */

namespace app\includes\controllers\site\widgets;


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
            'cat' => false,
            'width' => \app\includes\TPPlugin::$options['widgets'][$widgets]['width'],
            'responsive' => \app\includes\TPPlugin::$options['widgets'][$widgets]['responsive']
        );
        extract( wp_parse_args( $data, $defaults ), EXTR_SKIP );

        $output = '';
        //$categories = '5stars%2Csea_view%2Cluxury';
        $width = (isset($responsive) )? "" : "&width={$width}px";
        //error_log($id);
        $output = '
        <div class="TPWidget TPHotelSelectWidget">
        <script async src="//www.travelpayouts.com/blissey/scripts.js?categories='.$cat.'&id='
        .$id
        .'&type='.\app\includes\TPPlugin::$options["widgets"][$widgets]['type']
        .'&currency='.mb_strtolower($this->view->typeCurrency())
        .$width.'&host='.$this->view->getWhiteLabel($widgets)
        .'&marker='.$this->view->getMarker($widgets).'.&limit='
        .\app\includes\TPPlugin::$options['widgets'][$widgets]['limit']
        .'" charset="UTF-8"></script></div>';
        return $output;
    }
}