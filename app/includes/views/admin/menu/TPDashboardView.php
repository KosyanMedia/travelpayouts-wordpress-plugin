<?php
/**
 * Created by PhpStorm.
 * User: freeman
 * Date: 10.08.15
 * Time: 17:54
 */
namespace app\includes\views\admin\menu;
class TPDashboardView extends \app\includes\views\admin\TPView{
    public $model;
    public function __construct($model)
    {
        // TODO: Implement __construct() method.
        $this->model = $model;
    }
    public function listIncome(){
        $output = '';
        if($this->model->detailed_sales["current_month"]["sales"] != false) {
            $output = '<div class="TP-incomeSection">
                <div class="TP-ourIncome">
                    <p class="TP-titleIncome">'
                . _x('Your income', 'tp_admin_page_dashboard_paragraph_2', TPOPlUGIN_TEXTDOMAIN)
                . ':</p>
                    <div class="listIncome">
                        <div class="itemIncome">
                            <p>' . $this->tpGetDay($this->model->detailed_sales["current_month"]["sales"][date("Y-m-d")])
                . $this->getCurrencyView($this->model->balance["data"]["currency"]) . '</p>
                            <span>' . _x('today', 'tp_admin_page_dashboard_paragraph_2_today', TPOPlUGIN_TEXTDOMAIN) . '</span>
                        </div>
                        <div class="itemIncome">
                            <p>' . $this->tpGetDay($this->model->detailed_sales["current_month"]["sales"][date("Y-m-d", time() - 86400)])
                . $this->getCurrencyView($this->model->balance["data"]["currency"]) . '</p>
                            <span>' . _x('yesterday', 'tp_admin_page_dashboard_paragraph_2_yesterday', TPOPlUGIN_TEXTDOMAIN) . '</span>
                        </div>
                        <div class="itemIncome">
                            <p>' . $this->tpGetMonth($this->model->detailed_sales["current_month"]["sales"])
                . $this->getCurrencyView($this->model->balance["data"]["currency"]) . '</p>
                            <span>' . _x('this month', 'tp_admin_page_dashboard_paragraph_2_this_month', TPOPlUGIN_TEXTDOMAIN) . '</span>
                        </div>
                        <div class="itemIncome">
                            <p>' . $this->tpGetMonth($this->model->detailed_sales["last_month"]["sales"])
                . $this->getCurrencyView($this->model->balance["data"]["currency"]) . '</p>
                            <span>' .  _x('last month', 'tp_admin_page_dashboard_paragraph_2_last_month', TPOPlUGIN_TEXTDOMAIN) . '</span>
                        </div>
                        <div class="itemIncome">
                            <p>' . $this->model->balance["data"]["balance"]
                . $this->getCurrencyView($this->model->balance["data"]["currency"]) . '</p>
                            <span>' . _x('unpaid earnings', 'tp_admin_page_dashboard_paragraph_2_unpaid_earnings', TPOPlUGIN_TEXTDOMAIN) . '</span>
                        </div>
                    </div>
                </div>

            </div>';
        }
        echo $output;
    }

    /**
     * @param $day
     * @return int
     */
    public function tpGetDay($day){
        $TPDay = 0;
        if(!empty($day)){
            foreach($day as $key=>$sales){
                foreach($sales as $value){
                    $TPDay += $value["paid_clicks_profit"];
                    $TPDay += $value["paid_bookings_profit"];
                }
            }
        }

        return round($TPDay, 2);
    }

    /**
     * @param $month
     * @return int
     */
    public function tpGetMonth($month){
        $TPMonth = 0;
        foreach($month as $key=>$sales){
            foreach($sales as $date){
                foreach($date as $value){
                    $TPMonth += $value["paid_clicks_profit"];
                    $TPMonth += $value["paid_bookings_profit"];
                }
            }
        }
        return round($TPMonth, 2);
    }

    public function tpGetNews(){
        $output = '';
        $output .= '<ul class="TP-ListNewsMin">';
        if(!empty($this->model->rss["data"]["item"])) {
            foreach ($this->model->rss["data"]["item"] as $tpNews) {
                $output .= '<li>
                    <div class="TP-NewsDate">
                        <p>' . date('d.m', strtotime($tpNews["pubDate"])) . '</p>
                        <span>' . date('Y', strtotime($tpNews["pubDate"])) . '</span>
                    </div>
                    <div class="TP-NewsContentMin">
                        ' . $this->tpDashboardNewsLink($tpNews["title"], $tpNews["link"]) . '
                        <p>

                        </p>
                    </div>
                </li>';
            }
        }
        //strip_tags($tpNews["description"]);
        $output .= '</ul>';
        echo $output;
    }
    public function tpGetNewsEn(){
        $output = '';
        $output .= '<ul class="TP-ListNewsMin">';
        if(!empty($this->model->rssEn["data"]["item"])) {
            foreach ($this->model->rssEn["data"]["item"] as $tpNews) {
                $output .= '<li>
                    <div class="TP-NewsDate">
                        <p>' . date('d.m', strtotime($tpNews["pubDate"])) . '</p>
                        <span>' . date('Y', strtotime($tpNews["pubDate"])) . '</span>
                    </div>
                    <div class="TP-NewsContentMin">
                        ' . $this->tpDashboardNewsLink($tpNews["title"], $tpNews["link"]) . '
                        <p>

                        </p>
                    </div>
                </li>';
            }
        }
        //strip_tags($tpNews["description"]);
        $output .= '</ul>';
        echo $output;
    }
    /**
     * @param string $title
     * @param string $link
     * @return string
     */
    public function tpDashboardNewsLink($title = "", $link =""){
        $target_url = '';
        if(isset(\app\includes\TPPlugin::$options['config']['target_url'])) $target_url ='target="_blank"';
        return '<a href="'.$link.'?utm_source=wp_plugin" '.$target_url.'>'.$title.'</a>';
    }

    /**
    * @param $tabs
    * @param array $data
    */
    public function tpTabsDay($tabs, $data = array()){
        $rows = array();
        if(!empty($data)) {
            foreach ($data as $key => $sales) {
                foreach ($sales as $key_v => $value) {
                    //error_log($key_v.'_'.print_r($value, true));
                    @$rows[$key_v]["visitors"] += $value["visitors"];
                    @$rows[$key_v]["searches"] += $value["searches"];
                    @$rows[$key_v]["clicks"] += $value["clicks"];
                    @$rows[$key_v]["paid_clicks"] += $value["paid_clicks"];
                    @$rows[$key_v]["paid_clicks_profit"] += $value["paid_clicks_profit"];
                    @$rows[$key_v]["bookings"] += $value["bookings"];
                    @$rows[$key_v]["paid_bookings"] += $value["paid_bookings"];
                    @$rows[$key_v]["paid_bookings_profit"] += $value["paid_bookings_profit"];
                    @$rows[$key_v]["pending_bookings_profit"] += $value["pending_bookings_profit"];
                }
                //error_log(print_r($sales, true));
            }
        }
        //error_log(print_r($rows, true));
        ?>
        <div id="tabs-<?php echo $tabs; ?>">
            <table class="TP-ListBalance TP-ListReport">
                <thead>
                <tr>
                    <td></td>
                    <td><?php  _ex('Visit.', 'tp_admin_page_dashboard_table_td_1_label', TPOPlUGIN_TEXTDOMAIN ); ?></td>
                    <td><?php _ex('Search', 'tp_admin_page_dashboard_table_td_2_label', TPOPlUGIN_TEXTDOMAIN ); ?></td>
                    <td><?php _ex('Clicks', 'tp_admin_page_dashboard_table_td_3_label', TPOPlUGIN_TEXTDOMAIN ); ?></td>
                    <!--<td><?php //_e('Paid clicks', TPOPlUGIN_TEXTDOMAIN ); ?></td>-->
                    <td><?php _ex('Clicks income', 'tp_admin_page_dashboard_table_td_4_label', TPOPlUGIN_TEXTDOMAIN ); ?></td>
                    <td><?php _ex('Bookings', 'tp_admin_page_dashboard_table_td_5_label', TPOPlUGIN_TEXTDOMAIN ); ?></td>
                    <td><?php _ex('Paid booking', 'tp_admin_page_dashboard_table_td_6_label', TPOPlUGIN_TEXTDOMAIN ); ?></td>
                    <td><?php _ex('Booking income', 'tp_admin_page_dashboard_table_td_7_label', TPOPlUGIN_TEXTDOMAIN ); ?></td>
                    <td><?php _ex('Possible. income', 'tp_admin_page_dashboard_table_td_8_label', TPOPlUGIN_TEXTDOMAIN ); ?></td>
                    <td>CTR</td>
                    <td>CPC</td>
                    <td>STR</td>
                    <td>CPU</td>
                </tr>
                </thead>
                <tbody>
                <?php
                if(!empty($rows)) {
                    $output = '';
                    foreach ($rows as $key_row => $row) {
                        $output .= '<tr>';
                        switch ($key_row) {
                            case "flights":
                                $output .= '<td>' . _x('Flights',
                                        'tp_admin_page_dashboard_table_td_flights', TPOPlUGIN_TEXTDOMAIN) . '</td>';
                                break;
                            case "hotels":
                                $output .= '<td>' . _x('Hotels',
                                        'tp_admin_page_dashboard_table_td_hotels', TPOPlUGIN_TEXTDOMAIN) . '</td>';
                                break;
                        }
                        $output .= '<td>' . round($row["visitors"],2) . '</td>';
                        $output .= '<td>' . round($row["searches"],2) . '</td>';
                        $output .= '<td>' . round($row["clicks"],2) . '</td>';
                        //$output .= '<td>' . $row["paid_clicks"] . '</td>';
                        $output .= '<td>' . round($row["paid_clicks_profit"],2) . '</td>';
                        $output .= '<td>' . round($row["bookings"],2) . '</td>';
                        $output .= '<td>' . round($row["paid_bookings"],2) . '</td>';
                        $output .= '<td>' . round($row["paid_bookings_profit"], 2) . '</td>';
                        $output .= '<td>' . round($row["pending_bookings_profit"], 2) . '</td>';
                        $output .= '<td>' . @round(($row["clicks"] / $row["searches"])*100, 2) . '</td>';
                        $output .= '<td>' . @round(($row["paid_clicks_profit"] + $row["paid_bookings_profit"]) / $row["clicks"], 2) . '</td>';
                        $output .= '<td>' . @round(($row["bookings"]*100)/$row["clicks"], 2) . '</td>';
                        $output .= '<td>' . @round(($row["paid_clicks_profit"] + $row["paid_bookings_profit"]) / $row["visitors"], 2) . '</td>';
                        $output .= '</tr>';
                    }
                    echo $output;
                }
                ?>

                <tr class="TP-rowAllCountMonth">
                    <td><?php _x('Total',
                            'tp_admin_page_dashboard_table_td_total', TPOPlUGIN_TEXTDOMAIN ); ?></td>
                    <td><?php echo @round($rows["flights"]["visitors"] + $rows["hotels"]["visitors"],2); ?></td>
                    <td><?php echo @round($rows["flights"]["searches"] + $rows["hotels"]["searches"],2); ?></td>
                    <td><?php echo @round($rows["flights"]["clicks"] + $rows["hotels"]["clicks"],2); ?></td>
                    <!--<td><?php //echo $rows["flights"]["paid_clicks"] + $rows["hotels"]["paid_clicks"]; ?></td>-->
                    <td><?php echo @round($rows["flights"]["paid_clicks_profit"] + $rows["hotels"]["paid_clicks_profit"],2); ?></td>
                    <td><?php echo @round($rows["flights"]["bookings"] + $rows["hotels"]["bookings"],2); ?></td>
                    <td><?php echo @round($rows["flights"]["paid_bookings"] + $rows["hotels"]["paid_bookings"],2); ?></td>
                    <td><?php echo @round($rows["flights"]["paid_bookings_profit"] + $rows["hotels"]["paid_bookings_profit"],2); ?></td>
                    <td><?php echo @round($rows["flights"]["pending_bookings_profit"] + $rows["hotels"]["pending_bookings_profit"],2); ?></td>
                    <td><?php echo @round((($rows["flights"]["clicks"]/@$rows["flights"]["searches"]) * 100) + (($rows["hotels"]["clicks"]/$rows["hotels"]["searches"])*100), 2); ?></td>
                    <td><?php echo @(round(($rows["flights"]["paid_clicks_profit"] + $rows["flights"]["paid_bookings_profit"]) / $rows["flights"]["clicks"], 2) +
                            round(($rows["hotels"]["paid_clicks_profit"] + $rows["hotels"]["paid_bookings_profit"]) / $rows["hotels"]["clicks"], 2));?></td>
                    <td><?php echo @round((($rows["flights"]["bookings"]*100)/$rows["flights"]["clicks"]) + (($rows["hotels"]["bookings"]*100)/$rows["hotels"]["clicks"]), 2); ?></td>
                    <td><?php echo @(round(($rows["flights"]["paid_clicks_profit"] + $rows["flights"]["paid_bookings_profit"]) / $rows["flights"]["visitors"], 2) +
                            @round(($rows["hotels"]["paid_clicks_profit"] + $rows["hotels"]["paid_bookings_profit"]) / $rows["hotels"]["visitors"], 2));?></td>
                </tr>
                </tbody>
            </table>
        </div>
    <?php
    }

    /**
     * @param $tabs
     * @param array $data
     */
    public function tpTabsMonth($tabs, $data = array()){
        $rows = array();
        if(!empty($data)) {
            foreach ($data as $key => $dates) {
                foreach ($dates as $key_d => $date) {
                    foreach ($date as $key_v => $value) {
                        //error_log($key_v.'_'.print_r($value, true));
                        @$rows[$key_v]["visitors"] += $value["visitors"];
                        @$rows[$key_v]["searches"] += $value["searches"];
                        @$rows[$key_v]["clicks"] += $value["clicks"];
                        @$rows[$key_v]["paid_clicks"] += $value["paid_clicks"];
                        @$rows[$key_v]["paid_clicks_profit"] += $value["paid_clicks_profit"];
                        @$rows[$key_v]["bookings"] += $value["bookings"];
                        @$rows[$key_v]["paid_bookings"] += $value["paid_bookings"];
                        @$rows[$key_v]["paid_bookings_profit"] += $value["paid_bookings_profit"];
                        @$rows[$key_v]["pending_bookings_profit"] += $value["pending_bookings_profit"];
                    }
                }
                //error_log(print_r($sales, true));
            }
        }
        //error_log(print_r($rows, true));
        ?>
        <div id="tabs-<?php echo $tabs; ?>">
            <table class="TP-ListBalance TP-ListReport">
                <thead>
                <tr>
                    <td></td>
                    <td><?php  _ex('Visit.', 'tp_admin_page_dashboard_table_td_1_label', TPOPlUGIN_TEXTDOMAIN ); ?></td>
                    <td><?php _ex('Search', 'tp_admin_page_dashboard_table_td_2_label', TPOPlUGIN_TEXTDOMAIN ); ?></td>
                    <td><?php _ex('Clicks', 'tp_admin_page_dashboard_table_td_3_label', TPOPlUGIN_TEXTDOMAIN ); ?></td>
                    <!--<td><?php //_e('Paid clicks', TPOPlUGIN_TEXTDOMAIN ); ?></td>-->
                    <td><?php _ex('Clicks income', 'tp_admin_page_dashboard_table_td_4_label', TPOPlUGIN_TEXTDOMAIN ); ?></td>
                    <td><?php _ex('Bookings', 'tp_admin_page_dashboard_table_td_5_label', TPOPlUGIN_TEXTDOMAIN ); ?></td>
                    <td><?php _ex('Paid booking', 'tp_admin_page_dashboard_table_td_6_label', TPOPlUGIN_TEXTDOMAIN ); ?></td>
                    <td><?php _ex('Booking income', 'tp_admin_page_dashboard_table_td_7_label', TPOPlUGIN_TEXTDOMAIN ); ?></td>
                    <td><?php _ex('Possible. income', 'tp_admin_page_dashboard_table_td_8_label', TPOPlUGIN_TEXTDOMAIN ); ?></td>
                    <td>CTR</td>
                    <td>CPC</td>
                    <td>STR</td>
                    <td>CPU</td>
                </tr>
                </thead>
                <tbody>
                <?php
                if(!empty($rows)) {
                    $output = '';
                    foreach ($rows as $key_row => $row) {
                        $output .= '<tr>';
                        switch ($key_row) {
                            case "flights":
                                $output .= '<td>' . _x('Flights',
                                        'tp_admin_page_dashboard_table_td_flights', TPOPlUGIN_TEXTDOMAIN) . '</td>';
                                break;
                            case "hotels":
                                $output .= '<td>' . _x('Hotels',
                                        'tp_admin_page_dashboard_table_td_hotels', TPOPlUGIN_TEXTDOMAIN) . '</td>';
                                break;
                        }
                        $output .= '<td>' . @round($row["visitors"],2) . '</td>';
                        $output .= '<td>' . @round($row["searches"],2) . '</td>';
                        $output .= '<td>' . @round($row["clicks"],2) . '</td>';
                        //$output .= '<td>' . $row["paid_clicks"] . '</td>';
                        $output .= '<td>' . @round($row["paid_clicks_profit"],2) . '</td>';
                        $output .= '<td>' . @round($row["bookings"],2) . '</td>';
                        $output .= '<td>' . @round($row["paid_bookings"],2) . '</td>';
                        $output .= '<td>' . @round($row["paid_bookings_profit"], 2) . '</td>';
                        $output .= '<td>' . @round($row["pending_bookings_profit"], 2) . '</td>';
                        $output .= '<td>' . @round(($row["clicks"] / $row["searches"])*100, 2) . '</td>';
                        $output .= '<td>' . @round(($row["paid_clicks_profit"] + $row["paid_bookings_profit"]) / $row["clicks"], 2) . '</td>';
                        $output .= '<td>' . @round(($row["bookings"]*100)/$row["clicks"], 2) . '</td>';
                        $output .= '<td>' . @round(($row["paid_clicks_profit"] + $row["paid_bookings_profit"]) / $row["visitors"], 2) . '</td>';
                        $output .= '</tr>';
                    }
                    echo $output;
                }
                ?>

                <tr class="TP-rowAllCountMonth">
                    <td><?php _x('Total',
                            'tp_admin_page_dashboard_table_td_total', TPOPlUGIN_TEXTDOMAIN ); ?></td>
                    <td><?php echo @round($rows["flights"]["visitors"] + $rows["hotels"]["visitors"],2); ?></td>
                    <td><?php echo @round($rows["flights"]["searches"] + $rows["hotels"]["searches"],2); ?></td>
                    <td><?php echo @round($rows["flights"]["clicks"] + $rows["hotels"]["clicks"],2); ?></td>
                    <!--<td><?php //echo $rows["flights"]["paid_clicks"] + $rows["hotels"]["paid_clicks"]; ?></td>-->
                    <td><?php echo @round($rows["flights"]["paid_clicks_profit"] + $rows["hotels"]["paid_clicks_profit"],2); ?></td>
                    <td><?php echo @round($rows["flights"]["bookings"] + $rows["hotels"]["bookings"],2); ?></td>
                    <td><?php echo @round($rows["flights"]["paid_bookings"] + $rows["hotels"]["paid_bookings"],2); ?></td>
                    <td><?php echo @round($rows["flights"]["paid_bookings_profit"] + $rows["hotels"]["paid_bookings_profit"],2); ?></td>
                    <td><?php echo @round($rows["flights"]["pending_bookings_profit"] + $rows["hotels"]["pending_bookings_profit"],2); ?></td>
                    <td><?php echo @round((($rows["flights"]["clicks"]+$rows["hotels"]["clicks"])/($rows["flights"]["searches"]+$rows["hotels"]["searches"]))*100, 2); ?></td>
                    <td><?php echo @(round((($rows["flights"]["paid_clicks_profit"] + $rows["hotels"]["paid_clicks_profit"]) +($rows["flights"]["paid_bookings_profit"] + $rows["hotels"]["paid_bookings_profit"])) / ( $rows["flights"]["clicks"] + $rows["hotels"]["clicks"]), 2));?></td>
                    <td><?php echo @round((($rows["flights"]["bookings"]+$rows["hotels"]["bookings"])*100)/($rows["flights"]["clicks"]+$rows["hotels"]["clicks"]), 2); ?></td>
                    <td><?php echo @(round((($rows["flights"]["paid_clicks_profit"]+ $rows["hotels"]["paid_clicks_profit"]) + ($rows["flights"]["paid_bookings_profit"]+$rows["hotels"]["paid_bookings_profit"]))/($rows["flights"]["visitors"]+$rows["hotels"]["visitors"]), 2));?></td>
                </tr>
                </tbody>
            </table>
        </div>
    <?php
    }
}