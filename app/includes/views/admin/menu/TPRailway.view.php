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
             class="<?php if(\app\includes\TPPlugin::$options['railway']['active'] == 1) echo 'tp-railway-layout-hidden';?>">
	        <?php
	        $pathView = TPOPlUGIN_DIR."/app/includes/views/admin/menu/TPRailwayTabHelp.view.php";
	        $this->loadView($pathView, 0, $data);
	        ?>

        </div>
        <div id="tabs-railway_config"
             class="<?php if(\app\includes\TPPlugin::$options['railway']['active'] == 0) echo 'tp-railway-layout-hidden';?>">
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