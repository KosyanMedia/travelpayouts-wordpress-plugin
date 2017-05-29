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
		extract( wp_parse_args( $args, $defaults ), EXTR_SKIP );
		if (!$location_id || empty($location_id)){
			echo $this->get_error('location');
			return false;
		} else {
			$location_id = "locationId={$location_id}";
		}
		$token = 'token=' .$this->getToken();
		$requestURL = self::getApiUrl()."/static/hotels.json?{$location_id}&{$token}";
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
		//$string = htmlspecialchars($string);
		$response = wp_remote_get( $string, array('headers' => array(
			'Accept-Encoding' => 'gzip, deflate',
		)) );
		/*if( is_wp_error( $response ) ){
			$json = $response;
		} else {
			$json = json_decode( $response['body'] );
		}*/
		$body = wp_remote_retrieve_body($response);
		$json = json_decode( $body );
		if( ! is_wp_error( $json ))
			return $this->objectToArray($json);
	}
}