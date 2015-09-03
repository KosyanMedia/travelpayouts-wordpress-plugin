<?php
/**
 * Class KPDAdminMenuController
 */
namespace core\controllers;
abstract class TPOAdminMenuController extends TPOBaseController{
    public function __construct(){
        add_action('admin_menu', array( &$this, 'action'));
    }
    abstract public function action();
    abstract public function render();

    public function redirect($page = ''){
        echo '<script type="text/javascript">
                  document.location.href="'.$page.'";
           </script>';
    }
}