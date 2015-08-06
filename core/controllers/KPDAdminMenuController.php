<?php
/**
 * Class KPDAdminMenuController
 */
abstract class KPDAdminMenuController {
    public function __construct(){
        add_action('admin_menu', array( &$this, 'action'));
    }
    abstract public function action();
    abstract public function render();
    protected function loadView($view){
        if (file_exists($view)) {
            require_once $view;
        } else {
            wp_die(__("View ".$view." not found"));
        }
    }
}