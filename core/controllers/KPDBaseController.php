<?php
/**
 * Created by PhpStorm.
 * User: freeman
 * Date: 06.08.15
 * Time: 11:43
 */

class KPDBaseController {
    protected function loadView($view){
        if (file_exists($view)) {
            require_once $view;
        } else {
            wp_die(__("View ".$view." not found"));
        }
    }
}