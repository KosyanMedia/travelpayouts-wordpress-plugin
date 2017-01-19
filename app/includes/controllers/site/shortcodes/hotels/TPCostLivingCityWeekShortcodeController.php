<?php
/**
 * Created by PhpStorm.
 * User: romansolomashenko
 * Date: 19.01.17
 * Time: 4:41 PM
 * Таблица "Стоимость проживания В ГОРОДЕ на неделю"
 */

namespace app\includes\controllers\site\shortcodes\hotels;

use \app\includes\controllers\site\TPShortcodesController;
use \app\includes\models\site\shortcodes\hotels\TPCostLivingCityWeekShortcodeModel;

class TPCostLivingCityWeekShortcodeController extends TPShortcodesController
{

    public $model;
    public $view;
    public function __construct(){
        parent::__construct();
        $this->model = new TPCostLivingCityWeekShortcodeModel();
        //$this->view = new \app\includes\views\site\shortcodes\TPShortcodeView();
    }
    public function initShortcode()
    {
        // TODO: Implement initShortcode() method.
        add_shortcode( 'tp_cost_living_city_week_shortcodes', array(&$this, 'actionTable'));
    }
    public function actionTable($args = array())
    {

    }
}