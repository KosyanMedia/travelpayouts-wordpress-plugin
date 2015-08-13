<?php
/**
 * Created by PhpStorm.
 * User: freeman
 * Date: 13.08.15
 * Time: 11:51
 */

class TPPopularDestinationsAirlinesShortcodeController extends TPShortcodesController{
    public $model;
    public $view;
    public function __construct(){
        parent::__construct();
        $this->model = new TPPopularDestinationsAirlinesShortcodeModel();
        $this->view = new TPShortcodesView();
    }
    public function initShortcode()
    {
        // TODO: Implement initShortcode() method.
        add_shortcode( 'tp_popular_destinations_airlines_shortcodes', array(&$this, 'action'));
    }
}