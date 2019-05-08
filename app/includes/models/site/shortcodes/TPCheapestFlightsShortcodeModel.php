<?php
/**
 * Created by PhpStorm.
 * User: freeman
 * Date: 13.08.15
 * Time: 10:33
 * 3. Самые дешевые билеты по направлению
 */
namespace app\includes\models\site\shortcodes;

use \app\includes\models\site\TPFlightShortcodeModel;
use \app\includes\common\TpPluginHelper;

class TPCheapestFlightsShortcodeModel extends TPFlightShortcodeModel{

    /**
     * @param array $args
     * @return array|bool
     * @var $NUMBER  4
     */
    public function get_data($args = array())
    {
        // TODO: Implement get_data() method.
        extract($args, EXTR_SKIP );
        $attr = array(
            'origin' => $origin,
            'destination' => $destination,
            'departure_at' => $departure_at,
            'return_at' => $return_at,
            'currency' => $currency,
            'return_url' => $return_url
        );
        $name_method = "***************".__METHOD__."***************";
        $method = __CLASS__." -> ". __METHOD__." -> ".__LINE__
            ." 3. Самые дешевые билеты по направлению ";
        if(TPOPlUGIN_ERROR_LOG)
            error_log($name_method);
        if(TPOPlUGIN_ERROR_LOG)
            error_log($method);
        if($this->cacheSecund() && $return_url == false) {
            if(TPOPlUGIN_ERROR_LOG)
                error_log("{$method} -> cache");
            if (false === ($rows = get_transient($this->cacheKey('4'.$currency, $origin . $destination, $widget)))) {
                if(TPOPlUGIN_ERROR_LOG)
                    error_log("{$method} -> cache false");
                $return = self::$TPRequestApi->get_cheapest($attr);
                if(TPOPlUGIN_ERROR_LOG)
                    error_log("{$method} cache false ".print_r($return, true));

                $cacheSecund = 0;
                if( ! $return ) {
                    $rows = array();
                    $cacheSecund = $this->cacheEmptySecund();
                } else {
                    $rows = $this->iataAutocomplete($this->tpSortCheapestFlightsShortcodes($return), 4);
                    $cacheSecund = $this->cacheSecund();
                }
                if(TPOPlUGIN_ERROR_LOG)
                    error_log("{$method} cache secund = ".$cacheSecund);

                set_transient( $this->cacheKey('4'.$currency, $origin.$destination, $widget) , $rows, $cacheSecund);
            }
        }else{
            $return = self::$TPRequestApi->get_cheapest($attr);
            if( ! $return )
                return false;
            if ($return_url == false){
                $rows = array();
                $rows = $this->iataAutocomplete($this->tpSortCheapestFlightsShortcodes($return), 4);
            } else {
                $rows = $return;
            }

        }
        if(TPOPlUGIN_ERROR_LOG)
            error_log("{$method} rows = ".print_r($rows, true));
        if(TPOPlUGIN_ERROR_LOG)
            error_log($name_method);
        return $rows;
    }

    /**
     * @param array $args
     * @return array|bool
     */
    public function getDataTable($args = array()){
        $defaults = array(
            'origin' => false,
            'destination' => false,
            'departure_at' => false,
            'return_at' => false,
            'currency' => $this->typeCurrency(),
            'title' => '',
            'paginate' => true,
            'off_title' => '',
            'subid' => '',
            'filter_flight_number' => false,
            'filter_airline' => false,
            'return_url' => false,
            'widget' => 0,
            'host' => ''
            );
        extract( wp_parse_args( $args, $defaults ), EXTR_SKIP );

        if ($return_url == 1){
            $return_url = true;
        }

        $return = $this->get_data(array(
            'origin' => $origin,
            'destination' => $destination,
            'currency' => $currency,
            'departure_at' => $departure_at,
            'return_at' => $return_at,
            'return_url' => $return_url,
            'widget' => $widget
        ));
        //if( ! $return )
        //    return false;
        if ($return_url == false) {
            $return = $this->getDataFilter($filter_flight_number, $filter_airline, $return);
        }

        return array(
            'rows' => $return,
            'type' => 4,
            'origin' => $this->iataAutocomplete($origin, 0),
            'destination' => $this->iataAutocomplete($destination, 0, 'destination'),
            'title' => $title,
            'origin_iata' => $origin,
            'destination_iata' => $destination,
            'paginate' => $paginate,
            'off_title' => $off_title,
            'subid' => $subid,
            'currency' => $currency,
            'return_url' => $return_url,
            'host' => $host
        );


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
        if(TpPluginHelper::count($data) < 1) return $dataAll;
        return $data;
    }

    public function getMaxPrice($args = array())
    {
        $defaults = array(
            'origin' => false,
            'destination' => false,
            'currency' => $this->typeCurrency(),
            'departure_at' => false,
            'return_at' => false,
        );
        extract( wp_parse_args( $args, $defaults ), EXTR_SKIP );
        $return = $this->get_data(array(
            'origin' => $origin,
            'destination' => $destination,
            'currency' => $currency,
            'departure_at' => $departure_at,
            'return_at' => $return_at,
        ));
        if( ! $return )
            return false;
        $rows = array_column($return, 'price');
        return array('price' => max($rows), 'currency' => $currency);
    }
    public function getMinPrice($args = array())
    {
        $defaults = array(
            'origin' => false,
            'destination' => false,
            'currency' => $this->typeCurrency(),
            'departure_at' => false,
            'return_at' => false,
        );
        extract( wp_parse_args( $args, $defaults ), EXTR_SKIP );
        $return = $this->get_data(array(
            'origin' => $origin,
            'destination' => $destination,
            'currency' => $currency,
            'departure_at' => $departure_at,
            'return_at' => $return_at,
        ));
        if( ! $return )
            return false;
        $rows = array_column($return, 'price');
        return array('price' => min($rows), 'currency' => $currency);
    }
}
