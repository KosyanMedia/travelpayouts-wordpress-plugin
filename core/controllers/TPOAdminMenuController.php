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
            ._x('tp_admin_page_link_help_msg_text_1',
                '(Please, don\'t delete the information below. It makes helping you easier)', TPOPlUGIN_TEXTDOMAIN)
            .'%0A'
            ._x('tp_admin_page_link_help__msg_text_2',
                '(domain: )', TPOPlUGIN_TEXTDOMAIN).$home.'%0A'
            ._x('tp_admin_page_link_help__msg_text_3',
                '(marker: )', TPOPlUGIN_TEXTDOMAIN).\app\includes\TPPlugin::$options['account']['marker'].'%0A'
            ._x('tp_admin_page_link_help__msg_text_4',
                '(whitelabel: )', TPOPlUGIN_TEXTDOMAIN).\app\includes\TPPlugin::$options['account']['white_label'].'%0A'
            ._x('tp_admin_page_link_help__msg_text_5',
                '(WP theme: )', TPOPlUGIN_TEXTDOMAIN).$theme->Name.'%0A'
            ._x('tp_admin_page_link_help__msg_text_6',
                '(WP theme URI: )', TPOPlUGIN_TEXTDOMAIN).$theme->ThemeURI.'%0A'
            ._x('tp_admin_page_link_help__msg_text_7',
                '(WP theme version: )', TPOPlUGIN_TEXTDOMAIN).$theme->Version.'%0A'
            ._x('tp_admin_page_link_help__msg_text_8',
                '(WP version: )', TPOPlUGIN_TEXTDOMAIN).$wp_version.'%0A'
            ._x('tp_admin_page_link_help__msg_text_9',
                '(PHP version:  )', TPOPlUGIN_TEXTDOMAIN).phpversion().'%0A'
            ._x('tp_admin_page_link_help__msg_text_10',
                '(Plugin version: )', TPOPlUGIN_TEXTDOMAIN).TPOPlUGIN_VERSION.'%0A';
        $subject = $home._x('tp_admin_page_link_help__msg_text_11',
                '( - Travelpayouts WP Plugin Support Request - )', TPOPlUGIN_TEXTDOMAIN)
            .\app\includes\TPPlugin::$options['account']['marker'];
        $link = '<div class="TP-AdminFooter">'
            .'<p>'
                ._x('tp_admin_page_link_help_link_text',
                '(A problem with the plugin? Have some suggestions or ideas? Contact us at)', TPOPlUGIN_TEXTDOMAIN)
                .' <a href="mailto:wpplugin@travelpayouts.com?body='.$body.'&subject='.$subject.'">'
                 ._x('tp_admin_page_link_help_link_label',
                    '(wpplugin@travelpayouts.com)', TPOPlUGIN_TEXTDOMAIN)
                 .'</a>'
            .'</p>'
        .'</div>';
        echo $link;


    }
}