<?php
/**
 * Created by PhpStorm.
 * User: freeman
 * Date: 13.08.15
 * Time: 12:31
 */

class TPPopularRoutesFromCityShortcodeController extends TPShortcodesController{

    public $model;
    public $view;
    public function __construct(){
        parent::__construct();
        $this->model = new TPPopularRoutesFromCityShortcodeModel();
        $this->view = new TPShortcodesView();
    }
    public function initShortcode()
    {
        // TODO: Implement initShortcode() method.
        add_shortcode( 'tp_popular_routes_from_city_shortcodes', array(&$this, 'action'));
    }
}