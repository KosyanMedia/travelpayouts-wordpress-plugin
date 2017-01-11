<?php

/**
 * Created by PhpStorm.
 * User: romansolomashenko
 * Date: 10.01.17
 * Time: 8:52 PM
 */
namespace app\includes\models\site\shortcodes\hotels;

use \app\includes\models\site\TPHotelShortcodeModel;
use \app\includes\common\TPCurrencyUtils;

class TPCostLivingCityWeekendShortcodeModel extends TPHotelShortcodeModel
{

    public function get_data($args = array())
    {
        // TODO: Implement get_data() method.
        $defaults = array(
            'location' => false,
            'check_in' => false,
            'check_out' => false,
            'location_id' => false,
            'hotel_id' => false,
            'hotel' => false,
            'adults' => false,
            'children' => false,
            'infants' => false,
            'limit' => false,
            'currency' => TPCurrencyUtils::getDefaultCurrency(),
            'return_url' => false
        );
        extract( wp_parse_args( $args, $defaults ), EXTR_SKIP );
        /*if($this->cacheSecund()){
            if ( false === ($rows = get_transient($this->cacheKey('14'.$one_way.$currency, $destination)))) {
                $return = \app\includes\TPPlugin::$TPRequestApi->get_latest($attr);


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

                set_transient( $this->cacheKey('14'.$one_way.$currency, $destination) , $rows, $cacheSecund);
            }
        }else{
            $return = \app\includes\TPPlugin::$TPRequestApi->get_latest($attr);
            if( ! $return )
                return false;
            $rows = array();
            $rows = $return;
            $rows = $this->iataAutocomplete($rows, 13);
        }*/
        $rows = self::$TPRequestApi->getCache(array(
            'location' => $location,
            'check_in' => $check_in,
            'check_out' => $check_out,
            'location_id' => $location_id,
            'hotel_id' => $hotel_id,
            'hotel' => $hotel,
            'adults' => $adults,
            'children' => $children,
            'infants' => $infants,
            'limit' => $limit,
            'currency' => $currency,
            'return_url' => $return_url
        ));
        return $rows;
    }

    public function getDataTable($args = array()){
        $defaults = array(
            'location' => false,
            'check_in' => false,
            'check_out' => false,
            'location_id' => false,
            'hotel_id' => false,
            'hotel' => false,
            'adults' => false,
            'children' => false,
            'infants' => false,
            'limit' => false,
            'currency' => TPCurrencyUtils::getDefaultCurrency(),
            'return_url' => false
        );
        extract( wp_parse_args( $args, $defaults ), EXTR_SKIP );

        if ($return_url == 1){
            $return_url = true;
        }

        $return = $this->get_data(array(
            'location' => $location,
            'check_in' => $check_in,
            'check_out' => $check_out,
            'location_id' => $location_id,
            'hotel_id' => $hotel_id,
            'hotel' => $hotel,
            'adults' => $adults,
            'children' => $children,
            'infants' => $infants,
            'limit' => $limit,
            'currency' => $currency,
            'return_url' => $return_url
        ));


        return array(
            'rows' => $return,
        );


    }
}