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
            'cat1' => \app\includes\TPPlugin::$options["widgets"][$widgets]['cat1'],
            'cat2' => \app\includes\TPPlugin::$options["widgets"][$widgets]['cat2'],
            'cat3' => \app\includes\TPPlugin::$options["widgets"][$widgets]['cat3'],
            'type' => \app\includes\TPPlugin::$options["widgets"][$widgets]['type'],
            'width' => \app\includes\TPPlugin::$options['widgets'][$widgets]['width'],
            'responsive' => \app\includes\TPPlugin::$options['widgets'][$widgets]['responsive'],
            'limit' => \app\includes\TPPlugin::$options['widgets'][$widgets]['limit']
        );
        extract( wp_parse_args( $data, $defaults ), EXTR_SKIP );

        $output = '';
        //$categories = '5stars%2Csea_view%2Cluxury';
        $width = (isset($responsive) )? "" : "&width={$width}px";

        $url = '';
        switch($this->view->locale){
            case 'ru':
                $url = '//www.travelpayouts.com/blissey/scripts.js';
                break;
            case 'en':
                $url = '//www.travelpayouts.com/blissey/scripts_en.js';
                break;
            default:
                $url = '//www.travelpayouts.com/blissey/scripts.js';
        }
        $cat = $cat1.'%2C'.$cat2.'%2C'.$cat3;
        error_log($cat);

        $output = '
        <div class="TPWidget TPHotelSelectWidget">
        <script async src="'.$url.'?categories='.$cat.'&id='
        .$id
        .'&type='.$type
        .'&currency='.mb_strtolower($this->view->typeCurrency())
        .$width.'&host='.$this->view->getWhiteLabel($widgets)
        .'&marker='.$this->view->getMarker($widgets).'.&limit='
        .$limit
        .'" charset="UTF-8"></script></div>';
        return $output;
    }
}