<div id="constructorShortcodesModal" title="<?php _e('Constructor tables', KPDPlUGIN_TEXTDOMAIN); ?>" style="display: none;">
    <table>
        <tr>
            <td id="td_select_shortcodes">
                <select name="select_shortcodes" id="select_shortcodes"
                        data-limit-7="<?php echo TPPlugin::$options['shortcodes']['8']['limit']?>"
                        data-limit-11="<?php echo TPPlugin::$options['shortcodes']['12']['limit']?>"
                        data-limit-12="<?php echo TPPlugin::$options['shortcodes']['13']['limit']?>"
                        data-limit-13="<?php echo TPPlugin::$options['shortcodes']['14']['limit']?>"
                    >
                    <option selected="selected" value="0"> <?php _e('Select the table', KPDPlUGIN_TEXTDOMAIN); ?></option>
                    <option value="1">1. <?php _e('Flight Prices for a Month from origin to destination, One Way', KPDPlUGIN_TEXTDOMAIN); ?></option>
                    <option value="2">2. <?php _e('Flights from Origin to Destination for the Next Few Days', KPDPlUGIN_TEXTDOMAIN); ?></option>
                    <!--<option value="3">3. Дешевые авиабилеты на празничные дни</option>-->
                    <option value="3">3. <?php _e('The Cheapest Round-trip Tickets from origin to destination', KPDPlUGIN_TEXTDOMAIN); ?></option>
                    <option value="4">4. <?php _e('The Cheapest Flights for this Month from origin to destination', KPDPlUGIN_TEXTDOMAIN); ?></option>
                    <option value="5">5. <?php _e('The Cheapest Flights from origin to destination for the Year Ahead', KPDPlUGIN_TEXTDOMAIN); ?></option>
                    <option value="6">6. <?php _e('Direct Flights from origin to destination', KPDPlUGIN_TEXTDOMAIN); ?></option>
                    <option value="7">7. <?php _e('Direct Flights from origin', KPDPlUGIN_TEXTDOMAIN); ?></option>
                    <?php if(TPPlugin::$options['local']['currency'] == 1){ ?>
                        <option value="8">8. <?php _e('Popular Destinations from origin', KPDPlUGIN_TEXTDOMAIN); ?></option>
                    <?php } ?>
                    <option value="9">9. <?php _e('Airline\'s popular flights', KPDPlUGIN_TEXTDOMAIN); ?></option>
                    <!--<option value="10">10. <?php// _e('Special offers airline', KPDPlUGIN_TEXTDOMAIN); ?></option>-->
                    <option value="11">11. <?php _e('Flights That Have Been Found on Our Website', KPDPlUGIN_TEXTDOMAIN); ?></option>
                    <option value="12" >12. <?php _e('Cheap Flights from origin', KPDPlUGIN_TEXTDOMAIN); ?></option>
                    <option value="13">13. <?php _e('Cheap Flights to destination', KPDPlUGIN_TEXTDOMAIN); ?></option>
                </select>
            </td>
        </tr>
        <tr id="tr_title">
            <td>
                <input type="text" name="tp_title" id="tp_title" value=""
                       class="regular-text code" placeholder="<?php _e('Alternate title', KPDPlUGIN_TEXTDOMAIN); ?>">
            </td>
        </tr>
        <tr id="tr_origin">
            <td>
                <input type="text" name="origin" id="origin" value=""
                       class="constructorCityShortcodesAutocomplete regular-text code" placeholder="<?php _e('Origin', KPDPlUGIN_TEXTDOMAIN); ?>">
            </td>
        </tr>
        <tr id="tr_destination">
            <td>
                <input type="text" name="destination" id="destination" value=""
                       class="constructorCityShortcodesAutocomplete regular-text code" placeholder="<?php _e('Destination', KPDPlUGIN_TEXTDOMAIN); ?>">
            </td>
        </tr>
        <tr id="tr_depart_date">
            <td>
                <input type="text" name="depart_date" class="constructorDateShortcodes regular-text code"
                       placeholder="Туда">
            </td>
        </tr>
        <tr id="tr_return_date">
            <td>
                <input type="text" name="return_date" class="constructorDateShortcodes regular-text code"
                       placeholder="Обратно">
            </td>
        </tr>
        <tr id="tr_airline">
            <td>
                <input type="text" name="airline" id="airline" value=""
                       class="constructorAirlineShortcodesAutocomplete regular-text code" placeholder="<?php _e('Airline', KPDPlUGIN_TEXTDOMAIN); ?>">
            </td>
        </tr>
        <tr id="tr_limit">
            <td>
                <label><?php _e('Limit', KPDPlUGIN_TEXTDOMAIN); ?></label>
                <input type="number" name="limit" id="limit" value=""
                       class="" placeholder="Лимит" min="1">
            </td>
        </tr>
        <tr id="tr_trip_class">
            <td>
                <select name="select_trip_class" id="select_trip_class">
                    <option value="0" selected="selected"><?php _e('Economy', KPDPlUGIN_TEXTDOMAIN); ?></option>
                    <option value="1"><?php _e('Business', KPDPlUGIN_TEXTDOMAIN); ?></option>
                    <option value="2"><?php _e('First', KPDPlUGIN_TEXTDOMAIN); ?></option>
                </select>
            </td>
        </tr>
    </table>

</div>