<?php
/**
 * Created by PhpStorm.
 * User: freeman
 * Date: 13.08.15
 * Time: 13:05
 */

abstract class TPWigetsShortcodesController extends KPDShortcodesController{
    public $view;
    public function __construct(){
        parent::__construct();
        $this->view = new TPWidgetsView();
    }
    public function action($args = array())
    {
        // TODO: Implement action() method.
        return $this->render($args);
    }
}