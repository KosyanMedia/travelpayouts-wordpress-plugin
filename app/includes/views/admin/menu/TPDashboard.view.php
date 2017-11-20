<?php //error_log(print_r($this->model->detailed_sales,true));?>
<div class="TPWrapper TPWrapper-long TPWrapperDashboard" >
    <div class="TP-headIn">
        <div class="TP-logoTrav">

                <?php
                global $locale;
                switch($locale){
                    case "ru_RU":
                        ?>
                        <a href="https://www.travelpayouts.com/?utm_source=wpplugin&utm_medium=dashboard&utm_campaign=ru&utm_content=logo" target="_blank">
                            <img src="<?php echo TPOPlUGIN_URL?>app/public/images/tp-logo.png" alt=""/>
                        </a>
                        <?php
                        break;
                    case "en_US":
                        ?>
                        <a href="https://www.travelpayouts.com/?utm_source=wpplugin&utm_medium=dashboard&utm_campaign=en&utm_content=logo" target="_blank">
                            <img src="<?php echo TPOPlUGIN_URL?>app/public/images/tp-logo-eng.png" alt=""/>
                        </a>
                        <?php
                        break;
                    default:
                        ?>
                        <a href="https://www.travelpayouts.com/?utm_source=wpplugin&utm_medium=dashboard&utm_campaign=en&utm_content=logo" target="_blank">
                            <img src="<?php echo TPOPlUGIN_URL?>app/public/images/tp-logo-eng.png" alt=""/>
                        </a>
                        <?php
                        break;
                } ?>


        </div>
        <p class="TP-goToSite">
            <?php _ex('Go to',
                'tp_admin_page_dashboard_paragraph_1', TPOPlUGIN_TEXTDOMAIN); ?>
            <?php
            switch($locale) {
                case "ru_RU":
                    ?><a href="https://www.travelpayouts.com/?utm_source=wpplugin&utm_medium=dashboard&utm_campaign=ru&utm_content=link" target="_blank">Travelpayouts.com</a><?php
                    break;
                case "en_US":
                    ?><a href="https://www.travelpayouts.com/?utm_source=wpplugin&utm_medium=dashboard&utm_campaign=en&utm_content=link" target="_blank">Travelpayouts.com</a><?php
                    break;
                default:
                    ?><a href="https://www.travelpayouts.com/?utm_source=wpplugin&utm_medium=dashboard&utm_campaign=en&utm_content=link" target="_blank">Travelpayouts.com</a><?php
                    break;
            }
            ?>
        </p>
    </div>
    <div class="TPmainContent">
        <p class="TP-SettingTitle TP-DashboardTitle">Dashboard</p>

        <?php @$this->view->listIncome(); ?>

        <div class="TP-TabsTable">
            <div id="TP-tabs">
                <ul>
                    <li>
                        <a href="#tabs-1">
                            <?php  _ex('Today', 'tp_admin_page_dashboard_paragraph_3_list_li_1', TPOPlUGIN_TEXTDOMAIN ); ?>
                        </a>
                    </li>
                    <li>
                        <a href="#tabs-2">
                            <?php _ex('Yesterday', 'tp_admin_page_dashboard_paragraph_3_list_li_2', TPOPlUGIN_TEXTDOMAIN ); ?>
                        </a>
                    </li>
                    <li>
                        <a href="#tabs-3">
                            <?php _ex('This month', 'tp_admin_page_dashboard_paragraph_3_list_li_3', TPOPlUGIN_TEXTDOMAIN ); ?>
                        </a>
                    </li>
                    <li>
                        <a href="#tabs-4">
                            <?php _ex('Last month', 'tp_admin_page_dashboard_paragraph_3_list_li_4', TPOPlUGIN_TEXTDOMAIN ); ?>
                        </a>
                    </li>
                </ul>
                <?php
                    if($this->model->detailed_sales["current_month"]["sales"] != false){
                        $this->view->tpTabsDay(1, @$this->model->detailed_sales["current_month"]["sales"][date("Y-m-d")]);
                        $this->view->tpTabsDay(2, @$this->model->detailed_sales["current_month"]["sales"][date("Y-m-d", time() - 86400)]);
                        $this->view->tpTabsMonth(3, @$this->model->detailed_sales["current_month"]["sales"]);
                        $this->view->tpTabsMonth(4, @$this->model->detailed_sales["last_month"]["sales"]);
                    }

                ?>
            </div>
        </div>
        <p class="TP-deteiledIncome">
            <span>
                 <?php _ex('Last updated at',
                     'tp_admin_page_dashboard_paragraph_4_1', TPOPlUGIN_TEXTDOMAIN ); ?>
                <strong>
                    <?php echo date('H:i', $this->model->detailed_sales["time"]); ?>
                </strong>
                <?php _ex('(Local time)',
                    'tp_admin_page_dashboard_paragraph_4_2', TPOPlUGIN_TEXTDOMAIN ); ?>
            </span><br/>
            <?php printf(_x('Go to %s section to get a detailed report', 'tp_admin_page_dashboard_paragraph_4_3', TPOPlUGIN_TEXTDOMAIN ),
                _x('Statistics', 'tp_admin_page_dashboard_paragraph_4_4', TPOPlUGIN_TEXTDOMAIN )); ?>
        </p>

        <div class="TP-NewsSection">
            <?php
            switch($locale) {
                case "ru_RU":
                    ?>

                    <h2 class="TP-titleNews"><?php _ex('Travelpayouts News', 'tp_admin_page_dashboard_paragraph_5_1', TPOPlUGIN_TEXTDOMAIN ); ?></h2>
                            <a class="TP-allNewsLinck" href="http://blog.travelpayouts.com/?utm_source=wpplugin&utm_medium=dashboard&utm_campaign=ru" target="_blank">
                                <?php _ex('All news','tp_admin_page_dashboard_paragraph_5_2', TPOPlUGIN_TEXTDOMAIN ); ?>
                            </a>
                    <?php $this->view->tpGetNews(); ?>

                    <?php
                    break;
                case "en_US":
                    ?>

                    <h2 class="TP-titleNews"><?php _ex('Travelpayouts News','tp_admin_page_dashboard_paragraph_5_1', TPOPlUGIN_TEXTDOMAIN ); ?></h2>
                    <a class="TP-allNewsLinck" href="http://blog.travelpayouts.com/?utm_source=wpplugin&utm_medium=dashboard&utm_campaign=ru" target="_blank">
                        <?php _ex('All news','tp_admin_page_dashboard_paragraph_5_2', TPOPlUGIN_TEXTDOMAIN ); ?>
                    </a>
                    <?php $this->view->tpGetNewsEn(); ?>

                    <?php
                    break;
                default:
                    break;
            }
            ?>
        </div>

    </div>
</div>
