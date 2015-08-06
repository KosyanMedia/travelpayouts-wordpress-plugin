<?php
/**
 * Class TPDashboardController
 */
class TPDashboardController extends KPDAdminMenuController{
    public function action()
    {
        // TODO: Implement action() method.
        add_menu_page(
            _x('Travelpayouts',  'add_menu_page page title' , KPDPlUGIN_TEXTDOMAIN ),
            _x('Travelpayouts',     'add_menu_page menu title' , KPDPlUGIN_TEXTDOMAIN ),
            'manage_options',
            KPDPlUGIN_TEXTDOMAIN,
            array(&$this,'render')
        );
    }

    public function render()
    {
        // TODO: Implement render() method.
        $pathView = KPDPlUGIN_DIR."/app/includes/views/admin/TPDashboard.view.php";
        parent::loadView($pathView);
    }
}