<?php
/**
 * Created by PhpStorm.
 * User: freeman
 * Date: 13.08.15
 * Time: 11:21
 */
namespace app\includes\models\site\shortcodes;

use \app\includes\models\site\TPFlightShortcodeModel;
use \app\includes\common\TpPluginHelper;

class TPDirectFlightsRouteShortcodeModel extends TPFlightShortcodeModel{
    /**
     * @param array $args
     * @return array|bool|mixed
     * @var $NUMBER 7
     */
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

        $attr =  array(
            'origin' => $origin,
            'destination' => $destination,
            'departure_at' => date('Y-m'),
            'return_at' => date('Y-m'),
            'currency' => $currency,
            'return_url' => $return_url
        );

        $attr_one =  array(
            'origin' => $origin,
            'destination' => $destination,
            'departure_at' => date('Y-m', mktime(0, 0, 0, $current_month + 1, 1, date("Y"))),
            'return_at' => date('Y-m', mktime(0, 0, 0, $current_month + 1, 1, date("Y"))),
            'currency' => $currency,
            'return_url' => $return_url
        );

        $attr_two =  array(
            'origin' => $origin, 'destination' => $destination,
            'departure_at' => date('Y-m', mktime(0, 0, 0, $current_month + 2, 1, date("Y"))),
            'return_at' => date('Y-m', mktime(0, 0, 0, $current_month + 2, 1, date("Y"))),
            'currency' => $currency,
            'return_url' => $return_url
        );
        $attr_three =  array(
            'origin' => $origin, 'destination' => $destination,
            'departure_at' => date('Y-m', mktime(0, 0, 0, $current_month + 3, 1, date("Y"))),
            'return_at' => date('Y-m', mktime(0, 0, 0, $current_month + 3, 1, date("Y"))),
            'currency' => $currency,
            'return_url' => $return_url
        );

        if(TPOPlUGIN_ERROR_LOG)
            error_log($method);
        if($this->cacheSecund() && $return_url == false) {
            if(TPOPlUGIN_ERROR_LOG)
                error_log("{$method} cache");
            if (false === ($return = get_transient($this->cacheKey('7'.$currency,
                    $origin.$destination, $widget)))) {
                if(TPOPlUGIN_ERROR_LOG)
                    error_log("{$method} cache false");
                if(TPOPlUGIN_ERROR_LOG)
                    error_log("{$method} cache false {$current_day}");
                $return = array();

                if($current_day < 20){

                    $return_null = self::$TPRequestApi->get_direct($attr);
                    if($return_null)
                        array_push($return, array_shift($return_null[$destination]));
                    $return_one = self::$TPRequestApi->get_direct($attr_one);
                    if($return_one)
                        array_push($return, array_shift($return_one[$destination]));
                    $return_two = self::$TPRequestApi->get_direct($attr_two);
                    if($return_two)
                        array_push($return, array_shift($return_two[$destination]));
                }else{

                    $return_null = self::$TPRequestApi->get_direct($attr);
                    if($return_null)
                        array_push($return, array_shift($return_null[$destination]));

                    $return_one = self::$TPRequestApi->get_direct($attr_one);
                    if($return_one)
                        array_push($return, array_shift($return_one[$destination]));
                    $return_two = self::$TPRequestApi->get_direct($attr_two);
                    if($return_two)
                        array_push($return, array_shift($return_two[$destination]));
                    $return_three = self::$TPRequestApi->get_direct($attr_three);
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
                    $origin.$destination, $widget) , $return, $cacheSecund);
            }
        }else{
            $return = array();
            if($current_day < 20){
                $return_null = self::$TPRequestApi->get_direct($attr);
                if($return_null){
                    if ($return_url == false) {
                        array_push($return, $return_null[$destination][0]);
                    } else {
                        array_push($return, $return_null);
                    }
                }

                $return_one = self::$TPRequestApi->get_direct($attr_one);
                if($return_one){
                    if ($return_url == false) {
                        array_push($return, $return_one[$destination][0]);
                    } else {
                        array_push($return, $return_one);
                    }
                }
                $return_two = self::$TPRequestApi->get_direct($attr_two);
                if($return_two){
                    if ($return_url == false) {
                        array_push($return, $return_two[$destination][0]);
                    } else {
                        array_push($return, $return_two);
                    }
                }

            }else{
                $return_null = self::$TPRequestApi->get_direct($attr);
                if($return_null){
                    if ($return_url == false) {
                        array_push($return, $return_null[$destination][0]);
                    } else {
                        array_push($return, $return_null);
                    }
                }

                $return_one = self::$TPRequestApi->get_direct($attr_one);
                if($return_one){
                    if ($return_url == false) {
                        array_push($return, $return_one[$destination][0]);
                    } else {
                        array_push($return, $return_one);
                    }
                }
                $return_two = self::$TPRequestApi->get_direct($attr_two);
                if($return_two){
                    if ($return_url == false) {
                        array_push($return, $return_two[$destination][0]);
                    } else {
                        array_push($return, $return_two);
                    }
                }
                $return_three = self::$TPRequestApi->get_direct($attr_three);
                if($return_three){
                    if ($return_url == false) {
                        array_push($return, $return_three[$destination][0]);
                    } else {
                        array_push($return, $return_three);
                    }
                }

            }

            if( ! $return )
                return false;

            if ($return_url == false){
                $return = $this->iataAutocomplete($return, 7);
            }
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
            'return_url' => $return_url,
            'widget' => $widget
        ));
        //error_log(print_r($return, true));
        //if( ! $return )
         //   return false;
        if ($return_url == false) {
            $return = $this->getDataFilter($filter_flight_number, $filter_airline, $return);
        }
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
