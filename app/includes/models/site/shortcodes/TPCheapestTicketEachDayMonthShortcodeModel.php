<?php
/**
 * Created by PhpStorm.
 * User: freeman
 * Date: 13.08.15
 * Time: 12:27
 */
namespace app\includes\models\site\shortcodes;
class TPCheapestTicketEachDayMonthShortcodeModel extends \app\includes\models\site\TPShortcodesChacheModel{

    public function get_data($args = array())
    {
        // TODO: Implement get_data() method.
        $defaults = array( 'origin' => false, 'destination' => false, 'currency' => 'RUB', 'title' => '' );
        extract( wp_parse_args( $args, $defaults ), EXTR_SKIP );
        $attr = array( 'origin' => $origin, 'destination' => $destination,
            'currency' => $this->typeCurrency());

        if($this->cacheSecund()) {
            if (false === ($rows = get_transient($this->cacheKey('5',
                    $origin.$destination)))) {
                $return = (array) \app\includes\TPPlugin::$TPRequestApi->get_calendar($attr);
                if( ! $return )
                    return false;
                $rows = array();
                $rows = $this->iataAutocomplete($this->tpSortCheapestTicketEachDayMonth($return, date('Y-m')), 5);
                set_transient( $this->cacheKey('5',
                    $origin.$destination) , $rows, $this->cacheSecund());
            }
        }else{
            $return = (array) \app\includes\TPPlugin::$TPRequestApi->get_calendar($attr);
            if( ! $return )
                return false;
            $rows = array();
            $rows = $this->iataAutocomplete($this->tpSortCheapestTicketEachDayMonth($return, date('Y-m')), 5);
        }

        //return var_dump("<pre>", $rows, "</pre>");
        return array('rows' => $rows, 'origin' => $this->iataAutocomplete($origin, 0),
            'destination' => $this->iataAutocomplete($destination, 0, 'destination'), 'type' => 5, 'title' => $title,
            'origin_iata' => $origin, 'destination_iata' => $destination);
    }
}