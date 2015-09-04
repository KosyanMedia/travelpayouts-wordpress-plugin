<?php
/**
 * Created by PhpStorm.
 * User: freeman
 * Date: 07.08.15
 * Time: 16:34
 */
namespace app\includes\controllers\admin\menu;
class TPSettingsController extends \core\controllers\TPOAdminMenuController{
    public function __construct(){
        parent::__construct();
        $this->model = new \app\includes\models\admin\menu\TPSettingsModel();
    }
    public function action()
    {
        // TODO: Implement action() method.
        add_submenu_page( TPOPlUGIN_TEXTDOMAIN,
            _x('Settings',  'add_menu_page page title', TPOPlUGIN_TEXTDOMAIN ),
            _x('Settings',  'add_menu_page page title', TPOPlUGIN_TEXTDOMAIN ),
            'manage_options',
            'tp_control_settings',
            array(&$this, 'render'));
        /*TPPlugin::$adminNotice->adminNoticePush(get_class($this), array(
            'class_notice' => 'updated',
            'title_notice' => 'Test',
            'message_notice' => 'Test',
        ));*/
    }

    public function render()
    {
        // TODO: Implement render() method.

        $pathView = TPOPlUGIN_DIR."/app/includes/views/admin/menu/TPSettings.view.php";
        parent::loadView($pathView);
    }

}