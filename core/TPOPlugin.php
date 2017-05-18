<?php
namespace core;
abstract class TPOPlugin {
    public static $adminNotice;
    public static $options;
    protected function __construct(){
        new TPOLocalization();
        self::$options = get_option(TPOPlUGIN_OPTION_NAME);
        self::$adminNotice = new TPOAdminNotice();
    }
    private function __clone() {}
    public static function deleteCacheAll(){
        global $wpdb;
        $cacheKey = '';
        $cacheKey = strtolower ( TPOPlUGIN_NAME."_");
        $wpdb->query("DELETE FROM {$wpdb->options} WHERE option_name LIKE ('_transient%{$cacheKey}%')");
    }

}
