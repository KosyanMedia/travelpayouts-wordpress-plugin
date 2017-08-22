<?php

/**
 * Created by PhpStorm.
 * User: solomashenko
 * Date: 29.05.17
 * Time: 22:41
 */
namespace app\includes\models\site\shortcodes\railway;

use app\includes\common\TPAutocompleteReplace;
use app\includes\models\site\TPRailwayShortcodeModel;
use \app\includes\common\TPCurrencyUtils;
use \app\includes\common\TPLang;
use app\includes\TPPlugin;

class TPTutuShortcodeModel extends TPRailwayShortcodeModel {

	public function get_data( $args = array() ) {
		// TODO: Implement get_data() method.
		$defaults = array(
			'origin' => false,
			'destination' => false,
			'currency' => TPCurrencyUtils::getDefaultCurrency(),
			'return_url' => false,
			'language' => TPLang::getLang(),
			'shortcode' => 1,
		);
		extract( wp_parse_args( $args, $defaults ), EXTR_SKIP );
		$attr = array(
			'origin' => $origin,
			'destination' => $destination,
			'currency' => $currency,
			'return_url' => $return_url,
			'language' => $language,
			'shortcode' => $shortcode,
		);

		$cacheKey = "railway_1_tutu_{$origin}_{$destination}_{$shortcode}";

		if($this->cacheSecund() && $return_url == false){
			if ( false === ($rows = get_transient($this->cacheKey($cacheKey, '', $widget)))) {
				$return = self::$TPRequestApi->getTutu($attr);
				$rows = array();
				$cacheSecund = 0;
				if( ! $return ) {
					$rows = array();
					$cacheSecund = $this->cacheEmptySecund();
				} else {
					$rows = $return;
					$rows = array_shift($rows);
					$rows = $this->setStation($rows);
					$cacheSecund = $this->cacheSecund();
				}
				set_transient( $this->cacheKey($cacheKey, '', $widget) , $rows, $cacheSecund);
			}

		} else {
			$rows = self::$TPRequestApi->getTutu($attr);
			if (!$rows){
				return false;
			}
			if ($return_url == false){
				$rows = array();
				$rows = array_shift($rows);
				$rows = $this->setStation($rows);
			}

		}

		return $rows;
	}

	public function setStation($rows){
		if(count($rows) < 1 || $rows == false) return array();
		foreach ($rows as $key => $row){
			if (array_key_exists('departureStation', $row)) {
                $row['departureStationCode'] = $row['departureStation'];
				$row['departureStation'] = TPAutocompleteReplace::replaceNumberRailway($row['departureStation']);
			}
			if (array_key_exists('arrivalStation', $row)) {
                $row['arrivalStationCode'] = $row['arrivalStation'];
				$row['arrivalStation'] = TPAutocompleteReplace::replaceNumberRailway($row['arrivalStation']);
			}
			if (array_key_exists('runDepartureStation', $row)) {
                $row['runDepartureStationCode'] = $row['runDepartureStation'];
				$row['runDepartureStation'] = TPAutocompleteReplace::replaceNumberRailway($row['runDepartureStation']);
			}
			if (array_key_exists('runArrivalStation', $row)) {
                $row['runArrivalStationCode'] = $row['runArrivalStation'];
				$row['runArrivalStation'] = TPAutocompleteReplace::replaceNumberRailway($row['runArrivalStation']);
			}
			$rows[$key] = $row;
		}
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
			'language' => TPLang::getLang(),
            'widget' => 0
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
            'widget' => $widget
		));
		$originTitle = '';
		$destinationTitle = '';
		$originTitle = TPAutocompleteReplace::replaceNumberRailway($origin);
		$destinationTitle = TPAutocompleteReplace::replaceNumberRailway($destination);
		return array(
			'rows' => $return,
			'origin' => $origin,
			'destination' => $destination,
			'origin_title' => $originTitle,
			'destination_title' => $destinationTitle,
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