<?php //error_log(print_r($this->model->detailed_sales,true));?>
<div class="TPWrapper TPWrapper-long TPWrapperDashboard" >
    <div class="TP-headIn">
        <div class="TP-logoTrav">
            <a href="https://www.travelpayouts.com" target="_blank">
                <img src="<?php echo KPDPlUGIN_URL?>app/public/images/logo.png" alt=""/>
            </a>
        </div>
        <p class="TP-goToSite"><?php _e('Go to ', KPDPlUGIN_TEXTDOMAIN)?>
            <a href="https://www.travelpayouts.com/?utm_source=wp_plugin&utm_medium=dashboard" target="_blank">Travelpayouts.com</a>
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
                <?php $this->view->tpTabsDay(1, $this->model->detailed_sales["current_month"]["sales"][date("Y-m-d")]); ?>
                <?php $this->view->tpTabsDay(2, $this->model->detailed_sales["current_month"]["sales"][date("Y-m-d", time() - 86400)]); ?>
                <?php $this->view->tpTabsMonth(3, $this->model->detailed_sales["current_month"]["sales"]); ?>
                <?php $this->view->tpTabsMonth(4, $this->model->detailed_sales["last_month"]["sales"]); ?>
            </div>
        </div>
        <p class="TP-deteiledIncome">
            <span>
                <?php _e('Data updated at ', KPDPlUGIN_TEXTDOMAIN ); ?>
                <strong><?php echo date('H:i:s', $this->model->detailed_sales["time"]); ?></strong>
                <?php _e(' by local time.', KPDPlUGIN_TEXTDOMAIN ); ?>
            </span><br/>
            <?php _e('A detailed report on payments can be found in the section ', KPDPlUGIN_TEXTDOMAIN ); ?>
            <a href="admin.php?page=tp_control_stats"><?php _e('Statistics', KPDPlUGIN_TEXTDOMAIN ); ?></a>
        </p>

        <div class="TP-NewsSection">
            <h2 class="TP-titleNews"><?php _e('News from Travelpayouts', KPDPlUGIN_TEXTDOMAIN ); ?></h2>
            <a class="TP-allNewsLinck" href="http://blog.travelpayouts.com/?utm_source=wp_plugin&utm_medium=dashboard" target="_blank">
                <?php _e('All news', KPDPlUGIN_TEXTDOMAIN ); ?>
            </a>
            <?php $this->view->tpGetNews(); ?>
        </div>
    </div>
</div>
