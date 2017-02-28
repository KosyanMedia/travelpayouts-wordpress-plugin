<?php

/**
 * Created by PhpStorm.
 * User: romansolomashenko
 * Date: 10.01.17
 * Time: 8:07 PM
 * Таблица "Стоимость проживания В ГОРОДЕ на уикенд"
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
        //Таблица "Стоимость проживания В ГОРОДЕ на уикенд"
        add_shortcode( 'tp_cost_living_city_weekend_shortcodes', array(&$this, 'actionTable'));
    }

    public function actionTable($args = array())
    {

        $data = $this->model->getDataTable($args);
        //if(!$data) return false;
        //return $this->view->renderTable($data);
        /*$d  = mktime(0, 0, 0, date("m"), date("d")+ 6 - date("N"), date("Y"));
        echo date('Y-m-d', $d).'<br>';
        echo date('Y-m-d', strtotime("next Saturday")).'<br>';
        echo date('Y-m-d', strtotime("next Sunday")).'<br>';
        //return date('w', time());*/
        return var_dump("<pre>", $data, "</pre>");

    }
}