<?php
class TPPlugin extends KPDPlugin implements KPDPluginInterface{
    public function __construct() {
        parent::__construct();
        new TPLoader();
    }

    static public function activation()
    {
        // TODO: Implement activation() method.
        if( ! get_option(KPDPlUGIN_OPTION_NAME) )
            update_option( KPDPlUGIN_OPTION_NAME, TPDefault::defaultOptions() );
    }

    static public function deactivation()
    {
        // TODO: Implement deactivation() method.
        delete_option( KPDPlUGIN_OPTION_NAME);
    }

    static public function uninstall()
    {
        // TODO: Implement uninstall() method.
    }
}
$TPPlugin = new TPPlugin();
