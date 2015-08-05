<?php
/**
 * Created by PhpStorm.
 * User: freeman
 * Date: 05.08.15
 * Time: 16:13
 */

abstract class KPDDefault {
    protected static function defaultOptions($defaults){
        $defaults = apply_filters('travelpayouts_defaults', $defaults );
        return $defaults;
    }
}