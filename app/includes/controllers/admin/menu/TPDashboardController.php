<?php
/**
 * Class TPDashboardController
 */
namespace app\includes\controllers\admin\menu;
class TPDashboardController extends \core\controllers\TPOAdminMenuController{
    public $model;
    public $view;
    public function __construct(){
        parent::__construct();
        $this->model = new \app\includes\models\admin\menu\TPDashboardModel();
        $this->view = new \app\includes\views\admin\menu\TPDashboardView($this->model);
    }
    public function action()
    {
        // TODO: Implement action() method.
        add_menu_page(
            _x('Travelpayouts',  'add_menu_page page title' , TPOPlUGIN_TEXTDOMAIN ),
            _x('Travelpayouts',     'add_menu_page menu title' , TPOPlUGIN_TEXTDOMAIN ),
            'manage_options',
            TPOPlUGIN_TEXTDOMAIN,
            array(&$this,'render'),
            TPOPlUGIN_URL .'app/public/images/tp.png'
        );
    }

    public function render()
    {
        // TODO: Implement render() method.
        $pathView = TPOPlUGIN_DIR."/app/includes/views/admin/menu/TPDashboard.view.php";
        parent::loadView($pathView);
    }
}