<?php
/**
 * Created by PhpStorm.
 * User: freeman
 * Date: 07.08.15
 * Time: 16:34
 */
namespace app\includes\controllers\admin\menu;
use app\includes\models\admin\menu\TPSettingsModel;
use core\controllers\TPOAdminMenuController;

class TPSettingsController extends TPOAdminMenuController{
    public function __construct(){
        parent::__construct();
        $this->model = new TPSettingsModel();
    }
    public function action()
    {
        // TODO: Implement action() method.
        $plugin_page = add_submenu_page( TPOPlUGIN_TEXTDOMAIN,
            _x('Settings',  'admin menu page title settings', TPOPlUGIN_TEXTDOMAIN ),
            _x('Settings',  'admin menu menu title settings', TPOPlUGIN_TEXTDOMAIN ),
            'manage_options',
            'tp_control_settings',
            [&$this, 'render']);
        add_action( 'admin_footer-'.$plugin_page, [&$this, 'TPLinkHelp']);

        /*TPPlugin::$adminNotice->adminNoticePush(get_class($this), array(
            'class_notice' => 'updated',
            'title_notice' => 'Test',
            'message_notice' => 'Test',
        ));*/
    }

    public function render()
    {
        // TODO: Implement render() method.

        $pathView = TPOPlUGIN_DIR. '/app/includes/views/admin/menu/TPSettings.view.php';
        parent::loadView($pathView);
    }

}
