<?php
/**
 * Created by PhpStorm.
 * User: freeman
 * Date: 12.08.15
 * Time: 12:24
 */
namespace app\includes\views\admin\menu;
class TPStatisticView extends \app\includes\views\admin\TPView{
    public static $model;
    public function __construct($model)
    {
        // TODO: Implement __construct() method.
        self::$model = $model;
    }

    /**
     * @param array $rows
     * @return string
     */
    public static function tableReport($rows = array()){
        $output = '';
        $output_marker_option = '';
        $output_table = '';
        $output_table .= '<table class="TP-ListBalance TP-ListReport sortable" id="TPListReport">
                    <thead>
                        <tr>
                            <td class="TPTableHead tp-date-column">'
            ._x('Date', 'tp_admin_page_statistics_tab_report_table_report_td_1_label', TPOPlUGIN_TEXTDOMAIN ).'</td>
                            <td class="tp-notsort-column">'
            ._x('Type','tp_admin_page_statistics_tab_report_table_report_td_2_label', TPOPlUGIN_TEXTDOMAIN ).'</td>
                            <td class="tp-notsort-column">'
            ._x('Marker','tp_admin_page_statistics_tab_report_table_report_td_3_label', TPOPlUGIN_TEXTDOMAIN ).'</td>
                            <td class="TPTableHead tp-data-column">'
            ._x('Visitors','tp_admin_page_statistics_tab_report_table_report_td_4_label', TPOPlUGIN_TEXTDOMAIN ).'</td>
                            <td class="TPTableHead tp-data-column">'
            ._x('Search','tp_admin_page_statistics_tab_report_table_report_td_5_label', TPOPlUGIN_TEXTDOMAIN ).'</td>
                            <td class="TPTableHead tp-data-column">'
            ._x('Clicks','tp_admin_page_statistics_tab_report_table_report_td_6_label', TPOPlUGIN_TEXTDOMAIN ).'</td>
                            <td class="TPTableHead tp-data-column">'
            ._x('Income clicks','tp_admin_page_statistics_tab_report_table_report_td_7_label', TPOPlUGIN_TEXTDOMAIN ).'</td>
                            <td class="TPTableHead tp-data-column">'
            ._x('Booking','tp_admin_page_statistics_tab_report_table_report_td_8_label', TPOPlUGIN_TEXTDOMAIN ).'</td>
                            <td class="TPTableHead tp-data-column">'
            ._x('Paid booking','tp_admin_page_statistics_tab_report_table_report_td_9_label', TPOPlUGIN_TEXTDOMAIN ).'</td>
                            <td class="TPTableHead tp-data-column">'
            ._x('Income booking','tp_admin_page_statistics_tab_report_table_report_td_10_label', TPOPlUGIN_TEXTDOMAIN ).'</td>
                            <td class="TPTableHead tp-data-column">'
            ._x('Possible. income','tp_admin_page_statistics_tab_report_table_report_td_11_label', TPOPlUGIN_TEXTDOMAIN ).'</td>
                        </tr>
                    </thead>
                    <tbody>';
        //<td class="TPTableHead tp-data-column">'.__('Paid clicks', TPOPlUGIN_TEXTDOMAIN ).'</td>
        if(!empty($rows)){
            $result = array();
            foreach($rows as $key_date=>$sales){
                //error_log($key_date);
                foreach($sales as $key_marker=>$marker){
                    //error_log($key_marker);
                    foreach($marker as $key_type=>$value){
                        //error_log($key_type);
                        $classType = '';
                        switch($key_type){
                            case "flights":
                                $classType = 'TP-ico-avia';
                                break;
                            case "hotels":
                                $classType = 'TP-ico-hotel';
                                break;
                        }
                        $output_table .= '   <tr>
                                            <td><p  data-tptime="'.strtotime($key_date).'">
                                                    '.date("d.m.Y", strtotime($key_date)).'</p></td>
                                            <td >
                                                <i class="TP-icoTable '.$classType.'"></i>
                                                <span style="display:none">'.$key_type.'</span>
                                            </td>
                                            <td><p data-tpdata="'.$key_marker.'">'.$key_marker.'</p></td>
                                            <td><p data-tpdata="'.$value["visitors"].'">'.round($value["visitors"],2).'</p></td>
                                            <td><p data-tpdata="'.$value["searches"].'">'.round($value["searches"],2).'</p></td>
                                            <td><p data-tpdata="'.$value["clicks"].'">'.round($value["clicks"],2).'</p></td>
                                            <td><p data-tpdata="'.$value["paid_clicks_profit"].'">'.round($value["paid_clicks_profit"],2).'</p></td>
                                            <td><p data-tpdata="'.$value["bookings"].'">'.round($value["bookings"],2).'</p></td>
                                            <td><p data-tpdata="'.$value["paid_bookings"].'">'.round($value["paid_bookings"],2).'</p></td>
                                            <td><p data-tpdata="'.$value["paid_bookings_profit"].'">'.round($value["paid_bookings_profit"],2).'</p></td>
                                            <td><p data-tpdata="'.$value["pending_bookings_profit"].'">'.round($value["pending_bookings_profit"],2).'</p></td>
                                        </tr>';
                        //<td><p data-tpdata="'.$value["paid_clicks"].'">'.$value["paid_clicks"].'</p></td>
                        @$result[$key_marker][$key_type]["visitors"] += round($value["visitors"],2);
                        @$result[$key_marker][$key_type]["searches"] += round($value["searches"],2);
                        @$result[$key_marker][$key_type]["clicks"] += round($value["clicks"],2);
                        @$result[$key_marker][$key_type]["paid_clicks"] += round($value["paid_clicks"],2);
                        @$result[$key_marker][$key_type]["paid_clicks_profit"] += round($value["paid_clicks_profit"],2);
                        @$result[$key_marker][$key_type]["bookings"] += round($value["bookings"],2);
                        @$result[$key_marker][$key_type]["paid_bookings"] += round($value["paid_bookings"],2);
                        @$result[$key_marker][$key_type]["paid_bookings_profit"] += round($value["paid_bookings_profit"],2);
                        @$result[$key_marker][$key_type]["pending_bookings_profit"] += round($value["pending_bookings_profit"],2);
                    }
                }
            }
            $TPTotalRow = @\app\includes\TPPlugin::$options['admin_settings']['total_stats'] ? '' : 'style="display:none"';
            if(!empty($result)){
                $output_total = '';
                $total = array();
                foreach($result as $key_m => $marker_res) {
                    $output_marker_option .= '<option value="'.$key_m.'">'.$key_m.'</option>';
                    foreach ($marker_res as $key_res => $res) {
                        $classType = '';
                        switch ($key_res) {
                            case "flights":
                                $classType = 'TP-ico-avia';
                                break;
                            case "hotels":
                                $classType = 'TP-ico-hotel';
                                break;
                        }

                        $output_table .= '<tr class="TP-rowAllCountMonth TP-Report-total-row" '.$TPTotalRow.'>
                                    <td><p data-total="">'
                            . _x('Total', 'tp_admin_page_statistics_tab_report_table_report_td_12_label', TPOPlUGIN_TEXTDOMAIN) . '</p></td>
                                    <td>
                                        <i class="TP-icoTable ' . $classType . '"></i>
                                        <span style="display:none">'.$key_res.'</span>
                                    </td>
                                    <td><p data-tpdata="'.$key_m.'">'.$key_m.'</p></td>
                                    <td>' . $res["visitors"] . '</td>
                                    <td>' . $res["searches"] . '</td>
                                    <td>' . $res["clicks"] . '</td>
                                    <td>' . $res["paid_clicks_profit"] . '</td>
                                    <td>' . $res["bookings"] . '</td>
                                    <td>' . $res["paid_bookings"] . '</td>
                                    <td>' . $res["paid_bookings_profit"] . '</td>
                                    <td>' . $res["pending_bookings_profit"] . '</td>
                                </tr>';
                        //<td>' . $res["paid_clicks"] . '</td>
                        @$total["visitors"] += $res["visitors"];
                        @$total["searches"] += $res["searches"];
                        @$total["clicks"] += $res["clicks"];
                        @$total["paid_clicks"] += $res["paid_clicks"];
                        @$total["paid_clicks_profit"] += $res["paid_clicks_profit"];
                        @$total["bookings"] += $res["bookings"];
                        @$total["paid_bookings"] += $res["paid_bookings"];
                        @$total["paid_bookings_profit"] += $res["paid_bookings_profit"];
                        @$total["pending_bookings_profit"] += $res["pending_bookings_profit"];
                    }
                }
            }
        }
        $output_table .= '
                    </tbody>
                    <tfoot '.$TPTotalRow.'>
                        <tr class="TP-rowAllCountMonth">
                        </tr>
                    </tfoot>
                </table><div id="TPListReportTotal"></div>';
        $output .= '<div class="TP-ListFilter">
                        <div class="TP-Report-total">
                            <input id="TP-Report-total-chek1" type="checkbox" name="'.TPOPlUGIN_OPTION_NAME.'[admin_settings][total_stats]"
                                       value="1" '.checked(@\app\includes\TPPlugin::$options['admin_settings']['total_stats'], true, false).' hidden />
                            <label for="TP-Report-total-chek1">'
            ._x('Total', 'tp_admin_page_statistics_tab_report_table_report_input_total_label', TPOPlUGIN_TEXTDOMAIN )

            .'</label>
                        </div>
                        <label>
                            <span>'
            ._x('Type', 'tp_admin_page_statistics_tab_report_table_report_filter_type_label', TPOPlUGIN_TEXTDOMAIN ).'</span>
                            <select id="TP-ListReportType" class="TP-Zelect" >
                                <option value="none">'
            ._x('All','tp_admin_page_statistics_tab_report_table_report_filter_type_value_1', TPOPlUGIN_TEXTDOMAIN ).'</option>
                                <option value="flights">'
            ._x('Flights','tp_admin_page_statistics_tab_report_table_report_filter_type_value_2', TPOPlUGIN_TEXTDOMAIN ).'</option>
                                <option value="hotels">'
            ._x('Hotels','tp_admin_page_statistics_tab_report_table_report_filter_type_value_3', TPOPlUGIN_TEXTDOMAIN ).'</option>
                            </select>
                        </label>
                        <label>
                            <span>'
            ._x('Marker', 'tp_admin_page_statistics_tab_report_table_report_filter_marker_label', TPOPlUGIN_TEXTDOMAIN ).'</span>
                            <select id="TP-ListReportMarker" class="TP-Zelect" >
                                <option value="none">'
            ._x('All','tp_admin_page_statistics_tab_report_table_report_filter_marker_value_1', TPOPlUGIN_TEXTDOMAIN ).'</option>
                                '.$output_marker_option.'
                            </select>
                        </label>

                    </div>
                    ';
        /*$output_table .= '<table class="TP-ListBalance TP-ListReport">
                        <tbody>'.$output_total.'</tbody>
                    </table>';*/
        $output = '<div id="TP-ListReportBlock">'.$output.$output_table.'</div>';
        return $output;
    }

    /**
     * @return string
     */
    public function balanceLabel(){
        return self::$model->balance["data"]["balance"]
              .$this->getCurrencyView(self::$model->balance["data"]["currency"]);
    }
    /**
     * @param array $rows
     * @return string
     */
    public function tableBalance($rows = array()){
        $output = '';
        $output .= '<table class="TP-ListBalance sortable" id="TPListBalance">
                        <thead>
                        <tr>
                            <td class="TPTableHead tp-date-column">'
            ._x('Date', 'tp_admin_page_statistics_tab_report_table_balance_td_1_label', TPOPlUGIN_TEXTDOMAIN ).'</td>
                            <td class="TPTableHead tp-price-column">'
            ._x('Amount', 'tp_admin_page_statistics_tab_report_table_balance_td_2_label', TPOPlUGIN_TEXTDOMAIN ).'</td>
                            <td class="tp-notsort-column">'
            ._x('Status', 'tp_admin_page_statistics_tab_report_table_balance_td_3_label', TPOPlUGIN_TEXTDOMAIN ).'</td>
                            <td class="tp-notsort-column">'
            ._x('Comment', 'tp_admin_page_statistics_tab_report_table_balance_td_4_label', TPOPlUGIN_TEXTDOMAIN ).'</td>
                        </tr>
                        </thead>
                        <tbody>';
        if(!empty($rows)){
            //error_log(print_r($rows, true));
            foreach($rows as $key => $value){
                $output .= '<tr>
                            <td><p  data-tptime="'.strtotime($value["timestamp"]).'">'.$value["timestamp"].'</p></td>
                            <td><p data-price="'.$value["amount"].'">'
                    .str_replace(".00", "", number_format($value["amount"], 2, '.', ' '))
                    .' '.$this->getCurrencyView($value["currency"]).'</p></td>
                            <td>'.$value["status"].'</td>
                            <td>'.$value["comment"].'</td>
                        </tr>';
            }
        }
        $output .= '  </tbody>
                    </table>';
        return $output;
    }
}