<?php
/**
 * Created by PhpStorm.
 * User: freeman
 * Date: 13.08.15
 * Time: 10:37
 */
namespace app\includes\models\site;
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
     * @return bool|int
     */
    public function cacheSecund(){
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
    }

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
        TPAutocomplete::getInstance();
        switch($type){
            case 0:
                if($title != 'airline'){
                    switch(\app\includes\TPPlugin::$options['local']['localization']) {
                        case "1":
                            $data = TPAutocomplete::$title[$data]['cases'][\app\includes\TPPlugin::$options['local']['title_case'][$title]];
                            break;
                        case "2":
                            $data = TPAutocomplete::$data[$data]['name_translations']['en'];
                            break;
                    }
                }else{

                    switch(\app\includes\TPPlugin::$options['local']['localization']) {
                        case "1":
                            $data = (isset(TPAutocomplete::$data_airline[$data]['names']['ru'])) ? TPAutocomplete::$data_airline[$data]['names']['ru']:TPAutocomplete::$data_airline[$data]['names']['en'];
                            break;
                        case "2":
                            $data = TPAutocomplete::$data_airline[$data]['names']['en'];
                            break;
                    }
                }

                break;
            case 1:
            case 2:
                if(!empty($data)) {
                    foreach ($data as $key => $value) {
                        $value['origin_iata'] = $value['origin'];
                        $value['destination_iata'] = $value['destination'];
                        switch(\app\includes\TPPlugin::$options['local']['localization']) {
                            case "1":
                                $value['origin'] = TPAutocomplete::$data[$value['origin']]['name_translations']['ru'];
                                $value['destination'] = TPAutocomplete::$data[$value['destination']]['name_translations']['ru'];
                                break;
                            case "2":
                                $value['origin'] = TPAutocomplete::$data[$value['origin']]['name_translations']['en'];
                                $value['destination'] = TPAutocomplete::$data[$value['destination']]['name_translations']['en'];
                                break;
                        }
                        $data[$key] = $value;
                    }
                }
                break;
            case 4:
            case 5:
            case 6:
            case 7:
                //data_airline
                if(!empty($data)){
                    foreach($data as $key => $value){
                        $value['airline_img'] = $value['airline'];
                        $value['airline_iata'] = $value['airline'];
                        switch(\app\includes\TPPlugin::$options['local']['localization']) {
                            case "1":
                                $value['airline'] = (isset(TPAutocomplete::$data_airline[$value['airline']]['names']['ru'])) ? TPAutocomplete::$data_airline[$value['airline']]['names']['ru']:TPAutocomplete::$data_airline[$value['airline']]['names']['en'];
                                break;
                            case "2":
                                $value['airline'] = TPAutocomplete::$data_airline[$value['airline']]['names']['en'];
                                break;
                        }
                        $data[$key] = $value;
                    }
                }
                break;
            case 8:
                if(!empty($data)){
                    foreach($data as $key => $value){
                        $value['airline_img'] = $value['airline'];
                        switch(\app\includes\TPPlugin::$options['local']['localization']) {
                            case "1":
                                $value['city'] = TPAutocomplete::$data[$key]['name_translations']['ru'];
                                $value['airline'] = (isset(TPAutocomplete::$data_airline[$value['airline']]['names']['ru'])) ? TPAutocomplete::$data_airline[$value['airline']]['names']['ru']:TPAutocomplete::$data_airline[$value['airline']]['names']['en'];
                                break;
                            case "2":
                                $value['airline'] = TPAutocomplete::$data_airline[$value['airline']]['names']['en'];
                                $value['city'] = TPAutocomplete::$data[$key]['name_translations']['en'];
                                break;
                        }
                        $data[$key] = $value;
                    }
                }
                break;
            case 9:
                if(!empty($data)){
                    foreach($data as $key => $value){
                        $value['airline_img'] = $value['airline'];
                        $value['destination_iata'] = $key;
                        $value['origin_iata'] = $value['origin'];
                        switch(\app\includes\TPPlugin::$options['local']['localization']) {
                            case "1":
                                $value['origin']  = TPAutocomplete::$data[$value['origin']]['name_translations']['ru'];
                                $value['destination'] = TPAutocomplete::$data[$key]['name_translations']['ru'];
                                $value['airline'] = (isset(TPAutocomplete::$data_airline[$value['airline']]['names']['ru'])) ? TPAutocomplete::$data_airline[$value['airline']]['names']['ru']:TPAutocomplete::$data_airline[$value['airline']]['names']['en'];
                                break;
                            case "2":
                                $value['airline'] = TPAutocomplete::$data_airline[$value['airline']]['names']['en'];
                                $value['destination'] = TPAutocomplete::$data[$key]['name_translations']['en'];
                                $value['origin']  = TPAutocomplete::$data[$value['origin']]['name_translations']['en'];
                                break;
                        }
                        $data[$key] = $value;
                    }
                }
                break;
            case 10:
                if(!empty($data)){
                    foreach($data as $key => $value){
                        $citys = explode( '-', $key );
                        switch(\app\includes\TPPlugin::$options['local']['localization']) {
                            case "1":
                                $value = TPAutocomplete::$data[$citys[0]]['name_translations']['ru'];
                                $value .= ' → '.TPAutocomplete::$data[$citys[1]]['name_translations']['ru'];
                                break;
                            case "2":
                                $value = TPAutocomplete::$data[$citys[0]]['name_translations']['en'];
                                $value .= ' → '.TPAutocomplete::$data[$citys[1]]['name_translations']['en'];
                                break;
                        }
                        $data[$key] = $value;
                    }

                }
                break;
            case 12:
            case 13:
            case 14:
                if(!empty($data)) {
                    foreach ($data as $key => $value) {
                        $value['origin_iata'] = $value['origin'];
                        $value['destination_iata'] = $value['destination'];
                        switch(\app\includes\TPPlugin::$options['local']['localization']) {
                            case "1":
                                $value['origin'] = TPAutocomplete::$data[$value['origin']]['name_translations']['ru'];
                                $value['destination'] = TPAutocomplete::$data[$value['destination']]['name_translations']['ru'];
                                break;
                            case "2":
                                $value['origin'] = TPAutocomplete::$data[$value['origin']]['name_translations']['en'];
                                $value['destination'] = TPAutocomplete::$data[$value['destination']]['name_translations']['en'];
                                break;
                        }
                        $data[$key] = $value;
                    }
                }
                break;
            default:
                break;
        }
        return $data;

    }
}