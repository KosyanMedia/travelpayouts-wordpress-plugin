<?php
/**
 * Created by PhpStorm.
 * User: freeman
 * Date: 06.08.15
 * Time: 12:03
 */

class TPLoader extends KPDLoader{
    public function __construct(){
        parent::__construct();
        /*
        error_log(KPDPlUGIN_DIR);
        error_log(KPDPlUGIN_URL);
        error_log(KPDPlUGIN_SLUG);
        error_log(KPDPlUGIN_TEXTDOMAIN);
        error_log(KPDPlUGIN_OPTION_NAME);
        error_log(KPDPlUGIN_OPTION_VERSION);
        error_log(KPDPlUGIN_DIR_LOCALIZATION);
        */
    }
    protected function admin()
    {
        // TODO: Implement admin() method.
        new TPDashboardController();
    }

    protected function site()
    {
        // TODO: Implement site() method.
    }
}