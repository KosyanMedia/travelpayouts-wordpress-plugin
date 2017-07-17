<?php
/**
 * Created by PhpStorm.
 * User: solomashenko
 * Date: 23.05.17
 * Time: 14:17
 */

namespace app\includes\controllers\site\shortcodes\railway;


use app\includes\controllers\site\TPShortcodesController;
use app\includes\models\site\shortcodes\railway\TPTutuShortcodeModel;
use app\includes\views\site\shortcodes\TPRailwayShortcodeView;

class TPTutuShortcodeController extends TPShortcodesController {

	public $model;
	public $view;
	public function __construct(){
		parent::__construct();
		$this->model = new TPTutuShortcodeModel();
		$this->view = new TPRailwayShortcodeView();

	}
	public function initShortcode() {
		// TODO: Implement initShortcode() method.
		//Таблица "ЖД"
		add_shortcode( 'tp_tutu', array(&$this, 'actionTable'));
	}

	public function actionTable($args = array())
	{

		$data = $this->model->getDataTable($args);
		if ($data['return_url'] == true){
			return var_dump("<pre>", $data, "</pre>");
		}
		return $this->view->renderTable($data);
	}



}