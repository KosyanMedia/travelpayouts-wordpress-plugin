<div id="constructorHotelsShortcodesModal"
     title="<?php _ex('Constructor hotels', 'tp_admin_page_settings_сonstructor_hotels_tables_title', TPOPlUGIN_TEXTDOMAIN); ?>" style="display: none;">
    <table>
        <tr>
            <td id="td_select_hotels_shortcodes">
                <select name="select_hotels_shortcodes" id="select_hotels_shortcodes"
                        data-paginate-1="<?php echo (isset(\app\includes\TPPlugin::$options['shortcodes_hotels']['1']['paginate_switch']))? 1 : 0;?>"
                        data-paginate-2="<?php echo (isset(\app\includes\TPPlugin::$options['shortcodes_hotels']['2']['paginate_switch']))? 1 : 0;?>"
                        data-paginate-3="<?php echo (isset(\app\includes\TPPlugin::$options['shortcodes_hotels']['3']['paginate_switch']))? 1 : 0;?>"
                        data-paginate-4="<?php echo (isset(\app\includes\TPPlugin::$options['shortcodes_hotels']['4']['paginate_switch']))? 1 : 0;?>"
                        data-paginate-5="<?php echo (isset(\app\includes\TPPlugin::$options['shortcodes_hotels']['5']['paginate_switch']))? 1 : 0;?>"
                        data-link_without_dates-1="<?php echo (isset(\app\includes\TPPlugin::$options['shortcodes_hotels']['1']['link_without_dates']))? 1 : 0;?>"
                        data-link_without_dates-2="<?php echo (isset(\app\includes\TPPlugin::$options['shortcodes_hotels']['2']['link_without_dates']))? 1 : 0;?>"
                >
                    <option selected="selected" value="0">
                        <?php _ex('Select the table',
                            'tp_admin_page_settings_сonstructor_hotels_tables_field_select_table_value_0', TPOPlUGIN_TEXTDOMAIN); ?>
                    </option>
                    <option value="1">
                        <?php _ex('Hotels collection - Discounts',
                            'tp_admin_page_settings_сonstructor_hotels_tables_field_select_table_value_1', TPOPlUGIN_TEXTDOMAIN); ?>
                    </option>
                    <option value="2">
                        <?php _ex('Hotels collections for dates',
                            'tp_admin_page_settings_сonstructor_hotels_tables_field_select_table_value_2', TPOPlUGIN_TEXTDOMAIN); ?>
                    </option>
                    <!--<option value="3">
                        <?php _ex('City hotels with price from to',
                            'tp_admin_page_settings_сonstructor_hotels_tables_field_select_table_value_3', TPOPlUGIN_TEXTDOMAIN); ?>
                    </option>
                    <option value="4">
                        <?php _ex('City hotels by stars',
                            'tp_admin_page_settings_сonstructor_hotels_tables_field_select_table_value_4', TPOPlUGIN_TEXTDOMAIN); ?>
                    </option>
                    <option value="5">
                        <?php _ex('Stay price in city for X days',
                            'tp_admin_page_settings_сonstructor_hotels_tables_field_select_table_value_5', TPOPlUGIN_TEXTDOMAIN); ?>
                    </option>
                    <option value="6">
                        <?php _ex('Stay price in city for weekend',
                            'tp_admin_page_settings_сonstructor_hotels_tables_field_select_table_value_6', TPOPlUGIN_TEXTDOMAIN); ?>
                    </option>-->
                </select>
            </td>
        </tr>
        <tr id="tr_hotels_title">
            <td>
                <input type="text" name="tp_hotels_title" id="tp_hotels_title" value=""
                       class="regular-text code"
                       placeholder="<?php _ex('Alternate title',
                           'tp_admin_page_settings_сonstructor_hotels_tables_field_title_label', TPOPlUGIN_TEXTDOMAIN); ?>">
            </td>
        </tr>
        <tr id="tr_hotels_city">
            <td>
                <input type="text" name="hotels_city" id="hotels_city" value=""
                       data-city=""
                       class="constructorHotelShortcodesAutocomplete HotelCityAutocomplete regular-text code"
                       placeholder="<?php _ex('City',
                           'tp_admin_page_settings_сonstructor_hotels_tables_field_city_label', TPOPlUGIN_TEXTDOMAIN); ?>">
            </td>
        </tr>
        <tr id="tr_hotels_subid">
            <td>
                <input type="text" name="hotels_subid" id="hotels_subid" value=""
                       class="regular-text code"
                       placeholder="<?php _ex('Subid',
                           'tp_admin_page_settings_сonstructor_hotels_tables_field_subid_label', TPOPlUGIN_TEXTDOMAIN); ?>">
            </td>
        </tr>
        <tr id="tr_hotels_type">
            <td id="td_hotels_type">
                <select name="select_hotels_type" id="select_hotels_type">
                    <option selected="selected" value="all">
                        <?php _ex('Hotel type',
                            'tp_admin_page_settings_сonstructor_hotels_tables_field_hotel_type_label', TPOPlUGIN_TEXTDOMAIN); ?>
                    </option>
                    <?php foreach ($data['hotelTypes'] as $key => $hotelType): ?>
                    <option value="<?php echo $key; ?>">
                        <?php echo $hotelType; ?>
                    </option>
                    <?php endforeach; ?>
                </select>
            </td>
        </tr>

        <tr id="tr_hotels_selections_type">
            <td id="td_hotels_selections_type">
                <select name="select_hotels_selections_type" id="select_hotels_selections_type">
                    <option selected="selected" value="all">
                        <?php _ex('Selection type',
                            'tp_admin_page_settings_сonstructor_hotels_tables_field_hotels_selections_type_label', TPOPlUGIN_TEXTDOMAIN); ?>
                    </option>

                </select>
            </td>
        </tr>

        <tr id="tr_hotels_check_in">
            <td>
                <?php _ex('Check-in date',
                    'tp_admin_page_settings_сonstructor_hotels_tables_field_check_in_label', TPOPlUGIN_TEXTDOMAIN); ?>
                <input type="text" id="check_in" value="<?php echo date('d-m-Y'); ?>" class="constructorDateShortcodes">
            </td>
        </tr>
        <tr id="tr_hotels_check_out">
            <td>
                <?php _ex('Check-out date',
                    'tp_admin_page_settings_сonstructor_hotels_tables_field_check_out_label', TPOPlUGIN_TEXTDOMAIN); ?>
                <input type="text" id="check_out" value="<?php echo date('d-m-Y', time()+DAY_IN_SECONDS); ?>" class="constructorDateShortcodes">
            </td>
        </tr>

        <tr id="tr_hotels_star">
            <td id="td_hotels_star">
                <?php _ex('Stars',
                    'tp_admin_page_settings_сonstructor_hotels_tables_field_hotel_star_label', TPOPlUGIN_TEXTDOMAIN); ?>
                <select name="select_hotels_star" id="select_hotels_star">
                    <option value="no_stars">
                        <?php _ex('No stars',
                            'tp_admin_page_settings_сonstructor_hotels_tables_field_hotel_star_label_no_stars', TPOPlUGIN_TEXTDOMAIN); ?>
                    </option>
                    <option value="1">
                        <?php _ex('1 star',
                            'tp_admin_page_settings_сonstructor_hotels_tables_field_hotel_star_label_1', TPOPlUGIN_TEXTDOMAIN); ?>
                    </option>
                    <option value="2">
                        <?php _ex('2 stars',
                            'tp_admin_page_settings_сonstructor_hotels_tables_field_hotel_star_label_2', TPOPlUGIN_TEXTDOMAIN); ?>
                    </option>
                    <option value="3">
                        <?php _ex('3 stars',
                            'tp_admin_page_settings_сonstructor_hotels_tables_field_hotel_star_label_3', TPOPlUGIN_TEXTDOMAIN); ?>
                    </option>
                    <option value="4">
                        <?php _ex('4 stars',
                            'tp_admin_page_settings_сonstructor_hotels_tables_field_hotel_star_label_4', TPOPlUGIN_TEXTDOMAIN); ?>
                    </option>
                    <option value="5">
                        <?php _ex('5 stars',
                            'tp_admin_page_settings_сonstructor_hotels_tables_field_hotel_star_label_5', TPOPlUGIN_TEXTDOMAIN); ?>
                    </option>
                    <option selected="selected" value="all">
                        <?php _ex('All',
                            'tp_admin_page_settings_сonstructor_hotels_tables_field_hotel_star_label_all', TPOPlUGIN_TEXTDOMAIN); ?>
                    </option>
                </select>
            </td>
        </tr>

        <tr id="tr_hotels_rating">
            <td>
                <?php _ex('User rating from',
                    'tp_admin_page_settings_сonstructor_hotels_tables_field_rating_label_from', TPOPlUGIN_TEXTDOMAIN); ?>
                <input type="number" id="hotels_rating_from" value="7" max="10" min="0">
                <?php _ex('to',
                    'tp_admin_page_settings_сonstructor_hotels_tables_field_rating_label_to', TPOPlUGIN_TEXTDOMAIN); ?>
                <input type="number" id="hotels_rating_to" value="10" max="10" min="0">
            </td>
        </tr>

        <tr id="tr_hotels_distance">
            <td>
                <?php _ex('Distance to center from',
                    'tp_admin_page_settings_сonstructor_hotels_tables_field_distance_label_from', TPOPlUGIN_TEXTDOMAIN); ?>
                <input type="number" id="hotels_distance_from" value="0" class="hotels-distance">
                <?php _ex('to',
                    'tp_admin_page_settings_сonstructor_hotels_tables_field_distance_label_to', TPOPlUGIN_TEXTDOMAIN); ?>
                <input type="number" id="hotels_distance_to" value="3" class="hotels-distance">
                <?php _ex('km',
                    'tp_admin_page_settings_сonstructor_hotels_tables_field_distance_label_km', TPOPlUGIN_TEXTDOMAIN); ?>
            </td>
        </tr>

        <tr id="tr_hotels_number_results">
            <td>
                <?php _ex('Number of results',
                    'tp_admin_page_settings_сonstructor_hotels_tables_field_number_results_label', TPOPlUGIN_TEXTDOMAIN); ?>
                <input type="number" id="hotels_number_results" value="20" min="1">

            </td>
        </tr>

        <tr id="tr_hotels_paginate">
            <td>
                <input type="checkbox" id="hotels_paginate" value="1">
                <?php _ex('Paginate',
                    'tp_admin_page_settings_сonstructor_hotels_tables_field_paginate_label', TPOPlUGIN_TEXTDOMAIN); ?>
            </td>
        </tr>
        <tr id="tr_hotels_off_title">
            <td id="td_hotels_off_title">
                <input type="checkbox" id="hotels_off_title" value="1">
                <?php _ex('No title',
                    'tp_admin_page_settings_сonstructor_hotels_tables_field_off_title_label', TPOPlUGIN_TEXTDOMAIN); ?>
            </td>
        </tr>
        <tr id="tr_hotels_link_without_dates">
            <td>
                <input type="checkbox" id="hotels_link_without_dates" value="1">
                <?php _ex('Land without dates',
                    'tp admin page settings сonstructor hotels tables field hotels_link_without_dates label', TPOPlUGIN_TEXTDOMAIN); ?>
            </td>
        </tr>
        <tr id="tr_hotels_help_text">
            <td>
                <i>
                    <?php _ex('If we don\'t have prices in our cache for these dates – no table will be shown',
                        'tp admin page settings сonstructor hotels tables', TPOPlUGIN_TEXTDOMAIN); ?>
                </i>
            </td>
        </tr>
    </table>
</div>