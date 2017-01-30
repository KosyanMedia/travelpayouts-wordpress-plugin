<?php
/**
 * Created by PhpStorm.
 * User: romansolomashenko
 * Date: 30.01.17
 * Time: 10:38 AM
 */

namespace app\includes\models\admin\menu;


class TPHotelsModel extends TPBaseShortcodeOptionModel
{

    public function create_option()
    {
        // TODO: Implement create_option() method.
        register_setting(
            'TPHotels',
            TPOPlUGIN_OPTION_NAME,
            array(&$this,'save_option')
        );
        $field = new TPHotelsModel();
        add_settings_section( 'tp_settings_hotel_shortcode_1_id', '', '', 'tp_settings_hotels_shortcode_1' );
        add_settings_field('tp_hotels_shortcode_1_td', '', array(&$field ,'TPFieldShortcode_1'),
            'tp_settings_hotels_shortcode_1', 'tp_settings_hotel_shortcode_1_id' );

        add_settings_section( 'tp_settings_hotel_shortcode_2_id', '', '', 'tp_settings_hotels_shortcode_2' );
        add_settings_field('tp_hotels_shortcode_2_td', '', array(&$field ,'TPFieldShortcode_2'),
            'tp_settings_hotels_shortcode_2', 'tp_settings_hotel_shortcode_2_id' );

        add_settings_section( 'tp_settings_hotel_shortcode_3_id', '', '', 'tp_settings_hotels_shortcode_3' );
        add_settings_field('tp_hotels_shortcode_3_td', '', array(&$field ,'TPFieldShortcode_3'),
            'tp_settings_hotels_shortcode_3', 'tp_settings_hotel_shortcode_3_id' );

        add_settings_section( 'tp_settings_hotel_shortcode_4_id', '', '', 'tp_settings_hotels_shortcode_4' );
        add_settings_field('tp_hotels_shortcode_4_td', '', array(&$field ,'TPFieldShortcode_4'),
            'tp_settings_hotels_shortcode_4', 'tp_settings_hotel_shortcode_4_id' );

        add_settings_section( 'tp_settings_hotel_shortcode_5_id', '', '', 'tp_settings_hotels_shortcode_5' );
        add_settings_field('tp_hotels_shortcode_5_td', '', array(&$field ,'TPFieldShortcode_5'),
            'tp_settings_hotels_shortcode_5', 'tp_settings_hotel_shortcode_5_id' );
    }
}