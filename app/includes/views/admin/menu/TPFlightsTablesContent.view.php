<form action="options.php" class="formSettings TPFormNotReload" method="POST" id="TPTicketsConfig">
    <?php settings_fields('TPFlightTickets'); ?>
    <div class="TPmainContent TP-BalanceContent">
        <div class="bellows default">
            <div class="bellows__item">
                <div class="bellows__header">
                    <h3>
                        <?php _ex('tp_admin_page_flights_tab_tables_content_shortcode_1_label',
                            '(Flights from origin to destination, One Way (next month))', TPOPlUGIN_TEXTDOMAIN); ?>
                    </h3>
                </div>
                <div class="bellows__content">
                    <?php do_settings_fields('tp_settings_shortcode_1', 'tp_settings_shortcode_1_id'); ?>
                    <div class="TP-navsPan">
                        <!--Кнопка может быть не активной: добавляйте класс disable для достижение такого состояние-->
                        <input type="submit" name="submit" id="TPSaveSettingsTickets_1" class="TP-BtnTab"
                               value="<?php _ex('tp_admin_page_flights_tab_tables_content_shortcode_1_btn_save_label',
                                   '(Save changes)', TPOPlUGIN_TEXTDOMAIN); ?>">
                    </div>
                </div>
            </div>
            <div class="bellows__item">
                <div class="bellows__header">
                    <h3>
                        <?php _ex('tp_admin_page_flights_tab_tables_content_shortcode_2_label',
                            '(Flights from Origin to Destination (next few days))', TPOPlUGIN_TEXTDOMAIN); ?>
                    </h3>
                </div>
                <div class="bellows__content">
                    <?php do_settings_fields('tp_settings_shortcode_2', 'tp_settings_shortcode_2_id'); ?>
                    <div class="TP-navsPan">
                        <!--Кнопка может быть не активной: добавляйте класс disable для достижение такого состояние-->
                        <input type="submit" name="submit" id="TPSaveSettingsTickets_2" class="TP-BtnTab"
                               value="<?php _ex('tp_admin_page_flights_tab_tables_content_shortcode_2_btn_save_label',
                                   '(Save changes)', TPOPlUGIN_TEXTDOMAIN); ?>">
                    </div>
                </div>
            </div>
            <div class="bellows__item">
                <div class="bellows__header">
                    <h3>
                        <?php _ex('tp_admin_page_flights_tab_tables_content_shortcode_4_label',
                            '(Cheapest Flights from origin to destination, Round-trip)', TPOPlUGIN_TEXTDOMAIN); ?>
                    </h3>
                </div>
                <div class="bellows__content">
                    <?php do_settings_fields('tp_settings_shortcode_4', 'tp_settings_shortcode_4_id'); ?>
                    <div class="TP-navsPan">
                        <!--Кнопка может быть не активной: добавляйте класс disable для достижение такого состояние-->
                        <input type="submit" name="submit" id="TPSaveSettingsTickets_4" class="TP-BtnTab"
                               value="<?php _ex('tp_admin_page_flights_tab_tables_content_shortcode_4_btn_save_label',
                                   '(Save changes)', TPOPlUGIN_TEXTDOMAIN); ?>">
                    </div>
                </div>
            </div>
            <div class="bellows__item">
                <div class="bellows__header">
                    <h3>
                        <?php _ex('tp_admin_page_flights_tab_tables_content_shortcode_5_label',
                            '(Cheapest Flights from origin to destination (next month))', TPOPlUGIN_TEXTDOMAIN); ?>
                    </h3>
                </div>
                <div class="bellows__content">
                    <?php do_settings_fields('tp_settings_shortcode_5', 'tp_settings_shortcode_5_id'); ?>
                    <div class="TP-navsPan">
                        <!--Кнопка может быть не активной: добавляйте класс disable для достижение такого состояние-->
                        <input type="submit" name="submit" id="TPSaveSettingsTickets_5" class="TP-BtnTab"
                               value="<?php _ex('tp_admin_page_flights_tab_tables_content_shortcode_5_btn_save_label',
                                   '(Save changes)', TPOPlUGIN_TEXTDOMAIN); ?>">
                    </div>
                </div>
            </div>
            <div class="bellows__item">
                <div class="bellows__header">
                    <h3>
                        <?php _ex('tp_admin_page_flights_tab_tables_content_shortcode_6_label',
                            '(Cheapest Flights from origin to destination (next year))', TPOPlUGIN_TEXTDOMAIN); ?>
                    </h3>
                </div>
                <div class="bellows__content">
                    <?php do_settings_fields('tp_settings_shortcode_6', 'tp_settings_shortcode_6_id'); ?>
                    <div class="TP-navsPan">
                        <!--Кнопка может быть не активной: добавляйте класс disable для достижение такого состояние-->
                        <input type="submit" name="submit" id="TPSaveSettingsTickets_6" class="TP-BtnTab"
                               value="<?php _ex('tp_admin_page_flights_tab_tables_content_shortcode_6_btn_save_label',
                                   '(Save changes)', TPOPlUGIN_TEXTDOMAIN); ?>">
                    </div>
                </div>
            </div>
            <div class="bellows__item">
                <div class="bellows__header">
                    <h3>
                        <?php _ex('tp_admin_page_flights_tab_tables_content_shortcode_7_label',
                            '(Direct Flights from origin to destination)', TPOPlUGIN_TEXTDOMAIN); ?>
                    </h3>
                </div>
                <div class="bellows__content">
                    <?php do_settings_fields('tp_settings_shortcode_7', 'tp_settings_shortcode_7_id'); ?>
                    <div class="TP-navsPan">
                        <!--Кнопка может быть не активной: добавляйте класс disable для достижение такого состояние-->
                        <input type="submit" name="submit" id="TPSaveSettingsTickets_7" class="TP-BtnTab"
                               value="<?php _ex('tp_admin_page_flights_tab_tables_content_shortcode_7_btn_save_label',
                                   '(Save changes)', TPOPlUGIN_TEXTDOMAIN); ?>">
                    </div>
                </div>
            </div>
            <div class="bellows__item">
                <div class="bellows__header">
                    <h3>
                        <?php _ex('tp_admin_page_flights_tab_tables_content_shortcode_8_label',
                            '(Direct Flights from origin)', TPOPlUGIN_TEXTDOMAIN); ?>
                    </h3>
                </div>
                <div class="bellows__content">
                    <?php do_settings_fields('tp_settings_shortcode_8', 'tp_settings_shortcode_8_id'); ?>
                    <div class="TP-navsPan">
                        <!--Кнопка может быть не активной: добавляйте класс disable для достижение такого состояние-->
                        <input type="submit" name="submit" id="TPSaveSettingsTickets_8" class="TP-BtnTab"
                               value="<?php _ex('tp_admin_page_flights_tab_tables_content_shortcode_8_btn_save_label',
                                   '(Save changes)', TPOPlUGIN_TEXTDOMAIN); ?>">
                    </div>
                </div>
            </div>
            <?php if(\app\includes\TPPlugin::$options['local']['currency'] == 'RUB'){ ?>
                <div class="bellows__item">
                    <div class="bellows__header">
                        <h3>
                            <?php _ex('tp_admin_page_flights_tab_tables_content_shortcode_9_label',
                                '(Popular Destinations from origin)', TPOPlUGIN_TEXTDOMAIN); ?>
                        </h3>
                    </div>
                    <div class="bellows__content">
                        <?php do_settings_fields('tp_settings_shortcode_9', 'tp_settings_shortcode_9_id'); ?>
                        <div class="TP-navsPan">
                            <!--Кнопка может быть не активной: добавляйте класс disable для достижение такого состояние-->
                            <input type="submit" name="submit" id="TPSaveSettingsTickets_9" class="TP-BtnTab"
                                   value="<?php _ex('tp_admin_page_flights_tab_tables_content_shortcode_9_btn_save_label',
                                       '(Save changes)', TPOPlUGIN_TEXTDOMAIN); ?>">
                        </div>
                    </div>
                </div>
            <?php } ?>
            <div class="bellows__item">
                <div class="bellows__header">
                    <h3>
                        <?php _ex('tp_admin_page_flights_tab_tables_content_shortcode_10_label',
                            '(Most popular flights within this Airline)', TPOPlUGIN_TEXTDOMAIN); ?>
                    </h3>
                </div>
                <div class="bellows__content">
                    <?php do_settings_fields('tp_settings_shortcode_10', 'tp_settings_shortcode_10_id'); ?>
                    <div class="TP-navsPan">
                        <!--Кнопка может быть не активной: добавляйте класс disable для достижение такого состояние-->
                        <input type="submit" name="submit" id="TPSaveSettingsTickets_10" class="TP-BtnTab"
                               value="<?php _ex('tp_admin_page_flights_tab_tables_content_shortcode_10_btn_save_label',
                                   '(Save changes)', TPOPlUGIN_TEXTDOMAIN); ?>">
                    </div>
                </div>
            </div>
            <div class="bellows__item">
                <div class="bellows__header">
                    <h3>
                        <?php _ex('tp_admin_page_flights_tab_tables_content_shortcode_12_label',
                            '(Searched on our website)', TPOPlUGIN_TEXTDOMAIN); ?>
                    </h3>
                </div>
                <div class="bellows__content">
                    <?php do_settings_fields('tp_settings_shortcode_12', 'tp_settings_shortcode_12_id'); ?>
                    <div class="TP-navsPan">
                        <!--Кнопка может быть не активной: добавляйте класс disable для достижение такого состояние-->
                        <input type="submit" name="submit" id="TPSaveSettingsTickets_12" class="TP-BtnTab"
                               value="<?php _ex('tp_admin_page_flights_tab_tables_content_shortcode_12_btn_save_label',
                                   '(Save changes)', TPOPlUGIN_TEXTDOMAIN); ?>">
                    </div>
                </div>
            </div>
            <div class="bellows__item">
                <div class="bellows__header">
                    <h3>
                        <?php _ex('tp_admin_page_flights_tab_tables_content_shortcode_13_label',
                            '(Cheap Flights from origin)', TPOPlUGIN_TEXTDOMAIN); ?>
                    </h3>
                </div>
                <div class="bellows__content">
                    <?php do_settings_fields('tp_settings_shortcode_13', 'tp_settings_shortcode_13_id'); ?>
                    <div class="TP-navsPan">
                        <!--Кнопка может быть не активной: добавляйте класс disable для достижение такого состояние-->
                        <input type="submit" name="submit" id="TPSaveSettingsTickets_13" class="TP-BtnTab"
                               value="<?php _ex('tp_admin_page_flights_tab_tables_content_shortcode_13_btn_save_label',
                                   '(Save changes)', TPOPlUGIN_TEXTDOMAIN); ?>">
                    </div>
                </div>
            </div>
            <div class="bellows__item">
                <div class="bellows__header">
                    <h3>
                        <?php _ex('tp_admin_page_flights_tab_tables_content_shortcode_14_label',
                            '(Cheap Flights to destination)', TPOPlUGIN_TEXTDOMAIN); ?>
                    </h3>
                </div>
                <div class="bellows__content">
                    <?php do_settings_fields('tp_settings_shortcode_14', 'tp_settings_shortcode_14_id'); ?>
                    <div class="TP-navsPan">
                        <!--Кнопка может быть не активной: добавляйте класс disable для достижение такого состояние-->
                        <input type="submit" name="submit" id="TPSaveSettingsTickets_14" class="TP-BtnTab"
                               value="<?php _ex('tp_admin_page_flights_tab_tables_content_shortcode_14_btn_save_label',
                                   '(Save changes)', TPOPlUGIN_TEXTDOMAIN); ?>">
                    </div>
                </div>
            </div>
        </div>

    </div>
</form>