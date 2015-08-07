<?php
/**
 * Created by PhpStorm.
 * User: freeman
 * Date: 07.08.15
 * Time: 16:14
 */

class TPSearchFormsController extends KPDAdminMenuController{

    public function action()
    {
        // TODO: Implement action() method.
        add_submenu_page( KPDPlUGIN_TEXTDOMAIN,
            _x('Search Forms',  'add_menu_page page title', KPDPlUGIN_TEXTDOMAIN ),
            _x('Search Forms',  'add_menu_page page title', KPDPlUGIN_TEXTDOMAIN ),
            'manage_options',
            'tp_control_search_shortcodes',
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
            __('Search Forms', KPDPlUGIN_TEXTDOMAIN),
            'admin.php?page=tp_control_search_shortcodes',
            'tp_admin_bar_menu',
            KPDPlUGIN_TEXTDOMAIN.'_tp_search_shortcodes'
        );
    }
}