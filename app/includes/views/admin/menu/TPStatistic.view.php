<div class="TPWrapper TPWrapper-long">
    <div id="tabs-statistic">
        <p class="TPMainTitle"><?php _e('Statistic', KPDPlUGIN_TEXTDOMAIN ); ?></p>
        <nav class="TPNavigation">
            <ul class="TPMainMenu">
                <li class="TPNavActive">
                    <a href="#tabs-report" class="TPMainMenuA">
                        <i class="icoItemNav ico-report"></i>
                        <span><?php _e('Sales Report', KPDPlUGIN_TEXTDOMAIN ); ?></span>
                    </a>
                </li>
                <li>
                    <a href="#tabs-balance" class="TPMainMenuA">
                        <i class="icoItemNav ico-balance"></i>
                        <span><?php _e('Balance and payments', KPDPlUGIN_TEXTDOMAIN ); ?></span>
                    </a>
                </li>
            </ul>
        </nav>
        <div id="tabs-report">
            <div class="TPmainContent TP-BalanceContent">
                <p class="TP-SettingTitle"><?php _e('Sales Report', KPDPlUGIN_TEXTDOMAIN ); ?></p>
                <p class="infoLittleReport">
                    <?php _e('Show report for your account -', KPDPlUGIN_TEXTDOMAIN ); ?>
                    <span id="infoDateReport"><?php echo date_i18n( 'F Y', time() ); ?></span>
                </p>

                <div class="TP-ViewStatistics">
                    <label class="TP-ViewStatisticsDate">
                        <span><?php _e('Select other month', KPDPlUGIN_TEXTDOMAIN ); ?></span>
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
                        <?php _e('show', KPDPlUGIN_TEXTDOMAIN ); ?>
                    </button>
                </div>
                <?php //echo $this->TPReturnOutput->tpReturnOutputReportStats($this->TPStatsData["detailed_sales"]); ?>
                <a download="TPListReport.xls" href="#"  class="TP-BtnTab exportBtn btnBalance"
                   onclick="return ExcellentExport.excel(this, 'TPListReport', '<?php _e('Report on income', KPDPlUGIN_TEXTDOMAIN ); ?>');">
                    <?php _e('download report in table', KPDPlUGIN_TEXTDOMAIN ); ?>
                </a>
            </div>
        </div>
        <div id="tabs-balance">
            <div class="TPmainContent TP-BalanceContent">
                <p class="TP-SettingTitle"><?php _e('Balance and payments', KPDPlUGIN_TEXTDOMAIN ); ?></p>
                <p class="TP-OurBalance"><?php _e('Your balance', KPDPlUGIN_TEXTDOMAIN ); ?>: <span>
                            <?php //echo $this->TPStatsData["balance"]["data"]["balance"]." "
                                //.$this->TPReturnOutput->getCurrencyView($this->TPStatsData["balance"]["data"]["currency"]);?>
                        </span></p>
                <?php //echo $this->TPReturnOutput->tpReturnOutputListBalanceStats($this->TPStatsData["payments"]); ?>
                <a download="TPListBalance.xls" href="#"  class="TP-BtnTab exportBtn btnBalance"
                   onclick="return ExcellentExport.excel(this, 'TPListBalance', '<?php _e('Balance and payments', KPDPlUGIN_TEXTDOMAIN ); ?>');">
                    <?php _e('download report in table', KPDPlUGIN_TEXTDOMAIN ); ?>
                </a>
            </div>
        </div>
    </div>
</div>