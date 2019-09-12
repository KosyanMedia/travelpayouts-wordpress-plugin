<div class="TPWrapper">
    <div id="tabs-settings">
        <div class="TP-TopImportantInfo">
            <?php
            global $locale;
            $tp_url = $tp_dev_url = $tp_wh_url = '';
            switch($locale){
                case "ru_RU":
                    $tp_url = 'https://www.travelpayouts.com/?utm_source=wpplugin&utm_medium=settings&utm_campaign=ru&utm_content=link';
                    $tp_dev_url = 'https://www.travelpayouts.com/developers/api?utm_source=wpplugin&utm_medium=settings&utm_campaign=ru&utm_content=link_api';
                    $tp_wh_url = 'https://www.travelpayouts.com/combined_white_labels?utm_source=wp_plugin&utm_medium=settings&utm_campaign=ru&utm_content=link_wl';
                    break;
                case "en_US":
                    $tp_url = 'https://www.travelpayouts.com/?utm_source=wpplugin&utm_medium=settings&utm_campaign=en&utm_content=link';
                    $tp_dev_url = 'https://www.travelpayouts.com/developers/api?utm_source=wpplugin&utm_medium=settings&utm_campaign=en&utm_content=link_api';
                    $tp_wh_url = 'https://www.travelpayouts.com/white_labels?utm_source=wp_plugin&utm_medium=settings&utm_campaign=en&utm_content=link_wl';
                    break;
                default:
                    $tp_url = 'https://www.travelpayouts.com/?utm_source=wpplugin&utm_medium=settings&utm_campaign=en&utm_content=link';
                    $tp_dev_url = 'https://www.travelpayouts.com/developers/api?utm_source=wpplugin&utm_medium=settings&utm_campaign=en&utm_content=link_api';
                    $tp_wh_url = 'https://www.travelpayouts.com/combined_white_labels?utm_source=wp_plugin&utm_medium=settings&utm_campaign=en&utm_content=link_wl';
                    break;
            } ?>
            <p>
                <?php printf(
                    _x('Please, enter your %s account data below. Please, register if you don’t have a Travelpayouts account. Check your Marker and Token at - %s  White Label - %s',
                        'tp_admin_page_settings_paragraph_1' , TPOPlUGIN_TEXTDOMAIN),
                    '<a href="'.$tp_url.'" target="_blank">
                        travelpayouts.com
                    </a>',
                    '<a href="'.$tp_dev_url.'" target="_blank">
                    travelpayouts.com/developers/api
                    </a>,',
                    '<a href="'.$tp_wh_url.'" target="_blank">
                        travelpayouts.com/white_labels
                    </a>');

                ?>
            </p>
        </div>
        <nav class="TPNavigation">
            <ul class="TPMainMenu">
                <li>
                    <a href="#tabs-account" class="TPMainMenuA">
                        <span><?php _ex('Account',
                                'tp_admin_page_settings_tab_menu_account', TPOPlUGIN_TEXTDOMAIN); ?></span>
                    </a>
                </li>
                <li>
                    <a href="#tabs-config" class="TPMainMenuA">
                        <span><?php _ex('Settings',
                                'tp_admin_page_settings_tab_menu_config', TPOPlUGIN_TEXTDOMAIN); ?></span>
                    </a>
                </li>
                <li>
                    <a href="#tabs-localization" class="TPMainMenuA">
                        <span><?php _ex('Localization',
                                'tp_admin_page_settings_tab_menu_localization', TPOPlUGIN_TEXTDOMAIN ); ?></span>
                    </a>
                </li>
            </ul>
        </nav>
        <div class="TP-SettingContent">
            <form action="options.php" class="formSettings TPFormNotReload" method="POST">
                <?php settings_fields('TPSettings'); ?>
                <div class="TPmainContent TP-SettingContent">
                    <div id="tabs-account">
                        <p class="TP-SettingTitle">
                            <?php _ex('Account',
                                'tp_admin_page_settings_tab_account', TPOPlUGIN_TEXTDOMAIN ); ?>
                        </p>
                        <div class="TP-RowForm">
                            <?php do_settings_fields('tp_settings_account', 'tp_settings_account_id'); ?>
                        </div>
                    </div>
                    <div id="tabs-config">
                        <p class="TP-SettingTitle">
                            <?php _ex('Settings',
                                'tp_admin_page_settings_tab_config', TPOPlUGIN_TEXTDOMAIN ); ?>
                        </p>
                        <div class="TP-RowForm">
                            <?php do_settings_fields('tp_settings_plugin_config', 'tp_settings_plugin_config_id'); ?>
                        </div>
                    </div>
                    <div id="tabs-localization">
                        <p class="TP-SettingTitle">
                            <?php _ex('Localization',
                                'tp_admin_page_settings_tab_localization', TPOPlUGIN_TEXTDOMAIN ); ?>
                        </p>
                        <?php do_settings_fields('tp_settings_local', 'tp_settings_local_id'); ?>
                    </div>
                </div>
                <div class="TP-navsPan">
                    <!--Кнопка может быть не активной: добавляйте класс disable для достижение такого состояние-->
                    <!--<button class="TP-BtnTab">сохранить изменения</button>-->
                    <?php if(empty(\app\includes\TPPlugin::$options['account']['marker'])){ ?>
                    <span class="TP-msgSend">
                        <?php _ex('By pressing the button "Save" you agree to send the plugin\'s activation data to Travelpayouts.',
                            "tp_admin_page_settings_paragraph_2", TPOPlUGIN_TEXTDOMAIN)?>
                    </span>
                    <?php } ?>
                    <input type="submit" name="submit" id="TPSaveSettings" class="TP-BtnTab"
                           value="<?php _ex('Save changes',
                               'tp_admin_page_settings_btn_save', TPOPlUGIN_TEXTDOMAIN ); ?>">
                </div>
            </form>
        </div>
    </div>
</div>
