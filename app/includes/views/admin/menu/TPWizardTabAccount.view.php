<form action="options.php" method="post" class="formSettings TPFormNotReload">
    <?php settings_fields('TPWizard'); ?>
    <div class="TPmainContent TPmainContentWizard TP-SettingContent">
        <p class="titleSortable titleSortableR">
            <?php _ex('Get your API Token and Partner Marker by following',
                'tp_admin_page_wizard_tab_menu_account_paragraph_1', TPOPlUGIN_TEXTDOMAIN); ?>
            <a href="https://www.travelpayouts.com/developers/api?utm_source=wpplugin&utm_medium=welcome_page&utm_campaign=<?php echo $this->local; ?>" target="_blank">
                <?php _ex('this link.',
                    'tp_admin_page_wizard_tab_menu_account_paragraph_1_link_tp', TPOPlUGIN_TEXTDOMAIN); ?>
            </a>
        </p>
        <?php do_settings_fields('tp_settings_wizard', 'tp_settings_wizard_id'); ?>
        <div class="TP-navsPan">
            <?php if(empty(\app\includes\TPPlugin::$options['account']['marker'])){ ?>
                <span class="TP-msgSend">
                        <?php _ex('By pressing the button "Save" you agree to send the plugin\'s activation data to Travelpayouts.',
                            'tp_admin_page_wizard_tab_menu_account_paragraph_2', TPOPlUGIN_TEXTDOMAIN); ?>
                    </span>
            <?php } ?>
            <input type="submit" name="submit" id="TPSaveSettingsWizard" class="TP-BtnTab TP-BtnTabR"
                   value="<?php _ex('Save changes',
                       'tp_admin_page_wizard_tab_menu_account_btn_save', TPOPlUGIN_TEXTDOMAIN); ?>">
        </div>
        <?php
            $pathView = TPOPlUGIN_DIR."/app/includes/views/admin/menu/TPWizardTabContent.view.php";
            $this->loadView($pathView, 1);
        ?>
    </div>

</form>