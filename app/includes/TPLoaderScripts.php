<?php
/**
 * Created by PhpStorm.
 * User: freeman
 * Date: 07.08.15
 * Time: 0:35
 */
namespace app\includes;
class TPLoaderScripts extends \core\TPOLoaderScripts{

    public function __construct(){
        parent::__construct();
        if ( ! is_admin() ) {
            add_filter('script_loader_tag', array(&$this, 'addAttrScript'), 200, 3);
        }


    }

    public function addAttrScript($tag, $handle, $src){

        //error_log(print_r($handle, true));
        //$tags = explode(' ', $tag);
        //error_log(print_r($tags, true));
        //<script type='text/javascript' src='http://localhost/tp/wp-content/plugins/travelpayouts/app/public/js/site/TPPlugin.js'></script>
        //error_log(print_r($tag, true));
        if (strpos($handle, TPOPlUGIN_SLUG) !== false) {
            $tag = str_replace('<script type=\'text/javascript\'',
                '<script type=\'text/javascript\' data-cfasync="false"', $tag);
            $tag = str_replace('></script>', ' data-wpfc-render="false"></script>', $tag);
        }

        //error_log(print_r($tag, true));
        //error_log(print_r($src, true));
        return $tag;

    }

    public function loadScriptAdmin($hook)
    {
        // TODO: Implement loadScriptAdmin() method.
        //error_log('loadScriptAdmin');
        /** Register styles */
        //$version = TPOPlUGIN_VERSION;
        $version = null;

        wp_register_style(
            TPOPlUGIN_SLUG.'-InsertWidgets', //$handle
            TPOPlUGIN_URL.'app/public/css/admin/TPInsertWidgets.css', // $src
            array(), //$deps,
            $version // $ver
        );
        wp_register_style(
            TPOPlUGIN_SLUG.'-InsertShortcodes', //$handle
            TPOPlUGIN_URL.'app/public/css/admin/TPInsertShortcodes.css', // $src
            array(), //$deps,
            $version // $ver
        );
        wp_register_style(
            TPOPlUGIN_SLUG.'-TPAdminNormalize', //$handle
            TPOPlUGIN_URL.'app/public/css/admin/TPAdminNormalize.css', // $src
            array(), //$deps,
            TPOPlUGIN_VERSION // $ver
        );
        wp_register_style(
            TPOPlUGIN_SLUG.'-bellows',
            TPOPlUGIN_URL.'app/public/css/lib/bellows.css',
            array(),
            $version
        );

        wp_register_style(
            TPOPlUGIN_SLUG.'-jquery-ui',
            TPOPlUGIN_URL.'app/public/css/lib/jquery-ui/jquery-ui.min.css',
            array(),
            $version
        );

        wp_register_style(
            TPOPlUGIN_SLUG.'-TPAdminMain', //$handle
            TPOPlUGIN_URL.'app/public/css/admin/TPAdminMain.css', // $src
            array(
                TPOPlUGIN_SLUG.'-bellows',
                //TPOPlUGIN_SLUG.'-jquery-ui'
            ), //$deps,
            $version // $ver
        );
        /** End register styles */
        /** Register scripts */
        wp_register_script(
            TPOPlUGIN_SLUG.'-AutocompleteAirlines', //$handle
            TPOPlUGIN_URL.'app/public/js/lib/autocomplete/autocomplete_airlines.js', //$src
            array(), //$deps
            TPOPlUGIN_VERSION, //$ver
            true //$$in_footer
        );
        wp_register_script(
            TPOPlUGIN_SLUG.'-AutocompleteCountries', //$handle
            TPOPlUGIN_URL.'app/public/js/lib/autocomplete/autocomplete_countries.js', //$src
            array(), //$deps
            $version, //$ver
            true //$$in_footer
        );
        wp_register_script(
            TPOPlUGIN_SLUG.'-AutocompleteScript', //$handle
            TPOPlUGIN_URL.'app/public/js/lib/TPAdminAutocomplete.js', //$src
            array(
                'jquery',
                'jquery-ui-autocomplete'
            ), //$deps
            $version, //$ver
            true //$$in_footer
        );

        wp_register_script(
            TPOPlUGIN_SLUG.'-HotelsSelectionsType', //$handle
            TPOPlUGIN_URL.'app/public/js/lib/TPHotelsSelectionsType.js', //$src
            array(
                'jquery',
                'jquery-ui-autocomplete'
            ), //$deps
            $version, //$ver
            true //$$in_footer
        );

        wp_register_script(
            TPOPlUGIN_SLUG.'-InsertShortcodes', //$handle
            TPOPlUGIN_URL.'app/public/js/admin/TPInsertShortcodes.js', //$src
            array(
                'jquery',
                'jquery-ui-autocomplete',
                'jquery-ui-dialog',
                'jquery-ui-core',
                'jquery-ui-datepicker',
                'jquery-form',
                'jquery-ui-progressbar',
                TPOPlUGIN_SLUG.'-HotelsSelectionsType', //$handle
            ), //$deps
            $version, //$ver
            true //$$in_footer
        );
        wp_register_script(
            TPOPlUGIN_SLUG.'-fileDownload', //$handle
            TPOPlUGIN_URL.'app/public/js/lib/download.js', //$src
            array(), //$deps
            $version, //$ver
            true //$$in_footer
        );
        wp_register_script(
            TPOPlUGIN_SLUG.'-jqColorPicker', //$handle
            TPOPlUGIN_URL.'app/public/js/lib/jqColorPicker.min.js', //$src
            array(), //$deps
            $version, //$ver
            true //$$in_footer
        );
        wp_register_script(
            TPOPlUGIN_SLUG.'-excellentexport', //$handle
            TPOPlUGIN_URL.'app/public/js/lib/excellentexport.min.js', //$src
            array(), //$deps
            $version, //$ver
            true //$$in_footer
        );
        wp_register_script(
            TPOPlUGIN_SLUG.'-dataTables', //$handle
            TPOPlUGIN_URL.'app/public/js/lib/jquery.dataTables.min.js', //$src
            array(), //$deps
            $version, //$ver
            true //$$in_footer
        );
        wp_enqueue_script(
            TPOPlUGIN_SLUG.'-jquery-cookie',
            TPOPlUGIN_URL.'app/public/js/lib/jquery.cookie.js',
            array( 'jquery' ),
            '1.3.1'
        );
        wp_register_script(
            TPOPlUGIN_SLUG. '-FileSaver', //$handle
            TPOPlUGIN_URL.'app/public/js/lib/FileSaver.min.js', //$src
            array(), //$deps
            $version, //$ver
            true //$$in_footer
        );
        wp_register_script(
            TPOPlUGIN_SLUG. '-jquery-csv', //$handle
            TPOPlUGIN_URL.'app/public/js/lib/jquery.csv.min.js', //$src
            array(), //$deps
            $version, //$ver
            true //$$in_footer
        );

        wp_register_script(
            TPOPlUGIN_SLUG.'-TPAdminPluginPage', //$handle
            TPOPlUGIN_URL.'app/public/js/admin/TPAdminPluginPage.js', //$src
            array(
                'jquery',
                'wp-color-picker',
                'jquery-ui-autocomplete',
                'jquery-ui-accordion',
                'jquery-ui-sortable',
                'jquery-ui-dialog',
                'jquery-ui-button',
                'jquery-form',
                'jquery-ui-tabs',
                TPOPlUGIN_SLUG.'-fileDownload',
                TPOPlUGIN_SLUG.'-jqColorPicker',
                TPOPlUGIN_SLUG.'-excellentexport',
                TPOPlUGIN_SLUG.'-dataTables',
                TPOPlUGIN_SLUG.'-jquery-cookie',
                TPOPlUGIN_SLUG. '-FileSaver',
                'jquery-ui-progressbar',
                TPOPlUGIN_SLUG. '-jquery-csv'
            ), //$deps
            $version, //$ver
            true //$$in_footer
        );
        wp_register_script(
            TPOPlUGIN_SLUG.'-velocity', //$handle
            TPOPlUGIN_URL.'app/public/js/lib/velocity.min.js', //$src
            array(), //$deps
            $version, //$ver
            true //$$in_footer
        );
        wp_register_script(
            TPOPlUGIN_SLUG.'-bellows', //$handle
            TPOPlUGIN_URL.'app/public/js/lib/bellows.min.js', //$src
            array(), //$deps
            $version, //$ver
            true //$$in_footer
        );
        wp_register_script(
            TPOPlUGIN_SLUG.'-zelect', //$handle
            TPOPlUGIN_URL.'app/public/js/lib/zelect.js', //$src
            array(), //$deps
            $version, //$ver
            true //$$in_footer
        );
        wp_register_script(
            TPOPlUGIN_SLUG. '-jquery-spinner', //$handle
            TPOPlUGIN_URL.'app/public/js/lib/jquery.spinner.js', //$src
            array(), //$deps
            $version, //$ver
            true //$$in_footer
        );


        wp_register_script(
            TPOPlUGIN_SLUG.'-TPAdminMain', //$handle
            TPOPlUGIN_URL.'app/public/js/admin/TPAdminMain.js', //$src
            array(
                TPOPlUGIN_SLUG.'-velocity',
                TPOPlUGIN_SLUG.'-bellows',
                TPOPlUGIN_SLUG.'-zelect',
                TPOPlUGIN_SLUG.'-jquery-spinner',
                'jquery',
                'jquery-ui-core',
                'jquery-ui-tooltip',
                'jquery-ui-datepicker'
            ), //$deps
            $version, //$ver
            true //$$in_footer
        );

        /** End register scripts */
        /** Call scripts and style **/
        wp_enqueue_script(TPOPlUGIN_SLUG. '-AutocompleteAirlines');
        wp_enqueue_script(TPOPlUGIN_SLUG. '-AutocompleteCountries');
        wp_enqueue_script(TPOPlUGIN_SLUG. '-AutocompleteScript');

        wp_register_script(
            TPOPlUGIN_SLUG.'-InsertWidgets', //$handle
            TPOPlUGIN_URL.'app/public/js/admin/TPInsertWidgets.js', //$src
            array(
                'jquery',
                'jquery-ui-autocomplete',
                'jquery-ui-core',
	            'jquery-ui-datepicker',
	            TPOPlUGIN_SLUG.'-HotelsSelectionsType', //$handle
            ), //$deps
            $version, //$ver
            true //$$in_footer
        );
        wp_enqueue_style('wp-jquery-ui-dialog');

        wp_register_script(
            TPOPlUGIN_SLUG.'-TPAdminEditPage', //$handle
            TPOPlUGIN_URL.'app/public/js/admin/TPAdminEditPage.js', //$src
            array(
                'jquery',
                'jquery-ui-core',
                'jquery-ui-progressbar',
                'jquery-ui-dialog'
            ), //$deps
            $version, //$ver
            true //$$in_footer
        );
        wp_register_style(
            TPOPlUGIN_SLUG.'-TPAdminEditPage', //$handle
            TPOPlUGIN_URL.'app/public/css/admin/TPAdminEditPage.css', // $src
            array(

            ), //$deps,
            $version // $ver
        );
        wp_register_script(
            TPOPlUGIN_SLUG.'-TPPostAddNew', //$handle
            TPOPlUGIN_URL.'app/public/js/admin/post/TPPostAddNew.js', //$src
            array(), //$deps
            $version, //$ver
            true //$$in_footer
        );
        wp_register_script(
            TPOPlUGIN_SLUG.'-TPPostUpdate', //$handle
            TPOPlUGIN_URL.'app/public/js/admin/post/TPPostUpdate.js', //$src
            array(), //$deps
            $version, //$ver
            true //$$in_footer
        );
        wp_register_script(
            TPOPlUGIN_SLUG.'-TPPost', //$handle
            TPOPlUGIN_URL.'app/public/js/admin/post/TPPost.js', //$src
            array(
                'jquery',
                'jquery-ui-core',
                'jquery-form'), //$deps
            $version, //$ver
            true //$$in_footer
        );
        switch($hook) {
            case "post.php":
                wp_enqueue_script(TPOPlUGIN_SLUG.'-TPPostUpdate');
                break;
            case "post-new.php":
                wp_enqueue_script(TPOPlUGIN_SLUG.'-TPPostAddNew');
                break;
        }

        switch($hook) {
            case "post.php":
            case "post-new.php":
            case "edit-tags.php":

                //wp_enqueue_style(TPOPlUGIN_SLUG.'-TPAdminMain');
                wp_enqueue_style(TPOPlUGIN_SLUG.'-InsertShortcodes');
                wp_enqueue_script(TPOPlUGIN_SLUG.'-InsertShortcodes');
                wp_enqueue_script(TPOPlUGIN_SLUG.'-TPPost');
                break;
            case "widgets.php":
                wp_enqueue_script(TPOPlUGIN_SLUG.'-InsertWidgets');
                wp_enqueue_style(TPOPlUGIN_SLUG.'-InsertWidgets');
                break;
            case "edit.php":
                wp_enqueue_style(TPOPlUGIN_SLUG.'-TPAdminEditPage');
                wp_enqueue_script(TPOPlUGIN_SLUG.'-TPAdminEditPage');
                wp_enqueue_style(TPOPlUGIN_SLUG.'-jquery-ui');
                break;
        }

        if(strripos($hook, 'tpgenerator') !== false){
            //wp_enqueue_style(TPOPlUGIN_SLUG.'-TPAdminMain');
            wp_enqueue_style(TPOPlUGIN_SLUG.'-InsertShortcodes');
            wp_enqueue_script(TPOPlUGIN_SLUG.'-InsertShortcodes');
            wp_enqueue_script(TPOPlUGIN_SLUG.'-InsertWidgets');
            wp_enqueue_style(TPOPlUGIN_SLUG.'-InsertWidgets');

        }

        if(strripos($hook, 'travelpayouts') !== false || strripos($hook, 'tp_control') !== false){

            wp_enqueue_style(TPOPlUGIN_SLUG.'-TPAdminNormalize');
            wp_enqueue_style(TPOPlUGIN_SLUG.'-TPAdminMain');
            wp_enqueue_script(TPOPlUGIN_SLUG.'-TPAdminPluginPage');
            wp_enqueue_script(TPOPlUGIN_SLUG.'-TPAdminMain');
        }
        if(strripos($hook, 'tp_control_substitution_links') !== false){
            wp_enqueue_style(TPOPlUGIN_SLUG.'-jquery-ui');
        }

    }

    public function headScriptAdmin()
    {
        //error_log('headScriptAdmin');
        // TODO: Implement headScriptAdmin() method.
        $blogName = get_bloginfo('name');
        $blogName = preg_replace ("/[^a-zA-ZА-Яа-я0-9]/i","", $blogName);
        ?>
        <script type="text/javascript">
            var ajaxurl, tpLocale, button_ok, button_cancel, TPdatepicker, wpLocale, TPStatsTotal, TPStatsTotalTrText,
                TPTableEmpty, TPDestinationTitle, TPOriginTitle, TPLocationTitlt, TPTableEmptyReport,
                TPTableEmptyBalance, TPTableEmptySearchShortcode, TPFileNameExport, TPPluginName,
                TPMesgUpdateSettings, TPLabelAutocomplete, TPdatepickerPlus,TPMesgUpdate, TPPHCity, TPHotelSelectWidgetCat1,
                TPHotelSelectWidgetCat2, TPHotelSelectWidgetCat3, TPHotelWidgetLabel, TPLebelProgressBar,
                TPBtnIsertLinkDialogTxt, TPAdminUrl, TPInsertLinkNoticeTxt, TPFileNameCsvExport, LabelAirlineWidget_8,
                LabelDeleteWidget_8, TPTableEmptyAnchors, TPImportSettingsErrorNoticeTxt;
            TPAdminUrl = '<?php echo admin_url();?>';
            TPHotelWidgetLabel = '<?php _ex('Hotel Name', 'tp_head_script_admin_var_hotel_widget_label', TPOPlUGIN_TEXTDOMAIN ); ?>';
            TPDestinationTitle = '<?php _ex('Destination', 'tp_head_script_admin_var_destination_title_label', TPOPlUGIN_TEXTDOMAIN ); ?>';
            TPOriginTitle = '<?php _ex('Origin', 'tp_head_script_admin_var_origin_title_label', TPOPlUGIN_TEXTDOMAIN ); ?>';
            TPLocationTitlt = '<?php _ex('Location', 'tp_head_script_admin_var_location_title_label', TPOPlUGIN_TEXTDOMAIN ); ?>';
            TPFileNameExport = '<?php echo TPOPlUGIN_NAME."Settings_v"
            .TPOPlUGIN_VERSION."_".$blogName."_".date('Ymd').".txt"; ?>';
            TPFileNameCsvExport = '<?php echo TPOPlUGIN_NAME."Links.csv"; ?>';
            TPPluginName = '<?php echo TPOPlUGIN_NAME; ?>';
            TPMesgUpdateSettings = '<?php  _ex('Settings saved.', 'tp_head_script_admin_var_mesg_update_settings_label', TPOPlUGIN_TEXTDOMAIN ); ?>';
            TPLabelAutocomplete = '<?php _ex('hotels', 'tp_head_script_admin_var_hotels_autocomplete_label', TPOPlUGIN_TEXTDOMAIN ); ?>';
            TPPHCity = '<?php _ex('City', 'tp_head_script_admin_var_city_label', TPOPlUGIN_TEXTDOMAIN ); ?>';
            TPHotelSelectWidgetCat1 = '<?php echo \app\includes\TPPlugin::$options["widgets"][7]['cat1']; ?>';
            TPHotelSelectWidgetCat2 = '<?php echo \app\includes\TPPlugin::$options["widgets"][7]['cat2']; ?>';
            TPHotelSelectWidgetCat3 = '<?php echo \app\includes\TPPlugin::$options["widgets"][7]['cat3']; ?>';
            TPLebelProgressBar = '<?php _ex('Complete!',  'tp_head_script_admin_var_label_progress_bar_label', TPOPlUGIN_TEXTDOMAIN ); ?>';
            TPBtnIsertLinkDialogTxt = "<?php  _ex('You can\'t undo this action. Be sure to have a backup of your database. Are you sure you want to continue?', 'tp_head_script_admin_var_btn_insert_link_dialog_txt_label', TPOPlUGIN_TEXTDOMAIN ); ?>";
            TPInsertLinkNoticeTxt = '<?php  _ex('Auto-links are applied', 'tp_head_script_admin_var_insert_link_notice_txt_label', TPOPlUGIN_TEXTDOMAIN ); ?>';
            LabelAirlineWidget_8 = '<?php  _ex('Airline', 'tp_head_script_admin_var_airline_widget_8_label', TPOPlUGIN_TEXTDOMAIN); ?>';
            LabelDeleteWidget_8 = '<?php  _ex('Delete','tp_head_script_admin_var_delete_widget_8_label', TPOPlUGIN_TEXTDOMAIN); ?>';
            TPImportSettingsErrorNoticeTxt = '<?php _ex('Error invalid file', 'tp_head_script_admin_var_import_settings_error_notice_txt_label', TPOPlUGIN_TEXTDOMAIN); ?>';
            <?php
                if(isset(\app\includes\TPPlugin::$options['admin_settings']['total_stats'])){
            ?>
                    TPStatsTotal = true;
            <?php
                }else{
            ?>
                TPStatsTotal = false;
            <?php
                }
                global $locale;
                //\app\includes\common\TPLang::getLangAdminAutocomplete();
            ?>

            <?php
                if(  ! isset( \app\includes\TPPlugin::$options['account']['marker'] ) || empty( \app\includes\TPPlugin::$options['account']['marker'] )) {
                    ?>
                        TPTableEmptyReport = '<?php _ex('No data, enter API token and marker', 'tp_head_script_admin_var_table_empty_report_marker_label', TPOPlUGIN_TEXTDOMAIN); ?>';
                        TPTableEmptyBalance = '<?php  _ex('No data, enter API token and marker', 'tp_head_script_admin_var_table_empty_balance_marker_label', TPOPlUGIN_TEXTDOMAIN); ?>';
                    <?php
                } elseif( ! isset( \app\includes\TPPlugin::$options['account']['token'] ) || empty( \app\includes\TPPlugin::$options['account']['token'] )){
                     ?>
                        TPTableEmptyReport = '<?php _ex('No data, enter API token and marker', 'tp_head_script_admin_var_table_empty_report_token_label', TPOPlUGIN_TEXTDOMAIN); ?>';
                        TPTableEmptyBalance = '<?php _ex('No data, enter API token and marker', 'tp_head_script_admin_var_table_empty_balance_token_label', TPOPlUGIN_TEXTDOMAIN); ?>';
                     <?php
                } else {
                      ?>
                        TPTableEmptyReport = '<?php _ex('No data', 'tp_head_script_admin_var_table_empty_report_label', TPOPlUGIN_TEXTDOMAIN); ?>';
                        TPTableEmptyBalance = '<?php _ex('There are no payments yet','tp_head_script_admin_var_table_empty_balance_label', TPOPlUGIN_TEXTDOMAIN); ?>';
                      <?php
                }
            ?>
            TPTableEmptySearchShortcode = '<?php _ex('No search form.', 'tp_head_script_admin_var_table_empty_search_shortcode_label', TPOPlUGIN_TEXTDOMAIN); ?>';
            TPTableEmptyAnchors = '<?php _ex('No anchors.', 'tp_head_script_admin_var_table_empty_anchors_label', TPOPlUGIN_TEXTDOMAIN); ?>';
            TPStatsTotalTrText = '<?php _ex('Grand total this month', 'tp_head_script_admin_var_stats_total_txt_label', TPOPlUGIN_TEXTDOMAIN); ?>';
            wpLocale = '<?php echo get_locale(); ?>';
            ajaxurl = '<?php echo TPOPlUGIN_AJAX_URL; ?>';
            button_ok = '<?php  _ex('Create', 'tp_head_script_admin_var_btn_ok_label', TPOPlUGIN_TEXTDOMAIN); ?>';
            button_cancel = '<?php _ex('Cancel', 'tp_head_script_admin_var_btn_cancel_label', TPOPlUGIN_TEXTDOMAIN); ?>';
            switch ('<?php echo $locale ?>'){
                case "ru_RU":
                    tpLocale = 'ru';
                    break;
                case "en_US":
                    tpLocale = 'en';
                    break;
                default :
                    tpLocale = 'en';
                    break;
            }
            TPdatepicker = {};
            TPdatepickerPlus = {};
            if(wpLocale == 'ru_RU'){
                TPdatepicker = {
                    monthNames: ['Январь','Февраль','Март','Апрель','Май','Июнь','Июль','Август','Сентябрь','Октябрь','Ноябрь','Декабрь'],
                    monthNamesShort: ['Янв','Фев','Мар','Апр','Май','Июн','Июл','Авг','Сен','Окт','Ноя','Дек'],
                    dayNames: ['воскресенье','понедельник','вторник','среда','четверг','пятница','суббота'],
                    dayNamesShort: ['вск','пнд','втр','срд','чтв','птн','сбт'],
                    dayNamesMin: ['Вс','Пн','Вт','Ср','Чт','Пт','Сб'],
                    dateFormat: 'dd-mm-yy',
                    firstDay: 1,
                    isRTL: false
                };
                TPdatepickerPlus = {
                    monthNames: ['Январь','Февраль','Март','Апрель','Май','Июнь','Июль','Август','Сентябрь','Октябрь','Ноябрь','Декабрь'],
                    monthNamesShort: ['Янв','Фев','Мар','Апр','Май','Июн','Июл','Авг','Сен','Окт','Ноя','Дек'],
                    dayNames: ['воскресенье','понедельник','вторник','среда','четверг','пятница','суббота'],
                    dayNamesShort: ['вск','пнд','втр','срд','чтв','птн','сбт'],
                    dayNamesMin: ['Вс','Пн','Вт','Ср','Чт','Пт','Сб'],
                    dateFormat: 'yy-mm-dd',
                    firstDay: 1,
                    isRTL: false

                };
            }

        </script>
        <style type="text/css">


            .TP-Activate {
                position: relative;
                overflow: auto;
                border: 1px solid #4f800d;
                padding: 5px;
                margin: 10px 20px 0 2px;
                background: #83af24;
                background-image: -webkit-gradient(linear,0% 0,80% 100%,from(#83AF24),to(#4F800D));
                background-image: -moz-gradient(linear,0% 0,80% 100%,from(#83AF24),to(#4F800D));
                background-image: -ms-gradient(linear,0% 0,80% 100%,from(#83AF24),to(#4F800D));
                background-image: -o-gradient(linear,0% 0,80% 100%,from(#83AF24),to(#4F800D));
                -webkit-border-radius: 3px;
                -moz-border-radius: 3px;
                border-radius: 3px;position: relative;
                overflow: hidden;
                font-family: 'Open Sans', sans-serif;
            }

            .TP-Activate_button_container {
                cursor: pointer;
                display: inline-block;
                background: #def1b8;
                padding: 5px;
                -webkit-border-radius: 2px;
                -moz-border-radius: 2px;
                border-radius: 2px;
                width: 266px;
            }
            .TP-Activate_button_border {
                background: #029dd6;
                background-image: -webkit-gradient(linear,0% 0,0% 100%,from(#029DD6),to(#0079B1));
                background-image: -moz-gradient(linear,0% 0,0% 100%,from(#029DD6),to(#0079B1));
                background-image: -ms-gradient(linear,0% 0,0% 100%,from(#029DD6),to(#0079B1));
                background-image: -o-gradient(linear,0% 0,0% 100%,from(#029DD6),to(#0079B1));
                -webkit-border-radius: 2px;
                -moz-border-radius: 2px;
                border-radius: 2px;
            }
            .TP-Activate_button {
                font-size: 17px;
                text-align: center;
                padding: 9px 0 8px 0;
                color: #fff;
                background: #69c7f4;
                -webkit-border-radius: 2px;
                -moz-border-radius: 2px;
                border-radius: 2px;
                text-transform: uppercase;
                -webkit-transition: all ease .3s;
                -moz-transition: all ease .3s;
                -ms-transition: all ease .3s;
                -o-transition: all ease .3s;
                transition: all ease .3s;
            }
            .TP-Activate_button:hover {
                text-decoration: none !important;
                background: #00abfd;
                -webkit-transition: all ease .3s;
                -moz-transition: all ease .3s;
                -ms-transition: all ease .3s;
                -o-transition: all ease .3s;
                transition: all ease .3s;
            }
            .TP-Activate_button a{
                text-decoration: none !important;
                color: #fff;
                font-size: 17px;
                display: inline-block;
            }
            .TP-Activate_description {
                position: absolute;
                top: 10px;
                left: 285px;
                margin-left: 25px;
                color: #e5f2b1;
                font-size: 15px;
                z-index: 1000;
            }
            .TP-Activate_a {
                position: absolute;
                top: 15px;
                right: 25px;
                color: #769f33;
                z-index: 1;
            }
            .TP-Activate-ico-avia {
                width: 55px;
                height: 55px;
                background-image: url("data:image/svg+xml;base64,PHN2ZyBmaWxsPSIjYzBjN2NhIiB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHdpZHRoPSIyNSIgaGVpZ2h0PSIyNCIgdmlld0JveD0iMCAwIDI1IDI0Ij48cGF0aCBkPSJNNS4wOTMgMGwxMS41NSA2LjY1YzEuMjM2LS42MjggMy4wNDItMS41NDggNC4yODgtMi4xNTMgMS41NTctLjc1NiAyLjU2LS40MzMgMi45MzcuMzQ1LjM3OC43NzgtLjAxMiAxLjcxNy0xLjU2OCAyLjQ3Mi0xLjI0Ny42MDUtMy4wNjQgMS41MDItNC4zMiAyLjA4NEwxNS43NDcgMjIuNjlsLTEuODg1LjktMS40MDMtMTEuNzI0LTYuNjggMi43OTQtLjY5NCA0LjA4Ni0xLjMuNjMtLjc0NC00LjQ3M0wwIDExLjU3NWwxLjMtLjYzIDMuNjQgMS45OCA2LjM2My0zLjQ0NC04LjM3Ny04LjQzTDQuODEuMTUzIi8+PC9zdmc+");
                background-size: cover;
            }
        </style>
    <?php
    }
    /*public function widget_content_wrap($content) {
        return $content;
    } */
    public function in_array_recursive($search, $array){
        $result = false;
        if (in_array($search, $array)) {
            return true;
        }
        foreach ($array as $value) {
            if (is_array($value)) {
                $result = $this->in_array_recursive($search, $value);
                if ($result) {
                    return TRUE;
                }//if
            } else {
                return (false !== strpos( $value, $search ));
            }//if
        }
        return $result;
    }

    /**
     *
     */
    public function loadScriptSiteFontStyle(){
        if(\app\includes\TPPlugin::$options['themes_table']['name'] == 'default-theme'){
            if(\app\includes\TPPlugin::$options['style_table']['title_style']['font_family'] == 'Roboto' ||
                \app\includes\TPPlugin::$options['style_table']['table']['font_family'] == 'Roboto') {
                wp_register_style(
                    TPOPlUGIN_SLUG . '-TPFontsRoboto',
                    'https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900&subset=latin,cyrillic-ext,cyrillic',
                    array(),
                    TPOPlUGIN_VERSION // $ver
                );
                wp_enqueue_style(TPOPlUGIN_SLUG. '-TPFontsRoboto');
            } elseif (\app\includes\TPPlugin::$options['style_table']['title_style']['font_family'] == 'Roboto Slab' ||
                \app\includes\TPPlugin::$options['style_table']['table']['font_family'] == 'Roboto Slab'){
                wp_register_style(
                    TPOPlUGIN_SLUG . '-TPFontsRobotoSlab',
                    'https://fonts.googleapis.com/css?family=Roboto+Slab:700&subset=latin,cyrillic-ext,cyrillic',
                    array(),
                    TPOPlUGIN_VERSION // $ver
                );
                wp_enqueue_style(TPOPlUGIN_SLUG. '-TPFontsRobotoSlab');

            } elseif (\app\includes\TPPlugin::$options['style_table']['title_style']['font_family'] == 'Ubuntu' ||
                \app\includes\TPPlugin::$options['style_table']['table']['font_family'] == 'Ubuntu'){
                wp_register_style(
                    TPOPlUGIN_SLUG . '-TPFontsUbuntu',
                    'https://fonts.googleapis.com/css?family=Ubuntu:300,700&subset=latin,cyrillic-ext,cyrillic',
                    array(),
                    TPOPlUGIN_VERSION // $ver
                );
                wp_enqueue_style(TPOPlUGIN_SLUG. '-TPFontsUbuntu');

            } elseif (\app\includes\TPPlugin::$options['style_table']['title_style']['font_family'] == 'Intro' ||
                \app\includes\TPPlugin::$options['style_table']['table']['font_family'] == 'Intro'){
                //TPFontsIntro
                wp_register_style(
                    TPOPlUGIN_SLUG . '-TPFontsIntro',
                    TPOPlUGIN_URL.'app/public/themes/flight/css/TPFontsIntro.css', // $src
                    array(), //$deps,
                    TPOPlUGIN_VERSION // $ver
                );
                wp_enqueue_style(TPOPlUGIN_SLUG. '-TPFontsIntro');

            }//Open Sans
            elseif (\app\includes\TPPlugin::$options['style_table']['title_style']['font_family'] == 'Open Sans' ||
                \app\includes\TPPlugin::$options['style_table']['table']['font_family'] == 'Open Sans'){
                wp_register_style(
                    TPOPlUGIN_SLUG . '-TPFontsOpenSans',
                    'https://fonts.googleapis.com/css?family=Open+Sans:700&subset=latin,cyrillic-ext,cyrillic',
                    array(),
                    TPOPlUGIN_VERSION // $ver
                );
                wp_enqueue_style(TPOPlUGIN_SLUG. '-TPFontsOpenSans');

            }
        } else {

            switch (\app\includes\TPPlugin::$options['themes_table']['name']){
                //1
                case 'default-theme':

                    break;
                //2
                case 'red-button-table':
                //3
                case 'blue-table':
                //4
                case 'grey-salad-table':
                //5
                case 'purple-table':
                //6
                case 'black-and-yellow-table':
                //7
                case 'dark-and-rainbow':
                //8
                case 'light-and-plum-table':
                //10
                case 'mint-table':
                    wp_register_style(
                        TPOPlUGIN_SLUG . '-TPFontsRoboto',
                        'https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900&subset=latin,cyrillic-ext,cyrillic',
                        array(),
                        TPOPlUGIN_VERSION // $ver
                    );
                    wp_enqueue_style(TPOPlUGIN_SLUG. '-TPFontsRoboto');
                    wp_register_style(
                        TPOPlUGIN_SLUG . '-TPFontsRobotoSlab',
                        'https://fonts.googleapis.com/css?family=Roboto+Slab:700&subset=latin,cyrillic-ext,cyrillic',
                        array(),
                        TPOPlUGIN_VERSION // $ver
                    );
                    wp_enqueue_style(TPOPlUGIN_SLUG. '-TPFontsRobotoSlab');
                    break;
                //9
                case 'light-yellow-and-darkgray':
                    wp_register_style(
                        TPOPlUGIN_SLUG . '-TPFontsIntro',
                        TPOPlUGIN_URL.'app/public/themes/flight/css/TPFontsIntro.css', // $src
                        array(), //$deps,
                        TPOPlUGIN_VERSION // $ver
                    );
                    wp_enqueue_style(TPOPlUGIN_SLUG. '-TPFontsIntro');
                    break;
                default:

            }
        }
    }

    /**
     *
     */
    public function loadScriptSiteThemeTables(){
        $this->loadScriptSiteThemeFlight();
        $this->loadScriptSiteThemeHotel();
        $this->loadScriptSiteThemeRailway();
    }

    public function loadScriptSiteThemeFlight(){
	    switch (\app\includes\TPPlugin::$options['themes_table']['name']){
		    case 'default-theme':
			    wp_register_style(
				    TPOPlUGIN_SLUG.'-TPMainFlight', //$handle
				    //TPOPlUGIN_URL.'app/public/css/site/TPMain.css', // $src
				    TPOPlUGIN_URL.'app/public/themes/flight/css/main.css', // $src
				    array(), //$deps,
				    TPOPlUGIN_VERSION // $ver
			    );
			    break;
		    case 'red-button-table':
			    wp_register_style(
				    TPOPlUGIN_SLUG.'-TPMainFlight', //$handle
				    TPOPlUGIN_URL.'app/public/themes/flight/css/table-8.css', // $src
				    array(), //$deps,
				    TPOPlUGIN_VERSION // $ver
			    );
			    break;
		    case 'blue-table':
			    wp_register_style(
				    TPOPlUGIN_SLUG.'-TPMainFlight', //$handle
				    TPOPlUGIN_URL.'app/public/themes/flight/css/table-7.css', // $src
				    array(), //$deps,
				    TPOPlUGIN_VERSION // $ver
			    );
			    break;
		    case 'grey-salad-table':
			    wp_register_style(
				    TPOPlUGIN_SLUG.'-TPMainFlight', //$handle
				    TPOPlUGIN_URL.'app/public/themes/flight/css/table-6.css', // $src
				    array(), //$deps,
				    TPOPlUGIN_VERSION // $ver
			    );
			    break;
		    case 'purple-table':
			    wp_register_style(
				    TPOPlUGIN_SLUG.'-TPMainFlight', //$handle
				    TPOPlUGIN_URL.'app/public/themes/flight/css/table-5.css', // $src
				    array(), //$deps,
				    TPOPlUGIN_VERSION // $ver
			    );
			    break;
		    case 'black-and-yellow-table':
			    wp_register_style(
				    TPOPlUGIN_SLUG.'-TPMainFlight', //$handle
				    TPOPlUGIN_URL.'app/public/themes/flight/css/table-4.css', // $src
				    array(), //$deps,
				    TPOPlUGIN_VERSION // $ver
			    );
			    break;
		    case 'dark-and-rainbow':
			    wp_register_style(
				    TPOPlUGIN_SLUG.'-TPMainFlight', //$handle
				    TPOPlUGIN_URL.'app/public/themes/flight/css/table-2.css', // $src
				    array(), //$deps,
				    TPOPlUGIN_VERSION // $ver
			    );
			    break;
		    case 'light-and-plum-table':
			    wp_register_style(
				    TPOPlUGIN_SLUG.'-TPMainFlight', //$handle
				    TPOPlUGIN_URL.'app/public/themes/flight/css/table-3.css', // $src
				    array(), //$deps,
				    TPOPlUGIN_VERSION // $ver
			    );
			    break;
		    case 'light-yellow-and-darkgray':
			    wp_register_style(
				    TPOPlUGIN_SLUG.'-TPMainFlight', //$handle
				    TPOPlUGIN_URL.'app/public/themes/flight/css/table-1.css', // $src
				    array(), //$deps,
				    TPOPlUGIN_VERSION // $ver
			    );
			    break;
		    case 'mint-table':
			    wp_register_style(
				    TPOPlUGIN_SLUG.'-TPMainFlight', //$handle
				    TPOPlUGIN_URL.'app/public/themes/flight/css/table-9.css', // $src
				    array(), //$deps,
				    TPOPlUGIN_VERSION // $ver
			    );
			    break;
		    default:

	    }
	    wp_enqueue_style(TPOPlUGIN_SLUG. '-TPMainFlight');
    }

	public function loadScriptSiteThemeHotel(){
		switch (\app\includes\TPPlugin::$options['themes_table_hotels']['name']){
			case 'default-theme':
				wp_register_style(
					TPOPlUGIN_SLUG.'-TPMainHotel', //$handle
					//TPOPlUGIN_URL.'app/public/css/site/TPMain.css', // $src
					TPOPlUGIN_URL.'app/public/themes/hotel/css/main.css', // $src
					array(), //$deps,
					TPOPlUGIN_VERSION // $ver
				);
				break;
			case 'red-button-table':
				wp_register_style(
					TPOPlUGIN_SLUG.'-TPMainHotel', //$handle
					TPOPlUGIN_URL.'app/public/themes/hotel/css/table-8.css', // $src
					array(), //$deps,
					TPOPlUGIN_VERSION // $ver
				);
				break;
			case 'blue-table':
				wp_register_style(
					TPOPlUGIN_SLUG.'-TPMainHotel', //$handle
					TPOPlUGIN_URL.'app/public/themes/hotel/css/table-7.css', // $src
					array(), //$deps,
					TPOPlUGIN_VERSION // $ver
				);
				break;
			case 'grey-salad-table':
				wp_register_style(
					TPOPlUGIN_SLUG.'-TPMainHotel', //$handle
					TPOPlUGIN_URL.'app/public/themes/hotel/css/table-6.css', // $src
					array(), //$deps,
					TPOPlUGIN_VERSION // $ver
				);
				break;
			case 'purple-table':
				wp_register_style(
					TPOPlUGIN_SLUG.'-TPMainHotel', //$handle
					TPOPlUGIN_URL.'app/public/themes/hotel/css/table-5.css', // $src
					array(), //$deps,
					TPOPlUGIN_VERSION // $ver
				);
				break;
			case 'black-and-yellow-table':
				wp_register_style(
					TPOPlUGIN_SLUG.'-TPMainHotel', //$handle
					TPOPlUGIN_URL.'app/public/themes/hotel/css/table-4.css', // $src
					array(), //$deps,
					TPOPlUGIN_VERSION // $ver
				);
				break;
			case 'dark-and-rainbow':
				wp_register_style(
					TPOPlUGIN_SLUG.'-TPMainHotel', //$handle
					TPOPlUGIN_URL.'app/public/themes/hotel/css/table-2.css', // $src
					array(), //$deps,
					TPOPlUGIN_VERSION // $ver
				);
				break;
			case 'light-and-plum-table':
				wp_register_style(
					TPOPlUGIN_SLUG.'-TPMainHotel', //$handle
					TPOPlUGIN_URL.'app/public/themes/hotel/css/table-3.css', // $src
					array(), //$deps,
					TPOPlUGIN_VERSION // $ver
				);
				break;
			case 'light-yellow-and-darkgray':
				wp_register_style(
					TPOPlUGIN_SLUG.'-TPMainHotel', //$handle
					TPOPlUGIN_URL.'app/public/themes/hotel/css/table-1.css', // $src
					array(), //$deps,
					TPOPlUGIN_VERSION // $ver
				);
				break;
			case 'mint-table':
				wp_register_style(
					TPOPlUGIN_SLUG.'-TPMainHotel', //$handle
					TPOPlUGIN_URL.'app/public/themes/hotel/css/table-9.css', // $src
					array(), //$deps,
					TPOPlUGIN_VERSION // $ver
				);
				break;
			default:

		}
        wp_enqueue_style(TPOPlUGIN_SLUG. '-TPMainHotel');
    }

    public function loadScriptSiteThemeRailway(){
	    /*switch (\app\includes\TPPlugin::$options['themes_table_hotels']['name']){
		    case 'default-theme':
			    wp_register_style(
				    TPOPlUGIN_SLUG.'-TPMainHotel', //$handle
				    //TPOPlUGIN_URL.'app/public/css/site/TPMain.css', // $src
				    TPOPlUGIN_URL.'app/public/themes/hotel/css/main.css', // $src
				    array(), //$deps,
				    TPOPlUGIN_VERSION // $ver
			    );
			    break;
		    case 'red-button-table':
			    wp_register_style(
				    TPOPlUGIN_SLUG.'-TPMainHotel', //$handle
				    TPOPlUGIN_URL.'app/public/themes/hotel/css/table-8.css', // $src
				    array(), //$deps,
				    TPOPlUGIN_VERSION // $ver
			    );
			    break;
		    case 'blue-table':
			    wp_register_style(
				    TPOPlUGIN_SLUG.'-TPMainHotel', //$handle
				    TPOPlUGIN_URL.'app/public/themes/hotel/css/table-7.css', // $src
				    array(), //$deps,
				    TPOPlUGIN_VERSION // $ver
			    );
			    break;
		    case 'grey-salad-table':
			    wp_register_style(
				    TPOPlUGIN_SLUG.'-TPMainHotel', //$handle
				    TPOPlUGIN_URL.'app/public/themes/hotel/css/table-6.css', // $src
				    array(), //$deps,
				    TPOPlUGIN_VERSION // $ver
			    );
			    break;
		    case 'purple-table':
			    wp_register_style(
				    TPOPlUGIN_SLUG.'-TPMainHotel', //$handle
				    TPOPlUGIN_URL.'app/public/themes/hotel/css/table-5.css', // $src
				    array(), //$deps,
				    TPOPlUGIN_VERSION // $ver
			    );
			    break;
		    case 'black-and-yellow-table':
			    wp_register_style(
				    TPOPlUGIN_SLUG.'-TPMainHotel', //$handle
				    TPOPlUGIN_URL.'app/public/themes/hotel/css/table-4.css', // $src
				    array(), //$deps,
				    TPOPlUGIN_VERSION // $ver
			    );
			    break;
		    case 'dark-and-rainbow':
			    wp_register_style(
				    TPOPlUGIN_SLUG.'-TPMainHotel', //$handle
				    TPOPlUGIN_URL.'app/public/themes/hotel/css/table-2.css', // $src
				    array(), //$deps,
				    TPOPlUGIN_VERSION // $ver
			    );
			    break;
		    case 'light-and-plum-table':
			    wp_register_style(
				    TPOPlUGIN_SLUG.'-TPMainHotel', //$handle
				    TPOPlUGIN_URL.'app/public/themes/hotel/css/table-3.css', // $src
				    array(), //$deps,
				    TPOPlUGIN_VERSION // $ver
			    );
			    break;
		    case 'light-yellow-and-darkgray':
			    wp_register_style(
				    TPOPlUGIN_SLUG.'-TPMainHotel', //$handle
				    TPOPlUGIN_URL.'app/public/themes/hotel/css/table-1.css', // $src
				    array(), //$deps,
				    TPOPlUGIN_VERSION // $ver
			    );
			    break;
		    case 'mint-table':
			    wp_register_style(
				    TPOPlUGIN_SLUG.'-TPMainHotel', //$handle
				    TPOPlUGIN_URL.'app/public/themes/hotel/css/table-9.css', // $src
				    array(), //$deps,
				    TPOPlUGIN_VERSION // $ver
			    );
			    break;
		    default:

	    }*/
	    wp_register_style(
		    TPOPlUGIN_SLUG.'-TPMainRailway', //$handle
		    //TPOPlUGIN_URL.'app/public/css/site/TPMain.css', // $src
		    TPOPlUGIN_URL.'app/public/themes/railway/css/main.css', // $src
		    array(), //$deps,
		    TPOPlUGIN_VERSION // $ver
	    );
	    wp_enqueue_style(TPOPlUGIN_SLUG. '-TPMainRailway');
    }



    /**
     * @param $hook
     */
    public function loadScriptSite($hook)
    {
        //$version = TPOPlUGIN_VERSION;
        $version = null;
        //add_filter( 'widget_text', array(&$this, 'widget_content_wrap') );

        //global $widgets;
        global $wp_styles;
       // global $post;

        //error_log(print_r(wp_get_sidebars_widgets(), true));
        //error_log(term_description());


        //if(false === $this->in_array_recursive('travelpayouts',wp_get_sidebars_widgets()) &&
       //     false === $this->isShortcodePost($post, '[tp') && !is_home() &&
         //   false === strpos( term_description(), 'TP-Plugin-Tables' )) return;

        if ($this->isScriptSite() == false) return;
        // TODO: Implement loadScriptSite() method.
        switch (\app\includes\TPPlugin::$options['config']['script']){
            case 0:
                $in_footer = false;
                break;
            case 1:
                $in_footer = true;
                break;
        }
        /** Register styles */
        wp_register_style(
            TPOPlUGIN_SLUG.'-TPNormilize', //$handle
            TPOPlUGIN_URL.'app/public/css/site/TPNormalize.css', // $src
            array(), //$deps,
            $version // $ver
        );

        wp_register_style(
            TPOPlUGIN_SLUG.'-fontello', //$handle
            TPOPlUGIN_URL.'app/public/css/lib/currency_fonts_new/css/fontello.css', // $src
            array(), //$deps,
            $version // $ver
        );
        wp_register_style(
            TPOPlUGIN_SLUG.'-animation', //$handle
            TPOPlUGIN_URL.'app/public/css/lib/currency_fonts_new/css/animation.css', // $src
            array(), //$deps,
            $version // $ver
        );
        wp_enqueue_style(
            TPOPlUGIN_SLUG.'-fontello-ie7', //$handle
            TPOPlUGIN_URL.'app/public/css/lib/currency_fonts_new/css/fontello-ie7.css', // $src
            array(), //$deps,
            $version // $ver
        );
        $wp_styles->add_data(  TPOPlUGIN_SLUG.'-fontello-ie7', 'conditional', 'IE 7' );
        wp_register_style(
            TPOPlUGIN_SLUG.'-TPCurrencyMain', //$handle
            TPOPlUGIN_URL.'app/public/css/lib/currency_fonts_new/css/TPCurrencyMainNew.css', // $src
            array(TPOPlUGIN_SLUG.'-fontello', TPOPlUGIN_SLUG.'-animation'), //$deps,
            $version // $ver
        );

        wp_register_style(
            TPOPlUGIN_SLUG.'-pikaday', //$handle
            TPOPlUGIN_URL.'app/public/css/lib/pikaday.css', // $src
            array(), //$deps,
            $version // $ver
        );


        $this->loadScriptSiteFontStyle();
        wp_register_style(
            TPOPlUGIN_SLUG.'-jquery-ui',
            TPOPlUGIN_URL.'app/public/css/lib/jquery-ui/jquery-ui.min.css',
            array(),
            $version
        );



        /** End register styles */

        /** Register scripts */
        wp_register_script(
            TPOPlUGIN_SLUG. '-dataTables',
            TPOPlUGIN_URL.'app/public/js/lib/jquery.dataTables.min.js',
            array(),
            $version,
            $in_footer
        );

        wp_register_script(
            TPOPlUGIN_SLUG. '-date-format',
            TPOPlUGIN_URL.'app/public/js/lib/date.format.js',
            array(),
            $version,
            $in_footer
        );

        wp_register_script(
            TPOPlUGIN_SLUG. '-pikaday',
            TPOPlUGIN_URL.'app/public/js/lib/pikaday.js',
            array(),
            $version,
            $in_footer
        );

        wp_register_script(
            TPOPlUGIN_SLUG. '-pikaday-jquery',
            TPOPlUGIN_URL.'app/public/js/lib/pikaday.jquery.js',
            array(
                TPOPlUGIN_SLUG. '-date-format',
                TPOPlUGIN_SLUG. '-pikaday',
            ),
            $version,
            $in_footer
        );



        wp_register_script(
            TPOPlUGIN_SLUG.'-TPPlugin', //$handle
            TPOPlUGIN_URL.'app/public/js/site/TPPlugin.js', //$src
            array(
                'jquery',
                'jquery-ui-tabs',
	            //'jquery-ui-datepicker',
                TPOPlUGIN_SLUG.'-dataTables',
                TPOPlUGIN_SLUG. '-pikaday-jquery',
                ), //$deps
            $version, //$ver
            $in_footer //$$in_footer
        );
        /** End register scripts */

        /** Call scripts and style **/
        $this->loadScriptSiteThemeTables();
        wp_enqueue_style(TPOPlUGIN_SLUG. '-TPNormalize');
        wp_enqueue_style( TPOPlUGIN_SLUG.'-pikaday');
        wp_enqueue_style(TPOPlUGIN_SLUG. '-jquery-ui');
        wp_enqueue_style(TPOPlUGIN_SLUG.'-TPCurrencyMain');
        wp_enqueue_script(TPOPlUGIN_SLUG. '-TPPlugin');
    }

    /**
     * @param $color
     * @param bool|false $opacity
     * @return string
     */
    public function ak_convert_hex2rgba($color, $opacity = false) {
        $default = 'rgb(0,0,0)';

        if (empty($color))
            return $default;

        if ($color[0] == '#')
            $color = substr($color, 1);

        if (strlen($color) == 6)
            $hex = array($color[0] . $color[1], $color[2] . $color[3], $color[4] . $color[5]);

        elseif (strlen($color) == 3)
            $hex = array($color[0] . $color[0], $color[1] . $color[1], $color[2] . $color[2]);

        else
            return $default;

        $rgb = array_map('hexdec', $hex);
        $rgb[0] -= 20;
        $rgb[1] -= 20;
        $rgb[2] -= 20;
        if ($opacity) {
            if (abs($opacity) > 1)
                $opacity = 1.0;
            $output = 'rgba(' . implode(",", $rgb) . ',' . $opacity . ')';
        } else {
            $output = 'rgb(' . implode(",", $rgb) . ')';
        }
        return $output;
    }


    public function isShortcodePost($post, $shortcode){
        //strpos( $post->post_content, '[tp' )
        if(is_object($post)){
            if(isset($post->post_content)){
               return strpos( $post->post_content, $shortcode );
            }
        }
        return false;
    }

    public function headScriptSite()
    {
        //global $post;

        //if(false === $this->in_array_recursive('travelpayouts',wp_get_sidebars_widgets()) &&
        //    false === $this->isShortcodePost($post, '[tp') && !is_home() &&
         //   false === strpos( term_description(), 'TP-Plugin-Tables' )) return;
        if ($this->isScriptSite() == false) return;
        // TODO: Implement headScriptSite() method.

        ?>
        <script type="text/javascript">
            var ajaxurl, title_case_destination, title_case_origin, tpLocale;
            ajaxurl = '<?php echo TPOPlUGIN_AJAX_URL; ?>';
            title_case_origin = '<?php echo \app\includes\TPPlugin::$options['local']['title_case']['origin']; ?>';
            title_case_destination = '<?php echo \app\includes\TPPlugin::$options['local']['title_case']['destination']; ?>';
            tpLocale = '<?php echo \app\includes\common\TPLang::getLang();?>';
        </script>
        <style type="text/css">
            .tp-pika-link{
                display: block;
            }
            .TPHotelStar{
                color: #fdb931;
            }
            .TPHotelPriceStrike{
                white-space: nowrap;
            }
            .TP-old-price-and {
                display: block;
                white-space: nowrap;
            }
            .TP-old-price-discount {
                margin-left: 5px;
            }
            .TPprice_pnTd p{
                white-space: nowrap;
            }
            .TPold_price_pnTd p{
                white-space: nowrap;
            }
            <?php
                if(isset(\app\includes\TPPlugin::$options['style_table']['table']['responsive'])){
                    ?>
                    .TP-Plugin-Tables_box {
                        display: block !important;
                        overflow-x: auto !important;
                        border: none !important;
                        border-left: <?php echo \app\includes\TPPlugin::$options['style_table']['table']['line_size']; ?>px <?php echo \app\includes\TPPlugin::$options['style_table']['table']['line_type']; ?> <?php echo \app\includes\TPPlugin::$options['style_table']['table']['line_color']; ?> !important;
                    }

                    <?php
                }else{
                    ?>
                    .TP-Plugin-Tables_box {
                        display: table !important;
                        border: <?php echo \app\includes\TPPlugin::$options['style_table']['table']['line_size']; ?>px <?php echo \app\includes\TPPlugin::$options['style_table']['table']['line_type']; ?> <?php echo \app\includes\TPPlugin::$options['style_table']['table']['line_color']; ?> !important;
                    }
                    .TPTdButtonShow{
                        overflow: hidden !important;
                    }
                    <?php

                }
             ?>
            .TP-TitleTables{
                font-size: <?php echo \app\includes\TPPlugin::$options['style_table']['title_style']['font_size']; ?>px !important;
                font-family: <?php echo \app\includes\TPPlugin::$options['style_table']['title_style']['font_family']; ?>, sans-serif !important;
                color: <?php echo \app\includes\TPPlugin::$options['style_table']['title_style']['color']; ?> !important;
            <?php
                if(isset(\app\includes\TPPlugin::$options['style_table']['title_style']['font_style']['bold'])){
                    echo 'font-weight: bold !important;';
                }else{
                    echo 'font-weight: normal !important;';
                }
                if(isset(\app\includes\TPPlugin::$options['style_table']['title_style']['font_style']['italic'])){
                    echo 'font-style: italic !important;';
                }else{
                    echo 'font-style: normal !important;';
                }
                if(isset(\app\includes\TPPlugin::$options['style_table']['title_style']['font_style']['underline'])){
                    echo 'text-decoration: underline !important;';
                }else{
                    echo 'text-decoration: none !important;';
                }
            ?>
            }


            <?php if(\app\includes\TPPlugin::$options['themes_table']['name'] == 'default-theme'): ?>
                .TP-tdContent a{
                    font-size: <?php echo \app\includes\TPPlugin::$options['style_table']['table']['font_size']; ?>px !important;
                    font-family: <?php echo \app\includes\TPPlugin::$options['style_table']['table']['font_family']; ?>, sans-serif !important;
                <?php
                    if(isset(\app\includes\TPPlugin::$options['style_table']['table']['font_style']['bold'])){
                        echo 'font-weight: bold !important;';
                    }
                    if(isset(\app\includes\TPPlugin::$options['style_table']['table']['font_style']['italic'])){
                        echo 'font-style: italic !important;';
                    }
                    if(isset(\app\includes\TPPlugin::$options['style_table']['table']['font_style']['underline'])){
                        echo 'text-decoration: underline !important;';
                    }
                ?>
                }
                .TPCurrencyIco{
                    font-size: <?php echo \app\includes\TPPlugin::$options['style_table']['table']['font_size']; ?>px !important;
                }
                .TP-Plugin-Tables_box thead tr td,.TP-Plugin-Tables_box tbody tr td,
                .TP-Plugin-Tables_box tbody tr td a span,
                .TP-Plugin-Tables_box tbody tr td p
                {
                    font-size: <?php echo \app\includes\TPPlugin::$options['style_table']['table']['font_size']; ?>px !important;
                    font-family: <?php echo \app\includes\TPPlugin::$options['style_table']['table']['font_family']; ?>, sans-serif !important;
                <?php
                    if(isset(\app\includes\TPPlugin::$options['style_table']['table']['font_style']['bold'])){
                        echo 'font-weight: bold !important;';
                    }
                    if(isset(\app\includes\TPPlugin::$options['style_table']['table']['font_style']['italic'])){
                        echo 'font-style: italic !important;';
                    }
                    if(isset(\app\includes\TPPlugin::$options['style_table']['table']['font_style']['underline'])){
                        echo 'text-decoration: underline !important;';
                    }
                ?>
                }
                .TP-Plugin-Tables_box tbody tr td {
                    color: <?php echo \app\includes\TPPlugin::$options['style_table']['table']['color']; ?> !important;
                }
                .TP-Plugin-Tables_box tbody tr:nth-child(even) {
                    background: <?php echo \app\includes\TPPlugin::$options['style_table']['table']['background_color']; ?> !important;
                }
                .TP-Plugin-Tables_box tbody tr:nth-child(even) td p:after {
                    background: transparent linear-gradient(to right, rgba(242, 242, 242, 0), <?php echo \app\includes\TPPlugin::$options['style_table']['table']['background_color']; ?>) repeat scroll 0% 0%;
                }
                .TPAirlineLogoTD{
                    width: auto !important;
                    <?php //echo \app\includes\TPPlugin::$options['config']['airline_logo_size']['width']; ?>
                }
                .TP-Plugin-Tables_box thead tr td{
                    background: <?php echo \app\includes\TPPlugin::$options['style_table']['table']['head_color']; ?>;
                }
                @media (max-width: 480px){
                    .TP-Plugin-Tables_box tbody tr td:before {
                        background: <?php echo \app\includes\TPPlugin::$options['style_table']['table']['head_color']; ?> !important;
                        color: <?php echo \app\includes\TPPlugin::$options['style_table']['table']['head_text_color']; ?> !important;
                    }
                    .TP-Plugin-Tables_box tbody tr td {
                        background-color: #FFF !important;
                    }
                }
                .TP-Plugin-Tables_box thead tr td.TP-active {
                    background: <?php echo $this->ak_convert_hex2rgba(\app\includes\TPPlugin::$options['style_table']['table']['head_color'], 1); ?>;
                   /* box-shadow: 0 0 44px rgba(0,0,0,0.3) inset;  */
                }


                .TP-Plugin-Tables_box thead tr td {
                    color: <?php echo \app\includes\TPPlugin::$options['style_table']['table']['head_text_color']; ?>;
                }



                a.paginate_button.current {
                    border-color: <?php echo \app\includes\TPPlugin::$options['style_table']['table']['head_color']; ?>;
                    background: <?php echo \app\includes\TPPlugin::$options['style_table']['table']['head_color']; ?>;
                    color:  <?php echo \app\includes\TPPlugin::$options['style_table']['table']['head_text_color']; ?>;
                }
                a.paginate_button:hover {
                    border-color: <?php echo \app\includes\TPPlugin::$options['style_table']['table']['head_color']; ?>;
                    text-decoration: none;
                    cursor: pointer;
                    color: <?php echo \app\includes\TPPlugin::$options['style_table']['table']['head_color']; ?> !important;
                }
                a.paginate_button.current:hover {
                    color:  <?php echo \app\includes\TPPlugin::$options['style_table']['table']['head_text_color']; ?> !important;
                }

                .TP-Plugin-Tables_box tbody tr td .TP-Plugin-Tables_link {
                    border-bottom: 1px solid <?php echo \app\includes\TPPlugin::$options['style_table']['button']['border']; ?> !important;
                    background: <?php echo \app\includes\TPPlugin::$options['style_table']['button']['background']; ?> !important;
                    color:  <?php echo \app\includes\TPPlugin::$options['style_table']['button']['color']; ?> !important;
                    <?php
                       if(isset(\app\includes\TPPlugin::$options['style_table']['button']['font_style']['bold'])){
                           echo 'font-weight: bold !important;';
                       }else{
                           echo 'font-weight: normal !important;';
                       }
                       if(isset(\app\includes\TPPlugin::$options['style_table']['button']['font_style']['italic'])){
                           echo 'font-style: italic !important;';
                       }else{
                           echo 'font-style: normal !important;';
                       }
                       if(isset(\app\includes\TPPlugin::$options['style_table']['button']['font_style']['underline'])){
                           echo 'text-decoration: underline !important;';
                       }else{
                           echo 'text-decoration: none !important;';
                       }
                   ?>
                }
                .TP-Plugin-Tables_box tbody tr td .TP-Plugin-Tables_link:hover {
                    background: <?php echo $this->ak_convert_hex2rgba(\app\includes\TPPlugin::$options['style_table']['button']['background'], 0.7); ?> !important;
                }
            <?php endif; ?>
        </style>
    <?php
    }

    public function footerScriptSite()
    {
        // TODO: Implement footerScriptSite() method.
        //global $post;
        //if(false === $this->in_array_recursive('travelpayouts',wp_get_sidebars_widgets()) &&
        //    false === $this->isShortcodePost($post, '[tp') && !is_home() &&
        //    false === strpos( term_description(), 'TP-Plugin-Tables' )) return;
        if ($this->isScriptSite() == false) return;
        ?>
        <script type="text/javascript">
            <?php if(!empty(\app\includes\TPPlugin::$options['config']['code_ga_ym'])){?>
            jQuery(function($) {
                var doc, win;
                doc = $(document);
                doc.find('.TPButtonTable').click(function () {
                    <?php echo \app\includes\TPPlugin::$options['config']['code_ga_ym']; ?>
                });
            });
            <?php }?>
            <?php if(!empty(\app\includes\TPPlugin::$options['config']['code_table_ga_ym'])){?>
            jQuery(function($) {
                var doc, win;
                doc = $(document);
                doc.ready(function () {
                    $(window).load(function() {
                        doc.find('.TPTableShortcode').each(function( index ) {
                            <?php echo \app\includes\TPPlugin::$options['config']['code_table_ga_ym']; ?>
                        });
                        //insert all your ajax callback code here.
                        //Which will run only after page is fully loaded in background.
                    });
                });
            });
            <?php }?>
        </script>
        <?php
    }

    /**
     * @return bool
     */
    public function isScriptSite(){
        global $post;
        $isScript = false;
        if (isset(\app\includes\TPPlugin::$options['config']['limit_script'])) {

            $isScript = true;
        } else {
            if(false === $this->in_array_recursive('travelpayouts',wp_get_sidebars_widgets()) &&
                false === $this->isShortcodePost($post, '[tp') && !is_home() &&
                false === strpos( term_description(), 'TP-Plugin-Tables' ))
                $isScript = false;
            else
                $isScript = true;
        }
        return $isScript;
    }
}