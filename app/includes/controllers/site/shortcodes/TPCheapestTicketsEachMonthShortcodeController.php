<?php
/**
 * Created by PhpStorm.
 * User: freeman
 * Date: 13.08.15
 * Time: 12:17
 */
namespace app\includes\controllers\site\shortcodes;
class TPCheapestTicketsEachMonthShortcodeController extends \app\includes\controllers\site\TPShortcodesController{
    public $model;
    public $view;
    public function __construct(){
        parent::__construct();
        $this->model = new TPCheapestTicketsEachMonthShortcodeModel();
        $this->view = new \app\includes\views\site\shortcodes\TPShortcodesView();
    }
    public function initShortcode()
    {
        // TODO: Implement initShortcode() method.
        add_shortcode( 'tp_cheapest_tickets_each_month_shortcodes', array(&$this, 'action'));
    }
}