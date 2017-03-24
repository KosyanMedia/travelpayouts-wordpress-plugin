<?php
/**
 * Created by PhpStorm.
 * User: romansolomashenko
 * Date: 04.01.17
 * Time: 2:16 PM
 */

namespace app\includes\common;

use \app\includes\common\TPLang;

class TPRequestApiHotel extends TPRequestApi
{
    const TP_API_URL = 'https://engine.hotellook.com/api/v2';
    const TP_API_URL_V1 = 'https://yasen.hotellook.com/tp/v1';

    private static $instance = null;

    public static function getInstance()
    {
        // TODO: Implement getInstance() method.
        if (null === self::$instance) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    public static function getApiUrl(){
        return self::TP_API_URL;
    }
    public static function getApiUrlV1(){
        return self::TP_API_URL_V1;
    }

    /**
     * https://support.travelpayouts.com/hc/ru/articles/115000343268#hotellist
     * Запрос «Hotels list»
     * locationId — id локации, обязательный параметр.
     * @param array $args
     * @return array|bool
     */
    public function getHotelList($args = array()){
        $defaults = array(
            'location_id' => false,
            'return_url' => false
        );
        extract( wp_parse_args( $args, $defaults ), EXTR_SKIP );
        if (!$location_id || empty($location_id)){
            echo $this->get_error('location');
            return false;
        } else {
            $location_id = "locationId={$location_id}";
        }
        $token = 'token=' .$this->getToken();
        $requestURL = self::getApiUrl()."/static/hotels.json?{$location_id}&{$token}";
        if ($return_url == true){
            return $requestURL;
        }
        return $this->request($requestURL);
    }


    /**
     * https://support.travelpayouts.com/hc/ru/articles/115000343268#hotellist
     * @param array $args
     * Отели Города по цене ОТ-ДО
     * Запрос «Hotels list»
     * Параметры запроса
     * locationId — id локации, обязательный параметр.
     * token — ваш партнерский токен.
     */
    public function getHotels($args = array()){
        $defaults = array(
            'location_id' => false,
            'return_url' => false
        );
        extract( wp_parse_args( $args, $defaults ), EXTR_SKIP );
        if (!$location_id || empty($location_id)){
            $location_id = "";
        } else {
            $location_id = "locationId={$location_id}";
        }
        $token = 'token=' .$this->getToken();
        $requestURL = self::getApiUrl()."/static/hotels.json?{$location_id}&{$token}";
        if ($return_url == true){
            return $requestURL;
        }
        return $this->request($requestURL);
    }

    /**
     * https://support.travelpayouts.com/hc/ru/articles/115000343268#price
     * Вывод стоимости проживания в отелях
     * @param array $args
     * location — имя локации (может использоваться IATA код локации);
     * checkIn — дата заселения;
     * checkOut — дата выселения;
     * locationId — id локации (может использоваться вместо location);
     * hotelId — id отеля;
     * hotel — имя отеля (при вводе имени обязательно указывать location или locationId;
     * adults — количество гостей (по умолчанию 2);
     * children — число детей (возраст от 2 до 18 лет);
     * infants — число младенцев (возраст от 0 до 2 лет);
     * limit — количество отелей. Если данный параметр используется в запросе без указания точного id или
     * названия отеля, то действует следующее правило:
     *      limit = 4 (значение по умолчанию) — вернется по одному отелю каждой категории (звездности);
     *      limit = 5 — вернется два пятизвездочных отеля и по одному других категорий;
     *      limit = 6 — по два 5-ти и 4-х звездочных отеля и остальные по одному;
     *      limit = 7 — по два 5, 4 и 3-х звездочных отеля и один двухзвездочный;
     *      limit = 8 — всех по два. И так далее, с ростом параметра по очереди увеличивается количество отелей каждой
     *                  звездности. Если отелей указанной звездности больше нет, то в выдачу начнут попадать отели 1 и 0
     *                  звездности по такому же правилу.
     * customerIp — параметр используется для указания ip пользователя, если запрос отправляется не напрямую,
     * а через какое-либо серверное проксирование.
     */
    public function getCache($args = array()){
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
        if (!$location || empty($location)){
            //echo $this->get_error('location');
            $location = "";
            //return false;
        } else {
            $location = "location={$location}";
        }
        if (!$check_in || empty($check_in)){
            echo $this->get_error('check_in');
            $check_in = "";
            return false;
        } else {
            $check_in = "checkIn={$check_in}";
        }
        if (!$check_out || empty($check_out)){
            echo $this->get_error('check_out');
            $check_out = "";
            return false;
        } else {
            $check_out = "checkOut={$check_out}";
        }
        if (!$location_id || empty($location_id)){
            echo $this->get_error('location');
            //$location_id = "";
            return false;
        } else {
            $location_id = "locationId={$location_id}";
        }
        if (!$hotel_id || empty($hotel_id)){
            $hotel_id = "";
        } else {
            $hotel_id = "hotelId={$hotel_id}";
        }
        if (!$hotel || empty($hotel)){
            $hotel = "";
        } else {
            $hotel = "hotel={$hotel}";
        }
        if (!$adults || empty($adults)){
            $adults = "";
        } else {
            $adults = "adults={$adults}";
        }
        if (!$children || empty($children)){
            $children = "";
        } else {
            $children = "children={$children}";
        }
        if (!$infants || empty($infants)){
            $infants = "";
        } else {
            $infants = "infants={$infants}";
        }
        if (!$limit || empty($limit)){
            $limit = "";
        } else {
            $limit = "limit={$limit}";
        }
        if (!$currency || empty($currency)){
            $currency = "";
        } else {
            $currency = "currency={$currency}";
        }

        $token = 'token=' .$this->getToken();

        $requestURL = self::getApiUrl()."/cache.json?{$location_id}&{$check_in}&{$check_out}&{$limit}&{$currency}"
            ."&{$token}";

        if ($return_url == true){
            return $requestURL;
        }

       // return $this->request($requestURL);

        return $this->request($requestURL);
        //return wp_remote_get($requestURL);

    }

    /**
     * https://support.travelpayouts.com/hc/ru/articles/115000343268#hoteltype
     * https://engine.hotellook.com/api/v2/static/hotelTypes.json?language=en&token=УкажитеВашТокен
     */
    public function getHotelsType(){
        return array(
            'ru' => $this->getHotelsTypeRu(),
            'en' => $this->getHotelsTypeEn(),
        );
    }

    /**
     * https://support.travelpayouts.com/hc/ru/articles/115000343268#hoteltype
     * @return mixed
     */
    public function getHotelsTypeRu(){
        $token = 'token=' .$this->getToken();
        $requestURL = self::getApiUrl()."/static/hotelTypes.json?language=ru&{$token}";
        return $this->requestJson($requestURL);
    }

    /**
     * https://support.travelpayouts.com/hc/ru/articles/115000343268#hoteltype
     * @return mixed
     */
    public function getHotelsTypeEn(){
        $token = 'token=' .$this->getToken();
        $requestURL = self::getApiUrl()."/static/hotelTypes.json?language=en&{$token}";
        return $this->requestJson($requestURL);
    }

    /**
     * Подборки отелей
     * https://support.travelpayouts.com/hc/ru/articles/115000343268#hotelcollections
     * @param array $args
     * check_in — дата заселения;
     * check_out — дата выселения;
     * currency — валюта ответа;
     * language — язык ответа;
     * limit — ограничение на выводимое количество отелей;
     * type — типы отелей из запроса /tp/public/available_selections.json (см. ниже); type=popularity
     * id — id города
     */
    public function getHotelSelection($args = array()){
        $defaults = array(
            'id' => false,
            'check_in' => false,
            'check_out' => false,
            'currency' => TPCurrencyUtils::getDefaultCurrency(),
            'language' => TPLang::getLang(),
            'limit' => false,
            'type' => 'all',
            'return_url' => false
        );
        extract( wp_parse_args( $args, $defaults ), EXTR_SKIP );
        if (!$id || empty($id)){
            echo $this->get_error('id');
            $id = "";
            return false;
        } else {
            $id = "&id={$id}";
        }
        if (!$check_in || empty($check_in)){
            //echo $this->get_error('check_in');
            $check_in = "";
            //return false;
        } else {
            $check_in = "&check_in={$check_in}";
        }
        if (!$check_out || empty($check_out)){
            //echo $this->get_error('check_out');
            $check_out = "";
            //return false;
        } else {
            $check_out = "&check_out={$check_out}";
        }
        if (!$currency || empty($currency)){
            $currency = "";
        } else {
            $currency = "currency={$currency}";
        }
        if (!$language || empty($language)){
            $language = "";
        } else {
            $language = "&language={$language}";
        }
        if (!$limit || empty($limit)){
            $limit = "";
        } else {
            $limit = "&limit={$limit}";
        }
        if (!$type || empty($type)){
            $type = "";
        } else {
            $type = "&type={$type}";
        }

        $token = '&token=' .$this->getToken();

        $requestURL = self::getApiUrlV1()."/widget_location_dump.json?{$currency}{$id}{$check_in}{$check_out}{$limit}"
            ."{$language}{$type}{$token}";

        if ($return_url == true){
            return $requestURL;
        }
        return  $this->request($requestURL);

    }

    public function request($string)
    {
        //$string = htmlspecialchars($string);
        $response = wp_remote_get( $string, array('headers' => array(
            'Accept-Encoding' => 'gzip, deflate',
        )) );
        /*if( is_wp_error( $response ) ){
            $json = $response;
        } else {
            $json = json_decode( $response['body'] );
        }*/
        $body = wp_remote_retrieve_body($response);
        $json = json_decode( $body );
        if( ! is_wp_error( $json ))
            return $this->objectToArray($json);
    }
    public function requestJson($string)
    {
        //$string = htmlspecialchars($string);
        $response = wp_remote_get( $string, array('headers' => array(
            'Accept-Encoding' => 'gzip, deflate',
        )) );
        if( is_wp_error( $response ) ){
            $json = $response;
        } else {
            $json = $response['body'];
        }
        if( ! is_wp_error( $json ))
            return $json;
    }


}