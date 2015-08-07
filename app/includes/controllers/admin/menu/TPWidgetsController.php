<?php
/**
 * Created by PhpStorm.
 * User: freeman
 * Date: 07.08.15
 * Time: 16:08
 */

class TPWidgetsController extends KPDAdminMenuController{

    public function action()
    {
        // TODO: Implement action() method.
        add_submenu_page( KPDPlUGIN_TEXTDOMAIN,
            _x('Widgets',  'add_menu_page page title', KPDPlUGIN_TEXTDOMAIN ),
            _x('Widgets',  'add_menu_page page title', KPDPlUGIN_TEXTDOMAIN ),
            'manage_options',
            'tp_control_widgets',
            array(&$this, 'render'));
    }

    public function render()
    {
        // TODO: Implement render() method.
    }

    public function admin_bar_menu()
    {
        // TODO: Implement admin_bar_menu() method.
        $this->admin_bar_add_sub_menu(
            _x('Widgets', 'add_menu_page page title',  KPDPlUGIN_TEXTDOMAIN),
            'admin.php?page=tp_control_widget',
            'tp_admin_bar_menu',
            KPDPlUGIN_TEXTDOMAIN.'_tp_control_widget');
    }
}