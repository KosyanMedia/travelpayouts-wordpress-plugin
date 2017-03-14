<?php
/**
 * Created by PhpStorm.
 * User: solomashenko
 * Date: 24.01.17
 * Time: 16:22
 * подборки отелей
 */

namespace app\includes\controllers\site\shortcodes\hotels;

use \app\includes\controllers\site\TPShortcodesController;
use \app\includes\models\site\shortcodes\hotels\TPHotelsSelectionsShortcodeModel;

class TPHotelsSelectionsShortcodeController extends TPShortcodesController
{
    public $model;
    public $view;
    public function __construct(){
        parent::__construct();
        $this->model = new TPHotelsSelectionsShortcodeModel();
        //$this->view = new \app\includes\views\site\shortcodes\TPShortcodeView();
    }

    public function initShortcode()
    {
        // TODO: Implement initShortcode() method.
        // Подборка отелей - Скидки
        add_shortcode( 'tp_hotels_selections_discount_shortcodes', array(&$this, 'actionTableDiscount'));
        // Подборки отелей на даты
        add_shortcode( 'tp_hotels_selections_date_shortcodes', array(&$this, 'actionTableDate'));
    }

    /**
     * Подборка отелей - Скидки
     * @param array $args
     */
    public function actionTableDiscount($args = array())
    {
        $data = $this->model->getDataTable($args);
        return var_dump("<pre>", $data, "</pre>");
    }

    /**
     * Подборки отелей на даты
     * @param array $args
     */
    public function actionTableDate($args = array())
    {
        $data = $this->model->getDataTable($args);
        return var_dump("<pre>", $data, "</pre>");
    }

}