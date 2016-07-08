<div id="constructorShortcodesModal" title="<?php _e('Constructor tables', TPOPlUGIN_TEXTDOMAIN); ?>" style="display: none;">
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
                    <?php if(\app\includes\TPPlugin::$options['local']['currency'] == 'RUB'){ ?>
                        <option selected="selected" value="0"> <?php _e('Select the table', TPOPlUGIN_TEXTDOMAIN); ?></option>
                        <option value="1">1. <?php _e('Flights from origin to destination, One Way (next month)', TPOPlUGIN_TEXTDOMAIN); ?></option>
                        <option value="2">2. <?php _e('Flights from Origin to Destination (next few days)', TPOPlUGIN_TEXTDOMAIN); ?></option>
                        <!--<option value="3">3. Дешевые авиабилеты на празничные дни</option>-->
                        <option value="3">3. <?php _e('Cheapest Flights from origin to destination, Round-trip', TPOPlUGIN_TEXTDOMAIN); ?></option>
                        <option value="4">4. <?php _e('Cheapest Flights from origin to destination (next month)', TPOPlUGIN_TEXTDOMAIN); ?></option>
                        <option value="5">5. <?php _e('Cheapest Flights from origin to destination (next year)', TPOPlUGIN_TEXTDOMAIN); ?></option>
                        <option value="6">6. <?php _e('Direct Flights from origin to destination', TPOPlUGIN_TEXTDOMAIN); ?></option>
                        <option value="7">7. <?php _e('Direct Flights from origin', TPOPlUGIN_TEXTDOMAIN); ?></option>
                        <option value="8">8. <?php _e('Popular Destinations from origin', TPOPlUGIN_TEXTDOMAIN); ?></option>
                        <option value="9">9. <?php _e('Most popular flights within this Airlines', TPOPlUGIN_TEXTDOMAIN); ?></option>
                        <!--<option value="10">10. <?php// _e('Special offers airline', TPOPlUGIN_TEXTDOMAIN); ?></option>-->
                        <option value="11">10. <?php _e('Searched on our website', TPOPlUGIN_TEXTDOMAIN); ?></option>
                        <option value="12" >11. <?php _e('Cheap Flights from origin', TPOPlUGIN_TEXTDOMAIN); ?></option>
                        <option value="13">12. <?php _e('Cheap Flights to destination', TPOPlUGIN_TEXTDOMAIN); ?></option>
                    <?php } else { ?>
                        <option selected="selected" value="0"> <?php _e('Select the table', TPOPlUGIN_TEXTDOMAIN); ?></option>
                        <option value="1">1. <?php _e('Flights from origin to destination, One Way (next month)', TPOPlUGIN_TEXTDOMAIN); ?></option>
                        <option value="2">2. <?php _e('Flights from Origin to Destination (next few days)', TPOPlUGIN_TEXTDOMAIN); ?></option>
                        <!--<option value="3">3. Дешевые авиабилеты на празничные дни</option>-->
                        <option value="3">3. <?php _e('Cheapest Flights from origin to destination, Round-trip', TPOPlUGIN_TEXTDOMAIN); ?></option>
                        <option value="4">4. <?php _e('Cheapest Flights from origin to destination (next month)', TPOPlUGIN_TEXTDOMAIN); ?></option>
                        <option value="5">5. <?php _e('Cheapest Flights from origin to destination (next year)', TPOPlUGIN_TEXTDOMAIN); ?></option>
                        <option value="6">6. <?php _e('Direct Flights from origin to destination', TPOPlUGIN_TEXTDOMAIN); ?></option>
                        <option value="7">7. <?php _e('Direct Flights from origin', TPOPlUGIN_TEXTDOMAIN); ?></option>
                        <option value="9">8. <?php _e('Most popular flights within this Airlines', TPOPlUGIN_TEXTDOMAIN); ?></option>
                        <!--<option value="10">10. <?php// _e('Special offers airline', TPOPlUGIN_TEXTDOMAIN); ?></option>-->
                        <option value="11">9. <?php _e('Searched on our website', TPOPlUGIN_TEXTDOMAIN); ?></option>
                        <option value="12" >10. <?php _e('Cheap Flights from origin', TPOPlUGIN_TEXTDOMAIN); ?></option>
                        <option value="13">11. <?php _e('Cheap Flights to destination', TPOPlUGIN_TEXTDOMAIN); ?></option>
                    <?php }?>

                </select>
            </td>
        </tr>
        <tr id="tr_title">
            <td>
                <input type="text" name="tp_title" id="tp_title" value=""
                       class="regular-text code" placeholder="<?php _e('Alternate title', TPOPlUGIN_TEXTDOMAIN); ?>">
            </td>
        </tr>

        <tr id="tr_origin">
            <td>
                <input type="text" name="origin" id="origin" value=""
                       class="constructorCityShortcodesAutocomplete regular-text code" placeholder="<?php _e('Origin', TPOPlUGIN_TEXTDOMAIN); ?>">
            </td>
        </tr>
        <tr id="tr_destination">
            <td>
                <input type="text" name="destination" id="destination" value=""
                       class="constructorCityShortcodesAutocomplete regular-text code" placeholder="<?php _e('Destination', TPOPlUGIN_TEXTDOMAIN); ?>">
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
                       class="constructorAirlineShortcodesAutocomplete regular-text code" placeholder="<?php _e('Airline', TPOPlUGIN_TEXTDOMAIN); ?>">
            </td>
        </tr>
        <tr id="tr_subid">
            <td>
                <input type="text" name="tp_subid" id="tp_subid" value=""
                       class="regular-text code" placeholder="<?php _e('Subid', TPOPlUGIN_TEXTDOMAIN); ?>">
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
                <label><?php _e('Limit', TPOPlUGIN_TEXTDOMAIN); ?></label>
                <input type="number" name="limit" id="limit" value=""
                       class="" placeholder="<?php _e('Limit', TPOPlUGIN_TEXTDOMAIN); ?>" min="1">
            </td>
        </tr>
        <tr id="tr_trip_class">
            <td>
                <select name="select_trip_class" id="select_trip_class">
                    <option value="0" selected="selected"><?php _e('Economy', TPOPlUGIN_TEXTDOMAIN); ?></option>
                    <option value="1"><?php _e('Business', TPOPlUGIN_TEXTDOMAIN); ?></option>
                    <option value="2"><?php _e('First', TPOPlUGIN_TEXTDOMAIN); ?></option>
                </select>
            </td>
        </tr>
        <tr id="tr_paginate">
            <td>
                <input type="checkbox" id="paginate" value="1">
                <?php _e('Paginate', TPOPlUGIN_TEXTDOMAIN ); ?>
            </td>
        </tr>
        <tr id="tr_one_way">
            <td>
                <input type="checkbox" id="one_way" value="1">
                <?php _e('One Way', TPOPlUGIN_TEXTDOMAIN ); ?>
            </td>
        </tr>
        <tr id="tr_off_title">
            <td id="td_off_title">
                <input type="checkbox" id="off_title" value="1">
                <?php _e('No title', TPOPlUGIN_TEXTDOMAIN ); ?>
            </td>
        </tr>
        <tr id="tr_transplant">
            <td>
                <label><?php _e('Number of stops', TPOPlUGIN_TEXTDOMAIN); ?>
                    <select id="transplant">
                        <option value="0"><?php _e('All', TPOPlUGIN_TEXTDOMAIN ); ?></option>
                        <option value="1"><?php _e('No more than one stop', TPOPlUGIN_TEXTDOMAIN ); ?></option>
                        <option value="2"><?php _e('Direct', TPOPlUGIN_TEXTDOMAIN ); ?></option>
                    </select>
                </label>
            </td>
        </tr>


    </table>

</div>