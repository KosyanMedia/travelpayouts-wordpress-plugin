<?php
/**
 * Created by PhpStorm.
 * User: freeman
 * Date: 13.08.15
 * Time: 12:18
 */

class TPCheapestTicketsEachMonthShortcodeModel extends TPShortcodesChacheModel{

    public function get_data($args = array())
    {
        // TODO: Implement get_data() method.
        $defaults = array( 'origin' => false, 'destination' => false, 'currency' => 'RUB', 'title' => '' );
        extract( wp_parse_args( $args, $defaults ), EXTR_SKIP );
        $attr = array( 'origin' => $origin, 'destination' => $destination,
            'currency' => $this->typeCurrency());
        if($this->cacheSecund()) {
            if (false === ($return = get_transient($this->cacheKey('tpCheapestTicketsEachMonthShortcodes',
                    $origin.$destination)))) {
                $return = (array) TPPlugin::$TPRequestApi->get_cheapest_tickets_each_month($attr);
                if( ! $return )
                    return false;
                set_transient( $this->cacheKey('tpCheapestTicketsEachMonthShortcodes',
                    $origin.$destination) , $return, $this->cacheSecund());
            }
        }else{
            $return = (array) TPPlugin::$TPRequestApi->get_cheapest_tickets_each_month($attr);
            if( ! $return )
                return false;
        }
        //return var_dump("<pre>", $return, "</pre>");
        return array('rows' => $return, 'origin' => $origin,
            'destination' => $destination, 'type' => 6, 'title' => $title);
    }
}