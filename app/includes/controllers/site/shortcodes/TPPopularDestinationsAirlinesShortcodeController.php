<?php
/**
 * Created by PhpStorm.
 * User: freeman
 * Date: 13.08.15
 * Time: 11:51
 */
namespace app\includes\controllers\site\shortcodes;
use app\includes\controllers\site\TPShortcodesController;
use app\includes\models\site\shortcodes\TPPopularDestinationsAirlinesShortcodeModel;
use app\includes\views\site\shortcodes\TPShortcodeView;

class TPPopularDestinationsAirlinesShortcodeController extends TPShortcodesController{
    public $model;
    public $view;
    public function __construct(){
        parent::__construct();
        $this->model = new TPPopularDestinationsAirlinesShortcodeModel();
        $this->view = new TPShortcodeView();
    }
    public function initShortcode()
    {
        // TODO: Implement initShortcode() method.
        add_shortcode( 'tp_popular_destinations_airlines_shortcodes', [&$this, 'action']);
    }

}
