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
		$defaults = array(
			'id' => false,
			'check_in' => false,
			'check_out' => false,
			'currency' => TPCurrencyUtils::getDefaultCurrency(),
			'language' => TPLang::getLang(),
			'limit' => 5,
			'type' => 'popularity',
			'return_url' => false
		);
		extract( wp_parse_args( $args, $defaults ), EXTR_SKIP );
		$attr = array(
			'id' => $id,
			'check_in' => false,
			'check_out' => false,
			'currency' => $currency,
			'language' => $language,
			'limit' => $limit,
			'type' => $type,
			'return_url' => $return_url
		);

		$cacheKey = "hotel_1_selections_discount_{$currency}_{$language}_{$limit}_{$type}_{$id}";
		//error_log($cacheKey);

		if($this->cacheSecund() && $return_url == false){
			if ( false === ($rows = get_transient($this->cacheKey($cacheKey)))) {
				$return = self::$TPRequestApi->getHotelSelection($attr);
				$rows = array();
				$cacheSecund = 0;
				if( ! $return ) {
					$rows = array();
					$cacheSecund = $this->cacheEmptySecund();
				} else {
					$rows = $return;
					$rows = array_shift($rows);
					$cacheSecund = $this->cacheSecund('hotel');
				}
				set_transient( $this->cacheKey($cacheKey) , $rows, $cacheSecund);
			}

		} else {
			$rows = self::$TPRequestApi->getHotelSelection($attr);
			if (!$rows){
				return false;
			}
			if ($return_url == false){
				$rows = array();
				$rows = array_shift($rows);
			}

		}

		//tpErrorLog(print_r($rows, true));
		//error_log('Discount');
		//error_log(print_r($rows, true));

		return $rows;
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