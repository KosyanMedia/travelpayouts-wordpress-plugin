<?php
/**
 * Created by PhpStorm.
 * User: freeman
 * Date: 13.08.15
 * Time: 10:08
 */

abstract class KPDShortcodesCacheModel {
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
        $cacheKey = $key."_".$direction."_".KPDPlUGIN_NAME."_".get_post_type()."_".$post->ID;
        return $cacheKey;
    }
    /**
     * @param $post_id
     */
    public function deleteCache($post_id){
        global $wpdb;
        $cacheKey = '';
        $cacheKey = "_".KPDPlUGIN_NAME."_".get_post_type()."_".$post_id;
        $wpdb->query("DELETE FROM {$wpdb->options} WHERE option_name LIKE ('_transient%{$cacheKey}%')");
    }

}