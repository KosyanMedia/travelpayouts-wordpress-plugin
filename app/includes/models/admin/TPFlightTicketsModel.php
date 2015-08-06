<?php
/**
 * Created by PhpStorm.
 * User: freeman
 * Date: 06.08.15
 * Time: 18:47
 */

class TPFlightTicketsModel extends KPDOptionModel{

    public function create_option()
    {
        // TODO: Implement create_option() method.
        register_setting(
            'TPFlightTickets',
            KPDPlUGIN_OPTION_NAME,
            array(&$this,'save_option')
        );
        $field = new TPFieldOption();
        //Shortcode
        add_settings_section( 'tp_settings_shortcode_1_id', '', '', 'tp_settings_shortcode_1' );
        add_settings_field('tp_shortcode_1_td', '', array(&$field ,'TPFieldShortcode_1'),
            'tp_settings_shortcode_1', 'tp_settings_shortcode_1_id' );
    }

    protected function save_option($input)
    {
        // TODO: Implement save_option() method.
        $result = array_merge(TPPlugin::$options, $input);
        return $result;
    }
}