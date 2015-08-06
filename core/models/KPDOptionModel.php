<?php
/**
 * Created by PhpStorm.
 * User: freeman
 * Date: 06.08.15
 * Time: 18:13
 */

abstract class KPDOptionModel {
    public function __construct(){
        add_action( 'admin_init', array( &$this, 'create_option' ) );
    }
    abstract public function create_option();
    abstract protected function save_option($input);
}