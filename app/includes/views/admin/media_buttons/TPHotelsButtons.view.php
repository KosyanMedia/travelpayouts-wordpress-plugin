<div id="constructorHotelsShortcodesModal"
     title="<?php _ex('tp_admin_page_settings_сonstructor_hotels_tables_title', '(Constructor hotels)', TPOPlUGIN_TEXTDOMAIN); ?>" style="display: none;">
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
                        <?php _ex('tp_admin_page_settings_сonstructor_hotels_tables_field_select_table_value_0',
                            '(Select the table)', TPOPlUGIN_TEXTDOMAIN); ?>
                    </option>
                    <option value="1">
                        <?php _ex('tp_admin_page_settings_сonstructor_hotels_tables_field_select_table_value_1',
                            '(Hotels collection - Discounts)', TPOPlUGIN_TEXTDOMAIN); ?>
                    </option>
                    <option value="2">
                        <?php _ex('tp_admin_page_settings_сonstructor_hotels_tables_field_select_table_value_2',
                            '(Hotels collections for dates)', TPOPlUGIN_TEXTDOMAIN); ?>
                    </option>
                    <!--<option value="3">
                        <?php _ex('tp_admin_page_settings_сonstructor_hotels_tables_field_select_table_value_3',
                            '(City hotels with price from to)', TPOPlUGIN_TEXTDOMAIN); ?>
                    </option>
                    <option value="4">
                        <?php _ex('tp_admin_page_settings_сonstructor_hotels_tables_field_select_table_value_4',
                            '(City hotels by stars)', TPOPlUGIN_TEXTDOMAIN); ?>
                    </option>
                    <option value="5">
                        <?php _ex('tp_admin_page_settings_сonstructor_hotels_tables_field_select_table_value_5',
                            '(Stay price in city for X days)', TPOPlUGIN_TEXTDOMAIN); ?>
                    </option>
                    <option value="6">
                        <?php _ex('tp_admin_page_settings_сonstructor_hotels_tables_field_select_table_value_6',
                            '(Stay price in city for weekend)', TPOPlUGIN_TEXTDOMAIN); ?>
                    </option>-->
                </select>
            </td>
        </tr>
        <tr id="tr_hotels_title">
            <td>
                <input type="text" name="tp_hotels_title" id="tp_hotels_title" value=""
                       class="regular-text code"
                       placeholder="<?php _ex('tp_admin_page_settings_сonstructor_hotels_tables_field_title_label',
                           '(Alternate title)', TPOPlUGIN_TEXTDOMAIN); ?>">
            </td>
        </tr>
        <tr id="tr_hotels_city">
            <td>
                <input type="text" name="hotels_city" id="hotels_city" value=""
                       data-city=""
                       class="constructorHotelShortcodesAutocomplete HotelCityAutocomplete regular-text code"
                       placeholder="<?php _ex('tp_admin_page_settings_сonstructor_hotels_tables_field_city_label',
                           '(City)', TPOPlUGIN_TEXTDOMAIN); ?>">
            </td>
        </tr>
        <tr id="tr_hotels_subid">
            <td>
                <input type="text" name="hotels_subid" id="hotels_subid" value=""
                       class="regular-text code"
                       placeholder="<?php _ex('tp_admin_page_settings_сonstructor_hotels_tables_field_subid_label',
                           '(Subid)', TPOPlUGIN_TEXTDOMAIN); ?>">
            </td>
        </tr>
        <tr id="tr_hotels_type">
            <td id="td_hotels_type">
                <select name="select_hotels_type" id="select_hotels_type">
                    <option selected="selected" value="all">
                        <?php _ex('tp_admin_page_settings_сonstructor_hotels_tables_field_hotel_type_label',
                            '(Hotel type)', TPOPlUGIN_TEXTDOMAIN); ?>
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
                        <?php _ex('tp_admin_page_settings_сonstructor_hotels_tables_field_hotels_selections_type_label',
                            '(Selection type)', TPOPlUGIN_TEXTDOMAIN); ?>
                    </option>

                </select>
            </td>
        </tr>

        <tr id="tr_hotels_check_in">
            <td>
                <?php _ex('tp_admin_page_settings_сonstructor_hotels_tables_field_check_in_label',
                    '(Check-in date)', TPOPlUGIN_TEXTDOMAIN); ?>
                <input type="text" id="check_in" value="<?php echo date('d-m-Y'); ?>" class="constructorDateShortcodes">
            </td>
        </tr>
        <tr id="tr_hotels_check_out">
            <td>
                <?php _ex('tp_admin_page_settings_сonstructor_hotels_tables_field_check_out_label',
                    '(Check-out date)', TPOPlUGIN_TEXTDOMAIN); ?>
                <input type="text" id="check_out" value="<?php echo date('d-m-Y', time()+DAY_IN_SECONDS); ?>" class="constructorDateShortcodes">
            </td>
        </tr>

        <tr id="tr_hotels_star">
            <td id="td_hotels_star">
                <?php _ex('tp_admin_page_settings_сonstructor_hotels_tables_field_hotel_star_label',
                    '(Stars)', TPOPlUGIN_TEXTDOMAIN); ?>
                <select name="select_hotels_star" id="select_hotels_star">
                    <option value="no_stars">
                        <?php _ex('tp_admin_page_settings_сonstructor_hotels_tables_field_hotel_star_label_no_stars',
                            '(No stars)', TPOPlUGIN_TEXTDOMAIN); ?>
                    </option>
                    <option value="1">
                        <?php _ex('tp_admin_page_settings_сonstructor_hotels_tables_field_hotel_star_label_1',
                            '(1 star)', TPOPlUGIN_TEXTDOMAIN); ?>
                    </option>
                    <option value="2">
                        <?php _ex('tp_admin_page_settings_сonstructor_hotels_tables_field_hotel_star_label_2',
                            '(2 stars)', TPOPlUGIN_TEXTDOMAIN); ?>
                    </option>
                    <option value="3">
                        <?php _ex('tp_admin_page_settings_сonstructor_hotels_tables_field_hotel_star_label_3',
                            '(3 stars)', TPOPlUGIN_TEXTDOMAIN); ?>
                    </option>
                    <option value="4">
                        <?php _ex('tp_admin_page_settings_сonstructor_hotels_tables_field_hotel_star_label_4',
                            '(4 stars)', TPOPlUGIN_TEXTDOMAIN); ?>
                    </option>
                    <option value="5">
                        <?php _ex('tp_admin_page_settings_сonstructor_hotels_tables_field_hotel_star_label_5',
                            '(5 stars)', TPOPlUGIN_TEXTDOMAIN); ?>
                    </option>
                    <option selected="selected" value="all">
                        <?php _ex('tp_admin_page_settings_сonstructor_hotels_tables_field_hotel_star_label_all',
                            '(All)', TPOPlUGIN_TEXTDOMAIN); ?>
                    </option>
                </select>
            </td>
        </tr>

        <tr id="tr_hotels_rating">
            <td>
                <?php _ex('tp_admin_page_settings_сonstructor_hotels_tables_field_rating_label_from',
                    '(User rating from)', TPOPlUGIN_TEXTDOMAIN); ?>
                <input type="number" id="hotels_rating_from" value="7" max="10" min="0">
                <?php _ex('tp_admin_page_settings_сonstructor_hotels_tables_field_rating_label_to',
                    '(to)', TPOPlUGIN_TEXTDOMAIN); ?>
                <input type="number" id="hotels_rating_to" value="10" max="10" min="0">
            </td>
        </tr>

        <tr id="tr_hotels_distance">
            <td>
                <?php _ex('tp_admin_page_settings_сonstructor_hotels_tables_field_distance_label_from',
                    '(Distance to center from )', TPOPlUGIN_TEXTDOMAIN); ?>
                <input type="number" id="hotels_distance_from" value="0" class="hotels-distance">
                <?php _ex('tp_admin_page_settings_сonstructor_hotels_tables_field_distance_label_to',
                    '(to)', TPOPlUGIN_TEXTDOMAIN); ?>
                <input type="number" id="hotels_distance_to" value="3" class="hotels-distance">
                <?php _ex('tp_admin_page_settings_сonstructor_hotels_tables_field_distance_label_km',
                    '(km)', TPOPlUGIN_TEXTDOMAIN); ?>
            </td>
        </tr>

        <tr id="tr_hotels_number_results">
            <td>
                <?php _ex('tp_admin_page_settings_сonstructor_hotels_tables_field_number_results_label',
                    '(Number of results)', TPOPlUGIN_TEXTDOMAIN); ?>
                <input type="number" id="hotels_number_results" value="20" min="1">

            </td>
        </tr>

        <tr id="tr_hotels_paginate">
            <td>
                <input type="checkbox" id="hotels_paginate" value="1">
                <?php _ex('tp_admin_page_settings_сonstructor_hotels_tables_field_paginate_label',
                    '(Paginate)', TPOPlUGIN_TEXTDOMAIN); ?>
            </td>
        </tr>
        <tr id="tr_hotels_off_title">
            <td id="td_hotels_off_title">
                <input type="checkbox" id="hotels_off_title" value="1">
                <?php _ex('tp_admin_page_settings_сonstructor_hotels_tables_field_off_title_label',
                    '(No title)', TPOPlUGIN_TEXTDOMAIN); ?>
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