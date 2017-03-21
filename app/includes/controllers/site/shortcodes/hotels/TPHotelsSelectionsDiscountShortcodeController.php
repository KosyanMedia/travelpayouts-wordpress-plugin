<?php
/**
 * Created by PhpStorm.
 * User: romansolomashenko
 * Date: 14.03.17
 * Time: 3:22 PM
 *
 * Подборка отелей - Скидки   Hotels collection - Discounts

 */

namespace app\includes\controllers\site\shortcodes\hotels;

use \app\includes\controllers\site\TPShortcodesController;
use \app\includes\models\site\shortcodes\hotels\TPHotelsSelectionsDiscountShortcodeModel;

class TPHotelsSelectionsDiscountShortcodeController extends TPShortcodesController
{

    public $model;
    public $view;
    public function __construct(){
        parent::__construct();
        $this->model = new TPHotelsSelectionsDiscountShortcodeModel();
        //$this->view = new \app\includes\views\site\shortcodes\TPShortcodeView();
    }

    public function initShortcode()
    {
        // TODO: Implement initShortcode() method.
        // Подборка отелей - Скидки
        add_shortcode( 'tp_hotels_selections_discount_shortcodes', array(&$this, 'actionTable'));
    }

    /**
     *
     * @param array $args
     */
    public function actionTable($args = array())
    {
        $data = $this->model->getDataTable($args);
        return var_dump("<pre>", $data, "</pre>");
    }
}