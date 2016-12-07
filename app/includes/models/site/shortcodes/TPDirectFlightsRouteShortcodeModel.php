<?php
/**
 * Created by PhpStorm.
 * User: freeman
 * Date: 13.08.15
 * Time: 11:21
 */
namespace app\includes\models\site\shortcodes;
class TPDirectFlightsRouteShortcodeModel extends \app\includes\models\site\TPShortcodesChacheModel{

    public function get_data($args = array())
    {
        // TODO: Implement get_data() method.
        $name_method = "***************".__METHOD__."***************";
        if(TPOPlUGIN_ERROR_LOG)
            error_log($name_method);
        $method = __CLASS__." -> ". __METHOD__." -> ".__LINE__
            ." 6. Билеты без пересадок по направлению ";
        extract($args, EXTR_SKIP );
        $current_day = date("d",time());
        $current_month = date("m");

        $attr =  array( 'origin' => $origin, 'destination' => $destination,
            'departure_at' => date('Y-m'), 'return_at' => date('Y-m'),
            'currency' => $currency );

        $attr_one =  array( 'origin' => $origin, 'destination' => $destination,
            'departure_at' => date('Y-m', mktime(0, 0, 0, $current_month + 1, 1, date("Y"))),
            'return_at' => date('Y-m', mktime(0, 0, 0, $current_month + 1, 1, date("Y"))),
            'currency' => $currency  );

        $attr_two =  array( 'origin' => $origin, 'destination' => $destination,
            'departure_at' => date('Y-m', mktime(0, 0, 0, $current_month + 2, 1, date("Y"))),
            'return_at' => date('Y-m', mktime(0, 0, 0, $current_month + 2, 1, date("Y"))),
            'currency' => $currency  );
        $attr_three =  array( 'origin' => $origin, 'destination' => $destination,
            'departure_at' => date('Y-m', mktime(0, 0, 0, $current_month + 3, 1, date("Y"))),
            'return_at' => date('Y-m', mktime(0, 0, 0, $current_month + 3, 1, date("Y"))),
            'currency' => $currency);

        if(TPOPlUGIN_ERROR_LOG)
            error_log($method);
        if($this->cacheSecund()) {
            if(TPOPlUGIN_ERROR_LOG)
                error_log("{$method} cache");
            if (false === ($return = get_transient($this->cacheKey('7'.$currency,
                    $origin.$destination)))) {
                if(TPOPlUGIN_ERROR_LOG)
                    error_log("{$method} cache false");
                if(TPOPlUGIN_ERROR_LOG)
                    error_log("{$method} cache false {$current_day}");
                $return = array();

                if($current_day < 20){

                    $return_null = \app\includes\TPPlugin::$TPRequestApi->get_direct($attr);
                    if($return_null)
                        array_push($return, array_shift($return_null[$destination]));
                    $return_one = \app\includes\TPPlugin::$TPRequestApi->get_direct($attr_one);
                    if($return_one)
                        array_push($return, array_shift($return_one[$destination]));
                    $return_two = \app\includes\TPPlugin::$TPRequestApi->get_direct($attr_two);
                    if($return_two)
                        array_push($return, array_shift($return_two[$destination]));
                }else{

                    $return_null = \app\includes\TPPlugin::$TPRequestApi->get_direct($attr);
                    if($return_null)
                        array_push($return, array_shift($return_null[$destination]));

                    $return_one = \app\includes\TPPlugin::$TPRequestApi->get_direct($attr_one);
                    if($return_one)
                        array_push($return, array_shift($return_one[$destination]));
                    $return_two = \app\includes\TPPlugin::$TPRequestApi->get_direct($attr_two);
                    if($return_two)
                        array_push($return, array_shift($return_two[$destination]));
                    $return_three = \app\includes\TPPlugin::$TPRequestApi->get_direct($attr_three);
                    if($return_three)
                        array_push($return, array_shift($return_three[$destination]));
                }

                if(TPOPlUGIN_ERROR_LOG)
                    error_log("{$method} cache false ".print_r($return, true));
                $cacheSecund = 0;
                if( ! $return ) {
                    $return = array();
                    $cacheSecund = $this->cacheEmptySecund();
                } else {
                    $return = $this->iataAutocomplete($return, 7);
                    $cacheSecund = $this->cacheSecund();
                }
                if(TPOPlUGIN_ERROR_LOG)
                    error_log("{$method} cache secund = ".$cacheSecund);

                set_transient( $this->cacheKey('7'.$currency,
                    $origin.$destination) , $return, $cacheSecund);
            }
        }else{
            $return = array();
            if($current_day < 20){
                $return_null = \app\includes\TPPlugin::$TPRequestApi->get_direct($attr);

                if($return_null)
                    array_push($return, $return_null[$destination][0]);
                $return_one = \app\includes\TPPlugin::$TPRequestApi->get_direct($attr_one);
                if($return_one)
                    array_push($return, $return_one[$destination][0]);
                $return_two = \app\includes\TPPlugin::$TPRequestApi->get_direct($attr_two);
                if($return_two)
                    array_push($return, $return_two[$destination][0]);
            }else{
                $return_null = \app\includes\TPPlugin::$TPRequestApi->get_direct($attr);
                if($return_null)
                    array_push($return, $return_null[$destination][0]);
                $return_one = \app\includes\TPPlugin::$TPRequestApi->get_direct($attr_one);
                if($return_one)
                    array_push($return, $return_one[$destination][0]);
                $return_two = \app\includes\TPPlugin::$TPRequestApi->get_direct($attr_two);
                if($return_two)
                    array_push($return, $return_two[$destination][0]);
                $return_three = \app\includes\TPPlugin::$TPRequestApi->get_direct($attr_three);
                if($return_three)
                    array_push($return, $return_three[$destination][0]);
            }
            if( ! $return )
                return false;
            $return = $this->iataAutocomplete($return, 7);
        }
        if(TPOPlUGIN_ERROR_LOG)
            error_log("{$method} rows = ".print_r($return, true));
        if(TPOPlUGIN_ERROR_LOG)
            error_log($name_method);
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
            'departure_at' => false,
            'return_at' => false,
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
        $return = $this->getDataFilter($filter_flight_number, $filter_airline, $return);
        return array(
            'rows' => $return,
            'type' => 7,
            'origin' => $this->iataAutocomplete($origin, 0),
            'destination' => $this->iataAutocomplete($destination, 0, 'destination'),
            'title' => $title,
            'origin_iata' => $origin,
            'destination_iata' => $destination,
            'paginate' => $paginate,
            'off_title' => $off_title,
            'subid' => $subid,
            'currency' => $currency
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