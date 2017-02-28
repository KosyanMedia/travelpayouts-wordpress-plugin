<?php
/**
 * Created by PhpStorm.
 * User: romansolomashenko
 * Date: 19.01.17
 * Time: 5:10 PM
 * Таблица "Отели Города по цене ОТ-ДО"
 */

namespace app\includes\controllers\site\shortcodes\hotels;

use \app\includes\controllers\site\TPShortcodesController;
use \app\includes\models\site\shortcodes\hotels\TPHotelsCityPriceFromToShortcodeModel;

class TPHotelsCityPriceFromToShortcodeController extends TPShortcodesController
{

    public $model;
    public $view;
    public function __construct(){
        parent::__construct();
        $this->model = new TPHotelsCityPriceFromToShortcodeModel();
        //$this->view = new \app\includes\views\site\shortcodes\TPShortcodeView();
    }
    public function initShortcode()
    {
        // TODO: Implement initShortcode() method.
        //Таблица "Отели Города по цене ОТ-ДО"
        add_shortcode( 'tp_hotels_city_price_from_to_shortcodes', array(&$this, 'actionTable'));
    }
    public function actionTable($args = array())
    {
        $data = $this->model->getDataTable($args);

        return var_dump("<pre>", $data, "</pre>");
    }
}