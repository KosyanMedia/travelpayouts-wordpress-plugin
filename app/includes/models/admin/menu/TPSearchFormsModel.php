<?php
/**
 * Created by PhpStorm.
 * User: freeman
 * Date: 10.08.15
 * Time: 22:57
 */

class TPSearchFormsModel extends KPDWPTableModel implements KPDWPTableInterfaceModel{
    public static $tableName = "tp_search_shortcodes";
    public function insert()
    {
        // TODO: Implement insert() method.
        global $wpdb;
        $tableName = $wpdb->prefix .self::$tableName;
    }

    public function update()
    {
        // TODO: Implement update() method.
        global $wpdb;
        $tableName = $wpdb->prefix .self::$tableName;
    }

    public function delete()
    {
        // TODO: Implement delete() method.
        global $wpdb;
        $tableName = $wpdb->prefix .self::$tableName;
    }

    public function query()
    {
        // TODO: Implement query() method.
        global $wpdb;
        $tableName = $wpdb->prefix .self::$tableName;
    }

    /**
     * @return bool
     */
    public function get_data()
    {
        // TODO: Implement get_data() method.
        global $wpdb;
        $tableName = $wpdb->prefix .self::$tableName;
        $data = $wpdb->get_results( "SELECT * FROM ".$tableName." ORDER BY date_add DESC", ARRAY_A);
        if(count($data) < 0) return false;
        return $data;
    }

    /**
     *
     */
    public static function createTable()
    {
        // TODO: Implement createTable() method.
        global $wpdb;
        $tableName = $wpdb->prefix .self::$tableName;
        if($wpdb->get_var("show tables like '$tableName'") != $tableName) {
            $sql = "CREATE TABLE " . $tableName . "(
                              id int(11) NOT NULL AUTO_INCREMENT,
                              title varchar(255) NOT NULL,
                              date_add int(11) NOT NULL,
                              type_shortcode varchar(255) NOT NULL,
                              code_form text NOT NULL,
                              from_city varchar(255) NOT NULL,
                              to_city varchar(255) NOT NULL,
                              PRIMARY KEY (id)
                            ) CHARACTER SET utf8 COLLATE utf8_general_ci;";
            require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
            dbDelta($sql);
        }

    }

    /**
     *
     */
    public static function deleteTable()
    {
        // TODO: Implement deleteTable() method.
        global $wpdb;
        $tableName = $wpdb->prefix .self::$tableName;
        $wpdb->query("DROP TABLE IF EXISTS $tableName");
    }
}