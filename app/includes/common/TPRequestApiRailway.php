<?php
/**
 * Created by PhpStorm.
 * User: solomashenko
 * Date: 23.05.17
 * Time: 14:03
 */

namespace app\includes\common;


class TPRequestApiRailway extends TPRequestApi{

	private static $instance = null;
	const TP_API_URL = 'https://www.tutu.ru/poezda/api';

	public static function getInstance()
	{
		// TODO: Implement getInstance() method.
		if (null === self::$instance) {
			self::$instance = new self();
		}
		return self::$instance;
	}

	public static function getApiUrl(){
		return self::TP_API_URL;
	}

	/**
	 * https://www.tutu.ru/poezda/api/travelpayouts/?departureStation=2000000&arrivalStation=2004000
	 * @param array $args
	 */
	public function getTutu($args = array()){
		$defaults = array(
			'origin' => false,
			'destination' => false
		);
		extract( wp_parse_args( $args, $defaults ), EXTR_SKIP );
	}
}