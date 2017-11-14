<?php
/**
 * Created by PhpStorm.
 * User: romansolomashenko
 * Date: 26.01.17
 * Time: 3:35 PM
 */

namespace app\includes\controllers\admin\menu;

use app\includes\common\TPThemes;
use app\includes\models\admin\menu\TPHotelsModel;
use \core\controllers\TPOAdminMenuController;

class TPHotelsController extends TPOAdminMenuController
{
    public $model;
    public function __construct(){
        parent::__construct();
        $this->model = new TPHotelsModel();
    }

    public function action()
    {
        // TODO: Implement action() method.
        $plugin_page = add_submenu_page( TPOPlUGIN_TEXTDOMAIN,
            _x('Hotels',  'admin menu page title hotels', TPOPlUGIN_TEXTDOMAIN ),
            _x('Hotels',  'admin menu menu title hotels', TPOPlUGIN_TEXTDOMAIN ),
            'manage_options',
            'tp_control_hotels',
            array(&$this, 'render'));
        add_action( 'admin_footer-'.$plugin_page, array(&$this, 'TPLinkHelp') );
    }

    public function render()
    {
        // TODO: Implement render() method.
        $pathView = TPOPlUGIN_DIR."/app/includes/views/admin/menu/TPHotels.view.php";
        $data = array(
            'themes' => TPThemes::getThemesTables()
        );

        parent::loadView($pathView, 0, $data);
    }
}