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
        add_filter( 'widget_update_callback', array( &$this, 'deleteCacheWidget'), 10, 4 );
    }
    abstract public function get_data($args = array());

    /**
     * @param string $key
     * @param string $direction
     * @return string
     */
    public function cacheKey($key = '', $direction = '', $widget = 0){
        $cacheKey = '';

        if ($widget == 0) {
            global $post;
            if (!empty($direction)){
                $cacheKey = strtolower($key."_".$direction."_".TPOPlUGIN_NAME."_".get_post_type()."_".$post->ID);
            } else {
                $cacheKey = strtolower($key."_".TPOPlUGIN_NAME."_".get_post_type()."_".$post->ID);
            }
        } elseif ($widget == 1) {
            if (!empty($direction)){
                $cacheKey = strtolower($key."_".$direction."_".TPOPlUGIN_NAME."_widget");
            } else {
                $cacheKey = strtolower($key."_".TPOPlUGIN_NAME."_widget");
            }
        } else {
            if (!empty($direction)){
                $cacheKey = strtolower($key."_".$direction."_".TPOPlUGIN_NAME."_");
            } else {
                $cacheKey = strtolower($key."_".TPOPlUGIN_NAME."_");
            }
        }

        //error_log('Widget = '.$widget);
        //error_log($cacheKey);

        return $cacheKey;
    }
    /**
     * @param $post_id
     */
    public function deleteCache($post_id){
        //error_log('deleteCache');
        global $wpdb;
        $cacheKey = '';
        $cacheKey = strtolower("_".TPOPlUGIN_NAME."_".get_post_type()."_".$post_id);
        $wpdb->query("DELETE FROM {$wpdb->options} WHERE option_name LIKE ('_transient%{$cacheKey}%')");
    }

    /**
     * @param $instance
     * @param $new_instance
     * @param $old_instance
     * @param $widget
     * @return mixed
     */
    public function deleteCacheWidget($instance, $new_instance, $old_instance, $widget){
        if(strpos($widget->id_base, 'travelpayouts_') !== false){
            //error_log('deleteCacheWidget');
            //error_log(print_r($widget->id_base, true));
            global $wpdb;
            $cacheKey = '';
            $cacheKey = strtolower("_".TPOPlUGIN_NAME."_widget");
            $wpdb->query("DELETE FROM {$wpdb->options} WHERE option_name LIKE ('_transient%{$cacheKey}%')");
        }
        return $instance;
    }

}