<?php
/**
 * Created by PhpStorm.
 * User: freeman
 * Date: 13.08.15
 * Time: 12:18
 */
namespace app\includes\models\site\shortcodes;
class TPCheapestTicketsEachMonthShortcodeModel extends \app\includes\models\site\TPShortcodesChacheModel{

    public function get_data($args = array())
    {
        // TODO: Implement get_data() method.
        $defaults = array( 'origin' => false, 'destination' => false, 'currency' => 'RUB', 'title' => '' ,
            'paginate' => true, 'off_title' => '', 'subid' => '');
        extract( wp_parse_args( $args, $defaults ), EXTR_SKIP );
        $attr = array( 'origin' => $origin, 'destination' => $destination,
            'currency' => $this->typeCurrency());
        if($this->cacheSecund()) {
            if (false === ($return = get_transient($this->cacheKey('6',
                    $origin.$destination)))) {
                $return = $this->iataAutocomplete((array) \app\includes\TPPlugin::$TPRequestApi->get_cheapest_tickets_each_month($attr), 6);
                if( ! $return )
                    return false;
                set_transient( $this->cacheKey('6',
                    $origin.$destination) , $return, $this->cacheSecund());
            }
        }else{
            $return = $this->iataAutocomplete((array) \app\includes\TPPlugin::$TPRequestApi->get_cheapest_tickets_each_month($attr), 6);
            if( ! $return )
                return false;
        }
        //return var_dump("<pre>", $return, "</pre>");
        return array('rows' => $return, 'origin' => $this->iataAutocomplete($origin, 0),
            'destination' => $this->iataAutocomplete($destination, 0, 'destination'), 'type' => 6, 'title' => $title,
            'origin_iata' => $origin, 'destination_iata' => $destination, 'paginate' => $paginate,
            'off_title' => $off_title, 'subid' => $subid);
    }
}