<?php
/**
 * Created by PhpStorm.
 * User: freeman
 * Date: 19.08.15
 * Time: 16:59
 */

class TPWizardController extends KPDAdminMenuController{
    public $local;
    public $model;
    public function __construct(){
        parent::__construct();
        $this->model = new TPWizardModel();
    }
    public function action()
    {
        // TODO: Implement action() method.
        // TODO: Implement action() method.
        add_submenu_page( null,
            _x('Wizard',  'add_menu_page page title', KPDPlUGIN_TEXTDOMAIN ),
            _x('Wizard',  'add_menu_page page title', KPDPlUGIN_TEXTDOMAIN ),
            'manage_options',
            'tp_control_wizard',
            array(&$this, 'render'));
        //global $submenu;
    }

    public function render()
    {
        global $locale;
        switch($locale){
            case "ru_RU":
                $this->local = 'ru';
                break;
            case "en_US":
                $this->local = 'en';
                break;
            default:
                $this->local = 'en';
                break;
        }
        // TODO: Implement render() method.
        $pathView = KPDPlUGIN_DIR."/app/includes/views/admin/menu/TPWizard.view.php";
        parent::loadView($pathView);
    }
}