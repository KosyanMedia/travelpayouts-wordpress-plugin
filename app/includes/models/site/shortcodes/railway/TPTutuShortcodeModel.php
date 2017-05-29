<?php

/**
 * Created by PhpStorm.
 * User: solomashenko
 * Date: 29.05.17
 * Time: 22:41
 */
namespace app\includes\models\site\shortcodes\railway;

use app\includes\models\site\TPRailwayShortcodeModel;

class TPTutuShortcodeModel extends TPRailwayShortcodeModel {

	public function get_data( $args = array() ) {
		// TODO: Implement get_data() method.
	}

	public function getDataTable($args = array()){
		$defaults = array(
			'city' => false,
			'city_label' => false,
			'title' => '',
			'paginate' => true,
			'off_title' => '',
			'type' => 'all',
			'day' => 3,
			'star' => 'all',
			'rating_from' => 7,
			'rating_to' => 10,
			'distance_from' => 0,
			'distance_to' => 3,
			'number_results' => 20,
			'currency' => TPCurrencyUtils::getDefaultCurrency(),
			'return_url' => false,
			'language' => TPLang::getLang(),
			'type_selections' => 'popularity',
			'type_selections_label_ru' => '',
			'type_selections_label_en' => '',
			'type_selections_label' => '',
			'subid' => '',
			'link_without_dates' => $linkWithoutDates,
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