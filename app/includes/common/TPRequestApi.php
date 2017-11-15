<?php
/**
 * Created by PhpStorm.
 * User: romansolomashenko
 * Date: 04.01.17
 * Time: 2:08 PM
 */

namespace app\includes\common;

use app\includes\common\TPCurrencyUtils;
use \app\includes\TPPlugin;

abstract class TPRequestApi implements SingletonInterface
{

    protected $status;
    protected $marker;
    protected $token;
    protected $errorJson;
    protected $calendar_types = array(
        'departure_date',
        'return_date'
    );


    protected function __construct() {
        //error_log("TPRequestApi ".get_called_class());
        if( empty( TPPlugin::$options ) ) {
            $this->setStatus(false);
        }elseif( ! isset( TPPlugin::$options['account']['marker'] ) || empty( TPPlugin::$options['account']['marker'] )
            || ! is_string( TPPlugin::$options['account']['marker'] ) ) {
            $this->setStatus(false);
        }elseif( ! isset( TPPlugin::$options['account']['token'] ) || empty( TPPlugin::$options['account']['token'] )
            || ! is_string( TPPlugin::$options['account']['token'] ) ){
            $this->setStatus(false);
        }else{
            $this->setStatus(true);
            TPCurrencyUtils::currencyValid();
            $this->setMarker(TPPlugin::$options['account']['marker']);
            $this->setToken(TPPlugin::$options['account']['token']);
            $this->setErrorJson(TPPlugin::$options['config']['message_error']);


        }
    }





    /**
     * @return boolean
     */
    public function isStatus()
    {
        return $this->status;
    }
    /**
     * @param boolean $status
     */
    public function setStatus($status)
    {
        $this->status = $status;
    }

    /**
     * @return mixed
     */
    public function getMarker()
    {
        return $this->marker;
    }

    /**
     * @param mixed $marker
     */
    public function setMarker($marker)
    {
        $this->marker = $marker;
    }

    /**
     * @return mixed
     */
    public function getToken()
    {
        return $this->token;
    }

    /**
     * @param mixed $token
     */
    public function setToken($token)
    {
        $this->token = $token;
    }

    /**
     * @param mixed $errorJson
     */
    public function setErrorJson($errorJson)
    {
        $this->errorJson = $errorJson;
    }

    /**
     * @return mixed
     */
    public function getErrorJson()
    {
        return $this->errorJson;
    }

    /**
     * object to array
     * @param $d
     * @return array
     */
    public  function objectToArray($d) {
        if (is_object($d)) {
            $d = get_object_vars($d);
        }

        if (is_array($d)) {
            return array_map(array(&$this, __FUNCTION__), $d);
        }
        else {
            return $d;
        }
    }



    /**
     * Функция которой передаётся url и которая возвращает body ответа
     **/
    public function request( $string ){
        $name_method = "***************".__METHOD__."***************";
        if(TPOPlUGIN_ERROR_LOG)
            error_log($name_method);
        $method = __CLASS__." -> ". __METHOD__." -> ".__LINE__;
        if(TPOPlUGIN_ERROR_LOG)
            error_log($method);
        $string = htmlspecialchars($string);
        //error_log($string);
        $response = wp_remote_get( $string, array('headers' => array(
            'Accept-Encoding' => 'gzip, deflate',
        )) );
        if( is_wp_error( $response ) ){
            $json = $response;
        } else {
            $json = json_decode( $response['body'] );
        }

        if( ! is_wp_error( $json ) && $json->success == true )
            return $json->data;
        if( is_wp_error( $json ) ){
            if(TPOPlUGIN_ERROR_LOG)
                error_log($method." JSON ERROR = ".print_r($this->error_json, true));
        }

        return false;
    }
    /**
     * Функция которой передаётся url и которая возвращает body ответа
     **/
    public function request_two($string){
        $string = htmlspecialchars($string);
        $response = wp_remote_get( $string, array('headers' => array(
            'Accept-Encoding' => 'gzip, deflate',
            'X-Access-Token' => $this->getToken()
        )) );
        if( is_wp_error( $response ) ){
            $json = $response;
        } else {
            $json = json_decode( $response['body'] );
        }
        if( ! is_wp_error( $json ) && $json->success == true )
            return $json->data;
        return false;
    }
    /**
     * @param $error
     * @return string|void
     */
    public function get_error( $error ) {
        $errors = array(
            'origin'        =>  _x('The variable $origin parameters not set or incorrectly.',
                'tp request api error msg origin', TPOPlUGIN_TEXTDOMAIN ),
            'destination'   =>  _x('The variable $destination parameters not set or incorrectly.',
                'tp request api error msg destination', TPOPlUGIN_TEXTDOMAIN ),
            'currency'      =>  _x('The variable $currency parameters not set or incorrectly.',
                'tp request api error msg currency', TPOPlUGIN_TEXTDOMAIN ),
            'departure_at'  =>  _x('The variable $departure_at parameters not set or incorrectly.',
                'tp request api error msg departure_at', TPOPlUGIN_TEXTDOMAIN ),
            'calendar_type' =>  _x('The variable $calendar_type parameters not set or incorrectly.',
                'tp request api error msg calendar_type', TPOPlUGIN_TEXTDOMAIN ),
            'return_at'     =>  _x('The variable $return_at parameters not set or incorrectly.',
                'tp request api error msg return_at', TPOPlUGIN_TEXTDOMAIN ),
            'airline'       =>  _x('The variable $airline parameters not set or incorrectly.',
                'tp request api error msg airline', TPOPlUGIN_TEXTDOMAIN ),
        );
        if( ! empty( $error ) && isset( $errors[$error] ) )
            return $errors[$error];
        return _x('Unknown error.',
            'tp request api error msg unknown error', TPOPlUGIN_TEXTDOMAIN );
    }

}