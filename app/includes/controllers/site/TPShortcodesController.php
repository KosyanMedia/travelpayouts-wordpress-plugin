<?php
/**
 * Created by PhpStorm.
 * User: freeman
 * Date: 13.08.15
 * Time: 11:32
 */

abstract class TPShortcodesController extends KPDShortcodesController{
    public function action($args = array())
    {
        // TODO: Implement action() method.
        $data = $this->model->get_data($args);
        return $this->render($data);
    }
    public function render($data)
    {
        // TODO: Implement render() method.
        if(!$data) return false;
        return $this->view->tpReturnOutputTable($data);
    }
}