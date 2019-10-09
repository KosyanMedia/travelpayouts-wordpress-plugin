<?php
/**
 * Created by PhpStorm.
 * User: freeman
 * Date: 13.08.15
 * Time: 12:25
 *
 *
 *
 * 4. Самые дешевые билеты по направлению в этом месяце
 */
namespace app\includes\controllers\site\shortcodes;
use app\includes\controllers\site\TPShortcodesController;
use app\includes\models\site\shortcodes\TPCheapestTicketEachDayMonthShortcodeModel;
use app\includes\views\site\shortcodes\TPShortcodeView;

class TPCheapestTicketEachDayMonthShortcodeController extends TPShortcodesController{
    public $model;
    public $view;
    public function __construct(){
        parent::__construct();
        $this->model = new TPCheapestTicketEachDayMonthShortcodeModel();
        $this->view = new TPShortcodeView();
    }
    public function initShortcode()
    {
        // TODO: Implement initShortcode() method.
        add_shortcode( 'tp_cheapest_ticket_each_day_month_shortcodes', [&$this, 'actionTable']);
        add_shortcode( 'tp_cheapest_ticket_each_day_month_shortcodes_max_price', [&$this, 'actionMaxPrice']);
        add_shortcode( 'tp_cheapest_ticket_each_day_month_shortcodes_min_price', [&$this, 'actionMinPrice']);
    }

    public function actionTable($args = [])
    {
        $data = $this->model->getDataTable($args);
        //if(!$data) return false;

        if ($data['return_url'] == true){
            return print_r($data['rows'], true);
        }

        //error_log(print_r($data, true));

        return $this->view->renderTable($data);
    }

    public function actionMaxPrice($args = [])
    {
        $data = $this->model->getMaxPrice($args);
        if(!$data) return false;
        extract($data, EXTR_SKIP);
        return $this->view->renderPrice($price, $currency);
    }
    public function actionMinPrice($args = [])
    {
        $data = $this->model->getMinPrice($args);
        if(!$data) return false;
        extract($data, EXTR_SKIP);
        return $this->view->renderPrice($price, $currency);
    }
}
