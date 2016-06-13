<?php
/**
 * Created by PhpStorm.
 * User: freeman
 * Date: 13.08.15
 * Time: 12:53
 */
namespace app\includes\models\site\shortcodes;
class TPInOurCityFlyShortcodeModel extends \app\includes\models\site\TPShortcodesChacheModel{

    public function get_data($args = array())
    {
        // TODO: Implement get_data() method.
        $defaults = array( 'currency' => 'RUB', 'destination' => false,
            'period_type' => \app\includes\TPPlugin::$options['shortcodes']['14']['period_type'], 'one_way' => false,
            'limit' => \app\includes\TPPlugin::$options['shortcodes']['14']['limit'], 'trip_class' => 0, 'title' => ''
        , 'stops' => \app\includes\TPPlugin::$options['shortcodes']['14']['transplant'], 'paginate' => true,
            'off_title' => '', 'subid' => '');
        extract( wp_parse_args( $args, $defaults ), EXTR_SKIP );
        $attr = array( 'currency' => $this->typeCurrency(),
            'destination' => $destination, 'period_type' => $period_type, 'trip_class' => $trip_class, 'limit' => $limit,
            'one_way' => $one_way);
        $name_method = "***************".__METHOD__."***************";
        if(TPOPlUGIN_ERROR_LOG)
            error_log($name_method);
        $method = __CLASS__." -> ". __METHOD__." -> ".__LINE__
            ." 11. Дешевые перелеты в город ";
        if(TPOPlUGIN_ERROR_LOG)
            error_log($method);
        if($this->cacheSecund()){
            if(TPOPlUGIN_ERROR_LOG)
                error_log("{$method} cache");
            if ( false === ($rows = get_transient($this->cacheKey('14', $destination)))) {
                if(TPOPlUGIN_ERROR_LOG)
                    error_log("{$method} cache false");
                $return = \app\includes\TPPlugin::$TPRequestApi->get_latest($attr);
                if(TPOPlUGIN_ERROR_LOG)
                    error_log("{$method} cache false ".print_r($return, true));
                if( ! $return )
                    return false;
                $rows = array();
                $rows = $return;
                $rows = $this->iataAutocomplete($rows, 13);
                set_transient( $this->cacheKey('14', $destination) , $rows, $this->cacheSecund());
            }
        }else{
            $return = \app\includes\TPPlugin::$TPRequestApi->get_latest($attr);
            if( ! $return )
                return false;
            $rows = array();
            $rows = $return;
            $rows = $this->iataAutocomplete($rows, 13);
        }
        $rows_sort = array();
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
        if(TPOPlUGIN_ERROR_LOG)
            error_log("{$method} rows = ".print_r($rows_sort, true));
        if(TPOPlUGIN_ERROR_LOG)
            error_log($name_method);
        return array('rows' => $rows_sort,'destination' => $this->iataAutocomplete($destination, 0, 'destination'),
            'type' => 14, 'title' => $title, 'paginate' => $paginate, 'one_way' => $one_way,
            'off_title' => $off_title, 'subid' => $subid
        );
    }
}