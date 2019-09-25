<?php
/**
 * Created by PhpStorm.
 * User: freeman
 * Date: 13.08.15
 * Time: 11:32
 */
namespace app\includes\controllers\site;
use core\controllers\TPOShortcodesController;

abstract class TPShortcodesController extends TPOShortcodesController{
    public function action($args = [])
    {
        // TODO: Implement action() method.
        $data = $this->model->get_data($args);
        if ($data['return_url'] == true){
            return print_r($data['rows'], true);
        }
        return $this->render($data);
    }
    public function render($data)
    {
        // TODO: Implement render() method.
        //if(!$data) return false;
        return $this->view->renderTable($data);
    }

}
