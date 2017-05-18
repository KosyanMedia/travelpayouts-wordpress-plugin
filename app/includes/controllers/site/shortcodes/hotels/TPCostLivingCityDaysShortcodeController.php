<?php
/**
 * Created by PhpStorm.
 * User: romansolomashenko
 * Date: 19.01.17
 * Time: 4:41 PM
 * Таблица "Стоимость проживания В ГОРОДЕ на Х дней"
 */

namespace app\includes\controllers\site\shortcodes\hotels;

use \app\includes\controllers\site\TPShortcodesController;
use \app\includes\models\site\shortcodes\hotels\TPCostLivingCityDaysShortcodeModel;

class TPCostLivingCityDaysShortcodeController extends TPShortcodesController
{

    public $model;
    public $view;
    public function __construct(){
        parent::__construct();
        $this->model = new TPCostLivingCityDaysShortcodeModel();
        //$this->view = new \app\includes\views\site\shortcodes\TPShortcodeView();
    }
    public function initShortcode()
    {
        // TODO: Implement initShortcode() method.
        //Таблица "Стоимость проживания В ГОРОДЕ на неделю"
        add_shortcode( 'tp_cost_living_city_days_shortcodes', array(&$this, 'actionTable'));
    }
    public function actionTable($args = array())
    {

        $data = $this->model->getDataTable($args);

        return var_dump("<pre>", $data, "</pre>");
    }
}