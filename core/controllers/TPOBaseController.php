<?php
/**
 * Created by PhpStorm.
 * User: freeman
 * Date: 06.08.15
 * Time: 11:43
 */
namespace core\controllers;
class TPOBaseController {
    protected function loadView($view, $type = 0){
        if (file_exists($view)) {
            switch($type){
                case 0:
                    require_once $view;
                    break;
                case 1:
                    require $view;
                    break;
                default:
                    require_once $view;
                    break;
            }
        } else {
            wp_die(__("View ".$view." not found"));
        }
    }
}