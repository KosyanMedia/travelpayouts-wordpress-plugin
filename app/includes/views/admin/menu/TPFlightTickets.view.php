<div class="TPWrapper TPWrapperFlights">
    <p class="TPMainTitle">
        <?php _ex('Flights',
            'tp_admin_page_flights_paragraph_1', TPOPlUGIN_TEXTDOMAIN); ?>
    </p>
    <div id="tabs-flights">
        <nav class="TPNavigation">
            <ul class="TPMainMenu">
                <li>
                    <a href="#tabs-tickets_config" class="TPMainMenuA">
                        <i class="icoItemNav ico-table"></i>
                        <span>
                            <?php _ex('Tables Content',
                                'tp_admin_page_flights_tab_menu_tickets_config', TPOPlUGIN_TEXTDOMAIN); ?>
                        </span>
                    </a>
                </li>
                <li>
                    <a href="#tabs-tickets_style" class="TPMainMenuA">
                        <i class="icoItemNav ico-glass"></i>
                        <span>
                            <?php _ex('Layout',
                                'tp_admin_page_flights_tab_menu_tickets_style', TPOPlUGIN_TEXTDOMAIN); ?>
                        </span>
                    </a>
                </li>
                <li>
                    <a href="#tabs-tickets_themes" class="TPMainMenuA">
                        <i class="icoItemNav ico-glass"></i>
                        <span>
                            <?php _ex('Themes',
                                'tp_admin_page_flights_tab_menu_tickets_themes', TPOPlUGIN_TEXTDOMAIN); ?>
                        </span>
                    </a>
                </li>
                <li>
                    <a href="#tabs-other_settings" class="TPMainMenuA">
                        <i class="icoItemNav ico-table"></i>
                        <span>
                            <?php _ex('Other settings',
                                'tp_admin_page_flights_tab_menu_other_settings', TPOPlUGIN_TEXTDOMAIN); ?>
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
                           value="<?php _ex('Save changes',
                               'tp_admin_page_flights_tab_tickets_style_btn_save_changes', TPOPlUGIN_TEXTDOMAIN); ?>">
                </div>
            </form>
        </div>
        <div id="tabs-tickets_themes">
            <div class="TPmainContent TPmainContentThemes">

                <div class="TPThemes">
                    <form action="options.php" class="formSettings TPFormNotReload" method="POST">
                        <?php $numberTheme = 1; ?>
                        <?php foreach($data['themes'] as $theme): ?>
                            <?php
                            $TPThemeActive = ($theme['name'] ==  \app\includes\TPPlugin::$options['themes_table']['name'])?'TPThemeActive':'';

                            ?>
                            <div class="TPTheme <?php echo $TPThemeActive; ?>" data-theme_name="<?php echo $theme['name']; ?>">
                                <div class="TPThemeScreenshot">
                                    <img src="<?php echo TPOPlUGIN_URL.'app/public/themes/flight/screens-and-names/'.$theme['screenshot']?>" alt="">
                                </div>
                                <h3 class="TPThemeName">
		                            <?php echo $numberTheme.'. '; ?>
		                            <?php echo $theme['title']; ?>
                                </h3>
                                <div class="TPThemeActions">
                                    <input type="submit" name="submit"
                                           class="button button-secondary activate TPThemeBtnActivate "
                                           value="<?php _ex('Activate',
                                               'tp_admin_menu_page_flight_tickets_tab_themes_btn_active', TPOPlUGIN_TEXTDOMAIN );?>">
                                    <!--<a class="button button-secondary activate TPThemeBtnActivate ">
                                        <?php
                                            _ex('Activate',
                                                'tp_admin_menu_page_flight_tickets_tab_themes_btn_active', TPOPlUGIN_TEXTDOMAIN );
                                        ?>
                                    </a>-->
                                </div>
                            </div>
	                        <?php $numberTheme++; ?>
                        <?php endforeach; ?>

                            <?php settings_fields('TPFlightTickets'); ?>
                            <?php do_settings_fields('tp_settings_themes_table', 'tp_settings_themes_table_id'); ?>
                    </form>
                </div>

            </div>
        </div>
        <div id="tabs-other_settings">
            <form action="options.php" class="formSettings TPFormNotReload TPOtherSettingTPFormNotReload" method="POST">
                <div class="TPmainContent TPmainContentThemes TPOtherSettingContent">
                    <p class="TP-SettingTitle">
                        <?php _ex('Other settings',
                            'tp_admin_page_flights_tab_menu_other_settings', TPOPlUGIN_TEXTDOMAIN); ?>
                    </p>
                    <?php settings_fields('TPFlightTickets'); ?>
                    <?php do_settings_fields('tp_settings_other_settings', 'tp_settings_other_settings_id'); ?>

                </div>
                <div class="TP-navsPan">
                    <!--Кнопка может быть не активной: добавляйте класс disable для достижение такого состояние-->
                    <input type="submit" name="submit" id="TPSaveSettingsStyle" class="TP-BtnTab"
                           value="<?php _ex('Save changes',
                               'tp_admin_page_flights_tab_tickets_style_btn_save_changes', TPOPlUGIN_TEXTDOMAIN); ?>">
                </div>
            </form>
        </div>
    </div>
</div>