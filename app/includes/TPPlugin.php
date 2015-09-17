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
            global $locale;
            $error_msg = '';
            switch($locale) {
                case "ru_RU":
                    $error_msg = '<p>К сожалению, плагин Travelpayouts не работает с версиями PHP ниже чем 5.3.х.
                Ознакомьтесь с информацией о том, <a href="https://support.travelpayouts.com/hc/ru/articles/207794617#02?utm_source=wpplugin&utm_medium=php_error&utm_campaign=ru">
                как вы можете обновиться</a>.</p>';
                    break;
                case "en_US":
                    $error_msg = '<p>Unfortunately, Travelpayouts plugin can not run on PHP versions that are older than 5.3.х.
                Read more information about <a href="https://support.travelpayouts.com/hc/en-us/articles/207794617#02?utm_source=wpplugin&utm_medium=php_error&utm_campaign=en">
                how you can update</a>.</p>';
                    break;
                default:
                    $error_msg = '<p>Unfortunately, Travelpayouts plugin can not run on PHP versions that are older than 5.3.х.
                Read more information about <a href="https://support.travelpayouts.com/hc/en-us/articles/207794617#02?utm_source=wpplugin&utm_medium=php_error&utm_campaign=en">
                how you can update</a>.</p>';
                    break;
            }
            deactivate_plugins(TPOPlUGIN_NAME);
            wp_die($error_msg);
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
