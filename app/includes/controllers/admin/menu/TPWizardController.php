<?php
/**
 * Created by PhpStorm.
 * User: freeman
 * Date: 19.08.15
 * Time: 16:59
 */
namespace app\includes\controllers\admin\menu;
class TPWizardController extends \core\controllers\TPOAdminMenuController{
    public $local;
    public $local_url;
    public $model;
    public function __construct(){
        parent::__construct();
        $this->model = new \app\includes\models\admin\menu\TPWizardModel();
    }
    public function action()
    {
        // TODO: Implement action() method.
        // TODO: Implement action() method.
        $plugin_page = add_submenu_page( null,
            _x('Wizard',  'admin menu page title wizard', TPOPlUGIN_TEXTDOMAIN ),
            _x('Wizard',  'admin menu menu title wizard', TPOPlUGIN_TEXTDOMAIN ),
            'manage_options',
            'tp_control_wizard',
            array(&$this, 'render'));
        add_action( 'admin_footer-'.$plugin_page, array(&$this, 'TPLinkHelp') );
        //global $submenu;

    }

    public function render()
    {

        global $locale;
        switch($locale){
            case "ru_RU":
                $this->local = 'ru';
                $this->local_url = 'ru';
                break;
            case "en_US":
                $this->local = 'en';
                $this->local_url = 'en-us';
                break;
            default:
                $this->local = 'en';
                $this->local_url = 'en-us';
                break;
        }
        // TODO: Implement render() method.
        $pathView = TPOPlUGIN_DIR."/app/includes/views/admin/menu/TPWizard.view.php";
        parent::loadView($pathView);
    }
}