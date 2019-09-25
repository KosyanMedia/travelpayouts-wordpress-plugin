<?php
namespace app\includes;

use app\includes\common\TPLang;
use app\includes\common\TPSiteAjaxListener;
use app\includes\common\TPTinyMCE;
use app\includes\controllers\admin\media_buttons\TPHotelsButtonsController;
use app\includes\controllers\admin\media_buttons\TPRailwayButtonsController;
use app\includes\controllers\admin\menu\TPHotelsController;
use app\includes\controllers\admin\menu\TPRailwayController;
use app\includes\controllers\site\shortcodes\hotels\TPCostLivingCityWeekendShortcodeController;
use app\includes\common\TPRequestApiStatistic;
use app\includes\controllers\site\shortcodes\hotels\TPCostLivingCityDaysShortcodeController;
use app\includes\controllers\site\shortcodes\hotels\TPHotelsCityPriceFromToShortcodeController;
use app\includes\controllers\site\shortcodes\hotels\TPHotelsCityStarFilterShortcodeController;
use app\includes\controllers\site\shortcodes\hotels\TPHotelsSelectionsDateShortcodeController;
use app\includes\controllers\site\shortcodes\hotels\TPHotelsSelectionsDiscountShortcodeController;
use app\includes\controllers\site\shortcodes\hotels\TPHotelsSelectionsShortcodeController;
use app\includes\controllers\site\shortcodes\railway\TPTutuShortcodeController;
use app\includes\controllers\site\shortcodes\TPCaseCityShortcodeController;
use app\includes\controllers\site\shortcodes\TPCheapestFlightsShortcodeController;
use app\includes\controllers\site\shortcodes\TPCheapestTicketEachDayMonthShortcodeController;
use app\includes\controllers\site\shortcodes\TPCheapestTicketsEachMonthShortcodeController;
use app\includes\controllers\site\shortcodes\TPDirectFlightsRouteShortcodeController;
use app\includes\controllers\site\shortcodes\TPDirectFlightsShortcodeController;
use app\includes\controllers\site\shortcodes\TPFromOurCityFlyShortcodeController;
use app\includes\controllers\site\shortcodes\TPInOurCityFlyShortcodeController;
use app\includes\controllers\site\shortcodes\TPLinkShortcodeController;
use app\includes\controllers\site\shortcodes\TPOurSiteSearchShortcodeController;
use app\includes\controllers\site\shortcodes\TPPopularDestinationsAirlinesShortcodeController;
use app\includes\controllers\site\shortcodes\TPPopularRoutesFromCityShortcodeController;
use app\includes\controllers\site\shortcodes\TPPriceCalendarMonthShortcodeController;
use app\includes\controllers\site\shortcodes\TPPriceCalendarWeekShortcodeController;
use app\includes\controllers\site\shortcodes\TPSearchFormShortcodeController;
use app\includes\controllers\site\shortcodes\TPSpecialOfferShortcodeController;
use app\includes\controllers\site\TPTabsShortcodeController;
use app\includes\controllers\site\widgets\TPCalendarWidgetController;
use app\includes\controllers\site\widgets\TPDucklettWidgetController;
use app\includes\controllers\site\widgets\TPHotelMapWidgetController;
use app\includes\controllers\site\widgets\TPHotelSelectController;
use app\includes\controllers\site\widgets\TPHotelWidgetController;
use app\includes\controllers\site\widgets\TPMapWidgetController;
use app\includes\controllers\site\widgets\TPPopularRoutesWidgetController;
use app\includes\controllers\site\widgets\TPSubscriptionsWidgetController;
use app\includes\models\admin\TPHotelsTypeModel;
use core\TPOLoader;

class TPLoader extends TPOLoader{
    public function __construct(){
        parent::__construct();
	    add_action('widgets_init', [&$this, 'registerWidget']);
    }

    protected function admin()
    {
        // TODO: Implement admin() method.
        // Admin menu
        new controllers\admin\menu\TPDashboardController();
        new controllers\admin\menu\TPAutoReplacLinksController();
        new controllers\admin\menu\TPFlightTicketsController();
        new TPHotelsController();
        if (TPLang::getLang() == TPLang::getLangRU()){
            new TPRailwayController();
        }
        new controllers\admin\menu\TPWidgetsController();
        new controllers\admin\menu\TPSearchFormsController();
        //new controllers\admin\menu\TPStatisticController();
        new controllers\admin\menu\TPSettingsController();
        new controllers\admin\menu\TPWizardController();
        new controllers\admin\menu\TPWhatNewsController();
        // Media buttons
        new models\admin\TPPostsModel();
        new controllers\admin\TPModalAdminNoticeController();
        if( TPPlugin::$options['config']['media_button']['view'] != 2){
            new controllers\admin\media_buttons\TPShortcodeButtonsController();
            new TPHotelsButtonsController();

            if (TPLang::getLang() == TPLang::getLangRU()){
                new TPRailwayButtonsController();
            }

            new controllers\admin\media_buttons\TPWidgetButtonsController();
            new controllers\admin\media_buttons\TPSearchFormButtonsController();
            new controllers\admin\media_buttons\TPLinkButtonsController();
        }

        new TPTinyMCE();
        new TPHotelsTypeModel();



    }
    protected function site()
    {
        // TODO: Implement site() method.
        //Shortcodes Flight
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
        new TPLinkShortcodeController();
        new TPSpecialOfferShortcodeController();
        new TPCaseCityShortcodeController();

        //hotel
        new TPCostLivingCityWeekendShortcodeController();
        new TPCostLivingCityDaysShortcodeController();
        new TPHotelsCityPriceFromToShortcodeController();
        new TPHotelsCityStarFilterShortcodeController();
        //new TPHotelsSelectionsShortcodeController();
        new TPHotelsSelectionsDiscountShortcodeController();
        new TPHotelsSelectionsDateShortcodeController();

        //Railway
	    new TPTutuShortcodeController();

        //Widgets
        new TPMapWidgetController();
        new TPHotelMapWidgetController();
        new TPCalendarWidgetController();
        new TPSubscriptionsWidgetController();
        new TPHotelWidgetController();
        new TPPopularRoutesWidgetController();
        new TPHotelSelectController();
        new TPDucklettWidgetController();

        //Tabs
        new TPTabsShortcodeController();


    }

    protected function all()
    {
        // TODO: Implement all() method.

        new TPLoaderScripts();
        new TPSiteAjaxListener();
        //new controllers\admin\menu\TPAdminBarMenuController();
        //Загрузка спецпредложения
        //\app\includes\models\site\shortcodes\TPSpecialOfferShortcodeModel::modelHooks();
    }

    public function registerWidget(){
	    register_widget( 'app\includes\widgets\TPFlightsTablesWidget' );
	    register_widget( 'app\includes\widgets\TPHotelsTablesWidget' );
	    register_widget( 'app\includes\widgets\TPSearchFormWidget' );
	    register_widget( 'app\includes\widgets\TPWidgetsWidget' );
	    if (TPLang::getLang() == TPLang::getLangRU()){
		    register_widget( 'app\includes\widgets\TPRailwayTablesWidget' );
	    }

    }

    public function pluginsLoaded()
    {
        // TODO: Implement pluginsLoaded() method.
        $TPRequestApi = TPRequestApiStatistic::getInstance();
        if(!$TPRequestApi->isStatus()){
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
                                    <a href="admin.php?page=tp_control_wizard">'._x('Set details and enable plugin features', 'tp_plugin_loaded_admin_notice_btn_wizard_label', TPOPlUGIN_TEXTDOMAIN).'</a>
                                </div>
                            </div>
                        </div>
                        <div class="TP-Activate_description">
                            '._x('Welcome! Travelpayouts plugin is almost ready.', 'tp_plugin_loaded_admin_notice_paragraph_1', TPOPlUGIN_TEXTDOMAIN).'<br/>'
                            ._x('Enter your Travelpayouts authorization details and start earning now.', 'tp_plugin_loaded_admin_notice_paragraph_2', TPOPlUGIN_TEXTDOMAIN)
                            .'</div>
                    </div>'
                );
            }

        }
    }
}
