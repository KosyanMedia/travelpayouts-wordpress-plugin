<?php
/**
 * Created by PhpStorm.
 * User: freeman
 * Date: 08.08.15
 * Time: 0:41
 */
namespace app\includes\controllers\admin\menu;
class TPAdminBarMenuController extends \core\controllers\TPOAdminBarMenuController{

    public function admin_bar_menu()
    {
        // TODO: Implement admin_bar_menu() method.
        $this->admin_bar_add_root_menu(
            _x('tp_admin_bar_menu_travelpayouts_title',  'admin bar menu title travelpayouts', TPOPlUGIN_TEXTDOMAIN ),
            "tp_admin_bar_menu",
            "admin.php?page=".TPOPlUGIN_TEXTDOMAIN
        );
        $this->admin_bar_add_sub_menu(
            _x('tp_admin_bar_menu_auto_links_title',  'admin bar menu title auto links', TPOPlUGIN_TEXTDOMAIN )
            .' (beta)',
            'admin.php?page=tp_control_substitution_links',
            'tp_admin_bar_menu',
            TPOPlUGIN_TEXTDOMAIN.'_tp_control_substitution_links');
        $this->admin_bar_add_sub_menu(
            _x('tp_admin_bar_menu_flight_tickets_title',  'admin bar menu title flight tickets', TPOPlUGIN_TEXTDOMAIN ),
            'admin.php?page=tp_control_tickets',
            'tp_admin_bar_menu',
            TPOPlUGIN_TEXTDOMAIN.'_tp_control_tickets');
        $this->admin_bar_add_sub_menu(
            _x('tp_admin_bar_menu_widgets_title',  'admin bar menu title widgets',  TPOPlUGIN_TEXTDOMAIN),
            'admin.php?page=tp_control_widgets',
            'tp_admin_bar_menu',
            TPOPlUGIN_TEXTDOMAIN.'_tp_control_widget');
        $this->admin_bar_add_sub_menu(
            _x('tp_admin_bar_menu_search_forms_title',  'admin bar menu title search forms', TPOPlUGIN_TEXTDOMAIN),
            'admin.php?page=tp_control_search_shortcodes',
            'tp_admin_bar_menu',
            TPOPlUGIN_TEXTDOMAIN.'_tp_search_shortcodes'
        );
        $this->admin_bar_add_sub_menu(
            _x('tp_admin_bar_menu_statistics_title',  'admin bar menu title statistics', TPOPlUGIN_TEXTDOMAIN ),
            'admin.php?page=tp_control_stats',
            'tp_admin_bar_menu',
            TPOPlUGIN_TEXTDOMAIN.'_tp_control_stats'
        );
        $this->admin_bar_add_sub_menu(
            _x('tp_admin_bar_menu_settings_title',  'admin bar menu title settings', TPOPlUGIN_TEXTDOMAIN ),
            'admin.php?page=tp_control_settings',
            'tp_admin_bar_menu',
            TPOPlUGIN_TEXTDOMAIN.'_tp_control_settings'
        );
    }
}