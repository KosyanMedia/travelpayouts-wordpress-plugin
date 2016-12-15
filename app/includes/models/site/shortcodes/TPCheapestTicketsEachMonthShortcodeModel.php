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
        extract($args, EXTR_SKIP );
        $attr = array(
            'origin' => $origin,
            'destination' => $destination,
            'currency' => $currency);
        $name_method = "***************".__METHOD__."***************";
        if(TPOPlUGIN_ERROR_LOG)
            error_log($name_method);
        $method = __CLASS__." -> ". __METHOD__." -> ".__LINE__
            ." 5. Цены на билеты по месяцам ";
        if(TPOPlUGIN_ERROR_LOG)
            error_log($method);
        if($this->cacheSecund()) {
            if(TPOPlUGIN_ERROR_LOG)
                error_log("{$method} cache");
            if (false === ($return = get_transient($this->cacheKey('6'.$currency,
                    $origin.$destination)))) {
                if(TPOPlUGIN_ERROR_LOG)
                    error_log("{$method} cache -> false");
                $return = $this->iataAutocomplete((array) \app\includes\TPPlugin::$TPRequestApi->get_cheapest_tickets_each_month($attr), 6);
                if(TPOPlUGIN_ERROR_LOG)
                    error_log("{$method} cache false ".print_r($return, true));
                $cacheSecund = 0;
                if( ! $return ) {
                    $return = array();
                    $cacheSecund = $this->cacheEmptySecund();
                } else {
                    $cacheSecund = $this->cacheSecund();
                }
                if(TPOPlUGIN_ERROR_LOG)
                    error_log("{$method} cache secund = ".$cacheSecund);
                set_transient( $this->cacheKey('6'.$currency,
                    $origin.$destination) , $return, $this->cacheSecund());
            }
        }else{
            $return = $this->iataAutocomplete((array) \app\includes\TPPlugin::$TPRequestApi->get_cheapest_tickets_each_month($attr), 6);
            if( ! $return )
                return false;
        }
        if(TPOPlUGIN_ERROR_LOG)
            error_log("{$method} rows = ".print_r($return, true));
        if(TPOPlUGIN_ERROR_LOG)
            error_log($name_method);
        //return var_dump("<pre>", $return, "</pre>");
        return $return;
    }

    /**
     * @param array $args
     * @return array|bool
     */
    public function getDataTable($args = array()){
        $defaults = array(
            'origin' => false,
            'destination' => false,
            'currency' => $this->typeCurrency(),
            'title' => '' ,
            'paginate' => true,
            'off_title' => '',
            'subid' => '',
            'filter_flight_number' => false,
            'filter_airline' => false
        );
        extract( wp_parse_args( $args, $defaults ), EXTR_SKIP );
        $return = $this->get_data(array(
            'origin' => $origin,
            'destination' => $destination,
            'currency' => $currency,
        ));

        //if( ! $return )
         //   return false;

        //error_log(print_r($return, true));


        $return = $this->getDataFilter($filter_flight_number, $filter_airline, $return);

        return array(
            'rows' => $return,
            'origin' => $this->iataAutocomplete($origin, 0),
            'destination' => $this->iataAutocomplete($destination, 0, 'destination'),
            'type' => 6,
            'title' => $title,
            'origin_iata' => $origin,
            'destination_iata' => $destination,
            'paginate' => $paginate,
            'off_title' => $off_title,
            'subid' => $subid,
            'currency' => $currency);


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

    public function getMaxPrice($args = array())
    {
        $defaults = array(
            'origin' => false,
            'destination' => false,
            'currency' => $this->typeCurrency(),
        );
        extract( wp_parse_args( $args, $defaults ), EXTR_SKIP );
        $return = $this->get_data(array(
            'origin' => $origin,
            'destination' => $destination,
            'currency' => $currency,
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
        );
        extract( wp_parse_args( $args, $defaults ), EXTR_SKIP );
        $return = $this->get_data(array(
            'origin' => $origin,
            'destination' => $destination,
            'currency' => $currency
        ));
        if( ! $return )
            return false;
        $rows = array_column($return, 'price');
        return array('price' => min($rows), 'currency' => $currency);
    }
}