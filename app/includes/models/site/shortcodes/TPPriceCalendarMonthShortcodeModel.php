<?php
/**
 * Created by PhpStorm.
 * User: freeman
 * Date: 13.08.15
 * Time: 12:05
 */
namespace app\includes\models\site\shortcodes;
class TPPriceCalendarMonthShortcodeModel extends \app\includes\models\site\TPShortcodesChacheModel{

    public function get_data($args = array())
    {
        // TODO: Implement get_data() method.
        $defaults = array( 'origin' => false, 'destination' => false, 'currency' => 'RUB', 'title' => '',
            'stops' => \app\includes\TPPlugin::$options['shortcodes']['1']['transplant'], 'paginate' => true
        , 'off_title' => '', 'subid' => '');
        extract( wp_parse_args( $args, $defaults ), EXTR_SKIP );
        //$month
        $attr =  array( 'origin' => $origin, 'destination' => $destination,
            'currency' => $this->typeCurrency());
        if($this->cacheSecund()) {
            if (false === ($return = get_transient($this->cacheKey('1',
                    $origin.$destination)))) {
                $return = \app\includes\TPPlugin::$TPRequestApi->get_price_mounth_calendar($attr);
                if( ! $return )
                    return false;
                $return = $this->iataAutocomplete($return, 1);
                set_transient( $this->cacheKey('1',
                    $origin.$destination) , $return, $this->cacheSecund());
            }
        }else{
            $return = \app\includes\TPPlugin::$TPRequestApi->get_price_mounth_calendar($attr);
            if( ! $return )
                return false;
            $return = $this->iataAutocomplete($return, 1);
        }
        $rows = array();
        switch($stops){
            case 0:
                $rows = $return;
                break;
            case 1:
                foreach($return as $value){
                    if($value['number_of_changes'] <= 1){
                        $rows[] = $value;
                    }
                }
                break;
            case 2:
                foreach($return as $value){
                    if($value['number_of_changes'] == 0){
                        $rows[] = $value;
                    }
                }
                break;
        }
        return array('rows' => $rows, 'type' => 1, 'origin' => $this->iataAutocomplete($origin, 0),
            'destination' => $this->iataAutocomplete($destination, 0, 'destination'), 'title' => $title,
            'origin_iata' => $origin, 'destination_iata' => $destination, 'paginate' => $paginate
        , 'off_title' => $off_title, 'subid' => $subid);
    }
}