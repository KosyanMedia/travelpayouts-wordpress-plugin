<p class="TP-deteiledIncome TP-deteiledIncomeR">
    <?php _ex('New to Travelpayouts? Please,',
        'tp_admin_page_wizard_tab_menu_registration_paragraph_1', TPOPlUGIN_TEXTDOMAIN); ?>
    <a href="http://www.travelpayouts.com/?marker=85103&locale=<?php echo $this->local; ?>&utm_source=wpplugin&utm_medium=welcome_page&utm_campaign=<?php echo $this->local; ?>" target="_blank">
        <?php _ex('Register',
            'tp_admin_page_wizard_tab_menu_registration_paragraph_1_link_registration', TPOPlUGIN_TEXTDOMAIN); ?>
    </a>
</p>
<p class="TP-deteiledIncome">
    <?php _ex('Registration is totally free and takes less than a minute.',
        'tp_admin_page_wizard_tab_menu_registration_paragraph_2', TPOPlUGIN_TEXTDOMAIN); ?>
</p>
<p class="TP-deteiledIncome">
    <?php _ex('Return to plugin settings to fill out your Profile.',
        'tp_admin_page_wizard_tab_menu_registration_paragraph_3', TPOPlUGIN_TEXTDOMAIN); ?>
</p>

<div class="TP-navsPan">
    <!--Кнопка может быть не активной: добавляйте класс disable для достижение такого состояние-->
    <!--<button class="TP-BtnTab">сохранить изменения</button>-->
    <a href="http://www.travelpayouts.com/?marker=85103&locale=<?php echo $this->local; ?>&utm_source=wpplugin&utm_medium=welcome_page&utm_campaign=<?php echo $this->local; ?>&utm_content=button" class="TP-BtnTab TP-BtnTabR" target="_blank">
        <?php _ex('1. Sign up',
            'tp_admin_page_wizard_tab_menu_registration_link_sing_up', TPOPlUGIN_TEXTDOMAIN); ?>
    </a>
</div>

<div class="TP-navsPan ">
    <!--Кнопка может быть не активной: добавляйте класс disable для достижение такого состояние-->
    <!--<button class="TP-BtnTab">сохранить изменения</button>-->
    <a class="TP-BtnTab TP-BtnTabR TP-BtnTabWizard " href="#">
        <?php _ex('2. Enter settings',
            'tp_admin_page_wizard_tab_menu_registration_link_enter_settings', TPOPlUGIN_TEXTDOMAIN); ?>
    </a>
</div>

<?php
    $pathView = TPOPlUGIN_DIR."/app/includes/views/admin/menu/TPWizardTabContent.view.php";
    $this->loadView($pathView, 1);
?>
