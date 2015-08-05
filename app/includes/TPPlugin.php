<?php
/**
 * Created by PhpStorm.
 * User: freeman
 * Date: 05.08.15
 * Time: 11:46
 */
final class TPPlugin extends KPDPlugin{
    public function __construct() {
        /*error_log(TPInit::$url);
        error_log(TPInit::$path);
        error_log(TPInit::$textdomain);*/
        error_log(KPDPlUGIN_DIR);
        error_log(KPDPlUGIN_URL);
    }
    public function activation()
    {
        // TODO: Implement activation() method.
    }

    public function deactivation()
    {
        // TODO: Implement deactivation() method.
    }

    public function uninstall()
    {
        // TODO: Implement uninstall() method.
    }
}
$TPPlugin = new TPPlugin();
register_activation_hook( __FILE__,     array( 'TPPlugin',  'activation' ) );
register_deactivation_hook( __FILE__,   array( 'TPPlugin',  'deactivation' ) );
register_uninstall_hook( __FILE__,      array( 'TPPlugin',  'uninstall' ) );