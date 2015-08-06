<?php
/**
 * Created by PhpStorm.
 * User: freeman
 * Date: 06.08.15
 * Time: 11:43
 */

abstract class KPDBaseControllers {
    abstract public function __construct();
    abstract public function action();
    abstract public function render();
}