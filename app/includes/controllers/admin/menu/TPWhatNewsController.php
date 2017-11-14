<?php
/**
 * Created by PhpStorm.
 * User: freeman
 * Date: 03.08.16
 * Time: 13:19
 */

namespace app\includes\controllers\admin\menu;


class TPWhatNewsController extends \core\controllers\TPOAdminMenuController
{

    public function __construct()
    {
        parent::__construct();
    }
    public function action()
    {
        // TODO: Implement action() method.
        $plugin_page = add_submenu_page( null,
            _x('What news',  'admin menu page title what news',
                TPOPlUGIN_TEXTDOMAIN ),
            _x('What news',  'admin menu menu title what news',
                TPOPlUGIN_TEXTDOMAIN ),
            'manage_options',
            'tp_control_what_news',
            array(&$this, 'render'));
        add_action( 'admin_footer-'.$plugin_page, array(&$this, 'TPLinkHelp') );
    }

    public function render()
    {
        // TODO: Implement render() method.
        $localUrl = "en";
        global $locale;
        switch($locale){
            case "ru_RU":
                $localUrl = 'ru';
                break;
            case "en_US":
                $localUrl = 'en';
                break;
            default:
                $localUrl= 'en';
                break;
        }
        // TODO: Implement render() method.
        $pathView = TPOPlUGIN_DIR
            ."/app/includes/views/admin/menu/TPWhatNews.{$localUrl}.view.php";
        parent::loadView($pathView);
    }
}