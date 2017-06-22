<div class="TPWrapper TPWrapperFlights">
	<p class="TPMainTitle">
		<?php _ex('Railways schedule',
			'admin page menu railway', TPOPlUGIN_TEXTDOMAIN); ?>
	</p>
    <div id="tabs-railway">
        <!--<nav class="TPNavigation">
            <ul class="TPMainMenu">
                <li>
                    <a href="#tabs-railway_config" class="TPMainMenuA">
                        <i class="icoItemNav ico-table"></i>
                        <span>
                            <?php /*_ex('Tables Content',
	                            'admin page railway tab menu railway config',
                                TPOPlUGIN_TEXTDOMAIN);*/ ?>
                        </span>
                    </a>
                </li>

                <li>
                    <a href="#tabs-railway_themes" class="TPMainMenuA">
                        <i class="icoItemNav ico-glass"></i>
                        <span>
                            <?php /*_ex('Themes',
	                            'admin page railway tab menu railway themes',
                                TPOPlUGIN_TEXTDOMAIN);*/ ?>
                        </span>
                    </a>
                </li>

            </ul>
        </nav>-->
        <div id="tabs-railway-help"
             class="<?php if(isset(\app\includes\TPPlugin::$options['railway']['active'])) echo 'tp-railway-layout-hidden';?>">
            <div class="TPmainContent TP-BalanceContent TPRailwayContent">
                <div class="TP-StyleItem">
                    <p>
                        <?php _ex('You need to activate ',
	                            'admin page railway tab railway help',
                                TPOPlUGIN_TEXTDOMAIN); ?>
                        <a href="https://www.travelpayouts.com/campaigns/45" target="_blank">
                            <?php _ex('Tutu.ru campaign ',
                                'admin page railway tab railway help',
                                TPOPlUGIN_TEXTDOMAIN); ?>
                        </a>
                        <?php _ex('at Travelpayouts.com beforehand. Links won\'t work without campaign activation. ',
                            'admin page railway tab railway help',
                            TPOPlUGIN_TEXTDOMAIN); ?>
                    </p>
                    <p>
                        <a href="https://www.travelpayouts.com/campaigns/45" target="_blank">
                            <?php _ex('Activate Tutu.ru campaign ',
                                'admin page railway tab railway help',
                                TPOPlUGIN_TEXTDOMAIN); ?>
                        </a>
                    </p>


                </div>
                <div class="TP-navsPan">
                    <a href="#" class="TP-BtnTab tp-help-railway-active">
                        <i></i>
                        <?php _ex('Tutu.ru campaign is activated. Let\'s go',
                            'admin page railway tab railway help',
                            TPOPlUGIN_TEXTDOMAIN); ?>
                    </a>
                </div>
            </div>

        </div>
        <div id="tabs-railway_config"
             class="<?php if(!isset(\app\includes\TPPlugin::$options['railway']['active'])) echo 'tp-railway-layout-hidden';?>">
	        <?php
	            $pathView = TPOPlUGIN_DIR."/app/includes/views/admin/menu/TPRailwayTabConfig.view.php";
	            $this->loadView($pathView, 0, $data);
	        ?>
        </div>
        <!--<div id="tabs-railway_themes">
	        <?php
	            //$pathView = TPOPlUGIN_DIR."/app/includes/views/admin/menu/TPRailwayTabThemes.view.php";
	            //$this->loadView($pathView, 0, $data);
	        ?>
        </div>-->
    </div>

</div>