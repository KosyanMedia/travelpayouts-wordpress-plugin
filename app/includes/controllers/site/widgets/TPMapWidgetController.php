<?php
/**
 * Created by PhpStorm.
 * User: freeman
 * Date: 13.08.15
 * Time: 12:59
 */
namespace app\includes\controllers\site\widgets;
class TPMapWidgetController extends \app\includes\controllers\site\TPWigetsShortcodesController{

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
            'width' => \app\includes\TPPlugin::$options['widgets'][$widgets]['width'],
            'height' => \app\includes\TPPlugin::$options['widgets'][$widgets]['height'],
            'direct' => 'false',
            'subid' => ''
        );
        extract( wp_parse_args( $data, $defaults ), EXTR_SKIP );
        $hide_logo = false;
        if(isset(\app\includes\TPPlugin::$options['widgets'][$widgets]['hide_logo']))
            $hide_logo = true;
        $white_label = $this->view->getWhiteLabel($widgets);
        //error_log($white_label);
        //$this->view->TypeCurrency()
        $currency = '';
        $currency = $this->view->getCurrency($widgets, $white_label);
        $output = '';
        $output = '
            <div class="TPWidget TPMapWidget">
            <iframe src="//maps.avs.io/flights/?auto_fit_map=true&hide_sidebar=true&hide_reformal=true
            &disable_googlemaps_ui=true&zoom=3&show_filters_icon=true&redirect_on_click=true&small_spinner=true
            &hide_logo='.$hide_logo.'&direct='.$direct.'&lines_type=TpLines&cluster_manager=TpWidgetClusterManager&marker='
            .$this->view->getMarker($widgets, $subid).'&show_tutorial=false&locale='.\app\includes\common\TPLang::getLang().'&host='
            .$white_label.'&origin_iata='.$origin.'" width="'.$width.'px" height="'.$height.'px"
            scrolling="no" frameborder="0"></iframe></div>';
        return $output;
    }
}