<div id="constructorWidgetModal" title="<?php _e('Constructor widgets', TPOPlUGIN_TEXTDOMAIN ); ?>" style="display: none;">
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
                        >
                        <option selected="selected" value="0"><?php _e('Select widget', TPOPlUGIN_TEXTDOMAIN ); ?></option>
                        <option value="1"><?php _e('Map Widget', TPOPlUGIN_TEXTDOMAIN ); ?></option>
                        <option value="2"><?php _e('Hotels Map Widget', TPOPlUGIN_TEXTDOMAIN ); ?></option>
                        <option value="3"><?php _e('Calendar Widget', TPOPlUGIN_TEXTDOMAIN ); ?></option>
                        <?php if(\app\includes\TPPlugin::$options['local']['localization'] == 1){ ?>
                            <option value="4"><?php _e('Subscription Widget', TPOPlUGIN_TEXTDOMAIN ); ?></option>
                        <?php } ?>
                        <option value="5"><?php _e('Hotel Widget', TPOPlUGIN_TEXTDOMAIN ); ?></option>
                        <option value="6"><?php _e('Popular Destinations Widget', TPOPlUGIN_TEXTDOMAIN ); ?></option>
                        <option value="7"><?php _e('Widget of hotel selections', TPOPlUGIN_TEXTDOMAIN ); ?></option>
                    </select>
            </tr>
            <tr id="tr_origin_widget">
                <td>
                    <input type="text" name="origin" id="origin_widget" value=""
                           class="constructorCityShortcodesAutocomplete regular-text code" placeholder="<?php _e('Origin', TPOPlUGIN_TEXTDOMAIN ); ?>">
                </td>
            </tr>
            <tr id="tr_destination_widget">
                <td>
                    <input type="text" name="destination" id="destination_widget" value=""
                           class="constructorCityShortcodesAutocomplete regular-text code" placeholder="<?php _e('Destination', TPOPlUGIN_TEXTDOMAIN ); ?>">
                </td>
            </tr>
            <tr id="tr_hotel_id_widget">
                <td>
                    <input type="text" name="origin" id="hotel_id_widget" value=""
                           class="constructorHotelShortcodesAutocomplete regular-text code" placeholder="<?php _e('Hotel', TPOPlUGIN_TEXTDOMAIN ); ?>">
                </td>
            </tr>
            <tr id="tr_size_widget">
                <td>
                    <?php _e('Size', TPOPlUGIN_TEXTDOMAIN ); ?>:
                    <input type="number" class="small-text" id="size_widget_width" min="1" value="">
                    X
                    <input type="number" class="small-text" id="size_widget_height" min="1" value="">
                </td>
            </tr>
            <tr id="tr_direct_widget">
                <td>
                    <label>
                        <input type="checkbox" id="direct_widget" value="1">
                        <?php _e('Direct Flights Only', TPOPlUGIN_TEXTDOMAIN ); ?>
                    </label>
                </td>
            </tr>
            <tr id="tr_one_way_widget">
                <td>
                    <label>
                        <input type="checkbox" id="one_way_widget" value="1">
                        <?php _e('One way', TPOPlUGIN_TEXTDOMAIN ); ?>
                    </label>
                </td>
            </tr>

            <tr id="tr_hotel_id_widget_size">
                <td>
                    <label>
                        <?php _e('Width', TPOPlUGIN_TEXTDOMAIN ); ?>
                        <input type="text" id="hotel_size_widget_width" value="">
                    </label>
                </td>
            </tr>
            <tr id="tr_popular_routes_widget">
                <td>
                    <label>
                        <?php _e('Count', TPOPlUGIN_TEXTDOMAIN ); ?>
                        <input type="number" id="popular_routes_widget_count" min="1"
                               value="<?php echo \app\includes\TPPlugin::$options['widgets']['6']['count']; ?>">
                    </label>
                </td>
            </tr>
            <?php for($i = 0; $i<\app\includes\TPPlugin::$options['widgets']['6']['count'];$i++){ ?>
                <tr id="tr_popular_routes_destination-<?php echo $i; ?>" class="TPPopularRoutes">
                    <td>
                        <input type="text" name="popular_routes_destination-<?php echo $i; ?>"
                               id="popular_routes_destination-<?php echo $i; ?>" value="" placeholder="<?php _e('Destination', TPOPlUGIN_TEXTDOMAIN ); ?>"
                               class="constructorCityShortcodesAutocomplete TPPopularRoutesInput regular-text code">
                    </td>
                </tr>
            <?php } ?>
            <tr id="tr_responsive_widget">
                <td>
                    <label id="responsive_label">
                        <input type="checkbox" id="responsive_widget" value="1">
                        <?php _e('Responsive', TPOPlUGIN_TEXTDOMAIN ); ?>
                    </label>
                    <label id="responsive_width_label">
                        <input type="width" id="responsive_width" value="1">
                        <?php _e('Width', TPOPlUGIN_TEXTDOMAIN ); ?>
                    </label>
                </td>
            </tr>
            </tbody>
        </table>
    </form>
</div>