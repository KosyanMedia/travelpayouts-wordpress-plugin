<?php
/**
 * Created by PhpStorm.
 * User: freeman
 * Date: 10.08.15
 * Time: 22:57
 */

class TPSearchFormsModel extends KPDWPTableModel implements KPDWPTableInterfaceModel{
    public static $tableName = "tp_search_shortcodes";
    public function __construct()
    {
        add_action('wp_ajax_delete_all',      array( &$this, 'deleteAll'));
        add_action('wp_ajax_nopriv_delete_all',array( &$this, 'deleteAll'));
    }
    public function insert($data)
    {
        // TODO: Implement insert() method.
        global $wpdb;
        $tableName = $wpdb->prefix .self::$tableName;
        $code_form = wp_unslash($_POST["search_shortcode_code_form"]);
        if(!empty($_POST["search_shortcode_from"])){
            preg_match('/\[(.+)\]/', $_POST["search_shortcode_from"], $from_iata);
            if(!empty($from_iata[1])){
                $from_city = explode(',', $_POST["search_shortcode_from"]);
                $origin = '"origin": {
                                            "name": "'.$from_city[0].'",
                                            "iata": "'.$from_iata[1].'"
                                        }';
                $code_form = preg_replace('/"origin": \{.*?\}/s', $origin, $code_form);
            }

        }
        if(!empty( $_POST["search_shortcode_to"])){
            preg_match('/\[(.+)\]/',  $_POST["search_shortcode_to"], $to_iata);
            if(!empty($to_iata[1])){
                $to_city = explode(',',  $_POST["search_shortcode_to"]);
                $destination = '"destination": {
                                            "name": "'.$to_city[0].'",
                                            "iata": "'.$to_iata[1].'"
                                        }';
                $code_form = preg_replace('/"destination": \{.*?\}/s', $destination, $code_form);
            }

        }
        $inputData = array(
            'title' => $_POST["search_shortcode_title"],
            'date_add' => time(),
            'type_shortcode' => $_POST["search_shortcode_type"],
            'code_form' => $code_form,
            'from_city' => $_POST["search_shortcode_from"],
            'to_city' => $_POST["search_shortcode_to"]
        );
        $wpdb->insert($tableName, $inputData);
    }

    public function update($data)
    {
        // TODO: Implement update() method.
        global $wpdb;
        $tableName = $wpdb->prefix .self::$tableName;
        $code_form = wp_unslash($_POST["search_shortcode_code_form"]);
        if(!empty($_POST["search_shortcode_from"])){
            preg_match('/\[(.+)\]/', $_POST["search_shortcode_from"], $from_iata);
            if(!empty($from_iata[1])){
                $from_city = explode(',', $_POST["search_shortcode_from"]);
                $origin = '"origin": {
                                            "name": "'.$from_city[0].'",
                                            "iata": "'.$from_iata[1].'"
                                        }';
                $code_form = preg_replace('/"origin": \{.*?\}/s', $origin, $code_form);
            }

        }
        if(!empty( $_POST["search_shortcode_to"])){
            preg_match('/\[(.+)\]/',  $_POST["search_shortcode_to"], $to_iata);
            if(!empty($to_iata[1])){
                $to_city = explode(',',  $_POST["search_shortcode_to"]);
                $destination = '"destination": {
                                            "name": "'.$to_city[0].'",
                                            "iata": "'.$to_iata[1].'"
                                        }';
                $code_form = preg_replace('/"destination": \{.*?\}/s', $destination, $code_form);
            }

        }
        $inputData = array(
            'title' => $_POST["search_shortcode_title"],
            'date_add' => time(),
            'type_shortcode' => $_POST["search_shortcode_type"],
            'code_form' => $code_form,
            'from_city' => $_POST["search_shortcode_from"],
            'to_city' => $_POST["search_shortcode_to"]
        );
        $wpdb->update($tableName, $inputData ,array('id' => $_POST['search_shortcodes_id']));
    }

    public function deleteAll()
    {
        // TODO: Implement delete() method.
        global $wpdb;
        $tableName = $wpdb->prefix .self::$tableName;
        if(isset($_POST)) {
            switch ($_POST['type']) {
                case "search_shortcodes":
                    foreach ($_POST['id'] as $id) {
                        $wpdb->query("DELETE FROM " .$tableName. " WHERE id = '" . (int)$id . "'");
                    }
                    break;
            }
        }
    }
    public function deleteId($id)
    {
        // TODO: Implement deleteId() method.
        global $wpdb;
        $tableName = $wpdb->prefix .self::$tableName;
        $wpdb->query("DELETE FROM ".$tableName." WHERE id = '".$id ."'");
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
        if(count($data) > 0) return $data;
        return false;
    }

    /**
     * @param $id
     * @return bool
     */
    public function get_dataID($id){
        global $wpdb;
        $tableName = $wpdb->prefix .self::$tableName;
        $data = $wpdb->get_row("SELECT * FROM ".$tableName." WHERE id= ". $id, ARRAY_A);
        if(count($data) > 0) return $data;
        return false;
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

    /**
     * @return mixed
     */
    public function get_nextId(){
        global $wpdb;
        $tableName = $wpdb->prefix .self::$tableName;
        $next_id = $wpdb->get_var("SELECT MAX(id) FROM ".$tableName);
        $next_id++;
        return $next_id;
    }


}