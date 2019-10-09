<?php
/**
 * Created by PhpStorm.
 * User: freeman
 * Date: 07.08.15
 * Time: 16:08
 */
namespace app\includes\controllers\admin\menu;
use app\includes\models\admin\menu\TPWidgetsModel;
use core\controllers\TPOAdminMenuController;

class TPWidgetsController extends TPOAdminMenuController{
    public $model;
    public function __construct(){
        parent::__construct();
        $this->model = new TPWidgetsModel();
    }
    public function action()
    {
        // TODO: Implement action() method.
        $plugin_page = add_submenu_page( TPOPlUGIN_TEXTDOMAIN,
            _x('Widgets',  'admin menu page title widgets',
                TPOPlUGIN_TEXTDOMAIN ),
            _x('Widgets',  'admin menu menu title widgets',
                TPOPlUGIN_TEXTDOMAIN ),
            'manage_options',
            'tp_control_widgets',
            [&$this, 'render']);
        add_action( 'admin_footer-'.$plugin_page, [&$this, 'TPLinkHelp']);
    }

    public function render()
    {
        // TODO: Implement render() method.
        $pathView = TPOPlUGIN_DIR. '/app/includes/views/admin/menu/TPWidgets.view.php';
        parent::loadView($pathView);
    }
}
