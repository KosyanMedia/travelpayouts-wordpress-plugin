<?php
/**
 * Created by PhpStorm.
 * User: freeman
 * Date: 12.08.15
 * Time: 12:05
 */

namespace app\includes\models\admin\menu;

use app\includes\TPPlugin;
use core\TPRequest;

class TPStatisticModel extends TPDashboardModel
{
    public $balance;
    public $detailed_sales;
    public $payments;

    public function __construct()
    {
        parent::__construct();
        if (!isset(TPPlugin::$options['config']['statistics'])
            && self::$TPRequestApi->isStatus() == true) {
            $page = TPRequest::get('page');

            if ($page === 'tp_control_stats') {
                add_action('admin_init', [&$this, 'setData']);
            }

        }
        add_action('wp_ajax_tp_get_detailed_sales', [&$this, 'tpGetDetailedSalesAjax']);
        //add_action('wp_ajax_nopriv_tp_get_detailed_sales', array( &$this, 'tpGetDetailedSalesAjax'));
        add_action('wp_ajax_tp_save_stats_total', [&$this, 'tpSaveStatsTotal']);
        //add_action('wp_ajax_nopriv_tp_save_stats_total',array( &$this, 'tpSaveStatsTotal'));
    }

    public function setData()
    {
        $this->balance = $this->tpGetBalance();
        $this->detailed_sales = $this->tpGetDetailedSales();
        $this->payments = $this->tpGetPayments();
    }

    public function tpGetDetailedSales()
    {
        $cacheKey = TPOPlUGIN_NAME . '_TPDetailedSalesStats';
        $TPDetailedSales = [];
        if (false === ($TPDetailedSales = get_transient($cacheKey))) {
            $TPDetailedSales = self::$TPRequestApi->get_detailed_sales();
            if (!$TPDetailedSales) {
                return false;
            }
            $TPDetailedSales = array_reverse($TPDetailedSales['sales']);
            set_transient($cacheKey, $TPDetailedSales, MINUTE_IN_SECONDS * 15);
        }
        return $TPDetailedSales;
    }

    public function tpGetPayments()
    {
        $cacheKey = TPOPlUGIN_NAME . '_TPPaymentsStats';
        $TPpayments = [];
        if (false === ($TPpayments = get_transient($cacheKey))) {
            $TPpayments = self::$TPRequestApi->get_payments();
            if (!$TPpayments) {
                return false;
            }
            $TPpayments = array_reverse($TPpayments['payments']);
            set_transient($cacheKey, $TPpayments, DAY_IN_SECONDS);
        }
        return $TPpayments;

    }

    public function tpGetDetailedSalesAjax()
    {
        if (TPRequest::post('date')) {
            $output = '';

            $dateValue = TPRequest::post('date');
            $date = strtotime($dateValue);
            $TPDetailedSales = self::$TPRequestApi->get_detailed_sales(
                ['date' => date('Y-m-d', $date)]
            );
            $TPDetailedSalesSort = $TPDetailedSales['sales'];
            $TPDetailedSalesSort = array_reverse($TPDetailedSalesSort);
            $output = TPStatisticView::tableReport($TPDetailedSalesSort);
            echo json_encode(['table' => $output,
                'date' => '<span id="infoDateReport">' . date_i18n('F Y', $date) . '</span>'],
                JSON_HEX_APOS | JSON_HEX_QUOT);
        }
    }

    public function tpSaveStatsTotal()
    {
        if (TPRequest::isPost()) {
            if (TPRequest::post('data') === 'true') {
                TPPlugin::$options['admin_settings']['total_stats'] = true;
            } else {
                TPPlugin::$options['admin_settings']['total_stats'] = false;
            }

            update_option(TPOPlUGIN_OPTION_NAME, TPPlugin::$options);
            //error_log(print_r($this->TPOptions, true));
        }
    }
}
