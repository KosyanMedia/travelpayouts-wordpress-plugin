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
            _x('Travelpayouts',  'add_menu_page page title' , KPDPlUGIN_TEXTDOMAIN ),
            _x('Travelpayouts',     'add_menu_page menu title' , KPDPlUGIN_TEXTDOMAIN ),
            'manage_options',
            KPDPlUGIN_TEXTDOMAIN,
            array(&$this,'render'),
            KPDPlUGIN_URL .'app/public/images/tp.png'
        );
    }

    public function render()
    {
        // TODO: Implement render() method.
        $pathView = KPDPlUGIN_DIR."/app/includes/views/admin/menu/TPDashboard.view.php";
        parent::loadView($pathView);
    }
}