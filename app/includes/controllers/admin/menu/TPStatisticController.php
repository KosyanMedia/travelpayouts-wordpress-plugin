<?php
/**
 * Created by PhpStorm.
 * User: freeman
 * Date: 07.08.15
 * Time: 16:19
 */
namespace app\includes\controllers\admin\menu;
class TPStatisticController extends \core\controllers\TPOAdminMenuController{
    public $model;
    public $view;
    public function __construct(){
        parent::__construct();
        $this->model = new \app\includes\models\admin\menu\TPStatisticModel();
        $this->view = new \app\includes\views\admin\menu\TPStatisticView($this->model);
    }
    public function action()
    {
        // TODO: Implement action() method.
        $plugin_page = add_submenu_page( TPOPlUGIN_TEXTDOMAIN,
            _x('Statistics',  'admin menu page title statistics',
                TPOPlUGIN_TEXTDOMAIN ),
            _x('Statistics',  'admin menu menu title statistics',
                TPOPlUGIN_TEXTDOMAIN ),
            'manage_options',
            'tp_control_stats',
            array(&$this, 'render'));
        add_action( 'admin_footer-'.$plugin_page, array(&$this, 'TPLinkHelp') );
    }

    public function render()
    {
        // TODO: Implement render() method.
        $pathView = TPOPlUGIN_DIR."/app/includes/views/admin/menu/TPStatistic.view.php";
        parent::loadView($pathView);
    }

}