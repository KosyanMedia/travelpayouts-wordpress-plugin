<?php
/**
 * Class KPDAdminMenuController
 */
namespace core\controllers;
abstract class TPOAdminMenuController extends TPOBaseController{
    public function __construct(){
        add_action('admin_menu', array( &$this, 'action'));
    }
    abstract public function action();
    abstract public function render();

    public function redirect($page = ''){
        echo '<script type="text/javascript">
                  document.location.href="'.$page.'";
           </script>';
    }
    public function TPLinkHelp(){
        $link = '';
        global $wp_version;
        $theme = wp_get_theme();
        $home = get_option('home');
        $body = '%0A%0A%0A%0A%0A'
            ._x('Please, don\'t delete the information below. It makes helping you easier',
                'tp_admin_page_link_help_msg_text_1', TPOPlUGIN_TEXTDOMAIN)
            .'%0A'
            ._x('domain:',
                ' tp_admin_page_link_help__msg_text_2', TPOPlUGIN_TEXTDOMAIN).$home.'%0A'
            ._x('marker:',
                'tp_admin_page_link_help__msg_text_3', TPOPlUGIN_TEXTDOMAIN).\app\includes\TPPlugin::$options['account']['marker'].'%0A'
            ._x('whitelabel:',
                'tp_admin_page_link_help__msg_text_4', TPOPlUGIN_TEXTDOMAIN).\app\includes\TPPlugin::$options['account']['white_label'].'%0A'
            ._x('WP theme:',
                'tp_admin_page_link_help__msg_text_5', TPOPlUGIN_TEXTDOMAIN).$theme->Name.'%0A'
            ._x('WP theme URI:',
                'tp_admin_page_link_help__msg_text_6', TPOPlUGIN_TEXTDOMAIN).$theme->ThemeURI.'%0A'
            ._x('WP theme version:',
                'tp_admin_page_link_help__msg_text_7', TPOPlUGIN_TEXTDOMAIN).$theme->Version.'%0A'
            ._x('WP version:',
                'tp_admin_page_link_help__msg_text_8', TPOPlUGIN_TEXTDOMAIN).$wp_version.'%0A'
            ._x('PHP version:',
                'tp_admin_page_link_help__msg_text_9', TPOPlUGIN_TEXTDOMAIN).phpversion().'%0A'
            ._x('Plugin version:',
                'tp_admin_page_link_help__msg_text_10', TPOPlUGIN_TEXTDOMAIN).TPOPlUGIN_VERSION.'%0A';
        $subject = $home._x('- Travelpayouts WP Plugin Support Request -',
                'tp_admin_page_link_help__msg_text_11', TPOPlUGIN_TEXTDOMAIN)
            .\app\includes\TPPlugin::$options['account']['marker'];
        $link = '<div class="TP-AdminFooter">'
            .'<p>'
                ._x('A problem with the plugin? Have some suggestions or ideas? Contact us at',
                'tp_admin_page_link_help_link_text', TPOPlUGIN_TEXTDOMAIN)
                .' <a href="mailto:wpplugin@travelpayouts.com?body='.$body.'&subject='.$subject.'">'
                 ._x('wpplugin@travelpayouts.com',
                    'tp_admin_page_link_help_link_label', TPOPlUGIN_TEXTDOMAIN)
                 .'</a>'
            .'</p>'
        .'</div>';
        echo $link;


    }
}