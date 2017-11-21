<div id="constructorLinkModal" title="<?php _ex('Constructor link',
    'tp_admin_page_settings_сonstructor_link_title', TPOPlUGIN_TEXTDOMAIN ); ?>" style="display: none;">
    <form id="constructorLinkModalForm">
        <table id="constructorLinkModalTable">
            <tr>
                <td>
                    <input type="text" name="text" id="text_link" value=""
                           class="regular-text code"
                           placeholder="<?php _ex('Text link',
                               'tp_admin_page_settings_сonstructor_link_field_text_link_label', TPOPlUGIN_TEXTDOMAIN); ?>">
                </td>
            </tr>
            <tr>
                <td id="constructorLinkModalSelectTD">
                    <select id="constructorLinkModalSelect">
                        <option selected="selected" value="0">
                            <?php _ex('Select the link',
                                'tp_admin_page_settings_сonstructor_link_field_type_link_label', TPOPlUGIN_TEXTDOMAIN); ?>
                        </option>
                        <option value="1">
                            <?php _ex('Search for flights',
                                'tp_admin_page_settings_сonstructor_link_field_type_link_value_1_label', TPOPlUGIN_TEXTDOMAIN ); ?>
                        </option>
                        <option value="2">
                            <?php _ex('Search for hotels',
                                'tp_admin_page_settings_сonstructor_link_field_type_link_value_2_label', TPOPlUGIN_TEXTDOMAIN ); ?>
                        </option>
                    </select>
                </td>
            </tr>
            <tr id="tr_origin_link">
                <td>
                    <input type="text" name="origin" id="origin_link" value=""
                           class="constructorCityShortcodesAutocomplete regular-text code"
                           placeholder="<?php _ex('Origin',
                               'tp_admin_page_settings_сonstructor_link_field_origin_label', TPOPlUGIN_TEXTDOMAIN); ?>">
                </td>
            </tr>
            <tr id="tr_destination_link">
                <td>
                    <input type="text" name="destination" id="destination_link" value=""
                           class="constructorCityShortcodesAutocomplete regular-text code"
                           placeholder="<?php _ex('Destination',
                               'tp_admin_page_settings_сonstructor_link_field_destination_label', TPOPlUGIN_TEXTDOMAIN); ?>">
                </td>
            </tr>
            <tr id="tr_city_link">
                <td>
                    <input type="text" name="city" id="city_link" value=""
                           class="constructorLinkHotelShortcodesAutocomplete regular-text code"
                           placeholder="<?php _ex('City',
                               'tp_admin_page_settings_сonstructor_link_field_city_label', TPOPlUGIN_TEXTDOMAIN); ?>">
                </td>
            </tr>
            <tr id="tr_subid_link">
                <td>
                    <input type="text" name="tp_subid" id="tp_subid_link" value=""
                           class="regular-text code"
                           placeholder="<?php _ex('Subid',
                               'tp_admin_page_settings_сonstructor_link_field_subid_label', TPOPlUGIN_TEXTDOMAIN); ?>">
                </td>
            </tr>
            <tr id="tr_origin_date_link">
                <td>
                    <label>
                        <?php _ex('Departure date',
                            'tp_admin_page_settings_сonstructor_link_field_departure_date_label', TPOPlUGIN_TEXTDOMAIN); ?>:
                        <input type="text" name="origin_date" id="origin_date_link"
                               value="<?php _ex('today',
                                   'tp_admin_page_settings_сonstructor_link_field_departure_date_btn_today_label', TPOPlUGIN_TEXTDOMAIN); ?>+1"
                               class="constructorDate code">
                    </label>
                </td>
            </tr>
            <tr id="tr_destination_date_link">
                <td>
                    <label>
                        <?php  _ex('Return date',
                            'tp_admin_page_settings_сonstructor_link_field_return_date_label', TPOPlUGIN_TEXTDOMAIN); ?>:
                        <input type="text" name="destination_date" id="destination_date_link"
                            value="<?php _ex('today',
                                'tp_admin_page_settings_сonstructor_link_field_return_date_btn_today_label', TPOPlUGIN_TEXTDOMAIN); ?>+12"
                               class="constructorDatePlus code">
                    </label>
                </td>
            </tr>
            <tr id="tr_one_way_link">
                <td>
                    <label id="label_one_way_link">
                        <input type="checkbox" name="one_way" id="one_way_link" value="1">
                        <?php _ex('One way',
                            'tp_admin_page_settings_сonstructor_link_field_one_way_label', TPOPlUGIN_TEXTDOMAIN); ?>
                    </label>
                </td>
            </tr>

            <tr id="tr_origin_date_hotel_link">
                <td>
                    <label>
                        <?php _ex('Check in',
                            'tp_admin_page_settings_сonstructor_link_field_check_in_label' , TPOPlUGIN_TEXTDOMAIN); ?>:
                        <input type="text" name="check_in" id="check_in_link"
                               value="<?php _ex('today',
                                   'tp_admin_page_settings_сonstructor_link_field_check_in_date_btn_today_label', TPOPlUGIN_TEXTDOMAIN); ?>+1"
                               class="constructorDate code">
                    </label>
                </td>
            </tr>
            <tr id="tr_destination_date_hotel_link">
                <td>
                    <label>
                        <?php _ex('Check out',
                            'tp_admin_page_settings_сonstructor_link_field_check_out_label', TPOPlUGIN_TEXTDOMAIN); ?>:
                        <input type="text" name="check_out" id="check_out_link"
                               value="<?php _ex('today',
                                   'tp_admin_page_settings_сonstructor_link_field_check_out_date_btn_today_label', TPOPlUGIN_TEXTDOMAIN); ?>+12"
                               class="constructorDatePlus code">
                    </label>
                </td>
            </tr>

        </table>
    </form>
</div>
