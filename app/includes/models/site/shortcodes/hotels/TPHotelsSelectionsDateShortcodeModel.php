<?php
/**
 * Подборки отелей на даты
 * Created by PhpStorm.
 * User: romansolomashenko
 * Date: 14.03.17
 * Time: 3:37 PM
 */

namespace app\includes\models\site\shortcodes\hotels;

use \app\includes\models\site\TPHotelShortcodeModel;
use \app\includes\common\TPCurrencyUtils;
use \app\includes\common\TPLang;
use app\includes\TPPlugin;

class TPHotelsSelectionsDateShortcodeModel  extends TPHotelShortcodeModel
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


        /*
         *  'check_in' => $check_in,
            'check_out' => $check_out,
         */
        $check_in = date('Y-m-d', strtotime($check_in));
        $check_out = date('Y-m-d', strtotime($check_out));

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

        $cacheKey = "hotel_1_selections_date_{$currency}_{$language}_{$limit}_{$type}_{$id}";

        if($this->cacheSecund() && $return_url == false){
            if ( false === ($rows = get_transient($this->cacheKey($cacheKey, '', $widget)))) {
                $return = self::$TPRequestApi->getHotelSelection($attr);
                $rows = array();
                $cacheSecund = 0;
                if( ! $return ) {
                    $rows = array();
                    $cacheSecund = $this->cacheEmptySecund();
                } else {
                    $rows = $return;
                    $rows = array_shift($rows);
                    $cacheSecund = $this->cacheSecund('hotel');
                }
                set_transient( $this->cacheKey($cacheKey, '', $widget) , $rows, $cacheSecund);
            }

        } else {
            $rows = self::$TPRequestApi->getHotelSelection($attr);
            if (!$rows){
                return false;
            }
            if ($return_url == false){
                $rows = array_shift($rows);
            }

        }

        //error_log('Date');
        //error_log(print_r($rows, true));

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
	    $linkWithoutDates = isset(TPPlugin::$options['shortcodes_hotels'][2]['link_without_dates']) ? 'true' : 'false';
        $defaults = array(
            'city' => false,
            'city_label' => false,
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
            'currency' => TPCurrencyUtils::getCurrency(),
            'return_url' => false,
            'language' => TPLang::getLang(),
            'type_selections' => 'popularity',
            'type_selections_label_ru' => '',
            'type_selections_label_en' => '',
            'type_selections_label' => '',
            'subid' => '',
            'check_in' => date('d-m-Y'),
            'check_out' => date('d-m-Y', time()+DAY_IN_SECONDS),
            'link_without_dates' => $linkWithoutDates,
            'widget' => 0
        );
        extract( wp_parse_args( $args, $defaults ), EXTR_SKIP );

        if ($return_url == 1){
            $return_url = true;
        }

        //$check_in = date('Y-m-d');
        //$check_out = $this->getCheckOut($day);

        $return = $this->get_data(array(
            'id' => $city,
            'check_in' => $check_in,
            'check_out' => $check_out,
            'currency' => $currency,
            'language' => $language,
            'limit' => $number_results,
            'type' => $type_selections,
            'return_url' => $return_url,
            'widget' => $widget
        ));


        $dates_label = '';
        $dates_label .= date('d.m', strtotime($check_in));
        $dates_label .= '-';
        $dates_label .= date('d.m', strtotime($check_out));

        return array(
            'rows' => $return,
            'title' => $title,
            'city' => $city,
            'city_label' => $city_label,
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
            'shortcode' => 2,
            'type_selections' => $type_selections,
            'type_selections_label_ru' => $type_selections_label_ru,
            'type_selections_label_en' => $type_selections_label_en,
            'type_selections_label' => $type_selections_label,
            'dates_label' => $dates_label,
            'paginate' => $paginate,
            'link_without_dates' => $link_without_dates,
        );


    }
}