<?php
/**
 * Created by PhpStorm.
 * User: romansolomashenko
 * Date: 04.01.17
 * Time: 2:14 PM
 */

namespace app\includes\common;

use \app\includes\TPPlugin;

class TPRequestApiFlight extends TPRequestApi
{

    const TP_API_URL = 'http://api.travelpayouts.com/v1';
    const TP_API_URL_2 = 'https://api.travelpayouts.com/v2';

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

    public static function getApiUrl2(){
        return self::TP_API_URL_2;
    }

    /**
     * Функция возвращает самые дешевые авиабилеты
     **/
    public function get_cheapest( $args = array() ) {
        $name_method = "***************".__METHOD__."***************";
        if(TPOPlUGIN_ERROR_LOG)
            error_log($name_method);
        $method = __CLASS__." -> ". __METHOD__." -> ".__LINE__;
        if(TPOPlUGIN_ERROR_LOG)
            error_log($method);

        if(!$this->isStatus()){
            return false;
        }
        $defaults = array(
            'origin' => false,
            'destination' => false,
            'departure_at' => false,
            'return_at' => false,
            'currency' => TPCurrencyUtils::getDefaultCurrency(),
            'return_url' => false
        );
        extract( wp_parse_args( $args, $defaults ), EXTR_SKIP );

        if( ! $origin || $origin == '' ) {
            echo $this->get_error('origin');
            return false;
        } elseif( ! TPCurrencyUtils::isCurrency($currency) ) {
            echo $this->get_error('currency');
            return false;
        }

        $destination = ( false !== $destination ) ? $destination : '-';
        $departure_at = ( false !== $departure_at ) ? '&depart_date=' . $departure_at : '';
        $return_at = ( false !== $return_at ) ? '&return_date=' . $return_at : '';
        $token = '&token=' .$this->getToken();
        $extra = $currency.$departure_at.$return_at.$token ;
        $request_string = self::getApiUrl()."/prices/cheap?origin=$origin&destination=$destination&currency=$extra";
        if ($return_url == true){
            return $request_string;
        }
        if(TPOPlUGIN_ERROR_LOG)
            error_log($method." url = {$request_string}");
        if(TPOPlUGIN_ERROR_LOG)
            error_log($name_method);
        return $this->request($request_string);
    }
    /**
     * Функция возвращает билеты без пересадок
     **/
    public function get_direct( $args = array() ) {

        $name_method = "***************".__METHOD__."***************";
        if(TPOPlUGIN_ERROR_LOG)
            error_log($name_method);
        $method = __CLASS__." -> ". __METHOD__." -> ".__LINE__;
        if(TPOPlUGIN_ERROR_LOG)
            error_log($method);

        if(!$this->isStatus()){
            return false;
        }
        $defaults = array(
            'origin' => false,
            'destination' => false,
            'departure_at' => false,
            'return_at' => false,
            'currency' => TPCurrencyUtils::getDefaultCurrency(),
            'return_url' => false
        );
        extract( wp_parse_args( $args, $defaults ), EXTR_SKIP );
        if( ! $origin || $origin == '' ) {
            echo $this->get_error('origin');
            return false;
        } elseif( ! TPCurrencyUtils::isCurrency($currency) ) {
            echo $this->get_error('currency');
            return false;
        }

        $destination    = ( false !== $destination ) ? $destination : '-';
        $departure_at   = ( false !== $departure_at ) ? '&depart_date=' . $departure_at : '';
        $return_at      = ( false !== $return_at ) ? '&return_date=' . $return_at : '';
        $token = '&token=' .$this->getToken();
        $extra          = $currency.$departure_at.$return_at.$token ;

        $request_string = self::getApiUrl()."/prices/direct?origin=$origin&destination=$destination&currency=$extra";
        if(TPOPlUGIN_ERROR_LOG)
            error_log($method." url = {$request_string}");
        if(TPOPlUGIN_ERROR_LOG)
            error_log($name_method);
        if ($return_url == true){
            return $request_string;
        }
        //error_log(print_r($request_string, true));
        //error_log(print_r($this->request($request_string), true));

        return $this->objectToArray($this->request($request_string));
    }

    /**
     * Функция возвращает популярные направления авиакомпании
     **/
    public function get_popular( $args = array() ) {
        $name_method = "***************".__METHOD__."***************";
        if(TPOPlUGIN_ERROR_LOG)
            error_log($name_method);
        $method = __CLASS__." -> ". __METHOD__." -> ".__LINE__;
        if(TPOPlUGIN_ERROR_LOG)
            error_log($method);

        if(!$this->isStatus()){
            return false;
        }
        $defaults = array(
            'airline' => false,
            'limit' => false,
            'return_url' => false
        );
        extract( wp_parse_args( $args, $defaults ), EXTR_SKIP );
        if( ! $airline || empty( $airline ) ) {
            echo $this->get_error('airline');
            return false;
        }
        $limit = ( false !== $limit ) ? '&limit=' . $limit : '';
        $token = '&token=' .$this->getToken();
        //$request_string = "$this->api_url/airlines/$airline/directions.json$limit";
        $request_string = self::getApiUrl()."/airline-directions?airline_code=$airline$limit$token";
        if(TPOPlUGIN_ERROR_LOG)
            error_log($method." url = {$request_string}");
        if(TPOPlUGIN_ERROR_LOG)
            error_log($name_method);
        if ($return_url == true){
            return $request_string;
        }
        return $this->objectToArray($this->request( $request_string ));
    }
    /**
     * Календарь цен на месяц по маршруту
     **/
    public function get_price_mounth_calendar($args = array()){
        $name_method = "***************".__METHOD__."***************";
        if(TPOPlUGIN_ERROR_LOG)
            error_log($name_method);
        $method = __CLASS__." -> ". __METHOD__." -> ".__LINE__;
        if(TPOPlUGIN_ERROR_LOG)
            error_log($method);
        if(!$this->isStatus()){
            return false;
        }
        $defaults = array(
            'origin' => false,
            'destination' => false,
            'currency' => TPCurrencyUtils::getDefaultCurrency(),
            'return_url' => false
        );
        extract( wp_parse_args( $args, $defaults ), EXTR_SKIP );
        if( ! $origin || $origin == '' ) {
            echo $this->get_error('origin');
            return false;
        }elseif( ! $destination  || $destination  == '' ) {
            echo $this->get_error('destination');
            return false;
        } elseif( ! TPCurrencyUtils::isCurrency($currency) ) {
            echo $this->get_error('currency');
            return false;
        }
        $month = date('Y-m-d');
        $current_year = date("Y");
        $current_month = date("m");
        $current_day = date("d",time());
        $number_days = date("t", strtotime($current_year . "-" . $current_month . "-01"));
        $token = '&token=' .$this->getToken();
        $currency = "currency={$currency}";
        $origin = "&origin={$origin}";
        $destination = "&destination={$destination}&show_to_affiliates=true";
        $extra = $currency.$origin.$destination;
        $return_two = '';
        if($current_day > ceil($number_days / 2)){
            $type = 1;
            $month_next = date('Y-m-d', mktime(0, 0, 0, $current_month + $type, 1, date("Y")));
            $request_string = self::getApiUrl2()."/prices/month-matrix?{$extra}&month={$month_next}{$token}";
            if ($return_url == true){
                $return_two = '';
                $return_two = $request_string;
            } else {
                $return_two = array();
                $return_two = $this->objectToArray($this->request($request_string));
            }

        }
        $request_string = self::getApiUrl2()."/prices/month-matrix?{$extra}&month={$month}{$token}";



        if ($return_url == true){
            return $request_string.' | '.$return_two;
        }
        $return = array();
        $return = $this->objectToArray($this->request($request_string));
        if(is_array($return_two) && is_array($return))
            $return = array_merge($return, $return_two);
        if(TPOPlUGIN_ERROR_LOG)
            error_log($method." url = {$request_string}");
        if(TPOPlUGIN_ERROR_LOG)
            error_log($name_method);
        return $return;
    }
    /**
     * Функция возвращает Календарь цен на неделю по маршруту
     **/
    public function get_price_week_calendar($args = array())
    {
        $name_method = "***************".__METHOD__."***************";
        if(TPOPlUGIN_ERROR_LOG)
            error_log($name_method);
        $method = __CLASS__." -> ". __METHOD__." -> ".__LINE__;
        if(TPOPlUGIN_ERROR_LOG)
            error_log($method);
        if(!$this->isStatus()){
            return false;
        }
        $defaults = array(
            'origin' => false,
            'destination' => false,
            'currency' => TPCurrencyUtils::getDefaultCurrency(),
            'depart_date' => date('Y-m-d'),
            'return_date' => date('Y-m-d'),
            'return_url' => false
        );
        extract(wp_parse_args($args, $defaults), EXTR_SKIP);
        if (!$origin || $origin == '') {
            echo $this->get_error('origin');
            return false;
        } elseif (!$destination || $destination == '') {
            echo $this->get_error('destination');
            return false;
        } elseif (! TPCurrencyUtils::isCurrency($currency)) {
            echo $this->get_error('currency');
            return false;
        }
        $depart_date = "&depart_date=".$depart_date;
        $return_date = "&return_date=".$return_date;
        if(TPPlugin::$options['shortcodes']['2']['plus_depart_date'] > 0){
            $depart_date = "&depart_date=".date('Y-m-d', DAY_IN_SECONDS * TPPlugin::$options['shortcodes']['2']['plus_depart_date'] + time());
        }
        if(TPPlugin::$options['shortcodes']['2']['plus_return_date'] > 0){
            $return_date = "&return_date=".date('Y-m-d', DAY_IN_SECONDS * TPPlugin::$options['shortcodes']['2']['plus_return_date'] + time());
        }
        $token = '&token=' .$this->getToken();
        $currency = "currency={$currency}";
        $origin = "&origin={$origin}";
        $destination = "&destination={$destination}&show_to_affiliates=true";
        $extra = $currency.$origin.$destination.$depart_date.$return_date.$token;
        $request_string = self::getApiUrl2()."/prices/week-matrix?{$extra}";
        if(TPOPlUGIN_ERROR_LOG)
            error_log($method." url = {$request_string}");
        if(TPOPlUGIN_ERROR_LOG)
            error_log($name_method);
        if ($return_url == true){
            return $request_string;
        }
        return $this->objectToArray($this->request($request_string));
    }

    /**
     * Дешевые авиабилеты на праздничные дни
     * @param array $args
     */
    public function get_cheap_flights_holidays($args = array()){
        if(!$this->isStatus()){
            return false;
        }
        $defaults = array(
            'return_url' => false
        );

        extract( wp_parse_args( $args, $defaults ), EXTR_SKIP );
        $token = '&token=' .$this->getToken();
        $request_string = self::TP_API_URL_2."/prices/holidays-by-routes?{$token}";
        if ($return_url == true){
            return $request_string;
        }
        return $this->objectToArray($this->request($request_string));
    }

    /**
     * Самые дешевый билеты в каждом месяце  Цены на билеты по месяцам
     * @param array $args
     */
    public function get_cheapest_tickets_each_month($args = array()){
        $name_method = "***************".__METHOD__."***************";
        if(TPOPlUGIN_ERROR_LOG)
            error_log($name_method);
        $method = __CLASS__." -> ". __METHOD__." -> ".__LINE__;
        if(TPOPlUGIN_ERROR_LOG)
            error_log($method);
        if(!$this->isStatus()){
            return false;
        }
        $defaults = array(
            'origin' => false,
            'destination' => false,
            'currency' => TPCurrencyUtils::getDefaultCurrency(),
            'return_url' => false
        );

        extract( wp_parse_args( $args, $defaults ), EXTR_SKIP );
        if( ! $origin || $origin == '' ) {
            echo $this->get_error('origin');
            return false;
        }elseif( ! $destination  || $destination  == '' ) {
            echo $this->get_error('destination');
            return false;
        } elseif( ! TPCurrencyUtils::isCurrency($currency) ) {
            echo $this->get_error('currency');
            return false;
        }
        $token = '&token=' .$this->getToken();
        $currency = "currency={$currency}";
        $origin = "&origin={$origin}";
        $destination = "&destination={$destination}";
        $extra = $currency.$origin.$destination.$token;
        $request_string = self::getApiUrl()."/prices/monthly?{$extra}";
        $return = array();
        if ($return_url == true){
            return $request_string;
        }
        $return = $this->objectToArray($this->request($request_string));
        /*if(array_key_exists(0, (array)$return)){
            return array(2);
        }*/

        if(TPOPlUGIN_ERROR_LOG)
            error_log($method." url = {$request_string}");
        if(TPOPlUGIN_ERROR_LOG)
            error_log($name_method);
        return $return;
    }
    /**
     * Функция возвращает Самые дешевый билеты на каждый день месяца
     **/
    public function get_calendar( $args = array() ) {
        $name_method = "***************".__METHOD__."***************";
        if(TPOPlUGIN_ERROR_LOG)
            error_log($name_method);
        $method = __CLASS__." -> ". __METHOD__." -> ".__LINE__;
        if(TPOPlUGIN_ERROR_LOG)
            error_log($method);
        if(!$this->isStatus()){
            return false;
        }
        $defaults = array(
            'origin' => false,
            'destination' => false,
            'calendar_type' => 'departure_date',
            'currency' => TPCurrencyUtils::getDefaultCurrency(),
            'return_url' => false
        );
        extract( wp_parse_args( $args, $defaults ), EXTR_SKIP );

        if( ! $origin || empty( $origin ) ) {
            echo $this->get_error('origin');
            return false;
        } elseif( ! TPCurrencyUtils::isCurrency($currency) ) {
            echo $this->get_error('currency');
            return false;
        } elseif( !$calendar_type || ! in_array( $calendar_type, $this->calendar_types ) ) {
            echo $this->get_error('calendar_type');
            return false;
        } elseif( $calendar_type == 'return_date' && ( ! $return_at || empty( $return_at ) ) ) {
            echo $this->get_error('return_at');
            return false;
        }elseif( ! $destination  || $destination  == '' ) {
            echo $this->get_error('destination');
            return false;
        }
        $origin = "&origin={$origin}";
        $destination = "&destination={$destination}";
        $currency       = 'currency=' . $currency;
        $calendar_type = '&calendar_type=departure_date';
        $token = '&token=' .$this->getToken();
        $extra = $currency.$origin.$destination.$calendar_type.$token;
        $request_string = self::getApiUrl()."/prices/calendar?{$extra}";
        if(TPOPlUGIN_ERROR_LOG)
            error_log($method." url = {$request_string}");
        if(TPOPlUGIN_ERROR_LOG)
            error_log($name_method);
        if ($return_url == true){
            return $request_string;
        }

        return $this->objectToArray($this->request($request_string));
    }

    /**
     * Популярные направления из города
     * @param array $args
     */
    public function get_popular_routes_from_city( $args = array() ) {
        $name_method = "***************".__METHOD__."***************";
        if(TPOPlUGIN_ERROR_LOG)
            error_log($name_method);
        $method = __CLASS__." -> ". __METHOD__." -> ".__LINE__;
        if(TPOPlUGIN_ERROR_LOG)
            error_log($method);
        if(!$this->isStatus()){
            return false;
        }
        $defaults = array(
            'origin' => false,
            'currency' => TPCurrencyUtils::getDefaultCurrency(),
            'return_url' => false
        );
        extract( wp_parse_args( $args, $defaults ), EXTR_SKIP );

        if( ! $origin || empty( $origin ) ) {
            echo $this->get_error('origin');
            return false;
        } elseif( ! TPCurrencyUtils::isCurrency($currency) ) {
            echo $this->get_error('currency');
            return false;
        }
        $origin = "&origin={$origin}";
        $currency       = 'currency=' . $currency;
        $token = '&token=' .$this->getToken();
        $extra = $currency.$origin.$token;
        $request_string = self::getApiUrl()."/city-directions?{$extra}";
        if(TPOPlUGIN_ERROR_LOG)
            error_log($method." url = {$request_string}");
        if(TPOPlUGIN_ERROR_LOG)
            error_log($name_method);
        if ($return_url == true){
            return $request_string;
        }
        return $this->objectToArray($this->request($request_string));

    }

    /**
     * @param array $args
     * currency
     *      Валюта цен на билеты. Значение по умолчанию - rub.
     * origin
     *      Пункт отправления. IATA код города или код страны. Длина не менее 2. Длина не более 3. false.
     * destination
     *      Пункт назначения. IATA код города или код страны. Длина не менее 2. Длина не более 3. false.
     * beginning_of_period
     *      Начало периода, в который попадают даты отправления. false.
     * period_type
     *      Тип периода: year - за всё время, month - за месяц, seasson - за сезон (3 месяца), day - по дням. Значение
     *      по умолчанию - year. Содержит только одно из следующих значений: ["day", "year", "month", "season"].
     * one_way
     *      true - в одну сторону, false - туда и обратно. Значение по умолчанию - false.
     * page
     *      Номер страницы. Значение по умолчанию - 1.
     * limit
     *      Количество записей на странице. Значение по умолчанию - 30. Не более 1000.
     * show_to_affiliates
     *      false - все цены, true - только цены, найденные с партнёрским маркером (рекомендовано). Значение по умолчанию - true.
     * sorting
     *      Сортировка цен. price - по цене, route - по популярности маршрута, distance_unit_price - по цене за километр.
     *      Для направлений город - город возможна сортировка только по цене.. Значение по умолчанию - price. Содержит
     *     только одно из следующих значений: ["price", "route", "distance_unit_price"].
     * trip_class
     *      Класс перелёта 0 - Эконом, 1 - Бизнес, 2 - Первый. Значение по умолчанию - 0. Содержит только одно из следующих
     *      значений: 0..2.
     * trip_duration
     *      Длительность пребывания в неделях или днях (для period_type=day). false.
     */
    public function get_latest($args = array()){
        $name_method = "***************".__METHOD__."***************";
        if(TPOPlUGIN_ERROR_LOG)
            error_log($name_method);
        $method = __CLASS__." -> ". __METHOD__." -> ".__LINE__;
        if(TPOPlUGIN_ERROR_LOG)
            error_log($method);
        if(!$this->isStatus()){
            return false;
        }
        $defaults = array(
            'currency' => TPCurrencyUtils::getDefaultCurrency(),
            'origin' => false,
            'destination' => false,
            'beginning_of_period' => false,
            'period_type' => 'year',
            'one_way' => false,
            'page' => 1,
            'limit' => 100,
            'sorting' => 'price',
            'trip_class' => 0,
            'trip_duration' => false,
            'return_url' => false
        );
        extract( wp_parse_args( $args, $defaults ), EXTR_SKIP );
        $token = '&token=' .$this->getToken();
        $currency  = "currency={$currency}";
        $origin = ( false !== $origin ) ? "&origin={$origin}" : "";
        $destination = ( false !== $destination ) ? "&destination={$destination}" : "";
        $beginning_of_period = ( false !== $beginning_of_period ) ? "&beginning_of_period={$beginning_of_period}" : "";
        $period_type  = ( false !== $period_type ) ? "&period_type={$period_type}" : "&period_type=year";
        $one_way  = ( false !== $one_way ) ? "&one_way={$one_way}" : "&one_way=false";
        $page  = ( false !== $page ) ? "&page={$page}" : "&page=1";
        $limit  = ( false !== $limit ) ? "&limit={$limit}" : "&limit=100";
        $sorting  = ( false !== $sorting ) ? "&sorting={$sorting}" : "&sorting=price";
        $trip_class  = ( false !== $trip_class ) ? "&trip_class={$trip_class}" : "&trip_class=0";
        $extra = $currency.$origin.$destination.$beginning_of_period.$period_type.$one_way.$page.$limit
            ."&show_to_affiliates=true".$sorting.$trip_class.$token;
        $request_string = self::TP_API_URL_2."/prices/latest?{$extra}";
        //return $request_string;
        //error_log($request_string);
        if(TPOPlUGIN_ERROR_LOG)
            error_log($method." url = {$request_string}");
        if(TPOPlUGIN_ERROR_LOG)
            error_log($name_method);
        if ($return_url == true){
            return $request_string;
        }
        return $this->objectToArray($this->request($request_string));
    }


}