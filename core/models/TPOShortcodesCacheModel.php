<?php
/**
 * Created by PhpStorm.
 * User: freeman
 * Date: 13.08.15
 * Time: 10:08
 */
namespace core\models;
abstract class TPOShortcodesCacheModel {
    public function __construct(){
        add_action( 'save_post', array( &$this, 'deleteCache') );
    }
    abstract public function get_data($args = array());

    /**
     * @param string $key
     * @param string $direction
     * @return string
     */
    public function cacheKey($key = '', $direction = ''){
        $cacheKey = '';
        global $post;
        if(!empty($direction))
            $cacheKey = strtolower($key."_".$direction."_".TPOPlUGIN_NAME."_".get_post_type()."_".$post->ID);
        else
            $cacheKey = strtolower($key."_".TPOPlUGIN_NAME."_".get_post_type()."_".$post->ID);
        return $cacheKey;
    }
    /**
     * @param $post_id
     */
    public function deleteCache($post_id){
        global $wpdb;
        $cacheKey = '';
        $cacheKey = strtolower("_".TPOPlUGIN_NAME."_".get_post_type()."_".$post_id);
        $wpdb->query("DELETE FROM {$wpdb->options} WHERE option_name LIKE ('_transient%{$cacheKey}%')");
    }

}