<?php
/**
 * Created by PhpStorm.
 * User: freeman
 * Date: 13.08.15
 * Time: 11:17
 */
namespace app\includes\controllers\site\shortcodes;
class TPDirectFlightsRouteShortcodeController extends \app\includes\controllers\site\TPShortcodesController{
    public $model;
    public $view;
    public function __construct(){
        parent::__construct();
        $this->model = new \app\includes\models\site\shortcodes\TPDirectFlightsRouteShortcodeModel();
        $this->view = new \app\includes\views\site\shortcodes\TPShortcodeView();
    }
    public function initShortcode()
    {
        // TODO: Implement initShortcode() method.
        add_shortcode( 'tp_direct_flights_route_shortcodes', array(&$this, 'action'));
    }


}