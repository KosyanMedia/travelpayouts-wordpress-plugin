<div id="constructorHotelsShortcodesModal"
     title="<?php _ex('tp_admin_page_settings_сonstructor_hotels_tables_title', '(Constructor hotels)', TPOPlUGIN_TEXTDOMAIN); ?>" style="display: none;">
    <table>
        <tr>
            <td id="td_select_hotels_shortcodes">
                <select name="select_hotels_shortcodes" id="select_hotels_shortcodes">
                    <option selected="selected" value="0">
                        <?php _ex('tp_admin_page_settings_сonstructor_hotels_tables_field_select_table_value_0',
                            '(Select the table)', TPOPlUGIN_TEXTDOMAIN); ?>
                    </option>
                    <option value="1">
                        <?php _ex('tp_admin_page_settings_сonstructor_hotels_tables_field_select_table_value_1',
                            '(Hotel seleсtions)', TPOPlUGIN_TEXTDOMAIN); ?>
                    </option>
                    <option value="2">
                        <?php _ex('tp_admin_page_settings_сonstructor_hotels_tables_field_select_table_value_2',
                            '(City hotels with price from to)', TPOPlUGIN_TEXTDOMAIN); ?>
                    </option>
                    <option value="3">
                        <?php _ex('tp_admin_page_settings_сonstructor_hotels_tables_field_select_table_value_3',
                            '(City hotels by stars)', TPOPlUGIN_TEXTDOMAIN); ?>
                    </option>
                    <option value="4">
                        <?php _ex('tp_admin_page_settings_сonstructor_hotels_tables_field_select_table_value_4',
                            '(Stay price in city for X days)', TPOPlUGIN_TEXTDOMAIN); ?>
                    </option>
                    <option value="5">
                        <?php _ex('tp_admin_page_settings_сonstructor_hotels_tables_field_select_table_value_5',
                            '(Stay price in city for weekend)', TPOPlUGIN_TEXTDOMAIN); ?>
                    </option>
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
                       class="constructorCityShortcodesAutocomplete regular-text code"
                       placeholder="<?php _ex('tp_admin_page_settings_сonstructor_hotels_tables_field_city_label',
                           '(City)', TPOPlUGIN_TEXTDOMAIN); ?>">
            </td>
        </tr>
        <tr id="tr_hotels_type">
            <td id="td_hotels_type">
                <select name="select_hotels_type" id="select_hotels_type">
                    <option selected="selected" value="0">
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

        <tr id="tr_hotels_day">
            <td>
                <?php _ex('tp_admin_page_settings_сonstructor_hotels_tables_field_day_label',
                    '(Number of days)', TPOPlUGIN_TEXTDOMAIN); ?>
                <input type="number" id="hotels_day" value="3" max="365" min="1">
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
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
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
                <input type="number" id="hotels_number_results" value="0">

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
    </table>
</div>