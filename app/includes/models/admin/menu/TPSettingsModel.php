<?php
/**
 * Created by PhpStorm.
 * User: freeman
 * Date: 10.08.15
 * Time: 11:05
 */

class TPSettingsModel extends KPDOptionModel{
    public function __construct(){
        parent::__construct();
    }
    public function create_option()
    {
        // TODO: Implement create_option() method.
        register_setting(
            'TPSettings',
            KPDPlUGIN_OPTION_NAME,
            array(&$this,'save_option')
        );
        $field = new TPFieldSettings();
        add_settings_section( 'tp_settings_account_id', '', '', 'tp_settings_account' );
        add_settings_field('tp_account_td', '', array(&$field ,'TPFieldAccount'),
            'tp_settings_account', 'tp_settings_account_id' );
        add_settings_section( 'tp_settings_config_id', '', '', 'tp_settings_config' );
        add_settings_field('tp_config_td', '', array(&$field ,'TPFieldConfig'),
            'tp_settings_config', 'tp_settings_config_id' );
        add_settings_section( 'tp_settings_local_id', '', '', 'tp_settings_local' );
        add_settings_field('tp_local_td', '', array(&$field ,'TPFieldLocal'),
            'tp_settings_local', 'tp_settings_local_id' );
    }

    public function save_option($input)
    {
        // TODO: Implement save_option() method.
        $result = array_merge(TPPlugin::$options, $input);
        return $result;
    }
}