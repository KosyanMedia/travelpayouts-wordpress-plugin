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
                    $tp_wh_url = 'https://www.travelpayouts.com/white_labels?utm_source=wp_plugin&utm_medium=settings&utm_campaign=ru&utm_content=link_wl';
                    break;
                case "en_US":
                    $tp_url = 'https://www.travelpayouts.com/?utm_source=wpplugin&utm_medium=settings&utm_campaign=en&utm_content=link';
                    $tp_dev_url = 'https://www.travelpayouts.com/developers/api?utm_source=wpplugin&utm_medium=settings&utm_campaign=en&utm_content=link_api';
                    $tp_wh_url = 'https://www.travelpayouts.com/white_labels?utm_source=wp_plugin&utm_medium=settings&utm_campaign=en&utm_content=link_wl';
                    break;
                default:
                    $tp_url = 'https://www.travelpayouts.com/?utm_source=wpplugin&utm_medium=settings&utm_campaign=en&utm_content=link';
                    $tp_dev_url = 'https://www.travelpayouts.com/developers/api?utm_source=wpplugin&utm_medium=settings&utm_campaign=en&utm_content=link_api';
                    $tp_wh_url = 'https://www.travelpayouts.com/white_labels?utm_source=wp_plugin&utm_medium=settings&utm_campaign=en&utm_content=link_wl';
                    break;
            } ?>
            <p>
                <?php printf(__('Please, enter your %s account data below. Please, register if you don’t have a Travelpayouts account. Check your Marker and Token at - %s  White Label - %s' , KPDPlUGIN_TEXTDOMAIN),
                    '<a href="'.$tp_url.'" target="_blank">
                        travelpayouts.com
                    </a>',
                    '<a href="'.$tp_dev_url.'" target="_blank">
                    travelpayouts.com/developers/api
                    </a>,',
                    '<a href="'.$tp_wh_url.'" target="_blank">
                        travelpayouts.com/white_labels
                    </a>');?>
            </p>
        </div>
        <nav class="TPNavigation">
            <ul class="TPMainMenu">
                <li>
                    <a href="#tabs-account" class="TPMainMenuA">
                        <span><?php _e('Account', KPDPlUGIN_TEXTDOMAIN); ?></span>
                    </a>
                </li>
                <li>
                    <a href="#tabs-config" class="TPMainMenuA">
                        <span><?php _e('Settings', KPDPlUGIN_TEXTDOMAIN); ?></span>
                    </a>
                </li>
                <li>
                    <a href="#tabs-localization" class="TPMainMenuA">
                        <span><?php _e('Localization', KPDPlUGIN_TEXTDOMAIN ); ?></span>
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
                            <?php _e('Account', KPDPlUGIN_TEXTDOMAIN ); ?>
                        </p>
                        <div class="TP-RowForm">
                            <?php do_settings_fields('tp_settings_account', 'tp_settings_account_id'); ?>
                        </div>
                    </div>
                    <div id="tabs-config">
                        <p class="TP-SettingTitle">
                            <?php _e('Settings', KPDPlUGIN_TEXTDOMAIN ); ?>
                        </p>
                        <div class="TP-RowForm">
                            <?php do_settings_fields('tp_settings_plugin_config', 'tp_settings_plugin_config_id'); ?>
                        </div>
                    </div>
                    <div id="tabs-localization">
                        <p class="TP-SettingTitle">
                            <?php _e('Localization', KPDPlUGIN_TEXTDOMAIN ); ?>
                        </p>
                        <?php do_settings_fields('tp_settings_local', 'tp_settings_local_id'); ?>
                    </div>
                </div>
                <div class="TP-navsPan">
                    <!--Кнопка может быть не активной: добавляйте класс disable для достижение такого состояние-->
                    <!--<button class="TP-BtnTab">сохранить изменения</button>-->
                    <input type="submit" name="submit" id="TPSaveSettings" class="TP-BtnTab"
                           value="<?php _e('Save changes', KPDPlUGIN_TEXTDOMAIN ); ?>">
                </div>
            </form>
        </div>
    </div>
</div>