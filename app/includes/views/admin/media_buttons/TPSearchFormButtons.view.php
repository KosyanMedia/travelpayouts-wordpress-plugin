<div id="constructorSearchFormModal" title="<?php _e('Constructor search form', KPDPlUGIN_TEXTDOMAIN ); ?>" style="display: none;">
    <table>
        <tr>
            <td id="td_select_search_form">
                <select name="select_search_form" id="select_search_form">
                    <option selected="selected"><?php _e('Select search form', KPDPlUGIN_TEXTDOMAIN ); ?></option>
                    <?php if(!empty($this->data)): ?>
                        <?php foreach($this->data as $key => $record): ?>
                            <option value="<?php echo $record['id'];?>"><?php echo $record['title'];?></option>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </select>
            </td>
        </tr>
        <tr id="tr_origin_search_form">
            <td>
                <input type="text" name="origin_search_form" id="origin_search_form" value=""
                       class="constructorCityShortcodesAutocomplete regular-text code"
                       placeholder="<?php _e('City of departure default', KPDPlUGIN_TEXTDOMAIN) ?>">
            </td>
        </tr>
        <tr id="tr_destination_search_form">
            <td>
                <input type="text" name="destination_search_form" id="destination_search_form" value=""
                       class="constructorCityShortcodesAutocomplete regular-text code"
                       placeholder="<?php _e('City Arrival default', KPDPlUGIN_TEXTDOMAIN) ?>">
            </td>
        </tr>
    </table>
</div>