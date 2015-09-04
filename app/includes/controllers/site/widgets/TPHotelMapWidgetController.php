<?php
/**
 * Created by PhpStorm.
 * User: freeman
 * Date: 13.08.15
 * Time: 13:16
 */
namespace app\includes\controllers\site\widgets;
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
            'coordinates' => false,
            'lat' => false,
            'lon' => false,
            'width' => \app\includes\TPPlugin::$options['widgets'][$widgets]['width'],
            'height' => \app\includes\TPPlugin::$options['widgets'][$widgets]['height'],
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

        $output = '<iframe src="//maps.avs.io/hotels?color='.$color.'&locale='.$this->view->locale.'&marker='.$this->view->getMarker($widgets)
            .'&changeflag=0&draggable='.$draggable.'&map_styled='.$map_styled.'&map_color='.$map_color.'
                    &contrast_color='.$contrast_color.'&disable_zoom='.$disable_zoom.'
                    &base_diameter='.\app\includes\TPPlugin::$options['widgets'][$widgets]['base_diameter'].'
                    &scrollwheel='.$scrollwheel.'&host='.$this->view->getWhiteLabel($widgets).'&lat='.$lat.'&lng='.$lon.'&zoom=12"
                    height="'.$height.'px" width="'.$width.'px"  scrolling="no" frameborder="0"></iframe>';
        return $output;
    }
}