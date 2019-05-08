<?php
/**
 * Created by PhpStorm.
 * User: freeman
 * Date: 13.08.15
 * Time: 12:47
 */

namespace app\includes\controllers\site\shortcodes;
class TPFromOurCityFlyShortcodeController extends \app\includes\controllers\site\TPShortcodesController
{
    public $model;
    public $view;

    public function __construct()
    {
        parent::__construct();
        $this->model = new \app\includes\models\site\shortcodes\TPFromOurCityFlyShortcodeModel();
        $this->view = new \app\includes\views\site\shortcodes\TPShortcodeView();
    }

    public function initShortcode()
    {
        // TODO: Implement initShortcode() method.
        add_shortcode('tp_from_our_city_fly_shortcodes', array(&$this, 'actionTable'));
        add_shortcode('tp_from_our_city_fly_shortcodes_max_price', array(&$this, 'actionMaxPrice'));
        add_shortcode('tp_from_our_city_fly_shortcodes_min_price', array(&$this, 'actionMinPrice'));
    }

    public function actionTable($args = [])
    {
        $data = $this->model->getDataTable($args);

        if ($data['return_url'] == true) {
            return print_r($data['rows'], true);
        }
        return !isset($data['rows']['errors']) ? $this->view->renderTable($data) : false;
    }

    public function actionMaxPrice($args = [])
    {
        $data = $this->model->getMaxPrice($args);
        if (!$data) return false;
        extract($data, EXTR_SKIP);
        return $this->view->renderPrice($price, $currency);
    }

    public function actionMinPrice($args = [])
    {
        $data = $this->model->getMinPrice($args);
        if (!$data) return false;
        extract($data, EXTR_SKIP);
        return $this->view->renderPrice($price, $currency);
    }

}
