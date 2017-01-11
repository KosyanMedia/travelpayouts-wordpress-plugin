<?php

/**
 * Created by PhpStorm.
 * User: romansolomashenko
 * Date: 10.01.17
 * Time: 8:07 PM
 */
namespace app\includes\controllers\site\shortcodes\hotels;

use \app\includes\controllers\site\TPShortcodesController;
use \app\includes\models\site\shortcodes\hotels\TPCostLivingCityWeekendShortcodeModel;

class TPCostLivingCityWeekendShortcodeController  extends TPShortcodesController
{

    public $model;
    public $view;
    public function __construct(){
        parent::__construct();
        $this->model = new TPCostLivingCityWeekendShortcodeModel();
        //$this->view = new \app\includes\views\site\shortcodes\TPShortcodeView();
    }
    public function initShortcode()
    {
        // TODO: Implement initShortcode() method.
        add_shortcode( 'tp_cost_living_city_weekend_shortcodes', array(&$this, 'actionTable'));
    }

    public function actionTable($args = array())
    {
        $data = $this->model->getDataTable($args);
        //if(!$data) return false;
        //return $this->view->renderTable($data);
        return var_dump($data);
    }
}