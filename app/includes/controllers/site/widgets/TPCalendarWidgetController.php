<?php
/**
 * Created by PhpStorm.
 * User: freeman
 * Date: 13.08.15
 * Time: 13:27
 */

class TPCalendarWidgetController  extends TPWigetsShortcodesController{

    public function initShortcode()
    {
        // TODO: Implement initShortcode() method.
        add_shortcode( 'tp_calendar_widget', array(&$this, 'action'));
    }

    public function render($data)
    {
        // TODO: Implement render() method.
        $widgets = 3;
        $origin_i = '';
        $destination_i = '';
        if(!empty(TPPlugin::$options['widgets'][$widgets]['origin'])){
            preg_match('/\[(.+)\]/',  TPPlugin::$options['widgets'][$widgets]['origin'], $origin_iata);
            $origin_i = $origin_iata[1];
        }
        if(!empty(TPPlugin::$options['widgets'][$widgets]['destination'])){
            preg_match('/\[(.+)\]/',  TPPlugin::$options['widgets'][$widgets]['destination'], $destination_iata);
            $destination_i = $destination_iata[1];
        }
        $defaults = array(
            'origin' => $origin_i,
            'destination' => $destination_i,
            'direct' => 'false',
            'one_way' => 'false',
            'width' => TPPlugin::$options['widgets'][$widgets]['width']
        );
        extract( wp_parse_args( $data, $defaults ), EXTR_SKIP );
        $period_day_from = TPPlugin::$options['widgets'][$widgets]['period_day']['from'];
        $period_day_to = TPPlugin::$options['widgets'][$widgets]['period_day']['to'];
        $width = (isset($responsive) && $responsive == 'true')? "" : "&width={$width}px&";

        $output = '';
        $output = '<script src="//www.travelpayouts.com/calendar_widget/iframe.js?marker='.$this->view->getMarker($widgets)
            .'&origin='.$origin.'&destination='.$destination.'&currency='.$this->view->TypeCurrency()
            .$width.'&searchUrl='.$this->view->getWhiteLabel($widgets).'&one_way='.$one_way
            .'&only_direct='.$direct.'&locale='.$this->view->locale
            .'&period='.TPPlugin::$options['widgets'][$widgets]['period'].'&range='.$period_day_from.'%2C'.$period_day_to.'"
            async></script>';
        return $output;
    }
}