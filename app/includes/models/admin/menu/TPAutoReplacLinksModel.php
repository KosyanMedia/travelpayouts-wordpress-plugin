<?php
/**
 * Created by PhpStorm.
 * User: freeman
 * Date: 28.01.16
 * Time: 11:13
 */

namespace app\includes\models\admin\menu;


class TPAutoReplacLinksModel extends \core\models\TPOWPTableModel implements \core\models\TPOWPTableInterfaceModel
{
    public static $tableName = "tp_auto_replac_links";
    public function __construct()
    {
        add_action('wp_ajax_delete_all',      array( &$this, 'deleteAll'));
        add_action('wp_ajax_nopriv_delete_all',array( &$this, 'deleteAll'));
    }
    public static function createTable()
    {
        // TODO: Implement createTable() method.
        global $wpdb;
        $tableName = $wpdb->prefix .self::$tableName;
        if($wpdb->get_var("show tables like '$tableName'") != $tableName) {
            $sql = "CREATE TABLE " . $tableName . "(
                              id int(11) NOT NULL AUTO_INCREMENT,
                              arl_url varchar(255) NOT NULL,
                              arl_anchor text NOT NULL,
                              arl_nofollow int(11) NOT NULL,
                              arl_replace int(11) NOT NULL,
                              date_add int(11) NOT NULL,
                              PRIMARY KEY (id)
                            ) CHARACTER SET utf8 COLLATE utf8_general_ci;";
            require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
            dbDelta($sql);
        }
    }

    public static function deleteTable()
    {
        // TODO: Implement deleteTable() method.
        global $wpdb;
        $tableName = $wpdb->prefix .self::$tableName;
        $wpdb->query("DROP TABLE IF EXISTS $tableName");
    }

    public function insert($data)
    {
        // TODO: Implement insert() method.
        global $wpdb;
        $tableName = $wpdb->prefix .self::$tableName;
        $arl_nofollow = (isset($_POST["arl_nofollow"]))?1:0;
        $arl_replace = (isset($_POST["arl_replace"]))?1:0;
        $inputData = array(
            'arl_url' => $_POST["arl_url"],
            'arl_anchor' => $_POST["arl_anchor"],
            'arl_nofollow' => $arl_nofollow,
            'arl_replace' => $arl_replace,
            'date_add' => time(),
        );
        $wpdb->insert($tableName, $inputData);
    }

    public function update($data)
    {
        // TODO: Implement update() method.
        global $wpdb;
        $tableName = $wpdb->prefix .self::$tableName;
        $arl_nofollow = (isset($_POST["arl_nofollow"]))?1:0;
        $arl_replace = (isset($_POST["arl_replace"]))?1:0;
        $inputData = array(
            'arl_url' => $_POST["arl_url"],
            'arl_anchor' => $_POST["arl_anchor"],
            'arl_nofollow' => $arl_nofollow,
            'arl_replace' => $arl_replace,
            'date_add' => time(),
        );
        $wpdb->update($tableName, $inputData ,array('id' => $_POST['link_id']));
    }

    public function deleteAll()
    {
        // TODO: Implement deleteAll() method.
        global $wpdb;
        $tableName = $wpdb->prefix .self::$tableName;
        if(isset($_POST)) {
            switch ($_POST['type']) {
                case "arl_link":
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
    }

    public function get_data()
    {
        // TODO: Implement get_data() method.
        global $wpdb;
        $tableName = $wpdb->prefix .self::$tableName;
        $data = $wpdb->get_results( "SELECT * FROM ".$tableName." ORDER BY date_add DESC", ARRAY_A);
        if(count($data) > 0) return $data;
        return false;
    }

    public function getDataAutoReplacLinks(){
        $data = $this->get_data();
        $dataResult = array();
        //[arl_url] => https://www.travelpayouts.com/dashboard
        //[arl_anchor] => Тест, Тест
        foreach($data as $item){
            $dataResult[$item['id']]['url'] = $item['arl_url'];
            $dataResult[$item['id']]['anchor'] = explode(",", $item['arl_anchor']);

        }
        error_log(print_r($dataResult, true));

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