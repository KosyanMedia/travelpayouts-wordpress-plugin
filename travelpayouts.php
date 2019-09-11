<?php
/*
Plugin Name: Travelpayouts
Plugin URI: https://wordpress.org/plugins/travelpayouts/
Description: Earn money and make your visitors happy! Offer them useful tools to find cheap flights and hotels. Earn on commission for each booking.
Version: 0.7.12
Author: travelpayouts
Author URI: http://www.travelpayouts.com/?locale=en
Text Domain: travelpayouts
Domain Path: /lang
License: GPL2
*/
require_once dirname(__FILE__) . '/TPO.config.php';
if (!version_compare(PHP_VERSION, '5.3.0', '>=')) {
    function activation(){
        global $locale;
        $error_msg = '';
        switch($locale) {
            case "ru_RU":
                $error_msg = '<p>К сожалению, плагин Travelpayouts не работает с версиями PHP ниже чем 5.3.х.
                Ознакомьтесь с информацией о том, <a href="https://support.travelpayouts.com/hc/ru/articles/207794617#02?utm_source=wpplugin&utm_medium=php_error&utm_campaign=ru">
                как вы можете обновиться</a>.</p>';
                break;
            case "en_US":
                $error_msg = '<p>Unfortunately, Travelpayouts plugin can not run on PHP versions that are older than 5.3.х.
                Read more information about <a href="https://support.travelpayouts.com/hc/en-us/articles/207794617#02?utm_source=wpplugin&utm_medium=php_error&utm_campaign=en">
                how you can update</a>.</p>';
                break;
            default:
                $error_msg = '<p>Unfortunately, Travelpayouts plugin can not run on PHP versions that are older than 5.3.х.
                Read more information about <a href="https://support.travelpayouts.com/hc/en-us/articles/207794617#02?utm_source=wpplugin&utm_medium=php_error&utm_campaign=en">
                how you can update</a>.</p>';
                break;
        }
        deactivate_plugins(TPOPlUGIN_NAME);
        wp_die($error_msg);
    }
    register_activation_hook( __FILE__, 'activation' );

}else{
    define("TPOPlUGIN_BASENAME", plugin_basename( __FILE__ ));
    require_once dirname(__FILE__) . '/core/TPOAutoload.php';
    require_once dirname(__FILE__).'/app/includes/TPPlugin.php';
    //add_action('widgets_init', create_function('', 'return register_widget("app\includes\TPPluginWidget");'));

    register_activation_hook( __FILE__, array('app\includes\TPPlugin' ,  'activation' ) );
    register_deactivation_hook( __FILE__, array('app\includes\TPPlugin' ,  'deactivation' ) );
    register_uninstall_hook( __FILE__, array('app\includes\TPPlugin' ,  'uninstall' ) );

}
