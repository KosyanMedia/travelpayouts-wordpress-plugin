<?php
/**
 * Created by PhpStorm.
 * User: freeman
 * Date: 10.08.15
 * Time: 16:37
 */
namespace app\includes\models\admin\menu;
use app\includes\models\admin\TPStatModel;


class TPDashboardModel extends TPStatModel {
    public $balance;
    public $detailed_sales;
    public $rss;
    public $rssEn;
    protected $status;
    public function __construct(){
        parent::__construct();


        if (!isset(\app\includes\TPPlugin::$options['config']['statistics'])
            && self::$TPRequestApi->isStatus() == true){
	        $page = isset($_GET['page']) ? $_GET['page'] : null ;
        	if ($page == 'travelpayouts'){
		        add_action( 'admin_init', array( &$this, 'setData' ) );
	        }

        }



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
        $method = __CLASS__." -> ". __METHOD__." -> ".__LINE__;
        $name_method = "***************".__METHOD__."***************";
        if(TPOPlUGIN_ERROR_LOG)
            error_log($name_method." start");
        $cacheKey = TPOPlUGIN_NAME."_TPBalance";
        $TPBalance = array();
        if ( false === ( $TPBalance = get_transient($cacheKey) ) ) {
            if(TPOPlUGIN_ERROR_LOG)
                error_log($method." cache false get api put cache");
          //  error_log('tpGetBalance');
            //$TPBalance['time'] = current_time('timestamp',1);
            $return = self::$TPRequestApi->get_balance();
            //if( ! $return )
            //    return false;
            if( ! $return )
                $return = array();
            $TPBalance['data'] = $return;
            set_transient( $cacheKey, $TPBalance, MINUTE_IN_SECONDS * 15);
        } else {
            if(TPOPlUGIN_ERROR_LOG)
                error_log($method." cache");
        }
        if(TPOPlUGIN_ERROR_LOG)
            error_log($name_method." end");
        return $TPBalance;
    }

    /**
     * @return array
     */
    public function tpGetDetailedSales(){
        $method = __CLASS__." -> ". __METHOD__." -> ".__LINE__;
        $name_method = "***************".__METHOD__."***************";
        if(TPOPlUGIN_ERROR_LOG)
            error_log($name_method. " Start");
        $cacheKey = TPOPlUGIN_NAME."_TPDetailedSales";
        $TPDetailedSales = array();
        if ( false === ( $TPDetailedSales = get_transient($cacheKey) ) ) {
            if(TPOPlUGIN_ERROR_LOG)
                error_log($method." cache false get api put cache");
           // error_log('tpGetDetailedSales');
            $TPDetailedSales['current_month'] = self::$TPRequestApi->get_detailed_sales();
            if( !$TPDetailedSales['current_month'])
                return false;
            $TPDetailedSales['last_month'] = self::$TPRequestApi->get_detailed_sales(
                array(
                    'date' => date("Y-m-d",mktime(0,0,0,date("n"),0,date("Y"))
                    )
                ));
           // if( !$TPDetailedSales['last_month'])
            //    return false;
            if( ! $TPDetailedSales['last_month'] )
                $TPDetailedSales['last_month'] = array();
            $TPDetailedSales['time'] = current_time('timestamp',0);
            set_transient( $cacheKey, $TPDetailedSales, MINUTE_IN_SECONDS * 15);
        }else {
            if(TPOPlUGIN_ERROR_LOG)
                error_log($method." cache");
        }
        if(TPOPlUGIN_ERROR_LOG)
            error_log($name_method." end");
        return $TPDetailedSales;
    }

    /**
     * @return array
     */
    public function tpGetXmlRss(){
        $method = __CLASS__." -> ". __METHOD__." -> ".__LINE__;
        $name_method = "***************".__METHOD__."***************";
        if(TPOPlUGIN_ERROR_LOG)
            error_log($name_method. " Start");
        $cacheKey = TPOPlUGIN_NAME."_TPRssNew";
        $TPRss = array();
        if ( false === ( $TPRss = get_transient($cacheKey) ) ) {
            if(TPOPlUGIN_ERROR_LOG)
                error_log($method." cache false get api put cache");
           // error_log('tpGetXmlRss');
            try {
                $sxml = @simplexml_load_file("http://blog.travelpayouts.com/feed/", 'SimpleXMLElement', LIBXML_NOCDATA);
                if ($sxml !== false) {
                    $TPRss['data'] = self::$TPRequestApi->objectToArray($sxml->channel);
                    set_transient($cacheKey, $TPRss, HOUR_IN_SECONDS * 12);
                } else {
                    $TPRss['data'] = array();
                    set_transient($cacheKey, $TPRss, MINUTE_IN_SECONDS * 15);
                }
            }   catch (Exception $e) {

            }

        } else {
            if(TPOPlUGIN_ERROR_LOG)
                error_log($method." cache");
        }
        if(TPOPlUGIN_ERROR_LOG)
            error_log($name_method." End");
        //error_log(print_r($TPRss,true));
        return $TPRss;
    }
    /**
     * @return array
     */
    public function tpGetXmlRssEN(){
        $method = __CLASS__." -> ". __METHOD__." -> ".__LINE__;
        $name_method = "***************".__METHOD__."***************";
        if(TPOPlUGIN_ERROR_LOG)
            error_log($name_method. " Start");
        $cacheKey = TPOPlUGIN_NAME."_TPRssNewEN";
        $TPRssEn = array();
        if ( false === ( $TPRssEn = get_transient($cacheKey) ) ) {
            if(TPOPlUGIN_ERROR_LOG)
                error_log($method." cache false get api put cache");
            //error_log('tpGetXmlRssEN');
            try {
                $sxml = @simplexml_load_file("http://feeds.feedburner.com/TravelpayoutsBlog", 'SimpleXMLElement', LIBXML_NOCDATA);
                if ($sxml !== false) {
                    $TPRssEn['data'] =
                        self::$TPRequestApi-> objectToArray($sxml->channel);
                    set_transient($cacheKey, $TPRssEn, HOUR_IN_SECONDS * 12);
                } else {
                    $TPRssEn['data'] = array();
                    set_transient($cacheKey, $TPRssEn, MINUTE_IN_SECONDS * 15);
                }
            }   catch (Exception $e) {

            }

        } else {
            if(TPOPlUGIN_ERROR_LOG)
                error_log($method." cache");
        }
        if(TPOPlUGIN_ERROR_LOG)
            error_log($name_method. " End");
        //error_log('tpGetXmlRssEN = '.print_r($TPRssEn,true));
        return $TPRssEn;
    }

}