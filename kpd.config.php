<?php
define("KPDPlUGIN_DIR", dirname(__FILE__));
define("KPDPlUGIN_URL", plugin_dir_url( __FILE__ ));
define("KPDPlUGIN_SLUG", preg_replace( '/[^\da-zA-Z]/i', '_',  basename(KPDPlUGIN_DIR)));
define("KPDPlUGIN_TEXTDOMAIN", str_replace( '_', '-', KPDPlUGIN_SLUG ));
define("KPDPlUGIN_OPTION_VERSION", KPDPlUGIN_SLUG.'_version');
define("KPDPlUGIN_OPTION_NAME", KPDPlUGIN_SLUG.'_options');
define("KPDPlUGIN_AJAX_URL", admin_url('admin-ajax.php'));
define("KPDPlUGIN_DIR_LOCALIZATION", plugin_basename(KPDPlUGIN_DIR.'/lang/'));
if ( ! function_exists( 'get_plugins' ) ) {
    require_once ABSPATH . 'wp-admin/includes/plugin.php';
}
$KPDPlugins = get_plugin_data(KPDPlUGIN_DIR.'/'.basename(KPDPlUGIN_DIR).'.php', false, false);
//error_log(print_r($KPDPlugins, true));
define("KPDPlUGIN_VERSION", $KPDPlugins['Version']);
define("KPDPlUGIN_NAME", $KPDPlugins['Name']);
