<?php
/**
 * Created by PhpStorm.
 * User: freeman
 * Date: 13.08.15
 * Time: 10:28
 * 3. Самые дешевые билеты по направлению
 */
namespace app\includes\controllers\site\shortcodes;
use app\includes\controllers\site\TPShortcodesController;
use app\includes\models\site\shortcodes\TPCheapestFlightsShortcodeModel;
use app\includes\views\site\shortcodes\TPShortcodeView;

class TPCheapestFlightsShortcodeController extends TPShortcodesController{
    public $model;
    public $view;
    public function __construct(){
        parent::__construct();
        $this->model = new TPCheapestFlightsShortcodeModel();
        $this->view = new TPShortcodeView();
    }
    public function initShortcode()
    {
        // TODO: Implement initShortcode() method.
        add_shortcode( 'tp_cheapest_flights_shortcodes', [&$this, 'actionTable']);
        add_shortcode( 'tp_cheapest_flights_shortcodes_max_price', [&$this, 'actionMaxPrice']);
        add_shortcode( 'tp_cheapest_flights_shortcodes_min_price', [&$this, 'actionMinPrice']);
    }
    public function actionTable($args = [])
    {
        $data = $this->model->getDataTable($args);
        //if(!$data) return false;
        if ($data['return_url'] == true){
            return print_r($data['rows'], true);
        }
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
