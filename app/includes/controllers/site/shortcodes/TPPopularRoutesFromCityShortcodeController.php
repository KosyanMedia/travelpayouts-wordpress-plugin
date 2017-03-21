<?php
/**
 * Created by PhpStorm.
 * User: freeman
 * Date: 13.08.15
 * Time: 12:31
 * 8. Популярные направления из города
 */
namespace app\includes\controllers\site\shortcodes;
class TPPopularRoutesFromCityShortcodeController extends \app\includes\controllers\site\TPShortcodesController{

    public $model;
    public $view;
    public function __construct(){
        parent::__construct();
        $this->model = new \app\includes\models\site\shortcodes\TPPopularRoutesFromCityShortcodeModel();
        $this->view = new \app\includes\views\site\shortcodes\TPShortcodeView();
    }
    public function initShortcode()
    {
        // TODO: Implement initShortcode() method.
        add_shortcode( 'tp_popular_routes_from_city_shortcodes', array(&$this, 'action'));
        $method = __CLASS__." -> ". __METHOD__." -> ".__LINE__
            ." 8. Популярные направления из города ";
        if(TPOPlUGIN_ERROR_LOG)
            error_log($method);
    }
}