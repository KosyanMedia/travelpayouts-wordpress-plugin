<?php
/**
 * Created by PhpStorm.
 * User: freeman
 * Date: 13.08.15
 * Time: 12:59
 */

class TPMapWidgetController extends TPWigetsShortcodesController{

    public function initShortcode()
    {
        // TODO: Implement initShortcode() method.
        add_shortcode( 'tp_map_widget', array(&$this, 'action'));
    }
    public function render($data)
    {
        // TODO: Implement render() method.
        $widgets = 1;
        $defaults = array(
            'origin' => false,
            'width' => TPPlugin::$options['widgets'][$widgets]['width'],
            'height' => TPPlugin::$options['widgets'][$widgets]['height'],
            'direct' => 'false'
        );
        extract( wp_parse_args( $data, $defaults ), EXTR_SKIP );
        $hide_logo = false;
        if(isset(TPPlugin::$options['widgets'][$widgets]['hide_logo']))
            $hide_logo = true;
        $output = '';
        $output = '<iframe src="//maps.avs.io/flights/?auto_fit_map=true&hide_sidebar=true&hide_reformal=true
            &disable_googlemaps_ui=true&zoom=3&show_filters_icon=true&redirect_on_click=true&small_spinner=true
            &hide_logo='.$hide_logo.'&direct='.$direct.'&lines_type=TpLines&cluster_manager=TpWidgetClusterManager&marker='
            .$this->view->getMarker($widgets).'&show_tutorial=false&locale='.$this->view->locale.'&host='
            .$this->view->getWhiteLabel($widgets).'&origin_iata='.$origin.'" width="'.$width.'px" height="'.$height.'px"
            scrolling="no" frameborder="0"></iframe>';
        return $output;
    }
}