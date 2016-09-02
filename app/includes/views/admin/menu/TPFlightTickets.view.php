<div class="TPWrapper">
    <p class="TPMainTitle">
        <?php _ex('tp_admin_page_flights_paragraph_1',
            '(Flights)', TPOPlUGIN_TEXTDOMAIN); ?>
    </p>
    <div id="tabs-flights">
        <nav class="TPNavigation">
            <ul class="TPMainMenu">
                <li>
                    <a href="#tabs-tickets_config" class="TPMainMenuA">
                        <i class="icoItemNav ico-table"></i>
                        <span>
                            <?php _ex('tp_admin_page_flights_tab_menu_tickets_config',
                                '(Tables Content)', TPOPlUGIN_TEXTDOMAIN); ?>
                        </span>
                    </a>
                </li>
                <li>
                    <a href="#tabs-tickets_style" class="TPMainMenuA">
                        <i class="icoItemNav ico-glass"></i>
                        <span>
                            <?php _ex('tp_admin_page_flights_tab_menu_tickets_style',
                                '(Layout)', TPOPlUGIN_TEXTDOMAIN); ?>
                        </span>
                    </a>
                </li>
            </ul>
        </nav>
        <div id="tabs-tickets_config">
            <?php
                $pathView = TPOPlUGIN_DIR."/app/includes/views/admin/menu/TPFlightsTablesContent.view.php";
                $this->loadView($pathView);
            ?>
        </div>
        <div id="tabs-tickets_style">
            <form action="options.php" class="formSettings TPFormNotReload" method="POST">
                <div class="TPmainContent TP-BalanceContent TP-SettingContent">
                    <?php settings_fields('TPFlightTickets'); ?>
                    <?php do_settings_fields('tp_settings_style_table', 'tp_settings_style_table_id'); ?>

                </div>
                <div class="TP-navsPan">
                    <!--Кнопка может быть не активной: добавляйте класс disable для достижение такого состояние-->
                    <input type="submit" name="submit" id="TPSaveSettingsStyle" class="TP-BtnTab"
                           value="<?php _ex('tp_admin_page_flights_tab_tickets_style_btn_save_changes',
                               '(Save changes)', TPOPlUGIN_TEXTDOMAIN); ?>">
                </div>
            </form>
        </div>
    </div>
</div>