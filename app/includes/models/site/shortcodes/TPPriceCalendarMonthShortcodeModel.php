<?php
/**
 * Created by PhpStorm.
 * User: freeman
 * Date: 13.08.15
 * Time: 12:05
 */
namespace app\includes\models\site\shortcodes;
class TPPriceCalendarMonthShortcodeModel extends \app\includes\models\site\TPShortcodesChacheModel{
    /**
     * @param array $args
     * @return array|bool
     */
    public function get_data($args = array())
    {
        // TODO: Implement get_data() method.
        extract($args, EXTR_SKIP);
        $attr =  array(
            'origin' => $origin,
            'destination' => $destination,
            'currency' => $currency
        );
        $name_method = "***************".__METHOD__."***************";
        if(TPOPlUGIN_ERROR_LOG)
            error_log($name_method);
        $method = __CLASS__." -> ". __METHOD__." -> ".__LINE__
            ." 1. Цены на месяц по направлению, в одну сторону  ";
        if(TPOPlUGIN_ERROR_LOG)
            error_log($method);
        if($this->cacheSecund()) {
            if(TPOPlUGIN_ERROR_LOG)
                error_log("{$method} cache");
            if (false === ($return = get_transient($this->cacheKey('1'.$currency,
                    $origin.$destination)))) {
                if(TPOPlUGIN_ERROR_LOG)
                    error_log("{$method} cache false");
                $return = \app\includes\TPPlugin::$TPRequestApi->get_price_mounth_calendar($attr);
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
                    $origin.$destination) , $return, $cacheSecund);
            }
        }else{
            $return = \app\includes\TPPlugin::$TPRequestApi->get_price_mounth_calendar($attr);
            if( ! $return )
                return false;
            $return = $this->iataAutocomplete($return, 1);
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
            'subid' => ''
        );
        extract( wp_parse_args( $args, $defaults ), EXTR_SKIP );
        $return = $this->get_data(array(
            'origin' => $origin,
            'destination' => $destination,
            'currency' => $currency
        ));
        //if( ! $return )
        //    return false;
        $rows = array();
        if($return){
            switch($stops){
                case 0:
                    $rows = $return;
                    break;
                case 1:
                    foreach($return as $value){
                        if($value['number_of_changes'] <= 1){
                            $rows[] = $value;
                        }
                    }
                    break;
                case 2:
                    foreach($return as $value){
                        if($value['number_of_changes'] == 0){
                            $rows[] = $value;
                        }
                    }
                    break;
            }
        }
        return array(
            'rows' => $rows,//$rows,//array()
            'type' => 1,
            'origin' => $this->iataAutocomplete($origin, 0),
            'destination' => $this->iataAutocomplete($destination, 0, 'destination'),
            'title' => $title,
            'origin_iata' => $origin,
            'destination_iata' => $destination,
            'paginate' => $paginate,
            'off_title' => $off_title,
            'subid' => $subid,
            'currency' => $currency);


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