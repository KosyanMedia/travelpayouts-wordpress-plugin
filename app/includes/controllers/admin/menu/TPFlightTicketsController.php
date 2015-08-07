<?php
/**
 * Created by PhpStorm.
 * User: freeman
 * Date: 06.08.15
 * Time: 17:52
 */

class TPFlightTicketsController extends KPDAdminMenuController{
    public $model;
    public function __construct(){
        parent::__construct();
        $this->model = new TPFlightTicketsModel();
    }
    public function action()
    {
        // TODO: Implement action() method.
        add_submenu_page( KPDPlUGIN_TEXTDOMAIN,
            _x('Flight Tickets',  'add_menu_page page title', KPDPlUGIN_TEXTDOMAIN ),
            _x('Flight Tickets',  'add_menu_page page title', KPDPlUGIN_TEXTDOMAIN ),
            'manage_options',
            'tp_control_tickets',
            array(&$this, 'render'));
    }

    public function render()
    {
        // TODO: Implement render() method.
        $pathView = KPDPlUGIN_DIR."/app/includes/views/admin/menu/TPFlightTickets.view.php";
        parent::loadView($pathView);
    }
}