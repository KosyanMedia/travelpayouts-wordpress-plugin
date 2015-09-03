<?php
namespace app\includes;
class TPLoader extends \core\TPOLoader{
    public function __construct(){
        parent::__construct();
        TPPlugin::$TPRequestApi = TPRequestApi::getInstance();

    }

    protected function admin()
    {
        // TODO: Implement admin() method.
        // Admin menu
        new controllers\admin\menu\TPDashboardController();
        new controllers\admin\menu\TPFlightTicketsController();
        new controllers\admin\menu\TPWidgetsController();
        new controllers\admin\menu\TPSearchFormsController();
        new controllers\admin\menu\TPStatisticController();
        new controllers\admin\menu\TPSettingsController();
        new controllers\admin\menu\TPWizardController();
        // Media buttons
        new controllers\admin\media_buttons\TPShortcodeButtonsController();
        new controllers\admin\media_buttons\TPWidgetButtonsController();
        new controllers\admin\media_buttons\TPSearchFormButtonsController();


    }


    protected function site()
    {
        // TODO: Implement site() method.
        //Shortcodes
        new \app\includes\controllers\site\shortcodes\TPSearchFormShortcodeController();
        new \app\includes\controllers\site\shortcodes\TPCheapestFlightsShortcodeController();
        /*new TPDirectFlightsRouteShortcodeController();
        new TPDirectFlightsShortcodeController();
        new TPPopularDestinationsAirlinesShortcodeController();
        new TPPriceCalendarMonthShortcodeController();
        new TPPriceCalendarWeekShortcodeController();
        new TPCheapestTicketsEachMonthShortcodeController();
        new TPCheapestTicketEachDayMonthShortcodeController();
        new TPPopularRoutesFromCityShortcodeController();
        new TPOurSiteSearchShortcodeController();
        new TPFromOurCityFlyShortcodeController();
        new TPInOurCityFlyShortcodeController();
        //Widgets
        new TPMapWidgetController();
        new TPHotelMapWidgetController();
        new TPCalendarWidgetController();
        new TPSubscriptionsWidgetController();
        new TPHotelWidgetController();
        new TPPopularRoutesWidgetController();*/


    }

    protected function all()
    {
        // TODO: Implement all() method.

        new \app\includes\TPLoaderScripts();
        new controllers\admin\menu\TPAdminBarMenuController();


    }

    public function pluginsLoaded()
    {
        // TODO: Implement pluginsLoaded() method.

        if(!TPPlugin::$TPRequestApi->get_status()){
            if(strripos($_SERVER['REQUEST_URI'], 'tp_control_wizard') === false){
                TPPlugin::$adminNotice->adminNoticePushCustom(
                    get_class($this),
                    '<div class="TP-Activate">
                        <div class="TP-Activate_a">
                            <div class="TP-Activate-ico-avia"></div>
                        </div>
                        <div class="TP-Activate_button_container">
                            <div class="TP-Activate_button_border">
                                <div class="TP-Activate_button">
                                    <a href="admin.php?page=tp_control_wizard">'.__('Set details and enable plugin features.', KPDPlUGIN_TEXTDOMAIN).'</a>
                                </div>
                            </div>
                        </div>
                        <div class="TP-Activate_description">
                            '.__('Welcome! Travelpayouts plugin is almost ready.', KPDPlUGIN_TEXTDOMAIN).'<br/>'
                            .__('Enter your Travelpayouts authorization details and start earning now.', KPDPlUGIN_TEXTDOMAIN)
                            .'</div>
                    </div>'
                );
            }

        }
    }
}