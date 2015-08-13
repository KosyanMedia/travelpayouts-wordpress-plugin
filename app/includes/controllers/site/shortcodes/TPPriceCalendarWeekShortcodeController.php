<?php
/**
 * Created by PhpStorm.
 * User: freeman
 * Date: 13.08.15
 * Time: 12:11
 */

class TPPriceCalendarWeekShortcodeController extends TPShortcodesController {

    public $model;
    public $view;
    public function __construct(){
        parent::__construct();
        $this->model = new TPPriceCalendarWeekShortcodeModel();
        $this->view = new TPShortcodesView();
    }
    public function initShortcode()
    {
        // TODO: Implement initShortcode() method.
        add_shortcode( 'tp_price_calendar_week_shortcodes', array(&$this, 'action'));
    }
}