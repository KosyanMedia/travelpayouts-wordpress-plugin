<div class="TPWrapper TPWrapper-long">
    <div id="tabs-statistic">
        <p class="TPMainTitle">
            <?php _ex('Statistics',
                'tp_admin_page_statistics_paragraph_1', TPOPlUGIN_TEXTDOMAIN); ?>
        </p>
        <nav class="TPNavigation">
            <ul class="TPMainMenu">
                <li>
                    <a href="#tabs-report" class="TPMainMenuA">
                        <i class="icoItemNav ico-report"></i>
                        <span>
                            <?php _ex('Earnings Report',
                                'tp_admin_page_statistics_tab_menu_report', TPOPlUGIN_TEXTDOMAIN); ?>
                        </span>
                    </a>
                </li>
                <li>
                    <a href="#tabs-balance" class="TPMainMenuA">
                        <i class="icoItemNav ico-balance"></i>
                        <span>
                            <?php _ex('Balance and Payouts',
                                'tp_admin_page_statistics_tab_menu_balance', TPOPlUGIN_TEXTDOMAIN); ?>
                        </span>
                    </a>
                </li>
            </ul>
        </nav>
        <div id="tabs-report">
            <div class="TPmainContent TP-BalanceContent">
                <p class="TP-SettingTitle">
                    <?php _ex('Earnings Report',
                        'tp_admin_page_statistics_tab_report_paragraph_1', TPOPlUGIN_TEXTDOMAIN); ?>
                </p>
                <p class="infoLittleReport">
                    <?php _ex('Your Earnings Report for',
                        'tp_admin_page_statistics_tab_report_paragraph_2', TPOPlUGIN_TEXTDOMAIN); ?>
                    <span id="infoDateReport"><?php echo date_i18n( 'F Y', time() ); ?></span>
                </p>

                <div class="TP-ViewStatistics">
                    <label class="TP-ViewStatisticsDate">
                        <span>
                            <?php _ex('Select month',
                                'tp_admin_page_statistics_tab_report_select_month', TPOPlUGIN_TEXTDOMAIN); ?>
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
                        <?php _ex('show',
                            'tp_admin_page_statistics_tab_report_btn_show', TPOPlUGIN_TEXTDOMAIN); ?>
                    </button>
                </div>
                <?php echo \app\includes\views\admin\menu\TPStatisticView::tableReport($this->model->detailed_sales); ?>
                <a download="TPListReport.xls" href="#"  class="TP-BtnTab exportBtn btnBalance"
                   onclick="return ExcellentExport.excel(this, 'TPListReport', '<?php _ex('Report on income',
                       'tp_admin_page_statistics_tab_report_title_xls', TPOPlUGIN_TEXTDOMAIN); ?>');">
                    <?php _ex('DOWNLOAD REPORT (XLS)',
                        'tp_admin_page_statistics_tab_report_btn_download_xls', TPOPlUGIN_TEXTDOMAIN); ?>
                </a>
            </div>
        </div>
        <div id="tabs-balance">
            <div class="TPmainContent TP-BalanceContent">
                <p class="TP-SettingTitle">
                    <?php _ex('Balance and Payouts',
                        'tp_admin_page_statistics_tab_balance_paragraph_1', TPOPlUGIN_TEXTDOMAIN); ?>
                </p>
                <p class="TP-OurBalance">
                    <?php _ex('Balance',
                        'tp_admin_page_statistics_tab_balance_paragraph_2', TPOPlUGIN_TEXTDOMAIN); ?>: <span>
                            <?php echo $this->view->balanceLabel(); ?>
                        </span></p>
                <?php echo $this->view->tableBalance($this->model->payments); ?>
                <a download="TPListBalance.xls" href="#"  class="TP-BtnTab exportBtn btnBalance"
                   onclick="return ExcellentExport.excel(this, 'TPListBalance', '<?php _ex('Balance and payments',
                       'tp_admin_page_statistics_tab_balance_title_xls', TPOPlUGIN_TEXTDOMAIN); ?>');">
                    <?php _ex('DOWNLOAD REPORT (XLS)',
                        'tp_admin_page_statistics_tab_balance_btn_download_xls', TPOPlUGIN_TEXTDOMAIN); ?>
                </a>
            </div>
        </div>
    </div>
</div>