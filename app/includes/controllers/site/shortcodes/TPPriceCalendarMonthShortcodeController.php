<?php
/**
 * Created by PhpStorm.
 * User: freeman
 * Date: 13.08.15
 * Time: 12:04
 */
namespace app\includes\controllers\site\shortcodes;
class TPPriceCalendarMonthShortcodeController extends \app\includes\controllers\site\TPShortcodesController {
    public $model;
    public $view;
    public function __construct(){
        parent::__construct();
        $this->model = new \app\includes\models\site\shortcodes\TPPriceCalendarMonthShortcodeModel();
        $this->view = new \app\includes\views\site\shortcodes\TPShortcodeView();
    }
    public function initShortcode()
    {
        // TODO: Implement initShortcode() method.
        add_shortcode( 'tp_price_calendar_month_shortcodes', array(&$this, 'actionTable'));
        add_shortcode( 'tp_price_calendar_month_shortcodes_max_price', array(&$this, 'actionMaxPrice'));
    }

    public function actionTable($args = array())
    {
        $data = $this->model->getDataTable($args);
        return $this->renderTable($data);
    }
    public function renderTable($data)
    {
        if(!$data) return false;
        return $this->view->renderTable($data);
    }

    public function actionMaxPrice($args = array())
    {
        return $this->model->getMaxPrice($args);
    }

}