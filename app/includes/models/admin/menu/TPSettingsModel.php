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
        add_action('wp_ajax_export_settings',      array( &$this, 'exportSettings'));
        add_action('wp_ajax_nopriv_export_settings',array( &$this, 'exportSettings'));
        add_action('wp_ajax_import_settings',      array( &$this, 'importSettings'));
        add_action('wp_ajax_nopriv_import_settings',array( &$this, 'importSettings'));
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
        TPPlugin::deleteCacheAll();
        return $result;
    }
    public function exportSettings(){
        /*$export = json_encode(TPPlugin::$options);
        $fileName = KPDPlUGIN_NAME."Settings.txt";
        $file = fopen($fileName , "w");
        chmod(KPDPlUGIN_DIR."/".KPDPlUGIN_NAME."Settings.txt", 0777);
        fwrite($file, $export);
        fclose($file);

        echo  KPDPlUGIN_URL.KPDPlUGIN_NAME."Settings.txt";*/
        $export = TPPlugin::$options;
        $fileName = KPDPlUGIN_NAME."Settings.txt";
        echo json_encode(array('export_settings'=>$export, 'filename' => $fileName));
    }
    public function importSettings(){
        $base64 = $_POST['value'];
        if ( strpos($base64, 'text/plain') ) {
            $file = str_replace('data:text/plain;base64,', '', $base64);
            $file = str_replace(' ', '+', $file);
            $data = base64_decode($file);
            $options = json_decode($data,true);
            if(is_array($options)){
                update_option( KPDPlUGIN_OPTION_NAME, $options);
            }
        }
    }
}