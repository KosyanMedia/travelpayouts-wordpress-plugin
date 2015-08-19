<div class="TPWrapper">
    <div id="tabs-wizard">
        <p class="TP-SettingTitle TP-DashboardTitle">
            <?php _e('Earn by selling tourist services', KPDPlUGIN_TEXTDOMAIN); ?>
        </p>
        <p class="TP-titleNews TP-titleNewsR">
            <?php _e('Install our convenient and useful tools to your website and help your visitors to find the cheapest flights and hotels. Earn on commission for each booking.', KPDPlUGIN_TEXTDOMAIN); ?>
        </p>

        <nav class="TPNavigation">
            <ul class="TPMainMenu">
                <li>
                    <a href="#tabs-waccount" class="TPMainMenuA">
                        <span><?php _e('I have Travelpayouts account', KPDPlUGIN_TEXTDOMAIN); ?></span>
                    </a>
                </li>
                <li >
                    <a href="#tabs-wreg" class="TPMainMenuA">
                        <span><?php _e('New to Travelpayouts?', KPDPlUGIN_TEXTDOMAIN); ?></span>
                    </a>
                </li>
            </ul>
        </nav>
        <div class="TP-SettingContent">

            <div id="tabs-waccount">
                <?php
                    $pathView = KPDPlUGIN_DIR."/app/includes/views/admin/menu/TPWizardTabAccount.view.php";
                    $this->loadView($pathView);
                ?>
            </div>

            <div id="tabs-wreg">
                <div class="TPmainContent">
                <?php
                    $pathView = KPDPlUGIN_DIR."/app/includes/views/admin/menu/TPWizardTabReg.view.php";
                    $this->loadView($pathView);
                ?>
                </div>
            </div>

        </div>
    </div>

</div>