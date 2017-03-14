<?php
/**
 * Created by PhpStorm.
 * User: romansolomashenko
 * Date: 10.01.17
 * Time: 8:55 PM
 */

namespace app\includes\models\site;

use \app\includes\common\TPRequestApiHotel;

abstract class TPHotelShortcodeModel extends TPShortcodesChacheModel
{
    protected static $TPRequestApi;
    public function __construct()
    {
        parent::__construct();
        //error_log('TPTableShortcodeModel');
        self::$TPRequestApi = TPRequestApiHotel::getInstance();
        //error_log(print_r(get_class_methods(self::$TPRequestApi), true));
    }

    public function getCheckOut($day){
        if ($day > 0){
            $check_out = date('Y-m-d', DAY_IN_SECONDS * $day + time());
        } else {
            $check_out = date('Y-m-d');
        }
        return $check_out;
    }
}