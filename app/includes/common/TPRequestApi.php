<?php
/**
 * Created by PhpStorm.
 * User: romansolomashenko
 * Date: 04.01.17
 * Time: 2:08 PM
 */

namespace app\includes\common;


class TPRequestApi
{

    private static $instance = null;
    private function __construct() {

    }
    public static function getInstance(){
        if (null === self::$instance) {
            self::$instance = new self();
        }
        return self::$instance;
    }
}