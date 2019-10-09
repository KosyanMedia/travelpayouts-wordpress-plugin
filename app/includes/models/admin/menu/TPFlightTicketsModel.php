<?php
namespace app\includes\models\admin\menu;
use app\includes\TPDefault;
use app\includes\TPPlugin;
use core\TPRequest;

class TPFlightTicketsModel extends TPBaseShortcodeOptionModel {
    public function __construct(){
        parent::__construct();
        add_action('wp_ajax_tp_default_style', [&$this, 'tpDefaultTableStyle']);
        //add_action('wp_ajax_nopriv_tp_default_style', array( &$this, 'tpDefaultTableStyle'));
    }
    public function create_option()
    {
        // TODO: Implement create_option() method.
        register_setting(
            'TPFlightTickets',
            TPOPlUGIN_OPTION_NAME,
            [&$this,'save_option']
        );
        $field = new TPFieldFlightTickets();
        //Shortcode
        add_settings_section( 'tp_settings_shortcode_1_id', '', '', 'tp_settings_shortcode_1' );
        add_settings_field('tp_shortcode_1_td', '', [&$field ,'TPFieldShortcode_1'],
            'tp_settings_shortcode_1', 'tp_settings_shortcode_1_id' );
        add_settings_section( 'tp_settings_shortcode_2_id', '', '', 'tp_settings_shortcode_2' );
        add_settings_field('tp_shortcode_2_td', '', [&$field ,'TPFieldShortcode_2'],
            'tp_settings_shortcode_2', 'tp_settings_shortcode_2_id' );
        add_settings_section( 'tp_settings_shortcode_4_id', '', '', 'tp_settings_shortcode_4' );
        add_settings_field('tp_shortcode_4_td', '', [&$field ,'TPFieldShortcode_4'],
            'tp_settings_shortcode_4', 'tp_settings_shortcode_4_id' );
        add_settings_section( 'tp_settings_shortcode_5_id', '', '', 'tp_settings_shortcode_5' );
        add_settings_field('tp_shortcode_5_td', '', [&$field ,'TPFieldShortcode_5'],
            'tp_settings_shortcode_5', 'tp_settings_shortcode_5_id' );
        add_settings_section( 'tp_settings_shortcode_6_id', '', '', 'tp_settings_shortcode_6' );
        add_settings_field('tp_shortcode_6_td', '', [&$field ,'TPFieldShortcode_6'],
            'tp_settings_shortcode_6', 'tp_settings_shortcode_6_id' );
        add_settings_section( 'tp_settings_shortcode_7_id', '', '', 'tp_settings_shortcode_7' );
        add_settings_field('tp_shortcode_7_td', '', [&$field ,'TPFieldShortcode_7'],
            'tp_settings_shortcode_7', 'tp_settings_shortcode_7_id' );
        add_settings_section( 'tp_settings_shortcode_8_id', '', '', 'tp_settings_shortcode_8' );
        add_settings_field('tp_shortcode_8_td', '', [&$field ,'TPFieldShortcode_8'],
            'tp_settings_shortcode_8', 'tp_settings_shortcode_8_id' );
        add_settings_section( 'tp_settings_shortcode_9_id', '', '', 'tp_settings_shortcode_9' );
        add_settings_field('tp_shortcode_9_td', '', [&$field ,'TPFieldShortcode_9'],
            'tp_settings_shortcode_9', 'tp_settings_shortcode_9_id' );
        add_settings_section( 'tp_settings_shortcode_10_id', '', '', 'tp_settings_shortcode_10' );
        add_settings_field('tp_shortcode_10_td', '', [&$field ,'TPFieldShortcode_10'],
            'tp_settings_shortcode_10', 'tp_settings_shortcode_10_id' );
        add_settings_section( 'tp_settings_shortcode_11_id', '', '', 'tp_settings_shortcode_11' );
        add_settings_field('tp_shortcode_11_td', '', [&$field ,'TPFieldShortcode_11'],
            'tp_settings_shortcode_11', 'tp_settings_shortcode_11_id' );
        add_settings_section( 'tp_settings_shortcode_12_id', '', '', 'tp_settings_shortcode_12' );
        add_settings_field('tp_shortcode_12_td', '', [&$field ,'TPFieldShortcode_12'],
            'tp_settings_shortcode_12', 'tp_settings_shortcode_12_id' );
        add_settings_section( 'tp_settings_shortcode_13_id', '', '', 'tp_settings_shortcode_13' );
        add_settings_field('tp_shortcode_13_td', '', [&$field ,'TPFieldShortcode_13'],
            'tp_settings_shortcode_13', 'tp_settings_shortcode_13_id' );
        add_settings_section( 'tp_settings_shortcode_14_id', '', '', 'tp_settings_shortcode_14' );
        add_settings_field('tp_shortcode_14_td', '', [&$field ,'TPFieldShortcode_14'],
            'tp_settings_shortcode_14', 'tp_settings_shortcode_14_id' );
        add_settings_section( 'tp_settings_style_table_id', '', '', 'tp_settings_style_table' );
        add_settings_field('tp_style_table_td', '', [&$field ,'TPFieldStyleTable'],
            'tp_settings_style_table', 'tp_settings_style_table_id' );

        add_settings_section( 'tp_settings_themes_table_id', '', '', 'tp_settings_themes_table' );
        add_settings_field('tp_themes_table_td', '', [&$field ,'TPFieldThemesTable'],
            'tp_settings_themes_table', 'tp_settings_themes_table_id' );


        add_settings_section( 'tp_settings_other_settings_id', '', '', 'tp_settings_other_settings' );
        add_settings_field('tp_other_settings_td', '', [&$field ,'TPFieldOtherSettings'],
            'tp_settings_other_settings', 'tp_settings_other_settings_id' );

    }

    public function tpDefaultTableStyle(){
        if(TPRequest::isPost()){
            TPPlugin::$options['style_table'] = TPDefault::$defaultTableStyle;
            update_option(TPOPlUGIN_OPTION_NAME, TPPlugin::$options);
        }
    }

}
