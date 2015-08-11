<div class="TPWrapper TPWrapper-long">

    <p class="TPMainTitle"><?php _e('Search forms', KPDPlUGIN_TEXTDOMAIN); ?> </p>

    <div class="TPmainContent TP-BalanceContent TP-SettingContent">
        <p class="TP-SettingTitle"><?php _e('Adding shortcode', KPDPlUGIN_TEXTDOMAIN); ?> </p>

        <form method="post" action="admin.php?page=tp_control_search_shortcodes&action=update_search_shortcode"
              method="post" name="searchShortcodeAdd">
            <div class="TP-LocalHead TP-shortLocal">
                <label>
                    <span><?php _e('Title ', KPDPlUGIN_TEXTDOMAIN) ?></span>
                    <input type="text" name="search_shortcode_title" required value="<?php echo $this->data['title'] ?>"/>
                </label>
                <label>
                    <span><?php _e('Type shortcode', KPDPlUGIN_TEXTDOMAIN) ?></span>
                    <select class="TP-Zelect TPSelectSearchShortcodeType" name="search_shortcode_type" required="required">
                        <option value="0" <?php echo selected($this->data['type_shortcode'], 0); ?>><?php echo _x('Search Form', 'select_search_form', KPDPlUGIN_TEXTDOMAIN) ?></option>
                        <option value="1" <?php echo selected($this->data['type_shortcode'], 1); ?>><?php _e('Other', KPDPlUGIN_TEXTDOMAIN) ?></option>
                    </select>
                </label>
                <div>
                    <label class="TP-inputTextShort">
                        <span><?php _e('Code form TravelPayouts', KPDPlUGIN_TEXTDOMAIN) ?></span>
                        <span><?php _e('Make sure you have removed the tick "Compact code to insert" and "Iframe code to insert"', KPDPlUGIN_TEXTDOMAIN) ?></span>
                        <textarea name="search_shortcode_code_form" class="TPSearchShortcodeCodeForm"><?php echo $this->data['code_form'] ?></textarea>
                    </label>
                </div>
                <label>
                    <span><?php _e('City of departure default', KPDPlUGIN_TEXTDOMAIN) ?></span>
                    <input type="text" name="search_shortcode_from" class="searchShortcodeAutocomplete"
                           value="<?php echo $this->data['from_city'] ?>" />
                </label>
                <label>
                    <span><?php _e('City Arrival default', KPDPlUGIN_TEXTDOMAIN) ?></span>
                    <input type="text" name="search_shortcode_to" class="searchShortcodeAutocomplete"
                           value="<?php echo $this->data['to_city'] ?>"/>
                </label>

                <p class="TP-ViewShortCode"><?php _e('Shortcode', KPDPlUGIN_TEXTDOMAIN) ?>:
                    <span>[tp_search_shortcodes id=<?php echo $this->data['id'] ?>]</span>
                </p>
            </div>

            <p class="TP-sescriptionShort">
                <?php _e('Shortcode generated automatically when you save and available for insertion into the posts', KPDPlUGIN_TEXTDOMAIN) ?>
            </p>

            <div class="TP-navsUserShort">
                <a href="admin.php?page=tp_control_search_shortcodes" class="TP-deleteShortLincks TP-deleteShortLincks--cust">
                    <i></i><?php _e('cancel', KPDPlUGIN_TEXTDOMAIN) ?>
                </a>
                <input type="hidden" name="search_shortcodes_id" value="<?php echo $this->data['id'] ?>">
                <button class="TP-BtnTab">
                    <?php _e('save changes', KPDPlUGIN_TEXTDOMAIN) ?>
                </button>
            </div>


        </form>



    </div>
</div>