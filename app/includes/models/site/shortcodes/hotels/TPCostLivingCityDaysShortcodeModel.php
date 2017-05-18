<?php
/**
 * Created by PhpStorm.
 * User: romansolomashenko
 * Date: 19.01.17
 * Time: 4:59 PM
 */

namespace app\includes\models\site\shortcodes\hotels;

use \app\includes\models\site\TPHotelShortcodeModel;
use \app\includes\common\TPCurrencyUtils;

class TPCostLivingCityDaysShortcodeModel extends TPHotelShortcodeModel
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
        $attr = array(
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
        );

        /*$cacheKey = "hotel_3_{$location}{$currency}".(int)$return_url;

        if($this->cacheSecund()){
            if ( false === ($rows = get_transient($this->cacheKey($cacheKey)))) {

                $return = self::$TPRequestApi->getCache($attr);
                $rows = array();
                $cacheSecund = 0;
                if( ! $return ) {
                    $rows = array();
                    $cacheSecund = $this->cacheEmptySecund();
                } else {
                    $rows = $return;
                    //$rows = $this->iataAutocomplete($rows, 13);
                    $cacheSecund = $this->cacheSecund();
                }

                set_transient( $this->cacheKey($cacheKey) , $rows, $cacheSecund);
            }
        }else{
            $return = self::$TPRequestApi->getCache($attr);
            if( ! $return )
                return false;
            $rows = array();
            $rows = $return;
            //$rows = $this->iataAutocomplete($rows, 13);
        }*/

        $rows = self::$TPRequestApi->getCache($attr);

        return $rows;
    }

    /**
     * city="12153"
     * title="Test title"
     * paginate=true
     * off_title=false
     * type="all"
     * day="3"
     * star="all"
     * rating_from="7"
     * rating_to="10"
     * distance_from="0"
     * distance_to="3"
     * number_results="20"
     *
     * @param array $args
     * @return array
     */
    public function getDataTable($args = array()){
        $defaults = array(
            'city' => false,
            'title' => '',
            'paginate' => true,
            'off_title' => '',
            'type' => 'all',
            'day' => 3,
            'star' => 'all',
            'rating_from' => 7,
            'rating_to' => 10,
            'distance_from' => 0,
            'distance_to' => 3,
            'number_results' => 20,
            'currency' => TPCurrencyUtils::getDefaultCurrency(),
            'return_url' => false,
            'subid' => '',
        );
        extract( wp_parse_args( $args, $defaults ), EXTR_SKIP );

        if ($return_url == 1){
            $return_url = true;
        }

        $check_in = date('Y-m-d');
        $check_out = $this->getCheckOut($day);

        $return = $this->get_data(array(
            'location_id' => $city,
            'check_in' => $check_in,
            'check_out' => $check_out,
            'star' => $star,
            'rating_from' => $rating_from,
            'rating_to' => $rating_from,
            'distance_from' => $distance_from,
            'distance_to' => $distance_to,
            'limit' => $number_results,
            'currency' => $currency,
            'return_url' => $return_url,
        ));


        return array(
            'rows' => $return,
            'title' => $title,
            'city' => $city,
            'off_title' => $off_title,
            'location_id' => $city,
            'check_in' => $check_in,
            'check_out' => $check_out,
            'star' => $star,
            'rating_from' => $rating_from,
            'rating_to' => $rating_from,
            'distance_from' => $distance_from,
            'distance_to' => $distance_to,
            'limit' => $number_results,
            'currency' => $currency,
            'return_url' => $return_url,
            'subid' => $subid,

        );


    }




}