<?php
/**
 * Class TPDashboardController
 */
namespace app\includes\controllers\admin\menu;
use app\includes\models\admin\menu\TPDashboardModel;
use app\includes\views\admin\menu\TPDashboardView;
use core\controllers\TPOAdminMenuController;

class TPDashboardController extends TPOAdminMenuController{
    public $model;
    public $view;
    public function __construct(){
        parent::__construct();

        $this->model = new TPDashboardModel();
        $this->view = new TPDashboardView($this->model);


    }
    public function action()
    {
        // TODO: Implement action() method.
        $plugin_page = add_menu_page(
            _x('Travelpayouts',  'admin menu page title dashboard' , TPOPlUGIN_TEXTDOMAIN ),
            _x('Travelpayouts',  'admin menu menu title dashboard' , TPOPlUGIN_TEXTDOMAIN ),
            'manage_options',
            TPOPlUGIN_TEXTDOMAIN,
            [&$this,'render'],
            TPOPlUGIN_URL .'app/public/images/tp.png'
        );
        add_action( 'admin_footer-'.$plugin_page, [&$this, 'TPLinkHelp']);
    }

    public function render()
    {
        // TODO: Implement render() method.
        $pathView = TPOPlUGIN_DIR. '/app/includes/views/admin/menu/TPDashboard.view.php';
        parent::loadView($pathView);
    }
}
