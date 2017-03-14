<?php
/**
 * Created by PhpStorm.
 * User: romansolomashenko
 * Date: 14.03.17
 * Time: 1:16 PM
 */

namespace app\includes\models\site\shortcodes\hotels;

use \app\includes\models\site\TPHotelShortcodeModel;
use \app\includes\common\TPCurrencyUtils;
use \app\includes\common\TPLang;

class TPHotelsSelectionsShortcodeModel extends TPHotelShortcodeModel
{

    /**
     * Параметры запроса
     *  check_in — дата заселения;
     *  check_out — дата выселения;
     *  currency — валюта ответа;
     *  language — язык ответа;
     *  limit — ограничение на выводимое количество отелей;
     *  type — типы отелей из запроса /tp/public/available_selections.json (см. ниже);
     *  id — id города (из запроса Города).
     * @param array $args
     */
    public function get_data($args = array())
    {
        // TODO: Implement get_data() method.
        $defaults = array(
            'id' => false,
            'check_in' => false,
            'check_out' => false,
            'currency' => TPCurrencyUtils::getDefaultCurrency(),
            'language' => TPLang::getLang(),
            'limit' => 5,
            'type' => 'popularity',
            'return_url' => false
        );
        extract( wp_parse_args( $args, $defaults ), EXTR_SKIP );
        $attr = array(
            'id' => $id,
            'check_in' => $check_in,
            'check_out' => $check_out,
            'currency' => $currency,
            'language' => $language,
            'limit' => $limit,
            'type' => $type,
            'return_url' => $return_url
        );

        $cacheKey = "hotel_1_selections_discount_{$id}{$currency}";

        if($this->cacheSecund() && $return_url == false){
            if ( false === ($rows = get_transient($this->cacheKey($cacheKey)))) {
                $return = self::$TPRequestApi->getHotelSelection($attr);
                $rows = array();
                $cacheSecund = 0;
                if( ! $return ) {
                    $rows = array();
                    $cacheSecund = $this->cacheEmptySecund();
                } else {
                    $rows = $return;
                    $cacheSecund = $this->cacheSecund();
                }
                set_transient( $this->cacheKey($cacheKey) , $rows, $cacheSecund);
            }

        } else {
            $rows = self::$TPRequestApi->getHotelSelection($attr);
            if (!$rows){
                return false;
            }
        }
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
            'language' => TPLang::getLang(),
        );
        extract( wp_parse_args( $args, $defaults ), EXTR_SKIP );

        if ($return_url == 1){
            $return_url = true;
        }

        $check_in = date('Y-m-d');
        $check_out = $this->getCheckOut($day);

        $return = $this->get_data(array(
            'id' => $city,
            'check_in' => $check_in,
            'check_out' => $check_out,
            'currency' => $currency,
            'language' => $language,
            'limit' => $number_results,
            'type' => $type,
            'return_url' => $return_url
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

        );


    }


}