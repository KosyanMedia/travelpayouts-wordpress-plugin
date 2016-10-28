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
        $this->view = new \app\includes\views\site\shortcodes\TPShortcodeView();
    }

    /**
     * @param $data
     * @return bool
     */
    public function render($data)
    {
        // TODO: Implement render() method.
        if(!$data) return false;
        return $this->view->returnTpLink($data);
    }
    public function initShortcode()
    {
        // TODO: Implement initShortcode() method.
        add_shortcode( 'tp_link', array(&$this, 'action'));
    }
}