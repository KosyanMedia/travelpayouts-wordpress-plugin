<?php
/**
 * Created by PhpStorm.
 * User: romansolomashenko
 * Date: 07.03.17
 * Time: 1:43 PM
 */

namespace app\includes\models\site\shortcodes\hotels;

use \app\includes\common\TpPluginHelper;

class TPHotelListModel extends \core\models\TPOWPTableModel implements \core\models\TPOWPTableInterfaceModel
{
    public static $tableName = "tp_hotel_list_shortcode";
    public static function createTable()
    {
        // TODO: Implement createTable() method.
        $version = get_option(TPOPlUGIN_TABLE_HOTEL_LIST_VERSION);
        global $wpdb;
        $tableName = $wpdb->prefix .self::$tableName;
        $sql = "CREATE TABLE " . $tableName . "(
                  id int(11) NOT NULL AUTO_INCREMENT,
                  location_id int(11) NOT NULL,
                  date_add int(11) NOT NULL,
                  hotel_list text NOT NULL,
                  PRIMARY KEY (id)
                ) CHARACTER SET utf8 COLLATE utf8_general_ci;";
        if($version != TPOPlUGIN_DATABASE) {
            require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
            if($wpdb->get_var("show tables like '$tableName'") != $tableName) {
                dbDelta($sql);
            }else{
                $data = self::getData();
                //error_log(print_r($data, true));
                self::deleteTable();
                dbDelta($sql);
                if($data != false) {
                    $rows = array();
                    foreach ( $wpdb->get_col( "DESC " . $tableName, 0 ) as $column_name ) {
                        foreach($data as $key=>$values) {
                            $rows[$key][$column_name] =  (isset($values[$column_name]))?$values[$column_name]:'';
                        }

                    }
                    //error_log('$rows = '.print_r($rows, true));
                    foreach($rows as $row) {
                        $wpdb->insert($tableName, $row);
                    }
                }
            }
            update_option(TPOPlUGIN_TABLE_HOTEL_LIST_VERSION, TPOPlUGIN_DATABASE);
        }
    }

    public static function getData()
    {
        // TODO: Implement get_data() method.
        global $wpdb;
        $tableName = $wpdb->prefix .self::$tableName;
        $data = $wpdb->get_results( "SELECT * FROM ".$tableName." ORDER BY date_add DESC", ARRAY_A);
        if(TpPluginHelper::count($data) > 0) return $data;
        return false;
    }


    public static function deleteTable()
    {
        // TODO: Implement deleteTable() method.
        global $wpdb;
        $tableName = $wpdb->prefix .self::$tableName;
        $wpdb->query("DROP TABLE IF EXISTS $tableName");
    }

    public function insertHotelList($locationID, $hotelList)
    {
        // TODO: Implement insert() method.

        global $wpdb;
        $tableName = $wpdb->prefix .self::$tableName;

        $inputData = array(
            'location_id' => $locationID,
            'date_add' => time(),
            'hotel_list' => $hotelList,
        );
        $wpdb->insert($tableName, $inputData);

    }

    public function getHotelListByLocationID($locationID){
        global $wpdb;
        $tableName = $wpdb->prefix .self::$tableName;

        //$data = $wpdb->get_row("SELECT * FROM ".$tableName." WHERE location_id= ". $locationID, ARRAY_A);
        $parameter = array(
            $locationID
        );
        $data = $wpdb->get_results(
            $wpdb->prepare('SELECT * FROM '.$tableName
                .' WHERE location_id = %d', $parameter),
            ARRAY_A);
        if(TpPluginHelper::count($data) > 0) return $data;
        return false;
    }

    public function deleteHotelListByLocationID($locationID){
        global $wpdb;
        $tableName = $wpdb->prefix .self::$tableName;
        $parameter = array(
            $locationID
        );
        $wpdb->query($wpdb->prepare('DELETE FROM '.$tableName .' WHERE location_id = %d', $parameter));
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
        /*global $wpdb;
        $tableName = $wpdb->prefix .self::$tableName;
        $wpdb->query("DELETE FROM ".$tableName." WHERE id = '".$id ."'");*/
    }

    public function query()
    {
        // TODO: Implement query() method.
    }

    public function get_data()
    {
        // TODO: Implement get_data() method.
    }

    public function insert($data)
    {
        // TODO: Implement insert() method.
    }
}
