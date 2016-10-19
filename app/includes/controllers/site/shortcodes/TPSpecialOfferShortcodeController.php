<?php
/**
 * Created by PhpStorm.
 * User: freeman
 * Date: 08.08.16
 * Time: 16:08
 */

namespace app\includes\controllers\site\shortcodes;


class TPSpecialOfferShortcodeController extends \app\includes\controllers\site\TPShortcodesController
{
    public $model;
    public $view;
    public function __construct(){
        parent::__construct();
        $this->model = new \app\includes\models\site\shortcodes\TPSpecialOfferShortcodeModel();
        $this->view = new \app\includes\views\site\shortcodes\TPShortcodeView();

    }
    public function initShortcode()
    {
        // TODO: Implement initShortcode() method.
        add_shortcode( 'tp_special_offer_shortcodes', array(&$this, 'actionTable'));
    }

    public function actionTable($args = array())
    {
        /*
        return $this->view->renderTable($data);*/
        $data = $this->model->getDataTable($args);
        //var_dump(11);
        if(!$data) return false;
        var_dump($data);
    }

}