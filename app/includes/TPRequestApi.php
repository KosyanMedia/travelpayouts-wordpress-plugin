<?php
/**
 * Created by PhpStorm.
 * User: freeman
 * Date: 10.08.15
 * Time: 17:18
 */
namespace app\includes;
use app\includes\common\TPCurrencyUtils;
use \app\includes\TPPlugin;

class TPRequestApi {
    protected $status;
    protected $marker;
    protected $token;
    protected $api_url;
    protected $api_url_2;
    protected $error_json;
    public $currencys;
    public $calendar_types = array( 'departure_date', 'return_date' );
    private static $instance = null;
    private function __construct() {
        if( empty( TPPlugin::$options ) ) {
            $this->status = false;
            /*TPPlugin::$adminNotice->adminNoticePush(get_class($this), array(
                'class_notice' => 'error',
                'title_notice' => __('Plugin '.TPOPlUGIN_NAME.' returned an error', TPOPlUGIN_TEXTDOMAIN),
                'message_notice' => __('The settings are not tasks', TPOPlUGIN_TEXTDOMAIN),
                'link_notice' => array(
                    'url' => admin_url('admin.php?page=tp_control_settings'),
                    'title' => __('Set the options', TPOPlUGIN_TEXTDOMAIN)
                ),
            ));*/
            //new TPAdminNotice("error", "Настройки не заданы.");
            //new TPAdminPointers("#toplevel_page_Travelpayouts", "settings");
        }elseif( ! isset( TPPlugin::$options['account']['marker'] ) || empty( TPPlugin::$options['account']['marker'] )
            || ! is_string( TPPlugin::$options['account']['marker'] ) ) {
            $this->status = false;
            //_e('Marker missing or incorrect', TPOPlUGIN_TEXTDOMAIN);
            /*TPPlugin::$adminNotice->adminNoticePush(get_class($this), array(
                'class_notice' => 'error',
                'title_notice' => __('Plugin '.TPOPlUGIN_NAME.' returned an error', TPOPlUGIN_TEXTDOMAIN),
                'message_notice' => __('Marker missing or incorrect', TPOPlUGIN_TEXTDOMAIN),
                'link_notice' => array(
                    'url' => admin_url('admin.php?page=tp_control_settings'),
                    'title' => __('Set the options', TPOPlUGIN_TEXTDOMAIN)
                ),
            ));*/
            //new TPAdminNotice("error", "Маркер не указан или указан не верно.");
            //new TPAdminPointers("#toplevel_page_Travelpayouts", "marker");
        }elseif( ! isset( TPPlugin::$options['account']['token'] ) || empty( TPPlugin::$options['account']['token'] )
            || ! is_string( TPPlugin::$options['account']['token'] ) ){
            $this->status = false;
            //new TPAdminNotice("error", "Токен не указан или указан не верно.");
            //new TPAdminPointers("#toplevel_page_Travelpayouts", "token");
        }else{
            $this->currencys = TPCurrencyUtils::getCurrencyAll();
            $this->currencyValid();
            $this->status = true;
            $this->marker = TPPlugin::$options['account']['marker'];
            $this->token = TPPlugin::$options['account']['token'];
            $this->api_url = rtrim('http://api.travelpayouts.com/v1', '/' );
            $this->api_url_2 = rtrim('http://api.travelpayouts.com/v2', '/' );
            $this->error_json = TPPlugin::$options['config']['message_error'];
        }

    }

    public function currencyValid(){
        if ( ! TPPlugin::$options['local']['currency'] ||
            ! in_array( TPPlugin::$options['local']['currency'], $this->currencys ) ) {
            TPPlugin::$options['local']['currency'] = TPCurrencyUtils::getDefaultCurrency();
            update_option( TPOPlUGIN_OPTION_NAME,  TPPlugin::$options);
        }
    }

    public function get_status(){
        return $this->status;
    }
    public static function getInstance(){
        if (null === self::$instance) {
            self::$instance = new self();
        }
        return self::$instance;
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
        if(!isset($this->status)) return false;
        $defaults = array( 'origin' => false, 'destination' => false, 'departure_at' => false, 'return_at' => false,
            'currency' => 'RUB' );
        extract( wp_parse_args( $args, $defaults ), EXTR_SKIP );

        if( ! $origin || $origin == '' ) {
            echo $this->get_error('origin');
            return false;
        } elseif( ! $currency || ! in_array( $currency, $this->currencys ) ) {
            echo $this->get_error('currency');
            return false;
        }

        $destination = ( false !== $destination ) ? $destination : '-';
        $departure_at = ( false !== $departure_at ) ? '&depart_date=' . $departure_at : '';
        $return_at = ( false !== $return_at ) ? '&return_date=' . $return_at : '';
        $token = '&token=' .$this->token;
        $extra = $currency.$departure_at.$return_at.$token ;
        $request_string = "$this->api_url/prices/cheap?origin=$origin&destination=$destination&currency=$extra";
        //return $request_string;
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
        if(!isset($this->status)) return false;
        $defaults = array( 'origin' => false, 'destination' => false, 'departure_at' => false, 'return_at' => false,
            'currency' => 'RUB' );
        extract( wp_parse_args( $args, $defaults ), EXTR_SKIP );
        if( ! $origin || $origin == '' ) {
            echo $this->get_error('origin');
            return false;
        } elseif( ! $currency || ! in_array( $currency, $this->currencys ) ) {
            echo $this->get_error('currency');
            return false;
        }

        $destination    = ( false !== $destination ) ? $destination : '-';
        $departure_at   = ( false !== $departure_at ) ? '&depart_date=' . $departure_at : '';
        $return_at      = ( false !== $return_at ) ? '&return_date=' . $return_at : '';
        $token = '&token=' .$this->token;
        $extra          = $currency.$departure_at.$return_at.$token ;

        $request_string = "$this->api_url/prices/direct?origin=$origin&destination=$destination&currency=$extra";
        if(TPOPlUGIN_ERROR_LOG)
            error_log($method." url = {$request_string}");
        if(TPOPlUGIN_ERROR_LOG)
            error_log($name_method);
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
        if(!isset($this->status)) return false;
        $defaults = array( 'airline' => false, 'limit' => false);
        extract( wp_parse_args( $args, $defaults ), EXTR_SKIP );
        if( ! $airline || empty( $airline ) ) {
            echo $this->get_error('airline');
            return false;
        }
        $limit          = ( false !== $limit ) ? '&limit=' . $limit : '';
        $token = '&token=' .$this->token;
        //$request_string = "$this->api_url/airlines/$airline/directions.json$limit";
        $request_string = "$this->api_url/airline-directions?airline_code=$airline$limit$token";
        if(TPOPlUGIN_ERROR_LOG)
            error_log($method." url = {$request_string}");
        if(TPOPlUGIN_ERROR_LOG)
            error_log($name_method);
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
        if(!isset($this->status)) return false;
        $defaults = array( 'origin' => false, 'destination' => false, 'currency' => 'RUB' );
        extract( wp_parse_args( $args, $defaults ), EXTR_SKIP );
        if( ! $origin || $origin == '' ) {
            echo $this->get_error('origin');
            return false;
        }elseif( ! $destination  || $destination  == '' ) {
            echo $this->get_error('destination');
            return false;
        } elseif( ! $currency || ! in_array( $currency, $this->currencys ) ) {
            echo $this->get_error('currency');
            return false;
        }
        $month = date('Y-m-d');
        $current_year = date("Y");
        $current_month = date("m");
        $current_day = date("d",time());
        $number_days = date("t", strtotime($current_year . "-" . $current_month . "-01"));
        $token = '&token=' .$this->token;
        $currency = "currency={$currency}";
        $origin = "&origin={$origin}";
        $destination = "&destination={$destination}&show_to_affiliates=true";
        $extra = $currency.$origin.$destination;
        $return_two = array();
        if($current_day > ceil($number_days / 2)){
            $type = 1;
            $month_next = date('Y-m-d', mktime(0, 0, 0, $current_month + $type, 1, date("Y")));
            $request_string = "$this->api_url_2/prices/month-matrix?{$extra}&month={$month_next}{$token}";
            $return_two = $this->objectToArray($this->request($request_string));
        }
        $request_string = "$this->api_url_2/prices/month-matrix?{$extra}&month={$month}{$token}";
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
        if(!isset($this->status)) return false;
        $defaults = array('origin' => false, 'destination' => false, 'currency' => 'RUB',
            'depart_date' => date('Y-m-d'),
            'return_date' => date('Y-m-d'));
        extract(wp_parse_args($args, $defaults), EXTR_SKIP);
        if (!$origin || $origin == '') {
            echo $this->get_error('origin');
            return false;
        } elseif (!$destination || $destination == '') {
            echo $this->get_error('destination');
            return false;
        } elseif (!$currency || !in_array($currency, $this->currencys)) {
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
        $token = '&token=' .$this->token;
        $currency = "currency={$currency}";
        $origin = "&origin={$origin}";
        $destination = "&destination={$destination}&show_to_affiliates=true";
        $extra = $currency.$origin.$destination.$depart_date.$return_date.$token;
        $request_string = "$this->api_url_2/prices/week-matrix?{$extra}";
        if(TPOPlUGIN_ERROR_LOG)
            error_log($method." url = {$request_string}");
        if(TPOPlUGIN_ERROR_LOG)
            error_log($name_method);
        return $this->objectToArray($this->request($request_string));
    }

    /**
     * Дешевые авиабилеты на праздничные дни
     * @param array $args
     */
    public function get_cheap_flights_holidays($args = array()){
        if(!isset($this->status)) return false;
        $token = '&token=' .$this->token;
        $request_string = "$this->api_url_2/prices/holidays-by-routes?{$token}";
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
        if(!isset($this->status)) return false;
        $defaults = array( 'origin' => false, 'destination' => false, 'currency' => 'RUB' );
        extract( wp_parse_args( $args, $defaults ), EXTR_SKIP );
        if( ! $origin || $origin == '' ) {
            echo $this->get_error('origin');
            return false;
        }elseif( ! $destination  || $destination  == '' ) {
            echo $this->get_error('destination');
            return false;
        } elseif( ! $currency || ! in_array( $currency, $this->currencys ) ) {
            echo $this->get_error('currency');
            return false;
        }
        $token = '&token=' .$this->token;
        $currency = "currency={$currency}";
        $origin = "&origin={$origin}";
        $destination = "&destination={$destination}";
        $extra = $currency.$origin.$destination.$token;
        $request_string = "$this->api_url/prices/monthly?{$extra}";
        $return = array();
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
        if(!isset($this->status)) return false;
        $defaults = array( 'origin' => false, 'destination' => false,
            'calendar_type' => 'departure_date', 'currency' => 'RUB');
        extract( wp_parse_args( $args, $defaults ), EXTR_SKIP );

        if( ! $origin || empty( $origin ) ) {
            echo $this->get_error('origin');
            return false;
        } elseif( !$currency || ! in_array( $currency, $this->currencys ) ) {
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
        $token = '&token=' .$this->token;
        $extra = $currency.$origin.$destination.$calendar_type.$token;
        $request_string = "$this->api_url/prices/calendar?{$extra}";
        if(TPOPlUGIN_ERROR_LOG)
            error_log($method." url = {$request_string}");
        if(TPOPlUGIN_ERROR_LOG)
            error_log($name_method);
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
        if(!isset($this->status)) return false;
        $defaults = array( 'origin' => false, 'currency' => 'RUB');
        extract( wp_parse_args( $args, $defaults ), EXTR_SKIP );

        if( ! $origin || empty( $origin ) ) {
            echo $this->get_error('origin');
            return false;
        } elseif( !$currency || ! in_array( $currency, $this->currencys ) ) {
            echo $this->get_error('currency');
            return false;
        }
        $origin = "&origin={$origin}";
        $currency       = 'currency=' . $currency;
        $token = '&token=' .$this->token;
        $extra = $currency.$origin.$token;
        $request_string = "$this->api_url/city-directions?{$extra}";
        if(TPOPlUGIN_ERROR_LOG)
            error_log($method." url = {$request_string}");
        if(TPOPlUGIN_ERROR_LOG)
            error_log($name_method);
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
        if(!isset($this->status)) return false;
        $defaults = array( 'currency' => 'RUB', 'origin' => false, 'destination' => false, 'beginning_of_period' => false,
            'period_type' => 'year', 'one_way' => false, 'page' => 1, 'limit' => 100, 'sorting' => 'price',
            'trip_class' => 0, 'trip_duration' => false);
        extract( wp_parse_args( $args, $defaults ), EXTR_SKIP );
        $token = '&token=' .$this->token;
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
        $request_string = "$this->api_url_2/prices/latest?{$extra}";
        //return $request_string;
        //error_log($request_string);
        if(TPOPlUGIN_ERROR_LOG)
            error_log($method." url = {$request_string}");
        if(TPOPlUGIN_ERROR_LOG)
            error_log($name_method);
        return $this->objectToArray($this->request($request_string));
    }
    /** **/
    public function get_balance($args = array()){
        if(!isset($this->status)) return false;
        $request_string = "$this->api_url_2/statistics/balance";
        return $this->objectToArray($this->request_two($request_string));
    }
    public function get_detailed_sales($args = array()){
        if(!isset($this->status)) return false;
        $defaults = array( 'date' => date("Y-m-d"));
        extract( wp_parse_args( $args, $defaults ), EXTR_SKIP );
        $request_string = "$this->api_url_2/statistics/detailed-sales?group_by=date_marker&month="
            . $date . "&host_filter=null&marker_filter=null";
        return $this->objectToArray($this->request_two($request_string));
    }
    public function get_payments(){
        $request_string = "$this->api_url_2/statistics/payments";
        return $this->objectToArray($this->request_two($request_string));
    }

    public function getSpecialOffer(){
        $data = array();
        try {
            $sxml = @simplexml_load_file("http://www.aviasales.ru/latest-offers.xml",
                'SimpleXMLElement', LIBXML_NOCDATA);
            $sxml = simplexml_load_file("http://www.aviasales.ru/latest-offers.xml");

            if ($sxml !== false) {
                $data = $sxml;
            } else {
                $data = array();
            }
        }   catch (Exception $e) {

        }
        return $data;
    }

    /**
     * object to array
     * @param $d
     * @return array
     */
    public  function objectToArray($d) {
        if (is_object($d)) {
            // Gets the properties of the given object
            // with get_object_vars function
            $d = get_object_vars($d);
        }

        if (is_array($d)) {
            /*
            * Return array converted to object
            * Using __FUNCTION__ (Magic constant)
            * for recursive call
            */
            return array_map(array(&$this, __FUNCTION__), $d);
        }
        else {
            // Return array
            return $d;
        }
    }
    /**
     * Функция которой передаётся url и которая возвращает body ответа
     **/
    public function request( $string ){
        $name_method = "***************".__METHOD__."***************";
        if(TPOPlUGIN_ERROR_LOG)
            error_log($name_method);
        $method = __CLASS__." -> ". __METHOD__." -> ".__LINE__;
        if(TPOPlUGIN_ERROR_LOG)
            error_log($method);
        $string = htmlspecialchars($string);
        //error_log($string);
        $response = wp_remote_get( $string, array('headers' => array(
            'Accept-Encoding' => 'gzip, deflate',
        )) );
        if( is_wp_error( $response ) ){
            $json = $response;
        } else {
            $json = json_decode( $response['body'] );
        }
        /*error_log(111);
        return $json;*/

        if( ! is_wp_error( $json ) && $json->success == true )
            return $json->data;
        if( is_wp_error( $json ) ){
            if(TPOPlUGIN_ERROR_LOG)
                error_log($method." JSON ERROR = ".print_r($this->error_json, true));
        }

        return false;
    }
    /**
     * Функция которой передаётся url и которая возвращает body ответа
     **/
    public function request_two( $string ){
        $string = htmlspecialchars($string);
        //error_log($string);
        $response = wp_remote_get( $string, array('headers' => array(
            'Accept-Encoding' => 'gzip, deflate',
            'X-Access-Token' => $this->token
        )) );
        if( is_wp_error( $response ) ){
            $json = $response;
        } else {
            $json = json_decode( $response['body'] );
        }
        if( ! is_wp_error( $json ) && $json->success == true )
            return $json->data;
        //if( is_wp_error( $json ) )
        //echo "<p>".$this->error_json."</p>";
        return false;
    }
    /**
     * @param $error
     * @return string|void
     */
    public function get_error( $error ) {
        $errors = array(
            'origin'        =>  _x('tp_request_api_error_msg_origin',
                '(The variable $origin parameters not set or incorrectly.)', TPOPlUGIN_TEXTDOMAIN ),
            'destination'   =>  _x('tp_request_api_error_msg_destination',
                '(The variable $destination parameters not set or incorrectly.)', TPOPlUGIN_TEXTDOMAIN ),
            'currency'      =>  _x('tp_request_api_error_msg_currency',
                '(The variable $currency parameters not set or incorrectly.)', TPOPlUGIN_TEXTDOMAIN ),
            'departure_at'  =>  _x('tp_request_api_error_msg_departure_at',
                '(The variable $departure_at parameters not set or incorrectly.)', TPOPlUGIN_TEXTDOMAIN ),
            'calendar_type' =>  _x('tp_request_api_error_msg_calendar_type',
                '(The variable $calendar_type parameters not set or incorrectly.)', TPOPlUGIN_TEXTDOMAIN ),
            'return_at'     =>  _x('tp_request_api_error_msg_return_at',
                '(The variable $return_at parameters not set or incorrectly.)', TPOPlUGIN_TEXTDOMAIN ),
            'airline'       =>  _x('tp_request_api_error_msg_airline',
                '(The variable $airline parameters not set or incorrectly.)', TPOPlUGIN_TEXTDOMAIN ),
        );
        if( ! empty( $error ) && isset( $errors[$error] ) )
            return $errors[$error];
        return _x('tp_request_api_error_msg_unknown_error',
            '(Unknown error.)', TPOPlUGIN_TEXTDOMAIN );
    }
}