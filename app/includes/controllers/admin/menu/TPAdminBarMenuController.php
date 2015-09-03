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
            "Travelpayouts",
            "tp_admin_bar_menu",
            "admin.php?page=".KPDPlUGIN_TEXTDOMAIN
        );
        $this->admin_bar_add_sub_menu(
            __('Flight Tickets', KPDPlUGIN_TEXTDOMAIN ),
            'admin.php?page=tp_control_tickets',
            'tp_admin_bar_menu',
            KPDPlUGIN_TEXTDOMAIN.'_tp_control_tickets');
        $this->admin_bar_add_sub_menu(
            _x('Widgets', 'add_menu_page page title',  KPDPlUGIN_TEXTDOMAIN),
            'admin.php?page=tp_control_widgets',
            'tp_admin_bar_menu',
            KPDPlUGIN_TEXTDOMAIN.'_tp_control_widget');
        $this->admin_bar_add_sub_menu(
            __('Search Forms', KPDPlUGIN_TEXTDOMAIN),
            'admin.php?page=tp_control_search_shortcodes',
            'tp_admin_bar_menu',
            KPDPlUGIN_TEXTDOMAIN.'_tp_search_shortcodes'
        );
        $this->admin_bar_add_sub_menu(
            __('Statistics', KPDPlUGIN_TEXTDOMAIN ),
            'admin.php?page=tp_control_stats',
            'tp_admin_bar_menu',
            KPDPlUGIN_TEXTDOMAIN.'_tp_control_stats'
        );
        $this->admin_bar_add_sub_menu(
            __('Settings', KPDPlUGIN_TEXTDOMAIN ),
            'admin.php?page=tp_control_settings',
            'tp_admin_bar_menu',
            KPDPlUGIN_TEXTDOMAIN.'_tp_control_settings'
        );
    }
}