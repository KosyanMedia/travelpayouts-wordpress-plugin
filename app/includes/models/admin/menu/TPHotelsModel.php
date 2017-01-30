<?php
/**
 * Created by PhpStorm.
 * User: romansolomashenko
 * Date: 30.01.17
 * Time: 10:38 AM
 */

namespace app\includes\models\admin\menu;


class TPHotelsModel extends TPBaseShortcodeOptionModel
{

    public function create_option()
    {
        // TODO: Implement create_option() method.
        register_setting(
            'TPHotels',
            TPOPlUGIN_OPTION_NAME,
            array(&$this,'save_option')
        );
        $field = new TPHotelsModel();
    }
}