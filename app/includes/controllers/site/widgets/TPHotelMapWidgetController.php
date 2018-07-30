<?php
/**
 * Created by PhpStorm.
 * User: freeman
 * Date: 13.08.15
 * Time: 13:16
 */
namespace app\includes\controllers\site\widgets;
use app\includes\common\TPCurrencyUtils;

class TPHotelMapWidgetController extends \app\includes\controllers\site\TPWigetsShortcodesController {

    public function initShortcode()
    {
        // TODO: Implement initShortcode() method.
        add_shortcode( 'tp_hotelmap_widget', array(&$this, 'action'));
    }

    public function render($data)
    {
        // TODO: Implement render() method.
        $widgets = 2;
        $defaults = array(
            'zoom' => \app\includes\TPPlugin::$options['widgets'][$widgets]['zoom'],
            'coordinates' => false,
            'lat' => false,
            'lon' => false,
            'width' => \app\includes\TPPlugin::$options['widgets'][$widgets]['width'],
            'height' => \app\includes\TPPlugin::$options['widgets'][$widgets]['height'],
            'subid' => '',
            'currency' => \app\includes\TPPlugin::$options['local']['currency'], //TPCurrencyUtils::TP_CURRENCY_USD,
        );
        extract( wp_parse_args( $data, $defaults ), EXTR_SKIP );
        $coordinates = explode(',', $coordinates);
        $lat = $coordinates[0];
        $lon = $coordinates[1];

        $draggable = 'true';
        if(isset(\app\includes\TPPlugin::$options['widgets'][$widgets]['draggable']))
            $draggable = 'false';
        $disable_zoom = 'false';
        if(isset(\app\includes\TPPlugin::$options['widgets'][$widgets]['disable_zoom']))
            $disable_zoom = 'true';
        $scrollwheel = 'false';
        if(isset(\app\includes\TPPlugin::$options['widgets'][$widgets]['scrollwheel']))
            $scrollwheel = 'true';
        $map_styled = 'false';
        if(isset(\app\includes\TPPlugin::$options['widgets'][$widgets]['map_styled']))
            $map_styled = 'true';
        $color = rawurlencode(\app\includes\TPPlugin::$options['widgets'][$widgets]['color']);
        $map_color = rawurlencode(\app\includes\TPPlugin::$options['widgets'][$widgets]['map_color']);
        $contrast_color = rawurlencode(\app\includes\TPPlugin::$options['widgets'][$widgets]['contrast_color']);
        $output = '';
        $white_label = $this->view->getWhiteLabel($widgets);
        //$this->view->TypeCurrency()
        //$currency = '';
        //$currency = $this->view->getCurrency($widgets, $white_label);
        $output = '
        <div class="TPWidget TPHotelMapWidget">
        <iframe src="//maps.avs.io/hotels?color='.$color.'&locale='.\app\includes\common\TPLang::getLang().'&marker='.$this->view->getMarker($widgets, $subid)
            .'&changeflag=0&draggable='.$draggable.'&map_styled='.$map_styled.'&map_color='.$map_color.'
                    &contrast_color='.$contrast_color.'&disable_zoom='.$disable_zoom.'
                    &base_diameter='.\app\includes\TPPlugin::$options['widgets'][$widgets]['base_diameter'].'
                    &scrollwheel='.$scrollwheel.'&host='.$white_label.'&lat='.$lat.'&lng='.$lon.'&zoom='.$zoom.'"
                    height="'.$height.'px" width="'.$width.'px"  scrolling="no" frameborder="0"></iframe></div>';
        return $output;
    }
}