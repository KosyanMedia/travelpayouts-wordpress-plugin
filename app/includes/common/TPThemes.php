<?php
/**
 * Created by PhpStorm.
 * User: solomashenko
 * Date: 24.04.17
 * Time: 18:03
 */

namespace app\includes\common;


class TPThemes
{
    public static function getThemesTables(){
        return array(
            array(
                'name' => 'default-theme',
                'title' => _x('tp_admin_menu_page_flight_tickets_tab_themes_theme_name_default_theme',
                    '(Default Theme)', TPOPlUGIN_TEXTDOMAIN ),
                'screenshot' => 'default-theme.png'
            ),
            array(
                'name' => 'red-button-table',
                'title' => _x('tp_admin_menu_page_flight_tickets_tab_themes_theme_name_red_button_table',
                    '(Red Button Light Theme)', TPOPlUGIN_TEXTDOMAIN ),
                'screenshot' => 'red-button-table.png'
            ),
            array(
                'name' => 'blue-table',
                'title' => _x('tp_admin_menu_page_flight_tickets_tab_themes_theme_name_blue_table',
                    '(Blue Button Light Theme)', TPOPlUGIN_TEXTDOMAIN ),
                'screenshot' => 'blue-table.png'
            ),
            array(
                'name' => 'grey-salad-table',
                'title' => _x('tp_admin_menu_page_flight_tickets_tab_themes_theme_name_grey_salad_table',
                    '(Salad Button Light Theme)', TPOPlUGIN_TEXTDOMAIN ),
                'screenshot' => 'grey-salad-table.png'
            ),
            array(
                'name' => 'purple-table',
                'title' => _x('tp_admin_menu_page_flight_tickets_tab_themes_theme_name_purple_table',
                    '(Purple Header Light Theme)', TPOPlUGIN_TEXTDOMAIN ),
                'screenshot' => 'purple-table.png'
            ),
            array(
                'name' => 'black-and-yellow-table',
                'title' => _x('tp_admin_menu_page_flight_tickets_tab_themes_theme_name_black_and_yellow_table',
                    '(Yellow Button Dark Theme)', TPOPlUGIN_TEXTDOMAIN ),
                'screenshot' => 'black-and-yellow-table.png'
            ),
            array(
                'name' => 'dark-and-rainbow',
                'title' => _x('tp_admin_menu_page_flight_tickets_tab_themes_theme_name_dark_and_rainbow',
                    '(Coral Button Dark Theme)', TPOPlUGIN_TEXTDOMAIN ),
                'screenshot' => 'dark-and-rainbow.png'
            ),
            array(
                'name' => 'light-and-plum-table',
                'title' => _x('tp_admin_menu_page_flight_tickets_tab_themes_theme_name_light_and_plum_table',
                    '(Light Theme with Plum Search Column)', TPOPlUGIN_TEXTDOMAIN ),
                'screenshot' => 'light-and-plum-table.png'
            ),
            array(
                'name' => 'light-yellow-and-darkgray',
                'title' => _x('tp_admin_menu_page_flight_tickets_tab_themes_theme_name_light_yellow_and_darkgray',
                    '(Light Theme with Dark Search Column)', TPOPlUGIN_TEXTDOMAIN ),
                'screenshot' => 'light-yellow-and-darkgray.png'
            ),
            array(
                'name' => 'mint-table',
                'title' => _x('tp_admin_menu_page_flight_tickets_tab_themes_theme_name_mint_table',
                    '(Mint Button Light Theme)', TPOPlUGIN_TEXTDOMAIN ),
                'screenshot' => 'mint-table.png'
            )
        );
    }
}