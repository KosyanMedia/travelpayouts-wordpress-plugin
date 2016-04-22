<?php
/**
 * Created by PhpStorm.
 * User: freeman
 * Date: 13.08.15
 * Time: 13:05
 */
namespace app\includes\controllers\site;
abstract class TPWigetsShortcodesController extends \core\controllers\TPOShortcodesController{
    public $view;
    public function __construct(){
        parent::__construct();
        $this->view = new \app\includes\views\site\widgets\TPWidgetsView();
    }

    public function action($args = array())
    {
        // TODO: Implement action() method.
        return $this->render($args);
    }
}