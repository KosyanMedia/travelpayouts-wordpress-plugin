<div id="constructorRailwayShortcodesModal"
     title="<?php _ex('Railway timetable', 'modal railway сonstructor title', TPOPlUGIN_TEXTDOMAIN); ?>" style="display: none;">
    <table>
        <tr id="tr_railway_title">
            <td>
                <input type="text" name="tp_railway_title" id="tp_railway_title" value=""
                       class="regular-text code"
                       placeholder="<?php _ex('Alternate title',
				           'modal railway сonstructor title label', TPOPlUGIN_TEXTDOMAIN); ?>">
            </td>
        </tr>
        <tr id="tr_railway_origin">
            <td>
                <input type="text" name="tp_railway_origin" id="tp_railway_origin" value=""
                       class="tpCityRailwayAutocomplete regular-text code"
                       placeholder="<?php _ex('Origin',
				           'modal railway сonstructor origin label', TPOPlUGIN_TEXTDOMAIN); ?>">
            </td>
        </tr>
        <tr id="tr_railway_destination">
            <td>
                <input type="text" name="tp_railway_destination" id="tp_railway_destination" value=""
                       class="tpCityRailwayAutocomplete regular-text code"
                       placeholder="<?php _ex('Destination',
				           'modal railway сonstructor destination label', TPOPlUGIN_TEXTDOMAIN); ?>">
            </td>
        </tr>
        <tr id="tr_railway_subid">
            <td>
                <input type="text" name="tp_railway_subid" id="tp_railway_subid" value=""
                       class="regular-text code"
                       placeholder="<?php _ex('Subid',
				           'modal railway сonstructor subid label', TPOPlUGIN_TEXTDOMAIN); ?>">
            </td>
        </tr>
        <tr id="tr_railway_paginate">
            <td>
                <input type="checkbox" id="tp_railway_paginate" name="tp_railway_paginate" value="1"
	                <?php checked(isset(\app\includes\TPPlugin::$options['shortcodes_railway']['1']['paginate_switch']), 1) ?>>
			    <?php _ex('Paginate',
				    'modal railway сonstructor paginate label', TPOPlUGIN_TEXTDOMAIN); ?>
            </td>
        </tr>
        <tr id="tr_railway_off_title">
            <td id="td_railway_off_title">
                <input type="checkbox" id="tp_railway_off_title" name="tp_railway_off_title" value="1">
			    <?php _ex('No title',
				    'modal railway сonstructor no title label', TPOPlUGIN_TEXTDOMAIN); ?>
            </td>
        </tr>
    </table>
</div>