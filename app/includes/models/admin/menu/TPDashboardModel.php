<?php
/**
 * Created by PhpStorm.
 * User: freeman
 * Date: 10.08.15
 * Time: 16:37
 */
namespace app\includes\models\admin\menu;
class TPDashboardModel {
    public $balance;
    public $detailed_sales;
    public $rss;
    public $rssEn;
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
        $this->rssEn = $this->tpGetXmlRssEN();
    }

    /**
     * @return array|bool
     */
    public function tpGetBalance(){
        $cacheKey = TPOPlUGIN_NAME."_TPBalance";
        $TPBalance = array();
        if ( false === ( $TPBalance = get_transient($cacheKey) ) ) {
          //  error_log('tpGetBalance');
            //$TPBalance['time'] = current_time('timestamp',1);
            $return = \app\includes\TPPlugin::$TPRequestApi->get_balance();
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
        $cacheKey = TPOPlUGIN_NAME."_TPDetailedSales";
        $TPDetailedSales = array();
        if ( false === ( $TPDetailedSales = get_transient($cacheKey) ) ) {
           // error_log('tpGetDetailedSales');
            $TPDetailedSales['current_month'] = \app\includes\TPPlugin::$TPRequestApi->get_detailed_sales();
            if( !$TPDetailedSales['current_month'])
                return false;
            $TPDetailedSales['last_month'] = \app\includes\TPPlugin::$TPRequestApi->get_detailed_sales(array('date' => date("Y-m-d",mktime(0,0,0,date("n"),0,date("Y")))));
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
        $cacheKey = TPOPlUGIN_NAME."_TPRssNew";
        $TPRss = array();
        if ( false === ( $TPRss = get_transient($cacheKey) ) ) {
           // error_log('tpGetXmlRss');
            try {
                $sxml = @simplexml_load_file("http://blog.travelpayouts.com/feed/", 'SimpleXMLElement', LIBXML_NOCDATA);
                if ($sxml !== false) {
                    $TPRss['data'] = \app\includes\TPPlugin::$TPRequestApi->objectToArray($sxml->channel);
                    set_transient($cacheKey, $TPRss, HOUR_IN_SECONDS * 12);
                }
            }   catch (Exception $e) {

            }

        }
        //error_log(print_r($TPRss,true));
        return $TPRss;
    }
    /**
     * @return array
     */
    public function tpGetXmlRssEN(){
        $cacheKey = TPOPlUGIN_NAME."_TPRssNewEN";
        $TPRssEn = array();
        if ( false === ( $TPRssEn = get_transient($cacheKey) ) ) {
            //error_log('tpGetXmlRssEN');
            try {
                $sxml = @simplexml_load_file("http://feeds.feedburner.com/TravelpayoutsBlog", 'SimpleXMLElement', LIBXML_NOCDATA);
                if ($sxml !== false) {
                    $TPRssEn['data'] =
                        \app\includes\TPPlugin::$TPRequestApi->objectToArray($sxml->channel);
                    set_transient($cacheKey, $TPRssEn, HOUR_IN_SECONDS * 12);
                }
            }   catch (Exception $e) {

            }

        }
        //error_log('tpGetXmlRssEN = '.print_r($TPRssEn,true));
        return $TPRssEn;
    }

}