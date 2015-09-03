<?php
/**
 * Created by PhpStorm.
 * User: freeman
 * Date: 13.08.15
 * Time: 12:05
 */
namespace app\includes\models\site\shortcodes;
class TPPriceCalendarMonthShortcodeModel extends TPShortcodesChacheModel{

    public function get_data($args = array())
    {
        // TODO: Implement get_data() method.
        $defaults = array( 'origin' => false, 'destination' => false, 'currency' => 'RUB', 'title' => '');
        extract( wp_parse_args( $args, $defaults ), EXTR_SKIP );
        //$month
        $attr =  array( 'origin' => $origin, 'destination' => $destination,
            'currency' => $this->typeCurrency());
        if($this->cacheSecund()) {
            if (false === ($return = get_transient($this->cacheKey('tpPriceCalendarMonthShortcodes',
                    $origin.$destination)))) {
                $return = \app\includes\TPPlugin::$TPRequestApi->get_price_mounth_calendar($attr);
                if( ! $return )
                    return false;
                set_transient( $this->cacheKey('tpPriceCalendarMonthShortcodes',
                    $origin.$destination) , $return, $this->cacheSecund());
            }
        }else{
            $return = \app\includes\TPPlugin::$TPRequestApi->get_price_mounth_calendar($attr);
            if( ! $return )
                return false;
        }

        return array('rows' => $return, 'type' => 1, 'origin' => $this->iataAutocomplete($origin, 0),
            'destination' => $this->iataAutocomplete($destination, 0, 'destination'), 'title' => $title,
            'origin_iata' => $origin, 'destination_iata' => $destination);
    }
}