<?php
/**
 * Created by PhpStorm.
 * User: freeman
 * Date: 13.08.15
 * Time: 12:53
 */
namespace app\includes\models\site\shortcodes;

use \app\includes\models\site\TPFlightShortcodeModel;

class TPInOurCityFlyShortcodeModel extends TPFlightShortcodeModel{
    /**
     * @param array $args
     * @return array|bool|mixed|string
     * @var $NUMBER 14
     */
    public function get_data($args = array())
    {
        // TODO: Implement get_data() method.

        extract( $args, EXTR_SKIP );
        $attr = array(
            'currency' => $currency,
            'destination' => $destination,
            'period_type' => $period_type,
            'trip_class' => $trip_class,
            'limit' => $limit,
            'one_way' => $one_way,
            'return_url' => $return_url
        );
        $name_method = "***************".__METHOD__."***************";
        if(TPOPlUGIN_ERROR_LOG)
            error_log($name_method);
        $method = __CLASS__." -> ". __METHOD__." -> ".__LINE__
            ." 11. Дешевые перелеты в город ";
        if(TPOPlUGIN_ERROR_LOG)
            error_log($method);
        if($this->cacheSecund()  && $return_url == false){
            if(TPOPlUGIN_ERROR_LOG)
                error_log("{$method} cache");
            if ( false === ($rows = get_transient($this->cacheKey('14'.$one_way.$currency, $destination, $widget)))) {
                if(TPOPlUGIN_ERROR_LOG)
                    error_log("{$method} cache false");
                $return = self::$TPRequestApi->get_latest($attr);
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

                set_transient( $this->cacheKey('14'.$one_way.$currency, $destination, $widget) , $rows, $cacheSecund);
            }
        }else{
            $return = self::$TPRequestApi->get_latest($attr);
            if( ! $return )
                return false;
            if ($return_url == false) {
                $rows = array();
                $rows = $return;
                $rows = $this->iataAutocomplete($rows, 13);
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
            'currency' =>  $this->typeCurrency(),
            'destination' => false,
            'period_type' => \app\includes\TPPlugin::$options['shortcodes']['14']['period_type'],
            'one_way' => false,
            'limit' => \app\includes\TPPlugin::$options['shortcodes']['14']['limit'],
            'trip_class' => 0, 'title' => '',
            'stops' => \app\includes\TPPlugin::$options['shortcodes']['14']['transplant'],
            'paginate' => true,
            'off_title' => '',
            'subid' => '',
            'return_url' => false,
            'widget' => 0,
            'host' => ''
        );
        extract(wp_parse_args($args, $defaults), EXTR_SKIP);
        if ($return_url == 1){
            $return_url = true;
        }
        $rows = $this->get_data(array(
            'currency' => $currency,
            'destination' => $destination,
            'period_type' => $period_type,
            'trip_class' => $trip_class,
            'limit' => $limit,
            'one_way' => $one_way,
            'return_url' => $return_url,
            'widget' => $widget
        ));
        //if( ! $rows )
         //   return false;
        if ($return_url == false) {
            $rows = $this->sortTransfers(13, $rows, $stops);
        }

        return array(
            'rows' => $rows,
            'destination' => $this->iataAutocomplete($destination, 0, 'destination'),
            'type' => 14,
            'title' => $title,
            'paginate' => $paginate,
            'one_way' => $one_way,
            'off_title' => $off_title,
            'subid' => $subid,
            'currency' => $currency,
            'return_url' => $return_url,
            'host' => $host
        );


    }
    public function getMaxPrice($args = array())
    {
        $defaults = array(
            'currency' =>  $this->typeCurrency(),
            'destination' => false,
            'period_type' => \app\includes\TPPlugin::$options['shortcodes']['14']['period_type'],
            'one_way' => false,
            'limit' => \app\includes\TPPlugin::$options['shortcodes']['14']['limit'],
            'trip_class' => 0, 'title' => '',
            'stops' => \app\includes\TPPlugin::$options['shortcodes']['14']['transplant'],
            'paginate' => true,
            'off_title' => '',
            'subid' => ''
        );
        extract(wp_parse_args($args, $defaults), EXTR_SKIP);
        $return = $this->get_data(array(
            'currency' => $currency,
            'destination' => $destination,
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
            'currency' =>  $this->typeCurrency(),
            'destination' => false,
            'period_type' => \app\includes\TPPlugin::$options['shortcodes']['14']['period_type'],
            'one_way' => false,
            'limit' => \app\includes\TPPlugin::$options['shortcodes']['14']['limit'],
            'trip_class' => 0, 'title' => '',
            'stops' => \app\includes\TPPlugin::$options['shortcodes']['14']['transplant'],
            'paginate' => true,
            'off_title' => '',
            'subid' => ''
        );
        extract(wp_parse_args($args, $defaults), EXTR_SKIP);
        $return = $this->get_data(array(
            'currency' => $currency,
            'destination' => $destination,
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
