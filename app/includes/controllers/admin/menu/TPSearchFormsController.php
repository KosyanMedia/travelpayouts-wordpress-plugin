<?php
/**
 * Created by PhpStorm.
 * User: freeman
 * Date: 07.08.15
 * Time: 16:14
 */

class TPSearchFormsController extends KPDAdminMenuController{
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
        add_submenu_page( KPDPlUGIN_TEXTDOMAIN,
            _x('Search Forms',  'add_menu_page page title', KPDPlUGIN_TEXTDOMAIN ),
            _x('Search Forms',  'add_menu_page page title', KPDPlUGIN_TEXTDOMAIN ),
            'manage_options',
            'tp_control_search_shortcodes',
            array(&$this, 'render'));
    }

    public function render()
    {
        // TODO: Implement render() method.
        $action = isset($_GET['action']) ? $_GET['action'] : null ;
        $pathView = "";
        switch($action){
            case "add_search_shortcode":
                $pathView = KPDPlUGIN_DIR."/app/includes/views/admin/menu/TPSearchFormsAdd.view.php";
                break;
            case "save_search_shortcode":
                if(isset($_POST)){
                    $this->model->insert($_POST);
                    $this->redirect('admin.php?page=tp_control_search_shortcodes');
                }
                break;
            case "edit_search_shortcode":
                if(isset($_GET['id']) && !empty($_GET['id'])){
                    $this->data = $this->model->get_dataID((int)$_GET['id']);
                    $pathView = KPDPlUGIN_DIR."/app/includes/views/admin/menu/TPSearchFormsEdit.view.php";
                }else{
                    $this->redirect('admin.php?page=tp_control_search_shortcodes');
                }
                break;
            case "update_search_shortcode":
                if(isset($_POST)){
                    $this->model->update($_POST);
                    $this->redirect('admin.php?page=tp_control_search_shortcodes');
                }
                break;
            case "delete_search_shortcode":
                if(isset($_GET['id']) && !empty($_GET['id'])){
                    $this->data = $this->model->deleteId((int)$_GET['id']);
                }
                $this->redirect('admin.php?page=tp_control_search_shortcodes');
                break;
            default:
                $this->data = $this->model->get_data();
                $pathView = KPDPlUGIN_DIR."/app/includes/views/admin/menu/TPSearchForms.view.php";
                break;
        }
        parent::loadView($pathView);
    }

}