<?php
/**
 * Created by PhpStorm.
 * User: freeman
 * Date: 07.08.15
 * Time: 16:19
 */

class TPStatisticController extends KPDAdminMenuController{

    public function action()
    {
        // TODO: Implement action() method.
        add_submenu_page( KPDPlUGIN_TEXTDOMAIN,
            _x('Statistic',  'add_menu_page page title', KPDPlUGIN_TEXTDOMAIN ),
            _x('Statistic',  'add_menu_page page title', KPDPlUGIN_TEXTDOMAIN ),
            'manage_options',
            'tp_control_stats',
            array(&$this, 'render'));
    }

    public function render()
    {
        // TODO: Implement render() method.
        $pathView = KPDPlUGIN_DIR."/app/includes/views/admin/menu/TPStatistic.view.php";
        parent::loadView($pathView);
    }

}