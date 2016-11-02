<?php
/**
 * Created by PhpStorm.
 * User: freeman
 * Date: 13.08.15
 * Time: 13:27
 */
namespace app\includes\controllers\site\widgets;
class TPCalendarWidgetController  extends \app\includes\controllers\site\TPWigetsShortcodesController{

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
            'width' => \app\includes\TPPlugin::$options['widgets'][$widgets]['width'],
            'subid' => '',
            'period_day_from' => \app\includes\TPPlugin::$options['widgets'][$widgets]['period_day']['from'],
            'period_day_to' => \app\includes\TPPlugin::$options['widgets'][$widgets]['period_day']['to'],
            'period' => \app\includes\TPPlugin::$options['widgets'][$widgets]['period']
        );
        extract( wp_parse_args( $data, $defaults ), EXTR_SKIP );

        $width = (isset($responsive) && $responsive == 'true')? "" : "&width={$width}px&";
        $white_label = $this->view->getWhiteLabel($widgets);
        //$this->view->TypeCurrency()
        $currency = '';
        $currency = $this->view->getCurrency($widgets, $white_label);
        //error_log($period_day_from);
        //error_log($period_day_to);
        $output = '';
        $output = '
            <div class="TPWidget TPCalendarWidget">
            <script src="//www.travelpayouts.com/calendar_widget/iframe.js?marker='.$this->view->getMarker($widgets, $subid)
            .'&origin='.$origin.'&destination='.$destination.'&currency='.$currency
            .$width.'&searchUrl='.$white_label.'&one_way='.$one_way
            .'&only_direct='.$direct.'&locale='.\app\includes\common\TPLang::getLang()
            .'&period='.$period
            .'&range='.$period_day_from.'%2C'.$period_day_to.'"
            async></script></div>';
        //error_log($output);
        return $output;
    }
}