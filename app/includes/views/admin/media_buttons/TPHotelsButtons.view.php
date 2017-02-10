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
                    <option selected="selected" value="1">
                        <?php _ex('tp_admin_page_settings_сonstructor_hotels_tables_field_select_table_value_1',
                            '(Hotel seleсtions)', TPOPlUGIN_TEXTDOMAIN); ?>
                    </option>
                    <option selected="selected" value="2">
                        <?php _ex('tp_admin_page_settings_сonstructor_hotels_tables_field_select_table_value_2',
                            '(City hotels with price from to)', TPOPlUGIN_TEXTDOMAIN); ?>
                    </option>
                    <option selected="selected" value="3">
                        <?php _ex('tp_admin_page_settings_сonstructor_hotels_tables_field_select_table_value_3',
                            '(City hotels by stars)', TPOPlUGIN_TEXTDOMAIN); ?>
                    </option>
                    <option selected="selected" value="4">
                        <?php _ex('tp_admin_page_settings_сonstructor_hotels_tables_field_select_table_value_4',
                            '(Stay price in city for X days)', TPOPlUGIN_TEXTDOMAIN); ?>
                    </option>
                    <option selected="selected" value="5">
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
        <tr>
            <td id="td_hotels_type">
                <select name="select_hotels_type" id="select_hotels_type">
                    <option selected="selected" value="0">
                        <?php _ex('tp_admin_page_settings_сonstructor_hotels_tables_field_select_table_value_0',
                            '(Select the table)', TPOPlUGIN_TEXTDOMAIN); ?>
                    </option>
                    <option selected="selected" value="1">
                        <?php _ex('tp_admin_page_settings_сonstructor_hotels_tables_field_select_table_value_1',
                            '(Hotel seleсtions)', TPOPlUGIN_TEXTDOMAIN); ?>
                    </option>
                    <option selected="selected" value="2">
                        <?php _ex('tp_admin_page_settings_сonstructor_hotels_tables_field_select_table_value_2',
                            '(City hotels with price from to)', TPOPlUGIN_TEXTDOMAIN); ?>
                    </option>
                    <option selected="selected" value="3">
                        <?php _ex('tp_admin_page_settings_сonstructor_hotels_tables_field_select_table_value_3',
                            '(City hotels by stars)', TPOPlUGIN_TEXTDOMAIN); ?>
                    </option>
                    <option selected="selected" value="4">
                        <?php _ex('tp_admin_page_settings_сonstructor_hotels_tables_field_select_table_value_4',
                            '(Stay price in city for X days)', TPOPlUGIN_TEXTDOMAIN); ?>
                    </option>
                    <option selected="selected" value="5">
                        <?php _ex('tp_admin_page_settings_сonstructor_hotels_tables_field_select_table_value_5',
                            '(Stay price in city for weekend)', TPOPlUGIN_TEXTDOMAIN); ?>
                    </option>
                </select>
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