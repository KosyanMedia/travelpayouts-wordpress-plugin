<?php
/**
 * Created by PhpStorm.
 * User: freeman
 * Date: 13.08.15
 * Time: 12:31
 * 8. Популярные направления из города
 */
namespace app\includes\controllers\site\shortcodes;
use app\includes\controllers\site\TPShortcodesController;
use app\includes\models\site\shortcodes\TPPopularRoutesFromCityShortcodeModel;
use app\includes\views\site\shortcodes\TPShortcodeView;

class TPPopularRoutesFromCityShortcodeController extends TPShortcodesController{

    public $model;
    public $view;
    public function __construct(){
        parent::__construct();
        $this->model = new TPPopularRoutesFromCityShortcodeModel();
        $this->view = new TPShortcodeView();
    }
    public function initShortcode()
    {
        // TODO: Implement initShortcode() method.
        add_shortcode( 'tp_popular_routes_from_city_shortcodes', [&$this, 'action']);
        $method = __CLASS__. ' -> ' . __METHOD__. ' -> ' .__LINE__
            . ' 8. Популярные направления из города ';
        if(TPOPlUGIN_ERROR_LOG)
            error_log($method);
    }
}
