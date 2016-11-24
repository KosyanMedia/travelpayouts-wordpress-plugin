<?php
namespace app\includes\models\admin\menu;
class TPFlightTicketsModel extends \app\includes\models\admin\TPOptionModel{
    public function __construct(){
        parent::__construct();
        add_action('wp_ajax_tp_default_style', array( &$this, 'tpDefaultTableStyle'));
        add_action('wp_ajax_nopriv_tp_default_style', array( &$this, 'tpDefaultTableStyle'));
    }
    public function create_option()
    {
        // TODO: Implement create_option() method.
        register_setting(
            'TPFlightTickets',
            TPOPlUGIN_OPTION_NAME,
            array(&$this,'save_option')
        );
        $field = new TPFieldFlightTickets();
        //Shortcode
        add_settings_section( 'tp_settings_shortcode_1_id', '', '', 'tp_settings_shortcode_1' );
        add_settings_field('tp_shortcode_1_td', '', array(&$field ,'TPFieldShortcode_1'),
            'tp_settings_shortcode_1', 'tp_settings_shortcode_1_id' );
        add_settings_section( 'tp_settings_shortcode_2_id', '', '', 'tp_settings_shortcode_2' );
        add_settings_field('tp_shortcode_2_td', '', array(&$field ,'TPFieldShortcode_2'),
            'tp_settings_shortcode_2', 'tp_settings_shortcode_2_id' );
        add_settings_section( 'tp_settings_shortcode_4_id', '', '', 'tp_settings_shortcode_4' );
        add_settings_field('tp_shortcode_4_td', '', array(&$field ,'TPFieldShortcode_4'),
            'tp_settings_shortcode_4', 'tp_settings_shortcode_4_id' );
        add_settings_section( 'tp_settings_shortcode_5_id', '', '', 'tp_settings_shortcode_5' );
        add_settings_field('tp_shortcode_5_td', '', array(&$field ,'TPFieldShortcode_5'),
            'tp_settings_shortcode_5', 'tp_settings_shortcode_5_id' );
        add_settings_section( 'tp_settings_shortcode_6_id', '', '', 'tp_settings_shortcode_6' );
        add_settings_field('tp_shortcode_6_td', '', array(&$field ,'TPFieldShortcode_6'),
            'tp_settings_shortcode_6', 'tp_settings_shortcode_6_id' );
        add_settings_section( 'tp_settings_shortcode_7_id', '', '', 'tp_settings_shortcode_7' );
        add_settings_field('tp_shortcode_7_td', '', array(&$field ,'TPFieldShortcode_7'),
            'tp_settings_shortcode_7', 'tp_settings_shortcode_7_id' );
        add_settings_section( 'tp_settings_shortcode_8_id', '', '', 'tp_settings_shortcode_8' );
        add_settings_field('tp_shortcode_8_td', '', array(&$field ,'TPFieldShortcode_8'),
            'tp_settings_shortcode_8', 'tp_settings_shortcode_8_id' );
        add_settings_section( 'tp_settings_shortcode_9_id', '', '', 'tp_settings_shortcode_9' );
        add_settings_field('tp_shortcode_9_td', '', array(&$field ,'TPFieldShortcode_9'),
            'tp_settings_shortcode_9', 'tp_settings_shortcode_9_id' );
        add_settings_section( 'tp_settings_shortcode_10_id', '', '', 'tp_settings_shortcode_10' );
        add_settings_field('tp_shortcode_10_td', '', array(&$field ,'TPFieldShortcode_10'),
            'tp_settings_shortcode_10', 'tp_settings_shortcode_10_id' );
        add_settings_section( 'tp_settings_shortcode_11_id', '', '', 'tp_settings_shortcode_11' );
        add_settings_field('tp_shortcode_11_td', '', array(&$field ,'TPFieldShortcode_11'),
            'tp_settings_shortcode_11', 'tp_settings_shortcode_11_id' );
        add_settings_section( 'tp_settings_shortcode_12_id', '', '', 'tp_settings_shortcode_12' );
        add_settings_field('tp_shortcode_12_td', '', array(&$field ,'TPFieldShortcode_12'),
            'tp_settings_shortcode_12', 'tp_settings_shortcode_12_id' );
        add_settings_section( 'tp_settings_shortcode_13_id', '', '', 'tp_settings_shortcode_13' );
        add_settings_field('tp_shortcode_13_td', '', array(&$field ,'TPFieldShortcode_13'),
            'tp_settings_shortcode_13', 'tp_settings_shortcode_13_id' );
        add_settings_section( 'tp_settings_shortcode_14_id', '', '', 'tp_settings_shortcode_14' );
        add_settings_field('tp_shortcode_14_td', '', array(&$field ,'TPFieldShortcode_14'),
            'tp_settings_shortcode_14', 'tp_settings_shortcode_14_id' );
        add_settings_section( 'tp_settings_style_table_id', '', '', 'tp_settings_style_table' );
        add_settings_field('tp_style_table_td', '', array(&$field ,'TPFieldStyleTable'),
            'tp_settings_style_table', 'tp_settings_style_table_id' );

        add_settings_section( 'tp_settings_themes_table_id', '', '', 'tp_settings_themes_table' );
        add_settings_field('tp_themes_table_td', '', array(&$field ,'TPFieldThemesTable'),
            'tp_settings_themes_table', 'tp_settings_themes_table_id' );


        add_settings_section( 'tp_settings_other_settings_id', '', '', 'tp_settings_other_settings' );
        add_settings_field('tp_other_settings_td', '', array(&$field ,'TPFieldOtherSettings'),
            'tp_settings_other_settings', 'tp_settings_other_settings_id' );

    }

    public function tpDefaultTableStyle(){
        if(isset($_POST)){
            \app\includes\TPPlugin::$options['style_table'] = \app\includes\TPDefault::$defaultTableStyle;
            update_option(TPOPlUGIN_OPTION_NAME, \app\includes\TPPlugin::$options);
        }
    }
    public function getThemesTables(){
        $themesTables = array(
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
        return $themesTables;
    }
}