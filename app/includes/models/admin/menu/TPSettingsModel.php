<?php
/**
 * Created by PhpStorm.
 * User: freeman
 * Date: 10.08.15
 * Time: 11:05
 */
namespace app\includes\models\admin\menu;
use app\includes\common\TPCurrencyUtils;

class TPSettingsModel extends \app\includes\models\admin\TPOptionModel{
    public function __construct(){
        parent::__construct();
        add_action('wp_ajax_export_settings',      array( &$this, 'exportSettings'));
        add_action('wp_ajax_nopriv_export_settings',array( &$this, 'exportSettings'));
        add_action('wp_ajax_import_settings',      array( &$this, 'importSettings'));
        add_action('wp_ajax_nopriv_import_settings',array( &$this, 'importSettings'));

        add_action('wp_ajax_default_settings',      array( &$this, 'defaultSettings'));
        add_action('wp_ajax_nopriv_default_settings',array( &$this, 'defaultSettings'));
    }
    public function create_option()
    {
        // TODO: Implement create_option() method.
        register_setting(
            'TPSettings',
            TPOPlUGIN_OPTION_NAME,
            array(&$this,'save_option')
        );
        $field = new TPFieldSettings();
        add_settings_section( 'tp_settings_account_id', '', '', 'tp_settings_account' );
        add_settings_field('tp_account_td', '', array(&$field ,'TPFieldAccount'),
            'tp_settings_account', 'tp_settings_account_id' );
        add_settings_section( 'tp_settings_plugin_config_id', '', '', 'tp_settings_plugin_config' );
        add_settings_field('tp_config_plugin_td', '', array(&$field ,'TPFieldConfig'),
            'tp_settings_plugin_config', 'tp_settings_plugin_config_id' );
        add_settings_section( 'tp_settings_local_id', '', '', 'tp_settings_local' );
        add_settings_field('tp_local_td', '', array(&$field ,'TPFieldLocal'),
            'tp_settings_local', 'tp_settings_local_id' );
    }

    public function exportSettings(){
        /*$export = json_encode(TPPlugin::$options);
        $fileName = TPOPlUGIN_NAME."Settings.txt";
        $file = fopen($fileName , "w");
        chmod(TPOPlUGIN_DIR."/".TPOPlUGIN_NAME."Settings.txt", 0777);
        fwrite($file, $export);
        fclose($file);

        echo  TPOPlUGIN_URL.TPOPlUGIN_NAME."Settings.txt";*/
        $options = \app\includes\TPPlugin::$options;
        $options['plugin_version'] = TPOPlUGIN_VERSION;
        $options['search_forms'] = TPSearchFormsModel::getAllSearchForms();
        //error_log(print_r($options['search_forms'], true));
        $export = json_encode($options);
        echo $export;
    }
    public function importSettings(){
        if(is_array($_POST['value'])){
            if(TPOPlUGIN_ERROR_LOG)
                error_log(print_r($_POST['value'], true));
            $import_options = $_POST['value'];
            //error_log(print_r($import_options, true));
            if (!array_key_exists('plugin_version', $import_options)){
                if(TPOPlUGIN_ERROR_LOG)
                    error_log('array_key_exists false plugin_version < 0.5.2');
                $import_options['local']['currency'] = TPCurrencyUtils::getDefaultCurrency();
            } else {
                if(TPOPlUGIN_ERROR_LOG)
                    error_log('array_key_exists true plugin_version');
                //error_log($import_options['plugin_version']);
                if (version_compare($import_options['plugin_version'], '0.7.0', '<')) {
                    //error_log($import_options['plugin_version'].'Test');
                    $import_options['config']['cache_value'] = array(
                        'hotel' => 24,
                        'flight' => 3
                    );
                }

            }

            $searchForms = array();
            if (array_key_exists('search_forms', $import_options)){
                $searchForms = $import_options['search_forms'];
                unset($import_options['search_forms']);
                //error_log(print_r($searchForms, true));
                TPSearchFormsModel::importSearchForm($searchForms);
            }

            //error_log(print_r($import_options, true));
            $settings = array_replace_recursive(\app\includes\TPPlugin::$options, $import_options);
            if(TPOPlUGIN_ERROR_LOG)
                error_log(print_r($settings['local']['currency'], true));
            update_option( TPOPlUGIN_OPTION_NAME, $settings);
            \app\includes\TPPlugin::deleteCacheAll();
        }

    }
    public function defaultSettings(){
        update_option( TPOPlUGIN_OPTION_NAME, \app\includes\TPDefault::defaultOptions());
    }

}