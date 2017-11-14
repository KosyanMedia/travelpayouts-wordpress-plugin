<?php
/**
 * Created by PhpStorm.
 * User: freeman
 * Date: 06.08.15
 * Time: 17:52
 */
namespace app\includes\controllers\admin\menu;

use app\includes\common\TPThemes;
use \app\includes\models\admin\menu\TPFlightTicketsModel;

class TPFlightTicketsController extends \core\controllers\TPOAdminMenuController{
    public $model;
    public function __construct(){
        parent::__construct();
        $this->model = new TPFlightTicketsModel();
    }
    public function action()
    {
        // TODO: Implement action() method.
        //
        $plugin_page = add_submenu_page( TPOPlUGIN_TEXTDOMAIN,
            _x('Flight Tickets',  'admin menu page title flight tickets', TPOPlUGIN_TEXTDOMAIN ),
            _x('Flight Tickets',  'admin menu menu title flight tickets', TPOPlUGIN_TEXTDOMAIN ),
            'manage_options',
            'tp_control_tickets',
            array(&$this, 'render'));
        add_action( 'admin_footer-'.$plugin_page, array(&$this, 'TPLinkHelp') );
    }

    public function render()
    {
        // TODO: Implement render() method.
        $pathView = TPOPlUGIN_DIR."/app/includes/views/admin/menu/TPFlightTickets.view.php";
        $data = array(
            'themes' => TPThemes::getThemesTables()
        );
        parent::loadView($pathView, 0, $data);
    }
}