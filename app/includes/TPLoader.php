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
    }
    protected function admin()
    {
        // TODO: Implement admin() method.
        // Admin menu
        new TPDashboardController();
        new TPFlightTicketsController();
        new TPWidgetsController();
        new TPSearchFormsController();
        new TPStatisticController();
        new TPSettingsController();
        // Media buttons
        new TPShortcodeButtonsController();
        new TPWidgetButtonsController();
        new TPSearchFormButtonsController();

    }

    protected function site()
    {
        // TODO: Implement site() method.
        //Shortcodes
        new TPSearchFormShortcodeController();
    }

    protected function all()
    {
        // TODO: Implement all() method.
        new TPLoaderScripts();
        new TPAdminBarMenuController();
        TPPlugin::$TPRequestApi = TPRequestApi::getInstance();
    }
}