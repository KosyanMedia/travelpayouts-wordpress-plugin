<?php
/**
 * Created by PhpStorm.
 * User: freeman
 * Date: 13.08.15
 * Time: 12:27
 */
namespace app\includes\models\site\shortcodes;
class TPCheapestTicketEachDayMonthShortcodeModel extends \app\includes\models\site\TPShortcodesChacheModel{

    public function get_data($args = array())
    {
        // TODO: Implement get_data() method.
        extract($args, EXTR_SKIP );
        $attr = array(
            'origin' => $origin,
            'destination' => $destination,
            'currency' => $currency
        );
        $name_method = "***************".__METHOD__."***************";
        if(TPOPlUGIN_ERROR_LOG)
            error_log($name_method);
        $method = __CLASS__." -> ". __METHOD__." -> ".__LINE__
            ." 4. Самые дешевые билеты по направлению в этом месяце ";
        if(TPOPlUGIN_ERROR_LOG)
            error_log($method);
        if($this->cacheSecund()) {
            if(TPOPlUGIN_ERROR_LOG)
                error_log("{$method} cache");
            if (false === ($rows = get_transient($this->cacheKey('5'.$currency,
                    $origin.$destination)))) {
                if(TPOPlUGIN_ERROR_LOG)
                    error_log("{$method} cache -> false");
                $return = (array) \app\includes\TPPlugin::$TPRequestApi->get_calendar($attr);
                if(TPOPlUGIN_ERROR_LOG)
                    error_log("{$method} cache false ".print_r($return, true));
                if( ! $return )
                    return false;
                $rows = array();
                $cacheSecund = 0;
                if( ! $return ) {
                    $rows = array();
                    $cacheSecund = $this->cacheEmptySecund();
                } else {
                    $rows = $this->iataAutocomplete($this->tpSortCheapestTicketEachDayMonth($return, date('Y-m')), 5);
                    $cacheSecund = $this->cacheSecund();
                }
                if(TPOPlUGIN_ERROR_LOG)
                    error_log("{$method} cache secund = ".$cacheSecund);

                set_transient( $this->cacheKey('5'.$currency,
                    $origin.$destination) , $rows, $cacheSecund);
            }
        }else{
            $return = (array) \app\includes\TPPlugin::$TPRequestApi->get_calendar($attr);
            if( ! $return )
                return false;
            $rows = array();
            $rows = $this->iataAutocomplete($this->tpSortCheapestTicketEachDayMonth($return, date('Y-m')), 5);
        }
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
            'currency' => $this->typeCurrency(),
            'title' =>'' ,
            'paginate' => true,
            'stops' => \app\includes\TPPlugin::$options['shortcodes']['5']['transplant'],
            'off_title' => '',
            'subid' => '',
            'filter_flight_number' => false,
            'filter_airline' => false
            );
        extract( wp_parse_args( $args, $defaults ), EXTR_SKIP );
        $rows = $this->get_data(array(
            'origin' => $origin,
            'destination' => $destination,
            'currency' => $currency,
        ));
        //if( ! $rows )
        //    return false;

        $rows_sort = array();
        if($rows){
            switch($stops){
                case 0:
                    $rows_sort = $rows;
                    break;
                case 1:
                    foreach($rows as $value){
                        if($value['transfers'] <= 1){
                            $rows_sort[] = $value;
                        }
                    }
                    break;
                case 2:
                    foreach($rows as $value){
                        if($value['transfers'] == 0){
                            $rows_sort[] = $value;
                        }
                    }
                    break;
            }
        }
        $rows_sort = $this->getDataFilter($filter_flight_number, $filter_airline, $rows_sort);
        return array(
            'rows' => $rows_sort,
            'origin' => $this->iataAutocomplete($origin, 0),
            'destination' => $this->iataAutocomplete($destination, 0, 'destination'),
            'type' => 5,
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