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
                            data-widgets-size-width-7 = "<?php echo \app\includes\TPPlugin::$options['widgets']['7']['width'] ?>"
                            data-widgets-responsive-7 = "<?php echo (isset(\app\includes\TPPlugin::$options['widgets']['7']['responsive']))? 1 : 0;?>"
                            data-widgets-limit-7 = "<?php echo \app\includes\TPPlugin::$options['widgets']['7']['limit'] ?>"
                            data-widgets-type-7 = "<?php echo \app\includes\TPPlugin::$options['widgets']['7']['type'] ?>"
                            data-widgets-size-width-8 = "<?php echo \app\includes\TPPlugin::$options['widgets']['8']['width'] ?>"
                            data-widgets-responsive-8 = "<?php echo (isset(\app\includes\TPPlugin::$options['widgets']['8']['responsive']))? 1 : 0;?>"

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
                        <option value="7"><?php _e('Hotels Selections Widget', TPOPlUGIN_TEXTDOMAIN ); ?></option>
                        <option value="8"><?php _e('Best deals widget', TPOPlUGIN_TEXTDOMAIN ); ?></option>
                    </select>
            </tr>
            <tr id="tr_subid_widget">
                <td>
                    <input type="text" name="tp_subid" id="tp_subid_widget" value=""
                           class="regular-text code" placeholder="<?php _e('Subid', TPOPlUGIN_TEXTDOMAIN); ?>">
                </td>
            </tr>
            <tr id="tr_type_widget_8">
                <td>
                    <span><?php _e('Widget type', TPOPlUGIN_TEXTDOMAIN ); ?></span>
                    <select name="type_widget_8" id="type_widget_8">
                        <option <?php selected( \app\includes\TPPlugin::$options["widgets"]['8']['type'], 'full'); ?>
                            value="brickwork"><?php _e('Tile', TPOPlUGIN_TEXTDOMAIN ); ?></option>
                        <option <?php selected( \app\includes\TPPlugin::$options["widgets"]['8']['type'], 'compact'); ?>
                            value="slider"><?php _e('Slider', TPOPlUGIN_TEXTDOMAIN ); ?></option>
                    </select>
                </td>
            </tr>
            <tr id="tr_filter_widget">
                <td>
                    <label>
                        <input type="radio" name="filter" value="0"
                            <?php checked(\app\includes\TPPlugin::$options['widgets']['8']['filter'], 0) ?>>
                        <?php _e('Filter by airlines', TPOPlUGIN_TEXTDOMAIN); ?>
                    </label>
                    <br/>
                    <label>
                        <input type="radio" name="filter" value="1"
                            <?php checked(\app\includes\TPPlugin::$options['widgets']['8']['filter'], 1) ?>>
                        <?php _e('Filter by routes', TPOPlUGIN_TEXTDOMAIN); ?>
                    </label>
                </td>
            </tr>
            <tr id="tr_airline_widget_8">
                <td>
                    <table id="table_airline_widget_8">
                        <tbody>
                            <tr class="tr_table_airline_widget_8">
                                <td style="width: 70%">
                                    <input type="text" name="airline_widget_118" id="airline_widget_8" value=""
                                           class="constructorAirlineShortcodesAutocomplete airline_widget_8"
                                           placeholder="<?php _e('Airline', TPOPlUGIN_TEXTDOMAIN); ?>">
                                    <!--<a href="#" class="TPBtnDelete">
                                        <i></i>
                                        <?php _e('Delete', TPOPlUGIN_TEXTDOMAIN); ?>
                                    </a>-->
                                </td>
                            </tr>

                        </tbody>

                    </table>
                    <a href="#" class="TPBtnAdd">
                        <i></i>
                        <?php _e('Add', TPOPlUGIN_TEXTDOMAIN); ?>
                    </a>
                </td>
            </tr>
            <tr id="tr_iata_widget_8">
                <td>
                    <table  id="table_iata_widget_8">
                        <tr>
                            <td>
                                <input type="text" name="origin_8" id="origin_widget_8" value=""
                                       class="constructorCityShortcodesAutocomplete regular-text code"
                                       placeholder="<?php _e('Origin', TPOPlUGIN_TEXTDOMAIN ); ?>">
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <input type="text" name="destination_8" id="destination_widget_8" value=""
                                       class="constructorCityShortcodesAutocomplete regular-text code"
                                       placeholder="<?php _e('Destination', TPOPlUGIN_TEXTDOMAIN ); ?>">
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
            <tr id="tr_limit_widget_8">
                <td>
                    <span><?php _e('Limit', TPOPlUGIN_TEXTDOMAIN ); ?></span>
                    <select name="limit_widget_8" id="limit_widget_8">
                        <?php for($i = 1; $i < 22; $i++){ ?>
                            <option <?php selected( \app\includes\TPPlugin::$options["widgets"]['8']['limit'], $i ); ?>
                                value="<?php echo $i; ?>"><?php echo $i; ?></option>
                        <?php } ?>

                    </select>
                </td>
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


            <tr id="tr_type_widget">
                <td>
                    <label>
                        <span><?php _e('View widget', TPOPlUGIN_TEXTDOMAIN ); ?></span>
                        <select name="type_widget" id="type_widget" class="TP-Zelect">
                            <option <?php selected( \app\includes\TPPlugin::$options["widgets"][7]['type'], 'full'); ?>
                                value="full"><?php _e('Full', TPOPlUGIN_TEXTDOMAIN ); ?></option>
                            <option <?php selected( \app\includes\TPPlugin::$options["widgets"][7]['type'], 'compact'); ?>
                                value="compact"><?php _e('Compact', TPOPlUGIN_TEXTDOMAIN ); ?></option>
                        </select>
                    </label>
                </td>
            </tr>
            <tr id="tr_limit_widget">
                <td>
                    <label>
                        <span><?php _e('Limit', TPOPlUGIN_TEXTDOMAIN ); ?></span>
                        <select name="limit_widget" id="limit_widget" class="TP-Zelect">
                            <?php for($i = 1; $i < 11; $i++){ ?>
                                <option <?php selected( \app\includes\TPPlugin::$options["widgets"][7]['limit'], $i ); ?>
                                    value="<?php echo $i; ?>"><?php echo $i; ?></option>
                            <?php } ?>

                        </select>
                    </label>
                </td>
            </tr>
            <tr id="tr_cat_widget-1">
                <td id="td_cat_widget-1">
                    <select id="cat_widget-1"></select>
                </td>
            </tr>
            <tr id="tr_cat_widget-2">
                <td id="td_cat_widget-2">
                    <select id="cat_widget-2"></select>
                </td>
            </tr>
            <tr id="tr_cat_widget-3">
                <td id="td_cat_widget-3">
                    <select id="cat_widget-3"></select>
                </td>
            </tr>
            <tr id="tr_zoom_widget">
                <td id="td_zoom_widget">
                    <label>
                        <span><?php _e('Zoom', TPOPlUGIN_TEXTDOMAIN ); ?></span>
                        <select name="zoom_widget" id="zoom_widget" class="TP-Zelect">
                            <?php for($z = 1; $z < 20; $z++){ ?>
                                <option <?php selected( \app\includes\TPPlugin::$options["widgets"][2]['zoom'], $z ); ?>
                                    value="<?php echo $z; ?>"><?php echo $z; ?></option>
                            <?php } ?>

                        </select>
                    </label>
                </td>
            </tr>
            </tbody>
        </table>
    </form>
</div>