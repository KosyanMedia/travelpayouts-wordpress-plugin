<?php
/**
 * Created by PhpStorm.
 * User: freeman
 * Date: 09.08.16
 * Time: 15:19
 */

namespace app\includes\models\site\shortcodes;

use \app\includes\common\TpPluginHelper;

class TPSpecialOfferShortcodeModel  extends \core\models\TPOWPTableModel implements \core\models\TPOWPTableInterfaceModel
{
    public static $tableNameOffer = "tp_special_offer";
    public static $tableNameRoute = "tp_special_route";
    public function __construct()
    {

    }

    public static function createTable()
    {
        // TODO: Implement createTable() method.
        self::createTableSpecialOffer();
        self::createTableSpecialRoute();
    }

    public static function createTableSpecialOffer(){
        global $wpdb;
        $versionSpecialOffer = get_option(TPOPlUGIN_TABLE_SPECIAL_OFFER_VERSION);
        $tableNameOffer = $wpdb->prefix .self::$tableNameOffer;
        $sql = "CREATE TABLE " . $tableNameOffer . "(
                id int(11) NOT NULL AUTO_INCREMENT,
                cat_id int(11) NOT NULL,
                airline varchar(255) NOT NULL,
                airline_code varchar(255) NOT NULL,
                title varchar(255) NOT NULL,
                conditions varchar(255) NOT NULL,
                href varchar(255) NOT NULL,
                sale_date_begin int(11) NOT NULL,
                sale_date_end int(11) NOT NULL,
                flight_date_begin int(11) NOT NULL,
                flight_date_end int(11) NOT NULL,
                link varchar(255) NOT NULL,
                  PRIMARY KEY (id)
                ) CHARACTER SET utf8 COLLATE utf8_general_ci;";
        if($versionSpecialOffer != TPOPlUGIN_DATABASE) {
            require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
            if($wpdb->get_var("show tables like '$tableNameOffer'") != $tableNameOffer) {
                dbDelta($sql);
            }else{
                $data = self::getDataSpecialOffer();
                //error_log(print_r($data, true));
                self::deleteTableSpecialOffer();
                dbDelta($sql);
                if($data != false) {
                    $rows = array();
                    foreach ( $wpdb->get_col( "DESC " . $tableNameOffer, 0 ) as $column_name ) {
                        foreach($data as $key=>$values) {
                            $rows[$key][$column_name] =  (isset($values[$column_name]))?$values[$column_name]:'';
                        }
                    }
                    //error_log('$rows = '.print_r($rows, true));
                    foreach($rows as $row) {
                        $wpdb->insert($tableNameOffer, $row);
                    }
                }
            }
            update_option(TPOPlUGIN_TABLE_SPECIAL_OFFER_VERSION, TPOPlUGIN_DATABASE);
        }
    }
    public static function getDataSpecialOffer()
    {
        // TODO: Implement get_data() method.
        global $wpdb;
        $tableNameOffer = $wpdb->prefix .self::$tableNameOffer;
        $data = $wpdb->get_results( "SELECT * FROM ".$tableNameOffer, ARRAY_A);
        if(TpPluginHelper::count($data) > 0) return $data;
        return false;
    }
    public static function deleteTableSpecialOffer()
    {
        // TODO: Implement deleteTable() method.
        global $wpdb;
        $tableNameOffer = $wpdb->prefix .self::$tableNameOffer;
        $wpdb->query("DROP TABLE IF EXISTS $tableNameOffer");
    }
    public static function createTableSpecialRoute(){
        global $wpdb;
        $versionSpecialRoute = get_option(TPOPlUGIN_TABLE_SPECIAL_ROUTE_VERSION);
        $tableNameRoute = $wpdb->prefix .self::$tableNameRoute;
        $sql = "CREATE TABLE " . $tableNameRoute . "(
               id int(11) NOT NULL AUTO_INCREMENT,
               airline_code varchar(255) NOT NULL,
               cat_id int(11) NOT NULL,
               countries varchar(255) NOT NULL,
               from_iata varchar(255) NOT NULL,
               to_iata varchar(255) NOT NULL,
               from_name varchar(255) NOT NULL,
               to_name varchar(255) NOT NULL,
               class varchar(255) NOT NULL,
               departure_at int(11) NOT NULL,
               return_at int(11) NOT NULL,
               oneway_price varchar(100) NOT NULL,
               roundtrip_price varchar(100) NOT NULL,
               sale_date_begin int(11) NOT NULL,
                  PRIMARY KEY (id)
                ) CHARACTER SET utf8 COLLATE utf8_general_ci;";
        if($versionSpecialRoute != TPOPlUGIN_DATABASE) {
            require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
            if($wpdb->get_var("show tables like '$tableNameRoute'") != $tableNameRoute) {
                dbDelta($sql);
            }else{
                $data = self::getDataSpecialRoute();
                //error_log(print_r($data, true));
                self::deleteTableSpecialRoute();
                dbDelta($sql);
                if($data != false) {
                    $rows = array();
                    foreach ( $wpdb->get_col( "DESC " . $tableNameRoute, 0 ) as $column_name ) {
                        foreach($data as $key=>$values) {
                            $rows[$key][$column_name] =  (isset($values[$column_name]))?$values[$column_name]:'';
                        }
                    }
                    //error_log('$rows = '.print_r($rows, true));
                    foreach($rows as $row) {
                        $wpdb->insert($tableNameRoute, $row);
                    }
                }
            }
            update_option(TPOPlUGIN_TABLE_SPECIAL_ROUTE_VERSION, TPOPlUGIN_DATABASE);
        }
    }
    public static function getDataSpecialRoute()
    {
        // TODO: Implement get_data() method.
        global $wpdb;
        $tableNameRoute = $wpdb->prefix .self::$tableNameRoute;
        $data = $wpdb->get_results( "SELECT * FROM ".$tableNameRoute." ORDER BY date_add DESC", ARRAY_A);
        if(TpPluginHelper::count($data) > 0) return $data;
        return false;
    }
    public static function deleteTableSpecialRoute()
    {
        // TODO: Implement deleteTable() method.
        global $wpdb;
        $tableNameRoute = $wpdb->prefix .self::$tableNameRoute;
        $wpdb->query("DROP TABLE IF EXISTS $tableNameRoute");
    }


    public static function deleteTable()
    {
        // TODO: Implement deleteTable() method.
        self::deleteTableSpecialOffer();
        self::deleteTableSpecialRoute();
    }

    public static function insertSpecialOffer($cat_id, $airline, $airline_code, $title, $conditions, $href,
                                              $sale_date_begin, $sale_date_end, $flight_date_begin, $flight_date_end, $link){
        $data =  array(
            'cat_id' => $cat_id,
            'airline' =>  $airline,
            'airline_code' => $airline_code,
            'title' => $title,
            'conditions' => $conditions,
            'href' => $href,
            'sale_date_begin' => $sale_date_begin,
            'sale_date_end' => $sale_date_end,
            'flight_date_begin' => $flight_date_begin,
            'flight_date_end' => $flight_date_end,
            'link' => $link
        );
        global $wpdb;
        $tableNameOffer = $wpdb->prefix .self::$tableNameOffer;
        $wpdb->insert($tableNameOffer, $data);
    }

    public static function insertSpecialRoute($airline_code, $cat_id, $countries, $from_iata, $to_iata, $from_name,
                                              $to_name, $class, $oneway_price, $roundtrip_price, $flight_date_begin,
                                              $flight_date_end, $sale_date_begin){
        $data = array(
            'airline_code' => $airline_code,
            'cat_id' => $cat_id,
            'countries'=> $countries,
            'from_iata' => $from_iata,
            'to_iata' => $to_iata,
            'from_name' => $from_name,
            'to_name' => $to_name,
            'class' => $class,
            'oneway_price' => $oneway_price,
            'roundtrip_price' => $roundtrip_price,
            'departure_at' => $flight_date_begin,
            'return_at' => $flight_date_end,
            'sale_date_begin' => $sale_date_begin
        );
        global $wpdb;
        $tableNameRoute = $wpdb->prefix .self::$tableNameRoute;
        $wpdb->insert($tableNameRoute, $data);
    }

    public function insert($data)
    {
        // TODO: Implement insert() method.
    }

    public function update($data)
    {
        // TODO: Implement update() method.
    }

    public function deleteAll()
    {
        // TODO: Implement deleteAll() method.
    }

    public function deleteId($id)
    {
        // TODO: Implement deleteId() method.
    }

    public function query()
    {
        // TODO: Implement query() method.
    }

    public function get_data()
    {
        // TODO: Implement get_data() method.
    }

    public static function modelHooks(){
        //error_log("modelHooks");
        add_action( 'wp_loaded', array( __CLASS__, 'getSpecialOfferApiUpdateDB') );
    }

    public static function getSpecialOfferApiUpdateDB(){

        //self::getSpecialOfferApi();
        //self::getCountryCodeFromCityIata("MOW");
        $cache_key = 'TP_Special_Offer_Api_Update_DB';
        if ( false === ( $specialOfferApiUpdateDB = get_transient( $cache_key ) ) ) {
            //self::$KPDTourismusShortcodeSettings->get_xmlparse_db();
            self::getSpecialOfferApi();
            set_transient( $cache_key, $specialOfferApiUpdateDB, 60*60*12);
        }

    }
    public static function truncateTable(){
        global $wpdb;
        $tableNameOffer = $wpdb->prefix .self::$tableNameOffer;
        $tableNameRoute = $wpdb->prefix .self::$tableNameRoute;
        $wpdb->query("TRUNCATE TABLE `".$tableNameOffer."`");
        $wpdb->query("TRUNCATE TABLE `".$tableNameRoute."`");
    }

    public static function getSpecialOffer(){
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

    public static function getSpecialOfferApi(){
        $data = self::getSpecialOffer();
        if(TpPluginHelper::count($data) > 0) {
            if($data->offer) {
                self::truncateTable();
                $time = time();
                foreach ($data->offer as $offer) {
                    if ($offer['flight_date_end'] > $time) {
                        $cat_id = $offer['id'];
                        $airline = $offer['airline'];
                        $airline_code = $offer['airline_code'];
                        $title = $offer['title'];
                        $conditions = $offer->conditions;
                        $href = $offer['href'];
                        $sale_date_begin = $offer['sale_date_begin'];
                        $sale_date_end = $offer['sale_date_end'];
                        $flight_date_begin = $offer['flight_date_begin'];
                        $flight_date_end = $offer['flight_date_end'];
                        $link = $offer['link'];
                        self::insertSpecialOffer($cat_id, $airline, $airline_code, $title, $conditions, $href,
                            $sale_date_begin, $sale_date_end, $flight_date_begin, $flight_date_end, $link);
                        foreach ($offer->route as $route) {
                            $from_iata = $route['from_iata'];
                            $to_iata = $route['to_iata'];
                            $countries = self::getCountryCodeFromCityIata($route['to_iata']);
                            $from_name = $route['from_name'];
                            $to_name = $route['to_name'];
                            $class = $route['class'];
                            $oneway_price = $route['oneway_price'];
                            $roundtrip_price = $route['roundtrip_price'];
                            self::insertSpecialRoute($airline_code, $cat_id, $countries, $from_iata, $to_iata, $from_name,
                                $to_name, $class, $oneway_price, $roundtrip_price, $flight_date_begin,
                                $flight_date_end, $sale_date_begin);
                        }
                    }
                }
            }
        }

    }
    public static function getCountryCodeFromCityIata($iata){
        \app\includes\models\site\TPAutocomplete::getInstance();
        $iata = trim((string)$iata);
        //error_log(print_r(\app\includes\models\site\TPAutocomplete::$data[$iata], true));
        $countryCode = '';
        if(isset( \app\includes\models\site\TPAutocomplete::$data[$iata])){
           $countryCode = \app\includes\models\site\TPAutocomplete::$data[$iata]['country_code'];
        }
        //error_log($countryCode);
        return $countryCode;
    }
    public function getDataTable($args = array())
    {

        $defaults = array(
            'country' => false,
            'airline' => false,
            'limit' => false,
            'title' => '',
            'sort' => 0
            );
        extract(wp_parse_args($args, $defaults), EXTR_SKIP);
        global $wpdb;
        $tableNameRoute = $wpdb->prefix .self::$tableNameRoute;
        $where = '';
        $s = '';
        if($sort == 0)
            $s = 'ORDER BY `sale_date_begin` DESC';
        else
            $s = 'ORDER BY RAND()';
        if(!empty($country) || !empty($airline)){
            if(!empty($country) AND $country){
                $where = "countries = '{$country}'";
            }
            if(!empty($airline) AND $airline){
                $where = "airline_code = '{$airline}'";
            }
            if(!empty($country) AND $country AND !empty($airline) AND $airline){
                $where = "countries = '{$country}' AND airline_code = '{$airline}'" ;
            }
            //$resultRoute = $wpdb->get_results($wpdb->prepare("SELECT * FROM {$tableNameRoute} WHERE {$where} {$s}",NULL),ARRAY_A);
            $resultRoute = $wpdb->get_results("SELECT * FROM {$tableNameRoute} WHERE {$where} {$s}" ,ARRAY_A);
            $a_id = array();
            foreach($resultRoute as $key=>$route){
                $a_id[$key] = $route["cat_id"];
            }
            $cat_id = array_unique($a_id);

        } else {

            return "empty";
        }
        return $cat_id;
    }
}
