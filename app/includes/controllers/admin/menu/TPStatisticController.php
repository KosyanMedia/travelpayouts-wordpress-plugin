<?php
/**
 * Created by PhpStorm.
 * User: freeman
 * Date: 07.08.15
 * Time: 16:19
 */
namespace app\includes\controllers\admin\menu;
class TPStatisticController extends KPDAdminMenuController{
    public $model;
    public $view;
    public function __construct(){
        parent::__construct();
        $this->model = new TPStatisticModel();
        $this->view = new TPStatisticView($this->model);
    }
    public function action()
    {
        // TODO: Implement action() method.
        add_submenu_page( KPDPlUGIN_TEXTDOMAIN,
            _x('Statistics',  'add_menu_page page title', KPDPlUGIN_TEXTDOMAIN ),
            _x('Statistics',  'add_menu_page page title', KPDPlUGIN_TEXTDOMAIN ),
            'manage_options',
            'tp_control_stats',
            array(&$this, 'render'));
    }

    public function render()
    {
        // TODO: Implement render() method.
        $pathView = KPDPlUGIN_DIR."/app/includes/views/admin/menu/TPStatistic.view.php";
        parent::loadView($pathView);
    }

}