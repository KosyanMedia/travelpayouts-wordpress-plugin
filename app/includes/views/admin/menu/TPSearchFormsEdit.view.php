<div class="TPWrapper TPWrapper-long">

    <p class="TPMainTitle  TPMainTitleSF">
        <?php _ex('Search forms',
            'tp_admin_page_edit_search_forms_paragraph_1', TPOPlUGIN_TEXTDOMAIN); ?>
    </p>
    <div class="TP-TopImportantInfo TP-shortDescription">
	    <?php
	    global $locale;
	    $linkHere = '';
	    switch($locale) {
		    case "ru_RU":
			    $linkHere = 'https://support.travelpayouts.com/hc/ru/articles/115000456691?utm_source=wpplugin&utm_medium=forms&utm_campaign=ru';
			    break;
		    case "en_US":
			    $linkHere = 'https://support.travelpayouts.com/hc/en-us/articles/115000456691?utm_source=wpplugin&utm_medium=forms&utm_campaign=en';
			    break;
		    default:
			    $linkHere = 'https://support.travelpayouts.com/hc/en-us/articles/115000456691?utm_source=wpplugin&utm_medium=forms&utm_campaign=en';
			    break;
	    }
	    ?>
        <p>
            <?php _ex('Check our step-by-step manual',
                'tp_admin_page_edit_search_forms_paragraph_2', TPOPlUGIN_TEXTDOMAIN); ?>
            <a href="<?php echo $linkHere; ?>" target="_blank">
                <?php _ex('here',
                    'tp_admin_page_edit_search_forms_paragraph_2_link', TPOPlUGIN_TEXTDOMAIN); ?>
            </a>
        </p>
    </div>

    <div class="TPmainContent TP-BalanceContent TP-SettingContent">
        <p class="TP-SettingTitle">
            <?php _ex('Adding shortcode',
                'tp_admin_page_edit_search_forms_paragraph_3', TPOPlUGIN_TEXTDOMAIN); ?>
        </p>

        <form method="post" action="admin.php?page=tp_control_search_shortcodes&action=update_search_shortcode"
              method="post" name="searchShortcodeAdd">
            <div class="TP-LocalHead TP-shortLocal">
                <label>
                    <span>
                        <?php _ex('Title',
                            'tp_admin_page_edit_search_forms_field_title_label', TPOPlUGIN_TEXTDOMAIN); ?>
                    </span>
                    <input type="text" name="search_shortcode_title" required value="<?php echo $this->data['title'] ?>"/>
                </label>
                <label>
                    <span>
                         <?php _ex('Type shortcode',
                             'tp_admin_page_edit_search_forms_field_type_label', TPOPlUGIN_TEXTDOMAIN); ?>
                    </span>
                    <select class="TP-Zelect TPSelectSearchShortcodeType" name="search_shortcode_type" required="required">
                        <option value="0" <?php echo selected($this->data['type_shortcode'], 0); ?>>
                            <?php _ex('Search Form',
                                'tp_admin_page_edit_search_forms_field_type_value_1', TPOPlUGIN_TEXTDOMAIN); ?>
                        </option>
                        <option value="1" <?php echo selected($this->data['type_shortcode'], 1); ?>>
                            <?php _ex('Other',
                                'tp_admin_page_edit_search_forms_field_type_value_2', TPOPlUGIN_TEXTDOMAIN); ?>
                        </option>
                    </select>
                </label>
                <div>
                    <label class="TP-inputTextShort">
                         <span>
                            <?php _ex('TravelPayouts Form Code',
                                'tp_admin_page_edit_search_forms_field_code_form_label', TPOPlUGIN_TEXTDOMAIN); ?>
                        </span>
                        <span>
                            <?php _ex('Make sure you have unchecked the "Short Code" and "Iframe Code" boxes',
                                'tp_admin_page_edit_search_forms_field_code_form_help', TPOPlUGIN_TEXTDOMAIN); ?>
                        </span>
                        <textarea name="search_shortcode_code_form" class="TPSearchShortcodeCodeForm"><?php echo $this->data['code_form'] ?></textarea>
                    </label>
                </div>
                <label>
                    <span>
                        <?php _ex('Default City of Departure',
                            'tp_admin_page_edit_search_forms_field_from_label', TPOPlUGIN_TEXTDOMAIN); ?>
                    </span>
                    <input type="text" name="search_shortcode_from" class="searchShortcodeAutocomplete"
                           value="<?php echo $this->data['from_city'] ?>" />
                </label>
                <label>
                    <span>
                        <?php _ex('Default City of Arrival',
                            'tp_admin_page_edit_search_forms_field_to_label', TPOPlUGIN_TEXTDOMAIN); ?>
                    </span>
                    <input type="text" name="search_shortcode_to" class="searchShortcodeAutocomplete"
                           value="<?php echo $this->data['to_city'] ?>"/>
                </label>
                <label>
                    <span>
                        <?php _ex('Default City/Hotel',
                            'tp_admin_page_edit_search_forms_field_city_label', TPOPlUGIN_TEXTDOMAIN); ?>
                    </span>
                    <input type="text" name="search_shortcode_hotel_city" class="searchHotelCityShortcodeAutocomplete TPHotelCityAutocomplete"
                           value="<?php echo $this->data['hotel_city'] ?>"/>
                </label>
                <p class="TP-ViewShortCode">
                    <?php _ex('Shortcode',
                        'tp_admin_page_edit_search_forms_field_search_shortcodes_label', TPOPlUGIN_TEXTDOMAIN); ?>:
                    <?php
                    $shortcodeAttr = '';
                    if (empty($this->data['slug'])){
                        $shortcodeAttr = ' id="'.$this->data['id'].'"';
                    } else {
                        $shortcodeAttr = ' slug="'.$this->data['slug'].'"';
                    }
                    ?>
                    <span>[tp_search_shortcodes <?php echo $shortcodeAttr ?>]</span>
                </p>
            </div>

            <p class="TP-sescriptionShort">
                <?php _ex('Shortcode will be automatically generated after you press the Save Changes button. It can also be placed into your posts right away',
                    'tp_admin_page_edit_search_forms_paragraph_4', TPOPlUGIN_TEXTDOMAIN); ?>
            </p>

            <div class="TP-navsUserShort">
                <a href="admin.php?page=tp_control_search_shortcodes" class="TP-deleteShortLincks TP-deleteShortLincks--cust">
                    <i></i><?php _ex('cancel',
                        'tp_admin_page_edit_search_forms_btn_cancel', TPOPlUGIN_TEXTDOMAIN); ?>
                </a>
                <input type="hidden" name="search_shortcodes_id" value="<?php echo $this->data['id'] ?>">
                <button class="TP-BtnTab">
                    <?php _ex('save changes',
                        'tp_admin_page_edit_search_forms_btn_save', TPOPlUGIN_TEXTDOMAIN); ?>
                </button>
            </div>


        </form>



    </div>
</div>