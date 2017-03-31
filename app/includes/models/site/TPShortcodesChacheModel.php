<?php
/**
 * Created by PhpStorm.
 * User: freeman
 * Date: 13.08.15
 * Time: 10:37
 */
namespace app\includes\models\site;

use \app\includes\TPPlugin;

abstract class TPShortcodesChacheModel extends \core\models\TPOShortcodesCacheModel{
    public function __construct(){
        parent::__construct();
        add_filter( 'category_description',  'do_shortcode' );
        add_filter( 'term_description',  'do_shortcode' );
        add_filter( 'widget_text', 'do_shortcode');
    }
    public function cacheEmptySecund(){
        //10 minut
        return 60 * 10;
    }

    /**
     * @param string $type
     * @return bool
     */
    public function cacheSecund($type = 'flight'){
        $cacheSecund = false;
        switch ($type){
            case 'flight':
                if(TPPlugin::$options['config']['cache_value']['flight'] != 0 ) {
                    //time
                    if (!empty(TPPlugin::$options['config']['cache_value']['flight'])){
                        $cacheSecund =  HOUR_IN_SECONDS * TPPlugin::$options['config']['cache_value']['flight'];
                    } else {//default
                        $cacheSecund =  DAY_IN_SECONDS;
                    }
                } else {
                    $cacheSecund = false;
                }
                break;
            case 'hotel':
                if(TPPlugin::$options['config']['cache_value']['hotel'] != 0 ) {
                    if (!empty(TPPlugin::$options['config']['cache_value']['hotel'])){
                        $cacheSecund =  HOUR_IN_SECONDS * TPPlugin::$options['config']['cache_value']['hotel'];
                    } else {//default
                        $cacheSecund =  DAY_IN_SECONDS;
                    }
                } else {
                    $cacheSecund = false;
                }
                break;
        }
        //error_log($type);
        //error_log($cacheSecund);
        //error_log(__CLASS__);
        return $cacheSecund;
    }

    /**
     * @return bool|int
     */
    /*public function cacheSecund(){
        if(\app\includes\TPPlugin::$options['config']['cache_value'] != 0 ) {
            switch (\app\includes\TPPlugin::$options['config']['cache']) {
                case 1:
                    //time
                    if(!empty(\app\includes\TPPlugin::$options['config']['cache_value'])){
                        return HOUR_IN_SECONDS * \app\includes\TPPlugin::$options['config']['cache_value'];
                    }
                    else{//default
                        return DAY_IN_SECONDS;
                    }
                    break;
                case 0:
                    //day
                    if(!empty(\app\includes\TPPlugin::$options['config']['cache_value'])){
                        return DAY_IN_SECONDS * \app\includes\TPPlugin::$options['config']['cache_value'];
                    }
                    else{//default
                        return DAY_IN_SECONDS;
                    }
                    break;
            }
        }else{
            return false;
        }
    }*/

    /**
     * @return string
     */
    public function typeCurrency(){
        /*switch((int) \app\includes\TPPlugin::$options['local']['currency']){
            case 1:
                $currency = 'RUB';
                break;
            case 2:
                $currency = 'USD';
                break;
            case 3:
                $currency = 'EUR';
                break;
        }*/
        return \app\includes\TPPlugin::$options['local']['currency'];
    }

    /**
     * @param $data
     * @return array
     */
    public function tpSortCheapestFlightsShortcodes($data){
        $rows = array();
        foreach($data as $city => $flights){
            foreach( $flights as $key => $flight ){
                if($key < 3)
                    $rows[$city.$key] = (array)$flight;
            }
        }
        return $rows;
    }

    /**
     * @param $flights
     * @return bool
     */
    public function single_flight( $flights ) {
        $count = count( $flights );
        if( $count < 1 )
            return false;
        $price = INF;
        $cheapest;
        foreach( $flights as $key => $flight ){
            if( $flight["price"] < $price ){
                $price = $flight["price"];
                $cheapest = $flight;
            }
        }
        return $cheapest;
    }

    /**
     * @param $data
     * @param $mounth
     * @return mixed
     */
    public function tpSortCheapestTicketEachDayMonth($data, $mounth){
        foreach($data as $key=>$value){
            if(substr($key,0,7) != $mounth)
                unset($data[$key]);
            if(strtotime($value["departure_at"]) < time())
                unset($data[$key]);
        }
        return $data;
    }

    /**
     * @param $item1
     * @param $item2
     * @return int
     */
    public function cmpSortAscending($item1, $item2){
        if ($item1['value'] == $item2['value']) {
            return 0;
        }
        return ($item1['value'] < $item2['value']) ? -1 : 1;
    }

    /**
     * @param $item1
     * @param $item2
     * @return int
     */
    public function cmpSortDescending($item1, $item2){
        if ($item1['value'] == $item2['value']) {
            return 0;
        }
        return ($item1['value'] > $item2['value']) ? -1 : 1;
    }

    /**
     * @param $data
     * @param $type
     * @return mixed
     */
    public function tpSortOurCityFly($data, $type){
        switch($type){
            case "0":
                $data = $data;
                break;
            case "1":
                usort($data, array(&$this, "cmpSortDescending"));
                break;
            case "2":
                usort($data, array(&$this, "cmpSortAscending"));
                break;
        }
        return $data;
    }


    /**
     * @param $item1
     * @param $item2
     * @return int
     */
    public function cmpSort($item1, $item2){
        if($cmp = strcmp(substr($item1['depart_date'],0,10),substr($item2['depart_date'],0,10)) )
            return $cmp;
        return $item1['value'] - $item2['value']  ;
    }

    /**
     * @param $return
     * @return mixed
     */
    public function sort_dates( $return ) {
        if (!$return)
            return false;
        usort($return, array(&$this, "cmpSort"));
        $date = '';
        foreach($return as $key=>$item){
            $departure_at = substr($item['depart_date'],0,10);
            if($departure_at == $date)
                unset($return[$key]);
            else
                $date = $departure_at;
        }
        return $return;
    }

    public function iataAutocomplete($data, $type, $title = 'origin'){
        $data = \app\includes\common\TPAutocompleteReplace::iataAutocomplete($data, $type, $title);

        return $data;

    }

    public function sortTransfers($type, $rows, $stops){
        $rows_sort = array();
        switch ($type){
            case 1:

                if($rows){
                    switch($stops){
                        case 0:
                            $rows_sort = $rows;
                            break;
                        case 1:
                            foreach($rows as $value){
                                if($value['number_of_changes'] <= 1){
                                    $rows_sort[] = $value;
                                }
                            }
                            break;
                        case 2:
                            foreach($rows as $value){
                                if($value['number_of_changes'] == 0){
                                    $rows_sort[] = $value;
                                }
                            }
                            break;
                    }
                }
                break;
            case 5:
                if($rows){
                    switch($stops){
                        case 0:
                            $rows_sort = $rows;
                            break;
                        case 1:
                            foreach($rows as $value){
                                if($value['transfers'] <= 1){
                                    $rows_sort[] = $value;
                                }
                            }
                            break;
                        case 2:
                            foreach($rows as $value){
                                if($value['transfers'] == 0){
                                    $rows_sort[] = $value;
                                }
                            }
                            break;
                    }
                }
                break;
            case 13:

                if($rows){
                    switch($stops){
                        case 0:
                            $rows_sort = $rows;
                            break;
                        case 1:
                            foreach($rows as $value){
                                if($value['number_of_changes'] <= 1){
                                    $rows_sort[] = $value;
                                }
                            }
                            break;
                        case 2:
                            foreach($rows as $value){
                                if($value['number_of_changes'] == 0){
                                    $rows_sort[] = $value;
                                }
                            }
                            break;
                    }
                }
                break;
        }
        return $rows_sort;
    }
}