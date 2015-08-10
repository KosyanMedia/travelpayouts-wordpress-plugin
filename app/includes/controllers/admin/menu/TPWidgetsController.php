<?php
/**
 * Created by PhpStorm.
 * User: freeman
 * Date: 07.08.15
 * Time: 16:08
 */

class TPWidgetsController extends KPDAdminMenuController{
    public $model;
    public function __construct(){
        parent::__construct();
        $this->model = new TPWidgetsModel();
    }
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
        $pathView = KPDPlUGIN_DIR."/app/includes/views/admin/menu/TPWidgets.view.php";
        parent::loadView($pathView);
    }
}