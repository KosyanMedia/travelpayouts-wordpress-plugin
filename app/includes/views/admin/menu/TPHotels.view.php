<div class="TPWrapper TPWrapperFlights">
    <p class="TPMainTitle">
        <?php _ex('Hotels',
            'tp_admin_page_hotels_paragraph_1', TPOPlUGIN_TEXTDOMAIN); ?>
    </p>
    <div id="tabs-hotels">
        <nav class="TPNavigation">
            <ul class="TPMainMenu">
                <li>
                    <a href="#tabs-hotels_config" class="TPMainMenuA">
                        <i class="icoItemNav ico-table"></i>
                        <span>
                            <?php _ex('Tables Content',
                                'tp_admin_page_flights_tab_menu_tickets_config', TPOPlUGIN_TEXTDOMAIN); ?>
                        </span>
                    </a>
                </li>

                <li>
                    <a href="#tabs-hotels_themes" class="TPMainMenuA">
                        <i class="icoItemNav ico-glass"></i>
                        <span>
                            <?php _ex('Themes',
                                'tp_admin_page_flights_tab_menu_tickets_themes', TPOPlUGIN_TEXTDOMAIN); ?>
                        </span>
                    </a>
                </li>

            </ul>
        </nav>
        <div id="tabs-hotels_config">
            <?php
                $pathView = TPOPlUGIN_DIR."/app/includes/views/admin/menu/TPHotelsTabConfigNew.view.php";
                $this->loadView($pathView, 0, $data);
            ?>
        </div>
        <div id="tabs-hotels_themes">
            <?php
                $pathView = TPOPlUGIN_DIR."/app/includes/views/admin/menu/TPHotelsTabThemes.view.php";
                $this->loadView($pathView, 0, $data);
            ?>
        </div>
    </div>

</div>