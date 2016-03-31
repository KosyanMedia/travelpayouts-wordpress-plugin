<div id="constructorLinkModal" title="<?php _e('Constructor link', TPOPlUGIN_TEXTDOMAIN ); ?>" style="display: none;">
    <form id="constructorLinkModalForm">
        <table id="constructorLinkModalTable">
            <tr>
                <td>
                    <input type="text" name="text" id="text_link" value=""
                           class="regular-text code"
                           placeholder="<?php _e('Text link', TPOPlUGIN_TEXTDOMAIN); ?>">
                </td>
            </tr>
            <tr>
                <td id="constructorLinkModalSelectTD">
                    <select id="constructorLinkModalSelect">
                        <option selected="selected" value="0"> <?php _e('Select the link', TPOPlUGIN_TEXTDOMAIN); ?></option>
                        <option value="1"><?php _e('Search for flights', TPOPlUGIN_TEXTDOMAIN ); ?></option>
                        <option value="2"><?php _e('Search for hotels', TPOPlUGIN_TEXTDOMAIN ); ?></option>
                    </select>
                </td>
            </tr>
            <tr id="tr_origin_link">
                <td>
                    <input type="text" name="origin" id="origin_link" value=""
                           class="constructorCityShortcodesAutocomplete regular-text code"
                           placeholder="<?php _e('Origin', TPOPlUGIN_TEXTDOMAIN); ?>">
                </td>
            </tr>
            <tr id="tr_destination_link">
                <td>
                    <input type="text" name="destination" id="destination_link" value=""
                           class="constructorCityShortcodesAutocomplete regular-text code"
                           placeholder="<?php _e('Destination', TPOPlUGIN_TEXTDOMAIN); ?>">
                </td>
            </tr>
            <tr id="tr_city_link">
                <td>
                    <input type="text" name="city" id="city_link" value=""
                           class="constructorHotelShortcodesAutocomplete regular-text code"
                           placeholder="<?php _e('City', TPOPlUGIN_TEXTDOMAIN); ?>">
                </td>
            </tr>
            <tr id="tr_subid_link">
                <td>
                    <input type="text" name="tp_subid" id="tp_subid_link" value=""
                           class="regular-text code" placeholder="<?php _e('Subid', TPOPlUGIN_TEXTDOMAIN); ?>">
                </td>
            </tr>
            <tr id="tr_origin_date_link">
                <td>
                    <label>
                        <?php _e('Departure date', TPOPlUGIN_TEXTDOMAIN); ?>:
                        <input type="text" name="origin_date" id="origin_date_link"
                               value="<?php echo _x('today','insert link date', TPOPlUGIN_TEXTDOMAIN); ?>+1"
                               class="constructorDate code">
                    </label>
                </td>
            </tr>
            <tr id="tr_destination_date_link">
                <td>
                    <label>
                        <?php _e('Return date', TPOPlUGIN_TEXTDOMAIN); ?>:
                        <input type="text" name="destination_date" id="destination_date_link"
                            value="<?php echo _x('today','insert link date', TPOPlUGIN_TEXTDOMAIN); ?>+12"
                               class="constructorDatePlus code">
                    </label>
                </td>
            </tr>
            <tr id="tr_one_way_link">
                <td>
                    <label id="label_one_way_link">
                        <input type="checkbox" name="one_way" id="one_way_link" value="1">
                        <?php _e('One way', TPOPlUGIN_TEXTDOMAIN); ?>
                    </label>
                </td>
            </tr>

            <tr id="tr_origin_date_hotel_link">
                <td>
                    <label>
                        <?php _e('Check in', TPOPlUGIN_TEXTDOMAIN); ?>:
                        <input type="text" name="check_in" id="check_in_link"
                               value="<?php echo _x('today','insert link date', TPOPlUGIN_TEXTDOMAIN); ?>+1"
                               class="constructorDate code">
                    </label>
                </td>
            </tr>
            <tr id="tr_destination_date_hotel_link">
                <td>
                    <label>
                        <?php _e('Check out', TPOPlUGIN_TEXTDOMAIN); ?>:
                        <input type="text" name="check_out" id="check_out_link"
                               value="<?php echo _x('today','insert link date', TPOPlUGIN_TEXTDOMAIN); ?>+12"
                               class="constructorDatePlus code">
                    </label>
                </td>
            </tr>

        </table>
    </form>
</div>
