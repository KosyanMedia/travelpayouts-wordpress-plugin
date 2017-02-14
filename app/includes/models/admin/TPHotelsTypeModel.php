<?php
/**
 * Created by PhpStorm.
 * User: romansolomashenko
 * Date: 14.02.17
 * Time: 3:07 PM
 */

namespace app\includes\models\admin;


use app\includes\common\TPRequestApiHotel;

class TPHotelsTypeModel
{
    protected static $TPRequestApi;
    public function __construct()
    {
        self::$TPRequestApi = TPRequestApiHotel::getInstance();
        add_action( 'wp_loaded', array( __CLASS__, 'getHotelsType') );
    }
}