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
            .__('Please, don\'t delete the information below. It makes helping you easier', TPOPlUGIN_TEXTDOMAIN)
            .'%0A'
            .'domain: '.$home.'%0A'
            .'marker: '.\app\includes\TPPlugin::$options['account']['marker'].'%0A'
            .'whitelabel: '.\app\includes\TPPlugin::$options['account']['white_label'].'%0A'
            .'WP theme: '.$theme->Name.'%0A'
            .'WP theme URI: '.$theme->ThemeURI.'%0A'
            .'WP theme version: '.$theme->Version.'%0A'
            .'WP version: '.$wp_version.'%0A'
            .'PHP version: '.phpversion().'%0A'
            .'Plugin version: '.TPOPlUGIN_VERSION.'%0A';
        $subject = $home.' - Travelpayouts WP Plugin Support Request - '
            .\app\includes\TPPlugin::$options['account']['marker'];
        $link = '<div class="TP-AdminFooter">'
            .'<p>'
                .__('A problem with the plugin? Have some suggestions or ideas? Contact us at',TPOPlUGIN_TEXTDOMAIN)
                .' <a href="mailto:wpplugin@travelpayouts.com?body='.$body.'&subject='.$subject.'">wpplugin@travelpayouts.com</a>'
            .'</p>'
        .'</div>';
        echo $link;


    }
}