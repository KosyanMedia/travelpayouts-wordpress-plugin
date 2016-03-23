<?php
/**
 * Created by PhpStorm.
 * User: freeman
 * Date: 13.08.15
 * Time: 12:12
 */
namespace app\includes\models\site\shortcodes;
class TPPriceCalendarWeekShortcodeModel extends \app\includes\models\site\TPShortcodesChacheModel{

    public function get_data($args = array())
    {
        // TODO: Implement get_data() method.
        $defaults = array( 'origin' => false, 'destination' => false, 'currency' => 'RUB', 'title' => '' , 'paginate' => true
        , 'off_title' => '', 'subid' => '');
        extract( wp_parse_args( $args, $defaults ), EXTR_SKIP );
        $attr = array( 'origin' => $origin, 'destination' => $destination,
            'currency' => $this->typeCurrency());
        if($this->cacheSecund()) {
            if (false === ($return = get_transient($this->cacheKey('2',
                    $origin.$destination)))) {
                $return = $this->sort_dates(\app\includes\TPPlugin::$TPRequestApi->get_price_week_calendar($attr));
                if( ! $return )
                    return false;
                $return = $this->iataAutocomplete($return, 2);
                set_transient( $this->cacheKey('2',
                    $origin.$destination) , $return, $this->cacheSecund());
            }
        }else{
            $return = $this->sort_dates(\app\includes\TPPlugin::$TPRequestApi->get_price_week_calendar($attr));
            if( ! $return )
                return false;
            $return = $this->iataAutocomplete($return, 2);
        }
        return array('rows' => $return, 'type' => 2, 'origin' => $this->iataAutocomplete($origin, 0),
            'destination' => $this->iataAutocomplete($destination, 0, 'destination'), 'title' => $title,
            'origin_iata' => $origin, 'destination_iata' => $destination, 'paginate' => $paginate,
            'off_title' => $off_title, 'subid' => $subid
        );
    }
}