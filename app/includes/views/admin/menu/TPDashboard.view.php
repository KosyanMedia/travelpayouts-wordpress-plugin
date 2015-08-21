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
                            <img src="<?php echo KPDPlUGIN_URL?>app/public/images/tp-logo.png" alt=""/>
                        </a>
                        <?php
                        break;
                    case "en_US":
                        ?>
                        <a href="https://www.travelpayouts.com/?utm_source=wpplugin&utm_medium=dashboard&utm_campaign=en&utm_content=logo" target="_blank">
                            <img src="<?php echo KPDPlUGIN_URL?>app/public/images/tp-logo-eng.png" alt=""/>
                        </a>
                        <?php
                        break;
                    default:
                        ?>
                        <a href="https://www.travelpayouts.com/?utm_source=wpplugin&utm_medium=dashboard&utm_campaign=en&utm_content=logo" target="_blank">
                            <img src="<?php echo KPDPlUGIN_URL?>app/public/images/tp-logo-eng.png" alt=""/>
                        </a>
                        <?php
                        break;
                } ?>


        </div>
        <p class="TP-goToSite"><?php _e('Go to ', KPDPlUGIN_TEXTDOMAIN)?>
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

        <?php $this->view->listIncome(); ?>

        <div class="TP-TabsTable">
            <div id="TP-tabs">
                <ul>
                    <li><a href="#tabs-1"><?php _e('Today', KPDPlUGIN_TEXTDOMAIN ); ?></a></li>
                    <li><a href="#tabs-2"><?php _e('Yesterday', KPDPlUGIN_TEXTDOMAIN ); ?></a></li>
                    <li><a href="#tabs-3"><?php _e('This month', KPDPlUGIN_TEXTDOMAIN ); ?></a></li>
                    <li><a href="#tabs-4"><?php _e('Last month', KPDPlUGIN_TEXTDOMAIN ); ?></a></li>
                </ul>
                <?php
                    if($this->model->detailed_sales["current_month"]["sales"] != false){
                        $this->view->tpTabsDay(1, $this->model->detailed_sales["current_month"]["sales"][date("Y-m-d")]);
                        $this->view->tpTabsDay(2, $this->model->detailed_sales["current_month"]["sales"][date("Y-m-d", time() - 86400)]);
                        $this->view->tpTabsMonth(3, $this->model->detailed_sales["current_month"]["sales"]);
                        $this->view->tpTabsMonth(4, $this->model->detailed_sales["last_month"]["sales"]);
                    }

                ?>
            </div>
        </div>
        <p class="TP-deteiledIncome">
            <span>
                <?php _e('Last updated at ', KPDPlUGIN_TEXTDOMAIN ); ?>
                <strong><?php echo date('H:i', $this->model->detailed_sales["time"]); ?></strong>
                <?php _e(' (Local time)', KPDPlUGIN_TEXTDOMAIN ); ?>
            </span><br/>
            <?php printf(__('Go to %s section to get a detailed report', KPDPlUGIN_TEXTDOMAIN ), '<a href="admin.php?page=tp_control_stats">'.__('Statistics', KPDPlUGIN_TEXTDOMAIN ).'</a>'); ?>
        </p>

        <div class="TP-NewsSection">
            <?php
            switch($locale) {
                case "ru_RU":
                    ?>

                    <h2 class="TP-titleNews"><?php _e('Travelpayouts News', KPDPlUGIN_TEXTDOMAIN ); ?></h2>
                            <a class="TP-allNewsLinck" href="http://blog.travelpayouts.com/?utm_source=wpplugin&utm_medium=dashboard&utm_campaign=ru" target="_blank">
                                <?php _e('All news', KPDPlUGIN_TEXTDOMAIN ); ?>
                            </a>
                    <?php $this->view->tpGetNews(); ?>

                    <?php
                    break;
                case "en_US":
                    break;
                default:
                    break;
            }
            ?>
        </div>

    </div>
</div>
