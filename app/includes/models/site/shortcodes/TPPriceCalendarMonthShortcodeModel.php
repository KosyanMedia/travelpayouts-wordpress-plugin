<?php
/**
 * Created by PhpStorm.
 * User: freeman
 * Date: 13.08.15
 * Time: 12:05
 * 1. Цены на месяц по направлению, в одну сторону
 */
namespace app\includes\models\site\shortcodes;
use \app\includes\models\site\TPFlightShortcodeModel;
class TPPriceCalendarMonthShortcodeModel extends TPFlightShortcodeModel{
    /**
     * @param array $args
     * @return array|bool
     * @var $NUMBER 1
     */
    public function get_data($args = array())
    {
        // TODO: Implement get_data() method.
        extract($args, EXTR_SKIP);
        $attr =  array(
            'origin' => $origin,
            'destination' => $destination,
            'currency' => $currency,
            'return_url' => $return_url
        );
        $name_method = "***************".__METHOD__."***************";
        if(TPOPlUGIN_ERROR_LOG)
            error_log($name_method);
        $method = __CLASS__." -> ". __METHOD__." -> ".__LINE__
            ." 1. Цены на месяц по направлению, в одну сторону  ";
        if(TPOPlUGIN_ERROR_LOG)
            error_log($method);

        if($this->cacheSecund() && $return_url == false) {
            if(TPOPlUGIN_ERROR_LOG)
                error_log("{$method} cache");
            if (false === ($return = get_transient($this->cacheKey('1'.$currency,
                    $origin.$destination, $widget)))) {
                if(TPOPlUGIN_ERROR_LOG)
                    error_log("{$method} cache false");
                $return = self::$TPRequestApi->get_price_mounth_calendar($attr);
                if(TPOPlUGIN_ERROR_LOG)
                    error_log("{$method} cache false ".print_r($return, true));
                //if( ! $return )
                //    return false;
                $cacheSecund = 0;
                if( ! $return ) {
                    $return = array();
                    $cacheSecund = $this->cacheEmptySecund();
                } else {
                    $return = $this->iataAutocomplete($return, 1);
                    $cacheSecund = $this->cacheSecund();
                }
                if(TPOPlUGIN_ERROR_LOG)
                    error_log("{$method} cache secund = ".$cacheSecund);

                set_transient( $this->cacheKey('1'.$currency,
                    $origin.$destination, $widget) , $return, $cacheSecund);
            }
        }else{
            $return = self::$TPRequestApi->get_price_mounth_calendar($attr);
            if( ! $return )
                return false;
            if ($return_url == false) {
                $return = $this->iataAutocomplete($return, 1);
            }

        }
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
            'title' => '',
            'stops' => \app\includes\TPPlugin::$options['shortcodes']['1']['transplant'],
            'paginate' => true,
            'off_title' => '',
            'subid' => '',
            'return_url' => false,
            'widget' => 0,
            'host' => ''
        );
        //error_log(print_r($args, true));
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
        //if( ! $return )
        //    return false;
        if ($return_url == false) {
            $return = $this->sortTransfers(1, $return, $stops);
        }

        return array(
            'rows' => $return,//$rows,//array()
            'type' => 1,
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
    public function getMaxPrice($args = array())
    {
        $defaults = array(
            'origin' => false,
            'destination' => false,
            'currency' => $this->typeCurrency()
        );
        extract( wp_parse_args( $args, $defaults ), EXTR_SKIP );
        $return = $this->get_data(array(
            'origin' => $origin,
            'destination' => $destination,
            'currency' => $currency
        ));
        if( ! $return )
            return false;
        $rows = array_column($return, 'value');
        return array('price' => max($rows), 'currency' => $currency);
    }
    public function getMinPrice($args = array())
    {
        $defaults = array(
            'origin' => false,
            'destination' => false,
            'currency' => $this->typeCurrency()
        );
        extract( wp_parse_args( $args, $defaults ), EXTR_SKIP );
        $return = $this->get_data(array(
            'origin' => $origin,
            'destination' => $destination,
            'currency' => $currency
        ));
        if( ! $return )
            return false;
        $rows = array_column($return, 'value');
        return array('price' => min($rows), 'currency' => $currency);
    }
}
