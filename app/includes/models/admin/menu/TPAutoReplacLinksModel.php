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

        add_action('wp_ajax_replace_all',      array( &$this, 'replaceAll'));
        add_action('wp_ajax_nopriv_replace_all',array( &$this, 'replaceAll'));
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
                              arl_event text NOT NULL,
                              arl_nofollow int(11) NOT NULL,
                              arl_replace int(11) NOT NULL,
                              arl_target_blank int(11) NOT NULL,
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
        $arl_target_blank = (isset($_POST["arl_target_blank"]))?1:0;
        $inputData = array(
            'arl_url' => $_POST["arl_url"],
            'arl_anchor' => $_POST["arl_anchor"],
            'arl_event' => wp_unslash($_POST["arl_event"]),
            'arl_nofollow' => $arl_nofollow,
            'arl_replace' => $arl_replace,
            'arl_target_blank' => $arl_target_blank,
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
        $arl_target_blank = (isset($_POST["arl_target_blank"]))?1:0;
        $inputData = array(
            'arl_url' => $_POST["arl_url"],
            'arl_anchor' => $_POST["arl_anchor"],
            'arl_event' => wp_unslash($_POST["arl_event"]),
            'arl_nofollow' => $arl_nofollow,
            'arl_replace' => $arl_replace,
            'arl_target_blank' => $arl_target_blank,
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

    public function get_dataByArrayId($arrayId)
    {
        global $wpdb;
        $tableName = $wpdb->prefix .self::$tableName;
        $data = $wpdb->get_results("SELECT * FROM ".$tableName." WHERE id IN ({$arrayId})", ARRAY_A);
        if(count($data) > 0) {
            $dataResult = $this->getDataAutoReplacLinks($data);
            return $dataResult;
        }
        return false;
    }

    public function replaceAll(){
        if(isset($_POST)) {

            $dataAutoReplacLinks = $this->get_dataByArrayId($_POST['id']);
            if($dataAutoReplacLinks == false) return false;

            //error_log(print_r($this->get_dataByArrayId($_POST['id']), true));
            $posts = get_posts( array(
                'numberposts'     => -1, // тоже самое что posts_per_page
                'offset'          => 0,
                'category'        => '',
                'orderby'         => 'post_date',
                'order'           => 'DESC',
                'include'         => '',
                'exclude'         => '',
                'meta_key'        => '',
                'meta_value'      => '',
                'post_type'       => 'any',
                'post_mime_type'  => '', // image, video, video/mp4
                'post_parent'     => '',
                'post_status'     => 'publish'
            ) );
            foreach($posts as $post){ setup_postdata($post);
                // формат вывода
                //error_log(print_r($post->post_content, true));


                foreach($dataAutoReplacLinks as $key=>$dataAutoReplacLink){
                    //error_log(print_r($dataAutoReplacLink['data'], true));
                    extract($dataAutoReplacLink['data']);
                    foreach($dataAutoReplacLink['anchor'] as $anchor){
                        //error_log(preg_quote($anchor).'  '.$url);
                        //error_log(print_r($dataAutoReplacLink, true));
                        $post->post_content = preg_replace_callback(
                            '/('.preg_quote($anchor).')|(\b)(<a .*?>'.preg_quote($anchor).'<\/a>)(\b)/m',
                            function($matches) use ($anchor, $url, $nofollow, $replace, $target, $event){
                                //error_log(print_r($matches, true));
                                if(strpos($matches[0], '<a') === false){
                                    $matches[0] = '<a href="'.$url.'" '.$nofollow.' class="TPAutoLinks" '.$target
                                                  .' '.$event.'>'.$anchor.'</a>';
                                } else{
                                    if($replace == 1){
                                        $matches[0] = '<a href="'.$url.'" '.$nofollow.' class="TPAutoLinks" '.$target
                                                      .' '.$event.'>'.$anchor.'</a>';
                                    }
                                }
                                return $matches[0];
                            },
                            //array( &$this, 'tp_preg_replace'),
                            $post->post_content,
                            -1,
                            $count
                        );
                    }
                }

                //error_log($post->post_content );
                wp_update_post(array(
                    'ID' => $post->ID,
                    'post_content' => $post->post_content
                ));

            }

            wp_reset_postdata();

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

    /**
     * @return array|bool
     */
    public function getDataAutoReplacLinks($data = false){
        if($data == false) $data = $this->get_data();
        if($data == false) return false;
        $dataResult = array();
        foreach($data as $item){
            $dataResult[$item['id']]['data']['url'] = $item['arl_url'];
            $dataResult[$item['id']]['data']['nofollow'] = ($item['arl_nofollow'] == 1) ? 'rel="nofollow"' : '';
            $dataResult[$item['id']]['data']['target'] = ($item['arl_target_blank'] == 1) ? 'target="_blank"' : '';
            $dataResult[$item['id']]['data']['replace'] = $item['arl_replace'];
            $dataResult[$item['id']]['anchor'] = explode(",", $item['arl_anchor']);
            $dataResult[$item['id']]['data']['event'] = (!empty($item['arl_event']))  ? 'onclick="'.$item['arl_event'].'"' : '';
        }
        return $dataResult;

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