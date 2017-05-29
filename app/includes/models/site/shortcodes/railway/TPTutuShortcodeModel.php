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

		return array(
			'rows' => $return,
			'title' => $title,
			'city' => $city,
			'city_label' => $city_label,
			'off_title' => $off_title,
			'location_id' => $city,
			'check_in' => false,
			'check_out' => false,
			'star' => $star,
			'rating_from' => $rating_from,
			'rating_to' => $rating_from,
			'distance_from' => $distance_from,
			'distance_to' => $distance_to,
			'limit' => $number_results,
			'currency' => $currency,
			'return_url' => $return_url,
			'shortcode' => 1,
			'type_selections' => $type_selections,
			'type_selections_label_ru' => $type_selections_label_ru,
			'type_selections_label_en' => $type_selections_label_en,
			'type_selections_label' => $type_selections_label,
			'subid' => $subid,
			'paginate' => $paginate,
			'link_without_dates' => $link_without_dates,

		);
	}
}