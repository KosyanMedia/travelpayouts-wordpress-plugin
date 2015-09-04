<p class="TP-deteiledIncome TP-deteiledIncomeR">
    <?php _e('New to Travelpayouts? Please, ', TPOPlUGIN_TEXTDOMAIN);?>
    <a href="http://www.travelpayouts.com/?marker=85103&locale=<?php echo $this->local; ?>&utm_source=wpplugin&utm_medium=welcome_page&utm_campaign=<?php echo $this->local; ?>" target="_blank">
        <?php _e('Register', TPOPlUGIN_TEXTDOMAIN); ?>
    </a>
</p>
<p class="TP-deteiledIncome">
    <?php _e('Registration is totally free and takes less than a minute.', TPOPlUGIN_TEXTDOMAIN); ?>
</p>
<p class="TP-deteiledIncome">
    <?php _e('Return to plugin settings to fill out your Profile.', TPOPlUGIN_TEXTDOMAIN); ?>
</p>

<div class="TP-navsPan">
    <!--Кнопка может быть не активной: добавляйте класс disable для достижение такого состояние-->
    <!--<button class="TP-BtnTab">сохранить изменения</button>-->
    <a href="http://www.travelpayouts.com/?marker=85103&locale=<?php echo $this->local; ?>&utm_source=wpplugin&utm_medium=welcome_page&utm_campaign=<?php echo $this->local; ?>&utm_content=button" class="TP-BtnTab TP-BtnTabR" target="_blank">
        <?php _e('1. Sign up ', TPOPlUGIN_TEXTDOMAIN); ?>
    </a>
</div>

<div class="TP-navsPan ">
    <!--Кнопка может быть не активной: добавляйте класс disable для достижение такого состояние-->
    <!--<button class="TP-BtnTab">сохранить изменения</button>-->
    <a class="TP-BtnTab TP-BtnTabR TP-BtnTabWizard " href="#">
        <?php _e('2. Enter settings ', TPOPlUGIN_TEXTDOMAIN); ?>
    </a>
</div>

<?php
    $pathView = TPOPlUGIN_DIR."/app/includes/views/admin/menu/TPWizardTabContent.view.php";
    $this->loadView($pathView, 1);
?>
