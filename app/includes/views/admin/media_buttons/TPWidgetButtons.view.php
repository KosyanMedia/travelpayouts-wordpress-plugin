<div id="constructorWidgetModal" title="<?php _e('Constructor widgets', TPInit::$textdomain ); ?>" style="display: none;">
    <form id="constructorWidgetModalForm">
        <table id="constructorWidgetModalTable">
            <tbody>
            <tr id="tr_select_widgets">
                <td id="td_select_widgets">
                    <select name="select_widgets" id="select_widgets"
                            data-widgets-size-width-1="<?php echo self::$options['widgets']['1']['width'] ?>"
                            data-widgets-size-height-1="<?php echo self::$options['widgets']['1']['height'] ?>"
                            data-widgets-size-width-2="<?php echo self::$options['widgets']['2']['width'] ?>"
                            data-widgets-size-height-2="<?php echo self::$options['widgets']['2']['height'] ?>"
                            data-widgets-direct-1 = "<?php echo (isset(self::$options['widgets']['1']['direct']))? 1 : 0;?>"
                            data-widgets-direct-3 = "<?php echo (isset(self::$options['widgets']['3']['only_direct']))? 1 : 0;?>"
                            data-widgets-one_way-3 = "<?php echo (isset(self::$options['widgets']['3']['one_way']))? 1 : 0;?>"
                            data-widgets-size-width-3 = "<?php echo self::$options['widgets']['3']['width'] ?>"
                            data-widgets-responsive-3 = "<?php echo (isset(self::$options['widgets']['3']['responsive']))? 1 : 0;?>"
                            data-widgets-responsive-4 = "<?php echo (isset(self::$options['widgets']['4']['responsive']))? 1 : 0;?>"
                            data-widgets-size-width-4 = "<?php echo self::$options['widgets']['4']['width'] ?>"
                            data-widgets-size-width-5 = "<?php echo self::$options['widgets']['5']['width'] ?>"
                            data-widgets-responsive-5 = "<?php echo (isset(self::$options['widgets']['5']['responsive']))? 1 : 0;?>"
                            data-widgets-size-width-6 = "<?php echo self::$options['widgets']['6']['width'] ?>"
                            data-widgets-responsive-6 = "<?php echo (isset(self::$options['widgets']['6']['responsive']))? 1 : 0;?>"
                        >
                        <option selected="selected" value="0"><?php _e('Select widget', TPInit::$textdomain ); ?></option>
                        <option value="1"><?php _e('Widget map', TPInit::$textdomain ); ?></option>
                        <option value="2"><?php _e('Hotel buildings map', TPInit::$textdomain ); ?></option>
                        <option value="3"><?php _e('Widget calendar', TPInit::$textdomain ); ?></option>
                        <?php if(self::$options['local']['localization'] == 1){ ?>
                            <option value="4"><?php _e('Widget subscriptions', TPInit::$textdomain ); ?></option>
                        <?php } ?>
                        <option value="5"><?php _e('Widget hotel', TPInit::$textdomain ); ?></option>
                        <option value="6"><?php _e('Widget popular destinations', TPInit::$textdomain ); ?></option>
                    </select>
            </tr>
            <tr id="tr_origin_widget">
                <td>
                    <input type="text" name="origin" id="origin_widget" value=""
                           class="constructorCityShortcodesAutocomplete regular-text code" placeholder="<?php _e('Origin', TPInit::$textdomain ); ?>">
                </td>
            </tr>
            <tr id="tr_destination_widget">
                <td>
                    <input type="text" name="destination" id="destination_widget" value=""
                           class="constructorCityShortcodesAutocomplete regular-text code" placeholder="<?php _e('Destination', TPInit::$textdomain ); ?>">
                </td>
            </tr>
            <tr id="tr_hotel_id_widget">
                <td>
                    <input type="text" name="origin" id="hotel_id_widget" value=""
                           class="constructorHotelShortcodesAutocomplete regular-text code" placeholder="<?php _e('Hotel', TPInit::$textdomain ); ?>">
                </td>
            </tr>
            <tr id="tr_size_widget">
                <td>
                    <?php _e('Size', TPInit::$textdomain ); ?>:
                    <input type="number" class="small-text" id="size_widget_width" min="1" value="">
                    X
                    <input type="number" class="small-text" id="size_widget_height" min="1" value="">
                </td>
            </tr>
            <tr id="tr_direct_widget">
                <td>
                    <label>
                        <input type="checkbox" id="direct_widget" value="1">
                        <?php _e('Direct Flights Only', TPInit::$textdomain ); ?>
                    </label>
                </td>
            </tr>
            <tr id="tr_one_way_widget">
                <td>
                    <label>
                        <input type="checkbox" id="one_way_widget" value="1">
                        <?php _e('One way', TPInit::$textdomain ); ?>
                    </label>
                </td>
            </tr>
            <tr id="tr_responsive_widget">
                <td>
                    <label>
                        <input type="checkbox" id="responsive_widget" value="1">
                        <?php _e('Responsive', TPInit::$textdomain ); ?>
                    </label>
                    <label>
                        <input type="width" id="responsive_width" value="1">
                        <?php _e('Width', TPInit::$textdomain ); ?>
                    </label>
                </td>
            </tr>
            <tr id="tr_hotel_id_widget_size">
                <td>
                    <label>
                        <?php _e('Width', TPInit::$textdomain ); ?>
                        <input type="text" id="hotel_size_widget_width" value="">
                    </label>
                </td>
            </tr>
            <tr id="tr_popular_routes_widget">
                <td>
                    <label>
                        <?php _e('Count', TPInit::$textdomain ); ?>
                        <input type="number" id="popular_routes_widget_count" min="1"
                               value="<?php echo self::$options['widgets']['6']['count']; ?>">
                    </label>
                </td>
            </tr>
            <?php for($i = 0; $i<self::$options['widgets']['6']['count'];$i++){ ?>
                <tr id="tr_popular_routes_destination-<?php echo $i; ?>" class="TPPopularRoutes">
                    <td>
                        <input type="text" name="popular_routes_destination-<?php echo $i; ?>"
                               id="popular_routes_destination-<?php echo $i; ?>" value="" placeholder="<?php _e('Destination', TPInit::$textdomain ); ?>"
                               class="constructorCityShortcodesAutocomplete TPPopularRoutesInput regular-text code">
                    </td>
                </tr>
            <?php } ?>
            </tbody>
        </table>
    </form>
</div>