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
	const TP_API_URL_ALTERNATIVE = 'https://suggest.travelpayouts.com';

	public static function getInstance()
	{
		// TODO: Implement getInstance() method.
		if (null === self::$instance) {
			self::$instance = new self();
		}
		return self::$instance;
	}

	public static function getApiUrl(){
		return self::TP_API_URL_ALTERNATIVE;
	}

	/**
     * https://suggest.travelpayouts.com/search?service=tutu_trains&term=2060150&term2=2000000
	 * @param array $args
     * @return string|array
	 */
    public function getTutu($args = array())
    {
        $defaults = array(
            'origin' => false,
            'destination' => false,
            'return_url' => false
        );

        $attributes = array_merge($defaults, wp_parse_args($args, $defaults));
        if (!isset($attributes['origin']) && $attributes['origin']) {
            echo $this->get_error('origin');
            return false;
        }
        if (!isset($attributes['destination']) && $attributes['destination']) {
            echo $this->get_error('destination');
            return false;
        }
        $requestParams = array(
            'service' => 'tutu_trains',
            'term' => $attributes['origin'],
            'term2' => $attributes['destination'],
        );

        $requestQuery = http_build_query($requestParams);
        $requestURL = self::getApiUrl() . '/search?' . $requestQuery;
        if (isset($attributes['return_url']) && $attributes['return_url'] == true) {
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
            'Accept-Language'=> '*'
		)) );
		$body = wp_remote_retrieve_body($response);
		$json = json_decode( $body );
		if( ! is_wp_error( $json ))
			return $this->objectToArray($json);
	}
}