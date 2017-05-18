<form action="options.php" method="post" class="formSettings TPFormNotReload">
    <?php settings_fields('TPWizard'); ?>
    <div class="TPmainContent TPmainContentWizard TP-SettingContent">
        <p class="titleSortable titleSortableR">
            <?php _ex('tp_admin_page_wizard_tab_menu_account_paragraph_1',
                'admin page wizard tab menu account paragraph_1', TPOPlUGIN_TEXTDOMAIN); ?>
            <a href="https://www.travelpayouts.com/developers/api?utm_source=wpplugin&utm_medium=welcome_page&utm_campaign=<?php echo $this->local; ?>" target="_blank">
                <?php _ex('tp_admin_page_wizard_tab_menu_account_paragraph_1_link_tp',
                    'admin page wizard tab menu account paragraph_1 link tp', TPOPlUGIN_TEXTDOMAIN); ?>
            </a>
        </p>
        <?php do_settings_fields('tp_settings_wizard', 'tp_settings_wizard_id'); ?>
        <div class="TP-navsPan">
            <?php if(empty(\app\includes\TPPlugin::$options['account']['marker'])){ ?>
                <span class="TP-msgSend">
                        <?php _ex('tp_admin_page_wizard_tab_menu_account_paragraph_2',
                            'admin page wizard tab menu account paragraph_2', TPOPlUGIN_TEXTDOMAIN); ?>
                    </span>
            <?php } ?>
            <input type="submit" name="submit" id="TPSaveSettingsWizard" class="TP-BtnTab TP-BtnTabR"
                   value="<?php _ex('tp_admin_page_wizard_tab_menu_account_btn_save',
                       'admin page wizard tab menu account btn_save', TPOPlUGIN_TEXTDOMAIN); ?>">
        </div>
        <?php
            $pathView = TPOPlUGIN_DIR."/app/includes/views/admin/menu/TPWizardTabContent.view.php";
            $this->loadView($pathView, 1);
        ?>
    </div>

</form>