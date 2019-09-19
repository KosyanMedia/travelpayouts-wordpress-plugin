<?php
/**
 * Created by PhpStorm.
 * User: freeman
 * Date: 10.08.15
 * Time: 11:05
 */

namespace app\includes\models\admin\menu;

use app\includes\common\TPCurrencyUtils;
use app\includes\common\TPUpdateOptions;
use app\includes\TPPlugin;

class TPSettingsModel extends \app\includes\models\admin\TPOptionModel
{

    public function __construct()
    {
        parent::__construct();
        add_action('wp_ajax_export_settings', [&$this, 'exportSettings']);
        add_action('wp_ajax_import_settings', [&$this, 'importSettings']);
        add_action('wp_ajax_default_settings', [&$this, 'defaultSettings']);
    }

    public function create_option()
    {
        // TODO: Implement create_option() method.
        register_setting(
            'TPSettings',
            TPOPlUGIN_OPTION_NAME,
            [&$this, 'save_option']
        );
        $field = new TPFieldSettings();
        add_settings_section('tp_settings_account_id', '', '', 'tp_settings_account');
        add_settings_field('tp_account_td', '', [&$field, 'TPFieldAccount'],
            'tp_settings_account', 'tp_settings_account_id');
        add_settings_section('tp_settings_plugin_config_id', '', '', 'tp_settings_plugin_config');
        add_settings_field('tp_config_plugin_td', '', [&$field, 'TPFieldConfig'],
            'tp_settings_plugin_config', 'tp_settings_plugin_config_id');
        add_settings_section('tp_settings_local_id', '', '', 'tp_settings_local');
        add_settings_field('tp_local_td', '', [&$field, 'TPFieldLocal'],
            'tp_settings_local', 'tp_settings_local_id');
    }

    public function exportSettings()
    {
        if (!$this->checkAccess()) return false;

        $options = array_merge(TPPlugin::$options, [
            'plugin_version' => TPOPlUGIN_VERSION,
            'search_forms' => TPSearchFormsModel::getAllSearchForms(),
        ]);

        $escapedOptions = TPUpdateOptions::unescapeOptions($options);
        echo json_encode($escapedOptions);
    }


    public function importSettings()
    {
        if (!$this->checkAccess()) return false;
        if (isset($_POST['value']) && is_array($_POST['value'])) {
            $import_options = $_POST['value'];
            if (TPOPlUGIN_ERROR_LOG)
                error_log(print_r($import_options, true));
            if (!array_key_exists('plugin_version', $import_options)) {
                if (TPOPlUGIN_ERROR_LOG)
                    error_log('array_key_exists false plugin_version < 0.5.2');
                $import_options['local']['currency'] = TPCurrencyUtils::getDefaultCurrency();
            } else {
                if (TPOPlUGIN_ERROR_LOG)
                    error_log('array_key_exists true plugin_version');
                //error_log($import_options['plugin_version']);
                if (version_compare($import_options['plugin_version'], '0.7.0', '<')) {
                    //error_log($import_options['plugin_version'].'Test');
                    $import_options['config']['cache_value'] = [
                        'hotel' => 24,
                        'flight' => 3
                    ];
                }

            }
            if (array_key_exists('search_forms', $import_options)) {
                $searchForms = $import_options['search_forms'];
                unset($import_options['search_forms']);
                TPSearchFormsModel::importSearchForm($searchForms);
            }

            //error_log(print_r($import_options, true));
            $settings = array_intersect_key($import_options, TPPlugin::$options);
            $settings = TPUpdateOptions::sanitizeSettings($settings);
            $settings = TPUpdateOptions::unescapeOptions($settings);
            if (TPOPlUGIN_ERROR_LOG)
                error_log(print_r($settings['local']['currency'], true));

            update_option(TPOPlUGIN_OPTION_NAME, $settings);
            TPPlugin::deleteCacheAll();
        }

    }

    public function defaultSettings()
    {
        if (!$this->checkAccess()) return false;
        update_option(TPOPlUGIN_OPTION_NAME, \app\includes\TPDefault::defaultOptions());
    }

    public function checkAccess($rights = 'manage_options')
    {
        if (!function_exists('wp_get_current_user')) {
            require_once ABSPATH . 'wp-includes/pluggable.php';
        }
        return current_user_can($rights);
    }

}
