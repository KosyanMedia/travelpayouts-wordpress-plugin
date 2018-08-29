
<div id="constructorWidgetModal" title="<?php _ex('Constructor widgets',  'tp_admin_page_settings_сonstructor_widgets_title', TPOPlUGIN_TEXTDOMAIN ); ?>" style="display: none;">
    <form id="constructorWidgetModalForm">
        <table id="constructorWidgetModalTable">
            <tbody>
            <tr id="tr_select_widgets">
                <td id="td_select_widgets">
                    <select name="select_widgets" id="select_widgets"
                            data-widgets-size-width-1="<?php echo \app\includes\TPPlugin::$options['widgets']['1']['width'] ?>"
                            data-widgets-size-height-1="<?php echo \app\includes\TPPlugin::$options['widgets']['1']['height'] ?>"
                            data-widgets-size-width-2="<?php echo \app\includes\TPPlugin::$options['widgets']['2']['width'] ?>"
                            data-widgets-size-height-2="<?php echo \app\includes\TPPlugin::$options['widgets']['2']['height'] ?>"
                            data-widgets-direct-1 = "<?php echo (isset(\app\includes\TPPlugin::$options['widgets']['1']['direct']))? 1 : 0;?>"
                            data-widgets-direct-3 = "<?php echo (isset(\app\includes\TPPlugin::$options['widgets']['3']['only_direct']))? 1 : 0;?>"
                            data-widgets-one_way-3 = "<?php echo (isset(\app\includes\TPPlugin::$options['widgets']['3']['one_way']))? 1 : 0;?>"
                            data-widgets-size-width-3 = "<?php echo \app\includes\TPPlugin::$options['widgets']['3']['width'] ?>"
                            data-widgets-responsive-3 = "<?php echo (isset(\app\includes\TPPlugin::$options['widgets']['3']['responsive']))? 1 : 0;?>"
                            data-widgets-responsive-4 = "<?php echo (isset(\app\includes\TPPlugin::$options['widgets']['4']['responsive']))? 1 : 0;?>"
                            data-widgets-size-width-4 = "<?php echo \app\includes\TPPlugin::$options['widgets']['4']['width'] ?>"
                            data-widgets-size-width-5 = "<?php echo \app\includes\TPPlugin::$options['widgets']['5']['width'] ?>"
                            data-widgets-responsive-5 = "<?php echo (isset(\app\includes\TPPlugin::$options['widgets']['5']['responsive']))? 1 : 0;?>"
                            data-widgets-size-width-6 = "<?php echo \app\includes\TPPlugin::$options['widgets']['6']['width'] ?>"
                            data-widgets-responsive-6 = "<?php echo (isset(\app\includes\TPPlugin::$options['widgets']['6']['responsive']))? 1 : 0;?>"
                            data-widgets-size-width-7 = "<?php echo \app\includes\TPPlugin::$options['widgets']['7']['width'] ?>"
                            data-widgets-responsive-7 = "<?php echo (isset(\app\includes\TPPlugin::$options['widgets']['7']['responsive']))? 1 : 0;?>"
                            data-widgets-limit-7 = "<?php echo \app\includes\TPPlugin::$options['widgets']['7']['limit'] ?>"
                            data-widgets-type-7 = "<?php echo \app\includes\TPPlugin::$options['widgets']['7']['type'] ?>"
                            data-widgets-size-width-8 = "<?php echo \app\includes\TPPlugin::$options['widgets']['8']['width'] ?>"
                            data-widgets-responsive-8 = "<?php echo (isset(\app\includes\TPPlugin::$options['widgets']['8']['responsive']))? 1 : 0;?>"
                            data-widgets-powered_by-3 = "<?php echo (isset(\app\includes\TPPlugin::$options['widgets']['3']['powered_by']))? 1 : 0;?>"
                            data-widgets-powered_by-5 = "<?php echo (isset(\app\includes\TPPlugin::$options['widgets']['5']['powered_by']))? 1 : 0;?>"
                            data-widgets-powered_by-6 = "<?php echo (isset(\app\includes\TPPlugin::$options['widgets']['6']['powered_by']))? 1 : 0;?>"
                            data-widgets-powered_by-7 = "<?php echo (isset(\app\includes\TPPlugin::$options['widgets']['7']['powered_by']))? 1 : 0;?>"
                            data-widgets-powered_by-8 = "<?php echo (isset(\app\includes\TPPlugin::$options['widgets']['8']['powered_by']))? 1 : 0;?>"

                    >
                        <option selected="selected" value="0">
                            <?php _ex('Select widget',
                                'tp_admin_page_settings_сonstructor_widgets_field_select_widget_value_0', TPOPlUGIN_TEXTDOMAIN ); ?>
                        </option>
                        <option value="1">
                            <?php _ex('Map Widget',
                                'tp_admin_page_settings_сonstructor_widgets_field_select_widget_value_1', TPOPlUGIN_TEXTDOMAIN ); ?>
                        </option>
                        <option value="2">
                            <?php _ex('Hotels Map Widget',
                                'tp_admin_page_settings_сonstructor_widgets_field_select_widget_value_2', TPOPlUGIN_TEXTDOMAIN ); ?>
                        </option>
                        <option value="3">
                            <?php _ex('Calendar Widget',
                                'tp_admin_page_settings_сonstructor_widgets_field_select_widget_value_3', TPOPlUGIN_TEXTDOMAIN ); ?>
                        </option>
                        <?php if(\app\includes\common\TPLang::getLang() == \app\includes\common\TPLang::getLangRU()){ ?>
                            <option value="4">
                                <?php _ex('Subscription Widget',
                                    'tp_admin_page_settings_сonstructor_widgets_field_select_widget_value_4', TPOPlUGIN_TEXTDOMAIN ); ?>
                            </option>
                        <?php } ?>
                        <option value="5">
                            <?php _ex('Hotel Widget',
                                'tp_admin_page_settings_сonstructor_widgets_field_select_widget_value_5', TPOPlUGIN_TEXTDOMAIN ); ?>
                        </option>
                        <option value="6">
                            <?php _ex('Popular Destinations Widget',
                                'tp_admin_page_settings_сonstructor_widgets_field_select_widget_value_6', TPOPlUGIN_TEXTDOMAIN ); ?>
                        </option>
                        <option value="7">
                            <?php _ex('Hotels Selections Widget',
                                'tp_admin_page_settings_сonstructor_widgets_field_select_widget_value_7', TPOPlUGIN_TEXTDOMAIN ); ?>
                        </option>
                        <option value="8">
                            <?php _ex('Best deals widget',
                                'tp_admin_page_settings_сonstructor_widgets_field_select_widget_value_8', TPOPlUGIN_TEXTDOMAIN ); ?>
                        </option>
                    </select>
            </tr>
            <tr id="tr_subid_widget">
                <td>
                    <input type="text" name="tp_subid" id="tp_subid_widget" value=""
                           class="regular-text code"
                           placeholder="<?php _ex('Subid',
                               'tp_admin_page_settings_сonstructor_widgets_field_subid_label', TPOPlUGIN_TEXTDOMAIN); ?>">
                </td>
            </tr>
            <tr id="tr_type_widget_8">
                <td>
                    <span>
                        <?php _ex('Widget type',
                            'tp_admin_page_settings_сonstructor_widgets_field_type_widget_8_label', TPOPlUGIN_TEXTDOMAIN ); ?>
                    </span>
                    <select name="type_widget_8" id="type_widget_8">
                        <option <?php selected( \app\includes\TPPlugin::$options["widgets"]['8']['type'], 'full'); ?>
                            value="brickwork">
                            <?php _ex('Tile',
                                'tp_admin_page_settings_сonstructor_widgets_field_type_widget_8_value_0', TPOPlUGIN_TEXTDOMAIN ); ?>
                        </option>
                        <option <?php selected( \app\includes\TPPlugin::$options["widgets"]['8']['type'], 'compact'); ?>
                            value="slider">
                            <?php _ex('Slider',
                                'tp_admin_page_settings_сonstructor_widgets_field_type_widget_8_value_1', TPOPlUGIN_TEXTDOMAIN ); ?>
                        </option>
                    </select>
                </td>
            </tr>
            <tr id="tr_filter_widget">
                <td>
                    <label>
                        <input type="radio" name="filter" value="0"
                            <?php checked(\app\includes\TPPlugin::$options['widgets']['8']['filter'], 0) ?>>
                        <?php _ex('Filter by airlines',
                            'tp_admin_page_settings_сonstructor_widgets_field_filter_widget_8_value_0_label', TPOPlUGIN_TEXTDOMAIN); ?>
                    </label>
                    <br/>
                    <label>
                        <input type="radio" name="filter" value="1"
                            <?php checked(\app\includes\TPPlugin::$options['widgets']['8']['filter'], 1) ?>>
                        <?php  _ex('Filter by routes',
                            'tp_admin_page_settings_сonstructor_widgets_field_filter_widget_8_value_1_label', TPOPlUGIN_TEXTDOMAIN); ?>
                    </label>
                </td>
            </tr>
            <tr id="tr_airline_widget_8">
                <td>
                    <table id="table_airline_widget_8">
                        <tbody>
                            <tr class="tr_table_airline_widget_8">
                                <td style="width: 70%">
                                    <input type="text" name="airline_widget_118" id="airline_widget_8" value=""
                                           class="constructorAirlineShortcodesAutocomplete airline_widget_8"
                                           placeholder="<?php _ex('Airline',
                                               'tp_admin_page_settings_сonstructor_widgets_field_airline_widget_8_label', TPOPlUGIN_TEXTDOMAIN); ?>">
                                    <!--<a href="#" class="TPBtnDelete">
                                        <i></i>
                                        <?php _ex('Delete',
                                        'tp_admin_page_settings_сonstructor_widgets_field_airline_widget_8_btn_delete_label', TPOPlUGIN_TEXTDOMAIN); ?>
                                    </a>-->
                                </td>
                            </tr>

                        </tbody>

                    </table>
                    <a href="#" class="TPBtnAdd">
                        <i></i>
                        <?php _ex('Add',
                            'tp_admin_page_settings_сonstructor_widgets_field_widget_8_btn_add_label', TPOPlUGIN_TEXTDOMAIN); ?>
                    </a>
                </td>
            </tr>
            <tr id="tr_iata_widget_8">
                <td>
                    <table  id="table_iata_widget_8">
                        <tr>
                            <td>
                                <input type="text" name="origin_8" id="origin_widget_8" value=""
                                       class="constructorCityShortcodesAutocomplete regular-text code"
                                       placeholder="<?php  _ex('Origin',
                                           'tp_admin_page_settings_сonstructor_widgets_field_origin_widget_8_label', TPOPlUGIN_TEXTDOMAIN ); ?>">
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <input type="text" name="destination_8" id="destination_widget_8" value=""
                                       class="constructorCityShortcodesAutocomplete regular-text code"
                                       placeholder="<?php  _ex('Destination',
                                           'tp_admin_page_settings_сonstructor_widgets_field_destination_widget_8_label', TPOPlUGIN_TEXTDOMAIN ); ?>">
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
            <tr id="tr_limit_widget_8">
                <td>
                    <span>
                        <?php _ex('Limit',
                            'tp_admin_page_settings_сonstructor_widgets_field_limit_widget_8_label', TPOPlUGIN_TEXTDOMAIN ); ?>
                    </span>
                    <select name="limit_widget_8" id="limit_widget_8">
                        <?php for($i = 1; $i < 22; $i++){ ?>
                            <option <?php selected( \app\includes\TPPlugin::$options["widgets"]['8']['limit'], $i ); ?>
                                value="<?php echo $i; ?>"><?php echo $i; ?></option>
                        <?php } ?>

                    </select>
                </td>
            </tr>
            <tr id="tr_origin_widget">
                <td>
                    <input type="text" name="origin" id="origin_widget" value=""
                           class="constructorCityShortcodesAutocomplete regular-text code"
                           placeholder="<?php _ex('Origin',
                               'tp_admin_page_settings_сonstructor_widgets_field_origin_label', TPOPlUGIN_TEXTDOMAIN ); ?>">
                </td>
            </tr>
            <tr id="tr_destination_widget">
                <td>
                    <input type="text" name="destination" id="destination_widget" value=""
                           class="constructorCityShortcodesAutocomplete regular-text code"
                           placeholder="<?php _ex('Destination',
                               'tp_admin_page_settings_сonstructor_widgets_field_destination_label', TPOPlUGIN_TEXTDOMAIN ); ?>">
                </td>
            </tr>
            <tr id="tr_calendar_period_widget">
                <td>
                    <?php

                        global $wp_locale;
                        $output_month = '';
                        $monthNames = array_map(array(&$wp_locale, 'get_month'), range(1, 12));
                        $output_month .= '<option value="year"
                        '.selected( \app\includes\TPPlugin::$options['widgets']['3']['period'], 'year' , false).'>
                        '._x('Year',
                                'tp_admin_page_settings_сonstructor_widgets_field_calendar_period_value_year', TPOPlUGIN_TEXTDOMAIN ).'</option>';
                        $output_month .= '<option value="current_month"
                    '.selected( \app\includes\TPPlugin::$options['widgets']['3']['period'], 'current_month' , false).'>
                    '._x('Current month',
                                'tp_admin_page_settings_сonstructor_widgets_field_calendar_period_value_current_month', TPOPlUGIN_TEXTDOMAIN ).'</option>';
                        $current_date = getdate();
                        $m = false;
                        $out_c = '';
                        $out_n = '';
                        foreach ($monthNames as $key=>$month) {

                            if(($key+1) == $current_date['mon']){
                                $m = true;
                            }
                            if($m){
                                $out_c .= '<option value="'.date('Y').'-'.str_pad(($key+1),  2, '0', STR_PAD_LEFT).'-01'.'"'
                                    .selected( \app\includes\TPPlugin::$options['widgets']['3']['period'], date('Y').'-'.($key+1).'-01', false).'>'
                                    .$month.'</option>';
                            }else{

                                $out_n .= '<option value="'.date('Y', strtotime('+1 year')).'-'.str_pad(($key+1),  2, '0', STR_PAD_LEFT).'-01'.'"'
                                    .selected( \app\includes\TPPlugin::$options['widgets']['3']['period'], date('Y', strtotime('+1 year')).'-'.($key+1).'-01', false).'>'
                                    .$month.'</option>';
                            }
                        }
                        $output_month .= $out_c.$out_n;
                    ?>
                    <select name="calendar_period" id="calendar_period">
                        <?php echo $output_month; ?>
                    </select>
                </td>
            </tr>
            <tr id="tr_calendar_period_size_widget">
                <td>
                    <?php _ex('Range, days',
                        'tp_admin_page_settings_сonstructor_widgets_field_period_day_label', TPOPlUGIN_TEXTDOMAIN ); ?>:
                    <input type="number" class="small-text" id="calendar_period_from" min="1"
                           value="<?php echo esc_attr(\app\includes\TPPlugin::$options['widgets']['3']['period_day']['from']) ?>">
                    X
                    <input type="number" class="small-text" id="calendar_period_to" min="1"
                           value="<?php echo esc_attr(\app\includes\TPPlugin::$options['widgets']['3']['period_day']['to']) ?>">
                </td>
            </tr>
            <tr id="tr_hotel_id_widget">
                <td>
                    <input type="text" name="origin" id="hotel_id_widget" value=""
                           class="constructorWidgetHotelShortcodesAutocomplete regular-text code"
                           placeholder="<?php _ex('Hotel',
                               'tp_admin_page_settings_сonstructor_widgets_field_hotel_id_label', TPOPlUGIN_TEXTDOMAIN ); ?>">
                </td>
            </tr>
            <tr id="tr_size_widget">
                <td>
                    <?php _ex('Size',
                        'tp_admin_page_settings_сonstructor_widgets_field_size_label', TPOPlUGIN_TEXTDOMAIN ); ?>:
                    <input type="number" class="small-text" id="size_widget_width" min="1" value="">
                    X
                    <input type="number" class="small-text" id="size_widget_height" min="1" value="">
                </td>
            </tr>
            <tr id="tr_direct_widget">
                <td>
                    <label>
                        <input type="checkbox" id="direct_widget" value="1">
                        <?php  _ex('Direct Flights Only',
                            'tp_admin_page_settings_сonstructor_widgets_field_direct_label', TPOPlUGIN_TEXTDOMAIN ); ?>
                    </label>
                </td>
            </tr>
            <tr id="tr_one_way_widget">
                <td>
                    <label>
                        <input type="checkbox" id="one_way_widget" value="1">
                        <?php  _ex('One way',
                            'tp_admin_page_settings_сonstructor_widgets_field_one_way_label', TPOPlUGIN_TEXTDOMAIN ); ?>
                    </label>
                </td>
            </tr>

            <tr id="tr_hotel_id_widget_size">
                <td>
                    <label>
                        <?php _ex('Width',
                            'tp_admin_page_settings_сonstructor_widgets_field_hotel_width_label', TPOPlUGIN_TEXTDOMAIN ); ?>
                        <input type="text" id="hotel_size_widget_width" value="">
                    </label>
                </td>
            </tr>
            <tr id="tr_popular_routes_widget">
                <td>
                    <label>
                        <?php  _ex('Count',
                            'tp_admin_page_settings_сonstructor_widgets_field_count_widget_6_label', TPOPlUGIN_TEXTDOMAIN ); ?>
                        <input type="number" id="popular_routes_widget_count" min="1"
                               value="<?php echo \app\includes\TPPlugin::$options['widgets']['6']['count']; ?>">
                    </label>
                </td>
            </tr>
            <?php for($i = 0; $i<\app\includes\TPPlugin::$options['widgets']['6']['count'];$i++){ ?>
                <tr id="tr_popular_routes_destination-<?php echo $i; ?>" class="TPPopularRoutes">
                    <td>
                        <input type="text" name="popular_routes_destination-<?php echo $i; ?>"
                               id="popular_routes_destination-<?php echo $i; ?>" value=""
                               placeholder="<?php _ex('Destination',
                                   'tp_admin_page_settings_сonstructor_widgets_field_destination_widget_6_label', TPOPlUGIN_TEXTDOMAIN ); ?>"
                               class="constructorCityShortcodesAutocomplete TPPopularRoutesInput regular-text code">
                    </td>
                </tr>
            <?php } ?>
            <tr id="tr_responsive_widget">
                <td>
                    <label id="responsive_label">
                        <input type="checkbox" id="responsive_widget" value="1">
                        <?php  _ex('Responsive',
                            'tp_admin_page_settings_сonstructor_widgets_field_responsive_label', TPOPlUGIN_TEXTDOMAIN ); ?>
                    </label>
                    <label id="responsive_width_label">
                        <input type="width" id="responsive_width" value="1">
                        <?php _ex('Width',
                            'tp_admin_page_settings_сonstructor_widgets_field_width_label', TPOPlUGIN_TEXTDOMAIN ); ?>
                    </label>
                </td>
            </tr>


            <tr id="tr_type_widget">
                <td>
                    <label>
                        <span>
                            <?php _ex('View widget',
                                'tp_admin_page_settings_сonstructor_widgets_field_type_widget_7_label', TPOPlUGIN_TEXTDOMAIN ); ?>
                        </span>
                        <select name="type_widget" id="type_widget" class="TP-Zelect">
                            <option <?php selected( \app\includes\TPPlugin::$options["widgets"][7]['type'], 'full'); ?>
                                value="full">
                                <?php _ex('Full',
                                    'tp_admin_page_settings_сonstructor_widgets_field_type_widget_7_value_full', TPOPlUGIN_TEXTDOMAIN ); ?>
                            </option>
                            <option <?php selected( \app\includes\TPPlugin::$options["widgets"][7]['type'], 'compact'); ?>
                                value="compact">
                                <?php _ex('Compact',
                                    'tp_admin_page_settings_сonstructor_widgets_field_type_widget_7_value_compact', TPOPlUGIN_TEXTDOMAIN ); ?>
                            </option>
                        </select>
                    </label>
                </td>
            </tr>
            <tr id="tr_limit_widget">
                <td>
                    <label>
                        <span><?php _ex('Limit',
                                'tp_admin_page_settings_сonstructor_widgets_field_limit_widget_7_label', TPOPlUGIN_TEXTDOMAIN ); ?></span>
                        <select name="limit_widget" id="limit_widget" class="TP-Zelect">
                            <?php for($i = 1; $i < 11; $i++){ ?>
                                <option <?php selected( \app\includes\TPPlugin::$options["widgets"][7]['limit'], $i ); ?>
                                    value="<?php echo $i; ?>"><?php echo $i; ?></option>
                            <?php } ?>

                        </select>
                    </label>
                </td>
            </tr>

            <tr id="tr_powered_by_widget">
                <td>
                    <label>
                        <input type="checkbox" id="powered_by_widget" value="1">
                        <?php  _ex('Add my referral link',
                            'tp_admin_page_settings_сonstructor_widgets_field_powered_by_label', TPOPlUGIN_TEXTDOMAIN ); ?>
                        <?php
                            global $locale;
                            $tp_url = '';
                            switch($locale){
                                case "ru_RU":
                                    $tp_url = 'https://support.travelpayouts.com/hc/ru/articles/203955623';
                                    break;
                                case "en_US":
                                    $tp_url = 'https://support.travelpayouts.com/hc/en-us/articles/203955623';
                                    break;
                                default:
                                    $tp_url = 'https://support.travelpayouts.com/hc/en-us/articles/203955623';
                                    break;
                            }
                        ?>
                        <a href="<?php echo $tp_url; ?>" target="_blank" class="tp-field-powered_by-help-link">?</a>
                    </label>
                </td>
            </tr>

            <tr id="tr_cat_widget-1">
                <td id="td_cat_widget-1">
                    <select id="cat_widget-1"></select>
                </td>
            </tr>
            <tr id="tr_cat_widget-2">
                <td id="td_cat_widget-2">
                    <select id="cat_widget-2"></select>
                </td>
            </tr>
            <tr id="tr_cat_widget-3">
                <td id="td_cat_widget-3">
                    <select id="cat_widget-3"></select>
                </td>
            </tr>
            <tr id="tr_zoom_widget">
                <td id="td_zoom_widget">
                    <label>
                        <span>
                            <?php _ex('Zoom',
                                'tp_admin_page_settings_сonstructor_widgets_field_zoom_widget_2_label', TPOPlUGIN_TEXTDOMAIN ); ?></span>
                        <select name="zoom_widget" id="zoom_widget" class="TP-Zelect">
                            <?php for($z = 1; $z < 20; $z++){ ?>
                                <option <?php selected( \app\includes\TPPlugin::$options["widgets"][2]['zoom'], $z ); ?>
                                    value="<?php echo $z; ?>"><?php echo $z; ?></option>
                            <?php } ?>

                        </select>
                    </label>
                </td>
            </tr>
            </tbody>
        </table>
    </form>
</div>