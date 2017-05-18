<form action="options.php" class="formSettings TPFormNotReload" method="POST" id="TPHotelsConfig">
    <?php settings_fields('TPHotels'); ?>
    <div class="TPmainContent TP-BalanceContent">
        <div class="bellows default">

            <div class="bellows__item">
                <div class="bellows__header">
                    <h3>
                        <?php _ex('tp_admin_page_hotels_tab_tables_content_shortcode_1_label',
                            '(Hotels collection - Discounts)', TPOPlUGIN_TEXTDOMAIN); ?>
                    </h3>
                </div>
                <div class="bellows__content">
                    <?php do_settings_fields('tp_settings_hotels_shortcode_1', 'tp_settings_hotels_shortcode_1_id'); ?>
                    <div class="TP-navsPan">
                        <!--Кнопка может быть не активной: добавляйте класс disable для достижение такого состояние-->
                        <input type="submit" name="submit" id="TPSaveSettingsHotels_1" class="TP-BtnTab"
                               value="<?php _ex('tp_admin_page_hotels_tab_tables_content_btn_save_label',
                                   '(Save changes)', TPOPlUGIN_TEXTDOMAIN); ?>">
                    </div>
                </div>
            </div>

            <div class="bellows__item">
                <div class="bellows__header">
                    <h3>
                        <?php _ex('tp_admin_page_hotels_tab_tables_content_shortcode_2_label',
                            '(Hotels collections for dates)', TPOPlUGIN_TEXTDOMAIN); ?>
                    </h3>
                </div>
                <div class="bellows__content">
                    <?php do_settings_fields('tp_settings_hotels_shortcode_2', 'tp_settings_hotels_shortcode_2_id'); ?>
                    <div class="TP-navsPan">
                        <!--Кнопка может быть не активной: добавляйте класс disable для достижение такого состояние-->
                        <input type="submit" name="submit" id="TPSaveSettingsHotels_2" class="TP-BtnTab"
                               value="<?php _ex('tp_admin_page_hotels_tab_tables_content_btn_save_label',
                                   '(Save changes)', TPOPlUGIN_TEXTDOMAIN); ?>">
                    </div>
                </div>
            </div>

            <div class="bellows__item">
                <div class="bellows__header">
                    <h3>
                        <?php _ex('tp_admin_page_hotels_tab_tables_content_shortcode_3_label',
                            '(City hotels with price from to)', TPOPlUGIN_TEXTDOMAIN); ?>
                    </h3>
                </div>
                <div class="bellows__content">
                    <?php do_settings_fields('tp_settings_hotels_shortcode_3', 'tp_settings_hotels_shortcode_3_id'); ?>
                    <div class="TP-navsPan">
                        <!--Кнопка может быть не активной: добавляйте класс disable для достижение такого состояние-->
                        <input type="submit" name="submit" id="TPSaveSettingsHotels_3" class="TP-BtnTab"
                               value="<?php _ex('tp_admin_page_hotels_tab_tables_content_btn_save_label',
                                   '(Save changes)', TPOPlUGIN_TEXTDOMAIN); ?>">
                    </div>
                </div>
            </div>
            <div class="bellows__item">
                <div class="bellows__header">
                    <h3>
                        <?php _ex('tp_admin_page_hotels_tab_tables_content_shortcode_4_label',
                            '(City hotels by stars)', TPOPlUGIN_TEXTDOMAIN); ?>
                    </h3>
                </div>
                <div class="bellows__content">
                    <?php do_settings_fields('tp_settings_hotels_shortcode_4', 'tp_settings_hotels_shortcode_4_id'); ?>
                    <div class="TP-navsPan">
                        <!--Кнопка может быть не активной: добавляйте класс disable для достижение такого состояние-->
                        <input type="submit" name="submit" id="TPSaveSettingsHotels_4" class="TP-BtnTab"
                               value="<?php _ex('tp_admin_page_hotels_tab_tables_content_btn_save_label',
                                   '(Save changes)', TPOPlUGIN_TEXTDOMAIN); ?>">
                    </div>
                </div>
            </div>

            <div class="bellows__item">
                <div class="bellows__header">
                    <h3>
                        <?php _ex('tp_admin_page_hotels_tab_tables_content_shortcode_5_label',
                            '(Stay price in city for X days)', TPOPlUGIN_TEXTDOMAIN); ?>
                    </h3>
                </div>
                <div class="bellows__content">
                    <?php do_settings_fields('tp_settings_hotels_shortcode_5', 'tp_settings_hotels_shortcode_5_id'); ?>
                    <div class="TP-navsPan">
                        <!--Кнопка может быть не активной: добавляйте класс disable для достижение такого состояние-->
                        <input type="submit" name="submit" id="TPSaveSettingsHotels_5" class="TP-BtnTab"
                               value="<?php _ex('tp_admin_page_hotels_tab_tables_content_btn_save_label',
                                   '(Save changes)', TPOPlUGIN_TEXTDOMAIN); ?>">
                    </div>
                </div>
            </div>

            <div class="bellows__item">
                <div class="bellows__header">
                    <h3>
                        <?php _ex('tp_admin_page_hotels_tab_tables_content_shortcode_6_label',
                            '(Stay price in city for weekend)', TPOPlUGIN_TEXTDOMAIN); ?>
                    </h3>
                </div>
                <div class="bellows__content">
                    <?php do_settings_fields('tp_settings_hotels_shortcode_6', 'tp_settings_hotels_shortcode_6_id'); ?>
                    <div class="TP-navsPan">
                        <!--Кнопка может быть не активной: добавляйте класс disable для достижение такого состояние-->
                        <input type="submit" name="submit" id="TPSaveSettingsHotels_6" class="TP-BtnTab"
                               value="<?php _ex('tp_admin_page_hotels_tab_tables_content_btn_save_label',
                                   '(Save changes)', TPOPlUGIN_TEXTDOMAIN); ?>">
                    </div>
                </div>
            </div>

        </div>
    </div>
</form>