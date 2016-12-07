<?php
/**
 * Created by PhpStorm.
 * User: freeman
 * Date: 13.08.15
 * Time: 12:47
 */
namespace app\includes\models\site\shortcodes;
class TPFromOurCityFlyShortcodeModel extends \app\includes\models\site\TPShortcodesChacheModel{

    public function get_data($args = array())
    {
        // TODO: Implement get_data() method.

        extract($args, EXTR_SKIP );
        $attr = array(
            'currency' => $currency,
            'origin' => $origin,
            'period_type' => $period_type,
            'trip_class' => $trip_class,
            'limit' => $limit,
            'one_way' => $one_way
        );
        $name_method = "***************".__METHOD__."***************";
        if(TPOPlUGIN_ERROR_LOG)
            error_log($name_method);
        $method = __CLASS__." -> ". __METHOD__." -> ".__LINE__
            ." 10. Дешевые перелеты из города ";
        if(TPOPlUGIN_ERROR_LOG)
            error_log($method);
        if(TPOPlUGIN_ERROR_LOG)
            error_log($method." cacheKey = ".$one_way);

        if($this->cacheSecund()){
            if(TPOPlUGIN_ERROR_LOG)
                error_log("{$method} cache");
            if ( false === ($rows = get_transient($this->cacheKey('13'.$one_way.$currency, $origin)))) {
                if(TPOPlUGIN_ERROR_LOG)
                    error_log("{$method} cache false");
                $return = \app\includes\TPPlugin::$TPRequestApi->get_latest($attr);
                if(TPOPlUGIN_ERROR_LOG)
                    error_log("{$method} cache false ".print_r($return, true));
                //if( ! $return )
                //    return false;
                $rows = array();
                $cacheSecund = 0;
                if( ! $return ) {
                    $rows = array();
                    $cacheSecund = $this->cacheEmptySecund();
                } else {
                    $rows = $return;
                    $rows = $this->iataAutocomplete($rows, 13);
                    $cacheSecund = $this->cacheSecund();
                }
                if(TPOPlUGIN_ERROR_LOG)
                    error_log("{$method} cache secund = ".$cacheSecund);

                set_transient( $this->cacheKey('13'.$one_way.$currency, $origin) , $rows, $cacheSecund);
            }
        }else{
            $return = \app\includes\TPPlugin::$TPRequestApi->get_latest($attr);
            if( ! $return )
                return false;
            $rows = array();
            $rows = $return;
            $rows = $this->iataAutocomplete($rows, 13);
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
            'currency' => $this->typeCurrency(),
            'destination' => false,
            'period_type' => \app\includes\TPPlugin::$options['shortcodes']['13']['period_type'],
            'one_way' => false,
            'limit' => \app\includes\TPPlugin::$options['shortcodes']['13']['limit'],
            'trip_class' => 0,
            'title' => '',
            'stops' => \app\includes\TPPlugin::$options['shortcodes']['13']['transplant'] ,
            'paginate' => true,
            'off_title' => '',
            'subid' => ''
        );
        extract(wp_parse_args($args, $defaults), EXTR_SKIP);
        $rows = $this->get_data(array(
            'currency' => $currency,
            'origin' => $origin,
            'period_type' => $period_type,
            'trip_class' => $trip_class,
            'limit' => $limit,
            'one_way' => $one_way
        ));
        //if( ! $rows )
         //   return false;

        $rows_sort = array();
        if($rows){
            switch($stops){
                case 0:
                    $rows_sort = $rows;
                    break;
                case 1:
                    foreach($rows as $value){
                        if($value['number_of_changes'] <= 1){
                            $rows_sort[] = $value;
                        }
                    }
                    break;
                case 2:
                    foreach($rows as $value){
                        if($value['number_of_changes'] == 0){
                            $rows_sort[] = $value;
                        }
                    }
                    break;
            }
        }

        return array(
            'rows' => $rows_sort,
            'origin' => $this->iataAutocomplete($origin, 0),
            'type' => 13,
            'title' => $title,
            'paginate' => $paginate,
            'one_way' => $one_way,
            'off_title' => $off_title,
            'subid' => $subid,
            'currency' => $currency
        );


    }
    public function getMaxPrice($args = array())
    {
        $defaults = array(
            'currency' => $this->typeCurrency(),
            'destination' => false,
            'period_type' => \app\includes\TPPlugin::$options['shortcodes']['13']['period_type'],
            'one_way' => false,
            'limit' => \app\includes\TPPlugin::$options['shortcodes']['13']['limit'],
            'trip_class' => 0,
            'title' => '',
            'stops' => \app\includes\TPPlugin::$options['shortcodes']['13']['transplant'] ,
            'paginate' => true,
            'off_title' => '',
            'subid' => ''
        );
        extract(wp_parse_args($args, $defaults), EXTR_SKIP);
        $return = $this->get_data(array(
            'currency' => $currency,
            'origin' => $origin,
            'period_type' => $period_type,
            'trip_class' => $trip_class,
            'limit' => $limit,
            'one_way' => $one_way
        ));
        if( ! $return )
            return false;
        $rows = array_column($return, 'value');
        return array('price' => max($rows), 'currency' => $currency);
    }
    public function getMinPrice($args = array())
    {
        $defaults = array(
            'currency' => $this->typeCurrency(),
            'destination' => false,
            'period_type' => \app\includes\TPPlugin::$options['shortcodes']['13']['period_type'],
            'one_way' => false,
            'limit' => \app\includes\TPPlugin::$options['shortcodes']['13']['limit'],
            'trip_class' => 0,
            'title' => '',
            'stops' => \app\includes\TPPlugin::$options['shortcodes']['13']['transplant'] ,
            'paginate' => true,
            'off_title' => '',
            'subid' => ''
        );
        extract(wp_parse_args($args, $defaults), EXTR_SKIP);
        $return = $this->get_data(array(
            'currency' => $currency,
            'origin' => $origin,
            'period_type' => $period_type,
            'trip_class' => $trip_class,
            'limit' => $limit,
            'one_way' => $one_way
        ));
        if( ! $return )
            return false;
        $rows = array_column($return, 'value');
        return array('price' => min($rows), 'currency' => $currency);
    }
}