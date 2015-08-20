<?php
/**
 * Created by PhpStorm.
 * User: freeman
 * Date: 10.08.15
 * Time: 15:08
 */

class TPWidgetsModel extends TPOptionModel{

    public function create_option()
    {
        // TODO: Implement create_option() method.
        register_setting(
            'TPWidgets',
            KPDPlUGIN_OPTION_NAME,
            array(&$this,'save_option')
        );
        $field = new TPFieldWidgets();
        add_settings_section( 'tp_settings_widget_1_id', '', '', 'tp_settings_widget_1' );
        add_settings_field('tp_widget_1_td', '', array(&$field ,'TPFieldWidget_1'),
            'tp_settings_widget_1', 'tp_settings_widget_1_id' );
        add_settings_section( 'tp_settings_widget_2_id', '', '', 'tp_settings_widget_2' );
        add_settings_field('tp_widget_2_td', '', array(&$field ,'TPFieldWidget_2'),
            'tp_settings_widget_2', 'tp_settings_widget_2_id' );
        add_settings_section( 'tp_settings_widget_3_id', '', '', 'tp_settings_widget_3' );
        add_settings_field('tp_widget_3_td', '', array(&$field ,'TPFieldWidget_3'),
            'tp_settings_widget_3', 'tp_settings_widget_3_id' );
        add_settings_section( 'tp_settings_widget_4_id', '', '', 'tp_settings_widget_4' );
        add_settings_field('tp_widget_4_td', '', array(&$field ,'TPFieldWidget_4'),
            'tp_settings_widget_4', 'tp_settings_widget_4_id' );
        add_settings_section( 'tp_settings_widget_5_id', '', '', 'tp_settings_widget_5' );
        add_settings_field('tp_widget_5_td', '', array(&$field ,'TPFieldWidget_5'),
            'tp_settings_widget_5', 'tp_settings_widget_5_id' );
        add_settings_section( 'tp_settings_widget_6_id', '', '', 'tp_settings_widget_6' );
        add_settings_field('tp_widget_6_td', '', array(&$field ,'TPFieldWidget_6'),
            'tp_settings_widget_6', 'tp_settings_widget_6_id' );
    }

}