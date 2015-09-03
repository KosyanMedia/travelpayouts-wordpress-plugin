<?php
/**
 * Created by PhpStorm.
 * User: freeman
 * Date: 12.08.15
 * Time: 17:49
 */
namespace core\controllers;
abstract class KPDShortcodesController {
    public function __construct(){
        add_action( 'wp_loaded',  array( &$this, 'initShortcode') );
    }
    abstract public function initShortcode();
    abstract public function action($args = array());
    abstract public function render($data);
}