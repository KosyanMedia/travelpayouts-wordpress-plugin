<?php
namespace app\includes;
class TPLoader extends \core\TPOLoader{
    public function __construct(){
        parent::__construct();
        TPPlugin::$TPRequestApi = TPRequestApi::getInstance();
        //add_action('taxonomy_edit_form',  array( &$this, 'buttonCat'));
        //add_action('edit_category',  array( &$this, 'buttonCat'));
        add_action('edit_category_form',  array( &$this, 'buttonCat'));
        add_action('edit_tag_form',  array( &$this, 'buttonCat'));
              //edit_tag_form_fields
        //add_category_form_fields
        //add_action('edit_category_form_fields',  array( &$this, 'buttonCat'));
        add_action('add_tag_form_fields', array( &$this, 'buttonCat'));

    }
    public function buttonCat(){
        echo 111111;
        error_log(111);
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
        new models\admin\TPPostsModel();



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
        //Widgets
        new \app\includes\controllers\site\widgets\TPMapWidgetController();
        new \app\includes\controllers\site\widgets\TPHotelMapWidgetController();
        new \app\includes\controllers\site\widgets\TPCalendarWidgetController();
        new \app\includes\controllers\site\widgets\TPSubscriptionsWidgetController();
        new \app\includes\controllers\site\widgets\TPHotelWidgetController();
        new \app\includes\controllers\site\widgets\TPPopularRoutesWidgetController();


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
                                    <a href="admin.php?page=tp_control_wizard">'.__('Set details and enable plugin features', TPOPlUGIN_TEXTDOMAIN).'</a>
                                </div>
                            </div>
                        </div>
                        <div class="TP-Activate_description">
                            '.__('Welcome! Travelpayouts plugin is almost ready.', TPOPlUGIN_TEXTDOMAIN).'<br/>'
                            .__('Enter your Travelpayouts authorization details and start earning now.', TPOPlUGIN_TEXTDOMAIN)
                            .'</div>
                    </div>'
                );
            }

        }
    }
}