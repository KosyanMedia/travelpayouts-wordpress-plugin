<form action="options.php" method="post">
    <?php settings_fields('TPSettingsWizard'); ?>
    <div class="TPmainContent TPmainContentWizard TP-SettingContent">
        <p class="titleSortable titleSortableR">
            <?php _e('Get your API Token and Partner Marker by following ', KPDPlUGIN_TEXTDOMAIN); ?>
            <a href="https://www.travelpayouts.com/developers/api?utm_source=wpplugin&utm_medium=welcome_page&utm_campaign=<?php echo $this->local; ?>" target="_blank">
                <?php _e('this link.', KPDPlUGIN_TEXTDOMAIN); ?>
            </a>
        </p>
        <?php do_settings_fields('tp_settings_wizard', 'tp_settings_wizard_id'); ?>
        <div class="TP-navsPan">
            <input type="submit" name="submit" id="TPSaveSettingsWizard" class="TP-BtnTab TP-BtnTabR"
                   value="<?php _e('Save changes', KPDPlUGIN_TEXTDOMAIN ); ?>">
        </div>
        <?php
            $pathView = KPDPlUGIN_DIR."/app/includes/views/admin/menu/TPWizardTabContent.view.php";
            $this->loadView($pathView, 1);
        ?>
    </div>

</form>