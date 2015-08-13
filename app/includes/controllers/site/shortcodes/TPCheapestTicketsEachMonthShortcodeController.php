<?php
/**
 * Created by PhpStorm.
 * User: freeman
 * Date: 13.08.15
 * Time: 12:17
 */

class TPCheapestTicketsEachMonthShortcodeController extends TPShortcodesController{
    public $model;
    public $view;
    public function __construct(){
        parent::__construct();
        $this->model = new TPCheapestTicketsEachMonthShortcodeModel();
        $this->view = new TPShortcodesView();
    }
    public function initShortcode()
    {
        // TODO: Implement initShortcode() method.
        add_shortcode( 'tp_cheapest_tickets_each_month_shortcodes', array(&$this, 'action'));
    }
}