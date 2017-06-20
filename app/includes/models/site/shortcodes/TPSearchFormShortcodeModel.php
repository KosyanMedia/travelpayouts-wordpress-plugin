<?php
/**
 * Created by PhpStorm.
 * User: freeman
 * Date: 12.08.15
 * Time: 18:39
 */
namespace app\includes\models\site\shortcodes;
class TPSearchFormShortcodeModel {
    public static $tableName = "tp_search_shortcodes";
    public function get_dataId($id)
    {
        if(!$id) return false;
        global $wpdb;
        $tableName = $wpdb->prefix .self::$tableName;
        $data = $wpdb->get_row("SELECT * FROM ".$tableName ." WHERE id= ".(int)$id, ARRAY_A);
        if(count($data) > 0) return $data;
        return false;
    }

    public function getDataFromSlug($slug)
    {
        if(!$slug) return false;
        global $wpdb;
        $tableName = $wpdb->prefix .self::$tableName;
        $data = $wpdb->get_row("SELECT * FROM ".$tableName ." WHERE slug='{$slug}'", ARRAY_A);
        if(count($data) > 0) return $data;
        return false;
    }

    /**
     * @param $form
     * @return string
     */
    public function getTypeForm($form){
        $type = "";
        preg_match('/"form_type":\s*"(.*?)"/', $form,  $matches);
        if(isset($matches[1]) && !empty($matches[1]))
            return $matches[1];
        return $type;
    }
}