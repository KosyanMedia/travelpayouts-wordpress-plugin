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
        new controllers\admin\menu\TPAutoReplacLinksController();
        new controllers\admin\menu\TPFlightTicketsController();
        new controllers\admin\menu\TPWidgetsController();
        new controllers\admin\menu\TPSearchFormsController();
        new controllers\admin\menu\TPStatisticController();
        new controllers\admin\menu\TPSettingsController();
        new controllers\admin\menu\TPWizardController();
        new controllers\admin\menu\TPWhatNewsController();
        // Media buttons
        new models\admin\TPPostsModel();
        new controllers\admin\TPModalAdminNoticeController();
        if( \app\includes\TPPlugin::$options['config']['media_button']['view'] != 2){
            new controllers\admin\media_buttons\TPShortcodeButtonsController();
            new controllers\admin\media_buttons\TPWidgetButtonsController();
            new controllers\admin\media_buttons\TPSearchFormButtonsController();
            new controllers\admin\media_buttons\TPLinkButtonsController();
        }

        new \app\includes\common\TPTinyMCE();



    }


    protected function site()
    {
        // TODO: Implement site() method.
        //Shortcodes
        new \app\includes\controllers\site\shortcodes\TPSearchFormShortcodeController();
        new \app\includes\controllers\site\shortcodes\TPCheapestFlightsShortcodeController();
        new \app\includes\controllers\site\shortcodes\TPDirectFlightsRouteShortcodeController();
        new \app\includes\controllers\site\shortcodes\TPDirectFlightsShortcodeController();
        new \app\includes\controllers\site\shortcodes\TPPopularDestinationsAirlinesShortcodeController();
        new \app\includes\controllers\site\shortcodes\TPPriceCalendarMonthShortcodeController();
        new \app\includes\controllers\site\shortcodes\TPPriceCalendarWeekShortcodeController();
        new \app\includes\controllers\site\shortcodes\TPCheapestTicketsEachMonthShortcodeController();
        new \app\includes\controllers\site\shortcodes\TPCheapestTicketEachDayMonthShortcodeController();
        new \app\includes\controllers\site\shortcodes\TPPopularRoutesFromCityShortcodeController();
        new \app\includes\controllers\site\shortcodes\TPOurSiteSearchShortcodeController();
        new \app\includes\controllers\site\shortcodes\TPFromOurCityFlyShortcodeController();
        new \app\includes\controllers\site\shortcodes\TPInOurCityFlyShortcodeController();
        new \app\includes\controllers\site\shortcodes\TPLinkShortcodeController();
        new \app\includes\controllers\site\shortcodes\TPSpecialOfferShortcodeController();
        new \app\includes\controllers\site\shortcodes\TPCaseCityShortcodeController();

        //Widgets
        new \app\includes\controllers\site\widgets\TPMapWidgetController();
        new \app\includes\controllers\site\widgets\TPHotelMapWidgetController();
        new \app\includes\controllers\site\widgets\TPCalendarWidgetController();
        new \app\includes\controllers\site\widgets\TPSubscriptionsWidgetController();
        new \app\includes\controllers\site\widgets\TPHotelWidgetController();
        new \app\includes\controllers\site\widgets\TPPopularRoutesWidgetController();
        new \app\includes\controllers\site\widgets\TPHotelSelectController();
        new \app\includes\controllers\site\widgets\TPDucklettWidgetController();

        //Tabs
        new \app\includes\controllers\site\TPTabsShortcodeController();


    }

    protected function all()
    {
        // TODO: Implement all() method.

        new \app\includes\TPLoaderScripts();
        //new controllers\admin\menu\TPAdminBarMenuController();
        \app\includes\models\site\shortcodes\TPSpecialOfferShortcodeModel::modelHooks();

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
                                    <a href="admin.php?page=tp_control_wizard">'._x('tp_plugin_loaded_admin_notice_btn_wizard_label', '(Set details and enable plugin features)', TPOPlUGIN_TEXTDOMAIN).'</a>
                                </div>
                            </div>
                        </div>
                        <div class="TP-Activate_description">
                            '._x('tp_plugin_loaded_admin_notice_paragraph_1', '(Welcome! Travelpayouts plugin is almost ready.)', TPOPlUGIN_TEXTDOMAIN).'<br/>'
                            ._x('tp_plugin_loaded_admin_notice_paragraph_2', '(Enter your Travelpayouts authorization details and start earning now.)', TPOPlUGIN_TEXTDOMAIN)
                            .'</div>
                    </div>'
                );
            }

        }
    }
}