<?php
abstract class KPDPlugin {
    public static $options;
    protected function __construct(){
        self::$options = get_option(KPDPlUGIN_OPTION_NAME);
    }
}
