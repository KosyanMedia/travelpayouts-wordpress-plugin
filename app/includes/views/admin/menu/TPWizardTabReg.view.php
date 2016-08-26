<p class="TP-deteiledIncome TP-deteiledIncomeR">
    <?php _ex('tp_admin_page_wizard_tab_menu_registration_paragraph_1',
        'admin page wizard tab menu registration paragraph_1', TPOPlUGIN_TEXTDOMAIN); ?>
    <a href="http://www.travelpayouts.com/?marker=85103&locale=<?php echo $this->local; ?>&utm_source=wpplugin&utm_medium=welcome_page&utm_campaign=<?php echo $this->local; ?>" target="_blank">
        <?php _ex('tp_admin_page_wizard_tab_menu_registration_paragraph_1_link_registration',
            'admin page wizard tab menu registration paragraph_1 link registration', TPOPlUGIN_TEXTDOMAIN); ?>
    </a>
</p>
<p class="TP-deteiledIncome">
    <?php _ex('tp_admin_page_wizard_tab_menu_registration_paragraph_2',
        'admin page wizard tab menu registration paragraph_2', TPOPlUGIN_TEXTDOMAIN); ?>
</p>
<p class="TP-deteiledIncome">
    <?php _ex('tp_admin_page_wizard_tab_menu_registration_paragraph_3',
        'admin page wizard tab menu registration paragraph_3', TPOPlUGIN_TEXTDOMAIN); ?>
</p>

<div class="TP-navsPan">
    <!--Кнопка может быть не активной: добавляйте класс disable для достижение такого состояние-->
    <!--<button class="TP-BtnTab">сохранить изменения</button>-->
    <a href="http://www.travelpayouts.com/?marker=85103&locale=<?php echo $this->local; ?>&utm_source=wpplugin&utm_medium=welcome_page&utm_campaign=<?php echo $this->local; ?>&utm_content=button" class="TP-BtnTab TP-BtnTabR" target="_blank">
        <?php _ex('tp_admin_page_wizard_tab_menu_registration_link_sing_up',
            'admin page wizard tab menu registration link sing up', TPOPlUGIN_TEXTDOMAIN); ?>
    </a>
</div>

<div class="TP-navsPan ">
    <!--Кнопка может быть не активной: добавляйте класс disable для достижение такого состояние-->
    <!--<button class="TP-BtnTab">сохранить изменения</button>-->
    <a class="TP-BtnTab TP-BtnTabR TP-BtnTabWizard " href="#">
        <?php _ex('tp_admin_page_wizard_tab_menu_registration_link_enter_settings',
            'admin page wizard tab menu registration link enter settings', TPOPlUGIN_TEXTDOMAIN); ?>
    </a>
</div>

<?php
    $pathView = TPOPlUGIN_DIR."/app/includes/views/admin/menu/TPWizardTabContent.view.php";
    $this->loadView($pathView, 1);
?>
