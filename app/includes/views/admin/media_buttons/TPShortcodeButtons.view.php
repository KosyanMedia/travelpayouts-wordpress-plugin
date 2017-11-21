<div id="constructorShortcodesModal"
     title="<?php _ex('Constructor tables', 'tp_admin_page_settings_сonstructor_tables_title', TPOPlUGIN_TEXTDOMAIN); ?>" style="display: none;">
    <table>
        <tr>
            <td id="td_select_shortcodes">
                <select name="select_shortcodes" id="select_shortcodes"
                        data-limit-7="<?php echo \app\includes\TPPlugin::$options['shortcodes']['8']['limit']?>"
                        data-limit-11="<?php echo \app\includes\TPPlugin::$options['shortcodes']['12']['limit']?>"
                        data-limit-12="<?php echo \app\includes\TPPlugin::$options['shortcodes']['13']['limit']?>"
                        data-limit-13="<?php echo \app\includes\TPPlugin::$options['shortcodes']['14']['limit']?>"
                        data-limit-9="<?php echo \app\includes\TPPlugin::$options['shortcodes']['10']['limit']?>"
                        data-transplant-1 = "<?php echo \app\includes\TPPlugin::$options['shortcodes']['1']['transplant']?>"
                        data-transplant-5 = "<?php echo \app\includes\TPPlugin::$options['shortcodes']['5']['transplant']?>"
                        data-transplant-12 = "<?php echo \app\includes\TPPlugin::$options['shortcodes']['12']['transplant']?>"
                        data-transplant-13 = "<?php echo \app\includes\TPPlugin::$options['shortcodes']['13']['transplant']?>"
                        data-transplant-14 = "<?php echo \app\includes\TPPlugin::$options['shortcodes']['14']['transplant']?>"

                        data-paginate-1="<?php echo (isset(\app\includes\TPPlugin::$options['shortcodes']['1']['paginate_switch']))? 1 : 0;?>"
                        data-paginate-2="<?php echo (isset(\app\includes\TPPlugin::$options['shortcodes']['2']['paginate_switch']))? 1 : 0;?>"
                        data-paginate-4="<?php echo (isset(\app\includes\TPPlugin::$options['shortcodes']['4']['paginate_switch']))? 1 : 0;?>"
                        data-paginate-5="<?php echo (isset(\app\includes\TPPlugin::$options['shortcodes']['5']['paginate_switch']))? 1 : 0;?>"
                        data-paginate-6="<?php echo (isset(\app\includes\TPPlugin::$options['shortcodes']['6']['paginate_switch']))? 1 : 0;?>"
                        data-paginate-7="<?php echo (isset(\app\includes\TPPlugin::$options['shortcodes']['7']['paginate_switch']))? 1 : 0;?>"
                        data-paginate-8="<?php echo (isset(\app\includes\TPPlugin::$options['shortcodes']['8']['paginate_switch']))? 1 : 0;?>"
                        data-paginate-9="<?php echo (isset(\app\includes\TPPlugin::$options['shortcodes']['9']['paginate_switch']))? 1 : 0;?>"
                        data-paginate-10="<?php echo (isset(\app\includes\TPPlugin::$options['shortcodes']['10']['paginate_switch']))? 1 : 0;?>"
                        data-paginate-12="<?php echo (isset(\app\includes\TPPlugin::$options['shortcodes']['12']['paginate_switch']))? 1 : 0;?>"
                        data-paginate-13="<?php echo (isset(\app\includes\TPPlugin::$options['shortcodes']['13']['paginate_switch']))? 1 : 0;?>"
                        data-paginate-14="<?php echo (isset(\app\includes\TPPlugin::$options['shortcodes']['14']['paginate_switch']))? 1 : 0;?>"
                    >
                    <?php if(\app\includes\TPPlugin::$options['local']['currency'] == \app\includes\common\TPCurrencyUtils::TP_CURRENCY_RUB ){ ?>
                        <option selected="selected" value="0">
                            <?php _ex('Select the table',
                                'tp_admin_page_settings_сonstructor_tables_field_select_table_value_0', TPOPlUGIN_TEXTDOMAIN); ?>
                        </option>
                        <option value="1">
                            1. <?php _ex('Flights from origin to destination, One Way (next month)',
                                'tp_admin_page_settings_сonstructor_tables_field_select_table_value_1', TPOPlUGIN_TEXTDOMAIN); ?>
                        </option>
                        <option value="2">
                            2. <?php _ex('Flights from Origin to Destination (next few days)',
                                'tp_admin_page_settings_сonstructor_tables_field_select_table_value_2', TPOPlUGIN_TEXTDOMAIN); ?>
                        </option>
                        <!--<option value="3">3. Дешевые авиабилеты на празничные дни</option>-->
                        <option value="3">
                            3. <?php _ex('Cheapest Flights from origin to destination, Round-trip',
                                'tp_admin_page_settings_сonstructor_tables_field_select_table_value_3', TPOPlUGIN_TEXTDOMAIN); ?>
                        </option>
                        <option value="4">
                            4. <?php  _ex('Cheapest Flights from origin to destination (next month)',
                                'tp_admin_page_settings_сonstructor_tables_field_select_table_value_4', TPOPlUGIN_TEXTDOMAIN); ?>
                        </option>
                        <option value="5">
                            5. <?php  _ex('Cheapest Flights from origin to destination (next year)',
                                'tp_admin_page_settings_сonstructor_tables_field_select_table_value_5', TPOPlUGIN_TEXTDOMAIN); ?>
                        </option>
                        <option value="6">
                            6. <?php  _ex('Direct Flights from origin to destination',
                                'tp_admin_page_settings_сonstructor_tables_field_select_table_value_6', TPOPlUGIN_TEXTDOMAIN); ?>
                        </option>
                        <option value="7">
                            7. <?php  _ex('Direct Flights from origin',
                                'tp_admin_page_settings_сonstructor_tables_field_select_table_value_7', TPOPlUGIN_TEXTDOMAIN); ?>
                        </option>
                        <option value="8">
                            8. <?php _ex('Popular Destinations from origin',
                                'tp_admin_page_settings_сonstructor_tables_field_select_table_value_8', TPOPlUGIN_TEXTDOMAIN); ?>
                        </option>
                        <option value="9">
                            9. <?php _ex('Most popular flights within this Airlines',
                                'tp_admin_page_settings_сonstructor_tables_field_select_table_value_9', TPOPlUGIN_TEXTDOMAIN); ?>
                        </option>
                        <option value="11">
                            10. <?php _ex('Searched on our website',
                                'tp_admin_page_settings_сonstructor_tables_field_select_table_value_11', TPOPlUGIN_TEXTDOMAIN); ?>
                        </option>
                        <option value="12" >
                            11. <?php _ex('Cheap Flights from origin',
                                'tp_admin_page_settings_сonstructor_tables_field_select_table_value_12', TPOPlUGIN_TEXTDOMAIN); ?>
                        </option>
                        <option value="13">
                            12. <?php _ex('Cheap Flights to destination',
                                'tp_admin_page_settings_сonstructor_tables_field_select_table_value_13', TPOPlUGIN_TEXTDOMAIN); ?>
                        </option>
                        <!--<option value="14">
                            13. <?php _ex('Special offers airline',
                                'tp_admin_page_settings_сonstructor_tables_field_select_table_value_14', TPOPlUGIN_TEXTDOMAIN); ?>
                        </option>-->
                    <?php } else { ?>
                        <option selected="selected" value="0">
                            <?php _ex('Select the table',
                                'tp_admin_page_settings_сonstructor_tables_field_select_table_value_0', TPOPlUGIN_TEXTDOMAIN); ?>
                        </option>
                        <option value="1">
                            1. <?php _ex('Flights from origin to destination, One Way (next month)',
                                'tp_admin_page_settings_сonstructor_tables_field_select_table_value_1', TPOPlUGIN_TEXTDOMAIN); ?>
                        </option>
                        <option value="2">
                            2. <?php _ex('Flights from Origin to Destination (next few days)',
                                'tp_admin_page_settings_сonstructor_tables_field_select_table_value_2', TPOPlUGIN_TEXTDOMAIN); ?>
                        </option>
                        <!--<option value="3">3. Дешевые авиабилеты на празничные дни</option>-->
                        <option value="3">
                            3. <?php _ex('Cheapest Flights from origin to destination, Round-trip',
                                'tp_admin_page_settings_сonstructor_tables_field_select_table_value_3', TPOPlUGIN_TEXTDOMAIN); ?>
                        </option>
                        <option value="4">
                            4. <?php  _ex('Cheapest Flights from origin to destination (next month)',
                                'tp_admin_page_settings_сonstructor_tables_field_select_table_value_4', TPOPlUGIN_TEXTDOMAIN); ?>
                        </option>
                        <option value="5">
                            5. <?php  _ex('Cheapest Flights from origin to destination (next year)',
                                'tp_admin_page_settings_сonstructor_tables_field_select_table_value_5', TPOPlUGIN_TEXTDOMAIN); ?>
                        </option>
                        <option value="6">
                            6. <?php  _ex('Direct Flights from origin to destination',
                                'tp_admin_page_settings_сonstructor_tables_field_select_table_value_6', TPOPlUGIN_TEXTDOMAIN); ?>
                        </option>
                        <option value="7">
                            7. <?php  _ex('Direct Flights from origin',
                                'tp_admin_page_settings_сonstructor_tables_field_select_table_value_7', TPOPlUGIN_TEXTDOMAIN); ?>
                        </option>
                        <option value="9">
                            8. <?php _ex('Most popular flights within this Airlines',
                                'tp_admin_page_settings_сonstructor_tables_field_select_table_value_9', TPOPlUGIN_TEXTDOMAIN); ?>
                        </option>

                        <option value="11">
                            9. <?php _ex('Searched on our website',
                                'tp_admin_page_settings_сonstructor_tables_field_select_table_value_11', TPOPlUGIN_TEXTDOMAIN); ?>
                        </option>
                        <option value="12" >
                            10.  <?php _ex('Cheap Flights from origin',
                                'tp_admin_page_settings_сonstructor_tables_field_select_table_value_12', TPOPlUGIN_TEXTDOMAIN); ?>
                        </option>
                        <option value="13">
                            11. <?php _ex('Cheap Flights to destination',
                                'tp_admin_page_settings_сonstructor_tables_field_select_table_value_13', TPOPlUGIN_TEXTDOMAIN); ?>
                        </option>
                        <!--<option value="14">
                            12. <?php _ex('Special offers airline',
                                'tp_admin_page_settings_сonstructor_tables_field_select_table_value_14', TPOPlUGIN_TEXTDOMAIN); ?>
                        </option>-->
                    <?php }?>

                </select>
            </td>
        </tr>
        <tr id="tr_title">
            <td>
                <input type="text" name="tp_title" id="tp_title" value=""
                       class="regular-text code"
                       placeholder="<?php _ex('Alternate title',
                           'tp_admin_page_settings_сonstructor_tables_field_title_label', TPOPlUGIN_TEXTDOMAIN); ?>">
            </td>
        </tr>

        <tr id="tr_origin">
            <td>
                <input type="text" name="origin" id="origin" value=""
                       class="constructorCityShortcodesAutocomplete regular-text code"
                       placeholder="<?php _ex('Origin',
                           'tp_admin_page_settings_сonstructor_tables_field_origin_label', TPOPlUGIN_TEXTDOMAIN); ?>">
            </td>
        </tr>
        <tr id="tr_destination">
            <td>
                <input type="text" name="destination" id="destination" value=""
                       class="constructorCityShortcodesAutocomplete regular-text code"
                       placeholder="<?php  _ex('Destination',
                           'tp_admin_page_settings_сonstructor_tables_field_destination_label', TPOPlUGIN_TEXTDOMAIN); ?>">
            </td>
        </tr>

        <tr id="tr_depart_date">
            <td>
                <input type="text" name="depart_date" class="constructorDateShortcodes regular-text code">
            </td>
        </tr>
        <tr id="tr_return_date">
            <td>
                <input type="text" name="return_date" class="constructorDateShortcodes regular-text code">
            </td>
        </tr>
        <tr id="tr_country">
            <td>
                <input type="text" name="country" id="country" value=""
                       class="constructorCountryShortcodesAutocomplete regular-text code"
                       placeholder="<?php _ex('Country',
                           'tp_admin_page_settings_сonstructor_tables_field_country_label', TPOPlUGIN_TEXTDOMAIN); ?>">
            </td>
        </tr>
        <tr id="tr_airline">
            <td>
                <input type="text" name="airline" id="airline" value=""
                       class="constructorAirlineShortcodesAutocomplete regular-text code"
                       placeholder="<?php _ex('Airline',
                           'tp_admin_page_settings_сonstructor_tables_field_airline_label', TPOPlUGIN_TEXTDOMAIN); ?>">
            </td>
        </tr>
        <tr id="tr_subid">
            <td>
                <input type="text" name="tp_subid" id="tp_subid" value=""
                       class="regular-text code"
                       placeholder="<?php _ex('Subid',
                           'tp_admin_page_settings_сonstructor_tables_field_subid_label', TPOPlUGIN_TEXTDOMAIN); ?>">
            </td>
        </tr>

        <tr id="tr_filter_airline">
            <td>
                <input type="text" name="filter_airline" id="filter_airline" value=""
                       class="constructorAirlineShortcodesAutocomplete regular-text code"
                       placeholder="<?php _ex('Filter by airline',
                           'tp_admin_page_settings_сonstructor_tables_field_filter_airline_label', TPOPlUGIN_TEXTDOMAIN); ?>"
                       title="<?php _ex('Type aircompany name and chose the one you need. Only its flights will be shown.',
                           'tp_admin_page_settings_сonstructor_tables_field_filter_airline_help',
                           TPOPlUGIN_TEXTDOMAIN); ?>">
                <!--<p class="description">

                </p>-->
            </td>
        </tr>

        <tr id="tr_filter_flight_number">
            <td>
                <input type="text" name="filter_flight_number" id="filter_flight_number" value=""
                       class="regular-text code"
                       placeholder="<?php _ex('Filter by flight # (enter manually)',
                           'tp_admin_page_settings_сonstructor_tables_field_filter_flight_number_label', TPOPlUGIN_TEXTDOMAIN); ?>"
                       title="<?php _ex('Use this filter only if you absolutely accurately know the route number',
                           'tp_admin_page_settings_сonstructor_tables_field_filter_flight_number_help',
                           TPOPlUGIN_TEXTDOMAIN); ?>">

            </td>
        </tr>



        <tr id="tr_currency">
            <td>
                <select name="currency" id="currency" class="TP-Zelect">
                    <?php foreach(\app\includes\common\TPCurrencyUtils::getCurrencyAll() as $currency){ ?>
                        <option
                            <?php selected( \app\includes\TPPlugin::$options['local']['currency'], $currency ); ?>
                            value="<?php echo $currency ?>">
                            <?php echo $currency; ?>
                        </option>
                    <?php } ?>

                </select>
            </td>
        </tr>
        <tr id="tr_limit">
            <td>
                <label><?php _ex('Limit',
                        'tp_admin_page_settings_сonstructor_tables_field_limit_label', TPOPlUGIN_TEXTDOMAIN); ?></label>
                <input type="number" name="limit" id="limit" value=""
                       class=""
                       placeholder="<?php _ex('Limit',
                           'tp_admin_page_settings_сonstructor_tables_field_limit_label', TPOPlUGIN_TEXTDOMAIN); ?>" min="1">
            </td>
        </tr>
        <tr id="tr_trip_class">
            <td>
                <select name="select_trip_class" id="select_trip_class">
                    <option value="0" selected="selected">
                        <?php _ex('Economy',
                            'tp_admin_page_settings_сonstructor_tables_field_class_value_0', TPOPlUGIN_TEXTDOMAIN); ?>
                    </option>
                    <option value="1">
                        <?php _ex('Business',
                            'tp_admin_page_settings_сonstructor_tables_field_class_value_1', TPOPlUGIN_TEXTDOMAIN); ?>
                    </option>
                    <option value="2">
                        <?php _ex('First',
                            'tp_admin_page_settings_сonstructor_tables_field_class_value_2', TPOPlUGIN_TEXTDOMAIN); ?>
                    </option>
                </select>
            </td>
        </tr>
        <tr id="tr_paginate">
            <td>
                <input type="checkbox" id="paginate" value="1">
                <?php _ex('Paginate',
                    'tp_admin_page_settings_сonstructor_tables_field_paginate_label', TPOPlUGIN_TEXTDOMAIN); ?>
            </td>
        </tr>
        <tr id="tr_one_way">
            <td>
                <input type="checkbox" id="one_way" value="1">
                <?php _ex('One Way',
                    'tp_admin_page_settings_сonstructor_tables_field_one_way_label', TPOPlUGIN_TEXTDOMAIN); ?>
            </td>
        </tr>
        <tr id="tr_off_title">
            <td id="td_off_title">
                <input type="checkbox" id="off_title" value="1">
                <?php _ex('No title',
                    'tp_admin_page_settings_сonstructor_tables_field_off_title_label', TPOPlUGIN_TEXTDOMAIN); ?>
            </td>
        </tr>
        <tr id="tr_transplant">
            <td>
                <label>
                    <?php _ex('Number of stops',
                        'tp_admin_page_settings_сonstructor_tables_field_transplant_label', TPOPlUGIN_TEXTDOMAIN); ?>
                    <select id="transplant">
                        <option value="0">
                            <?php  _ex('All',
                                'tp_admin_page_settings_сonstructor_tables_field_transplant_value_0', TPOPlUGIN_TEXTDOMAIN ); ?></option>
                        <option value="1">
                            <?php _ex('No more than one stop',
                                'tp_admin_page_settings_сonstructor_tables_field_transplant_value_1', TPOPlUGIN_TEXTDOMAIN ); ?></option>
                        <option value="2">
                            <?php _ex('Direct',
                                'tp_admin_page_settings_сonstructor_tables_field_transplant_value_2', TPOPlUGIN_TEXTDOMAIN ); ?></option>
                    </select>
                </label>
            </td>
        </tr>


    </table>

</div>