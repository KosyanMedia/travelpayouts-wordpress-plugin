<?php
/**
 * Created by PhpStorm.
 * User: freeman
 * Date: 13.08.15
 * Time: 11:42
 */
namespace app\includes\models\site\shortcodes;
class TPDirectFlightsShortcodeModel extends \app\includes\models\site\TPShortcodesChacheModel{

    /**
     * @param array $args
     * @return array|bool
     */
    public function get_data($args = array())
    {
        // TODO: Implement get_data() method.
        $defaults = array('origin' => false, 'departure_at' => false, 'return_at' => false,
            'currency' => 'RUB','title' => '', 'limit' => \app\includes\TPPlugin::$options['shortcodes']['8']['limit']
            , 'paginate' => true, 'off_title' => '', 'subid' => '');
        extract(wp_parse_args($args, $defaults), EXTR_SKIP);
        $attr = array( 'origin' => $origin,
            'departure_at' => $departure_at, 'return_at' => $return_at,
            'currency' => $this->typeCurrency() );
        if($this->cacheSecund()) {
            if ( false === ($rows = get_transient($this->cacheKey('8', $origin)))) {
                $return = \app\includes\TPPlugin::$TPRequestApi->get_direct($attr);
                if( ! $return )
                    return false;
                $rows = array();
                foreach($return as $city => $flights){
                    $rows[$city] = $this->single_flight( $flights );
                }
                array_multisort($rows, SORT_ASC, $rows);
                $rows = $this->iataAutocomplete($rows, 8);
                set_transient( $this->cacheKey('8', $origin) , $rows, $this->cacheSecund());
            }
        }else{
            $return = \app\includes\TPPlugin::$TPRequestApi->get_direct($attr);
            if( ! $return )
                return false;
            $rows = array();
            foreach($return as $city => $flights){
                $rows[$city] = $this->single_flight( $flights );
            }
            array_multisort($rows, SORT_ASC, $rows);
            $rows = $this->iataAutocomplete($rows, 8);

        }

        return array('rows' => $rows, 'type' => 8, 'origin' =>  $this->iataAutocomplete($origin, 0),
            'limit' => $limit, 'title' => $title, 'origin_iata' => $origin, 'paginate' => $paginate
        , 'off_title' => $off_title, 'subid' => $subid);
    }
}