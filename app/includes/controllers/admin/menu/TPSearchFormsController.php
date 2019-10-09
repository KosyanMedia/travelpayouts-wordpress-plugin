<?php
/**
 * Created by PhpStorm.
 * User: freeman
 * Date: 07.08.15
 * Time: 16:14
 */

namespace app\includes\controllers\admin\menu;

use app\includes\models\admin\menu\TPSearchFormsModel;
use core\controllers\TPOAdminMenuController;
use core\TPRequest;

class TPSearchFormsController extends TPOAdminMenuController
{
    public $model;
    public $data;

    public function __construct()
    {
        parent::__construct();
        $this->model = new TPSearchFormsModel();
    }

    public function action()
    {
        // TODO: Implement action() method.
        $plugin_page = add_submenu_page(TPOPlUGIN_TEXTDOMAIN,
            _x('Search Forms', 'admin menu page title search forms', TPOPlUGIN_TEXTDOMAIN),
            _x('Search Forms', 'admin menu menu title search forms', TPOPlUGIN_TEXTDOMAIN),
            'manage_options',
            'tp_control_search_shortcodes',
            [&$this, 'render']);
        add_action('admin_footer-' . $plugin_page, [&$this, 'TPLinkHelp']);
    }

    public function render()
    {
        // TODO: Implement render() method.
        $action = TPRequest::get('action');
        $pathView = '';
        switch ($action) {
            case 'add_search_shortcode':
                $pathView = TPOPlUGIN_DIR . '/app/includes/views/admin/menu/TPSearchFormsAdd.view.php';
                break;
            case 'save_search_shortcode':
                if (TPRequest::isPost()) {
                    $this->model->insert($_POST);
                    $this->redirect('admin.php?page=tp_control_search_shortcodes');
                }
                break;
            case 'edit_search_shortcode':
                if (TPRequest::get('id')) {
                    $id = (int)TPRequest::get('id');
                    $this->data = $this->model->get_dataID($id);
                    $pathView = TPOPlUGIN_DIR . '/app/includes/views/admin/menu/TPSearchFormsEdit.view.php';
                } else {
                    $this->redirect('admin.php?page=tp_control_search_shortcodes');
                }
                break;
            case 'update_search_shortcode':
                if (TPRequest::isPost()) {
                    $this->model->update($_POST);
                    $this->redirect('admin.php?page=tp_control_search_shortcodes');
                }
                break;
            case 'delete_search_shortcode':
                if (TPRequest::get('id')) {
                    $id = (int)TPRequest::get('id');
                    $this->model->deleteId($id);
                }
                $this->redirect('admin.php?page=tp_control_search_shortcodes');
                break;
            default:
                $this->data = $this->model->get_data();
                $pathView = TPOPlUGIN_DIR . '/app/includes/views/admin/menu/TPSearchForms.view.php';
                break;
        }
        parent::loadView($pathView);
    }

}
