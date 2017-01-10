<?php
/**
 * Created by PhpStorm.
 * User: romansolomashenko
 * Date: 10.01.17
 * Time: 1:16 PM
 */

namespace app\includes\models\site;

use \app\includes\common\TPRequestApiTable;

abstract class TPTableShortcodeModel extends TPShortcodesChacheModel
{
    protected static $TPRequestApi;
    public function __construct()
    {
        parent::__construct();
        //error_log('TPTableShortcodeModel');
        self::$TPRequestApi = TPRequestApiTable::getInstance();
        //error_log(print_r(get_class_methods(self::$TPRequestApi), true));
    }
}