
<div id="constructorWidgetModal" title="<?php _ex('tp_admin_page_settings_сonstructor_widgets_title',  '(Constructor widgets)', TPOPlUGIN_TEXTDOMAIN ); ?>" style="display: none;">
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

                    >
                        <option selected="selected" value="0">
                            <?php _ex('tp_admin_page_settings_сonstructor_widgets_field_select_widget_value_0',
                                '(Select widget)', TPOPlUGIN_TEXTDOMAIN ); ?>
                        </option>
                        <option value="1">
                            <?php _ex('tp_admin_page_settings_сonstructor_widgets_field_select_widget_value_1',
                                '(Map Widget)', TPOPlUGIN_TEXTDOMAIN ); ?>
                        </option>
                        <option value="2">
                            <?php _ex('tp_admin_page_settings_сonstructor_widgets_field_select_widget_value_2',
                                '(Hotels Map Widget)', TPOPlUGIN_TEXTDOMAIN ); ?>
                        </option>
                        <option value="3">
                            <?php _ex('tp_admin_page_settings_сonstructor_widgets_field_select_widget_value_3',
                                '(Calendar Widget)', TPOPlUGIN_TEXTDOMAIN ); ?>
                        </option>
                        <?php if(\app\includes\common\TPLang::getLang() == \app\includes\common\TPLang::getLangRU()){ ?>
                            <option value="4">
                                <?php _ex('tp_admin_page_settings_сonstructor_widgets_field_select_widget_value_4',
                                    '(Subscription Widget)', TPOPlUGIN_TEXTDOMAIN ); ?>
                            </option>
                        <?php } ?>
                        <option value="5">
                            <?php _ex('tp_admin_page_settings_сonstructor_widgets_field_select_widget_value_5',
                                '(Hotel Widget)', TPOPlUGIN_TEXTDOMAIN ); ?>
                        </option>
                        <option value="6">
                            <?php _ex('tp_admin_page_settings_сonstructor_widgets_field_select_widget_value_6',
                                '(Popular Destinations Widget)', TPOPlUGIN_TEXTDOMAIN ); ?>
                        </option>
                        <option value="7">
                            <?php _ex('tp_admin_page_settings_сonstructor_widgets_field_select_widget_value_7',
                                '(Hotels Selections Widget)', TPOPlUGIN_TEXTDOMAIN ); ?>
                        </option>
                        <option value="8">
                            <?php _ex('tp_admin_page_settings_сonstructor_widgets_field_select_widget_value_8',
                                '(Best deals widget)', TPOPlUGIN_TEXTDOMAIN ); ?>
                        </option>
                    </select>
            </tr>
            <tr id="tr_subid_widget">
                <td>
                    <input type="text" name="tp_subid" id="tp_subid_widget" value=""
                           class="regular-text code"
                           placeholder="<?php _ex('tp_admin_page_settings_сonstructor_widgets_field_subid_label',
                               '(Subid)', TPOPlUGIN_TEXTDOMAIN); ?>">
                </td>
            </tr>
            <tr id="tr_type_widget_8">
                <td>
                    <span>
                        <?php _ex('tp_admin_page_settings_сonstructor_widgets_field_type_widget_8_label',
                            '(Widget type)', TPOPlUGIN_TEXTDOMAIN ); ?>
                    </span>
                    <select name="type_widget_8" id="type_widget_8">
                        <option <?php selected( \app\includes\TPPlugin::$options["widgets"]['8']['type'], 'full'); ?>
                            value="brickwork">
                            <?php _ex('tp_admin_page_settings_сonstructor_widgets_field_type_widget_8_value_0',
                                '(Tile)', TPOPlUGIN_TEXTDOMAIN ); ?>
                        </option>
                        <option <?php selected( \app\includes\TPPlugin::$options["widgets"]['8']['type'], 'compact'); ?>
                            value="slider">
                            <?php _ex('tp_admin_page_settings_сonstructor_widgets_field_type_widget_8_value_1',
                                '(Slider)', TPOPlUGIN_TEXTDOMAIN ); ?>
                        </option>
                    </select>
                </td>
            </tr>
            <tr id="tr_filter_widget">
                <td>
                    <label>
                        <input type="radio" name="filter" value="0"
                            <?php checked(\app\includes\TPPlugin::$options['widgets']['8']['filter'], 0) ?>>
                        <?php _ex('tp_admin_page_settings_сonstructor_widgets_field_filter_widget_8_value_0_label',
                            '(Filter by airlines)', TPOPlUGIN_TEXTDOMAIN); ?>
                    </label>
                    <br/>
                    <label>
                        <input type="radio" name="filter" value="1"
                            <?php checked(\app\includes\TPPlugin::$options['widgets']['8']['filter'], 1) ?>>
                        <?php  _ex('tp_admin_page_settings_сonstructor_widgets_field_filter_widget_8_value_1_label',
                            '(Filter by routes)', TPOPlUGIN_TEXTDOMAIN); ?>
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
                                           placeholder="<?php _ex('tp_admin_page_settings_сonstructor_widgets_field_airline_widget_8_label',
                                               '(Airline)', TPOPlUGIN_TEXTDOMAIN); ?>">
                                    <!--<a href="#" class="TPBtnDelete">
                                        <i></i>
                                        <?php _ex('tp_admin_page_settings_сonstructor_widgets_field_airline_widget_8_btn_delete_label',
                                        '(Delete)', TPOPlUGIN_TEXTDOMAIN); ?>
                                    </a>-->
                                </td>
                            </tr>

                        </tbody>

                    </table>
                    <a href="#" class="TPBtnAdd">
                        <i></i>
                        <?php _ex('tp_admin_page_settings_сonstructor_widgets_field_widget_8_btn_add_label',
                            '(Add)', TPOPlUGIN_TEXTDOMAIN); ?>
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
                                       placeholder="<?php  _ex('tp_admin_page_settings_сonstructor_widgets_field_origin_widget_8_label',
                                           '(Origin)', TPOPlUGIN_TEXTDOMAIN ); ?>">
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <input type="text" name="destination_8" id="destination_widget_8" value=""
                                       class="constructorCityShortcodesAutocomplete regular-text code"
                                       placeholder="<?php  _ex('tp_admin_page_settings_сonstructor_widgets_field_destination_widget_8_label',
                                           '(Destination)', TPOPlUGIN_TEXTDOMAIN ); ?>">
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
            <tr id="tr_limit_widget_8">
                <td>
                    <span>
                        <?php _ex('tp_admin_page_settings_сonstructor_widgets_field_limit_widget_8_label',
                            '(Limit)', TPOPlUGIN_TEXTDOMAIN ); ?>
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
                           placeholder="<?php _ex('tp_admin_page_settings_сonstructor_widgets_field_origin_label',
                               '(Origin)', TPOPlUGIN_TEXTDOMAIN ); ?>">
                </td>
            </tr>
            <tr id="tr_destination_widget">
                <td>
                    <input type="text" name="destination" id="destination_widget" value=""
                           class="constructorCityShortcodesAutocomplete regular-text code"
                           placeholder="<?php _ex('tp_admin_page_settings_сonstructor_widgets_field_destination_label',
                               '(Destination)', TPOPlUGIN_TEXTDOMAIN ); ?>">
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
                        '._x('tp_admin_page_settings_сonstructor_widgets_field_calendar_period_value_year',
                                '(Year)', TPOPlUGIN_TEXTDOMAIN ).'</option>';
                        $output_month .= '<option value="current_month"
                    '.selected( \app\includes\TPPlugin::$options['widgets']['3']['period'], 'current_month' , false).'>
                    '._x('tp_admin_page_settings_сonstructor_widgets_field_calendar_period_value_current_month',
                                '(Current month)', TPOPlUGIN_TEXTDOMAIN ).'</option>';
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
                    <?php _ex('tp_admin_page_settings_сonstructor_widgets_field_period_day_label',
                        '(Range, days)', TPOPlUGIN_TEXTDOMAIN ); ?>:
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
                           class="constructorHotelShortcodesAutocomplete regular-text code"
                           placeholder="<?php _ex('tp_admin_page_settings_сonstructor_widgets_field_hotel_id_label',
                               '(Hotel)', TPOPlUGIN_TEXTDOMAIN ); ?>">
                </td>
            </tr>
            <tr id="tr_size_widget">
                <td>
                    <?php _ex('tp_admin_page_settings_сonstructor_widgets_field_size_label',
                        '(Size)', TPOPlUGIN_TEXTDOMAIN ); ?>:
                    <input type="number" class="small-text" id="size_widget_width" min="1" value="">
                    X
                    <input type="number" class="small-text" id="size_widget_height" min="1" value="">
                </td>
            </tr>
            <tr id="tr_direct_widget">
                <td>
                    <label>
                        <input type="checkbox" id="direct_widget" value="1">
                        <?php  _ex('tp_admin_page_settings_сonstructor_widgets_field_direct_label',
                            '(Direct Flights Only)', TPOPlUGIN_TEXTDOMAIN ); ?>
                    </label>
                </td>
            </tr>
            <tr id="tr_one_way_widget">
                <td>
                    <label>
                        <input type="checkbox" id="one_way_widget" value="1">
                        <?php  _ex('tp_admin_page_settings_сonstructor_widgets_field_one_way_label',
                            '(One way)', TPOPlUGIN_TEXTDOMAIN ); ?>
                    </label>
                </td>
            </tr>

            <tr id="tr_hotel_id_widget_size">
                <td>
                    <label>
                        <?php _ex('tp_admin_page_settings_сonstructor_widgets_field_hotel_width_label',
                            '(Width)', TPOPlUGIN_TEXTDOMAIN ); ?>
                        <input type="text" id="hotel_size_widget_width" value="">
                    </label>
                </td>
            </tr>
            <tr id="tr_popular_routes_widget">
                <td>
                    <label>
                        <?php  _ex('tp_admin_page_settings_сonstructor_widgets_field_count_widget_6_label',
                            '(Count)', TPOPlUGIN_TEXTDOMAIN ); ?>
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
                               placeholder="<?php _ex('tp_admin_page_settings_сonstructor_widgets_field_destination_widget_6_label',
                                   '(Destination)', TPOPlUGIN_TEXTDOMAIN ); ?>"
                               class="constructorCityShortcodesAutocomplete TPPopularRoutesInput regular-text code">
                    </td>
                </tr>
            <?php } ?>
            <tr id="tr_responsive_widget">
                <td>
                    <label id="responsive_label">
                        <input type="checkbox" id="responsive_widget" value="1">
                        <?php  _ex('tp_admin_page_settings_сonstructor_widgets_field_responsive_label',
                            '(Responsive)', TPOPlUGIN_TEXTDOMAIN ); ?>
                    </label>
                    <label id="responsive_width_label">
                        <input type="width" id="responsive_width" value="1">
                        <?php _ex('tp_admin_page_settings_сonstructor_widgets_field_width_label',
                            '(Width)', TPOPlUGIN_TEXTDOMAIN ); ?>
                    </label>
                </td>
            </tr>


            <tr id="tr_type_widget">
                <td>
                    <label>
                        <span>
                            <?php _ex('tp_admin_page_settings_сonstructor_widgets_field_type_widget_7_label',
                                '(View widget)', TPOPlUGIN_TEXTDOMAIN ); ?>
                        </span>
                        <select name="type_widget" id="type_widget" class="TP-Zelect">
                            <option <?php selected( \app\includes\TPPlugin::$options["widgets"][7]['type'], 'full'); ?>
                                value="full">
                                <?php _ex('tp_admin_page_settings_сonstructor_widgets_field_type_widget_7_value_full',
                                    '(Full)', TPOPlUGIN_TEXTDOMAIN ); ?>
                            </option>
                            <option <?php selected( \app\includes\TPPlugin::$options["widgets"][7]['type'], 'compact'); ?>
                                value="compact">
                                <?php _ex('tp_admin_page_settings_сonstructor_widgets_field_type_widget_7_value_compact',
                                    '(Compact)', TPOPlUGIN_TEXTDOMAIN ); ?>
                            </option>
                        </select>
                    </label>
                </td>
            </tr>
            <tr id="tr_limit_widget">
                <td>
                    <label>
                        <span><?php _ex('tp_admin_page_settings_сonstructor_widgets_field_limit_widget_7_label',
                                '(Limit)', TPOPlUGIN_TEXTDOMAIN ); ?></span>
                        <select name="limit_widget" id="limit_widget" class="TP-Zelect">
                            <?php for($i = 1; $i < 11; $i++){ ?>
                                <option <?php selected( \app\includes\TPPlugin::$options["widgets"][7]['limit'], $i ); ?>
                                    value="<?php echo $i; ?>"><?php echo $i; ?></option>
                            <?php } ?>

                        </select>
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
                            <?php _ex('tp_admin_page_settings_сonstructor_widgets_field_zoom_widget_2_label',
                                '(Zoom)', TPOPlUGIN_TEXTDOMAIN ); ?></span>
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