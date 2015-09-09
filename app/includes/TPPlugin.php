<?php
namespace app\includes;
class TPPlugin extends \core\TPOPlugin implements \core\TPOPluginInterface{
    public static $TPRequestApi;
    public function __construct() {
        parent::__construct();
        new TPLoader();
    }

    static public function activation()
    {
        // TODO: Implement activation() method.
        if( ! get_option(TPOPlUGIN_OPTION_NAME) )
            update_option( TPOPlUGIN_OPTION_NAME, TPDefault::defaultOptions() );
        models\admin\menu\TPSearchFormsModel::createTable();
        //error_log(WP_PLUGIN_DIR);
        //$sdirs = scandir(WP_PLUGIN_DIR);
        //error_log(print_r($sdirs, true));
    }

    static public function deactivation()
    {
        // TODO: Implement deactivation() method.
        delete_option( TPOPlUGIN_OPTION_NAME);
        self::deleteCacheAll();
    }

    static public function uninstall()
    {
        // TODO: Implement uninstall() method.
        models\admin\menu\TPSearchFormsModel::deleteTable();
    }
}
$TPPlugin = new TPPlugin();
