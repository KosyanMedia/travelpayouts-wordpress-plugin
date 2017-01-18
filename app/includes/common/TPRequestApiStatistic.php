<?php
/**
 * Created by PhpStorm.
 * User: romansolomashenko
 * Date: 18.01.17
 * Time: 2:08 PM
 */

namespace app\includes\common;


class TPRequestApiStatistic extends TPRequestApi
{

    const TP_API_URL_2 = 'https://api.travelpayouts.com/v2';
    private static $instance = null;
    public static function getApiUrl2(){
        return self::TP_API_URL_2;
    }
    public static function getInstance()
    {
        // TODO: Implement getInstance() method.
        if (null === self::$instance) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    public function get_balance($args = array()){
        if(!$this->isStatus()){
            return false;
        }
        $request_string = self::getApiUrl2()."/statistics/balance";
        return $this->objectToArray($this->request_two($request_string));
    }
    public function get_detailed_sales($args = array()){
        if(!$this->isStatus()){
            return false;
        }
        $defaults = array(
            'date' => date("Y-m-d")
        );
        extract( wp_parse_args( $args, $defaults ), EXTR_SKIP );
        $request_string = self::getApiUrl2()."/statistics/detailed-sales?group_by=date_marker&month="
            . $date . "&host_filter=null&marker_filter=null";
        return $this->objectToArray($this->request_two($request_string));
    }
    public function get_payments(){
        $request_string = self::getApiUrl2()."/statistics/payments";
        return $this->objectToArray($this->request_two($request_string));
    }
}