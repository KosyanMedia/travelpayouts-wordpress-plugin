<div id="constructorSearchFormModal" title="<?php _ex('tp_admin_page_settings_сonstructor_search_form_title',
    '(Constructor search form)', TPOPlUGIN_TEXTDOMAIN ); ?>" style="display: none;">
    <table>
        <tr>
            <td id="td_select_search_form">
                <?php if(!empty($this->data)){ ?>
                    <?php if(count($this->data)>1){ ?>
                        <select name="select_search_form" id="select_search_form">
                            <?php foreach($this->data as $key => $record): ?>

                                <option value="<?php echo $record['id'];?>"
                                    <?php echo selected($key, 0); ?> data-type_form="<?php echo $record['type_form'];?>">
                                    <?php echo $record['title'];?></option>
                            <?php endforeach; ?>
                        </select>
                    <?php }else{ ?>
                        <label>
                        <?php foreach($this->data as $key => $record): ?>
                            <?php echo $record['title'];  ?>
                            <input type="hidden" name="select_search_form"  data-type_form="<?php echo $record['type_form'];?>"
                                   id="select_search_form" value="<?php echo $record['id'];?>">
                        <?php endforeach; ?>
                        </label>
                    <?php } ?>
                <?php } else{
                    _ex('tp_admin_page_settings_сonstructor_search_form_no_search_form_label',
                        "(No customized search form. )", TPOPlUGIN_TEXTDOMAIN);
                    ?><a href="admin.php?page=tp_control_search_shortcodes">
                    <?php _ex('tp_admin_page_settings_сonstructor_search_form_link_page_search_form_title',
                        "(Go to setting.)", TPOPlUGIN_TEXTDOMAIN); ?>
                    </a><?php
                } ?>
            </td>
        </tr>
        <!--<tr  id="tr_type_search_form">
            <td id="td_type_search_form">
                <select name="type_search_form" id="type_search_form">
                    <option value="avia" selected="selected">
                        <?php //echo _x('Flights','search_form_modal', TPOPlUGIN_TEXTDOMAIN) ?>
                    </option>
                    <option value="hotel">
                        <?php //echo _x('Hotels','search_form_modal', TPOPlUGIN_TEXTDOMAIN) ?>
                    </option>
                    <option value="avia_hotel">
                        <?php //echo _x('Flights + Hotels','search_form_modal', TPOPlUGIN_TEXTDOMAIN) ?>
                    </option>
                </select>
            </td>
        </tr>-->
        <tr id="tr_origin_search_form">
            <td>
                <input type="text" name="origin_search_form" id="origin_search_form" value=""
                       class="constructorCityShortcodesAutocomplete regular-text code"
                       placeholder="<?php _ex('tp_admin_page_settings_сonstructor_search_form_field_origin_label',
                           '(City of departure default)', TPOPlUGIN_TEXTDOMAIN) ?>">
            </td>
        </tr>
        <tr id="tr_destination_search_form">
            <td>
                <input type="text" name="destination_search_form" id="destination_search_form" value=""
                       class="constructorCityShortcodesAutocomplete regular-text code"
                       placeholder="<?php  _ex('tp_admin_page_settings_сonstructor_search_form_field_destination_label',
                           '(City Arrival default)', TPOPlUGIN_TEXTDOMAIN) ?>">
            </td>
        </tr>
        <tr id="tr_search_shortcode_hotel_city">
            <td>
                <input type="text" name="search_shortcode_hotel_city" id="search_shortcode_hotel_city" value=""
                       class="searchHotelCityShortcodeAutocomplete TPHotelCityAutocomplete regular-text code"
                       placeholder="<?php _ex('tp_admin_page_settings_сonstructor_search_form_field_hotel_city_label',
                           '(Default City/Hotel)', TPOPlUGIN_TEXTDOMAIN) ?>">
            </td>
        </tr>
        <tr id="tr_subid_sf">
            <td>
                <input type="text" name="tp_subid" id="tp_subid_sf" value=""
                       class="regular-text code"
                       placeholder="<?php _ex('tp_admin_page_settings_сonstructor_search_form_field_subid_label',
                           '(Subid)', TPOPlUGIN_TEXTDOMAIN); ?>">
            </td>
        </tr>
    </table>
</div>