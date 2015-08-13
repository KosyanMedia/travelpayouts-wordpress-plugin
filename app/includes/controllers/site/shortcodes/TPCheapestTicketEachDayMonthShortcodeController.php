<?php
/**
 * Created by PhpStorm.
 * User: freeman
 * Date: 13.08.15
 * Time: 12:25
 */

class TPCheapestTicketEachDayMonthShortcodeController extends TPShortcodesController{
    public $model;
    public $view;
    public function __construct(){
        parent::__construct();
        $this->model = new TPCheapestTicketEachDayMonthShortcodeModel();
        $this->view = new TPShortcodesView();
    }
    public function initShortcode()
    {
        // TODO: Implement initShortcode() method.
        add_shortcode( 'tp_cheapest_ticket_each_day_month_shortcodes', array(&$this, 'action'));
    }
}