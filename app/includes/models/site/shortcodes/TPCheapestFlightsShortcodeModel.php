<?php
/**
 * Created by PhpStorm.
 * User: freeman
 * Date: 13.08.15
 * Time: 10:33
 */

class TPCheapestFlightsShortcodeModel extends TPShortcodesChacheModel{

    /**
     * @param array $args
     * @return array|bool
     */
    public function get_data($args = array())
    {
        // TODO: Implement get_data() method.
        $defaults = array( 'origin' => false, 'destination' => false, 'departure_at' => false, 'return_at' => false,
            'currency' => 'RUB', 'title' => '' );
        extract( wp_parse_args( $args, $defaults ), EXTR_SKIP );
        $attr = array( 'origin' => $origin, 'destination' => $destination,
            'departure_at' => $departure_at, 'return_at' => $return_at,
            'currency' => $this->typeCurrency() );
        if($this->cacheSecund()) {
            if (false === ($rows = get_transient($this->cacheKey('tpCheapestFlightsShortcodes',
                    $origin . $destination)))) {
                $return = TPPlugin::$TPRequestApi->get_cheapest($attr);
                if( ! $return )
                    return false;
                $rows = $this->iataAutocomplete($this->tpSortCheapestFlightsShortcodes($return), 4);
                set_transient( $this->cacheKey('tpCheapestFlightsShortcodes',
                    $origin.$destination) , $rows, $this->cacheSecund());
            }
        }else{
            $return = TPPlugin::$TPRequestApi->get_cheapest($attr);
            if( ! $return )
                return false;
            $rows = $this->iataAutocomplete($this->tpSortCheapestFlightsShortcodes($return), 4);
        }
        return array('rows' => $rows, 'type' => 4, 'origin' => $this->iataAutocomplete($origin, 0),
            'destination' => $this->iataAutocomplete($destination, 0, 'destination'), 'title' => $title);
    }
}