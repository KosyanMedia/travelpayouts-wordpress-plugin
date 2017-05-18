<div class="TPWrapper TPWrapper-long">
    <div id="tabs-statistic">
        <p class="TPMainTitle">
            <?php _ex('tp_admin_page_statistics_paragraph_1',
                '(Statistics)', TPOPlUGIN_TEXTDOMAIN); ?>
        </p>
        <nav class="TPNavigation">
            <ul class="TPMainMenu">
                <li>
                    <a href="#tabs-report" class="TPMainMenuA">
                        <i class="icoItemNav ico-report"></i>
                        <span>
                            <?php _ex('tp_admin_page_statistics_tab_menu_report',
                                '(Earnings Report)', TPOPlUGIN_TEXTDOMAIN); ?>
                        </span>
                    </a>
                </li>
                <li>
                    <a href="#tabs-balance" class="TPMainMenuA">
                        <i class="icoItemNav ico-balance"></i>
                        <span>
                            <?php _ex('tp_admin_page_statistics_tab_menu_balance',
                                '(Balance and Payouts)', TPOPlUGIN_TEXTDOMAIN); ?>
                        </span>
                    </a>
                </li>
            </ul>
        </nav>
        <div id="tabs-report">
            <div class="TPmainContent TP-BalanceContent">
                <p class="TP-SettingTitle">
                    <?php _ex('tp_admin_page_statistics_tab_report_paragraph_1',
                        '(Earnings Report)', TPOPlUGIN_TEXTDOMAIN); ?>
                </p>
                <p class="infoLittleReport">
                    <?php _ex('tp_admin_page_statistics_tab_report_paragraph_2',
                        '(Your Earnings Report for )', TPOPlUGIN_TEXTDOMAIN); ?>
                    <span id="infoDateReport"><?php echo date_i18n( 'F Y', time() ); ?></span>
                </p>

                <div class="TP-ViewStatistics">
                    <label class="TP-ViewStatisticsDate">
                        <span>
                            <?php _ex('tp_admin_page_statistics_tab_report_select_month',
                                '(Select month )', TPOPlUGIN_TEXTDOMAIN); ?>
                        </span>
                        <?php
                        global $wp_locale;
                        $monthNames = array_map(array(&$wp_locale, 'get_month'), range(1, 12));
                        foreach($monthNames as $key=>$month){

                            @$output_month .= '<option value="'.$month.'" data-tpdate="'.date('Y').'-'.($key+1).'-'.date("t", strtotime(date('Y').'-'.($key+1).'-01')).'"
                                            '.selected( $month, date_i18n( 'F', time() ), false).'>
                                            '.$month.' '.date_i18n( 'Y', time() ).'</option>';
                            if($month == date_i18n( 'F', time() )) break;


                        }
                        ?>
                        <select class="TP-Zelect" id="TPStatDate">
                            <?php echo $output_month ?>
                        </select>
                    </label>
                    <button class="TP-BtnTab exportBtn btnBalance btnRep TPGetSalesDate">
                        <?php _ex('tp_admin_page_statistics_tab_report_btn_show',
                            '(show)', TPOPlUGIN_TEXTDOMAIN); ?>
                    </button>
                </div>
                <?php echo \app\includes\views\admin\menu\TPStatisticView::tableReport($this->model->detailed_sales); ?>
                <a download="TPListReport.xls" href="#"  class="TP-BtnTab exportBtn btnBalance"
                   onclick="return ExcellentExport.excel(this, 'TPListReport', '<?php _ex('tp_admin_page_statistics_tab_report_title_xls',
                       '(Report on income)', TPOPlUGIN_TEXTDOMAIN); ?>');">
                    <?php _ex('tp_admin_page_statistics_tab_report_btn_download_xls',
                        '(DOWNLOAD REPORT (XLS))', TPOPlUGIN_TEXTDOMAIN); ?>
                </a>
            </div>
        </div>
        <div id="tabs-balance">
            <div class="TPmainContent TP-BalanceContent">
                <p class="TP-SettingTitle">
                    <?php _ex('tp_admin_page_statistics_tab_balance_paragraph_1',
                        '(Balance and Payouts)', TPOPlUGIN_TEXTDOMAIN); ?>
                </p>
                <p class="TP-OurBalance">
                    <?php _ex('tp_admin_page_statistics_tab_balance_paragraph_2',
                        '(Balance)', TPOPlUGIN_TEXTDOMAIN); ?>: <span>
                            <?php echo $this->view->balanceLabel(); ?>
                        </span></p>
                <?php echo $this->view->tableBalance($this->model->payments); ?>
                <a download="TPListBalance.xls" href="#"  class="TP-BtnTab exportBtn btnBalance"
                   onclick="return ExcellentExport.excel(this, 'TPListBalance', '<?php _ex('tp_admin_page_statistics_tab_balance_title_xls',
                       '(Balance and payments)', TPOPlUGIN_TEXTDOMAIN); ?>');">
                    <?php _ex('tp_admin_page_statistics_tab_balance_btn_download_xls',
                        '(DOWNLOAD REPORT (XLS))', TPOPlUGIN_TEXTDOMAIN); ?>
                </a>
            </div>
        </div>
    </div>
</div>