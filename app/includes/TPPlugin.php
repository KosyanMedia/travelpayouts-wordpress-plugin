<?php

namespace app\includes;
use app\includes\common\TPCurrencyUtils;

class TPPlugin extends \core\TPOPlugin implements \core\TPOPluginInterface{
    public static $TPRequestApi;
    private static $instance = null;

    /**
     * @return TPPlugin|null
     */
    public static function getInstance()
    {
        if (null === self::$instance)
        {
            self::$instance = new self();
        }
        return self::$instance;
    }

    protected function __construct() {
        $method = __CLASS__." -> ". __METHOD__." -> ".__LINE__;
        if(TPOPlUGIN_ERROR_LOG)
            error_log($method." -> Start");
        parent::__construct();
        new TPLoader();
        //self::check_plugin_update();
        if(TPOPlUGIN_ERROR_LOG)
            error_log($method." -> End");
        add_action('plugins_loaded', array(&$this, 'setDefaultOptions'));
        add_action('plugins_loaded', array(&$this, 'checkPluginUpdate'));
    }

    public function setDefaultOptions(){
        if(TPOPlUGIN_ERROR_LOG)
            error_log("setDefaultOptions");
        if( ! get_option(TPOPlUGIN_OPTION_NAME) )
            update_option( TPOPlUGIN_OPTION_NAME, TPDefault::defaultOptions() );
        if( ! get_option(TPOPlUGIN_OPTION_VERSION) )
            update_option(TPOPlUGIN_OPTION_VERSION, TPOPlUGIN_VERSION);
    }
    public function checkPluginUpdate() {
        if(TPOPlUGIN_ERROR_LOG)
            error_log("checkPluginUpdate");
        //error_log(print_r( TPDefault::defaultOptions(),true));
        //error_log(is_plugin_active('travelpayouts/travelpayouts.php'));
        if (!is_plugin_active('travelpayouts/travelpayouts.php')) return;
        if( ! get_option(TPOPlUGIN_OPTION_VERSION) || get_option(TPOPlUGIN_OPTION_VERSION) != TPOPlUGIN_VERSION) {
            if( ! get_option(TPOPlUGIN_OPTION_NAME) ){
                update_option( TPOPlUGIN_OPTION_NAME, TPDefault::defaultOptions() );
            } else{
                //$settings = array_replace_recursive(self::$options, TPDefault::defaultOptions());
                $settings = array_replace_recursive(TPDefault::defaultOptions(), self::$options);
                update_option( TPOPlUGIN_OPTION_NAME, $settings);
            }
            if (version_compare(get_option(TPOPlUGIN_OPTION_VERSION), '0.5.2', '<')) {
                if(TPOPlUGIN_ERROR_LOG)
                    error_log("currency default version = ".get_option(TPOPlUGIN_OPTION_VERSION) );
                self::$options['local']['currency'] = TPCurrencyUtils::getDefaultCurrency();
                update_option( TPOPlUGIN_OPTION_NAME,  self::$options);
            }
            if(!empty(self::$options['account']['marker'])){
                $request = 'http://metrics.aviasales.ru/?goal=tp_wp_plugin_activation&data={"merker":'
                    .self::$options['account']['marker'].',"domain":"'.preg_replace("(^https?://)", "", get_option('home')).'"}';
                $string = htmlspecialchars($request);
                $response = wp_remote_get( $string, array('headers' => array(
                    'Accept-Encoding' => 'gzip, deflate',
                )) );

            }

            update_option(TPOPlUGIN_OPTION_VERSION, TPOPlUGIN_VERSION);
        }
        models\admin\menu\TPSearchFormsModel::createTable();
        models\admin\menu\TPAutoReplacLinksModel::createTable();
        models\site\shortcodes\TPSpecialOfferShortcodeModel::createTable();

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
            models\admin\menu\TPSearchFormsModel::createTable();
            models\admin\menu\TPAutoReplacLinksModel::createTable();
            models\site\shortcodes\TPSpecialOfferShortcodeModel::createTable();
            //error_log(print_r( TPDefault::defaultOptions(),true));
        }
    }

    static public function deactivation()
    {
        // TODO: Implement deactivation() method.

        //models\admin\menu\TPAutoReplacLinksModel::deleteTable();
        //models\admin\menu\TPSearchFormsModel::deleteTable();
        models\site\shortcodes\TPSpecialOfferShortcodeModel::deleteTable();
        self::deleteCacheAll();
        delete_option( TPOPlUGIN_OPTION_NAME);
        //delete_option( TPOPlUGIN_OPTION_VERSION);
        //delete_option( TPOPlUGIN_TABLE_SF_VERSION);
        //delete_option( TPOPlUGIN_TABLE_ARL_VERSION);
        delete_option( TPOPlUGIN_TABLE_SPECIAL_OFFER_VERSION);
        delete_option( TPOPlUGIN_TABLE_SPECIAL_ROUTE_VERSION);
    }

    static public function uninstall()
    {
        // TODO: Implement uninstall() method.
        models\admin\menu\TPSearchFormsModel::deleteTable();
        models\admin\menu\TPAutoReplacLinksModel::deleteTable();
        models\site\shortcodes\TPSpecialOfferShortcodeModel::deleteTable();
        delete_option( TPOPlUGIN_OPTION_NAME);
        delete_option( TPOPlUGIN_OPTION_VERSION);
        delete_option( TPOPlUGIN_TABLE_SF_VERSION);
        delete_option( TPOPlUGIN_TABLE_ARL_VERSION);
        delete_option( TPOPlUGIN_TABLE_SPECIAL_OFFER_VERSION);
        delete_option( TPOPlUGIN_TABLE_SPECIAL_ROUTE_VERSION);
    }

}
$TPPlugin = TPPlugin::getInstance();//new TPPlugin();

