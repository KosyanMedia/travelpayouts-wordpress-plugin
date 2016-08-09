<?php
/**
 * Created by PhpStorm.
 * User: freeman
 * Date: 09.08.16
 * Time: 15:19
 */

namespace app\includes\models\site\shortcodes;


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
        $data = $wpdb->get_results( "SELECT * FROM ".$tableNameOffer." ORDER BY date_add DESC", ARRAY_A);
        if(count($data) > 0) return $data;
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
        if(count($data) > 0) return $data;
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
}