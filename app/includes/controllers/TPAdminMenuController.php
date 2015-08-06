<?php
/**
 * Created by PhpStorm.
 * User: freeman
 * Date: 06.08.15
 * Time: 12:41
 */

class TPAdminMenuController extends KPDBaseControllers{

    public function __construct()
    {
        // TODO: Implement __construct() method.
        add_action('admin_menu', array( &$this, 'action'));
    }

    public function action()
    {
        // TODO: Implement action() method.
        add_menu_page(
            _x('Travelpayouts',  'add_menu_page page title' , KPDPlUGIN_TEXTDOMAIN ),
            _x('Travelpayouts',     'add_menu_page menu title' , KPDPlUGIN_TEXTDOMAIN ),
            'manage_options',
            KPDPlUGIN_TEXTDOMAIN
            );
    }

    public function render()
    {
        // TODO: Implement render() method.
    }
}