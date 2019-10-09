<?php
/**
 * Created by PhpStorm.
 * User: romansolomashenko
 * Date: 16.12.16
 * Time: 7:45 PM
 */

namespace app\includes\controllers\site\shortcodes;

use app\includes\controllers\site\TPShortcodesController;
use app\includes\models\site\shortcodes\TPCaseCityShortcodeModel;

class TPCaseCityShortcodeController extends TPShortcodesController
{
    public $model;

    public function __construct()
    {
        parent::__construct();
        $this->model = new TPCaseCityShortcodeModel();
    }

    public function initShortcode()
    {
        // TODO: Implement initShortcode() method.
        add_shortcode( 'tp_case', [&$this, 'action']);
    }


    public function render($data)
    {
        return $data;
    }
}
