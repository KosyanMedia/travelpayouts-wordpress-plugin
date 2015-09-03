<?php
/**
 * Created by PhpStorm.
 * User: freeman
 * Date: 06.08.15
 * Time: 18:13
 */
namespace core\models;
abstract class TPOOptionModel {
    public function __construct(){
        add_action( 'admin_init', array( &$this, 'create_option' ) );
    }
    abstract public function create_option();

    /**
     * @param $input
     * @return mixed
     */
    abstract public function save_option($input);

    /**
     * @param string $page
     */
    public function redirect($page = ''){
        echo '<script type="text/javascript">
                  document.location.href="'.$page.'";
           </script>';
    }
}