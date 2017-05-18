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

        $cacheKey = "hotel_1_{$location}{$currency}";

        /*if($this->cacheSecund()){
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



        $hotelCache = $this->getHotelCache($attr, $cacheKey);
        if ($return_url == true) return $hotelCache;
        if ($hotelCache == false || count($hotelCache) < 1) return false;


        //$hotelId = array_column($return, 'hotelId');
       // error_log(print_r($hotelId, true));
        //error_log(count($hotelId));
        //$hotelList = self::$TPRequestApi->getHotelList($attr);

        //$hotelListId = array_column($hotelList['hotels'], 'id');
        //error_log(print_r($hotelListId, true));
        //$strcasecmp = array_uintersect_assoc($hotelId, $hotelList['hotels'], array(&$this, 'strcasecmp'));
        tpErrorLog('$hotelCache count == '.count($hotelCache), __CLASS__, __METHOD__,__LINE__);
        $hotelData = array();
        $count = 0;
       /* foreach ($hotelId as $id){
            foreach ($hotelList['hotels'] as $hotel){
                $count++;
                if ($id == $hotel['id']){
                    //error_log(print_r($hotel, true));
                    $hotelData[$id] = $hotel;
                    break;
                }
            }
        }
        error_log($count);
        error_log(count($hotelData));*/
        //error_log(print_r($hotelData, true));
        //error_log(print_r($hotelList['hotels'], true));
//hotelId == id
        //return $return;
    }

    public function strcasecmp($a, $b){
        error_log(print_r($a, true));
        error_log(print_r($b, true));

    }

    /**
     * @param $attr
     * @param $cacheKey
     * @return bool
     */
    public function getHotelCache($attr, $cacheKey){
        $cacheKey .= 'hotel_cache';
        if($this->cacheSecund() && $attr['return_url'] == false){
            tpErrorLog('hotel cache', __CLASS__, __METHOD__,__LINE__);
            if ( false === ($rows = get_transient($this->cacheKey($cacheKey)))) {
                tpErrorLog('set hotel cache', __CLASS__, __METHOD__,__LINE__);
                $return = self::$TPRequestApi->getCache($attr);
                $rows = array();
                $cacheSecund = 0;
                if( ! $return ) {
                    $rows = array();
                    //$cacheSecund = $this->cacheEmptySecund();
                    $cacheSecund = 1;
                } else {
                    $rows = $return;
                    $cacheSecund = $this->cacheSecund();
                }
                set_transient( $this->cacheKey($cacheKey) , $rows, $cacheSecund);
            }

        } else {
            tpErrorLog('hotel cache disabled', __CLASS__, __METHOD__,__LINE__);
            $rows = self::$TPRequestApi->getCache($attr);
            if (!$rows){
                return false;
            }
        }
        return $rows;
    }
    /**
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

        $check_in = date('Y-m-d', strtotime("next Saturday + 1 week"));
        $check_out = date('Y-m-d', strtotime("next Sunday + 1 week"));

        $return = $this->get_data(array(
            //'rows' => $return,
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