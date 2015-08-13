<?php
/**
 * Created by PhpStorm.
 * User: freeman
 * Date: 13.08.15
 * Time: 12:27
 */

class TPCheapestTicketEachDayMonthShortcodeModel extends TPShortcodesChacheModel{

    public function get_data($args = array())
    {
        // TODO: Implement get_data() method.
        $defaults = array( 'origin' => false, 'destination' => false, 'currency' => 'RUB', 'title' => '' );
        extract( wp_parse_args( $args, $defaults ), EXTR_SKIP );
        $attr = array( 'origin' => $origin, 'destination' => $destination,
            'currency' => $this->typeCurrency());

        if($this->cacheSecund()) {
            if (false === ($rows = get_transient($this->cacheKey('tpCheapestTicketEachDayMonthShortcodes',
                    $origin.$destination)))) {
                $return = (array) TPPlugin::$TPRequestApi->get_calendar($attr);
                if( ! $return )
                    return false;
                $rows = array();
                $rows = $this->tpSortCheapestTicketEachDayMonth($return, date('Y-m'));
                set_transient( $this->cacheKey('tpCheapestTicketEachDayMonthShortcodes',
                    $origin.$destination) , $rows, $this->cacheSecund());
            }
        }else{
            $return = (array) TPPlugin::$TPRequestApi->get_calendar($attr);
            if( ! $return )
                return false;
            $rows = array();
            $rows = $this->tpSortCheapestTicketEachDayMonth($return, date('Y-m'));
        }

        //return var_dump("<pre>", $rows, "</pre>");
        return array('rows' => $rows, 'origin' => $origin,
            'destination' => $destination, 'type' => 5, 'title' => $title);
    }
}