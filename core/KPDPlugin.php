<?php
abstract class KPDPlugin {
    public static $options;
    protected function __construct(){
        self::$options = get_option(KPDPlUGIN_OPTION_NAME);
    }
    public static function deleteCacheAll(){
        global $wpdb;
        $cacheKey = '';
        $cacheKey = KPDPlUGIN_NAME."_";
        $wpdb->query("DELETE FROM {$wpdb->options} WHERE option_name LIKE ('_transient%{$cacheKey}%')");
    }
}
