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
//use \app\includes\models\site\shortcodes\hotels\TPHotelsCityPriceFromToShortcodeModel;

class TPHotelsSelectionsShortcodeController extends TPShortcodesController
{
    public $model;
    public $view;
    public function __construct(){
        parent::__construct();
        //$this->model = new TPHotelsCityPriceFromToShortcodeModel();
        //$this->view = new \app\includes\views\site\shortcodes\TPShortcodeView();
    }

    public function initShortcode()
    {
        // TODO: Implement initShortcode() method.
        add_shortcode( 'tp_hotels_selections_shortcodes', array(&$this, 'actionTable'));
    }
    public function actionTable($args = array())
    {
        //$data = $this->model->getDataTable($args);

        //return print_r($data);
        //return var_dump("<pre>", $data, "</pre>");
    }
}