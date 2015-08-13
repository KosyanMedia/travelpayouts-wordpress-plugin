<?php
/**
 * Created by PhpStorm.
 * User: freeman
 * Date: 10.08.15
 * Time: 16:37
 */

class TPDashboardModel {
    public $balance;
    public $detailed_sales;
    public $rss;
    public function __construct(){
        add_action( 'admin_init', array( &$this, 'setData' ) );
    }

    /**
     *
     */
    public function setData(){
        $this->balance = $this->tpGetBalance();
        $this->detailed_sales = $this->tpGetDetailedSales();
        $this->rss = $this->tpGetXmlRss();
    }

    /**
     * @return array|bool
     */
    public function tpGetBalance(){
        $cacheKey = KPDPlUGIN_NAME."_TPBalance";
        $TPBalance = array();
        if ( false === ( $TPBalance = get_transient($cacheKey) ) ) {
            //$TPBalance['time'] = current_time('timestamp',1);
            $return = TPPlugin::$TPRequestApi->get_balance();
            if( ! $return )
                return false;
            $TPBalance['data'] = $return;
            set_transient( $cacheKey, $TPBalance, MINUTE_IN_SECONDS * 10);
        }
        return $TPBalance;
    }

    /**
     * @return array
     */
    public function tpGetDetailedSales(){
        $cacheKey = KPDPlUGIN_NAME."_TPDetailedSales";
        $TPDetailedSales = array();
        if ( false === ( $TPDetailedSales = get_transient($cacheKey) ) ) {
            $TPDetailedSales['current_month'] = TPPlugin::$TPRequestApi->get_detailed_sales();
            if( !$TPDetailedSales['current_month'])
                return false;
            $TPDetailedSales['last_month'] = TPPlugin::$TPRequestApi->get_detailed_sales(array('date' => date("Y-m-d",mktime(0,0,0,date("n"),0,date("Y")))));
            if( !$TPDetailedSales['last_month'])
                return false;
            $TPDetailedSales['time'] = current_time('timestamp',0);
            set_transient( $cacheKey, $TPDetailedSales, MINUTE_IN_SECONDS * 10);
        }
        return $TPDetailedSales;
    }

    /**
     * @return array
     */
    public function tpGetXmlRss(){
        $cacheKey = KPDPlUGIN_NAME."_TPRssNew";
        $TPRss = array();
        if ( false === ( $TPRss = get_transient($cacheKey) ) ) {
            $sxml = simplexml_load_file("http://blog.travelpayouts.com/feed", 'SimpleXMLElement', LIBXML_NOCDATA);
            //$TPRss['time'] = current_time('timestamp',1);
            $TPRss['data'] = TPPlugin::$TPRequestApi->objectToArray($sxml->channel);
            set_transient( $cacheKey, $TPRss, HOUR_IN_SECONDS * 12);
        }
        //error_log(print_r($TPRss,true));
        return $TPRss;
    }

}