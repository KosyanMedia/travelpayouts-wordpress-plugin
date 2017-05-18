<?php
/**
 * Created by PhpStorm.
 * User: romansolomashenko
 * Date: 18.01.17
 * Time: 2:15 PM
 */

namespace app\includes\models\admin;


use app\includes\common\TPRequestApiStatistic;

abstract class TPStatModel
{
    protected static $TPRequestApi;
    public function __construct()
    {
        //error_log('TPTableShortcodeModel');
        self::$TPRequestApi = TPRequestApiStatistic::getInstance();
        //error_log(print_r(get_class_methods(self::$TPRequestApi), true));
    }
}