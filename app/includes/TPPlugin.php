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
        if (!version_compare(PHP_VERSION, '5.3.0', '>=')) {
            deactivate_plugins(TPOPlUGIN_NAME);
            wp_die("");
        }else{
            if( ! get_option(TPOPlUGIN_OPTION_NAME) )
                update_option( TPOPlUGIN_OPTION_NAME, TPDefault::defaultOptions() );
            models\admin\menu\TPSearchFormsModel::createTable();
        }
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
