<?php
/**
 * Created by PhpStorm.
 * User: freeman
 * Date: 12.08.15
 * Time: 17:49
 */
namespace core\controllers;
abstract class TPOShortcodesController {
    public function __construct(){
        add_action( 'wp_loaded',  [&$this, 'initShortcode']);
    }
    abstract public function initShortcode();
    abstract public function action($args = []);
    abstract public function render($data);
}
