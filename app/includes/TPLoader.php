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
        new TPDashboardController();
        new TPFlightTicketsController();
        new TPWidgetsController();

    }

    protected function site()
    {
        // TODO: Implement site() method.
    }

    protected function all()
    {
        // TODO: Implement all() method.
        new TPLoaderScripts();
    }
}