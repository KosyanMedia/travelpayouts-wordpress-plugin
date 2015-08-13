<?php
abstract class KPDPlugin {
    public static $adminNotice;
    public static $options;
    protected function __construct(){
        new KPDLocalization();
        self::$options = get_option(KPDPlUGIN_OPTION_NAME);
        self::$adminNotice = new KPDAdminNotice();
    }
    public static function deleteCacheAll(){
        global $wpdb;
        $cacheKey = '';
        $cacheKey = KPDPlUGIN_NAME."_";
        $wpdb->query("DELETE FROM {$wpdb->options} WHERE option_name LIKE ('_transient%{$cacheKey}%')");
    }
}
