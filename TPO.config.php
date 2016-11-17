<?php
define("TPOPlUGIN_DIR", dirname(__FILE__));
define("TPOPlUGIN_URL", plugin_dir_url( __FILE__ ));
define("TPOPlUGIN_SLUG", preg_replace( '/[^\da-zA-Z]/i', '_',  basename(TPOPlUGIN_DIR)));
define("TPOPlUGIN_TEXTDOMAIN", str_replace( '_', '-', TPOPlUGIN_SLUG ));
define("TPOPlUGIN_OPTION_VERSION", TPOPlUGIN_SLUG.'_version');
define("TPOPlUGIN_OPTION_NAME", TPOPlUGIN_SLUG.'_options');
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
define("TPOPlUGIN_DATABASE", 5);
define("TPOPlUGIN_TABLE_SF_VERSION", TPOPlUGIN_SLUG.'_table_sf_version');
define("TPOPlUGIN_TABLE_ARL_VERSION", TPOPlUGIN_SLUG.'_table_arl_version');
define("TPOPlUGIN_TABLE_SPECIAL_OFFER_VERSION", TPOPlUGIN_SLUG.'_table_special_offer_version');
define("TPOPlUGIN_TABLE_SPECIAL_ROUTE_VERSION", TPOPlUGIN_SLUG.'_table_special_route_version');
define("TPOPlUGIN_ERROR_LOG", false);
//Использование своих файлов переводов
define("TPOPlUGIN_CUSTOM_LOCALIZATION", false);
