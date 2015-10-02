<?php
/**
 * Created by PhpStorm.
 * User: freeman
 * Date: 02.10.15
 * Time: 8:11
 */

namespace app\includes\controllers\site\shortcodes;


class TPLinkShortcodeController extends \app\includes\controllers\site\TPShortcodesController{
    public $model;
    public function __construct()
    {
        parent::__construct();
        $this->model = new \app\includes\models\site\shortcodes\TPLinkShortcodeModel();
    }
    public function action($args = array())
    {
        // TODO: Implement action() method.
        $data = $this->model->get_data($args);
        return $data;
    }
    public function initShortcode()
    {
        // TODO: Implement initShortcode() method.
        add_shortcode( 'tp_link', array(&$this, 'action'));
    }
}