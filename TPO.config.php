<?php

define("TPOPlUGIN_DIR", dirname(__FILE__));
define("TPOPlUGIN_URL", plugin_dir_url( __FILE__ ));
define("TPOPlUGIN_SLUG", preg_replace( '/[^\da-zA-Z]/i', '_',  basename(TPOPlUGIN_DIR)));
define("TPOPlUGIN_TEXTDOMAIN", str_replace( '_', '-', TPOPlUGIN_SLUG ));
define("TPOPlUGIN_OPTION_VERSION", TPOPlUGIN_SLUG.'_version');
define("TPOPlUGIN_OPTION_NAME", TPOPlUGIN_SLUG.'_options');
define("TPOPlUGIN_OPTION_STATISTICS_KEEN", TPOPlUGIN_SLUG.'_option_statistics_keen');
define("TPOPlUGIN_AJAX_URL", admin_url('admin-ajax.php'));
define("TPOPlUGIN_DIR_LOCALIZATION", plugin_basename(TPOPlUGIN_DIR.'/lang/'));
define("TPOPlUGIN_ABSPATH_DIR_LOCALIZATION", TPOPlUGIN_DIR.'/lang/');
if ( ! function_exists( 'get_plugins' ) ) {
    require_once ABSPATH . 'wp-admin/includes/plugin.php';
}
$TPOPlUGINs = get_plugin_data(TPOPlUGIN_DIR.'/'.basename(TPOPlUGIN_DIR).'.php', false, false);
//error_log(print_r($TPOPlUGINs, true));
define("TPOPlUGIN_VERSION", $TPOPlUGINs['Version']);
define("TPOPlUGIN_NAME", $TPOPlUGINs['Name']);
define("TPOPlUGIN_DATABASE", 8);
define("TPOPlUGIN_TABLE_SF_VERSION", TPOPlUGIN_SLUG.'_table_sf_version');
define("TPOPlUGIN_TABLE_HOTEL_LIST_VERSION", TPOPlUGIN_SLUG.'_table_hotel_list_version');
define("TPOPlUGIN_TABLE_ARL_VERSION", TPOPlUGIN_SLUG.'_table_arl_version');
define("TPOPlUGIN_TABLE_SPECIAL_OFFER_VERSION", TPOPlUGIN_SLUG.'_table_special_offer_version');
define("TPOPlUGIN_TABLE_SPECIAL_ROUTE_VERSION", TPOPlUGIN_SLUG.'_table_special_route_version');
define("TPOPlUGIN_ERROR_LOG", false);
//Использование своих файлов переводов
define("TPOPlUGIN_CUSTOM_LOCALIZATION", false);
define("TPOPlUGIN_DEBUG_LOG", true);
/**
 * error_log
 * @param $message
 */
function tpErrorLog($message, $className = "", $method = "", $line = ""){
    if (TPOPlUGIN_DEBUG_LOG == true){
        if (!empty($className)){
            error_log($className);
        }
        if (!empty($method)){
            error_log($method);
        }
        if (!empty($line)){
            error_log($line);
        }
        error_log($message);
    }
}
