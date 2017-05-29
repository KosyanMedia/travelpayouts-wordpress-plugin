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
			'destination' => false,
			'return_url' => false
		);
		extract( wp_parse_args( $args, $defaults ), EXTR_SKIP );
		if (!$origin || empty($origin)){
			echo $this->get_error('origin');
			return false;
		}elseif (!$destination || empty($destination)){
			echo $this->get_error('destination');
			return false;
		} else {
			$origin = "departureStation={$origin}";
			$destination = "arrivalStation={$destination}";
		}
		$requestURL = self::getApiUrl()."/travelpayouts/?{$origin}&{$destination}";
		if ($return_url == true){
			return $requestURL;
		}
		return $this->request($requestURL);
	}

	/**
	 * @param $string
	 *
	 * @return array
	 */
	public function request($string)
	{
		$response = wp_remote_get( $string, array('headers' => array(
			'Accept-Encoding' => 'gzip, deflate',
		)) );
		$body = wp_remote_retrieve_body($response);
		$json = json_decode( $body );
		if( ! is_wp_error( $json ))
			return $this->objectToArray($json);
	}
}