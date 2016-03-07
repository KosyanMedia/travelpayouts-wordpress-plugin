<?php
/**
 * Created by PhpStorm.
 * User: freeman
 * Date: 23.02.16
 * Time: 14:24
 */

namespace app\includes\controllers\site\widgets;


class TPDucklettWidgetController extends \app\includes\controllers\site\TPWigetsShortcodesController
{

    public function initShortcode()
    {
        // TODO: Implement initShortcode() method.
        add_shortcode( 'tp_ducklett_widget', array(&$this, 'action'));
    }

    public function render($data)
    {
        // TODO: Implement render() method.
        $widgets = 8;
        $defaults = array(
            'limit' => \app\includes\TPPlugin::$options['widgets'][$widgets]['limit'],
            'type' => \app\includes\TPPlugin::$options['widgets'][$widgets]['type'],
            'filter' => \app\includes\TPPlugin::$options['widgets'][$widgets]['filter'],
            'width' => \app\includes\TPPlugin::$options['widgets'][$widgets]['width'],
            'currency' => $this->view->typeCurrency() ,
        );
        extract( wp_parse_args( $data, $defaults ), EXTR_SKIP );

        $width = (isset($responsive) && $responsive == 'true')? "" : "&width={$width}px&";
        $output = '';
        $output = '<script async src="//www.travelpayouts.com/ducklett/scripts.js?widget_type='.$type
            .'&currency='.mb_strtolower($currency).'&width=800&host=hydra.aviasales.ru&marker=17942.&limit='.$limit.'" charset="UTF-8">
        </script>';
        return $output;
    }
}
/*
 *  $widgets = 3;
        $origin_i = '';
        $destination_i = '';
        if(!empty(\app\includes\TPPlugin::$options['widgets'][$widgets]['origin'])){
            preg_match('/\[(.+)\]/',  \app\includes\TPPlugin::$options['widgets'][$widgets]['origin'], $origin_iata);
            $origin_i = $origin_iata[1];
        }
        if(!empty(\app\includes\TPPlugin::$options['widgets'][$widgets]['destination'])){
            preg_match('/\[(.+)\]/',  \app\includes\TPPlugin::$options['widgets'][$widgets]['destination'], $destination_iata);
            $destination_i = $destination_iata[1];
        }
        $defaults = array(
            'origin' => $origin_i,
            'destination' => $destination_i,
            'direct' => 'false',
            'one_way' => 'false',
            'width' => \app\includes\TPPlugin::$options['widgets'][$widgets]['width']
        );
        extract( wp_parse_args( $data, $defaults ), EXTR_SKIP );
        $period_day_from = \app\includes\TPPlugin::$options['widgets'][$widgets]['period_day']['from'];
        $period_day_to = \app\includes\TPPlugin::$options['widgets'][$widgets]['period_day']['to'];
        $width = (isset($responsive) && $responsive == 'true')? "" : "&width={$width}px&";

        $output = '';
        $output = '
            <div class="TPWidget TPCalendarWidget">
            <script src="//www.travelpayouts.com/calendar_widget/iframe.js?marker='.$this->view->getMarker($widgets)
            .'&origin='.$origin.'&destination='.$destination.'&currency='.$this->view->TypeCurrency()
            .$width.'&searchUrl='.$this->view->getWhiteLabel($widgets).'&one_way='.$one_way
            .'&only_direct='.$direct.'&locale='.$this->view->locale
            .'&period='.\app\includes\TPPlugin::$options['widgets'][$widgets]['period']
            .'&range='.$period_day_from.'%2C'.$period_day_to.'"
            async></script></div>';
        //error_log($output);
        return $output;
 */