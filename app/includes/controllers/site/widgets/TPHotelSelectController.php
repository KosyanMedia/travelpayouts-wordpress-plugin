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
        $output = '';
        $output = '<script async src="//www.travelpayouts.com/blissey/scripts.js?categories=5stars%2Csea_view%2Cluxury&iata=MOW'
        .'&type=full&currency=rub&width=800&host=search.hotellook.com&marker=17942.&limit=10" charset="UTF-8"></script>';
        return $output;
    }
}