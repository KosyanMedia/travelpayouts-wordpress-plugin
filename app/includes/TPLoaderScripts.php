<?php
/**
 * Created by PhpStorm.
 * User: freeman
 * Date: 07.08.15
 * Time: 0:35
 */

class TPLoaderScripts extends KPDLoaderScripts{

    public function loadScriptAdmin($hook)
    {
        // TODO: Implement loadScriptAdmin() method.
        /** Register styles */
        wp_register_style(
            KPDPlUGIN_SLUG.'-InsertShortcodes', //$handle
            KPDPlUGIN_URL.'app/public/css/admin/TPInsertShortcodes.css', // $src
            array(), //$deps,
            KPDPlUGIN_VERSION // $ver
        );
        wp_register_style(
            KPDPlUGIN_SLUG.'-TPAdminNormalize', //$handle
            KPDPlUGIN_URL.'app/public/css/admin/TPAdminNormalize.css', // $src
            array(), //$deps,
            KPDPlUGIN_VERSION // $ver
        );
        wp_register_style(
            KPDPlUGIN_SLUG.'-bellows',
            KPDPlUGIN_URL.'app/public/css/lib/bellows.css',
            array(),
            KPDPlUGIN_VERSION
        );
        wp_register_style(
            KPDPlUGIN_SLUG.'-TPAdminMain', //$handle
            KPDPlUGIN_URL.'app/public/css/admin/TPAdminMain.css', // $src
            array(KPDPlUGIN_SLUG.'-bellows'), //$deps,
            KPDPlUGIN_VERSION // $ver
        );
        /** End register styles */
        /** Register scripts */
        wp_register_script(
            KPDPlUGIN_SLUG.'-AutocompleteAirlines', //$handle
            KPDPlUGIN_URL.'app/public/js/lib/autocomplete/autocomplete_airlines.js', //$src
            array(), //$deps
            KPDPlUGIN_VERSION, //$ver
            true //$in_footer
        );
        wp_register_script(
            KPDPlUGIN_SLUG.'-AutocompleteScript', //$handle
            KPDPlUGIN_URL.'app/public/js/lib/TPAdminAutocomplete.js', //$src
            array('jquery', 'jquery-ui-autocomplete'), //$deps
            KPDPlUGIN_VERSION, //$ver
            true //$in_footer
        );
        wp_register_script(
            KPDPlUGIN_SLUG.'-InsertShortcodes', //$handle
            KPDPlUGIN_URL.'app/public/js/admin/TPInsertShortcodes.js', //$src
            array('jquery', 'jquery-ui-autocomplete','jquery-ui-dialog',
                'jquery-ui-core', 'jquery-ui-datepicker'), //$deps
            KPDPlUGIN_VERSION, //$ver
            true //$in_footer
        );
        wp_register_script(
            KPDPlUGIN_SLUG.'-fileDownload', //$handle
            KPDPlUGIN_URL.'app/public/js/lib/download.js', //$src
            array(), //$deps
            KPDPlUGIN_VERSION, //$ver
            true //$in_footer
        );
        wp_register_script(
            KPDPlUGIN_SLUG.'-jqColorPicker', //$handle
            KPDPlUGIN_URL.'app/public/js/lib/jqColorPicker.min.js', //$src
            array(), //$deps
            KPDPlUGIN_VERSION, //$ver
            true //$in_footer
        );
        wp_register_script(
            KPDPlUGIN_SLUG.'-excellentexport', //$handle
            KPDPlUGIN_URL.'app/public/js/lib/excellentexport.min.js', //$src
            array(), //$deps
            KPDPlUGIN_VERSION, //$ver
            true //$in_footer
        );
        wp_register_script(
            KPDPlUGIN_SLUG.'-dataTables', //$handle
            KPDPlUGIN_URL.'app/public/js/lib/jquery.dataTables.min.js', //$src
            array(), //$deps
            KPDPlUGIN_VERSION, //$ver
            true //$in_footer
        );
        wp_register_script(
            KPDPlUGIN_SLUG.'-TPAdminPluginPage', //$handle
            KPDPlUGIN_URL.'app/public/js/admin/TPAdminPluginPage.js', //$src
            array('jquery', 'wp-color-picker','jquery-ui-autocomplete',
                'jquery-ui-accordion','jquery-ui-sortable',
                'jquery-ui-button','jquery-form', 'jquery-ui-tabs',
                KPDPlUGIN_SLUG.'-fileDownload', KPDPlUGIN_SLUG.'-jqColorPicker',
                KPDPlUGIN_SLUG.'-excellentexport', KPDPlUGIN_SLUG.'-dataTables'), //$deps
            KPDPlUGIN_VERSION, //$ver
            true //$in_footer
        );
        wp_register_script(
            KPDPlUGIN_SLUG.'-velocity', //$handle
            KPDPlUGIN_URL.'app/public/js/lib/velocity.min.js', //$src
            array(), //$deps
            KPDPlUGIN_VERSION, //$ver
            true //$in_footer
        );
        wp_register_script(
            KPDPlUGIN_SLUG.'-bellows', //$handle
            KPDPlUGIN_URL.'app/public/js/lib/bellows.min.js', //$src
            array(), //$deps
            KPDPlUGIN_VERSION, //$ver
            true //$in_footer
        );
        wp_register_script(
            KPDPlUGIN_SLUG.'-zelect', //$handle
            KPDPlUGIN_URL.'app/public/js/lib/zelect.js', //$src
            array(), //$deps
            KPDPlUGIN_VERSION, //$ver
            true //$in_footer
        );
        wp_register_script(
            KPDPlUGIN_SLUG. '-jquery-spinner', //$handle
            KPDPlUGIN_URL.'app/public/js/lib/jquery.spinner.js', //$src
            array(), //$deps
            KPDPlUGIN_VERSION, //$ver
            true //$in_footer
        );
        wp_register_script(
            KPDPlUGIN_SLUG.'-TPAdminMain', //$handle
            KPDPlUGIN_URL.'app/public/js/admin/TPAdminMain.js', //$src
            array(KPDPlUGIN_SLUG.'-velocity',
                KPDPlUGIN_SLUG.'-bellows', KPDPlUGIN_SLUG.'-zelect',
                KPDPlUGIN_SLUG.'-jquery-spinner',
                'jquery', 'jquery-ui-core', 'jquery-ui-tooltip',
                'jquery-ui-datepicker'), //$deps
            KPDPlUGIN_VERSION, //$ver
            true //$in_footer
        );

        /** End register scripts */
        /** Call scripts and style **/
        wp_enqueue_script(KPDPlUGIN_SLUG. '-AutocompleteAirlines');
        wp_enqueue_script(KPDPlUGIN_SLUG. '-AutocompleteScript');
        switch($hook) {
            case "post.php":
            case "post-new.php":
                wp_enqueue_style('wp-jquery-ui-dialog');
                wp_enqueue_style(KPDPlUGIN_SLUG.'-InsertShortcodes');
                wp_enqueue_script(KPDPlUGIN_SLUG.'-InsertShortcodes');
                break;
        }
        if(strripos($hook, 'travelpayouts') !== false ){
            wp_enqueue_style(KPDPlUGIN_SLUG.'-TPAdminNormalize');
            wp_enqueue_style(KPDPlUGIN_SLUG.'-TPAdminMain');
            wp_enqueue_script(KPDPlUGIN_SLUG.'-TPAdminPluginPage');
            wp_enqueue_script(KPDPlUGIN_SLUG.'-TPAdminMain');
        }
    }

    public function headScriptAdmin()
    {
        // TODO: Implement headScriptAdmin() method.
        ?>
        <script type="text/javascript">
            var ajaxurl, tpLocale, button_ok, button_cancel, TPdatepicker, wpLocale, TPStatsTotal, TPStatsTotalTrText,
                TPTableEmpty, TPDestinationTitle, TPOriginTitle, TPLocationTitlt;
            TPDestinationTitle = '<?php _e('Destination', KPDPlUGIN_TEXTDOMAIN ); ?>';
            TPOriginTitle = '<?php _e('Origin', KPDPlUGIN_TEXTDOMAIN ); ?>';
            TPLocationTitlt = '<?php _e('Location', KPDPlUGIN_TEXTDOMAIN ); ?>';
            <?php
                if(isset(TPPlugin::$options['admin_settings']['total_stats'])){
            ?>
                    TPStatsTotal = true;
            <?php
                }else{
            ?>
                TPStatsTotal = false;
            <?php
                }
            ?>
            TPTableEmpty = '<?php _e('No payments!', KPDPlUGIN_TEXTDOMAIN); ?>';
            TPStatsTotalTrText = '<?php _e('Grand total this month', KPDPlUGIN_TEXTDOMAIN); ?>';
            wpLocale = '<?php echo get_locale(); ?>';
            ajaxurl = '<?php echo KPDPlUGIN_AJAX_URL; ?>';
            button_ok = '<?php _e( 'Create', KPDPlUGIN_TEXTDOMAIN); ?>';
            button_cancel = '<?php _e( 'Cancel', KPDPlUGIN_TEXTDOMAIN); ?>';
            switch ( <?php echo TPPlugin::$options['local']['localization'] ?>){
                case 1:
                    tpLocale = 'ru';

                    break;
                case 2:
                    tpLocale = 'en';
                    break;
            }
            TPdatepicker = {};
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
            }

        </script>
    <?php
    }

    public function loadScriptSite($hook)
    {
        // TODO: Implement loadScriptSite() method.
        error_log("site");
    }

    public function headScriptSite()
    {
        // TODO: Implement headScriptSite() method.
    }
}