<?php

/**
 * Created by PhpStorm.
 * User: solomashenko
 * Date: 29.05.17
 * Time: 22:41
 */
namespace app\includes\models\site\shortcodes\railway;

use app\includes\models\site\TPRailwayShortcodeModel;
use \app\includes\common\TPCurrencyUtils;
use \app\includes\common\TPLang;
use app\includes\TPPlugin;

class TPTutuShortcodeModel extends TPRailwayShortcodeModel {

	public function get_data( $args = array() ) {
		// TODO: Implement get_data() method.
	}

	public function getDataTable($args = array()){
		/**
		 * Откуда
		 * Куда
		 * Альтернативный заголов
		 * Пагинация
		 * Убрать заголовок
		 * Дополнительный маркер
		 */
		$defaults = array(
			'origin' => false,
			'destination' => false,
			'title' => '',
			'paginate' => true,
			'off_title' => '',
			'subid' => '',
			'currency' => TPCurrencyUtils::getDefaultCurrency(),
			'return_url' => false,
			'language' => TPLang::getLang()
		);



		extract( wp_parse_args( $args, $defaults ), EXTR_SKIP );

		if ($return_url == 1){
			$return_url = true;
		}


		$return = $this->get_data(array(
			'origin' => $origin,
			'destination' => $destination,
			'title' => $title,
			'paginate' => $paginate,
			'off_title' => $off_title,
			'subid' => $subid,
			'currency' => $currency,
			'return_url' => $return_url,
			'language' => $language,
			'shortcode' => 1,
		));


		return array(
			'rows' => $return,
			'origin' => $origin,
			'destination' => $destination,
			'title' => $title,
			'paginate' => $paginate,
			'off_title' => $off_title,
			'subid' => $subid,
			'currency' => $currency,
			'return_url' => $return_url,
			'language' => $language,
			'shortcode' => 1,
		);
	}
}