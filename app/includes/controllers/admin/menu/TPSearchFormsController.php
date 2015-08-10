<?php
/**
 * Created by PhpStorm.
 * User: freeman
 * Date: 07.08.15
 * Time: 16:14
 */

class TPSearchFormsController extends KPDAdminMenuController{
    public $model;
    public function __construct()
    {
        parent::__construct();
        $this->model = new TPSearchFormsModel();
    }
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
        $action = isset($_GET['action']) ? $_GET['action'] : null ;
        switch($action){

        }
    }

}