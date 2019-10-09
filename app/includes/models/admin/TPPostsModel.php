<?php
/**
 * Created by PhpStorm.
 * User: freeman
 * Date: 10.09.15
 * Time: 12:27
 */

namespace app\includes\models\admin;


use core\models\TPOShortcodesCacheModel;

class TPPostsModel extends TPOShortcodesCacheModel{
    public function __construct(){
        parent::__construct();
    }
    public function get_data($args = [])
    {
        // TODO: Implement get_data() method.
    }
}
