<?php
/**
 * Created by PhpStorm.
 * User: romansolomashenko
 * Date: 14.03.17
 * Time: 3:23 PM
 *
 * Подборки отелей на даты
 *
 */

namespace app\includes\controllers\site\shortcodes\hotels;

use \app\includes\controllers\site\TPShortcodesController;
use \app\includes\models\site\shortcodes\hotels\TPHotelsSelectionsDateShortcodeModel;

class TPHotelsSelectionsDateShortcodeController extends TPShortcodesController
{

    public $model;
    public $view;
    public function __construct(){
        parent::__construct();
        $this->model = new TPHotelsSelectionsDateShortcodeModel();
        //$this->view = new \app\includes\views\site\shortcodes\TPShortcodeView();
    }

    public function initShortcode()
    {
        // TODO: Implement initShortcode() method.
        // Подборки отелей на даты
        add_shortcode( 'tp_hotels_selections_date_shortcodes', array(&$this, 'actionTable'));
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