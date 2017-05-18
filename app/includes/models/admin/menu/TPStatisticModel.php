<?php
/**
 * Created by PhpStorm.
 * User: freeman
 * Date: 12.08.15
 * Time: 12:05
 */
namespace app\includes\models\admin\menu;
class TPStatisticModel extends TPDashboardModel{
    public $balance;
    public $detailed_sales;
    public $payments;
    public function __construct(){
        parent::__construct();
	    if (!isset(\app\includes\TPPlugin::$options['config']['statistics'])
	        && self::$TPRequestApi->isStatus() == true){
		    $page = isset($_GET['page']) ? $_GET['page'] : null ;

		    if ( $page == 'tp_control_stats'){
			    add_action( 'admin_init', array( &$this, 'setData' ) );
		    }

	    }
        add_action('wp_ajax_tp_get_detailed_sales',      array( &$this, 'tpGetDetailedSalesAjax'));
        add_action('wp_ajax_nopriv_tp_get_detailed_sales', array( &$this, 'tpGetDetailedSalesAjax'));
        add_action('wp_ajax_tp_save_stats_total',      array( &$this, 'tpSaveStatsTotal'));
        add_action('wp_ajax_nopriv_tp_save_stats_total',array( &$this, 'tpSaveStatsTotal'));
    }
    public function setData(){
        $this->balance = $this->tpGetBalance();
        $this->detailed_sales = $this->tpGetDetailedSales();
        $this->payments = $this->tpGetPayments();
    }
    public function tpGetDetailedSales(){
        $cacheKey = TPOPlUGIN_NAME."_TPDetailedSalesStats";
        $TPDetailedSales = array();
        if ( false === ( $TPDetailedSales = get_transient($cacheKey) ) ) {
            $TPDetailedSales = self::$TPRequestApi->get_detailed_sales();
            if( !$TPDetailedSales)
                return false;
            $TPDetailedSales = array_reverse($TPDetailedSales["sales"]);
            set_transient( $cacheKey, $TPDetailedSales, MINUTE_IN_SECONDS * 15);
        }
        return $TPDetailedSales;
    }
    public function tpGetPayments(){
        $cacheKey = TPOPlUGIN_NAME."_TPPaymentsStats";
        $TPpayments = array();
        if ( false === ( $TPpayments = get_transient($cacheKey) ) ) {
            $TPpayments = self::$TPRequestApi->get_payments();
            if( !$TPpayments)
                return false;
            $TPpayments = array_reverse($TPpayments["payments"]);
            set_transient( $cacheKey, $TPpayments, DAY_IN_SECONDS);
        }
        return $TPpayments;

    }
    public function tpGetDetailedSalesAjax()
    {
        if (isset($_POST)) {
            $output = '';
            $TPDetailedSales = self::$TPRequestApi->get_detailed_sales(
                array('date' => date("Y-m-d", strtotime($_POST["date"])))
            );
            $TPDetailedSalesSort = array();
            $TPDetailedSalesSort = $TPDetailedSales["sales"];
            $TPDetailedSalesSort = array_reverse($TPDetailedSalesSort);
            $output = TPStatisticView::tableReport($TPDetailedSalesSort);
            echo json_encode(array('table' => $output,
                'date' => '<span id="infoDateReport">' . date_i18n('F Y', strtotime($_POST["date"])) . '</span>'),
                JSON_HEX_APOS | JSON_HEX_QUOT);
        }
    }
    public function tpSaveStatsTotal(){
        if(isset($_POST)){
            if($_POST["data"] === "true") {
                \app\includes\TPPlugin::$options["admin_settings"]["total_stats"] = true;
            }
            else {
                \app\includes\TPPlugin::$options["admin_settings"]["total_stats"] = false;
            }

            update_option( TPOPlUGIN_OPTION_NAME, \app\includes\TPPlugin::$options);
            //error_log(print_r($this->TPOptions, true));
        }
    }
}