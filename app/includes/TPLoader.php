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
        TPPlugin::$TPRequestApi = TPRequestApi::getInstance();
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
        new TPCheapestFlightsShortcodeController();
        new TPDirectFlightsRouteShortcodeController();
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
        new TPPopularRoutesWidgetController();

    }

    protected function all()
    {
        // TODO: Implement all() method.
        new TPLoaderScripts();
        new TPAdminBarMenuController();


    }

    public function pluginsLoaded()
    {
        // TODO: Implement pluginsLoaded() method.
        if(!TPPlugin::$TPRequestApi->get_status()){
            new TPWizardController();
            TPPlugin::$adminNotice->adminNoticePushCustom(
                get_class($this),
                '<div class="TP-Activate">
                <div class="TP-Activate_a">
                    <div class="TP-ico-avia"></div>
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