<?php
/**
 * Created by PhpStorm.
 * User: freeman
 * Date: 13.08.15
 * Time: 12:33
 */
namespace app\includes\models\site\shortcodes;
class TPPopularRoutesFromCityShortcodeModel extends \app\includes\models\site\TPShortcodesChacheModel{

    public function get_data($args = array())
    {
        // TODO: Implement get_data() method.
        if(\app\includes\TPPlugin::$options['local']['currency'] != 'RUB') return false;
        $defaults = array(
            'origin' => false,
            'departure_at' => false,
            'return_at' => false,
            'currency' => 'RUB',
            'limit' => false,
            'title' => '',
            'paginate' => true,
            'off_title' => '',
            'subid' => '',
            'filter_flight_number' => false,
            'filter_airline' => false
        );
        extract(wp_parse_args($args, $defaults), EXTR_SKIP);
        $attr = array('origin' => $origin,
            'departure_at' => $departure_at, 'return_at' => $return_at,
            'currency' => $this->typeCurrency());
        $name_method = "***************".__METHOD__."***************";
        if(TPOPlUGIN_ERROR_LOG)
            error_log($name_method);
        $method = __CLASS__." -> ". __METHOD__." -> ".__LINE__
            ." 8. Популярные направления из города ";
        if(TPOPlUGIN_ERROR_LOG)
            error_log($method);
        if ($this->cacheSecund()) {
            if(TPOPlUGIN_ERROR_LOG)
                error_log("{$method} cache");
            if (false === ($return = get_transient($this->cacheKey('9',
                    $origin)))) {
                if(TPOPlUGIN_ERROR_LOG)
                    error_log("{$method} cache false");
                $return = \app\includes\TPPlugin::$TPRequestApi->get_popular_routes_from_city($attr);
                if(TPOPlUGIN_ERROR_LOG)
                    error_log("{$method} cache false ".print_r($return, true));
                //if (!$return)
                //    return false;
                $cacheSecund = 0;
                if( ! $return ) {
                    $return = array();
                    $cacheSecund = $this->cacheEmptySecund();
                } else {
                    $cacheSecund = $this->cacheSecund();
                }
                if(TPOPlUGIN_ERROR_LOG)
                    error_log("{$method} cache secund = ".$cacheSecund);
                set_transient($this->cacheKey('9',
                    $origin), $return, $cacheSecund);
            }
        } else {
            $return = \app\includes\TPPlugin::$TPRequestApi->get_popular_routes_from_city($attr);
            if (!$return)
                return false;
        }
        if(TPOPlUGIN_ERROR_LOG)
            error_log("{$method} rows = ".print_r($return, true));
        //error_log("{$method} rows = ".print_r($return, true));
        if(TPOPlUGIN_ERROR_LOG)
            error_log($name_method);

        $return = $this->iataAutocomplete($return, 9);
        $return = $this->getDataFilter($filter_flight_number, $filter_airline, $return);

        return array('rows' => $return, 'origin' => $this->iataAutocomplete($origin, 0),
                'type' => 9, 'title' => $title, 'origin_iata' => $origin, 'paginate' => $paginate,
            'off_title' => $off_title, 'subid' => $subid, 'currency' => $this->typeCurrency());

    }
    public function getDataFilter($filter_flight_number, $filter_airline, $data){
        $dataAll = $data;
        if( $filter_flight_number !== false && !empty($filter_flight_number)){
            $data = array_filter($data, function($value) use ($filter_flight_number) {
                $flight_number = $value['airline_iata'].$value['flight_number'];
                return ( strpos($flight_number, $filter_flight_number) !== false );
            });
        }
        if( $filter_airline !== false && !empty($filter_airline)) {
            $data = array_filter($data, function ($value) use ($filter_airline) {
                return (strpos($value['airline_iata'], $filter_airline) !== false);
            });
        }
        if(count($data) < 1) return $dataAll;

        return $data;
    }
}