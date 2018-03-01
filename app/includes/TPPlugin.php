<?php

namespace app\includes;
use app\includes\common\TPCurrencyUtils;

class TPPlugin extends \core\TPOPlugin implements \core\TPOPluginInterface{

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
        add_action('plugins_loaded', array(&$this, 'setDefaultOptions'), 100);
        add_action('plugins_loaded', array(&$this, 'checkPluginUpdate'), 100);
        add_action( 'upgrader_process_complete', array(&$this, 'upgraderProcessComplete'), 10, 2);
        if( ! get_option(TPOPlUGIN_OPTION_STATISTICS_KEEN) ) {
            add_action('admin_footer', array(&$this, 'sendStatisticsKeen'), 500);
        }
    }

    /**
     * @param $upgrader_object
     * @param $options
     */
    public function upgraderProcessComplete($upgrader_object, $options){
        //
        if ($options['action'] == 'update' && $options['type'] == 'plugin' ){
            foreach($options['plugins'] as $each_plugin){
                if ($each_plugin == TPOPlUGIN_BASENAME){
                    delete_option( TPOPlUGIN_OPTION_STATISTICS_KEEN);
                }
            }
        }
    }

    /**
     *
     */
    public function sendStatisticsKeen(){
        update_option(TPOPlUGIN_OPTION_STATISTICS_KEEN, 'sendStatisticsKeen');
        $statistics = array(
            'marker' => self::$options['account']['marker'],
            'domain' => preg_replace("(^https?://)", "", get_option('home')),
            'php' => PHP_VERSION,
        );
        $statistics = json_encode($statistics);
        $statistics = base64_encode($statistics);
        $keen = 'https://api.keen.io/3.0/projects/';
        $keen_project_id = '5a97f593c9e77c00010a8ef1';
        $keen_write_key = '587E43D1198FD5D0B215514CB785AF25AC0E10D175C1F7844F1BFD35B684518B0F3C8A6CAD424ECF5E8F5A6BCD4F'
            .'7DA140D7D8D56B524FCAA568D6FFDD51C1125845D447EA5F920C14B7D323228E064FF5B0BC6F05A262C0B120706ABE19C512';
        $output = '<img src="'.$keen.$keen_project_id.'/events/email_opened?api_key='.$keen_write_key
            .'&data='.$statistics.'"></img>';
        echo $output;
    }

    public function setDefaultOptions(){
        if(TPOPlUGIN_ERROR_LOG)
            error_log("setDefaultOptions");
        if( ! get_option(TPOPlUGIN_OPTION_NAME) )
            update_option( TPOPlUGIN_OPTION_NAME, TPDefault::defaultOptions() );
        if( ! get_option(TPOPlUGIN_OPTION_VERSION) )
            update_option(TPOPlUGIN_OPTION_VERSION, TPOPlUGIN_VERSION);
    }

    /**
     *
     */
    public function checkPluginUpdate() {
        if(TPOPlUGIN_ERROR_LOG)
            error_log("checkPluginUpdate");
        if (!is_plugin_active('travelpayouts/travelpayouts.php')) return;
        if( ! get_option(TPOPlUGIN_OPTION_VERSION) || get_option(TPOPlUGIN_OPTION_VERSION) != TPOPlUGIN_VERSION) {
	        self::deleteCacheAll();
        	if( ! get_option(TPOPlUGIN_OPTION_NAME) ){
                update_option( TPOPlUGIN_OPTION_NAME, TPDefault::defaultOptions() );
            } else{
                //$settings = array_replace_recursive(self::$options, TPDefault::defaultOptions());
                $settings = array_replace_recursive(TPDefault::defaultOptions(), get_option(TPOPlUGIN_OPTION_NAME));
                update_option( TPOPlUGIN_OPTION_NAME, $settings);
            }
            if (version_compare(get_option(TPOPlUGIN_OPTION_VERSION), '0.5.2', '<')) {
                if(TPOPlUGIN_ERROR_LOG)
                    error_log("currency default version = ".get_option(TPOPlUGIN_OPTION_VERSION) );
                $options = get_option(TPOPlUGIN_OPTION_NAME);
                $options['local']['currency'] = TPCurrencyUtils::getDefaultCurrency();
                update_option( TPOPlUGIN_OPTION_NAME,  $options);
            }

            if (version_compare(get_option(TPOPlUGIN_OPTION_VERSION), '0.7.0', '<')) {
                $options = get_option(TPOPlUGIN_OPTION_NAME);
                $options['config']['cache_value'] = array(
                    'hotel' => 24,
                    'flight' => 3
                );
                update_option( TPOPlUGIN_OPTION_NAME,  $options);
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
        //models\site\shortcodes\TPSpecialOfferShortcodeModel::createTable();
        models\site\shortcodes\hotels\TPHotelListModel::createTable();

    }

    /**
     *
     */
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
            //models\site\shortcodes\TPSpecialOfferShortcodeModel::createTable();
            models\site\shortcodes\hotels\TPHotelListModel::createTable();
            //error_log(print_r( TPDefault::defaultOptions(),true));
        }
    }

    static public function deactivation()
    {
        // TODO: Implement deactivation() method.

        //models\admin\menu\TPAutoReplacLinksModel::deleteTable();
        //models\admin\menu\TPSearchFormsModel::deleteTable();
        //models\site\shortcodes\TPSpecialOfferShortcodeModel::deleteTable();
        self::deleteCacheAll();
        //delete_option( TPOPlUGIN_OPTION_NAME);
        delete_option( TPOPlUGIN_OPTION_VERSION);
        delete_option( TPOPlUGIN_OPTION_STATISTICS_KEEN);
        //delete_option( TPOPlUGIN_TABLE_SF_VERSION);
        //delete_option( TPOPlUGIN_TABLE_ARL_VERSION);
        //delete_option( TPOPlUGIN_TABLE_SPECIAL_OFFER_VERSION);
        //delete_option( TPOPlUGIN_TABLE_SPECIAL_ROUTE_VERSION);
    }

    static public function uninstall()
    {
        // TODO: Implement uninstall() method.
        models\admin\menu\TPSearchFormsModel::deleteTable();
        models\admin\menu\TPAutoReplacLinksModel::deleteTable();
        models\site\shortcodes\TPSpecialOfferShortcodeModel::deleteTable();
        models\site\shortcodes\hotels\TPHotelListModel::deleteTable();
        delete_option( TPOPlUGIN_OPTION_NAME);
        delete_option( TPOPlUGIN_OPTION_VERSION);
        delete_option( TPOPlUGIN_TABLE_SF_VERSION);
        delete_option( TPOPlUGIN_TABLE_HOTEL_LIST_VERSION);
        delete_option( TPOPlUGIN_TABLE_ARL_VERSION);
        delete_option( TPOPlUGIN_TABLE_SPECIAL_OFFER_VERSION);
        delete_option( TPOPlUGIN_TABLE_SPECIAL_ROUTE_VERSION);
        delete_option( TPOPlUGIN_OPTION_STATISTICS_KEEN);
    }

}
$TPPlugin = TPPlugin::getInstance();//new TPPlugin();

